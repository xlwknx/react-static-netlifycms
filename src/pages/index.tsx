import React from 'react';
import { withSiteData } from 'react-static';
import { Button } from 'virgil-frontend-ui';
import MainTemplate from 'templates/MainTemplate';
import Container from 'components/Layout/Container';
import logoImg from '../logo.png';
import styles from './index.module.css';

export default withSiteData(() => (
    <MainTemplate>
        <Container>
            <h1 style={{ textAlign: 'center' }}>Welcome to</h1>
            <img src={logoImg} alt="" style={{ display: 'block', margin: '0 auto' }} />
            <Button className={styles.Center}>get started</Button>
        </Container>
    </MainTemplate>
));
