import React from 'react';
import { withRouteData, Link } from 'react-static';
import Container from '../components/Layout/Container';
import PropTypes from 'prop-types';

class BlogPage extends React.Component {
    render() {
        return (
            <Container>
                <h1>It's blog time.</h1>
                <br />
                All Posts:
                <ul>
                    {this.props.posts.map(post => (
                        <li key={post.data.slug}>
                            <Link to={`/blog/post/${post.data.slug}`}>{post.data.title}</Link>
                            - {post.data.author}
                        </li>
                    ))}
                </ul>
                <p>Tags</p>
                <ul>
                    {this.props.tags.map(tag => (
                        <li key={tag}>
                            <Link to={`/blog/tag/${tag}`}>{tag}</Link>
                        </li>
                    ))}
                </ul>
            </Container>
        );
    }
}

BlogPage.propTypes = {
    posts: PropTypes.arrayOf(
        PropTypes.shape({
            data: PropTypes.shape({
                author: PropTypes.author,
                slug: PropTypes.string,
                title: PropTypes.string,
            }),
        }),
    ),
    tags: PropTypes.arrayOf(PropTypes.string)
};

export default withRouteData(BlogPage);
