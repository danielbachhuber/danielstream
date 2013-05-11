<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'minimal_stream' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'minimal_stream' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'minimal_stream' ), '<span class="edit-link">', '</span>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="post-meta">
			<span class="entry-date"><?php minimal_stream_posted_on(); ?></span>
			<span class="entry-tags"><?php the_tags('', ', '); ?> </span>
		</div>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
