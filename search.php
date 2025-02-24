<?php get_header(); ?>
	<header class="page-header alignwide">
		<h1 class="page-title">
			「<?php the_search_query(); ?>」の検索結果
		</h1>
	</header><!-- .page-header -->
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post();
		get_template_part('excerpt');
	endwhile;
	sampletheme_the_posts_navigation();
else: ?>
	<div class="entry-content">
		<p>記事はありません。</p>
		<?php get_search_form(); ?>
		<?php if (is_active_sidebar('search_notfound')) : ?>
			<aside class="widget-area">
				<?php dynamic_sidebar('search_notfound'); ?>
			</aside><!-- .widget-area -->
		<?php endif; ?>
	</div>
<?php endif;
get_footer();
