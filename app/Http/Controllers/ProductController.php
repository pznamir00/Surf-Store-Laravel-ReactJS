<?php

namespace App\Http\Controllers;
use \Illuminate\Database\QueryException;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Size;
use App\Image;

class ProductController extends Controller
{
    private static function delete_previous_images()
    {
      $images = Image::all()->where('product_id', '0');
      foreach($images as $img){
        $img->del_file();
        $img->delete();
      }
    }

    public function add()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();

        if(Session::has('error')){
          ProductController::delete_previous_images();
        }

        return view('products.add', compact('categories', 'subcategories'));
    }

    public function commit(Request $req)
    {
      $this->validate($req, [
        'title' => 'required|max:64',
        'description' => 'required|max:255',
        'price' => 'required',
        'category_id' => 'required',
      ]);

      $new_product = new Product();
      $new_product->title = $req->input('title');
      $new_product->description = $req->input('description');
      $new_product->category_id = $req->input('category_id');
      $new_product->price = $req->input('price');
      $new_product->active = true;
      $new_product->save();
      $new_product->delete_sizes();
      $new_product->create_sizes($req->input('size_values'), $req->input('size_quantities'));
      $new_product->set_new_added_images();

      return redirect('/')->with('success', 'Product added successfully');
    }

    public function edit($id)
    {
      try{
        $instance = Product::find($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        if(Session::has('error')){
          ProductController::delete_previous_images();
        }
        return view('products.edit', compact('instance', 'categories', 'subcategories'));
      }
      catch(QueryException $e){
        return redirect('/')->withErrors('Product not found');
      }
    }

    public function update(Request $req, $id)
    {
      $this->validate($req, [
        'title' => 'required|max:64',
        'description' => 'required|max:255',
        'price' => 'required',
        'category_id' => 'required',
      ]);

      $product = Product::find($id);
      $product->title = $req->input('title');
      $product->description = $req->input('description');
      $product->category_id = $req->input('category_id');
      $product->price = $req->input('price');
      $product->save();

      //sizes and images
      $product->delete_sizes();
      $product->create_sizes($req->input('size_values'), $req->input('size_quantities'));
      $product->set_new_added_images();
      $product->delete_removed_images($req->input('removed'));

      return redirect('/')->with('success', 'Product edited successfully');
    }

    public function delete(Request $request)
    {
      $id = $request->input('product_id');
      $product = Product::find($id);
      $product->delete_sizes();
      $product->delete_images();
      $product->delete();
      return redirect('/')->with('success', 'Deleted product');
    }

    public function create_image(Request $req)
    {
      $image = new Image;
      $image->product_id = 0;
      $image->upload($req->file('file'));
      $image->save();
    }
}
