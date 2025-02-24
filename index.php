<?php
get_header();
?>

<?php
if ( have_posts() ) {

	while ( have_posts() ) {
		the_post();
		get_template_part( 'excerpt' );
	}

	sampletheme_the_posts_navigation();

} else {
	echo '記事はありません。';
}

get_footer();
