<?php
/**
 * Single controller.
 *
 * @package   Blush
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018 - 2022, Justin Tadlock
 * @link      https://github.com/blush-dev/framework
 * @license   https://opensource.org/licenses/MIT
 */

namespace App\Controllers;

use Blush\{App, Query};
use Blush\Controllers\Controller;
use Blush\Template\Tags\DocumentTitle;
use Blush\Tools\Str;
use Symfony\Component\HttpFoundation\{Request, Response};

class SinglePost extends Controller
{
	/**
	 * Callback method when route matches request.
	 *
	 * @since 1.0.0
	 */
	public function __invoke( array $params = [], Request $request ): Response
	{
		// Check if another content type is part of the request.
		foreach ( App::get( 'content.types' ) as $type ) {
			if ( isset( $params[ $type->name() ] ) ) {
				$meta_key   = $type->name();
				$meta_value = $params[ $type->name() ];
			}
		}

		// Query the post according according to the query vars.
		$single = Query::make( [
			'type'       => 'post',
			'slug'       => $params['name'],
			'year'       => $params['year']   ?? null,
			'month'      => $params['month']  ?? null,
			'day'        => $params['day']    ?? null,
			'author'     => $params['author'] ?? null,
			'meta_key'   => $meta_key         ?? null,
			'meta_value' => $meta_value       ?? null
		] )->single();

		if ( $single ) {
			$doctitle = new DocumentTitle( $single->title() );

			return $this->response(
				$this->view( [
					"single-post-{$params['name']}",
					'single-post',
					'single'
				], [
					'doctitle'   => $doctitle,
					'pagination' => false,
					'single'     => $single,
					'collection' => false
				] )
			);
		}

		// If all else fails, return a 404.
		return $this->forward404( $params, $request );
	}
}
