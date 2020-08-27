import types from './types';


const rangeInputReducer = (state = { name: "", value: "" }, action) => {
  switch(action.type){
    case types.INPUT_CHANGE:
      return {
        ...state,
        name: action.input.name,
        value: action.input.value
      }
    default:
      return state
  }
}


export default rangeInputReducer;
