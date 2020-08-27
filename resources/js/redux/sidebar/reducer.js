import types from './types';


const sidebarReducer = (state = { display: false }, action) => {
  switch(action.type){
    case types.DISPLAY_SWITCH:
      return {
        ...state, display: action.display
      }
    default:
      return state
  }
}


export default sidebarReducer;
