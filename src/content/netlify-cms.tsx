import CMS from 'netlify-cms';
import 'netlify-cms/dist/cms.css?raw';
import 'virgil-frontend-ui/dist/styles.css?raw';
import BlogPostPreview from '../templates/PreviewPost';

CMS.registerPreviewTemplate('blog', BlogPostPreview);
const link = document.querySelector('link');
if (link) CMS.registerPreviewStyle(link.href);
