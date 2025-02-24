<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		$before_title = sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) );
		the_title( $before_title, '</a></h2>' );
		?>
		<figure class="post-thumbnail">
			<a class="post-thumbnail-inner alignwide" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure><!-- .post-thumbnail -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'entry-footer' ); ?>
</article><!-- #post-${ID} -->
