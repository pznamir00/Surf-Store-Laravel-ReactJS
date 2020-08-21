import React, { useState, useEffect, memo } from 'react';
import axios from 'axios';

const Categories = memo(({ changeCategoryHandle }) => {
  const [categories, setCategories] = useState(null);
  useEffect(() => {
    axios.get('/data/categories')
    .then(result => result.data)
    .then(result => setCategories(result))
    .catch(error => console.log(error));
  }, []);

  return (
    <div className="mt-5 mb-5">
      <h5>Category</h5>
      {categories && categories.map((category, key) =>
        <div key={key}>
          <strong>{category.title}</strong>
          {category.subcategories.map((subcategory, subkey) =>
            <div key={subkey}>
              <input type="radio" id={"subcategory_" + subcategory.id} value={subcategory.id} onChange={changeCategoryHandle} name="sub_category_id"/>
              <label htmlFor={"subcategory_" + subcategory.id}>{subcategory.title}</label>
            </div>
          )}
        </div>
      )}
    </div>
  );
});

export default Categories;
