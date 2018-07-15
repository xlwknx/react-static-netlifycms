import React from 'react';
import { withSiteData } from 'react-static';
import 'virgil-frontend-ui/build/styles.css'
import { Button, ButtonTheme } from 'virgil-frontend-ui';
//
import logoImg from '../logo.png';
import '../assets/styles/index.css';

export default withSiteData(() => (
    <div>
        <h1 style={{ textAlign: 'center' }}>Welcome to</h1>
        <img src={logoImg} alt="" style={{ display: 'block', margin: '0 auto' }} />
        <Button>Get Privet</Button>
        <Button theme={ButtonTheme.SmallOutlineRed}>Get Privet</Button>
    </div>
));
