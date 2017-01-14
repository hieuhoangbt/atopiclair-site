<?php
wp_nonce_field($post->ID, 'atopiclair_security');
?>
<div class="qhshop-box-left">
    <ul class="qhshop-box-menu">
        <li><a href="#general">Information</a></li>
    </ul>
</div>
<div class="qhshop-box-right">
    <div id="qhshop-content-general" class="qhshop-option">
        <div class="qhshop-content-form-group display-table">
            <label>Image doctor: </label>
            <input type="hidden" id="hidden_domain" value="<?php echo home_url('/'); ?>" />
            <input name="doctor[image]" id="slideitem" type="text" class="small-text" value="<?php echo esc_attr($data["image"]); ?>"> 
            <input type="button" class="button-primary" value="Tải ảnh lên" id="media-choosan">
            <p class="description-upload">
                <img width="200px"
                     src="<?php echo esc_attr($data['image']) ? home_url("/").esc_attr($data['image']) : ''; ?>"
                     alt="">
            </p>
        </div>
        <div class="qhshop-content-form-group display-table">
            <label>Content: </label><textarea cols="8" rows="8" name="doctor[content]" class="small-text"><?php echo esc_attr($data["content"]); ?></textarea>        
        </div>
    </div>
</div>
<div class="clear"></div>