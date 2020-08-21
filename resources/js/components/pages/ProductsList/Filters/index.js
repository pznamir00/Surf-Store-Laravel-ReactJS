import React, { useState, useEffect, useRef } from 'react';


const Filters = () => {

  const filterHtmlElement = useRef(document.getElementById('filters'));
  const firstRender = useRef(false);
  const [display, setDisplay] = useState(false);
  const enableFilters = () => setDisplay(true);
  const disabledFilters = () => setDisplay(false);

  useEffect(() => {
    if(firstRender.current){
      const newClassName = display ? 'scale-up-center' : 'scale-down-center';
      filterHtmlElement.current.setAttribute('class', newClassName);
      console.log('ppppl');
    } else firstRender.current = true;
  }, [display]);

  useEffect(() => document.getElementById('exit-btn').addEventListener('click', disabledFilters), []);

  return (
    <React.Fragment>
      {display &&
          <div id="cover" onClick={disabledFilters}></div>
      }
      <button className="btn btn-default ml-md-5" id="filter-button" onClick={enableFilters}><i className="fa fa-filter"></i>Filters</button>
    </React.Fragment>
  );
}

export default Filters;
