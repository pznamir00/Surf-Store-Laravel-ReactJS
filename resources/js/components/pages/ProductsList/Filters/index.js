import React, { useState, useEffect, useRef } from 'react';
import { connect } from 'react-redux'
import actions from '../../../../redux/filter/actions'


const Filters = props => {

  const filterHtmlElement = useRef(document.getElementById('filters'));
  const firstRender = useRef(false);
  const enableFilters = () => props._switch(true);
  const disabledFilters = () => props._switch(false);

  useEffect(() => {
    if(firstRender.current){
      const newClassName = props.display ? 'scale-up-center' : 'scale-down-center';
      filterHtmlElement.current.setAttribute('class', newClassName);
    } else firstRender.current = true;
  }, [props.display]);

  useEffect(() => document.getElementById('exit-btn').addEventListener('click', disabledFilters), []);

  return (
    <React.Fragment>
      {props.display &&
          <div id="cover" onClick={disabledFilters}></div>
      }
      <button className="btn btn-default ml-md-5" id="filter-button" onClick={enableFilters}><i className="fa fa-filter"></i>Filters</button>
    </React.Fragment>
  );
}

const mapStateToProps = (state) => {
  return {
    display: state.filter.display
  }
}

const mapDispatchToProps = (dispatch) => ({
    _switch: display => dispatch(actions._switch(display))
})

export const FiltersContainer = connect(mapStateToProps, mapDispatchToProps)(Filters);
