import React, { useEffect, useRef, memo } from 'react';
import { connect } from 'react-redux'
import actions from '../../../redux/authOptions/actions'
const bootstrapLargeGrid = 992;



const AuthOptionsHandle = props => {

  const panel = useRef($('#header-options').html());
  useEffect(() => {
    $(window).resize(() => props.setWidth($(window).width()))
  }, []);


  if(props.width && props.width < bootstrapLargeGrid)
    return <div dangerouslySetInnerHTML={{ __html: panel.current }}></div>;
  else
    return null;
}


const mapStateToProps = (state) => {
  return {
    width: state.authOptions.width
  }
}

const mapDispatchToProps = (dispatch) => ({
    setWidth: width => dispatch(actions.setWidth(width))
})

export const AuthOptionsHandleContainer = connect(mapStateToProps, mapDispatchToProps)(AuthOptionsHandle);
