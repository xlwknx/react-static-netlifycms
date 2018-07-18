
import React from 'react';
import Container from '../components/Layout/Container';
import styles from './events.module.css';
import { Calendar } from 'virgil-frontend-ui';

export default class EventsPage extends React.Component {

    render() {
        return (
            <Container className={styles.Container}>
                <main className={styles.Content}>
                    yo
                </main>
                <aside className={styles.AsideRight}>
                    <Calendar />
                </aside>
            </Container>
        );
    }
}