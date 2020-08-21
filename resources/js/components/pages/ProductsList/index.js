import React from 'react';
import Filters from './Filters/index';
import RangeInputHandle from './RangeInputHandle/index';
import './style.scss';


const ProductsList = () => {
  return (
    <React.Fragment>
      <Filters/>
      <RangeInputHandle/>
    </React.Fragment>
  )
}

export default ProductsList;
