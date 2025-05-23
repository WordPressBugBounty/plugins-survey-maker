<div id="tab9" class="ays-survey-tab-content <?php echo ($ays_tab == 'tab9') ? 'ays-survey-tab-content-active' : ''; ?>">
<div class="form-group row" style="margin-top: 15px;">
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
            <p class="ays-subtitle">Additional condition</p>
            <hr>
            <div style="display: flex;justify-content: center; align-items: center;position: relative;" class="ays-survey-zindex-for-pro"><iframe width="560" height="315" src="https://www.youtube.com/embed/V4SBc9yiO68" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe></div>
            <div id="ays-survey-condition-container-main">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="ays-survey-action-add-condition appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Add answer">
                        <div class="ays-question-img-icon-content ays-question-img-icon-content-conditions">
                        <div class="ays-question-img-icon-content-div">
                            <div class="ays-survey-icons">
                                <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                            </div>
                        </div>
                        </div>
                        <div>
                        <span style="padding: 10px;"><?php echo esc_html__("Add condition", "survey-maker");?></span>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="button ays-survey-condition-refresh-data"><?php echo esc_html__("Refresh questions data", "survey-maker");?></button>    
                    </div>
                </div>
                <div class="ays-survey-condition-containers-info">
                    <div class="ays-survey-condition-containers-added" data-condition-id="1" data-condition-name="ays_condition_add">
                        <div class="ays-survey-condition-delete-conteiner-box">
                        <div class="ays-survey-answer-icon-box">
                            <div class="ays-survey-action-delete-all-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                    <div class="ays-survey-icons">
                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash.svg">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="ays-survey-condition-containers-ready">
                        <div class="ays-survey-condition-containers-list-main-box">
                            <div class="ays-survey-condition-containers-list-main">
                                <div class="ays-survey-condition-select-question-box" data-question-id="1" data-question-name="question_id">
                                    <div class="ays-survey-condition-selects">
                                    <div class="ays-survey-condition-select-question-box-questions">
                                        <select class="ays-survey-condition-select-question">
                                            <option value="0"><?php echo esc_html__("Select", "survey-maker");?></option>
                                            <option value="13" data-type="radio" data-question-id="13">RAdio</option>
                                            <option value="14" data-type="radio" data-question-id="14" selected="">Gender</option>
                                            <option value="15" data-type="number" data-question-id="15">Age</option>
                                            <option value="16" data-type="short_text" data-question-id="16">Skills</option>
                                            <option value="17" data-type="number" data-question-id="17">Preferred Salary ($)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-condition-select-question-type-hidden" value="radio" >
                                    </div>
                                    <div class="ays-survey-condition-select-question-answers">
                                        <select class="ays-survey-condition-select-question-with-answers" >
                                            <option value="0">- <?php echo esc_html__("Select", "survey-maker");?> -</option>
                                            <option value="34" selected="">Male</option>
                                            <option value="35">Female</option>
                                        </select>
                                    </div>
                                    <div class="ays-survey-condition-delete-currnet">
                                        <div class="ays-survey-delete-question-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small ays-survey-delete-button-small " data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons ays-survey-icons-small">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash-small.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="ays-survey-condition-select-question-condition">
                                    <select>
                                        <option value="and" selected="">And</option>
                                        <option value="or">Or</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="ays-survey-condition-select-question-box" data-question-id="2" data-question-name="question_id">
                                    <div class="ays-survey-condition-selects">
                                    <div class="ays-survey-condition-select-question-box-questions">
                                        <select class="ays-survey-condition-select-question" >
                                            <option value="0"><?php echo esc_html__("Select", "survey-maker");?></option>
                                            <option value="13" data-type="radio" data-question-id="13">RAdio</option>
                                            <option value="14" data-type="radio" data-question-id="14">Gender</option>
                                            <option value="15" data-type="number" data-question-id="15" selected="">Age</option>
                                            <option value="16" data-type="short_text" data-question-id="16">Skills</option>
                                            <option value="17" data-type="number" data-question-id="17">Preferred Salary ($)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-condition-select-question-type-hidden" value="number">
                                    </div>
                                    <div class="ays-survey-condition-select-question-answers">
                                        <div class="ays-survey-condition-for-other-types">
                                            <div class="ays-survey-condition-for-other-types-select">
                                                <select class="ays-survey-condition-for-number-types-select" >
                                                <option value="==">Equal to (==)</option>
                                                <option value="!=">Not equal to (!=)</option>
                                                <option value=">" selected="">Greater than (&gt;)</option>
                                                <option value=">=">Greater than or equal to (&gt;=)</option>
                                                <option value="<">Less than (&lt;)</option>
                                                <option value="<=">Less than or equal to (&gt;=)</option>
                                                </select>
                                            </div>
                                            <div class="ays-survey-condition-for-other-types-text">
                                                <input type="number" value="18">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-condition-delete-currnet">
                                        <div class="ays-survey-delete-question-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small ays-survey-delete-button-small " data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons ays-survey-icons-small">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash-small.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="ays-survey-condition-select-question-condition">
                                    <select>
                                        <option value="and" selected="">And</option>
                                        <option value="or">Or</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="ays-survey-condition-select-question-box" data-question-id="3" data-question-name="question_id">
                                    <div class="ays-survey-condition-selects">
                                    <div class="ays-survey-condition-select-question-box-questions">
                                        <select class="ays-survey-condition-select-question">
                                            <option value="0"><?php echo esc_html__("Select", "survey-maker");?></option>
                                            <option value="13" data-type="radio" data-question-id="13">RAdio</option>
                                            <option value="14" data-type="radio" data-question-id="14">Gender</option>
                                            <option value="15" data-type="number" data-question-id="15" selected="">Age</option>
                                            <option value="16" data-type="short_text" data-question-id="16">Skills</option>
                                            <option value="17" data-type="number" data-question-id="17">Preferred Salary ($)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-condition-select-question-type-hidden" value="number" >
                                    </div>
                                    <div class="ays-survey-condition-select-question-answers">
                                        <div class="ays-survey-condition-for-other-types">
                                            <div class="ays-survey-condition-for-other-types-select">
                                                <select class="ays-survey-condition-for-number-types-select" >
                                                <option value="==">Equal to (==)</option>
                                                <option value="!=">Not equal to (!=)</option>
                                                <option value=">">Greater than (&gt;)</option>
                                                <option value=">=">Greater than or equal to (&gt;=)</option>
                                                <option value="<" selected="">Less than (&lt;)</option>
                                                <option value="<=">Less than or equal to (&gt;=)</option>
                                                </select>
                                            </div>
                                            <div class="ays-survey-condition-for-other-types-text">
                                                <input type="number" value="40">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-condition-delete-currnet">
                                        <div class="ays-survey-delete-question-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small ays-survey-delete-button-small " data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons ays-survey-icons-small">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash-small.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="ays-survey-condition-select-question-condition">
                                    </div>
                                </div>
                            </div>
                            <div class="ays-survey-condition-containers-add-list-button-box">
                                <div class="ays-survey-action-add-sub-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Add answer">
                                    <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                        <div class="ays-survey-icons ays-survey-icons-small">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline-small.svg">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ays-survey-condition-containers-conditions">
                            <div class="ays-survey-condition-containers-conditions-titles">
                                <div class="ays-survey-condition-containers-conditions-titles-nav-bar">
                                    <div class="ays-survey-condition-containers-conditions-tabs nav-cond-tab-active" data-tab-id="tab1">Page</div>
                                    <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab2">Email</div>
                                    <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab3">Redirect</div>
                                    <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab4">Woocomerce</div>
                                    <!-- For Woocomerce -->
                                    <!-- <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab4">Product</div> -->
                                </div>
                            </div>
                            <div class="ays-survey-condition-containers-conditions-content">
                                <div class="ays-survey-condition-containers-conditions-contents cond-tab1">
                                    <div class="ays-survey-condition-containers-conditions-contents-messages-title">
                                    <span class="ays-survey-messages-contnet-titles">Result message</span>
                                    </div>
                                    <hr>
                                    <div>
                                        <?php
                                        $content = __("Thank you for your feedback. The information you provided will help us to improve our customer experience." , "survey-maker");
                                        $editor_id = 'ays_survey_conditional_logic_page_message';
                                        $settings = array('editor_height' => '150', 'editor_class' => 'ays-textarea', 'media_elements' => false);
                                        wp_editor($content, $editor_id, $settings);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="ays-survey-condition-containers-added" data-condition-id="2" data-condition-name="ays_condition_add">
                        <div class="ays-survey-condition-delete-conteiner-box">
                        <div class="ays-survey-answer-icon-box">
                            <div class="ays-survey-action-delete-all-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                    <div class="ays-survey-icons">
                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash.svg">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="ays-survey-condition-containers-ready">
                        <div class="ays-survey-condition-containers-list-main-box">
                            <div class="ays-survey-condition-containers-list-main">
                                <div class="ays-survey-condition-select-question-box" data-question-id="1" data-question-name="question_id">
                                    <div class="ays-survey-condition-selects">
                                    <div class="ays-survey-condition-select-question-box-questions">
                                        <select class="ays-survey-condition-select-question" >
                                            <option value="0"><?php echo esc_html__("Select", "survey-maker");?></option>
                                            <option value="13" data-type="radio" data-question-id="13">RAdio</option>
                                            <option value="14" data-type="radio" data-question-id="14" selected="">Gender</option>
                                            <option value="15" data-type="number" data-question-id="15">Age</option>
                                            <option value="16" data-type="short_text" data-question-id="16">Skills</option>
                                            <option value="17" data-type="number" data-question-id="17">Preferred Salary ($)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-condition-select-question-type-hidden" value="radio" >
                                    </div>
                                    <div class="ays-survey-condition-select-question-answers">
                                        <select class="ays-survey-condition-select-question-with-answers" >
                                            <option value="0">- <?php echo esc_html__("Select", "survey-maker");?> -</option>
                                            <option value="34">Male</option>
                                            <option value="35" selected="">Female</option>
                                        </select>
                                    </div>
                                    <div class="ays-survey-condition-delete-currnet">
                                        <div class="ays-survey-delete-question-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small ays-survey-delete-button-small " data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons ays-survey-icons-small">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash-small.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="ays-survey-condition-select-question-condition">
                                    <select >
                                        <option value="and" selected="">And</option>
                                        <option value="or">Or</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="ays-survey-condition-select-question-box" data-question-id="2" data-question-name="question_id">
                                    <div class="ays-survey-condition-selects">
                                    <div class="ays-survey-condition-select-question-box-questions">
                                        <select class="ays-survey-condition-select-question" >
                                            <option value="0"><?php echo esc_html__("Select", "survey-maker");?></option>
                                            <option value="13" data-type="radio" data-question-id="13">RAdio</option>
                                            <option value="14" data-type="radio" data-question-id="14">Gender</option>
                                            <option value="15" data-type="number" data-question-id="15" selected="">Age</option>
                                            <option value="16" data-type="short_text" data-question-id="16">Skills</option>
                                            <option value="17" data-type="number" data-question-id="17">Preferred Salary ($)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-condition-select-question-type-hidden" value="number" >
                                    </div>
                                    <div class="ays-survey-condition-select-question-answers">
                                        <div class="ays-survey-condition-for-other-types">
                                            <div class="ays-survey-condition-for-other-types-select">
                                                <select class="ays-survey-condition-for-number-types-select" >
                                                <option value="==" selected="">Equal to (==)</option>
                                                <option value="!=">Not equal to (!=)</option>
                                                <option value=">">Greater than (&gt;)</option>
                                                <option value=">=">Greater than or equal to (&gt;=)</option>
                                                <option value="<">Less than (&lt;)</option>
                                                <option value="<=">Less than or equal to (&gt;=)</option>
                                                </select>
                                            </div>
                                            <div class="ays-survey-condition-for-other-types-text">
                                                <input type="number" value="25">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-condition-delete-currnet">
                                        <div class="ays-survey-delete-question-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small ays-survey-delete-button-small " data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons ays-survey-icons-small">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash-small.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="ays-survey-condition-select-question-condition">
                                    <select >
                                        <option value="and">And</option>
                                        <option value="or" selected="">Or</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="ays-survey-condition-select-question-box" data-question-id="3" data-question-name="question_id">
                                    <div class="ays-survey-condition-selects">
                                    <div class="ays-survey-condition-select-question-box-questions">
                                        <select class="ays-survey-condition-select-question" >
                                            <option value="0"><?php echo esc_html__("Select", "survey-maker");?></option>
                                            <option value="13" data-type="radio" data-question-id="13">RAdio</option>
                                            <option value="14" data-type="radio" data-question-id="14">Gender</option>
                                            <option value="15" data-type="number" data-question-id="15" selected="">Age</option>
                                            <option value="16" data-type="short_text" data-question-id="16">Skills</option>
                                            <option value="17" data-type="number" data-question-id="17">Preferred Salary ($)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-condition-select-question-type-hidden" value="number" >
                                    </div>
                                    <div class="ays-survey-condition-select-question-answers">
                                        <div class="ays-survey-condition-for-other-types">
                                            <div class="ays-survey-condition-for-other-types-select">
                                                <select class="ays-survey-condition-for-number-types-select" >
                                                <option value="==" selected="">Equal to (==)</option>
                                                <option value="!=">Not equal to (!=)</option>
                                                <option value=">">Greater than (&gt;)</option>
                                                <option value=">=">Greater than or equal to (&gt;=)</option>
                                                <option value="<">Less than (&lt;)</option>
                                                <option value="<=">Less than or equal to (&gt;=)</option>
                                                </select>
                                            </div>
                                            <div class="ays-survey-condition-for-other-types-text">
                                                <input type="number" value="32">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-condition-delete-currnet">
                                        <div class="ays-survey-delete-question-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small ays-survey-delete-button-small " data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons ays-survey-icons-small">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash-small.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="ays-survey-condition-select-question-condition">
                                    </div>
                                </div>
                            </div>
                            <div class="ays-survey-condition-containers-add-list-button-box">
                                <div class="ays-survey-action-add-sub-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Add answer">
                                    <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                        <div class="ays-survey-icons ays-survey-icons-small">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline-small.svg">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ays-survey-condition-containers-conditions">
                            <div class="ays-survey-condition-containers-conditions-titles">
                                <div class="ays-survey-condition-containers-conditions-titles-nav-bar">
                                    <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab1">Page</div>
                                    <div class="ays-survey-condition-containers-conditions-tabs nav-cond-tab-active" data-tab-id="tab2">Email</div>
                                    <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab3">Redirect</div>
                                    <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab4">Woocomerce</div>
                                    <!-- For Woocomerce -->
                                    <!-- <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab4">Product</div> -->
                                </div>
                            </div>
                            <div class="ays-survey-condition-containers-conditions-content">
                                <div class="ays-survey-condition-containers-conditions-contents cond-tab2" >
                                    <div>
                                    <div class="ays-survey-condition-containers-conditions-contents-messages-title">
                                        <span class="ays-survey-messages-contnet-titles">E-mail content</span>
                                    </div>
                                    <hr>
                                    <div>
                                        <?php
                                            $content = __("We value your feedback and appreciate you taking the time to complete the survey.", "survey-maker");
                                            $editor_id = 'ays_survey_conditional_logic_email_message';
                                            $settings = array('editor_height' => '150', 'editor_class' => 'ays-textarea', 'media_elements' => false);
                                            wp_editor($content, $editor_id, $settings);
                                            ?>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="ays-survey-email-message-files-main-contnet">
                                    <div class="ays-survey-condition-containers-conditions-contents-messages-title">
                                        <span class="ays-survey-messages-contnet-titles">E-mail Attachment file</span>
                                    </div>
                                    <hr>
                                    <div class="ays-survey-email-message-files">
                                        <div>
                                            <button class="button ays-survey-add-email-message-files" type="button">Edit file</button>
                                            <input type="hidden" class="ays-survey-email-message-editor-file" >
                                            <input type="hidden" class="ays-survey-email-message-editor-file-id" value="42">
                                        </div>
                                        <div class="ays-survey-email-message-files-body ">
                                            <div class="ays-survey-email-message-files-content">
                                                <a href="https://ays-pro.com/wordpress/survey-maker" class="ays-survey-email-message-files-content-text">your-file-1.jpg</a>                                    
                                            </div>
                                        </div>
                                        <div class="ays-survey-email-message-files-wrapper ">
                                            <div class="ays-survey-email-message-files-wrapper-delete-wrap">
                                                <div role="button" class="ays-survey-email-message-files-wrapper-delete-cont ays-survey-email-message-files-remove removeFile">
                                                <div class="ays-survey-icons">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/close-grey.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="ays-survey-condition-containers-added" data-condition-id="3" data-condition-name="ays_condition_add">
                        <div class="ays-survey-condition-delete-conteiner-box">
                        <div class="ays-survey-answer-icon-box">
                            <div class="ays-survey-action-delete-all-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                    <div class="ays-survey-icons">
                                        <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash.svg">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="ays-survey-condition-containers-ready">
                        <div class="ays-survey-condition-containers-list-main-box">
                            <div class="ays-survey-condition-containers-list-main">
                                <div class="ays-survey-condition-select-question-box" data-question-id="1" data-question-name="question_id">
                                    <div class="ays-survey-condition-selects">
                                    <div class="ays-survey-condition-select-question-box-questions">
                                        <select class="ays-survey-condition-select-question">
                                            <option value="0"><?php echo esc_html__("Select", "survey-maker");?></option>
                                            <option value="13" data-type="radio" data-question-id="13">RAdio</option>
                                            <option value="14" data-type="radio" data-question-id="14">Gender</option>
                                            <option value="15" data-type="number" data-question-id="15">Age</option>
                                            <option value="16" data-type="short_text" data-question-id="16" selected="">Skills</option>
                                            <option value="17" data-type="number" data-question-id="17">Preferred Salary ($)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-condition-select-question-type-hidden" value="short_text" >
                                    </div>
                                    <div class="ays-survey-condition-select-question-answers">
                                        <div class="ays-survey-condition-for-other-types">
                                            <div class="ays-survey-condition-for-other-types-select">
                                                <select class="ays-survey-condition-for-text-types-select" >
                                                <option value="==">Identical</option>
                                                <option value="contains" selected="">Contains</option>
                                                <option value="not_contain">Doesn't contain</option>
                                                </select>
                                            </div>
                                            <div class="ays-survey-condition-for-other-types-text">
                                                <input type="text" value="JavaScript">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-condition-delete-currnet">
                                        <div class="ays-survey-delete-question-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small ays-survey-delete-button-small " data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons ays-survey-icons-small">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash-small.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="ays-survey-condition-select-question-condition">
                                    <select >
                                        <option value="and" selected="">And</option>
                                        <option value="or">Or</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="ays-survey-condition-select-question-box" data-question-id="2" data-question-name="question_id">
                                    <div class="ays-survey-condition-selects">
                                    <div class="ays-survey-condition-select-question-box-questions">
                                        <select class="ays-survey-condition-select-question" >
                                            <option value="0"><?php echo esc_html__("Select", "survey-maker");?></option>
                                            <option value="13" data-type="radio" data-question-id="13">RAdio</option>
                                            <option value="14" data-type="radio" data-question-id="14">Gender</option>
                                            <option value="15" data-type="number" data-question-id="15">Age</option>
                                            <option value="16" data-type="short_text" data-question-id="16">Skills</option>
                                            <option value="17" data-type="number" data-question-id="17" selected="">Preferred Salary ($)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-condition-select-question-type-hidden" value="number" >
                                    </div>
                                    <div class="ays-survey-condition-select-question-answers">
                                        <div class="ays-survey-condition-for-other-types">
                                            <div class="ays-survey-condition-for-other-types-select">
                                                <select class="ays-survey-condition-for-number-types-select" >
                                                <option value="==">Equal to (==)</option>
                                                <option value="!=">Not equal to (!=)</option>
                                                <option value=">" selected="">Greater than (&gt;)</option>
                                                <option value=">=">Greater than or equal to (&gt;=)</option>
                                                <option value="<">Less than (&lt;)</option>
                                                <option value="<=">Less than or equal to (&gt;=)</option>
                                                </select>
                                            </div>
                                            <div class="ays-survey-condition-for-other-types-text">
                                                <input type="number"  value="400">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-condition-delete-currnet">
                                        <div class="ays-survey-delete-question-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small ays-survey-delete-button-small " data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons ays-survey-icons-small">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash-small.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="ays-survey-condition-select-question-condition">
                                    <select >
                                        <option value="and" selected="">And</option>
                                        <option value="or">Or</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="ays-survey-condition-select-question-box" data-question-id="3" data-question-name="question_id">
                                    <div class="ays-survey-condition-selects">
                                    <div class="ays-survey-condition-select-question-box-questions">
                                        <select class="ays-survey-condition-select-question" >
                                            <option value="0"><?php echo esc_html__("Select", "survey-maker");?></option>
                                            <option value="13" data-type="radio" data-question-id="13">RAdio</option>
                                            <option value="14" data-type="radio" data-question-id="14">Gender</option>
                                            <option value="15" data-type="number" data-question-id="15">Age</option>
                                            <option value="16" data-type="short_text" data-question-id="16">Skills</option>
                                            <option value="17" data-type="number" data-question-id="17" selected="">Preferred Salary ($)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-condition-select-question-type-hidden" value="number" >
                                    </div>
                                    <div class="ays-survey-condition-select-question-answers">
                                        <div class="ays-survey-condition-for-other-types">
                                            <div class="ays-survey-condition-for-other-types-select">
                                                <select class="ays-survey-condition-for-number-types-select" >
                                                <option value="==">Equal to (==)</option>
                                                <option value="!=">Not equal to (!=)</option>
                                                <option value=">">Greater than (&gt;)</option>
                                                <option value=">=">Greater than or equal to (&gt;=)</option>
                                                <option value="<" selected="">Less than (&lt;)</option>
                                                <option value="<=">Less than or equal to (&gt;=)</option>
                                                </select>
                                            </div>
                                            <div class="ays-survey-condition-for-other-types-text">
                                                <input type="number" value="600">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-condition-delete-currnet">
                                        <div class="ays-survey-delete-question-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small ays-survey-delete-button-small " data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons ays-survey-icons-small">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash-small.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="ays-survey-condition-select-question-condition">
                                    <select>
                                        <option value="and" selected="">And</option>
                                        <option value="or">Or</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="ays-survey-condition-select-question-box" data-question-id="4" data-question-name="question_id">
                                    <div class="ays-survey-condition-selects">
                                    <div class="ays-survey-condition-select-question-box-questions">
                                        <select class="ays-survey-condition-select-question">
                                            <option value="0"><?php echo esc_html__("Select", "survey-maker");?></option>
                                            <option value="13" data-type="radio" data-question-id="13">RAdio</option>
                                            <option value="14" data-type="radio" data-question-id="14">Gender</option>
                                            <option value="15" data-type="number" data-question-id="15" selected="">Age</option>
                                            <option value="16" data-type="short_text" data-question-id="16">Skills</option>
                                            <option value="17" data-type="number" data-question-id="17">Preferred Salary ($)</option>
                                        </select>
                                        <input type="hidden" class="ays-survey-condition-select-question-type-hidden" value="number">
                                    </div>
                                    <div class="ays-survey-condition-select-question-answers">
                                        <div class="ays-survey-condition-for-other-types">
                                            <div class="ays-survey-condition-for-other-types-select">
                                                <select class="ays-survey-condition-for-number-types-select">
                                                <option value="==">Equal to (==)</option>
                                                <option value="!=">Not equal to (!=)</option>
                                                <option value=">" selected="">Greater than (&gt;)</option>
                                                <option value=">=">Greater than or equal to (&gt;=)</option>
                                                <option value="<">Less than (&lt;)</option>
                                                <option value="<=">Less than or equal to (&gt;=)</option>
                                                </select>
                                            </div>
                                            <div class="ays-survey-condition-for-other-types-text">
                                                <input type="number" value="18">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ays-survey-condition-delete-currnet">
                                        <div class="ays-survey-delete-question-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small ays-survey-delete-button-small " data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Delete">
                                            <div class="ays-question-img-icon-content">
                                                <div class="ays-question-img-icon-content-div">
                                                <div class="ays-survey-icons ays-survey-icons-small">
                                                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/trash-small.svg">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="ays-survey-condition-select-question-condition">
                                    </div>
                                </div>
                            </div>
                            <div class="ays-survey-condition-containers-add-list-button-box">
                                <div class="ays-survey-action-add-sub-condition appsMaterialWizButtonPapericonbuttonEl appsMaterialWizButtonPapericonbuttonEl-small" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Add answer">
                                    <div class="ays-question-img-icon-content">
                                    <div class="ays-question-img-icon-content-div">
                                        <div class="ays-survey-icons ays-survey-icons-small">
                                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline-small.svg">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ays-survey-condition-containers-conditions">
                            <div class="ays-survey-condition-containers-conditions-titles">
                                <div class="ays-survey-condition-containers-conditions-titles-nav-bar">
                                    <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab1">Page</div>
                                    <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab2">Email</div>
                                    <div class="ays-survey-condition-containers-conditions-tabs nav-cond-tab-active" data-tab-id="tab3">Redirect</div>
                                    <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab4">Woocomerce</div>
                                    <!-- For Woocomerce -->
                                    <!-- <div class="ays-survey-condition-containers-conditions-tabs " data-tab-id="tab4">Product</div> -->
                                </div>
                            </div>
                            <div class="ays-survey-condition-containers-conditions-content">
                                <div class="ays-survey-condition-containers-conditions-contents cond-tab3" >
                                    <div class="form-group row">
                                    <div class="col-sm-3">
                                        <div class="ays-survey-conditions-redirect-messages-labels">
                                            <label class="ays-survey-redirect-message-delay-label" for="ays-survey-redirect-delay-current-3">
                                                <?php echo esc_html__("Delay", "survey-maker");?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="ays-survey-conditions-redirect-messages">
                                            <input type="number" class="ays-survey-redirect-message-delay ays-survey-conditions-messages-input" value="1" id="ays-survey-redirect-delay-current-3">
                                        </div>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                    <div class="col-sm-3">
                                        <div class="ays-survey-conditions-redirect-messages-labels">
                                            <label class="ays-survey-redirect-message-url-label" for="ays-survey-redirect-url-current-3">
                                                <?php echo esc_html__("Url", "survey-maker");?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="ays-survey-conditions-redirect-messages">
                                            <input type="text" class="ays-survey-redirect-message-url ays-survey-conditions-messages-input" value="https://ays-pro.com/wordpress/survey-maker" id="ays-survey-redirect-url-current-3">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="ays-survey-action-add-condition appsMaterialWizButtonPapericonbuttonEl" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="auto" data-content="Add answer">
                    <div class="ays-question-img-icon-content ays-question-img-icon-content-conditions">
                        <div class="ays-question-img-icon-content-div">
                        <div class="ays-survey-icons">
                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/add-circle-outline.svg">
                        </div>
                        </div>
                    </div>
                    <div>
                        <span style="padding: 10px;"><?php echo esc_html__("Add condition", "survey-maker");?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>