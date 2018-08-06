import klaw from 'klaw';
import matter from 'gray-matter';
import { existsSync, readFileSync } from 'fs';
import path from 'path';

export function getMarkdownFiles(folderName) {
    const items= [];
    const folderPath = path.join('./src/content', folderName);
    return new Promise(resolve => {
        // Check if posts directory exists //
        if (existsSync(folderPath)) {
            klaw(folderPath)
                .on('data', item => {
                    // Filter function to retrieve .md files //
                    if (path.extname(item.path) === '.md') {
                        // If markdown file, read contents //
                        const data = readFileSync(item.path, 'utf8');
                        // Convert to frontmatter object and markdown content //
                        const dataObj = matter(data);
                        // Create slug for URL //
                        dataObj.data.slug = dataObj.data.title
                            .toLowerCase()
                            .replace(/ /g, '-')
                            .replace(/[^\w-]+/g, '');
                        // Remove unused key //
                        delete dataObj.orig;
                        // Push object into items array //
                        items.push(dataObj);
                    }
                })
                .on('error', e => {
                    throw e;
                })
                .on('end', () => {
                    // Resolve promise for async getRoutes request //
                    // posts = items for below routes //
                    resolve(items);
                });
        } else {
            // If src/posts directory doesn't exist, return items as empty array //
            resolve(items);
        }
    });
}
