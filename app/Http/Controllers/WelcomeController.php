<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $data= 'My name is Emamul Murshalin';

        //return view('demo.demo', compact('data'));
        //return view('demo.demo')->with('data', $data);
        //return view('demo.demo', ['data'=>$data]);

        return view('front.home.home-content');
    }

    public function category(){
        return view('front.category.category-content');
    }
}
