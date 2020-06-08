import React from 'react';

const LoaderHandle = () => {

  function removeLoader(){
    let loader = $('#loader-background');
    let newOpacity = loader.css('opacity') - 0.1;
    loader.css({opacity: newOpacity});
    if(newOpacity === 0){
      loader.remove();
    } else setTimeout(removeLoader, 20);
  }

  document.querySelector('body').onload = removeLoader;

  return (null);
}


export default LoaderHandle;
