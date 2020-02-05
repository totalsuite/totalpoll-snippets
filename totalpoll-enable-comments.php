<?php
/**
 * This snippet adds comments to polls.
 *
 * @see https://totalsuite.net/documentation/totalpoll/codex/filters-reference/#totalpoll-filters-cpt-args
 * @license MIT
 * @author TotalSuite
 */

add_filter(
	'totalpoll/filters/cpt/args',
	function ( $args ) {
		$args['supports'][] = 'comments';

		return $args;
	}
);
