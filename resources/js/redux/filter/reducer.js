import types from './types';


const filterReducer = (state = { display: false }, action) => {
  switch(action.type){
    case types.FILTER_DISPLAY_SWITCH:
      return {
        ...state, display: action.display
      }
    default:
      return state
  }
}


export default filterReducer;
