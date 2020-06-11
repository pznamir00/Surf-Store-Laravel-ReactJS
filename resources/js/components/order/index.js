import React from 'react';


const OrderInputHandle = () => {

  var $selectedId = $('input[name="instance-id"]').val();
  var $inputToMark = $('input[type="radio"][value="' + $selectedId + '"]');
  $inputToMark.attr('checked', true);
  return null;
}


export default OrderInputHandle;
