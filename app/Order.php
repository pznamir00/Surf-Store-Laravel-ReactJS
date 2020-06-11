<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderedProduct;
use App\Size;
use App\Product;

class Order extends Model
{
    protected $fillable = [
      'first_name', 'last_name', 'email', 'phone', 'street', 'home_number', 'city', 'zipcode',
      'total', 'payment_id', 'delivery_id'
    ];

    public function ordered_products()
    {
      return $this->hasMany('App\OrderedProducts');
    }

    public function create_ordered_products($items)
    {
      foreach($items as $item){
        $product = Product::find($item['product id']);
        $size = Size::find($item['size id']);
        $ordered_product = OrderedProduct::create([
          'product_id' => $product->id,
          'order_id' => $this->id,
          'size_id' => $size->id,
          'quantity' => $item['quantity']
        ])->save();

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
