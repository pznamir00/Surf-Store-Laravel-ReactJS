<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderedProduct;
use App\Size;
use App\Product;

class Order extends Model
{
    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'phone',
      'street',
      'home_number',
      'city',
      'zipcode'
    ];

    public function ordered_products(){
      return $this->hasMany('App\OrderedProducts');
    }

    public function payment(){
      return $this->belongsTo('App\Payment');
    }

    public function delivery(){
      return $this->belongsTo('App\Delivery');
    }

    public function create_ordered_products($items){
      foreach($items as $item)
      {
        $product = Product::find($item['product id']);
        $size = Size::find($item['size id']);
        $ord_prod = new OrderedProduct();
        $ord_prod->product_id = $product->id;
        $ord_prod->order_id = $this->id;
        $ord_prod->size_id = $size->id;
        $ord_prod->quantity = $item['quantity'];
        $ord_prod->save();

        $size->quantity -= $item['quantity'];
        $size->save();
        if($size->quantity == 0){
          $size->delete();
        }

        if(count($product->sizes) == 0){
          $product->active = false;
          $product->save();
        }
      }
    }
}
