import types from './types';

const select = (selected) => ({
  type: types.SIZE_SELECTED,
  selected
})

const actions = {
  select
}

export default actions;
