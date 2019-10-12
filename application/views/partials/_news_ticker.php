<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!--News Ticker-->
<?php if ($general_settings->show_newsticker == 1 && count($news_ticker_posts) > 0): ?>
    <div class="col-sm-12 news-ticker-cnt">
        <div class="row m-0">
            <div class="left">
                <span class="news-ticker-title font-second"><?php echo trans("breaking_news"); ?></span>
            </div>

            <div class="right">
                <div class="news-ticker">
                    <ul>
                        <?php foreach ($news_ticker_posts as $post): ?>
                            <li>
                                <a href="#" title="<?php echo html_escape($post->title); ?>">
                                    <?php echo html_escape($post->title); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="news-ticker-btn-cnt">
                <a href="#" class="bnt-news-ticker news-prev"><span class="icon-ion-ios-arrow-left"></span></a>
                <a href="#" class="bnt-news-ticker news-next"><span class="icon-ion-ios-arrow-right"></span></a>
            </div>
        </div>

    </div>
<?php else: ?>
    <div class="col-sm-12 news-ticker-sep"></div>
<?php endif; ?>