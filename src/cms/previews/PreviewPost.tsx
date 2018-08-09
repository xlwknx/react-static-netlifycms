import React from 'react';
import { PostPage } from 'pages/blog/PostPage';
import { IPostMatter } from 'content';
import { IPost } from 'content/posts';

interface IPostWithBody extends IPost {
    body: string;
}

interface IPreviewPost extends IPostMatter {
    raw: string;
    data: IPostWithBody;
}

interface IPostPreviewProps {
    entry: {
        getIn: (s: string | Array<string>) => string;
        toJS(): IPreviewPost;
    };
    widgetFor: (s: string) => string;
}

const BlogPostPreview: React.SFC<IPostPreviewProps> = ({ entry, widgetFor }) => {
    const post = entry.toJS();
    post.content = post.data.body;

    return <PostPage post={post}>{widgetFor('body')}</PostPage>;
};

export default BlogPostPreview;
