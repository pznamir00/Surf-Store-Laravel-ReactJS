import types from './types';


const sizeSelectedReducer = (state = {selected: true}, action) => {
  switch(action.type){
    case types.SIZE_SELECTED:
      return {
        ...state,
        selected: action.selected
      }
    default:
      return state
  }
}


export default sizeSelectedReducer;
