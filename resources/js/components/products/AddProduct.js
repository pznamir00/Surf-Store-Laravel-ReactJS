import React from 'react'
import { SizesContainer } from './Size/index'
import { ImagesContainer } from './Images'
import { CategoriesContainer } from './Categories/index'
import { TextareaHandle } from './TextareaHandle'
import { connect } from 'react-redux'
import actions from '../../redux/categorySelected/actions'




const AddProduct = props => {

    const changeCategoryHandle = async (e) => {
      const { value } = e.target;
      await props.change(value);
    };

    return (
      <React.Fragment>
          <CategoriesContainer
            changeCategoryHandle={changeCategoryHandle}
          />
          <SizesContainer
            categoryId={props.categoryId}
          />
          <ImagesContainer/>
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

export const AddProductContainer = connect(mapStateToProps, mapDispatchToProps)(AddProduct);
