import React, { useEffect } from 'react';
import axios from 'axios';
import { connect } from 'react-redux'
import actions from '../../../redux/categoriesFetched/actions'


const Categories = props => {
  useEffect(() => {
    axios.get('/categories')
    .then(result => result.data)
    .then(result => props.fetched(result))
    .catch(error => console.log(error));
  }, []);

  return (
    <div className="mt-5 mb-5">
      <h5>Category</h5>
      {props.categories && props.categories.map((category, key) =>
        <div key={key}>
          <strong>{category.title}</strong>
          {category.subcategories.map((subcategory, subkey) =>
            <div key={subkey}>
              <input type="radio" id={"subcategory_" + subcategory.id} value={subcategory.id} onChange={props.changeCategoryHandle} name="sub_category_id"/>
              <label htmlFor={"subcategory_" + subcategory.id}>{subcategory.title}</label>
            </div>
          )}
        </div>
      )}
    </div>
  );
}



const mapStateToProps = (state) => {
  return {
    categories: state.categoriesFetched.categories
  }
}

const mapDispatchToProps = (dispatch) => ({
    fetched: categories => dispatch(actions.fetched(categories))
})

export const CategoriesContainer = connect(mapStateToProps, mapDispatchToProps)(Categories);
