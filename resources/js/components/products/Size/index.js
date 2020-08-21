import React, { Component } from 'react';
import Form from './Form';
import axios from 'axios';


export default class Sizes extends Component {

  constructor(props){
    super(props);
    this.state = {
      categoryId: null,
      availableSizes: [],
    };
  }

  static getDerivedStateFromProps(nextProps, prevState){
    if(nextProps.categoryId !== prevState.categoryId){
      return{
        categoryId: nextProps.categoryId,
      }
    }
  }

  componentDidUpdate(prevProps, prevState){
    if(prevState.categoryId !== this.state.categoryId){
      axios.get('/data/categories/' + this.state.categoryId + '/sizes')
      .then(result => result.data)
      .then(result => {
        this.setState({
          availableSizes: result
        })
      })
      .catch(err => console.log(err));
    }
  }

  render(){
    return(
      <Form availableSizes={this.state.availableSizes}/>
    );
  }
}
