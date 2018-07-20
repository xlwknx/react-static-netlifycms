
import React from 'react';
import { Calendar } from 'virgil-frontend-ui';
import Container from '../components/Layout/Container';
import styles from './events.module.css';
import MainTemplate from '../templates/MainTemplate';

export default class EventsPage extends React.Component {

    render() {
        return (
            <MainTemplate>
                <Container className={styles.Container}>
                    <main className={styles.Content}>
                        yo
                    </main>
                    <aside className={styles.AsideRight}>
                        <Calendar />
                    </aside>
                </Container>
            </MainTemplate>
        );
    }
}
