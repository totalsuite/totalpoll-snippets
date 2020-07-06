<?php
/**
 * This snippet overrides the JSON writer.
 *
 * @see https://totalsuite.net/documentation/totalpoll/codex/filters-reference/#totalpoll-filters-admin-log-export-writer-format
 * @license MIT
 * @author TotalSuite
 */

if ( class_exists( '\TotalPollVendors\TotalCore\Export\Writers\JsonWriter' ) ) {
	class TP_Custom_JSON_Writer extends \TotalPollVendors\TotalCore\Export\Writers\JsonWriter {

		/**
		 * Get content.
		 *
		 * @param array $columns
		 * @param array $data
		 *
		 * @return mixed|string
		 */
		public function getContent( array $columns, array $data ) {
			$columns = array_map( function ( $column ) {
				return $column->title;
			}, $columns );

			$data = array_map( function ( $item ) use ( $columns ) {
				return array_combine( $columns, $item );
			}, $data );

			return json_encode( $data, JSON_UNESCAPED_UNICODE );
		}
	}

	add_filter(
		'totalpoll/filters/admin/log/export/writer/json',
		function ( $writer ) {
			return new TP_Custom_JSON_Writer();
		}
	);

	add_filter(
		'totalpoll/filters/admin/log/export/row',
		function ( $rows, $entry ) {
			$rows[10] = json_encode( $entry->getEntry(), JSON_UNESCAPED_UNICODE );
			$rows[11] = json_encode( $entry->getDetails(), JSON_UNESCAPED_UNICODE );

			return $rows;
		},
		1, // Priority
		2 // Number of args
	);
}