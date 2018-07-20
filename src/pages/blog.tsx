import React from 'react';
import { withRouteData, Link } from 'react-static';
import Container from 'components/Layout/Container';
import MainTemplate from 'templates/MainTemplate';

export interface IBlogPage {
    // posts: []
}

class BlogPage extends React.Component<IBlogPage> {
    render() {
        return (
            <MainTemplate>
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
            </MainTemplate>
        );
    }
}

export default withRouteData(BlogPage);
