import React, { Component } from 'react';
import Sizes from './Size/Sizes';
import Images from './Images';
import { TextareaHandle } from './TextareaHandle';



export default class EditProduct extends Component {

    constructor(){
      super();
      this.state = {
        sizesFromHtml: {},
        sizesQuantitiy: 0,
      };
    }

    componentDidMount(){
      this.preloadSizes();
      this.preloadImages();
      const $category_id = $('#cat-id').html();
      $('#subcat' + $category_id).attr('checked', true);
    }

    preloadSizes(){
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

    preloadImages(dropzone){
      if(dropzone !== undefined){
        const $filenames = $('.image-filename');
        for(let i=0; i<$filenames.length; i++) {
            const file = { name: $filenames[i].value, size: 12345 };
            dropzone.emit('addedfile', file);
            dropzone.emit('thumbnail', file, 'http://127.0.0.1:8000/images/' + file.name);
        }
      }
    }

    render(){
      return (
          <React.Fragment>
            <Sizes
              currentId={this.state.sizesQuantitiy}
              sizes={this.state.sizesFromHtml}
            />
            <Images
              preload={this.preloadImages}
            />
            <TextareaHandle/>
          </React.Fragment>
      );
    }
}
