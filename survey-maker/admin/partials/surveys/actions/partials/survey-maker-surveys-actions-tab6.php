<div id="tab6" class="ays-survey-tab-content <?php echo ($ays_tab == 'tab6') ? 'ays-survey-tab-content-active' : ''; ?>">
    <p class="ays-subtitle"><?php echo esc_html__('Start page settings',"survey-maker")?></p>
    <p><?php echo esc_html__("Configure your survey's start page by adding the title, description and styling it the way you want. The start page will be shown to the survey takers before displaying the survey.","survey-maker")?></p>
    <hr/>
    <div class="form-group row">
        <div class="col-sm-3">
            <label for="ays_survey_enable_start_page">
                <?php echo esc_html__('Enable start page',"survey-maker"); ?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick the checkbox if you want to add a start page to your survey. After enabling this option, a new tab will appear next to the Settings tab, where you can configure Start Page settings.',"survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-9">
            <input type="checkbox" id="ays_survey_enable_start_page" name="ays_survey_enable_start_page" value="on" <?php echo $survey_enable_start_page ? 'checked' : ''; ?>/>
        </div>
    </div> <!-- Enable start page -->
    <hr/>
    <div class="form-group row">
        <div class="col-sm-3">
            <label for="ays_survey_start_page_title">
                <?php echo esc_html__('Start page title',"survey-maker"); ?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Give a title to the start page',"survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-9">
            <input type="text" class="ays-text-input" id="ays_survey_start_page_title" name="ays_survey_start_page_title" value="<?php echo esc_attr($survey_start_page_title); ?>"/>
        </div>
    </div> <!-- Start page title -->
    <hr/>
    <div class="form-group row">
        <div class="col-sm-3">
            <label for="ays_survey_start_page_description">
                <?php echo esc_html__('Start page description',"survey-maker"); ?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Provide some information about the survey. This will show up on the start page.',"survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-9">
            <?php
            $content = $survey_start_page_description;
            $editor_id = 'ays_survey_start_page_description';
            $settings = array('editor_height' => $survey_wp_editor_height, 'textarea_name' => 'ays_survey_start_page_description', 'editor_class' => 'ays-textarea', 'media_elements' => true);
            wp_editor($content, $editor_id, $settings);
            ?>
        </div>
    </div> <!-- Start page description -->
    <hr/>
    <div class="form-group row">
        <div class="col-sm-3">
            <label for="ays_survey_start_page_button_pos">
                <?php echo esc_html__('Start button position', "survey-maker"); ?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the start button.', "survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-9">
            <select class="ays-text-input ays-text-input-short" name="ays_survey_start_page_button_pos" id="ays_survey_start_page_button_pos">
                <option <?php echo $survey_start_page_button_pos == "left" ? "selected" : ""; ?> value="left"><?php echo esc_html__( "Left", "survey-maker"); ?></option>
                <option <?php echo $survey_start_page_button_pos == "center" ? "selected" : ""; ?> value="center"><?php echo esc_html__( "Center", "survey-maker"); ?></option>
                <option <?php echo $survey_start_page_button_pos == "right" ? "selected" : ""; ?> value="right"><?php echo esc_html__( "Right", "survey-maker"); ?></option>
            </select>

        </div>
    </div> <!-- Start button position -->
    <hr/>
    <p class="ays-subtitle" style="margin-top:0;"><?php echo esc_html__('Start page styles',"survey-maker"); ?></p>
    <hr/>
    <div class="form-group row"> <!-- Start page Styles -->
        <div class="col-lg-7 col-sm-12">
            <div class="form-group row">
                <div class="col-sm-5">
                    <label for='ays_survey_start_page_background_color'>
                        <?php echo esc_html__('Background color', "survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the background color of the start page.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-7 ays_divider_left">
                    <input type="text" class="ays-text-input" id='ays_survey_start_page_background_color' data-alpha="true" name='ays_survey_start_page_background_color' value="<?php echo esc_attr($survey_start_page_background_color); ?>"/>
                </div>
            </div> <!-- Start page Background Color -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-5">
                    <label for='ays_survey_start_page_text_color'>
                        <?php echo esc_html__('Text color', "survey-maker"); ?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the text color of the start page.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-7 ays_divider_left">
                    <input type="text" class="ays-text-input" id='ays_survey_start_page_text_color' data-alpha="true"name='ays_survey_start_page_text_color' value="<?php echo esc_attr($survey_start_page_text_color); ?>"/>
                </div>
            </div> <!-- Start page Text Color -->
            <hr/>
            <div class="form-group row">
                <div class="col-sm-5">
                    <label for="ays_survey_start_page_custom_class">
                        <?php echo esc_html__('Custom class for start page container',"survey-maker")?>
                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Use your custom HTML class for adding your custom styles to the survey start page container.',"survey-maker"); ?>">
                            <i class="ays_fa ays_fa_info_circle"></i>
                        </a>
                    </label>
                </div>
                <div class="col-sm-7 ays_divider_left">
                    <input type="text" class="ays-text-input" name="ays_survey_start_page_custom_class" id="ays_survey_start_page_custom_class" placeholder="myClass myAnotherClass..." value="<?php echo esc_attr($survey_start_page_custom_class); ?>">
                </div>
            </div> <!-- Custom class for start page container -->
        </div>
        <hr/>
        <div class="col-lg-5 col-sm-12 ays_divider_left" style="position:relative;">
            <div id="ays_buttons_styles_tab" class="display_none" style="position:sticky;top:50px; margin:auto;">
                <div class="ays_buttons_div" style="justify-content: center; overflow:hidden;">
                    <input type="button" name="next" class="action-button ays-quiz-live-button" style="padding:0;" value="<?php echo esc_attr__( "Start", "survey-maker" ); ?>">
                </div>
            </div>
        </div> <!-- Start page Styles Live -->
    </div> <!-- Start page Styles End -->
</div>
