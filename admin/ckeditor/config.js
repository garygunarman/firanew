/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
 
var pathArray	= window.location.pathname.split( '/admin' );
var path		= pathArray[0];

if(path == "") { path = "/admin"; } else { path = path+'/admin' ;}

CKEDITOR.editorConfig = function( config ){
   // Define changes to default configuration here. For example:
   // config.language = 'fr';
   // config.uiColor = '#AADC6E';

   config.filebrowserBrowseUrl      = path+'/xfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = path+'/xfinder/browse.php?type=images';
   //config.filebrowserFlashBrowseUrl = path+'/xfinder/browse.php?type=flash';
   config.filebrowserUploadUrl      = path+'/xfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = path+'/xfinder/upload.php?type=images';
   //config.filebrowserFlashUploadUrl = path+'/xfinder/upload.php?type=flash';
   // Apply editor instance settings.
   config.forcePasteAsPlainText 	= true;
   config.enterMode					= CKEDITOR.ENTER_BR;
   config.allowedContent			= true;
   config.toolbar					= 'Full';
   config.toolbar_Full				=
   [
   //{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
   { name: 'document', items : [ 'Source', 'Preview'] },
   
   { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
   //{ name: 'clipboard', items : [ 'Paste','PasteText','PasteFromWord' ] },
   { name: 'insert', items : [ 'Image','Table']},//,'Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
   '/',
   
   { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
   //{ name: 'basicstyles', items : [ 'Bold'] },
   
   //{ name: 'paragraph', items : ['NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
   { name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
   //{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
   { name: 'links', items : [ 'Link','Unlink' ] },
   //{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
   //{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
   { name: 'colors', items : [ 'TextColor','BGColor' ] },
   //{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] },
   '/',
   //{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] }
   { name: 'styles', items : [ 'Format'] }
   ];

};