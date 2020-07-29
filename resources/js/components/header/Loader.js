import React from 'react';
import $ from 'jquery';

export const Loader = () => {
  window.onload = () => {
    $('#loader-background').fadeToggle();
  }
  return (
    <div id="loader-background">
      <div className="loader"></div>
    </div>
  );
}
