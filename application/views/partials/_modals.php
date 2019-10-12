<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if ($general_settings->registration_system == 1): ?>

    <div class="modal fade auth-modal" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div id="menu-login" class="tab-pane fade in active">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-ion-close-round" aria-hidden="true"></i></button>
                        <h4 class="modal-title font-1"><?php echo trans("login"); ?></h4>
                    </div>

                    <div class="modal-body">
                        <div class="auth-box">

                            <?php if ($fb_login_state == 1 || $google_login_state == 1): ?>
                                <p class="p-auth-modal">
                                    <?php echo trans("login_with_social"); ?>
                                </p>
                            <?php else: ?>
                                <p>&nbsp;</p>
                            <?php endif; ?>


                            <div class="row row-login-ext">
                                <?php if ($fb_login_state == 1): ?>
                                    <div class="col-xs-6 <?php echo ($google_login_state != 1) ? 'col-sm-12' : 'col-sm-6'; ?>">
                                        <a href="javascript:void(0)" class="btn-login-ext btn-login-facebook">
                                            <span class="icon"><i class="fa fa-facebook"></i></span>
                                            <span class="text"><?php echo trans("facebook"); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($google_login_state == 1): ?>
                                    <div class="col-xs-6 <?php echo ($fb_login_state != 1) ? 'col-sm-12' : 'col-sm-6'; ?>">
                                        <a href="javascript:void(0)" id="googleSignIn" class="btn-login-ext btn-login-google">
                                            <span class="icon"> <i class="fa fa-google-plus"></i> </span>
                                            <span class="text"><?php echo trans("google"); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($fb_login_state == 1 || $google_login_state == 1): ?>
                                <p class="p-auth-modal-or">
                                    <span><?php echo trans("or"); ?></span>
                                </p>
                            <?php endif; ?>

                            <!-- include message block -->
                            <div id="result-login"></div>

                            <!-- form start -->
                            <form id="form-login">
                                <div class="form-group has-feedback">
                                    <input type="email" name="email" class="form-control form-input" placeholder="<?php echo trans("placeholder_email"); ?>" value="<?php echo old('email'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <input type="password" name="password" class="form-control form-input" placeholder="<?php echo trans("placeholder_password"); ?>" value="<?php echo old('password'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                                    <span class=" glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>

                                <div class="row">
                                    <div class="col-sm-7 col-xs-7 remember-cnt">
                                        <input type="checkbox" id="remember_me" name="remember_me" value="1" class="flat-blue" checked>&nbsp;&nbsp;
                                        <label for="remember_me" class="label-remember"><?php echo trans("remember_me"); ?></label>
                                    </div>
                                    <div class="col-sm-5 col-xs-5">
                                        <button type="submit" class="btn btn-primary btn-custom pull-right">
                                            <?php echo trans("login"); ?>
                                        </button>
                                    </div>
                                </div>
                            </form><!-- form end -->

                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="<?php echo lang_base_url(); ?>reset-password" class="link-forget">
                            <?php echo trans("forgot_password"); ?>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php endif; ?>


