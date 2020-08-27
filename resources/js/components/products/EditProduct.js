import React, { useEffect } from 'react';
import { SizesContainer } from './Size/index';
import { ImagesContainer } from './Images';
import { CategoriesContainer } from './Categories/index';
import { TextareaHandle } from './TextareaHandle';
import { connect } from 'react-redux'
import actions from '../../redux/categorySelected/actions'



const EditProduct = props => {

    const changeCategoryHandle = async (e) => {
      const { value } = e.target;
      await props.change(value);
    };

    const preloadCategory = () => {
      setTimeout(() => {
        const categoryId = document.getElementById('cat-id').innerHTML;
        const subcategory = document.getElementById('subcategory_' + categoryId);
        subcategory.checked = true;
        props.change(subcategory.value);
      }, 1500);
    }

    const preloadSizes = () => {
      setTimeout(() => {
        [...document.querySelectorAll('.size-id')].forEach((i, index) => {
          const quantity = document.querySelectorAll('.size-qty')[index].value;
          document.getElementById('size_input_' + i.value).value = quantity;
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
          <CategoriesContainer
            changeCategoryHandle={changeCategoryHandle}
          />
          <SizesContainer
            categoryId={props.categoryId}
          />
          <ImagesContainer
            preload={preloadImages}
          />
          <TextareaHandle/>
        </React.Fragment>
    );
}


const mapStateToProps = (state) => {
  return {
    categoryId: state.categorySelected.categoryId
  }
}

const mapDispatchToProps = (dispatch) => ({
    change: selected => dispatch(actions.change(selected))
})

export const EditProductContainer = connect(mapStateToProps, mapDispatchToProps)(EditProduct);
