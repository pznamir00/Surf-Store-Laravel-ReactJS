import React, { useState, useEffect, useRef, memo } from 'react';
const bootstrapLargeGrid = 992;


export const AuthOptionsHandle = memo(() => {
  const panel = useRef($('#header-options').html());
  const [width, setWidth] = useState($(window).width());

  useEffect(() => {
    $(window).resize(() => setWidth($(window).width()));
  }, []);

  if(width && width < bootstrapLargeGrid)
    return <div dangerouslySetInnerHTML={{ __html: panel.current }}></div>;
  else
    return null;
});
