<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;

class ImageAlt extends Tag
{
	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<meta property="og:image:alt" content="%s" />' . PHP_EOL,
			e( $text )
		) : '';
	}

	public function toText(): string
	{
		if ( ! $this->data->single ) {
			return '';
		}

		$text = '';

		foreach ( [ 'og:image:alt', 'image:alt' ] as $key ) {
			if ( $text = $this->data->single->metaSingle( $key ) ) {
				break;
			}
		}

		return $text;
	}
}
