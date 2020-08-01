import React from 'react';

export const DeleteButton = ({buttonHandle}) => {
  return (
    <button className="btn btn-danger" onClick={buttonHandle}>Delete your account</button>
  );
}
