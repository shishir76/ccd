<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo $title; ?></h3>
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
                    <table class="table table-bordered table-striped" role="grid">
                        <?php $this->load->view('admin/includes/_filter_reports'); ?>
                        <thead>
                             <tr><td colspan="6"> <?php if (count($posts) > 0): ?>
                                <div class="pull-left">
                                    <button class="btn btn-sm btn-danger btn-table-delete" onclick="delete_selected_posts('<?php echo trans("confirm_posts"); ?>');"><?php echo 'Delete Selected Posts'; ?></button>
                                </div>
                            <?php endif; ?></td>
<td colspan="5" class="text-right text-danger "><b style="font-size:17px;">Total Posts : <?php echo $reports_count; ?></b></td>
                        </tr>
                        <tr role="row">
                            <th width="20"><input type="checkbox" class="checkbox-table" id="checkAll" ></th>
                            <th width="20"><?php echo trans('id'); ?></th>
                            <th><?php echo trans('post'); ?></th>
                            <th><?php echo trans('language'); ?></th>
                            <th><?php echo trans('post_type'); ?></th>
                            <th><?php echo trans('category'); ?></th>
                            <th><?php echo trans('author'); ?></th>
                            <th><?php echo trans('date_added'); ?></th>
                            <th class="max-width-120"><?php echo trans('options'); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($posts as $item): ?>
                           
                            <tr>
                                <td><input type="checkbox" name="checkbox-table" class="checkbox-table" value="<?php echo $item->id; ?>"></td>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td class="td-post">
                                    <img src="<?php echo $img_bg_sm; ?>" data-src="<?php echo get_post_image($item, "small"); ?>" alt="" class="lazyload img-responsive post-image"/>
                                    <?php echo html_escape($item->title); ?>
                                </td>
                                <td>
                                    <?php
                                    $lang = get_language($item->lang_id);
                                    if (!empty($lang)) {
                                        echo html_escape($lang->name);
                                    }
                                    ?>
                                </td>
                                <td class="td-post-type"><?php echo html_escape($item->post_type); ?></td>
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
                                <td>
                                    <?php $author = get_user($item->user_id);
                                    if (!empty($author)): ?>
                                        <a href="<?php echo base_url(); ?>profile/<?php echo html_escape($author->slug); ?>" target="_blank">
                                            <strong><?php echo html_escape($author->username); ?></strong>
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $item->created_at; ?></td>

                                <td>
                                    <!-- form delete user -->
                                    <?php echo form_open('admin_post/post_options_post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown"><?php echo trans('select_an_option'); ?>
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu pull-right options-list">

                                            <!-- <li>
                                                <a class="p0">
                                                    <button type="submit" name="option" value="delete"
                                                            class="btn-list-button"
                                                            onclick="return confirm('<?php echo trans("confirm_post"); ?>');">
                                                        <i class="fa fa-trash i-delete"></i><?php echo trans('delete'); ?>
                                                    </button>
                                                </a>
                                            </li> -->

                                            <li>
                                                <a class="p0">
                                                   <button type="submit" name="option" value="delete_with_img" class="btn-list-button" onclick="return confirm('<?php echo trans("confirm_post"); ?>');"><i class="fa fa-trash i-delete"></i><?php echo trans('delete_with_image'); ?>
                                                   </button>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="p0">
                                                   <button type="submit" name="option" value="delete_without_img" class="btn-list-button" onclick="return confirm('<?php echo trans("confirm_post"); ?>');"><i class="fa fa-trash i-delete"></i><?php echo trans('delete_without_image'); ?>
                                                   </button>
                                                </a>
                                           </li>

                                        </ul>
                                    </div>

                                    <?php echo form_close(); ?><!-- form end -->

                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>

                    <div class="col-sm-12 table-ft">
                        <div class="row">

                            <div class="pull-right">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>

                            <?php if (count($posts) > 0): ?>
                                <div class="pull-left">
                                    <button class="btn btn-sm btn-danger btn-table-delete" onclick="delete_selected_posts('<?php echo trans("confirm_posts"); ?>');"><?php echo 'Delete Selected Posts'; ?></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>