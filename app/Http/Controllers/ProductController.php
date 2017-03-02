<?php


class ProductController extends BaseController
{

    public function searchProduct($productName)
    {
        
        Config::get('api.tesco');
        return View::make('product.product', ['productName' => $productName]);
    }
}