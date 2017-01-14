var qhObject = {
    qhAttrCount: 0
};
jQuery(document).ready(function () {

    jQuery('.qhshop-box-menu a').click(function (event) {
        event.preventDefault();
        var nameContent = jQuery(this).attr('href');
        var currentObj = jQuery('#qhshop-content-' + nameContent.replace('#', ''));
        jQuery('.qhshop-option').hide();
        currentObj.show();
    });

    jQuery('#qhAddAttr').click(function (event) {
        event.preventDefault();
        var content = '<div class="qhshop-content-form-group">';
        content += ' <input name="product[pricelist][' + qhObject.qhAttrCount + '][name]" type="text" value="" class="small-text" placeholder="Tên loại sản phẩm">';
        content += ' <input name="product[pricelist][' + qhObject.qhAttrCount + '][value]" type="number" value="" class="small-text" placeholder="Giá">';
        content += '</div>';
        jQuery('#qhshop-content-attribute-form-group').append(content);
        qhObject.qhAttrCount++;
    });

    jQuery('.qhDeleteIcon').click(function (event) {
        event.preventDefault();
        jQuery(this).parent().remove();
    });

    jQuery("#media-choosan").click(function (e) {
        e.preventDefault();
        var uploader = wp.media({
            title: "Chọn hình",
            button: {
                text: 'Chọn hình'
            },
            multiple: false

        }).on('select', function () {
            var selection = uploader.state().get('selection');
            var attachment = selection.first().toJSON();
            var URL_HOME = jQuery("#hidden_domain").val();
            jQuery("input#slideitem").val(attachment.url.replace(URL_HOME, ""));
            jQuery(".description-upload img").attr("src", attachment.url);
        }).open();
    });
});