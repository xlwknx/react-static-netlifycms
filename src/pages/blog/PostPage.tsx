import React from 'react';
import { withRouteData, Link } from 'react-static';
import Markdown from 'react-markdown';
import Container from 'components/Layout/Container';
import MainLayout from 'components/Layout/MainLayout';
import { IPostMatter } from 'content';
import styles from './PostPage.module.css';

export interface IPostLayoutProps {
    post: IPostMatter;
}

export class PostPage extends React.Component<IPostLayoutProps> {
    render() {
        const { post } = this.props;
        return (
            <MainLayout
                headerContent={<h1 className={styles.title}>{post.data.title}</h1>}
                headerClassName={styles.navPostBg}
            >
                <Container>
                    <Link to="/blog/" className={styles.back}>
                        {'<'} Back
                    </Link>
                    <br />
                    <h4 className={styles.subtitle}>{post.data.author}</h4>
                    <img className={styles.img} src={post.data.thumbnail} alt="" />
                    <Markdown source={post.content} escapeHtml={false} />
                </Container>
            </MainLayout>
        );
    }
}

export default withRouteData(PostPage);
