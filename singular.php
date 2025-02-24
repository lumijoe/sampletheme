<?php get_header();

while ( have_posts() ) :
	the_post();

	get_template_part( 'content' );

	if ( comments_open() || get_comments_number() ) {
		?>
		<div class="entry-content">
			<?php
				comments_template();
			?>
		</div>
		<?php
	}
	if ( is_singular( 'post' ) ) {
		the_post_navigation(
			array(
				'next_text' => '<p class="meta-nav">&gt;&gt;</p><p class="post-title">%title</p>',
				'prev_text' => '<p class="meta-nav">&lt;&lt;</p><p class="post-title">%title</p>',
				// 'in_same_term' => true // 同じカテゴリーにする
			)
		);
	} //is_singular( 'post' )
endwhile;

get_footer();
