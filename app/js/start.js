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


}

