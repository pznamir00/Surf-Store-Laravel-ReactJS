import React, { useState, useEffect, memo } from 'react';
import $ from 'jquery';


export const CategoryHandle = memo(({categories}) => {

  const [selectedCatId, setSelectedCatId] = useState(null);

  const catClickHandle = e => {
    const { title_key } = e.target.dataset;
    const newCatId = selectedCatId === title_key ? null : title_key;
    setSelectedCatId(newCatId);
  }

  useEffect(() => {
    $('.s_category div').slideUp();
    if(selectedCatId){
      $('.s_category div[data-list_key="'+selectedCatId+'"]').slideDown();
    }
  });

  return (
    <div id="sidebar-categories">
      {categories.map((cat, key) =>
        <div key={key} className="s_category">
          <h6 data-title_key={key} onClick={catClickHandle}>{cat.title}</h6>
          <div data-list_key={key}>
            {cat.subcategories.map((sCat, sKey) =>
              <a href={"/products/"+cat.title+"/"+sCat.title} key={sKey}>{sCat.title}</a>
            )}
          </div>
        </div>
      )}
    </div>
  );
});
