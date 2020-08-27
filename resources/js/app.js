import React from 'react';
import ReactDOM from 'react-dom'
import { Provider } from "react-redux"
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import { AddProductContainer } from './components/products/AddProduct';
import { EditProductContainer } from './components/products/EditProduct';
import { OneProductFormContainer } from './components/pages/OneProduct/index';
import ProductsList from './components/pages/ProductsList/index';
import { CartContainer } from './components/pages/Cart/index';
import { OrderInputHandle } from './components/order/index';
import { AccountDeleteContainer } from './components/pages/Account/index';
import { RegisterContainer } from './components/pages/Register/index';
import Header from './components/header/index.js'
import { store } from './redux/store'


const App = () => {
    return (
        <div className="container">
        <Router>
          <Switch>
            <Route exact path='/home' component={AccountDeleteContainer} />
            <Route path='/register' component={RegisterContainer} />
            <Route path='/products/add' component={AddProductContainer} />
            <Route path='/products/edit/:id' component={EditProductContainer} />
            <Route path='/products/search' component={ProductsList} />
            <Route exact path='/products/:cat/:subcat' component={ProductsList} />
            <Route path='/products/:id' component={OneProductFormContainer} />
            <Route exact path='/cart' component={CartContainer} />
            <Route path='/order/(delivery|payment)' component={OrderInputHandle} />
          </Switch>
        </Router>
        </div>
    );
}


//header
ReactDOM.render(
  <Provider store={store}>
    <Header/>
  </Provider>,
  document.getElementById('header-root')
);

//root
if(document.getElementById('root')){
  ReactDOM.render(
    <React.StrictMode>
      <Provider store={store}>
        <App/>
      </Provider>
    </React.StrictMode>,
    document.getElementById('root')
  );
}
