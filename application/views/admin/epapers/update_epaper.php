<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('update_epaper'); ?></h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/update_epapers_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <input type="hidden" name="id" value="<?php echo html_escape($epaper_history->id); ?>">
                <input type="hidden" name="path_big" value="<?php echo html_escape($epaper_history->path_big); ?>">
                <input type="hidden" name="path_small" value="<?php echo html_escape($epaper_history->path_small); ?>">
                <div class="form-group">
                    <label><?php echo trans("language"); ?></label>
                    <select name="lang_id" class="form-control" onchange="get_gallery_categories_by_lang(this.value);">
                        <?php foreach ($languages as $language): ?>
                            <option value="<?php echo $language->id; ?>" <?php echo ($epaper_history->lang_id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo trans("date"); ?></label>
                    <div class='input-group date' id='datetimepicker'>
                        <input type='text' class="form-control" name="date" id="input_date_published" placeholder="<?php echo trans("date"); ?>" value="<?php echo $epaper_history->created_at; ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo trans('title'); ?></label>
                    <input type="text" class="form-control"
                           name="title" id="title" placeholder="<?php echo trans('title'); ?>"
                           value="<?php echo html_escape($epaper_history->title); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                </div>
                
                <div class="form-group">
                    <label class="control-label"><?php echo trans('content'); ?></label>
                    <input type="text" class="form-control"
                           name="content" id="content" placeholder="<?php echo trans('content'); ?>"
                           value="<?php echo html_escape($epaper_history->content); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                </div>

                <div class="form-group">
                    <label class="control-label"><?php echo trans('edition'); ?></label>
                    <select name="edition" class="form-control">
                        <?php foreach ($editions as $edition): ?>
                            <option value="<?php echo html_escape($edition->id); ?>" <?php echo ($epaper_history->edition == $edition->id) ? 'selected' : ''; ?>>
                                <?php echo html_escape($edition->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                </div>

                <div class="form-group">
                    <label class="control-label"><?php echo trans('image'); ?> </label>
                    <div class="col-sm-12 p0">
                        <div class="row">
                            <div class="col-sm-4">
                                <?php
                                    if (!empty($epaper_history_lists)) {
                                    foreach ($epaper_history_lists as $epaper_history_list) {
                                ?>
                                <img src="<?php echo base_url() . html_escape($epaper_history_list->path_small); ?>" alt="" class="thumbnail img-responsive">
                                <?php  } }?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class='btn btn-success btn-sm btn-file-upload'>
                                    <?php echo trans('select_image'); ?>
                                    <input type="file" id="Multifileupload" name="files[]" size="55550" accept=".png, .jpg, .jpeg, .gif" multiple="multiple" style="cursor: pointer;">
                                </a>
                            </div>
                        </div>

                        <div id="MultidvPreview"></div>

                    </div>
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