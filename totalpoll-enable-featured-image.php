<?php
/**
 * This snippet adds the "Featured image" box in poll editor.
 *
 * @see https://totalsuite.net/documentation/totalpoll/codex/filters-reference/#totalpoll-filters-cpt-args
 * @license MIT
 * @author TotalSuite
 */
add_filter(
	'totalpoll/filters/cpt/args',
	function ( $args ) {
		$args['supports'][] = 'thumbnail';

		return $args;
	}
);
