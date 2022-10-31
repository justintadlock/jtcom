<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;

class Description extends Tag
{
	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<meta property="og:description" content="%s" />' . PHP_EOL,
			e( $text )
		) : '';
	}

	public function toText(): string
	{
		if ( ! $this->data->single ) {
			return '';
		}

		$text = str_replace(
			[ "\n", "\r", "\t" ],
			' ',
			strip_tags( $this->data->single->excerpt( 40, '' ) )
		);

		if ( 260 < strlen( $text ) ) {
			$text = trim( substr( $text, 0, 260 ), '.' ) . '...';
		}

		return $text;
	}
}
