import CMS from 'netlify-cms'
import 'netlify-cms/dist/cms.css'
import Post from './containers/Post'

CMS.registerPreviewTemplate('my-template', Post)
