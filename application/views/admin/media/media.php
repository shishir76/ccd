<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
	span.file-name {
		position: absolute;
		width: 100%;
		left: 0;
		right: 0;
		background-color: #d2d2d2ad;
		bottom: 0;
	}
	.file-manager-left .btn-upload {
		padding: 100px 10px;
		border: 2px dashed #b4b9be6b;
	}
	p.file-manager-list-item-name {
		word-break: break-word;
	}
	.selected .file-box{
		border:2px solid blue;
	}
	.btn_delete_files{
		display: none;
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo trans('media_libraries'); ?></h3>
				<button class="btn btn-success pull-right" data-toggle="modal" data-target="#add_media_files"><i class="fa fa-plus"></i> <?php echo trans('add_new'); ?></button>
			</div>
			<div class="box-header">
				
				<button class="btn btn-danger btn_delete_files" onClick='delete_files("<?php echo trans("confirm_media_libraries"); ?>")'> <i class="fa fa-trash"></i> <?php echo trans('delete'); ?></button>
				<div class="pull-right">
					<input type="text" id="search" name="search" placeholder="Search media" onkeyup="filter(this.value)" class="form-control"/>
			</div>
			</div>
			<!-- /.box-header -->

			<div class="box-body">
				<!-- include message block -->            
				<div class="container file-manager-right">
					<div class="file-manager-content">
						<div class="panel with-nav-tabs panel-default">
							<div class="panel-heading">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#Images" id="image" data-toggle="tab">Images</a></li>
										<li class=""><a href="#Audios" id="audio" data-toggle="tab">Audios</a></li>
										<li class=""><a href="#Videos" id="video" data-toggle="tab">Videos</a></li>	
									</ul>
							</div>
							<div class="panel-body">
								<div class="tab-content">
									<div class="tab-pane fade in active" id="Images">
										
									</div>
									<div class="tab-pane fade in " id="Audios">
										Sorry No Data Available.
									</div>
									<div class="tab-pane fade in " id="Videos">
										Sorry No Data Available.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view("admin/includes/add_media_files"); ?>

<!-- Modal -->
<div id="media_file_detail" class="modal fade modal-file-manager" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><?php echo trans('attachment_details'); ?></h4>
			</div>
			<div class="modal-body">
				<div class="file-manager" id="image_model_content"></div>
			</div>
			<div class="modal-footer">
				<div class="file-manager-footer">                               
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo trans('close'); ?></button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var base_url = '<?php echo base_url(); ?>';
	$("#audio").click(function(){
		$('#Audios').empty();
		$.ajax({
			type: "GET",
			url: '<?php echo base_url();?>file/View_audio_files',
			dataType: "json",
			cache: false,
			success: function (data) {  
				$.each(data, function (i, item) {         		
				$('#Audios').append("<div class='col-sm-2 col-file-manager get_audio_data'   id='media_audio_" +item['id']+ "' ondblclick='get_data(this.id)' onClick='select_files(this.id)'><div class='file-box' data-file-id='"+item['id']+"'><img src='"+ base_url+ "/assets/admin/img/music-file.png' alt=''  class='img img-responsive file-icon'><p class='file-manager-list-item-name'>" +item['audio_name']+ "</p> </div></div>");
				}); 
			},
			error: function () {
				alert("error");
			}
		});
	});

	$("#video").click(function(){
		$('#Videos').empty();
	    $.ajax({
			type: "GET",
			url: '<?php echo base_url();?>file/View_video_files',
			dataType: "json",
			cache: false,
			success: function (data) {  
				$.each(data, function (i, item) {         		
				$('#Videos').append("<div class='col-sm-2 col-file-manager get_video_data' id='media_video_" +item['id']+ "' ondblclick='get_data(this.id)' onClick='select_files(this.id)' ><div class='file-box' data-file-id='"+item['id']+"'><img src='"+ base_url+ "/assets/admin/img/video-file.png' class='img-responsive file-icon'><p class='file-manager-list-item-name'>" +item['video_name']+ "</p> </div></div>");
				});
			},
			error: function () {
				alert("error");
			}
		});
	});
function filter(event){

		if(event !=""){
		$('#Images').empty();
		$.ajax({
			type: "GET",
			url: '<?php echo base_url();?>file/Filter_image_files?image='+event+'',
			dataType: "json",
			cache: false,
			success: function (data) {  
				if(data !=""){
				$.each(data, function (i, item) {         		
				$('#Images').append("<div class='col-sm-2 col-file-manager get_image_data' id='media_image_" +item['id']+ "' ondblclick='get_data(this.id)' onClick='select_files(this.id)' ><div class='file-box' data-file-id='"+item['id']+"'><img src='"+ base_url+ item['image_small']+"' class='img-responsive '> </div></div>");
				});
				}
				else{
					$('#Images').empty();
						$('#Images').append("No Images Found. ");
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

		$('#Images').empty();
	    $.ajax({
			type: "GET",
			url: '<?php echo base_url();?>file/View_image_files',
			dataType: "json",
			cache: false,
			success: function (data) {  
				$.each(data, function (i, item) {         		
				$('#Images').append("<div class='col-sm-2 col-file-manager get_image_data' id='media_image_" +item['id']+ "' ondblclick='get_data(this.id)' onClick='select_files(this.id)' ><div class='file-box' data-file-id='"+item['id']+"'><img src='"+ base_url+ item['image_small']+"' class='img-responsive '> </div></div>");
				});
			},
			error: function () {
				alert("error");
			}
		});
			
	}

	function get_data(event)
	{
		var id=event;
		var media_id= "";
		var url="";
		if($("#"+id).hasClass('get_image_data')){
			media_id = id.replace("media_image_","");
			url ='<?php echo base_url();?>file/View_image_details';
		}
		if($("#"+id).hasClass('get_audio_data')){
			media_id = id.replace("media_audio_","");
			url ='<?php echo base_url();?>file/View_audio_details';
		}
		if($("#"+id).hasClass('get_video_data')){
			media_id = id.replace("media_video_","");
			url ='<?php echo base_url();?>file/View_video_details';
		}
		$.ajax({
			type: "GET",
			url: url,
			dataType: "json",
			data:'id='+media_id,
			cache: false,
			success: function (data)
			{ 
				$.each(data, function (i, item)
				{
					$('#image_model_content').empty(); 
					if($("#"+id).hasClass('get_image_data'))
					{
						var file_name="";
						var file_type="";
						var file_size="";
						var file_dimension="";

						if(item['file_name']!=null && item['file_name']!="" )
						{
							var file_name="<tr><th>File name:</th><td>"+item['file_name']+"</td></tr>";
						}
						if(item['type']!=null && item['type']!="")
						{
							var file_type="<tr><th>File type:</th><td>"+item['type']+"</td></tr>";	
						}
						if(item['file_size']!=null && item['file_size']!="")
						{
							var file_size="<tr><th>File size:</th><td>"+Math.round(item['file_size'])+"kb</td></tr>";
						}
						if(item['dimension']!=null && item['dimension']!="")
						{
							var file_dimension="<tr><th>Dimension:</th><td>"+item['dimension']+"</td></tr>";
						}
						$('#image_model_content').append("<div class='file-manager-left' style='width:60%;'><div class='row'><div class='col-sm-12'><img class='img img-responsive' src='"+ base_url + "/"+ item['image_mid']+"' style='margin:auto;'/></div> </div></div> <div class='file-manager-right'><div class='media_detail_block'><div class='col-md-12'><table class='table-condensed table table-responsive'>"+file_name + file_type + file_size + file_dimension+"<tr><th>Uploaded On:</th><td>"+item['uploaded_on']+"</td></tr><tr><th>File Path:</th><td>"+base_url+""+item['image_mid']+"</td></tr></table></div> <div class='col-md-12 text-right'><button type='button' id='btn_img_delete"+item['id']+"' class='btn btn-danger pull-left btn-image-delete' style='display: block;' onClick='delete_file(this.id)'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</button></div></div></div>");
					}
					if($("#"+id).hasClass('get_audio_data'))
					{
						var file_type="";
						var file_size="";

						if(item['type']!=null && item['type']!="")
						{
							var file_type="<tr><th>File type:</th><td>"+item['type']+"</td></tr>";	
						}
						if(item['file_size']!=null && item['file_size']!="")
						{
							var file_size="<tr><th>File size:</th><td>"+Math.round(item['file_size'])+"kb</td></tr>";
						}

						$('#image_model_content').append("<div class='file-manager-left' style='width:60%;'><div class='row'><div class='col-sm-12'><audio controls>  <source src='"+ base_url + ""+ item['audio_path']+"' type='audio/mpeg'><source src='"+ base_url + ""+ item['audio_path']+"' type='audio/ogg'>Your browser does not support the audio element.</audio></div> </div></div> <div class='file-manager-right'><div class='media_detail_block'><div class='col-md-12'><table class='table-condensed table table-responsive'><tr><th>File name:</th><td>"+item['audio_name']+"</td></tr>"+file_type + file_size+"<tr><th>Uploaded On:</th><td>"+item['uploaded_on']+"</td></tr><tr><th>File Path:</th><td>"+base_url+""+item['audio_path']+"</td></tr></table></div> <div class='col-md-12 text-right'><button type='button' id='btn_audio_delete"+item['id']+"' class='btn btn-danger pull-left btn-audio-delete' style='display: block;' onClick='delete_file(this.id)'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</button></div></div></div>");
					}
					if($("#"+id).hasClass('get_video_data'))
					{
						var file_type="";
						var file_size="";

						if(item['type']!=null && item['type']!="")
						{
							var file_type="<tr><th>File type:</th><td>"+item['type']+"</td></tr>";	
						}
						if(item['file_size']!=null && item['file_size']!="")
						{
							var file_size="<tr><th>File size:</th><td>"+Math.round(item['file_size'])+"kb</td></tr>";
						}

						$('#image_model_content').append("<div class='file-manager-left' style='width:60%;'><div class='row'><div class='col-sm-12'><video controls>  <source src='"+ base_url + ""+ item['video_path']+"' type='video/mp4'><source src='"+ base_url + ""+ item['video_path']+"' type='video/ogg'>Your browser does not support HTML5 video.</video></div> </div></div> <div class='file-manager-right'><div class='media_detail_block'><div class='col-md-12'><table class='table-condensed table table-responsive'><tr><th>File name:</th><td>"+item['video_name']+"</td></tr>"+file_type + file_size+"<tr><th>Uploaded On:</th><td>"+item['uploaded_on']+"</td></tr><tr><th>File Path:</th><td>"+base_url+""+item['video_path']+"</td></tr></table></div> <div class='col-md-12 text-right'><button type='button' id='btn_video_delete"+item['id']+"' class='btn btn-danger pull-left btn-video-delete' style='display: block;' onClick='delete_file(this.id)'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</button></div></div></div>");
					}
					$("#media_file_detail").modal();
				}); 
		},
			error: function () {
				alert("error");
			}
		});
	}

	function delete_file(event)
	{
		var id=event;
		var media_del_id= "";
		if($("#"+id).hasClass('btn-image-delete'))
		{
			media_del_id = id.replace("btn_img_delete","");
			del_url =base_url + "file/delete_image_file";
		}
		if($("#"+id).hasClass('btn-video-delete'))
		{
			media_del_id = id.replace("btn_video_delete","");
			del_url =base_url + "file/delete_video_file";
		}
		if($("#"+id).hasClass('btn-audio-delete'))
		{
			media_del_id = id.replace("btn_audio_delete","");
			del_url =base_url + "file/delete_audio_file";
		}
		var data = {
		"file_id": media_del_id
		};
		data[csfr_token_name] = $.cookie(csfr_cookie_name);
		$.ajax({
			type: "POST",
			url: del_url ,
			data: data,
			success: function(response)
			{
			   location.reload(); 
			}
		});
	}

	var selected_id=[];
	var image_ids=[];
	var audio_ids=[];
	var video_ids=[];
	function select_files(event)
	{
		if(!$("#"+event).hasClass("selected"))
		{	
			$("#"+event).addClass("selected");		
			selected_id.push(event);		
		}
		else
		{	
			$.each(selected_id, function (i, item)
			{		
				if(item == event)
				{
					if($("#"+item).hasClass("selected"))
					{
						$("#"+item).removeClass("selected");	
						selected_id.splice($.inArray(event, selected_id),1);
					}
				}
			});
		}	
		$.each(selected_id, function (i, item)
		{
			if($("#"+item).hasClass('get_image_data'))
			{
				var image_id = item.replace("media_image_","");			
				if(image_ids==""){
					image_ids=image_id;
				}
				else{
					image_ids=image_ids+"~"+image_id;
				}	
			}
			if($("#"+item).hasClass('get_audio_data'))
			{
				var audio_id = item.replace("media_audio_","");	
				if(audio_ids==""){
					audio_ids=audio_id;
				}
				else{
					audio_ids=audio_ids+"~"+audio_id;
				}	
			
			}
			if($("#"+item).hasClass('get_video_data'))
			{
				var video_id = item.replace("media_video_","");
				if(video_ids==""){
					video_ids=video_id;
				}
				else{
					video_ids=video_ids+"~"+video_id;
				}	
			}
		});
		if((selected_id == "")){
			$(".btn_delete_files").hide();
		}
		else{
			$(".btn_delete_files").show();
		}
	}

	function delete_files($message)
	{
		var result = confirm($message);
		if (result) {
			var data = {
				"image_ids": image_ids,
				"audio_ids": audio_ids,
				"video_ids": video_ids
			};
			data[csfr_token_name] = $.cookie(csfr_cookie_name);
			$.ajax({
		      type: "POST",
		      url: base_url + "file/delete_multiple_files",
		      data: data,
		      success: function (result) {
		        location.reload(); 
		    }
		 });
		   
		}	
	}
	
</script>