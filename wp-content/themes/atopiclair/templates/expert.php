<?php
/*
 Template Name: ý kiến chuyên gia
 */
if(get_query_var('doctor')) {
    $doctor_id=get_query_var('doctor');
    $params_filter = array(
        'post_type' => 'doctor',
        'post_status' => 'publish',
        'ID' =>$doctor_id,
        'orderby' => 'post_date',
        'order' => 'DESC',
    );
    $data_doctor = new WP_Query($params_filter);
}
get_header();?>
    <div class="content">
        <div class="share">
            <div class="blog blog--share blog--ykien">
                <div class="container-fluid">
                    <div class="blog__ders">
                        <h2 class="title-info title-info--big blog__ders__title">ý kiến bác sĩ</h2>
                        <div class="livestream-video">
                            <h5 class="title-livestream">livestream về viêm da cơ địa</h5>
                            <div class="video-comment">
                                <div class="video">
                                    <img src="images/video1.jpg" alt="">
                                </div>
                                <div class="comment">
                                    <a href="#" class="btnFB"></a>
                                    <img src="images/pluginFB.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="livestream-video">
                            <h5 class="title-livestream">livestream về cách điều trị</h5>
                            <div class="video-comment">
                                <div class="video">
                                    <img src="images/video2.jpg" alt="">
                                </div>
                                <div class="comment">
                                    <a href="#" class="btnFB"></a>
                                    <img src="images/pluginFB.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="post-doctor">
                            <h5 class="title-post">các bài viết của bác sĩ</h5>
                            <?php
                            if(!empty($data_doctor)){
                            if ($data_doctor->have_posts()) {
                                while ($data_doctor->have_posts()) {
                                    $data_doctor->the_post();
                                    ?>
                            <div class="post-item">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_content(); ?></p>
                            </div>
                                <?php
                                }
                                wp_reset_query();
                            } }else{
                                printf("Chưa có bài viết nào!");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>