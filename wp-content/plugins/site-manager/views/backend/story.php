<?php
wp_nonce_field($post->ID, 'vuonxa_security');
?>
<div id="qhshop-content-general" class="qhshop-option">
    <div class="qhshop-content-form-group display-table">
        <label>Highlight Homepage : </label>
        <input name="story[highlight]" type="checkbox" value="1" <?php echo ($data["highlight"]==1)?"checked='checked'":""; ?>>
    </div>
</div>