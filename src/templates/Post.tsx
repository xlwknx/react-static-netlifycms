import React from 'react';
import { withRouteData, Link } from 'react-static';
import Markdown from 'react-markdown';
import Container from 'components/Layout/Container';
import MainTemplate from './MainTemplate';
import { IPostMatter } from '../content/index';

const styles = require('./Post.module.css');

export interface IPostTemplate {
    post: IPostMatter;
}

export class PostTemplate extends React.Component<IPostTemplate> {
    render() {
        const { post } = this.props;
        return (
            <MainTemplate
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
            </MainTemplate>
        );
    }
}

export default withRouteData(PostTemplate);
