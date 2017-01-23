<?php
/*
  Template Name: Chia sẻ
 */
if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} else if (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$params_filter = array(
    'posts_per_page' => 3,
    'post_type' => 'story',
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'DESC',
    'paged' => $paged
);
$stories = new WP_Query($params_filter);
get_header();
?>
    <div class="content">
        <div class="share">
            <div class="blog blog--share">
                <div class="container-fluid">
                    <div class="blog__ders">
                        <h2 class="title-info title-info--big blog__ders__title">chia sẻ</h2>

                        <div class="quote-info blog__ders__quote">
                            <ul class="list-inline list-children">
                                <?php
                                if ($stories->have_posts()) {
                                    while ($stories->have_posts()) {
                                        $stories->the_post();
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "share_thumbnail");
                                        ?>
                                        <li class="item">
                                            <div class="list-children__thumb">
                                                <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                                            </div>
                                            <div class="list-children__name">
                                                <span>Bé</span>
                                                <span><?php the_title(); ?></span>
                                            </div>
                                            <div class="list-children__ders">
                                                <p>
                                                    <?php the_content(); ?>
                                                </p>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                    wp_reset_query();
                                }
                                ?>

                            </ul>
                            <nav class="pagi-list right" aria-label="Page navigation">
                                <ul class="pagination">
                                    <?php
                                    $total = $stories->max_num_pages;
                                    if ($total > 1) {
                                        $next = $paged + 1;
                                        $pre = $paged - 1;

                                        if ($paged > 1) {
                                            echo '<li><a href=" ' . get_permalink() . '?page=' . $pre . '" aria-label="Previous"><img src="' . ATOPICLAIR_THEME_URL . '/images/pagi_left.png" alt=""></a></li>';
                                        }
                                        for ($i = 1; $i <= $total; $i++) {
                                            if ($i == $paged) {
                                                echo '<li><a class="active">' . $i . '</a></li>';
                                            } else {
                                                if ($total > 5) {
                                                    if ($i < 4 || $i==$total) {
                                                        echo '<li><a href=" ' . get_permalink() . '?page=' . $i . '">' . $i . '</a></li>';
                                                    }
                                                    if($i==4){
                                                        echo "<li><a href='#'>...</a></li>";
                                                    }
                                                } else {
                                                    echo '<li><a href=" ' . get_permalink() . '?page=' . $i . '">' . $i . '</a></li>';
                                                }
                                            }
                                        }
                                        if ($paged < $total) {
                                            echo '<li><a href="' . get_permalink() . '?page=' . $next . '" aria-label="Next"><img src="' . ATOPICLAIR_THEME_URL . '/images/pagi_right.png" alt=""></a></li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>