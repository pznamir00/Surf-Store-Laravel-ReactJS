import React, { Fragment } from 'react';

const Form = () => {
  return (
    <Fragment>
      <label className="mt-5" htmlFor="dropzone">Images</label>
      <form action="/products/images" method="POST" encType="multipart/form-data" className="dropzone mt-2" id="dropzone" files="true"></form>
    </Fragment>
  );
}

export default Form;
