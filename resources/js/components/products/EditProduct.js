import React, { Component } from 'react';
import Sizes from './Size/Sizes';
import Images from './Images';


class EditProduct extends Component {

    constructor(){
      super();

      this.state = {
        sizesFromHtml: {},
        sizesQuantitiy: 0,
      };

      this.checkRadioCategory();
    }

    checkRadioCategory(){
      let $category_id = $('#cat-id').html();
      $('#subcat' + $category_id).attr('checked', true);
    }

    componentDidMount(){
      this.preLoadSizes();
    }

    preLoadSizes(){
      var values = [...document.getElementsByClassName('size-value')];
      var quantities = [...document.getElementsByClassName('size-qty')];
      let curr = 0;
      values.forEach((size) => {
        this.state.sizesFromHtml['s'+curr] = {
          val: size.value,
          qty: quantities[this.state.sizesQuantitiy].value,
        };
        this.setState({
          sizesQuantitiy: this.state.sizesQuantitiy++,
        });
        curr++;
      });
    }

    render(){
      return (
          <React.Fragment>
            <Sizes
              currentId={this.state.sizesQuantitiy}
              sizes={this.state.sizesFromHtml}
            />
            <Images
              preload={true}
            />
          </React.Fragment>
      );
    }
}


export default EditProduct;
