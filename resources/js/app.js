import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import Header from './components/header/index.js';
import AddProduct from './components/products/AddProduct';
import EditProduct from './components/products/EditProduct';
import OneProductForm from './components/pages/OneProductForm';
import Cart from './components/pages/Cart';


class App extends Component {
    render(){
      return (
          <div className="container">
          <Router>
            <Switch>
              <Route path='/products/add' component={AddProduct} />
              <Route path='/products/edit/:id' component={EditProduct} />
              <Route path='/products/:id' component={OneProductForm} />
              <Route path='/cart' component={Cart} />
            </Switch>
          </Router>
          </div>
      );
    }
}


//header
ReactDOM.render(
  <React.StrictMode>
    <Header />
  </React.StrictMode>,
  document.getElementById('header-root')
);

//main
if(document.getElementById('root')){
  ReactDOM.render(
    <React.StrictMode>
      <App />
    </React.StrictMode>,
    document.getElementById('root')
  );
}
