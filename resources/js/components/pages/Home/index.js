import React from 'react';
import axios from 'axios';
import 'react-slideshow-image/dist/styles.css';
import { Fade } from 'react-slideshow-image';


export default class HomeSlider extends React.Component {
  constructor(props){
    super(props);
    this.state = {
      currentImageIndex: 0,
      files: []
    }
  }

  componentDidMount(){
    const _this = this;
    axios.get('/api/images/catalog')
    .then(res => res.data)
    .then(res => {
      let files = [];
      let filenames = res.splice(2);
      filenames.forEach(filename => {
        files.push('media/catalog/' + filename);
      })
      _this.setState({
        files: files
      })
    })
    .catch(err => console.log(err));
  }

  render(){
    return (
      <div className="slide-container">
        <Fade>
          {this.state.files.map((file, key) =>
            <div className="each-fade" key={key}>
              <div className="image-container">
                <img src={file} />
              </div>
            </div>
          )}
        </Fade>
      </div>
    )
  }
}
