<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo trans('footer_follow'); ?></h3>
        </div>
    </div><!-- /.box-header -->

    <div class="box-body">

        <div class="form-group">
              <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <label class="control-label"><?php echo 'Select All'; ?></label>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12 text-right select_all">
                    <input type="checkbox" name="all" value="All" id="checkAll" class="square-purple">
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <label class="control-label"><?php echo trans('facebook'); ?></label>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12 text-right">
                    <input type="checkbox" name="share_post[]" value="Facebook" class="square-purple">
                </div>
            </div>
              <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <label class="control-label"><?php echo trans('twitter'); ?></label>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12 text-right">
                    <input type="checkbox" name="share_post[]" value="Twitter" class="square-purple">
                </div>
            </div>
              <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <label class="control-label"><?php echo trans('hello'); ?></label>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12 text-right">
                    <input type="checkbox" name="share_post[]" value="1" class="square-purple">
                </div>
            </div>
        </div>

  

        

    </div>

</div>
