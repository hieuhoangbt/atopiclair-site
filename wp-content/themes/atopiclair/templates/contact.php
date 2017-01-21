<?php
/*
 Template Name: Liên hệ & Phân Phối
 */
if (isset($_POST) && !empty($_POST)) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'submit_contact')) {
        $errs[] = "Form submit invalid!"; // Get out of here, the nonce is rotten!
    } else {
        $to = array(
            "xuananh1059@gmail.com",
        );
        $subject = 'Thông tin Liên hệ';
        $body = '<table width="100%" border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse;border-style:solid;border-color:#cccccc;font-family:Arial,Helvetica,sans-serif;font-size:10pt">
                <tbody><tr>
                  <td width="200"><div align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;font-weight:bold;width:230px">Tên</div></td>
                  <td width="150"><div align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;font-weight:bold">Email
                </div></td>
                <td width="150"><div align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;font-weight:bold">Điện thoại
                </div></td>
                  <td width="150"><div align="right" style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;font-weight:bold">Nội dung
                </div></td>
                </tr>
				  <tr>
						<td> ' . $_POST['fullname'] . '</td>
						<td><div align="center">' . $_POST['c_email'] . '</div></td>
						<td><div align="center">' . $_POST['c_phone'] . '</div></td>
						<td><div align="right">' . $_POST['c_ders'] . '</div></td>
				  </tr>

                </tbody></table>';
        $headers = array('Content-Type: text/html; charset=UTF-8');

        if (wp_mail($to, $subject, $body, $headers) == 1) {
            $done = 1;
        }
    }
}

get_header(); ?>
    <div class="content">
        <div class="lienhe">
            <div class="lienhe__bg">
                <div class="info">
                    <div class="container-fluid">
                        <h2 class="info__title">liên hệ và phân phối</h2>
                        <div class="info__lienhe">
                            <div class="info__lienhe__left">
                                <p>ATOPICLAIR&trade; được phân phối tại<br/> các nhà thuốc trên toàn quốc</p>
                                <p>Để được tư vấn về sản phẩm, xin liên hệ: 1800545474 (trong giờ hành chính)</p>
                                <p>Yêu cầu về phân phối, xin liên hệ: 1800555558</p>
                            </div>
                            <div class="info__lienhe__right">
                                <form method="post" action="<?php the_permalink(); ?>" class="form-horizontal contact_form">
                                    <?php if ($done == 1) { ?>
                                        <label class="label label-success">Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi phản hồi cho bạn ngay sau khi kiểm tra hòm thư.</label>
                                    <?php } ?>
                                    <div class="group-form">
                                        <label for="">Họ và tên</label>
                                        <input type="text" name="c_name" placeholder="Họ và tên" required/>
                                    </div>
                                    <div class="group-form">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" name="c_adress" placeholder="Địa chỉ" required/>
                                    </div>
                                    <div class="group-form">
                                        <label for="">Email</label>
                                        <input type="text" name="c_email" placeholder="Email" required/>
                                    </div>
                                    <div class="group-form">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" name="c_phone" placeholder="Số điện thoại" required/>
                                    </div>
                                    <div class="group-form">
                                        <label class="label-info" for="">Nội dung</label>
                                        <textarea name="c_ders" placeholder="Nội dung" required></textarea>
                                    </div>
                                    <div class="group-form">
                                        <button class="btn-send">Gửi</button>
                                        <?php wp_nonce_field('submit_contact'); ?>
                                    </div>
                                </form>
                            </div>
                        <div class="img-lienhe">
                                <img src="<?php echo ATOPICLAIR_THEME_URL; ?>/images/gau_lienhe.png" alt="liên hệ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>