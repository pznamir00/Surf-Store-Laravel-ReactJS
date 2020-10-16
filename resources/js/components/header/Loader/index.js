import React, { useMemo } from 'react';
import $ from 'jquery';
import './style.scss';


export const Loader = () => {

  const loader = React.createRef();

  useMemo(() => window.onload = () => $(loader.current).fadeToggle())

  return (
    <div id="loader-background" ref={loader}>
      <i className="fa fa-spinner fa-spin"></i>
    </div>
  );
}
