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
  private const DEFAULT_QUANTITY = 1;



  function __construct()
  {
    $this->items = [];
    $total = 0;
  }



  private function has_any_products()
  {
    return count($this->items) != 0;
  }



  private function check_in_cart($item)
  {
    foreach($this->items as $i){
      if($i['product']->id == $item['product']->id && $i['size']->id == $item['size']->id)
        return true;
    }

    return false;
  }



  public function count_total()
  {
    $_total = 0;
    foreach($this->items as $item)
    {
      $_total += $item['product']->price * $item['quantity'];
    }

    $this->total = $_total;
  }



  public function add($product_id, $size_id)
  {
    $new_item = [
      "product"  => Product::find($product_id),
      "size"     => SizeRelationship::find($size_id),
      "quantity" => self::DEFAULT_QUANTITY
    ];

    if(!$this->check_in_cart($new_item)){
      array_push($this->items, $new_item);
      $this->count_total();
    }
  }



  public function remove($key)
  {
    unset($this->items[$key]);
    $this->count_total();
    if(!$this->has_any_products()){
      Session::forget('cart');
    }
  }
}
