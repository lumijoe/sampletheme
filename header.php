<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">コンテンツへスキップ</a>

	<?php
	$wrapper_classes = 'site-header';
	$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
	?>

	<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>">
		<?php if ( is_front_page() ) : ?>
			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif; ?>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="primary-navigation" aria-label="プライマリーメニュー">
				<div class="menu-button-container">
					<button id="primary-mobile-menu" class="button" aria-controls="primary-menu-list"
							aria-expanded="false">
						<span class="dropdown-icon open">≡</span>
						<span class="dropdown-icon close">×</span>
					</button><!-- #primary-mobile-menu -->
				</div><!-- .menu-button-container -->
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'menu_class'      => 'menu-wrapper',
						'container_class' => 'primary-menu-container',
						'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
						'fallback_cb'     => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
