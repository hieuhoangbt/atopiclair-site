<?php
/*
  Template Name: Chia sẻ
 */

$params_filter = array(
    'posts_per_page'=>3,
    'post_type' => 'story',
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'DESC',
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
                            <?php if($stories->max_num_pages>1) {?>
                            <nav class="pagi-list right" aria-label="Page navigation">
                                    <?php echo Atopiclair_theme::custom_pagination($stories->max_num_pages); ?>
                                </nav>

                            <?php } ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>