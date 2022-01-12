<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleMyOffersController extends Controller
{
    public function index(){
        $offers = Auth::user()->OfferOwner;
        return view('myOffers.index', compact('offers'));
    }

    public function accepted($id){
        $offer = Offer::findOrFail($id);
        $offer->accepted = true;
        $offer->save();
        return back();
    }

    public function rejected($id){
        $offer = Offer::findOrFail($id);
        $offer->accepted = false;
        $offer->save();
        return back();
    }
}
