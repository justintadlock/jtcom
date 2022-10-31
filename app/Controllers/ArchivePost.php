<?php
/**
 * Content type archive controller.
 *
 * @package   Blush
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018 - 2022, Justin Tadlock
 * @link      https://github.com/blush-dev/framework
 * @license   https://opensource.org/licenses/MIT
 */

namespace App\Controllers;

use Blush\{App, Query};
use Blush\Content\Entry\Virtual;
use Blush\Controllers\Controller;
use Blush\Template\Tags\{DocumentTitle, Pagination};
use Blush\Tools\Str;
use Symfony\Component\HttpFoundation\{Request, Response};

class ArchivePost extends Controller
{
	/**
	 * Callback method when route matches request.
	 *
	 * @since 1.0.0
	 */
	public function __invoke( array $params = [], Request $request ): Response
	{
		$types = App::resolve( 'content.types' );

		$path  = $params['path'];
		$day   = $params['day']   ?? '';
		$month = $params['month'] ?? '';
		$year  = $params['year']  ?? '';
		$page  = intval( $params['page'] ?? 1 );

		if ( Str::contains( $path, "/page/{$page}" ) ) {
			$path = Str::beforeFirst( $path, "/page/{$page}" );
		}

		$per_page = 10;

		// Get the content type.
		$type     = $types->get( 'post' );
		$collect  = $types->get( $type->collect() );

		$args = $type->collectionArgs();

		if ( $day   ) { $args['day']   = $day;   }
		if ( $month ) { $args['month'] = $month; }
		if ( $year  ) { $args['year']  = $year;  }

		$title = 'Archives';

		if ( $year && $month && $day ) {
			$title = date( 'F j, Y', strtotime( "{$year}-{$month}-{$day}" ) );
		} elseif ( $year && $month ) {
			$title = date( 'F Y', strtotime( "{$year}-{$month}" ) );
		} elseif ( $year ) {
			$title = date( 'Y', strtotime( $year ) );
		}

		// Create a virtual entry for the archive data.
		$single = new Virtual( [
			'content' => sprintf(
				'<p>You are browsing the blog archives for %s. To see all
				posts, visit the <a href="/archives">archives</a> page.</p>',
				$title
			),
			'meta' => [ 'title' => $title ]
		] );

		// Query the content type collection.
		$collection = Query::make( array_merge( [
			'path'       => $collect->path(),
			'noindex'    => true,
			'number'     => $per_page,
			'offset'     => $per_page * ( intval( $page ) - 1 ),
			'order'      => 'desc',
			'orderby'    => 'filename'
		], $args ) );

		if ( $collection->all() ) {

			$doctitle = new DocumentTitle( $single->title(), [
				'page' => $page
			] );

			$pagination = new Pagination( [
				'basepath' => $path,
				'current'  => $page,
				'total'    => $collection->pages()
			] );

			$views = [];

			    if ( $day   ) { $views[] = 'collection-archive-day';   }
			elseif ( $month ) { $views[] = 'collection-archive-month'; }
			elseif ( $year  ) { $views[] = 'collection-archive-year';  }

			$views[] = 'collection-archive';
			$views[] = 'collection';

			return $this->response(
				$this->view( $views, [
					'doctitle'   => $doctitle,
					'pagination' => $pagination,
					'single'     => $single,
					'collection' => $collection
				] )
			);
		}

		// If all else fails, return a 404.
		return $this->forward404( $params, $request );
	}
}
