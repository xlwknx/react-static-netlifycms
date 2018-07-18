import React from 'react';
import { Router, Link } from 'react-static';
import Routes from 'react-static-routes';

const styles = require('./app.module.css');

const App = () => (
    <Router>
        <React.Fragment>
            <nav className={styles.nav}>
                <div className={styles.container}>
                    <Link exact to="/">
                        Home
                    </Link>
                    <Link to="/about">About</Link>
                    <Link to="/events">Events</Link>
                    <Link to="/blog">Blog</Link>
                </div>
            </nav>
            <Routes />
        </React.Fragment>
    </Router>
);

export default App;
