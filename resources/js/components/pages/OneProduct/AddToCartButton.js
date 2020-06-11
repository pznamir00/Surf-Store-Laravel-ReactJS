import React from 'react';
import ReactDOM from 'react-dom';


const AddToCartButton = (props) => {
    const button = (
      <button type="submit" onClick={props.checkSelectedHandle} className="btn btn-info mt-5"><i className="fa fa-cart-plus mr-3"></i>Add to cart</button>
    );
    return ReactDOM.render(button, document.getElementById('add-to-cart-button'));
}


export default AddToCartButton;
