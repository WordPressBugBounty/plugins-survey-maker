<div id="tab3" class="ays-survey-tab-content <?php echo ($ays_tab == 'tab3') ? 'ays-survey-tab-content-active' : ''; ?>">
    <div class="ays-survey-collapsible-container" style="margin-top: 20px;">
        <div class="d-flex justify-content-end align-items-center">
            <div class="d-flex justify-content-between align-items-center" style="gap: 5px; font-size: 13px">
                <div>
                    <a href="javascript:void(0);" class="ays-survey-collapse-all-options"><?php echo esc_html__("Collapse All", "survey-maker"); ?></a>
                </div>    
                |               
                <div>
                    <a href="javascript:void(0);" class="ays-survey-expand-all-options"><?php echo esc_html__("Expand All", "survey-maker"); ?></a>
                </div>                   
            </div>
        </div>
        <div class="ays-survey-collapse-options">
            <div><i class="ays_fa ays_fa_arrow_down ays-survey-collapse-options-button" data-rotation="false" style="font-size: 15px;"></i></div>
            <div><p style="margin:0;font-size: 18px;font-weight: 500;cursor: pointer"><?php echo esc_html__('Primary',"survey-maker"); ?></p></div>
        </div>
        <hr/>
        <div class="ays-survey-collapsible-options">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays-status">
                        <?php echo esc_html__('Survey status', "survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php
                            echo esc_html(htmlspecialchars( sprintf(
                                __("Decide whether your survey is active or not. If you choose %sDraft%s, the survey won't be shown anywhere on your website (you don't need to remove shortcodes).", "survey-maker"),
                                '<strong>',
                                '</strong>'
                            ) ));
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <select id="ays-status" name="<?php echo esc_attr($html_name_prefix); ?>status">
                        <option></option>
                        <option <?php selected( $status, 'published' ); ?> value="published"><?php echo esc_html__( "Published", "survey-maker" ); ?></option>
                        <option <?php selected( $status, 'draft' ); ?> value="draft"><?php echo esc_html__( "Draft", "survey-maker" ); ?></option>
                    </select>
                </div>
            </div> <!-- Survey Status -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays-category">
                        <?php echo esc_html__('Survey categories', "survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php
                            echo esc_html(htmlspecialchars( sprintf(
                                __('Choose the category/categories your survey belongs to. To create a category, go to the %sCategories%s page.',"survey-maker"),
                                '<strong>',
                                '</strong>'
                            ) ));
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <select id="ays-category" name="<?php echo esc_attr($html_name_prefix); ?>category_ids[]" multiple>
                        <option></option>
                        <?php
                        foreach ($categories as $key => $category) {
                            $selected = in_array( $category['id'], $category_ids ) ? "selected" : "";
                            if( empty( $category_ids ) ){
                                if ( intval( $category['id'] ) == 1 ) {
                                    $selected = 'selected';
                                }
                            }
                            echo '<option value="' . esc_attr($category["id"]) . '" ' . esc_attr($selected) . '>' . stripslashes( esc_attr($category['title']) ) . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div> <!-- Survey Category -->
            <hr/>    
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_leave_page">
                        <?php echo esc_html__('Enable confirmation box for leaving the page',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Show a popup box whenever the survey taker wants to refresh or leave the page while taking the survey.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_enable_leave_page" name="ays_survey_enable_leave_page" value="on" <?php echo ($survey_enable_leave_page) ? 'checked' : ''; ?>/>
                </div>
            </div> <!-- Enable confirmation box for leaving the page -->    
            <hr/>    
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_required_questions_message">
                        <?php echo esc_html__('Required questions message',"survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the required message text displayed in case of the required questions.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" class="ays-text-input" name="ays_survey_required_questions_message" id="ays_survey_required_questions_message" value="<?php echo esc_attr__($survey_required_questions_message , "survey-maker"); ?>" placeholder="<?php echo esc_attr__( 'Required question message' , "survey-maker" ); ?>">
                </div>
            </div> <!-- Show sections questions count -->    
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_info_autofill">
                        <?php echo esc_html__('Autofill logged-in user data',"survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__("After enabling this option, logged in user's name and email will be autofilled in Name and Email fields.","survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_enable_info_autofill" name="ays_survey_enable_info_autofill" <?php echo esc_attr($survey_info_autofill); ?>/>
                </div>
            </div><!-- Autofill logged-in user data -->
            <hr/>    
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_previous_button">
                        <?php echo esc_html__('Enable previous button', "survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Add a previous button that will let the users go back to the previous sections.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_enable_previous_button" name="ays_survey_enable_previous_button" value="on" <?php echo ($survey_enable_previous_button) ? 'checked' : '' ?>/>
                </div>
            </div> <!-- Enable previous button -->    
            <hr/>    
            <div class="form-group row ays_toggle_parent">
                <div class="col-sm-4">
                    <label for="ays_survey_disable_next_button">
                        <?php echo esc_html__('Disable next button', "survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php echo esc_attr__("Enable this setting to deactivate the 'Next' button for certain sections.", "survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" class="ays_toggle_checkbox ays-enable-timer1" id="ays_survey_disable_next_button" name="ays_survey_disable_next_button" value="on" <?php echo ($survey_disable_next_button) ? 'checked' : '' ?>/>
                </div>
                <div class="col-sm-7 ays_toggle_target ays_divider_left <?php echo $survey_disable_next_button ? '' : 'display_none_not_important'; ?>">
                    <blockquote class="chat_mode_blockquote_message"><?php echo esc_html__("Please note that this feature is compatible exclusively with the following question types: Radio, Dropdown, and Yes/No. Should questions of a different type be present or enabled 'other answer', this setting will not apply.", "survey-maker"); ?></blockquote>
                </div>
            </div> <!-- Disable next button -->    
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_clear_answer">
                        <?php echo esc_html__('Enable clear answer button',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Allow the survey taker to clear the chosen answer.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_enable_clear_answer" name="ays_survey_enable_clear_answer" value="on" <?php echo ($survey_enable_clear_answer) ? 'checked' : '' ?>/>
                </div>
            </div> <!-- Enable clear answer button -->
            <hr>
            <div class="form-group row ays_toggle_parent">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_progres_bar">
                        <?php echo esc_html__('Enable live progress bar',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Show the current state of the user passing the survey. It will be shown at the bottom of the survey container.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox"
                        class="ays-enable-timer1 ays_toggle_checkbox"
                        id="ays_survey_enable_progres_bar"
                        name="ays_survey_enable_progres_bar"
                        value="on"
                        <?php echo esc_attr($survey_enable_progress_bar);?>/>
                </div>
                <div class="col-sm-7 ays_toggle_target ays_divider_left <?php echo $survey_enable_progress_bar == "checked" ? '' : 'display_none_not_important'; ?>">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="ays_survey_hide_section_pagination_text">
                                <?php echo esc_html__('Hide the pagination text',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick this option to hide the pagination text.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8 ays_divider_left">
                            <input type="checkbox"
                        class="ays-enable-timer1"
                        id="ays_survey_hide_section_pagination_text"
                        name="ays_survey_hide_section_pagination_text"
                        value="on"
                        <?php echo esc_attr($survey_hide_section_pagination_text); ?>
                        />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="ays_survey_pagination_positioning">
                                <?php echo esc_html__('Pagination items positioning',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick the checkbox to change the position of the pagination items.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_pagination_positioning'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick the checkbox to change the position of the pagination items for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8">
                                    <div>
                                        <select class="ays-text-input ays-text-input-short" name="ays_survey_pagination_positioning" id='<?php echo esc_attr($html_name_prefix); ?>survey_pagination_positioning'>
                                            <option <?php echo $survey_pagination_positioning == "none" ? "selected" : ""; ?> value="none"><?php echo esc_html__( "None", "survey-maker"); ?></option>
                                            <option <?php echo $survey_pagination_positioning == "reverse" ? "selected" : ""; ?> value="reverse"><?php echo esc_html__( "Reverse", "survey-maker"); ?></option>
                                            <option <?php echo $survey_pagination_positioning == "column" ? "selected" : ""; ?> value="column"><?php echo esc_html__( "Column", "survey-maker"); ?></option>
                                            <option <?php echo $survey_pagination_positioning == "column_reverse" ? "selected" : ""; ?> value="column_reverse"><?php echo esc_html__( "Column Reverse", "survey-maker"); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_pagination_positioning_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick the checkbox to change the position of the pagination items for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8">
                                    <div>
                                        <select class="ays-text-input ays-text-input-short" name="ays_survey_pagination_positioning_mobile" id='<?php echo esc_attr($html_name_prefix); ?>survey_pagination_positioning_mobile'>
                                            <option <?php echo $survey_pagination_positioning_mobile == "none" ? "selected" : ""; ?> value="none"><?php echo esc_html__( "None", "survey-maker"); ?></option>
                                            <option <?php echo $survey_pagination_positioning_mobile == "reverse" ? "selected" : ""; ?> value="reverse"><?php echo esc_html__( "Reverse", "survey-maker"); ?></option>
                                            <option <?php echo $survey_pagination_positioning_mobile == "column" ? "selected" : ""; ?> value="column"><?php echo esc_html__( "Column", "survey-maker"); ?></option>
                                            <option <?php echo $survey_pagination_positioning_mobile == "column_reverse" ? "selected" : ""; ?> value="column_reverse"><?php echo esc_html__( "Column Reverse", "survey-maker"); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="ays_survey_hide_section_bar">
                                <?php echo esc_html__('Hide the bar',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick this option to hide the bar.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8 ays_divider_left">
                            <input type="checkbox"
                        class="ays-enable-timer1"
                        id="ays_survey_hide_section_bar"
                        name="ays_survey_hide_section_bar"
                        value="on"
                        <?php echo esc_attr($survey_hide_section_bar); ?>
                        />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="ays_survey_progress_bar_text">
                                <?php echo esc_html__('Progress bar text',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the text of the progress bar.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8 ays_divider_left">
                            <input type="text" class="ays-text-input ays-text-input-short" id="ays_survey_progress_bar_text" name="ays_survey_progress_bar_text" value="<?php echo esc_attr($survey_progress_bar_text); ?>">
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for='ays_survey_progress_bar_text_letter_spacing'>
                                <?php echo esc_html__('Progress bar text letter spacing', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the progress bar text in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the progress bar text in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input ays-text-input-short" id='ays_survey_progress_bar_text_letter_spacing'name='ays_survey_progress_bar_text_letter_spacing' value="<?php echo esc_attr($survey_progress_bar_text_letter_spacing); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_progress_bar_text_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the progress bar text in pixels for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input ays-text-input-short" id='ays_survey_progress_bar_text_letter_spacing_mobile'name='ays_survey_progress_bar_text_letter_spacing_mobile' value="<?php echo esc_attr($survey_progress_bar_text_letter_spacing_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Survey progress bar letter spacing -->
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for='ays_survey_pagination_text_color'>
                                <?php echo esc_html__('Progress bar text color', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the color of the pagination text.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the color of the pagination text for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="ays-text-input" id='ays_survey_pagination_text_color' name='ays_survey_pagination_text_color' data-alpha="true" value="<?php echo esc_attr($survey_pagination_text_color); ?>"/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_progress_bar_text_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the color of the pagination text for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="ays-text-input" id='ays_survey_pagination_text_color_mobile' name='ays_survey_pagination_text_color_mobile' data-alpha="true" value="<?php echo esc_attr($survey_pagination_text_color_mobile); ?>"/>
                                </div>
                            </div>
                        </div>

                    </div> <!-- Progress bar text color' -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for='ays_survey_progress_bar_text_font_size'>
                                <?php echo esc_html__('Progress bar text font size', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the font size of the progress bar text in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the progress bar text in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input ays-text-input-short" id='ays_survey_progress_bar_text_font_size'name='ays_survey_progress_bar_text_font_size' value="<?php echo esc_attr($survey_progress_bar_text_font_size); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_progress_bar_text_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the progress bar text in pixels for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input ays-text-input-short" id='ays_survey_progress_bar_text_font_size_on_mobile'name='ays_survey_progress_bar_text_font_size_on_mobile' value="<?php echo esc_attr($survey_progress_bar_text_font_size_on_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- Survey progress bar font size -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="ays-survey-progress-bar-text-transform">
                                <?php echo esc_html__('Progress bar text transform',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the text transformation of progress bar text, such as converting to uppercase or lowercase.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the text transformation of progress bar text, such as converting to uppercase or lowercase for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_survey_display_flex_width">
                                    <select class='ays-text-input ays-text-input-short' id="ays-survey-progress-bar-text-transform" name="ays_survey_progress_bar_text_transform">
                                        <option value="none" <?php echo ($survey_progress_bar_text_transform == 'none') ? 'selected' : ''; ?>><?php echo esc_html__('Default',"survey-maker"); ?></option>
                                        <option value="capitalize" <?php echo ($survey_progress_bar_text_transform == 'capitalize') ? 'selected' : ''; ?>><?php echo esc_html__('Capitalize',"survey-maker"); ?></option>
                                        <option value="uppercase" <?php echo ($survey_progress_bar_text_transform == 'uppercase') ? 'selected' : ''; ?>><?php echo esc_html__('Uppercase',"survey-maker"); ?></option>
                                        <option value="lowercase" <?php echo ($survey_progress_bar_text_transform == 'lowercase') ? 'selected' : ''; ?>><?php echo esc_html__('Lowercase',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_progress_bar_text_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the text transformation of progress bar text, such as converting to uppercase or lowercase for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_survey_display_flex_width">
                                    <select class='ays-text-input ays-text-input-short' id="ays-survey-progress-bar-text-transform-mobile" name="ays_survey_progress_bar_text_transform_mobile">
                                        <option value="none" <?php echo ($survey_progress_bar_text_transform_mobile == 'none') ? 'selected' : ''; ?>><?php echo esc_html__('Default',"survey-maker"); ?></option>
                                        <option value="capitalize" <?php echo ($survey_progress_bar_text_transform_mobile == 'capitalize') ? 'selected' : ''; ?>><?php echo esc_html__('Capitalize',"survey-maker"); ?></option>
                                        <option value="uppercase" <?php echo ($survey_progress_bar_text_transform_mobile == 'uppercase') ? 'selected' : ''; ?>><?php echo esc_html__('Uppercase',"survey-maker"); ?></option>
                                        <option value="lowercase" <?php echo ($survey_progress_bar_text_transform_mobile == 'lowercase') ? 'selected' : ''; ?>><?php echo esc_html__('Lowercase',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!--Survey progress text transform -->
                </div>
            </div> <!-- Live progres bar -->
            <hr/>      
            <div class="form-group row ays_toggle_parent">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_schedule">
                        <?php echo esc_html__('Schedule the Survey', "survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the period of time when your survey will be active. When the time is due, a message will inform the survey takers about it.', "survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                    <?php if( current_user_can( 'manage_options' ) ): ?>
                    <p class="ays_survey_small_hint_text_for_message_variables">
                        <span><?php echo esc_html__( "To change your GMT " , "survey-maker" ); ?></span>
                        <a href="<?php echo esc_url($wp_general_settings_url); ?>" target="_blank"><?php echo esc_html__( "click here" , "survey-maker" ); ?></a>
                    </p>
                    <?php endif; ?>
                </div>
                <div class="col-sm-1">
                    <input id="ays_survey_enable_schedule" type="checkbox" class="active_date_check ays_toggle_checkbox" name="ays_survey_enable_schedule" <?php echo $survey_enable_schedule ? 'checked' : '' ?>>
                </div>
                <div class="col-sm-7 ays_toggle_target ays_divider_left active_date <?php echo $survey_enable_schedule ? '' : 'display_none_not_important'; ?>">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-check-label" for="ays_survey_schedule_active">
                                <?php echo esc_html__('Start date:', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Set a date since which your survey will be active.', "survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input type="text" class="ays-text-input ays-text-input-short" id="ays_survey_schedule_active" name="ays_survey_schedule_active" value="<?php echo esc_attr($survey_schedule_active); ?>" placeholder="<?php echo current_time( 'mysql' ); ?>">
                                <div class="input-group-append">
                                    <label for="ays_survey_schedule_active" class="input-group-text">
                                        <span><i class="ays_fa ays_fa_calendar"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-check-label" for="ays_survey_schedule_deactive">
                                <?php echo esc_html__('End date:', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Set a date since which your survey will be inactive.', "survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input type="text" class="ays-text-input ays-text-input-short" id="ays_survey_schedule_deactive" name="ays_survey_schedule_deactive" value="<?php echo esc_attr($survey_schedule_deactive); ?>" placeholder="<?php echo current_time( 'mysql' ); ?>">
                                <div class="input-group-append">
                                    <label for="ays_survey_schedule_deactive" class="input-group-text">
                                        <span><i class="ays_fa ays_fa_calendar"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> <!--Show timer start -->
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-check-label" for="ays_survey_schedule_pre_start_message">
                                <?php echo esc_html__("Pre start message:", "survey-maker") ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Write a message that will inform the survey takers about the activation of the survey.', "survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <div class="editor">
                                <?php
                                $content   = $survey_schedule_pre_start_message;
                                $editor_id = 'ays_survey_schedule_pre_start_message';
                                $settings  = array(
                                    'editor_height'  => $survey_wp_editor_height,
                                    'textarea_name'  => 'ays_survey_schedule_pre_start_message',
                                    'editor_class'   => 'ays-textarea',
                                    'media_elements' => false
                                );
                                wp_editor($content, $editor_id, $settings);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-check-label" for="ays_survey_schedule_expiration_message">
                                <?php echo esc_html__("Expiration message:", "survey-maker") ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Set down a message that will inform the survey takers that they cannot take the survey anymore.', "survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <div class="editor">
                                <?php
                                $content   = $survey_schedule_expiration_message;
                                $editor_id = 'ays_survey_schedule_expiration_message';
                                $settings  = array(
                                    'editor_height'  => $survey_wp_editor_height,
                                    'textarea_name'  => 'ays_survey_schedule_expiration_message',
                                    'editor_class'   => 'ays-textarea',
                                    'media_elements' => false
                                );
                                wp_editor($content, $editor_id, $settings);
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="ays_survey_dont_show_survey_container">
                                <?php echo esc_html__('Don\'t show survey',"survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__("Do not show the survey container on the front-end at all when it is expired or has not started yet.","survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <input type="checkbox" id="ays_survey_dont_show_survey_container" name="ays_survey_dont_show_survey_container" value="on" <?php echo ($survey_dont_show_survey_container) ? 'checked' : ''; ?>/>
                        </div>
                    </div> <!-- Dont Show Survey -->
                </div>
            </div> <!-- Schedule the Survey -->          
            <hr/>                
        </div>
    </div>
    <div class="ays-survey-collapsible-container">
        <div class="ays-survey-collapse-options">
            <div><i class="ays_fa ays_fa_arrow_down ays-survey-collapse-options-button" data-rotation="false" style="font-size: 15px;"></i></div>
            <div><p style="margin:0;font-size: 18px;font-weight: 500;cursor: pointer"><?php echo esc_html__('Question settings',"survey-maker"); ?></p></div>
        </div>
        <hr/>
        <div class="ays-survey-collapsible-options">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_randomize_questions">
                        <?php echo esc_html__('Enable randomize questions',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Show the questions in a random sequence every time the survey takers participate in a survey.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <div>
                        <input type="checkbox" class="ays-enable-timerl" id="ays_survey_enable_randomize_questions" name="ays_survey_enable_randomize_questions" value="on" <?php echo ($survey_enable_randomize_questions) ? 'checked' : ''; ?>/>
                    </div>
                    <div class="ays-survey-note-texts">
                        <span><?php echo esc_html__('Note: If you are using a Cache plugin, make sure to exclude the URL, where the given survey is located so that the feature can work correctly for you.', "survey-maker"); ?></span>
                    </div>
                </div>
            </div> <!-- Enable randomize questions -->    
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label>
                        <?php echo esc_html__('Questions numbering',"survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Assign numbering to each question in ascending sequential order. Choose your preferred type from the list.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" name="ays_survey_show_question_numbering">
                        <option <?php echo $survey_auto_numbering_questions == "none" ? "selected" : ""; ?> value="none"><?php echo esc_html__( "None", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering_questions == "1."   ? "selected" : ""; ?>   value="1."><?php echo esc_html__( "1.", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering_questions == "1)"   ? "selected" : ""; ?>   value="1)"><?php echo esc_html__( "1)", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering_questions == "A."   ? "selected" : ""; ?>   value="A."><?php echo esc_html__( "A.", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering_questions == "A)"   ? "selected" : ""; ?>   value="A)"><?php echo esc_html__( "A)", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering_questions == "a."   ? "selected" : ""; ?>   value="a."><?php echo esc_html__( "a.", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering_questions == "a)"   ? "selected" : ""; ?>   value="a)"><?php echo esc_html__( "a)", "survey-maker"); ?></option>
                    </select>

                </div>
            </div> <!-- Show question numbering -->
            <hr/>    
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_show_questions_count">
                        <?php echo esc_html__('Show questions count',"survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick this option to show every sections questions count',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox"
                        class="ays-enable-timer1"
                        id="ays_survey_show_questions_count"
                        name="ays_survey_show_questions_count"
                        value="on"
                        <?php echo esc_attr($survey_show_sections_questions_count);?>/>
                </div>
            </div> <!-- Show sections questions count -->
            <hr/>                
        </div>
    </div>
    <div class="ays-survey-collapsible-container">
        <div class="ays-survey-collapse-options">
            <div><i class="ays_fa ays_fa_arrow_down ays-survey-collapse-options-button" data-rotation="false" style="font-size: 15px;"></i></div>
            <div><p style="margin:0;font-size: 18px;font-weight: 500;cursor: pointer"><?php echo esc_html__('Answer Settings',"survey-maker"); ?></p></div>
        </div>
        <hr/>
        <div class="ays-survey-collapsible-options">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_randomize_answers">
                        <?php echo esc_html__('Enable randomize answers',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Show the answers in a random sequence every time the survey takers participate in a survey.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <div>
                        <input type="checkbox" class="ays-enable-timerl" id="ays_survey_enable_randomize_answers" name="ays_survey_enable_randomize_answers" value="on" <?php echo ($survey_enable_randomize_answers) ? 'checked' : ''; ?>/>
                    </div>
                    <div class="ays-survey-note-texts">
                        <span><?php echo esc_html__('Note: If you are using a Cache plugin, make sure to exclude the URL, where the given survey is located so that the feature can work correctly for you.', "survey-maker"); ?></span>
                    </div>
                </div>
            </div> <!-- Enable randomize answers -->
            <hr/>    
            <div class="form-group row">
                <div class="col-sm-4">
                    <label>
                        <?php echo esc_html__('Answers numbering',"survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Assign numbering to each answer in ascending sequential order. Choose your preferred type from the list.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" name="ays_survey_show_answers_numbering">
                        <option <?php echo $survey_auto_numbering == "none" ? "selected" : ""; ?> value="none"><?php echo esc_html__( "None", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering == "1."   ? "selected" : ""; ?>   value="1."><?php echo esc_html__( "1.", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering == "1)"   ? "selected" : ""; ?>   value="1)"><?php echo esc_html__( "1)", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering == "A."   ? "selected" : ""; ?>   value="A."><?php echo esc_html__( "A.", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering == "A)"   ? "selected" : ""; ?>   value="A)"><?php echo esc_html__( "A)", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering == "a."   ? "selected" : ""; ?>   value="a."><?php echo esc_html__( "a.", "survey-maker"); ?></option>
                        <option <?php echo $survey_auto_numbering == "a)"   ? "selected" : ""; ?>   value="a)"><?php echo esc_html__( "a)", "survey-maker"); ?></option>
                    </select>

                </div>
            </div> <!-- Show answers numbering -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_allow_html_in_answers">
                        <?php echo esc_html__('Allow HTML in answers',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Allow implementing HTML coding in answer boxes. This works only for Radio and Checkbox (Multiple) questions.', "survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_allow_html_in_answers" name="ays_survey_allow_html_in_answers" value="on" <?php echo ($survey_allow_html_in_answers) ? 'checked' : '' ?>/>
                </div>
            </div> <!-- Allow HTML in answers -->
            <hr/>                
        </div>
    </div>
    <div class="ays-survey-collapsible-container">
        <div class="ays-survey-collapse-options">
            <div><i class="ays_fa ays_fa_arrow_down ays-survey-collapse-options-button" data-rotation="false" style="font-size: 15px;"></i></div>
            <div><p style="margin:0;font-size: 18px;font-weight: 500;cursor: pointer"><?php echo esc_html__('Button Settings',"survey-maker"); ?></p></div>
        </div>
        <hr/>

        <div class="ays-survey-collapsible-options">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_finish_button_each_text">
                        <?php echo esc_html__('Finish button text',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_html__('Specify text for the finish button',"survey-maker");
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" id="ays_survey_finish_button_each_text" name="ays_survey_finish_button_each_text" class="ays-text-input" value="<?php echo esc_attr($survey_finish_button_each_text); ?>">
                </div>
            </div> <!-- Survey Finish button text -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_next_button_each_text">
                        <?php echo esc_html__('Next button text',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_html__('Specify text for the next button',"survey-maker");
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" id="ays_survey_next_button_each_text" name="ays_survey_next_button_each_text" class="ays-text-input" value="<?php echo esc_attr($survey_next_button_each_text); ?>">
                </div>
            </div> <!-- Survey Next button text -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_previous_button_each_text">
                        <?php echo esc_html__('Previous button text',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_html__('Specify text for the previous button',"survey-maker");
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" id="ays_survey_previous_button_each_text" name="ays_survey_previous_button_each_text" class="ays-text-input" value="<?php echo esc_attr($survey_previous_button_each_text); ?>">
                </div>
            </div> <!-- Survey Previous button text -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_restart_button_each_text">
                        <?php echo esc_html__('Restart button text',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_html__('Specify text for the restart button',"survey-maker");
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" id="ays_survey_restart_button_each_text" name="ays_survey_restart_button_each_text" class="ays-text-input" value="<?php echo esc_attr($survey_restart_button_each_text); ?>">
                </div>
            </div> <!-- Survey Restart button text -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_exit_button_each_text">
                        <?php echo esc_html__('Exit button text',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_html__('Specify text for the exit button',"survey-maker");
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" id="ays_survey_exit_button_each_text" name="ays_survey_exit_button_each_text" class="ays-text-input" value="<?php echo esc_attr($survey_exit_button_each_text); ?>">
                </div>
            </div> <!-- Survey Exit button text -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_clear_selection_button_each_text">
                        <?php echo esc_html__('Clear selection button text',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_html__('Specify text for the clear selection button',"survey-maker");
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" id="ays_survey_clear_selection_button_each_text" name="ays_survey_clear_selection_button_each_text" class="ays-text-input" value="<?php echo esc_attr($survey_clear_selection_button_each_text); ?>">
                </div>
            </div> <!-- Survey Clear selection button text -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_start_button_each_text">
                        <?php echo esc_html__('Start button text',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_html__('Specify text for the start button',"survey-maker");
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" id="ays_survey_start_button_each_text" name="ays_survey_start_button_each_text" class="ays-text-input" value="<?php echo esc_attr($survey_start_button_each_text); ?>">
                </div>
            </div> <!-- Survey Start button text -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_login_button_each_text">
                        <?php echo esc_html__('Log in button text',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_html__('Specify text for the log in button',"survey-maker");
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" id="ays_survey_login_button_each_text" name="ays_survey_login_button_each_text" class="ays-text-input" value="<?php echo esc_attr($survey_login_button_each_text); ?>">
                </div>
            </div> <!-- Survey Start button text -->
            <hr/>
        </div>
    </div>
    <div class="ays-survey-collapsible-container">
        <div class="ays-survey-collapse-options">
            <div><i class="ays_fa ays_fa_arrow_down ays-survey-collapse-options-button" data-rotation="false" style="font-size: 15px;"></i></div>
            <div><p style="margin:0;font-size: 18px;font-weight: 500;cursor: pointer"><?php echo esc_html__('Advanced',"survey-maker"); ?></p></div>
        </div>
        <hr/>
        <div class="ays-survey-collapsible-options">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_allow_html_in_section_description">
                        <?php echo esc_html__('Allow HTML in section description',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Allow implementing HTML coding in section description boxes.', "survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_allow_html_in_section_description" name="ays_survey_allow_html_in_section_description" value="on" <?php echo ($survey_allow_html_in_section_description) ? 'checked' : '' ?>/>
                </div>
            </div> <!-- Allow HTML in section description -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_main_url">
                        <?php echo esc_html__('Survey main URL',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_html__('Write the URL link where your survey is located (in Front-end).To open your survey right from the surveys page, please fill in this field and navigate to the general tab to see the \'View\' button',"survey-maker");
                        ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="url" id="ays_survey_main_url" name="ays_survey_main_url" class="ays-text-input" value="<?php echo esc_attr($survey_main_url); ?>">
                </div>
            </div> <!-- Survey Main URL -->
            <hr/>
            <div class="form-group row ays_toggle_parent">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_full_screen_mode">
                        <?php echo esc_html__('Enable full-screen mode',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Allow the survey to enter full-screen mode by pressing the icon located in the top-right corner of the survey container.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox"
                        class="ays-enable-timer1 ays_toggle_checkbox"
                        id="ays_survey_enable_full_screen_mode"
                        name="ays_survey_enable_full_screen_mode"
                        value="on"
                        <?php echo esc_attr($survey_full_screen);?>/>
                </div>
                <div class="col-sm-7 ays_toggle_target ays_divider_left <?php echo $survey_full_screen == "checked" ? '' : 'display_none_not_important'; ?>">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for='ays_survey_full_screen_button_color'>
                                <?php echo esc_html__('Full screen button color', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the color of the full screen button.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-8 ">
                            <input type="text" class="ays-text-input" id='ays_survey_full_screen_button_color' name='ays_survey_full_screen_button_color' data-alpha="true" value="<?php echo esc_attr($survey_full_screen_button_color); ?>"/>
                        </div>
                    </div>
                </div>
            </div> <!-- Open Full Screen Mode -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_show_section_header">
                        <?php echo esc_html__('Show section header info',"survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick the checkbox if you want to show the title and description of the section on the front-end.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                        <input type="checkbox" id="ays_survey_show_section_header" name="ays_survey_show_section_header" value="on" <?php echo $survey_show_section_header ? 'checked' : ''; ?>/>
                </div>
            </div> <!-- Show section header info -->
            <hr/>
            <div class="form-group row ays_toggle_parent">
                <div class="col-sm-4">
                    <label for="ays_survey_enable_survey_start_loader">
                        <?php echo esc_html__('Enable survey loader', "survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick this option to display a loader until the survey container is loaded.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" class="ays-enable-timer1 ays_toggle_checkbox" id="ays_survey_enable_survey_start_loader" name="ays_survey_enable_survey_start_loader" value="on" <?php echo ($survey_enable_survey_start_loader) ? 'checked' : '' ?>/>
                </div>
                <div class="col-sm-7 ays_toggle_target" <?php echo ($survey_enable_survey_start_loader) ? '' : "style='display: none;'" ?>>
                    <label class="ays_survey_before_start_loader">
                        <input name="ays_survey_before_start_loader" class="ays_toggle_loader_radio" type="radio" value="default" <?php echo ($survey_before_start_loader == 'default') ? 'checked' : ''; ?>>
                        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                    </label>
                    <label class="ays_survey_before_start_loader">
                        <input name="ays_survey_before_start_loader" class="ays_toggle_loader_radio" type="radio" value="circle" <?php echo ($survey_before_start_loader == 'circle') ? 'checked' : ''; ?>>
                        <div class="lds-circle"></div>
                    </label>
                    <label class="ays_survey_before_start_loader">
                        <input name="ays_survey_before_start_loader" class="ays_toggle_loader_radio" type="radio" value="dual_ring" <?php echo ($survey_before_start_loader == 'dual_ring') ? 'checked' : ''; ?>>
                        <div class="lds-dual-ring"></div>
                    </label>
                    <label class="ays_survey_before_start_loader">
                        <input name="ays_survey_before_start_loader" class="ays_toggle_loader_radio" type="radio" value="facebook" <?php echo ($survey_before_start_loader == 'facebook') ? 'checked' : ''; ?>>
                        <div class="lds-facebook"><div></div><div></div><div></div></div>
                    </label>
                    <label class="ays_survey_before_start_loader">
                        <input name="ays_survey_before_start_loader" class="ays_toggle_loader_radio" type="radio" value="hourglass" <?php echo ($survey_before_start_loader == 'hourglass') ? 'checked' : ''; ?>>
                        <div class="lds-hourglass"></div>
                    </label>
                    <label class="ays_survey_before_start_loader">
                        <input name="ays_survey_before_start_loader" class="ays_toggle_loader_radio" type="radio" value="ripple" <?php echo ($survey_before_start_loader == 'ripple') ? 'checked' : ''; ?>>
                        <div class="lds-ripple"><div></div><div></div></div>
                    </label>
                    <label class="ays_survey_before_start_loader">
                        <input name="ays_survey_before_start_loader" class="ays_toggle_loader_radio" type="radio" value="snake" <?php echo ($survey_before_start_loader == 'snake') ? 'checked' : ''; ?>>                
                        <div class="ays-survey-loader-snake"><div></div><div></div><div></div><div></div><div></div><div></div></div>
                    </label>
                </div>
            </div> <!-- Enable survey start loader -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ays_survey_show_title">
                        <?php echo esc_html__('Show survey title',"survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Show the name of the survey on the front-end.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                        <input type="checkbox" id="ays_survey_show_title" name="ays_survey_show_title" value="on" <?php echo $survey_show_title ? 'checked' : ''; ?>/>
                </div>
            </div> <!-- Show survey title -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label>
                        <?php echo esc_html__('Change current survey creation date',"survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Change the survey creation date to your preferred date.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                        <input type="text" class="ays-text-input ays-text-input-short ays-survey-date-create" id="ays_survey_change_creation_date" name="ays_survey_change_creation_date" value="<?php echo esc_attr($date_created); ?>" placeholder="<?php echo esc_attr(current_time( 'mysql' )); ?>">
                        <div class="input-group-append">
                            <label for="ays_survey_change_creation_date" class="input-group-text">
                                <span><i class="ays_fa ays_fa_calendar"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div> <!-- Change current survey creation date -->
            <hr/>                
        </div>
    </div>
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
                <div class="col-sm-4">
                    <label for="ays_survey_enable_copy_protection">
                        <?php echo esc_html__('Enable copy protection',"survey-maker")?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Disable copy functionality in the survey. The user will not be able to copy the text or right-click on it.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" id="ays_survey_enable_copy_protection"/>
                </div>
            </div>
        </div>
    </div> <!-- Enable copy protection -->
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
                <div class="col-sm-4">
                    <label for="ays_survey_question_text_to_speech">
                        <?php echo esc_html__('Enable text to speech', "survey-maker")?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Enable this option to convert question text into spoken words, providing an audio representation of the question for improved accessibility and convenience.', "survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" />
                </div>
            </div> 
        </div>
    </div> <!-- Questions text to speech -->
    <hr/>
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
                <div class="col-sm-4">
                    <label for="ays_survey_allow_collecting_logged_in_users_data">
                        <?php echo esc_html__('Allow collecting information of logged in users',"survey-maker"); ?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__("Allow collecting information from logged-in users. Email and name of users will be stored in the database. Email options will be work for these users.","survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" value="on" />
                </div>
            </div> 
        </div>
    </div> <!-- Allow collecting information of logged in users -->
    <hr/>
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
                <div class="col-sm-4">
                    <label for="ays_survey_enable_expand_collapse_question">
                        <?php echo esc_html__('Expand/collapse questions',"survey-maker")?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Expand/collapse questions on the front page.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-timer1" value="on" />
                </div>
            </div> 
        </div>
    </div><!-- Expand/collapse questions -->
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
                <div class="col-sm-4">
                    <label for="ays_survey_enable_all_sections_one_page">
                        <?php echo esc_html__('Display all sections on one page', "survey-maker"); ?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Enable this option to display all sections of the survey on one page. Note: If the option is enabled, the Logic Jump functionality will not work for the survey.', "survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-8">
                    <input type="checkbox" class="ays-enable-all-sections" value="on" />
                </div>
            </div>
        </div>
    </div><!-- Show all sections in one page -->
    <hr>
    <div class="form-group row" style="margin:0px;">
        <div class="col-sm-12 ays-pro-features-v2-main-box ays-pro-features-v2-main-box-small" >
            <div class="ays-pro-features-v2-small-buttons-box ays-pro-pro-features-popup" data-video-url="https://www.youtube.com/watch?v=DP_3lVzDArI" data-option-title="<?php echo esc_attr__('Chat mode',"survey-maker")?>" data-option-text="The Chat Mode feature allows you to create <strong> user-friendly </strong> surveys in the form of online conversations. This helps to improve user experience on your website and create more appealing surveys. Note that this feature works only for the <strong>Radio, Short text, and Yes or No </strong> question types.">
                <div>
                    <a href="https://ays-demo.com/conversational-survey/" target="_blank" class="ays-pro-features-v2-view-demo-button">
                        <div class="ays-pro-features-v2-view-demo-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/view-demo.svg');"></div>
                        <div class="ays-pro-features-v2-view-demo-text">
                            <?php echo esc_html__("View demo" , "survey-maker"); ?>
                        </div>
                    </a>
                </div>
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
                <div class="col-sm-4">
                    <label for="ays_survey_enable_chat_mode">
                        <?php echo esc_html__('Enable chat mode',"survey-maker")?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__('Make your survey look like an online chat conversation. It will print each pre-set question instantly after the user answers the previous one.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" class="ays_toggle_checkbox" value="on" />
                </div>
            </div> 
        </div>
    </div><!-- Enable chat mode -->
    <hr/>
    <div class="form-group row" style="margin:0px;">
        <div class="col-sm-12 ays-pro-features-v2-main-box ays-pro-features-v2-main-box-small">
            <div class="ays-pro-features-v2-small-buttons-box ays-pro-pro-features-popup" data-video-url="https://www.youtube.com/watch?v=grQI5KXcPz4" data-option-title="<?php echo esc_attr__('Terms and Conditions',"survey-maker")?>" data-option-text="Do you have any terms and conditions and want your survey takers to know about them? Use this feature and add <strong> as many terms and conditions as you want </strong> with a few clicks. If you want all your users to read and give their agreement with your terms and conditions, make them <strong> required </strong> and type your desired message in the <strong> “required message text” </strong> field to warn the survey takers every time they try to skip the confirmation of terms.">
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
                    <label for="ays_survey_terms_and_conditions">
                        <?php echo esc_html__('Terms and Conditions',"survey-maker")?>
                        <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_attr__(' Write your terms and conditions here. It will be displayed in the front end in top of the finish button. Please note that you will be able to click on the finish button only when all the checkboxes are ticked.',"survey-maker")?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-1">
                    <input type="checkbox" checked id="ays_survey_terms_and_conditions" value="on"/>
                </div>
                <div class="col-sm-7 ays_divider_left ays_survey_terms_and_conditions_all_inputs_block">
                    <div class="ays_survey_icons appsMaterialWizButtonPapericonbuttonEl">
                        <img class="ays_survey_add_new_textarea" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                    </div>
                    <div class="ays_survey_terms_and_conditions_content">
                        <div class = "ays_survey_terms_conditions_edit_block" data-condition-id = "1">
                            <div class="ays_survey_terms_and_conditions_textarea_div">
                                <textarea value="" placeholder="Terms and Conditions..."></textarea>
                            </div>
                            <div class="ays_survey_icons appsMaterialWizButtonPapericonbuttonEl" data-trigger="hover">
                                <img class="ays_survey_remove_textarea" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash.svg">
                            </div>
                        </div>
                    </div>
                    <div class="ays_survey_icons appsMaterialWizButtonPapericonbuttonEl">
                        <img class="ays_survey_add_new_textarea" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                    </div>         
                </div> 
            </div> 
        </div>
    </div><!-- Terms and Conditions -->
    <hr/>
</div>
