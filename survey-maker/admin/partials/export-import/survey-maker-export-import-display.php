<?php
$example_export_path = SURVEY_MAKER_ADMIN_URL . '/partials/export-import/survey-export-example.json';
?>
<div class="wrap ays_results_table">
    <div class="container-fluid">
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
            echo esc_html(__(get_admin_page_title(),"survey-maker"));
            ?>
        </h1>
        <?php do_action('ays_survey_sale_banner'); ?>

        <div style="display: flex;justify-content: center; align-items: center;">
            <div class="ays-survey-youtube-placeholder" data-video-id="xLSv8h87fX4">
                <img src="<?php echo esc_url(SURVEY_MAKER_ADMIN_URL .'/images/youtube/export-import-video-screenshot.webp'); ?>" width="560" height="315">
            </div>
        </div>

        <div class="nav-tab-wrapper">
            <a href="#tab1" class="nav-tab nav-tab-active"><?php echo esc_html__('Export',"survey-maker"); ?></a>
            <a href="#tab2" class="nav-tab"><?php echo esc_html__('Import',"survey-maker"); ?></a>
            <a href="<?php echo esc_url($example_export_path); ?>" class="export-survey-example" download="survey-export-example.json"><?php echo esc_html__('Download example for import',"survey-maker"); ?></a>
        </div>

        <div id="tab1" class="ays-survey-tab-content ays-survey-tab-content-active">
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
                    <form method="post" id="ays-export-form">
                        <p class="ays-subtitle"><?php echo esc_html__('Export surveys',"survey-maker")?></p>
                        <hr/>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="ays_select_surveys">
                                    <span><?php echo esc_html__("Select Surveys", "survey-maker"); ?></span>
                                    <a class="ays_help ays-survey-zindex-for-pro" data-toggle="tooltip" title="<?php echo esc_html__('Specify the surveys which must be exported. If you want to export all surveys just leave blank.',"survey-maker")?>">
                                    <i class="ays_fa ays_fa_info_circle"></i>
                                </a>
                                </label>
                            </div>
                            <div class="col-sm-8">                        
                                <select id="ays_select_surveys" multiple>
                                    <option value=""><?php echo esc_html__( "Survey title", "survey-maker" ); ?></option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="button" class="button ays_export_surveys" id="export-reports" disabled="disabled" ><?php echo esc_html__( "Export to JSON", "survey-maker" ); ?>
                                </button>
                                <a download="" id="downloadFile" hidden href=""></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="tab2" class="ays-survey-tab-content">
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
                    <div class="upload-import-file-wrap show-upload-view">
                        <div class="upload-import-file">
                            <p class="install-help"><?php echo esc_html__( "After completing the exporting process, move to the website where you are planning to import those surveys. Click on the Choose file button and pick the JSON file which you exported recently. Click on the Import Now button at the end.", "survey-maker" ); ?></p>
                            <form method="post" enctype="multipart/form-data" class="ays-dn">
                                <input type="file" accept=".json" id="import_file"/>
                                <label class="screen-reader-text" for="import_file"><?php echo esc_html__( "Import file", "survey-maker" ); ?></label>
                                <input type="submit" class="button" value="<?php echo esc_html__( "Import now", "survey-maker" ); ?>" disabled="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

