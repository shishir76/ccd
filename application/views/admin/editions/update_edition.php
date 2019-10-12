<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('update_edition'); ?></h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/update_editions_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <input type="hidden" name="id" value="<?php echo html_escape($editions->id); ?>">
                
                <div class="form-group">
                    <label><?php echo trans("language"); ?></label>
                    <select name="lang_id" class="form-control" onchange="get_gallery_categories_by_lang(this.value);">
                        <?php foreach ($languages as $language): ?>
                            <option value="<?php echo $language->id; ?>" <?php echo ($editions->lang_id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo trans("date"); ?></label>
                    <div class='input-group date' id='datetimepicker'>
                        <input type='text' class="form-control" name="date" id="input_date_published" placeholder="<?php echo trans("date"); ?>" value="<?php echo $editions->created_at; ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo trans('name'); ?></label>
                    <input type="text" class="form-control"
                           name="name" id="name" placeholder="<?php echo trans('name'); ?>"
                           value="<?php echo html_escape($editions->name); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                </div>

                <div class="form-group">
                    <label class="control-label"><?php echo trans('status'); ?></label>
                    <select name="status" class="form-control">
                        <option value="1" <?php echo ($editions->status == 1) ? 'selected' : ''; ?>><?php echo trans('active'); ?></option>      
                        <option value="0" <?php echo ($editions->status == 0) ? 'selected' : ''; ?>><?php echo trans('inactive'); ?></option>      
                    </select>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
</div>