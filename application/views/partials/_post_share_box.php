<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<ul class="share-box">
    <li class="li-whatsapp">
        <a href="https://api.whatsapp.com/send?text=<?php echo html_escape($post->title); ?> - <?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>"
           class="social-btn-sm whatsapp"
           target="_blank">
            <i class="fa fa-whatsapp"></i>
        </a>
    </li>

    <li class="share-li-lg">
        <a href="javascript:void(0)"
           onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>', 'Share This Post', 'width=640,height=450');return false"
           class="social-btn-sm facebook">
            <i class="fa fa-facebook"></i>
            <span><?php echo trans("facebook"); ?></span>
        </a>
    </li>

    <li class="share-li-lg">
        <a href="javascript:void(0)"
           onclick="window.open('https://twitter.com/share?url=<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>&amp;text=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
           class="social-btn-sm twitter">
            <i class="fa fa-twitter"></i>
            <span><?php echo trans("twitter"); ?></span>
        </a>
    </li>
    <li class="share-li-lg" >
        <a href="fb-messenger://share/?link=<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>&app_id=2243273005694511"           
           class="social-btn-sm facebook-messenger" style="background-color: #080808;">
          <img src="<?php echo base_url();?>assets/img/messenger.png" style="max-width:32px;max-height:32px;"/>
            
        </a>
    </li>


    <li class="share-li-sm">
        <a href="javascript:void(0)"
           onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>', 'Share This Post', 'width=640,height=450');return false"
           class="social-btn-sm facebook">
            <i class="fa fa-facebook"></i>
        </a>
    </li>

    <li class="share-li-sm">
        <a href="javascript:void(0)"
           onclick="window.open('https://twitter.com/share?url=<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>&amp;text=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
           class="social-btn-sm twitter">
            <i class="fa fa-twitter"></i>
        </a>
    </li>

    <li class="share-li-sm" style="display:none;">
        <a href="javascript:void(0)"
           onclick="window.open('https://plus.google.com/share?url=<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>', 'Share This Post', 'width=640,height=450');return false"
           class="social-btn-sm google">
            <i class="fa fa-google-plus"></i>
        </a>
    </li>

    <li>
        <a href="javascript:void(0)"
           onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>', 'Share This Post', 'width=640,height=450');return false"
           class="social-btn-sm linkedin">
            <i class="fa fa-linkedin"></i>
        </a>
    </li>

    <!-- <li>
        <a href="javascript:void(0)"
           onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>', 'Share This Post', 'width=640,height=450');return false"
           class="social-btn-sm envelope">
            <i class="fa fa-envelope"></i>
        </a>
    </li> -->
    
    <!-- <li>
        <a href="javascript:void(0)"
           onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>&amp;media=<?php echo lang_base_url() . html_escape($post->image_default); ?>', 'Share This Post', 'width=640,height=450');return false"
           class="social-btn-sm pinterest">
            <i class="fa fa-pinterest"></i>
        </a>
    </li> -->

    <!-- <li>
        <a href="javascript:void(0)"
           onclick="window.open('http://www.tumblr.com/share/link?url=<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>&amp;title=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
           class="social-btn-sm tumblr">
            <i class="fa fa-tumblr"></i>
        </a>
    </li> -->

    <li style="display:none;">
        <a href="javascript:void(0)" id="print_post" class="social-btn-sm btn-print">
            <i class="fa fa-print"></i>
        </a>
    </li>

    <!--Add to Reading List-->
    <?php if (auth_check()) : ?>

        <?php if ($is_reading_list == false) : ?>
            <li>
                <a href="javascript:void(0)" class="social-btn-sm add-reading-list" data-toggle-tool="tooltip" data-placement="top" title="<?php echo html_escape(trans("add_reading_list")); ?>"
                   onclick="add_delete_from_reading_list('<?php echo $post->id; ?>');">
                    <i class="fa fa-star"></i>
                </a>
            </li>
        <?php else: ?>
            <li>
                <a href="javascript:void(0)" class="social-btn-sm remove-reading-list" data-toggle-tool="tooltip" data-placement="top" title="<?php echo html_escape(trans("delete_reading_list")); ?>"
                   onclick="add_delete_from_reading_list('<?php echo $post->id; ?>');">
                    <i class="fa fa-star"></i>
                </a>
            </li>
        <?php endif; ?>

    <?php else: ?>
        <?php if ($this->general_settings->registration_system == 1): ?>
            <li>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-login" data-toggle-tool="tooltip" data-placement="top" title="<?php echo html_escape(trans("add_reading_list")); ?>"
                   class="social-btn-sm add-reading-list">
                    <i class="fa fa-star"></i>
                </a>
            </li>
        <?php endif; ?>
    <?php endif; ?>

</ul>



