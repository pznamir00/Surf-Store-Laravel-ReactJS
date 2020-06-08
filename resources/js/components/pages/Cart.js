import React, { Component } from 'react';
import axios from 'axios';


export default class Cart extends Component{

  constructor(){
    super();
    this.state = {
      sizeId: 0,
      quantity: 0,
    };
  }

  componentDidMount(){
    var instance = this;
    document.querySelectorAll('input[type="number"]').forEach(function(input){
      input.addEventListener('change', instance.changeQuantityHandle.bind(instance));
    });
  }

  async changeQuantityHandle(e){
    let value = e.target.value;
    let sizeId = e.target.dataset.sid;
    await this.setState({
      sizeId: sizeId,
      quantity: value,
    });
  }

  componentDidUpdate(){
    if(this.state.quantity !== 0){
      axios.put('/cart/change-size-quantity', {
          sizeId: this.state.sizeId,
          quantity: this.state.quantity,
      });
    }
  }

  render(){
    return (null);
  }
}
