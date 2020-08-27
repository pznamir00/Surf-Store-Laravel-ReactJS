import React, { useEffect } from 'react';
import { connect } from 'react-redux'
import actions from '../../../redux/sidebarCategorySelected/actions'
import $ from 'jquery';


const CategoryHandle = props => {

  const categoryClickHandle = e => {
    const { title_key } = e.target.dataset;
    const newCatId = props.categoryId === title_key ? null : title_key;
    props.select(newCatId);
  }

  useEffect(() => {
    $('.s_category div').slideUp();
    if(props.categoryId){
      $('.s_category div[data-list_key="'+props.categoryId+'"]').slideDown();
    }
  });

  return (
    <div id="sidebar-categories">
      {props.categories.map((cat, key) =>
        <div key={key} className="s_category">
          <h6 data-title_key={key} onClick={categoryClickHandle}>{cat.title}</h6>
          <div data-list_key={key}>
            {cat.subcategories.map((sCat, sKey) =>
              <a href={"/products-list/categories/"+cat.slug+"/"+sCat.slug} key={sKey}>{sCat.title}</a>
            )}
          </div>
        </div>
      )}
    </div>
  );
}





const mapStateToProps = (state) => {
  return {
    categoryId: state.sidebarCategorySelected.categoryId,
  }
}

const mapDispatchToProps = (dispatch) => ({
  select: categoryId => dispatch(actions.select(categoryId))
})

export const CategoryHandleContainer = connect(mapStateToProps, mapDispatchToProps)(CategoryHandle);
