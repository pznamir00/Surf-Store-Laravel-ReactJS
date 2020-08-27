import types from './types';


const passwordValidatorReducer = (state = {valid: false}, action) => {
  switch(action.type){
    case types.PASSWORD_VALIDATOR_SWITCH:
      return {
        ...state, valid: action.valid
      }
    default:
      return state
  }
}


export default passwordValidatorReducer;
