import React from 'react';


const AddToCartButton = props => {
  return (
    <React.Fragment>
      {!props.valid &&
        <div className="alert alert-danger">You have to select size</div>
      }
      <button type="submit" onClick={props.submitHandle} className="btn btn-info mt-5">
        <i className="fa fa-cart-plus mr-3"></i>
        Add to cart
      </button>
    </React.Fragment>
  );
}


export default AddToCartButton;
