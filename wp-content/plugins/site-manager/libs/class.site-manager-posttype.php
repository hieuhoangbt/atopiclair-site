<?php
if (!function_exists('add_action')) {
    echo "Please go out now!";
    exit;
}

class SiteManagerPosttype {

    protected static $instance;

    protected function __construct() {
        
    }

    protected function __clone() {
        
    }

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new SiteManagerPosttype();
        }
        return self::$instance;
    }

    public static function run() {
        $instance = self::get_instance();
        //Register posttype
        add_action('init', function() {
            self::register_post_type();
        });

        add_action('admin_init', function() {
            self::register_meta_box();
        });

        add_action('save_post', function($post) {
            self::save_meta_box($post);
        });

        //Register scripts
        add_action('admin_enqueue_scripts', function() {
            self::register_scripts();
        });

        //Register columns
        add_filter('manage_story_posts_columns', array($instance, 'register_columns'));
        add_filter('manage_expert_posts_columns', array($instance, 'register_columns_expert'));
        add_filter('manage_medicaladvice_posts_columns', array($instance, 'register_columns_medicaladvice'));
        add_filter('manage_doctor_posts_columns', array($instance, 'register_columns_doctor'));
        add_filter('manage_doctorpost_posts_columns', array($instance, 'register_columns_doctorpost'));
        add_filter('manage_video_posts_columns', array($instance, 'register_columns_video'));
        
        add_filter("upload_mimes", array($instance, 'add_more_mimes'), 1,1);

        //Display list product
        add_action('manage_story_posts_custom_column', array($instance, 'list_story'), 10, 2);
        add_action('manage_expert_posts_custom_column', array($instance, 'list_expert'), 10, 2);
        add_action('manage_medicaladvice_posts_custom_column', array($instance, 'list_medicaladvice'), 10, 2);
        add_action('manage_doctor_posts_custom_column', array($instance, 'list_doctor'), 10, 2);
        add_action('manage_doctorpost_posts_custom_column', array($instance, 'list_doctorpost'), 10, 2);
        add_action('manage_video_posts_custom_column', array($instance, 'list_video'), 10, 2);

        //Open post thumbnail
        add_action('after_setup_theme', function() {
            add_theme_support('post-thumbnails');
        });

        return $instance;
    }


    public static function register_post_type() {
        $instance = self::get_instance();
        $labels = array(
            'name' => _x('Stories', 'Post Type General Name', 'vuonxa'),
            'singular_name' => _x('Story', 'Post Type Singular Name', 'vuonxa'),
            'menu_name' => __('Stories', 'vuonxa'),
            'name_admin_bar' => __('Story', 'vuonxa'),
            'archives' => __('Item Archives', 'vuonxa'),
            'parent_item_colon' => __('Parent Item:', 'vuonxa'),
            'all_items' => __('All Items', 'vuonxa'),
            'add_new_item' => __('Add New Item', 'vuonxa'),
            'add_new' => __('Add New', 'vuonxa'),
            'new_item' => __('New Item', 'vuonxa'),
            'edit_item' => __('Edit Item', 'vuonxa'),
            'update_item' => __('Update Item', 'vuonxa'),
            'view_item' => __('View Item', 'vuonxa'),
            'search_items' => __('Search Item', 'vuonxa'),
            'not_found' => __('Not found', 'vuonxa'),
            'not_found_in_trash' => __('Not found in Trash', 'vuonxa'),
            'featured_image' => __('Featured Image', 'vuonxa'),
            'set_featured_image' => __('Set featured image', 'vuonxa'),
            'remove_featured_image' => __('Remove featured image', 'vuonxa'),
            'use_featured_image' => __('Use as featured image', 'vuonxa'),
            'insert_into_item' => __('Insert into item', 'vuonxa'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'vuonxa'),
            'items_list' => __('Items list', 'vuonxa'),
            'items_list_navigation' => __('Items list navigation', 'vuonxa'),
            'filter_items_list' => __('Filter items list', 'vuonxa'),
        );
        $rewrite = array(
            'slug' => 'story',
            'with_front' => true,
            'pages' => true,
            'feeds' => true,
        );
        $args = array(
            'label' => __('Story', 'vuonxa'),
            'description' => __('Glydie story', 'vuonxa'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail', 'slug',),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-share',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'rewrite' => $rewrite,
            'capability_type' => 'page',
        );

        register_post_type('story', $args);


        $labels = array(
            'name' => _x('Medical Advice', 'Post Type General Name', 'vuonxa'),
            'singular_name' => _x('Medical Advice', 'Post Type Singular Name', 'vuonxa'),
            'menu_name' => __('Medical Advices', 'vuonxa'),
            'name_admin_bar' => __('Medical Advice', 'vuonxa'),
            'archives' => __('Item Archives', 'vuonxa'),
            'parent_item_colon' => __('Parent Item:', 'vuonxa'),
            'all_items' => __('All Items', 'vuonxa'),
            'add_new_item' => __('Add New Item', 'vuonxa'),
            'add_new' => __('Add New', 'vuonxa'),
            'new_item' => __('New Item', 'vuonxa'),
            'edit_item' => __('Edit Item', 'vuonxa'),
            'update_item' => __('Update Item', 'vuonxa'),
            'view_item' => __('View Item', 'vuonxa'),
            'search_items' => __('Search Item', 'vuonxa'),
            'not_found' => __('Not found', 'vuonxa'),
            'not_found_in_trash' => __('Not found in Trash', 'vuonxa'),
            'featured_image' => __('Featured Image', 'vuonxa'),
            'set_featured_image' => __('Set featured image', 'vuonxa'),
            'remove_featured_image' => __('Remove featured image', 'vuonxa'),
            'use_featured_image' => __('Use as featured image', 'vuonxa'),
            'insert_into_item' => __('Insert into item', 'vuonxa'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'vuonxa'),
            'items_list' => __('Items list', 'vuonxa'),
            'items_list_navigation' => __('Items list navigation', 'vuonxa'),
            'filter_items_list' => __('Filter items list', 'vuonxa'),
        );
        $rewrite = array(
            'slug' => 'medicaladvice',
            'with_front' => true,
            'pages' => true,
            'feeds' => true,
        );
        $args = array(
            'label' => __('Medical Advice', 'vuonxa'),
            'description' => __('Medical Advice', 'vuonxa'),
            'labels' => $labels,
            'supports' => array('editor'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-phone',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'rewrite' => $rewrite,
            'capability_type' => 'page',
        );


        register_post_type('medicaladvice', $args);

        $labels = array(
            'name' => _x('Experts', 'Post Type General Name', 'vuonxa'),
            'singular_name' => _x('Expert', 'Post Type Singular Name', 'vuonxa'),
            'menu_name' => __('Questions', 'vuonxa'),
            'name_admin_bar' => __('Question', 'vuonxa'),
            'archives' => __('Item Archives', 'vuonxa'),
            'parent_item_colon' => __('Parent Item:', 'vuonxa'),
            'all_items' => __('All Items', 'vuonxa'),
            'add_new_item' => __('Add New Item', 'vuonxa'),
            'add_new' => __('Add New', 'vuonxa'),
            'new_item' => __('New Item', 'vuonxa'),
            'edit_item' => __('Edit Item', 'vuonxa'),
            'update_item' => __('Update Item', 'vuonxa'),
            'view_item' => __('View Item', 'vuonxa'),
            'search_items' => __('Search Item', 'vuonxa'),
            'not_found' => __('Not found', 'vuonxa'),
            'not_found_in_trash' => __('Not found in Trash', 'vuonxa'),
            'featured_image' => __('Featured Image', 'vuonxa'),
            'set_featured_image' => __('Set featured image', 'vuonxa'),
            'remove_featured_image' => __('Remove featured image', 'vuonxa'),
            'use_featured_image' => __('Use as featured image', 'vuonxa'),
            'insert_into_item' => __('Insert into item', 'vuonxa'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'vuonxa'),
            'items_list' => __('Items list', 'vuonxa'),
            'items_list_navigation' => __('Items list navigation', 'vuonxa'),
            'filter_items_list' => __('Filter items list', 'vuonxa'),
        );
        $rewrite = array(
            'slug' => 'expert',
            'with_front' => true,
            'pages' => true,
            'feeds' => true,
        );
        $args = array(
            'label' => __('Expert', 'vuonxa'),
            'description' => __('Question and anwser', 'vuonxa'),
            'labels' => $labels,
            'supports' => array(''),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-testimonial',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'rewrite' => $rewrite,
            'capability_type' => 'page',
        );
        register_post_type('expert', $args);
        
        //Doctor
        $labels = array(
            'name' => _x('Doctor', 'Post Type General Name', 'vuonxa'),
            'singular_name' => _x('Doctor', 'Post Type Singular Name', 'vuonxa'),
            'menu_name' => __('Doctors', 'vuonxa'),
            'name_admin_bar' => __('Doctor', 'vuonxa'),
            'archives' => __('Item Archives', 'vuonxa'),
            'parent_item_colon' => __('Parent Item:', 'vuonxa'),
            'all_items' => __('All Items', 'vuonxa'),
            'add_new_item' => __('Add New Item', 'vuonxa'),
            'add_new' => __('Add New', 'vuonxa'),
            'new_item' => __('New Item', 'vuonxa'),
            'edit_item' => __('Edit Item', 'vuonxa'),
            'update_item' => __('Update Item', 'vuonxa'),
            'view_item' => __('View Item', 'vuonxa'),
            'search_items' => __('Search Item', 'vuonxa'),
            'not_found' => __('Not found', 'vuonxa'),
            'not_found_in_trash' => __('Not found in Trash', 'vuonxa'),
            'featured_image' => __('Featured Image', 'vuonxa'),
            'set_featured_image' => __('Set featured image', 'vuonxa'),
            'remove_featured_image' => __('Remove featured image', 'vuonxa'),
            'use_featured_image' => __('Use as featured image', 'vuonxa'),
            'insert_into_item' => __('Insert into item', 'vuonxa'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'vuonxa'),
            'items_list' => __('Items list', 'vuonxa'),
            'items_list_navigation' => __('Items list navigation', 'vuonxa'),
            'filter_items_list' => __('Filter items list', 'vuonxa'),
        );
        $rewrite = array(
            'slug' => 'doctor',
            'with_front' => true,
            'pages' => true,
            'feeds' => true,
        );
        $args = array(
            'label' => __('Doctor', 'vuonxa'),
            'description' => __('Doctor manager', 'vuonxa'),
            'labels' => $labels,
            'supports' => array('title','editor', 'thumbnail', 'slug'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-businessman',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'rewrite' => $rewrite,
            'capability_type' => 'page',
        );

        register_post_type('doctor', $args);

        flush_rewrite_rules();
        return $instance;
    }
    
    public static function add_more_mimes($mime_types){
        //var_dump( wp_get_mime_types() );die;
       $instance=self::get_instance();
       $mime_types['ogv']="application/ogg";
       return $mime_types;
    }

    public static function register_meta_box() {
        $instance = self::get_instance();
        add_meta_box('story', __('Custom Info', 'vuonxa'), function($post) {
            $data = get_post_meta($post->ID, 'story')[0];
            require_once PLG_PLUGIN_DIR . '/views/backend/story.php';
        }, 'story', 'normal', 'core');
        add_meta_box('expert', __('Custom Info', 'vuonxa'), function($post) {
            $data = get_post_meta($post->ID, 'expert')[0];
            require_once PLG_PLUGIN_DIR . '/views/backend/question.php';
        }, 'expert', 'normal', 'core');
        add_meta_box('medicaladvice', __('Custom Info', 'vuonxa'), function($post) {
            $data = get_post_meta($post->ID, 'medicaladvice')[0];
            require_once PLG_PLUGIN_DIR . '/views/backend/medicaladvice.php';
        }, 'medicaladvice', 'normal', 'core');
        add_meta_box('doctor', __('Custom Info', 'vuonxa'), function($post) {
            $data = get_post_meta($post->ID, 'doctor')[0];
            require_once PLG_PLUGIN_DIR . '/views/backend/doctor.php';
        }, 'doctor', 'normal', 'core');

        return $instance;
    }

    public static function register_columns($columns) {
        $columns = array(
            'cb' => $columns['cb'],
            'title' => $columns['title'],
            'post_thumb' => 'Image',
            'highlight' => 'Highlight homepage',
            'date' => $columns['date'],
        );
        return $columns;
    }

    public static function register_columns_expert($columns) {
        $columns = array(
            'cb' => $columns['cb'],
            'question' => 'Question',
            'answer' => 'Answer',
            'date' => $columns['date'],
        );
        return $columns;
    }

    public static function register_columns_medicaladvice($columns) {
        $columns = array(
            'cb' => $columns['cb'],
            'doctor' => 'Doctor',
            'content' => 'Content',
            'date' => $columns['date'],
        );
        return $columns;
    }
    public static function register_columns_doctor($columns) {
        $columns = array(
            'cb' => $columns['cb'],
            'title' => $columns['title'],
            'content' => 'Content',
            'post_thumb' => 'Thumbnail',
            'date' => $columns['date'],
        );
        return $columns;
    }

    public static function register_scripts() {
        wp_register_style('vuonxa_admin_css', PLG_PLUGIN_URL . '/scripts/css/admin-style.css');
        wp_enqueue_style('vuonxa_admin_css');

        wp_register_script('vuonxa_admin_js', PLG_PLUGIN_URL . '/scripts/js/admin-js.js');
        wp_enqueue_script('vuonxa_admin_js');

        wp_register_script('vuonxa_function_js', PLG_PLUGIN_URL . '/scripts/js/functions.js');
        wp_enqueue_script('vuonxa_function_js');

        wp_localize_script('vuonxa_function_js', 'wpajax', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));
    }

    public static function list_story($columns, $post_id) {
        $data = get_post_meta($post_id, 'story')[0];
        switch ($columns) {
            case 'highlight':
                if($data['highlight']==1){
                    printf('<span class="dashicons dashicons-yes" style="color: green"></span>');
                }else{
                    printf('<span class="dashicons dashicons-no" style="color: red"></span>');
                }
                break;
            case 'post_thumb':
                if (has_post_thumbnail($post_id)) {
                    echo get_the_post_thumbnail($post_id, 'thumbnail');
                }
                break;
        }
    }

    public static function list_expert($columns, $post_id) {
        $data = get_post_meta($post_id, 'expert')[0];
        switch ($columns) {
            case 'question':
                echo $data['question'];
                break;
            case 'answer':
                echo $data['answer'];
                break;
        }
    }
    public static function list_doctor($columns, $post_id) {
        switch ($columns) {
            case 'content':
                echo get_the_content($post_id,'content');
                break;
            case 'post_thumb':
                if (has_post_thumbnail($post_id)) {
                    echo get_the_post_thumbnail($post_id, 'thumbnail');
                }
                break;
        }
    }

    public static function list_medicaladvice($columns, $post_id) {
        $data = get_post_meta($post_id, 'medicaladvice')[0];
        switch ($columns) {
            case 'doctor':
                echo $data['doctor'];
                break;
            case 'content':
                echo get_the_content($post_id,'content');
                break;
            case 'post_thumb':
                if (has_post_thumbnail($post_id)) {
                    echo get_the_post_thumbnail($post_id, 'thumbnail');
                }
                break;
        }
    }
    public static function list_video($columns, $post_id) {
        $data = get_post_meta($post_id, 'video')[0];
        switch ($columns) {
            case 'video':
                echo get_the_content($post_id,'content');
                break;
        }
    }

    public static function save_meta_box($post_id) {
        if (!isset($_POST['vuonxa_security'])) {
            return;
        }
        if (!wp_verify_nonce($_POST['vuonxa_security'], $post_id)) {
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
        switch ($_POST['post_type']) {
            case "expert":
                $data = $_POST['expert'];
                update_post_meta($post_id, 'expert', $data);
                break;
            case "story":
                $data = $_POST['story'];
                update_post_meta($post_id, 'story', $data);
                break;
            case "medicaladvice":
                $data = $_POST['medicaladvice'];
                update_post_meta($post_id, 'medicaladvice', $data);
                break;
            case "doctor":
                $data = $_POST['doctor'];
                update_post_meta($post_id, 'doctor', $data);
                break;
        }
    }

}
