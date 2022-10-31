<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;

class MetaKeywords extends Description
{
	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<meta name="keywords" content="%s" />' . PHP_EOL,
			e( $text )
		) : '';
	}

	public function toText(): string
	{
		return $this->data->single ? $this->data->single->metaSingle( 'keywords' ) : '';
	}
}
