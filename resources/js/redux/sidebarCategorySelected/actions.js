import types from './types';

const select = (categoryId) => ({
  type: types.CATEGORY_ID_SELECT,
  categoryId
})

const actions = {
  select
}

export default actions;
