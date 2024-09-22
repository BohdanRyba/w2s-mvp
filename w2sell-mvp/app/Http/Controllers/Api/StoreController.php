<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\ProductResource;
use App\Models\Store;
use Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function categories(Request $request, int $storeId)
    {
        /**
         * @var Store $store
         */
        $store = Auth::user()->stores()->where('id', $storeId)->firstOrFail();
        if (!$store){
            return new ErrorResource((object)[
                'message' => 'Store not found'
            ]);
        }

        $categories = $store->categories;

        return CategoryResource::collection((object)$categories);
    }

    public function category()
    {

    }

    public function products(Request $request, $storeId)
    {
        /**
         * @var Store $store
         */
        $store = Auth::user()->stores()->where('id', $storeId)->firstOrFail();
        if (!$store){
            return new ErrorResource((object)[
                'message' => 'Store not found'
            ]);
        }

        $products = $store->products;

        return ProductResource::collection((object)$products);
    }
    public function categoryProducts()
    {

    }
    public function categoryProduct()
    {

    }
}
