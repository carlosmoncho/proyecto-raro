<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleMyShopingCartController extends Controller
{
    public function index(){
        $offers = Auth::user()->Offers;
        return view('shoppingCart.index', compact('offers'));
    }
}
