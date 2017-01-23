<?php
/*
 Template Name: Câu hỏi thường gặp
 */
if (isset($_POST) && !empty($_POST)) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'submit_question')) {
        $errs[] = "Form submit invalid!"; // Get out of here, the nonce is rotten!
    } else {
        $to = array(
            "xuananh1059@gmail.com"
        );
        $subject = 'Xác nhận gửi câu hỏi thành công!';
        $body = $_POST['question']."</br>";
        $body.="Cám ơn bạn đã gửi câu hỏi cho chúng tôi!";
        $headers = array('Content-Type: text/html; charset=UTF-8');

        if (isset($_FILES['attack'])) {
            move_uploaded_file($_FILES["attack"]["tmp_name"], WP_CONTENT_DIR . '/uploads/' . basename($_FILES['attack']['name']));
            $attachments = array(WP_CONTENT_DIR . "/uploads/" . $_FILES["attack"]["name"]);
        }

        if (wp_mail($to, $subject, $body, $headers, $attachments) == 1) {
            $done = 1;
        }
    }
}

$params_filter = array(
    'post_type' => 'expert',
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'DESC',
);
$question = new WP_Query($params_filter);
get_header(); ?>
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
                                        $data_question = get_post_meta(get_the_ID(), 'expert')[0];
                                        ?>
                                        <li class="item">
                                            <p class="caret"></p>

                                            <p class="qs-title">
                                                <?php echo nl2br($data_question['question']); ?>
                                            </p>

                                            <p class="qs-ders">
                                                <?php echo nl2br($data_question['answer']); ?>
                                            </p>
                                        </li>
                                    <?php
                                    }
                                    wp_reset_query();
                                } else {
                                    echo "Chưa có câu hỏi nào!";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right-form-question">
                    <form action="<?php the_permalink(); ?>" method="post" class="form-horizontal form-qs">
                        <?php if ($done == 1) { ?>
                            <label class="label label-success">Cảm ơn bạn đã gửi câu hỏi cho chúng tôi!</label>
                        <?php } ?>
                        <label class="control-label">
                            Chia sẻ những thắc mắc của bạn để nhận được sự tư vấn của các chuyên gia
                            Atopiclair<sup>TM</sup>
                            nhé!
                        </label>
                        <textarea name="question" class="form-control" placeholder="Thắc mắc của bạn"
                                  required></textarea>
                        <button type="submit" class="btn">Gửi</button>
                        <?php wp_nonce_field('submit_question'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer(); ?>
