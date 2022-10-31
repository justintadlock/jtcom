<?php

namespace App\Plugins;

use Blush\{App, Cache, Query};
use Blush\Tools\Str;

class MonthArchives
{
	public function render(): string
	{
		if ( $archives = Cache::get( 'jtcom.month.archives' ) ) {
			return $archives;
		}

		$type = App::get( 'content.types' )->get( 'post' );

		$collection = Query::make( [
			'type'      => 'post',
			'number'    => PHP_INT_MAX,
			'order'     => 'desc',
			'orderby'   => 'date',
			'nocontent' => true
		] );

		$current_year = $current_month = '';
		$count = 0;

		$html  = '<div class="archives-monthly">';
		$html .= '<ul class="archives-monthly__list">';

		foreach ( $collection as $entry ) {
			$timestamp = $entry->metaSingle( 'date' );

			if ( ! is_numeric( $timestamp ) ) {
				$timestamp = strtotime( $timestamp );
			}

			$year  = date( 'Y', $timestamp );
			$month = date( 'm', $timestamp );

			if ( $current_year !== $year || $current_month !== $month ) {

				if ( $current_month && $current_year ) {

					$html .= sprintf(
						'<span class="archives-monthly__count">%s</span></div></li>',
						sprintf(
							Str::nText( '%d Post', '%d Posts', $count ),
							$count
						)
					);

					$count = 0;
				}

				$current_year  = $year;
				$current_month = $month;

				$html .= '<li class="archives-monthly__item"><div class="archives-monthly__content">';

				$html .= sprintf(
					'<a class="archives-monthly__month" href="%s">%s</a>',
					e( $type->monthUrl( $year, $month ) ),
					date( 'F Y', $timestamp )
				);
			}
			++$count;
		}

		$html .= sprintf(
			'<span class="archives-monthly__count">%s</span></div></li></ul></div>',
			sprintf( Str::nText( '%d Post', '%d Posts', $count ), $count )
		);

		Cache::forever( 'jtcom.month.archives', $html );

		return $html;
	}
}
