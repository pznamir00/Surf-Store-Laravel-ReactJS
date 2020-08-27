import React, { useMemo } from 'react'
import { connect } from 'react-redux'
import actions from '../../../redux/passwordValidator/actions'
import $ from 'jquery';


const Register = (props) => {

  useMemo(() => {
    [...document.querySelectorAll('.p-input')].forEach(input => {
      input.addEventListener('keyup', function(){
        const pass = document.getElementById('password').value;
        const passConfirm = document.getElementById('password-confirm').value;
        const validValue = (pass.length >= 8 && (!/^[a-z]+$/i.test(pass) && !/^[0-9]+$/i.test(pass)) && pass === passConfirm);
        props._switch(validValue);
      })
    })
  }, [])

  if(props.valid){
    return (
      <small className="text-success"><i className="fa fa-check"></i>Password is valid</small>
    )
  } else {
    return (
      <small className="text-danger"><i className="fa fa-times"></i>Password is not valid</small>
    )
  }
}



const mapStateToProps = (state) => {
  return {
    valid: state.passwordValidator.valid
  }
}

const mapDispatchToProps = (dispatch) => ({
    _switch: valid => dispatch(actions._switch(valid))
})

export const RegisterContainer = connect(mapStateToProps, mapDispatchToProps)(Register);
