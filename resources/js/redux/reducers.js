import { combineReducers } from 'redux'
import passwordValidatorReducer from './passwordValidator/reducer'
import sidebarReducer from './sidebar/reducer'
import authOptionsReducer from './authOptions/reducer'
import cartReducer from './cart/reducer'
import accountDeleteReducer from './accountDelete/reducer'
import filterReducer from './filter/reducer'
import rangeInputReducer from './rangeInput/reducer'
import sizeSelectedReducer from './sizeSelected/reducer'
import sliderReducer from './slider/reducer'
import categorySelectedReducer from './categorySelected/reducer'
import categoriesFetchedReducer from './categoriesFetched/reducer'
import imagesUploadReducer from './imagesUpload/reducer'
import addProductSizesReducer from './addProductSizes/reducer'
import sidebarCategorySelectedReducer from './sidebarCategorySelected/reducer'



const reducers = combineReducers({
  passwordValidator: passwordValidatorReducer,
  sidebar: sidebarReducer,
  authOptions: authOptionsReducer,
  cart: cartReducer,
  accountDelete: accountDeleteReducer,
  filter: filterReducer,
  rangeInput: rangeInputReducer,
  sizeSelected: sizeSelectedReducer,
  slider: sliderReducer,
  categorySelected: categorySelectedReducer,
  categoriesFetched: categoriesFetchedReducer,
  imagesUpload: imagesUploadReducer,
  addProductSizes: addProductSizesReducer,
  sidebarCategorySelected: sidebarCategorySelectedReducer
});



export default reducers;
