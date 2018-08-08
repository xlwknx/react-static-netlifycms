import React from 'react';
import { withSiteData } from 'react-static';
import { Button } from 'virgil-frontend-ui';
import MainTemplate from 'containers/MainTemplate';
import Container from 'components/Layout/Container';
import styles from './index.module.css';

export default withSiteData(() => (
    <MainTemplate>
        <Container>
            <h1 style={{ textAlign: 'center' }}>Welcome to</h1>
            <Button className={styles.Center}>get started</Button>
        </Container>
    </MainTemplate>
));
