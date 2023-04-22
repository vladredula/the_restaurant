<?php

namespace App\Http\Controllers;

use Exception;
use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
        $items = $this->get_items('food');
        $categories = $this->get_category('food');

        if ($items && $categories) {
            return view('food', compact('items', 'categories'));
        } else {
            return view('food')->with('error', __('messages.oops'));
        }
    }

    public function drink()
    {
        $items = $this->get_items('drink');
        $categories = $this->get_category('drink');

        if ($items && $categories) {
            return view('drink', compact('items', 'categories'));
        } else {
            return view('drink')->with('error', __('messages.oops'));
        }
    }

    public function reconstruct($data)
    {
        $new_data = array();

        foreach ($data as $item) {
            $sub_cat = 'none';

            if ($item['subcategory'] != '') {
                $sub_cat = $item['subcategory'];
            }

            $temp = explode(",", $item['price']);

            $prices = [];
            foreach ($temp as $price) {
                $price = explode(":", $price);
                $prices[$price[0]] = $price[1];
            }

            $item['price'] = $prices;

            $new_data[$item['category']][$sub_cat][] = $item;
        }

        return $new_data;
    }

    public function get_items($itemType) {
        $url = 'https://ya398c21fc.execute-api.ap-northeast-1.amazonaws.com/prod/item/'.$itemType;

        try {
            $response = Http::get($url);
    
            if ($response->status() != 200) {
                throw new Exception($response->json()['message']);
            }

            $jsonData = $response->json();

            $data = $this->reconstruct($jsonData['items']);

            return $data;

        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return false;
    }

    public function get_category($itemType)
    {
        $url = 'https://ya398c21fc.execute-api.ap-northeast-1.amazonaws.com/prod/category/type/'.$itemType;

        try {
            $response = Http::get($url);
    
            if ($response->status() != 200) {
                throw new Exception($response->json()['message']);
            }
    
            $jsonData = $response->json();
    
            $data = $jsonData['categories'];
    
            usort($data, function($a, $b) {
                return $a['id'] - $b['id'];
            });
    
            return $data;

        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return false;
    }
}
