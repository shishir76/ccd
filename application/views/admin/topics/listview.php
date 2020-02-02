<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><div class="box">    <div class="box-header with-border">        <div class="left">            <h3 class="box-title"><?php echo trans('topics'); ?></h3>        </div>        <div class="right">            <a href="<?php echo base_url(); ?>topic/add" class="btn btn-sm btn-success btn-add-new">                <i class="fa fa-plus"></i>                <?php echo trans('add_topic'); ?>            </a>        </div>    </div><!-- /.box-header -->    <div class="box-body">        <div class="row">            <!-- include message block -->            <div class="col-sm-12">                <?php $this->load->view('admin/includes/_messages'); ?>            </div>        </div>        <div class="row">            <div class="col-sm-12">                <div class="table-responsive">                    <table class="table table-bordered table-striped dataTable" id="cs_datatable_lang" role="grid"                           aria-describedby="example1_info">                        <thead>                        <tr role="row">                            <th width="20"><?php echo trans('id'); ?></th>                            <th><?php echo trans('topic'); ?></th>                            <th><?php echo trans('language'); ?></th>                            <th><?php echo trans('status'); ?></th>                            <th><?php echo trans('date_added'); ?></th>                            <th class="max-width-120"><?php echo trans('options'); ?></th>                        </tr>                        </thead>                        <tbody>												<?php						?>                        <?php foreach ($topics as $topic): ?>                            <tr>                                <td><?php echo html_escape($topic->id); ?></td>                                <td class="break-word"><?php echo html_escape($topic->topic); ?></td>                                <td>                                    <?php                                    $lang = get_language($topic->lang_id);                                    if (!empty($lang)) {                                        echo html_escape($lang->name);                                    }                                    ?>                                </td>                                <td>                                    <?php if ($topic->status == 1): ?>                                        <label class="label label-success"><?php echo trans('active'); ?></label>                                    <?php else: ?>                                        <label class="label label-danger"><?php echo trans('inactive'); ?></label>                                    <?php endif; ?>                                </td>                                <td><?php echo nice_date($topic->created_at, 'd.m.Y'); ?></td>                                <td>                                    <!-- form delete -->                                    <?php echo form_open('topic/delete_topic'); ?>                                    <input type="hidden" name="id" value="<?php echo html_escape($topic->id); ?>">                                    <div class="dropdown">                                        <button class="btn bg-purple dropdown-toggle btn-select-option"                                                type="button"                                                data-toggle="dropdown"><?php echo trans('select_an_option'); ?>                                            <span class="caret"></span>                                        </button>                                        <ul class="dropdown-menu options-list">                                            <li>                                                <a href="<?php echo base_url(); ?>topic/update/<?php echo html_escape($topic->id); ?>">                                                    <i class="fa fa-edit i-edit"></i><?php echo trans('edit'); ?></a>                                            </li>                                            <li>                                                <a class="p0">                                                    <button type="submit" name="option" value="delete"                                                            class="btn-list-button"                                                            onclick="return confirm('<?php echo trans("confirm_topic"); ?>');">                                                        <i class="fa fa-trash i-delete"></i><?php echo trans("delete"); ?>                                                    </button>                                                </a>                                            </li>                                        </ul>                                    </div>                                    <?php echo form_close(); ?><!-- form end -->                                </td>                            </tr>                        <?php endforeach; ?>                        </tbody>                    </table>                </div>            </div>        </div>    </div><!-- /.box-body --></div>