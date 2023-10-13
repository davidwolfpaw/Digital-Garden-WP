<?php
function setup_default_note_completeness_terms() {
	// Check if the taxonomy 'note_completeness' exists
	if ( taxonomy_exists( 'note_completeness' ) ) {
		// Define an array of default terms
		$default_terms = array(
			'Seedling',
			'Sapling',
			'Evergreen',
		);

		// Loop through the default terms and add them if they don't already exist
		foreach ( $default_terms as $term_name ) {
			if ( ! term_exists( $term_name, 'note_completeness' ) ) {
				wp_insert_term( $term_name, 'note_completeness' );
			}
		}
	}
}
add_action( 'digital_garden_activate', 'setup_default_note_completeness_terms', 0 );
