<?php
wp_nonce_field($post->ID, 'vuonxa_security');
?>
<div id="qhshop-content-general" class="qhshop-option">
    <div class="qhshop-content-form-group display-table">
        <label>Question : </label><textarea name="expert[question]" class="small-text" rows="5"><?php echo esc_attr($data["question"]); ?></textarea>        
    </div>
    <div class="qhshop-content-form-group display-table">
        <label>Answer : </label><textarea name="expert[answer]" class="small-text" rows="5"><?php echo esc_attr($data["answer"]); ?></textarea>  
    </div>
</div>