/*$(document).ready(function() {
    $('img').imgPreload();
})*/
window.onload = function () {
    /*load img*/
    
    if(!isMobile.any()) {
        $('.list-angency-content .scroll-pane').jScrollPane({
            showArrows: true,
            width: '100%',
            height: 227
        });
    }
    
    var settings = {
        showArrows: true,
        'max-width': '100%',
        'max-height': 227
    };
    
    var pane = $('.left-question .scroll-pane'), api = {};
    if(!isMobile.any()) {
        pane.jScrollPane(settings);
        api = pane.data('jsp');    
    }
    


    $('.thumnail-reason .item').matchHeight({property: 'height', byRow: true});
    $('.video-comment .item').matchHeight({property: 'height', byRow: true});
    $(window).on("orientationchange", function () {
        $.fn.matchHeight._update();

    });

    //    blocksit block
    if($('.list-blockslt').length > 0) {
        var col = 3;
        var winWidth = $(window).width();
        winWidth = $(window).width();
        if(winWidth <= 767) {
            col = 2
        }
        if(winWidth <= 480) {
            col = 1
        }
        
        if(isMobile.any()) {
            $('.list-blockslt').width(winWidth);
            $('.list-blockslt').BlocksIt({
                numOfCol: col,
                offsetX: 15,
                offsetY: 15,
                blockElement: '.item'
            });
            $(window).on("orientationchange resize", function () {
                winWidth = $(window).width();
                if(winWidth <= 767) {
                    col = 2
                }
                if(winWidth <= 480) {
                    col = 1
                }
                $('.list-blockslt').width(winWidth);
                $('.list-blockslt').BlocksIt({
                    numOfCol: col,
                    offsetX: 15,
                    offsetY: 15,
                    blockElement: '.item'
                });
            });

        }else {
            // $('.list-blockslt').width(winWidth);
            $('.list-blockslt').BlocksIt({
                numOfCol: col,
                offsetX: 15,
                offsetY: 15,
                blockElement: '.item'
            });
        }
        
    }
    
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
    if($('.form-qs').length) {
        $.validator.addMethod("nameRegex", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9()._\-\s]+$/.test(value);
        }, "Username must contain only letters, numbers, or dashes.");

        $('.form-qs').validate({
            rules: {
                "c_drs": {
                    required: true,
                    nameRegex: true
                }
            },
            messages: {
                "c_drs": {
                    required: "Bạn chưa nhập nội dung ",
                    nameRegex: "Contain only letters, numbers."    
                }
                
                
            }
        });
    }

    /*list-question*/
    if ($('.list-text-qs li').length > 0) {
        $('.list-text-qs li .qs-title').on('click', function (e) {
            $(e.target).parent('li.item').toggleClass('open');
            if(!isMobile.any()) {
                api.reinitialise();
                api.scrollToElement(e.target, 10, 200);    
            }
            
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

    /*menu-mobile*/
    if(isMobile.any()) {
        $('.button-bar').on('click', function(e) {
            $('.header__menu').toggleClass('mobile');
        })
        $('.list-menu .item').on('click', function(e) {
            var _this = $(this);
            if($(_this).find('.drop-menu').length > 0) {
                $(_this).toggleClass('has_sub');
                // return false;
            }
        })
    }

    /*load images default*/
    loadDefaultImg('.list-blockslt .item_img');

}
function loadDefaultImg(img_input) {
    if(!$(img_input).length > 0) return;
    $(img_input).each(function(idx, item) {
        var im = $(item).find('.item_img img');
        console.log($(im).attr('src'));
    })

}
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};