import types from './types';


const initState = {
  imageNames: [],
  currentKey: null,
  leftKey: 0,
  rightKey: 0,
}


const sliderReducer = (state = initState, action) => {
  switch(action.type){
    case types.IMAGES_INIT:
      return {
        ...state,
        imageNames: action.names
      }
    case types.CURRENT_KEY_SET:
      return {
        ...state, currentKey: action.key
      }
    case types.LEFT_KEY_SET:
      return {
        ...state, leftKey: action.key
      }
    case types.RIGHT_KEY_SET:
      return {
        ...state, rightKey: action.key
      }
    default:
      return state
  }
}


export default sliderReducer;
