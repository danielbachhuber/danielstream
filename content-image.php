<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_tax( 'post_format', 'post-format-image' ) && function_exists( 'get_post_format_meta' ) ) : ?>
		<div class="entry-content">
			@todo the image
		</div>	
	<?php else : ?>

	<header class="entry-header">
		<?php if ( !is_single() ) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'minimal_stream' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php else : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>

	</header><!-- .entry-header -->

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

	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
