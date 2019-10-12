<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Modal -->
<div id="ck_file_manager" class="modal fade modal-file-manager" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo trans('file_manager'); ?></h4>
                 <div class="pull-right">
                    <input type="text" id="search" name="search" placeholder="Search media" onkeyup="filterfiles(this.value)" class="form-control"/>
            </div>
            </div>
            <div class="modal-body">

                <div class="file-manager">

                    <div class="file-manager-left">

                        <div class="row">
                            <div class="col-sm-12">
                                <a id="btn_ckimg_upload" class='btn btn-lg bg-purple btn-upload'>
                                    <i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;
                                    <?php echo trans('add_image'); ?>
                                    <input type="file" id="ckimg_file_input" name="file" class="upload-file-input input-post-image-file" accept=".png, .jpg, .jpeg, .gif" onchange="$('#input_image_file_label').html($(this).val()); $('#input_image_file_button').show();">
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="image-preview">
                                    <img id="ckimg_file_preview" src="#" alt="" class="img-responsive"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="loader-file-manager">
                                    <img src="<?php echo base_url(); ?>assets/admin/img/loader.gif" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="file-manager-right">

                        <div class="file-manager-content">
                            <div id="ckimage_file_upload_response">
                              
                            </div>
                        </div>

                    </div>


                    <input type="hidden" id="selected_ckimg_file_id">
                    <input type="hidden" id="selected_ckimg_file_path">

                </div>

            </div>

            <div class="modal-footer">
                <div class="file-manager-footer">
                    <button type="button" id="btn_ckimg_delete" class="btn btn-danger pull-left btn-file-delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;<?php echo trans('delete'); ?></button>
                    <button type="button" id="btn_ckimg_select" class="btn bg-olive btn-file-select"><i class="fa fa-check"></i>&nbsp;&nbsp;<?php echo trans('select_image'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo trans('close'); ?></button>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
   function filterfiles(event){

        if(event !=""){
        $('#ckimage_file_upload_response').empty();
        $.ajax({
            type: "GET",
            url: '<?php echo base_url();?>file/Filter_image_files?image='+event+'',
            dataType: "json",
            cache: false,
            success: function (data) {  
                if(data!=""){
                $.each(data, function (i, item) {               
                $('#ckimage_file_upload_response').append("<div class='col-sm-2 col-file-manager 'id='ckimg_col_id_" +item['id']+ "' ><div class='file-box' data-file-id='" +item['id']+ "'  data-file-path='"+ item['image_big']+"' >   <img src='"+ base_url+ item['image_mid']+"' class='img-responsive '> </div></div>   ");
                });
                }
                else{
                     $('#ckimage_file_upload_response').empty();
                        $('#ckimage_file_upload_response').append("No Images Found. ");
                }
            },
            error: function () {
                alert("error");
            }
        });
        }
        else{
            get_image_files();
        }        
    
    }
    $(document).ready(function() {
        get_image_files();
});
function get_image_files(){

        $('#ckimage_file_upload_response').empty();
        $.ajax({
            type: "GET",
            url: '<?php echo base_url();?>file/View_image_files',
            dataType: "json",
            cache: false,
            success: function (data) {  
                $.each(data, function (i, item) {               
              $('#ckimage_file_upload_response').append("<div class='col-sm-2 col-file-manager 'id='ckimg_col_id_" +item['id']+ "' ><div class='file-box' data-file-id='" +item['id']+ "'  data-file-path='"+ item['image_big']+"' >   <img src='"+ base_url+ item['image_mid']+"' class='img-responsive '> </div></div>");
                });
            },
            error: function () {
                alert("error");
            }
        });
            
    }
    </script>