<?php
/*
  Template Name: Bác sĩ tư vấn
 */
$params_filter = array(
    'posts_per_page' => 3,
    'post_type' => 'doctor',
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'DESC',
);
$doctor = new WP_Query($params_filter);
get_header();
?>
    <div class="content">
        <div class="share">
            <div class="blog blog--share blog--ykien">
                <div class="container-fluid">
                    <div class="blog__ders">
                        <h2 class="title-info title-info--big blog__ders__title">ý kiến bác sĩ</h2>

                        <div class="quote-info blog__ders__quote">
                            <ul class="list-inline list-doctor">
                                <?php
                                if ($doctor->have_posts()) {
                                    while ($doctor->have_posts()) {
                                        $doctor->the_post();
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "doctor_thumbnail");
                                        ?>
                                        <li class="item">
                                            <div class="list-doctor__thumb">
                                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>"
                                                                                         alt="<?php the_title(); ?>"></a>
                                            </div>
                                            <div class="list-doctor__name"><?php the_title(); ?></div>
                                            <div class="list-doctor__ders">
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
                            <?php if ($doctor->max_num_pages > 1) { ?>
                                <nav class="pagi-list right" aria-label="Page navigation">
                                    <?php echo Atopiclair_theme::custom_pagination($doctor->max_num_pages); ?>
                                </nav>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>