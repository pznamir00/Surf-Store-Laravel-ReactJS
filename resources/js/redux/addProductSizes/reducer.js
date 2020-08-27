import types from './types';


const initState = {
  availableSizes: []
}


const addProductSizesReducer = (state = initState, action) => {
  switch(action.type){
    case types.AVAILABLE_SIZES_INIT:
      return {
        ...state,
        availableSizes: action.availableSizes
      }
    default:
      return state
  }
}


export default addProductSizesReducer;
