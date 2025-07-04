<div id="tab2" class="ays-survey-tab-content <?php echo ($ays_tab == 'tab2') ? 'ays-survey-tab-content-active' : ''; ?>">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <p class="ays-subtitle"><?php echo esc_html__('Styles',"survey-maker"); ?></p>
        </div>
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
    <hr style="border-width: 2px;"/>
    <div class="form-group row">
        <div class="col-sm-2">
            <label for="ays_survey_theme">
                <?php echo esc_html__('Theme', "survey-maker"); ?>
                <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php 
                        echo esc_html(htmlspecialchars( sprintf(
                            __('Choose the theme for your survey between these two nice themes.',"survey-maker") . '<ul class="ays_help_ul"><li>' .
                            __('%sClassic Light:%s Light background, dark text.',"survey-maker") . '</li><li>' .
                            __('%sClassic Dark:%s Dark background, light text.',"survey-maker") . '</li></ul>'. 
                            __('%sMinimal:%s Transparent background, dark text.',"survey-maker") . '</li></ul>',
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
        <div class="col-sm-10">
            <div class="ays-survey-themes-main-div-wrap">
                <div class="ays-survey-themes-main-div">
                    <input type="radio" id="ays-survey-classic_light" name="ays_survey_theme" value="classic_light" <?php echo ($survey_theme == 'classic_light') ? 'checked' : '' ?>>
                    <label for="ays-survey-classic_light" class="ays-survey-theme-item">
                        <span><?php echo esc_html__('Classic Light', "survey-maker"); ?></span>
                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/themes/classic-light.webp' ?>" alt="Classic Light">
                    </label>
                </div>
                <div class="ays-survey-themes-main-div">
                    <input type="radio" id="ays-survey-classic_dark" name="ays_survey_theme" value="classic_dark" <?php echo ($survey_theme == 'classic_dark') ? 'checked' : '' ?>>
                    <label for="ays-survey-classic_dark" class="ays-survey-theme-item">
                        <span><?php echo esc_html__('Classic Dark', "survey-maker"); ?></span>
                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/themes/classic-dark.webp' ?>" alt="Classic Dark">
                    </label>
                </div>
                <div class="ays-survey-themes-main-div">
                    <input type="radio" id="ays-survey-modern" name="ays_survey_theme" value="modern" <?php echo ($survey_theme == 'modern') ? 'checked' : '' ?>>
                    <label for="ays-survey-modern" class="ays-survey-theme-item">
                        <span><?php echo esc_html__('Modern', "survey-maker"); ?></span>
                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/themes/modern.webp' ?>" alt="Modern">
                    </label>
                </div>
                <div class="ays-survey-themes-main-div">
                    <input type="radio" id="ays-survey-minimal" name="ays_survey_theme" value="minimal" <?php echo ($survey_theme == 'minimal') ? 'checked' : '' ?>>
                    <label for="ays-survey-minimal" class="ays-survey-theme-item">
                        <span><?php echo esc_html__('Minimal', "survey-maker"); ?></span>
                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/themes/minimal.webp' ?>" alt="Minimal">
                    </label>
                </div>
                <div class="ays-survey-themes-main-div ays-survey-themes-main-div-only-pro">
                    <div class="form-group row" style="margin:0px;">
                        <div class="col-sm-12 ays-pro-features-v2-main-box ays-pro-features-v2-main-box-themes ays-pro-features-v2-main-box-small">
                            <div class="ays-pro-features-v2-small-buttons-box">
                                <div class="ays-pro-features-v2-video-button"></div>
                                <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank" class="ays-pro-features-v2-upgrade-button">
                                    <div class="ays-pro-features-v2-upgrade-icon" style="background-image: url('<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg');" data-img-src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg"></div>
                                    <div class="ays-pro-features-v2-upgrade-text">
                                        <?php echo esc_html__("Upgrade" , "survey-maker"); ?>
                                    </div>
                                </a>
                            </div>
                            <label for="ays-survey-business" class="ays-survey-theme-item">
                                <span><?php echo esc_html__('Business', "survey-maker"); ?></span>
                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/themes/business.webp' ?>" alt="Modern">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="ays-survey-themes-main-div ays-survey-themes-main-div-only-pro">
                    <div class="form-group row" style="margin:0px;">
                        <div class="col-sm-12 ays-pro-features-v2-main-box ays-pro-features-v2-main-box-themes ays-pro-features-v2-main-box-small">
                            <div class="ays-pro-features-v2-small-buttons-box">
                                <div>
                                    <a href="https://ays-demo.com/health-questionnaire/" target="_blank" class="ays-pro-features-v2-view-demo-button">
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
                            <label for="ays-survey-elegant" class="ays-survey-theme-item">
                                <span><?php echo esc_html__('Elegant', "survey-maker"); ?></span>
                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/themes/elegant.webp' ?>" alt="Modern">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Survey Theme -->
    <hr/>
    <div class="row">
        <div class="col-lg-7 col-sm-12">
            <div class="ays-survey-collapsible-container">
                <div class="ays-survey-collapse-options">
                    <div><i class="ays_fa ays_fa_arrow_down ays-survey-collapse-options-button" data-rotation="false" style="font-size: 15px;"></i></div>
                    <div><p style="margin:0;font-size: 18px;font-weight: 500;cursor: pointer"><?php echo esc_html__('Survey styles',"survey-maker"); ?></p></div>
                </div>
                <hr/>
                <div class="ays-survey-collapsible-options">
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_color'>
                                <?php echo esc_html__('Survey color', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the main color of the survey. The borders of your survey will get the color that you set.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <input type="text" class="ays-text-input" id='ays_survey_color' name='ays_survey_color' data-alpha="true" value="<?php echo esc_attr($survey_color); ?>"/>
                        </div>
                    </div> <!-- Survey Color -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_background_color'>
                                <?php echo esc_html__('Background color', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the background color of your survey.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <input type="text" class="ays-text-input" id='ays_survey_background_color' data-alpha="true" name='ays_survey_background_color' value="<?php echo esc_attr($survey_background_color); ?>"/>
                        </div>
                    </div> <!-- Survey Background Color -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_text_color'>
                                <?php echo esc_html__('Text color', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Identify the text color of your survey, including the questions, the answers, and the thank you message.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <input type="text" class="ays-text-input" id='ays_survey_text_color' data-alpha="true"name='ays_survey_text_color' value="<?php echo esc_attr($survey_text_color); ?>"/>
                        </div>
                    </div> <!-- Text Color -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_loader_color'>
                                <?php echo esc_html__('Loader color', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Identify the loader color of your survey.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <input type="text" class="ays-text-input" id='ays_survey_loader_color' data-alpha="true"name='ays_survey_loader_color' value="<?php echo esc_attr($survey_loader_color); ?>"/>
                        </div>
                    </div> <!-- Loader Color -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_width'>
                                <?php echo esc_html__('Survey width', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the width of your survey in pixels or percentage.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-6 ays_divider_left ays_survey_display_flex_width">
                            <div>
                                <input type="number" class="ays-text-input" id='ays_survey_width' name='ays_survey_width' value="<?php echo esc_attr($survey_width); ?>"/>
                                <span style="display:block;" class="ays_survey_small_hint_text"><?php echo esc_html__("For 100% leave blank", "survey-maker"); ?></span>
                            </div>
                            <div class="ays_dropdown_max_width">
                                <select id="ays_survey_width_by_percentage_px" name="ays_survey_width_by_percentage_px" class="ays-text-input ays-text-input-short ays_survey_aysDropdown" style="display:inline-block; width: 60px;">
                                    <option value="pixels" <?php echo $survey_width_by_percentage_px == "pixels" ? "selected" : ""; ?>>px</option>
                                    <option value="percentage" <?php echo $survey_width_by_percentage_px == "percentage" ? "selected" : ""; ?>>%</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- Survey width -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_mobile_width'>
                                <?php echo esc_html__('Survey mobile width', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the width of your survey in pixels or percentage for mobile devices.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-6 ays_divider_left ays_survey_display_flex_width">
                            <div>
                                <input type="number" class="ays-text-input" id='ays_survey_mobile_width' name='ays_survey_mobile_width' value="<?php echo esc_attr($survey_mobile_width); ?>"/>
                                <span style="display:block;" class="ays_survey_small_hint_text"><?php echo esc_html__("For 100% leave blank", "survey-maker"); ?></span>
                            </div>
                            <div class="ays_dropdown_max_width">
                                <select id="ays_survey_mobile_width_by_percentage_px" name="ays_survey_mobile_width_by_percentage_px" class="ays-text-input ays-text-input-short ays_survey_aysDropdown" style="display:inline-block; width: 60px;">
                                    <option value="pixels" <?php echo $survey_mobile_width_by_percentage_px == "pixels" ? "selected" : ""; ?>>px</option>
                                    <option value="percentage" <?php echo $survey_mobile_width_by_percentage_px == "percentage" ? "selected" : ""; ?>>%</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- Survey mobile width -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='<?php echo esc_attr($html_name_prefix); ?>mobile_max_width'>
                                <?php echo esc_html__('Survey max-width for mobile', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Survey container max-width for mobile in percentage. This option will work for the screens with less than 640 pixels width.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left ays_survey_display_flex_width">
                            <div>
                                <input type="number" class="ays-text-input" id='<?php echo esc_attr($html_name_prefix); ?>mobile_max_width'
                                name='<?php echo esc_attr($html_name_prefix); ?>mobile_max_width' style="display:inline-block;"
                                value="<?php echo esc_attr($survey_mobile_max_width); ?>"/> 
                                <span style="display:block;" class="ays_survey_small_hint_text"><?php echo esc_html__("For 100% leave blank", "survey-maker");?></span>
                            </div>
                            <div class="ays_dropdown_max_width">
                                <input type="text" value="%" class='ays-form-hint-for-size' disabled>
                            </div>
                        </div>
                    </div> <!-- Survey max-width for mobile -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label>
                                <?php echo esc_html__('Survey logo', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Add logo image for survey.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left ays_toggle_parent">
                            <div class="ays-survey-image-container">
                                <button class="button ays-survey-add-image" type="button"><?php echo esc_attr($survey_logo_text); ?></button>
                                <div class="ays-survey-image-body" style="<?php echo $survey_logo != '' ? '' : 'display: none;'; ?>">
                                    <div class="ays-survey-image-wrapper">
                                        <div class="ays-survey-image-wrapper-delete-wrap">
                                            <div role="button" class="ays-survey-image-wrapper-delete-cont removeImage">
                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close-grey.svg">
                                            </div>
                                        </div>
                                        <img class="ays-survey-img" src="<?php echo esc_url($survey_logo); ?>" tabindex="0" />
                                        <input type="hidden" class="ays-survey-img-src" name="<?php echo esc_attr($html_name_prefix); ?>survey_logo" value="<?php echo esc_attr($survey_logo); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row ays-survey-logo-url-box <?php echo esc_attr($survey_logo_check);?>">
                                <div class="col-sm-4">
                                    <label for="ays_survey_logo_enable_image_url">
                                        <?php echo esc_html__('Logo URL', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip"
                                        data-placement="top"
                                        title="<?php echo esc_html__("Add a URL link to the survey's logo image.", "survey-maker"); ?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>                                   
                                </div>
                                <div class="col-sm-8 ays_divider_left ">
                                    <input type="checkbox"
                                            name="ays_survey_logo_enable_image_url"
                                            id="ays_survey_logo_enable_image_url"
                                            value="on" class="ays_toggle ays_toggle_slide ays_toggle_checkbox" <?php echo esc_attr($survey_logo_image_url_checked); ?>>
                                    <label for="ays_survey_logo_enable_image_url" class="ays_switch_toggle"></label>                           
                                </div>
                            </div>
                            <hr class="ays_toggle_target <?php echo esc_attr($survey_logo_image_url_display); ?> ays-survey-logo-open-close">
                            <div class="row ays_toggle_target ays-survey-logo-open-close <?php echo esc_attr($survey_logo_image_url_display); ?>" style="padding:0 15px;" >
                                <input type="text"
                                        name="ays_survey_logo_image_url"
                                        id="ays_survey_logo_image_url"
                                        value="<?php echo esc_attr($survey_logo_image_url)?>" style="width: 100%;" class="ays-text-input" placeholder="URL">
                            </div>
                            <hr class="ays_toggle_target <?php echo esc_attr($survey_logo_image_url_display); ?> ays-survey-logo-open-close">
                            <div class="row ays_toggle_target ays-survey-logo-url-box ays-survey-logo-open-close" style="<?php echo $survey_logo_image_url_display ? "display: none;" : "display:flex;"?>">
                                <div class="col-sm-6">
                                    <label for="ays_survey_logo_enable_image_url_new_tab">
                                        <?php echo esc_html__('Open in a new tab', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip"
                                        data-placement="top"
                                        title="<?php echo esc_html__("Activate this option, if you want to open the URL in a new tab.", "survey-maker"); ?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label> 
                                </div>
                                <div class="col-sm-6 ays_divider_left">
                                    <input type="checkbox"
                                            name="ays_survey_logo_enable_image_url_new_tab"
                                            id="ays_survey_logo_enable_image_url_new_tab"
                                            value="on" class="ays_toggle ays_toggle_slide " <?php echo esc_attr($survey_logo_image_url_check_new_tab); ?>>
                                    <label for="ays_survey_logo_enable_image_url_new_tab" class="ays_switch_toggle"></label>
                                </div>
                            </div>
                            <hr class="<?php echo esc_attr($survey_logo_check); ?> ays-survey-logo-open">
                            <div class="row ays-survey-logo-url-box <?php echo esc_attr($survey_logo_check); ?>">
                                <div class="col-sm-4">
                                    <label for="ays_survey_survey_logo_pos">
                                        <?php echo esc_html__('Logo position', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip"
                                        data-placement="top"
                                        title="<?php echo esc_html__("Specify the position of the Logo image.", "survey-maker"); ?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label> 
                                </div>
                                <div class="col-sm-8 ays_divider_left">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for='<?php echo esc_attr($html_name_prefix); ?>survey_logo_pos'>
                                                <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the position of the Logo image for desktop devices.',"survey-maker")?>">
                                                    <i class="ays_fa ays_fa_info_circle"></i>
                                                </a>
                                            </label>
                                        </div>
                                        <div class="col-sm-7 ays_survey_display_flex_width">
                                            <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown ays-survey-text-input-full" id='<?php echo esc_attr($html_name_prefix); ?>survey_logo_pos' name='<?php echo esc_attr($html_name_prefix); ?>survey_logo_pos'>
                                                <option value="left"   <?php echo ($survey_logo_image_position == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                                <option value="center" <?php echo ($survey_logo_image_position == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                                <option value="right"  <?php echo ($survey_logo_image_position == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for='<?php echo esc_attr($html_name_prefix); ?>survey_logo_pos_mobile'>
                                                <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the position of the Logo image for Mobile devices.',"survey-maker")?>">
                                                    <i class="ays_fa ays_fa_info_circle"></i>
                                                </a>
                                            </label>
                                        </div>
                                        <div class="col-sm-7 ays_survey_display_flex_width">
                                            <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown ays-survey-text-input-full" id='<?php echo esc_attr($html_name_prefix); ?>survey_logo_pos_mobile' name='<?php echo esc_attr($html_name_prefix); ?>survey_logo_pos_mobile'>
                                                <option value="left"   <?php echo ($survey_logo_image_position_mobile == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                                <option value="center" <?php echo ($survey_logo_image_position_mobile == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                                <option value="right"  <?php echo ($survey_logo_image_position_mobile == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="<?php echo esc_attr($survey_logo_check); ?> ays-survey-logo-open">
                            <div class="row ays-survey-logo-url-box <?php echo esc_attr($survey_logo_check); ?>">
                                <div class="col-sm-4">
                                    <label for="ays_survey_logo_title">
                                        <?php echo esc_html__('Logo title', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip"
                                        data-placement="top"
                                        title="<?php echo esc_attr__("Specify the title of the Logo image.", "survey-maker"); ?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label> 
                                </div>
                                <div class="col-sm-8 ays_divider_left">
                                    <input type="text" class="ays-text-input" name="ays_survey_logo_title" id="ays_survey_logo_title" value="<?php echo esc_attr($survey_logo_title); ?>">
                                </div>
                            </div>
                        </div>
                    </div> <!-- Survey logo -->
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label>
                                <?php echo esc_html__('Survey cover photo', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Add cover photo for survey.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left ays_survey_cover_image_main">
                            <div class="ays-survey-image-container">
                                <button class="button ays-survey-add-cover-image" type="button"><?php echo esc_attr($survey_cover_photo_text); ?></button>
                                <div class="ays-survey-image-body" style="<?php echo $survey_cover_photo != '' ? '' : 'display: none;'; ?>">
                                    <div class="ays-survey-image-wrapper">
                                        <div class="ays-survey-image-wrapper-delete-wrap">
                                            <div role="button" class="ays-survey-image-wrapper-delete-cont ays-survey-image-remove removeCoverImage">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close-grey.svg">
                                                </div>
                                            </div>
                                        </div>
                                        <img class="ays-survey-cover-img" src="<?php echo esc_url($survey_cover_photo); ?>" tabindex="0" />
                                        <input type="hidden" class="ays-survey-cover-img-src" name="<?php echo esc_attr($html_name_prefix); ?>survey_cover_photo" value="<?php echo esc_attr($survey_cover_photo); ?>">
                                    </div>
                                </div>
                            </div>
                            <hr class="row ays-survey-cover-image-options-hr <?php echo $survey_cover_photo != '' ? '' : 'display_none_not_important'; ?>">
                            <div class="row ays-survey-cover-image-options <?php echo $survey_cover_photo != '' ? '' : 'display_none_not_important'; ?>">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_cover_image_height'>
                                        <?php echo esc_html__('Height', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the height of the survey cover image.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_divider_left">
                                    <input type="number" id="<?php echo esc_attr($html_name_prefix); ?>survey_cover_image_height" name="<?php echo esc_attr($html_name_prefix); ?>survey_cover_image_height" class="ays-text-input " value="<?php echo esc_attr($survey_cover_photo_height); ?>">
                                </div>
                            </div>
                            <hr class="row ays-survey-cover-image-options-hr <?php echo $survey_cover_photo != '' ? '' : 'display_none_not_important'; ?>">
                            <div class="row ays-survey-cover-image-options <?php echo $survey_cover_photo != '' ? '' : 'display_none_not_important'; ?>">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_cover_photo_mobile_height'>
                                        <?php echo esc_html__('Height on mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the height of the survey cover image for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_divider_left">
                                    <input type="number" id="<?php echo esc_attr($html_name_prefix); ?>survey_cover_photo_mobile_height" name="<?php echo esc_attr($html_name_prefix); ?>survey_cover_photo_mobile_height" class="ays-text-input " value="<?php echo esc_attr($survey_cover_photo_mobile_height); ?>">
                                </div>
                            </div>
                            <hr class="row ays-survey-cover-image-options-hr <?php echo $survey_cover_photo != '' ? '' : 'display_none_not_important'; ?>">
                            <div class="row ays-survey-cover-image-options survey_position_block <?php echo $survey_cover_photo != '' ? '' : 'display_none_not_important'; ?>">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_cover_image_height'>
                                        <?php echo esc_html__('Image Position', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the position of the survey cover image.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_divider_left">
                                        <table id="ays-survey-position-table">
                                        <tr>
                                            <td data-value="left_top" data-id="1" style="<?php echo $survey_cover_photo_position == "left_top" ? "background-color: #a2d6e7" : ""; ?>"></td>
                                            <td data-value="top_center" data-id="2" style="<?php echo $survey_cover_photo_position == "top_center" ? "background-color: #a2d6e7" : ""; ?>"></td>
                                            <td data-value="right_top" data-id="3" style="<?php echo $survey_cover_photo_position == "right_top" ? "background-color: #a2d6e7" : ""; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td data-value="left_center" data-id="4" style="<?php echo $survey_cover_photo_position == "left_center" ? "background-color: #a2d6e7" : ""; ?>"></td>
                                            <td data-value="center_center" data-id="5" style="<?php echo $survey_cover_photo_position == "center_center" ? "background-color: #a2d6e7" : ""; ?>"></td>
                                            <td data-value="right_center" data-id="6" style="<?php echo $survey_cover_photo_position == "right_center" ? "background-color: #a2d6e7" : ""; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td data-value="left_bottom" data-id="7" style="<?php echo $survey_cover_photo_position == "left_bottom" ? "background-color: #a2d6e7" : ""; ?>"></td>
                                            <td data-value="center_bottom" data-id="8" style="<?php echo $survey_cover_photo_position == "center_bottom" ? "background-color: #a2d6e7" : ""; ?>"></td>
                                            <td data-value="right_bottom" data-id="9" style="<?php echo $survey_cover_photo_position == "right_bottom" ? "background-color: #a2d6e7" : ""; ?>"></td>
                                        </tr>
                                    </table>
                                    <input type="hidden" name="<?php echo esc_attr($html_name_prefix); ?>survey_cover_image_pos" id="ays-survey-position-val" value="<?php echo esc_attr($survey_cover_photo_position); ?>" >
                                </div>
                            </div>
                            <hr class="row ays-survey-cover-image-options-hr <?php echo $survey_cover_photo != '' ? '' : 'display_none_not_important'; ?>">
                            <div class="row ays-survey-cover-image-options <?php echo $survey_cover_photo != '' ? '' : 'display_none_not_important'; ?>">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_cover_image_height'>
                                        <?php echo esc_html__('Image object-fit', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify how a survey cover image should be resized to fit its container.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_divider_left">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown ays-survey-text-input-full" id='<?php echo esc_attr($html_name_prefix); ?>survey_cover_image_object_fit' name='<?php echo esc_attr($html_name_prefix); ?>survey_cover_image_object_fit'>
                                        <option value="cover"   <?php echo ($survey_cover_photo_object_fit == 'cover')   ? 'selected' : ''; ?>><?php echo esc_html__('Cover',"survey-maker"); ?></option>
                                        <option value="contain" <?php echo ($survey_cover_photo_object_fit == 'contain') ? 'selected' : ''; ?>><?php echo esc_html__('Contain',"survey-maker"); ?></option>
                                        <option value="unset"   <?php echo ($survey_cover_photo_object_fit == 'unset')   ? 'selected' : ''; ?>><?php echo esc_html__('None',"survey-maker"); ?></option>                        
                                    </select>
                                </div>
                            </div>
                            <hr class="row ays-survey-cover-image-options-hr <?php echo $survey_cover_photo != '' ? '' : 'display_none_not_important'; ?>">
                            <div class="row ays-survey-cover-image-options <?php echo $survey_cover_photo != '' ? '' : 'display_none_not_important'; ?>">
                                <div class="col-sm-4">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_cover_only_first_section'>
                                        <?php echo esc_html__('Show only in the first section', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick this option to show the cover photo only for the first section.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-8 ays_divider_left ays_toggle_parent">
                                    <div>
                                        <input type="checkbox"
                                                name="<?php echo esc_attr($html_name_prefix); ?>survey_cover_only_first_section"
                                                id="<?php echo esc_attr($html_name_prefix); ?>survey_cover_only_first_section"
                                                value="on" class="ays_toggle ays_toggle_slide ays_toggle_checkbox" <?php echo ($survey_cover_only_first_section) ? "checked" : "" ?>>
                                        <label for="<?php echo esc_attr($html_name_prefix); ?>survey_cover_only_first_section" class="ays_switch_toggle"></label>                           
                                    </div>
                                </div>
                            </div> <!-- Show only in the first section -->
                        </div>
                    </div><!-- Survey Cover Image -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_alignment'>
                                <?php echo esc_html__('Survey title alignment', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the survey title.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_font_size'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the survey title for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id='<?php echo esc_attr($html_name_prefix); ?>survey_title_alignment' name='<?php echo esc_attr($html_name_prefix); ?>survey_title_alignment'>
                                        <option value="left"   <?php echo ($survey_title_alignment == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                        <option value="center" <?php echo ($survey_title_alignment == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                        <option value="right"  <?php echo ($survey_title_alignment == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_alignment_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the survey title alignment for Mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id='<?php echo esc_attr($html_name_prefix); ?>survey_title_alignment' name='<?php echo esc_attr($html_name_prefix); ?>survey_title_alignment_mobile'>
                                        <option value="left"   <?php echo ($survey_title_alignment_mobile == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                        <option value="center" <?php echo ($survey_title_alignment_mobile == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                        <option value="right"  <?php echo ($survey_title_alignment_mobile == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Survey title alignment -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_font_size'>
                                <?php echo esc_html__('Survey title font size', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the survey title.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_font_size'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the survey title for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='<?php echo esc_attr($html_name_prefix); ?>survey_title_font_size' name='<?php echo esc_attr($html_name_prefix); ?>survey_title_font_size' value="<?php echo esc_attr($survey_title_font_size); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_font_size_for_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the survey title for moblie devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='<?php echo esc_attr($html_name_prefix); ?>survey_title_font_size_for_mobile' name='<?php echo esc_attr($html_name_prefix); ?>survey_title_font_size_for_mobile' value="<?php echo esc_attr($survey_title_font_size_for_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> <!-- Survey title font size -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_title_letter_spacing'>
                                <?php echo esc_html__('Survey title letter spacing', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey title in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_title_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey title in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_title_letter_spacing'name='ays_survey_title_letter_spacing' value="<?php echo esc_attr($survey_title_letter_spacing); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_title_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey title in pixels for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_title_letter_spacing_mobile' name='ays_survey_title_letter_spacing_mobile' value="<?php echo esc_attr($survey_title_letter_spacing_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div> <!-- Survey title letter spacing -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_box_shadow_enable'>
                                <?php echo esc_html__('Survey title box shadow', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the text shadow of the survey title.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left ays_toggle_parent">
                            <div>
                                <input type="checkbox"
                                        name="<?php echo esc_attr($html_name_prefix); ?>survey_title_box_shadow_enable"
                                        id="<?php echo esc_attr($html_name_prefix); ?>survey_title_box_shadow_enable"
                                        value="on" class="ays_toggle ays_toggle_slide ays_toggle_checkbox" <?php echo ($survey_title_box_shadow_enable) ? "checked" : "" ?>>
                                <label for="<?php echo esc_attr($html_name_prefix); ?>survey_title_box_shadow_enable" class="ays_switch_toggle"></label>                           
                            </div>
                            <hr class="ays_toggle_target <?php echo ($survey_title_box_shadow_enable) ? '' : 'display_none_not_important'; ?>">
                            <div class="row ays_toggle_target <?php echo ($survey_title_box_shadow_enable) ? '' : 'display_none_not_important'; ?>" style="padding:0 15px;" >
                                <input type="text" class="ays-text-input" id='<?php echo esc_attr($html_name_prefix); ?>survey_title_box_shadow_color' data-alpha="true" name='<?php echo esc_attr($html_name_prefix); ?>survey_title_box_shadow_color' value="<?php echo esc_attr($survey_title_box_shadow_color); ?>"/>
                            </div>
                            <hr class="ays_toggle_target <?php echo ($survey_title_box_shadow_enable) ? '' : 'display_none_not_important'; ?>">
                            <div class="form-group row ays_toggle_target <?php echo ($survey_title_box_shadow_enable) ? '' : 'display_none_not_important'; ?>">
                                <div class="col-sm-12">
                                    <div class="col-sm-3" style="display: inline-block;">
                                        <span class="ays_survey_small_hint_text"><?php echo esc_html__('X', "survey-maker"); ?></span>
                                        <input type="number" class="ays-text-input ays-survey-text-input-90-width" id='<?php echo esc_attr($html_name_prefix); ?>title_text_shadow_x_offset' name='<?php echo esc_attr($html_name_prefix); ?>title_text_shadow_x_offset' value="<?php echo esc_attr($survey_title_text_shadow_x_offset); ?>" />
                                    </div>
                                    <div class="col-sm-3 ays_divider_left" style="display: inline-block;">
                                        <span class="ays_survey_small_hint_text"><?php echo esc_html__('Y', "survey-maker"); ?></span>
                                        <input type="number" class="ays-text-input ays-survey-text-input-90-width" id='<?php echo esc_attr($html_name_prefix); ?>title_text_shadow_y_offset' name='<?php echo esc_attr($html_name_prefix); ?>title_text_shadow_y_offset' value="<?php echo esc_attr($survey_title_text_shadow_y_offset); ?>" />
                                    </div>
                                    <div class="col-sm-3 ays_divider_left" style="display: inline-block;">
                                        <span class="ays_survey_small_hint_text"><?php echo esc_html__('Z', "survey-maker"); ?></span>
                                        <input type="number" class="ays-text-input ays-survey-text-input-90-width" id='<?php echo esc_attr($html_name_prefix); ?>title_text_shadow_z_offset' name='<?php echo esc_attr($html_name_prefix); ?>title_text_shadow_z_offset' value="<?php echo esc_attr($survey_title_text_shadow_z_offset); ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Survey title box shadow -->
                    <hr/>            
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_font_size'>
                                <?php echo esc_html__('Survey section title font size', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the section title.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_font_size'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the survey section title for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_font_size' name='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_font_size' value="<?php echo esc_attr($survey_section_title_font_size); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_font_size_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the survey section title for moblie devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_font_size_mobile' name='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_font_size_mobile' value="<?php echo esc_attr($survey_section_title_font_size_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div> <!-- Survey section title font size -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_alignment'>
                                <?php echo esc_html__('Survey section title alignment', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey title in pixels.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_title_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey title in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_alignment' name='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_alignment'>
                                        <option value="left"   <?php echo ($survey_section_title_alignment == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                        <option value="center" <?php echo ($survey_section_title_alignment == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                        <option value="right"  <?php echo ($survey_section_title_alignment == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_alignment_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey title in pixels for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_alignment_mobile' name='<?php echo esc_attr($html_name_prefix); ?>survey_section_title_alignment_mobile'>
                                        <option value="left"   <?php echo ($survey_section_title_alignment_mobile == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                        <option value="center" <?php echo ($survey_section_title_alignment_mobile == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                        <option value="right"  <?php echo ($survey_section_title_alignment_mobile == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Survey section title alignment -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_section_title_letter_spacing'>
                                <?php echo esc_html__('Survey section title letter spacing', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey section title in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_title_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey title in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_section_title_letter_spacing'name='ays_survey_section_title_letter_spacing' value="<?php echo esc_attr($survey_section_title_letter_spacing); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_title_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey title in pixels for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_section_title_letter_spacing_mobile' name='ays_survey_section_title_letter_spacing_mobile' value="<?php echo esc_attr($survey_section_title_letter_spacing_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Survey section title letter spacing -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_alignment'>
                                <?php echo esc_html__('Survey section description alignment', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the section description.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_title_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the section description desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_alignment' name='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_alignment'>
                                        <option value="left"   <?php echo ($survey_section_description_alignment == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                        <option value="center" <?php echo ($survey_section_description_alignment == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                        <option value="right"  <?php echo ($survey_section_description_alignment == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_title_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the section description for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_alignment_mobile' name='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_alignment_mobile'>
                                        <option value="left"   <?php echo ($survey_section_description_alignment_mobile == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                        <option value="center" <?php echo ($survey_section_description_alignment_mobile == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                        <option value="right"  <?php echo ($survey_section_description_alignment_mobile == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Survey section description alignment -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_font_size'>
                                <?php echo esc_html__('Survey section description font size', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the section description.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_font_size'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the section description for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_font_size' name='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_font_size' value="<?php echo esc_attr($survey_section_description_font_size); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_font_size_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the section description for moblie devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_font_size_mobile' name='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_font_size_mobile' value="<?php echo esc_attr($survey_section_description_font_size_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div> <!-- Survey section description font size -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_section_description_letter_spacing'>
                                <?php echo esc_html__('Survey section description letter spacing', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey section description in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_font_size'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey section description in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_section_description_letter_spacing'name='ays_survey_section_description_letter_spacing' value="<?php echo esc_attr($survey_section_description_letter_spacing); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey section description in pixels for moblie devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_letter_spacing_mobile' name='<?php echo esc_attr($html_name_prefix); ?>survey_section_description_letter_spacing_mobile' value="<?php echo esc_attr($survey_section_description_letter_spacing_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Survey title letter spacing -->
                </div>
            </div>
            <div class="ays-survey-collapsible-container">
                <div class="ays-survey-collapse-options">
                    <div><i class="ays_fa ays_fa_arrow_down ays-survey-collapse-options-button" data-rotation="false" style="font-size: 15px;"></i></div>
                    <div><p style="margin:0;font-size: 18px;font-weight: 500;cursor: pointer"><?php echo esc_html__('Question styles',"survey-maker"); ?></p></div>
                </div>
                <hr/>
                <div class="ays-survey-collapsible-options">
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_question_font_size'>
                                <?php echo esc_html__('Question font size', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the font size of the survey questions in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answer_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the font size of the survey questions in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_divider_left ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_question_font_size'name='ays_survey_question_font_size' value="<?php echo esc_attr($survey_question_font_size); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answer_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the font size of the survey questions in pixels for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_divider_left ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_question_font_size_mobile' name='ays_survey_question_font_size_mobile' value="<?php echo esc_attr($survey_question_font_size_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Question font size -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for="ays_survey_question_title_alignment">
                                <?php echo esc_html__('Question alignment',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the question title.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id="ays_survey_question_title_alignment" name="ays_survey_question_title_alignment">
                                <option value="left"   <?php echo ($survey_question_title_alignment == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                <option value="center" <?php echo ($survey_question_title_alignment == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                <option value="right"  <?php echo ($survey_question_title_alignment == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                            </select>
                        </div>
                    </div> <!-- Question title alignment -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label>
                                <?php echo esc_attr__('Question image styles',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Configure the sizing of your question image.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="ays_survey_question_image_width">
                                        <?php echo esc_html__('Image width',"survey-maker")?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Set the question image width in pixels.',"survey-maker"); ?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                    <div class="ays_survey_display_flex_width">
                                        <div>
                                            <input type="number" class="ays-text-input" id="ays_survey_question_image_width" name="ays_survey_question_image_width" value="<?php echo esc_attr($survey_question_image_width); ?>"/>
                                        </div>
                                        <div class="ays_dropdown_max_width">
                                            <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                        </div>
                                    </div>
                                    <span class="ays_survey_small_hint_text"><?php echo esc_html__("For 100% leave blank", "survey-maker"); ?></span>
                                </div>
                            </div>
                            <hr/>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="ays_survey_question_image_width_mobile">
                                        <?php echo esc_html__('Image width on mobile',"survey-maker")?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Set the question image width in pixels for mobile devices.',"survey-maker"); ?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                    <div class="ays_survey_display_flex_width">
                                        <div>
                                            <input type="number" class="ays-text-input" id="ays_survey_question_image_width_mobile" name="ays_survey_question_image_width_mobile" value="<?php echo esc_attr($survey_question_image_width_mobile); ?>"/>
                                        </div>
                                        <div class="ays_dropdown_max_width">
                                            <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                        </div>
                                    </div>
                                    <span class="ays_survey_small_hint_text"><?php echo esc_html__("For 100% leave blank", "survey-maker"); ?></span>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="ays_survey_question_image_height">
                                        <?php echo esc_html__('Image height',"survey-maker")?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Set the question height in pixels.',"survey-maker"); ?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                    <div class="ays_survey_display_flex_width">
                                        <div>
                                            <input type="number" class="ays-text-input" id="ays_survey_question_image_height" name="ays_survey_question_image_height" value="<?php echo esc_attr($survey_question_image_height); ?>"/>
                                        </div>
                                        <div class="ays_dropdown_max_width">
                                            <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="ays_survey_question_image_height_mobile">
                                        <?php echo esc_html__('Image height on mobile',"survey-maker")?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Set the question height in pixels for mobile devices.',"survey-maker"); ?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                    <div class="ays_survey_display_flex_width">
                                        <div>
                                            <input type="number" class="ays-text-input" id="ays_survey_question_image_height_mobile" name="ays_survey_question_image_height_mobile" value="<?php echo esc_attr($survey_question_image_height_mobile); ?>"/>
                                        </div>
                                        <div class="ays_dropdown_max_width">
                                            <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="ays_survey_question_image_sizing">
                                        <?php echo esc_html__('Image sizing', "survey-maker" ); ?>
                                        <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php
                                            echo esc_html(htmlspecialchars( sprintf(
                                                __('Configure the scales of the question images.',"survey-maker") . '<ul class="ays_help_ul"><li>' .
                                                __('%sCover:%s Resize the image so that it fills the whole container. The image may be trimmed to fit.',"survey-maker") . '</li><li>' .
                                                __('%sContain:%s Resize the image to be displayed fully.',"survey-maker") . '</li><li>' .
                                                __('%sNone:%s The image is not resized at all.',"survey-maker") . '</li><li>' .
                                                __('%sUnset:%s The variable does not exist.',"survey-maker") . '</li></ul>',
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
                                <div class="col-sm-8">
                                    <select name="ays_survey_question_image_sizing" id="ays_survey_question_image_sizing" class="ays-text-input ays-text-input-short ays_survey_aysDropdown" style="display:block;">
                                        <option value="cover" <?php echo $survey_question_image_sizing == 'cover' ? 'selected' : ''; ?>><?php echo esc_html__( "Cover", "survey-maker" ); ?></option>
                                        <option value="contain" <?php echo $survey_question_image_sizing == 'contain' ? 'selected' : ''; ?>><?php echo esc_html__( "Contain", "survey-maker" ); ?></option>
                                        <option value="none" <?php echo $survey_question_image_sizing == 'none' ? 'selected' : ''; ?>><?php echo esc_html__( "None", "survey-maker" ); ?></option>
                                        <option value="unset" <?php echo $survey_question_image_sizing == 'unset' ? 'selected' : ''; ?>><?php echo esc_html__( "Unset", "survey-maker" ); ?></option>
                                    </select>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="ays_survey_question_image_sizing_mobile">
                                        <?php echo esc_html__('Image sizing on mobile', "survey-maker" ); ?>
                                        <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php
                                            echo esc_html(htmlspecialchars( sprintf(
                                                __('Configure the scales of the question images for mobile devices.',"survey-maker") . '<ul class="ays_help_ul"><li>' .
                                                __('%sCover:%s Resize the image so that it fills the whole container. The image may be trimmed to fit.',"survey-maker") . '</li><li>' .
                                                __('%sContain:%s Resize the image to be displayed fully.',"survey-maker") . '</li><li>' .
                                                __('%sNone:%s The image is not resized at all.',"survey-maker") . '</li><li>' .
                                                __('%sUnset:%s The variable does not exist.',"survey-maker") . '</li></ul>',
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
                                <div class="col-sm-8">
                                    <select name="ays_survey_question_image_sizing_mobile" id="ays_survey_question_image_sizing_mobile" class="ays-text-input ays-text-input-short ays_survey_aysDropdown" style="display:block;">
                                        <option value="cover" <?php echo $survey_question_image_sizing_mobile == 'cover' ? 'selected' : ''; ?>><?php echo esc_html__( "Cover", "survey-maker" ); ?></option>
                                        <option value="contain" <?php echo $survey_question_image_sizing_mobile == 'contain' ? 'selected' : ''; ?>><?php echo esc_html__( "Contain", "survey-maker" ); ?></option>
                                        <option value="none" <?php echo $survey_question_image_sizing_mobile == 'none' ? 'selected' : ''; ?>><?php echo esc_html__( "None", "survey-maker" ); ?></option>
                                        <option value="unset" <?php echo $survey_question_image_sizing_mobile == 'unset' ? 'selected' : ''; ?>><?php echo esc_html__( "Unset", "survey-maker" ); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Questions Image Styles -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_question_padding'>
                                <?php echo esc_html__('Question padding', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the padding of the survey questions box in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_question_padding'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the padding of the survey questions box in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_question_padding' name='ays_survey_question_padding' value="<?php echo esc_attr($survey_question_padding); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_question_padding_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the padding of the survey questions box in pixels for moblie devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_question_padding_mobile' name='ays_survey_question_padding_mobile' value="<?php echo esc_attr($survey_question_padding_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Question padding -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_question_caption_text_color'>
                                <?php echo esc_html__('Question caption text color', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the color of the question caption texts.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_question_caption_text_color'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the color of the question caption texts for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <input type="text" class="ays-text-input" id='ays_survey_question_caption_text_color' data-alpha="true" name='ays_survey_question_caption_text_color' value="<?php echo esc_attr($survey_question_caption_text_color); ?>"/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_question_caption_text_color_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the color of the question caption texts for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <input type="text" class="ays-text-input" id='ays_survey_question_caption_text_color_mobile' data-alpha="true" name='ays_survey_question_caption_text_color_mobile' value="<?php echo esc_attr($survey_question_caption_text_color_mobile); ?>"/>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Question caption text color -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_question_caption_text_alignment'>
                                <?php echo esc_html__('Question caption text alignment', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the alignment of the question caption texts.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_question_caption_text_alignment'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the alignment of the question caption texts for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id="ays_survey_question_caption_text_alignment" name="ays_survey_question_caption_text_alignment">
                                        <option value="left"   <?php echo ($survey_question_caption_text_alignment == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                        <option value="center" <?php echo ($survey_question_caption_text_alignment == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                        <option value="right"  <?php echo ($survey_question_caption_text_alignment == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_question_caption_text_alignment_on_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the alignment of the question caption texts for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id="ays_survey_question_caption_text_alignment_on_mobile" name="ays_survey_question_caption_text_alignment_on_mobile">
                                        <option value="left"   <?php echo ($survey_question_caption_text_alignment_on_mobile == 'left')   ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                        <option value="center" <?php echo ($survey_question_caption_text_alignment_on_mobile == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                                        <option value="right"  <?php echo ($survey_question_caption_text_alignment_on_mobile == 'right')  ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Question caption text alignment -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_question_caption_font_size'>
                                <?php echo esc_html__('Question caption font size', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the font size of the question caption texts.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answers_gap'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the font size of the question caption texts for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_question_caption_font_size' name='ays_survey_question_caption_font_size' value="<?php echo esc_attr($survey_question_caption_font_size); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_buttons_alignment_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the font size of the question caption texts for mobile devices.', "survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_question_caption_font_size_on_mobile' name='ays_survey_question_caption_font_size_on_mobile' value="<?php echo esc_attr($survey_question_caption_font_size_on_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Question caption font size -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for="ays_survey_question_caption_text_transform">
                                <?php echo esc_html__('Question caption text transform',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the text transformation of question captions, such as converting to uppercase or lowercase.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_title_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the text transformation of question captions, such as converting to uppercase or lowercase for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown ays-survey-aysDropdown-answer-view " id="ays_survey_question_caption_text_transform" name="ays_survey_question_caption_text_transform">
                                        <option value="none" <?php echo ($survey_question_caption_text_transform == 'none') ? 'selected' : ''; ?>><?php echo esc_html__('Default',"survey-maker"); ?></option>
                                        <option value="capitalize" <?php echo ($survey_question_caption_text_transform == 'capitalize') ? 'selected' : ''; ?>><?php echo esc_html__('Capitalize',"survey-maker"); ?></option>
                                        <option value="uppercase" <?php echo ($survey_question_caption_text_transform == 'uppercase') ? 'selected' : ''; ?>><?php echo esc_html__('Uppercase',"survey-maker"); ?></option>
                                        <option value="lowercase" <?php echo ($survey_question_caption_text_transform == 'lowercase') ? 'selected' : ''; ?>><?php echo esc_html__('Lowercase',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_question_caption_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the text transformation of question captions, such as converting to uppercase or lowercase for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown ays-survey-aysDropdown-answer-view " id="ays_survey_question_caption_text_transform_mobile" name="ays_survey_question_caption_text_transform_mobile">
                                        <option value="none" <?php echo ($survey_question_caption_text_transform_mobile == 'none') ? 'selected' : ''; ?>><?php echo esc_html__('Default',"survey-maker"); ?></option>
                                        <option value="capitalize" <?php echo ($survey_question_caption_text_transform_mobile == 'capitalize') ? 'selected' : ''; ?>><?php echo esc_html__('Capitalize',"survey-maker"); ?></option>
                                        <option value="uppercase" <?php echo ($survey_question_caption_text_transform_mobile == 'uppercase') ? 'selected' : ''; ?>><?php echo esc_html__('Uppercase',"survey-maker"); ?></option>
                                        <option value="lowercase" <?php echo ($survey_question_caption_text_transform_mobile == 'lowercase') ? 'selected' : ''; ?>><?php echo esc_html__('Lowercase',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Question caption text transform -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_question_caption_letter_spacing'>
                                <?php echo esc_html__('Question caption letter spacing', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the question caption in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_title_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the suquestion caption in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_question_caption_letter_spacing'name='ays_survey_question_caption_letter_spacing' value="<?php echo esc_attr($survey_question_caption_letter_spacing); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_question_caption_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the question caption in pixels for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_question_caption_letter_spacing_mobile' name='ays_survey_question_caption_letter_spacing_mobile' value="<?php echo esc_attr($survey_question_caption_letter_spacing_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Answer letter spacing -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_question_caption_hide_on_mobile'>
                                <?php echo esc_html__('Question caption hide on mobile', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Tick this option to hide the caption text on mobile devices.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left ays_toggle_parent">
                            <div>
                                <input type="checkbox"
                                        name="<?php echo esc_attr($html_name_prefix); ?>survey_question_caption_hide_on_mobile"
                                        id="<?php echo esc_attr($html_name_prefix); ?>survey_question_caption_hide_on_mobile"
                                        value="on" class="ays_toggle ays_toggle_slide ays_toggle_checkbox" <?php echo ($survey_question_caption_hide_on_mobile) ? "checked" : "" ?>>
                                <label for="<?php echo esc_attr($html_name_prefix); ?>survey_question_caption_hide_on_mobile" style="margin: 0" class="ays_switch_toggle"></label>                           
                            </div>
                        </div>
                    </div> <!-- Answer letter spacing -->
                    <hr/>
                </div>
            </div>
            <div class="ays-survey-collapsible-container">
                <div class="ays-survey-collapse-options">
                    <div><i class="ays_fa ays_fa_arrow_down ays-survey-collapse-options-button" data-rotation="false" style="font-size: 15px;"></i></div>
                    <div><p style="margin:0;font-size: 18px;font-weight: 500;cursor: pointer"><?php echo esc_html__('Answer styles',"survey-maker"); ?></p></div>
                </div>
                <hr/>
                <div class="ays-survey-collapsible-options">
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_answer_font_size'>
                                <?php echo esc_html__('Answer font size', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the answers in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answer_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the answers in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_answer_font_size'name='ays_survey_answer_font_size' value="<?php echo esc_attr($survey_answer_font_size); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answer_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the font size of the answers in pixels for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_answer_font_size_on_mobile' name='ays_survey_answer_font_size_on_mobile' value="<?php echo esc_attr($survey_answer_font_size_on_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Answer font size -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for='ays_survey_answer_letter_spacing'>
                                <?php echo esc_html__('Answer letter spacing', "survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the answer in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answer_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the answer in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_answer_letter_spacing'name='ays_survey_answer_letter_spacing' value="<?php echo esc_attr($survey_answer_letter_spacing); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answer_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the answer in pixels for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_answer_letter_spacing_mobile' name='ays_survey_answer_letter_spacing_mobile' value="<?php echo esc_attr($survey_answer_letter_spacing_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Answer letter spacing -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for="ays_survey_answers_view">
                                <?php echo esc_html__('Answer view',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Arrange the answers by the following layouts. Note that if at least one of the answers has an image, the answers will be shown in a grid layout. In this case, it won’t matter if you have chosen the list layout.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown ays-survey-aysDropdown-answer-view" id="ays_survey_answers_view" name="ays_survey_answers_view">
                                <option value="list" <?php echo ($survey_answers_view == 'list') ? 'selected' : ''; ?>><?php echo esc_html__('List',"survey-maker"); ?></option>
                                <option value="grid" <?php echo ($survey_answers_view == 'grid') ? 'selected' : ''; ?>><?php echo esc_html__('Grid',"survey-maker"); ?></option>
                            </select>
                        </div>
                    </div> <!-- Answer view -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for="ays_survey_answers_view_alignment">
                                <?php echo esc_html__('Answer view alignment',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php
                                    echo esc_html(htmlspecialchars( sprintf(__('Specify the alignment of the answers',"survey-maker") . '
                                        <ul class="ays_help_ul">
                                            <li>' .__('%s Space around %s - Displays the answers with space before, between, and after the lines (Only for grid view).',"survey-maker") . '</li>
                                            <li>' .__('%s Space between %s - Displays the answers with space between the lines (Only for grid view).',"survey-maker") . '</li>
                                            <li>' .__('%s Left %s - Displays the answers at the beginning of the container.',"survey-maker") . '</li>
                                            <li>' .__('%s Right %s - Displays the answers at the end of the container.',"survey-maker") . '</li>
                                            <li>' .__('%s Center %s - Displays the answers at the center of the container.',"survey-maker") .'</li>
                                        </ul>',
                                        '<em>',
                                        '</em>',
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
                        <div class="col-sm-7 ays_divider_left ays-gagags">
                            <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown ays-survey-aysDropdown-answer-view-alignment" id="ays_survey_answers_view_alignment" name="ays_survey_answers_view_alignment" >
                                <?php if($survey_answers_view != 'list'): ?>
                                <option value="space-around" <?php echo ($survey_answers_view_alignment == 'space-around') ? 'selected' : ''; ?>><?php echo esc_html__('Space around',"survey-maker"); ?></option>
                                <option value="space-between" <?php echo ($survey_answers_view_alignment == 'space-between') ? 'selected' : ''; ?>><?php echo esc_html__('Space between',"survey-maker"); ?></option>                       
                                <?php endif;?>
                                <option value="flex-start" <?php echo ($survey_answers_view_alignment == 'flex-start') ? 'selected' : ''; ?>><?php echo esc_html__('Left',"survey-maker"); ?></option>
                                <option value="flex-end" <?php echo ($survey_answers_view_alignment == 'flex-end') ? 'selected' : ''; ?>><?php echo esc_html__('Right',"survey-maker"); ?></option>
                                <option value="center" <?php echo ($survey_answers_view_alignment == 'center') ? 'selected' : ''; ?>><?php echo esc_html__('Center',"survey-maker"); ?></option>
                            </select>
                        </div>
                    </div> <!-- Answer view alignment-->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for="ays_survey_answers_object_fit">
                                <?php echo esc_html__('Answer image sizing',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" data-html="true" title="<?php
                                    echo esc_html(htmlspecialchars( sprintf(
                                        __('Define the size of the images added to the answers. Choose from the following properties:',"survey-maker") . '<ul class="ays_help_ul"><li>' .
                                        __('%sCover:%s Resize the image to cover the whole container. The image may be trimmed to fit.',"survey-maker") . '</li><li>' .
                                        __('%sFill:%s Resize the image to cover the whole container. The image may be stretched to fit.',"survey-maker") . '</li><li>' .
                                        __('%sContain:%s Resize the image to be displayed fully.',"survey-maker") . '</li><li>' .
                                        __('%sUnset:%s Rescale the image to be smaller than contain or none.',"survey-maker") . '</li><li>' .
                                        __('%sNone:%s The image is not resized.',"survey-maker") . '</li></ul>',
                                        '<em>',
                                        '</em>',
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
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answers_object_fit'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the size of the images added to the answers for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id="ays_survey_answers_object_fit" name="ays_survey_answers_object_fit">
                                        <option value="cover" <?php echo ($survey_answers_object_fit == 'cover') ? 'selected' : ''; ?>><?php echo esc_html__('Cover',"survey-maker"); ?></option>
                                        <option value="fill" <?php echo ($survey_answers_object_fit == 'fill') ? 'selected' : ''; ?>><?php echo esc_html__('Fill',"survey-maker"); ?></option>
                                        <option value="contain" <?php echo ($survey_answers_object_fit == 'contain') ? 'selected' : ''; ?>><?php echo esc_html__('Contain',"survey-maker"); ?></option>
                                        <option value="scale-down" <?php echo ($survey_answers_object_fit == 'scale-down') ? 'selected' : ''; ?>><?php echo esc_html__('Scale-down',"survey-maker"); ?></option>
                                        <option value="none" <?php echo ($survey_answers_object_fit == 'none') ? 'selected' : ''; ?>><?php echo esc_html__('None',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answers_object_fit_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the size of the images added to the answers for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <select class="ays-text-input ays-text-input-short ays_survey_aysDropdown" id="ays_survey_answers_object_fit_mobile" name="ays_survey_answers_object_fit_mobile">
                                        <option value="cover" <?php echo ($survey_answers_object_fit_mobile == 'cover') ? 'selected' : ''; ?>><?php echo esc_html__('Cover',"survey-maker"); ?></option>
                                        <option value="fill" <?php echo ($survey_answers_object_fit_mobile == 'fill') ? 'selected' : ''; ?>><?php echo esc_html__('Fill',"survey-maker"); ?></option>
                                        <option value="contain" <?php echo ($survey_answers_object_fit_mobile == 'contain') ? 'selected' : ''; ?>><?php echo esc_html__('Contain',"survey-maker"); ?></option>
                                        <option value="scale-down" <?php echo ($survey_answers_object_fit_mobile == 'scale-down') ? 'selected' : ''; ?>><?php echo esc_html__('Scale-down',"survey-maker"); ?></option>
                                        <option value="none" <?php echo ($survey_answers_object_fit_mobile == 'none') ? 'selected' : ''; ?>><?php echo esc_html__('None',"survey-maker"); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Answer Object fit -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for="ays_survey_answers_padding">
                                <?php echo esc_html__('Answer padding',"survey-maker"); ?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the distance between the text and the border of the answer box in pixels.',"survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answer_letter_spacing'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the distance between the text and the border of the answer box in pixels for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_answers_padding' name='ays_survey_answers_padding' value="<?php echo esc_attr($survey_answers_padding); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answer_letter_spacing_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the distance between the text and the border of the answer box in pixels for mobile devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_answers_padding_mobile' name='ays_survey_answers_padding_mobile' value="<?php echo esc_attr($survey_answers_padding_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Answer padding -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for="ays_survey_answers_gap">
                                <?php echo esc_html__('Answer gap',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the gap size between answers in pixels.', "survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answers_gap'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the gap size between answers in pixels desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_answers_gap' name='ays_survey_answers_gap' value="<?php echo esc_attr($survey_answers_gap); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answers_gap_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the gap size between answers in pixels for mobile devices.', "survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_answers_gap_mobile' name='ays_survey_answers_gap_mobile' value="<?php echo esc_attr($survey_answers_gap_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Answers gap -->
                    <hr/>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label for="ays_survey_answers_image_size">
                                <?php echo esc_html__('Answer image size',"survey-maker")?>
                                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the size of answers image in pixels.', "survey-maker"); ?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                            </label>
                        </div>
                        <div class="col-sm-7 ays_divider_left">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answers_image_size'>
                                        <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the size of answers image in pixels for desktop devices.',"survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_answers_image_size' name='ays_survey_answers_image_size' value="<?php echo esc_attr($survey_answers_image_size); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answers_gap_mobile'>
                                        <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                        <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the size of answers image in pixels for mobile devices.', "survey-maker")?>">
                                            <i class="ays_fa ays_fa_info_circle"></i>
                                        </a>
                                    </label>
                                </div>
                                <div class="col-sm-7 ays_survey_display_flex_width">
                                    <div>
                                        <input type="number" class="ays-text-input" id='ays_survey_answers_image_size_mobile' name='ays_survey_answers_image_size_mobile' value="<?php echo esc_attr($survey_answers_image_size_mobile); ?>"/>
                                    </div>
                                    <div class="ays_dropdown_max_width">
                                        <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Answers image size -->
                    <hr/>                
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-sm-12 ays_divider_left" style="position:relative;"></div> <!-- Live preview container -->
    </div>
    <hr/>
    <div class="ays-survey-collapsible-container">
        <div class="ays-survey-collapse-options">
            <div><i class="ays_fa ays_fa_arrow_down ays-survey-collapse-options-button" data-rotation="false" style="font-size: 15px;"></i></div>
            <div><p style="margin:0;font-size: 18px;font-weight: 500;cursor: pointer"><?php echo esc_html__('Button  styles',"survey-maker"); ?></p></div>
        </div>
        <hr/>
        <div class="ays-survey-collapsible-options">
        <div class="form-group row"> <!-- Buttons Styles -->
            <div class="col-lg-7 col-sm-12">
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for='ays_survey_button_bg_color'>
                            <?php echo esc_html__('Button background color', "survey-maker"); ?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the color of the survey buttons.',"survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-7 ays_divider_left">
                        <input type="text" class="ays-text-input" id='ays_survey_button_bg_color' name='ays_survey_button_bg_color' data-alpha="true" value="<?php echo esc_attr($survey_buttons_bg_color); ?>"/>
                    </div>
                </div> <!-- Button Background Color -->
                <hr/>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for='ays_survey_buttons_text_color'>
                            <?php echo esc_html__('Button text color', "survey-maker"); ?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the color of the button texts.',"survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-7 ays_divider_left">
                        <input type="text" class="ays-text-input" id='ays_survey_buttons_text_color' data-alpha="true" name='ays_survey_buttons_text_color' value="<?php echo esc_attr($survey_buttons_text_color); ?>"/>
                    </div>
                </div> <!-- Buttons text Color -->
                <hr>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for="ays_survey_buttons_size">
                            <?php echo esc_html__('Button size',"survey-maker")?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the size of the buttons in your survey.',"survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-7 ays_divider_left">
                        <select class="ays-text-input ays-text-input-short" id="ays_survey_buttons_size" name="ays_survey_buttons_size">
                            <option value="small" <?php echo ($survey_buttons_size == 'small') ? 'selected' : ''; ?>>
                                <?php echo esc_html__('Small',"survey-maker"); ?>
                            </option>
                            <option value="medium" <?php echo ( ($survey_buttons_size == 'medium') || !isset($options['survey_buttons_size']) ) ? 'selected' : ''; ?>>
                                <?php echo esc_html__('Medium',"survey-maker"); ?>
                            </option>
                            <option value="large" <?php echo ($survey_buttons_size == 'large') ? 'selected' : ''; ?>>
                                <?php echo esc_html__('Large',"survey-maker"); ?>
                            </option>
                        </select>
                    </div>
                </div> <!-- Button size -->
                <hr>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for='ays_survey_buttons_font_size'>
                            <?php echo esc_html__('Button font-size', "survey-maker"); ?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the buttons.',"survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-7 ays_divider_left">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answers_gap'>
                                    <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                    <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the buttons for desktop devices.',"survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-7 ays_survey_display_flex_width">
                                <div>
                                    <input type="number" class="ays-text-input" id='ays_survey_buttons_font_size' name='ays_survey_buttons_font_size' value="<?php echo esc_attr($survey_buttons_font_size); ?>"/>
                                </div>
                                <div class="ays_dropdown_max_width">
                                    <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_buttons_alignment_mobile'>
                                    <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                    <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the buttons for mobile devices.', "survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-7 ays_survey_display_flex_width">
                                <div>
                                    <input type="number" class="ays-text-input" id='ays_survey_buttons_mobile_font_size' name='ays_survey_buttons_mobile_font_size' value="<?php echo esc_attr($survey_buttons_mobile_font_size); ?>"/>
                                </div>
                                <div class="ays_dropdown_max_width">
                                    <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Buttons font size -->
                <hr>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for="ays_survey_buttons_left_right_padding">
                            <?php echo esc_html__('Button padding',"survey-maker")?> (px)
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the distance between the text and the border of the buttons in pixels.',"survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-7 ays_divider_left" style="padding-left: 0;">
                        <div class="col-sm-5" style="display: inline-block;">
                            <span class="ays_survey_small_hint_text"><?php echo esc_html__('Left / Right',"survey-maker"); ?></span>
                            <input type="number" class="ays-text-input" id='ays_survey_buttons_left_right_padding' name='ays_survey_buttons_left_right_padding' value="<?php echo esc_attr($survey_buttons_left_right_padding); ?>" style="width: 100px;" />
                        </div>
                        <div class="col-sm-5 ays_divider_left" style="display: inline-block;">
                            <span class="ays_survey_small_hint_text"><?php echo esc_html__('Top / Bottom',"survey-maker"); ?></span>
                            <input type="number" class="ays-text-input" id='ays_survey_buttons_top_bottom_padding' name='ays_survey_buttons_top_bottom_padding' value="<?php echo esc_attr($survey_buttons_top_bottom_padding); ?>" style="width: 100px;" />
                        </div>
                    </div>
                </div> <!-- Buttons padding -->
                <hr>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for="ays_survey_buttons_border_radius">
                            <?php echo esc_html__('Button border-radius',"survey-maker")?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Make the corners of the buttons rounder by setting a pixel value.',"survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-7 ays_divider_left">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for='<?php echo esc_attr($html_name_prefix); ?>survey_buttons_top_distance'>
                                    <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                    <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__("Make the corners of the buttons rounder by setting a pixel value for desktop devices.","survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-7 ays_survey_display_flex_width">
                                <div>
                                    <input type="number" class="ays-text-input" id="ays_survey_buttons_border_radius" name="ays_survey_buttons_border_radius" value="<?php echo esc_attr($survey_buttons_border_radius); ?>"/>
                                </div>
                                <div class="ays_dropdown_max_width">
                                    <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for='<?php echo esc_attr($html_name_prefix); ?>survey_buttons_border_radius_mobile'>
                                    <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                    <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__("Make the corners of the buttons rounder by setting a pixel value for mobile devices.", "survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-7 ays_survey_display_flex_width">
                                <div>
                                    <input type="number" class="ays-text-input" id="ays_survey_buttons_border_radius_mobile" name="ays_survey_buttons_border_radius_mobile" value="<?php echo esc_attr($survey_buttons_border_radius_mobile); ?>"/>
                                </div>
                                <div class="ays_dropdown_max_width">
                                    <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Buttons border radius -->
                <hr>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for="ays_survey_buttons_alignment">
                            <?php echo esc_html__('Button alignment',"survey-maker")?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the buttons in your survey.',"survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-7 ays_divider_left">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for='<?php echo esc_attr($html_name_prefix); ?>survey_answers_gap'>
                                    <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                    <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the buttons for desktop devices.',"survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-7 ays_survey_display_flex_width">
                                <select class="ays-text-input ays-text-input-short" id="ays_survey_buttons_alignment" name="ays_survey_buttons_alignment">
                                    <option value="left" <?php echo ($survey_buttons_alignment == 'left' ) ? 'selected' : ''; ?>>
                                        <?php echo esc_html__('Left',"survey-maker"); ?>
                                    </option>
                                    <option value="center" <?php echo ( $survey_buttons_alignment == 'center' ) ? 'selected' : ''; ?>>
                                        <?php echo esc_html__('Center',"survey-maker"); ?>
                                    </option>
                                    <option value="right" <?php echo ($survey_buttons_alignment == 'right') ? 'selected' : ''; ?>>
                                        <?php echo esc_html__('Right',"survey-maker"); ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for='<?php echo esc_attr($html_name_prefix); ?>ays_survey_buttons_alignment_mobile'>
                                    <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                    <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Specify the alignment of the buttons for mobile devices.', "survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-7 ays_survey_display_flex_width">
                                <select class="ays-text-input ays-text-input-short" id="ays_survey_buttons_alignment_mobile" name="ays_survey_buttons_alignment_mobile">
                                    <option value="left" <?php echo ($survey_buttons_alignment_mobile == 'left' ) ? 'selected' : ''; ?>>
                                        <?php echo esc_html__('Left',"survey-maker"); ?>
                                    </option>
                                    <option value="center" <?php echo ( $survey_buttons_alignment_mobile == 'center' ) ? 'selected' : ''; ?>>
                                        <?php echo esc_html__('Center',"survey-maker"); ?>
                                    </option>
                                    <option value="right" <?php echo ($survey_buttons_alignment_mobile == 'right') ? 'selected' : ''; ?>>
                                        <?php echo esc_html__('Right',"survey-maker"); ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div> <!-- Buttons alignment -->
                <hr>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for='ays_survey_buttons_top_distance'>
                            <?php echo esc_html__('Buttons top distance', "survey-maker"); ?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__("Specify the button's distance from the top in pixels.","survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-7 ays_divider_left">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for='<?php echo esc_attr($html_name_prefix); ?>survey_buttons_top_distance'>
                                    <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                    <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__("Specify the button's distance from the top in pixels for desktop devices.","survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-7 ays_survey_display_flex_width">
                                <div>
                                    <input type="number" class="ays-text-input" id='ays_survey_buttons_top_distance' name='ays_survey_buttons_top_distance' value="<?php echo esc_attr($survey_buttons_top_distance); ?>"/>
                                </div>
                                <div class="ays_dropdown_max_width">
                                    <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for='<?php echo esc_attr($html_name_prefix); ?>survey_buttons_alignment_mobile'>
                                    <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                    <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__("Specify the button's distance from the top in pixels for mobile devices.", "survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-7 ays_survey_display_flex_width">
                                <div>
                                    <input type="number" class="ays-text-input" id='ays_survey_buttons_top_distance_mobile' name='ays_survey_buttons_top_distance_mobile' value="<?php echo esc_attr($survey_buttons_top_distance_mobile); ?>"/>
                                </div>
                                <div class="ays_dropdown_max_width">
                                    <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div> <!-- Buttons top distance -->
                <hr>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for='ays_survey_buttons_text_letter_spacing'>
                            <?php echo esc_html__('Buttons text letter spacing', "survey-maker"); ?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey buttons texts in pixels.',"survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-7 ays_divider_left">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for='<?php echo esc_attr($html_name_prefix); ?>survey_title_letter_spacing'>
                                    <?php echo esc_html__('On desktop', "survey-maker"); ?>
                                    <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey buttons texts in pixels desktop devices.',"survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-7 ays_divider_left ays_survey_display_flex_width">
                                <div>
                                    <input type="number" class="ays-text-input" id='ays_survey_buttons_text_letter_spacing'name='ays_survey_buttons_text_letter_spacing' value="<?php echo esc_attr($survey_buttons_text_letter_spacing); ?>"/>
                                </div>
                                <div class="ays_dropdown_max_width">
                                    <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for='<?php echo esc_attr($html_name_prefix); ?>survey_buttons_text_letter_spacing_mobile'>
                                    <?php echo esc_html__('On mobile', "survey-maker"); ?>
                                    <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Define the space between the letters of the survey buttons texts in pixels for mobile devices.',"survey-maker")?>">
                                        <i class="ays_fa ays_fa_info_circle"></i>
                                    </a>
                                </label>
                            </div>
                            <div class="col-sm-7 ays_survey_display_flex_width">
                                <div>
                                    <input type="number" class="ays-text-input" id='ays_survey_buttons_text_letter_spacing_mobile' name='ays_survey_buttons_text_letter_spacing_mobile' value="<?php echo esc_attr($survey_buttons_text_letter_spacing_mobile); ?>"/>
                                </div>
                                <div class="ays_dropdown_max_width">
                                    <input type="text" value="px" class='ays-form-hint-for-size' disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Buttons text letter spacing -->
                <hr>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label for="ays_survey_custom_class">
                            <?php echo esc_html__('Custom class for survey container',"survey-maker")?>
                            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Use your custom HTML class for adding your custom styles to the survey container.',"survey-maker"); ?>">
                                <i class="ays_fa ays_fa_info_circle"></i>
                            </a>
                        </label>
                    </div>
                    <div class="col-sm-7 ays_divider_left">
                        <input type="text" class="ays-text-input" name="ays_survey_custom_class" id="ays_survey_custom_class" placeholder="myClass myAnotherClass..." value="<?php echo esc_attr($survey_custom_class); ?>">
                    </div>
                </div> <!-- Custom class for quiz container -->
                <hr/>
            </div>
            <hr/>
            <div class="col-lg-5 col-sm-12 ays_divider_left" style="position:relative;">
                <div id="ays_buttons_styles_tab" class="display_none" style="position:sticky;top:50px; margin:auto;">
                    <div class="ays_buttons_div" style="justify-content: center; overflow:hidden;">
                        <input type="button" name="next" class="action-button ays-quiz-live-button" style="padding:0;" value="<?php echo esc_attr__( "Start", "survey-maker" ); ?>">
                    </div>
                </div>
            </div> <!-- Buttons Styles Live -->
        </div> <!-- Buttons Styles End -->
        <hr/>                
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <label for="ays_survey_custom_css">
                <?php echo esc_html__('Custom CSS',"survey-maker"); ?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Enter your own CSS code.',"survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-9">
        	<textarea class="ays-textarea" id="ays_survey_custom_css" name="ays_survey_custom_css" cols="30" rows="10"><?php echo esc_html($survey_custom_css); ?></textarea>
        </div>
    </div> <!-- Custom CSS -->
    <hr>
    <div class="form-group row">
        <div class="col-sm-3">
            <label for="ays_survey_custom_class">
                <?php echo esc_html__('Reset styles',"survey-maker")?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Reset styles to default values',"survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-9 ays_divider_left">
            <button class="ays-button button-secondary ays-survey-reset-styles-button"><?php echo esc_html__('Reset',"survey-maker"); ?></button>
        </div>
    </div> <!-- Reset styles -->
</div>
