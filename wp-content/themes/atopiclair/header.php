<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <title><?php wp_title('&raquo;', true, 'right'); ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo ATOPICLAIR_THEME_URL; ?>/favicon.ico" />
        <?php wp_head(); ?>
    </head>
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '332282227165487',
                xfbml: true,
                version: 'v2.8'
            });

            FB.getLoginStatus(function (response) {
                res_status = response;
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>

    <body>
        <div id="page">
            <div class="header">
                <div class="header__top">
                    <div class="container-fluid">
                        <?php Atopiclair_theme::atopiclair_logo(); ?>
                        <?php Atopiclair_theme::facebook_logo(); ?>
                    </div>
                </div>
                <div class="menu header__menu">
                    <div class="container-fluid">
                        <div class="button-bar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </div>
                        <?php echo Atopiclair_theme::atopiclair_menu(); ?>
                    </div>
                </div>
            </div>