<?php
    $action = ( isset($_GET['action']) ) ? sanitize_text_field( $_GET['action'] ) : '';
    $id     = ( isset($_GET['survey']) ) ? sanitize_text_field( $_GET['survey'] ) : null;
    
    $survey_max_id = Survey_Maker_Admin::get_max_id('surveys');

    $plus_icon_svg = "<span class=''><img src='". esc_attr(SURVEY_MAKER_ADMIN_URL) ."/images/icons/plus-icon.svg'></span>";
    $youtube_icon_svg = "<span ><img src='". esc_attr(SURVEY_MAKER_ADMIN_URL) ."/images/icons/youtube-video-icon.svg' ></span>";
?>

<div class="wrap ays_surveys_list_table">
    <div class="ays-survey-heading-box">
        <div class="ays-survey-wordpress-user-manual-box">
            <a href="https://www.youtube.com/watch?v=dxYz-gNrrrY" target="_blank" style="text-decoration: none;font-size: 13px;">
                <span><img src='<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/youtube-video-icon.svg' ></span>
                <span style="margin-left: 3px; text-decoration: underline;"><?php echo esc_html__('60 min Video Guide', "survey-maker"); ?></span>
            </a>
            <a href="https://ays-pro.com/wordpress-survey-maker-user-manual" target="_blank" style="text-decoration: none;font-size: 13px;">
                <i class="ays_fa ays_fa_file_text" ></i> 
                <span style="margin-left: 3px;text-decoration: underline;">View Documentation</span>
            </a>
        </div>
    </div>
    <h1 class="wp-heading-inline">
        <?php
        echo esc_html__( get_admin_page_title(), "survey-maker" );
        ?>
    </h1>
    <?php do_action('ays_survey_sale_banner'); ?>
    <div class="ays-survey-maker-add-new-button-box">
        <?php
            echo sprintf( '<a href="?page=%s&action=%s" class="page-title-action button-primary page-title-action-surveys-page ays-survey-add-new-button-page-title-action ays-survey-add-new-button-new-design"> %s ' . esc_html(__('Add New', "survey-maker")) . '</a>', esc_attr( $_REQUEST['page'] ), 'add', wp_kses($plus_icon_svg, Survey_Maker_Data::get_allowed_tags_for_loader()));
        ?>
    </div>
    <div id="poststuff" style="padding-top: 0;">
        <div id="post-body" class="metabox-holder">
            <div id="post-body-content" style="margin-bottom: 10px;">
                <div class="meta-box-sortables ui-sortable">
                    <?php
                        $this->surveys_obj->views();
                    ?>
                    <form method="post">
                        <?php
                            $this->surveys_obj->prepare_items();
                            $search = __( "Search", "survey-maker" );
                            $this->surveys_obj->search_box($search, $this->plugin_name);
                            $this->surveys_obj->display();
                               
                        ?>
                        
                    </form>
                </div>
            </div>
        </div>
        
        <br class="clear">
        <div class="ays-survey-create-survey-youtube-video-button-box-bottom" >
            <?php echo sprintf( '<a href="?page=%s&action=%s" class="page-title-action button-primary page-title-action-surveys-page ays-survey-add-new-button-page-title-action ays-survey-add-new-button-new-design"> %s ' . esc_html__('Add New', "survey-maker") . '</a>', esc_attr( $_REQUEST['page'] ), 'add', wp_kses($plus_icon_svg, Survey_Maker_Data::get_allowed_tags_for_loader()));?>
        </div>
        <?php if($survey_max_id <= 3): ?>
            <div class="ays-survey-create-survey-video-box" style="margin: auto;">
                <div class="ays-survey-create-survey-title">
                    <h4><?php echo esc_html__( "Create Your First Survey in Under One Minute", "survey-maker" ); ?></h4>
                </div>
                <div class="ays-survey-create-survey-youtube-video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/vZ2-VEd8Bq4" loading="lazy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="max-width: 100%;"></iframe>
                </div>
                <div class="ays-survey-create-survey-youtube-video-button-box-top">
                    <?php echo sprintf( '<a href="?page=%s&action=%s" class="ays-survey-add-new-button-video ays-survey-add-new-button-new-design"> %s ' . esc_html__('Add New', "survey-maker") . '</a>', esc_attr( $_REQUEST['page'] ), 'add', wp_kses($plus_icon_svg, Survey_Maker_Data::get_allowed_tags_for_loader()));?>
                </div>
            </div>
        <?php else: ?>
            <div class="ays-survey-create-survey-video-box" style="margin: auto;height: 83px;">                
                <div class="ays-survey-create-survey-youtube-video">
                    <?php echo wp_kses($youtube_icon_svg, Survey_Maker_Data::get_allowed_tags_for_loader()); ?>
                    <a href="https://www.youtube.com/watch?v=vZ2-VEd8Bq4" target="_blank" title="YouTube video player" >How to create Survey in Under One Minute</a>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
