import types from './types';

const initDZ = (dropzone) => ({
  type: types.DROPZONE_INIT,
  dropzone
})

const actions = {
  initDZ
}

export default actions;
