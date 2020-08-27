import types from './types';


const sidebarCategorySelectedReducer = (state = { categoryId: null }, action) => {
  switch(action.type){
    case types.CATEGORY_ID_SELECT:
      return {
        ...state, categoryId: action.categoryId
      }
    default:
      return state
  }
}


export default sidebarCategorySelectedReducer;
