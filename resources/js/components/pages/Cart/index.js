import React, { useState, useEffect } from 'react';
import axios from 'axios';


const Cart = () => {

  const [sizeId, setSizeId] = useState(0);
  const [quantity, setQuantity] = useState(0);

  const changeQuantityHandle = e => {
    const { value } = e.target;
    const { sid } = e.target.dataset;
    setSizeId(sid);
    setQuantity(value);
  };

  useEffect(() => {
    const _this = this;
    document.querySelectorAll('input[type="number"]').forEach(function(input){
      input.addEventListener('change', changeQuantityHandle);
    });
  }, []);

  useEffect(() => {
    axios.put('/data/cart/size', {
        sizeId: sizeId,
        quantity: quantity,
    });
  }, [quantity]);

  return null;
}


export default Cart;
