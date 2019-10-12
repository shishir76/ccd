  <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
$item = helper_get_category($item_id);
?>

                                    <li class="<?php echo (uri_string() == 'category/' . html_escape($item->name_slug)) ? 'active' : ''; ?>">
                                                <a href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($item->name_slug) ?>" 
                                                   >
                                                  <?php echo html_escape($item->name); ?>
                                                </a>
                                            </li>
                                        