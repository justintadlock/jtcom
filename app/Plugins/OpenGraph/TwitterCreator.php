<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;

class TwitterCreator extends Tag
{
	public function __construct( protected string $default = '' ) {}

	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<meta name="twitter:creator" content="%s" />' . PHP_EOL,
			e( $text )
		) : '';
	}

	public function toText(): string
	{
		return $this->data->single
		       ? $this->data->single->metaSingle( 'twitter:creator', $this->default )
		       : $this->default;
	}
}
