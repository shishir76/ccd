<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    h4 {
        color: #0d6aad;
        text-align: left;
        font-weight: 600;
        margin-bottom: 15px;
        margin-top: 30px;
    }

    .row-ad-space {
        padding: 15px 0;
        background-color: #f7f7f7;
    }

    .row-button {
        background-color: transparent !important;
        min-height: 60px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice
    {
        background-color: #3c8dbc;
        border: 1px solid #3c8dbc;
    }
</style>

<?php if ($site_lang->text_direction == "rtl"): ?>
<style>
    h4 {
        text-align: right;
    }
</style>
<?php endif; ?>
<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('ad_spaces'); ?></h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label><?php echo trans('select_ad_spaces'); ?></label>
                    <select class="form-control custom-select" name="parent_id" onchange="window.location.href = '<?php echo base_url(); ?>'+'admin/ad_spaces?ad_space='+this.value;">
                        <?php foreach ($array_ad_spaces as $key => $value): ?>
                            <option value="<?php echo $key; ?>" <?php echo ($key == $ad_codes->ad_space) ? 'selected' : ''; ?>><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <?php echo form_open_multipart('admin/ad_spaces_post'); ?>

                <input type="hidden" name="ad_space" value="<?php echo $ad_codes->ad_space; ?>">

                <div class="row ad_between">
                    <div class="col-sm-6">
                        <label class="control-label"><?php echo trans('add_between'); ?></label>
                        <input type="text" class="form-control" name="ad_between" placeholder="<?php echo trans('add_between'); ?>"<?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> value="<?php echo $ad_codes->ad_between_para; ?>">
                   </div>
                   
                 
               </div>

                         <div class="row ">
                             <?php if ($ad_codes->ad_space != "ad_model" ){ ?>
                       <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><?php echo trans('exclude_categories'); ?></label>
                            <select id="categories" name="category_id[]" class="form-control select2" multiple="multiple" data-placeholder="<?php echo trans('select_category');?>" style="width:100%;">
                                <?php foreach ($top_categories as $item): ?>
                                    <option 
                                    <?php 
                                    $cat_ids=explode("~",$ad_codes->category_id);
                                    foreach ($cat_ids as $selected_id){
                                        if($item->id==$selected_id){
                                            echo "selected";   
                                        }
                                    }?> value="<?php echo html_escape($item->id); ?>"><?php echo html_escape($item->name); ?></option>
                                <?php endforeach; ?>
                            </select>  
                        </div>
                   </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><?php echo "Ad Type"; ?></label>
                            <select id="ad_type" name="ad_type" class="form-control " style="width:100%;" onchange="show_type(this.value)">
                               <option value="0">Custom</option>
                               <option value="1">Responsive</option>
                            </select>  
                        </div>
                   </div>
               <?php }?>
                 
               </div>
               <div class="add_type_responsive">
                <label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
                <textarea class="form-control text-area-adspace" name="ad_responsive"
                                          placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->responsive_code; ?></textarea>
                                           <div class="row row-ad-space row-button">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
                            </div>
                        </div>
               </div>
               <div class="add_type_custom">
                <?php if ($ad_codes->ad_space == "sidebar_top" || $ad_codes->ad_space == "sidebar_bottom"): ?>
                    <div class="form-group">
                        <?php if (!empty($array_ad_spaces[$ad_codes->ad_space])): ?>
                            <h4><?php echo trans($ad_codes->ad_space . "_ad_space"); ?></h4>
                        <?php endif; ?>

                        <p><label class="control-label label label-bn">300x250 <?php echo trans('banner'); ?></label></p>
                        <div class="row row-ad-space">
                            <div class="col-sm-6">
                                <label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
                                <textarea class="form-control text-area-adspace" name="ad_code_300"
                                          placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->ad_code_300; ?></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label"><?php echo trans('upload_your_banner'); ?></label>
                                <input type="text" class="form-control" name="url_ad_code_300" placeholder="<?php echo trans('paste_ad_url'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                                <div class="row m-t-15">
                                    <div class="col-sm-12">
                                        <a class='btn bg-olive btn-sm btn-file-upload'>
                                            <?php echo trans('select_image'); ?>
                                            <input type="file" name="file_ad_code_300" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info2').html($(this).val());">
                                        </a>
                                    </div>
                                </div>

                                <span class='label label-info' id="upload-file-info2"></span>
                            </div>
                        </div>

                        <p><label class="control-label label label-bn">234x60 <?php echo trans('banner'); ?></label></p>
                        <div class="row row-ad-space">
                            <div class="col-sm-6">
                                <label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
                                <textarea class="form-control text-area-adspace" name="ad_code_234"
                                          placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->ad_code_234; ?></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label"><?php echo trans('upload_your_banner'); ?></label>
                                <input type="text" class="form-control" name="url_ad_code_234" placeholder="<?php echo trans('paste_ad_url'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                                <div class="row m-t-15">
                                    <div class="col-sm-12">
                                        <a class='btn bg-olive btn-sm btn-file-upload'>
                                            <?php echo trans('select_image'); ?>
                                            <input type="file" name="file_ad_code_234" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info3').html($(this).val());">
                                        </a>
                                    </div>
                                </div>

                                <span class='label label-info' id="upload-file-info3"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3 col-xs-12 col-lang">
                                    <label><?php echo trans('visibility'); ?></label>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                    <input type="radio" id="is_active_1" name="is_active" value="1" class="square-purple" <?php if($ad_codes->is_active==1){echo "checked";} ?>>&nbsp;&nbsp;
                                    <label for="is_active_1" class="cursor-pointer"><?php echo trans('show'); ?></label>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                    <input type="radio" id="is_active_2" name="is_active" value="0" class="square-purple" <?php if($ad_codes->is_active==0){echo "checked";} ?>>&nbsp;&nbsp;
                                    <label for="is_active_2" class="cursor-pointer"><?php echo trans('hide'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row row-ad-space row-button">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
                            </div>
                        </div>

                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <?php if (!empty($array_ad_spaces[$ad_codes->ad_space])): ?>
                            <h4><?php echo trans($ad_codes->ad_space . "_ad_space"); ?></h4>
                        <?php endif; ?>

                        <p><label class="control-label label label-bn">728x90 <?php echo trans('banner'); ?></label></p>
                        <div class="row row-ad-space">
                            <div class="col-sm-6">
                                <label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
                                <textarea class="form-control text-area-adspace" name="ad_code_728"
                                          placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->ad_code_728; ?></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label"><?php echo trans('upload_your_banner'); ?></label>
                                <input type="text" class="form-control" name="url_ad_code_728" placeholder="<?php echo trans('paste_ad_url'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                                <div class="row m-t-15">
                                    <div class="col-sm-12">
                                        <a class='btn bg-olive btn-sm btn-file-upload'>
                                            <?php echo trans('select_image'); ?>
                                            <input type="file" name="file_ad_code_728" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info1').html($(this).val());">
                                        </a>
                                    </div>
                                </div>

                                <span class='label label-info' id="upload-file-info1"></span>
                            </div>
                        </div>

                        <p><label class="control-label label label-bn">468x60 <?php echo trans('banner'); ?></label></p>
                        <div class="row row-ad-space">
                            <div class="col-sm-6">
                                <label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
                                <textarea class="form-control text-area-adspace" name="ad_code_468"
                                          placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->ad_code_468; ?></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label"><?php echo trans('upload_your_banner'); ?></label>
                                <input type="text" class="form-control" name="url_ad_code_468" placeholder="<?php echo trans('paste_ad_url'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                                <div class="row m-t-15">
                                    <div class="col-sm-12">
                                        <a class='btn bg-olive btn-sm btn-file-upload'>
                                            <?php echo trans('select_image'); ?>
                                            <input type="file" name="file_ad_code_468" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info2').html($(this).val());">
                                        </a>
                                    </div>
                                </div>

                                <span class='label label-info' id="upload-file-info2"></span>
                            </div>
                        </div>

                        <p><label class="control-label label label-bn">234x60 <?php echo trans('banner'); ?></label></p>
                        <div class="row row-ad-space">
                            <div class="col-sm-6">
                                <label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
                                <textarea class="form-control text-area-adspace" name="ad_code_234"
                                          placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->ad_code_234; ?></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label"><?php echo trans('upload_your_banner'); ?></label>
                                <input type="text" class="form-control" name="url_ad_code_234" placeholder="<?php echo trans('paste_ad_url'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                                <div class="row m-t-15">
                                    <div class="col-sm-12">
                                        <a class='btn bg-olive btn-sm btn-file-upload'>
                                            <?php echo trans('select_image'); ?>
                                            <input type="file" name="file_ad_code_234" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info3').html($(this).val());">
                                        </a>
                                    </div>
                                </div>

                                <span class='label label-info' id="upload-file-info3"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3 col-xs-12 col-lang">
                                    <label><?php echo trans('visibility'); ?></label>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                    <input type="radio" id="is_active_1" name="is_active" value="1" class="square-purple" <?php if($ad_codes->is_active==1){echo "checked";} ?>>&nbsp;&nbsp;
                                    <label for="is_active_1" class="cursor-pointer"><?php echo trans('show'); ?></label>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                                    <input type="radio" id="is_active_2" name="is_active" value="0" class="square-purple" <?php if($ad_codes->is_active==0){echo "checked";} ?>>&nbsp;&nbsp;
                                    <label for="is_active_2" class="cursor-pointer"><?php echo trans('hide'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row row-ad-space row-button">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
                            </div>
                        </div>

                    </div>
                <?php endif; ?>

</div>



                <?php echo form_close(); ?>

            </div>
        </div>
        <!-- /.box -->
    </div>
</div>


<script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    $(document).ready(function() {
         $('.add_type_responsive').hide();
        var thequerystring = getParameterByName("ad_space");
        if(thequerystring=="post_mid")
        {
            $('.ad_between').show();
        }
        else
        {
            $('.ad_between').hide();
        }
    });
    function show_type(event){
       if(event==1){
        $('.add_type_responsive').show();
        $('.add_type_custom').hide();

       }
       else{
         $('.add_type_responsive').hide();
         $('.add_type_custom').show();
       }

    }
</script>