import types from './types';


const categorySelectedReducer = (state = {categoryId: 1}, action) => {
  switch(action.type){
    case types.CATEGORY_CHANGE:
      return {
        ...state,
        categoryId: action.selected
      }
    default:
      return state
  }
}


export default categorySelectedReducer;
