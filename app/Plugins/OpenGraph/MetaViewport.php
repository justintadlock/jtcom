<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;

class MetaViewport extends Tag
{
	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<meta name="viewport" content="%s">' . PHP_EOL,
			e( $text )
		) : '';
	}

	public function toText(): string
	{
		return 'width=device-width, initial-scale=1';
	}
}
