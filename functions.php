<?php
add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'script_theme');
add_action('after_setup_theme', 'myMenu');

function myMenu ()
{
    register_nav_menu('top', 'Меню в шапке');
    register_nav_menu('footer', 'Меню в подвале');
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