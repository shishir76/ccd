<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo $title; ?></h3>
        </div>
       
    </div><!-- /.box-header -->

    <div class="box-body">
      
    <div class="row">
            <div class="col-sm-12">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped " role="grid">
                       
                        <thead>
                           
                        <tr role="row">
                           
                            <th ><?php echo trans('id'); ?></th>
                            <th><?php echo trans('post_url'); ?></th>
                            <th><?php echo trans('options'); ?></th>
                            
                           
                        </tr>
                        </thead>
                        <tbody>

                        <?php if($post_url){
                        	foreach ($post_url as $item): ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                               <td class="td-post-type"><?php echo html_escape($item->url)."".$item->post_slug; ?></td>                             
                                <td class="td-post-type"><a href="<?php echo html_escape($item->url)."/".$item->post_slug; ?>" class="btn btn-success" target="_blank"> Open Post</a></td>      
                            </tr>
                        <?php endforeach;}
							else{
								echo"<tr><td colspan='3' class='text-center'>No Records Found</td></tr>";
							}
                         ?>

                        </tbody>
                    </table>

                  

                </div>
            </div>
        </div>
    </div>