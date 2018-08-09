import CMS from 'netlify-cms';
import BlogPostPreview from './previews/PreviewPost';
import 'netlify-cms/dist/cms.css';
import 'virgil-frontend-ui/dist/styles.css';
import '../assets/styles/index.css';

CMS.registerPreviewTemplate('blog', BlogPostPreview);
const link = document.querySelector('link');
if (link) CMS.registerPreviewStyle(link.href);
