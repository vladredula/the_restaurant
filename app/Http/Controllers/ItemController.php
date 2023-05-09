<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{

    private $items = false;
    private $categories = false;
    private $apiEndpoint = 'https://ya398c21fc.execute-api.ap-northeast-1.amazonaws.com/prod/';

    public function __construct()
    {
        // will require auth upon construct
        $this->middleware('auth');
    }

    /**
     * Get Food items
     * @return mixed
     */
    public function food()
    {
        $this->get_items('food');
        $this->get_category('food');

        if ($this->canProceed()) {
            return view('food', [
                'items' => $this->items,
                'categories' => $this->categories
            ]);
        } else {
            return view('food')->with('error', __('messages.oops'));
        }
    }

    /**
     * Get Drink items
     * @return mixed
     */
    public function drink()
    {
        $this->get_items('drink');
        $this->get_category('drink');

        if ($this->canProceed()) {
            return view('drink', [
                'items' => $this->items,
                'categories' => $this->categories
            ]);
        } else {
            return view('drink')->with('error', __('messages.oops'));
        }
    }

    /**
     * Determines if $items and $categories has data.
     * Returns false if either one has not been assigned data.
     * 
     * @return bool
     */
    public function canProceed()
    {
        return $this->items && $this->categories ? true : false;
    }

    /**
     * Returns a reconstruction of items sorted according to categories and subcategories.
     * 
     * @param array $data
     * @return array
     *  ["category1" => [
     *      "subcategory1" => [item1, item2],
     *      "subcategory2" => [item3, item4]]
     *  ]
     */
    public function reconstruct($data)
    {
        $newData = array();

        foreach ($data as $item) {
            $category = $item['category'];
            $subCategory = $item['subcategory'];

            // $item['price'] contains string patterned like a dictionary.
            // ex. "size1:price1,size2:price2"
            // this string needs to be parsed into an array to ease usage.
            $temp = explode(",", $item['price']);

            $prices = [];
            foreach ($temp as $price) {
                $price = explode(":", $price);
                $prices[$price[0]] = $price[1];
            }

            $item['price'] = $prices;

            $newData[$category][$subCategory][] = $item;
        }

        return $newData;
    }

    /**
     * Calls api to get items.
     * Assigns retrieved data to $items.
     * 
     * @param string $itemType defines the type of item to get.
     * $itemType can only be 'food' or 'drink'
     */
    public function get_items($itemType)
    {
        $resourseUrl = 'item/' . $itemType;

        try {
            $response = Http::withHeaders([
                'authorizationToken' => env('API_AUTH_TOKEN')
            ])->get($this->apiEndpoint . $resourseUrl);

            if ($response->status() != 200) {
                // API gateway message variable uses "Message"
                // others uses small letter m for "message"
                if (isset($response->json()['Message'])) {
                    throw new Exception($response->json()['Message']);
                } else {
                    throw new Exception($response->json()['message']);
                }
            }

            $jsonData = $response->json();

            if ($jsonData == NULL) {
                throw new Exception('No items found.');
            }

            $this->items = $this->reconstruct($jsonData['items']);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Calls api to get all the categories depending on $itemType.
     * Assigns retrieved data to $categories.
     * 
     * @param string $itemType
     * $itemType can only be 'food' or 'drink'.
     */
    public function get_category($itemType)
    {
        $resourseUrl = 'category/' . $itemType;

        try {
            $response = Http::withHeaders([
                'authorizationToken' => env('API_AUTH_TOKEN')
            ])->get($this->apiEndpoint . $resourseUrl);

            if ($response->status() != 200) {
                // API gateway message variable uses "Message"
                // others uses small letter m for "message"
                if (isset($response->json()['Message'])) {
                    throw new Exception($response->json()['Message']);
                } else {
                    throw new Exception($response->json()['message']);
                }
            }

            $jsonData = $response->json();

            if ($jsonData == NULL) {
                throw new Exception('No categories found.');
            }

            $data = $jsonData['categories'];

            // sorts the categories by thier 'id'
            usort($data, function ($a, $b) {
                return $a['id'] - $b['id'];
            });

            $this->categories = $data;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
