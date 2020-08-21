import React, { useState, useEffect } from 'react';


const RangeInputHandle = () => {

  const [input, setInput] = useState({
    name: "",
    value: "",
  });

  useEffect(() => {
    var inputsArray = [...document.querySelectorAll('input[type="range"]')];
    inputsArray.forEach(function(input){
      input.addEventListener('change', (e) => setInput({
        name: e.target.name,
        value: e.target.value,
      }))
    });
  }, []);

  useEffect(() => {
    if(input.name !== ""){
      const span = document.getElementById(input.name);
      span.innerHTML = input.value;
    }
  }, [input]);

  return (null);
}

export default RangeInputHandle;
