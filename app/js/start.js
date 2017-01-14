window.onload = function () {
    $('.thumnail-reason .item').matchHeight({property: 'min-height',  byRow: true});
    $(window).on("orientationchange",function(){
            $.fn.matchHeight._update();

    });

}
