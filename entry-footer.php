<footer class="entry-footer default-max-width">

	<span class="posted-on">
			投稿日: <?php echo esc_html( get_the_date() ); ?>
	</span>
	<div class="post-taxonomies">
		<span class="cat-links">カテゴリー: <?php the_category( ', ');?></span>
		<?php
		the_tags('<span class="tags-links">タグ: ', ',', '</span>' );
		?>
	</div>
</footer><!-- .entry-footer -->