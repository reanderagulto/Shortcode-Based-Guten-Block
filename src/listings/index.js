/**
 * BLOCK: aios-gutenberg-multi
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './sass/editor.scss';
import './sass/style.scss';

import EditClass from './functions/edit';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'agentimage/aios-listing-block', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'AIOS Listings' ), // Block title.
	icon: 'admin-home', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'aios-gutenberg-multi — CGB Block' ),
		__( 'CGB Example' ),
		__( 'create-guten-block' ),
	],
	attributes: {
		selected_theme: {
			type: 'string',
			default: 'classic'
		},
		selected_view: {
			type: 'string',
			default: 'grid'
		},  
		posts_per_page: {
			type: 'number',
			default: 4
		},
		featured_only: {
			type: 'boolean',
			default: false
		}
	},
	edit: EditClass,
	 save: () => {
		return null;
	}
} );
