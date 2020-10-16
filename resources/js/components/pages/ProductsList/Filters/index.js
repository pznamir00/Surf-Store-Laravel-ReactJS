import React from 'react';
import axios from 'axios';
import $ from 'jquery';
import { RangeSlider } from 'reactrangeslider';




export default class Filters extends React.Component {

  constructor(props){
    super(props);
    this.state = {
      isDisplayed: false,
      urlParams: {},
      sizes: [],
      producents: [],
      colors: [],
      sorts: [],
      filtersElement: React.createRef()
    }
    this.getParamsFromUrl = this.getParamsFromUrl.bind(this);
    this.fetchData = this.fetchData.bind(this);
    this.switchDisplayed = this.switchDisplayed.bind(this);
  }

  componentDidMount(){
    this.getParamsFromUrl();
    this.fetchData()
  }

  componentDidUpdate(prevProps, prevState){
    if(prevState.isDisplayed !== this.state.isDisplayed){
      const elem = this.state.filtersElement.current;
      elem.style.display = this.state.isDisplayed ? 'block' : 'none';
    }
  }

  async switchDisplayed(){
    await this.setState({
      isDisplayed: !this.state.isDisplayed
    })
  }

  fetchData(){
    const _this = this;
    axios.get('/api/colors').then(res => res.data).then(res => _this.setState({ colors: res })).catch(error => console.log(error));
    axios.get('/api/producents').then(res => res.data).then(res => _this.setState({ producents: res })).catch(error => console.log(error));
    axios.get('/api/sorts').then(res => res.data).then(res => _this.setState({ sorts: res })).catch(error => console.log(error));
    const subcatId = document.getElementById('subcat_id').value;
    if(subcatId){
      axios.get(`/api/categories/${subcatId}/sizes`).then(res => res.data).then(res => _this.setState({ sizes: res })).catch(error => console.log(error));
    } else {
      axios.get('/api/sizes').then(res => res.data).then(res => _this.setState({ sizes: res })).catch(error => console.log(error));
    }
  }

  getParamsFromUrl(){
    const url = document.URL;
    var params = {};
    var parser = document.createElement('a');
    parser.href = url;
    var query = parser.search.substring(1);
    var vars = query.split('&');
    for (let i = 0; i < vars.length; i++) {
      let pair = vars[i].split('=');
      params[pair[0]] = decodeURIComponent(pair[1]);
    }
    if(params[""] === 'undefined')
      params = {};
    this.setState({
      urlParams: params
    })
  }

  onChange(){}

  render(){
    return (
      <div>
        <button type="button" className="btn btn-default" onClick={this.switchDisplayed}>Filters</button>
        <div id="cover" ref={this.state.filtersElement}>
          <div id="filters_e">
            <div className="filter-header">
              <i id="exit-btn" onClick={this.switchDisplayed} className="fa fa-times float-right"/>
              <h2>Filters</h2>
            </div>
            <hr/>
            <form method="GET">
              {this.state.urlParams.keywords &&
                <input type="hidden" name="keywords" value={this.state.urlParams.keywords} />
              }
              <div className="form-group">
                <label>
                  Price
                  <div className="mt-3">
                    <p className="d-inline-block">From <input type="number" className="form-control" defaultValue={this.state.urlParams.price_as} name="price_as"/></p>
                    <p className="d-inline-block ml-1">To <input type="number" className="form-control" defaultValue={this.state.urlParams.price_to} name="price_to"/></p>
                  </div>
                </label>
              </div>
              <div className="form-group">
                <label>
                  Color
                  <select className="form-control" name="color">
                    {this.state.colors.map((color, key) =>
                      <option key={key} value={color.name} selected={color.name === this.state.urlParams.color}>{color.name}</option>
                    )}
                  </select>
                </label>
              </div>
              <div className="form-group">
                <label>
                  Producent
                  <select className="form-control" name="producent">
                    {this.state.producents.map((producent, key) =>
                      <option key={key} value={producent.name} selected={producent.name === this.state.urlParams.producent}>{producent.name}</option>
                    )}
                  </select>
                </label>
              </div>
              <div className="form-group">
                <label className="mt-3">
                  Sort by
                  <select className="form-control" name="order_by">
                    {Object.entries(this.state.sorts).map((sort, key) =>
                      <option key={key} value={sort[0]} selected={sort[0] === this.state.urlParams.order_by}>{sort[1]}</option>
                    )}
                  </select>
                </label>
              </div>
              <hr/>
              <button type="submit" className="btn btn-default">
                <i className="fa fa-filter"/>
                Filter
              </button>
            </form>
            <form method="GET">
              <button id="delete-filters" type="submit" className="text-danger btn btn-default float-right" disabled={$.isEmptyObject(this.state.urlParams)}>
                <i className="fa fa-times"/>
                Delete filters
              </button>
            </form>
          </div>
        </div>
      </div>
    )
  }
}
