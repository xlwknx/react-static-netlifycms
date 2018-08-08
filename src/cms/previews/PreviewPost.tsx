import React from 'react';
import { PostTemplate } from './Post';
import { IPostMatter } from 'content';
import { IPost } from 'content/posts';

import './PreviewPost.module.css';

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

    return <PostTemplate post={post}>{widgetFor('body')}</PostTemplate>;
};

export default BlogPostPreview;
