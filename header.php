<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(is_home()) {
        bloginfo('name'); echo " - "; bloginfo('description');
    } else if(is_category()) {
        single_cat_title(); echo " - "; bloginfo('name');
    } else if(is_single() || is_page()) {
        single_post_title(); echo " - "; bloginfo('name');
    } else if(is_search()) {
        echo "搜索结果"; echo " - "; bloginfo('name');
    } else if(is_404()) {
        echo "页面未找到"; echo " - "; bloginfo('name');
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }; ?></title>
    <meta name="Keywords" content="Wordpress主题定制,WooCommerce商城定制,Wordpress外贸网站定制,Wordpress二次开发,Shopify主题定制,Shopify二次开发" />
    <meta name="Description" content="DRAKECB.ME,一个专注于web开发电商开发的个人网站。致力于Wordpress，Shopify开发,侧重于高端顶尖的网站制作。" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" sizes="16x16 24x24 32x32 48x48">
    <link rel="apple-touch-icon-precomposed" type="image/png" href="/apple-icon.png" sizes="114x114">
    <link rel="stylesheet" href="/wp-content/themes/Drakecbme/css/font-awesome.min.css">
    <link rel="stylesheet" href="/wp-content/themes/Drakecbme/css/fonts-basic.css">
    <link rel="stylesheet" href="/wp-content/themes/Drakecbme/css/bootstrap.css">
    <link rel="stylesheet" href="/wp-content/themes/Drakecbme/style.css">
    <link rel="stylesheet" href="/wp-content/themes/Drakecbme/css/responsive.css">
    <script src="/wp-content/themes/Drakecbme/js/jquery.min.js"></script>
    <script src="/wp-content/themes/Drakecbme/js/bootstrap.min.js"></script>
    <script src="/wp-content/themes/Drakecbme/js/jquery.bxslider.min.js"></script>
    <script src="/wp-content/themes/Drakecbme/js/smooth-scroll.min.js"></script>
    <script src="/wp-content/themes/Drakecbme/js/myscript.js"></script>
    <script src="/wp-content/themes/Drakecbme/js/uikit.min.js"></script>
    <script>
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <?php wp_head();?>
</head>

<body <?php body_class(); ?>>
    <?php if( is_front_page() ){?>
    <div class="se-pre-con"></div>
    <?php };?>
    <?php 
        if( is_404() ):
    ?>
    <?php else:?>
    <header id="headerBar" class="headerTop">
        
        <div class="container-fluid">
            <div class="col-lg-3 col-md-3 col-sm-1 col-xs-4 headerLeft">
                <h1 class="logo"><a href="/"><img src="/wp-content/themes/Drakecbme/images/logo.png" class="img-responsive" alt="DRAKECB的博客"></a></h1>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-11 col-xs-8 headerRight">
                <nav class="navigation main-menu">
            
                    <div class="navbar-header">
                      <span class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <i class="fa fa-bars"></i>
                      </span>
                    </div>
            
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php
                            if( is_front_page() ):
                        ?>    
                        <ul class="navbar navbar-right">
                          <li class="active"><a href="#sectionIntro" class="easing">首页/HOME</a></li>
                          <li><a data-scroll href="#about" class="easing">关于/ABOUT</a></li>
                          <li><a data-scroll href="#services" class="easing">服务/SERVICE</a></li>
                          <li><a data-scroll href="#experience" class="easing">履历/RESUME</a></li>
                          <li><a data-scroll href="/blog" class="easing">博客/BLOG</a></li>
                          <li><a data-scroll href="#contact" class="easing">联系我/CONTACT</a></li>
                        </ul>
                        <?php else:?>
                        <ul class="navbar navbar-right">
                          <li class="active"><a href="/" class="easing">首页/HOME</a></li>
                          <li><a data-scroll href="/#about" class="easing">关于/ABOUT</a></li>
                          <li><a data-scroll href="/#services" class="easing">服务/SERVICE</a></li>
                          <li><a data-scroll href="/#experience" class="easing">履历/RESUME</a></li>
                          <li><a data-scroll href="/blog" class="easing">博客/BLOG</a></li>
                          <li><a data-scroll href="/#contact" class="easing">联系我/CONTACT</a></li>
                        </ul>
                        <?php endif;?>
                    </div>
            
                </nav>
            </div>
        </div>
    </header>
    <?php endif;?>
    <main class="<?php if( is_front_page() ){echo '';}else{echo 'exfontpage';}?>">