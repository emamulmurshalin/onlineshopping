<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(){
        $data= 'My name is Emamul Murshalin';

        //return view('demo.demo', compact('data'));
        //return view('demo.demo')->with('data', $data);
        //return view('demo.demo', ['data'=>$data]);
        $products= Product::where('publication_status', 1)->orderBy('id', 'desc')->take(4)->get();
        return view('front.home.home-content', ['products'=> $products]);
    }

    public function categoryProduct($id){
        $categoryNameId= Category::where('id', $id)->first();
        $categoryProducts= Product::where('category_id', $id)
            ->where('publication_status', 1)
            ->take(8)
            ->get();
        //return $categoryProducts;
        return view('front.category.category-content', [
            'categoryProducts'=>$categoryProducts,
            'categoryNameId'=>$categoryNameId
        ]);
    }

    public function detailsProduct($id){
        $productById= Product::find($id);
        $relatedProducts= Product::where('category_id',
            $productById->category_id)
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();
        return view('front.singleproduct.product-details', [
            'productById'=>$productById,
            'relatedProducts'=>$relatedProducts
        ]);
    }
}
