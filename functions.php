<?php
add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_enqueue_scripts', 'script_theme');
add_action('after_setup_theme', 'myMenu');
add_action('widgets_init', 'register_my_widgets');


add_filter( 'document_title_separator', 'filter_function_name_4326' );
function filter_function_name_4326( $sep ){
	$sep = ' | ';

	return $sep;
}


add_filter( 'the_content', 'content' );
function content( $content ) {
	$content .= 'Тут был я';

	return $content;
}


function register_my_widgets () // виджет
{
    register_sidebar( array(
        'name'          => 'Left Sidebar',
        'id'            => "left_sidebar",
        'description'   => 'Описание сайдбара',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h5>\n",
    ) );

	register_sidebar( array(
		'name'          => 'sidebar',
		'id'            => "sidebar",
		'description'   => 'Описание сайдбара',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h5>\n",
	) );
}

function myMenu ()  // подключает меню
{
    register_nav_menu('top', 'Меню в шапке');
    register_nav_menu('footer', 'Меню в подвале');
    add_theme_support('title-tag'); //выводит title страницы автоматически
    add_theme_support('post-thumbnails', array('post')); // минеатюру в post
    add_theme_support('post-formats', array('aside', 'video'));//шаблон поста для разных типов
    add_image_size('anime', 1280, 720, true);


    // удаляет H2 из шаблона пагинации
    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
    function my_navigation_template( $template, $class ){
        /*
        Вид базового шаблона:
        <nav class="navigation %1$s" role="navigation">
            <h2 class="screen-reader-text">%2$s</h2>
            <div class="nav-links">%3$s</div>
        </nav>
        */

        return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
    }

// выводим пагинацию
    the_posts_pagination( array(
        'end_size' => 2,
    ) );
}


function style_theme ()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
    wp_enqueue_style('media-queries', get_template_directory_uri() . '/assets/css/media-queries.css');
}

function script_theme ()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('migrate', get_template_directory_uri() . '/assets/js/jquery-migrate-1.2.1.min.js', ['jquery'],
        null, true);
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', ['jquery'],
        null, true);
    wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js', ['jquery'], null, true);
    wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js', ['jquery'],
        null, true);
}


function Generate_iframe( $atts ) {
	$atts = shortcode_atts( array(
		'href'   => 'http://example.com',
		'height' => '550px',
		'width'  => '600px',
	), $atts );

	return '<iframe src="'. $atts['href'] .'" width="'. $atts['width'] .'" height="'. $atts['height'] .'"> 
		<p>Ваш новый шорткод</p></iframe>';
}
add_shortcode('iframe', 'Generate_iframe');
// использование: [iframe href="http://www.exmaple.com" height="480" width="640"]