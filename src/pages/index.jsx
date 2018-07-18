import React from 'react';
import { withSiteData } from 'react-static';
import { Button } from 'virgil-frontend-ui';
import Container from '../components/Layout/Container';
import logoImg from '../logo.png';

const styles = require('./index.module.css');

export default withSiteData(() => (
    <Container>
        <h1 style={{ textAlign: 'center' }}>Welcome to</h1>
        <img src={logoImg} alt="" style={{ display: 'block', margin: '0 auto' }} />
        <Button className={styles.Center}>Get Started</Button>
    </Container>
));
