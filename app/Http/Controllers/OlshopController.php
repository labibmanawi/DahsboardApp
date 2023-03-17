<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OlshopController extends Controller
{
    public function olshop() {    
        $data =['data' => 'tittle : olshop'] ;
       return view('olshop', $data);
    }

    public function cart() {
        $data = ['data' => 'tittle : olshop-cart'] ;
        return view('olshop-cart', $data);
     }

    public function category() {
        $data = ['data' => 'tittle : olshop-category'] ;
        return view('olshop-category', $data);
     } 

    public function checkout() {
        $data = ['data' => 'tittle : olshop-checkout'] ;
        return view('olshop-checkout', $data);
    } 

    public function contact() {
        $data = ['data' => 'tittle : olshop-contact'] ;
        return view('olshop-contact', $data);
    }

    public function product() {
        $data = ['data' => 'tittle : olshop-product'] ;
        return view('olshop-product', $data);
    }

    public function index() {
        // $data = ['data' => 'tittle : olshop-index'] ;
        // return view('olshop-index', $data);

        return view('olshop-index');
    }
}
