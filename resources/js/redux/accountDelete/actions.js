import types from './types';

const _switch = (alert) => ({
  type: types.ALERT_SWITCH,
  alert
})

const actions = {
  _switch
}

export default actions;
