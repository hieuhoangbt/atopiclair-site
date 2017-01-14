<?php
if(!function_exists('add_action')){
    echo "Vui lòng quay lại!"; exit;
}
class AtopiclairDoctor{
    protected static $instance;

    protected function __construct() {
        
    }

    protected function __clone() {
        
    }

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new AtopiclairDoctor();
        }
        return self::$instance;
    }
    public static function run(){
        $instance = self::get_instance();
        add_action('init', function() {
            self::register_post_type();
        });

        add_action('admin_enqueue_scripts', function() {
            self::register_scripts();
        });

        add_action('save_post', function($post) {
            self::save_meta_box($post);
        });
        
        add_filter('manage_doctor_posts_columns', array($instance, 'set_custom_edit_doctor_columns'));
        
        add_action('manage_doctor_posts_custom_column', array($instance, 'custom_doctor_column'), 10, 2);
        
        add_action('after_setup_theme', function(){
            add_theme_support('post-thumbnails');            
        });
        return $instance;
    }
    public static function register_post_type() {
        $instance = self::get_instance();
        $labels = array(
            'name' => _x('Doctor Idea', 'Post Type General Name', 'atopiclair'),
            'singular_name' => _x('Doctor Idea', 'Post Type Singular Name', 'atopiclair'),
            'menu_name' => __('Doctor Idea', 'atopiclair'),
            'name_admin_bar' => __('Doctor Idea', 'atopiclair'),
            'parent_item_colon' => __('Parent Item:', 'atopiclair'),
            'all_items' => __('List Doctor Idea', 'atopiclair'),
            'add_new_item' => __('Add New Doctor Idea', 'atopiclair'),
            'add_new' => __('Add New', 'atopiclair'),
            'new_item' => __('New Doctor Idea', 'atopiclair'),
            'edit_item' => __('Edit Doctor Idea', 'atopiclair'),
            'update_item' => __('Update Doctor Idea', 'atopiclair'),
            'view_item' => __('View Doctor Idea', 'atopiclair'),
            'search_items' => __('Search Doctor Idea', 'atopiclair'),
            'not_found' => __('Not find', 'atopiclair'),
            'not_found_in_trash' => __('Not find in trash', 'atopiclair'),
        );
        $rewrite = array(
            'slug' => 'doctor',//$page_slug->post_name,
            'with_front' => true,
            'pages' => true,
            'feeds' => true,
        );
        $args = array(
            'label' => __('doctor idea', 'atopiclair'),
            'description' => __('Doctor idea post type', 'atopiclair'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'hierarchical' => FALSE,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-book-alt',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'rewrite' => $rewrite,
            'capability_type' => 'post',
        );
        register_post_type('doctor', $args);
        return $instance;
    }
    
    
    public static function set_custom_edit_doctor_columns($columns){
        $columns = array(
            'cb'           => $columns['cb'],
            'title'        => $columns['title'],
            'post_thumb'   => 'Image',
            'content'         => 'Content',
            'date'         => $columns['date'],
        );
        return $columns;
    }

    public static function register_scripts() {
        wp_register_style('atopiclair_admin_css', ATOPICLAIR_PLUGIN_URL . '/scripts/css/admin-style.css');
        wp_enqueue_style('atopiclair_admin_css');

        wp_register_script('atopiclair_admin_js', ATOPICLAIR_PLUGIN_URL . '/scripts/js/admin-js.js');
        wp_enqueue_script('atopiclair_admin_js');
    }

    public static function save_meta_box($post_id) {
        if (!isset($_POST['atopiclair_security'])) {
            return;
        }
        if (!wp_verify_nonce($_POST['atopiclair_security'], $post_id)) {
            return;
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {

            if (!current_user_can('edit_page', $post_id)) {
                return;
            }
        } else {

            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        }

        $data = $_POST['doctor'];
        update_post_meta($post_id, 'doctor', $data);
    }

    public static function custom_doctor_column($columns, $post_id){
        $data = get_post_meta($post_id, 'doctor')[0];
        switch ($columns){
            case 'content':
                echo get_the_content($post_id,'content');
                break;
            case 'post_thumb':
                if(has_post_thumbnail($post_id)){
                    echo get_the_post_thumbnail($post_id, 'thumbnail');
                }
                break;
        }
    }
}

