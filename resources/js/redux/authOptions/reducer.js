import types from './types';


const authOptionsReducer = (state = { width: $(window).width() }, action) => {
  switch(action.type){
    case types.WINDOW_WIDTH_SET:
      return {
        ...state, width: action.width
      }
    default:
      return state
  }
}


export default authOptionsReducer;
