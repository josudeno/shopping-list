<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{

    public function index()
    {
        return view('product.index');
    }
    
    public function searchProduct()
    {
        $productName = Request::get('productName');
        Config::get('api.tesco');
        return View::make('product.product', ['productName' => $productName]);
    }
}