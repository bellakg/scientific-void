<!Doctype html>
<html>

<head>
    <?php wp_head();?>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/54d102da47.js"></script>
</head>

<body <?php body_class();?>>
    <div class="sv-wrapper">
        <div class="sv-header">
<!--Site title-->
                <div class="sv-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a></div>
                <div class="sv-middle-void"></div>
<!--Site logo-->
                <div class="sv-logo"><img  id="svlogo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.webp" alt="Logo" width="60" height="" /></div>
<!--Site menu-->
                <div class="sv-site-menu"> <div class="sv-top-menu">
    <?php if (has_nav_menu('sv-header-menu')) {
    // User has assigned menu to this location;
    // output it
    wp_nav_menu(array(
        'theme_location' => 'sv-header-menu',
        'menu_class' => 'topmenu-nav',
        'container' => ''
    ));
}?></div></div>
        </div>