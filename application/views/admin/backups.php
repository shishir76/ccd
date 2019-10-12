<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><i class="fa-fw fa fa-database"></i><?php echo trans('database_backups'); ?> 
            <!-- <small class="text-danger">(Only for small database, Please use your control panel to backup large database)</small> -->
            </h3>
        </div>
        <div class="right">
            <h3 class="box-title"><a href="<?= base_url('admin/backup_database') ?>"><i class="icon fa fa-database"></i> <?= trans('backup_database'); ?></a> &nbsp; <a href="javascript:void(0);" class="file_backup" onclick="file_backup()"><i class="icon fa fa-file-o"></i> <?= trans('files_backups'); ?></a></h3>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- include message block -->
            <div class="col-sm-12">
            	<p class="introtext"><?= trans('restore_heading'); ?></p>
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php if(count($dbs)>0){?>
                <h4><?= trans('backup_database'); ?></h4> 
                <?php  }foreach ($dbs as $file): ?>
                	<?php $file = basename($file);?>
                	<div class="well well-sm">
                		<?php
                			$date_string = substr($file, 13, 10);
	                        $time_string = substr($file, 24, 8);
	                        $date = $date_string . ' ' . str_replace('-', ':', $time_string);
	                        $bkdate = date('d/m/Y H:i',strtotime($date));  
                		?>
                		<h4>
                			<?= trans('backup_on') ?>
                			<span class="text-primary">
                				<?php echo  $bkdate;?>
                			</span>
                			<div class="btn-group pull-right" style="margin-top:-8px;">
                				<a href="<?php echo base_url('admin/download_database/'. substr($file, 0, -4))?>" class="btn btn-primary download_file"> <i class="fa fa-download"></i> <?= trans('download') ?></a>
                				<a href="<?php echo base_url('admin/restore_database/'. substr($file, 0, -4))?>" class="btn btn-warning restore_db"> <i class="fa fa-database"></i> <?= trans('restore') ?></a>
                				<a href="<?php echo base_url('admin/delete_database/'. substr($file, 0, -4))?>" class="btn btn-danger delete_file"> <i class="fa fa-trash-o"></i> <?= trans('delete') ?></a>
                			</div>
                		</h4>
                		<div class="clearfix"></div>
                	</div>
                <?php endforeach ?>
                 <?php if(count($files)>0){?>
                <h4><?= trans('backup_files'); ?></h4> 
                <?php  } foreach ($files as $file): ?>
                    <?php $file = basename($file);?>
                    <div class="well well-sm">
                        <?php
                            $date_string = substr($file, 13, 10);
                            $time_string = substr($file, 24, 8);
                            $date = $date_string . ' ' . str_replace('-', ':', $time_string);
                            $bkdate = date('d/m/Y H:i',strtotime($date));  
                        ?>
                        <h4>
                           
                            <span class="text-primary">
                                <?php echo  $file;?>
                            </span>
                            <div class="btn-group pull-right" style="margin-top:-8px;">
                                <a href="<?php echo base_url('admin/download_backup/'. substr($file, 0, -4))?>" class="btn btn-primary download_file"> <i class="fa fa-download"></i> <?= trans('download') ?></a>
                                <a href="<?php echo base_url('admin/restore_backup/'. substr($file, 0, -4))?>" class="btn btn-warning restore_db"> <i class="fa fa-database"></i> <?= trans('restore') ?></a>
                                <a href="<?php echo base_url('admin/delete_backup/'. substr($file, 0, -4))?>" class="btn btn-danger delete_file"> <i class="fa fa-trash-o"></i> <?= trans('delete') ?></a>
                            </div>
                        </h4>
                        <div class="clearfix"></div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.download_file').click(function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            bootbox.prompt({title:"<?=trans('download_confirm');?>", inputType:'password', name:'db_backup_password', placeholder:'Password', callback:function (result) {
            		var db_backup_password = <?php echo $general_settings->db_backup_password; ?>;
            		if (result==db_backup_password) 
            		{
                    	window.location.href = href;
                	}
                	else
                	{
                		//alert('You entered incorrect password !!!');
                	} 
            	}
                
            });
        });
        $('.restore_db').click(function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            bootbox.confirm("<?=trans('restore_confirm');?>", function (result) {
                if (result) {
                    window.location.href = href;
                }
            });
        });
        $('.delete_file').click(function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            bootbox.confirm("<?=trans('delete_confirm');?>", function (result) {
                if (result) {
                    window.location.href = href;
                }
            });
        });

});
    function file_backup() {
    var data = {       
        "lang_id":1
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);

    $.ajax({
        type: "POST",
        url: base_url + "admin/backup_files",
        data: data,
        success: function (response) {
             // location.reload();          
        }
    });
        } 
</script>