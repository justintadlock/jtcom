<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;

class LinkCanonical extends Tag
{
	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<link rel="canonical" href="%s" />' . PHP_EOL,
			e( $text )
		) : '';
	}

	public function toText(): string
	{
		return $this->data->single ? $this->data->single->url() : '';
	}
}
