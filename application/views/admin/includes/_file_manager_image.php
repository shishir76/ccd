<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Modal -->
<div id="image_file_manager" class="modal fade modal-file-manager" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo trans('file_manager'); ?></h4>
                <div class="pull-right">
                    <input type="text" id="search" name="search" placeholder="Search media" onkeyup="filter(this.value)" class="form-control"/>
            </div>
            </div>
            <div class="modal-body">

                <div class="file-manager">

                    <div class="file-manager-left">

                        <div class="row">
                            <div class="col-sm-12">
                                <a id="btn_img_upload" class='btn btn-lg bg-purple btn-upload'>
                                    <i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;
                                    <?php echo trans('add_image'); ?>
                                    <input type="file" id="img_file_input" name="file" class="upload-file-input input-post-image-file" accept="image/*" onchange="$('#input_image_file_label').html($(this).val()); $('#input_image_file_button').show();">
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="image-preview">
                                    <img id="img_file_preview" src="#" alt="" class="img-responsive"/>
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
                            <div id="image_file_upload_response">
                                
                            </div>
                        </div>

                    </div>


                    <input type="hidden" id="selected_img_file_id">

                </div>

            </div>


            <div class="modal-footer">
                <div class="file-manager-footer">
                    <button type="button" id="btn_img_delete" class="btn btn-danger pull-left btn-file-delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;<?php echo trans('delete'); ?></button>
                    <button type="button" id="btn_img_select" class="btn bg-olive btn-file-select"><i class="fa fa-check"></i>&nbsp;&nbsp;<?php echo trans('select_image'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo trans('close'); ?></button>
                </div>
            </div>

        </div>

    </div>
</div>

<script type="text/javascript">
    function filter(event){

        if(event !=""){
        $('#image_file_upload_response').empty();
        $.ajax({
            type: "GET",
            url: '<?php echo base_url();?>file/Filter_image_files?image='+event+'',
            dataType: "json",
            cache: false,
            success: function (data) {  
                if(data!=""){
                $.each(data, function (i, item) {               
                $('#image_file_upload_response').append("<div class='col-sm-2 col-file-manager get_image_data' id='img_col_id_" +item['id']+ "'  onClick='select_files(this.id)' ><div class='file-box' data-file-id='"+item['id']+"'><img src='"+ base_url+ item['image_mid']+"' class='img-responsive '> </div></div>");
                });
                }
                else{
                     $('#image_file_upload_response').empty();
                        $('#image_file_upload_response').append("No Images Found. ");
                }
            },
            error: function () {
                alert("error");
            }
        });
        }
        else{
            get_images();
        }

         
    
    }
 $(document).ready(function() {
        get_images();
});
function get_images(){

        $('#image_file_upload_response').empty();
        $.ajax({
            type: "GET",
            url: '<?php echo base_url();?>file/View_image_files',
            dataType: "json",
            cache: false,
            success: function (data) {  
                $.each(data, function (i, item) {               
                $('#image_file_upload_response').append("<div class='col-sm-2 col-file-manager get_image_data' id='media_image_" +item['id']+ "' ondblclick='get_data(this.id)' onClick='select_files(this.id)' ><div class='file-box' data-file-id='"+item['id']+"'><img src='"+ base_url+ item['image_small']+"' class='img-responsive '> </div></div>");
                });
            },
            error: function () {
                alert("error");
            }
        });
            
    }

</script>