import types from './types';

const sizeIdSelect = (sizeId) => ({
  type: types.SIZE_ID_SELECT,
  sizeId
})

const setQuantity = (quantity) => ({
  type: types.QUANTITY_SET,
  quantity
})

const actions = {
  sizeIdSelect,
  setQuantity
}

export default actions;
