<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo trans('delete_epapers'); ?></h3>
        </div>
    </div><!-- /.box-header -->
    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-warning">
                <p><?php echo trans('msg_bulk_delete_posts'); ?></p>
            </div>
        </div>
    </div>

    <div class="box-body">
        
        <div class="form-group">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <label class="control-label"><?php echo trans('delete_with_images'); ?></label>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <input type="checkbox" name="delete_epaper" value="1" id="cb_scheduled" class="square-purple">
                </div>
            </div>
        </div>

        
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label><?php echo trans('date'); ?></label>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class='input-group date' id='datetimepicker'>
                        <input type='text' class="form-control" name="date_epaper" id="input_date_published" placeholder="<?php echo trans("date"); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <button onclick="bulk_delete_epapers('<?php echo trans("confirm_epapers"); ?>');" class="btn btn-danger"><?php echo trans('delete_epapers'); ?></button>
        </div>
        

    </div><!-- /.box-body -->
</div>
<script type="text/javascript">
    function bulk_delete_epapers($message) {

        if (confirm($message)) {

            var delete_epaper = $('#input_date_published').val();

            var data = {
                'delete_epaper': delete_epaper,
            };

            data[csfr_token_name] = $.cookie(csfr_cookie_name);

            $.ajax({
                type: "POST",
                url: base_url + "admin/bulk_delete_epapers",
                data: data,
                success: function (response) {
                    location.reload();
                }
            });
        }
    }

</script>
