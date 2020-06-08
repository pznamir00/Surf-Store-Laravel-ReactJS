import React from 'react';
import LoaderHandle from './LoaderHandle';
import HeaderNavbarHandle from './HeaderNavbarHandle';

const Header = () => {
  return (
    <React.Fragment>
      <HeaderNavbarHandle/>
      <LoaderHandle/>
    </React.Fragment>
  );
}


export default Header;
