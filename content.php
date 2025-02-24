<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<figure class="post-thumbnail">
			<?php
			the_post_thumbnail( 'post-thumbnail', array( 'loading' => false ) );
			?>
		</figure><!-- .post-thumbnail -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		// 4章08 カスタムフィールド
		if ( is_singular( 'post' ) && in_category( 'bookreview' ) ) :
			?>
			<table>
				<tr><td>書籍名</td><td><?php echo esc_html( get_post_meta( $post->ID, '書籍名', true ) ); ?></td></tr>
				<tr><td>出版社</td><td><?php echo esc_html( get_post_meta( $post->ID, '出版社', true ) ); ?></td></tr>
				<tr><td>著者</td><td><?php
						$authors = get_post_meta( $post->ID, '著者', false );
						echo esc_html( implode( ', ', $authors ) );
						?></td></tr>
				<tr><td>価格</td><td><?php echo esc_html( get_post_meta( $post->ID, '価格', true ) );
						?>円</td></tr>
			</table>
		<?php
		endif;
		?>
		<?php
		wp_link_pages();
		?>
	</div><!-- .entry-content -->
	<?php if ( is_singular( 'post' ) ) {?>
		<?php get_template_part( 'entry-footer' ); ?>

		<div class="entry-content">
			<?php
			// 4章07 メインクエリとは異なるコンテンツ
			$postid   = get_the_ID();
			$authorid = get_the_author_meta( 'ID' );

			$args	= array(
				'posts_per_page' => 5,
				'author'		 => $authorid,
				'orderby'		=> 'rand',
				'exclude'		=> $postid
			);

			$myposts = get_posts( $args );
			echo '<h3>同じ人が書いた記事</h3>';
			// var_dump( $myposts ); // 5章07 エラー処理
			if ( $myposts ) :
				echo '<ul>';
				foreach ( $myposts as $post ) :
					setup_postdata( $post ); ?>
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</li>
				<?php endforeach;
				wp_reset_postdata();
				echo '</ul>';
			else :
				echo '記事はありません';
			endif;
			?>
		</div>
	<?php } //is_singular( 'post' ) ?>
</article><!-- #post-<?php the_ID(); ?> -->