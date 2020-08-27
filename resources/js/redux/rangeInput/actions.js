import types from './types';

const change = (input) => ({
  type: types.INPUT_CHANGE,
  input
})

const actions = {
  change
}

export default actions;
