<?php
$post_id = get_the_ID();
$data = get_post_meta($post_id, 'doctor')[0];
get_header();
?>
<div class="content">
    <div class="share">
        <div class="blog blog--share blog--ykien">
            <div class="container-fluid">
                <div class="blog__ders">
                    <h2 class="title-info title-info--big blog__ders__title">ý kiến bác sĩ</h2>

                    <div class="livestream-video">
                        <?php if (!empty($data['video_viemdacodia'])) { ?>
                            <h5 class="title-livestream">livestream về viêm da cơ địa</h5>
                            <div class="video-comment">
                                <div class="video">
                                    <!-- 4:3 aspect ratio -->
                                    <!--<div class="embed-responsive embed-responsive-4by3">-->
                                    <video id="video_doctor1" controls>
                                        <source src="<?php echo $data['video_viemdacodia']; ?>" type="video/mp4">
                                        <source src="<?php echo $data['video_viemdacodia_ogg']; ?>" type="video/ogg">
                                    </video>
                                    <!--</div>-->

                                </div>
                                <div class="comment">
                                    <a href="javascript:;" class="btnFB" onclick="login()"></a>

                                    <div class="box-cmt">
                                        <div class="fb-comments" data-href="<?php echo site_url().$data['video_viemdacodia']; ?>"
                                             data-numposts="20"
                                             width="100%" data-colorscheme="light" data-version="v2.3"></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="livestream-video">
                            <?php if (!empty($data['video_cachdieutri'])) { ?>
                            <h5 class="title-livestream">livestream về cách điều trị</h5>
                            <div class="video-comment">
                                <div class="video">
                                    <!-- 4:3 aspect ratio -->
                                    <!--<div class="embed-responsive embed-responsive-4by3">-->
                                    <video id="video_doctor2" controls>
                                        <source src="<?php echo $data['video_cachdieutri']; ?>" type="video/mp4">
                                        <source src="<?php echo $data['video_cachdieutri_ogg']; ?>" type="video/ogg">
                                    </video>
                                    <!--</div>-->

                                </div>
                                <div class="comment">
                                    <a href="javascript:;" class="btnFB" onclick="login()"></a>

                                    <div class="box-cmt">
                                        <div class="fb-comments" data-href="<?php echo site_url().$data['video_cachdieutri']; ?>"
                                             data-numposts="20"
                                             width="100%" data-colorscheme="light" data-version="v2.3"></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="post-doctor">
                        <h5 class="title-post">các bài viết của bác sĩ</h5>
                        <?php
                        $count_post = count($data['content_post']);
                        if ($count_post != 0) {
                            for ($i = 0; $i < $count_post; $i++) {
                                ?>
                                <div class="post-item">
                                    <h3><?php echo $data['title_post'][$i]; ?></h3>

                                    <div class="ders-more">
                                        <?php echo nl2br($data['content_post'][$i]); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<div class='line-white__content'><div class='item'><p>Chưa có bài viết nào!</p></div></div>";
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