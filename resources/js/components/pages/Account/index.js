import React, { useEffect, useRef } from 'react';
import { DeleteButton } from './DeleteButton';
import { Alert } from './Alert';
import { connect } from 'react-redux'
import actions from '../../../redux/accountDelete/actions'
import './style.scss';


const AccountDelete = (props) => {

  const nickname = useRef($('#nickname').html());
  const show = () => props._switch(true);
  const hide = () => props._switch(false);

  const submitHandle = e => {
    const { nick } = e.target;
    if(nick.value !== nickname.current){
      e.preventDefault();
    }
  }

  return (
    <React.Fragment>
      <DeleteButton
        buttonHandle={show}
      />
      {props.alert &&
        <Alert
          nickname={nickname.current}
          focusOut={hide}
          submitHandle={submitHandle}
        />
      }
    </React.Fragment>
  );
}


const mapStateToProps = (state) => {
  return {
    alert: state.accountDelete.alert
  }
}

const mapDispatchToProps = (dispatch) => ({
    _switch: alert => dispatch(actions._switch(alert))
})

export const AccountDeleteContainer = connect(mapStateToProps, mapDispatchToProps)(AccountDelete);
