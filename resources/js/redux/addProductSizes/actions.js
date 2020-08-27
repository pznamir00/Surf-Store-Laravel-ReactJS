import types from './types';

const init = (availableSizes) => ({
  type: types.AVAILABLE_SIZES_INIT,
  availableSizes
})

const actions = {
  init
}

export default actions;
