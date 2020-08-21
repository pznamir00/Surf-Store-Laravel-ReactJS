import React, { useState, useEffect } from 'react';
import Slider from './Slider';
import AddToCartButton from './AddToCartButton';
import './style.scss';


const OneProductForm = () => {
  const [valid, setValid] = useState(true);
  const submitHandle = e => {
    if(!document.querySelector('input[name="size_id"]:checked')){
      e.preventDefault();
      setValid(false);
    }
  }
  return (
    <React.Fragment>
      <Slider/>
      <AddToCartButton
        valid={valid}
        submitHandle={submitHandle}
      />
    </React.Fragment>
  );
}


export default OneProductForm;
