<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <?php echo form_open('', 'class="form-signin" role="form"'); ?>

                <!-- Put your logo here. -->
                <!--<img src="<?php echo default_base_url('apple-touch-icon-precomposed.png'); ?>" class="img-responsive center-block" />-->

                <h2>Join with your email</h2>

<?php

echo Modules::run('feedback_messages_widget/index', array('with_javascript' => false));

?>

                <div class="form-group<?php if (!empty($validation_errors['username'])) { ?> has-error<?php } ?>">
                    <label for="username" class="control-label">* <?php echo $this->lang->line('ui_username').' / '.'E-mail'; ?></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username'); ?>" />
                    </div>
                </div>

                <div class="form-group<?php if (!empty($validation_errors['password'])) { ?> has-error<?php } ?>">
                    <label for="password" class="control-label">* <i18n>ui_password</i18n></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input type="password" name="password" id="password" class="form-control" value="<?php echo set_value('password'); ?>" />
                    </div>
                </div>

                <div class="form-group<?php if (!empty($validation_errors['confirm_password'])) { ?> has-error<?php } ?>">
                    <label for="confirm_password" class="control-label">* <i18n>ui_confirm_password</i18n></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo set_value('confirm_password'); ?>" />
                    </div>
                </div>


                <div class="form-group<?php if (!empty($validation_errors['first_name'])) { ?> has-error<?php } ?>">
                    <label for="first_name" class="control-label">* <i18n>ui_first_name</i18n></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>" />
                    </div>
                </div>


                <div class="form-group<?php if (!empty($validation_errors['last_name'])) { ?> has-error<?php } ?>">
                    <label for="last_name" class="control-label"> <i18n>ui_last_name</i18n></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>" />
                    </div>
                </div>


                 <div class="form-group<?php if (!empty($validation_errors['gender'])) { ?> has-error<?php } ?>">
                    <label for="gender" class="control-label"> <i18n>ui_gender</i18n></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-star fa-fw"></i></span>
                        <input type="radio" name="gender" id="gender_male" class1="form-control" value="male" <?php echo set_radio('gender', 'male', TRUE); ?> /> Male
                        <input type="radio" name="gender" id="gender_female" class1="form-control" value="female" <?php echo set_radio('gender', 'female'); ?>/> Female
                    </div>
                </div>


                <div class="form-group<?php if (!empty($validation_errors['date_of_birth'])) { ?> has-error<?php } ?>">
                    <label for="date_of_birth" class="control-label"> <i18n>ui_date_of_birth</i18n></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
                        <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" value="<?php echo set_value('date_of_birth'); ?>" />
                    </div>
                </div>


                <div class="form-group">

                    <div class="img-thumbnail">

                        <img id="captcha_image"
                            src="<?php echo $this->captcha->src.'?nocache='.rand(100000000, 999999999); ?>"
                            class="img-thumbnail"
                            style="cursor: pointer; margin-right: 5px; padding: 0; border-radius: 4px;"
                            i18n:title="captcha.tip"
                        /><button type="button" id="captcha_refresh" class="btn btn-default" i18n:title="ui_refresh"
                            style="vertical-align: middle; margin-top: 5px; margin-bottom: 5px; margin-right: 2px; outline: 0;"
                        >
                            <i id="captcha_refresh" class="fa fa-refresh"></i>
                        </button>

                    </div>

                </div>

                <div class="form-group<?php if (!empty($validation_errors['captcha'])) { ?> has-error<?php } ?>">
                    <label for="captcha" class="control-label">* <i18n>captcha.label</i18n></label>
                    <input type="text" id="captcha" name="captcha" class="form-control" maxlength="<?php echo $this->captcha->length; ?>" value="<?php echo set_value('catcha'); ?>" />
                </div>

                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-sign-in"> <i18n>ui_login</i18n></i></button>
                </div>

                <div class="form-group">
                    <p class="help-block">
                        Enter random username and password, enter the captcha string, and click on "Login" button to get in.
                    </p>
                </div>

                <!--<div class="form-group">
                    <p class="help-block">
                        Back to the public site: <a href="<?php echo default_base_url(); ?>"><?php echo default_base_url(); ?></a>
                    </p>
                </div>-->

            <?php echo form_close(); ?>
