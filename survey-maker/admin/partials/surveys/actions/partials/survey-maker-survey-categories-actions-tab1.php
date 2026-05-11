<div id="tab1" class="ays-survey-tab-content ays-survey-tab-content-active">
    <div class="form-group row">
        <div class="col-sm-2">
            <label for='ays-title'>
                <?php echo esc_html__('Title', "survey-maker"); ?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Set the survey category title.',"survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-10">
            <input type="text" class="ays-text-input" id='ays-title' name='<?php echo esc_attr($html_name_prefix); ?>title'
                   value="<?php echo esc_attr($title); ?>" />
        </div>
    </div> <!-- Title -->
    <hr/>
    <div class="form-group row">
        <div class="col-sm-2">
            <label for='ays-description'>
                <?php echo esc_html__('Description', "survey-maker"); ?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Provide more information about the survey category. Attach images or any other media to its description if you wish.',"survey-maker")?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-10">
        <?php
            $content = $description;
            $editor_id = 'ays-description';
            $settings = array( 
                'editor_height' => $survey_wp_editor_height,
                'textarea_name' => $html_name_prefix . 'description',
                'editor_class' => 'ays-textarea'
            );
            wp_editor( $content, $editor_id, $settings );
        ?>
        </div>
    </div> <!-- Description -->
    <hr/>
    <div class="form-group row">
        <div class="col-sm-2">
            <label for="ays-status">
                <?php echo esc_html__('Category status', "survey-maker"); ?>
                <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__("Decide whether the survey category is active or not. If the category is a draft, it won't be shown anywhere on your website (you don't need to remove shortcodes).","survey-maker"); ?>">
                    <i class="ays_fa ays_fa_info_circle"></i>
                </a>
            </label>
        </div>
        <div class="col-sm-10 d-flex">
            <div class="form-check form-check-inline checkbox_ays">
                <input type="radio" id="ays-status-published-type" class="form-check-input" name="<?php echo esc_attr($html_name_prefix); ?>status" value="published" <?php echo ($status == 'published') ? 'checked' : ''; ?>/>
                <label class="form-check-label" for="ays-status-published-type"><?php echo esc_html__('Published',"survey-maker"); ?></label>
            </div>
            <div class="form-check form-check-inline checkbox_ays">
                <input type="radio" id="ays-status-draft-type" class="form-check-input" name="<?php echo esc_attr($html_name_prefix); ?>status" value="draft" <?php echo ($status == 'draft') ? 'checked' : ''; ?>/>
                <label class="form-check-label" for="ays-status-draft-type"><?php echo esc_html__('Draft',"survey-maker"); ?></label>
            </div>
        </div>
    </div> <!-- Status -->
</div>
