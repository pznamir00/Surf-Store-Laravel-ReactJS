import React, { useState, useEffect } from 'react';
import Sizes from './Size/index';
import Images from './Images';
import Categories from './Categories/index';
import { TextareaHandle } from './TextareaHandle';



const EditProduct = () => {

    const [categoryId, setCategoryId] = useState(1);
    const [sizesFromHtml, setSizesFromHtml] = useState(null);

    const changeCategoryHandle = async (e) => {
      const { value } = e.target;
      await setCategoryId(value);
    };

    const preloadCategory = () => {
      setTimeout(() => {
        const categoryId = document.getElementById('cat-id').innerHTML;
        let subcategory = document.getElementById('subcategory_' + categoryId);
        subcategory.checked = true;
        setCategoryId(subcategory.value);
      }, 1500);
    }

    const preloadSizes = () => {
      setTimeout(() => {
        [...document.querySelectorAll('.size-id')].forEach(function(i, index){
          const qty = document.querySelectorAll('.size-qty')[index].value;
          $('#size_input_' + i.value).val(qty);
        });
      }, 2000);
    }

    const preloadImages = (dropzone) => {
      if(dropzone !== undefined){
        const $filenames = $('.image-filename');
        for(let i=0; i<$filenames.length; i++) {
            const file = { name: $filenames[i].value, size: 12345 };
            dropzone.emit('addedfile', file);
            dropzone.emit('thumbnail', file, 'http://127.0.0.1:8000/images/' + file.name);
        }
      }
    }

    useEffect(() => {
      preloadCategory();
      preloadSizes();
      preloadImages();
    }, []);

    return (
        <React.Fragment>
          <Categories changeCategoryHandle={changeCategoryHandle}/>
          <Sizes
            categoryId={categoryId}
          />
          <Images
            preload={preloadImages}
          />
          <TextareaHandle/>
        </React.Fragment>
    );
}


export default EditProduct;
