<?php
/*
 Template Name: Câu hỏi thường gặp
 */
$params_filter = array(
    'post_type' => 'expert',
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'DESC',
);
$question = new WP_Query($params_filter);
    get_header();?>
<div class="content">
    <div class="question">
        <div class="info info--question">
            <div class="container-fluid">
                <h4 class="info__title">
                    những câu hỏi thường gặp
                </h4>

                <div class="left-question">
                    <div>
                        <div class="scroll-box scroll-pane">
                            <ul class="list-text-qs">
                                <?php
                                if ($question->have_posts()) {
                                    while ($question->have_posts()) {
                                        $question->the_post();
                                        $data_question=get_post_meta(get_the_ID(), 'expert')[0];
                                        ?>
                                <li class="item">
                                    <p class="caret"></p>

                                    <p class="qs-title">
                                        <?php echo $data_question['question']; ?>
                                    </p>

                                    <p class="qs-ders">
                                        <?php echo $data_question['answer']; ?>
                                    </p>
                                </li>
                                <?php
                                }
                                wp_reset_query();
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right-form-question">
                    <form action="" method="post" class="form-horizontal form-qs">
                        <label class="control-label">
                            Chia sẻ những thắc mắc của bạn để nhận được sự tư vấn của các chuyên gia AtopiclairTM
                            nhé!
                        </label>
                        <textarea name="question" class="form-control" placeholder="Thắc mắc của bạn" required></textarea>
                        <button type="submit" class="btn">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
