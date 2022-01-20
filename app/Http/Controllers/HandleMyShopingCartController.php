<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleMyShopingCartController extends Controller
{
    public function index(){
        $offers = Auth::user()->Offers;
        return view('shoppingCart.index', compact('offers'));
    }

    public function store( Request $request){
        $offer = new Offer();
        $offer->user_id = Auth::user()->id;
        $offer->price = '0';
        $offer->product_id = $request->get('id');
        $offer->sended = false;
        $offer->save();
        return back();
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->price = $request->get('myPrice');
        $offer->sended = true;
        $offer->save();
        return back();
    }

    public function delete($id){
        Offer::find($id)->delete();
        return back();
    }
}
