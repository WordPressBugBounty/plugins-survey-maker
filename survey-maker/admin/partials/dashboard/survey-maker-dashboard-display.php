<?php

$course_page_url = sprintf('?page=%s', 'survey-maker');
$lessons_page_url = admin_url( 'edit.php?post_type=flessons' );

$survey_page_url = sprintf('?page=%s', 'survey-maker');
// $add_new_url = sprintf('?page=%s&action=%s', 'survey-maker', 'add');
$questions_page_url = sprintf('?page=%s', 'survey-maker-questions');
$new_questions_page_url = sprintf('?page=%s&action=%s', 'survey-maker-questions', 'add');

?>
<div class="wrap">
    <!-- Hero Section -->
    <section class="survey-maker-hero">
        <div class="survey-maker-hero-container">
            <div class="survey-maker-logo">
                <img class="logo" src="<?php echo esc_url(SURVEY_MAKER_ADMIN_URL) . '/images/icon-survey-128x128.png'; ?>" alt="Survey Maker" title="Survey Maker"/>
            </div>
            <h2 class="survey-maker-hero-title"><?php echo esc_html__("Welcome to Survey Maker", 'survey-maker'); ?></h2>
            <p class="survey-maker-hero-subtitle"><?php echo esc_html__("Create amazing online surveys and get real-time feedback quickly and easily.", 'survey-maker'); ?></p>
            <div class="survey-maker-hero-buttons">                
                <a class="survey-maker-btn survey-maker-btn-primary" href="<?php echo esc_url($survey_page_url); ?>">
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.9495 7.91656V5.66656C13.9495 4.26644 13.9495 3.56636 13.6812 3.03159C13.4452 2.56119 13.0687 2.17874 12.6054 1.93905C12.0789 1.66656 11.3896 1.66656 10.011 1.66656H4.75975C3.38116 1.66656 2.69186 1.66656 2.16531 1.93905C1.70215 2.17874 1.32558 2.56119 1.08958 3.03159C0.821289 3.56636 0.821289 4.26644 0.821289 5.66656V14.3333C0.821289 15.7334 0.821289 16.4334 1.08958 16.9683C1.32558 17.4386 1.70215 17.8211 2.16531 18.0608C2.69186 18.3333 3.38116 18.3333 4.75975 18.3333H9.02642M9.02642 9.16656H4.10334M5.74436 12.4999H4.10334M10.6674 5.83324H4.10334M11.0777 12.5018C11.2223 12.0844 11.5076 11.7324 11.8832 11.5082C12.2588 11.284 12.7004 11.2021 13.1299 11.2769C13.5593 11.3517 13.9487 11.5784 14.2293 11.9169C14.5098 12.2554 14.6634 12.6839 14.6628 13.1263C14.6628 14.3754 12.818 14.9999 12.818 14.9999M12.8417 17.4999H12.85" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <?php echo esc_html__("Create Survey", 'survey-maker'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Quick Start Steps Section -->
    <section class="survey-maker-steps">
        <div class="survey-maker-steps-container">
            <h2 class="survey-maker-steps-title"><?php echo esc_html__("Quick Setup Guide", 'survey-maker'); ?></h2>
            <div class="survey-maker-steps-content">
                <div class="survey-maker-steps-list">
                    <h3 class="survey-maker-steps-sub-title"><?php echo esc_html__("4 Simple Steps", 'survey-maker'); ?></h3>
                    <ol class="survey-maker-ordered-list">
                        <li class="survey-maker-step-item">
                            <div class="survey-maker-step-number">1</div>
                            <div class="survey-maker-step-text">
                                <p class="survey-maker-step-title"><?php echo esc_html__("Create survey", 'survey-maker'); ?></p>
                            </div>
                        </li>
                        <li class="survey-maker-step-item">
                            <div class="survey-maker-step-number">2</div>
                            <div class="survey-maker-step-text">
                                <p class="survey-maker-step-title"><?php echo esc_html__("Create questions", 'survey-maker'); ?></p>
                            </div>
                        </li>
                        <li class="survey-maker-step-item">
                            <div class="survey-maker-step-number">3</div>
                            <div class="survey-maker-step-text">
                                <p class="survey-maker-step-title"><?php echo esc_html__("Adjust settings", 'survey-maker'); ?></p>
                            </div>
                        </li>
                        <li class="survey-maker-step-item">
                            <div class="survey-maker-step-number">4</div>
                            <div class="survey-maker-step-text">
                                <p class="survey-maker-step-title"><?php echo esc_html__("Copy/paste shortcode", 'survey-maker'); ?></p>
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="survey-maker-video-container">
                    <div class="survey-maker-video-wrapper">
                        <div class="survey-maker-create-course-youtube-video">
                            <div class="ays-survey-youtube-placeholder survey-maker-youtube-placeholder" data-video-id="Mdpnq-qNtP0">
                                <img src="<?php echo esc_url(SURVEY_MAKER_ADMIN_URL .'/images/youtube/create-survey-on-wordpress-480.webp'); ?>" width="480" height="265">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Resources Section -->
    <section class="survey-maker-video-resources">
        <div class="survey-maker-video-resources-container">
            <div class="survey-maker-video-resources-header">
                <h2 class="survey-maker-video-resources-title"><?php echo esc_html__("Learn with Video", 'survey-maker'); ?></h2>
                <p class="survey-maker-video-resources-subtitle"><?php echo esc_html__("Watch our comprehensive video tutorials to master Survey Maker quickly", 'survey-maker'); ?></p>
            </div>
            <div class="survey-maker-video-cards">
                <div class="survey-maker-video-row">
                    <a href="https://youtu.be/f9NgzjmS-HA?si=Yy0Q6Txy1IK6e-zN" target="_blank" class="survey-maker-video-card">
                        <div class="survey-maker-video-card-content">
                            <div class="survey-maker-video-card-icon">
                                <svg class="survey-maker-play-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="6 3 20 12 6 21 6 3"></polygon>
                                </svg>
                            </div>
                            <div class="survey-maker-video-card-text">
                                <div class="survey-maker-video-card-header">
                                    <h3 class="survey-maker-video-card-title"><?php echo esc_html__("How to create WordPress Survey", 'survey-maker'); ?></h3>
                                    <svg class="survey-maker-external-link" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 3h6v6"></path>
                                        <path d="M10 14 21 3"></path>
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                    </svg>
                                </div>
                                <p class="survey-maker-video-card-description"><?php echo esc_html__("Learn how to create a survey in WordPress using the free version of Survey Maker.", 'survey-maker'); ?></p>
                                <span class="survey-maker-video-duration"><?php echo esc_html__("10 min", 'survey-maker'); ?></span>
                            </div>
                        </div>
                    </a>

                    <a href="https://youtu.be/dxYz-gNrrrY?si=7vmkJtLK-QiGdOsJ" target="_blank" class="survey-maker-video-card">
                        <div class="survey-maker-video-card-content">
                            <div class="survey-maker-video-card-icon">
                                <svg class="survey-maker-play-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="6 3 20 12 6 21 6 3"></polygon>
                                </svg>
                            </div>
                            <div class="survey-maker-video-card-text">
                                <div class="survey-maker-video-card-header">
                                    <h3 class="survey-maker-video-card-title"><?php echo esc_html__("WordPress Survey Maker Plugin Overview", 'survey-maker'); ?></h3>
                                    <svg class="survey-maker-external-link" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 3h6v6"></path>
                                        <path d="M10 14 21 3"></path>
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                    </svg>
                                </div>
                                <p class="survey-maker-video-card-description"><?php echo esc_html__("A quick overview of Survey Maker and how to build surveys step by step.", 'survey-maker'); ?></p>
                                <span class="survey-maker-video-duration"><?php echo esc_html__("61 min", 'survey-maker'); ?></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="survey-maker-video-row">
                    <a href="https://youtu.be/jyEXM28vx7I?si=hLSe0CKY3Qb_mIhm" target="_blank" class="survey-maker-video-card">
                        <div class="survey-maker-video-card-content">
                            <div class="survey-maker-video-card-icon">
                                <svg class="survey-maker-play-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="6 3 20 12 6 21 6 3"></polygon>
                                </svg>
                            </div>
                            <div class="survey-maker-video-card-text">
                                <div class="survey-maker-video-card-header">
                                    <h3 class="survey-maker-video-card-title"><?php echo esc_html__("All Survey Question Types Explained", 'survey-maker'); ?></h3>
                                    <svg class="survey-maker-external-link" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 3h6v6"></path>
                                        <path d="M10 14 21 3"></path>
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                    </svg>
                                </div>
                                <p class="survey-maker-video-card-description"><?php echo esc_html__("Explore all available question types and how each can be used in your surveys.", 'survey-maker'); ?></p>
                                <span class="survey-maker-video-duration"><?php echo esc_html__("12 min", 'survey-maker'); ?></span>
                            </div>
                        </div>
                    </a>
                    <a href="https://youtu.be/AG08FntZeHY?si=WFZ08NSzCUTEcdcX" target="_blank" class="survey-maker-video-card">
                        <div class="survey-maker-video-card-content">
                            <div class="survey-maker-video-card-icon">
                                <svg class="survey-maker-play-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="6 3 20 12 6 21 6 3"></polygon>
                                </svg>
                            </div>
                            <div class="survey-maker-video-card-text">
                                <div class="survey-maker-video-card-header">
                                    <h3 class="survey-maker-video-card-title"><?php echo esc_html__("Create Survey in One Minute", 'survey-maker'); ?></h3>
                                    <svg class="survey-maker-external-link" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 3h6v6"></path>
                                        <path d="M10 14 21 3"></path>
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                    </svg>
                                </div>
                                <p class="survey-maker-video-card-description"><?php echo esc_html__("See how to create a full WordPress survey in under one minute!", 'survey-maker'); ?></p>
                                <span class="survey-maker-video-duration"><?php echo esc_html__("1 min", 'survey-maker'); ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Help Section -->
    <section id="survey-maker-help-types" class="survey-maker-help-demos-section">
        <div class="survey-maker-help-container">
            <div class="survey-maker-help-max-width">
                <div class="survey-maker-help-header">
                    <h2 class="survey-maker-help-title"><?php echo esc_html__("Support & Resources", 'survey-maker'); ?></h2>
                    <!-- <p class="survey-maker-help-description">Explore different types of surveyzes and interactive features</p> -->
                </div>
                <div class="survey-maker-help-grid">
                    <div class="survey-maker-help-card">
                        <div class="survey-maker-help-card-header">
                            <div class="survey-maker-help-icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="survey-maker-help-icon">
                                    <path d="M12 7v14"></path>
                                    <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path>
                                </svg>
                            </div>
                            <h3 class="survey-maker-help-card-title"><?php echo esc_html__("Documentation", 'survey-maker'); ?></h3>
                        </div>
                        <div class="survey-maker-help-card-content">
                            <p class="survey-maker-help-card-description"><?php echo esc_html__("Access comprehensive guides and tutorials to master Survey Maker.", 'survey-maker'); ?></p>
                            <a href="https://ays-pro.com/wordpress-survey-maker-user-manual" class="survey-maker-help-button" target="_blank">
                                <?php echo esc_html__("View Docs", 'survey-maker'); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="survey-maker-help-button-icon">
                                    <path d="M15 3h6v6"></path>
                                    <path d="M10 14 21 3"></path>
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="survey-maker-help-card">
                        <div class="survey-maker-help-card-header">
                            <div class="survey-maker-help-icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="survey-maker-help-icon">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <h3 class="survey-maker-help-card-title"><?php echo esc_html__("Community Forum", 'survey-maker'); ?></h3>
                        </div>
                        <div class="survey-maker-help-card-content">
                            <p class="survey-maker-help-card-description"><?php echo esc_html__("Join discussions with other educators and get help from the community.", 'survey-maker'); ?></p>
                            <a href="https://wordpress.org/support/plugin/survey-maker/" class="survey-maker-help-button" target="_blank">
                                <?php echo esc_html__("Join Forum", 'survey-maker'); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="survey-maker-help-button-icon">
                                    <path d="M15 3h6v6"></path>
                                    <path d="M10 14 21 3"></path>
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="survey-maker-help-card">
                        <div class="survey-maker-help-card-header">
                            <div class="survey-maker-help-icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="survey-maker-help-icon">
                                    <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                                </svg>
                            </div>
                            <h3 class="survey-maker-help-card-title"><?php echo esc_html__("Contact Support", 'survey-maker'); ?></h3>
                        </div>
                        <div class="survey-maker-help-card-content">
                            <p class="survey-maker-help-card-description"><?php echo esc_html__("Get direct help from our support team for technical issues.", 'survey-maker'); ?></p>
                            <a href="https://ays-pro.com/contact" class="survey-maker-help-button" target="_blank">
                                <?php echo esc_html__("Get Help", 'survey-maker'); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="survey-maker-help-button-icon">
                                    <path d="M15 3h6v6"></path>
                                    <path d="M10 14 21 3"></path>
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="survey-maker-help-card">
                        <div class="survey-maker-help-card-header">
                            <div class="survey-maker-help-icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="survey-maker-help-icon">
                                    <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                                    <line x1="8" x2="16" y1="21" y2="21"></line>
                                    <line x1="12" x2="12" y1="17" y2="21"></line>
                                </svg>
                            </div>
                            <h3 class="survey-maker-help-card-title"><?php echo esc_html__("Demo", 'survey-maker'); ?></h3>
                        </div>
                        <div class="survey-maker-help-card-content">
                            <p class="survey-maker-help-card-description"><?php echo esc_html__("See Survey Maker in action with our interactive demo and examples.", 'survey-maker'); ?></p>
                            <a href="https://ays-demo.com/wordpress-survey-plugin-pro-demo/" class="survey-maker-help-button" target="_blank">
                                <?php echo esc_html__("Try Demo", 'survey-maker'); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="survey-maker-help-button-icon">
                                    <path d="M15 3h6v6"></path>
                                    <path d="M10 14 21 3"></path>
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="survey-maker-review-settings" class="survey-maker-review-settings-section">
        <div class="survey-maker-review-settings-container">
            <p style="font-size:13px;text-align:center;font-style:italic;">                
                <span><?php echo esc_html__( "If you love our plugin, please do big favor and rate us on WordPress.org", 'survey-maker'); ?></span> 
                <a target="_blank" class="ays-rated-link" href='https://wordpress.org/support/plugin/survey-maker/reviews/'>
                    <span class="ays-dashicons ays-dashicons-star-empty"></span>
                    <span class="ays-dashicons ays-dashicons-star-empty"></span>
                    <span class="ays-dashicons ays-dashicons-star-empty"></span>
                    <span class="ays-dashicons ays-dashicons-star-empty"></span>
                    <span class="ays-dashicons ays-dashicons-star-empty"></span>
                </a>
            </p>
        </div>
    </section>
</div>

