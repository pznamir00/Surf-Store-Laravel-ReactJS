import types from './types';

const change = (selected) => ({
  type: types.CATEGORY_CHANGE,
  selected
})

const actions = {
  change
}

export default actions;
