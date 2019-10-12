<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .cke_top{display:none;}
    .display_ck_options{display:block;}
</style>
<div class="row">
    <div class="col-sm-12">

        <!-- form start -->
        <?php echo form_open_multipart('admin_post/add_post_post'); ?>

        <input type="hidden" name="post_type" value="post">

        <div class="row">
            <div class="col-sm-12 form-header">
                <h1 class="form-title"><?php echo trans('add_post'); ?></h1>
                <a href="<?php echo base_url(); ?>admin_post/posts?lang_id=<?php echo $general_settings->site_lang;?>" class="btn btn-sm btn-success btn-add-new pull-right">
                    <i class="fa fa-bars"></i>
                    <?php echo trans('all_posts'); ?>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-post">

                    <div class="form-post-left">
                        <?php $this->load->view("admin/includes/_form_add_post_left"); ?>
                    </div>

                    <div class="form-post-right">

                        <div class="row">
                        <?php if (is_admin()){?>
                            <div class="col-sm-12">
                                <?php $this->load->view('admin/includes/_post_image_upload_box'); ?>
                            </div>
                            <div class="col-sm-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <div class="left">
                                            <h3 class="box-title"><?php echo trans('additional_images'); ?></h3>
                                        </div>
                                    </div><!-- /.box-header -->

                                    <div class="box-body">

                                        <div class="form-group m0">
                                            <label class="control-label"><?php echo trans('additional_images'); ?></label>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a class='btn btn-sm bg-purple' data-toggle="modal" data-target="#image_file_manager" onclick="$('#selected_image_type').val('additional_image');">
                                                        <?php echo trans('select_image'); ?>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group m0">
                                            <div class="row">
                                                <div class="col-sm-12 m-b-15">
                                                    <div class="additional-image-list">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <div class="left">
                                            <h3 class="box-title"><?php echo trans('language'); ?></h3>
                                        </div>
                                    </div><!-- /.box-header -->

                                    <div class="box-body">
                                        <div class="form-group">
                                            <label><?php echo trans("language"); ?></label>
                                            <select name="lang_id" class="form-control" onchange="get_categories_by_lang(this.value);">
                                                <?php foreach ($languages as $language): ?>
                                                    <option value="<?php echo $language->id; ?>" <?php echo ($site_lang->id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php } else{  ?>
<input type="hidden" name="lang_id" value="<?php echo $site_lang->id; ?>">
<?php } ?> 
                                <div class="col-sm-12">
                                <?php $this->load->view('admin/includes/_post_auto_share'); ?>
                            </div>
                            <div class="col-sm-12">
                                <?php $this->load->view('admin/includes/_post_publish_box'); ?>
                            </div>

                            <div class="col-sm-12 " style="display:none;">
                                <?php $this->load->view('admin/includes/_random_post_box'); ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?><!-- form end -->

    </div>
</div>

<script>
    $("#checkAll").on('ifChecked', function () {
      $('[name="share_post[]"]').closest('.icheckbox_square-purple').addClass('checked');
    });
    $("#checkAll").on('ifUnchecked', function () {
       $('[name="share_post[]"]').closest('.icheckbox_square-purple').removeClass('checked');
    });
 

//     $("#ckediter_options_button").click(function(){
//    $(".cke_top").css({"display": "block "});
// });
      
</script>