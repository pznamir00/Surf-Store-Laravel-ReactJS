import types from './types';


const accountDeleteReducer = (state = { alert: false }, action) => {
  switch(action.type){
    case types.ALERT_SWITCH:
      return {
        ...state, alert: action.alert
      }
    default:
      return state
  }
}


export default accountDeleteReducer;
