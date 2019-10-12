<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo trans('previous_article'); ?></h3>
        </div>
    </div><!-- /.box-header -->

    <div class="box-body">

        <div class="form-group">
            <div class="row">
                <?php if (!empty($random_posts)): ?>
                <?php foreach ($random_posts as $random_post): ?>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="title">

                            <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($random_post->title_slug); ?>" target="_blank" class="post_link">
                                <span class='also_read'><?php echo trans('also_read'); ?></span>
                                <?php echo html_escape(character_limiter($random_post->title, 80, '...')); ?>
                            </a>
                        </p>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>