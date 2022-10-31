<?php $pagination->display( [
	'leading_zeroes' => true,
	'title_text'      => sprintf(
		'Page %s / %s:',
		e( Blush\Tools\Str::padLeft( $pagination->current(), 2, '0' ) ),
		e( Blush\Tools\Str::padLeft( $pagination->total(), 2, '0' ) )
	),
	'prev_text'       => $pagination->isLastPage() ? '&larr; Previous' : '',
	'next_text'       => 'Next &rarr;',
	'container_class' => 'pagination o-container-base',
	'nav_class'       => 'pagination__nav',
	'title_class'     => 'pagination__title',
	'list_class'      => 'pagination__items',
	'item_class'      => 'pagination__item pagination__item--%s',
	'anchor_class'    => 'pagination__anchor pagination__anchor--%s',
] );
