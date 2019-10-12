<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?></title>
    <meta name="description" content="<?php echo html_escape($description); ?>"/>
    <meta name="keywords" content="<?php echo html_escape($keywords); ?>"/>
    <meta name="author" content="BillionByte"/>
    <meta name="contributor" content="BillionByte"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="<?php echo $settings->application_name; ?>"/>
<?php if (isset($post_type)): ?>
    <meta property="og:type" content="<?php echo $og_type; ?>"/>
    <meta property="og:title" content="<?php $og_title; ?>"/>
    <meta property="og:description" content="<?php echo $og_description; ?>"/>
    <meta property="og:url" content="<?php echo $og_url; ?>"/>
    <meta property="og:image" content="<?php echo $og_image; ?>"/>
    <meta property="og:image:width" content="<?php echo $og_width; ?>"/>
    <meta property="og:image:height" content="<?php echo $og_height; ?>"/>
    <meta property="article:author" content="<?php echo $og_author; ?>"/>
    <meta property="article:contributor" content="<?php echo $og_contributor; ?>"/>
    <meta property="fb:app_id" content="<?php echo $this->general_settings->facebook_app_id; ?>"/>
<?php foreach ($og_tags as $tag): ?>
    <meta property="article:tag" content="<?php echo $tag->tag; ?>"/>
<?php endforeach; ?>
    <meta property="article:published_time" content="<?php echo $og_published_time; ?>"/>
    <meta property="article:modified_time" content="<?php echo $og_modified_time; ?>"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@<?php echo html_escape($settings->application_name); ?>"/>
    <meta name="twitter:creator" content="@<?php echo html_escape($og_creator); ?>"/>
    <meta name="twitter:title" content="<?php echo html_escape($post->title); ?>"/>
    <meta name="twitter:description" content="<?php echo html_escape($post->summary); ?>"/>
    <meta name="twitter:image" content="<?php echo $og_image; ?>"/>
<?php else: ?>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?>"/>
    <meta property="og:description" content="<?php echo html_escape($description); ?>"/>
    <meta property="og:url" content="<?php echo base_url(); ?>"/>
    <meta property="fb:app_id" content="<?php echo $this->general_settings->facebook_app_id; ?>"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@<?php echo html_escape($settings->application_name); ?>"/>
    <meta name="twitter:title" content="<?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?>"/>
    <meta name="twitter:description" content="<?php echo html_escape($description); ?>"/>
<?php endif; ?>
    <meta name="google-signin-client_id" content="<?php echo $general_settings->google_client_id ?>">
    <link rel="canonical" href="<?php echo base_url(); ?>"/>
<?php if ($general_settings->multilingual_system == 1):
foreach ($languages as $language):
if ($language->id == $site_lang->id):?>
    <link rel="alternate" href="<?php echo base_url(); ?>" hreflang="<?php echo $language->language_code ?>"/>
<?php else: ?>
    <link rel="alternate" href="<?php echo base_url() . $language->short_form . "/"; ?>" hreflang="<?php echo $language->language_code ?>"/>
<?php endif; endforeach; endif; ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings); ?>"/>
    <!-- Font-awesome CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css"/>
    <?php echo $primary_font_url; ?>
    <?php echo $secondary_font_url; ?>
    <?php echo $tertiary_font_url; ?>
    <!-- Owl Carousel -->
    <link href="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.carousel.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.theme.default.min.css" rel="stylesheet"/> 

    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/icheck/minimal/grey.css"/>
    <!-- Jquery Confirm CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/jquery-confirm/jquery-confirm.min.css" rel="stylesheet"/>
<?php if (uri_string() == "gallery"): ?>
    <!-- Magnific Popup-->
    <link href="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet"/>
<?php endif; ?>
<?php if (isset($post_type) && $post_type == "audio"): ?>
    <link href="<?php echo base_url(); ?>assets/vendor/audio-player/css/amplitude.min.css" rel="stylesheet"/>
<?php endif; ?>
<?php if (isset($post_type) && $post_type == "video"): ?>
    <link href="<?php echo base_url(); ?>assets/vendor/video-player/video-js.min.css" rel="stylesheet"/>
<?php endif; ?>
    <!-- Style -->
    <link href="<?php echo base_url(); ?>assets/css/flexslider.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/astyle.min.css" rel="stylesheet"/>
    <!-- Color CSS -->
<?php if ($vsettings->site_color == '') : ?>
    <link href="<?php echo base_url(); ?>assets/css/colors/default.min.css" rel="stylesheet"/>
<?php else : ?>
    <link href="<?php echo base_url(); ?>assets/css/colors/<?php echo html_escape($vsettings->site_color); ?>.min.css" rel="stylesheet"/>
<?php endif; ?>
    <!-- Responsive -->
    <link href="<?php echo base_url(); ?>assets/css/responsive.min.css" rel="stylesheet"/>
<?php if ($selected_lang->text_direction == "rtl"): ?>
    <!-- RTL -->
    <link href="<?php echo base_url(); ?>assets/css/rtl.min.css" rel="stylesheet"/>
<?php endif; ?>
    <!--Include Font Style-->
<?php $this->load->view('partials/_font_style'); ?>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php echo $general_settings->google_analytics; ?>
<?php echo $general_settings->head_code; ?>
<?php if ($selected_lang->text_direction == "rtl"): ?>
    <script>var rtl = true;</script>
<?php else: ?>
    <script>var rtl = false;</script>
<?php endif; ?>

<link href="<?php echo base_url(); ?>assets/css/top-news-strip.css" rel="stylesheet">
<style>
    #city_id_weather{ 
        max-width: 100px;
        background-color: #56565670;
        color: #fff;
        border: 0px solid #3e3e3e;
        /*box-shadow: 3px 3px 0px -2px #7d7d7d;*/
    }
    .weather_report{color:#fff;}
    a.epaper_button {
        position: fixed;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        background-color: red;
        padding: 4px 10px;
        right: -23px;
        max-height: 42px;
        margin-top: 0px;
        margin-bottom: 0px;
        -webkit-transform: rotateZ(90deg);
        transform: rotateZ(270deg);
        top: 240px;
        z-index: 2;
    }
    .block_6-slider{
        text-align: center;
    }
    .block_6-slider .owl-dot span {
        border: 1px solid #b1b1b1;
    }
    .block_6-slider .owl-dot {
        float: none; 
        background-color: transparent;
        border: 0px;
    }
    .block_6-slider .owl-dots {
        position:initial !important;
    }
    .block_6-slider .owl-nav{
        display:none;
    }
    .tob_mobile_bar {
        background-color: black;
        color: #fff;
        text-align: center;
    }
    @media (min-width: 991px){
        #header .tob_mobile_bar {
            display: none;
        }
    }
    a.epaper_button:hover {
        color: #000;
    }
    .bn-lg-sidebar {   
        min-height: 90px;   
    }
    .logo-banner .right {   
        height: auto!important;   
    }
    /*.top-bar {
        background-color:<?php echo $general_settings->top_menu_bg_color;?>!important;   
    }
    .top-bar .top-menu>li>span {
        color: <?php echo $general_settings->top_menu_color;?>!important;
    }
    .top-bar .top-menu>li>a {
        color: <?php echo $general_settings->top_menu_color;?>!important;
    }
    .navbar-default .navbar-nav>li>a {
        color: <?php echo $general_settings->navigation_color;?>!important;
    }
    .main-menu {
        background-color:<?php echo $general_settings->navigation_bg_color;?>!important;   
    }
    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
        background-color: <?php echo $general_settings->navigation_active_bg_color;?>!important;
    }
    #footer {
        color: <?php echo $general_settings->footer_color;?>!important;   
        background-color: <?php echo $general_settings->footer_bg_color;?>!important;   
    }*/
    .newsletter {
        font-size: 13px;
        margin-top: 20px;
    }
    .footer-widgets {
        padding-bottom: 5px;
    }
    /* header logo max width */
    .logo-banner .left .logo {
        max-width: 605px;
    }
</style>


<style>
    @media (max-width: 767px){
        <?php if($general_settings->featured_block == 1){ ?>
        #featured .featured-left{display: none!important;}
        <?php }?>
        <?php if($general_settings->featured_block == 3){?>
        #featured .featured-right{display: none!important;}
        <?php }?>
        <?php if($general_settings->featured_block == 6){ ?>
        #featured{display: none!important; }
        <?php }?>
    }
    @media (min-width: 767px){
        <?php if($general_settings->featured_block == 4){ ?>
        #featured {display: none!important;}
        <?php }?>
    }
</style>

<style>
    body.custom-background {
        background-color: #ffffff;
        background-image: url(assets/img/12.jpg);
    }
    #header{
        background-color: #ffffff;
        width: 1170px;
    }
    .top-bar {
        background:linear-gradient(to bottom, #fda400 0%, #ff7300 100%);   
    }
    .top-bar .top-menu-left>li>span {
        color: #ffffff !important;
    }
    .top-bar .top-menu-right>li.profile-dropdown>a {
        color: #ffffff !important;
    }
    .tob_mobile_bar {
        background-color: #db6400;
    }
    .navbar-default .navbar-nav>li>a {
        color: #ffffff !important;
    }
    .main-menu {
        background:linear-gradient(to bottom, #fda400 0%, #ff7300 100%);   
    }
    .main-menu .navbar-nav>li>a:hover {
        background:#db6400 !important;   
    }
    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
        background-color: #db6400 !important;
    }
    .navbar {
        border-radius: 0 !important;
    }
    .navbar-default .navbar-nav>li>a {
        text-transform: none;
        text-align: center;
        line-height: 25px;
        font-weight: inherit !important;
    }
    .fa {
        line-height: 50px;
    }
    #footer {
        color: #ffffff !important;   
        background: linear-gradient(to bottom, #fda400 0%, #ff7300 100%); 
        margin-top:0px !important;
    }
    .footer-bottom-left {
        float: none;
        padding-left: 15px;
        text-align: center;
    }
    .footer-bottom {
        border-top:none !important;
        background: linear-gradient(to bottom, #fda400 0%, #ff7300 100%) 0 0;
        width: 1170px;
        margin-left: -15px
    }
    .footer-widgets {
        padding-left: 20px;
    }

    .top-bar, .news-ticker-title, .section .section-head .title, .sidebar-widget .widget-head, .section-mid-title .title, .comment-nav-tabs .title, .section .section-head .comment-nav-tabs .active a .title {
        background-color: #db6400;
    }
    .news-ticker{
        background-color: #f1f1f1;
    }
    .news-ticker-cnt {
        margin: 25px 0;
        display: block;
        width: 102%;
        margin-bottom: 5px;
    }
    .news-ticker>ul>li>a{
       color: #db6400;
       font-weight:normal;
    }
    .news-ticker>ul>li>a:hover{
       color: #d31d1d;
    }

    .top-bar .top-menu-right>li>a{
        padding: 0px 0px;
    }
    .top-bar .top-menu-right>li>a>i.fa-facebook {
        width: 30px;
        height: 30px;
        color: #f8f8f8;
        font-size: 14px;
        line-height: 30px;
        text-align: center;
        display: block;
        border-radius: 1px;
        color:#3b5998;
        font-size: 18px;
    }
    .top-bar .top-menu-right>li>a>i.fa-twitter {
        width: 30px;
        height: 30px;
        color: #f8f8f8;
        font-size: 14px;
        line-height: 30px;
        text-align: center;
        display: block;
        border-radius: 1px;
        color: #1da1f2;
        font-size: 18px;
    }
    .top-bar .top-menu-right>li>a>i.fa-google-plus {
        width: 30px;
        height: 30px;
        color: #f8f8f8;
        font-size: 14px;
        line-height: 30px;
        text-align: center;
        display: block;
        border-radius: 1px;
        color: #dc4a38;
        padding-left:2px;
        font-size: 18px;
    }
    .top-bar .top-menu-right>li>a>i.fa-pinterest {
        width: 30px;
        height: 30px;
        color: #f8f8f8;
        font-size: 14px;
        line-height: 30px;
        text-align: center;
        display: block;
        border-radius: 1px;
        color: #bd081c;
        font-size: 18px;
    }
    .top-bar .top-menu-right>li>a>i.fa-instagram {
        width: 30px;
        height: 30px;
        color: #f8f8f8;
        font-size: 14px;
        line-height: 30px;
        text-align: center;
        display: block;
        border-radius: 1px;
        color: #d02e95;
        font-size: 18px;
    }
    .top-bar .top-menu-right>li>a>i.fa-youtube-play {
        width: 30px;
        height: 30px;
        color: #f8f8f8;
        font-size: 14px;
        line-height: 30px;
        text-align: center;
        display: block;
        border-radius: 1px;
        color: #b00;
        font-size: 18px;
    }
    #featured .featured-left {
        width: 100%;
    }
    #wrapper .container{
        background: #fff;
        min-height:740px;
    }
    .sidebar-widget .widget-border {
        border: 1px solid rgba(0, 0, 0, 0.1);
    }
    .section-block-6 .section-head{
        background-color: #fda400 !important;
        border-bottom: 2px solid #fda400 !important;

    }
    .section-block-5 .section-head{
        background-color: #fda400 !important;
        border-bottom: 2px solid #fda400 !important; 
    }
    .section-block-4 .section-head{
        background-color: #fda400 !important;
        border-bottom: 2px solid #fda400 !important; 
    }
    .section-block-3 .section-head{
        background-color: #fda400 !important;
        border-bottom: 2px solid #fda400 !important;
    }
    .section-block-2 .section-head{
        background-color: #fda400 !important;
        border-bottom: 2px solid #fda400 !important; 
    }
    .section-block-1 .section-head{
        background-color: #fda400 !important;
        border-bottom: 2px solid #fda400 !important; 
    }

    .section-block-6 .section-head .title {
        position: relative;
        width: auto;
        vertical-align: middle;
        overflow: visible;
    }
    .section-block-6 .section-head .title:after {
        content: "";
        position: absolute;
        display: block;
        right: -11px;
        top: 0px;
        width: -19px;
        height: 0px;
        border-top: solid 30px #db6400;
        border-right: solid 12px transparent;
    }
    .section-block-5 .section-head .title {
        position: relative;
        width: auto;
        vertical-align: middle;
        overflow: visible;
    }
    .section-block-5 .section-head .title:after {
        content: "";
        position: absolute;
        display: block;
        right: -11px;
        top: 0px;
        width: -19px;
        height: 0px;
        border-top: solid 30px #db6400;
        border-right: solid 12px transparent;
    }
    .section-block-4 .section-head .title {
        position: relative;
        width: auto;
        vertical-align: middle;
        overflow: visible;
    }
    .section-block-4 .section-head .title:after {
        content: "";
        position: absolute;
        display: block;
        right: -11px;
        top: 0px;
        width: -19px;
        height: 0px;
        border-top: solid 30px #db6400;
        border-right: solid 12px transparent;
    }
    .section-block-3 .section-head .title {
        position: relative;
        width: auto;
        vertical-align: middle;
        overflow: visible;
    }
    .section-block-3 .section-head .title:after {
        content: "";
        position: absolute;
        display: block;
        right: -11px;
        top: 0px;
        width: -19px;
        height: 0px;
        border-top: solid 30px #d31d1d;
        border-right: solid 12px transparent;
    }
    .section-block-2 .section-head .title {
        position: relative;
        width: auto;
        vertical-align: middle;
        overflow: visible;
    }
    .section-block-2 .section-head .title:after {
        content: "";
        position: absolute;
        display: block;
        right: -11px;
        top: 0px;
        width: -19px;
        height: 0px;
        border-top: solid 30px #edca22;
        border-right: solid 12px transparent;
    }
    .section-block-1 .section-head .title {
        position: relative;
        width: auto;
        vertical-align: middle;
        overflow: visible;
    }
    .section-block-1 .section-head .title:after {
        content: "";
        position: absolute;
        display: block;
        right: -11px;
        top: 0px;
        width: -19px;
        height: 0px;
        border-top: solid 30px #43b528;
        border-right: solid 12px transparent;
    }
    .scrollup i{
        background-color: rgba(255, 255, 255, 0.5);
    }
    .footer-widget {
        margin-top: 20px;
    }
    .category-toogle-wrap {
    float: left;
    position: relative;
}
.category-toggle-block {
    background: #db6400 none repeat scroll 0 0;
    display: block;
    height: 35px;
    text-align: center;
    width: 40px;
    padding-top: 7px;
    cursor: pointer;
}
.category-toggle-block .toggle-bar {
    background: rgba(255, 255, 255, 0.8) none repeat scroll 0 0;
    display: block;
    height: 3px;
    margin: 0 auto 6px;
    width: 30px;
}
@media (max-width: 1200px){
    .container {
        width: 100%;
        margin-left:-75px;
    }
    .news-ticker-cnt {
        margin: 15px -90px;
        width: 100%;
    }
    .footer-bottom {
        width: 100%;
        margin-left: 75px; 
    }
    #header {
        width: 100%;
        margin-left: -75px; 
    }
    .news-ticker-btn-cnt{
        right: -15px;
    }
    .news-ticker{
        width: 330px;
    }
}

@media (max-width: 767px){
    #footer {
        width: 330px !important;
        margin-left: -75px;
    }
    #footer .title{
        margin-left:50px;
    }
    .f-widget-about p {
        margin-left:50px;
    }
    .f-random-list {
        margin-left:50px;
    }
    .f-widget-follow p{
        margin-left:50px;
    }
}
    
</style>

</head>
<body class="custom-background">
    
<?php if ($general_settings->show_breaking_news == 1): ?>
    <div id="hed">
      <!-- Container Begin-->
        <div class="animation-bg">
            <div class="container-fluid">
              <!-- Row Begin-->
                <div class="row">
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"> <a type="submit" class="btn btn-default btn-sm btn-secret"><?php echo strtoupper(trans('breaking_news')); ?></a> </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                        <!-- News API Feed -->
                        <div id="scroll">
                            <div id="layer" style="position: absolute; left: -18px; top: 0px; visibility: visible;">
                                <!-- Don't Edit below DIV section -->
                                <div id="inner2">
                                    <div>
                                        <marquee behavior="" direction="" onmouseover="stop();"onmouseout="start();">
                                            <?php foreach ($breaking_news as $post): ?>
                                            <span>
                                                <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>" target="_blank" id="breaking_news_span"> <i class="fa fa-caret-right" aria-hidden="true"> </i> <?php echo html_escape($post->title); ?> </a>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php endforeach; ?>
                                        </marquee> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    <!-- Cross Button -->
                    <a href="javascript:void(0)" class="strip-in-down-cancel-btn"> <i class="fa fa-times" id="cross" aria-hidden="true"></i> </a> </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?> 
<?php if ($general_settings->show_epaper_menu == 1): ?>
    <a href="<?php echo base_url('home/epaper'); ?>" target="_blank" class="epaper_button"><?php echo trans('epaper'); ?></a>
<?php endif; ?>   
<div class="container" style="margin-left:75px;">
<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="col-sm-12">
                <div class="row">
                    <ul class="top-menu top-menu-left">
                        <!--Print top menu pages-->
                        <?php foreach ($main_menu as $menu_item): ?>
                            <?php if ($menu_item['visibility'] == 1 && $menu_item['location'] == "top"): ?>
                                <li><a href="<?php echo $menu_item['link']; ?>"><?php echo html_escape($menu_item['title']); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        
                      <!--   <?php if ($general_settings->show_epaper_menu == 1): ?>
                        <li><a href="<?php echo base_url('home/epaper'); ?>" target="_blank"><?php echo trans('epaper'); ?></a></li>
                        <?php endif; ?>
 -->
                        <?php if ($general_settings->show_android_app_url == 1): ?>
                        <li><a href="<?php echo $settings->android_app_url; ?>" target="_blank"><?php echo trans('android_app_url'); ?></a></li>
                        <?php endif; ?>
                        
                        <?php if ($general_settings->show_apple_app_url == 1): ?>
                        <li><a href="<?php echo $settings->apple_app_url; ?>" target="_blank"><?php echo trans('apple_app_url'); ?></a></li>
                        <?php endif; ?>

                        <!-- <?php if (auth_check()): ?>
                            <?php if (user()->role == "admin" || user()->role == "author" || user()->role == "contributor") { ?>
                                <li><a href="<?php echo base_url(); ?>admin"><?php echo trans("admin_panel"); ?></a></li>
                            <?php } ?>
                        <?php endif; ?> -->
                        <!-- <li class="weather_details">
                            <select id="city_id_weather" onchange='get_weather_by_city(this)'>
                                <option value="1273294" >Delhi</option>
                            </select>
                            <span class="weather_report"></span>
                        </li> -->
                        <div class="category-toogle-wrap">
                                <div class="category-toggle-block">
                                    <span class="toggle-bar"></span>
                                    <span class="toggle-bar"></span>
                                    <span class="toggle-bar"></span>
                                </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <li><span id='ct'></span></li>
                    </ul>

                    <ul class="top-menu top-menu-right">

                        <!--Check auth-->
                        <!-- <?php if (auth_check()): ?>
                            <li class="dropdown profile-dropdown">
                                <a class="dropdown-toggle a-profile" data-toggle="dropdown" href="#"
                                   aria-expanded="false">
                                    <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="<?php echo html_escape(user()->username); ?>">
                                    <?php echo html_escape(user()->username); ?> <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if (auth_check()): ?>
                                        <?php if (user()->role == "admin" || user()->role == "author" || user()->role == "contributor") { ?>
                                            <li><a href="<?php echo base_url(); ?>admin"><i class="fa fa-home"></i> <?php echo trans("dashboard"); ?></a></li>
                                        <?php } ?>
                                    <?php endif; ?>
                                    <?php if (user()->role == "admin" || user()->role == "author" || user()->role == "contributor") { ?>
                                        <li>
                                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo user()->slug; ?>">
                                                <i class="fa fa-bars"></i>
                                                <?php echo trans("my_posts"); ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?php echo lang_base_url(); ?>reading-list">
                                            <i class="fa fa-star"></i>
                                            <?php echo trans("reading_list"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo lang_base_url(); ?>profile-update">
                                            <i class="fa fa-user"></i>
                                            <?php echo trans("update_profile"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo lang_base_url(); ?>change-password">
                                            <i class="fa fa-lock"></i>
                                            <?php echo trans("change_password"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>logout" class="logout">
                                            <i class="fa fa-sign-out"></i>
                                            <?php echo trans("logout"); ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        <?php else: ?>
                            <?php if ($general_settings->registration_system == 1): ?>
                                <li class="top-li-auth">
                                    <a href="#" data-toggle="modal" data-target="#modal-login"><?php echo trans("login"); ?></a>
                                    <span>/</span>
                                    <a href="<?php echo lang_base_url(); ?>register"><?php echo trans("register"); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?> -->

                        <?php if ($general_settings->multilingual_system == 1): ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="fa fa-language"></i>&nbsp;
                                    <?php echo html_escape($selected_lang->name); ?> <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu lang-dropdown">
                                    <?php
                                    foreach ($languages as $language):
                                        $lang_url = base_url() . $language->short_form . "/";
                                        if ($language->id == $this->general_settings->site_lang) {
                                            $lang_url = base_url();
                                        } ?>
                                        <li>
                                            <a href="<?php echo $lang_url; ?>" class="<?php echo ($language->id == $selected_lang->id) ? 'selected' : ''; ?> ">
                                                <?php echo $language->name; ?>
                                            </a>
                                        </li>

                                    <?php endforeach; ?> 

                                </ul>
                            </li>
                        <?php endif; ?>
                        <!-- <li><span id='ct'></span></li> -->
                        <?php $this->load->view('partials/_social_media_links', ['rss_hide' => true]); ?>
                    </ul>

                </div>
            </div>
        </div><!--/.container-->
    </div><!--/.top-bar-->

    <div class="logo-banner">
        <div class="container">
            
            <div class="col-sm-12 col-md-12">
                
                <div class="row">
                <div class="col-md-4">
                    <div class="left" style="text-align: center; width:960px;">
                        <a href="<?php echo lang_base_url(); ?>">
                            <img src="<?php echo get_logo($vsettings); ?>" alt="logo" class="logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-8">

                    <div class="right">
                        <div class="pull-right" style="max-width:780px;">
                            <!--Include banner-->

                            <?php //$this->load->view("partials/_ad_spaces", ["ad_space" => "header"]); ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->
    </div><!--/.top-bar-->

    <nav class="navbar navbar-default main-menu megamenu">
        <div class="container">
            <?php $menu_limit = $general_settings->menu_limit - 1; ?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <div class="row">

                    <ul class="nav navbar-nav">
                        <li class="<?php echo (uri_string() == 'index' || uri_string() == "") ? 'active' : ''; ?>">
                            <a href="<?php echo lang_base_url(); ?>">
                                <?php 
                            if($general_settings->home_buton_style =="icon"){echo "<i class='fa fa-home'></i> ";}
                            if($general_settings->home_buton_style =="english"){echo trans("english_home");}
                            if($general_settings->home_buton_style =="icon_english"){echo "<i class='fa fa-home'></i> ";}
                            if($general_settings->home_buton_style =="hindi"){echo trans("hindi_home");}
                            if($general_settings->home_buton_style =="icon_hindi"){echo "<i class='fa fa-home'></i> ";}
                                ?>
                            </a>
                        </li>
                        <?php $total_item = 0; ?>
                        <?php $menu_item_count = 1; ?>
                        <?php foreach ($main_menu as $menu_item): ?>
                            <?php if ($menu_item['visibility'] == 1 && $menu_item['location'] == "main" && $menu_item['parent_id'] == "0"): ?>
                                <?php if ($menu_item_count <= $menu_limit): ?>
                                    <?php $sub_links = helper_get_sub_menu_links($menu_item['id'], $menu_item['type']); ?>
                                    <?php if ($menu_item['type'] == "category"): ?>
                                 <?php if($general_settings->navigation_post==0){ ?>
                          <?php if (!empty($sub_links)): ?>
                         <?php $this->load->view('partials/_simple_multicategory', ['item_id' => $menu_item['id']]); ?>
                          <?php else: ?>
                              <?php $this->load->view('partials/_simple_singlecategory', ['item_id' => $menu_item['id']]); ?>
                                        <?php endif; ?>
                                            <?php  } else{?>
                                        <?php if (!empty($sub_links)): ?>
                                            <!--Include mega menu-->
                                            <?php $this->load->view('partials/_megamenu_multicategory', ['item_id' => $menu_item['id']]); ?>
                                        <?php else: ?>
                                            <!--Include mega menu-->
                                            <?php $this->load->view('partials/_megamenu_singlecategory', ['item_id' => $menu_item['id']]); ?>
                                        <?php endif; ?>
                                   <?php }?>
                                    <?php else: ?>
                                        <?php if (!empty($sub_links)):?>
                                            <!-- <li class="dropdown <?php echo (uri_string() == 'category/' . $menu_item['slug'] ||
                                                uri_string() == $menu_item['slug']) ? 'active' : ''; ?>">
                                                <a class="dropdown-toggle disabled no-after" data-toggle="dropdown"
                                                   href="<?php echo $menu_item['link']; ?>">
                                                    <?php echo html_escape($menu_item['title']); ?>
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu dropdown-more dropdown-top">
                                                    <?php foreach ($sub_links as $sub_item): ?>
                                                        <?php if ($sub_item["visibility"] == 1): ?>
                                                            <li>
                                                                <a role="menuitem" href="<?php echo $sub_item['link']; ?>">
                                                                    <?php echo html_escape($sub_item['title']); ?>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li> -->
                                        <?php else: ?>
                                            <li class="<?php echo (uri_string() == 'category/' . $menu_item['slug'] ||
                                                uri_string() == $menu_item['slug']) ? 'active' : ''; ?>">
                                                <a href="#" 
                                                    <?php if($menu_item['new_tab']==1){echo "target='_blank'"; }?>>
                                                    <?php echo html_escape($menu_item['title']).'<br>'.html_escape($menu_item['english_title']); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php $menu_item_count++; ?>
                                <?php endif; ?>
                                <?php $total_item++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if ($total_item > $menu_limit): ?>
                            <li class="dropdown relative">
                                <a class="dropdown-toggle dropdown-more-icon" data-toggle="dropdown" href="#">
                                    <i class="fa fa-ellipsis-h"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-more dropdown-top">
                                    <?php $menu_item_count = 1; ?>
                                    <?php foreach ($main_menu as $menu_item): ?>
                                        <?php if ($menu_item['visibility'] == 1 && $menu_item['location'] == "main" && $menu_item['parent_id'] == "0"): ?>
                                            <?php if ($menu_item_count > $menu_limit): ?>
                                                <?php $sub_links = helper_get_sub_menu_links($menu_item['id'], $menu_item['type']); ?>
                                                <?php if (!empty($sub_links)): ?>
                                                    <li class="dropdown-more-item">
                                                        <a class="dropdown-toggle disabled" data-toggle="dropdown" href="<?php echo $menu_item['link']; ?>">
                                                            <?php echo html_escape($menu_item['title']); ?> <span class="icon-ion-android-arrow-dropright"></span>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-sub">
                                                            <?php foreach ($sub_links as $sub_item): ?>
                                                                <?php if ($sub_item["visibility"] == 1): ?>
                                                                    <li>
                                                                        <a role="menuitem"
                                                                           href="<?php echo $sub_item['link']; ?>">
                                                                            <?php echo html_escape($sub_item['title']); ?>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                <?php else: ?>
                                                    <li>
                                                        <a href="<?php echo $menu_item['link']; ?>">
                                                            <?php echo html_escape($menu_item['title']); ?>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php $menu_item_count++; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="li-search">
                            <a class="search-icon"><i class="fa fa-search"></i></a>
                            <div class="search-form">
                                <?php echo form_open(lang_base_url() . 'search', ['method' => 'get']); ?>
                                <input type="text" name="q" maxlength="300" pattern=".*\S+.*" class="form-control form-input" placeholder="<?php echo trans("placeholder_search"); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                                <?php echo form_close(); ?>
                            </div>
                        </li>
                    </ul>

                </div>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>

    <div class="col-sm-12">
        <div class="row">
            <div class="tob_mobile_bar">
                 <span id='ct2'></span>
            </div>

            <div class="nav-mobile">

                <div class="logo-cnt">
                    <a href="<?php echo lang_base_url(); ?>">
                        <img src="<?php echo get_logo($vsettings); ?>" alt="logo" class="logo">
                    </a>
                </div>

                <div class="mobile-nav-search">
                    <a class="search-icon"><i class="fa fa-search"></i></a>
                    <div class="search-form">
                        <?php echo form_open(lang_base_url() . 'search', ['method' => 'get']); ?>
                        <input type="text" name="q" maxlength="300" pattern=".*\S+.*"
                               class="form-control form-input"
                               placeholder="<?php echo trans("placeholder_search"); ?>" required>
                        <button class="btn btn-default"><i class="fa fa-search"></i></button>
                        <?php echo form_close(); ?>
                    </div>
                </div>

                <span onclick="open_mobile_nav();" class="mobile-menu-icon"><i class="icon-ion-navicon-round"></i> </span>

            </div>
        </div>
    </div>

</header>

<div id="mobile-menu" class="mobile-menu">
    <div class="mobile-menu-inner">
        <p class="text-right p-close-menu">
            <a href="javascript:void(0)" class="closebtn" onclick="close_mobile_nav();"><i
            class="icon-ion-ios-close-empty"></i></a>
        </p>

        <div class="col-sm-12">
            <div class="row">
                <nav class="navbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo lang_base_url(); ?>">
                                <?php echo trans("home"); ?>
                            </a>
                        </li>

                        <?php foreach ($main_menu as $menu_item): ?>
                            <?php if ($menu_item['visibility'] == 1 && $menu_item['location'] == "main" && $menu_item['parent_id'] == "0"): ?>
                                <?php $sub_links = helper_get_sub_menu_links($menu_item['id'], $menu_item['type']); ?>
                                <?php if (!empty($sub_links)): ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true" aria-expanded="true">
                                            <?php echo html_escape($menu_item['title']) ?>
                                            <span class="icon-ion-chevron-down mobile-dropdown-arrow"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <?php if ($menu_item['type'] == "category"): ?>
                                                <li>
                                                    <a href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($menu_item['slug']) ?>"><?php echo trans("all"); ?></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php foreach ($sub_links as $sub): ?>
                                                <li>
                                                    <a href="<?php echo $sub['link']; ?>">
                                                        <?php echo html_escape($sub['title']) ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>

                                <?php else: ?>
                                    <li>
                                        <a href="<?php echo $menu_item['link']; ?>">
                                            <?php //echo html_escape($menu_item['title']); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <!-- <?php if (auth_check()): ?>
                            <?php if (user()->role == "admin" || user()->role == "author" || user()->role == "contributor") { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin"><?php echo trans("admin_panel"); ?></a>
                                </li>
                            <?php } ?>
                        <?php endif; ?> -->

                        <!--Check auth-->
                        <!-- <?php if (auth_check()): ?>
                            <li class="dropdown profile-dropdown">
                                <a class="dropdown-toggle a-profile" data-toggle="dropdown" href="#"
                                   aria-expanded="false">
                                    <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="<?php echo html_escape(user()->username); ?>">
                                    <?php echo html_escape(user()->username); ?> <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if (user()->role == "admin" || user()->role == "author" || user()->role == "contributor") { ?>
                                        <li>
                                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo user()->slug; ?>">
                                                <i class="fa fa-bars"></i>
                                                <?php echo trans("my_posts"); ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?php echo lang_base_url(); ?>reading-list">
                                            <i class="fa fa-star"></i>
                                            <?php echo trans("reading_list"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo lang_base_url(); ?>profile-update">
                                            <i class="fa fa-user"></i>
                                            <?php echo trans("update_profile"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo lang_base_url(); ?>change-password">
                                            <i class="fa fa-lock"></i>
                                            <?php echo trans("change_password"); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>logout" class="logout">
                                            <i class="fa fa-sign-out"></i>
                                            <?php echo trans("logout"); ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        <?php else: ?>
                            <?php if ($general_settings->registration_system == 1): ?>
                                <li>
                                    <a href="<?php echo lang_base_url(); ?>login"
                                       class="close-menu-click"><?php echo trans("login"); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo lang_base_url(); ?>register"
                                       class="close-menu-click"><?php echo trans("register"); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?> -->

                        <?php if ($general_settings->multilingual_system == 1): ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <?php echo html_escape($selected_lang->name); ?> <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    foreach ($languages as $language):
                                        $lang_url = base_url() . $language->short_form . "/";
                                        if ($language->id == $this->general_settings->site_lang) {
                                            $lang_url = base_url();
                                        } ?>
                                        <li>
                                            <a href="<?php echo $lang_url; ?>" class="<?php echo ($language->id == $selected_lang->id) ? 'selected' : ''; ?> ">
                                                <?php echo $language->name; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                            <?php foreach ($main_menu as $menu_item): ?>
                            <?php if ($menu_item['visibility'] == 1 && $menu_item['location'] == "top"): ?>
                                <li><a href="<?php echo $menu_item['link']; ?>"><?php echo html_escape($menu_item['title']); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if ($general_settings->show_epaper_menu == 1): ?>
                      <li><a href="<?php echo base_url('home/epaper'); ?>" target="_blank" class=""><?php echo trans('epaper'); ?></a></li>
                        <?php endif; ?>   
                    </ul>
                </nav>
            </div>

            <div class="row">
                <div class="mobile-search">
                    <?php echo form_open(lang_base_url() . 'search', ['method' => 'get']); ?>
                    <input type="text" name="q" maxlength="300" pattern=".*\S+.*" class="form-control form-input"
                           placeholder="<?php echo trans("placeholder_search"); ?>" required>
                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <div class="row">
                <ul class="mobile-menu-social">
                    <!--Include social media links-->
                    <?php $this->load->view('partials/_social_media_links', ['rss_hide' => false]); ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--Include modals-->
<?php $this->load->view('partials/_modals'); ?>
