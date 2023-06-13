/**
 * Theme Export Script
 *
 * This code exports the theme, optimized for production, including only the
 * necessary files and folders or zipping. If you need to make any modifications,
 * you can edit the `files` or `folders` variables.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007k@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

// Import required packages.
const mix     = require( 'laravel-mix' );
const rimraf  = require( 'rimraf' );
const fs      = require( 'fs' );

// Folder name to export the files to.
let exportPath = 'prismatic';

// Theme root-level files to include.
let files = [
	'functions.php',
	'footer.php',
	'header.php',
	'index.php',
	'page.php',
	'readme.txt',
	'screenshot.png',
	'sidebar.php',
	'single.php',
	'style.css'
];

// Folders to include.
let folders = [
	'assets',
	'inc',
	'template-parts',
];

// Delete the previous export to start clean.
rimraf.sync( exportPath );

// Loop through the root files and copy them over.
files.forEach( file => {

	if ( fs.existsSync( file ) ) {
		mix.copy( file, `${exportPath}/${file}` );
	}
} );

// Loop through the folders and copy them over.
folders.forEach( folder => {

	if ( fs.existsSync( folder ) ) {
		mix.copyDirectory( folder, `${exportPath}/${folder}` );
	}
} );

// Delete the `vendor/bin` and `vendor/composer/installers` folder, which can
// get left over, even in production. Mix will also create an additional
// `mix-manifest.json` file in the root, which we don't need.
mix.then( () => {

	let files = [
		'mix-manifest.json',
	];

	files.forEach( file => {
		rimraf.sync( file );
	} );
} );
