<div id="tab10" class="ays-survey-publish-tab-content ays-survey-tab-content <?php echo ($ays_tab == 'tab10') ? 'ays-survey-tab-content-active' : ''; ?>">    
    <div class="form-group row" style="justify-content: center">
        <div class="col-sm-12 ays-survey-options-tab-content-max-width">
            <div class="ays-survey-publish-container">
                
                <!-- Header -->
                <div class="ays-survey-publish-header">
                    <h2 class="ays-survey-publish-title"><?php echo esc_html__('Publish Your Survey', 'survey-maker'); ?></h2>
                    <p class="ays-survey-publish-subtitle"><?php echo esc_html__("Learn how to add this survey to your site, depending on the editor you're using.", 'survey-maker'); ?></p>
                </div>

                <!-- Steps Card -->
                <div class="ays-survey-steps-card">
                    <h3 class="ays-survey-steps-card-title"><?php echo esc_html__('Survey Display', 'survey-maker'); ?></h3>

                    <div class="ays-survey-grid-view-summary">
                        <p class="ays-survey-info-card-text">
                            <?php
                            echo wp_kses(
                                sprintf(
                                    /* translators: 1: Opening <strong> tag, 2: Closing </strong> tag */
                                    esc_html__( 'Embed this survey anywhere on your site with a block, widget, or %1$sshortcode%2$s', 'survey-maker' ),
                                    '<strong>',
                                    '</strong>'
                                ),
                                array(
                                    'strong' => array(),
                                )
                            );
                            ?>
                        </p>
                        <?php if(!empty($survey_shortcode)): ?>
                            <div class="ays-survey-publish-shortcode-container">
                                <code class="ays-survey-shortcode-text"><?php echo esc_html($survey_shortcode); ?></code>
                                <div class="ays-survey-copy-wrapper">
                                    <span class="ays-survey-copy-tooltip"><?php echo esc_html__('Copied!', 'survey-maker'); ?></span>
                                    <button type="button" class="ays-survey-copy-shortcode-btn" data-shortcode="<?php echo esc_attr($survey_shortcode); ?>" title="<?php echo esc_attr__('Copy shortcode', 'survey-maker'); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        <?php else: ?>
                            <a href="#" class="ays-survey-info-card-link ays-survey-save-publish-link"><?php echo esc_html__('Save to get shortcode', 'survey-maker'); ?></a>
                        <?php endif; ?>
                    </div>

                    <h4 class="ays-survey-steps-card-title ays-survey-steps-card-title-center"><?php echo esc_html__('How to Add This Survey to Your Site (3 Options)', 'survey-maker'); ?></h4>
                    
                    <!-- Step 1: Gutenberg -->
                    <div class="ays-survey-step-block">
                        <div class="ays-survey-step-header">
                            <div class="ays-survey-step-number-badge"></div>
                            <h3 class="ays-survey-step-title"><?php echo esc_html__('Using Gutenberg Editor', 'survey-maker'); ?></h3>
                        </div>
                        <div class="ays-survey-step-instructions">
                            <ol class="ays-survey-step-list">
                                <li class="ays-survey-step-list-item"><?php echo esc_html__('Click Add Block (+) and select the Survey Maker block.', 'survey-maker'); ?></li>
                                <li class="ays-survey-step-list-item"><?php echo esc_html__('Place the block where you want the survey to appear.', 'survey-maker'); ?></li>
                                <li class="ays-survey-step-list-item"><?php echo esc_html__('Choose the needed survey from the block dropdown.', 'survey-maker'); ?></li>
                            </ol>
                        </div>
                    </div>

                    <hr class="ays-survey-step-divider">

                    <!-- Step 2: Elementor -->
                    <div class="ays-survey-step-block">
                        <div class="ays-survey-step-header">
                            <div class="ays-survey-step-number-badge"></div>
                            <h3 class="ays-survey-step-title"><?php echo esc_html__('Using Elementor', 'survey-maker'); ?></h3>
                        </div>
                        <div class="ays-survey-step-instructions">
                            <ol class="ays-survey-step-list">
                                <li class="ays-survey-step-list-item"><?php echo esc_html__('Find the Survey Maker widget in Elementor widgets.', 'survey-maker'); ?></li>
                                <li class="ays-survey-step-list-item"><?php echo esc_html__('Drag and drop it where you want the survey to appear.', 'survey-maker'); ?></li>
                                <li class="ays-survey-step-list-item"><?php echo esc_html__('Select the survey from the widget settings.', 'survey-maker'); ?></li>
                            </ol>
                        </div>
                    </div>

                    <hr class="ays-survey-step-divider">

                    <!-- Step 3: Classic Editor -->
                    <div class="ays-survey-step-block">
                        <div class="ays-survey-step-header">
                            <div class="ays-survey-step-number-badge"></div>
                            <h3 class="ays-survey-step-title"><?php echo esc_html__('Using Classic Editor', 'survey-maker'); ?></h3>
                        </div>
                        <div class="ays-survey-step-instructions">
                            <p class="ays-survey-step-note"><?php echo esc_html__("The Classic Editor doesn't support Gutenberg blocks directly. In this case, use the survey shortcode.", 'survey-maker'); ?></p>
                            <ol class="ays-survey-step-list">
                                <li class="ays-survey-step-list-item">
                                    <?php echo esc_html__('Copy this survey shortcode:', 'survey-maker'); ?>
                                </li>

                                <li class="ays-survey-step-list-item ays-survey-publish-shortcode-container">
                                    <?php if(!empty($survey_shortcode)): ?>
                                        <code class="ays-survey-shortcode-text"><?php echo esc_html($survey_shortcode); ?></code>
                                        <div class="ays-survey-copy-wrapper">
                                            <span class="ays-survey-copy-tooltip"><?php echo esc_html__('Copied!', 'survey-maker'); ?></span>
                                            <button type="button" class="ays-survey-copy-shortcode-btn" data-shortcode="<?php echo esc_attr($survey_shortcode); ?>" title="<?php echo esc_attr__('Copy shortcode', 'survey-maker'); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <a href="#" class="ays-survey-save-publish-link">
                                            <?php echo esc_html__('Save the survey to generate its shortcode', 'survey-maker'); ?>
                                        </a>
                                    <?php endif; ?>
                                </li>
                                <li class="ays-survey-step-list-item"><?php echo esc_html__('Open the post or page where you want to display the survey in Classic Editor.', 'survey-maker'); ?></li>
                                <li class="ays-survey-step-list-item"><?php echo esc_html__('Paste the shortcode in the editor. Make sure to check whether the Code option is selected.', 'survey-maker'); ?></li>
                                <li class="ays-survey-step-list-item"><?php echo esc_html__('Update the post or page, then open it on the frontend to take the survey.', 'survey-maker'); ?></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
