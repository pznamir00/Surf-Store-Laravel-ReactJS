import React, { useState } from 'react';
import Sizes from './Size/index';
import Images from './Images';
import Categories from './Categories/index';
import { TextareaHandle } from './TextareaHandle';


const AddProduct = () => {

    const [categoryId, setCategoryId] = useState(1);
    const changeCategoryHandle = async (e) => {
      const { value } = e.target;
      await setCategoryId(value);
    };

    return (
      <React.Fragment>
          <Categories changeCategoryHandle={changeCategoryHandle}/>
          <Sizes categoryId={categoryId}/>
          <Images/>
          <TextareaHandle/>
      </React.Fragment>
    );
}


export default AddProduct;
