<?php

namespace App\Content;

use Blush\Contracts\Content\Entry;

/*
// <?= $single->extension( 'og.title' )
// <?= $view->ext( 'og.title' )->toHtml()
// <?= $view->ogTitle()->toHtml() ?>
// <title><?= e( $view->ogTitle() ) ?></title>

// <?= $engine->ogTitle()->toHtml() ?>
// <?= $engine->tag( 'og.title' )->toHtml() ?>
// <?= $engine->tag( 'og.title' )->text() ?>
// <?= $engine->tag( 'og.title', $param ) )->toHtml() ?>
//
// <?= $engine->tag( 'pagination', [
	'prev_text' => 'Previous'
   ] )->toHtml() ?>
*/

class EntryOpenGraph
{
	public function __construct( protected Entry $entry ) {}

	public function test() { return 'test'; }

	public function ogTitle(): string
	{
		return $entry->title();
	}
}
