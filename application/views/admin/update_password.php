<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-8">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="left">
                    <h3 class="box-title"><?php echo trans('update_password'); ?></h3>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/update_password_post'); ?>

            <input type="hidden" name="id" value="<?php echo html_escape($user->id); ?>">

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <?php if ($user->role == "admin"): ?>
                        <label class="label bg-olive"><?php echo trans('admin'); ?></label>
                    <?php elseif ($user->role == "author"): ?>
                        <label class="label label-warning"><?php echo trans('author'); ?></label>
                    <?php elseif ($user->role == "user"): ?>
                        <label class="label label-default"><?php echo trans('user'); ?></label>
                    <?php else: ?>
                        <label class="label label-default"><?php echo trans('contributor'); ?></label>
                    <?php endif; ?>
                </div>
                
                <?php if (!empty($user->password)): ?>
                    <div class="form-group">
                        <input type="password" name="old_password" class="form-control form-input"
                               placeholder="<?php echo trans("form_old_password"); ?>"
                               value="<?php echo old('old_password'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                    </div>
                    <input type="hidden" name="old_password_empty" value="1">
                <?php else: ?>
                    <input type="hidden" name="old_password_empty" value="0">
                <?php endif; ?>

                <div class="form-group">
                    <label><?php echo trans('form_new_password'); ?></label>
                    <input type="password" class="form-control form-input"
                           name="password" placeholder="<?php echo trans('form_new_password'); ?>"
                           value="<?php echo old('password'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                </div>

                <div class="form-group">
                    <label><?php echo trans('form_confirm_password'); ?></label>
                    <input type="password" class="form-control form-input"
                           name="password_confirmation" placeholder="<?php echo trans('form_confirm_password'); ?>"
                           value="<?php echo old('password_confirmation'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
    </div>
</div>