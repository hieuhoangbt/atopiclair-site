<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
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