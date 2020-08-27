import types from './types';

const _switch = (display) => ({
  type: types.DISPLAY_SWITCH,
  display
})

const actions = {
  _switch,
}

export default actions;
