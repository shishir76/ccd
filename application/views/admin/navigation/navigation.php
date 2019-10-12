<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo trans("add_link"); ?></h3>
                    </div>
                    <!-- /.box-header -->


                    <!-- form start -->
                    <?php echo form_open('admin/add_menu_link_post'); ?>

                    <div class="box-body">
                        <!-- include message block -->
                        <?php if (empty($this->session->flashdata("mes_menu_limit"))):
                            $this->load->view('admin/includes/_messages_form');
                        endif; ?>

                        <div class="form-group">
                            <label><?php echo trans("title"); ?></label>
                            <input type="text" class="form-control" name="title" placeholder="<?php echo trans("title"); ?>"
                                   value="<?php echo old('title'); ?>"
                                   maxlength="200" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                        </div>

                        <div class="form-group">
                            <label><?php echo trans("link"); ?></label>
                            <input type="text" class="form-control" name="link" placeholder="<?php echo trans("link"); ?>"
                                   value="<?php echo old('link'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                        </div>
                         <div class="form-group">
                            <label><?php echo trans("open_page_new_tab"); ?></label>
                            <select name="new_tab" class="form-control" >                              
                                    <option value="0" selected><?php echo trans('no'); ?></option>
                                    <option value="1" ><?php echo trans('yes'); ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo trans('order'); ?></label>
                            <input type="number" class="form-control" name="page_order"
                                   placeholder="<?php echo trans('order'); ?>" value="1"
                                   min="1" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                        </div>

                        <div class="form-group">
                            <label><?php echo trans("language"); ?></label>
                            <select name="lang_id" class="form-control" onchange="get_menu_links_by_lang(this.value);">
                                <?php foreach ($languages as $language): ?>
                                    <option value="<?php echo $language->id; ?>" <?php echo ($site_lang->id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo trans('parent_link'); ?></label>
                            <select id="parent_links" name="parent_id" class="form-control">
                                <option value="0"><?php echo trans('none'); ?></option>
                                <?php foreach ($menu_links as $item): ?>
                                    <?php if ($item["type"] != "category" && $item["location"] == "main" && $item['parent_id'] == "0" && $item['slug'] != "videos"): ?>
                                        <?php if ($item["id"] == old('parent_id')): ?>
                                            <option value="<?php echo $item["id"]; ?>"
                                                    selected><?php echo $item["title"]; ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></option>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12 col-lang">
                                    <label><?php echo trans('show_on_menu'); ?></label>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12 col-lang">
                                    <input type="radio" id="rb_show_on_menu_1" name="visibility" value="1"
                                           class="square-purple" checked>&nbsp;&nbsp;
                                    <label for="rb_show_on_menu_1"
                                           class="cursor-pointer"><?php echo trans('yes'); ?></label>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12 col-lang">
                                    <input type="radio" id="rb_show_on_menu_2" name="visibility" value="0"
                                           class="square-purple">&nbsp;&nbsp;
                                    <label for="rb_show_on_menu_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><?php echo trans('add_link'); ?></button>
                    </div>
                    <!-- /.box-footer -->
                    <?php echo form_close(); ?><!-- form end -->
                </div>
            </div>


            <!-- /.box -->
            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo trans("menu_limit"); ?></h3>
                    </div>
                    <!-- /.box-header -->


                    <!-- form start -->
                    <?php echo form_open('admin/menu_limit_post'); ?>

                    <div class="box-body">

                        <!-- include message block -->
                        <?php if (!empty($this->session->flashdata("mes_menu_limit"))):
                            $this->load->view('admin/includes/_messages_form');
                        endif; ?>

                        <div class="form-group">
                            <label><?php echo trans('menu_limit'); ?></label>
                            <input type="number" class="form-control" name="menu_limit"
                                   placeholder="<?php echo trans('menu_limit'); ?>"
                                   value="<?php echo $general_settings->menu_limit; ?>" min="1"
                                   max="99999" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                        </div>

                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit"
                                class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
                    </div>
                    <!-- /.box-footer -->
                    <?php echo form_close(); ?><!-- form end -->
                </div>
            </div>

        </div>

    </div>


    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="pull-left">
                    <h3 class="box-title"><?php echo trans('navigation'); ?></h3>
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
                            <table class="table table-bordered table-striped dataTable" id="cs_datatable_lang"
                                   role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th style="max-width: 75px;"><?php echo trans('order'); ?></th>
                                    <th><?php echo trans('title'); ?></th>
                                    <th><?php echo trans('parent_link'); ?></th>
                                    <th class="th-lang"><?php echo trans('language'); ?></th>
                                    <th><?php echo trans('visibility'); ?></th>
                                    <th class="max-width-120"><?php echo trans('options'); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($menu_links as $menu_item): ?>
                                    <?php if ($menu_item["location"] == "main"): ?>
                                        <tr>
                                            <td><?php echo html_escape($menu_item["order"]); ?></td>
                                            <td><?php echo html_escape($menu_item["title"]); ?></td>
                                            <td>
                                                <?php $parent = helper_get_parent_link($menu_item["parent_id"], $menu_item["type"]); ?>
                                                <?php if (!empty($parent)): ?>
                                                    <?php if ($menu_item["type"] == "page" || $menu_item["type"] == "link"):
                                                        echo $parent->title;
                                                    endif; ?>

                                                    <?php if ($menu_item["type"] == "category"):
                                                        echo $parent->name;
                                                    endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $lang = get_language($menu_item["lang_id"]);
                                                if (!empty($lang)) {
                                                    echo html_escape($lang->name);
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($menu_item["visibility"] == 0): ?>
                                                    <label class="label label-danger"><i class="fa fa-eye"></i></label>
                                                <?php else: ?>
                                                    <label class="label label-success"><i class="fa fa-eye"></i></label>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if ($menu_item["type"] == "category"): ?>

                                                    <?php echo form_open('admin_category/delete_category_post'); ?>
                                                    <input type="hidden" name="id"
                                                           value="<?php echo $menu_item["id"]; ?>">

                                                    <div class="dropdown">
                                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                                type="button"
                                                                data-toggle="dropdown"><?php echo trans('select_an_option'); ?>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="<?php echo base_url(); ?>admin_category/update_category/<?php echo $menu_item["id"]; ?>?redirect_url=admin/navigation"><i
                                                                            class="fa fa-edit i-edit"></i><?php echo trans('edit'); ?>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="p0">
                                                                    <button type="submit" class="btn-list-button"
                                                                            onclick="return confirm('<?php echo trans("confirm_category"); ?>');">
                                                                        <i class="fa fa-trash i-delete"></i><?php echo trans('delete'); ?>
                                                                    </button>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <?php echo form_close(); ?>

                                                <?php endif; ?>


                                                <?php if ($menu_item["type"] == "page"): ?>

                                                    <?php echo form_open('page/delete_page_post'); ?>
                                                    <input type="hidden" name="id"
                                                           value="<?php echo $menu_item["id"]; ?>">

                                                    <div class="dropdown">
                                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                                type="button"
                                                                data-toggle="dropdown"><?php echo trans('select_an_option'); ?>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="<?php echo base_url(); ?>page/update_page/<?php echo $menu_item["id"]; ?>?redirect_url=admin/navigation"><i
                                                                            class="fa fa-edit i-edit"></i><?php echo trans('edit'); ?>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="p0">
                                                                    <button type="submit" class="btn-list-button"
                                                                            onclick="return confirm('<?php echo trans("confirm_page"); ?>');">
                                                                        <i class="fa fa-trash i-delete"></i><?php echo trans("delete"); ?>
                                                                    </button>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <?php echo form_close(); ?>

                                                <?php endif; ?>


                                                <?php if ($menu_item["type"] == "link"): ?>

                                                    <?php echo form_open('admin/delete_navigation_post'); ?>
                                                    <input type="hidden" name="id"
                                                           value="<?php echo $menu_item["id"]; ?>">

                                                    <div class="dropdown">
                                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                                type="button"
                                                                data-toggle="dropdown"><?php echo trans('select_an_option'); ?>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="<?php echo base_url(); ?>admin/update_menu_link?id=<?php echo $menu_item["id"]; ?>"><i
                                                                            class="fa fa-edit i-edit"></i><?php echo trans('edit'); ?>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="p0">
                                                                    <button type="submit" class="btn-list-button"
                                                                            onclick="return confirm('<?php echo trans("confirm_link"); ?>');">
                                                                        <i class="fa fa-trash i-delete"></i><?php echo trans("delete"); ?>
                                                                    </button>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <?php echo form_close(); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
