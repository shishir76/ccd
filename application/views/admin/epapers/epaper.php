<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('add_epaper'); ?></h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/add_epapers_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages_form'); ?>
                <div class="form-group">
                    <label><?php echo trans("language"); ?></label>
                    <select name="lang_id" class="form-control" onchange="get_gallery_categories_by_lang(this.value);">
                        <?php foreach ($languages as $language): ?>
                            <option value="<?php echo $language->id; ?>" <?php echo ($site_lang->id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label><?php echo trans("date"); ?></label>
                    <div class='input-group date' id='datetimepicker'>
                        <input type='text' class="form-control" name="date" id="input_date_published" placeholder="<?php echo trans("date"); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label"><?php echo trans('title'); ?></label>
                    <input type="text" class="form-control"
                           name="title" id="title" placeholder="<?php echo trans('title'); ?>"
                           value="<?php echo old('title'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo trans('content'); ?></label>
                    <input type="text" class="form-control"
                           name="content" id="content" placeholder="<?php echo trans('content'); ?>"
                           value="<?php echo old('content'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                </div>

                <div class="form-group">
                    <label class="control-label"><?php echo trans('edition'); ?></label>
                    <select name="edition" class="form-control">
                        <?php foreach ($editions as $edition): ?>
                            <?php if ($edition->id == old('edition')): ?>
                                <option value="<?php echo html_escape($edition->id); ?>" selected>
                                    <?php echo html_escape($edition->name); ?></option>
                            <?php else: ?>
                                <option value="<?php echo html_escape($edition->id); ?>"><?php echo html_escape($edition->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label"><?php echo trans('image'); ?></label>
                    <div class="col-sm-12 p0">
                        <div class="row">
                            <div class="col-sm-12">
                                <a class='btn btn-success btn-sm btn-file-upload'>
                                    <?php echo trans('select_image'); ?>
                                    <input type="file" id="Multifileupload" name="files[]" size="55550" accept=".png, .jpg, .jpeg, .gif" multiple="multiple" required>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div id="MultidvPreview">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><?php echo trans('add_epaper'); ?></button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="left">
                    <h3 class="box-title"><?php echo trans('epaper_history'); ?></h3>
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
                            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                	<th width="20" class="table-no-sort"><input type="checkbox" class="checkbox-table" id="checkAll"></th>
                                    <th width="20"><?php echo trans('id'); ?></th>
                                    <th><?php echo trans('image'); ?></th>
                                    <th><?php echo trans('title'); ?></th>
                                    <th><?php echo trans('content'); ?></th>
                                    <th><?php echo trans('edition'); ?></th>
                                    <th><?php echo trans('date'); ?></th>
                                    <th class="max-width-120"><?php echo trans('options'); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($epapers as $item): ?>
                                    <tr>
                                    	<td style="text-align: center !important;">
                                            <input type="checkbox" name="checkbox-table" class="checkbox-table" value="<?php echo $item->id; ?>"></td>
                                        <td><?php echo html_escape($item->id); ?></td>
                                        <td>
                                            <?php
                                                $epaper_history_list = get_epaper_history_list($item->id);
                                                if (!empty($epaper_history_list)) {
                                            ?>
                                            <img src="<?php echo base_url() . html_escape($epaper_history_list->path_small); ?>" alt="" class="img-responsive" style="max-width: 100px; max-height: 100px;">
                                            <?php  } ?>
                                        </td>
                                        <td><?php echo html_escape($item->title); ?></td>
                                        <td><?php echo html_escape($item->content); ?></td>
                                        <td>
                                            <?php
                                                $editions = get_edition($item->edition);
                                                if (!empty($editions)) {
                                                    echo html_escape($editions->name);
                                                }
                                            ?> 
                                        </td>
                                        <td><?php echo nice_date($item->created_at, 'd.m.Y'); ?></td>

                                        <td>
                                            <!--Form-->
                                            <?php echo form_open('admin/delete_epapers_post'); ?>

                                            <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                            <div class="dropdown">
                                                <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                        type="button"
                                                        data-toggle="dropdown"><?php echo trans('select_an_option'); ?>
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>admin/update_epapers/<?php echo html_escape($item->id); ?>"><i
                                                                    class="fa fa-edit i-edit"></i><?php echo trans('edit'); ?></a></li>
                                                    <li>
                                                        <a class="p0">
                                                            <button type="submit" class="btn-list-button"
                                                                    onclick="return confirm('<?php echo trans("confirm_epaper"); ?>');">
                                                                <i class="fa fa-trash i-delete"></i><?php echo trans("delete"); ?>
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
                        <div class="col-sm-12">
		                    <div class="row">
		                        <div class="pull-left">
		                            <button class="btn btn-sm btn-danger btn-table-delete" onclick="delete_selected_epapers('<?php echo trans("confirm_epapers"); ?>');"><?php echo trans('delete'); ?></button>
		                        </div>
		                    </div>
		                </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
<script type="text/javascript">

    //delete selected epaper
    function delete_selected_epapers($message) {

        if (confirm($message)) {

            var epaper_ids = [];

            $("input[name='checkbox-table']:checked").each(function () {
                epaper_ids.push(this.value);
            });

            var data = {
                'epaper_ids': epaper_ids,
            };

            data[csfr_token_name] = $.cookie(csfr_cookie_name);

            $.ajax({
                type: "POST",
                url: base_url + "admin/delete_selected_epapers",
                data: data,
                success: function (response) {
                    location.reload();
                }
            });
        }
    }
</script>

