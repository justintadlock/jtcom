<?php

namespace App;

function get_blocks(): array
{
	return [
		'blush/entry-terms' => Blocks\EntryTerms::class
	];
}

function render_block( string $name, array $options = [] ): string
{
	$blocks = get_blocks();
	if ( isset( $blocks[$name] ) ) {
		$block = new $blocks[$name]( $options );
		return $block->render();
	}

	return '';
}

function entry_image( $entry ): string
{
	$thumbnail = $entry->metaSingle( 'image' );
	$thumbnail = false === strpos( $thumbnail, 'http://' ) ? url( $thumbnail ) : $thumbnail;

	if ( ! $thumbnail ) {
		return '';
	}

	return sprintf(
		'<figure class="block-image alignnone">
			<img src="%s" alt="" />
			<figcaption><a class="text-2xl border-0" href="%s">%s</a></figcaption>
		</figure>',
		e( $thumbnail ),
		e( $entry->url() ),
		e( $entry->title() )
	);
}

function print_css( string $path ): string
{
	$css = file_get_contents( public_path( $path ) );

	return $css ? sprintf( '<style>%s</style>', $css ) : '';
}

function view_style( $entry ): string
{
	$style = $entry->metaSingle( 'style' );

	if ( ! $style || ! file_exists( path( $style ) ) ) {
		return '';
	}

	return sprintf(
		'<link rel="stylesheet" href="%s?id=%s" />' . "\n",
		url( $style ),
		filemtime( path( $style ) )
	);
}

function view_description( $single )
{
	$description = $single ? $single->excerpt( 40, '' ) : false;

	if ( $description ) {
		$description = e( str_replace( [ "\n", "\r", "\t" ], ' ', strip_tags(
			$description
		) ) );

		if ( 260 < strlen( $description ) ) {
			$description = trim( substr( $description, 0, 260 ), '.' ) . '...';
		}
	}

	return trim( $description );
}

function view_image( $single ): string
{
	$image = $single ? $single->metaSingle( 'image' ) : '';

	if ( $image ) {
		// @todo account for both `uri()` and `media_uri()` paths.
		if ( false === strpos( $image, 'http://' ) ) {
			$image = uri( $image );
		}
	}

	return e( $image );
}

function social_image( $single ): string
{
	$social = $single->metaArr( 'social' );

	if ( ! $social ) {
		return view_image( $single );
	}

	$image = $social['image'] ?? '';

	if ( ! $image ) {
		return view_image( $single );
	}

	if ( $image ) {
		// @todo account for both `uri()` and `media_uri()` paths.
		if ( false === strpos( $image, 'http://' ) ) {
			$image = uri( $image );
		}
	}

	return e( $image );
}

function meta_viewport(): string
{
	return '<meta name="viewport" content="width=device-width, initial-scale=1">';
}

function meta_description( $single ): string
{
	$description = view_description( $single );

	return $description ? sprintf(
		"\n\t" . '<meta name="description" content="%s" />',
		$description
	) : '';
}

function og_description( $single ): string
{
	$description = view_description( $single );

	return $description ? sprintf(
		"\n\t" . '<meta property="og:description" content="%s" />',
		$description
	) : '';
}

function meta_keywords( $single ): string
{
	$keywords = $single ? $single->metaSingle( 'keywords' ) : '';

	return $keywords ? sprintf(
		"\n\t" . '<meta name="keywords" value="%s" />',
		e( $keywords )
	) : '';
}

function og_image( $single ): string
{
	$image = social_image( $single );

	return $image ? sprintf(
		"\n\t" . '<meta property="og:image" content="%s" />',
		$image
	) : '';
}

function twitter_image( $single ): string
{
	$image = social_image( $single );

	return $image ? sprintf(
		"\n\t" . '<meta name="twitter:image" content="%s" />',
		$image
	) : '';
}

function twitter_card( $single ): string
{
	$image = social_image( $single );

	return $image
	       ? "\n\t" . '<meta name="twitter:card" content="summary_large_image" />'
	       : '';
}

function twitter_creator(): string
{
	return "\n\t" . '<meta name="twitter:creator" content="@justintadlock" />';
}

function twitter_site(): string
{
	return "\n\t" . '<meta name="twitter:site" content="@justintadlock" />';
}

function twitter_text_title( $single ): string
{
	$title = $single ? $single->title() : '';

	return sprintf(
		"\n\t" . '<meta name="twitter:text:title" content="%s" />',
		e( ! $title || 'Blog' === $title ? config( 'app.title' ) : $title )
	);
}

function theme_color(): string
{
	return "\n\t" . '<meta name="theme-color" content="#2b6cb0;">';
}
