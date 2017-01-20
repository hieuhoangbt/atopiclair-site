window.onload = function () {
    $('.list-angency-content .scroll-pane').jScrollPane({
        showArrows: true,
        width: '100%',
        height: 227
    });
    var settings = {
        showArrows: true,
        'max-width': '100%',
        'max-height': 227
    };
    var pane = $('.left-question .scroll-pane');
    pane.jScrollPane(settings);
    var api = pane.data('jsp');


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
    if ($(".contact_form").length) {
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
                    maxlength: "số điện thoại từ 10 tới 12 số",
                    number: "Bạn vui lòng nhập số"
                },
                c_ders: {
                    required: "Bạn vui lòng nhập số thông tin liên hệ ",

                }


            }
        });
    }

    /*list-question*/
    if ($('.list-text-qs li').length > 0) {
        $('.list-text-qs li .qs-title').on('click', function (e) {
            $(e.target).parent('li.item').toggleClass('open');
            api.reinitialise();
            api.scrollToElement(e.target, 10, 200);
        })
        $('.list-text-qs li').each(function (idx, item) {

        })
    }
    if($('.ders-more').length > 0) {
        $('.ders-more').shorten({
            more: 'XEM THÊM',
            less: 'Rút gọn',
            chars: 600,
        });
    }



}

