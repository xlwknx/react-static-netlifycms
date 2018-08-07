import CMS from 'netlify-cms';
import 'virgil-frontend-ui/dist/styles.css?raw';
import BlogPostPreview from '../templates/PreviewPost';

CMS.registerPreviewTemplate('blog', BlogPostPreview);
CMS.registerPreviewStyle(document.querySelectorAll('link')[0].href);
