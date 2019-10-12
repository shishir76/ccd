<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Modal -->
<div id="add_media_files" class="modal fade modal-file-manager" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo trans('file_manager'); ?></h4>
            </div>
            <form id="imageUploadForm" enctype="multipart/form-data" action="" method="post">
                <div class="modal-body">
                    <div class="file-manager">
                        <div class="file-manager-left">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a id="btn_img_upload" class='btn btn-lg  btn-upload'>
                                        <i class="fa fa-cloud-upload" style="color:#8a8a8a;font-size:35px;">&nbsp;&nbsp;
                                       <span style="font-family:sans-serif;"> <?php echo trans('drop_files'); ?></span></i>
                                        <input type="file" id="multiple_files_uploader" name="multiple_files_uploader[]" multiple="multiple" class="upload-file-input input-post-image-file" accept=".png, .jpg, .jpeg, .gif, .mp3, .wav, .mp4, .webm">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="image-preview">
                                      
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
                        <input type="hidden" id="selected_img_file_id">
                    </div>
                </div>
            </form>

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
    var csfr_token_name = 'varient_csrf_token';
    var csfr_cookie_name = 'varient_csrf_cookie';

    function show_multi_image_preview(input) {
        if (input.files)
        {      
            for(var i=0; i< input.files.length;i++)
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {   
                    e.preventDefault();      
                    $(".image-preview").append("<div class='col-md-2'><img id='img_file_preview' src='"+e.target.result+"' class='img-responsive'/></div>");
                }     
                reader.readAsDataURL(input.files[i]);
            }

        }
    }
    $("#multiple_files_uploader").on("change", function() {
        show_multi_image_preview(this);
        $('.image-preview').show();
        $("#multiple_files_uploader").prop("disabled", true);
        var cda=$.cookie(csfr_cookie_name);
        var hfield = '<input type="hidden" name="'+csfr_token_name+'"'+' value="'+cda+'" />';
        $(hfield).appendTo($("form#imageUploadForm"));
        $("#imageUploadForm").submit();
    });
    $('#imageUploadForm').on('submit', function(e) {
        e.preventDefault();
        $(".loader-file-manager").show();
        $("#btn_img_upload").attr("disabled", true);
        $("#img_file_input").prop("disabled", true);
        $("#btn_img_upload").attr("disabled", true);
        var input = document.getElementById("multiple_files_uploader");
        var form_data = false;
        if (window.FormData) {
            var form_data=new FormData($("form#imageUploadForm")[0]);
            // document.getElementById("btn").style.display = "none";
        }
        var i = 0, len = input.files.length, img, reader, file;
        for ( ; i < len; i++ )
        {
            file = input.files[i];
            if (form_data)
            {
                form_data.append("multiple_files_uploader[]", file);
            }
        }
        form_data.append(csfr_token_name, $.cookie(csfr_cookie_name));
        $.ajax({
            type: 'POST',
            url: base_url + "file/upload_multiple_files",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#img_file_preview').hide();
                $(".loader-file-manager").hide();
                $("#btn_img_upload").attr("disabled", false);
                $("#img_file_input").attr("disabled", false);
                $("#img_file_input").val('');
                location.reload(); 
            },
            error: function(response) {}
        });
      
    });

</script>
<style>
    .loader-file-manager {
        left: 0;   
        position: absolute;
        top: -147px;   
        right: 0;
    }
</style>