<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-8">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="left">
                    <h3 class="box-title"><?php echo trans('reset_password'); ?></h3>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/reset_password_post'); ?>

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
                


                <div class="form-group">
                    <label><?php echo trans('form_new_password'); ?></label>
                    <input type="password" class="form-control form-input"
                           name="new_password" placeholder="<?php echo trans('form_new_password'); ?>"
                           value="<?php echo old('new_password'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                </div>

                <div class="form-group">
                    <label><?php echo trans('form_confirm_password'); ?></label>
                    <input type="password" class="form-control form-input"
                           name="confirm_password" placeholder="<?php echo trans('form_confirm_password'); ?>"
                           value="<?php echo old('confirm_password'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
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