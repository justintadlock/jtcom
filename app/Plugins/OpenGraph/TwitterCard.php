<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;

class TwitterCard extends Tag
{
	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<meta name="twitter:card" content="%s" />' . PHP_EOL,
			e( $text )
		) : '';
	}

	public function toText(): string
	{
		if ( ! $this->data->single ) {
			return '';
		}

		if ( $card = $this->data->single->metaSingle( 'twitter:card' ) ) {
			return $card;
		}

		foreach ( [ 'og:image', 'image' ] as $key ) {
			if ( $this->data->single->metaSingle( $key ) ) {
				return 'summary_large_image';
			}
		}

		return 'summary';
	}
}
