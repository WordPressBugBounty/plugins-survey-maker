<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
// Get plugin data for dynamic buttons
$am_plugins = $this->get_am_plugins();

// Define plugin mappings
$plugin_mappings = array(
    'fox-lms' => 'fox-lms',
    'quiz-maker' => 'quiz-maker',
    'poll-maker' => 'poll-maker', 
    'ays-popup-box' => 'ays-popup-box',
    'gallery-photo-gallery' => 'gallery-photo-gallery',
    'secure-copy-content-protection' => 'secure-copy-content-protection',
    'ays-facebook-popup-likebox' => 'ays-facebook-popup-likebox',
    'chart-builder' => 'chart-builder'
);

// Function to get plugin button HTML
function get_plugin_button_html($plugin_slug, $admin_obj) {
    if (!function_exists('get_plugins')) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    
    $plugins = get_plugins();
    $plugin_file = '';
    $is_installed = false;
    $is_active = false;
    
    // Find plugin file
    foreach ($plugins as $file => $plugin_data) {
        if (strpos($file, $plugin_slug) !== false) {
            $plugin_file = $file;
            $is_installed = true;
            $is_active = is_plugin_active($file);
            break;
        }
    }
    
    if ($is_active) {
        return '<button class="ays-survey-card__btn-info ays-survey-plugin-btn disabled" disabled>' . __('Activated', 'survey-maker') . '</button>';
    } elseif ($is_installed) {
        return '<button class="ays-survey-card__btn-info ays-survey-plugin-btn" data-action="activate" data-plugin="' . esc_attr($plugin_slug) . '">' . __('Activate', 'survey-maker') . '</button>';
    } else {
        return '<button class="ays-survey-card__btn-info ays-survey-plugin-btn" data-action="install" data-plugin="' . esc_attr($plugin_slug) . '">' . __('Install Plugin', 'survey-maker') . '</button>';
    }
}
?>

<div class="wrap">
    <h1 id="ays-survey-intro-title"><?php echo esc_html__('Please feel free to use our other awesome plugins!', "survey-maker"); ?></h1>
    <?php do_action('ays_survey_sale_banner'); ?>
    <div class="ays-survey-cards-block">
        <div class="ays-survey-card">
            <div class="ays-survey-card__content flexible">
                <div class="ays-survey-card__content-img-box">
                    <img class="ays-survey-card__img" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/icon-fox-lms-128x128.png" alt="Survey Maker">
                </div>
                <div class="ays-survey-card__text-block">
                    <h5 class="ays-survey-card__title"><?php echo esc_html__('Fox LMS', "survey-maker"); ?></h5>
                    <p class="ays-survey-card__text"><?php echo esc_html__('Build and manage online courses directly on your WordPress site.', "survey-maker"); ?>
                        <span class="ays-survey-card__text-hidden">
                            <?php echo esc_html__('With the FoxLMS plugin, you can create, sell, and organize courses, lessons, and quizzes, transforming your website into a dynamic e-learning platform.', "survey-maker"); ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="ays-survey-card__footer">
                <?php echo get_plugin_button_html('fox-lms', $this); ?>
                <a target="_blank" href="https://foxlms.com/pricing/?utm_source=dashboard&utm_medium=survey-free&utm_campaign=fox-lms-our-products-page" class="ays-survey-card__btn-primary"><?php echo esc_html__('Buy Now', "survey-maker"); ?></a>
            </div>
        </div>
        <div class="ays-survey-card">
            <div class="ays-survey-card__content flexible">
                <div class="ays-survey-card__content-img-box">
                    <img class="ays-survey-card__img" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/quiz.png" alt="Survey Maker">
                </div>
                <div class="ays-survey-card__text-block">
                    <h5 class="ays-survey-card__title"><?php echo esc_html__('Quiz Maker', "survey-maker"); ?></h5>
                    <p class="ays-survey-card__text"><?php echo esc_html__('Create powerful and engaging quizzes. Build as many quizzes as you wish. No limit on the count of participants taking the test at the same time. Use the easy-to-use features in the plugin and attract your visitors.', "survey-maker"); ?>
                        <span class="ays-survey-card__text-hidden">
                            <?php echo esc_html__('Learn what your website visitors want, need, and expect with the help of Survey Maker. Build surveys without limiting your needs.', "survey-maker"); ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="ays-survey-card__footer">
                <?php echo get_plugin_button_html('quiz-maker', $this); ?>
                <a target="_blank" href="https://ays-pro.com/wordpress/quiz-maker/" class="ays-survey-card__btn-primary"><?php echo esc_html__('Buy Now', "survey-maker"); ?></a>
            </div>
        </div>
        <div class="ays-survey-card">
            <div class="ays-survey-card__content flexible">
                <div class="ays-survey-card__content-img-box">
                    <img class="ays-survey-card__img" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/icon-poll-128x128.png" alt="Poll Maker">
                </div>
                <div class="ays-survey-card__text-block">
                    <h5 class="ays-survey-card__title"><?php echo esc_html__('Poll Maker', "survey-maker"); ?></h5>
                    <p class="ays-survey-card__text"><?php echo esc_html__('Create amazing online polls for your WordPress website super easily.', "survey-maker"); ?>
                        <span class="ays-survey-card__text-hidden">
                            <?php echo esc_html__('Build up various types of polls in a minute and get instant feedback on any topic or product.', "survey-maker"); ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="ays-survey-card__footer">
                <?php echo get_plugin_button_html('poll-maker', $this); ?>
                <a target="_blank" href="https://ays-pro.com/wordpress/poll-maker/" class="ays-survey-card__btn-primary"><?php echo esc_html__('Buy Now', "survey-maker"); ?></a>
            </div>
        </div>
        <div class="ays-survey-card">
            <div class="ays-survey-card__content flexible">
                <div class="ays-survey-card__content-img-box">
                    <img class="ays-survey-card__img" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/icon-popup-128x128.png" alt="Popup Box">
                </div>
                <div class="ays-survey-card__text-block">
                    <h5 class="ays-survey-card__title"><?php echo esc_html__('Popup Box', "survey-maker"); ?></h5>
                    <p class="ays-survey-card__text"><?php echo esc_html__('Popup everything you want! Create informative and promotional popups all in one plugin.', "survey-maker"); ?>
                        <span class="ays-survey-card__text-hidden">
                            <?php echo esc_html__('Attract your visitors and convert them into email subscribers and paying customers.', "survey-maker"); ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="ays-survey-card__footer">
                <?php echo get_plugin_button_html('ays-popup-box', $this); ?>
                <a target="_blank" href="https://ays-pro.com/wordpress/popup-box/" class="ays-survey-card__btn-primary"><?php echo esc_html__('Buy Now', "survey-maker"); ?></a>
            </div>
        </div>
        <div class="ays-survey-card">
            <div class="ays-survey-card__content flexible">
                <div class="ays-survey-card__content-img-box">
                    <img class="ays-survey-card__img" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/icon-gallery-128x128.png" alt="Gallery - Photo Gallery">
                </div>
                <div class="ays-survey-card__text-block">
                    <h5 class="ays-survey-card__title"><?php echo esc_html__('Gallery Photo Gallery', "survey-maker"); ?></h5>
                    <p class="ays-survey-card__text"><?php echo esc_html__('Create unlimited galleries and include unlimited images in those galleries.', "survey-maker"); ?>
                        <span class="ays-survey-card__text-hidden">
                            <?php echo esc_html__('Represent images in an attractive way. Attract people with your own single and multiple free galleries from your photo library.', "survey-maker"); ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="ays-survey-card__footer">
                <?php echo get_plugin_button_html('gallery-photo-gallery', $this); ?>
                <a target="_blank" href="https://ays-pro.com/wordpress/photo-gallery/" class="ays-survey-card__btn-primary"><?php echo esc_html__('Buy Now', "survey-maker"); ?></a>
            </div>
        </div>
        <div class="ays-survey-card">
            <div class="ays-survey-card__content flexible">
                <div class="ays-survey-card__content-img-box">
                    <img class="ays-survey-card__img" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/icon-sccp-128x128.png" alt="Secure Copy Content Protection">
                </div>
                <div class="ays-survey-card__text-block">
                    <h5 class="ays-survey-card__title"><?php echo esc_html__('Secure Copy Content Protection', "survey-maker"); ?></h5>
                    <p class="ays-survey-card__text"><?php echo esc_html__('Disable the right click, copy paste, content selection and copy shortcut keys on your website.', "survey-maker"); ?>
                        <span class="ays-survey-card__text-hidden">
                            <?php echo esc_html__('Protect web content from being plagiarized. Prevent plagiarism from your website with this easy to use plugin.', "survey-maker"); ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="ays-survey-card__footer">
                <?php echo get_plugin_button_html('secure-copy-content-protection', $this); ?>
                <a target="_blank" href="https://ays-pro.com/wordpress/secure-copy-content-protection/" class="ays-survey-card__btn-primary"><?php echo esc_html__('Buy Now', "survey-maker"); ?></a>
            </div>
        </div>
        <div class="ays-survey-card">
            <div class="ays-survey-card__content flexible">
                <div class="ays-survey-card__content-img-box">
                    <img class="ays-survey-card__img" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/fbl_icon.jpg" alt="Personal Dictionary">
                </div>
                <div class="ays-survey-card__text-block">
                    <h5 class="ays-survey-card__title"><?php echo esc_html__('Facebook Popup Likebox', "survey-maker"); ?></h5>
                    <p class="ays-survey-card__text"><?php echo esc_html__('Promote your Facebook page and get more likes. Powerful functions will make your Facebook profile visible for those who visit your website. Give them a chance to scroll through your Facebook feed and know more about you.', "survey-maker"); ?>
                        <span class="ays-survey-card__text-hidden">
                            <?php echo esc_html__('Allow your users to create their own digital dictionaries and learn new words and terms as fastest as possible.', "survey-maker"); ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="ays-survey-card__footer">
                <?php echo get_plugin_button_html('ays-facebook-popup-likebox', $this); ?>
                <a target="_blank" href="https://ays-pro.com/wordpress/facebook-popup-likebox/" class="ays-survey-card__btn-primary"><?php echo esc_html__('Buy Now', "survey-maker"); ?></a>
            </div>
        </div>
        <div class="ays-survey-card">
            <div class="ays-survey-card__content flexible">
                <div class="ays-survey-card__content-img-box">
                    <img class="ays-survey-card__img" src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/icon-chart-128x128.png" alt="Chartify - Best Chart Builder Plugin">
                </div>
                <div class="ays-survey-card__text-block">
                    <h5 class="ays-survey-card__title"><?php echo esc_html__('Chartify – Best Chart Builder Plugin', "survey-maker"); ?></h5>
                    <p class="ays-survey-card__text"><?php echo esc_html__('Chart Builder plugin allows you to create beautiful charts and graphs easily and quickly.', "survey-maker"); ?>
                    </p>
                </div>
            </div>
            <div class="ays-survey-card__footer">
                <?php echo get_plugin_button_html('chart-builder', $this); ?>
                <a target="_blank" href="https://ays-pro.com/wordpress/chart-builder" class="ays-survey-card__btn-primary"><?php echo esc_html__('Buy Now', "survey-maker"); ?></a>
            </div>
        </div>
    </div>
    <div class="ays-survey-see-all">
        <a href="https://ays-pro.com/wordpress" target="_blank" class="ays-survey-all-btn"><?php echo esc_html__('See All Plugins', "survey-maker"); ?></a>
    </div>

    <!-- <p class="text-center coming-soon">And more and more is <span>Coming Soon</span></p> -->
</div>
