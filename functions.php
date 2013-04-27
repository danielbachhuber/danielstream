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

/**
 * Tin-foil hat: off
 */
add_action( 'wp_footer', 'td_wp_footer_google_analytics' );
function td_wp_footer_google_analytics () {
	// Don't log me!
	if ( is_user_logged_in() )
		return;
	?>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-40493114-1', 'danielbachhuber.com');
	ga('send', 'pageview');
</script>
<?php
}