<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class LandingPage extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'premium'],['only' => ['load']]);
    }

    public function index()
    {
        $products = Product::orderBy('id', 'ASC')->paginate(8);
        return view('welcome', compact('products'));
    }

    public function all()
    {
        $products = Product::orderBy('id', 'ASC')->paginate(8);
        return view('welcome', compact('products'));
    }

    public function showMostNews()
    {
        $products = Product::orderBy('created_at', 'ASC')->paginate(8);
        return view('welcome', compact('products'));
    }

    public function showLikes()
    {
        $products = Product::withCount('likes')->orderBy('likes_count', 'desc')->paginate(8);
        return view('welcome', compact('products'));
    }
}
