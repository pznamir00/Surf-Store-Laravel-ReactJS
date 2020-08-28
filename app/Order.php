<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderedProduct;


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
      foreach($items as $item){
        OrderedProduct::create([
          'product_id' => $item['product']->id,
          'size_id' => $item['size']->id,
          'order_id' => $this->id,
          'quantity' => $item['quantity']
        ]);

        $item['size']->quantity -= $item['quantity'];
        $item['size']->save();
        if($item['size']->quantity <= 0)
          $item['size']->delete();

        if(count($item['product']->sizes) == 0){
          $product->active = false;
          $product->save();
        }
      }
    }
}
