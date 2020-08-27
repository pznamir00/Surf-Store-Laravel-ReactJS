import React from 'react';
import { SliderContainer } from './Slider/index';
import AddToCartButton from './AddToCartButton/index';
import { connect } from 'react-redux'
import actions from '../../../redux/sizeSelected/actions'
import './style.scss';




const OneProductForm = (props) => {

  //default props.selected is true, that displays no errors
  const submitHandle = e => {
    if(!document.querySelector('input[name="size_id"]:checked')){
      e.preventDefault();
      props.select(false);
    }
  }

  return (
    <React.Fragment>
      <SliderContainer/>
      <AddToCartButton
        selected={props.selected}
        submitHandle={submitHandle}
      />
    </React.Fragment>
  );
}




const mapStateToProps = (state) => {
  return {
    selected: state.sizeSelected.selected
  }
}

const mapDispatchToProps = (dispatch) => ({
    select: selected => dispatch(actions.select(selected))
})

export const OneProductFormContainer = connect(mapStateToProps, mapDispatchToProps)(OneProductForm);
