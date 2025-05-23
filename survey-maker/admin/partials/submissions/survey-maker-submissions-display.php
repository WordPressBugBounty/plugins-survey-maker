<?php

?>
<div class="wrap ays_results_table">
    <div class="ays-survey-heading-box">
        <div class="ays-survey-wordpress-user-manual-box">
            <a href="https://ays-pro.com/wordpress-survey-maker-user-manual" target="_blank" style="text-decoration: none;font-size: 13px;">
                <i class="ays_fa ays_fa_file_text" ></i> 
                <span style="margin-left: 3px;text-decoration: underline;">View Documentation</span>
            </a>
        </div>
    </div>
    <h1 class="wp-heading-inline">
        <?php
        echo esc_html__(get_admin_page_title(),"survey-maker");
        ?>
    </h1>
    <?php do_action('ays_survey_sale_banner'); ?>
    <div class="question-action-butons">
        <a href="https://ays-pro.com/wordpress/survey-maker" class="button button-primary" style="float: right;opacity: 0.5;" target="_blank"><?php echo esc_html__('Export', "survey-maker"); ?></a>
    </div>
    <div class="nav-tab-wrapper">
        <a href="#tab1" class="nav-tab nav-tab-active"><?php echo esc_html__('Surveys',"survey-maker")?></a>
        <a href="#tab2" class="nav-tab"><?php echo esc_html__('Global Statistics',"survey-maker")?></a>
        <!-- <a href="#tab3" class="nav-tab"><?php echo esc_html__('Global Leaderboard',"survey-maker")?></a> -->
    </div>

    <div id="tab1" class="ays-survey-tab-content ays-survey-tab-content-active">
        <div id="poststuff">
            <div id="post-body" class="metabox-holder">
                <div id="post-body-content">
                    <div class="meta-box-sortables ui-sortable">
                        <form method="post">
                            <?php
                                $this->submissions_obj->prepare_items();
                                $search = esc_html__( "Search", "survey-maker" );
                                $this->submissions_obj->search_box($search, $this->plugin_name);
                                $this->submissions_obj->display();
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tab2" class="ays-survey-tab-content">
        <div class="form-group row" style="margin:0px;padding-top: 10px;">
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
                <div>
                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL).'/images/screenshots/global-sub.png'?>" alt="Global Statistics" style="width:100%;" > 
                </div>
            </div>
        </div>
    </div>

    <div id="tab3" class="ays-survey-tab-content">
        
    </div>

    <div class="ays-modal" id="export-filters">
        <div class="ays-modal-content">
            <div class="ays-preloader">
                <img class="loader" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/loaders/3-1.svg">
            </div>
          <!-- Modal Header -->
            <div class="ays-modal-header">
                <span class="ays-close">&times;</span>
                <h2><?php echo esc_html__('Export Filter', "survey-maker")?></h2>
            </div>

          <!-- Modal body -->
            <div class="ays-modal-body">
                <form method="post" id="ays_export_filter">
                    <div class="filter-col">
                        <label for="user_id-filter"><?php echo esc_html__("Users", "survey-maker")?></label>
                        <button type="button" class="ays_userid_clear button button-small wp-picker-default"><?php echo esc_html__("Clear", "survey-maker")?></button>
                        <select name="user_id-select[]" id="user_id-filter" multiple="multiple"></select>
                    </div>
                    <hr>
                    <div class="filter-col">
                        <label for="quiz_id-filter"><?php echo esc_html__("Quizzes", "survey-maker")?></label>
                        <button type="button" class="ays_quizid_clear button button-small wp-picker-default"><?php echo esc_html__("Clear", "survey-maker")?></button>
                        <select name="quiz_id-select[]" id="quiz_id-filter" multiple="multiple"></select>
                    </div>
                    <div class="filter-block">
                        <div class="filter-block filter-col">
                            <label for="start-date-filter"><?php echo esc_html__("Start Date from", "survey-maker")?></label>
                            <input type="date" name="start-date-filter" id="start-date-filter">
                        </div>
                        <div class="filter-block filter-col">
                            <label for="end-date-filter"><?php echo esc_html__("Start Date to", "survey-maker")?></label>
                            <input type="date" name="end-date-filter" id="end-date-filter">
                        </div>
                    </div>
                </form>
            </div>

          <!-- Modal footer -->
            <div class="ays-modal-footer">
                <div class="export_results_count">
                    <p>Matched <span></span> results</p>
                </div>
                <span><?php echo esc_html__('Export to', "survey-maker"); ?></span>
                <button type="button" class="button button-primary export-action" data-type="csv"><?php echo esc_html__('CSV', "survey-maker")?></button>
                <button type="button" class="button button-primary export-action" data-type="xlsx"><?php echo esc_html__('XLSX', "survey-maker")?></button>
                <button type="button" class="button button-primary export-action" data-type="json"><?php echo esc_html__('JSON', "survey-maker")?></button>
                <a download="" id="downloadFile" hidden href=""></a>
            </div>

        </div>
    </div>
</div>

