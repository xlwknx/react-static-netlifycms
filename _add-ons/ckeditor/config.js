/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
    // Set path to CSS
	CKEDITOR.config.contentsCss="/_add-ons/ckeditor/contents.css";
    CKEDITOR.config.allowedContent = true;
    CKEDITOR.config.contentsCss = "/_themes/virgil/css/virgil.css";
    CKEDITOR.config.width = "100%";
    CKEDITOR.config.height = "800px";
    CKEDITOR.config.entities = false;
    CKEDITOR.config.basicEntities = false;

    CKEDITOR.config.extraPlugins = 'codemirror';

    // if you are running in a subdirectory, add this like so:
	// CKEDITOR.config.contentsCss="/your_subdirectory/_add-ons/ckeditor/contents.css";

	// Example of a custom 'Styles' dropdown - for info and options see http://docs.ckeditor.com/#!/guide/dev_styles
		// CKEDITOR.stylesSet.add( 'custom_styles', [
		//	// Block-level styles
		//	{ name: 'Paragraph', element: 'p' },
		//	{ name: 'Heading 2', element: 'h2' },
		//	{ name: 'Heading 3', element: 'h3' },
		//	{ name: 'Heading 4', element: 'h4' },
		//	{ name: 'CSS code', element: 'pre', attributes: { 'class': 'language-css' } },
		//	{ name: 'HTML code', element: 'pre', attributes: { 'class': 'language-markup' } }
		// ]);


CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// Use custom styles dropdown - see above from line 12
		//config.stylesSet = 'custom_styles';

	// Force plain text on paste
		//config.forcePasteAsPlainText = true;

    // Example of a custom toolbar - to see all available toolbar buttons see http://docs.cksource.com/CKEditor_3.x/Developers_Guide/Toolbar
    config.toolbar = [
    //  { name: 'clipboard', items : [ 'Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
    //	{ name: 'styles', items : [ 'Styles' ] },
    //	{ name: 'removeformat', items : [ 'RemoveFormat' ] },
    //	{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Blockquote'] },
    //	{ name: 'insert', items : [ 'Image' ] },
    	{ name: 'tools', items : [ 'Source', '-', 'Maximize', '-', 'ShowBlocks' ] },
        { name: 'basics', items : [ 'Bold','Italic'] },
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] }
    ];

	// If you want to use Filemanager for file and image browsing and uploading, set the below two paths
	// If you are running in a subdirectory, ensure to add this here too
		// config.filebrowserBrowseUrl = '/_add-ons/filemanager/lib/index.html';
		// config.filebrowserImageBrowseUrl = '/_add-ons/filemanager/lib/index.html';
};
