import React from 'react';


const OneProductForm = () => {

  var checkSelectedHandle = function (e) {
    const size = document.querySelector('input[name="selected_size"]:checked');
    if(size === null){
      e.preventDefault();
      alert('You must select size');
    }
  }

  return (
      <button type="submit" onClick={checkSelectedHandle} className="btn btn-info mt-5"><i className="fa fa-cart-plus mr-3"></i>Add to cart</button>
  );
}




export default OneProductForm;
