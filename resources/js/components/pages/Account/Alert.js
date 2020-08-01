import React from 'react';

export const Alert = (props) => {
  return (
    <React.Fragment>
      <div onClick={props.focusOut} id="cover"></div>
      <form id="delete-account-confirm-form" onSubmit={props.submitHandle} method="POST" action="/home/account/close">
        <input type="hidden" name="_token" value={$('meta[name="csrf-token"]').attr('content')}/>
        <span className="float-right" onClick={props.focusOut}><i className="fa fa-window-close"></i></span>
        <p>Write your nickname to confirm: <b>{props.nickname}</b></p>
        <input className="form-control mt-2" name="nick" type="text"/>
        <button className="btn btn-danger ml-auto mr-auto mt-2" type="submit">Delete</button>
      </form>
    </React.Fragment>
  );
}
