import React from 'react';


export const OrderInputHandle = () => {
  var selectedId = document.querySelector('input[name="instance-id"]').value;
  var inputToMark = document.querySelector('input[type="radio"][value="' + selectedId + '"]');
  inputToMark.setAttribute('checked', true);
  return (
    null
  );
}
