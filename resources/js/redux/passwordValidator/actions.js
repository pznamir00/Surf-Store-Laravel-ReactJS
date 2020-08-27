import types from './types';

const _switch = (valid) => ({
  type: types.PASSWORD_VALIDATOR_SWITCH,
  valid
})

const actions = {
  _switch
}

export default actions;
