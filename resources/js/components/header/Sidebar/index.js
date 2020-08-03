import React, { useState, useEffect } from 'react';
import { AuthOptionsHandle } from './AuthOptionsHandle';
import { CategoryHandle } from './CategoryHandle';
import axios from 'axios';
import $ from 'jquery';


const Sidebar = () => {

  const [display, setDisplay] = useState(false);
  const [categories, setCategories] = useState([]);
  const move = () => setDisplay(!display);

  useEffect(() => {
    (async () => {
      await axios.get('/data/categories')
      .then(res => res.data)
      .then(res => setCategories(res))
      .catch(error => console.log(error));
    })()
  }, []);

  useEffect(() => {
    const $sb = $('#sidebar');
    const r = display ? '0px' : '-400px';
    $sb.animate({ right: r }, 200);
  }, [display]);

  return (
    <React.Fragment>
      <button id="hamburger" className="navbar-toggler" type="button" onClick={move}>
          <span className="fa fa-bars"></span>
      </button>
      <nav id="sidebar">
        <form method="GET" action="/products/search" className="form-inline d-flex justify-content-center md-form form-sm mt-3 mb-3 search-panel">
          <i className="fa fa-search" aria-hidden="true"></i>
          <input name="keywords" className="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search"/>
        </form>
        <AuthOptionsHandle/>
        <CategoryHandle categories={categories}/>
      </nav>
    </React.Fragment>
  );
}


export default Sidebar;
