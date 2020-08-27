import React from 'react';
import { Loader } from './Loader/index';
import { SidebarContainer } from './Sidebar/index';
import './style.scss';


const Header = () => {
  return (
    <React.Fragment>
      <SidebarContainer/>
      <Loader/>
    </React.Fragment>
  );
}

export default Header;
