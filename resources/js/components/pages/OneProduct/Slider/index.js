import React, { Component } from 'react';
import { connect } from 'react-redux';
import actions from '../../../../redux/slider/actions'



class Slider extends Component {

  constructor(props){
    super(props);
    this.select = this.select.bind(this);
  }

  componentDidMount(){
    let names = $('.slider-image').map(function(){ return this.value }).get();
    this.props.initImages(names);
    this.props.setCurrentKey(0);
  }

  componentDidUpdate(prevProps){
    if(prevProps.currentKey !== this.props.currentKey){
      const leftKey = this.props.currentKey - 1 >= 0 ? this.props.currentKey - 1 : this.props.imageNames.length - 1;
      const rightKey = this.props.currentKey + 1 <= this.props.imageNames.length - 1 ? this.props.currentKey + 1 : 0;
      this.props.setLeftKey(leftKey);
      this.props.setRightKey(rightKey);
    }
  }

  async select(e){
    const key = parseInt(e.target.dataset.key);
    await this.props.setCurrentKey(key);
  }

  render(){
    const currentImagePath = '/media/products/' + this.props.imageNames[this.props.currentKey];
    return (
      <React.Fragment>
	      <div className="mb-5 pb-5">
          <div className="main-slider-image" >
            <img src={currentImagePath} alt="Slider image"/>
            <div onClick={this.select}>
              <i className="fa fa-arrow-left" data-key={this.props.leftKey}></i>
            </div>
            <div onClick={this.select}>
              <i className="fa fa-arrow-right" data-key={this.props.rightKey}></i>
            </div>
          </div>
          {this.props.imageNames.map((imgName, key) =>
            <img src={"/media/products/" + imgName} key={key} data-key={key} className="slider-image" onClick={this.select} alt="Slider image"/>
          )}
	      </div>
      </React.Fragment>
    );
  }
}




const mapStateToProps = (state) => {
  return {
    imageNames: state.slider.imageNames,
    currentKey: state.slider.currentKey,
    leftKey: state.slider.leftKey,
    rightKey: state.slider.rightKey
  }
}

const mapDispatchToProps = (dispatch) => ({
    initImages: imgNames => dispatch(actions.initImages(imgNames)),
    setCurrentKey: key => dispatch(actions.setCurrentKey(key)),
    setLeftKey: key => dispatch(actions.setLeftKey(key)),
    setRightKey: key => dispatch(actions.setRightKey(key))
})

export const SliderContainer = connect(mapStateToProps, mapDispatchToProps)(Slider);
