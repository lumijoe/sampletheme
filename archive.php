<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .page-header -->

	<?php while ( have_posts() ) : ?>
		<?php the_post();
		get_template_part( 'excerpt' );
	endwhile; ?>

	<?php
	sampletheme_the_posts_navigation();
	?>

<?php else : ?>
	記事はありません。
<?php endif; ?>

<?php get_footer();