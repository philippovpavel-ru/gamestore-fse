<?php

/**
 * Plugin Name:       [ Blocks Gamestore ]
 * Description:       Blocks for Gamestore.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gamestore-blocks
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function create_block_gamestore_blocks_block_init() {
	register_block_type( __DIR__ . '/build/block-contact' );
	register_block_type( __DIR__ . '/build/block-hero' );
}
add_action( 'init', 'create_block_gamestore_blocks_block_init' );

function gamestore_create_category_blocks( $categories ) {
	$include = true;
	$slug = 'gamestore';
	$title = __('Gamestore Blocks', 'gamestore-blocks');

	foreach ($categories as $category) {
		if ($slug === $category['slug']) {
			$include = false;
		}
	}

	if ($include) {
		$categories = array_merge(
			[
				[
					'slug'  => $slug,
					'title' => $title,
				],
			],
			$categories
		);
	}

	return $categories;
}
add_filter( 'block_categories_all', 'gamestore_create_category_blocks', 10, 1 );
