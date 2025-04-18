<?php echo html_entity_decode(esc_html( $survey_colors )); ?>
<div id="tab1" class="m2 ays-survey-tab-content <?php echo ($ays_tab == 'tab1') ? 'ays-survey-tab-content-active' : ''; ?>">
    <div class="form-group row">
        <div class="col-sm-12 col-lg-11">
            <div class="form-group row">
                <div class="col-sm-6">
                    <p class="ays-subtitle"><?php echo esc_html__('General Settings',"survey-maker")?></p>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex align-items-end justify-content-end w-100 h-100">
                        <span style="font-size: 12px; font-style: italic;color: #9f9f9f;">These features are available only in PRO version.</span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="d-flex align-items-end justify-content-end w-100 h-100 flex-wrap" style="gap: 10px">
                    <?php if(isset($survey_main_url) && $survey_main_url != ''): ?>
                        <a data-toggle="tooltip" title="<?php echo esc_attr__("After clicking on the View button you will be redirected to the particular survey link.","survey-maker");?>" href="<?php echo $survey_main_url != '' ? esc_url($survey_main_url) : 'javascript:void(0)'; ?>" target="<?php echo $survey_main_url != '' ? '_blank' : ''; ?>" type="button" class="button button-primary">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span style="margin-left: 5px;"><?php echo esc_html__( 'View', "survey-maker" ); ?></span>
                        </a>
                    <?php endif; ?>
                    <button type="button" style="background-color: #005AE0; border-color: #005AE0;" class="button button-primary ays-survey-open-templates-modal"><?php echo esc_html__("Survey templates" , "survey-maker")?></button>
                    <a data-toggle="tooltip" title="<?php echo esc_attr__('All the previously created questions from other surveys are collected in the Question Library. You can make use of them in your current survey.',"survey-maker");?>" href="https://ays-pro.com/wordpress/survey-maker" target="_blank" type="button" class="button button-primary" style="opacity: 0.5; background-color: white; color: #2271b1"><?php echo esc_html__( 'Questions library', "survey-maker" ); ?></a>
                    <a data-toggle="tooltip" title="<?php echo esc_attr__('Import questions to your survey in the .xlsx file format. The file can include questions, answers and types.',"survey-maker");?>" href="#" type="button" class="button button-primary ays-survey-question-actions-pro-button" data-video-url="https://www.youtube.com/watch?v=l3iCnRzeUsQ" data-option-title="<?php echo esc_html__('Import Questions',"survey-maker")?>" data-option-text="If you already have the necessary questions for your survey and want <strong> to save time </strong>, use the “Import Questions” option. <strong> Import the. XLSX file </strong> with the questions, question types, and answers where needed into your survey dashboard and customize it according to your needs and desires. To better understand what formatting your. XLSX file requires <strong> download an example </strong> to avoid any confusion or difficulty.  " style="opacity: 0.5;background-color: white; color: #2271b1"><?php echo esc_html__("Import questions" ,  "survey-maker")?></a>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <p class="m-0 text-right">
                        <a class="ays-survey-collapse-all" href="javascript:void(0);"><?php echo esc_html__( "Collapse All", "survey-maker" ); ?></a>
                        <span>|</span>
                        <a class="ays-survey-expand-all" href="javascript:void(0);"><?php echo esc_html__( "Expand All", "survey-maker" ); ?></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="form-group row ays-survey-max-inp-vars-tabs-box display_none">
        <div class="col-sm-12">
            <div class="ays-survey-max-inp-vars-header-content">
            <div class="ays-survey-max-inp-vars-header-image-content">
                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/warning.png">
            </div>
            <div class="ays-survey-max-inp-vars-header-text-content ays-survey-max-inp-vars-texts-content"></div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="form-group row">
        <div class="col-sm-12 col-lg-11">
            <div class="ays-survey-sections-conteiner">
            <?php
            if(empty($sections_ids)){
                ?>
                <div class="ays-survey-section-box ays-survey-new-section" data-name="<?php echo esc_attr($html_name_prefix); ?>section_add" data-id="1">
                    <input type="hidden" class="ays-survey-section-collapsed-input" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][options][collapsed]" value="expanded">
                    <div class="ays-survey-section-wrap-collapsed display_none">
                        <div class="ays-survey-section-head-wrap">
                            <div class="ays-survey-section-head-top <?php echo $multiple_sections ? '' : 'display_none'; ?>">
                                <div class="ays-survey-section-counter">
                                    <span>
                                        <span><?php echo esc_html__( 'Section', "survey-maker" ); ?></span>
                                        <span class="ays-survey-section-number"><?php echo 1; ?></span>
                                        <span><?php echo esc_html__( 'of', "survey-maker" ); ?></span>
                                        <span class="ays-survey-sections-count"><?php echo 1; ?></span>
                                    </span>
                                </div>
                            </div>
                            <div class="ays-survey-section-head">
                                <div class="ays-survey-section-dlg-dragHandle">
                                    <div class="ays-survey-icons">
                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                    </div>
                                </div>
                                <div class="ays-survey-section-wrap-collapsed-contnet">
                                <div class="ays-survey-action-questions-count appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Questions count',"survey-maker")?>"><span>1</span></div>
                                    <div class="ays-survey-section-wrap-collapsed-contnet-text"></div>
                                    <div>
                                        <div class="ays-survey-action-expand-section appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Expand section',"survey-maker")?>">
                                            <div class="ays-section-img-icon-content">
                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/expand-section.svg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ays-survey-answer-icon-box ays-survey-section-actions-more dropdown">
                                    <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                        <div class="ays-question-img-icon-content">
                                            <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button type="button" class="dropdown-item ays-survey-delete-section display_none"><?php echo esc_html__( 'Delete section', "survey-maker" ); ?></button>
                                        <button type="button" class="dropdown-item ays-survey-duplicate-section"><?php echo esc_html__( 'Duplicate section', "survey-maker" ); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ays-survey-section-wrap-expanded">
                        <div class="ays-survey-section-head-wrap">
                            <div class="ays-survey-section-head-top display_none">
                                <div class="ays-survey-section-counter">
                                    <span>
                                        <span><?php echo esc_html__( 'Section', "survey-maker" ); ?></span>
                                        <span class="ays-survey-section-number">1</span>
                                        <span><?php echo esc_html__( 'of', "survey-maker" ); ?></span>
                                        <span class="ays-survey-sections-count">1</span>
                                    </span>
                                </div>
                            </div>
                            <div class="ays-survey-section-head">
                                <!--  Section Title Start  -->
                                <div class="ays-survey-section-title-conteiner">
                                    <input type="text" class="ays-survey-section-title ays-survey-input" tabindex="0" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][title]" placeholder="<?php echo esc_attr__( 'Section title' , "survey-maker" ); ?>" value=""/>
                                    <div class="ays-survey-input-underline"></div>
                                    <div class="ays-survey-input-underline-animation"></div>
                                </div>
                                <!--  Section Title End  -->

                                <!--  Section Description Start  -->
                                <div class="ays-survey-section-description-conteiner">
                                    <textarea class="ays-survey-section-description ays-survey-input" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][description]" placeholder="<?php echo esc_attr__( 'Section Description' , "survey-maker" ); ?>"></textarea>
                                    <div class="ays-survey-input-underline"></div>
                                    <div class="ays-survey-input-underline-animation"></div>
                                </div>
                                <!--  Section Description End  -->

                                <div class="ays-survey-section-actions">
                                <div class="ays-survey-action-questions-count appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Questions count',"survey-maker")?>"><span>1</span></div>
                                    <div class="ays-survey-action-collapse-section appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Collapse section',"survey-maker")?>">
                                        <div class="ays-question-img-icon-content">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/collapse-section.svg">
                                        </div>
                                    </div>
                                    <div class="ays-survey-answer-icon-box ays-survey-section-actions-more dropdown">
                                        <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                    <div class="ays-survey-icons">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button type="button" class="dropdown-item ays-survey-collapse-section-questions"><?php echo esc_html__( 'Collapse section questions', "survey-maker" ); ?></button>
                                            <input type="checkbox" hidden class="make-questions-required-checkbox">
                                            <button type="button" class="dropdown-item ays-survey-section-questions-required" data-flag="off"><?php echo esc_html__( 'Make questions required', "survey-maker" ); ?> <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/done.svg" class="ays-survey-required-section-img"></button>
                                            <button type="button" class="dropdown-item ays-survey-delete-section display_none"><?php echo esc_html__( 'Delete section', "survey-maker" ); ?></button>
                                            <button type="button" class="dropdown-item ays-survey-duplicate-section"><?php echo esc_html__( 'Duplicate section', "survey-maker" ); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="ays-survey-section-ordering" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][ordering]" value="1">
                        </div>
                        <div class="ays-survey-section-body">
                            <div class="ays-survey-section-questions">
                                <div class="ays-survey-question-answer-conteiner ays-survey-new-question" data-name="questions_add" data-id="1">
                                    <input type="hidden" class="ays-survey-question-collapsed-input" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][collapsed]" value="expanded">
                                    <div class="ays-survey-question-wrap-collapsed display_none">
                                        <div class="ays-survey-question-dlg-dragHandle">
                                            <div class="ays-survey-icons ays-survey-icons-hidden">
                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-horizontal.svg">
                                            </div>
                                        </div>
                                        <div class="ays-survey-question-wrap-collapsed-contnet ays-survey-question-wrap-collapsed-contnet-box">
                                            <div class="ays-survey-question-wrap-collapsed-contnet-text"></div>
                                            <div>
                                                <div class="ays-survey-action-expand-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Expand question',"survey-maker")?>">
                                                    <div class="ays-question-img-icon-content">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/expand-section.svg">
                                                    </div>
                                                </div>
                                                <div class="ays-survey-answer-icon-box ays-survey-question-more-actions droptop ">
                                                    <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                                        <div class="ays-question-img-icon-content">
                                                            <div class="ays-question-img-icon-content-div">
                                                                <div class="ays-survey-icons">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="move-to-section"><?php echo esc_html__( 'Move to section', "survey-maker" ); ?></button>
                                                        <button type="button" class="dropdown-item ays-survey-action-delete-question" ><?php echo esc_html__( 'Delete question', "survey-maker" ); ?></button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="copy-question-id">
                                                            <?php echo esc_html__( 'Question ID', "survey-maker" ); ?>
                                                            <strong class="ays-survey-shortcode-box" onClick="selectElementContents(this)" style="font-size:16px; font-style:normal;" class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Click for copy',"survey-maker");?>" > <?php echo esc_attr($id); ?></strong>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-question-wrap-expanded">
                                        <div class="ays-survey-question-conteiner">
                                            <div class="ays-survey-question-dlg-dragHandle">
                                                <div class="ays-survey-icons ays-survey-icons-hidden">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-horizontal.svg">
                                                    <input type="hidden" class="ays-survey-question-ordering" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][ordering]" value="1">
                                                </div>
                                            </div>
                                            <div class="ays-survey-question-row-wrap">
                                                <div class="ays-survey-question-row">
                                                    <div class="ays-survey-question-box">
                                                        <div class="ays-survey-question-input-box">
                                                            <textarea class="ays-survey-remove-default-border ays-survey-question-input-textarea ays-survey-question-input ays-survey-input"
                                                                name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][title]"
                                                                placeholder="<?php echo esc_attr__( 'Question', "survey-maker" ); ?>" style="height: 24px;"></textarea>
                                                            <input type="hidden" name="<?php echo esc_attr($html_name_prefix); ?>question_ids[]" value="">
                                                            <div class="ays-survey-input-underline"></div>
                                                            <div class="ays-survey-input-underline-animation"></div>
                                                        </div>
                                                        <div class="ays-survey-question-preview-box display_none"></div>
                                                    </div>
                                                    <div class="ays-survey-question-img-icon-box">
                                                        <div class="ays-survey-open-question-editor appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Open editor',"survey-maker")?>">
                                                            <div class="ays-question-img-icon-content">
                                                                <div class="ays-question-img-icon-content-div">
                                                                    <div class="ays-survey-icons">
                                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/edit-content.svg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" class="ays-survey-open-question-editor-flag" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][with_editor]" value="off">
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-question-img-icon-box">
                                                        <div class="ays-survey-add-question-image appsMaterialWizButtonPapericonbuttonEl" data-type="questionImgButton" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Add image',"survey-maker")?>">
                                                            <div class="ays-question-img-icon-content">
                                                                <div class="ays-question-img-icon-content-div">
                                                                    <div class="ays-survey-icons">
                                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/insert-photo.svg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-question-type-box">
                                                    <select name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][type]" tabindex="-1" class="ays-survey-question-type survey_default_type" aria-hidden="true" data-type="<?php echo esc_attr($survey_default_type);?>">
                                                        <?php 
                                                            $selected = '';
                                                            foreach ( $question_types as $type_slug => $type ):
                                                                if( $survey_default_type == $type_slug ){
                                                                    $selected = 'selected';
                                                                }else{
                                                                    $selected = '';
                                                                }
                                                                ?>
                                                                <option value="<?php echo esc_attr($type_slug); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_attr($type); ?></option>
                                                                <?php
                                                            endforeach;
                                                        ?>
                                                        <option value="matrix_scale" disabled>Matrix Scale (Pro)</option>
                                                        <option value="matrix_scale_checkbox" disabled>Matrix Scale Checkbox (Pro)</option>
                                                        <option value="nps" disabled>Net Promoter Score (Pro)</option>
                                                        <option value="ranking" disabled>Ranking (Pro)</option>
                                                        <option value="calculation" disabled>Calculation (Pro)</option>
                                                        <option value="star_list" disabled>Star List (Pro)</option>
                                                        <option value="slider_list" disabled>Slider List (Pro)</option>
                                                        <option value="linear_scale" disabled>Linear Scale (Pro)</option>
                                                        <option value="slider" disabled>Slider (Pro)</option>
                                                        <option value="uplaod" disabled>Upload (Pro)</option>
                                                        <option value="hidden" disabled>Hidden (Pro)</option>
                                                        <option value="html" disabled>HTML (Pro)</option>
                                                    </select>
                                                    <input type="hidden" class="ays-survey-check-type-before-change" value="<?php echo esc_attr($survey_default_type); ?>">
                                                    <a href="https://ays-pro.com/blog/survey-question-types" target="_blank" class="ays-survey-view-all-question-types-button"><?php echo esc_html__('View all question types', "survey-maker"); ?></a>                                                    
                                                    <a href="https://www.youtube.com/watch?v=jyEXM28vx7I" target="_blank" class="ays-survey-view-all-question-types-button"><?php echo esc_html__('All question types (video guide)', "survey-maker"); ?></a>
                                                </div>
                                                </div>
                                                <div>
                                                    <div class="ays-survey-question-img-icon-box">
                                                        <div class="ays-survey-action-collapse-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Collapse',"survey-maker")?>">
                                                            <div class="ays-question-img-icon-content">
                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/collapse-section.svg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ays-survey-question-image-container" style="display: none;" >
                                            <div class="ays-survey-question-image-body">
                                                <div class="ays-survey-question-image-wrapper aysFormeditorViewMediaImageWrapper">
                                                    <div class="ays-survey-question-image-pos aysFormeditorViewMediaImagePos">
                                                        <div class="d-flex">
                                                            <div class="dropdown mr-1">
                                                                <div class="ays-survey-question-edit-menu-button dropdown-menu-actions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <div class="ays-survey-icons">
                                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item ays-survey-question-img-action" data-action="edit-image" href="javascript:void(0);"><?php echo esc_html__( 'Edit', "survey-maker" ); ?></a>
                                                                    <a class="dropdown-item ays-survey-question-img-action" data-action="delete-image" href="javascript:void(0);"><?php echo esc_html__( 'Delete', "survey-maker" ); ?></a>
                                                                    <a class="dropdown-item ays-survey-question-img-action" data-action="add-caption" href="javascript:void(0);"><?php echo esc_html__( 'Add a caption', "survey-maker" ); ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <img class="ays-survey-question-img" src="" tabindex="0" aria-label="Captionless image" />
                                                        <input type="hidden" class="ays-survey-question-img-src" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][image]" value="">                                                        
                                                        <input type="hidden" class="ays-survey-question-img-caption-enable" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][image_caption_enable]" value="off">
                                                    </div>
                                                    <div class="ays-survey-question-image-caption-text-row display_none" >
                                                        <div class="ays-survey-question-image-caption-box-wrap">
                                                            <!-- <div class="ays-survey-answer-box-wrap"> -->
                                                                <!-- <div class="ays-survey-answer-box"> -->
                                                                    <!-- <div class="ays-survey-answer-box-input-wrap"> -->
                                                                        <input type="text" class="ays-survey-input ays-survey-question-image-caption" autocomplete="off" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][image_caption]">
                                                                        <div class="ays-survey-input-underline ays-survey-question-image-caption-input-underline"></div>
                                                                        <div class="ays-survey-input-underline-animation"></div>
                                                                    <!-- </div> -->
                                                                <!-- </div> -->
                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ays-survey-answers-conteiner">
                                        <?php
                                            if($survey_default_type == 'radio' || $survey_default_type == 'select' || $survey_default_type == 'checkbox'):
                                                for( $i = 1; $i <= $survey_answer_default_count; $i++ ){
                                                ?>
                                                <div class="ays-survey-answer-row" data-id="<?php echo esc_attr($i);?>">
                                                    <div class="ays-survey-answer-wrap">
                                                        <div class="ays-survey-answer-dlg-dragHandle">
                                                            <div class="ays-survey-icons ays-survey-icons-hidden">
                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                                            </div>
                                                            <input type="hidden" class="ays-survey-answer-ordering" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][answers_add][<?php echo esc_attr($i);?>][ordering]" value="<?php echo esc_attr($i);?>">
                                                        </div>
                                                        <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                                            <?php
                                                                if($survey_default_type == 'radio' || $survey_default_type == 'select'){
                                                                ?>
                                                                <div class="ays-survey-icons">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                                                </div>
                                                                <?php
                                                                }else if($survey_default_type == 'checkbox'){
                                                                    ?>
                                                                    <div class="ays-survey-icons">
                                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/checkbox-unchecked.svg">
                                                                    </div>
                                                                <?php
                                                                }else{
                                                                    ?>
                                                                    <div class="ays-survey-icons">
                                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                                                    </div>
                                                                <?php
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="ays-survey-answer-box-wrap">
                                                            <div class="ays-survey-answer-box">
                                                                <div class="ays-survey-answer-box-input-wrap">
                                                                    <input type="text" class="ays-survey-input" autocomplete="off" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][answers_add][<?php echo esc_attr($i);?>][title]" placeholder="Option <?php echo esc_attr($i);?>" value="Option <?php echo esc_attr($i);?>">
                                                                    <div class="ays-survey-input-underline"></div>
                                                                    <div class="ays-survey-input-underline-animation"></div>
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-answer-icon-box">
                                                                <div class="ays-survey-add-answer-image appsMaterialWizButtonPapericonbuttonEl" data-type="answerImgButton" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Add image',"survey-maker")?>">
                                                                    <div class="ays-question-img-icon-content">
                                                                        <div class="ays-question-img-icon-content-div">
                                                                            <div class="ays-survey-icons">
                                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/insert-photo.svg">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-answer-icon-box">
                                                                <span class="ays-survey-answer-icon ays-survey-answer-delete appsMaterialWizButtonPapericonbuttonEl" style="<?php echo $survey_answer_default_count > 1 ? '' : 'visibility: hidden;'; ?>" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-answer-image-container" style="display: none;">
                                                        <div class="ays-survey-answer-image-body">
                                                            <div class="ays-survey-answer-image-wrapper">
                                                                <div class="ays-survey-answer-image-wrapper-delete-wrap">
                                                                    <div role="button" class="ays-survey-answer-image-wrapper-delete-cont removeAnswerImage">
                                                                        <span class="exportIcon">
                                                                            <div class="ays-survey-answer-image-wrapper-delete-icon-cont">
                                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                                            </div>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <img class="ays-survey-answer-img" src="" tabindex="0" aria-label="Captionless image" />
                                                                <input type="hidden" class="ays-survey-answer-img-src" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][answers_add][<?php echo esc_attr($i);?>][image]" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                            ?>
                                            <?php elseif($survey_default_type == 'yesorno'):?>
                                            <div class="ays-survey-answer-row" data-id="1">
                                                <div class="ays-survey-answer-wrap">
                                                    <div class="ays-survey-answer-dlg-dragHandle">
                                                        <div class="ays-survey-icons ays-survey-icons-hidden">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                                        </div>
                                                        <input type="hidden" class="ays-survey-answer-ordering" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][answers_add][1][ordering]" value="1">
                                                    </div>
                                                    <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                                        <div class="ays-survey-icons">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-answer-box-wrap">
                                                        <div class="ays-survey-answer-box">
                                                            <div class="ays-survey-answer-box-input-wrap">
                                                                <input type="text" class="ays-survey-input" autocomplete="off" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][answers_add][1][title]" placeholder="Yes" value="Yes">
                                                                <div class="ays-survey-input-underline"></div>
                                                                <div class="ays-survey-input-underline-animation"></div>
                                                            </div>
                                                            <div class="ays-survey-answer-icon-box">
                                                                <div class="ays-survey-add-answer-image appsMaterialWizButtonPapericonbuttonEl" data-type="answerImgButton" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Add image',"survey-maker")?>">
                                                                    <div class="ays-question-img-icon-content">
                                                                        <div class="ays-question-img-icon-content-div">
                                                                            <div class="ays-survey-icons">
                                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/insert-photo.svg">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-answer-icon-box">
                                                                <span class="ays-survey-answer-icon ays-survey-answer-delete appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ays-survey-answer-image-container" style="display: none;">
                                                    <div class="ays-survey-answer-image-body">
                                                        <div class="ays-survey-answer-image-wrapper">
                                                            <div class="ays-survey-answer-image-wrapper-delete-wrap">
                                                                <div role="button" class="ays-survey-answer-image-wrapper-delete-cont removeAnswerImage">
                                                                    <span class="exportIcon">
                                                                        <div class="ays-survey-answer-image-wrapper-delete-icon-cont">
                                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <img class="ays-survey-answer-img" src="" tabindex="0" aria-label="Captionless image" />
                                                            <input type="hidden" class="ays-survey-answer-img-src" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][answers_add][1][image]" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ays-survey-answer-row" data-id="2">
                                                <div class="ays-survey-answer-wrap">
                                                    <div class="ays-survey-answer-dlg-dragHandle">
                                                        <div class="ays-survey-icons ays-survey-icons-hidden">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                                        </div>
                                                        <input type="hidden" class="ays-survey-answer-ordering" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][answers_add][2][ordering]" value="2">
                                                    </div>
                                                    <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                                        <div class="ays-survey-icons">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-answer-box-wrap">
                                                        <div class="ays-survey-answer-box">
                                                            <div class="ays-survey-answer-box-input-wrap">
                                                                <input type="text" class="ays-survey-input" autocomplete="off" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][answers_add][2][title]" placeholder="No" value="No">
                                                                <div class="ays-survey-input-underline"></div>
                                                                <div class="ays-survey-input-underline-animation"></div>
                                                            </div>
                                                            <div class="ays-survey-answer-icon-box">
                                                                <div class="ays-survey-add-answer-image appsMaterialWizButtonPapericonbuttonEl" data-type="answerImgButton" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Add image',"survey-maker")?>">
                                                                    <div class="ays-question-img-icon-content">
                                                                        <div class="ays-question-img-icon-content-div">
                                                                            <div class="ays-survey-icons">
                                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/insert-photo.svg">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-answer-icon-box">
                                                                <span class="ays-survey-answer-icon ays-survey-answer-delete appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ays-survey-answer-image-container" style="display: none;">
                                                    <div class="ays-survey-answer-image-body">
                                                        <div class="ays-survey-answer-image-wrapper">
                                                            <div class="ays-survey-answer-image-wrapper-delete-wrap">
                                                                <div role="button" class="ays-survey-answer-image-wrapper-delete-cont removeAnswerImage">
                                                                    <span class="exportIcon">
                                                                        <div class="ays-survey-answer-image-wrapper-delete-icon-cont">
                                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <img class="ays-survey-answer-img" src="" tabindex="0" aria-label="Captionless image" />
                                                            <input type="hidden" class="ays-survey-answer-img-src" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][answers_add][2][image]" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php elseif( in_array( $survey_default_type, $text_question_types ) ):?>
                                            <div class="ays-survey-question-types">
                                                <div class="ays-survey-answer-row" data-id="1">
                                                    <div class="ays-survey-question-types-conteiner">
                                                        <div class="ays-survey-question-types-box ays-survey-question-type-all-text-types-box isDisabled <?php echo esc_attr($survey_default_type); ?>">
                                                            <div class="ays-survey-question-types-box-body">
                                                                <div class="ays-survey-question-types-input-box">
                                                                    <input type="text" class="ays-survey-remove-default-border ays-survey-question-types-input ays-survey-question-types-input-with-placeholder" autocomplete="off" tabindex="0" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][placeholder]" value="<?php echo esc_attr($question_types_placeholders[ $survey_default_type ]); ?>" placeholder="<?php echo esc_attr($question_types_placeholders[ $survey_default_type ]); ?>" style="font-size: 14px;">
                                                                </div>
                                                                <div class="ays-survey-question-types-input-underline"></div>
                                                                <div class="ays-survey-question-types-input-focus-underline"></div>
                                                            </div>
                                                        </div>
                                                        <div class="ays-survey-question-text-types-note-text"><span>* <?php echo esc_html__('You can insert your custom placeholder for input. Note your custom text will not be translated', "survey-maker"); ?></span></div>
                                                        <?php if($survey_default_type == "phone"): ?>
                                                            <div class="ays-survey-question-types-box-phone-type-note">
                                                                <?php
                                                                    echo "<span>" . esc_html__( "Note: Phone question type can contain only numbers and the following signs + ( ) -", "survey-maker" ) . "</span>";
                                                                ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php elseif($survey_default_type == 'star'): ?>
                                                <div class="ays-survey-question-types_star">
                                                    <div class="ays-survey-answer-row" data-id="1">
                                                        <div class="ays-survey-question-types-conteiner">
                                                            <div class="ays-survey-question-types-box<?php echo esc_attr($survey_default_type); ?>">
                                                            <div class="ays-survey-question-types-box-body ays-survey-body-for-select-lenght">
                                                                <div class="ays-survey-question-types_star_span">
                                                                    <span style="font-size: 25px;" class="ays-survey_star_span">1 to</span>
                                                                </div>
                                                                <div class="ays-survey-question-types-for-select-lenght">
                                                                    <select class="ays-survey-choose-for-start-select-lenght" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][star_scale_length]">
                                                                        <?php
                                                                            $star_scale_options = "" ;
                                                                            for($s_i = 3; $s_i <= 10; $s_i++){
                                                                                $star_scale_option_selected = (5 == $s_i) ? "selected" : "";
                                                                                $star_scale_options .= "<option value=".$s_i." ".$star_scale_option_selected.">".$s_i."</option>";
                                                                            }
                                                                            echo $star_scale_options;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-answer-box ays-survey-not-adding-enter-box" style="margin: 20px 0px;">
                                                                <span class="ays_survey_star_span">1</span>
                                                                <input type="text" autocomplete="off" class="ays-survey-input ays-survey-input-star-1 notAdding ays-survey-without-enter" autocomplete="off" tabindex="0" placeholder="<?php echo esc_attr__( "Label (Optional)", "survey-maker" ); ?>" style="font-size: 14px;" value="" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][star_1]">
                                                                <div class="ays-survey-question-types-input-underline-linear-scale"></div> 
                                                                <div class="ays-survey-input-underline-animation ays-survey-input-underline-animation-linear-scale"></div>
                                                            </div>
                                                            <div class="ays-survey-answer-box ays-survey-not-adding-enter-box">
                                                                <span class="ays_survey_star_span">5</span>
                                                                <input type="text" autocomplete="off" class="ays-survey-input ays-survey-input-star-2 notAdding ays-survey-without-enter" autocomplete="off" tabindex="0" placeholder="<?php echo esc_attr__( "Label (Optional)", "survey-maker" ); ?>" style="font-size: 14px;" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][star_2]" value="">
                                                                <div class="ays-survey-question-types-input-underline-linear-scale"></div> 
                                                                <div class="ays-survey-input-underline-animation ays-survey-input-underline-animation-linear-scale"></div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php elseif($survey_default_type == 'date'): ?>
                                            <div class="ays-survey-question-types_date">
                                                <div class="ays-survey-answer-row" data-id="1">
                                                    <div class="ays-survey-question-types-conteiner">
                                                        <div class="ays-survey-question-types-box isDisabled">
                                                            <div class="ays-survey-question-types-box-body">
                                                                <div class="ays-survey-answer-box ays_survey_date">
                                                                    <input type="text" autocomplete="off" tabindex="0" value="<?php echo esc_attr__("Month, day, year", "survey-maker"); ?>" disabled="" dir="auto">
                                                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php elseif($survey_default_type == 'time'): ?>
                                                <div class="ays-survey-question-types_time">
                                                    <div class="ays-survey-answer-row" data-id="1">
                                                        <div class="ays-survey-question-types-conteiner">
                                                            <div class="ays-survey-question-types-box isDisabled">
                                                                <div class="ays-survey-question-types-box-body">
                                                                    <div class="ays-survey-answer-box ays_survey_time">
                                                                        <input type="text" autocomplete="off" tabindex="0" value="<?php echo esc_attr__("Time", "survey-maker"); ?>" disabled="" dir="auto">
                                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php elseif($survey_default_type == 'date_time'): ?>
                                                <div class="ays-survey-question-types_date_time">
                                                    <div class="ays-survey-answer-row" data-id="1">
                                                        <div class="ays-survey-question-types-conteiner">
                                                            <div class="ays-survey-question-types-box isDisabled">
                                                                <div class="ays-survey-question-types-box-body">
                                                                    <div class="ays-survey-answer-box ays_survey_time">
                                                                        <input type="text" autocomplete="off" tabindex="0" value="Month, day, year, hour, minute" disabled="" dir="auto">
                                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else :?>
                                            <div class="ays-survey-question-types">
                                                <div class="ays-survey-answer-row" data-id="1" <?php echo $survey_default_type == 'star' || $survey_default_type == 'date' || $survey_default_type == 'time' || $survey_default_type == 'date_time' ? 'style="display:none;"' : '' ;?>>
                                                    <div class="ays-survey-question-types-conteiner">
                                                        <div class="ays-survey-question-types-box isDisabled <?php echo esc_attr($survey_default_type); ?>">
                                                            <div class="ays-survey-question-types-box-body">
                                                                <div class="ays-survey-question-types-input-box">
                                                                    <input type="text" class="ays-survey-remove-default-border ays-survey-question-types-input" autocomplete="off" tabindex="0" disabled="" placeholder="<?php echo esc_attr($survey_default_type); ?>" style="font-size: 14px;">
                                                                </div>
                                                                <div class="ays-survey-question-types-input-underline"></div>
                                                                <div class="ays-survey-question-types-input-focus-underline"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif;?>
                                        </div>
                                        <div class="ays-survey-other-answer-and-actions-row" <?php echo $survey_default_type == 'star' || $survey_default_type == 'date' || $survey_default_type == 'time' || $survey_default_type == 'date_time' ? 'style="display:none;"' : '' ;?>>
                                            <?php if( !in_array( $survey_default_type, $text_question_types )): ?>
                                            <div class="ays-survey-answer-row ays-survey-other-answer-row" style="display: none;">
                                                <div class="ays-survey-answer-wrap">
                                                    <div class="ays-survey-answer-dlg-dragHandle">
                                                        <div class="ays-survey-icons invisible">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                                        <div class="ays-survey-icons">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-answer-box-wrap">
                                                        <div class="ays-survey-answer-box">
                                                            <div class="ays-survey-answer-box-input-wrap">
                                                                <input type="text" autocomplete="off" disabled class="ays-survey-input ays-survey-input-other-answer" placeholder="<?php echo esc_attr__( 'Other...', "survey-maker" ); ?>" value="<?php echo esc_attr__( 'Other...', "survey-maker" ); ?>">
                                                                <div class="ays-survey-input-underline"></div>
                                                                <div class="ays-survey-input-underline-animation"></div>
                                                            </div>
                                                        </div>
                                                        <div class="ays-survey-answer-icon-box">
                                                            <span class="ays-survey-answer-icon ays-survey-other-answer-delete appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ays-survey-answer-row">
                                                <div class="ays-survey-answer-wrap">
                                                    <div class="ays-survey-answer-dlg-dragHandle">
                                                        <div class="ays-survey-icons invisible">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                                        <div class="ays-survey-icons">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-answer-box-wrap">
                                                        <div class="ays-survey-answer-box ays-survey-action-add-answer-box-main-new">
                                                            <div class="ays-survey-action-add-answer appsMaterialWizButtonPapericonbuttonEl ays-survey-action-add-answer-box-new" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add option',"survey-maker")?>">
                                                                <div class="ays-question-img-icon-content">
                                                                    <div class="ays-question-img-icon-content-div">
                                                                        <div class="ays-survey-icons">
                                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                                                                        </div>
                                                                        <div class="ays-survey-action-add-answer-text">
                                                                            <?php  echo esc_html__('Add option' , "survey-maker"); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-other-answer-add-wrap" <?php echo $survey_default_type == 'select' ? 'style="display:none;"' : ''; ?>>
                                                                <span class=""><?php echo esc_html__( 'or', "survey-maker" ) ?></span>
                                                                <div class="ays-survey-other-answer-container ays-survey-other-answer-add">
                                                                    <div class="ays-survey-other-answer-container-overlay"></div>
                                                                    <span class="ays-survey-other-answer-content">
                                                                        <span class="appsMaterialWizButtonPaperbuttonLabel quantumWizButtonPaperbuttonLabel"><?php echo esc_html__( 'add "Other"', "survey-maker" ) ?></span>
                                                                        <input type="checkbox" class="display_none ays-survey-other-answer-checkbox" value="on" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][user_variant]">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="ays-survey-row-divider"><div></div></div>
                                        <div class="ays-survey-question-more-options-wrap">
                                            <!-- Min -->
                                            <div class="ays-survey-question-more-option-wrap ays-survey-question-min-selection-count display_none">
                                                <div class="ays-survey-answer-box" style="margin: 20px 0px;">
                                                    <label class="ays-survey-question-min-selection-count-label">
                                                        <span><?php echo esc_html__( "Minimum selection number", "survey-maker" ); ?></span>
                                                        <input type="number" class="ays-survey-input ays-survey-min-votes-field" autocomplete="off" tabindex="0" 
                                                            placeholder="<?php echo esc_attr__( "Minimum selection number", "survey-maker" ); ?>" style="font-size: 14px;"
                                                            name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][min_selection_count]"
                                                            value="" min="0">
                                                        <div class="ays-survey-input-underline"></div> 
                                                        <div class="ays-survey-input-underline-animation"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- Max -->
                                            <div class="ays-survey-question-more-option-wrap ays-survey-question-max-selection-count display_none">
                                                <input type="checkbox" class="display_none ays-survey-question-max-selection-count-checkbox" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][enable_max_selection_count]" value="on">
                                                <div class="ays-survey-answer-box" style="margin: 20px 0px;">
                                                    <label class="ays-survey-question-max-selection-count-label">
                                                        <span><?php echo esc_html__( "Maximum selection number", "survey-maker" ); ?></span>
                                                        <input type="number" class="ays-survey-input ays-survey-max-votes-field" autocomplete="off" tabindex="0" 
                                                            placeholder="<?php echo esc_attr__( "Maximum selection number", "survey-maker" ); ?>" style="font-size: 14px;"
                                                            name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][max_selection_count]"
                                                            value="" min="0">
                                                        <div class="ays-survey-input-underline"></div> 
                                                        <div class="ays-survey-input-underline-animation"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- Text limitations -->
                                            <div class="ays-survey-question-word-limitations display_none">
                                                <input type="checkbox" class="display_none ays-survey-question-word-limitations-checkbox" value="on">

                                                <div class="ays-survey-question-more-option-wrap-limitations ays-survey-question-word-limit-by ">
                                                    <div class="ays-survey-question-word-limit-by-text">
                                                        <span><?php echo esc_html__("Limit by", "survey-maker"); ?></span>
                                                    </div>
                                                    <div class="ays-survey-question-word-limit-by-select">
                                                        <select name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][limit_by]" class="ays-text-input ays-text-input-short ">
                                                            <option value="char"> <?php echo esc_html__("Characters", "survey-maker")?> </option>
                                                            <option value="word"> <?php echo esc_html__("Word", "survey-maker")?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="ays-survey-row-divider"><div></div></div>
                                                <div class="ays-survey-question-more-option-wrap-limitations ">
                                                    <div class="ays-survey-answer-box">
                                                        <label class="ays-survey-question-limitations-label">
                                                            <span><?php echo esc_html__( "Length", "survey-maker" ); ?></span>
                                                            <input type="number" 
                                                                   name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][limit_length]"        
                                                                   class="ays-survey-input ays-survey-limit-length-input" autocomplete="off" tabindex="0" 
                                                                   placeholder="<?php echo esc_attr__( "Length", "survey-maker" ); ?>" style="font-size: 14px;"
                                                                   value="" min="0">
                                                            <div class="ays-survey-input-underline"></div> 
                                                            <div class="ays-survey-input-underline-animation"></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="ays-survey-row-divider"><div></div></div>
                                                <div class="ays-survey-question-more-option-wrap-limitations ays-survey-question-word-show-word ">
                                                    <label class="ays-survey-question-limitations-counter-label">
                                                        <span><?php echo esc_html__( "Show word/character counter", "survey-maker" ); ?></span>
                                                        <input type="checkbox" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][limit_counter]" autocomplete="off" value="on" class="ays-survey-text-limitations-counter-input">
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- Number limitations start -->
                                            <div class="ays-survey-question-number-limitations display_none">
                                                <input type="checkbox" class="display_none ays-survey-question-number-limitations-checkbox" value="on" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][enable_number_limitation]">
                                                <!-- Min Number -->
                                                <div class="ays-survey-question-number-min-box ays-survey-question-number-votes-count-box <?php echo ($survey_default_type == 'phone') ? "display_none" : "" ?>" style="margin: 20px 0px;">
                                                    <label class="ays-survey-question-number-min-selection-label">
                                                        <span><?php echo esc_html__( "Minimum value", "survey-maker" ); ?></span>
                                                        <input type="number" class="ays-survey-input ays-survey-number-min-votes ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                                            placeholder="<?php echo esc_attr__( "Minimum value", "survey-maker" ); ?>" style="font-size: 14px;"
                                                            name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][number_min_selection]"
                                                            value="">
                                                        <div class="ays-survey-input-underline"></div> 
                                                        <div class="ays-survey-input-underline-animation"></div>
                                                    </label>
                                                </div>
                                                <!-- Max Number -->
                                                <div class="ays-survey-question-number-max-box ays-survey-question-number-votes-count-box <?php echo ($survey_default_type == 'phone') ? "display_none" : "" ?>" style="margin: 20px 0px;">
                                                    <label class="ays-survey-question-number-max-selection-label">
                                                        <span><?php echo esc_html__( "Maximum value", "survey-maker" ); ?></span>
                                                        <input type="number" class="ays-survey-input ays-survey-number-max-votes ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                                            placeholder="<?php echo esc_attr__( "Maximum value", "survey-maker" ); ?>" style="font-size: 14px;"
                                                            value=""
                                                            name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][number_max_selection]">
                                                        <div class="ays-survey-input-underline"></div> 
                                                        <div class="ays-survey-input-underline-animation"></div>
                                                    </label>
                                                </div>
                                                <!-- Error message -->
                                                <div class="ays-survey-question-number-votes-count-box" style="margin: 20px 0px;">                                                        
                                                    <label class="ays-survey-question-number-min-selection-label">
                                                        <span><?php echo esc_html__( "Error message", "survey-maker" ); ?></span>
                                                        <input type="text"
                                                            class="ays-survey-input ays-survey-number-error-message ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                                            placeholder="<?php echo esc_attr__( "Error Message", "survey-maker" ); ?>" style="font-size: 14px;"
                                                            value=""
                                                            name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][number_error_message]">
                                                        <div class="ays-survey-input-underline"></div> 
                                                        <div class="ays-survey-input-underline-animation"></div>
                                                    </label>
                                                </div>
                                                <!-- Show error message -->
                                                <div class="ays-survey-question-number-votes-count-box" style="margin: 20px 0px;">                                                        
                                                    <label class="ays-survey-question-number-min-selection-label ays-survey-question-number-message-label">
                                                        <span><?php echo esc_html__( "Show error message", "survey-maker" ); ?></span>
                                                        <input type="checkbox"
                                                            autocomplete="off" 
                                                            value="on" 
                                                            class="ays-survey-number-enable-error-message"
                                                            name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][enable_number_error_message]">
                                                    </label>
                                                </div>
                                                <hr>
                                                <!-- Char length -->
                                                <div class="ays-survey-question-number-votes-count-box ">
                                                    <div class="ays-survey-answer-box">
                                                        <label class="ays-survey-question-number-min-selection-label">
                                                            <span><?php echo esc_html__( "Length", "survey-maker" ); ?></span>
                                                            <input type="number" 
                                                                class="ays-survey-input ays-survey-number-limit-length ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                                                placeholder="<?php echo esc_attr__( "Length", "survey-maker" ); ?>" style="font-size: 14px;"
                                                                value="" 
                                                                name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][number_limit_length]">
                                                            <div class="ays-survey-input-underline"></div> 
                                                            <div class="ays-survey-input-underline-animation"></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- Show Char length -->
                                                <div class="ays-survey-question-number-votes-count-box ">
                                                    <label class="ays-survey-question-number-min-selection-label ays-survey-question-number-message-label">
                                                        <span><?php echo esc_html__( "Show character counter", "survey-maker" ); ?></span>
                                                        <input type="checkbox"
                                                                autocomplete="off" 
                                                                value="on" 
                                                                class="ays-survey-number-number-limit-length"
                                                                name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][enable_number_limit_counter]"
                                                                >
                                                    </label>
                                                </div>
                                                <hr>
                                            </div>
                                            <!-- Number limitations end -->
                                        </div>
                                        <div class="ays-survey-actions-row">
                                            <div class="ays-survey-actions-left">
                                                <div class="ays-survey-actions-answers-bulk-add">
                                                    <div class="ays-survey-answer-icon-box">
                                                        <div class="ays-survey-action-bulk-add-answer">
                                                            <div class="ays-survey-action-bulk-add-answer-content">
                                                                <div class="ays-survey-action-bulk-add-answer-div">
                                                                    <div class="ays-survey-icons ays-survey-action-bulk-add-answer-icon">
                                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/download.svg" class="ays-survey-action-bulk-add-answer-icon-svg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-action-bulk-add-answer-text">
                                                                <a href="https://ays-pro.com/wordpress/survey-maker" style="color: gray;" target="blank"><?php echo esc_html__('Bulk add',"survey-maker")?> (PRO)</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ays-survey-actions">
                                                <div class="ays-survey-answer-icon-box">
                                                    <div class="ays-survey-action-duplicate-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Duplicate',"survey-maker")?>">
                                                        <div class="ays-question-img-icon-content">
                                                            <div class="ays-question-img-icon-content-div">
                                                                <div class="ays-survey-icons">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/duplicate.svg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ays-survey-answer-icon-box">
                                                    <div class="ays-survey-action-delete-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                                        <div class="ays-question-img-icon-content">
                                                            <div class="ays-question-img-icon-content-div">
                                                                <div class="ays-survey-icons">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash.svg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ays-survey-vertical-divider"><div></div></div>
                                                <div class="ays-survey-answer-elem-box">
                                                    <label>
                                                        <span>
                                                            <span><?php echo esc_html__( 'Required', "survey-maker" ); ?></span>
                                                        </span>
                                                        <input type="checkbox" <?php echo ($survey_make_questions_required) ? 'checked' : '' ?> class="display_none ays-survey-input-required-question ays-switch-checkbox" name="<?php echo esc_attr($html_name_prefix); ?>section_add[1][questions_add][1][options][required]" value="on">
                                                        <div class="switch-checkbox-wrap" aria-label="Required" tabindex="0" role="checkbox">
                                                            <div class="switch-checkbox-track"></div>
                                                            <div class="switch-checkbox-ink"></div>
                                                            <div class="switch-checkbox-circles">
                                                                <div class="switch-checkbox-thumb"></div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="ays-survey-answer-icon-box ays-survey-question-more-actions droptop">
                                                    <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                                        <div class="ays-question-img-icon-content">
                                                            <div class="ays-question-img-icon-content-div">
                                                                <div class="ays-survey-icons">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="move-to-section"><?php echo esc_html__( 'Move to section', "survey-maker" ); ?></button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="max-selection-count-enable"><?php echo esc_html__( 'Enable selection count', "survey-maker" ); ?></button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="word-limitation-enable"><?php echo esc_html__( 'Enable word limitation', "survey-maker" ); ?></button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="number-word-limitation-enable"><?php echo esc_html__( 'Enable limitation', "survey-maker" ); ?></button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="copy-question-id">
                                                            <?php echo esc_html__( 'Question ID', "survey-maker" ); ?>
                                                            <strong class="ays-survey-shortcode-box" onClick="selectElementContents(this)" style="font-size:16px; font-style:normal;" class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Click for copy',"survey-maker");?>" > <?php echo esc_attr($id); ?></strong>
                                                        </button>                                                        
                                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro ays-survey-question-actions-pro-button <?php echo in_array( $survey_default_type, $logic_jump_question_types ) ? '' : 'display_none'; ?>" data-action="go-to-section-based-on-answers-enable" data-video-url="https://www.youtube.com/watch?v=BTeCGFKJmlk" data-option-title="<?php echo esc_attr__('Logic Jump',"survey-maker")?>" data-option-text="Logic Jump allows to create <strong> responsive surveys </strong> that save the survey taker's time by skipping irrelevant questions or sections. Add more logic to your surveys with a few clicks by choosing the necessary set of questions you want to follow a particular question. Note that this feature works only with <strong> “Radio” </strong> and <strong> “Yes or No” </strong> questions. ">
                                                            <?php echo esc_html__( 'Logic jump', "survey-maker" ); ?> (Pro) 
                                                        </button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-user-explanation" style="font-style: italic;">
                                                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'User explanation', "survey-maker" ); ?> (Pro) </a>
                                                        </button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="disable-hide-results" style="font-style: italic;">
                                                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Hide results', "survey-maker" ); ?> (Pro) </a>
                                                        </button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-admin-note">
                                                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Admin note', "survey-maker" ); ?> (Pro) </a>
                                                        </button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro ays-survey-question-actions-pro-button" data-action="enable-url-parameter" data-video-url="https://www.youtube.com/watch?v=1nvOtwlmVAo" data-option-title="<?php echo esc_attr__('URL parametr',"survey-maker")?>" data-option-text="The URL parameter is a great tool <strong> to help you collect and analyze your submission results easier. </strong> It is handy when you need to share your survey on various platforms to identify where the respondents came from. You can also use this feature when you know some information about your survey takers and want to save their time and ensure the accuracy of the survey. URL Parameter is more popular with the <strong> hidden question type </strong> because you can share the surveys with specific scenarios. For instance, if you need to send your survey to the Marketing and Development team employees, you can assign URL parameters, and it will be easier to track and analyze the results separately.  ">
                                                            <a href="#" ><?php echo esc_html__( 'URL parametr', "survey-maker" ); ?> (Pro) </a>
                                                        </button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-value-prefix">
                                                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Value prefix', "survey-maker" ); ?> (Pro) </a>
                                                        </button>
                                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-value-suffix">
                                                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Value suffix', "survey-maker" ); ?> (Pro) </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ays-survey-section-footer-wrap">
                            <div class="ays-survey-add-question-from-section-bottom">
                                <div class="ays-survey-add-question-to-this-section ays-survey-add-question-button-container" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add Question',"survey-maker"); ?>">
                                    <div class="ays-survey-add-question-button appsMaterialWizButtonPapericonbuttonEl">
                                        <div class="ays-question-img-icon-content">
                                            <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                                                </div>
                                            </div>
                                        </div>
                                        <span><?php echo esc_html__('Add Question',"survey-maker")?></span>
                                    </div>
                                </div>
                                <div class="ays-survey-add-new-section-from-bottom ays-survey-add-question-button-container" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add Section',"survey-maker"); ?>">
                                    <div class="ays-survey-add-question-button appsMaterialWizButtonPapericonbuttonEl">
                                        <div class="ays-question-img-icon-content">
                                            <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-section.svg">
                                                </div>
                                            </div>
                                        </div>
                                        <span><?php echo esc_html__('Add Section',"survey-maker")?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            } else {
                foreach ($sections as $key => $section):
                    ?>
                    <!-- Sections start -->
                    <div class="ays-survey-section-box ays-survey-old-section" data-name="<?php echo esc_attr($html_name_prefix); ?>sections" data-id="<?php echo esc_attr($section['id']); ?>">
                        <input type="hidden" class="ays-survey-section-collapsed-input" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][options][collapsed]" value="<?php echo esc_attr($section['options']['collapsed']); ?>">
                        <div class="ays-survey-section-wrap-collapsed <?php echo $section['options']['collapsed'] == 'expanded' ? 'display_none' : ''; ?>">
                            <div class="ays-survey-section-head-wrap">
                                <div class="ays-survey-section-head-top <?php echo $multiple_sections ? '' : 'display_none'; ?>">
                                    <div class="ays-survey-section-counter">
                                        <span>
                                            <span><?php echo esc_html__( 'Section', "survey-maker" ); ?></span>
                                            <span class="ays-survey-section-number"><?php echo esc_attr($key)+1; ?></span>
                                            <span><?php echo esc_html__( 'of', "survey-maker" ); ?></span>
                                            <span class="ays-survey-sections-count"><?php echo count($sections); ?></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="ays-survey-section-head <?php echo count($sections) > 1 ? 'ays-survey-section-head-topleft-border-none' : ''; ?>">
                                    <div class="ays-survey-section-dlg-dragHandle">
                                        <div class="ays-survey-icons">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                        </div>
                                    </div>
                                    <div class="ays-survey-section-wrap-collapsed-contnet">
                                        <div class="ays-survey-action-questions-count appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Questions count',"survey-maker")?>"><span><?php echo count($section['questions'])?></span></div>
                                        <div class="ays-survey-section-wrap-collapsed-contnet-text"><?php echo esc_html($section['title']); ?></div>
                                        <div>
                                            <div class="ays-survey-action-expand-section appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Expand section',"survey-maker")?>">
                                                <div class="ays-section-img-icon-content">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/expand-section.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-answer-icon-box ays-survey-section-actions-more dropdown">
                                        <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                    <div class="ays-survey-icons">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button type="button" class="dropdown-item ays-survey-delete-section <?php echo $multiple_sections ? '' : 'display_none'; ?>"><?php echo esc_html__( 'Delete section', "survey-maker" ); ?></button>
                                            <button type="button" class="dropdown-item ays-survey-duplicate-section"><?php echo esc_html__( 'Duplicate section', "survey-maker" ); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ays-survey-section-wrap-expanded <?php echo $section['options']['collapsed'] == 'collapsed' ? 'display_none' : ''; ?>">
                            <input type="hidden" name="<?php echo esc_attr($html_name_prefix); ?>sections_ids[]" value="<?php echo esc_attr($section['id']); ?>">
                            <div class="ays-survey-section-head-wrap">
                                <div class="ays-survey-section-head-top <?php echo $multiple_sections ? '' : 'display_none'; ?>">
                                    <div class="ays-survey-section-counter">
                                        <span>
                                            <span><?php echo esc_html__( 'Section', "survey-maker" ); ?></span>
                                            <span class="ays-survey-section-number"><?php echo esc_attr($key)+1; ?></span>
                                            <span><?php echo esc_html__( 'of', "survey-maker" ); ?></span>
                                            <span class="ays-survey-sections-count"><?php echo count($sections); ?></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="ays-survey-section-head <?php echo count($sections) > 1 ? 'ays-survey-section-head-topleft-border-none' : ''; ?>">
                                    <!--  Section Title Start  -->
                                    <div class="ays-survey-section-title-conteiner">
                                        <input type="text" class="ays-survey-section-title ays-survey-input" tabindex="0" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][title]" placeholder="<?php echo esc_attr__( 'Section title' , "survey-maker" ); ?>" value="<?php echo esc_attr($section['title']); ?>"/>
                                        <div class="ays-survey-input-underline"></div>
                                        <div class="ays-survey-input-underline-animation"></div>
                                    </div>
                                    <!--  Section Title End  -->

                                    <!--  Section Description Start  -->
                                    <div class="ays-survey-section-description-conteiner">
                                        <textarea class="ays-survey-section-description ays-survey-input" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][description]" placeholder="<?php echo esc_attr__( 'Section Description' , "survey-maker" ); ?>"><?php echo esc_attr($section['description']); ?></textarea>
                                        <div class="ays-survey-input-underline"></div>
                                        <div class="ays-survey-input-underline-animation"></div>
                                    </div>

                                    <div class="ays-survey-section-actions">
                                        <div class="ays-survey-action-questions-count appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Questions count',"survey-maker")?>"><span><?php echo count($section['questions'])?></span></div>
                                        <div class="ays-survey-action-collapse-section appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Collapse section',"survey-maker")?>">
                                            <div class="ays-question-img-icon-content">
                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/collapse-section.svg">
                                            </div>
                                        </div>
                                        <div class="ays-survey-answer-icon-box ays-survey-section-actions-more dropdown">
                                            <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                                <div class="ays-question-img-icon-content">
                                                    <div class="ays-question-img-icon-content-div">
                                                        <div class="ays-survey-icons">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button type="button" class="dropdown-item ays-survey-collapse-section-questions"><?php echo esc_html__( 'Collapse section questions', "survey-maker" ); ?></button>
                                                <input type="checkbox" hidden class="make-questions-required-checkbox" >
                                                <button type="button" class="dropdown-item ays-survey-section-questions-required" data-flag="off"><?php echo esc_html__( 'Make questions required', "survey-maker" ); ?> <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/done.svg" class="ays-survey-required-section-img"></button>
                                                <button type="button" class="dropdown-item ays-survey-delete-section <?php echo $multiple_sections ? '' : 'display_none'; ?>"><?php echo esc_html__( 'Delete section', "survey-maker" ); ?></button>
                                                <button type="button" class="dropdown-item ays-survey-duplicate-section"><?php echo esc_html__( 'Duplicate section', "survey-maker" ); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="ays-survey-section-ordering" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][ordering]" value="<?php echo esc_attr($section['ordering']); ?>">
                            </div>
                            <div class="ays-survey-section-body">
                                <div class="ays-survey-section-questions">
                                    <!-- Questons start -->
                                    <?php
                                    foreach ($section['questions'] as $k => $question):
                                        ?>
                                        <div class="ays-survey-question-answer-conteiner ays-survey-old-question" data-name="questions" data-id="<?php echo esc_attr($question['id']); ?>">
                                            <input type="hidden" class="ays-survey-question-collapsed-input" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][collapsed]" value="<?php echo esc_attr($question['options']['collapsed']); ?>">
                                            <div class="ays-survey-question-wrap-collapsed <?php echo $question['options']['collapsed'] == 'expanded' ? 'display_none' : ''; ?>">
                                                <div class="ays-survey-question-dlg-dragHandle">
                                                    <div class="ays-survey-icons ays-survey-icons-hidden">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-horizontal.svg">
                                                    </div>
                                                </div>
                                                <div class="ays-survey-question-wrap-collapsed-contnet ays-survey-question-wrap-collapsed-contnet-box">
                                                    <div class="ays-survey-question-wrap-collapsed-contnet-text">
                                                        <?php echo esc_attr(Survey_Maker_Data::survey_sanitize_specific_content($question['question'])); ?>
                                                    </div>
                                                    <div>
                                                        <div class="ays-survey-action-expand-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Expand question',"survey-maker")?>">
                                                            <div class="ays-question-img-icon-content">
                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/expand-section.svg">
                                                            </div>
                                                        </div>
                                                        <div class="ays-survey-answer-icon-box ays-survey-question-more-actions droptop ">
                                                            <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                                                <div class="ays-question-img-icon-content">
                                                                    <div class="ays-question-img-icon-content-div">
                                                                        <div class="ays-survey-icons">
                                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <button type="button" class="dropdown-item ays-survey-question-action" data-action="move-to-section"><?php echo esc_html__( 'Move to section', "survey-maker" ); ?></button>
                                                                <button type="button" class="dropdown-item ays-survey-action-delete-question"><?php echo esc_html__( 'Delete question', "survey-maker" ); ?></button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action" data-action="copy-question-id">
                                                                    <?php echo esc_html__( 'Question ID', "survey-maker" ); ?>
                                                                    <strong class="ays-survey-shortcode-box" onClick="selectElementContents(this)" style="font-size:16px; font-style:normal;" class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Click for copy',"survey-maker");?>" > <?php echo esc_attr($question['id']); ?></strong>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ays-survey-question-wrap-expanded <?php echo $question['options']['collapsed'] == 'collapsed' ? 'display_none' : ''; ?>">
                                                <div class="ays-survey-question-conteiner">
                                                    <div class="ays-survey-question-dlg-dragHandle">
                                                        <div class="ays-survey-icons ays-survey-icons-hidden">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-horizontal.svg">
                                                            <input type="hidden" class="ays-survey-question-ordering" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][ordering]" value="<?php echo esc_attr($question['ordering']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-question-row-wrap">
                                                        <div class="ays-survey-question-row">
                                                            <div class="ays-survey-question-box">
                                                                <div class="ays-survey-question-input-box <?php echo $question['options']['with_editor'] ? 'display_none' : ''; ?>">
                                                                    <textarea type="text" class="ays-survey-remove-default-border ays-survey-question-input-textarea ays-survey-question-input ays-survey-input" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][title]" placeholder="<?php echo esc_attr__( 'Question', "survey-maker" ); ?>"style="height: 24px;"><?php echo esc_attr(Survey_Maker_Data::survey_sanitize_specific_content($question['question'])); ?></textarea>
                                                                    <input type="hidden" name="<?php echo esc_attr($html_name_prefix); ?>question_ids[]" value="<?php echo esc_attr($question['id']); ?>">
                                                                    <div class="ays-survey-input-underline"></div>
                                                                    <div class="ays-survey-input-underline-animation"></div>
                                                                </div>                                                                
                                                                <div class="ays-survey-question-preview-box <?php echo $question['options']['with_editor'] ? '' : 'display_none'; ?>"><?php echo (strpos($question['question'],'<script>') !== false) ? strip_tags(Survey_Maker_Data::survey_sanitize_specific_content($question['question'])) : Survey_Maker_Data::survey_sanitize_specific_content($question['question']); ?></div>
                                                            </div>
                                                            <div class="ays-survey-question-img-icon-box">
                                                                <div class="ays-survey-open-question-editor appsMaterialWizButtonPapericonbuttonEl" data-question-id="<?php echo esc_attr($question['id']); ?>" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Open editor',"survey-maker")?>">
                                                                    <div class="ays-question-img-icon-content">
                                                                        <div class="ays-question-img-icon-content-div">
                                                                            <div class="ays-survey-icons">
                                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/edit-content.svg">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="ays-survey-open-question-editor-flag" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][with_editor]" value="<?php echo $question['options']['with_editor'] ? 'on' : 'off'; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-question-img-icon-box">
                                                                <div class="ays-survey-add-question-image appsMaterialWizButtonPapericonbuttonEl" data-type="questionImgButton" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Add image',"survey-maker")?>">
                                                                    <div class="ays-question-img-icon-content">
                                                                        <div class="ays-question-img-icon-content-div">
                                                                            <div class="ays-survey-icons">
                                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/insert-photo.svg">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-question-type-box">
                                                                <select name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][type]" tabindex="-1" class="ays-survey-question-type" aria-hidden="true">
                                                                    <?php
                                                                        $select_question_type = (isset( $question['type'] ) && $question['type'] != '') ? $question['type'] :  $survey_default_type;
                                                                        foreach ($question_types as $type_slug => $type):
                                                                            $selected = '';
                                                                            if( $type_slug == $select_question_type ){
                                                                                $selected = ' selected ';
                                                                            }
                                                                            ?>
                                                                            <option <?php echo esc_attr($selected); ?> value="<?php echo esc_attr($type_slug); ?>"><?php echo esc_attr($type); ?></option>
                                                                            <?php
                                                                        endforeach;
                                                                    ?>
                                                                    <option value="matrix_scale" disabled>Matrix Scale (Pro)</option>
                                                                    <option value="matrix_scale_checkbox" disabled>Matrix Scale Checkbox (Pro)</option>
                                                                    <option value="nps" disabled>Net Promoter Score (Pro)</option>
                                                                    <option value="ranking" disabled>Ranking (Pro)</option>
                                                                    <option value="calculation" disabled>Calculation (Pro)</option>
                                                                    <option value="star_list" disabled>Star List (Pro)</option>
                                                                    <option value="slider_list" disabled>Slider List (Pro)</option>
                                                                    <option value="linear_scale" disabled>Linear Scale (Pro)</option>
                                                                    <option value="slider" disabled>Slider (Pro)</option>
                                                                    <option value="uplaod" disabled>Upload (Pro)</option>
                                                                    <option value="hidden" disabled>Hidden (Pro)</option>
                                                                    <option value="html" disabled>HTML (Pro)</option>
                                                                </select>
                                                                <input type="hidden" class="ays-survey-check-type-before-change" value="<?php echo esc_attr($select_question_type); ?>">
                                                                <a href="https://ays-pro.com/blog/survey-question-types" target="_blank" class="ays-survey-view-all-question-types-button"><?php echo esc_html__('View all question types', "survey-maker"); ?></a>                                                                
                                                                <a href="https://www.youtube.com/watch?v=jyEXM28vx7I" target="_blank" class="ays-survey-view-all-question-types-button"><?php echo esc_html__('All question types (video guide)', "survey-maker"); ?></a>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="ays-survey-question-img-icon-box">
                                                                <div class="ays-survey-action-collapse-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Collapse',"survey-maker")?>">
                                                                    <div class="ays-question-img-icon-content">
                                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/collapse-section.svg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ays-survey-question-image-container" <?php echo $question['image'] == '' ? 'style="display: none;"' : ''; ?> >
                                                    <div class="ays-survey-question-image-body">
                                                        <div class="ays-survey-question-image-wrapper aysFormeditorViewMediaImageWrapper">
                                                            <div class="ays-survey-question-image-pos aysFormeditorViewMediaImagePos">
                                                                <div class="d-flex">
                                                                    <div class="dropdown mr-1">
                                                                        <div class="ays-survey-question-edit-menu-button dropdown-menu-actions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <div class="ays-survey-icons">
                                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                                            </div>
                                                                        </div>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item ays-survey-question-img-action" data-action="edit-image" href="javascript:void(0);"><?php echo esc_html__( 'Edit', "survey-maker" ); ?></a>
                                                                            <a class="dropdown-item ays-survey-question-img-action" data-action="delete-image" href="javascript:void(0);"><?php echo esc_html__( 'Delete', "survey-maker" ); ?></a>                                                                            
                                                                            <a class="dropdown-item ays-survey-question-img-action" data-action="<?php echo ($question['options']['image_caption_enable']) ? 'close-caption' : 'add-caption'; ?>" href="javascript:void(0);"><?php echo ($question['options']['image_caption_enable']) ? esc_html__( 'Close caption', "survey-maker" ) : esc_html__( 'Add a caption', "survey-maker" ); ?></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <img class="ays-survey-question-img" src="<?php echo esc_url($question['image']); ?>" tabindex="0" aria-label="Captionless image" />
                                                                <input type="hidden" class="ays-survey-question-img-src" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][image]" value="<?php echo esc_attr($question['image']); ?>">
                                                                <input type="hidden" class="ays-survey-question-img-caption-enable" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][image_caption_enable]" value="<?php echo $question['options']['image_caption_enable'] ? 'on' : 'off'; ?>">
                                                            </div>
                                                            <div class="ays-survey-question-image-caption-text-row <?php echo ($question['options']['image_caption_enable']) ? '' : 'display_none'; ?>">
                                                                <div class="ays-survey-question-image-caption-box-wrap">
                                                                    <!-- <div class="ays-survey-answer-box-wrap"> -->
                                                                        <!-- <div class="ays-survey-answer-box"> -->
                                                                            <!-- <div class="ays-survey-answer-box-input-wrap"> -->
                                                                                <input type="text" class="ays-survey-input ays-survey-question-image-caption" autocomplete="off" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][image_caption]" value="<?php echo esc_attr($question['options']['image_caption']); ?>">
                                                                                <div class="ays-survey-input-underline ays-survey-question-image-caption-input-underline"></div>
                                                                                <div class="ays-survey-input-underline-animation"></div>
                                                                            <!-- </div> -->
                                                                        <!-- </div> -->
                                                                    <!-- </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ays-survey-answers-conteiner">
                                                <?php
                                                    $selected_question_type = (isset($question['type']) && $question['type'] != '') ? $question['type'] : $survey_default_type;
                                                    $question_type_Radio_Checkbox_Select = false;
                                                    $question_type_Text_ShortText_Number = false;
                                                    // if ($selected_question_type == 'radio' || $selected_question_type == 'select' || $selected_question_type == 'checkbox' ) {
                                                    //     $question_type_Radio_Checkbox_Select = true;
                                                    // }
                                                    
                                                    if ( in_array( $selected_question_type, $text_question_types ) ){// == 'text' || $selected_question_type == 'short_text' || $selected_question_type == 'number' ) {
                                                        $question_type_Text_ShortText_Number = true;
                                                    }else{
                                                        $question_type_Radio_Checkbox_Select = true;
                                                    }
                                                    $selected_anser_i_class = '';
                                                    if ($question_type_Radio_Checkbox_Select):

                                                        $selected_anser_i_class = '';
                                                        switch ($selected_question_type) {
                                                            case 'radio':
                                                                $selected_anser_i_class = 'radio-button-unchecked';
                                                                break;
                                                            case 'select':
                                                                $selected_anser_i_class = 'radio-button-unchecked';
                                                                break;
                                                            case 'checkbox':
                                                                $selected_anser_i_class = 'checkbox-unchecked';
                                                                break;    
                                                            default:
                                                                $selected_anser_i_class = 'radio-button-unchecked';
                                                                break;
                                                        }
                                                
                                                    foreach ($question['answers'] as $answer_key => $answer):
                                                    ?>
                                                    <!-- Answers start -->
                                                    <div class="ays-survey-answer-row" data-id="<?php echo esc_attr($answer['id']); ?>" <?php echo ($selected_question_type == 'date' || $selected_question_type == 'time' || $selected_question_type == 'date_time' || $selected_question_type == 'star') ? 'style="display:none;"' : '' ?>>
                                                        <div class="ays-survey-answer-wrap">
                                                            <div class="ays-survey-answer-dlg-dragHandle">
                                                                <div class="ays-survey-icons ays-survey-icons-hidden">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                                                </div>
                                                                <input type="hidden" class="ays-survey-answer-ordering" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][answers][<?php echo esc_attr($answer['id']); ?>][ordering]" value="<?php echo esc_attr($answer['ordering']); ?>">
                                                            </div>
                                                            <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                                                <div class="ays-survey-icons">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/<?php echo esc_attr($selected_anser_i_class); ?>.svg">
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-answer-box-wrap">
                                                                <div class="ays-survey-answer-box">
                                                                    <div class="ays-survey-answer-box-input-wrap">
                                                                        <input type="text" class="ays-survey-input" autocomplete="off" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][answers][<?php echo esc_attr($answer['id']); ?>][title]" placeholder="Option 1" value="<?php echo esc_attr($answer['answer']); ?>">
                                                                        <div class="ays-survey-input-underline"></div>
                                                                        <div class="ays-survey-input-underline-animation"></div>
                                                                    </div>
                                                                    <div class="ays-survey-answer-icon-box">
                                                                        <div class="ays-survey-add-answer-image appsMaterialWizButtonPapericonbuttonEl" data-type="answerImgButton" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Add image',"survey-maker")?>">
                                                                            <div class="ays-question-img-icon-content">
                                                                                <div class="ays-question-img-icon-content-div">
                                                                                    <div class="ays-survey-icons">
                                                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/insert-photo.svg">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ays-survey-answer-icon-box">
                                                                        <span class="ays-survey-answer-icon ays-survey-answer-delete appsMaterialWizButtonPapericonbuttonEl" <?php echo count( $question['answers'] ) > 1 ? '' : 'style="visibility: hidden;"'; ?> data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ays-survey-answer-image-container" <?php echo $answer['image'] == '' ? 'style="display: none;"' : ''; ?> >
                                                            <div class="ays-survey-answer-image-body">
                                                                <div class="ays-survey-answer-image-wrapper">
                                                                    <div class="ays-survey-answer-image-wrapper-delete-wrap">
                                                                        <div role="button" class="ays-survey-answer-image-wrapper-delete-cont removeAnswerImage">
                                                                            <span class="exportIcon">
                                                                                <div class="ays-survey-answer-image-wrapper-delete-icon-cont">
                                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <img class="ays-survey-answer-img" src="<?php echo esc_url($answer['image']); ?>" tabindex="0" aria-label="Captionless image" />
                                                                    <input type="hidden" class="ays-survey-answer-img-src" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][answers][<?php echo esc_attr($answer['id']); ?>][image]" value="<?php echo esc_attr($answer['image']); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Answers end -->
                                                    <?php
                                                endforeach;

                                                elseif ($question_type_Text_ShortText_Number):

                                                    $selected_question_type_class = '';
                                                    $selected_question_type_placeholder = '';
                                                    switch ($selected_question_type) {
                                                        case 'text':
                                                            $selected_question_type_class = 'ays-survey-question-type-text-box ays-survey-question-type-all-text-types-box';
                                                            $selected_question_type_placeholder = $question_types_placeholders['text'];
                                                            break;
                                                        case 'short_text':
                                                            $selected_question_type_class = 'ays-survey-question-type-short-text-box ays-survey-question-type-all-text-types-box';
                                                            $selected_question_type_placeholder = $question_types_placeholders['short_text'];
                                                            break;
                                                        case 'number':
                                                            $selected_question_type_class = 'ays-survey-question-type-number-box ays-survey-question-type-all-text-types-box';
                                                            $selected_question_type_placeholder = $question_types_placeholders['number'];
                                                            break;
                                                        case 'phone':
                                                            $selected_question_type_class = 'ays-survey-question-type-number-box ays-survey-question-type-all-text-types-box';
                                                            $selected_question_type_placeholder = $question_types_placeholders['phone'];
                                                            break;
                                                        case 'email':
                                                            $selected_question_type_class = 'ays-survey-question-type-email-box ays-survey-question-type-all-text-types-box';
                                                            $selected_question_type_placeholder = $question_types_placeholders['email'];
                                                            break;
                                                        case 'name':
                                                            $selected_question_type_class = 'ays-survey-question-type-name-box ays-survey-question-type-all-text-types-box';
                                                            $selected_question_type_placeholder = $question_types_placeholders['name'];
                                                            break;
                                                        default:
                                                            $selected_question_type_class = 'ays-survey-question-type-text-box ays-survey-question-type-all-text-types-box';
                                                            $selected_question_type_placeholder = $question_types_placeholders['text'];
                                                            break;
                                                    }
                                                    ?>
                                                    <div class="ays-survey-question-types">
                                                        <div class="ays-survey-answer-row" data-id="1">
                                                            <div class="ays-survey-question-types-conteiner">
                                                                <div class="ays-survey-question-types-box isDisabled <?php echo esc_attr($selected_question_type_class); ?>">
                                                                    <div class="ays-survey-question-types-box-body">
                                                                        <div class="ays-survey-question-types-input-box">
                                                                            <input type="text" class="ays-survey-remove-default-border ays-survey-question-types-input ays-survey-question-types-input-with-placeholder" autocomplete="off" tabindex="0" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][placeholder]" placeholder="<?php echo esc_attr($selected_question_type_placeholder); ?>" style="font-size: 14px;" value="<?php echo esc_attr($question['options']['placeholder']); ?>">
                                                                        </div>
                                                                        <div class="ays-survey-question-types-input-underline"></div>
                                                                        <div class="ays-survey-question-types-input-focus-underline"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="ays-survey-question-text-types-note-text"><span>* <?php echo esc_html__('You can insert your custom placeholder for input. Note your custom text will not be translated', "survey-maker"); ?></span></div>
                                                                <?php if($selected_question_type == "phone"): ?>
                                                                    <div class="ays-survey-question-types-box-phone-type-note">
                                                                        <?php
                                                                            echo "<span>" . esc_html__( "Note: Phone question type can contain only numbers and the following signs + ( ) -", "survey-maker" ) . "</span>";
                                                                        ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                endif;
                                                ?>
                                                </div>
                                                <?php if ($question['type'] == 'star'): ?>
                                                    <div class="ays-survey-question-types_star">
                                                        <div class="ays-survey-answer-row" data-id="1">
                                                            <div class="ays-survey-question-types-conteiner">
                                                                <div class="ays-survey-question-types-box<?php echo esc_attr($survey_default_type); ?>">
                                                                    <div class="ays-survey-question-types-box-body ays-survey-body-for-select-lenght">
                                                                        <div class="ays-survey-question-types_star_span">
                                                                            <span style="font-size: 25px;" class="ays-survey_star_span">1 to</span>
                                                                        </div>
                                                                        <div class="ays-survey-question-types-for-select-lenght">
                                                                            <select class="ays-survey-choose-for-start-select-lenght" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][star_scale_length]">
                                                                                <?php
                                                                                    $scale_options = "" ;
                                                                                    $star_scale_length  = isset($question['options']['star_scale_length']) && $question['options']['star_scale_length'] != "" ? $question['options']['star_scale_length'] : "5";
                                                                                    for($s_i = 3; $s_i <= 10; $s_i++){
                                                                                        $scale_option_selected = "";
                                                                                        $scale_option_selected = ($star_scale_length == $s_i) ? "selected" : "";
                                                                                        $scale_options .= "<option value=".$s_i." ".$scale_option_selected.">".$s_i."</option>";
                                                                                    }
                                                                                    echo $scale_options;
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ays-survey-answer-box ays-survey-not-adding-enter-box" style="margin: 20px 0px;">
                                                                        <span class="ays_survey_star_span">1</span>
                                                                        <input type="text" autocomplete="off" class="ays-survey-input ays-survey-input-star-1 notAdding ays-survey-without-enter" autocomplete="off" tabindex="0" placeholder="<?php echo esc_attr__( "Label (Optional)", "survey-maker" ); ?>" style="font-size: 14px;" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][star_1]" value="<?php echo esc_attr($question['options']['star_1']); ?>">
                                                                        <div class="ays-survey-question-types-input-underline-linear-scale">
                                                                        </div> 
                                                                        <div class="ays-survey-input-underline-animation ays-survey-input-underline-animation-linear-scale"></div>
                                                                    </div>
                                                                    <div class="ays-survey-answer-box ays-survey-not-adding-enter-box">
                                                                        <span class="ays_survey_star_span ays_survey_linear_scale_span_changeable"><?php echo esc_html($star_scale_length);?></span>
                                                                        <input type="text" autocomplete="off" class="ays-survey-input ays-survey-input-star-2 notAdding ays-survey-without-enter" autocomplete="off" tabindex="0" placeholder="<?php echo esc_attr__( "Label (Optional)", "survey-maker" ); ?>" style="font-size: 14px;" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][star_2]" value="<?php echo esc_attr($question['options']['star_2']); ?>">
                                                                        <div class="ays-survey-question-types-input-underline-linear-scale"></div> 
                                                                        <div class="ays-survey-input-underline-animation ays-survey-input-underline-animation-linear-scale"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                //Question Type Date
                                                elseif($question['type'] == 'date'): 
                                                ?>
                                                <div class="ays-survey-question-types_date">
                                                    <div class="ays-survey-answer-row" data-id="1">
                                                        <div class="ays-survey-question-types-conteiner">
                                                            <div class="ays-survey-question-types-box isDisabled">
                                                                <div class="ays-survey-question-types-box-body">
                                                                    <div class="ays-survey-answer-box ays_survey_date">
                                                                        <input type="text" autocomplete="off" tabindex="0" value="<?php echo esc_attr__("Month, day, year", "survey-maker"); ?>" disabled="" dir="auto">
                                                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
		                                        //Question Type time
                                                elseif($question['type'] == 'time'):
                                                ?>
                                                <div class="ays-survey-question-types_time">
                                                    <div class="ays-survey-answer-row" data-id="1">
                                                        <div class="ays-survey-question-types-conteiner">
                                                            <div class="ays-survey-question-types-box isDisabled">
                                                                <div class="ays-survey-question-types-box-body">
                                                                    <div class="ays-survey-answer-box ays_survey_time">
                                                                        <input type="text" autocomplete="off" tabindex="0" value="<?php echo esc_attr__("Time", "survey-maker"); ?>" disabled="" dir="auto">
                                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                elseif($question['type'] == 'date_time'):
                                                ?>
                                                <div class="ays-survey-question-types_date_time">
                                                    <div class="ays-survey-answer-row" data-id="1">
                                                        <div class="ays-survey-question-types-conteiner">
                                                            <div class="ays-survey-question-types-box isDisabled">
                                                                <div class="ays-survey-question-types-box-body">
                                                                    <div class="ays-survey-answer-box ays_survey_time">
                                                                        <input type="text" autocomplete="off" tabindex="0" value="Month, day, year, hour, minute" disabled="" dir="auto">
                                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                endif;
                                                ?>
                                                <div class="ays-survey-other-answer-and-actions-row">
                                                <?php
                                                    if($question_type_Radio_Checkbox_Select):
                                                        $selected_other_anser_i_class = '';
                                                        switch ($selected_question_type) {
                                                            case 'radio':
                                                                $selected_other_anser_i_class = 'ays_fa_circle_thin';
                                                                break;
                                                            case 'select':
                                                                $selected_other_anser_i_class = 'ays_fa_circle_thin';
                                                                break;
                                                            case 'checkbox':
                                                                $selected_other_anser_i_class = 'ays_fa_square_o';
                                                                break;    
                                                            default:
                                                                $selected_other_anser_i_class = 'ays_fa_circle_thin';
                                                                break;
                                                        }
                                                    ?>
                                                    <div class="ays-survey-answer-row ays-survey-other-answer-row" <?php echo esc_attr($question['user_variant']) ? '' : 'style="display: none;"'; ?>>
                                                        <div class="ays-survey-answer-wrap">
                                                            <div class="ays-survey-answer-dlg-dragHandle">
                                                                <div class="ays-survey-icons invisible">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                                                <div class="ays-survey-icons">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/<?php echo esc_attr($selected_anser_i_class); ?>.svg">
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-answer-box-wrap">
                                                                <div class="ays-survey-answer-box">
                                                                    <div class="ays-survey-answer-box-input-wrap">
                                                                        <input type="text" disabled class="ays-survey-input ays-survey-input-other-answer" placeholder="<?php echo esc_attr__( 'Other...', "survey-maker" ); ?>" value="<?php echo esc_attr__( 'Other...', "survey-maker" ); ?>">
                                                                        <div class="ays-survey-input-underline"></div>
                                                                        <div class="ays-survey-input-underline-animation"></div>
                                                                    </div>
                                                                    <div class="ays-survey-answer-icon-box">
                                                                        <span class="ays-survey-answer-icon ays-survey-other-answer-delete appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-answer-row" <?php echo $question['type'] == 'star' || $question['type'] == 'date' || $question['type'] == 'time' || $question['type'] == 'date_time' ? 'style="display:none;"' : '' ;?> >
                                                        <div class="ays-survey-answer-wrap">
                                                            <div class="ays-survey-answer-dlg-dragHandle" >
                                                                <div class="ays-survey-icons invisible">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                                                <div class="ays-question-img-icon-content">
                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/<?php echo esc_attr($selected_anser_i_class); ?>.svg">
                                                                </div>
                                                            </div>
                                                            <div class="ays-survey-answer-box-wrap">
                                                                <div class="ays-survey-answer-box ays-survey-action-add-answer-box-main-new">
                                                                    <div class="ays-survey-action-add-answer appsMaterialWizButtonPapericonbuttonEl ays-survey-action-add-answer-box-new" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add option',"survey-maker")?>">
                                                                        <div class="ays-question-img-icon-content">
                                                                            <div class="ays-question-img-icon-content-div">
                                                                                <div class="ays-survey-icons">
                                                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                                                                                </div>
                                                                                <div class="ays-survey-action-add-answer-text">
                                                                                    <?php  echo esc_html__('Add option' , "survey-maker"); ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                        $show_add_other_answer_button = '';
                                                                        if( $selected_question_type == 'select' ){
                                                                            $show_add_other_answer_button = 'display: none;';
                                                                        }elseif( $question['user_variant'] ){
                                                                            $show_add_other_answer_button = 'display: none';
                                                                        }
                                                                    ?>
                                                                    <div class="ays-survey-other-answer-add-wrap" style="<?php echo esc_attr($show_add_other_answer_button ); ?>">
                                                                        <span class=""><?php echo esc_html__( 'or', "survey-maker" ) ?></span>
                                                                        <div class="ays-survey-other-answer-container ays-survey-other-answer-add">
                                                                            <div class="ays-survey-other-answer-container-overlay"></div>
                                                                            <span class="ays-survey-other-answer-content">
                                                                                <span class="appsMaterialWizButtonPaperbuttonLabel quantumWizButtonPaperbuttonLabel"><?php echo esc_html__( 'add "Other"', "survey-maker" ) ?></span>
                                                                                <input type="checkbox" <?php echo $question['user_variant'] ? 'checked' : ''; ?> class="display_none ays-survey-other-answer-checkbox" value="on" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][user_variant]">
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    endif;
                                                    ?>
                                                </div>
                                                <div class="ays-survey-row-divider"><div></div></div>
                                                <div class="ays-survey-question-more-options-wrap">
                                                    <!-- Min -->
                                                    <div class="ays-survey-question-more-option-wrap ays-survey-question-min-selection-count <?php echo $selected_question_type == "checkbox" && $question['options']['enable_max_selection_count'] ? "" : "display_none"; ?>">
                                                        <div class="ays-survey-answer-box" style="margin: 20px 0px;">
                                                            <label class="ays-survey-question-min-selection-count-label">
                                                                <span><?php echo esc_html__( "Minimum selection number", "survey-maker" ); ?></span>
                                                                <input type="number" class="ays-survey-input ays-survey-min-votes-field" autocomplete="off" tabindex="0" 
                                                                    placeholder="<?php echo esc_attr__( "Minimum selection number", "survey-maker" ); ?>" style="font-size: 14px;"
                                                                    name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][min_selection_count]"
                                                                    value="<?php echo esc_attr($question['options']['min_selection_count']); ?>" min="0">
                                                                <div class="ays-survey-input-underline"></div> 
                                                                <div class="ays-survey-input-underline-animation"></div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!-- Max -->
                                                    <div class="ays-survey-question-more-option-wrap ays-survey-question-max-selection-count <?php echo $selected_question_type == "checkbox" && $question['options']['enable_max_selection_count'] ? "" : "display_none"; ?>">
                                                        <input type="checkbox" class="display_none ays-survey-question-max-selection-count-checkbox" <?php echo $question['options']['enable_max_selection_count'] ? 'checked' : ''; ?> name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][enable_max_selection_count]" value="on">
                                                        <div class="ays-survey-answer-box" style="margin: 20px 0px;">
                                                            <label class="ays-survey-question-max-selection-count-label">
                                                                <span><?php echo esc_html__( "Maximum selection number", "survey-maker" ); ?></span>
                                                                <input type="number" class="ays-survey-input ays-survey-max-votes-field" autocomplete="off" tabindex="0" 
                                                                    placeholder="<?php echo esc_attr__( "Maximum selection number", "survey-maker" ); ?>" style="font-size: 14px;"
                                                                    name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][max_selection_count]"
                                                                    value="<?php echo esc_attr($question['options']['max_selection_count']); ?>" min="0">
                                                                <div class="ays-survey-input-underline"></div> 
                                                                <div class="ays-survey-input-underline-animation"></div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!-- Text limitations -->
                                                    <div class="ays-survey-question-word-limitations <?php echo (($selected_question_type == "short_text" || $selected_question_type == "text") && $question['options']['enable_word_limitation']) ? "" : "display_none"; ?>">
                                                        <input type="checkbox"
                                                               class="display_none ays-survey-question-word-limitations-checkbox" 
                                                               <?php echo $question['options']['enable_word_limitation'] ? 'checked' : ''; ?> 
                                                               name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][enable_word_limitation]" 
                                                               value="on">

                                                        <div class="ays-survey-question-more-option-wrap-limitations ays-survey-question-word-limit-by ">
                                                            <div class="ays-survey-question-word-limit-by-text">
                                                                <span><?php echo esc_html__("Limit by", "survey-maker"); ?></span>
                                                            </div>
                                                            <div class="ays-survey-question-word-limit-by-select">
                                                                <select name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][limit_by]" class="ays-text-input ays-text-input-short">
                                                                    <option value="char" <?php echo ($question['options']['limit_by'] == "char") ? "selected": ""; ?>> <?php echo esc_html__("Characters", "survey-maker")?> </option>
                                                                    <option value="word" <?php echo ($question['options']['limit_by'] == "word") ? "selected": ""; ?>> <?php echo esc_html__("Word", "survey-maker")?> </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="ays-survey-row-divider"><div></div></div>
                                                        <div class="ays-survey-question-more-option-wrap-limitations ">
                                                            <div class="ays-survey-answer-box">
                                                                <label class="ays-survey-question-limitations-label">
                                                                    <span><?php echo esc_html__( "Length", "survey-maker" ); ?></span>
                                                                    <input type="number" 
                                                                    name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][limit_length]"        
                                                                        class="ays-survey-input ays-survey-limit-length-input" autocomplete="off" tabindex="0" 
                                                                        placeholder="<?php echo esc_attr__( "Length", "survey-maker" ); ?>" style="font-size: 14px;"
                                                                        value="<?php echo esc_attr($question['options']['limit_length']); ?>" min="0">
                                                                    <div class="ays-survey-input-underline"></div> 
                                                                    <div class="ays-survey-input-underline-animation"></div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="ays-survey-row-divider"><div></div></div>
                                                        <div class="ays-survey-question-more-option-wrap-limitations ays-survey-question-word-show-word ">
                                                            <label class="ays-survey-question-limitations-counter-label">
                                                                <span><?php echo esc_html__( "Show word/character counter", "survey-maker" ); ?></span>
                                                                <input type="checkbox"
                                                                       name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][limit_counter]" 
                                                                       <?php echo $question['options']['limit_counter'] ? "checked" : ""; ?>
                                                                       autocomplete="off" 
                                                                       value="on" 
                                                                       class="ays-survey-text-limitations-counter-input">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!-- Number limitations start -->
                                                    <div class="ays-survey-question-number-limitations <?php echo ( ($selected_question_type == "number" || $selected_question_type == "phone") && $question['options']['enable_number_limitation'] ) ? "" : "display_none"; ?>">
                                                        <input type="checkbox"
                                                               class="display_none ays-survey-question-number-limitations-checkbox" 
                                                               <?php echo $question['options']['enable_number_limitation'] ? 'checked' : ''; ?> 
                                                               name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][enable_number_limitation]" 
                                                               value="on">
                                                        <!-- Min Number -->
                                                        <?php if($selected_question_type != "phone"): ?>
                                                        <div class="ays-survey-question-number-min-box ays-survey-question-number-votes-count-box" style="margin: 20px 0px;">
                                                            <label class="ays-survey-question-number-min-selection-label">
                                                                <span><?php echo esc_html__( "Minimum value", "survey-maker" ); ?></span>
                                                                <input type="number" class="ays-survey-input ays-survey-number-min-votes ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                                                    placeholder="<?php echo esc_attr__( "Minimum value", "survey-maker" ); ?>" style="font-size: 14px;"
                                                                    name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][number_min_selection]"
                                                                    value="<?php echo esc_attr($question['options']['number_min_selection']); ?>"
                                                                    >
                                                                <div class="ays-survey-input-underline"></div> 
                                                                <div class="ays-survey-input-underline-animation"></div>
                                                            </label>
                                                        </div>
                                                        <!-- Max Number -->
                                                        <div class="ays-survey-question-number-max-box ays-survey-question-number-votes-count-box" style="margin: 20px 0px;">
                                                            <label class="ays-survey-question-number-max-selection-label">
                                                                <span><?php echo esc_html__( "Maximum value", "survey-maker" ); ?></span>
                                                                <input type="number" class="ays-survey-input ays-survey-number-max-votes ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                                                    placeholder="<?php echo esc_attr__( "Maximum value", "survey-maker" ); ?>" style="font-size: 14px;"
                                                                    name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][number_max_selection]"
                                                                    value="<?php echo esc_attr($question['options']['number_max_selection']); ?>"
                                                                     >
                                                                <div class="ays-survey-input-underline"></div> 
                                                                <div class="ays-survey-input-underline-animation"></div>
                                                            </label>
                                                        </div>
				                                        <?php endif; ?>
                                                        <!-- Error message -->
                                                        <div class="ays-survey-question-number-votes-count-box" style="margin: 20px 0px;">                                                        
                                                            <label class="ays-survey-question-number-min-selection-label">
                                                                <span><?php echo esc_html__( "Error message", "survey-maker" ); ?></span>
                                                                <input type="text"
                                                                    class="ays-survey-input ays-survey-number-error-message ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                                                    placeholder="<?php echo esc_attr__( "Error Message", "survey-maker" ); ?>" style="font-size: 14px;"
                                                                    name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][number_error_message]"
                                                                    value="<?php echo esc_attr($question['options']['number_error_message']); ?>"
                                                                    >
                                                                    <div class="ays-survey-input-underline"></div> 
                                                                <div class="ays-survey-input-underline-animation"></div>
                                                            </label>
                                                        </div>
                                                        <!-- Show error message -->
                                                        <div class="ays-survey-question-number-votes-count-box" style="margin: 20px 0px;">                                                        
                                                            <label class="ays-survey-question-number-min-selection-label ays-survey-question-number-message-label">
                                                                <span><?php echo esc_html__( "Show error message", "survey-maker" ); ?></span>
                                                                <input type="checkbox"
                                                                    name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][enable_number_error_message]" 
                                                                    <?php echo $question['options']['enable_number_error_message'] ? "checked" : ""; ?>
                                                                    autocomplete="off" 
                                                                    value="on" 
                                                                    class="ays-survey-number-enable-error-message">
                                                            </label>
                                                        </div>
                                                        <hr>
                                                        <!-- Char length -->
                                                        <div class="ays-survey-question-number-votes-count-box ">
                                                            <div class="ays-survey-answer-box">
                                                                <label class="ays-survey-question-number-min-selection-label">
                                                                    <span><?php echo esc_html__( "Length", "survey-maker" ); ?></span>
                                                                    <input type="number" 
                                                                    name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][number_limit_length]"        
                                                                        class="ays-survey-input ays-survey-number-limit-length ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                                                        placeholder="<?php echo esc_attr__( "Length", "survey-maker" ); ?>" style="font-size: 14px;"
                                                                        value="<?php echo esc_attr($question['options']['number_limit_length']); ?>" min="0">
                                                                    <div class="ays-survey-input-underline"></div> 
                                                                    <div class="ays-survey-input-underline-animation"></div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <!-- Show Char length -->
                                                        <div class="ays-survey-question-number-votes-count-box ">
                                                            <label class="ays-survey-question-number-min-selection-label ays-survey-question-number-message-label">
                                                                <span><?php echo esc_html__( "Show character counter", "survey-maker" ); ?></span>
                                                                <input type="checkbox"
                                                                       name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][enable_number_limit_counter]" 
                                                                       <?php echo $question['options']['enable_number_limit_counter'] ? "checked" : ""; ?>
                                                                       autocomplete="off" 
                                                                       value="on" 
                                                                       class="ays-survey-number-number-limit-length">
                                                            </label>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <!-- Number limitations end -->
                                                </div>
                                                <div class="ays-survey-actions-row">
                                                    <div class="ays-survey-actions-left">
                                                        <div class="ays-survey-actions-answers-bulk-add">
                                                            <div class="ays-survey-answer-icon-box">
                                                                <div class="ays-survey-action-bulk-add-answer">
                                                                    <div class="ays-survey-action-bulk-add-answer-content">
                                                                        <div class="ays-survey-action-bulk-add-answer-div">
                                                                            <div class="ays-survey-icons ays-survey-action-bulk-add-answer-icon">
                                                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/download.svg" class="ays-survey-action-bulk-add-answer-icon-svg">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ays-survey-action-bulk-add-answer-text">
                                                                        <a href="https://ays-pro.com/wordpress/survey-maker" style="color: gray;" target="blank"><?php echo esc_html__('Bulk add',"survey-maker")?> (PRO)</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ays-survey-actions">
                                                        <div class="ays-survey-answer-icon-box">
                                                            <div class="ays-survey-action-duplicate-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Duplicate',"survey-maker")?>">
                                                                <div class="ays-question-img-icon-content">
                                                                    <div class="ays-question-img-icon-content-div">
                                                                        <div class="ays-survey-icons">
                                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/duplicate.svg">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ays-survey-answer-icon-box">
                                                            <div class="ays-survey-action-delete-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                                                <div class="ays-question-img-icon-content">
                                                                    <div class="ays-question-img-icon-content-div">
                                                                        <div class="ays-survey-icons">
                                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash.svg">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ays-survey-vertical-divider"><div></div></div>
                                                        <div class="ays-survey-answer-elem-box">
                                                            <label>
                                                                <span>
                                                                    <span><?php echo esc_html__( 'Required', "survey-maker" ); ?></span>
                                                                </span>
                                                                <input type="checkbox" <?php echo $question['options']['required'] ? 'checked' : ''; ?> class="display_none ays-survey-input-required-question ays-switch-checkbox" name="<?php echo esc_attr($html_name_prefix); ?>sections[<?php echo esc_attr($section['id']); ?>][questions][<?php echo esc_attr($question['id']); ?>][options][required]" value="on">
                                                                <div class="switch-checkbox-wrap" aria-label="Required" tabindex="0" role="checkbox">
                                                                    <div class="switch-checkbox-track"></div>
                                                                    <div class="switch-checkbox-ink"></div>
                                                                    <div class="switch-checkbox-circles">
                                                                        <div class="switch-checkbox-thumb"></div>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="ays-survey-answer-icon-box ays-survey-question-more-actions droptop">
                                                            <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                                                <div class="ays-question-img-icon-content">
                                                                    <div class="ays-question-img-icon-content-div">
                                                                        <div class="ays-survey-icons">
                                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <button type="button" class="dropdown-item ays-survey-question-action" data-action="move-to-section"><?php echo esc_html__( 'Move to section', "survey-maker" ); ?></button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action" data-action="max-selection-count-enable"><?php echo esc_html__( 'Enable selection count', "survey-maker" ); ?></button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action" data-action="word-limitation-enable"><?php echo esc_html__( 'Enable word limitation', "survey-maker" ); ?></button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action" data-action="number-word-limitation-enable"><?php echo esc_html__( 'Enable limitation', "survey-maker" ); ?></button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action" data-action="copy-question-id">
                                                                    <i><?php echo esc_html__( 'Question ID', "survey-maker" ) . ": "; ?></i>
                                                                    <strong class="ays-survey-shortcode-box" onClick="selectElementContents(this)" style="font-size:16px; font-style:normal;" class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Click for copy',"survey-maker");?>" > <?php echo esc_attr($question['id']); ?></strong>
                                                                </button>                                                                
                                                                <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro ays-survey-question-actions-pro-button <?php echo in_array( $survey_default_type, $logic_jump_question_types ) ? '' : 'display_none'; ?>" data-action="go-to-section-based-on-answers-enable" data-video-url="https://www.youtube.com/watch?v=BTeCGFKJmlk" data-option-title="<?php echo esc_attr__('Logic Jump',"survey-maker")?>" data-option-text="Logic Jump allows to create <strong> responsive surveys </strong> that save the survey taker's time by skipping irrelevant questions or sections. Add more logic to your surveys with a few clicks by choosing the necessary set of questions you want to follow a particular question. Note that this feature works only with <strong> “Radio” </strong> and <strong> “Yes or No” </strong> questions. ">
                                                                    <?php echo esc_html__( 'Logic jump', "survey-maker" ); ?> (Pro) 
                                                                </button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-user-explanation" style="font-style: italic;">
                                                                    <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'User explanation', "survey-maker" ); ?> (Pro) </a>
                                                                </button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="disable-hide-results" style="font-style: italic;">
                                                                    <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Hide results', "survey-maker" ); ?> (Pro) </a>
                                                                </button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-admin-note">
                                                                    <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Admin note', "survey-maker" ); ?> (Pro) </a>
                                                                </button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro ays-survey-question-actions-pro-button" data-action="enable-url-parameter" data-video-url="https://www.youtube.com/watch?v=1nvOtwlmVAo" data-option-title="<?php echo esc_attr__('URL parametr',"survey-maker")?>" data-option-text="The URL parameter is a great tool <strong> to help you collect and analyze your submission results easier. </strong> It is handy when you need to share your survey on various platforms to identify where the respondents came from. You can also use this feature when you know some information about your survey takers and want to save their time and ensure the accuracy of the survey. URL Parameter is more popular with the <strong> hidden question type </strong> because you can share the surveys with specific scenarios. For instance, if you need to send your survey to the Marketing and Development team employees, you can assign URL parameters, and it will be easier to track and analyze the results separately.  ">
                                                                    <a href="#" ><?php echo esc_html__( 'URL parametr', "survey-maker" ); ?> (Pro) </a>
                                                                </button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-value-prefix">
                                                                    <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Value prefix', "survey-maker" ); ?> (Pro) </a>
                                                                </button>
                                                                <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-value-suffix">
                                                                    <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Value suffix', "survey-maker" ); ?> (Pro) </a>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Questons end -->
                                        <?php
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                            <div class="ays-survey-section-footer-wrap">
                                <div class="ays-survey-add-question-from-section-bottom">
                                    <div class="ays-survey-add-question-to-this-section ays-survey-add-question-button-container" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add Question',"survey-maker"); ?>">
                                        <div class="ays-survey-add-question-button appsMaterialWizButtonPapericonbuttonEl">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                    <div class="ays-survey-icons">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                                                    </div>
                                                </div>
                                            </div>
                                            <span><?php echo esc_html__('Add Question',"survey-maker")?></span>
                                        </div>
                                    </div>
                                    <div class="ays-survey-add-new-section-from-bottom ays-survey-add-question-button-container" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add Section',"survey-maker"); ?>">
                                        <div class="ays-survey-add-question-button appsMaterialWizButtonPapericonbuttonEl">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                    <div class="ays-survey-icons">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-section.svg">
                                                    </div>
                                                </div>
                                            </div>
                                            <span><?php echo esc_html__('Add Section',"survey-maker")?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sections end -->
                <?php
                endforeach;
            }
            ?>
            </div>
        </div>
        <div class="col-sm-1">
            <input type="hidden" class="ays-survey-scroll-section" value="1">
            <!-- Bar Menu  Start-->
            <div class="aysFormeditorViewFatRoot aysFormeditorViewFatDesktop">
                <div class="aysFormeditorViewFatPositioner">
                    <div class="aysFormeditorViewFatCard">
                        <div class="dropleft">
                            <div data-action="add-question" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add Question',"survey-maker")?>">
                                <div class="appsMaterialWizButtonPapericonbuttonEl">
                                    <div class="ays-question-img-icon-content">
                                        <div class="ays-question-img-icon-content-div">
                                            <div class="ays-survey-icons">
                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-menu"></div>
                        </div>
                        <!-- 
                        <div data-action="import-question" class="ays-survey-general-action">
                            <div class="appsMaterialWizButtonPapericonbuttonEl">
                                <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                        <div class="ays-survey-icons">
                                            <div class="aysMaterialIconIconImage ays-qp-icon-import-question-m2" aria-hidden="true">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-action="add-section-header" data-action-properties="enabled" class="ays-survey-general-action">
                            <div class="appsMaterialWizButtonPapericonbuttonEl">
                                <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                        <div class="ays-survey-icons">
                                            <div class="aysMaterialIconIconImage ays-qp-icon-add-header" aria-hidden="true">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-action="add-image" class="ays-survey-general-action">
                            <div class="appsMaterialWizButtonPapericonbuttonEl">
                                <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                        <div class="ays-survey-icons">
                                            <div class="aysMaterialIconIconImage ays-qp-icon-image-m2" aria-hidden="true">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-action="add-video" class="ays-survey-general-action">
                            <div class="appsMaterialWizButtonPapericonbuttonEl">
                                <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                        <div class="ays-survey-icons">
                                            <div class="aysMaterialIconIconImage ays-qp-icon-video-m2" aria-hidden="true">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
                        <div data-action="add-section" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="<?php echo esc_attr__('Add Section',"survey-maker")?>">
                            <div class="appsMaterialWizButtonPapericonbuttonEl">
                                <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                        <div class="ays-survey-icons">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-section.svg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-action="open-modal" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="<?php echo esc_attr__('Import questions (Pro)',"survey-maker")?>">
                            <div class="appsMaterialWizButtonPapericonbuttonEl ays-survey-icon-svg">
                                <a style="box-shadow: unset;outline: unset;" href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/import.svg"></a>
                            </div>
                        </div>
                        <div data-action="make-questions-required" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="left" data-flag="off" data-content="<?php echo esc_attr__('Make questions required',"survey-maker")?>">                            
                            <input type="checkbox" hidden class="make-questions-required-checkbox">
                            <div class="appsMaterialWizButtonPapericonbuttonEl ays-survey-icon-svg">
                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/asterisk.svg">
                            </div>
                        </div>
                        <div data-action="save-changes" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="<?php echo esc_attr__('Save changes',"survey-maker")?>">
                            <div class="appsMaterialWizButtonPapericonbuttonEl ays-survey-icon-svg">
                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/save-outline.svg">
                            </div>
                        </div>
                        <div class="ays-survey-general-action-max-inps-vars display_none" data-max-inp-vars="<?php echo esc_attr($survey_max_input_vars_server); ?>" data-action="save-changes" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="left">
                            <div class="appsMaterialWizButtonPapericonbuttonEl ays-survey-icon-svg">
                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/warning.png">
                            </div>
                        </div>
                        <div data-action="enable-answer-points" style="background-color: #3571c40d;" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="<?php echo esc_attr__('Enable points for answers (PRO) ', "survey-maker")?>">
                            <div class="appsMaterialWizButtonPapericonbuttonEl ays-survey-icon-svg">
                                <a style="box-shadow: unset;outline: unset;" href="https://ays-pro.com/wordpress/survey-maker" target="_blank">
                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/number-1-O.svg" width="24" height="24">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bar Menu  End-->

            <!-- Question to clone -->
            <div class="ays-question-to-clone display_none">
                <div class="ays-survey-question-answer-conteiner ays-survey-new-question" data-name="questions_add" data-id="1">
                    <input type="hidden" class="ays-survey-question-collapsed-input" value="expanded">
                    <div class="ays-survey-question-wrap-collapsed display_none">
                        <div class="ays-survey-question-dlg-dragHandle">
                            <div class="ays-survey-icons ays-survey-icons-hidden">
                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-horizontal.svg">
                            </div>
                        </div>
                        <div class="ays-survey-question-wrap-collapsed-contnet ays-survey-question-wrap-collapsed-contnet-box">
                            <div class="ays-survey-question-wrap-collapsed-contnet-text"></div>
                            <div>
                                <div class="ays-survey-action-expand-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Expand question',"survey-maker")?>">
                                    <div class="ays-question-img-icon-content">
                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/expand-section.svg">
                                    </div>
                                </div>
                                <div class="ays-survey-answer-icon-box ays-survey-question-more-actions droptop">
                                    <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                        <div class="ays-question-img-icon-content">
                                            <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button type="button" class="dropdown-item ays-survey-action-delete-question"><?php echo esc_html__( 'Delete question', "survey-maker" ); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ays-survey-question-wrap-expanded">
                        <div class="ays-survey-question-conteiner">
                            <div class="ays-survey-question-dlg-dragHandle">
                                <div class="ays-survey-icons ays-survey-icons-hidden">
                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-horizontal.svg">
                                    <input type="hidden" class="ays-survey-question-ordering" value="1">
                                </div>
                            </div>
                            <div class="ays-survey-question-row-wrap">
                                <div class="ays-survey-question-row">
                                    <div class="ays-survey-question-box">
                                        <div class="ays-survey-question-input-box">
                                            <textarea type="text" class="ays-survey-remove-default-border ays-survey-question-input-textarea ays-survey-question-input ays-survey-input" placeholder="<?php echo esc_attr__( 'Question', "survey-maker" ); ?>"style="height: 24px;"></textarea>
                                            <input type="hidden" value="">
                                            <div class="ays-survey-input-underline"></div>
                                            <div class="ays-survey-input-underline-animation"></div>
                                        </div>
                                        <div class="ays-survey-question-preview-box display_none"></div>
                                    </div>
                                    <div class="ays-survey-question-img-icon-box">
                                        <div class="ays-survey-open-question-editor appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Open editor',"survey-maker")?>">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                    <div class="ays-survey-icons">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/edit-content.svg">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="ays-survey-open-question-editor-flag" value="off">
                                        </div>
                                    </div>
                                    <div class="ays-survey-question-img-icon-box">
                                        <div class="ays-survey-add-question-image appsMaterialWizButtonPapericonbuttonEl" data-type="questionImgButton" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Add image',"survey-maker")?>">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                    <div class="ays-survey-icons">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/insert-photo.svg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-question-type-box">
                                        <select tabindex="-1" class="ays-survey-question-type" aria-hidden="true">
                                            <?php
                                                foreach ($question_types as $type_slug => $type):
                                                    ?>
                                                    <option value="<?php echo esc_attr($type_slug); ?>"><?php echo esc_attr($type); ?></option>
                                                    <?php
                                                endforeach;
                                            ?>
                                            <option value="matrix_scale" disabled>Matrix Scale (Pro)</option>                                            
                                            <option value="matrix_scale_checkbox" disabled>Matrix Scale Checkbox (Pro)</option>
                                            <option value="nps" disabled>Net Promoter Score (Pro)</option>
                                            <option value="ranking" disabled>Ranking (Pro)</option>
                                            <option value="star_list" disabled>Star List (Pro)</option>
                                            <option value="slider_list" disabled>Slider List (Pro)</option>
                                            <option value="linear_scale" disabled>Linear Scale (Pro)</option>
                                            <option value="slider" disabled>Slider (Pro)</option>
                                            <option value="uplaod" disabled>Upload (Pro)</option>
                                            <option value="hidden" disabled>Hidden (Pro)</option>
                                            <option value="html" disabled>HTML (Pro)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-check-type-before-change" value="<?php echo 'radio'; ?>">
                                        <a href="https://ays-pro.com/blog/survey-question-types" target="_blank" class="ays-survey-view-all-question-types-button"><?php echo esc_html__('View all question types', "survey-maker"); ?></a>
                                        <a href="https://www.youtube.com/watch?v=jyEXM28vx7I" target="_blank" class="ays-survey-view-all-question-types-button"><?php echo esc_html__('All question types (video guide)', "survey-maker"); ?></a>
                                    </div>
                                </div>
                                <div>
                                    <div class="ays-survey-question-img-icon-box">
                                        <div class="ays-survey-action-collapse-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Collapse',"survey-maker")?>">
                                            <div class="ays-question-img-icon-content">
                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/collapse-section.svg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ays-survey-question-image-container" style="display: none;" >
                            <div class="ays-survey-question-image-body">
                                <div class="ays-survey-question-image-wrapper aysFormeditorViewMediaImageWrapper">
                                    <div class="ays-survey-question-image-pos aysFormeditorViewMediaImagePos">
                                        <div class="d-flex">
                                            <div class="dropdown mr-1">
                                                <div class="ays-survey-question-edit-menu-button dropdown-menu-actions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <div class="ays-survey-icons">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                    </div>
                                                </div>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item ays-survey-question-img-action" data-action="edit-image" href="javascript:void(0);"><?php echo esc_html__( 'Edit', "survey-maker" ); ?></a>
                                                    <a class="dropdown-item ays-survey-question-img-action" data-action="delete-image" href="javascript:void(0);"><?php echo esc_html__( 'Delete', "survey-maker" ); ?></a>                                                    
                                                    <a class="dropdown-item ays-survey-question-img-action" data-action="add-caption" href="javascript:void(0);"><?php echo esc_html__( 'Add a caption', "survey-maker" ); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="ays-survey-question-img" src="" tabindex="0" aria-label="Captionless image" />
                                        <input type="hidden" class="ays-survey-question-img-src" value="">                                                                                                
                                        <input type="hidden" class="ays-survey-question-img-caption-enable">
                                    </div>
                                    <div class="ays-survey-question-image-caption-text-row display_none">
                                        <div class="ays-survey-question-image-caption-box-wrap">
                                            <!-- <div class="ays-survey-answer-box-wrap"> -->
                                                <!-- <div class=""> -->
                                                    <!-- <div class="ays-survey-answer-box-input-wrap"> -->
                                                        <input type="text" class="ays-survey-input ays-survey-question-image-caption" autocomplete="off">
                                                        <div class="ays-survey-input-underline ays-survey-question-image-caption-input-underline"></div>
                                                        <div class="ays-survey-input-underline-animation"></div>
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ays-survey-answers-conteiner">
                        <?php
                            for( $i = 1; $i <= $survey_answer_default_count; $i++ ){
                            ?>
                            <div class="ays-survey-answer-row ays-survey-new-answer" data-id="<?php echo esc_attr($i); ?>" data-name="answers_add">
                                <div class="ays-survey-answer-wrap">
                                    <div class="ays-survey-answer-dlg-dragHandle">
                                        <div class="ays-survey-icons ays-survey-icons-hidden">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                        </div>
                                        <input type="hidden" class="ays-survey-answer-ordering" value="<?php echo esc_attr($i); ?>">
                                    </div>
                                    <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                        <div class="ays-survey-icons">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                        </div>
                                    </div>
                                    <div class="ays-survey-answer-box-wrap">
                                        <div class="ays-survey-answer-box">
                                            <div class="ays-survey-answer-box-input-wrap">
                                                <input type="text" autocomplete="off" class="ays-survey-input" placeholder="Option <?php echo esc_attr($i); ?>" value="Option <?php echo esc_attr($i); ?>">
                                                <div class="ays-survey-input-underline"></div>
                                                <div class="ays-survey-input-underline-animation"></div>
                                            </div>
                                        </div>
                                        <div class="ays-survey-answer-icon-box">
                                            <div class="ays-survey-add-answer-image appsMaterialWizButtonPapericonbuttonEl" data-type="answerImgButton" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Add image',"survey-maker")?>">
                                                <div class="ays-question-img-icon-content">
                                                    <div class="ays-question-img-icon-content-div">
                                                        <div class="ays-survey-icons">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/insert-photo.svg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ays-survey-answer-icon-box">
                                            <span class="ays-survey-answer-icon ays-survey-answer-delete appsMaterialWizButtonPapericonbuttonEl" style="<?php echo $survey_answer_default_count > 1 ? '' : 'visibility: hidden;'; ?>" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ays-survey-answer-image-container" style="display: none;" >
                                    <div class="ays-survey-answer-image-body">
                                        <div class="ays-survey-answer-image-wrapper">
                                            <div class="ays-survey-answer-image-wrapper-delete-wrap">
                                                <div role="button" class="ays-survey-answer-image-wrapper-delete-cont removeAnswerImage">
                                                    <span class="exportIcon">
                                                        <div class="ays-survey-answer-image-wrapper-delete-icon-cont">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                            <img class="ays-survey-answer-img" src="" tabindex="0" aria-label="Captionless image" />
                                            <input type="hidden" class="ays-survey-answer-img-src" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        ?>
                        </div>
                        <div class="ays-survey-other-answer-and-actions-row">
                            <div class="ays-survey-answer-row ays-survey-other-answer-row" style="display: none;">
                                <div class="ays-survey-answer-wrap">
                                    <div class="ays-survey-answer-dlg-dragHandle">
                                        <div class="ays-survey-icons invisible">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                        </div>
                                    </div>
                                    <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                        <div class="ays-survey-icons">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                        </div>
                                    </div>
                                    <div class="ays-survey-answer-box-wrap">
                                        <div class="ays-survey-answer-box">
                                            <div class="ays-survey-answer-box-input-wrap">
                                                <input type="text" autocomplete="off" disabled class="ays-survey-input ays-survey-input-other-answer" placeholder="<?php echo esc_attr__( 'Other...', "survey-maker" ); ?>" value="<?php echo esc_attr__( 'Other...', "survey-maker" ); ?>">
                                                <div class="ays-survey-input-underline"></div>
                                                <div class="ays-survey-input-underline-animation"></div>
                                            </div>
                                        </div>
                                        <div class="ays-survey-answer-icon-box">
                                            <span class="ays-survey-answer-icon ays-survey-other-answer-delete appsMaterialWizButtonPapericonbuttonEl">
                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ays-survey-answer-row">
                                <div class="ays-survey-answer-wrap">
                                    <div class="ays-survey-answer-dlg-dragHandle">
                                        <div class="ays-survey-icons invisible">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                        </div>
                                    </div>
                                    <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                        <div class="ays-survey-icons">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                        </div>
                                    </div>
                                    <div class="ays-survey-answer-box-wrap">
                                        <div class="ays-survey-answer-box ays-survey-action-add-answer-box-main-new">
                                            <div class="ays-survey-action-add-answer appsMaterialWizButtonPapericonbuttonEl ays-survey-action-add-answer-box-new" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add option',"survey-maker")?>">
                                                <div class="ays-question-img-icon-content">
                                                    <div class="ays-question-img-icon-content-div">
                                                        <div class="ays-survey-icons">
                                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                                                        </div>
                                                        <div class="ays-survey-action-add-answer-text">
                                                            <?php  echo esc_html__('Add option' , "survey-maker"); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ays-survey-other-answer-add-wrap">
                                                <span class=""><?php echo esc_html__( 'or', "survey-maker" ) ?></span>
                                                <div class="ays-survey-other-answer-container ays-survey-other-answer-add">
                                                    <div class="ays-survey-other-answer-container-overlay"></div>
                                                    <span class="ays-survey-other-answer-content">
                                                        <span class="appsMaterialWizButtonPaperbuttonLabel quantumWizButtonPaperbuttonLabel"><?php echo esc_html__( 'add "Other"', "survey-maker" ) ?></span>
                                                        <input type="checkbox" class="display_none ays-survey-other-answer-checkbox" value="on">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ays-survey-row-divider"><div></div></div>
                        <div class="ays-survey-question-more-options-wrap">
                            <!-- Min -->
                            <div class="ays-survey-question-more-option-wrap ays-survey-question-min-selection-count display_none">
                                <div class="ays-survey-answer-box" style="margin: 20px 0px;">
                                    <label class="ays-survey-question-min-selection-count-label">
                                        <span><?php echo esc_html__( "Minimum selection number", "survey-maker" ); ?></span>
                                        <input type="number" class="ays-survey-input ays-survey-min-votes-field" autocomplete="off" tabindex="0" 
                                            placeholder="<?php echo esc_attr__( "Minimum selection number", "survey-maker" ); ?>" style="font-size: 14px;"
                                            value="" min="0">
                                        <div class="ays-survey-input-underline"></div> 
                                        <div class="ays-survey-input-underline-animation"></div>
                                    </label>
                                </div>
                            </div>
                            <!-- Max -->
                            <div class="ays-survey-question-more-option-wrap ays-survey-question-max-selection-count display_none">
                                <input type="checkbox" class="display_none ays-survey-question-max-selection-count-checkbox" value="on">
                                <div class="ays-survey-answer-box" style="margin: 20px 0px;">
                                    <label class="ays-survey-question-max-selection-count-label">
                                        <span><?php echo esc_html__( "Maximum selection number", "survey-maker" ); ?></span>
                                        <input type="number" class="ays-survey-input ays-survey-max-votes-field" autocomplete="off" tabindex="0" 
                                            placeholder="<?php echo esc_attr__( "Maximum selection number", "survey-maker" ); ?>" style="font-size: 14px;"
                                            value="" min="0">
                                        <div class="ays-survey-input-underline"></div> 
                                        <div class="ays-survey-input-underline-animation"></div>
                                    </label>
                                </div>
                            </div>
                            <!-- Text limitations -->
                            <div class="ays-survey-question-word-limitations display_none">
                                <input type="checkbox" class="display_none ays-survey-question-word-limitations-checkbox" value="on">

                                <div class="ays-survey-question-more-option-wrap-limitations ays-survey-question-word-limit-by ">
                                    <div class="ays-survey-question-word-limit-by-text">
                                        <span><?php echo esc_html__("Limit by", "survey-maker"); ?></span>
                                    </div>
                                    <div class="ays-survey-question-word-limit-by-select">
                                        <select class="ays-text-input ays-text-input-short ">
                                            <option value="char"> <?php echo esc_html__("Characters", "survey-maker")?> </option>
                                            <option value="word"> <?php echo esc_html__("Word", "survey-maker")?> </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ays-survey-row-divider"><div></div></div>
                                <div class="ays-survey-question-more-option-wrap-limitations ">
                                    <div class="ays-survey-answer-box">
                                        <label class="ays-survey-question-limitations-label">
                                            <span><?php echo esc_html__( "Length", "survey-maker" ); ?></span>
                                            <input type="number" class="ays-survey-input ays-survey-limit-length-input" autocomplete="off" tabindex="0" 
                                                placeholder="<?php echo esc_attr__( "Length", "survey-maker" ); ?>" style="font-size: 14px;"
                                                value="" min="0">
                                            <div class="ays-survey-input-underline"></div> 
                                            <div class="ays-survey-input-underline-animation"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="ays-survey-row-divider"><div></div></div>
                                <div class="ays-survey-question-more-option-wrap-limitations ays-survey-question-word-show-word ">
                                    <label class="ays-survey-question-limitations-counter-label">
                                        <span><?php echo esc_html__( "Show word/character counter", "survey-maker" ); ?></span>
                                        <input type="checkbox" autocomplete="off" value="on" class="ays-survey-text-limitations-counter-input">
                                    </label>
                                </div>
                            </div>

                            <!-- Number limitations start -->
                            <div class="ays-survey-question-number-limitations display_none">
                                <input type="checkbox" class="display_none ays-survey-question-number-limitations-checkbox" value="on">
                                <!-- Min Number -->
                                <div class="ays-survey-question-number-min-box ays-survey-question-number-votes-count-box" style="margin: 20px 0px;">
                                    <label class="ays-survey-question-number-min-selection-label">
                                        <span><?php echo esc_html__( "Minimum value", "survey-maker" ); ?></span>
                                        <input type="number" class="ays-survey-input ays-survey-number-min-votes ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                            placeholder="<?php echo esc_attr__( "Minimum value", "survey-maker" ); ?>" style="font-size: 14px;"
                                            value="">
                                        <div class="ays-survey-input-underline"></div> 
                                        <div class="ays-survey-input-underline-animation"></div>
                                    </label>
                                </div>
                                <!-- Max Number -->
                                <div class="ays-survey-question-number-max-box ays-survey-question-number-votes-count-box" style="margin: 20px 0px;">
                                    <label class="ays-survey-question-number-max-selection-label">
                                        <span><?php echo esc_html__( "Maximum value", "survey-maker" ); ?></span>
                                        <input type="number" class="ays-survey-input ays-survey-number-max-votes ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                            placeholder="<?php echo esc_attr__( "Maximum value", "survey-maker" ); ?>" style="font-size: 14px;"
                                            value="" >
                                        <div class="ays-survey-input-underline"></div> 
                                        <div class="ays-survey-input-underline-animation"></div>
                                    </label>
                                </div>
                                <!-- Error message -->
                                <div class="ays-survey-question-number-votes-count-box" style="margin: 20px 0px;">                                                        
                                    <label class="ays-survey-question-number-min-selection-label">
                                        <span><?php echo esc_html__( "Error message", "survey-maker" ); ?></span>
                                        <input type="text"
                                            class="ays-survey-input ays-survey-number-error-message ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                            placeholder="<?php echo esc_attr__( "Error Message", "survey-maker" ); ?>" style="font-size: 14px;"
                                            >
                                            <div class="ays-survey-input-underline"></div> 
                                        <div class="ays-survey-input-underline-animation"></div>
                                    </label>
                                </div>
                                <!-- Show error message -->
                                <div class="ays-survey-question-number-votes-count-box ays-survey-question-number-message-label" style="margin: 20px 0px;">                                                        
                                    <label class="ays-survey-question-number-min-selection-label">
                                        <span><?php echo esc_html__( "Show error message", "survey-maker" ); ?></span>
                                        <input type="checkbox"
                                            autocomplete="off" 
                                            value="on" 
                                            class="ays-survey-number-enable-error-message">
                                    </label>
                                </div>
                                <hr>
                                <!-- Char length -->
                                <div class="ays-survey-question-number-votes-count-box ">
                                    <div class="ays-survey-answer-box">
                                        <label class="ays-survey-question-number-min-selection-label">
                                            <span><?php echo esc_html__( "Length", "survey-maker" ); ?></span>
                                            <input type="number" 
                                                class="ays-survey-input ays-survey-number-limit-length ays-survey-number-votes-inputs" autocomplete="off" tabindex="0" 
                                                placeholder="<?php echo esc_attr__( "Length", "survey-maker" ); ?>" style="font-size: 14px;"
                                                value="" >
                                            <div class="ays-survey-input-underline"></div> 
                                            <div class="ays-survey-input-underline-animation"></div>
                                        </label>
                                    </div>
                                </div>
                                <!-- Show Char length -->
                                <div class="ays-survey-question-number-votes-count-box ">
                                    <label class="ays-survey-question-number-min-selection-label ays-survey-question-number-message-label">
                                        <span><?php echo esc_html__( "Show character counter", "survey-maker" ); ?></span>
                                        <input type="checkbox"
                                                autocomplete="off" 
                                                value="on" 
                                                class="ays-survey-number-number-limit-length">
                                    </label>
                                </div>
                                <hr>
                            </div>
                            <!-- Number limitations end -->
                        </div> 
                        <div class="ays-survey-actions-row">
                            <div class="ays-survey-actions-left">
                                <div class="ays-survey-actions-answers-bulk-add">
                                    <div class="ays-survey-answer-icon-box">
                                        <div class="ays-survey-action-bulk-add-answer">
                                            <div class="ays-survey-action-bulk-add-answer-content">
                                                <div class="ays-survey-action-bulk-add-answer-div">
                                                    <div class="ays-survey-icons ays-survey-action-bulk-add-answer-icon">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/download.svg" class="ays-survey-action-bulk-add-answer-icon-svg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ays-survey-action-bulk-add-answer-text">
                                                <a href="https://ays-pro.com/wordpress/survey-maker" style="color: gray;" target="blank"><?php echo esc_html__('Bulk add',"survey-maker")?> (PRO)</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ays-survey-actions">
                                <div class="ays-survey-answer-icon-box">
                                    <div class="ays-survey-action-duplicate-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Duplicate',"survey-maker")?>">
                                        <div class="ays-question-img-icon-content">
                                            <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/duplicate.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ays-survey-answer-icon-box">
                                    <div class="ays-survey-action-delete-question appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                        <div class="ays-question-img-icon-content">
                                            <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ays-survey-vertical-divider"><div></div></div>
                                <div class="ays-survey-answer-elem-box">
                                    <label>
                                        <span>
                                            <span><?php echo esc_html__( 'Required', "survey-maker" ); ?></span>
                                        </span>
                                        <input type="checkbox" <?php echo ($survey_make_questions_required) ? 'checked' : '' ?>  class="display_none ays-survey-input-required-question ays-switch-checkbox" value="on">
                                        <div class="switch-checkbox-wrap" aria-label="Required" tabindex="0" role="checkbox">
                                            <div class="switch-checkbox-track"></div>
                                            <div class="switch-checkbox-ink"></div>
                                            <div class="switch-checkbox-circles">
                                                <div class="switch-checkbox-thumb"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="ays-survey-answer-icon-box ays-survey-question-more-actions droptop">
                                    <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                        <div class="ays-question-img-icon-content">
                                            <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="move-to-section"><?php echo esc_html__( 'Move to section', "survey-maker" ); ?></button>
                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="max-selection-count-enable"><?php echo esc_html__( 'Enable selection count', "survey-maker" ); ?></button>
                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="word-limitation-enable"><?php echo esc_html__( 'Enable word limitation', "survey-maker" ); ?></button>
                                        <button type="button" class="dropdown-item ays-survey-question-action" data-action="number-word-limitation-enable"><?php echo esc_html__( 'Enable limitation', "survey-maker" ); ?></button>                                        
                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro ays-survey-question-actions-pro-button <?php echo in_array( $survey_default_type, $logic_jump_question_types ) ? '' : 'display_none'; ?>" data-action="go-to-section-based-on-answers-enable" data-video-url="https://www.youtube.com/watch?v=BTeCGFKJmlk" data-option-title="<?php echo esc_attr__('Logic Jump',"survey-maker")?>" data-option-text="Logic Jump allows to create <strong> responsive surveys </strong> that save the survey taker's time by skipping irrelevant questions or sections. Add more logic to your surveys with a few clicks by choosing the necessary set of questions you want to follow a particular question. Note that this feature works only with <strong> “Radio” </strong> and <strong> “Yes or No” </strong> questions. ">
                                            <?php echo esc_html__( 'Logic jump', "survey-maker" ); ?> (Pro) 
                                        </button>
                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-user-explanation" style="font-style: italic;">
                                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'User explanation', "survey-maker" ); ?> (Pro) </a>
                                        </button>
                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="disable-hide-results" style="font-style: italic;">
                                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Hide results', "survey-maker" ); ?> (Pro) </a>
                                        </button>
                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-admin-note">
                                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Admin note', "survey-maker" ); ?> (Pro) </a>
                                        </button>
                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro ays-survey-question-actions-pro-button" data-action="enable-url-parameter" data-video-url="https://www.youtube.com/watch?v=1nvOtwlmVAo" data-option-title="<?php echo esc_attr__('URL parametr',"survey-maker")?>" data-option-text="The URL parameter is a great tool <strong> to help you collect and analyze your submission results easier. </strong> It is handy when you need to share your survey on various platforms to identify where the respondents came from. You can also use this feature when you know some information about your survey takers and want to save their time and ensure the accuracy of the survey. URL Parameter is more popular with the <strong> hidden question type </strong> because you can share the surveys with specific scenarios. For instance, if you need to send your survey to the Marketing and Development team employees, you can assign URL parameters, and it will be easier to track and analyze the results separately.  ">
                                            <a href="#" ><?php echo esc_html__( 'URL parametr', "survey-maker" ); ?> (Pro) </a>
                                        </button>
                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-value-prefix">
                                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Value prefix', "survey-maker" ); ?> (Pro) </a>
                                        </button>
                                        <button type="button" class="dropdown-item ays-survey-question-action ays-survey-question-actions-pro" data-action="enable-value-suffix">
                                            <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><?php echo esc_html__( 'Value suffix', "survey-maker" ); ?> (Pro) </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ays-survey-section-box ays-survey-new-section" data-name="<?php echo esc_attr($html_name_prefix); ?>section_add" data-id="1">
                    <input type="hidden" class="ays-survey-section-collapsed-input" value="expanded">
                    <div class="ays-survey-section-wrap-collapsed display_none">
                        <div class="ays-survey-section-head-wrap">
                            <div class="ays-survey-section-head-top <?php echo $multiple_sections ? '' : 'display_none'; ?>">
                                <div class="ays-survey-section-counter">
                                    <span>
                                        <span><?php echo esc_html__( 'Section', "survey-maker" ); ?></span>
                                        <span class="ays-survey-section-number"><?php echo 1; ?></span>
                                        <span><?php echo esc_html__( 'of', "survey-maker" ); ?></span>
                                        <span class="ays-survey-sections-count"><?php echo 1; ?></span>
                                    </span>
                                </div>
                            </div>
                            <div class="ays-survey-section-head">
                                <div class="ays-survey-section-dlg-dragHandle">
                                    <div class="ays-survey-icons">
                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                    </div>
                                </div>
                                <div class="ays-survey-section-wrap-collapsed-contnet">
                                <div class="ays-survey-action-questions-count appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Questions count',"survey-maker")?>"><span>1</span></div>
                                    <div class="ays-survey-section-wrap-collapsed-contnet-text"></div>
                                    <div>
                                        <div class="ays-survey-action-expand-section appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Expand section',"survey-maker")?>">
                                            <div class="ays-section-img-icon-content">
                                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/expand-section.svg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ays-survey-answer-icon-box ays-survey-section-actions-more dropdown">
                                    <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                        <div class="ays-question-img-icon-content">
                                            <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button type="button" class="dropdown-item ays-survey-delete-section display_none"><?php echo esc_html__( 'Delete section', "survey-maker" ); ?></button>
                                        <button type="button" class="dropdown-item ays-survey-duplicate-section"><?php echo esc_html__( 'Duplicate section', "survey-maker" ); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ays-survey-section-wrap-expanded">
                        <div class="ays-survey-section-head-wrap">
                            <div class="ays-survey-section-head-top display_none">
                                <div class="ays-survey-section-counter">
                                    <span>
                                        <span><?php echo esc_html__( 'Section', "survey-maker" ); ?></span>
                                        <span class="ays-survey-section-number">1</span>
                                        <span><?php echo esc_html__( 'of', "survey-maker" ); ?></span>
                                        <span class="ays-survey-sections-count">1</span>
                                    </span>
                                </div>
                            </div>
                            <div class="ays-survey-section-head">
                                <!--  Section Title Start  -->
                                <div class="ays-survey-section-title-conteiner">
                                    <input type="text" class="ays-survey-section-title ays-survey-input" tabindex="0" placeholder="<?php echo esc_attr__( 'Section title' , "survey-maker" ); ?>" value=""/>
                                    <div class="ays-survey-input-underline"></div>
                                    <div class="ays-survey-input-underline-animation"></div>
                                </div>
                                <!--  Section Title End  -->

                                <!--  Section Description Start  -->
                                <div class="ays-survey-section-description-conteiner">
                                    <textarea class="ays-survey-section-description ays-survey-input" placeholder="<?php echo esc_attr__( 'Section Description' , "survey-maker" ); ?>"></textarea>
                                    <div class="ays-survey-input-underline"></div>
                                    <div class="ays-survey-input-underline-animation"></div>
                                </div>
                                <!--  Section Description End  -->

                                <div class="ays-survey-section-actions">
                                <div class="ays-survey-action-questions-count appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Questions count',"survey-maker")?>"><span>1</span></div>
                                    <div class="ays-survey-action-collapse-section appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Collapse section',"survey-maker")?>">
                                        <div class="ays-question-img-icon-content">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/collapse-section.svg">
                                        </div>
                                    </div>
                                    <div class="ays-survey-answer-icon-box ays-survey-section-actions-more dropdown">
                                        <div class="ays-survey-action-more appsMaterialWizButtonPapericonbuttonEl" data-toggle="dropdown">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                    <div class="ays-survey-icons">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/more-vertical.svg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button type="button" class="dropdown-item ays-survey-collapse-section-questions ays-survey-collapse-sec-quests"><?php echo esc_html__( 'Collapse section questions', "survey-maker" ); ?></button>
                                            <input type="checkbox" hidden class="make-questions-required-checkbox" >
                                            <button type="button" class="dropdown-item ays-survey-section-questions-required" data-flag="off"><?php echo esc_html__( 'Make questions required ', "survey-maker" ); ?> <img class="ays-survey-required-section-img" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/done.svg"></button>
                                            <button type="button" class="dropdown-item ays-survey-delete-section display_none"><?php echo esc_html__( 'Delete section', "survey-maker" ); ?></button>
                                            <button type="button" class="dropdown-item ays-survey-duplicate-section"><?php echo esc_html__( 'Duplicate section', "survey-maker" ); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="ays-survey-section-ordering" value="1">
                        </div>
                        <div class="ays-survey-section-body">
                            <div class="ays-survey-section-questions">
                            </div>
                        </div>
                        <div class="ays-survey-section-footer-wrap">
                            <div class="ays-survey-add-question-from-section-bottom">
                                <div class="ays-survey-add-question-to-this-section ays-survey-add-question-button-container" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add Question',"survey-maker"); ?>">
                                    <div class="ays-survey-add-question-button appsMaterialWizButtonPapericonbuttonEl">
                                        <div class="ays-question-img-icon-content">
                                            <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                                                </div>
                                            </div>
                                        </div>
                                        <span><?php echo esc_html__('Add Question',"survey-maker")?></span>
                                    </div>
                                </div>
                                <div class="ays-survey-add-new-section-from-bottom ays-survey-add-question-button-container" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add Section',"survey-maker"); ?>">
                                    <div class="ays-survey-add-question-button appsMaterialWizButtonPapericonbuttonEl">
                                        <div class="ays-question-img-icon-content">
                                            <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-section.svg">
                                                </div>
                                            </div>
                                        </div>
                                        <span><?php echo esc_html__('Add Section',"survey-maker")?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Question Type Text/Short Text clone Start -->
                <div class="ays-survey-question-types">
                    <div class="ays-survey-answer-row" data-id="1">
                        <div class="ays-survey-question-types-conteiner">
                            <div class="ays-survey-question-types-box isDisabled">
                                <div class="ays-survey-question-types-box-body">
                                    <div class="ays-survey-question-types-input-box">
                                        <input type="text" class="ays-survey-remove-default-border ays-survey-question-types-input ays-survey-question-types-input-with-placeholder" autocomplete="off" tabindex="0" placeholder="" style="font-size: 14px;">
                                    </div>
                                    
                                    <div class="ays-survey-question-types-input-underline"></div>
                                    <div class="ays-survey-question-types-input-focus-underline"></div>
                                </div>
                            </div>
                            <div class="ays-survey-question-text-types-note-text"><span>* <?php echo esc_html__('You can insert your custom placeholder for input. Note your custom text will not be translated', "survey-maker"); ?></span></div>
                            <div class="ays-survey-question-types-box-phone-type-note display_none">
                                <?php
                                    echo "<span>" . esc_html__( "Note: Phone question type can contain only numbers and the following signs + ( ) -", "survey-maker" ) . "</span>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Question Type Text/Short Text clone End -->

                <!-- Question type star start  -->
                <div class="ays-survey-question-types_star">
                    <div class="ays-survey-answer-row" data-id="1">
                        <div class="ays-survey-question-types-conteiner">
                            <div class="ays-survey-question-types-box">
                            <div class="ays-survey-question-types-box-body ays-survey-body-for-select-lenght">
                                <div class="ays-survey-question-types_star_span">
                                    <span style="font-size: 25px;" class="ays-survey_star_span">1 to</span>
                                </div>
                                <div class="ays-survey-question-types-for-select-lenght">
                                    <select class="ays-survey-choose-for-start-select-lenght">
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5" selected>5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ays-survey-answer-box ays-survey-not-adding-enter-box" style="margin: 20px 0px;">
                                <span class="ays_survey_star_span">1</span>
                                <input type="text" autocomplete="off" class="ays-survey-input ays-survey-input-star-1 notAdding ays-survey-without-enter" autocomplete="off" tabindex="0" placeholder="<?php echo esc_attr__( "Label (Optional)", "survey-maker" ); ?>" style="font-size: 14px;" value="">
                                <div class="ays-survey-question-types-input-underline-linear-scale"></div> 
                                <div class="ays-survey-input-underline-animation ays-survey-input-underline-animation-linear-scale"></div>
                            </div>
                            <div class="ays-survey-answer-box ays-survey-not-adding-enter-box">
                                <span class="ays_survey_star_span ays_survey_linear_scale_span_changeable">5</span>
                                <input type="text" autocomplete="off" class="ays-survey-input ays-survey-input-star-2 notAdding ays-survey-without-enter" autocomplete="off" tabindex="0" placeholder="<?php echo esc_attr__( "Label (Optional)", "survey-maker" ); ?>" style="font-size: 14px;" value="">
                                <div class="ays-survey-question-types-input-underline-linear-scale"></div> 
                                <div class="ays-survey-input-underline-animation ays-survey-input-underline-animation-linear-scale"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Question type star end  -->
                               
                <!-- Question type date starting  -->
                <div class="ays-survey-question-types_date">
                    <div class="ays-survey-answer-row" data-id="1">
                        <div class="ays-survey-question-types-conteiner">
                            <div class="ays-survey-question-types-box isDisabled">
                                <div class="ays-survey-question-types-box-body">
                                    <div class="ays-survey-answer-box ays_survey_date">
                                        <input type="text" autocomplete="off" tabindex="0" value="<?php echo esc_attr__("Month, day, year", "survey-maker"); ?>" disabled="" dir="auto">
                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Question type date end -->

                <!-- Question type time starting  -->
                <div class="ays-survey-question-types_time">
                    <div class="ays-survey-answer-row" data-id="1">
                        <div class="ays-survey-question-types-conteiner">
                            <div class="ays-survey-question-types-box isDisabled">
                                <div class="ays-survey-question-types-box-body">
                                    <div class="ays-survey-answer-box ays_survey_time">
                                        <input type="text" autocomplete="off" tabindex="0" value="<?php echo esc_attr__("Time", "survey-maker"); ?>" disabled="" dir="auto">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Question type time end -->

                <!-- Question type date and time starting  -->
                <div class="ays-survey-question-types_date_time">
                    <div class="ays-survey-answer-row" data-id="1">
                        <div class="ays-survey-question-types-conteiner">
                            <div class="ays-survey-question-types-box isDisabled">
                                <div class="ays-survey-question-types-box-body">
                                    <div class="ays-survey-answer-box ays_survey_time">
                                        <input type="text" autocomplete="off" tabindex="0" value="Month, day, year, hour, minute" disabled="" dir="auto">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Question type date and time end -->

                <!-- Question Type Yes or No clone Start -->
                <div class="ays-survey-question-type-yes-or-no">
                    <div class="ays-survey-answer-row" data-id="1">
                        <div class="ays-survey-answer-wrap">
                            <div class="ays-survey-answer-dlg-dragHandle">
                                <div class="ays-survey-icons ays-survey-icons-hidden">
                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                </div>
                                <input type="hidden" class="ays-survey-answer-ordering" value="1">
                            </div>
                            <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                <div class="ays-survey-icons">
                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                </div>
                            </div>
                            <div class="ays-survey-answer-box-wrap">
                                <div class="ays-survey-answer-box">
                                    <div class="ays-survey-answer-box-input-wrap">
                                        <input type="text" class="ays-survey-input" autocomplete="off" placeholder="Yes" value="Yes">
                                        <div class="ays-survey-input-underline"></div>
                                        <div class="ays-survey-input-underline-animation"></div>
                                    </div>
                                    <div class="ays-survey-answer-icon-box">
                                        <div class="ays-survey-add-answer-image appsMaterialWizButtonPapericonbuttonEl" data-type="answerImgButton" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Add image',"survey-maker")?>">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                    <div class="ays-survey-icons">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/insert-photo.svg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-answer-icon-box">
                                        <span class="ays-survey-answer-icon ays-survey-answer-delete appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ays-survey-answer-image-container" style="display: none;">
                            <div class="ays-survey-answer-image-body">
                                <div class="ays-survey-answer-image-wrapper">
                                    <div class="ays-survey-answer-image-wrapper-delete-wrap">
                                        <div role="button" class="ays-survey-answer-image-wrapper-delete-cont removeAnswerImage">
                                            <span class="exportIcon">
                                                <div class="ays-survey-answer-image-wrapper-delete-icon-cont">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <img class="ays-survey-answer-img" src="" tabindex="0" aria-label="Captionless image" />
                                    <input type="hidden" class="ays-survey-answer-img-src" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ays-survey-answer-row" data-id="2">
                        <div class="ays-survey-answer-wrap">
                            <div class="ays-survey-answer-dlg-dragHandle">
                                <div class="ays-survey-icons ays-survey-icons-hidden">
                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/dragndrop-vertical.svg">
                                </div>
                                <input type="hidden" class="ays-survey-answer-ordering" value="2">
                            </div>
                            <div class="ays-survey-answer-icon-box ays-survey-answer-icon-just">
                                <div class="ays-survey-icons">
                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/radio-button-unchecked.svg">
                                </div>
                            </div>
                            <div class="ays-survey-answer-box-wrap">
                                <div class="ays-survey-answer-box">
                                    <div class="ays-survey-answer-box-input-wrap">
                                        <input type="text" class="ays-survey-input" autocomplete="off" placeholder="No" value="No">
                                        <div class="ays-survey-input-underline"></div>
                                        <div class="ays-survey-input-underline-animation"></div>
                                    </div>
                                    <div class="ays-survey-answer-icon-box">
                                        <div class="ays-survey-add-answer-image appsMaterialWizButtonPapericonbuttonEl" data-type="answerImgButton" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Add image',"survey-maker")?>">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                    <div class="ays-survey-icons">
                                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/insert-photo.svg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-answer-icon-box">
                                        <span class="ays-survey-answer-icon ays-survey-answer-delete appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="<?php echo esc_attr__('Delete',"survey-maker")?>">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ays-survey-answer-image-container" style="display: none;">
                            <div class="ays-survey-answer-image-body">
                                <div class="ays-survey-answer-image-wrapper">
                                    <div class="ays-survey-answer-image-wrapper-delete-wrap">
                                        <div role="button" class="ays-survey-answer-image-wrapper-delete-cont removeAnswerImage">
                                            <span class="exportIcon">
                                                <div class="ays-survey-answer-image-wrapper-delete-icon-cont">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close.svg">
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <img class="ays-survey-answer-img" src="" tabindex="0" aria-label="Captionless image" />
                                    <input type="hidden" class="ays-survey-answer-img-src" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Question Type Yes or No clone End -->
            </div>
        </div>
    </div>
    <div class="aysFormeditorViewFatRoot aysFormeditorViewFatMobile">
        <div class="aysFormeditorViewFatPositioner">
            <div class="aysFormeditorViewFatCard">
                <div class="droptop">
                    <div data-action="add-question" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add Question',"survey-maker")?>">
                        <div class="appsMaterialWizButtonPapericonbuttonEl">
                            <div class="ays-question-img-icon-content">
                                <div class="ays-question-img-icon-content-div">
                                    <div class="ays-survey-icons">
                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-menu"></div>
                </div>
                <!-- 
                <div data-action="import-question" class="ays-survey-general-action">
                    <div class="appsMaterialWizButtonPapericonbuttonEl">
                        <div class="ays-question-img-icon-content">
                            <div class="ays-question-img-icon-content-div">
                                <div class="ays-survey-icons">
                                    <div class="aysMaterialIconIconImage ays-qp-icon-import-question-m2" aria-hidden="true">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-action="add-section-header" data-action-properties="enabled" class="ays-survey-general-action">
                    <div class="appsMaterialWizButtonPapericonbuttonEl">
                        <div class="ays-question-img-icon-content">
                            <div class="ays-question-img-icon-content-div">
                                <div class="ays-survey-icons">
                                    <div class="aysMaterialIconIconImage ays-qp-icon-add-header" aria-hidden="true">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-action="add-image" class="ays-survey-general-action">
                    <div class="appsMaterialWizButtonPapericonbuttonEl">
                        <div class="ays-question-img-icon-content">
                            <div class="ays-question-img-icon-content-div">
                                <div class="ays-survey-icons">
                                    <div class="aysMaterialIconIconImage ays-qp-icon-image-m2" aria-hidden="true">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-action="add-video" class="ays-survey-general-action">
                    <div class="appsMaterialWizButtonPapericonbuttonEl">
                        <div class="ays-question-img-icon-content">
                            <div class="ays-question-img-icon-content-div">
                                <div class="ays-survey-icons">
                                    <div class="aysMaterialIconIconImage ays-qp-icon-video-m2" aria-hidden="true">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <div data-action="add-section" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Add Section',"survey-maker")?>">
                    <div class="appsMaterialWizButtonPapericonbuttonEl">
                        <div class="ays-question-img-icon-content">
                            <div class="ays-question-img-icon-content-div">
                                <div class="ays-survey-icons">
                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-section.svg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-action="open-modal" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Import questions (Pro)',"survey-maker")?>">
                    <div class="appsMaterialWizButtonPapericonbuttonEl ays-survey-icon-svg">
                        <a style="box-shadow: unset;outline: unset;height: 24px;" href="https://ays-pro.com/wordpress/survey-maker" target="_blank"><img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/import.svg"></a>
                    </div>
                </div>
                <div data-action="make-questions-required" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="left" data-flag="off" data-content="<?php echo esc_attr__('Make questions required',"survey-maker")?>">
                    <input type="checkbox" hidden class="make-questions-required-checkbox">
                    <div class="appsMaterialWizButtonPapericonbuttonEl ays-survey-icon-svg">
                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/asterisk.svg">
                    </div>
                </div>
                <div data-action="save-changes" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo esc_attr__('Save changes',"survey-maker")?>">
                    <div class="appsMaterialWizButtonPapericonbuttonEl ays-survey-icon-svg">
                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/save-outline.svg">
                    </div>
                </div>
                <div class="ays-survey-general-action-max-inps-vars display_none" data-max-inp-vars="<?php echo esc_attr($survey_max_input_vars_server); ?>" data-action="save-changes" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="<?php echo esc_attr__('lorem ipsimsak sdoasd kaskd alksd ak alkd sas a asdkasdjaksdxcv asdkskdjf nksldfv ',"survey-maker")?>">
                    <div class="appsMaterialWizButtonPapericonbuttonEl ays-survey-icon-svg">
                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/warning.png">
                    </div>
                </div>
                <div data-action="enable-answer-points" style="background-color: #3571c40d;" class="ays-survey-general-action" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="<?php echo esc_attr__('Enable points for answers (Pro) ', "survey-maker")?>">
                    <div class="appsMaterialWizButtonPapericonbuttonEl ays-survey-icon-svg">
                        <a style="box-shadow: unset;outline: unset;" href="https://ays-pro.com/wordpress/survey-maker" target="_blank">
                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/pro-features-icons/number-1-O.svg" width="24" height="24">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
