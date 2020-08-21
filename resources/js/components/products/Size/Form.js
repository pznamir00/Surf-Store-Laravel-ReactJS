import React, { memo } from 'react';

const Form = memo(({ availableSizes }) => {
  const content = !document.querySelector('input[name="sub_category_id"]:checked') ?
  <strong className="mb-5"><i className="fa fa-info"></i>You must select category</strong> :
  <table className="table">
    <thead>
      <tr>
        <th>Number</th>
        <th>Value</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
      {availableSizes &&
        availableSizes.map((size, key) =>
        <tr key={key}>
          <td>{key+1}</td>
          <td>{size.value}</td>
          <td><input type="number" id={'size_input_'+size.id} name="sizesQuantity[]" className="form-control" min="0"/></td>
        </tr>
      )}
    </tbody>
  </table>

  return (
    <React.Fragment>
      <h4>Sizes</h4>
      <div>{content}</div>
    </React.Fragment>
  );
});

export default Form;
