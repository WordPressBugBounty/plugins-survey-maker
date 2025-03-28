<div id="tab5" class="ays-survey-tab-content <?php echo ($ays_tab == 'tab5') ? 'ays-survey-tab-content-active' : ''; ?>">
    <p class="ays-subtitle"><?php echo esc_html__('Limitation of Users',"survey-maker"); ?></p>
    <hr style="border-width: 2px;"/>
    <div class="form-group row ays_toggle_parent">
        <div class="col-sm-3">
            <label for="ays_survey_limit_users">
                <?php echo esc_html__('Maximum number of attempts per user',"survey-maker")?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('After enabling this option, you can manage the attempts count per user for taking the survey.',"survey-maker")?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-1">
            <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" id="ays_survey_limit_users" name="ays_survey_limit_users"
                   value="on" <?php echo ($survey_limit_users) ? 'checked' : ''; ?>/>
        </div>
        <div class="col-sm-8 ays_toggle_target ays_divider_left <?php echo ($survey_limit_users) ? "" : "display_none_not_important"; ?>">
            <div class="ays-limitation-options">
                <!-- Limitation by -->
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="ays_limit_users_by_ip">
                            <?php echo esc_html__('Detect users by',"survey-maker")?>
                            <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php
                                echo esc_html(htmlspecialchars( sprintf(__('Choose the method of user detection:',"survey-maker") . '
                                    <ul class="ays_help_ul">
                                        <li>' .__('%s By IP %s - Detect the users by their IP addresses and limit them. This will work both for guests and registered users. Note: in general, IP is not a static variable, it is constantly changing when the users change their location/ WIFI/ Internet provider.',"survey-maker") . '</li>
                                        <li>' .__('%s By User ID %s - Detect the users by their WP User IDs and limit them. This will work only for registered users. It\'s recommended to use this method to get more reliable results.',"survey-maker") . '</li>
                                        <li>' .__('%s By Cookie %s - Detect the users by their browser cookies and limit them.  It will work both for guests and registered users.',"survey-maker") . '</li>
                                        <li>' .__('%s By Cookie and IP %s - Detect the users both by their browser cookies and IP addresses and limit them. It will work both for guests and registered users.',"survey-maker") .'</li>
                                    </ul>',
                                    '<em>',
                                    '</em>',
                                    '<em>',
                                    '</em>',
                                    '<em>',
                                    '</em>',
                                    '<em>',
                                    '</em>'
                                ) ));
                            ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline checkbox_ays">
                            <input type="radio" id="ays_limit_users_by_ip" class="form-check-input" name="ays_survey_limit_users_by" value="ip" <?php echo ($survey_limit_users_by == 'ip') ? 'checked' : ''; ?>/>
                            <label class="form-check-label" for="ays_limit_users_by_ip"><?php echo esc_html__('IP',"survey-maker")?></label>
                        </div>
                        <div class="form-check form-check-inline checkbox_ays">
                            <input type="radio" id="ays_limit_users_by_user_id" class="form-check-input" name="ays_survey_limit_users_by" value="user_id" <?php echo ($survey_limit_users_by == 'user_id') ? 'checked' : ''; ?>/>
                            <label class="form-check-label" for="ays_limit_users_by_user_id"><?php echo esc_html__('User ID',"survey-maker")?></label>
                        </div>
                        <div class="form-check form-check-inline checkbox_ays">
                            <input type="radio" id="ays_limit_users_by_cookie" class="form-check-input" name="ays_survey_limit_users_by" value="cookie" <?php echo ($survey_limit_users_by == 'cookie') ? 'checked' : ''; ?>/>
                            <label class="form-check-label" for="ays_limit_users_by_cookie"><?php echo esc_html__('Cookie',"survey-maker")?></label>
                        </div>
                        <div class="form-check form-check-inline checkbox_ays">
                            <input type="radio" id="ays_limit_users_by_ip_cookie" class="form-check-input" name="ays_survey_limit_users_by" value="ip_cookie" <?php echo ($survey_limit_users_by == 'ip_cookie') ? 'checked' : ''; ?>/>
                            <label class="form-check-label" for="ays_limit_users_by_ip_cookie"><?php echo esc_html__('IP and Cookie',"survey-maker")?></label>
                        </div>
                    </div>
                </div>
                <hr/>
                <!-- Limitation count -->
                <div class="form-group row" style="margin:0px;">
                    <div class="col-sm-12 ays-pro-features-v2-main-box ays-pro-features-v2-main-box-small">
                        <div class="ays-pro-features-v2-small-buttons-box">
                            <div class="ays-pro-features-v2-video-button"></div>
                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank" class="ays-pro-features-v2-upgrade-button">
                                <div class="ays-pro-features-v2-upgrade-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg"></div>
                                <div class="ays-pro-features-v2-upgrade-text">
                                    <?php echo esc_html__("Upgrade" , "survey-maker"); ?>
                                </div>
                            </a>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="ays_survey_max_pass_count">
                                    <?php echo esc_html__('Attempts count',"survey-maker")?>
                                    <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the count of the attempts per user for taking the survey.',"survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" class="ays-text-input" id="ays_survey_max_pass_count" value="1"/>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <!-- Limitation message -->
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="ays_survey_limitation_message">
                            <?php echo esc_html__('Message',"survey-maker")?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Write the message for those survey takers who have already passed the survey under the given conditions.',"survey-maker")?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-9 ays-survey-box-for-mv">
                        <div class="ays-survey-message-vars-box">
                            <div class="ays-survey-message-vars-icon">
                                <div>
                                    <i class="ays_fa ays_fa_link"></i>
                                </div>
                                <div>
                                    <span><?php echo esc_html__("Message Variables" , "survey-maker"); ?></span>
                                    <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php
                                        echo esc_attr__('Insert your preferred message variable into the editor by clicking.',"survey-maker");
                                    ?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ays-survey-message-vars-data" data-tmce="ays_survey_limitation_message">
                                <?php $var_counter = 0; foreach($survey_limitation_message_vars as $var => $var_name): $var_counter++; ?>
                                    <label class="ays-survey-message-vars-each-data-label">
                                        <input type="radio" class="ays-survey-message-vars-each-data-checker" hidden id="ays_survey_message_var_count_<?php echo esc_attr($var_counter)?>" name="ays_survey_message_var_count">
                                        <div class="ays-survey-message-vars-each-data">
                                            <input type="hidden" class="ays-survey-message-vars-each-var" value="<?php echo esc_attr($var); ?>">
                                            <span><?php echo esc_attr($var_name); ?></span>
                                        </div>
                                    </label>              
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php
                        $content = $survey_limitation_message;
                        $editor_id = 'ays_survey_limitation_message';
                        $settings = array('editor_height' => $survey_wp_editor_height, 'textarea_name' => 'ays_survey_limitation_message', 'editor_class' => 'ays-textarea', 'media_elements' => false);
                        wp_editor($content, $editor_id, $settings);
                        ?>
                    </div>
                </div>
                <hr/>
                <!-- Limitation redirect url -->
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="ays_survey_redirect_url">
                            <?php echo esc_html__('Redirect URL',"survey-maker")?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Redirect your visitors to a different URL.',"survey-maker")?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="ays_survey_redirect_url" id="ays_survey_redirect_url" class="ays-text-input" value="<?php echo esc_attr($survey_redirect_url); ?>"/>
                    </div>
                </div>
                <hr/>
                <!-- Limitation redirect delay -->
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="ays_survey_redirection_delay">
                            <?php echo esc_html__('Redirect delay',"survey-maker")?>(s)
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Choose the delay on the redirect in seconds. If you set it 0, the redirection will be disabled.',"survey-maker")?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="number" name="ays_survey_redirection_delay" id="ays_survey_redirection_delay" class="ays-text-input" value="<?php echo esc_attr($survey_redirect_delay); ?>"/>
                    </div>
                </div>
                <hr/>
                <!-- Limitation count -->
                <div class="form-group row" style="margin:0px;">
                    <div class="col-sm-12 ays-pro-features-v2-main-box ays-pro-features-v2-main-box-small">
                        <div class="ays-pro-features-v2-small-buttons-box">
                            <div class="ays-pro-features-v2-video-button"></div>
                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank" class="ays-pro-features-v2-upgrade-button">
                                <div class="ays-pro-features-v2-upgrade-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg"></div>
                                <div class="ays-pro-features-v2-upgrade-text">
                                    <?php echo esc_html__("Upgrade" , "survey-maker"); ?>
                                </div>
                            </a>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="ays_survey_dont_show_survey_container_attempts">
                                    <?php echo esc_attr( __("Don't show survey","survey-maker") ); ?>
                                    <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__("Enable this option and the survey container will be hidden on the front-end if the user has reached the maximum attempts count for the survey.","survey-maker"); ?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-9 form-group row" >
                                <div class="col-sm-1">
                                    <input type="checkbox" />
                                </div>
                                <div class="col-sm-11 ays_divider_left">
                                    <blockquote class="dont_show_survey_container_attempts_blockquote_message"><?php echo esc_html__("Note:  If you have enabled this option and the survey taker has reached the attempts count, the redirection option will not work for the survey.", "survey-maker"); ?></blockquote>
                                </div>
                            </div>
                        </div> <!-- Dont Show Survey //Limitation of Users -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Maximum number of attempts per user -->
    <hr/>
    <div class="form-group row ays_toggle_parent">
        <div class="col-sm-3">
            <label for="ays_survey_enable_logged_users">
                <?php echo esc_html__('Only for logged-in users',"survey-maker"); ?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('After enabling this option, only logged-in users will be able to participate in the survey.',"survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-1">
            <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" id="ays_survey_enable_logged_users" name="ays_survey_enable_logged_users" value="on" <?php echo ($survey_enable_logged_users) ? 'checked' : ''; ?> />
        </div>
        <div class="col-sm-8 ays_toggle_target ays_divider_left <?php echo ($survey_enable_logged_users) ? '' : 'display_none_not_important'; ?>">
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="ays_survey_logged_in_message">
                        <?php echo esc_html__('Message',"survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Write a message for unauthorized users.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-9 ays-survey-box-for-mv">
                    <div class="ays-survey-message-vars-box">
                        <div class="ays-survey-message-vars-icon">
                            <div>
                                <i class="ays_fa ays_fa_link"></i>
                            </div>
                            <div>
                                <span><?php echo esc_html__("Message Variables" , "survey-maker"); ?></span>
                                <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php echo esc_attr__('Insert your preferred message variable into the editor by clicking.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ays-survey-message-vars-data" data-tmce="ays_survey_logged_in_message">
                            <?php $var_counter = 0; foreach($survey_limitation_message_vars as $var => $var_name): $var_counter++; ?>
                                <label class="ays-survey-message-vars-each-data-label">
                                    <input type="radio" class="ays-survey-message-vars-each-data-checker" hidden id="ays_survey_message_var_count_<?php echo esc_attr($var_counter)?>" name="ays_survey_message_var_count">
                                    <div class="ays-survey-message-vars-each-data">
                                        <input type="hidden" class="ays-survey-message-vars-each-var" value="<?php echo esc_attr($var); ?>">
                                        <span><?php echo esc_attr($var_name); ?></span>
                                    </div>
                                </label>              
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php
                    $content = $survey_logged_in_message;
                    $editor_id = 'ays_survey_logged_in_message';
                    $settings = array('editor_height' => $survey_wp_editor_height, 'textarea_name' => 'ays_survey_logged_in_message', 'editor_class' => 'ays-textarea', 'media_elements' => false);
                    wp_editor($content, $editor_id, $settings);
                    ?>
                </div>
            </div>
            <hr/>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="ays_survey_show_login_form">
                        <?php echo esc_html__('Show Login form',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Show the login form to not logged-in users.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-9">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_show_login_form" name="ays_survey_show_login_form" value="on" <?php echo $survey_show_login_form ? 'checked' : ''; ?>/>
                </div>
            </div>
        </div>
    </div> <!-- Only for logged in users -->
    <hr/>
    <div class="form-group row ays_toggle_parent">
        <div class="col-sm-3">
            <label for="ays_survey_enable_tackers_count">
                <?php echo esc_html__('Max count of takers', "survey-maker")?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Choose how many users can participate in the survey.',"survey-maker")?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-1">
            <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" value="on" <?php echo $enable_takers_count ? 'checked' : ''; ?> name="ays_survey_enable_tackers_count" id="ays_survey_enable_tackers_count">
        </div>
        <div class="col-sm-8 ays_toggle_target ays_divider_left <?php echo  $enable_takers_count ? '' : 'display_none_not_important'; ?>">
            <div class="form-group row">
                <div class="col-sm-2">
                    <label for="ays_survey_tackers_count">
                        <?php echo esc_html__('Count',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Indicate the number of users who can participate in the survey.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-10">
                    <input type="number" class="ays-enable-timerl ays-text-input" value="<?php echo esc_attr($survey_takers_count); ?>" name="ays_survey_tackers_count" id="ays_survey_tackers_count">
                </div>
            </div>
        </div>
    </div> <!-- Limitation count of takers -->
    <hr>
    <div class="form-group row" style="margin:0px;">
        <div class="col-sm-12 ays-pro-features-v2-main-box">
            <div class="ays-pro-features-v2-big-buttons-box ays-pro-pro-features-popup" data-video-url="https://www.youtube.com/watch?v=NV-avqsJWfw" data-option-title="<?php echo esc_attr__('Access only to selected user role(s)',"survey-maker")?>" data-option-text="This feature allows users to create surveys only <strong> certain WordPress users with specific roles </strong> can access. You can choose one or multiple user roles that can take the survey. If you want, you can also <strong> write a message </strong> for users who are not included in your selected list to inform them that they cannot fill in the survey.">                
                <div class="ays-pro-features-v2-video-button">
                    <div class="ays-pro-features-v2-video-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Video_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Video_24x24_Hover.svg"></div>
                    <div class="ays-pro-features-v2-video-text">
                        <?php echo esc_html__("Watch Video" , "survey-maker"); ?>
                    </div>
                </div>
                <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank" class="ays-pro-features-v2-upgrade-button">
                    <div class="ays-pro-features-v2-upgrade-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg"></div>
                    <div class="ays-pro-features-v2-upgrade-text">
                        <?php echo esc_html__("Upgrade" , "survey-maker"); ?>
                    </div>
                </a>
            </div>
            <div class="ays-pro-features-v2-small-buttons-box">
                
                <div class="ays-pro-features-v2-video-button">
                    <div class="ays-pro-features-v2-video-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Video_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Video_24x24_Hover.svg"></div>
                    <div class="ays-pro-features-v2-video-text">
                        <?php echo esc_html__("Watch Video" , "survey-maker"); ?>
                    </div>
                </div>
                <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank" class="ays-pro-features-v2-upgrade-button">
                    <div class="ays-pro-features-v2-upgrade-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg"></div>
                    <div class="ays-pro-features-v2-upgrade-text">
                        <?php echo esc_html__("Upgrade" , "survey-maker"); ?>
                    </div>
                </a>
            </div>
            <div class="form-group row ays_toggle_parent">
                <div class="col-sm-3">
                    <label for="ays_survey_enable_restriction_pass">
                        <?php echo esc_html__('Access only to selected user role(s)',"survey-maker")?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Make the survey available only for the user roles mentioned in the list. By enabling this option, the Only for logged-in users option will be enabled automatically.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" value="on" checked>
                </div>
                <div class="col-sm-8 ays_toggle_target ays_divider_left">
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="ays_survey_users_roles">
                                <?php echo esc_html__('User role(s)',"survey-maker")?>
                                <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Select the role(s) of the user. The option accepts multiple values.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <select id="ays_survey_users_roles" multiple>                                
                                 <option value="" selected>User Role</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="ays_survey_restriction_pass_message">
                                <?php echo esc_html__('Message',"survey-maker")?>
                                <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Message for the users who aren’t included in the above-mentioned list.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <?php
                            $content = "";
                            $editor_id = 'ays_survey_restriction_pass_message';
                            $settings = array('editor_height' => '100', 'editor_class' => 'ays-textarea', 'media_elements' => false);
                            wp_editor($content, $editor_id, $settings);
                            ?>
                        </div>
                    </div>
                </div>
            </div> <!-- Only for selected user role -->
        </div>
    </div><!-- Only for selected user role -->
    <hr>
    <div class="form-group row" style="margin:0px;">
        <div class="col-sm-12 ays-pro-features-v2-main-box">
            <div class="ays-pro-features-v2-big-buttons-box">
                
                <div class="ays-pro-features-v2-video-button"></div>
                <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank" class="ays-pro-features-v2-upgrade-button">
                    <div class="ays-pro-features-v2-upgrade-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg"></div>
                    <div class="ays-pro-features-v2-upgrade-text">
                        <?php echo esc_html__("Upgrade" , "survey-maker"); ?>
                    </div>
                </a>
            </div>
            <div class="ays-pro-features-v2-small-buttons-box">
                
                <div class="ays-pro-features-v2-video-button"></div>
                <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank" class="ays-pro-features-v2-upgrade-button">
                    <div class="ays-pro-features-v2-upgrade-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg"></div>
                    <div class="ays-pro-features-v2-upgrade-text">
                        <?php echo esc_html__("Upgrade" , "survey-maker"); ?>
                    </div>
                </a>
            </div>
            <div class="form-group row ays_toggle_parent">
                <div class="col-sm-3">
                    <label for="ays_survey_enable_restriction_pass">
                        <?php echo esc_html__('Access only to selected user(s)',"survey-maker")?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Make the survey available only for the user roles mentioned in the list. By enabling this option, the Only for logged-in users option will be enabled automatically.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" value="on" checked>
                </div>
                <div class="col-sm-8 ays_toggle_target ays_divider_left">
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="ays_survey_users_roles">
                                <?php echo esc_html__('User(s)',"survey-maker")?>
                                <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Select the role(s) of the user. The option accepts multiple values.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <select id="ays_survey_users_pro" multiple>                                
                                 <option value="" selected>User</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="ays_survey_restriction_pass_message">
                                <?php echo esc_html__('Message',"survey-maker")?>
                                <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Message for the users who aren’t included in the above-mentioned list.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <?php
                            $content = "";
                            $editor_id = 'ays_survey_restriction_pass_message_user';
                            $settings = array('editor_height' => '100', 'editor_class' => 'ays-textarea', 'media_elements' => false);
                            wp_editor($content, $editor_id, $settings);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Only selected users -->
    <hr>
    <div class="form-group row" style="margin:0px;">
        <div class="col-sm-12 ays-pro-features-v2-main-box">
            <div class="ays-pro-features-v2-big-buttons-box">
                
                <div class="ays-pro-features-v2-video-button"></div>
                <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank" class="ays-pro-features-v2-upgrade-button">
                    <div class="ays-pro-features-v2-upgrade-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg"></div>
                    <div class="ays-pro-features-v2-upgrade-text">
                        <?php echo esc_html__("Upgrade" , "survey-maker"); ?>
                    </div>
                </a>
            </div>
            <div class="ays-pro-features-v2-small-buttons-box">
                <div>
                    <a href="https://ays-demo.com/job-satisfaction-survey/" target="_blank" class="ays-pro-features-v2-view-demo-button">
                        <div class="ays-pro-features-v2-view-demo-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/view-demo.svg');"></div>
                        <div class="ays-pro-features-v2-view-demo-text">
                            <?php echo esc_html__("View demo" , "survey-maker"); ?>
                        </div>
                    </a>
                </div>
                <div class="ays-pro-features-v2-video-button"></div>
                <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank" class="ays-pro-features-v2-upgrade-button">
                    <div class="ays-pro-features-v2-upgrade-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg"></div>
                    <div class="ays-pro-features-v2-upgrade-text">
                        <?php echo esc_html__("Upgrade" , "survey-maker"); ?>
                    </div>
                </a>
            </div>
            <div class="form-group row ays_toggle_parent">
                <div class="col-sm-3">
                    <label for="ays_survey_enable_password">
                        <?php echo esc_html__('Password for passing survey', "survey-maker")?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('You can choose a password for users to pass the survey.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" id="ays_survey_enable_password" checked value="on"/>
                </div>
                <div class="col-sm-8 ays_toggle_target ays_divider_left">
                    <div class="form-group">
                        <label class="checkbox_ays form-check form-check-inline" >
                            <input type="radio" value='general' checked>
                            <?php echo esc_html__('General', "survey-maker") ?>
                        </label>
                        <label class="checkbox_ays form-check form-check-inline" >
                            <input type="radio" value="generated_password" >
                            <?php echo esc_html__('Generated Passwords', "survey-maker") ?>
                        </label>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="ays_survey_password_survey">
                                <?php echo esc_html__('Password',"survey-maker")?>
                                <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the password for the users who can take the survey.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="ays_survey_password_survey" class="ays-enable-timer ays-text-input">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="ays_survey_password_message">
                                <?php echo esc_html__('Message',"survey-maker")?>
                                <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Write the message for users who must fill in the password for taking this survey.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <?php
                            $content = "";
                            $editor_id = 'ays_survey_password_message';
                            $settings = array('editor_height' => '100', 'editor_class' => 'ays-textarea', 'media_elements' => false);
                            wp_editor($content, $editor_id, $settings);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Survey Password -->
    <hr>
    <div class="form-group row" style="margin:0px;">
        <div class="col-sm-12 ays-pro-features-v2-main-box ays-pro-features-v2-main-box-small">
            <div class="ays-pro-features-v2-small-buttons-box">
                <div class="ays-pro-features-v2-video-button"></div>
                <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank" class="ays-pro-features-v2-upgrade-button">
                    <div class="ays-pro-features-v2-upgrade-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg"></div>
                    <div class="ays-pro-features-v2-upgrade-text">
                        <?php echo esc_html__("Upgrade" , "survey-maker"); ?>
                    </div>
                </a>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="ays_survey_enable_limit_by_country">
                        <?php echo esc_html__('Limit by country', "survey-maker")?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('After enabling this option, the given survey will not be available in the selected country.' , "survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" id="ays_survey_enable_limit_by_country" value="on" checked/>
                </div>
                <div class="col-sm-8 ays_divider_left">
                    <select class="ays-text-input ays-text-input-short" id="ays_survey_limit_country">                        
                        <option value="" selected>Andora</option>
                    </select>
                </div>
            </div> <!-- Limit by country -->
        </div>
    </div>
</div>
