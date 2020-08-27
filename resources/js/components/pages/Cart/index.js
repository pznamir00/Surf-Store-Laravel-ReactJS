import React, { useEffect } from 'react';
import { connect } from 'react-redux'
import actions from '../../../redux/cart/actions'
import axios from 'axios';


const Cart = (props) => {

  const changeQuantityHandle = e => {
    const { value } = e.target;
    const { sid } = e.target.dataset;
    props.sizeIdSelect(sid);
    props.setQuantity(value);
  };

  useEffect(() => {
    const _this = this;
    document.querySelectorAll('input[type="number"]').forEach(function(input){
      input.addEventListener('change', changeQuantityHandle);
    });
  }, []);

  useEffect(() => {
    axios.put('/data/cart/size', {
        sizeId: props.sizeId,
        quantity: props.quantity,
    });
  }, [props.quantity]);

  return null;
}


const mapStateToProps = (state) => {
  return {
    sizeId: state.cart.sizeId,
    quantity: state.cart.quantity
  }
}

const mapDispatchToProps = (dispatch) => ({
    sizeIdSelect: sizeId => dispatch(actions.sizeIdSelect(sizeId)),
    setQuantity: quantity => dispatch(actions.setQuantity(quantity))
})

export const CartContainer = connect(mapStateToProps, mapDispatchToProps)(Cart);
