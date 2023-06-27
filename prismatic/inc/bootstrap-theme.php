<?php

require_once get_parent_theme_file_path( 'inc/functions-extras.php' );
require_once get_parent_theme_file_path( 'inc/functions-filters.php' );
require_once get_parent_theme_file_path( 'inc/functions-scripts.php' );
require_once get_parent_theme_file_path( 'inc/functions-setup.php');
require_once get_parent_theme_file_path( 'inc/functions-tags.php');

array_map( function( $file ) {
	require_once get_parent_theme_file_path( "inc/customize/{$file}.php" );
}, [
	'panels',
	'sections',
	'settings',
	'controls'
] );

array_map( function( $file ) {
	require_once get_parent_theme_file_path( "inc/customize/layouts/{$file}.php" );
}, [
	'radio-image',
	'layouts'
] );
