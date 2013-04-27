<?php

/**
 * Categories are old skool
 */
add_action( 'add_meta_boxes', 'td_remove_category_meta_box', 100 );
function td_remove_category_meta_box() {
	remove_meta_box( 'categorydiv', 'post', 'side' );
}
/**
 * ... but we still need them for things not to break :(
 */
add_action( 'save_post', 'td_assign_category_from_post_format' );
function td_assign_category_from_post_format( $post_id ) {

	if ( 'post' != get_post_type( $post_id ) )
		return;

	$post_format = get_post_format( $post_id );

	$formats_to_categories = array(
			'aside'         => 'asides',
			'gallery'       => 'galleries',
			'photo'         => 'photos',
			'quote'         => 'quotes',
			'status'        => 'statuses',
			'video'         => 'videos',
		);
	if ( isset( $formats_to_categories[$post_format] ) )
		$category = $formats_to_categories[$post_format];
	else
		$category = 'posts';

	wp_set_object_terms( $post_id, array( $category ), 'category' );
}