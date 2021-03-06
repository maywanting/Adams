<!DOCTYPE html>
<html lang="ja-jp">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php bloginfo('template_url'); ?>/style.css?<?php echo THEME_DB_VERSION; ?>" type="text/css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/static/caomei/style.css?<?php echo THEME_DB_VERSION; ?>" type="text/css" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
<script>
    <?php if(get_theme_mod('biji_setting_auto_mode')){ ?>
    document.addEventListener("DOMContentLoaded", (event) => {
        let mode = getComputedStyle(document.documentElement).getPropertyValue('content');
        if (mode.indexOf('dark') > -1 && !$('body').is('.night')) {
            $('.setting_tool .c ul li.night').click()
        }
        if (mode.indexOf('light') > -1 && !$('body').is('.undefined')) {
            $('.setting_tool .c ul li.undefined').click()
        }
    });
    <?php } ?>
    $("body").addClass(localStorage.adams_color_style || "").addClass(localStorage.adams_font_style || "");
</script>
<!-- Header -->
<header class="header">
    <section class="container">
    <?php if (is_home() && get_option('biji_img_logo_1')) echo '<img src="' . get_option('biji_img_logo_1') . '"/>'; ?>

        <hgroup itemscope itemtype="https://schema.org/WPHeader">
            <h1 class="fullname"><?php (!is_home()) ? wp_title("") : bloginfo('name'); ?></h1>
        </hgroup>

        <?php
        /*wp_nav_menu(
            array(
                'container' => false,
                'theme_location' => 'social_nav',
                'items_wrap' => '<nav class="social"><ul id="%1$s" class="%2$s">%3$s</ul></nav>',
                'walker' => new description_walker(),
                'depth' => 0
            )
        );*/
        wp_nav_menu(
            array(
                'container' => false,
                'theme_location' => 'header_nav',
                'items_wrap' => '<nav class="header_nav"><ul id="%1$s" class="%2$s">%3$s</ul></nav>',
                'depth' => 0
            )
        );
        ?>
    </section>

    <section class="infos" >
        <div class="container">
            <?php if (is_single() || is_page()) { ?>
                <h2 class="fixed-title"></h2>
               <!-- <div class="fixed-menus"></div> -->
                <div class="fields">
                    <span><i class="czs-time-l"></i> <?php echo get_post_time("Y-m-d"); ?> ?????? /
                    <span><i class="czs-pen-write"></i> <?php echo get_post_modified_time("Y-m-d"); ?> ?????? /
                    <span><i class="czs-user"></i> <?php echo get_the_author_meta('display_name', get_post()->post_author);?> /
                    <span><i class="czs-talk-l"></i> <?php comments_number('0', '1', '%'); ?></span> /
                </div>
            <?php } else { ?>
                <h2 class="fixed-title"></h2>
                <!-- <div class="fixed-menus"></div> -->
                <!--<div class="placard">
                </div>-->
            <?php } ?>
        </div>
    </section>
</header>
