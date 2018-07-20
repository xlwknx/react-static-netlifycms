import React from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-static';
import styles from './MainTemplate.module.css';
import { Button, ButtonTheme } from 'virgil-frontend-ui';
import Container from '../components/Layout/Container';
import LogoWhite from '../components/Svg/LogoWhite';

export default class MainTemplate extends React.Component {
    render() {
        return (
            <React.Fragment>
                <Container
                    backgroundClass={[
                        styles.navContainerBg,
                        this.props.headerClassName || styles.navDefault,
                    ].join(' ')}
                    className={[this.props.className, styles.navContainer].join(' ')}
                >
                    <nav className={styles.nav}>
                        <LogoWhite />
                        <div className={styles.container}>
                            <Link exact to="/">
                                Home
                            </Link>
                            <Link to="/about">About</Link>
                            <Link to="/events">Events</Link>
                            <Link to="/blog">Blog</Link>
                        </div>
                        <div>
                            <Button theme={ButtonTheme.Inline}>Login</Button>
                            <Button theme={ButtonTheme.Outline}>Signup</Button>
                        </div>
                    </nav>
                    <div className={styles.headerContent}>
                        {this.props.headerContent}
                    </div>
                </Container>
                {this.props.children}
            </React.Fragment>
        );
    }
}

MainTemplate.propTypes = {
    headerClassName: PropTypes.string,
};
