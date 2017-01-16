window.onload = function () {
    $('.scroll-pane').jScrollPane({
        showArrows: true,
        width: '100%',
        height: 227
    });

    $('.thumnail-reason .item').matchHeight({property: 'min-height', byRow: true});
    $(window).on("orientationchange", function () {
        $.fn.matchHeight._update();

    });

    //    blocksit
    $('.list-blockslt').BlocksIt({
        numOfCol: 3,
        offsetX: 15,
        offsetY: 15,
        blockElement: '.item'
    });
    /*select*/
    $('.select-province, .select-township').selectBox({
        mobile: true,
        menuTransition: 'default',
        hideOnWindowScroll: true
    });

    /*validate form contact*/
    if($(".contact_form").length) {
        $(".contact_form").validate({
        rules: {

            c_phone: {
                number: true,
                minlength: 10,
                maxlength: 12,
            },
            c_email: {
                email: true
            }

        },
        messages: {
            c_name: "Bạn vui lòng nhập họ tên ",
            c_adress: "Bạn vui lòng nhập địa chỉ ",
            c_email: {
                required: "Bạn vui lòng nhập Email",
                email: "Email không hợp lệ name@domain.com"
            },
            c_phone: {
                required: "Bạn vui lòng nhập số điện thoại",
                minlength: "số điện thoại từ 10 tới 12 số",
                maxlength: "số điện thoại từ 10 tới 12 số"
            },
            c_ders: {
                required: "Bạn vui lòng nhập số thông tin liên hệ ",

            }



        }
    });
    }
}

