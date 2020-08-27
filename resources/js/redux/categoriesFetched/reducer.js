import types from './types';


const categoriesFetchedReducer = (state = { categories: [] }, action) => {
  switch(action.type){
    case types.CATEGORIES_FETCHED:
      return {
        ...state,
        categories: action.categories
      }
    default:
      return state
  }
}


export default categoriesFetchedReducer;
