<?php
class Atopiclair_theme{

    public static function run() {
        add_action('after_setup_theme', function(){

        });
        //Register menu
        add_action('init', function() {
            register_nav_menu ( 'primary', __('Atopiclair Menu', 'atopiclair') );
        });
        add_action('wp_enqueue_scripts', function() {
            //Insert style
            wp_register_style('screen', ATOPICLAIR_THEME_URL . '/css/screen.min.css');
            wp_enqueue_style('screen');

            //Insert script
            wp_register_script('start', ATOPICLAIR_THEME_URL . '/js/start.min.js');
            wp_enqueue_script('start');
        });
    }
    public static function atopiclair_logo() {
        printf('<h1 class="header__top__logo"><a href="%s"><img src="%s" alt="%s"/></a></h1>', get_home_url('/'), ATOPICLAIR_THEME_URL . '/images/main_logo.png', get_bloginfo('name'));
    }
    public static function facebook_logo() {
        printf('<div class="header__top__face"><a href="%s"><img src="%s" alt="%s"/></a></div>', get_home_url('/'), ATOPICLAIR_THEME_URL . '/images/main_face.png', get_bloginfo('name'));
    }
    public static function footer_left_logo() {
        printf('<div class="footer__left__logo"><a href="%s"><img src="%s" alt="%s"/></a></div>', get_home_url('/'), ATOPICLAIR_THEME_URL . '/images/main_traidat.png', get_bloginfo('name'));
    }
    public static function footer_right_logo() {
        printf('<div class="footer__right_logo"><a href="%s"><img src="%s" alt="%s"/></a></div>', get_home_url('/'), ATOPICLAIR_THEME_URL . '/images/main_logo-footer.png', get_bloginfo('name'));
    }
    public static function atopiclair_menu() {
        return wp_nav_menu(array(
            'menu' => 'primary',
            'theme_location' => 'primary',
            'depth' => 2,
            'container' => 'div',
            'container_class' => 'container-fluid',
            'menu_class' => 'list-inline',
            'menu_id' => '',
            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
            'walker' => new wp_bootstrap_navwalker(),
            'echo' => false,
        ));
    }
}