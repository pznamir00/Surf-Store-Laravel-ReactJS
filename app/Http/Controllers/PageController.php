<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use App\Product;
use App\Category;


class PageController extends Controller
{
    private const PAGINATION = 20;

    public function index()
    {
        $products = Product::where('active', '1')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(PageController::PAGINATION);
        $categories = Category::all();
        return view('pages.index', compact('products', 'categories'));
    }

    public function one_product($id)
    {
        $product = Product::findOrFail($id);
        return response()->view('pages.one_product', compact('product'))->setStatusCode(302);
    }
}
