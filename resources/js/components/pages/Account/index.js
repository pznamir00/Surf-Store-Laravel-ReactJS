import React, { useState, useEffect, useRef } from 'react';
import { DeleteButton } from './DeleteButton';
import { Alert } from './Alert';
import './style.scss';


const AccountDelete = () => {

  const [delAlert, setDelAlert] = useState(false);

  const nickname = useRef($('#nickname').html());

  const show = () => setDelAlert(true);
  const hide = () => setDelAlert(false);

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
      {delAlert &&
        <Alert
          nickname={nickname.current}
          focusOut={hide}
          submitHandle={submitHandle}
        />
      }
    </React.Fragment>
  );
}


export default AccountDelete;
