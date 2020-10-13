<?php
/**
 * This snippet disables direct links.
 *
 * @see https://totalsuite.net/documentation/totalpoll/codex/filters-reference/#totalpoll-filters-cpt-args
 * @license MIT
 * @author TotalSuite
 */

add_filter(
	'totalpoll/filters/cpt/args',
	function ( $args ) {
		$args['public'] = false;
    $args['show_ui'] = true;

		return $args;
	}
);
