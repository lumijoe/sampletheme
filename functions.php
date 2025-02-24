<?php

// テーマの設定
if ( ! function_exists( 'sampletheme_setup' ) ) {
	function sampletheme_setup() {

		add_theme_support( 'editor-styles' );

		add_editor_style( './assets/css/style-editor.css' );
		add_editor_style( 'style.css' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => 'プライマリ',
				'footer'  => 'フッター',
			)
		);

		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' ); // theme.json で設定可能

		add_theme_support( 'responsive-embeds' );

	}
}
add_action( 'after_setup_theme', 'sampletheme_setup' );

// コンテンツ幅の設定
function sampletheme_content_width() {
	$GLOBALS['content_width'] = 750;
}

add_action( 'after_setup_theme', 'sampletheme_content_width', 0 );

// ウィジェットの設定 4章06フッター
function sampletheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => 'フッター',
			'id'            => 'sidebar-1',
			'description'   => 'フッターウィジェットです',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);
	register_sidebar(
		array(
			'name'          => '検索',
			'id'            => 'search_notfound',
			'description'   => '検索結果が0件のときに表示するウィジェット',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);
}

add_action( 'widgets_init', 'sampletheme_widgets_init' );

//テーマで読み込むスタイルシート・スクリプト
function sampletheme_scripts() {
	wp_enqueue_style( 'sampletheme-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_enqueue_script(
		'sampletheme_scripts-primary-navigation-script',
		get_theme_file_uri( '/assets/js/primary-navigation.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'sampletheme-responsive-embeds-script',
		get_theme_file_uri( '/assets/js/responsive-embeds.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'sampletheme_scripts' );

// body_classへクラス属性を追加
function sampletheme_body_classes( $classes ) {
	if ( is_singular() ) {
		$classes[] = 'singular';
	} else {
		$classes[] = 'hfeed';
	}

	if ( has_nav_menu( 'primary' ) ) {
		$classes[] = 'has-main-navigation';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-widgets';
	}

	return $classes;
}
add_filter( 'body_class', 'sampletheme_body_classes' );

// post_classへのクラス属性追加。
function sampletheme_post_classes( $classes ) {
	$classes[] = 'entry';

	return $classes;
}

add_filter( 'post_class', 'sampletheme_post_classes', 10, 3 );

// ページナビゲーション 4章04アーカイブ
if ( ! function_exists( 'sampletheme_the_posts_navigation' ) ) {
	function sampletheme_the_posts_navigation() {
		the_posts_pagination(
			array(
				'prev_text' => '&larr;<span class="nav-prev-text">新しい投稿</span>',
				'next_text' => '<span class="nav-next-text">古い投稿</span> &rarr;'
			)
		);
	}
}