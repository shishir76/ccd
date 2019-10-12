<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo trans('contact_messages'); ?></h3>
        </div>
    </div><!-- /.box-header -->

    <!-- include message block -->
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                             <th width="20"><input type="checkbox" class="checkbox-table" id="checkAll" ></th>
                            <th width="20"><?php echo trans('id'); ?></th>
                            <th><?php echo trans('name'); ?></th>
                            <th><?php echo trans('email'); ?></th>
                            <th><?php echo trans('status'); ?></th>
                            <th><?php echo trans('message'); ?></th>
                            <th><?php echo trans('date'); ?></th>
                            <th class="max-width-120"><?php echo trans('options'); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($messages as $item): ?>
                            <tr>
                                <td><input type="checkbox" name="checkbox-table" class="checkbox-table" value="<?php echo $item->id; ?>" >
                                  </td>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td><?php echo html_escape($item->name); ?></td>
                                <td><?php echo html_escape($item->email); ?></td>
                                  <td>
                                    <?php if ($item->status == 0): ?>
                                        <label class="label label-danger"><i class="fa fa-eye"></i></label>
                                    <?php else: ?>
                                        <label class="label label-success"><i class="fa fa-eye"></i></label>
                                    <?php endif; ?>
                                </td>
                                <td class="break-word"><a href="javascript:void(0);" id="<?php echo html_escape($item->id); ?>" onclick="read_message(this.id)">Read Message</a></td>
                                <td><?php echo $item->created_at; ?></td>

                                <td>
                                    <!-- form delete contact messages -->
                                    <?php echo form_open('admin/delete_contact_message_post'); ?>

                                        <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown"><?php echo trans('select_an_option'); ?>
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="delete"
                                                                class="btn-list-button"
                                                                onclick="return confirm('<?php echo trans("confirm_message"); ?>');">
                                                            <i class="fa fa-trash i-delete"></i><?php echo trans('delete'); ?>
                                                        </button>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>

                                        <?php echo form_close(); ?><!-- form end -->

                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>

                    <div class="col-sm-12 table-ft">
                        <div class="row">
                            <?php if (count($messages) > 0): ?>
                                <div class="pull-left">
                                    <button class="btn btn-sm btn-danger btn-table-delete" onclick="delete_selected_messages('<?php echo trans("confirm_message"); ?>');"><?php echo 'Delete Selected Messages';  ?></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
<!--modal-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog" style="width:45%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" id="full_message">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- /.modal-->

<script>
    function read_message(event){       
        $.ajax({
            url: '<?php echo base_url();?>admin/readcontact_messages/?id='+event,
            type: "GET",
            success:function(response) 
            {  
                $('#full_message').html(response);
                $('#myModal').modal('show');
            }
        });
    }
</script>