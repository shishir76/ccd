<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if (!empty($ad_space)): ?>

    <?php $ad_codes = helper_get_ad_codes($ad_space); ?>

    <?php if (!empty($ad_codes)): ?>

    <?php if ($ad_codes->is_active==1): ?>
        <?php $ad_cat_ids=explode('~',$ad_codes->category_id);
        $bool=true;
       
        foreach ($ad_cat_ids as $key => $ad_cat_id) {
            # code...
       if(!empty($category->id) && ($category->id == $ad_cat_id)){ $bool=false; }
       }
                if($bool==true){ 
                    if($ad_codes->ad_type==0){
       ?>


        <?php  if ($ad_space == "sidebar_top" || $ad_space == "sidebar_bottom"): ?>

            <?php if (trim($ad_codes->ad_code_300) != ''): ?>
                <div class="col-sm-12 col-xs-12 bn-lg-sidebar <?php echo(isset($class) ? $class : ''); ?>">
                    <div class="row">
                        <?php echo $ad_codes->ad_code_300; ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>

            <?php if (trim($ad_codes->ad_code_728) != '') : 


                ?>

                <section class="col-sm-12 col-xs-12 bn-lg <?php echo(isset($class) ? $class : ''); ?>">
                    <div class="row">
                        <?php echo $ad_codes->ad_code_728; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (trim($ad_codes->ad_code_468) != ''): ?>
                <section class="col-sm-12 col-xs-12 bn-md <?php echo(isset($class) ? $class : ''); ?>">
                    <div class="row">
                        <?php echo $ad_codes->ad_code_468; ?>
                    </div>
                </section>
            <?php endif; ?>

        <?php endif; ?>


        <?php if (trim($ad_codes->ad_code_234) != ''): ?>
            <section class="col-sm-12 col-xs-12 bn-sm <?php echo(isset($class) ? $class : ''); ?>">
                <div class="row">
                    <?php echo $ad_codes->ad_code_234; ?>
                </div>
            </section>
        <?php endif; ?>

    <?php   }
else{

    ?>
    <div class="col-sm-12 col-xs-12 bn-lg-sidebar <?php echo(isset($class) ? $class : ''); ?>">
                    <div class="row">
                        <?php echo $ad_codes->responsive_code; ?>
                    </div>
                </div>
    <?php
}

     } endif; ?>

    <?php endif; ?>
<?php endif; ?>


