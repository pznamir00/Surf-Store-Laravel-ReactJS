<?php


namespace App;
use Session;



class Cart
{
  public $items = [];


  function __construct($first_product_id, $first_size_id)
  {
    //add first product
    $this->add($first_product_id, $first_size_id);
  }


  public function add($product_id, $size_id)
  {
    $new_item = array(
      "product id" => $product_id,
      "size id" => $size_id,
      "quantity" => 1,
    );

    foreach($this->items as $i){
      if($i['product id'] == $new_item['product id'] && $i['size id'] == $new_item['size id'])
        return;
    }

    array_push($this->items, $new_item);
  }


  public function remove($key)
  {
    unset($this->items[$key]);

    if(count($this->items) == 0)
      Session::forget('cart');
  }
}
