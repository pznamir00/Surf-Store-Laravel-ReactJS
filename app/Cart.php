<?php


namespace App;
use Session;
use App\Product;
use App\SizeRelationship;
use App\Delivery;



class Cart
{
  public $items;
  public $total;


  function __construct()
  {
    $this->items = [];
    $total = 0;
  }


  private function has_some_products()
  {
    return count($this->items) != 0;
  }


  public function add($product_id, $size_id)
  {
    $new_item = [
      "product"  => Product::find($product_id),
      "size"     => SizeRelationship::find($size_id),
      "quantity" => 1 //default quantity
    ];

    $check_exist_alright = function () use ($new_item){
      foreach($this->items as $i){
        if($i['product'] == $new_item['product'] && $i['size'] == $new_item['size'])
          return true;
      }
    };

    if(!$check_exist_alright())
    {
      array_push($this->items, $new_item);
      $this->total = $this->count_total();
    }
  }


  public function remove($key)
  {
    unset($this->items[$key]);
    $this->total = $this->count_total();
    if(!$this->has_some_products()){
      Session::forget('cart');
    }
  }


  public function count_total()
  {
    $total = 0;
    foreach($this->items as $item){
      $total += ($item['product']->price * $item['quantity']);
    }

    if(Session::has('delivery_id')){
      $del = Delivery::find( session('delivery_id') );
      $total += $del->price;
    }

    return round($total, 2);
  }
}
