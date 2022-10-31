<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;

class Title extends Tag
{
	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<meta property="og:title" content="%s" />' . PHP_EOL,
			e( $text )
		) : '';
	}

	public function toText(): string
	{
		return $this->data->single ? $this->data->single->title() : '';
	}
}
