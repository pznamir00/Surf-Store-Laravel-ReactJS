import types from './types';

const initImages = (names) => ({
  type: types.IMAGES_INIT,
  names
})

const setCurrentKey = (key) => ({
  type: types.CURRENT_KEY_SET,
  key
})

const setLeftKey = (key) => ({
  type: types.LEFT_KEY_SET,
  key
})

const setRightKey = (key) => ({
  type: types.RIGHT_KEY_SET,
  key
})

const actions = {
  initImages,
  setCurrentKey,
  setLeftKey,
  setRightKey
}

export default actions;
