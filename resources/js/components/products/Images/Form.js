import React, { Fragment } from 'react';

const Form = () => {
  return (
    <Fragment>
      <label htmlFor="dropzone">Images</label>
      <form action="/products/images/upload" method="POST" encType="multipart/form-data" className="dropzone mt-2" id="dropzone" files="true"></form>
    </Fragment>
  );
}

export default Form;
