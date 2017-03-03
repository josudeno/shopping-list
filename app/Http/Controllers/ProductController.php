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
    
    public function search(Request $request)
    {
        $productName = $request->input('productName');
        return response()->json([
            'image' => 'http=>//img.tesco.com/Groceries/pi/294/5054775426294/IDShot_90x90.jpg',
            'tpnb' => 53524518,
            'price'=> 0.63,
            'ContentsMeasureType'=> 'G',
            'name'=> 'Tesco Top Down Tomato Ketchup 555G',
            'UnitOfSale'=> 1,
            'description'=> ['Tomato ketchup.'],
            'AverageSellingUnitWeight'=> 0.546,
            'UnitQuantity'=> '100G',
            'ContentsQuantity'=> 555,
            'unitprice'=> 0.114
        ]);
    }
}