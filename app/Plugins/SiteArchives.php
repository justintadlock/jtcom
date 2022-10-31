<?php

namespace App\Plugins;

use Blush\{App, Cache, Query};
use Blush\Contracts\Cache\Driver;
use Blush\Tools\Str;

class SiteArchives
{
	protected ?Driver $store;
	protected string $key;

	public function __construct( string $store = '', string $key = '' )
	{
		$this->store = $store ? Cache::store( $store ) : null;
		$this->key   = $key;
	}

	public function render(): string
	{
		if ( $this->store && $archives = $this->store->get( $this->key ) ) {
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

		$current_year = $current_month = $current_day = '';

		$html = '<div class="archives-site">';

		foreach ( $collection as $entry ) {
			$timestamp = $entry->metaSingle( 'date' );

			if ( ! is_numeric( $timestamp ) ) {
				$timestamp = strtotime( $timestamp );
			}

			$year   = date( 'Y', $timestamp );
			$month  = date( 'm', $timestamp );
			$daynum = date( 'd', $timestamp );

			if ( $current_year !== $year || $current_month !== $month ) {

				if ( $current_month && $current_year ) {
					$html .= '</ul>';
				}

				$current_year  = $year;
				$current_month = $month;
				$current_day   = '';

				$html .= sprintf(
					'<h2 class="archives-site__heading"><a class="text-gray-700 no-underline hover:underline border-0" href="%s">%s</a></h2>',
					e( $type->monthUrl( $year, $month ) ),
					date( 'F Y', $timestamp )
				);

				$html .= '<ul class="archives-site__list">';
			}

			$day = '<span class="archives-site__day">' . e( $daynum ) . ':</span>';

			$duplicate_day = $current_day && $daynum === $current_day ? ' day-duplicate' : '';
			$current_day   = $daynum;

			$html .= sprintf(
				'<li class="archives-site__item %s">%s <span class="archives-site__post"><a href="%s" rel="bookmark">%s</a></span></li>',
				$duplicate_day,
				$day,
				e( $entry->url() ),
				e( $entry->title() )
			);
		}

		$html .= '</ul></div>';

		$this->store->forever( $this->key, $html );

		return $html;
	}
}
