import React from 'react';
import { FiltersContainer } from './Filters/index';
import { RangeInputHandleContainer } from './RangeInputHandle/index';
import './style.scss';


const ProductsList = () => {
  return (
    <React.Fragment>
      <FiltersContainer/>
      <RangeInputHandleContainer/>
    </React.Fragment>
  )
}

export default ProductsList;
