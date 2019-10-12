<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <?php if (is_admin()): ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('notification'); ?></h3>
            </div>
            <!-- /.box-header -->


            <!-- form start -->
            <?php echo form_open('admin/add_notification_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                  <label><?php echo trans('send_to_all'); ?></label>&nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="is_select_all" value="1" id="is_select_all" class="square-purple">
                </div>

                <div class="form-group" id="send_to_div">
                    <label><?php echo trans('send_to'); ?></label>
                    <select name="user_id" class="form-control">
                        <option value="">Select User</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user->id; ?>"><?php echo $user->username; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo trans('comment'); ?></label>
                    <textarea id="ckEditor" name="comment" class="form-control textarea-exp" required></textarea>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><?php echo trans('add_notification'); ?></button>
            </div>
            <!-- /.box-footer -->

            <?php echo form_close(); ?><!-- form end -->

        </div>
        <!-- /.box -->
    </div>
</div>
<?php endif;?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?php echo trans('list_notification'); ?></h3>
        </div>
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th width="20" class="table-no-sort"><input type="checkbox" class="checkbox-table" id="checkAll"></th>
                            <th width="20"><?php echo trans('id'); ?></th>
                            <th><?php echo trans('comment'); ?></th>
                            <th><?php echo trans('status'); ?></th>
                            <th><?php echo trans('date_added'); ?></th>
                            <th class="max-width-120"><?php echo trans('options'); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($notifications as $item): 
                            if(is_author() || is_contributor()){

                                if($item->user_id == user()->id){
                            ?>

                            <tr>
                                <td style="text-align: center !important;"><input type="checkbox" name="checkbox-table" class="checkbox-table" value="<?php echo $item->id; ?>"></td>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td><?php echo strip_tags($item->comment); ?></td>
                                <td>
                                    <?php if ($item->seen_status == 0): ?>
                                        <label class="label label-danger"><i class="fa fa-eye"></i></label>
                                    <?php else: ?>
                                        <label class="label label-success"><i class="fa fa-eye"></i></label>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo nice_date($item->date, 'd.m.Y'); ?></td>

                                <td>
                                    <!-- form delete notification -->
                                    <?php echo form_open('admin/delete_notification_post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown"><?php echo trans('select_an_option'); ?>
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="p0">
                                                    <button type="submit" name="option" value="delete"
                                                            class="btn-list-button"
                                                            onclick="return confirm('<?php echo trans("confirm_notification"); ?>');">
                                                        <i class="fa fa-trash i-delete"></i><?php echo trans('delete'); ?>
                                                    </button>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                    <?php echo form_close(); ?><!-- form end -->

                                </td>
                            </tr>

                        <?php }
                            }else { ?>
                                  <tr>
                                <td style="text-align: center !important;"><input type="checkbox" name="checkbox-table" class="checkbox-table" value="<?php echo $item->id; ?>"></td>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td><?php echo strip_tags($item->comment); ?></td>
                                <td>
                                    <?php if ($item->seen_status == 0): ?>
                                        <label class="label label-danger"><i class="fa fa-eye"></i></label>
                                    <?php else: ?>
                                        <label class="label label-success"><i class="fa fa-eye"></i></label>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo nice_date($item->date, 'd.m.Y'); ?></td>

                                <td>
                                    <!-- form delete notification -->
                                    <?php echo form_open('admin/delete_notification_post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown"><?php echo trans('select_an_option'); ?>
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="p0">
                                                    <button type="submit" name="option" value="delete"
                                                            class="btn-list-button"
                                                            onclick="return confirm('<?php echo trans("confirm_notification"); ?>');">
                                                        <i class="fa fa-trash i-delete"></i><?php echo trans('delete'); ?>
                                                    </button>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                    <?php echo form_close(); ?><!-- form end -->

                                </td>
                            </tr>

                    <?php  } endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="pull-left">
                            <button class="btn btn-sm btn-danger btn-table-delete" onclick="delete_selected_notifications('<?php echo trans("confirm_notifications"); ?>');"><?php echo trans('delete'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>

<?php $this->load->view("admin/includes/_file_manager_ckeditor"); ?>
<script type="text/javascript">
    $('#is_select_all').on('ifChecked', function () {
        $("#send_to_div").fadeOut();
    });
    $('#is_select_all').on('ifUnchecked', function () {
        $("#send_to_div").fadeIn();
    });

    //delete selected notifications
    function delete_selected_notifications($message) {

        if (confirm($message)) {

            var notification_ids = [];

            $("input[name='checkbox-table']:checked").each(function () {
                notification_ids.push(this.value);
            });

            var data = {
                'notification_ids': notification_ids,
            };

            data[csfr_token_name] = $.cookie(csfr_cookie_name);

            $.ajax({
                type: "POST",
                url: base_url + "admin/delete_selected_notifications",
                data: data,
                success: function (response) {
                    location.reload();
                }
            });
        }
    }
</script>