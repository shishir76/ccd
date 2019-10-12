
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-sm-4 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="left">
                    <h3 class="box-title"><?php echo trans('aggregater_api'); ?></h3>
                </div>
                
            </div>

               <?php echo form_open_multipart('admin_rss/aggregater_api_post'); ?>
 					 <div class="box-body">

                <div class="form-group">
                    <label class="control-label"><?php echo trans('aggregater_name'); ?></label>
                    <input type="text" class="form-control" name="aggregater_name" placeholder="<?php echo trans('aggregater_name'); ?>" value="<?php echo old('aggregater_name'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                </div>
                 <div class="form-group">
                    <label class="control-label"><?php echo trans('api_key'); ?></label>
                    <input type="text" class="form-control" name="api_key" placeholder="<?php echo trans('api_key'); ?>" value="<?php echo uniqid('feed');?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> readonly >
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('status'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="rb_visibility_1" name="status" value="1" class="square-purple" <?php echo (old('status') != "0") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="rb_visibility_1" class="cursor-pointer"><?php echo trans('enable'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="rb_visibility_2" name="status" value="0" class="square-purple" <?php echo (old('status') == "0") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="rb_visibility_2" class="cursor-pointer"><?php echo trans('disable'); ?></label>
                        </div>
                    </div>
                </div>
 				<div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><?php echo trans('aggregater_api'); ?></button>
            </div>
               <?php echo form_close(); ?><!-- form end -->
            </div>
            </div>
 </div>
 <div class="col-sm-8 col-xs-12">
     <div class="box">
            <div class="box-header with-border">
                <div class="left">
                    <h3 class="box-title"><?php echo trans('api_list'); ?></h3>
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
                                    <th><?php echo trans('aggregater_name'); ?></th>
                                    <th><?php echo trans('api_key'); ?></th>
                                    <th><?php echo trans('status'); ?></th>
                                    <th><?php echo trans('date'); ?></th>
                                    <th class="max-width-120"><?php echo trans('options'); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $i=1;
                                 foreach ($aggregators_api as $item): ?>
                                    <tr>
                                        <td style="text-align: center !important;"><input type="checkbox" name="checkbox-table" class="checkbox-table" value="<?php echo $item->id; ?>"></td>
                                        <td><?php echo html_escape($i); ?></td>
                                        <td><?php echo html_escape($item->aggregater_name); ?></td>
                                        <td><?php echo html_escape($item->api_key); ?></td>
                                        <td>
                                            <?php if ($item->status == 0): ?>
                                                <label class="label label-danger"><i class="fa fa-eye"></i></label>
                                            <?php else: ?>
                                                <label class="label label-success"><i class="fa fa-eye"></i></label>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo nice_date($item->created_at, 'd.m.Y'); ?></td>

                                        <td>
                                            <!--Form-->
                                            <?php echo form_open('admin_rss/delete_aggregater_api_post'); ?>

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
                                                            <button type="submit" class="btn-list-button"
                                                                    onclick="return confirm('<?php echo trans("confirm_Aggregater"); ?>');">
                                                                <i class="fa fa-trash i-delete"></i><?php echo trans("delete"); ?>
                                                            </button>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php echo form_close(); ?><!--Form end-->

                                        </td>
                                    </tr>
                                
                                <?php  $i++; endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="pull-left">
                                    <button class="btn btn-sm btn-danger btn-table-delete" onclick="delete_selected_apis('<?php echo trans("confirm_aggregator_api"); ?>');"><?php echo trans('delete'); ?></button>
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
    function delete_selected_apis($message) {

        if (confirm($message)) {

            var ids = [];

            $("input[name='checkbox-table']:checked").each(function () {
                ids.push(this.value);
            });

            var data = {
                'aggregator_ids': ids,
            };

            data[csfr_token_name] = $.cookie(csfr_cookie_name);

            $.ajax({
                type: "POST",
                url: base_url + "admin_rss/delete_selected_aggregator_apis",
                data: data,
                success: function (response) {
                    location.reload();
                }
            });
        }
    }
</script>