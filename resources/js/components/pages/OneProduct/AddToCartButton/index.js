import React from 'react';
import $ from 'jquery';


const AddToCartButton = props => {

  const specialColor = $('.fa-search').css('color');

  return (
    <React.Fragment>
      {!props.selected &&
        <div className="alert alert-danger">You have to select size</div>
      }
      <button type="submit" onClick={props.submitHandle} className="btn btn-info mt-5" style={{ backgroundColor: specialColor }}>
        <i className="fa fa-cart-plus mr-3"></i>
        Add to cart
      </button>
    </React.Fragment>
  );
}


export default AddToCartButton;
