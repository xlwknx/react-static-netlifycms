import React from 'react';
import ReactDOM from 'react-dom';
import { AppContainer } from 'react-hot-loader';
import './assets/styles/index.css';
import 'virgil-frontend-ui/dist/styles.css';

// Your top level component
import App from 'App';

// Export your top level component as JSX (for static rendering)
export default App;

// Render your app
if (typeof document !== 'undefined') {
    const renderMethod = module.hot ? ReactDOM.render : ReactDOM.hydrate || ReactDOM.render;
    const render = (Comp: React.ReactType) => {
        renderMethod(
            <AppContainer>
                <Comp />
            </AppContainer>,
            document.getElementById('root'),
        );
    };

    // Render!
    render(App);
    // Hot Module Replacement
    if (module.hot) {
        module.hot.accept('./App', () => render(require('./App').default));
    }
}
