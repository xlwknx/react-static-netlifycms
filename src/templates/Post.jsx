import React from 'react';
import { withRouteData, Link } from 'react-static';
import Markdown from 'react-markdown';
import Container from '../components/Layout/Container';

const styles = require('./Post.module.css');

export default withRouteData(({ post }) => (
    <Container>
        <Link to="/blog/" className={styles.back}>{'<'} Back</Link>
        <br />
        <h1 className={styles.title}>{post.data.title}</h1>
        <h4 className={styles.subtitle}>{post.data.author}</h4>
        <img className={styles.img} src={post.data.thumbnail} alt="" />
        <Markdown source={post.content} escapeHtml={false} />
    </Container>
));
