<?php


namespace App;
use Session;
use App\Product;
use App\Delivery;



class Cart
{
  public $items = [];



  function __construct($first_product_id, $first_size_id)
  {
    //add first product
    $this->add($first_product_id, $first_size_id);
  }



  private function has_some_products()
  {
    return count($this->items) != 0;
  }



  public function add($product_id, $size_id, $default_quantity = 1)
  {
    $new_item = [
      "product id" => $product_id,
      "size id" => $size_id,
      "quantity" => $default_quantity,
    ];

    $check_exist_alright = function($n_item){
      foreach($this->items as $i){
        if($i['product id'] == $n_item['product id'] && $i['size id'] == $n_item['size id'])
          return true;
      }
    };

    if(!$check_exist_alright($new_item))
      array_push($this->items, $new_item);
  }



  public function remove($key)
  {
    unset($this->items[$key]);
    if(!$this->has_some_products())
      Session::forget('cart');
  }



  public function count_total($total = 0)
  {
    foreach($this->items as $item){
      $p = Product::find($item['product id']);
      $total += ($p->price * $item['quantity']);
    }
    if(Session::has('delivery_id')){
      $del = Delivery::find( session('delivery_id') );
      $total += $del->price;
    }

    return round($total, 2);
  }
}
