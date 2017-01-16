<?php
wp_nonce_field($post->ID, 'vuonxa_security');
?>
<div id="qhshop-content-general" class="qhshop-option">
    <!--<div class="qhshop-content-form-group display-table">
        <label>Group : </label>
        <select size="1" name="drugstore[group]">
            <option>-Please choose one-</option>
            <option value="1" <?php echo ($data['group'] == 1) ? "selected" : ""; ?>>Nhà thuốc Phano</option>
            <option value="2" <?php echo ($data['group'] == 2) ? "selected" : ""; ?>>Nhà thuốc Pharmacity</option>
            <option value="3" <?php echo ($data['group'] == 3) ? "selected" : ""; ?>>Nhà thuốc For+</option>
            <option value="4" <?php echo ($data['group'] == 4) ? "selected" : (((int) $data['group'] == 0) ? "selected" : ""); ?>>Nhà phân phối khác</option>
        </select>
    </div>-->
    <div class="qhshop-content-form-group display-table">
        <label>Address : </label><input type="text" name="drugstore[address]" class="large-text" value="<?php echo esc_attr($data["address"]); ?>">
    </div>
    <!--<div class="qhshop-content-form-group display-table">
        <label>Region : </label>
        <select id="drug_id" size="1" name="drugstore[region]">
            <option>-Please choose one-</option>
            <option value="1" <?php echo ($data['region'] == 1) ? "selected" : ""; ?>>Miền Bắc</option>
            <option value="2" <?php echo ($data['region'] == 2) ? "selected" : ""; ?>>Miền Trung</option>
            <option value="3" <?php echo ($data['region'] == 3) ? "selected" : ""; ?>>Miền Nam</option>
        </select>
    </div>-->
    <div class="qhshop-content-form-group display-table">
        <input type="hidden" id="default_province" value="<?php echo $data['city'] ?>"/>
        <label>Tỉnh / Thành phố : </label>
        <select id="province_id" size="1" name="drugstore[city]">
            <option>-Please choose one-</option>
        </select>
    </div>
    <div class="qhshop-content-form-group display-table">
        <input type="hidden" id="default_district" value="<?php echo $data['district'] ?>"/>
        <label>Quận / Huyện : </label>
        <select id="district_id" size="1" name="drugstore[district]">
            <option>-Please choose one-</option>
        </select>
    </div>
</div>