<?php

namespace App\Http\Controllers;

use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ItemController extends Controller
{
    public function __construct()
    {
        if (!Browser::isInApp()) {
            $this->middleware('auth');
        }
    }

    public function food()
    {
        $response = Http::get('https://3vflwnsyek.execute-api.ap-northeast-1.amazonaws.com/prod/items/food');
    
        $jsonData = $response->json();

        $items = $this->unmarshal($jsonData['Items']);
        $items = $this->reconstruct($items);

        $categories = $this->get_category('F');

        return view('food', compact('items', 'categories'));
    }

    public function drink()
    {
        $response = Http::get('https://3vflwnsyek.execute-api.ap-northeast-1.amazonaws.com/prod/items/drink');
    
        $jsonData = $response->json();

        $items = $this->unmarshal($jsonData['Items']);
        $items = $this->reconstruct($items);

        $categories = $this->get_category('D');

        return view('drink', compact('items', 'categories'));
    }

    public function unmarshal($jsonData)
    {
        $new_data = [];

        foreach ($jsonData as $data) {
            $temp_data = array();

            foreach ($data as $key => $value) {
                $value_key = array_keys($value)[0];
                $new_value = $value[$value_key];

                if ($new_value === true) {
                    $temp_data[$key] = "";
                } 
                else {
                    if ($key == "price") {
                        $temp = explode(",", $new_value);

                        $prices = [];
                        foreach ($temp as $price) {
                            $price = explode(":", $price);
                            $prices[$price[0]] = $price[1];
                        }

                        $new_value = $prices;
                    }

                    $temp_data[$key] = $new_value;
                }
            }
            
            $new_data[] = $temp_data;
        }

        return $new_data;
    }

    public function reconstruct($data)
    {
        $new_data = array();

        foreach ($data as $item) {
            $sub_cat = 'none';

            if ($item['subcategory'] != '') {
                $sub_cat = $item['subcategory'];
            }

            $new_data[$item['category']][$sub_cat][] = $item;
        }

        return $new_data;
    }

    public function get_category($type = 'F')
    {
        $response = Http::get('https://3vflwnsyek.execute-api.ap-northeast-1.amazonaws.com/prod/category/'.$type);
    
        $jsonData = $response->json();

        $data = $this->unmarshal($jsonData['Items']);

        usort($data, function($a, $b) {
            return $a['id'] - $b['id'];
        });

        return $data;
    }
}
