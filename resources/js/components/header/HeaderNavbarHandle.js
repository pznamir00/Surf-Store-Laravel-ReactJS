import React from 'react';

const HeaderNavbarHandle = () => {

  window.onscroll = function(){
    var $navbar = $('#navbarSupportedContent');
    if(window.pageYOffset < 60){
      $navbar.css({top: '60px'});
    }
    else{
      $navbar.css({top: '0'});
    }

    console.log('scroll');
  }

  return (null);
}


export default HeaderNavbarHandle;
