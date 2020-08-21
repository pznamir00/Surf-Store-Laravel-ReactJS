import React, { useState, useEffect } from 'react';

const Register = () => {

  const [valid, setValid] = useState(false);

  useEffect(() => {
    $('.p-input').on('keyup', () => {
      const pass = $('#password').val();
      const passConf = $('#password-confirm').val();
      if(pass.length >= 8 && (!/^[a-z]+$/i.test(pass) && !/^[0-9]+$/i.test(pass)) && pass === passConf){
        setValid(true);
      } else {
        setValid(false);
      }
    });
  }, []);

  if(valid){
    return (
      <small className="text-success"><i className="fa fa-check"></i>Password is valid</small>
    )
  } else {
    return (
      <small className="text-danger"><i className="fa fa-times"></i>Password is not valid</small>
    )
  }
}


export default Register;
