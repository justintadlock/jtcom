<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;
use Blush\Tools\{Media, Str};

class Image extends Tag
{
	public function __construct( protected string $default = '' ) {}

	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<meta property="og:image" content="%s" />' . PHP_EOL,
			e( $text )
		) : '';
	}

	public function toText(): string
	{
		if ( ! $this->data->single ) {
			return $this->default;
		}

		$meta_keys = [
			'og:image' => false,
			'social'   => 'image', // do not use, back-compat
			'image'    => false
		];

		$media = null;

		foreach ( $meta_keys as $key => $subkey ) {

			if ( false === $subkey ) {
				$media = $this->data->single->media( $key );
			} else {
				$values = $this->data->single->metaArr( $key );

				if ( isset( $values[ $subkey ] ) ) {
					$media = new Media( $values[ $subkey ] );
				}
			}

			if ( $media && $media->valid() ) {
				return $media->url();
			}
		}

		return $this->default;
	}
}
