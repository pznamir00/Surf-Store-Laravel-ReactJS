import React from 'react';
import Sizes from './Size/Sizes';
import Images from './Images';
import { TextareaHandle } from './TextareaHandle';


const AddProduct = () => {
    return (
      <React.Fragment>
          <Sizes/>
          <Images/>
          <TextareaHandle/>
      </React.Fragment>
    );
}


export default AddProduct;
