import React from 'react';


const Form = (props) => {
  return (
    <React.Fragment>
      <label for="size-table" class="mb-3">Sizes</label>
      <table id="size-table" className="table table mb-5">
        <thead>
          <tr>
            <th></th>
            <th>Value</th>
            <th>Quantity</th>
          </tr>
        </thead>
        <tbody>
          { Object.entries(props.sizes).map((size,key) =>
            <tr key={key} onChange={props.update}>
              <td>{key + 1}</td>
              <td><input className="form-control" data-title={size[0]} type="text" value={size[1].val} name="size_values[]"/></td>
              <td><input className="form-control" data-title={size[0]} type="number" value={size[1].qty} name="size_quantities[]" min="1"/></td>
              <td><button className="form-control" data-title={size[0]} type="button" onClick={props.removeRow}>Remove</button></td>
            </tr>
          )}
          <tr>
            <td><button className="form-control" onClick={props.addRow} type="button">Add</button></td>
          </tr>
        </tbody>
      </table>
    </React.Fragment>
  );
}

export default Form;
