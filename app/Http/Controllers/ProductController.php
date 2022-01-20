<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Mail\Transport\SesTransport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $products = Product::orderBy('id', 'ASC')->where('user_id', $userId)->paginate(8);
        return view('products.index', compact('products'));
    }

    public function like($productId){
        $product = Product::findOrFail($productId);
        if ($product->userLike){
            $product->Likes()->detach(Auth::user()->id);
        }else{
            $product->Likes()->attach(Auth::user()->id);
        }
        return back();
    }

    public function create(){
        $categories = Category::orderBy('id', 'ASC')->paginate(10);;
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request){
        $product = new Product();
        $product->name = $request->get('name');
        $product->original_price = $request->get('original_price');
        $product->discount_price = $request->get('discount_price');
        $product->sale = $request->get('sale');
        $product->category_id = $request->get('category_id');
        if ($request->hasFile('img')){
            $file = $request->file('img');
            $path = storage_path().'/app/public/Products';
            $fileName = Str::random(60).'.'.$file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $product->img = '/storage/Products/'.$fileName;
        }
        $product->user_id = Auth::user()->id;
        $product->save();

        return back();
    }

    public function edit($id){
        $categories = Category::orderBy('id', 'ASC')->paginate(10);;
        $product = Product::findOrFail($id);
        $categoriaProduct = Category::findOrFail($product->	category_id);
        return view('products.edit', compact('product','categories','categoriaProduct'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->get('name');
        $product->original_price = $request->get('original_price');
        $product->discount_price = $request->get('discount_price');
        $product->sale = $request->get('sale');
        $product->category_id = $request->get('category_id');
        if ($request->hasFile('img')){
            $file = $request->file('img');
            $path = storage_path().'/app/public/Products';
            $fileName = Str::random(60).'.'.$file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $product->img = '/storage/Products/'.$fileName;
        }
        $product->user_id = Auth::user()->id;
        $product->save();

        return back();
    }

    public function show($id){
        $validProduct = Product::find($id);
        return view('products.show',compact('validProduct'));
    }

    public function delete($id){
        $product = Product::find($id);
        $product->likes()->detach();
        Offer::where("product_id", $id)->delete();
        $product->delete();
        return back();
    }
}
