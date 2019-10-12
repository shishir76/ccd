<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Start Footer Section -->
<footer id="footer" style="
    width: 1170px;">
    <div class="container">
        <div class="row footer-widgets">

            <!-- footer widget about-->
            <div class="col-sm-4 col-xs-12">
                <h3 class="title" style="border-bottom:1px solid #787878;padding-bottom:10px;"><span class="block-title" style="border-bottom:1px solid #db6400;padding-bottom:10px;"><span>About Us</span></span></h3>
                <div class="footer-widget f-widget-about">
                    <div class="col-sm-12">
                        <div class="row">
                            <!-- <p class="footer-logo">
                                <img src="<?php echo get_logo_footer($vsettings); ?>" alt="logo" class="logo">
                            </p> -->
                            
                            <p>
                                <?php echo html_escape($settings->about_footer); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-sm-4 -->

            <!-- footer widget random posts-->
            <div class="col-sm-1 col-xs-12"></div>
            <div class="col-sm-3 col-xs-12">
                <h3 class="title" style="border-bottom:1px solid #787878;padding-bottom:10px;"><span class="block-title" style="border-bottom:1px solid #db6400;padding-bottom:10px;"><span>Useful Links</span></span></h3>
                <div class="footer-widget f-widget-random">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="title-line"></div>
                            <ul class="f-random-list">
                                <!--List random posts-->
                                <li>
                                    <span class="arrow"> > </span>   <a href="#" style="color:#ffffff;">ThemeGrill</a>
                                </li>
                                <li>
                                    <span class="arrow"> > </span>    <a href="#" style="color:#ffffff;">Support</a>
                                </li>
                                <li>
                                    <span class="arrow"> > </span>    <a href="#" style="color:#ffffff;">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Include footer random posts partial-->
                <?php //$this->load->view('partials/_footer_random_posts'); ?>
            </div><!-- /.col-sm-4 -->


            <!-- footer widget follow us-->
            <div class="col-sm-4 col-xs-12 f-widget-follow">
                <h3 class="title" style="border-bottom:1px solid #787878;padding-bottom:10px;"><span class="block-title" style="border-bottom:1px solid #db6400;padding-bottom:10px;"><span>संपर्क करें</span></span></h3>
                <p><strong>Vishva Hindu Parishad</strong></p>
                <p>Sankat Mochan Hanuman Mandir<br> Ashram, R.K. Puram,&nbsp; Sector 6,</p>
                <p>New Delhi – 110022, Bharat (India)</p>
                <p><strong>Phone:</strong> +9111-&nbsp; 26103495</p>
                <p><strong>Fax:</strong> + 9111-26195527</p>
                <!-- <div class="col-sm-12 footer-widget f-widget-follow">
                    <div class="row">
                        <h4 class="title"><?php echo html_escape(trans("footer_follow")); ?></h4>
                        <ul>
                            Include social media links
                            <?php //$this->load->view('partials/_social_media_links', ['rss_hide' => false]); ?>
                        </ul>
                    </div>
                </div> -->
                <?php if ($general_settings->newsletter==1): ?>
                <!-- newsletter -->
                <div class="newsletter col-sm-12">
                    <div class="row">
                        <p><?php echo html_escape(trans("footer_newsletter")); ?></p>

                        <?php echo form_open('home/add_to_newsletter'); ?>
                        <input type="email" name="email" maxlength="199"
                               placeholder="<?php echo html_escape(trans("placeholder_email")); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>

                        <input type="submit" value="<?php echo html_escape(trans("btn_send")); ?>" class="newsletter-button">
                        <?php echo form_close(); ?>

                    </div>
                    <div class="row">
                        <p id="newsletter">
                            <?php
                            if ($this->session->flashdata('news_error')):
                                echo '<span class="text-danger">' . $this->session->flashdata('news_error') . '</span>';
                            endif;

                            if ($this->session->flashdata('news_success')):
                                echo '<span class="text-success">' . $this->session->flashdata('news_success') . '</span>';
                            endif;
                            ?>
                        </p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- .col-md-3 -->
        </div>
        <!-- .row -->

        <!-- Copyright -->
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-left">
                        <p><?php echo trans('copyright'). ' &copy; ' .date('Y').html_escape($settings->copyright); ?></p>
                    </div>

                    <div class="footer-bottom-right">
                        <ul class="nav-footer">
                            <?php foreach ($main_menu as $menu_item): ?>
                                <?php if ($menu_item['visibility'] == 1 && $menu_item['location'] == "footer"): ?>
                                    <li>
                                        <a href="<?php echo $menu_item['link']; ?>"><?php echo html_escape($menu_item['title']); ?> </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- .row -->
        </div>
    </div>
</footer>
</div>
<!-- End Footer Section -->
<?php if (!isset($_COOKIE["vr_cookies"]) && $settings->cookies_warning): ?>
    <div class="cookies-warning">
        <div class="text"><?php echo $this->settings->cookies_warning_text; ?></div>
        <a href="javascript:void(0)" onclick="hide_cookies_warning();" class="icon-cl"> <i class="icon-ion-close-round"></i></a>
    </div>
<?php endif; ?>
<script>
    var base_url = '<?php echo base_url(); ?>';
    var fb_app_id = '<?php echo $this->general_settings->facebook_app_id; ?>';
    var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';
</script>

<!-- Scroll Up Link -->
<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>

<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Lazy Load js -->
<script src="<?php echo base_url(); ?>assets/js/lazysizes.min.js"></script>
<!-- Owl-carousel -->
<script src="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.carousel.min.js"></script>

<!--News Ticker-->
<script src="<?php echo base_url(); ?>assets/vendor/news-ticker/jquery.easy-ticker.min.js"></script>

<!-- iCheck js -->
<script src="<?php echo base_url(); ?>assets/vendor/icheck/icheck.min.js"></script>

<!-- Jquery Confirm -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-confirm/jquery-confirm.min.js"></script>

<!-- Cookie-->
<script src="<?php echo base_url(); ?>assets/js/jquery.cookie.min.js"></script>


<script src="<?php echo base_url(); ?>assets/js/strip-cancel.js" type="text/javascript"></script>

<?php if(uri_string()=="gallery"): ?>
    <!-- Gallery -->
    <script src="<?php echo base_url(); ?>assets/vendor/masonry-filter/imagesloaded.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/masonry-filter/masonry-3.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/masonry-filter/masonry.filter.js"></script>
    <!-- Magnific Popup-->
    <script src="<?php echo base_url(); ?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function(b){b(".image-popup").magnificPopup({type:"image",titleSrc:function(a){return a.el.attr("title")+"<small></small>"},image:{verticalFit:true,},gallery:{enabled:true,navigateByImgClick:true,preload:[0,1]},removalDelay:100,fixedContentPos:true,})});$(document).ready(function(b){b(".image-popup-no-title").magnificPopup({type:"image",image:{verticalFit:true,},gallery:{enabled:false,navigateByImgClick:true,preload:[0,1]},removalDelay:100,fixedContentPos:true,})});$(document).ready(function(b){b(".single-image-popup").magnificPopup({type:"image",titleSrc:function(a){return a.el.attr("title")+"<small></small>"},image:{verticalFit:true,},gallery:{enabled:false,navigateByImgClick:true,preload:[0,1]},removalDelay:100,fixedContentPos:true,})});$(document).ready(function(){$(".filters .btn").click(function(){$(".filters .btn").removeClass("active");$(this).addClass("active")});$(function(){var b=$("#masonry");b.imagesLoaded(function(){b.masonry({gutterWidth:0,isAnimated:true,itemSelector:".gallery-item"})});$(".filters .btn").click(function(a){a.preventDefault();var d=$(this).attr("data-filter");b.masonryFilter({filter:function(){if(!d){return true}return $(this).attr("data-filter")==d}})})})});
    </script>
<?php endif; ?>

<?php if (isset($post) && $post->post_type == "audio"): ?>
    <script src="<?php echo base_url(); ?>assets/vendor/audio-player/js/amplitude.min.js"></script>
    <script type="text/javascript">
        Amplitude.init({
            "songs": [
                <?php foreach (get_post_audios($post->id) as $audio): ?>
                {
                    "name": '<?php echo html_escape($audio->audio_name);  ?>',
                    "artist": '<?php echo html_escape($audio->musician);  ?>',
                    "url": base_url + '<?php echo $audio->audio_path;  ?>',
                    "cover_art_url": base_url + '<?php echo $post->image_default;  ?>',
                },
                <?php endforeach; ?>
            ]
        });
    </script>
<?php endif; ?>
<?php if (isset($post_type) && $post_type == "video"): ?>
    <script src="<?php echo base_url(); ?>assets/vendor/video-player/videojs-ie8.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/video-player/video.min.js"></script>
<?php endif; ?>
<?php if (isset($post_type)): ?>
    <script src="<?php echo base_url(); ?>assets/vendor/print-this/printThis.min.js"></script>
    <?php echo $general_settings->facebook_comment; ?>
<?php endif; ?>
<!-- Script -->
<script src="<?php echo base_url(); ?>assets/js/customscript.min.js"></script>
<?php if(!auth_check() && $google_login_state==1): ?>
    <script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>
    <script>function onLoadGoogleCallback(){sign_in=document.getElementById("googleSignIn");sign_up=document.getElementById("googleSignUp");gapi.load("auth2",function(){auth2=gapi.auth2.init({client_id:$("meta[name=google-signin-client_id]").attr("content"),cookiepolicy:"single_host_origin",scope:"profile"});auth2.attachClickHandler(sign_in,{},function(b){var c=b.getBasicProfile();var a={id:c.getId(),email:c.getEmail(),name:c.getName(),avatar:c.getImageUrl(),};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"auth/login_with_google",data:a,success:function(d){location.reload()}})},function(a){});auth2.attachClickHandler(sign_up,{},function(b){var c=b.getBasicProfile();var a={id:c.getId(),email:c.getEmail(),name:c.getName(),avatar:c.getImageUrl(),};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"auth/login_with_google",data:a,success:function(d){location.reload()}})},function(a){})})};</script>
<?php endif; ?>

<?php if ($general_settings->show_copy_paste==1): ?>
<script type="text/javascript">
$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});
function click (e) {
  if (!e)
    e = window.event;
    if ((e.type && e.type == "contextmenu") || (e.button && e.button == 2) || (e.which && e.which == 3)) 
    {
        if (window.chrome || window.opera || window.firefox)
            window.alert("Access denied");
            return false;
    }
}
if (document.layers)
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown = click;
    document.oncontextmenu = click;
</script> 
<?php endif; ?>
<?php if ($general_settings->auto_refresh_theme==1): ?>
<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', <?php echo $general_settings->auto_refresh_time; ?>);
</script>
<?php endif; ?>

<script>
$(document).ready(function () {
        display_ct();


});

function display_ct() {
    var  dayNames = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday",
  "Sunday"
];
    var  monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "July", "Aug", "Sep", "Oct", "Nov", "Dec"
];
var x = new Date();
var x1 =dayNames[x.getDay()] +', '+ monthNames[x.getMonth()] +' '+ x.getDate() +','+ x.getFullYear();
//var x1=x.toLocaleString();// changing the display to UTC string
document.getElementById('ct').innerHTML = x1;
document.getElementById('ct2').innerHTML = x1;
tt=display_c();
}
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

$('.block_6-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:false,
    dots: false,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:true
        },
        1000:{
            items:3,
            nav:true,
            loop:true
        }
    }
})



    </script>
</body>
</html>