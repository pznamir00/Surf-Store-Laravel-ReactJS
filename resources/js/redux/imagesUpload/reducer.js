import types from './types';


const initState = {
  dropzone: null,
  token: $('meta[name="csrf-token"]').attr('content')
}


const imagesUploadReducer = (state = initState, action) => {
  switch(action.type){
    case types.DROPZONE_INIT:
      return {
        ...state,
        dropzone: action.dropzone
      }
    default:
      return state
  }
}


export default imagesUploadReducer;
