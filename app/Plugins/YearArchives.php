<?php

namespace App\Plugins;

use Blush\{App, Cache, Query};
use Blush\Tools\Str;

class YearArchives
{
	public function render(): string
	{
		if ( $archives = Cache::get( 'jtcom.year.archives' ) ) {
			return $archives;
		}

		$html = '';
		$type = App::get( 'content.types' )->get( 'post' );

		$collection = Query::make( [
			'type'      => 'post',
			'number'    => PHP_INT_MAX,
			'order'     => 'desc',
			'orderby'   => 'date',
			'nocontent' => true
		] );

		$current_year = '';
		$count = 0;

		$html  = '<div class="archives-yearly">';
		$html .= '<ul class="archives-yearly__list">';

		foreach ( $collection as $entry ) {
			$timestamp = $entry->metaSingle( 'date' );

			if ( ! is_numeric( $timestamp ) ) {
				$timestamp = strtotime( $timestamp );
			}

			$year = date( 'Y', $timestamp );

			if ( $current_year !== $year ) {

				if ( $current_year ) {
					$html .= sprintf(
						'<span class="archives-yearly__count">%s</span></div></li>',
						sprintf( Str::nText(
							'%d Post',
							'%d Posts',
							$count
						), $count )
					);
					$count = 0;
				}

				$current_year = $year;

				$html .= '<li class="archives-yearly__item"><div class="archives-yearly__content">';
				$html .= sprintf(
					'<a class="block-month-archives__year" href="%s">%s</a>',
					e( $type->yearUrl( $year ) ),
					date( 'Y', $timestamp )
				);
			}
			++$count;
		}

		$html .= sprintf(
			'<span class="archives-yearly__count">%s</span></div></li>',
			sprintf(
				Str::nText( '%d Post', '%d Posts', $count ),
				$count
			)
		);

		$html .= '</ul></div>';

		Cache::forever( 'jtcom.year.archives', $html );

		return $html;
	}
}
