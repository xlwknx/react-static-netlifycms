import React from 'react'
import { Router, Link, Switch, Route } from 'react-static'
import { hot } from 'react-hot-loader'
import Routes from 'react-static-routes'

import './netlify-cms.js'
import './app.css'

const App = () => (
  <Router>
    <div>
      <nav>
        <Link to="/">Home</Link>
        <Link to="/about">About</Link>
        <Link to="/blog">Blog</Link>
        <Link to="/admin/">Admin</Link>
      </nav>
      <div className="content">
        <Switch>
          <Route path="/admin" />
          <Routes />
        </Switch>
      </div>
    </div>
  </Router>
)

export default hot(module)(App)
