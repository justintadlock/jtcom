<?php

namespace App\Plugins\OpenGraph;

use Blush\Template\Tag\Tag;

class MetaThemeColor extends Tag
{
	public function __construct( protected string $color = '#000000' ) {}

	public function toHtml(): string
	{
		$text = $this->toText();

		return $text ? sprintf(
			"\t" . '<meta name="theme-color" content="%s" />' . PHP_EOL,
			e( $text )
		) : '';
	}

	public function toText(): string
	{
		return $this->color;
	}
}
