import types from './types';


const cartReducer = (state = { sizeId: null, quantity: 0 }, action) => {
  switch(action.type){
    case types.SIZE_ID_SELECT:
      return {
        ...state, sizeId: action.sizeId
      }
    case types.QUANTITY_SET:
      return {
        ...state, quantity: action.quantity
      }
    default:
      return state
  }
}


export default cartReducer;
