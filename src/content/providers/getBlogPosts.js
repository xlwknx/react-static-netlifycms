import fs from 'fs';
import path from 'path';
import klaw from 'klaw';
import matter from 'gray-matter';

export function getBlogPosts() {
    const items = [];
    // Walk ("klaw") through posts directory and push file paths into items array //
    const getFiles = () =>
        new Promise(resolve => {
            // Check if posts directory exists //
            if (fs.existsSync('./src/content/posts')) {
                klaw('./src/content/posts')
                    .on('data', item => {
                        // Filter function to retrieve .md files //
                        if (path.extname(item.path) === '.md') {
                            // If markdown file, read contents //
                            const data = fs.readFileSync(item.path, 'utf8');
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
                    .on('error', console.error)
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
    return getFiles();
};
