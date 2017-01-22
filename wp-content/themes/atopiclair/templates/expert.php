<?php
/*
 Template Name: Ý kiến bác sĩ
 */
if (get_query_var('doctor')) {
    $doctor_id = get_query_var('doctor');
    $params_filter = array(
        'post_type' => 'doctorpost',
        'post_status' => 'publish',
        'ID' => $doctor_id,
        'orderby' => 'post_date',
        'order' => 'DESC',
    );
    $data_doctor = new WP_Query($params_filter);
}
$params_filter = array(
    'post_type' => 'doctor',
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'DESC',
);
$data_video = new WP_Query($params_filter);
get_header(); ?>
    <div class="content">
        <div class="share">
            <div class="blog blog--share blog--ykien">
                <div class="container-fluid">
                    <div class="blog__ders">
                        <h2 class="title-info title-info--big blog__ders__title">ý kiến bác sĩ</h2>

                        <div class="livestream-video">
                            <h5 class="title-livestream">livestream về viêm da cơ địa</h5>
                            <?php
                            if (!empty($data_video)) {
                            if ($data_video->have_posts()) {
                            while ($data_video->have_posts()) {
                                $data_video->the_post();
                            ?>
                            <div class="video-comment">
                                <div class="video">
                                    <!-- 4:3 aspect ratio -->
                                    <!--<div class="embed-responsive embed-responsive-4by3">-->
                                    <video id="video_doctor1" controls>
                                        <source src="<?php the_content(); ?>" type="video/mp4">
                                        <source src="<?php the_content(); ?>" type="video/ogg">
                                    </video>
                                    <!--</div>-->

                                </div>
                                <div class="comment">
                                    <a href="javascript:;" class="btnFB" onclick="login()"></a>

                                    <div class="box-cmt">
                                        <div class="fb-comments" data-href="<?php the_permalink(); ?>"
                                             data-numposts="20"
                                             width="100%" data-colorscheme="light" data-version="v2.3"></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                                wp_reset_query();
                            }
                            }
                            ?>
                        </div>
                        <div class="post-doctor">
                            <h5 class="title-post">các bài viết của bác sĩ</h5>
                            <?php
                            if (!empty($data_doctor)) {
                                if ($data_doctor->have_posts()) {
                                    while ($data_doctor->have_posts()) {
                                        $data_doctor->the_post();
                                        ?>
                                        <div class="post-item">
                                            <h3><?php the_title(); ?></h3>

                                            <p><?php echo n2lbr(get_the_content()); ?></p>
                                        </div>
                                    <?php
                                    }
                                    wp_reset_query();
                                }
                            } else {
                                printf("Chưa có bài viết nào!");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function login() {
            jQuery(this).attr("disabled", "disabled").addClass("disable");
            if (res_status.status === 'connected' && res_status.authResponse) {
                //do something
            } else {
                loginFB();
            }
        }

        //Login FB
        function loginFB() {
            FB.login(function (response) {
                if (response.authResponse != null) {
                    saveInfoLoginFB();
                } else {
                    jQuery(".btnFB").removeAttr("disabled").removeClass("disable");
                }
            }, {scope: 'email'});
        }
    </script>
<?php get_footer(); ?>