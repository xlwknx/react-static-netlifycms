import React from 'react';
import { Link } from 'react-static';
import { Button } from 'virgil-frontend-ui';
import Container from 'components/Layout/Container';
import LogoWhite from 'components/Svg/LogoWhite';
import styles from './MainTemplate.module.css';

export interface IMainTemplateProps {
    headerClassName?: string;
    headerContent?: React.ReactNode;
    className?: string;
}

export default class MainTemplate extends React.Component<IMainTemplateProps> {
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
                        <div>
                            <Link to="/">Home</Link>
                            <Link to="/about">About</Link>
                            <Link to="/events">Events</Link>
                            <Link to="/blog">Blog</Link>
                        </div>
                        <div>
                            <Button theme={Button.ButtonTheme.Inline}>Login</Button>
                            <Button theme={Button.ButtonTheme.Outline}>Signup</Button>
                        </div>
                    </nav>
                    <div className={styles.headerContent}>{this.props.headerContent}</div>
                </Container>
                {this.props.children}
            </React.Fragment>
        );
    }
}
