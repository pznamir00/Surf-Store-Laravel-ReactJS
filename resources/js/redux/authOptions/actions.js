import types from './types';

const setWidth = (width) => ({
  type: types.WINDOW_WIDTH_SET,
  width
})

const actions = {
  setWidth
}

export default actions;
