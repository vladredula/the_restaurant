<?php

namespace App\Http\Controllers;

use Exception;
use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{

    private $items = false;
    private $categories = false;
    private $apiEndpoint = 'https://ya398c21fc.execute-api.ap-northeast-1.amazonaws.com/prod/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function food()
    {
        $this->get_items('food');
        $this->get_category('food');

        if ($this->hasErrors()) {
            return view('food')->with('error', __('messages.oops'));
        } else {
            return view('food', [
                'items' => $this->items,
                'categories' => $this->categories
            ]);
        }
    }

    public function drink()
    {
        $this->get_items('drink');
        $this->get_category('drink');

        if ($this->hasErrors()) {
            return view('drink')->with('error', __('messages.oops'));
        } else {
            return view('drink', [
                'items' => $this->items,
                'categories' => $this->categories
            ]);
        }
    }

    public function hasErrors()
    {
        return $this->items && $this->categories ? false : true;
    }

    public function reconstruct($data)
    {
        $newData = array();

        foreach ($data as $item) {
            $category = $item['category'];
            $subCategory = $item['subcategory'];

            $temp = explode(",", $item['price']);

            $prices = [];
            foreach ($temp as $price) {
                $price = explode(":", $price);
                $prices[$price[0]] = $price[1];
            }

            $item['price'] = $prices;

            $newData[$category][$subCategory][] = $item;
        }

        $this->items = $newData;
    }

    public function get_items($itemType)
    {
        $resourseUrl = 'item/' . $itemType;

        try {
            $response = Http::get($this->apiEndpoint . $resourseUrl);

            if ($response->status() != 200) {
                throw new Exception($response->json()['message']);
            }

            $jsonData = $response->json();

            if ($jsonData == NULL) {
                throw new Exception('No items received.');
            }

            $this->reconstruct($jsonData['items']);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function get_category($itemType)
    {
        $resourseUrl = 'category/type/' . $itemType;

        try {
            $response = Http::get($this->apiEndpoint . $resourseUrl);

            if ($response->status() != 200) {
                throw new Exception($response->json()['message']);
            }

            $jsonData = $response->json();

            $data = $jsonData['categories'];

            usort($data, function ($a, $b) {
                return $a['id'] - $b['id'];
            });

            $this->categories = $data;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
