<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="post-share">
  <?php foreach ($posts_share as $post): ?>
    <ul class="share-box">
      <li class="li-whatsapp">
          <a href="https://api.whatsapp.com/send?text=<?php echo html_escape($post->title); ?> - <?php echo lang_base_url(); ?>admin_post/posts?lang_id=<?php echo $general_settings->site_lang;?>/<?php echo html_escape($post->title_slug); ?>"
             class="social-btn-sm whatsapp"
             target="_blank">
              <i class="fa fa-whatsapp"></i>
          </a>
      </li>
      <li class="share-li-lg">
          <a href="javascript:void(0)"
             onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo lang_base_url(); ?>admin_post/posts?lang_id=<?php echo $general_settings->site_lang;?>/<?php echo html_escape($post->title_slug); ?>', 'Share This Post', 'width=640,height=450');return false"
             class="social-btn-lg facebook">
              <i class="fa fa-facebook"></i>
              <span><?php echo trans("facebook"); ?></span>
          </a>
      </li>
      <li class="share-li-lg">
        <a href="javascript:void(0)"
           onclick="window.open('https://twitter.com/share?url=<?php echo lang_base_url(); ?>admin_post/posts?lang_id=<?php echo $general_settings->site_lang;?>/<?php echo html_escape($post->title_slug); ?>&amp;text=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
           class="social-btn-lg twitter">
            <i class="fa fa-twitter"></i>
            <span><?php echo trans("twitter"); ?></span>
        </a>
      </li>
      <li class="share-li-lg">
          <a href="javascript:void(0)"
             onclick="window.open('https://plus.google.com/share?url=<?php echo lang_base_url(); ?>admin_post/posts?lang_id=<?php echo $general_settings->site_lang;?>/<?php echo html_escape($post->title_slug); ?>', 'Share This Post', 'width=640,height=450');return false"
             class="social-btn-lg google">
              <i class="fa fa-google-plus"></i>
              <span><?php echo trans("google"); ?></span>
          </a>
      </li>
      <li>
          <a href="javascript:void(0)"
             onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo lang_base_url(); ?>admin_post/posts?lang_id=<?php echo $general_settings->site_lang;?>/<?php echo html_escape($post->title_slug); ?>', 'Share This Post', 'width=640,height=450');return false"
             class="social-btn-sm linkedin">
              <i class="fa fa-linkedin"></i>
          </a>
      </li>
      <!-- <li>
          <a href="javascript:void(0)"
             onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo lang_base_url(); ?>admin_post/posts?lang_id=<?php echo $general_settings->site_lang;?>/<?php echo html_escape($post->title_slug); ?>&amp;media=<?php echo lang_base_url() . html_escape($post->image_default); ?>', 'Share This Post', 'width=640,height=450');return false"
             class="social-btn-sm pinterest">
              <i class="fa fa-pinterest"></i>
          </a>
      </li> -->
      <!-- <li>
          <a href="javascript:void(0)"
             onclick="window.open('http://www.tumblr.com/share/link?url=<?php echo lang_base_url(); ?>admin_post/posts?lang_id=<?php echo $general_settings->site_lang;?>/<?php echo html_escape($post->title_slug); ?>&amp;title=<?php echo html_escape($post->title); ?>', 'Share This Post', 'width=640,height=450');return false"
             class="social-btn-sm tumblr">
              <i class="fa fa-tumblr"></i>
          </a>
      </li> -->
    </ul>
  <?php endforeach; ?>
</div>
