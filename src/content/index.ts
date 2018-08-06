import { IPostMatter } from '.';
import { GrayMatterFile } from 'gray-matter';
import { IPost } from 'content/posts';

interface IFrontMatter<
    T extends object = {
        // tslint:disable-next-line:no-any
        [x: string]: any;
    }
> extends GrayMatterFile<string> {
    data: T;
}

export interface IPostMatter extends IFrontMatter<IPost> {}
