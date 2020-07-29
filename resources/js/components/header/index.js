import React from 'react';
import { Loader } from './Loader';
import Sidebar from './Sidebar/index';
import './style.scss';


const Header = () => {
  return (
    <React.Fragment>
      <Sidebar/>
      <Loader/>
    </React.Fragment>
  );
}

export default Header;
