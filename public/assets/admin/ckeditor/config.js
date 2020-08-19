/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//config.skin = 'kama';
	config.extraPlugins = 'embedbase';
	config.extraPlugins = 'dialog';
	config.extraPlugins = 'widget';
	config.extraPlugins = 'embedsemantic';
	config.extraPlugins = "lineutils,widget,codesnippet";
	config.extraPlugins = 'youtube';
};
