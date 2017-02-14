$(document).ready(function() {
    /*var str = "         lots of spaces before and after         ";
    var str_out = $.trim(str);
    console.log('alo:'+str_out);*/
})
window.onload = function () {
    var $ = jQuery;
    

    //    blocksit block
    if($('.list-blockslt').length > 0) {
        function blockSlt() {
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
                $('.list-blockslt').BlocksIt({
                    numOfCol: col,
                    offsetX: 15,
                    offsetY: 15,
                    blockElement: '.item'
                });
                

            }else {
                $('.list-blockslt').BlocksIt({
                    numOfCol: col,
                    offsetX: 15,
                    offsetY: 15,
                    blockElement: '.item'
                });
            }
        }
        blockSlt();
        $(window).on("orientationchange resize", function () {
                blockSlt();
        });
        
    }
    /*load img*/
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
    /*validate form contact*/
    if ($(".contact_form").length > 0) {
        $.validator.addMethod("spaceRegex", function(value, element) {
            if($.trim( value ) == '') {
                $(element).val("");
                return false;
            }
            return true;
            
        },"ký tự không hợp lệ!");

        $(".contact_form").validate({
            rules: {

                c_phone: {
                    number: true,
                    minlength: 10,
                    maxlength: 12,
                },
                c_email: {
                    email: true
                },
                c_ders: {
                    spaceRegex: true
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
                    spaceRegex: "Nội dung không hợp lệ"   

                }


            }
        });
    }
    if($('.form-qs').length > 0) {
        $.validator.addMethod("spaceRegex", function(value, element) {
            if($.trim( value ) == '') {
                $(element).val("");
                return false;
            }
            return true;
            
        },"ký tự không hợp lệ!");

        $('.form-qs').validate({
            rules: {
                "c_drs": {
                    required: true,
                    spaceRegex: true
                }
            },
            messages: {
                "c_drs": {
                    required: "Bạn chưa nhập nội dung ",
                    spaceRegex: "Nội dung không hợp lệ"    
                    
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
        $('.ders-more').each(function(index, item) {
            $(item).text(jQuery.trim($(item).text()));
            if(index == $('.ders-more').length - 1) {
                $('.ders-more').shorten({
                    more: 'XEM THÊM',
                    less: 'Rút gọn',
                    chars: 600,
                });
            }

        })
        
    }

    /*menu-mobile*/
    $('.button-bar').on('touchstart', function(e) {
        $('.header__menu').toggleClass('mobile');
    });
    $('.list-menu .item').on('touchstart', function(e) {
        var _this = $(this);
        if($(_this).find('.drop-menu').length > 0) {
            if(!$(e.target).is('.drop-menu, .drop-menu *')) {
                $(_this).toggleClass('has_sub');
                return false;
            }
            
        }
    });

    $('.thumnail-reason .item').matchHeight({property: 'height', byRow: true});
    $('.video-comment .item').matchHeight({property: 'height', byRow: true});
    $(window).on("orientationchange", function () {
        $.fn.matchHeight._update();

    });

    
    
    
    
    /*first active before*/
    if($('.drop-menu li:first-child a').hasClass('active') == true) {
        $('.drop-menu').toggleClass('first-active');
    }

    

   
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