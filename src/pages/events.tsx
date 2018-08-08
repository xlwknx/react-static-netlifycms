import React from 'react';
import Container from 'components/Layout/Container';
import styles from './events.module.css';
import MainTemplate from 'containers/MainTemplate';
import { Calendar } from 'virgil-frontend-ui';
import { withRouteData } from 'react-static';

export interface IEventPageProps {
    events: Array<{
        data: {
            title: string;
        };
    }>;
}

export class EventsPage extends React.Component<IEventPageProps> {
    render() {
        return (
            <MainTemplate>
                <Container className={styles.Container}>
                    <main className={styles.Content}>
                        {this.props.events.map(post => (
                            <div key={post.data.title}>{post.data.title}</div>
                        ))}
                    </main>
                    <aside className={styles.AsideRight}>
                        <Calendar />
                    </aside>
                </Container>
            </MainTemplate>
        );
    }
}

export default withRouteData(EventsPage);
