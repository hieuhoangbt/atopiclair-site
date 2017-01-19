<?php
wp_nonce_field($post->ID, 'vuonxa_security');
$params_filter = array(
    'post_type' => 'doctor',
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'DESC',
);
$doctor = new WP_Query($params_filter);
?>
<div id="qhshop-content-general" class="qhshop-option">
    <div class="qhshop-content-form-group display-table">
        <label>Doctor : </label>
        <select size="1" name="doctorpost[doctor]">
            <option>-Please choose one-</option>
            <?php if ($doctor->have_posts()) {
                while ($doctor->have_posts()) {
                    $doctor->the_post();?>
                    <option value="<?php echo get_the_ID(); ?>" <?php echo ($data['doctor'] == get_the_ID() ) ? "selected='selected'" : ""; ?>><?php the_title(); ?></option>
                <?php
                }
                wp_reset_query();
            }
            ?>
        </select>
    </div>
</div>