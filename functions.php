<?php
add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'script_theme');

function style_theme ()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
    wp_enqueue_style('media-queries', get_template_directory_uri() . '/assets/css/media-queries.css');
}

function script_theme ()
{
    wp_enqueue_style('init', get_template_directory_uri() . '/assets/js/init.js');
    wp_enqueue_style('doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js');
}