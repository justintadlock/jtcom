<?php
# Custom content types configuration.
#
# "{$type}" => [
#	'path'         => string, // path relative to `user/content` (no slashes)
#	'taxonomy'     => bool,   // whether content type is a taxonomy
#       'term_collect' => string  // content type for taxonomy terms to collect
# ]

use Blush\Controllers\Single;
use App\Controllers\ArchivePost;

return [
	// Create custom content type and taxonomy for blog posts.
	'post' => [
		'path'          => '_posts',
		'collection'    => [ 'order' => 'desc' ],
		'date_archives' => true,
		'feed'          => [ 'taxonomy' => 'category' ],
		'routing' => [
			'prefix' => 'archives',
			'paths'  => [
				'single' => '{year}/{month}/{day}/{name}'
			]
		]
	],
	'category' => [
		'path'            => 'topics',
		'collection'      => [ 'number' => 9999 ],
		'taxonomy'        => true,
		'term_collect'    => 'post',
		'term_collection' => [ 'order' => 'desc' ],
	],
	'era' => [
		'path'            => 'eras',
		'collection'      => [ 'order' => 'desc', 'number' => 9999 ],
		'taxonomy'        => true,
		'term_collect'    => 'post',
		'term_collection' => [ 'order' => 'desc' ],
	],

	// Create custom content type and taxonomy for blog posts.
	'literature' => [
		'path'       => 'writing',
		'collection' => [ 'order' => 'desc', 'number' => 9999 ]
	],
	'literary_form' => [
		'path'            => 'writing/forms',
		'taxonomy'        => true,
		'term_collect'    => 'literature',
		'term_collection' => [ 'order' => 'desc', 'number' => 9999 ]
	],
	'literary_genre' => [
		'path'            => 'writing/genres',
		'taxonomy'        => true,
		'term_collect'    => 'literature',
		'term_collection' => [ 'order' => 'desc', 'number' => 9999 ]
	],
	'literary_technique' => [
		'path'            => 'writing/techniques',
		'taxonomy'        => true,
		'term_collect'    => 'literature',
		'term_collection' => [ 'order' => 'desc', 'number' => 9999 ]
	]
];
