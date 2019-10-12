  <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
$item = helper_get_category($item_id);
?>



  <li class="dropdown <?php echo (uri_string() == 'category/' . html_escape($item->name_slug)) ? 'active' : ''; ?>">
                                                <a class="dropdown-toggle disabled no-after" data-toggle="dropdown"
                                                   href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($item->name_slug) ?>"><?php echo html_escape($item->name); ?>
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu dropdown-more dropdown-top">
                                                    <?php  foreach (helper_get_subcategories($item->id) as $sub): ?>
                                                    
                                                            <li>
                                                                <a role="menuitem" href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($sub->name_slug) ?>"> <?php echo html_escape($sub->name); ?>
                                                                </a>
                                                            </li>
                                                      
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                                     