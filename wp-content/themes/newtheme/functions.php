<?php
/*Define actions */
function m_add_support_to_theme () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'This is the header menu');
    register_nav_menu('footer', 'This is the footer menu');

    add_image_size('card-header', 350, 215, true);
    /*remove_image_size('medium');//remove an already defined size
    **add_image_size('medium', 500, 500, true);//replace it with a new one
    */
}

function m_register_assets () {
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    // wp_register_style('style', 'style.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js', [], false, true);
    wp_enqueue_style('newtheme-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap');
    // wp_enqueue_style('style');
    wp_enqueue_script('bootstrap');
}

function m_theme_title_separator($separator) {
    return '|';
}

/**
 * @param array classes
 * @return array
 */
function m_menu_class(array $classes): array {
    // var_dump(func_get_args());//prints the arguments passed to the function.
    // die();
    $classes[]= "nav-item";
    return $classes;
}

/**
 * @param array classes
 * @return array
 */
function m_menu_link_class(array $attrs): array {
    $attrs['class']= "nav-link";
    return $attrs;
}

function m_pagination() {
    echo "<nav aria-label='Pagination' class='my-4'>";
    echo "<ul class='pagination'>";
    $pages= paginate_links(['type'=> 'array']);
    if ($pages=== null) {
        return;
    }

    foreach ($pages as $page) {
        $active= strpos($page, 'current') !== false;
        $class= 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</ul>';
    echo "</nav>";
}

function m_init() {
    register_taxonomy('sport', 'post', [
        'labels' => [
            'name' => 'Sport',
            'singular_name' => 'Sport',
            'plural_name' => 'Sports',
            'search_items' => 'Search for sport',
            'all_items' => 'All sports',
            'edit_items' => 'Edit sport',
            'update_item' => 'Update sport',
            'add_new_item' => 'Add new sport',
            'new_item_name' => 'Add new sport name',
            'menu_name' => 'Sport',

        ],
        'show_in_rest'=> true,
        'hierarchical'=> true,
        'show_admin_column' => true
    ]);
    register_post_type('belonging', [
        'label'=> 'Belonging',
        'public'=> true,
        'menu_position'=> 3,//the position in the wordpress sidebar menu
        'menu_icon'=> 'dashicons-building',// list of preset icons -> https://developer.wordpress.org/resource/dashicons/#migrate
        'supports'=> ['title', 'editor', 'thumbnail'],
        'show_in_rest'=> true,
        'has_archive'=> true
    ]);
}

/*Add actions */
add_action('init', 'm_init');
add_action('after_setup_theme', 'm_add_support_to_theme');
add_action('wp_enqueue_scripts', 'm_register_assets');
add_filter('document_title_separator', 'm_theme_title_separator');
add_filter('nav_menu_css_class', 'm_menu_class');
add_filter('nav_menu_link_attributes', 'm_menu_link_class');

require_once('metaboxes/sponso.php');
SponsoMetaBox::register();

// add_filter('document_title_parts', 'm_doc_title_parts');
