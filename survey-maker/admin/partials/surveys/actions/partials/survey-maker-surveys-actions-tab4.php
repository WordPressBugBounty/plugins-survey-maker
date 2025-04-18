<div id="tab4" class="ays-survey-tab-content <?php echo ($ays_tab == 'tab4') ? 'ays-survey-tab-content-active' : ''; ?>">
    <p class="ays-subtitle"><?php echo esc_html__('Survey results settings',"survey-maker"); ?></p>    
    <hr style="border-width: 2px;"/>
    <div class="form-group row ays-survey-result-message-vars">
        <div class="col-sm-4">
            <label for="ays_survey_final_result_text">
                <?php echo esc_html__('Thank you message',"survey-maker")?>
                <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php
                    echo esc_html(htmlspecialchars( sprintf(
                        __('Write down a thank you message to be displayed after survey submission. %sAdd Media%s to the message if you wish.',"survey-maker"),
                        '<strong>',
                        '</strong>'
                    ) ));
                ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
            <p class="ays_survey_small_hint_text_for_message_variables">
                <span><?php echo esc_html__( "To see all Message Variables " , "survey-maker" ); ?></span>
                <a href="?page=survey-maker-settings&ays_survey_tab=tab3" target="_blank"><?php echo esc_html__( "click here" , "survey-maker" ); ?></a>
            </p>
        </div>
        <div class="col-sm-8 ays-survey-box-for-mv">
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
                <div class="ays-survey-message-vars-data" data-tmce="ays_survey_final_result_text">
                    <?php $var_counter = 0; foreach($survey_message_vars as $var => $var_name): $var_counter++; ?>
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
            $content = $ays_survey_final_result_text;
            $editor_id = 'ays_survey_final_result_text';
            $settings = array('editor_height' => $survey_wp_editor_height, 'textarea_name' => 'ays_survey_final_result_text', 'editor_class' => 'ays-textarea ays-survey-text-area-for-mv', 'media_elements' => false);
            wp_editor($content, $editor_id, $settings);
            ?>
        </div>
    </div> <!-- Thank you message -->
    <hr/>
    <div class="form-group row ays_toggle_parent">
        <div class="col-sm-4">
            <label for="ays_survey_redirect_after_submit">
                <?php echo esc_html__('Redirect after submission',"survey-maker")?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Redirect to the custom URL after the survey taker submits the survey.',"survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-1">
            <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" id="ays_survey_redirect_after_submit" name="ays_survey_redirect_after_submit" value="on" <?php echo $survey_redirect_after_submit ? 'checked' : '' ?>/>
        </div>
        <div class="col-sm-7 ays_toggle_target ays_divider_left <?php echo $survey_redirect_after_submit ? '' : 'display_none_not_important'; ?>">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_submit_redirect_url">
                        <?php echo esc_html__('Redirect URL',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the URL for redirection after the survey taker submits the survey.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" class="ays-text-input" id="ays_survey_submit_redirect_url" name="ays_survey_submit_redirect_url" value="<?php echo esc_attr($survey_submit_redirect_url); ?>"/>
                </div>
            </div>
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_submit_redirect_delay">
                        <?php echo esc_html__('Redirect delay (sec)', "survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Redirect the survey takers to the custom URL in a short time after submitting the survey.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="number" class="ays-text-input" id="ays_survey_submit_redirect_delay" name="ays_survey_submit_redirect_delay" value="<?php echo esc_attr($survey_submit_redirect_delay); ?>"/>
                </div>
            </div>
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_submit_redirect_new_tab">
                        <?php echo esc_html__('Redirect to the new tab', "survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick this option to redirect to another tab. Note: you can get a block message from the browser.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_submit_redirect_new_tab" name="ays_survey_submit_redirect_new_tab" value="on" <?php echo $survey_submit_redirect_new_tab ? 'checked' : '' ?>/>
                </div>
            </div>
        </div>
    </div> <!-- Redirect after submit -->
    <hr/>
    <div class="form-group row">
        <div class="col-sm-4">
            <label>
                <?php echo esc_html__('Select survey loader',"survey-maker")?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Choose the preferred loader icon which will appear while the system calculates the results. The loader icon will take the survey text color.',"survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-8 ays_toggle_loader_parent">
            <label class="ays_survey_loader">
                <input name="ays_survey_loader" class="ays_toggle_loader_radio" type="radio" value="default" <?php echo ($survey_loader == 'default') ? 'checked' : ''; ?>>
                <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            </label>
            <label class="ays_survey_loader">
                <input name="ays_survey_loader" class="ays_toggle_loader_radio" type="radio" value="circle" <?php echo ($survey_loader == 'circle') ? 'checked' : ''; ?>>
                <div class="lds-circle"></div>
            </label>
            <label class="ays_survey_loader">
                <input name="ays_survey_loader" class="ays_toggle_loader_radio" type="radio" value="dual_ring" <?php echo ($survey_loader == 'dual_ring') ? 'checked' : ''; ?>>
                <div class="lds-dual-ring"></div>
            </label>
            <label class="ays_survey_loader">
                <input name="ays_survey_loader" class="ays_toggle_loader_radio" type="radio" value="facebook" <?php echo ($survey_loader == 'facebook') ? 'checked' : ''; ?>>
                <div class="lds-facebook"><div></div><div></div><div></div></div>
            </label>
            <label class="ays_survey_loader">
                <input name="ays_survey_loader" class="ays_toggle_loader_radio" type="radio" value="hourglass" <?php echo ($survey_loader == 'hourglass') ? 'checked' : ''; ?>>
                <div class="lds-hourglass"></div>
            </label>
            <label class="ays_survey_loader">
                <input name="ays_survey_loader" class="ays_toggle_loader_radio" type="radio" value="ripple" <?php echo ($survey_loader == 'ripple') ? 'checked' : ''; ?>>
                <div class="lds-ripple"><div></div><div></div></div>
            </label>
            <label class="ays_survey_loader">
                <input name="ays_survey_loader" class="ays_toggle_loader_radio" type="radio" value="snake" <?php echo ($survey_loader == 'snake') ? 'checked' : ''; ?>>                
                <div class="ays-survey-loader-snake"><div></div><div></div><div></div><div></div><div></div><div></div></div>
            </label>
            <hr/>
            <label class="ays_survey_loader">
                <input name="ays_survey_loader" class="ays_toggle_loader_radio" data-flag="true" data-type="text" type="radio" value="text" <?php echo ($survey_loader == 'text') ? 'checked' : ''; ?>>
                <div class="ays_survey_loader_text">
                    <?php echo esc_html__( "Text" , "survey-maker" ); ?>
                </div>
                <div class="ays_toggle_loader_target <?php echo ($survey_loader == 'text') ? '' : 'display_none_not_important' ?>" data-type="text">
                    <input type="text" class="ays-text-input" id="ays_survey_loader_text_value" name="ays_survey_loader_text_value" value="<?php echo esc_attr($survey_loader_text); ?>">
                </div>
            </label>
            <label class="ays_survey_loader">
                <input name="ays_survey_loader" class="ays_toggle_loader_radio" data-flag="true" data-type="gif" type="radio" value="custom_gif" <?php echo ($survey_loader == 'custom_gif') ? 'checked' : ''; ?>>
                <div class="ays_survey_loader_custom_gif">
                    <?php echo esc_html__( "Gif" , "survey-maker" ); ?>
                </div>
                <div class="ays_toggle_loader_target ays-survey-image-wrap <?php echo ($survey_loader == 'custom_gif') ? '' : 'display_none_not_important' ?>" data-type="gif">
                    <button type="button" style="<?php echo ($survey_loader_gif == '') ? 'display:inline-block' : 'display:none'; ?>" class="button add_survey_loader_custom_gif"><?php echo esc_html__('Add Gif', "survey-maker"); ?></button>
                    <input type="hidden" class="ays-survey-image-path" id="ays_survey_loader_custom_gif" name="ays_survey_loader_custom_gif" value="<?php echo esc_attr($survey_loader_gif); ?>"/>
                    <div class="ays-survey-image-container ays-survey-loader-custom-gif-container" style="<?php echo ($survey_loader_gif == '') ? 'display:none' : 'display:block'; ?>">
                        <div class="ays-edit-survey-loader-custom-gif">
                            <i class="ays_fa ays_fa_pencil_square_o"></i>
                        </div>
                        <div class="ays-survey-image-wrapper-delete-wrap">
                            <div role="button" class="ays-survey-image-wrapper-delete-cont removeImage">
                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close-grey.svg">
                            </div>
                        </div>
                        <div class="ays-survey-loader-gif-info">
                            <img  src="<?php echo esc_attr($survey_loader_gif); ?>" class="ays_survey_img_loader_custom_gif"/>
                            <span class="ays-survey-loader-gif-error-message"></span>
                        </div>
                    </div>
                </div>
                <div class="ays_toggle_loader_target ays_gif_loader_width_container <?php echo ($survey_loader == 'custom_gif') ? 'ays_survey_display_flex' : 'display_none_not_important'; ?>" data-type="gif" style="margin: 10px;">
                    <div>
                        <label for='ays_survey_loader_custom_gif_width'>
                            <?php echo esc_html__('Width (px)', "survey-maker"); ?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Custom Gif width in pixels. It accepts only numeric values.',"survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div style="margin-left: 5px;">
                        <input type="number" class="ays-text-input" id='ays_survey_loader_custom_gif_width' name='ays_survey_loader_custom_gif_width' value="<?php echo esc_attr( $survey_loader_gif_width ); ?>"/>
                    </div>
                </div>
            </label>
        </div>
    </div> <!-- Select survey loader -->
    <hr/>
    <div class="form-group row">
        <div class="col-sm-4">
            <label for="ays_survey_enable_restart_button">
                <?php echo esc_html__('Enable restart button',"survey-maker")?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Show the restart button at the end of the survey for restarting the survey and pass it again.',"survey-maker")?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-8">
            <input type="checkbox" class="ays-enable-timer1" id="ays_survey_enable_restart_button" name="ays_survey_enable_restart_button" value="on" <?php echo $survey_enable_restart_button ? 'checked' : '' ?>/>
        </div>
    </div> <!-- Enable restart button -->
    <hr/>
    <div class="form-group row" style="margin:0px;">
        <div class="col-sm-12 ays-pro-features-v2-main-box ays-pro-features-v2-main-box-small">
            <div class="ays-pro-features-v2-small-buttons-box ays-pro-pro-features-popup" data-video-url="https://www.youtube.com/watch?v=ad0zX6ke7gU" data-option-title="<?php echo esc_attr__('Show results after submission',"survey-maker")?>" data-option-text="Check out a quick summary right after you finish a survey. With the help of this feature the users will be able to see the summary of their submission. Once a respondent completes a survey, this feature presents them with a summary of their answers, allowing them to review their responses.">
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
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_show_summary_after_submission">
                        <?php echo esc_html__('Show results after submission',"survey-maker"); ?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Show the data presented in the Summary tab(Results page) after a respondent submits the survey.  It includes the total number of submissions and observation of the votes of every question displayed in charts.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" class="ays-enable-timer1" />
                </div>
                <div class="col-sm-7 ays_divider_left">
                    <div class="form-group">

                        <label for="ays_survey_show_submission_summary" class="checkbox_ays form-check form-check-inline">
                            <input type="radio" checked>
                            <?php echo esc_html__('Summary',"survey-maker"); ?>
                        </label>

                        <label for="ays_survey_show_submission_individual" class="checkbox_ays form-check form-check-inline">
                            <input type="radio" >
                            <?php echo esc_html__('Individual',"survey-maker"); ?>
                        </label>
                        
                    </div>
                    <hr>
                    <div class="form-group row ays-survey-show-current-user-results">
                        <div class="col-sm-5">

                            <label for="ays_survey_show_current_user_results">
                                <?php echo esc_html__('Show only current user results',"survey-maker")?>
                                <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Tick this option to show the users only their latest results.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>

                        </div>
                        <div class="col-sm-7">
                            <input type="checkbox" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- EShow summary after submission -->
    <hr/>
    <div class="form-group row ays_toggle_parent">
        <div class="col-sm-4">
            <label for="ays_survey_enable_exit_button">
                <?php echo esc_html__('Enable EXIT button',"survey-maker")?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('The EXIT button will be displayed on the results page and must redirect the survey taker to the custom URL.',"survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-1">
            <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" id="ays_survey_enable_exit_button" name="ays_survey_enable_exit_button" value="on" <?php echo $survey_enable_exit_button ? 'checked' : '' ?>/>
        </div>
        <div class="col-sm-7 ays_toggle_target ays_divider_left <?php echo $survey_enable_exit_button ? '' : 'display_none_not_important'; ?>">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_exit_redirect_url">
                        <?php echo esc_html__('Redirect URL',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the URL for redirection. As soon as the survey taker hits the EXIT button, they will be directed to the specified URL.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" class="ays-text-input" id="ays_survey_exit_redirect_url" name="ays_survey_exit_redirect_url" value="<?php echo esc_attr($survey_exit_redirect_url); ?>"/>
                </div>
            </div>
        </div>
    </div> <!-- Enable EXIT button -->
    <hr/>
    <div class="form-group row ays_toggle_parent">
        <div class="col-sm-4">
            <label for="ays_survey_social_buttons">
                <?php echo esc_html__('Show the Social buttons',"survey-maker")?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Display social buttons for sharing survey page URL. LinkedIn, Facebook, Twitter, VK.',"survey-maker")?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-1">
            <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" id="ays_survey_social_buttons" name="ays_survey_social_buttons" value="on" <?php echo esc_attr( $survey_social_buttons ); ?>/>
        </div>
        <div class="col-sm-7 ays_toggle_target ays_divider_left <?php echo $survey_social_buttons != '' ? '' : 'display_none_not_important'; ?>">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label>
                        <?php echo esc_html__('Heading for share buttons',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Text that will be displayed over share buttons.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8 ays-survey-box-for-mv">
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
                        <div class="ays-survey-message-vars-data" data-tmce="ays_survey_social_buttons_heading">
                            <?php $var_counter = 0; foreach($survey_message_vars as $var => $var_name): $var_counter++; ?>
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
                        $content = $survey_social_buttons_heading;
                        $editor_id = 'ays_survey_social_buttons_heading';
                        $settings = array('editor_height' => $survey_wp_editor_height, 'textarea_name' => 'ays_survey_social_buttons_heading', 'editor_class' => 'ays-textarea ays-survey-text-area-for-mv', 'media_elements' => false);
                        wp_editor($content, $editor_id, $settings);
                    ?>
                </div>
            </div>
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_linkedin_share_button">
                        <i class="ays_fa ays_fa_linkedin_square"></i>
                        <?php echo esc_html__('LinkedIn button',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Display LinkedIn social button so that the users can share the page on which your survey is posted.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_enable_linkedin_share_button" name="ays_survey_enable_linkedin_share_button" value="on" <?php echo esc_attr( $survey_social_button_ln ); ?>/>
                </div>
            </div>
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_facebook_share_button">
                        <i class="ays_fa ays_fa_facebook_square"></i>
                        <?php echo esc_html__('Facebook button',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Display Facebook social button so that the users can share the page on which your survey is posted.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_enable_facebook_share_button" name="ays_survey_enable_facebook_share_button" value="on" <?php echo esc_attr( $survey_social_button_fb ); ?>/>
                </div>
            </div>
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_twitter_share_button" class="d-flex align-items-center" style="gap: 3px;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="16"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                        <?php echo esc_html__('X button',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Display X social button so that the users can share the page on which your survey is posted.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_enable_twitter_share_button" name="ays_survey_enable_twitter_share_button" value="on" <?php echo esc_attr( $survey_social_button_tr ); ?>/>
                </div>
            </div>
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_vkontakte_share_button">
                        <i class="ays_fa ays_fa_vk"></i>
                        <?php echo esc_html__('VKontakte button',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Display VKontakte social button so that the users can share the page on which your survey is posted.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_enable_vkontakte_share_button" name="ays_survey_enable_vkontakte_share_button" value="on" <?php echo esc_attr( $survey_social_button_vk ); ?>/>
                </div>
            </div>
        </div>
    </div> <!-- Show the Social buttons -->
    <hr/>
    <p class="ays-subtitle"><?php echo esc_html__('Dashboard results settings',"survey-maker")?></p>
    <hr/>
    <div class="form-group row">
        <div class="col-sm-4">
            <label for="ays_survey_show_questions_as_html">
                <?php echo esc_html__('Show question title as HTML',"survey-maker")?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick this option to show survey question titles in HTML format on the submissions page. Otherwise, it will be shown as plain text.',"survey-maker")?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-8">
            <input type="checkbox" class="ays-enable-timer1" id="ays_survey_show_questions_as_html" name="ays_survey_show_questions_as_html" value="on" <?php echo $survey_show_questions_as_html ? 'checked' : '' ?>/>
        </div>
    </div> <!-- Show question title as HTML -->
</div>
