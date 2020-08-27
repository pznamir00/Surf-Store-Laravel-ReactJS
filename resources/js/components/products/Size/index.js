import React, { Component } from 'react';
import Form from './Form';
import axios from 'axios';
import { connect } from 'react-redux'
import actions from '../../../redux/addProductSizes/actions'



export default class Sizes extends Component {

  constructor(props){
    super(props);
  }

  componentDidUpdate(prevProps){
    if(prevProps.categoryId !== this.props.categoryId){
      axios.get('/data/categories/' + this.props.categoryId + '/sizes')
      .then(result => result.data)
      .then(result => this.props.init(result))
      .catch(err => console.log(err));
    }
  }

  render(){
    return(
      <Form availableSizes={this.props.availableSizes}/>
    );
  }
}



const mapStateToProps = (state) => {
  return {
    availableSizes: state.addProductSizes.availableSizes
  }
}

const mapDispatchToProps = (dispatch) => ({
    init: availableSizes => dispatch(actions.init(availableSizes))
})

export const SizesContainer = connect(mapStateToProps, mapDispatchToProps)(Sizes);
