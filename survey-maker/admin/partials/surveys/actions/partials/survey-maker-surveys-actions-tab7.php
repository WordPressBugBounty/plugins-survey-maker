<div id="tab7" class="ays-survey-tab-content <?php echo ($ays_tab == 'tab7') ? 'ays-survey-tab-content-active' : ''; ?>">
    <p class="ays-subtitle"><?php echo esc_html__('E-mail settings', "survey-maker"); ?></p>
    <hr/>
    <div style="display: flex;justify-content: center; align-items: center;margin-bottom: 15px;">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/-NNIV6bNSGA" loading="lazy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    </div>
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
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="ays_survey_enable_mail_user">
                        <?php echo esc_html__('Send email to user',"survey-maker")?>
                        <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Activate the option of sending emails to your users after taking the survey.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" checked class="ays-enable-timerl" id="ays_survey_enable_mail_user" value="on" />
                </div>
                <div class="col-sm-8 ays_divider_left">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="ays_survey_mail_message">
                                <?php echo esc_html__('Email message',"survey-maker")?>
                                <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php 
                                        echo esc_html__('Write the message to send it out to your survey takers via email. You can use Message Variables as well.',"survey-maker");
                                    ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                            <p class="ays_survey_small_hint_text_for_message_variables">
                                <span><?php echo esc_html__( "To see all Message Variables " , "survey-maker" ); ?></span>
                                <a href="?page=survey-maker-settings" target="_blank"><?php echo esc_html__( "click here" , "survey-maker" ); ?></a>
                            </p>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            $content = '';
                            $editor_id = 'ays_survey_mail_message';
                            $settings = array('editor_height' => '100', 'textarea_name' => 'ays_survey_mail_message', 'editor_class' => 'ays-textarea', 'media_elements' => false);
                            wp_editor($content, $editor_id, $settings);
                            ?>
                        </div>
                    </div>
                    <hr/>
                    <div class='row'>
                        <div class="col-sm-3">
                            <label for="ays_survey_summary_single_email_to_users">
                                <?php echo esc_html__('Send submission report', "survey-maker"); ?>
                                <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('After enabling this option the user will receive the submissions report for the survey.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                            
                        </div>
                        <div class="col-sm-1">
                            <input type="checkbox">
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="form-group">
                                <label for="ays_survey_user_email_submission_summary" class="checkbox_ays form-check form-check-inline">
                                    <input type="radio" id="ays_survey_user_email_submission_summary" >
                                    <?php echo esc_html__('Summary',"survey-maker"); ?>
                                </label>
                                <label for="ays_survey_user_email_submission_individual" class="checkbox_ays form-check form-check-inline">
                                    <input type="radio" id="ays_survey_user_email_submission_individual">
                                    <?php echo esc_html__('Individual',"survey-maker"); ?>
                                </label>
                                <a class="ays_help ays-survey-zindex-for-pro" style="font-size:15px;" data-toggle="tooltip" data-html="true"
                                    title="<?php
                                        echo "<p>". esc_html__('Choose your preferred method.', "survey-maker") . "</p>" .
                                        "<div>".
                                            "<p>". esc_html__('By Summary - Send the summary of all the answers the same user provided for the given survey.', "survey-maker") ."</p>".
                                            "<p>". esc_html__("By Individual - Send the results of the user's current submission.", "survey-maker") ."</p>".
                                        "</div>";
                                    ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-5">
                                    <label for="ays_survey_user_email_hide_sections">
                                        <?php echo esc_html__('Hide sections skipped by Logic Jump',"survey-maker")?>
                                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Tick this option, and the sections that are skipped by the survey takers when the Logic Jump is enabled, will NOT BE included in the email content. If the option is disabled, all the sections will be included in the email content sent to the users.',"survey-maker"); ?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="checkbox" class="" id="ays_survey_user_email_hide_sections" />
                                </div>
                            </div>
                            <div class="form-group">
                                <blockquote>
                                    <?php
                                        echo esc_html__( 'Note: - If you choose the Summary option and the users take the survey as a guest, the email content sent to them will be the same as in the case of choosing the Individual option.', "survey-maker" );
                                    ?>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="ays_survey_test_email">
                                <?php echo esc_html__('Send email for testing',"survey-maker")?>
                                <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php 
                                        echo 
                                            esc_html__('Provide an email and click on the Send button to see what the message looks like. Note that you need to write a message on the Email message field beforehand. Take into account that the message variables will not work while testing.',"survey-maker");
                                    ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="ays_send_test">
                                <input type="text" id="ays_survey_test_email" class="ays-text-input" value="">
                                <input type="hidden" value="<?php echo esc_attr($id); ?>">
                                <a href="javascript:void(0)" class="ays_survey_test_mail_btn button button-primary"><?php echo esc_html__( "Send", "survey-maker" ); ?></a>
                                <span id="ays_survey_test_delivered_message" data-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . "/images/loaders/loading.gif" ?>" style="display: none;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Send Mail To User -->
            <hr/>
            <div class="form-group row ays_toggle_parent">
                <div class="col-sm-3">
                    <label for="ays_survey_enable_mail_admin">
                        <?php echo esc_html__('Send email to admin',"survey-maker")?>
                        <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Activate this option so that the survey data can be sent to the super admin of your WordPress site.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" class="ays-enable-timerl ays_toggle_checkbox" id="ays_survey_enable_mail_admin" value="on" />
                </div>
                <div class="col-sm-8 ays_toggle_target ays_divider_left">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="ays_survey_send_mail_to_site_admin">
                                <?php echo esc_html__('Admin', "survey-maker")?>
                                <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Send the survey results to the super admin.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <input type="checkbox" checked class="ays-enable-timerl" id="ays_survey_send_mail_to_site_admin" value="on" />
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="ays-text-input ays-enable-timerl" placeholder="admin@example.com" disabled />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="ays_survey_additional_emails">
                                <?php echo esc_html__('Additional emails',"survey-maker")?>
                                <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Provide additional email addresses that will receive the survey results. List the emails by separating them with commas.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="ays-text-input" id="ays_survey_additional_emails" placeholder="example1@gmail.com, example2@gmail.com, ..."/>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="ays_survey_mail_message_admin">
                                <?php echo esc_html__('Email message',"survey-maker")?>
                                <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php 
                                        echo esc_html__('Provide a text message to be sent to the super admin and/or the provided additional emails. Message Variables will be of help.',"survey-maker")
                                    ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                            <p class="ays_survey_small_hint_text_for_message_variables">
                                <span><?php echo esc_html__( "To see all Message Variables " , "survey-maker" ); ?></span>
                                <a href="?page=survey-maker-settings" target="_blank"><?php echo esc_html__( "click here" , "survey-maker" ); ?></a>
                            </p>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            $content = '';
                            $editor_id = 'ays_survey_mail_message_admin';
                            $settings = array('editor_height' => '100', 'textarea_name' => 'ays_survey_mail_message_admin', 'editor_class' => 'ays-textarea', 'media_elements' => false);
                            wp_editor($content, $editor_id, $settings);
                            ?>
                        </div>
                    </div>
                </div>
            </div> <!-- Send mail to admin -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label>
                        <?php echo esc_html__('Email configuration',"survey-maker")?>
                        <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Set up the attributes of the sending email.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8 ays_divider_left">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="ays_survey_email_configuration_from_email">
                                <?php echo esc_html__('From email',"survey-maker")?>
                                <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php 
                                    echo esc_html__('Specify the email address from which the results will be sent. If you leave the field blank, the sending email address will take the default value — survey_maker@{your_site_url}.',"survey-maker");
                                    ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="ays-text-input" id="ays_survey_email_configuration_from_email" value=""/>
                        </div>
                    </div> <!-- From email -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="ays_survey_email_configuration_from_name">
                                <?php echo esc_html__('From name',"survey-maker")?>
                                <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php 
                            echo esc_html__("Specify the name that will be displayed as the sender of the results. If you don't enter any name, it will be Survey Maker.","survey-maker");
                        ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="ays-text-input" id="ays_survey_email_configuration_from_names" value=""/>
                        </div>
                    </div><!-- From name -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="ays_survey_email_configuration_from_subject">
                                <?php echo esc_html__('Subject',"survey-maker")?>
                                <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__("Fill in the subject field of the message. If you don't, it will take the survey title.","survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="ays-text-input" id="ays_survey_email_configuration_from_subject" value=""/>
                        </div>
                    </div> <!-- Subject -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="ays_survey_email_configuration_replyto_email">
                                <?php echo esc_html__('Reply to email',"survey-maker")?>
                                <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__("Specify to which email the survey taker can reply. If you leave the field blank, the email address won't be specified.","survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="ays-text-input" id="ays_survey_email_configuration_replyto_email" value=""/>
                        </div>
                    </div> <!-- Reply to email -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="ays_survey_email_configuration_replyto_name">
                                <?php echo esc_html__('Reply to name',"survey-maker")?>
                                <a  class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__("Specify the name of the email address to which the survey taker can reply. If you leave the field blank, the name won't be specified.","survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="ays-text-input" id="ays_survey_email_configuration_replyto_name" value=""/>
                        </div>
                    </div> <!-- Reply to name -->
                </div>
            </div> <!-- Email Configuration -->
            <hr>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">
                        <?php echo esc_html__('Send summary', "survey-maker"); ?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Send a detailed summary of the survey to the selected people. Click on the Send Now button and the summary will be sent at that given moment combined with data collected before it.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8 ays_divider_left">
                    <div class='form-grpoup'>
                        <div class='row'>
                            <div class="col-sm-3">
                                <label for="ays_survey_summary_emails_to_admin">
                                    <?php echo esc_html__('To admin', "survey-maker"); ?>
                                    <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Send a detailed summary of the survey to the registered email of the super admin of your WordPress website.',"survey-maker"); ?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="checkbox" id='ays_survey_summary_emails_to_admin' name="ays_survey_summary_emails_to_admin" value="on">
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class="col-sm-3">
                                <label for="ays_survey_summary_emails_to_users">
                                    <?php echo esc_html__('To users', "survey-maker"); ?>
                                    <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Send a detailed summary of the survey to the survey participants.',"survey-maker"); ?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>

                            </div>
                            <div class="col-sm-9">
                                <input type="checkbox" id='ays_survey_summary_emails_to_users' name="ays_survey_summary_emails_to_users" value="on">
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class="col-sm-3">
                                <label for="ays_survey_summary_emails_to_admins">
                                    <?php echo esc_html__('To additional emails', "survey-maker"); ?>
                                    <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Provide additional email addresses. These email accounts will receive a detailed summary of the survey. List the emails by separating them with commas.', "survey-maker"); ?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="ays-text-input" id="ays_survey_summary_emails_to_admins" name="ays_survey_summary_emails_to_admins" value="">
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class='form-group' style="display:flex;align-items: center;">
                        <input type="hidden" name="ays_survey_id_summary_mail" id="ays_survey_id_summary_mail" value="<?php echo esc_attr($id); ?>">
                        <a href="javascript:void(0)" class="ays_survey_summary_mail_btn button button-primary"><?php echo esc_html__( "Send now", "survey-maker" ); ?></a>
                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . "/images/loaders/loading.gif"; ?>" alt="" style="display: none;margin-left: 15px;width:20px;height:20px" class="ays_survey_summary_delivered_message_loader" >
                        <span id="ays_survey_summary_delivered_message" style="display: none;margin-left: 15px;"></span>
                    </div>
                </div>
            </div><!-- Send Summary -->
        </div>
    </div>
</div>
