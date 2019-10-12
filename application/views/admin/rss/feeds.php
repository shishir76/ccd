<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="box">

            <div class="box-header with-border">
                <div class="left">
                    <h3 class="box-title"><?php echo trans('rss_feeds'); ?></h3>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin_rss/import_feed" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-plus"></i>
                        <?php echo trans('import_rss_feed'); ?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <!-- include message block -->
                    <div class="col-sm-12">
                        <?php $this->load->view('admin/includes/_messages'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped dataTable" id="cs_datatable_lang" role="grid" aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th width="20"><?php echo trans('id'); ?></th>
                                    <th><?php echo trans('feed_name'); ?></th>
                                    <th><?php echo trans('feed_url'); ?></th>
                                    <th><?php echo trans('language'); ?></th>
                                    <th><?php echo trans('category'); ?></th>
                                    <th><?php echo trans('posts'); ?></th>
                                    <th><?php echo trans('auto_update'); ?></th>
                                    <th></th>
                                    <th class="max-width-120"><?php echo trans('options'); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($feeds as $item): ?>
                                    <tr>
                                        <td><?php echo html_escape($item->id); ?></td>
                                        <td><?php echo html_escape($item->feed_name); ?></td>
                                        <td style="white-space: pre-wrap;word-break: break-all;"><?php echo html_escape($item->feed_url); ?></td>
                                        <td>
                                            <?php
                                            $lang = get_language($item->lang_id);
                                            if (!empty($lang)) {
                                                echo html_escape($lang->name);
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php $category = helper_get_category($item->category_id);
                                            if (!empty($category)): ?>
                                                <label class="category-label m-r-5 label-table" style="background-color: <?php echo html_escape($category->color); ?>!important;">
                                                    <?php echo html_escape($category->name); ?>
                                                </label>
                                            <?php endif; ?>

                                            <?php $category = helper_get_category($item->subcategory_id);
                                            if (!empty($category)): ?>
                                                <label class="category-label label-table" style="background-color: <?php echo html_escape($category->color); ?>">
                                                    <?php echo html_escape($category->name); ?>
                                                </label>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $item->post_limit; ?></td>
                                        <td>
                                            <?php if ($item->auto_update == 1): ?>
                                                <label class="label bg-olive"><?php echo trans('yes'); ?></label>
                                            <?php else: ?>
                                                <label class="label label-default"><?php echo trans('no'); ?></label>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <!--Form delete category-->
                                            <?php echo form_open('admin_rss/check_feed_posts'); ?>

                                            <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">
                                <div class="dropdown">
                                            <button type="button" class="btn btn-success btn-sm dropdown-toggle btn-select-option"  data-toggle="dropdown">
                                                <i class="fa fa-refresh "></i>&nbsp;&nbsp;<?php echo trans("update"); ?> <span class="caret"></span>
                                            </button>
                                             <ul class="dropdown-menu">
                                                    <li>
                                                        <button type="submit" class="btn-list-button" value="0" name="status"><?php echo trans('draft_rss_feed'); ?></button> &nbsp;&nbsp;&nbsp;
               
                                                    </li>
                                                    <li>
                                                        <a class="p0">
                                                            <button type="submit" class="btn-list-button" value="1" name="status"><?php echo trans('import_rss_feed'); ?></button>
                                                        </a>
                                                    </li>
                                                </ul>

                                            <?php echo form_close(); ?><!--Form end-->

                                        </td>
                                        <td>
                                            <!--Form delete category-->
                                            <?php echo form_open('admin_rss/delete_feed_post'); ?>

                                            <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                            <div class="dropdown">
                                                <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                        type="button"
                                                        data-toggle="dropdown"><?php echo trans('select_an_option'); ?>
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>admin_rss/update_feed/<?php echo html_escape($item->id); ?>"><i
                                                                    class="fa fa-edit i-edit"></i><?php echo trans('edit'); ?></a>
                                                    </li>
                                                    <li>
                                                        <a class="p0">
                                                            <button type="submit" class="btn-list-button"
                                                                    onclick="return confirm('<?php echo trans("confirm_rss"); ?>');">
                                                                <i class="fa fa-trash i-delete"></i><?php echo trans('delete'); ?>
                                                            </button>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php echo form_close(); ?><!--Form end-->

                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->


        </div>

        <div class="callout" style="margin-top: 30px;background-color: #fff; border-color:#00c0ef;max-width: 600px;">
            <h4>Cron Job</h4>

            <p><strong>http://domain.com/cron/check_feed_posts</strong></p>
            <small><?php echo trans('msg_cron_feed'); ?></small>
        </div>
    </div>
</div>
