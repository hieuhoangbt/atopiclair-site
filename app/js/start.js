window.onload = function () {
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

}
