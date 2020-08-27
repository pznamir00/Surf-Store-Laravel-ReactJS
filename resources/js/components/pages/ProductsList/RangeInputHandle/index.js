import React, { useEffect } from 'react'
import { connect } from 'react-redux'
import actions from '../../../../redux/rangeInput/actions'



const RangeInputHandle = (props) => {

  useEffect(() => {
    const inputsArray = [...document.querySelectorAll('input[type="range"]')];
    inputsArray.forEach(function(input){
      input.addEventListener('change', (e) => props.change({
        name: e.target.name,
        value: e.target.value
      }))
    });
  }, []);

  useEffect(() => {
    if(props.name !== ""){
      const span = document.getElementById(props.name);
      span.innerHTML = props.value;
    }
  }, [props.name]);

  return (null);
}


const mapStateToProps = (state) => {
  return {
    name: state.rangeInput.name,
    value: state.rangeInput.value
  }
}

const mapDispatchToProps = (dispatch) => ({
    change: input => dispatch(actions.change(input))
})

export const RangeInputHandleContainer = connect(mapStateToProps, mapDispatchToProps)(RangeInputHandle);
