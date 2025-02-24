</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<aside class="widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .widget-area -->
<?php endif; ?>

<footer id="colophon" class="site-footer">
	<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<nav aria-label="フッター" class="footer-navigation">
			<ul class="footer-navigation-wrapper">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'items_wrap'     => '%3$s',
						'container'	     => false,
						'depth'	         => 1,
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => false,
					)
				);
				?>
			</ul><!-- .footer-navigation-wrapper -->
		</nav><!-- .footer-navigation -->
	<?php endif; ?>
	<div class="site-info">
		<div class="site-name">
			<?php bloginfo( 'name' ); ?>
		</div><!-- .site-name -->
		<?php the_privacy_policy_link( '<div class="privacy-policy">', '</div>' );?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
