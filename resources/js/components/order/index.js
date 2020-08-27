import React, { memo } from 'react';


export const OrderInputHandle = memo(() => {
  const selectedId = document.querySelector('input[name="instance-id"]').value;
  const inputToMark = document.querySelector('input[type="radio"][value="' + selectedId + '"]');
  inputToMark.setAttribute('checked', true);
  return null;
});
