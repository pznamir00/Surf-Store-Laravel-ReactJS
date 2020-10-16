import React, { useEffect } from 'react';
import { AuthOptionsHandleContainer } from './AuthOptionsHandle';
import { CategoryHandleContainer } from './CategoryHandle';
import axios from 'axios';
import { connect } from 'react-redux'
import sidebarActions from '../../../redux/sidebar/actions'
import categoriesFetchedActions from '../../../redux/categoriesFetched/actions'
import $ from 'jquery';
import Hamburger from 'hamburger-react'



const Sidebar = (props) => {

  const sidebarRef = React.createRef();

  const move = () => {
    props._switch(!props.display)
  }

  useEffect(() => {
    (async () => {
      await axios.get('/api/categories')
      .then(res => res.data)
      .then(res => props.fetched(res))
      .catch(error => console.log(error));
    })()
  }, []);

  useEffect(() => {
    const $sidebar = $(sidebarRef.current);
    const r = props.display ? '0px' : '-400px';
    $sidebar.animate({ right: r }, 200);
    const cover = document.getElementById('cover');
    cover.style['display'] = props.display ? 'block' : 'none';

    const specialColor = $('.fa-search').css('color');
    $('.hamburger-react div').css({ background: `${props.display ? specialColor : '#333'} none repeat scroll 0% 0%` });

  }, [props.display]);

  return (
    <React.Fragment>
      <div id="cover" onClick={move}/>
      <Hamburger id="hamburger" toggled={props.display} toggle={move} />
      <nav id="sidebar" ref={sidebarRef}>
        <form method="GET" action="/products-list/keywords" className="form-inline d-flex justify-content-center md-form form-sm mt-0 search-panel" aria-label="Search">
          <i className="fa fa-search" aria-hidden="true"/>
          <input className="" name='keywords' type="text" placeholder="Search" aria-label="Search"/>
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
