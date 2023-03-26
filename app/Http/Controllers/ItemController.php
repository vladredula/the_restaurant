<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ItemController extends Controller
{
    public function food()
    {
        $category = $this->get_category('F');

        $first_cat = reset($category);

        return $this->get_food($first_cat['abbreviation']);
    }

    public function get_food($active)
    {
        $response = Http::get('https://3vflwnsyek.execute-api.ap-northeast-1.amazonaws.com/prod/items/food/'.$active);
    
        $jsonData = $response->json();

        $items = $this->unmarshal($jsonData['Items']);
        $items = $this->reconstruct($items);

        $categories = $this->get_category('F');

        return view('food', compact('items', 'categories', 'active'));
    }

    public function drink()
    {
        $category = $this->get_category('D');

        $first_cat = reset($category);

        return $this->get_drink($first_cat['abbreviation']);
    }

    public function get_drink($active)
    {
        $response = Http::get('https://3vflwnsyek.execute-api.ap-northeast-1.amazonaws.com/prod/items/drink/'.$active);
    
        $jsonData = $response->json();

        $items = $this->unmarshal($jsonData['Items']);
        $items = $this->reconstruct($items);

        $categories = $this->get_category('D');

        return view('drink', compact('items', 'categories', 'active'));
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

            $new_data[$sub_cat][] = $item;
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
