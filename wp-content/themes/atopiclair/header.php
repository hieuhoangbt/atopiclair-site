<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
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

        jQuery("#loginfb").click(function () {
            alert(1);
            jQuery(this).attr("disabled", "disabled").addClass("disable");
            if (res_status.status === 'connected' && res_status.authResponse) {
                //do something
            } else {
                loginFB();
            }
        });

        //Login FB
        function loginFB() {
            FB.login(function (response) {
                if (response.authResponse != null) {
                    saveInfoLoginFB();
                } else {
                    jQuery("#loginfb").removeAttr("disabled").removeClass("disable");
                }
            }, {scope: 'email'});
        }
    </script>
</head>

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
            <?php echo Atopiclair_theme::atopiclair_menu(); ?>
        </div>
    </div>