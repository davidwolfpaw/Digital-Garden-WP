<?php
function convert_hashtags_to_note_tags( $post_id ) {
	// Check if it's a 'digital_garden_note' post type
	if ( get_post_type( $post_id ) !== 'digital_garden_note' ) {
		return;
	}

	// Get the post content
	$post_content = get_the_content( $post_id );

	// Regular expression to match hashtags and their content
	// TODO: This needs to handle more special character cases
	$pattern = '/#(\w+)/';
	preg_match_all( $pattern, $post_content, $matches );

	// Check if there are matches
	if ( ! empty( $matches[1] ) ) {
		// Get the note_tag taxonomy
		$taxonomy = 'note_tag';

		// Loop through the matched hashtags and add them as terms
		foreach ( $matches[1] as $tag_name ) {
			// Add the term to the post
			$term = wp_set_post_terms( $post_id, $tag_name, $taxonomy, true );
		}
	}
}
add_action( 'save_post', 'convert_hashtags_to_note_tags' );
