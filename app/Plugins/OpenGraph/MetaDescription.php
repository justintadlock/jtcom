<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;

class MetaDescription extends Description
{
	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<meta name="description" content="%s" />' . PHP_EOL,
			e( $text )
		) : '';
	}
}
