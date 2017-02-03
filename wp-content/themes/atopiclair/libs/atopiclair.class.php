<?php
class Atopiclair_theme{

    public static function run() {
        add_action('after_setup_theme', function(){
           add_theme_support('post-thumbnails');
           add_image_size('share_thumbnail', 180, 180, array('center', 'center'));
            add_image_size('doctor_thumbnail', 220, 286, array('center', 'center'));
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
        add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
    }
    function special_nav_class ($classes, $item) {
        if (in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }
    public static function atopiclair_logo() {
        printf('<h1 class="header__top__logo"><a href="%s"><img src="%s" alt="%s"/></a></h1>', get_home_url('/'), ATOPICLAIR_THEME_URL . '/images/main_logo.png', get_bloginfo('name'));
    }
    public static function facebook_logo() {
        printf('<div class="header__top__face"><a target="_blank" href="%s"><img src="%s" alt="%s"/></a></div>', "https://www.facebook.com/atopiclairvn/", ATOPICLAIR_THEME_URL . '/images/main_face.png', get_bloginfo('name'));
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
            'container' => 'ul',
            'container_class' => '',
            'menu_class' => 'list-inline list-menu',
            'menu_id' => '',
            'walker' => new wp_bootstrap_navwalker(),
            'echo' => false,
        ));
    }
    public static function custom_pagination($max_num) {
        $big = 999999999; // need an unlikely integer
        $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $max_num,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
            'prev_text'    => __('<img src="' . ATOPICLAIR_THEME_URL . '/images/pagi_left.png" alt="">'),
            'next_text'    => __('<img src="' . ATOPICLAIR_THEME_URL . '/images/pagi_right.png" alt="">'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="pagination">';
            foreach ( $pages as $page ) {
                echo "<li>$page</li>";
            }
            echo '</ul>';
        }
    }

    public static function pagination($total, $paged){
        if($total > 1){
            $next = $paged + 1;
            $pre = $paged - 1;
            $firstPaged = 1;
            $lastPaged = $total;
            $displayLastPage = true;
            //Pre button
            if($paged > 1){
                echo '<li><a href=" ' . get_permalink() . '?page=' . $pre . '" aria-label="Previous"><img src="' . ATOPICLAIR_THEME_URL . '/images/pagi_left.png" alt=""></a></li>';
            }
            /**
             * Paging
             */
            if($total < 5){
                for($i = 1; $i <= $total; $i++){
                    if ($i == $paged) {
                        echo '<li><a class="active">' . $i . '</a></li>';
                    }else{
                        echo '<li><a href=" ' . get_permalink() . '?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
            }else{
                if($paged >= 1){
                    if ($firstPaged == $paged) {
                        echo '<li><a class="active">' . $firstPaged . '</a></li>';
                    }else{
                        echo '<li><a href=" ' . get_permalink() . '?page=' . $firstPaged . '">' . $firstPaged . '</a></li>';
                    }
                }
                if($paged > 2){
                    $u = $paged - 1;
                }else{
                    $u = 2;
                }
                $p = $u+2;
                if($paged >= $total-1){
                    $p--;
                    $u = $p - 2;
                    if($paged == $total){
                        $displayLastPage = false;
                    }
                }
//                echo $p; exit;
                if($u > 2){
                    echo "<li><a>...</a></li>";
                }
                for($i = $u; $i <= $p; $i++){
                    if ($i == $paged) {
                        echo '<li><a class="active">' . $i . '</a></li>';
                    }else{
                        echo '<li><a href=" ' . get_permalink() . '?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                if($p < $lastPaged -1){
                    echo "<li><a>...</a></li>";
                }
                if($paged <= $lastPaged && $displayLastPage){
                    if ($lastPaged == $paged) {
                        echo '<li><a class="active">' . $lastPaged . '</a></li>';
                    }else {
                        echo '<li><a href=" ' . get_permalink() . '?page=' . $lastPaged . '">' . $lastPaged . '</a></li>';
                    }
                }
            }
            //Next button
            if($paged < $total){
                echo '<li><a href="' . get_permalink() . '?page=' . $next . '" aria-label="Next"><img src="' . ATOPICLAIR_THEME_URL . '/images/pagi_right.png" alt=""></a></li>';
            }
        }
    }

}