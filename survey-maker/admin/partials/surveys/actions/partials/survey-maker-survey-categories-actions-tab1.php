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
    <div class='ays-field-dashboard'>
        <label for='ays-description'>
            <?php echo esc_html__('Description', "survey-maker"); ?>
            <a class="ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Provide more information about the survey category. Attach images or any other media to its description if you wish.',"survey-maker")?>">
                <i class="ays_fa ays_fa_info_circle"></i>
            </a>
        </label>
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
        <div class="col-sm-10">
            <select id="ays-status" name="<?php echo esc_attr($html_name_prefix); ?>status">
                <option></option>
                <option <?php selected( esc_attr($status), 'published' ); ?> value="published"><?php echo esc_html__( "Published", "survey-maker" ); ?></option>
                <option <?php selected( esc_attr($status), 'draft' ); ?> value="draft"><?php echo esc_html__( "Draft", "survey-maker" ); ?></option>
            </select>
        </div>
    </div> <!-- Status -->
</div>
