import React, { useEffect } from 'react';
import { AuthOptionsHandleContainer } from './AuthOptionsHandle';
import { CategoryHandleContainer } from './CategoryHandle';
import axios from 'axios';
import { connect } from 'react-redux'
import sidebarActions from '../../../redux/sidebar/actions'
import categoriesFetchedActions from '../../../redux/categoriesFetched/actions'
import $ from 'jquery';



const Sidebar = (props) => {

  const sidebarRef = React.createRef();

  const move = () => {
    props._switch(!props.display)
  }

  useEffect(() => {
    (async () => {
      await axios.get('/data/categories')
      .then(res => res.data)
      .then(res => props.fetched(res))
      .catch(error => console.log(error));
    })()
  }, []);

  useEffect(() => {
    const $sidebar = $(sidebarRef.current);
    const r = props.display ? '0px' : '-400px';
    $sidebar.animate({ right: r }, 200);
  }, [props.display]);

  return (
    <React.Fragment>
      <button id="hamburger" className="navbar-toggler" type="button" onClick={move}>
          <span className="fa fa-bars"></span>
      </button>
      <nav id="sidebar" ref={sidebarRef}>
        <form method="GET" action="/products/search" className="form-inline d-flex justify-content-center md-form form-sm mt-3 mb-3 search-panel">
          <i className="fa fa-search" aria-hidden="true"></i>
          <input name="keywords" className="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search"/>
        </form>
        <AuthOptionsHandleContainer/>
        <CategoryHandleContainer
          categories={props.categories}
        />
      </nav>
    </React.Fragment>
  );
}




const mapStateToProps = (state) => {
  return {
    display: state.sidebar.display,
    categories: state.categoriesFetched.categories
  }
}

const mapDispatchToProps = (dispatch) => ({
    _switch: display => dispatch(sidebarActions._switch(display)),
    fetched: categories => dispatch(categoriesFetchedActions.fetched(categories))
})

export const SidebarContainer = connect(mapStateToProps, mapDispatchToProps)(Sidebar);
