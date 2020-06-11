import React, { Component } from 'react';
import Slider from './Slider';
import AddToCartButton from './AddToCartButton';


class OneProductForm extends Component {

  checkSelectedHandle(e){
    const size = document.querySelector('input[name="selected_size"]:checked');
    if(size === null){
      e.preventDefault();
      alert('You must select size');
    }
  }

  render(){
    return (
        <React.Fragment>
          <Slider/>
          <AddToCartButton checkSelectedHandle={this.checkSelectedHandle}/>
        </React.Fragment>
    );
  }
}




export default OneProductForm;
