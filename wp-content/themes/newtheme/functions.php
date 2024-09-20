<?php
/*Define actions */
function m_add_title_support_to_theme () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

function m_register_assets () {
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

function m_theme_title_separator($separator) {
    return '|';
}


/*Add actions */
add_action('after_setup_theme', 'm_add_title_support_to_theme');
add_action('wp_enqueue_scripts', 'm_register_assets');
add_filter('document_title_separator', 'm_theme_title_separator');
// add_filter('document_title_parts', 'm_doc_title_parts');
