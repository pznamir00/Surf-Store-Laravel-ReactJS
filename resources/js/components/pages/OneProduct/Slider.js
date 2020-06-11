import React, { Component } from 'react';



export default class Slider extends Component {

  constructor(props){
    super(props);
    this.state = {
      images: [],
      currentKey: null,
      leftKey: 0,
      rightKey: 0,
    };
  }

  componentDidMount(){
    var values = $('.slider-image').map(function() {
      return this.value;
    }).get();
    this.setState({
      images: values,
      currentKey: 0,
    });
  }

  componentDidUpdate(prevProps, prevState){
    if(prevState.currentKey !== this.state.currentKey){
      const leftKey = this.state.currentKey - 1 >= 0 ? this.state.currentKey - 1 : this.state.images.length - 1;
      const rightKey = this.state.currentKey + 1 <= this.state.images.length - 1 ? this.state.currentKey + 1 : 0;
      this.setState({
        leftKey: leftKey,
        rightKey: rightKey,
      });
    }
  }

  async select(e){
    const key = parseInt(e.target.dataset.key);
    console.log(e.target);
    await this.setState({
      currentKey: key
    });
  }

  render(){
    const currentPath = '/images/' + this.state.images[this.state.currentKey];
    return (
      <React.Fragment>

        <div className="main-slider-image" >
          <img src={currentPath} alt="Slider image"/>
          <div onClick={this.select.bind(this)}>
            <i className="fa fa-arrow-left" data-key={this.state.leftKey}></i>
          </div>
          <div onClick={this.select.bind(this)}>
            <i className="fa fa-arrow-right" data-key={this.state.rightKey}></i>
          </div>
        </div>

        {this.state.images.map((img, key) => {
          return (
            <img src={"/images/" + img} key={key} data-key={key} className="slider-image" onClick={this.select.bind(this)} alt="Slider image"/>
          )
        })}

      </React.Fragment>
    );
  }
}
