import types from './types';

const fetched = (categories) => ({
  type: types.CATEGORIES_FETCHED,
  categories
})

const actions = {
  fetched
}

export default actions;
