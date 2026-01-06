<?php
/**
 * Theme Functions and Definitions
 */

// Theme Setup
function alalma_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('القائمة الرئيسية', 'alalma-2026'),
        'footer' => __('قائمة التذييل', 'alalma-2026'),
    ));
}
add_action('after_setup_theme', 'alalma_theme_setup');

// Enqueue Styles and Scripts
function alalma_enqueue_scripts() {
    // Main stylesheet
    wp_enqueue_style('alalma-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // FontAwesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    // Google Fonts - Cairo
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');
    
    // Main JavaScript
    wp_enqueue_script('alalma-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'alalma_enqueue_scripts');

// Set content width
if (!isset($content_width)) {
    $content_width = 1200;
}

// Excerpt Length
function alalma_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'alalma_excerpt_length');

// Excerpt More
function alalma_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'alalma_excerpt_more');

// Custom Post Types can be added here
// Custom Taxonomies can be added here

?>
