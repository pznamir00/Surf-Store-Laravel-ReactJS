import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import Header from './components/header/index.js';
import AddProduct from './components/products/AddProduct';
import EditProduct from './components/products/EditProduct';
import OneProductForm from './components/pages/OneProduct/index';
import ProductsList from './components/pages/ProductsList/index';
import Cart from './components/pages/Cart/index';
import { OrderInputHandle } from './components/order/index';
import AccountDelete from './components/pages/Account/index';
import Register from './components/pages/Register/index';


class App extends Component {
    render(){
      return (
          <div className="container">
          <Router>
            <Switch>
              <Route exact path='/home' component={AccountDelete} />
              <Route path='/register' component={Register} />
              <Route path='/products/add' component={AddProduct} />
              <Route path='/products/edit/:id' component={EditProduct} />
              <Route path='/products/search' component={ProductsList} />
              <Route exact path='/products/:cat/:subcat' component={ProductsList} />
              <Route path='/products/:id' component={OneProductForm} />
              <Route exact path='/cart' component={Cart} />
              <Route path='/order/(delivery|payment)' component={OrderInputHandle} />
            </Switch>
          </Router>
          </div>
      );
    }
}


//header
ReactDOM.render(<Header/>, document.getElementById('header-root'));

//main
if(document.getElementById('root')){
  ReactDOM.render(
    <React.StrictMode>
      <App />
    </React.StrictMode>,
    document.getElementById('root')
  );
}
