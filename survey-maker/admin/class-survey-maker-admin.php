<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Survey_Maker
 * @subpackage Survey_Maker/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Survey_Maker
 * @subpackage Survey_Maker/admin
 * @author     Survey Maker team <info@ays-pro.com>
 */
class Survey_Maker_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The surveys list table object.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $surveys_obj    The surveys list table object.
	 */
    private $surveys_obj;

	/**
	 * The surveys categories list table object.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $surveys_categories_obj    The surveys categories list table object.
	 */
    private $surveys_categories_obj;

	/**
	 * The survey questions list table object.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $questions_obj    The survey questions list table object.
	 */
    private $questions_obj;

	/**
	 * The survey questions categories list table object.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $question_categories_obj    The survey questions categories list table object.
	 */
    private $question_categories_obj;

	/**
	 * The survey submissions list table object.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $results_obj    The survey submissions list table object.
	 */
    private $submissions_obj;

	/**
	 * The survey questions categories list table object for each survey.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $each_result_obj    The survey submissions list table object for each survey.
	 */
    private $each_submission_obj;

	/**
	 * The settings object of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $settings_obj    The settings object of this plugin.
	 */
    private $settings_obj;

	/**
	 * The capability of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $capability    The capability for users access to this plugin.
	 */
    private $capability;

    private $popup_surveys_obj;
    private $requests_obj;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	       add_filter('set-screen-option', array(__CLASS__, 'set_screen'), 10, 3);
	       // $per_page_array = array(
	       //     'quizes_per_page',
	       //     'questions_per_page',
	       //     'quiz_categories_per_page',
	       //     'question_categories_per_page',
	       //     'attributes_per_page',
	       //     'quiz_results_per_page',
	       //     'quiz_each_results_per_page',
	       //     'quiz_orders_per_page',
	       // );
	       // foreach($per_page_array as $option_name){
	       //     add_filter('set_screen_option_'.$option_name, array(__CLASS__, 'set_screen'), 10, 3);
	       // }

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles( $hook_suffix ) {

        wp_enqueue_style( $this->plugin_name . '-admin', plugin_dir_url(__FILE__) . 'css/admin.css', array(), $this->version, 'all');
        
        if (false !== strpos($hook_suffix, "plugins.php")){
            wp_enqueue_style( $this->plugin_name . '-sweetalert-css', SURVEY_MAKER_PUBLIC_URL . '/css/survey-maker-sweetalert2.min.css', array(), $this->version, 'all');
        }

        if (false === strpos($hook_suffix, $this->plugin_name))
            return;
            
        // You need styling for the datepicker. For simplicity I've linked to the jQuery UI CSS on a CDN.
        // wp_register_style( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css' );
        // wp_enqueue_style( 'jquery-ui' );

        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style( $this->plugin_name . '-banner.css', plugin_dir_url(__FILE__) . 'css/banner.css', array(), $this->version, 'all');
        // wp_enqueue_style( $this->plugin_name . '-banner-black-friday.css', plugin_dir_url(__FILE__) . 'css/survey-maker-banner-black-friday-2024.css', array(), $this->version, 'all');
        // wp_enqueue_style( $this->plugin_name . '-banner-black-friday.css', plugin_dir_url(__FILE__) . 'css/survey-maker-banner.css', array(), $this->version, 'all');
        // wp_enqueue_style( $this->plugin_name . '-mega-bundle-banner-2025.css', plugin_dir_url(__FILE__) . 'css/survey-maker-mega-bundle-banner-2025.css', array(), $this->version, 'all');
        // wp_enqueue_style( $this->plugin_name . '-banner-christmas.css', plugin_dir_url(__FILE__) . 'css/survey-maker-banner-christmas-2024.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . '-animate.css', plugin_dir_url(__FILE__) . 'css/animate.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . '-animations.css', plugin_dir_url(__FILE__) . 'css/animations.css', array(), $this->version, 'all');
        // wp_enqueue_style( $this->plugin_name . '-font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), $this->version, 'all');
        
        wp_enqueue_style($this->plugin_name . '-font-awesome', SURVEY_MAKER_PUBLIC_URL . '/css/survey-maker-font-awesome.min.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . '-font-awesome-icons', plugin_dir_url(__FILE__) . 'css/ays-font-awesome.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . '-select2', SURVEY_MAKER_PUBLIC_URL .  '/css/survey-maker-select2.min.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . '-transition', SURVEY_MAKER_PUBLIC_URL .  '/css/transition.min.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . '-dropdown', SURVEY_MAKER_PUBLIC_URL .  '/css/dropdown.min.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . '-popup', plugin_dir_url(__FILE__) . 'css/popup.min.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . '-bootstrap', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . '-data-bootstrap', plugin_dir_url(__FILE__) . 'css/dataTables.bootstrap4.min.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . '-datetimepicker', plugin_dir_url(__FILE__) . 'css/jquery-ui-timepicker-addon.css', array(), $this->version, 'all');

        wp_enqueue_style( $this->plugin_name . "-general", plugin_dir_url( __FILE__ ) . 'css/survey-maker-general.css', array(), time(), 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/survey-maker-admin.css', array(), time(), 'all' );
		wp_enqueue_style( $this->plugin_name . "-admin-dashboard", plugin_dir_url( __FILE__ ) . 'css/survey-maker-admin-dashboard.css', array(), time(), 'all' );
		wp_enqueue_style( $this->plugin_name . "-pro-features", plugin_dir_url( __FILE__ ) . 'css/survey-maker-pro-features.css', array(), time(), 'all' );
        wp_enqueue_style( $this->plugin_name . "-loaders", plugin_dir_url(__FILE__) . 'css/loaders.css', array(), $this->version, 'all');
        if( isset( $_GET['page'] ) && sanitize_key($_GET['page']) == $this->plugin_name . '-admin-dashboard' ){        
            wp_enqueue_style( $this->plugin_name . "-dashboard", plugin_dir_url( __FILE__ ) . 'css/survey-maker-dashboard.css', array(), $this->version, 'all' );
        }

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( $hook_suffix ) {
        global $wp_version;

        $version1 = $wp_version;
        $operator = '>=';
        $version2 = '5.5';
        $versionCompare = $this->aysSurveyMakerVersionCompare($version1, $operator, $version2);

        // $check_terms_agreement = get_option('survey_maker_agree_terms');
        
        // if($check_terms_agreement === 'true' && strpos($hook_suffix, $this->plugin_name) !== false){
        //     wp_enqueue_script( $this->plugin_name.'-hotjar', plugin_dir_url(__FILE__) . 'js/extras/survey-maker-hotjar.js', array(), $this->version, false);
        // }

        if ($versionCompare) {
            wp_enqueue_script( $this->plugin_name.'-wp-load-scripts', plugin_dir_url(__FILE__) . 'js/survey-maker-wp-load-scripts.js', array(), $this->version, true);
        }

        if (false !== strpos($hook_suffix, "plugins.php")){
            wp_enqueue_script( $this->plugin_name . '-sweetalert-js', SURVEY_MAKER_PUBLIC_URL . '/js/survey-maker-sweetalert2.all.min.js', array('jquery'), $this->version, true );
            wp_enqueue_script( $this->plugin_name . '-admin', plugin_dir_url(__FILE__) . 'js/admin.js', array( 'jquery' ), $this->version, true );
            wp_localize_script( $this->plugin_name . '-admin', 'SurveyMakerAdmin', array( 
            	'ajaxUrl' => admin_url( 'admin-ajax.php' )
            ) );
        }
        
        if (false === strpos($hook_suffix, $this->plugin_name))
            return;

        $survey_banner_date = self::ays_survey_update_banner_time();
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-effects-core' );
        wp_enqueue_script( 'jquery-ui-sortable' );
        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_media();
        wp_enqueue_script( $this->plugin_name . '-color-picker-alpha', plugin_dir_url(__FILE__) . 'js/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ), $this->version, true );
        $color_picker_strings = array(
            'clear'            => __( 'Clear', "survey-maker" ),
            'clearAriaLabel'   => __( 'Clear color', "survey-maker" ),
            'defaultString'    => __( 'Default', "survey-maker" ),
            'defaultAriaLabel' => __( 'Select default color', "survey-maker" ),
            'pick'             => __( 'Select Color', "survey-maker" ),
            'defaultLabel'     => __( 'Color value', "survey-maker" ),
        );
        wp_localize_script( $this->plugin_name . '-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings );


		/* 
        ========================================== 
           * Bootstrap
           * select2
           * jQuery DataTables
        ========================================== 
        */
        wp_enqueue_script( $this->plugin_name . "-popper", plugin_dir_url(__FILE__) . 'js/popper.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name . "-bootstrap", plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name . '-select2js', SURVEY_MAKER_PUBLIC_URL . '/js/survey-maker-select2.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script( $this->plugin_name . '-sweetalert-js', SURVEY_MAKER_PUBLIC_URL . '/js/survey-maker-sweetalert2.all.min.js', array('jquery'), $this->version, true );
        wp_enqueue_script( $this->plugin_name . '-datatable-min', SURVEY_MAKER_PUBLIC_URL . '/js/survey-maker-datatable.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script( $this->plugin_name . '-transition-min', SURVEY_MAKER_PUBLIC_URL . '/js/transition.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script( $this->plugin_name . '-dropdown-min', SURVEY_MAKER_PUBLIC_URL . '/js/dropdown.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script( $this->plugin_name . "-db4.min.js", plugin_dir_url( __FILE__ ) . 'js/dataTables.bootstrap4.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name . "-datetimepicker", plugin_dir_url( __FILE__ ) . 'js/jquery-ui-timepicker-addon.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name . '-autosize', SURVEY_MAKER_PUBLIC_URL . '/js/survey-maker-autosize.js', array( 'jquery' ), $this->version, false );

        /* 
        ================================================
           Survey admin dashboard scripts (Google charts)
        ================================================
        */
        if ( strpos($hook_suffix, 'each-submission') !== false ) {
            wp_enqueue_script( $this->plugin_name . '-charts-google', plugin_dir_url(__FILE__) . 'js/google-chart.js', array('jquery'), $this->version, true);
            wp_enqueue_script( $this->plugin_name . '-charts', plugin_dir_url(__FILE__) . 'js/partials/survey-maker-admin-submissions-charts.js', array('jquery'), $this->version, true);
        }

        /* 
        ================================================
           Quiz admin dashboard scripts (and for AJAX)
        ================================================
        */
        wp_enqueue_script( $this->plugin_name . "-survey-styles", plugin_dir_url(__FILE__) . 'js/partials/survey-maker-admin-survey-styles.js', array('jquery', 'wp-color-picker'), $this->version, true);
        wp_enqueue_script( $this->plugin_name . "-functions", plugin_dir_url(__FILE__) . 'js/functions.js', array( 'jquery', 'wp-color-picker' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name . '-ajax', plugin_dir_url(__FILE__) . 'js/survey-maker-admin-ajax.js', array('jquery'), $this->version, true);
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/survey-maker-admin.js', array( 'jquery' ), $this->version, true );
        wp_localize_script( $this->plugin_name, 'SurveyMakerAdmin', array( 
            'surveyBannerDate'    => $survey_banner_date,
        	'ajaxUrl' => admin_url( 'admin-ajax.php' ),            
            'nonce' => wp_create_nonce( 'ajax-nonce' ),
            'inputAnswerText'                    => __( 'Your answer', "survey-maker" ),
            // 'shortAnswerText'                   => __( 'Short answer text', "survey-maker" ),
            // 'numberAnswerText'                  => __( 'Number answer text', "survey-maker" ),
            'emailField'                        => __( 'Your email', "survey-maker" ),
            'nameField'                         => __( 'Your name', "survey-maker" ),
            'selectUserRoles'                   => __( 'Select user roles', "survey-maker" ),
            'phoneAnswerText'                   => __( 'Phone', "survey-maker" ),
            'addQuestion'                       => __( 'Add question', "survey-maker" ),
            'addSection'                        => __( 'Add section', "survey-maker" ),
            'duplicate'                         => __( 'Duplicate', "survey-maker" ),
            'delete'                            => __( 'Delete', "survey-maker" ),
            'addImage'                          => __( 'Add Image', "survey-maker" ),
            'editImage'                         => __( 'Edit Image', "survey-maker" ),
            'removeImage'                       => __( 'Remove Image', "survey-maker" ),
            'collapseSectionQuestions'          => __( 'Collapse section questions', "survey-maker" ),
            'expandSectionQuestions'            => __( 'Expand section questions', "survey-maker" ),
            'selectQuestionDefaultType'         => __( 'Select question default type', "survey-maker" ),
            'chooseAnswer'                      => __( 'Choose answer', "survey-maker" ),
            'yes'                               => __( 'Yes', "survey-maker" ),
            'cancel'                            => __( 'Cancel', "survey-maker" ),
            'questionDeleteConfirmation'        => __( 'Are you sure you want to delete this question?', "survey-maker" ),
            'sectionDeleteConfirmation'         => __( 'Are you sure you want to delete this section?', "survey-maker" ),
            'loadResource'                      => __( "Can't load resource.", "survey-maker" ),
            'somethingWentWrong'                => __( "Maybe something went wrong.", "survey-maker" ),
            'dataDeleted'                       => __( "Maybe the data has been deleted.", "survey-maker" ),
            'minimumCountOfQuestions'           => __( 'Sorry minimum count of questions should be 1', "survey-maker" ),
            'enableMaxSelectionCount'           => __( 'Enable selection count', "survey-maker" ),
            'enableSelectionCount'              => __( 'Enable selection count', "survey-maker" ),
            'disableSelectionCount'             => __( 'Disable selection count', "survey-maker" ),
            'enableMaxSelectionCount'           => __( 'Enable selection count', "survey-maker" ),
            'disableMaxSelectionCount'          => __( 'Disable max selection count', "survey-maker" ),
            'enableWordLimitation'              => __( 'Enable word limitation', "survey-maker" ),
            'disableWordLimitation'             => __( 'Disable word limitation', "survey-maker" ),
            'enableNumberLimitation'            => __( 'Enable limitation', "survey-maker" ),
            'disableNumberLimitation'           => __( 'Disable limitation', "survey-maker" ),
            'successfullySent'                  => __( 'Successfully sent', "survey-maker" ),
            'failed'                            => __( 'Failed', "survey-maker" ),
            'selectPage'                        => __( 'Select page', "survey-maker" ),
            'selectPostType'                    => __( 'Select post type', "survey-maker" ),
            'copied'                            => __( 'Copied!', "survey-maker"),
            'clickForCopy'                      => __( 'Click for copy', "survey-maker"),
            'moveToSection'                     => __( 'Move to section', "survey-maker"),
            'confirmMessageTemplate'            => __( 'If you choose one of these templates, your questions will be deleted.', "survey-maker"),
            'okSurvey'                          => __( 'OK', "survey-maker"),
            'icons' => array(
                'radioButtonUnchecked'  => SURVEY_MAKER_ADMIN_URL . '/images/icons/radio-button-unchecked.svg',
                'checkboxUnchecked'     => SURVEY_MAKER_ADMIN_URL . '/images/icons/checkbox-unchecked.svg',
            ),
            'nextSurveyPage'                    => __( 'Are you sure you want to go to the next survey page?', "survey-maker"),
            'prevSurveyPage'                    => __( 'Are you sure you want to go to the previous question page?', "survey-maker"),
            'addQuestionImageCaption'           => __( 'Add a caption', "survey-maker"),
            'closeQuestionImageCaption'         => __( 'Close caption', "survey-maker"),
            'deleteElementFromListTable'        => __( 'Are you sure you want to delete?', "survey-maker"),
            'maxInputVarsWarningMessage'        => __( 'Note: The survey has reached the limit of %t inputs out of a maximum of %f. To save changes, please contact your hosting provider to increase the max_input_vars limit.', "survey-maker"),
            'rating'                            => __( 'Rating', "survey-maker"),
            'stars_count'                       => __( 'Stars count', "survey-maker"),
            "preivewSurvey"                     => __( "Preview Survey", 'survey-maker' ),
            'activate'                          => __( 'Activate', "survey-maker" ),
            'activated'                         => __( 'Activated', "survey-maker" ),
            'successCopyCoupon'                 => __( "Coupon code copied!", 'survey-maker' ),
            'failedCopyCoupon'                  => __( "Failed to copy coupon code", 'survey-maker' ),
        ) );
        wp_localize_script($this->plugin_name . '-ajax', 'survey_maker_ajax', array(
            'ajax_url'              => admin_url('admin-ajax.php'),
            "emptyEmailError"       => __( 'Email field is empty', "survey-maker"),
            'selectUser'            => __( 'Select user', 'survey-maker'),
            'searching'             => __( "Searching...", 'survey-maker' ),
            'pleaseEnterMore'       => __( "Please enter 1 or more characters", 'survey-maker' ),
            "invalidEmailError"     => __( 'Invalid Email address', "survey-maker"),
            "emptyWebsiteError"     => __( 'Website field is empty', "survey-maker"),
            "invalidWebsiteError"   => __( 'Invalid website address', "survey-maker"),
            "thankYouMessage"       => __( 'Your request was successfully submitted. We will get in touch with you until November 10. Thank you!', "survey-maker"),
        ));

    }

    /**
     * De-register JavaScript files for the admin area.
     *
     * @since    1.0.0
     */
    public function disable_scripts($hook_suffix) {
        if (false !== strpos($hook_suffix, $this->plugin_name)) {
            if (is_plugin_active('ai-engine/ai-engine.php')) {
                wp_deregister_script('mwai');
                wp_deregister_script('mwai-vendor');
                wp_dequeue_script('mwai');
                wp_dequeue_script('mwai-vendor');
            }
            if (is_plugin_active('html5-video-player/html5-video-player.php')) {
                wp_dequeue_style('h5vp-admin');
                wp_dequeue_style('fs_common');
            }
            if (is_plugin_active('wp-social/wp-social.php')) {
                wp_dequeue_style('wp_social_select2_css');
                wp_deregister_script('wp_social_select2_js');
                wp_dequeue_script('wp_social_select2_js');
            }
            if (is_plugin_active('real-media-library-lite/index.php')) {
                wp_dequeue_style('real-media-library-lite-rml');
            }

            if (is_plugin_active('happyforms/happyforms.php')) {
                wp_dequeue_style('happyforms-admin');
            }

            if (is_plugin_active('ultimate-viral-quiz/index.php')) {
                wp_dequeue_style('select2');
                wp_dequeue_style('dataTables');
                
                wp_dequeue_script('sweetalert');
                wp_dequeue_script('select2');
                wp_dequeue_script('dataTables');
            }

            if (is_plugin_active('forms-by-made-it/madeit-form.php')) {
                wp_dequeue_style('madeit-form-admin-style');
            }

            if (is_plugin_active('search-replace-for-block-editor/search-replace-for-block-editor.php')) {
                wp_deregister_script('search-replace-for-block-editor');
                wp_dequeue_script('search-replace-for-block-editor');
            }

            
            // Theme | Phlox 2.17.6
            wp_dequeue_style('auxin-admin-style');

            // Theme | Pixel Ebook Store
            wp_dequeue_style('pixel-ebook-store-free-demo-content-style');

            // Theme | Interactive Education
            wp_dequeue_style('interactive-education-free-demo-content-style');



        }
    }
    
    public function codemirror_enqueue_scripts($hook) {
        if(strpos($hook, $this->plugin_name) !== false){
            if(function_exists('wp_enqueue_code_editor')){
                $cm_settings['codeEditor'] = wp_enqueue_code_editor(array(
                    'type' => 'text/css',
                    'codemirror' => array(
                        'inputStyle' => 'contenteditable',
                        'theme' => 'cobalt',
                    )
                ));

                wp_enqueue_script('wp-theme-plugin-editor');
                wp_localize_script('wp-theme-plugin-editor', 'cm_settings', $cm_settings);

                wp_enqueue_style('wp-codemirror');
            }
        }
    }

    public function aysSurveyMakerVersionCompare($version1, $operator, $version2) {
   
        $_fv = intval ( trim ( str_replace ( '.', '', $version1 ) ) );
        $_sv = intval ( trim ( str_replace ( '.', '', $version2 ) ) );
       
        if (strlen ( $_fv ) > strlen ( $_sv )) {
            $_sv = str_pad ( $_sv, strlen ( $_fv ), 0 );
        }
       
        if (strlen ( $_fv ) < strlen ( $_sv )) {
            $_fv = str_pad ( $_fv, strlen ( $_sv ), 0 );
        }
       
        return version_compare ( ( string ) $_fv, ( string ) $_sv, $operator );
    }

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_plugin_admin_menu(){

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */

        $setting_actions = new Survey_Maker_Settings_Actions($this->plugin_name);
        $options = ($setting_actions->ays_get_setting('options') === false) ? array() : json_decode( stripcslashes( $setting_actions->ays_get_setting('options') ), true);

        // Disable Survey Maker menu item notification
        $options['survey_disable_survey_menu_notification'] = isset($options['survey_disable_survey_menu_notification']) ? esc_attr( $options['survey_disable_survey_menu_notification'] ) : 'off';
        $survey_disable_survey_menu_notification = (isset($options['survey_disable_survey_menu_notification']) && esc_attr( $options['survey_disable_survey_menu_notification'] ) == "on") ? true : false;

        if( $survey_disable_survey_menu_notification ){
            $menu_item = 'Survey Maker';
        } else {
            global $wpdb;
            // $sql = "SELECT COUNT(*) FROM " . esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "submissions WHERE `read` = 0 OR `read` = 2 ";
            $sql = $wpdb->prepare("
                SELECT COUNT(*)
                FROM " . esc_sql($wpdb->prefix . SURVEY_MAKER_DB_PREFIX) . "submissions AS s
                INNER JOIN " . esc_sql($wpdb->prefix . SURVEY_MAKER_DB_PREFIX) . "surveys AS surv
                ON s.survey_id = surv.id
                WHERE (s.read = 0 OR s.read = 2)
                AND surv.status != %s
            ", 'trashed');
            $unread_results_count = intval( $wpdb->get_var( $sql ) );
            $menu_item = ($unread_results_count == 0) ? 'Survey Maker' : 'Survey Maker' . '<span class="ays-survey-menu-badge ays-survey-results-bage">' . $unread_results_count . '</span>';
        }
        
        $this->capability = $this->survey_maker_capabilities();
        $capability = $this->capability;
                
        $hook_survey_maker =add_menu_page(
            'Survey Maker', 
            $menu_item,
            $this->capability,
            $this->plugin_name,
            array($this, 'display_plugin_surveys_page'), 
            SURVEY_MAKER_ADMIN_URL . '/images/icons/survey-make-menu-logo.svg',
            '6.21'
        );
        add_action( "load-$hook_survey_maker", array( $this, 'add_tabs' ));
    }

    public function add_plugin_surveys_submenu(){
        $hook_survey_maker = add_submenu_page(
            $this->plugin_name,
            __('Surveys', "survey-maker"),
            __('Surveys', "survey-maker"),
            $this->capability,
            $this->plugin_name,
            array($this, 'display_plugin_surveys_page')
        );

        add_action("load-$hook_survey_maker", array($this, 'screen_option_surveys'));
        add_action("load-$hook_survey_maker", array($this, 'add_tabs'));
    }

    public function add_plugin_export_import_submenu(){
        $hook_exp_imp = add_submenu_page(
            $this->plugin_name,
            __('Export / Import', "survey-maker"),
            __('Export / Import', "survey-maker"),
            $this->capability,
            $this->plugin_name . '-export-import',
            array($this, 'display_plugin_export_import_page')
        );

        // add_action("load-$hook_exp_imp", array($this, 'screen_option_questions'));        
        add_action("load-$hook_exp_imp", array($this, 'add_tabs'));
    }

    public function add_plugin_survey_categories_submenu(){
        $hook_survey_categories = add_submenu_page(
            $this->plugin_name,
            __('Survey Categories', "survey-maker"),
            __('Survey Categories', "survey-maker"),
            $this->capability,
            $this->plugin_name . '-survey-categories',
            array($this, 'display_plugin_survey_categories_page')
        );

        add_action("load-$hook_survey_categories", array($this, 'screen_option_survey_categories'));
        add_action("load-$hook_survey_categories", array($this, 'add_tabs'));
    }

    public function add_plugin_submissions_submenu(){
        global $wpdb;

        $setting_actions = new Survey_Maker_Settings_Actions($this->plugin_name);
        $options = ($setting_actions->ays_get_setting('options') === false) ? array() : json_decode( stripcslashes( $setting_actions->ays_get_setting('options') ), true);

        // Disable Submissions menu item notification
        $options['survey_disable_submission_menu_notification'] = isset($options['survey_disable_submission_menu_notification']) ? esc_attr( $options['survey_disable_submission_menu_notification'] ) : 'off';
        $survey_disable_submission_menu_notification = (isset($options['survey_disable_submission_menu_notification']) && esc_attr( $options['survey_disable_submission_menu_notification'] ) == "on") ? true : false;

        if( $survey_disable_submission_menu_notification ){
            $results_text = __('Submissions', "survey-maker");
            $menu_item    = __('Submissions', "survey-maker");
        } else {
            // $sql = "SELECT COUNT(*) FROM " . esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "submissions WHERE `read` = 0 OR `read` = 2 ";
            $sql = $wpdb->prepare("
                SELECT COUNT(*)
                FROM " . esc_sql($wpdb->prefix . SURVEY_MAKER_DB_PREFIX) . "submissions AS subs
                INNER JOIN " . esc_sql($wpdb->prefix . SURVEY_MAKER_DB_PREFIX) . "surveys AS survs
                ON subs.survey_id = survs.id
                WHERE (subs.read = 0 OR subs.read = 2)
                AND survs.status != %s
            ", 'trashed');
            $unread_results_count = intval( $wpdb->get_var( $sql ) );

            $results_text = __('Submissions', "survey-maker");
            $menu_item = ( $unread_results_count == 0 ) ? $results_text : $results_text . '<span class="ays-survey-menu-badge ays-survey-results-bage">' . $unread_results_count . '</span>';
        }
        

        $hook_submissions = add_submenu_page(
            $this->plugin_name,
            $results_text,
            $menu_item,
            $this->capability,
            $this->plugin_name . '-submissions',
            array($this, 'display_plugin_submissions_page')
        );

        add_action("load-$hook_submissions", array($this, 'screen_option_submissions'));
        add_action("load-$hook_submissions", array($this, 'add_tabs'));
        
        $hook_each_submission = add_submenu_page(
            'each_submission_slug',
            __('Each', "survey-maker"),
            null,
            $this->capability,
            $this->plugin_name . '-each-submission',
            array($this, 'display_plugin_each_submission_page')
        );

        add_action("load-$hook_each_submission", array($this, 'screen_option_each_survey_submission'));
        add_action("load-$hook_each_submission", array($this, 'add_tabs'));

        add_filter('parent_file', array($this,'survey_maker_select_submenu'));
    }

    public function add_plugin_dashboard_submenu(){
        $hook_quizes = add_submenu_page(
            $this->plugin_name,
            __('How to use', "survey-maker"),
            __('How to use', "survey-maker"),
            $this->capability,
            $this->plugin_name . '-dashboard',
            array($this, 'display_plugin_setup_page')
        );
        add_action("load-$hook_quizes", array($this, 'add_tabs'));
    }

    public function add_plugin_general_settings_submenu(){
        $hook_settings = add_submenu_page( $this->plugin_name,
            __('General Settings', "survey-maker"),
            __('General Settings', "survey-maker"),
            'manage_options',
            $this->plugin_name . '-settings',
            array($this, 'display_plugin_settings_page') 
        );
        add_action("load-$hook_settings", array($this, 'screen_option_settings'));
        add_action("load-$hook_settings", array($this, 'add_tabs'));
    }

    public function add_plugin_featured_plugins_submenu(){
        $hook_featured_plugins = add_submenu_page( $this->plugin_name,
            __('Our products', "survey-maker"),
            __('Our products', "survey-maker"),
            $this->capability,
            $this->plugin_name . '-our-products',
            array($this, 'display_plugin_featured_plugins_page') 
        );
        add_action("load-$hook_featured_plugins", array($this, 'add_tabs'));
    }

    public function add_plugin_survey_features_plugins_submenu(){
        $hook_pro_features = add_submenu_page( $this->plugin_name,
            __('PRO Features', "survey-maker"),
            __('PRO Features', "survey-maker"),
            $this->capability,
            $this->plugin_name . '-survey-features',
            array($this, 'display_plugin_features_page') 
        );
        add_action("load-$hook_pro_features", array($this, 'add_tabs'));
    }

    public function add_plugin_subscribe_email(){
        $hook_grab_your_gift = add_submenu_page(
            $this->plugin_name,
            __('Grab your GIFT', "survey-maker"),
            __('Grab your GIFT', "survey-maker"),
            'manage_options',
            $this->plugin_name . '-survey-subscribe-email',
            array($this, 'display_plugin_subscribe_email')
        );

        add_action("load-$hook_grab_your_gift", array( $this, 'add_tabs' ));
    }

    public function add_plugin_popup_surveys_submenu(){
        $hook_popup_surveys = add_submenu_page(
            $this->plugin_name,
            __('Popup Survey', "survey-maker"),
            __('Popup Survey', "survey-maker"),
            $this->capability,
            $this->plugin_name . '-popup-surveys',
            array($this, 'display_plugin_popup_surveys_page')
        );

        add_action("load-$hook_popup_surveys", array($this, 'screen_option_popup_surveys'));
        add_action("load-$hook_popup_surveys", array($this, 'add_tabs'));
    }

    public function add_plugin_admin_dashboard_menu(){

        if (!doing_action('admin_menu')) {
            return;
        }

        $menuHook = add_submenu_page(
            $this->plugin_name,
            __('Dashboard', 'survey-maker'),
            __('Dashboard', 'survey-maker'),
            'manage_options',
            $this->plugin_name . '-admin-dashboard',
            array($this, 'display_plugin_admin_dashboard_page'),
            40
        );

        if (!$menuHook) {
            return;
        }

        add_action("load-$menuHook", array($this, 'add_tabs'));
    }
        
    public function add_plugin_survey_front_requests_submenu(){
        $hook_requests = add_submenu_page(
            $this->plugin_name,
            __('Frontend Requests', "survey-maker"),
            __('Frontend Requests', "survey-maker"),
            $this->capability,
            $this->plugin_name . '-requests',
            array($this, 'display_plugin_requests_page')
        );
        $this->requests_obj = new Survey_Requests_List_Table($this->plugin_name);

        add_action("load-$hook_requests", array($this, 'add_tabs'));
    }

    public function survey_maker_select_submenu($file) {
        global $plugin_page;
        if ($this->plugin_name."-each-submission" == $plugin_page) {
            $plugin_page = $this->plugin_name."-submissions";
        }
        return $file;
    }
    
    protected function survey_maker_capabilities(){
        global $wpdb;
        return 'manage_options';

        // $sql = "SELECT meta_value FROM {$wpdb->prefix}aysquiz_settings WHERE `meta_key` = 'user_roles'";
        // $result = $wpdb->get_var($sql);
        
        // $capability = 'manage_options';
        // if($result !== null){
        //     $ays_user_roles = json_decode($result, true);
        //     if(is_user_logged_in()){
        //         $current_user = wp_get_current_user();
        //         $current_user_roles = $current_user->roles;
        //         $ishmar = 0;
        //         foreach($current_user_roles as $r){
        //             if(in_array($r, $ays_user_roles)){
        //                 $ishmar++;
        //             }
        //         }
        //         if($ishmar > 0){
        //             $capability = "read";
        //         }
        //     }
        // }
        // return $capability;
    }


    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */
    public function add_action_links($links){
        /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */

        $survey_ajax_deactivate_plugin_nonce = wp_create_nonce( 'survey-maker-ajax-deactivate-plugin-nonce' );

        $settings_link = array(
            '<a href="' . admin_url('admin.php?page=' . $this->plugin_name) . '">' . __('Settings', "survey-maker") . '</a>',
            '<a href="https://ays-demo.com/wordpress-survey-plugin-free-demo/" target="_blank">' . __('Demo', "survey-maker") . '</a>',
            '<a href="https://ays-pro.com/wordpress/survey-maker?utm_source=survey-maker-free&utm_medium=dashboard&utm_campaign=buy-now-plugins" target="_blank" class="ays-survey-admin-upgrade-button">' . __('Upgrade', "survey-maker") . '</a>
            <input type="hidden" id="ays_survey_ajax_deactivate_plugin_nonce" name="ays_survey_ajax_deactivate_plugin_nonce" value="' . $survey_ajax_deactivate_plugin_nonce .'">',
        );
        return array_merge($settings_link, $links);

    }

    
    public function add_survey_row_meta( $links, $file ) {
        if ( SURVEY_MAKER_BASENAME == $file ) {
            $row_meta = array(
                'ays-survey-support'       => '<a href="' . esc_url( 'https://wordpress.org/support/plugin/survey-maker/' ) . '" target="_blank">' . esc_html__( 'Free Support', "survey-maker" ) . '</a>',
                'ays-survey-documentation' => '<a href="' . esc_url( 'https://ays-pro.com/wordpress-survey-maker-user-manual' ) . '" target="_blank">' . esc_html__( 'Documentation', "survey-maker" ) . '</a>',
                'ays-survey-rate-us' => '<a href="' . esc_url( 'https://wordpress.org/support/plugin/survey-maker/reviews/?rate=5#new-post' ) . '" target="_blank">' . esc_html__( 'Rate us', "survey-maker" ) . '</a>',
                'ays-survey-rate-us' => '<a href="' . esc_url( 'https://www.youtube.com/channel/UC-1vioc90xaKjE7stq30wmA' ) . '" target="_blank">' . esc_html__( 'Video tutorial', "survey-maker" ) . '</a>',
                );

            return array_merge( $links, $row_meta );
        }
        return $links;
    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */
    public function display_plugin_setup_page(){
        include_once('partials/survey-maker-admin-display.php');
    }

    public function display_plugin_surveys_page(){
        $action = (isset($_GET['action'])) ? sanitize_text_field($_GET['action']) : '';
        switch ($action) {
            case 'add':
                include_once('partials/surveys/actions/survey-maker-surveys-actions.php');
                break;
            case 'edit':
                include_once('partials/surveys/actions/survey-maker-surveys-actions.php');
                break;
            default:
                include_once('partials/surveys/survey-maker-surveys-display.php');
        }
    }

    public function display_plugin_survey_categories_page(){
        $action = (isset($_GET['action'])) ? sanitize_text_field($_GET['action']) : '';

        switch ($action) {
            case 'add':
                include_once('partials/surveys/actions/survey-maker-survey-categories-actions.php');
                break;
            case 'edit':
                include_once('partials/surveys/actions/survey-maker-survey-categories-actions.php');
                break;
            default:
                include_once('partials/surveys/survey-maker-survey-categories-display.php');
        }
    }

    
    public function display_plugin_popup_surveys_page(){
        $action = (isset($_GET['action'])) ? sanitize_text_field($_GET['action']) : '';

        switch ($action) {
            case 'add':
                include_once('partials/popup/actions/survey-maker-popup-surveys-actions.php');
                break;
            case 'edit':
                include_once('partials/popup/actions/survey-maker-popup-surveys-actions.php');
                break;
            default:
            include_once('partials/popup/survey-maker-popups-display.php');
        }
    }
        
    public function display_plugin_requests_page(){
        include_once('partials/requests/survey-maker-requests-display.php');
    }

    public function display_plugin_submissions_page(){

        include_once('partials/submissions/survey-maker-submissions-display.php');
    }
    
    public function display_plugin_each_submission_page(){
        include_once 'partials/submissions/survey-maker-each-submission-display.php';
    }
    
    public function display_plugin_settings_page(){        
        include_once('partials/settings/survey-maker-settings.php');
    }

    public function display_plugin_export_import_page(){        
        include_once('partials/export-import/survey-maker-export-import-display.php');
    }

    public function display_plugin_subscribe_email(){
        include_once('partials/subscribe/survey-maker-subscribe-email-display.php');
    }

    public function display_plugin_featured_plugins_page(){
        include_once('partials/features/survey-maker-plugin-featured-display.php');
    }
    
    public function display_plugin_features_page(){
        include_once('partials/features/survey-maker-features-display.php');
    }

    public function display_plugin_popup_page(){
        include_once('partials/popup/survey-maker-popups-display.php');
    }

    public function display_plugin_admin_dashboard_page(){
        include_once('partials/dashboard/survey-maker-dashboard-display.php');
    }

    public static function set_screen($status, $option, $value){
        return $value;
    }

    public function screen_option_surveys(){
        $option = 'per_page';
        $args = array(
            'label' => __('Surveys', "survey-maker"),
            'default' => 20,
            'option' => 'surveys_per_page'
        );

        if( ! ( isset( $_GET['action'] ) && ( $_GET['action'] == 'add' || $_GET['action'] == 'edit' ) ) ){
            add_screen_option($option, $args);
        }

        $this->surveys_obj = new Surveys_List_Table($this->plugin_name);
        $this->settings_obj = new Survey_Maker_Settings_Actions($this->plugin_name);
    }

    public function screen_option_survey_categories(){
        $option = 'per_page';
        $args = array(
            'label' => __('Survey Categories', "survey-maker"),
            'default' => 20,
            'option' => 'survey_categories_per_page'
        );
        
        if( ! ( isset( $_GET['action'] ) && ( $_GET['action'] == 'add' || $_GET['action'] == 'edit' ) ) ){
            add_screen_option($option, $args);
        }

        $this->surveys_categories_obj = new Survey_Categories_List_Table($this->plugin_name);
        $this->settings_obj = new Survey_Maker_Settings_Actions($this->plugin_name);
    }
    
    public function screen_option_popup_surveys(){
        $option = 'per_page';
        $args = array(
            'label'   => __('Popup Survey', "survey-maker"),
            'default' => 20,
            'option'  => 'popup_survey_per_page'
        );

        if( ! ( isset( $_GET['action'] ) && ( $_GET['action'] == 'add' || $_GET['action'] == 'edit' ) ) ){
            add_screen_option( $option, $args );
        }

        $this->popup_surveys_obj = new Popup_Survey_List_Table( $this->plugin_name );
        $this->settings_obj = new Survey_Maker_Settings_Actions($this->plugin_name);
    }

    public function screen_option_questions(){
        $option = 'per_page';
        $args = array(
            'label'   => __('Questions', "survey-maker"),
            'default' => 20,
            'option'  => 'survey_questions_per_page'
        );

        add_screen_option($option, $args);
        $this->questions_obj = new Survey_Questions_List_Table($this->plugin_name);
        $this->settings_obj = new Survey_Maker_Settings_Actions($this->plugin_name);
    }

    public function screen_option_questions_categories(){
        $option = 'per_page';
        $args = array(
            'label'   => __('Question Categories', "survey-maker"),
            'default' => 20,
            'option'  => 'survey_question_categories_per_page'
        );

        add_screen_option($option, $args);
        $this->question_categories_obj = new Survey_Question_Categories_List_Table($this->plugin_name);
    }

    public function screen_option_submissions(){
        $option = 'per_page';
        $args = array(
            'label'   => __('Submissions', "survey-maker"),
            'default' => 20,
            'option'  => 'survey_submissions_results_per_page'
        );

        add_screen_option($option, $args);
        $this->submissions_obj = new Submissions_List_Table( $this->plugin_name );
    }

    public function screen_option_each_survey_submission() {
        $option = 'per_page';
        $args = array(
            'label'   => __('Results', "survey-maker"),
            'default' => 50,
            'option'  => 'survey_each_submission_results_per_page',
        );

        add_screen_option($option, $args);
        $this->each_submission_obj = new Survey_Each_Submission_List_Table($this->plugin_name);
    }
    
    public function screen_option_settings(){
        $this->settings_obj = new Survey_Maker_Settings_Actions($this->plugin_name);
    }

    public function deactivate_plugin_option(){

        // Run a security check.
        check_ajax_referer( 'survey-maker-ajax-deactivate-plugin-nonce', sanitize_key( $_REQUEST['_ajax_nonce'] ) );

        // Check for permissions.
        if ( ! current_user_can( 'manage_options' ) ) {
            ob_end_clean();
            $ob_get_clean = ob_get_clean();
            echo json_encode(array(
                'option' => ''
            ));
            wp_die();
        }

        if( is_user_logged_in() ) {
            $request_value = sanitize_text_field($_REQUEST['upgrade_plugin']);
            $upgrade_option = get_option( 'ays_survey_maker_upgrade_plugin', '' );
            if($upgrade_option === ''){
                add_option( 'ays_survey_maker_upgrade_plugin', $request_value );
            }else{
                update_option( 'ays_survey_maker_upgrade_plugin', $request_value );
            }

            ob_end_clean();
            $ob_get_clean = ob_get_clean();
            echo json_encode(array(
                'option' => get_option( 'ays_survey_maker_upgrade_plugin', '' )
            ));
            wp_die();
        } else {
            ob_end_clean();
            $ob_get_clean = ob_get_clean();
            echo json_encode(array(
                'option' => ''
            ));
            wp_die();
        }
    }

    public function survey_maker_admin_footer($a){
        if(isset($_REQUEST['page'])){
            if(false !== strpos( sanitize_text_field( $_REQUEST['page'] ), $this->plugin_name)){
                ?>
                <div class="ays-survey-footer-support-box">
                    <span class="ays-survey-footer-link-row"><a href="https://wordpress.org/support/plugin/survey-maker/" target="_blank"><?php echo esc_html__( "Support", "survey-maker"); ?></a></span>
                    <span class="ays-survey-footer-slash-row">/</span>
                    <span class="ays-survey-footer-link-row"><a href="https://ays-pro.com/wordpress-survey-maker-user-manual" target="_blank"><?php echo esc_html__( "Docs", "survey-maker"); ?></a></span>
                    <span class="ays-survey-footer-slash-row">/</span>
                    <span class="ays-survey-footer-link-row"><a href="https://ays-demo.com/survey-maker-plugin-survey/" target="_blank"><?php echo esc_html__( "Suggest a Feature", "survey-maker"); ?></a></span>
                </div>
                <p class="ays-survey-footer-review-box" style="font-size:13px;text-align:center;font-style:italic;">
                    <span style="margin-left:0px;margin-right:10px;" class="ays_heart_beat"><i class="ays_fa ays_fa_heart_o animated"></i></span>
                    <span><?php echo esc_html__( "If you love our plugin, please do big favor and rate us on", "survey-maker"); ?> WordPress.org</span> 
                    <a target="_blank" href='https://wordpress.org/support/plugin/survey-maker/reviews/?rate=5#new-post'></a>
                    <a target="_blank" class="ays-rated-link" href='https://wordpress.org/support/plugin/survey-maker/reviews'>
                    	<span class="ays-dashicons ays-dashicons-star-empty"></span>
                    	<span class="ays-dashicons ays-dashicons-star-empty"></span>
                    	<span class="ays-dashicons ays-dashicons-star-empty"></span>
                    	<span class="ays-dashicons ays-dashicons-star-empty"></span>
                    	<span class="ays-dashicons ays-dashicons-star-empty"></span>
                    </a>
                    <span class="ays_heart_beat"><i class="ays_fa ays_fa_heart_o animated"></i></span>
                </p>
            <?php
            }
        }
    }

    public static function ays_restriction_string($type, $x, $length){
        $output = "";
        switch($type){
            case "char":                
                if(strlen($x)<=$length){
                    $output = $x;
                } else {
                    $output = substr($x,0,$length) . '...';
                }
                break;
            case "word":
                $res = explode(" ", $x);
                if(count($res)<=$length){
                    $output = implode(" ",$res);
                } else {
                    $res = array_slice($res,0,$length);
                    $output = implode(" ",$res) . '...';
                }
            break;
        }
        return $output;
    }    
    
    public static function validateDate($date, $format = 'Y-m-d H:i:s'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public static function get_max_id( $table ) {
        global $wpdb;
        $db_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . $table;

        $sql = "SELECT MAX(id) FROM {$db_table}";

        $result = intval( $wpdb->get_var( $sql ) );

        return $result;
    }

    public function get_all_surveys(){
        global $wpdb;
        $surveys_table = $wpdb->prefix . "ayssurvey_surveys";
        $surveys = $wpdb->get_results("SELECT * FROM {$surveys_table}");
        return $surveys;
    }

    public static function string_starts_with_number($string){
        $match = preg_match('/^\d/', $string);
        if($match === 1){
            return true;
        }else{
            return false;
        }
    }

    public function get_question_answers( $question_id ) {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}ayssurvey_answers WHERE question_id=" . absint( $question_id );

        $results = $wpdb->get_results( $sql, 'ARRAY_A' );
        foreach ($results as $key => &$result) {
            unset($result['id']);
            unset($result['question_id']);
        }

        return $results;
    }
    
    public function ays_survey_question_results( $survey_id, $submission_ids = null ){
        global $wpdb;

        if($survey_id === null){
            return array(
                'total_count' => 0,
                'questions' => array()
            );
        }

        $submitions_questiions_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions_questions";
        $answer_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "answers";
        $question_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "questions";
        $submitions_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions";
        $survey_section_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "sections";
        $surveys_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "surveys";

        $survey_options_sql = "SELECT options FROM {$surveys_table} WHERE id =". absint( $survey_id );
        $survey_options = $wpdb->get_var( $survey_options_sql );

        $survey_options = isset( $survey_options ) && $survey_options != '' ? json_decode( $survey_options, true ) : array();

        // Allow HTML in answers
        $survey_options[ 'survey_allow_html_in_answers' ] = isset($survey_options[ 'survey_allow_html_in_answers' ]) ? $survey_options[ 'survey_allow_html_in_answers' ] : 'off';
        $allow_html_in_answers = (isset($survey_options[ 'survey_allow_html_in_answers' ]) && $survey_options[ 'survey_allow_html_in_answers' ] == 'on') ? true : false;

        $question_ids = "SELECT question_ids FROM {$surveys_table} WHERE id =". absint( $survey_id );
        $question_ids_results = $wpdb->get_var( $question_ids );
        $ays_question_id = ($question_ids_results != '') ? $question_ids_results : null;

        if($ays_question_id == null){
            return array(
                'total_count' => 0,
                'questions' => array()
            );
        }

        $questions_ids_arr = explode(',',$ays_question_id);
        $answer_id = "SELECT a.id, a.answer, COUNT(s_q.answer_id) AS answer_count
                    FROM {$answer_table} AS a
                    LEFT JOIN {$submitions_questiions_table} AS s_q 
                    ON a.id = s_q.answer_id
                    WHERE s_q.survey_id=".absint( $survey_id ) ."
                    GROUP BY a.id";

        $answer_id_result = $wpdb->get_results($answer_id,'ARRAY_A');

        $for_checkbox = "SELECT a.id, a.answer, COUNT(s_q.answer_id) AS answer_count
                    FROM {$answer_table} AS a
                    LEFT JOIN {$submitions_questiions_table} AS s_q 
                    ON a.id = s_q.answer_id OR FIND_IN_SET( a.id, s_q.user_answer )
                    WHERE s_q.type = 'checkbox'
                    AND s_q.survey_id=".absint( $survey_id ) ."
                    GROUP BY a.id";

        $for_checkbox_result = $wpdb->get_results($for_checkbox,'ARRAY_A');

        $for_text_type = "SELECT a.id, a.answer, COUNT(s_q.id) AS answer_count
                    FROM {$answer_table} AS a
                    LEFT JOIN {$submitions_questiions_table} AS s_q 
                    ON a.id = s_q.answer_id OR FIND_IN_SET( a.id, s_q.user_answer )
                    WHERE s_q.type IN ('name', 'email', 'text', 'short_text', 'number')
                    AND s_q.survey_id=".absint( $survey_id ) ."
                    GROUP BY a.id";

        $for_text_type_result = $wpdb->get_results($for_checkbox,'ARRAY_A');
        $answer_count = array();
        $question_type = '';
        foreach ($answer_id_result as $key => $answer_count_by_id) {
            $ays_survey_answer_count = (isset($answer_count_by_id['answer_count']) && $answer_count_by_id['answer_count'] !="") ? absint(intval($answer_count_by_id['answer_count'])) : '';
            $answer_count[$answer_count_by_id['id']] = $ays_survey_answer_count;
        }

        foreach ($for_checkbox_result as $key => $answer_count_by_id) {
            $ays_survey_answer_count = (isset($answer_count_by_id['answer_count']) && $answer_count_by_id['answer_count'] !="") ? absint(intval($answer_count_by_id['answer_count'])) : '';
            $answer_count[$answer_count_by_id['id']] = $ays_survey_answer_count;
        }

        foreach ($for_text_type_result as $key => $answer_count_by_id) {
            $ays_survey_answer_count = (isset($answer_count_by_id['answer_count']) && $answer_count_by_id['answer_count'] !="") ? absint(intval($answer_count_by_id['answer_count'])) : '';
            $answer_count[$answer_count_by_id['id']] = $ays_survey_answer_count;
        }

        $question_by_ids = Survey_Maker_Data::get_question_by_ids( $questions_ids_arr );

        $select_answer_q_type = "SELECT type, user_answer, id, question_id
            FROM {$submitions_questiions_table}
            WHERE user_answer != '' 
                AND type != 'checkbox' 
                AND survey_id=". absint( $survey_id );

        $submission_answer_other = "SELECT question_id, user_variant
            FROM {$submitions_questiions_table}
            WHERE user_variant != ''
                AND survey_id=". absint( $survey_id );

        if( $submission_ids !== null ){
            if( is_array( $submission_ids ) ){
                $select_answer_q_type .= " AND submission_id IN (" . esc_sql( implode( ',', $submission_ids ) ) . ") ";
                $submission_answer_other .= " AND submission_id IN (" . esc_sql( implode( ',', $submission_ids ) ) . ") ";
            }
        }
            
        $result_answers_q_type = $wpdb->get_results($select_answer_q_type,'ARRAY_A');
        $result_answers_other = $wpdb->get_results($submission_answer_other,'ARRAY_A');
        $text_answer = array();
        foreach($result_answers_q_type as $key => $result_answer_q_type){
            $text_answer[$result_answer_q_type['type']][$result_answer_q_type['question_id']][] = $result_answer_q_type['user_answer'];
        }
        
        $other_answers = array();
        foreach($result_answers_other as $key => $result_answer_other){
            $other_answers[$result_answer_other['question_id']][] = $result_answer_other['user_variant'];
        }

        $text_types = array(
            'text',
            'short_text',
            'number',
            'date',
            'time',
	        'date_time',
            'star',
            'phone',
            'name',
            'email',
        );

        //Question types different charts
        $ays_submissions_count  = array();
        $question_results = array();

        $total_count = 0;
        foreach ($question_by_ids as $key => $question) {
            $answers        = $question->answers;
            $question_id    = $question->id;
            $question_title = $question->question;
            $question_type  = $question->type;
            //questions
            $question_results[$question_id]['question_id'] = $question_id;
            $question_results[$question_id]['question'] = $question_title;
            $ays_answer = array();
            $question_answer_ids = array();
            //

            foreach ($answers as $key => $answer) {
                $answer_id    = $answer->id;
                $answer_title = $answer->answer;
                
                $ays_answer[$answer_id] = isset( $answer_count[$answer_id] ) ? $answer_count[$answer_id] : 0;
                $question_answer_ids[$answer_id] = $allow_html_in_answers ? sanitize_text_field( $answer_title ) : $answer_title;
            }
            
            //sum of submissions count per questions
            if($question_type == "checkbox"){
                $sub_checkbox_count = $this->ays_survey_get_submission_count($question->id, $question_type, $survey_id);
                $sum_of_count = $sub_checkbox_count;
            }else{
                $sum_of_count = array_sum( array_values( $ays_answer ) );
            }
            $question_results[$question_id]['otherAnswers'] = isset( $other_answers[$question->id] ) ? $other_answers[$question->id] : array();

            if( in_array( $question->type, $text_types ) ){
                $question_ls_options = json_decode($question->options, true);
                if($question->type == 'star'){
                    $scale_from     = isset($question_ls_options['star_1']) && $question_ls_options['star_1'] != "" ? stripslashes($question_ls_options['star_1']) : "";
                    $scale_to       = isset($question_ls_options['star_2']) && $question_ls_options['star_2'] != "" ? stripslashes($question_ls_options['star_2']) : "";
                    $scale_length   = isset($question_ls_options['star_scale_length']) && $question_ls_options['star_scale_length'] != "" ? $question_ls_options['star_scale_length'] : "";
                    $question_results[$question_id]['labels'] = array(
                        'from'      => $scale_from,
                        'to'        => $scale_to,
                        'length'    => $scale_length
                    );
                }
                $question_results[$question_id]['answers'] = isset( $text_answer[$question->type] ) ? $text_answer[$question->type] : '';
                $question_results[$question_id]['answerTitles'] = isset( $text_answer[$question->type] ) ? $text_answer[$question->type] : '';
                $question_results[$question_id]['sum_of_answers_count'] = isset( $text_answer[$question->type][$question->id] ) ? count( $text_answer[$question->type][$question->id] ) : 0;
                $question_results[$question_id]['sum_of_same_answers']  = isset( $text_answer[$question->type][$question->id] ) ? array_count_values( $text_answer[$question->type][$question->id] ) : 0;
            }else{
                $question_results[$question_id]['answers'] = $ays_answer;
                $question_results[$question_id]['answerTitles'] = $question_answer_ids;
                $question_results[$question_id]['sum_of_answers_count'] = $sum_of_count;
                if( $sum_of_count == 0 ){
                    $question_results[$question_id]['answers'] = array();
                }
            }

            // Answers for charts
            if( !empty( $question_results[$question_id]['otherAnswers'] ) ){
                $question_results[$question_id]['answers'][0] = count( $question_results[$question_id]['otherAnswers'] );
                $question_results[$question_id]['answerTitles'][0] = __( '"Other" answer(s)', "survey-maker" );
                $question_results[$question_id]['same_other_count'] = array_count_values( $question_results[$question_id]['otherAnswers'] );

                if($question_type == "radio" || $question_type == "yesorno"){
                    $question_results[$question_id]['sum_of_answers_count'] += count( $question_results[$question_id]['otherAnswers'] );
                }

            }
            //

            $total_count += intval( $question_results[$question_id]['sum_of_answers_count'] );

            $question_results[$question_id]['question_type'] = $question->type;
        }

        return array(
            'total_count' => $total_count,
            'questions' => $question_results
        );
    }
    
    public function ays_survey_get_last_submission_id( $survey_id ){
        global $wpdb;

        if($survey_id === null){
            return array();
        }

        $submitions_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions";

        //submission of each result
        $submission = "SELECT * FROM {$submitions_table} WHERE survey_id=". absint( $survey_id ) ." ORDER BY id DESC LIMIT 1 ";
        $last_submission = $wpdb->get_row( $submission, 'ARRAY_A' );
        
        if( $last_submission == null ){
            return array();
        }
        return $last_submission;
    }

    public function ays_survey_individual_results_for_one_submission( $submission, $survey ){
        global $wpdb;
        $survey_id = isset( $survey['id'] ) ? absint( intval( $survey['id'] ) ) : null;

        if( is_null( $survey_id ) || empty( $submission )){
            return array(
                'sections' => array()
            );
        }

        $submitions_questiions_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions_questions";
        $submitions_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions";

        $ays_individual_questions_for_one_submission = array();
        $question_answer_id = array();
        $submission_id = isset( $submission['id'] ) && $submission['id'] != '' ? $submission['id'] : null;

        if( is_null( $submission_id ) ){
            return array(
                'sections' => array()
            );
        }

        $checkbox_ids = '';
        
        $individual_questions = "SELECT * FROM {$submitions_questiions_table} WHERE submission_id=" . absint( $submission_id );
        $individual_questions_results = $wpdb->get_results($individual_questions,'ARRAY_A');

        // Get user info
        $which_needed = "id,user_ip,user_id,user_name,user_email,submission_date,options";
        $individual_users = "SELECT ".$which_needed." FROM ".$submitions_table." WHERE id=" . absint( $submission_id );
        $individual_users_results = $wpdb->get_row($individual_users,'ARRAY_A');
        $user_id = isset($individual_users_results['user_id']) && $individual_users_results['user_id'] != "" ? $individual_users_results['user_id'] : 0;
        $user_real_name = __("Guest" , "survey-maker"); 
        $user_real_email = ""; 
        if($user_id > 0){
            $user_data = get_userdata($user_id);
            $user_real_name = $user_data ? $user_data->data->display_name : __('Deleted User' , "survey-maker");
            $user_real_email = $user_data ? $user_data->data->user_email : '';
        }
        if(!isset($individual_users_results['user_name']) || (isset($individual_users_results['user_name']) && $individual_users_results['user_name'] == "")){
            $individual_users_results['user_name'] = $user_real_name;
        }

        if(!isset($individual_users_results['user_email']) || (isset($individual_users_results['user_email']) && $individual_users_results['user_email'] == "")){
            $individual_users_results['user_email'] = $user_real_email;
        }
        $individual_users_results['user_name'] =  stripslashes(nl2br( htmlentities($individual_users_results['user_name'])));
        // Survey questions IDs
        $question_ids = isset( $survey['question_ids'] ) && $survey['question_ids'] != '' ? $survey['question_ids'] : '';

        // Section Ids
        $sections_ids = (isset( $survey['section_ids' ] ) && $survey['section_ids'] != '') ? $survey['section_ids'] : '';

        $sections = Survey_Maker_Data::get_suervey_sections_with_questions( $sections_ids, $question_ids );

        $text_types = array(
            'text',
            'short_text',
            'phone',
            'date',
            'time',
            'date_time',
            'star',
            'number',
            'name',
            'email',
        );

        foreach ($individual_questions_results as $key => $individual_questions_result) {
            if($individual_questions_result['type'] == 'checkbox'){
                $checkbox_ids = $individual_questions_result['user_answer'] != '' ? explode(',', $individual_questions_result['user_answer']) : array();
                $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = $checkbox_ids;

                $question_answer_id[ $individual_questions_result['question_id'] ]['otherAnswer'] = isset($individual_questions_result['user_variant']) && $individual_questions_result['user_variant'] != '' ? stripslashes(htmlentities($individual_questions_result['user_variant'])) : '';
            }elseif( in_array( $individual_questions_result['type'], $text_types ) ){

                if( $individual_questions_result['type'] == 'date' ){
                    $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = stripslashes(htmlentities($individual_questions_result['user_answer']));

                    if( $individual_questions_result['user_answer'] != '' ){
                        $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = date( 'd . m . Y', strtotime(nl2br(htmlentities($individual_questions_result['user_answer']))) );
                    }else{
                        $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = '';
                    }
                }
                elseif( $individual_questions_result['type'] == 'time' ){
                    if( $individual_questions_result['user_answer'] != '' ){
                        $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = implode(" : ", explode( ":", $individual_questions_result['user_answer'] ));
                    }else{
                        $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = '';
                    }
                }
                elseif( $individual_questions_result['type'] == 'date_time' ){
                    if( $individual_questions_result['user_answer'] != '' ){
                        $user_date_time_answer = explode(" ", $individual_questions_result['user_answer'] );
                        if((isset($user_date_time_answer[0]) && $user_date_time_answer[0] != '-') && (isset($user_date_time_answer[1]) && $user_date_time_answer[1] != '-')){                            
                            $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = date( 'd . m . Y', strtotime(nl2br(htmlentities($user_date_time_answer[0]))) ) . " " . implode(" : ", explode( ":", $user_date_time_answer[1] ));
                        }
                    }else{
                        $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = '';
                    }
                }
                else{
                    $question_answer_id[ $individual_questions_result['question_id'] ] = stripslashes(htmlentities($individual_questions_result['user_answer']));
                }
            }elseif($individual_questions_result['type'] == 'radio'){

                $other_answer = isset($individual_questions_result['user_variant']) && $individual_questions_result['user_variant'] != '' ? stripslashes(htmlentities($individual_questions_result['user_variant'])) : '';
                $question_answer_id[ $individual_questions_result['question_id'] ]['otherAnswer'] = $other_answer;
                $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = $individual_questions_result['answer_id'];
            }else{
                $question_answer_id[ $individual_questions_result['question_id'] ] = $individual_questions_result['answer_id'];
            }
        }

        $ays_individual_questions_for_one_submission['submission_id'] = $submission['id'];
        $ays_individual_questions_for_one_submission['questions'] = $question_answer_id;
        $ays_individual_questions_for_one_submission['sections'] = $sections;
        $ays_individual_questions_for_one_submission['user_info'] = $individual_users_results;
        return $ays_individual_questions_for_one_submission;
    }
    
    public function get_submission_count_and_ids(){
        global $wpdb;
        $survey_id = isset($_GET['survey']) ? intval($_GET['survey']) : null;

        if($survey_id === null){
            return false;
        }
        $submitions_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions";
       
        //submission of each result
        $submission_ids = "SELECT id,
                            (SELECT COUNT(id) FROM {$submitions_table} i 
                            WHERE i.survey_id=j.survey_id) AS count_submission 
                            FROM {$submitions_table} j 
                            WHERE survey_id=". absint( $survey_id ) ."
                            ORDER BY id";
        $submission_ids_result = $wpdb->get_results($submission_ids,'ARRAY_A');
        $submission_count = '';
        $submissions_id_arr = array();
        foreach ($submission_ids_result as $key => $submission_id_result) {
            $submission_id_count = $submission_id_result['count_submission'];
            $submission_count = intval($submission_id_count);
            $submissions_id_arr[] = $submission_id_result['id'];
        }
        $submissions_id_str = implode(',', $submissions_id_arr );
        
        $submission_count_and_ids = array(
            'submission_count' => $submission_count,
            'submission_ids' => $submissions_id_str
        );

        return $submission_count_and_ids;
    }

    public function ays_survey_submission_report(){
        global $wpdb;
        if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ays_survey_submission_report' &&  wp_verify_nonce( $_REQUEST['nonce'], 'ajax-nonce' )) {

            $survey_id = (isset($_REQUEST['surveyId']) && $_REQUEST['surveyId'] != "") ? intval(sanitize_text_field($_REQUEST['surveyId'])) : null;
            if($survey_id === null){
                return false;
            }
            
            $sql = "SELECT * FROM " . $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "surveys WHERE id =" . absint( $survey_id );
            $survey = $wpdb->get_row( $sql, 'ARRAY_A' );

            $submission_id = (isset($_REQUEST['submissionId']) && $_REQUEST['submissionId'] != '') ? absint( sanitize_text_field( $_REQUEST['submissionId'] ) ) : null;
            if($submission_id == null){
                return false;
            }
            $submission = array(
                'id' => $submission_id
            );

            $results = $this->ays_survey_individual_results_for_one_submission( $submission, $survey );
            $individual_user_name   = isset($results['user_info']['user_name']) && isset($results['user_info']['user_name']) ? $results['user_info']['user_name'] : "";
            $individual_user_email  = isset($results['user_info']['user_email']) && isset($results['user_info']['user_email'])  ? wp_kses_post($results['user_info']['user_email']) : "";
            $individual_user_ip     = isset($results['user_info']['user_ip']) && isset($results['user_info']['user_ip'])  ? esc_attr($results['user_info']['user_ip']) : "";
            $individual_user_date   = isset($results['user_info']['submission_date']) && isset($results['user_info']['submission_date'])  ? esc_attr($results['user_info']['submission_date']) : "";
            $individual_user_sub_id = isset($results['user_info']['id']) && isset($results['user_info']['id'])  ? esc_attr($results['user_info']['id']) : "";
            
            $individual_user_extra_data  = isset($results['user_info']['options']) && $results['user_info']['options']  != '' ? json_decode(($results['user_info']['options']) , 'true') : array();
            $individual_user_device_type = isset($individual_user_extra_data['device']) && $individual_user_extra_data['device']  != '' ? esc_attr(ucfirst($individual_user_extra_data['device'])) : '';

            $survey_data_clipboard = array(
                "user_name"   => $individual_user_name,
                "user_email"  => $individual_user_email,
                "user_ip"     => $individual_user_ip,
                "user_date"   => $individual_user_date,
                "user_sub_id" => $individual_user_sub_id,
                "user_device_type" => $individual_user_device_type,
            );
            $results['user_info']['user_device_type'] = $individual_user_device_type;
            ob_end_clean();
            $ob_get_clean = ob_get_clean();
            $response = array(
                'status' => true,
                'questions' => $results['questions'],
                'user_info' => $results['user_info'],
                'user_info_for_copy' => Survey_Maker_Data::ays_survey_copy_text_formater($survey_data_clipboard)
            );
            echo json_encode($response);
            wp_die();
        }
        ob_end_clean();
        $ob_get_clean = ob_get_clean();
        $response = array(
            'status' => false
        );
        echo json_encode($response);
        wp_die();
    }

    // Survey Maker Elementor widget init
    public function survey_maker_el_widgets_registered() {
        // We check if the Elementor plugin has been installed / activated.
        if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {
            // get our own widgets up and running:
            // copied from widgets-manager.php
            if ( class_exists( 'Elementor\Plugin' ) ) {
                if ( is_callable( 'Elementor\Plugin', 'instance' ) ) {
                    $elementor = Elementor\Plugin::instance();
                    if ( isset( $elementor->widgets_manager ) ) {
                        if ( method_exists( $elementor->widgets_manager, 'register_widget_type' ) ) {
                            wp_enqueue_style($this->plugin_name . '-admin', plugin_dir_url(__FILE__) . 'css/admin.css', array(), $this->version, 'all');
                            wp_enqueue_style( SURVEY_MAKER_NAME . "-dropdown", SURVEY_MAKER_PUBLIC_URL . '/css/dropdown.min.css', array(), SURVEY_MAKER_VERSION, 'all' );
                            $widget_file   = 'plugins/elementor/survey-maker-elementor.php';
                            $template_file = locate_template( $widget_file );
                            if ( !$template_file || !is_readable( $template_file ) ) {
                                $template_file = SURVEY_MAKER_DIR . 'pb_templates/survey-maker-elementor.php';
                            }
                            if ( $template_file && is_readable( $template_file ) ) {
                                require_once $template_file;
                                Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor\Widget_Survey_Maker_Elementor() );
                            }
                        }
                    }
                }
            }
        }
    }

    // Get Submissions count ( Checkbox )
    public function ays_survey_get_submission_count($id, $type, $survey_id){
        global $wpdb;
        $submitions_table   = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions";
        $submitions_q_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions_questions";
        $results = array();
        if($type == 'checkbox'){
            $sql = "SELECT COUNT(submission_id) AS sub_count
                    FROM {$submitions_q_table}
                    WHERE question_id = ". absint( $id )."
                    AND user_answer != ''
                    AND type='". esc_sql( $type ) ."'
                    AND survey_id=". absint( $survey_id );
            $results = $wpdb->get_row($sql,'ARRAY_A');
        }
        $submission_count = isset($results['sub_count']) && $results['sub_count'] != "" && $results['sub_count'] > 0 ? $results['sub_count'] : 0;
        return $submission_count;
    }

    public function ays_survey_sale_baner(){
        /*   OLD INFO OPEN AFTER HALLOWEN START  */
        // if(isset($_POST['ays_survey_sale_btn'])){
        //     update_option('ays_survey_sale_btn', 1);
        //     update_option('ays_survey_maker_sale_date', current_time( 'mysql' ));
        // }

        // if(isset($_POST['ays_survey_sale_btn_for_two_months'])){
        //     update_option('ays_survey_sale_btn_for_two_months', 1);
        //     update_option('ays_survey_maker_sale_date', current_time( 'mysql' ));
        // }
    
        // $ays_survey_maker_sale_date = get_option('ays_survey_maker_sale_date');
        // $ays_survey_maker_sale_two_months = get_option('ays_survey_sale_btn_for_two_months');

        // $val = 60*60*24*5;
        // if($ays_survey_maker_sale_two_months == 1){
        //     $val = 60*60*24*61;
        // }

        // $current_date = current_time( 'mysql' );
        // $date_diff = strtotime($current_date) - intval(strtotime($ays_survey_maker_sale_date)) ;
        
        // $days_diff = $date_diff / $val;
    
        // if(intval($days_diff) > 0 ){
        //     update_option('ays_survey_sale_btn', 0);
        //     update_option('ays_survey_sale_btn_for_two_months', 0);
        // }
    
        // $ays_survey_maker_flag = intval(get_option('ays_survey_sale_btn'));
        // $ays_survey_maker_flag += intval(get_option('ays_survey_sale_btn_for_two_months'));
        // if( $ays_survey_maker_flag == 0 ){
        //     if (isset($_GET['page']) && strpos($_GET['page'], SURVEY_MAKER_NAME) !== false) {
        //         if( !(Survey_Maker_Admin::get_max_id('surveys') <= 1) ){
        //             // $this->ays_survey_sale_message($ays_survey_maker_flag);
        //             // $this->ays_survey_spring_bundle_small_message($ays_survey_maker_flag);
        //             $this->ays_survey_maker_helloween_message($ays_survey_maker_flag);
        //         }
        //     }
        // }
        /*   OLD INFO OPEN AFTER HALLOWEN END  */

        // ONLY FOR Black Friday
        if(isset($_POST['ays_survey_sale_btn']) && 
        (isset( $_POST[$this->plugin_name . '-sale-banner'] ) && wp_verify_nonce( $_POST[$this->plugin_name . '-sale-banner'], $this->plugin_name . '-sale-banner' )) &&
        current_user_can( 'manage_options' )){

            update_option('ays_survey_sale_btn', 1);
            update_option('ays_survey_sale_date', current_time( 'mysql' ));
        }
    
        $ays_survey_sale_date = get_option('ays_survey_sale_date');

        $val = 60*60*24*5;

        $current_date = current_time( 'mysql' );
        $date_diff = strtotime($current_date) - intval(strtotime($ays_survey_sale_date)) ;
        
        $days_diff = $date_diff / $val;
    
        if(intval($days_diff) > 0 ){
            update_option('ays_survey_sale_btn', 0);
        }
    
    
        $ays_survey_maker_flag = intval(get_option('ays_survey_sale_btn'));
        if( $ays_survey_maker_flag == 0 ){
            if (isset($_GET['page']) && strpos($_GET['page'], SURVEY_MAKER_NAME) !== false) {
                if(Survey_Maker_Admin::get_max_id('surveys') > 1){
                    // $this->ays_survey_new_halloween_bundle_message_2025($ays_survey_maker_flag);
                    // $this->ays_survey_black_friday_message($ays_survey_maker_flag);
                    // $this->ays_survey_christmas_banner_message_2025($ays_survey_maker_flag);
                    $this->ays_survey_new_mega_bundle_message_2026($ays_survey_maker_flag);
                }
            }
        }
        
    }

    // New Mega Bundle
    public function ays_quiz_new_mega_bundle_message_2025($ishmar){
        if($ishmar == 0 ){
            $content = array();

            $survey_cta_button_link = esc_url('https://ays-pro.com/mega-bundle?utm_source=dashboard&utm_medium=survey-free&utm_campaign=mega-bundle-2025-sale-banner-' . SURVEY_MAKER_VERSION);

            $content[] = '<div id="ays-survey-new-mega-bundle-2025-dicount-month-main" class="notice notice-success is-dismissible ays_survey_dicount_info">';
                $content[] = '<div id="ays-survey-dicount-month" class="ays_survey_dicount_month">';

                    $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-text-box">';
                        $content[] = '<div>';

                            $content[] = '<span class="ays-survey-new-mega-bundle-2025-title">';
                                $content[] = __( "<span><a href='". $survey_cta_button_link ."' target='_blank' style='color:#ffffff; text-decoration: underline;'>Mega Bundle</a></span> (Quiz + Survey + Poll)", 'survey-maker' );
                            $content[] = '</span>';

                            $content[] = '</br>';

                            $content[] = '<span class="ays-survey-new-mega-bundle-2025-desc">';
                                $content[] = __( "30 Day Money Back Guarantee", 'survey-maker' );
                            $content[] = '</span>';
                        $content[] = '</div>';

                        $content[] = '<div>';
                                $content[] = '<img class="ays-survey-new-mega-bundle-guaranteeicon" src="' . SURVEY_MAKER_ADMIN_URL . '/images/ays-survey-mega-bundle-2025-discount.svg" style="width: 80px;">';
                        $content[] = '</div>';

                        $content[] = '<div style="position: absolute;right: 10px;bottom: 1px;" class="ays-survey-dismiss-buttons-container-for-form">';

                            $content[] = '<form action="" method="POST">';
                                $content[] = '<div id="ays-survey-dismiss-buttons-content">';
                                if( current_user_can( 'manage_options' ) ){
                                    $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn" style="height: 32px; margin-left: 0;padding-left: 0">'. __( "Dismiss ad", 'survey-maker' ) .'</button>';
                                    $content[] = wp_nonce_field( SURVEY_MAKER_NAME . '-sale-banner' ,  SURVEY_MAKER_NAME . '-sale-banner' );
                                }
                                $content[] = '</div>';
                            $content[] = '</form>';
                            
                        $content[] = '</div>';

                    $content[] = '</div>';

                    $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-countdown-box">';

                        $content[] = '<div id="ays-survey-maker-countdown-main-container">';
                            $content[] = '<div class="ays-survey-maker-countdown-container">';

                                $content[] = '<div id="ays-survey-countdown">';

                                    $content[] = '<ul>';
                                        $content[] = '<li><span id="ays-survey-countdown-days"></span>'. __( "Days", 'survey-maker' ) .'</li>';
                                        $content[] = '<li><span id="ays-survey-countdown-hours"></span>'. __( "Hours", 'survey-maker' ) .'</li>';
                                        $content[] = '<li><span id="ays-survey-countdown-minutes"></span>'. __( "Minutes", 'survey-maker' ) .'</li>';
                                        $content[] = '<li><span id="ays-survey-countdown-seconds"></span>'. __( "Seconds", 'survey-maker' ) .'</li>';
                                    $content[] = '</ul>';
                                $content[] = '</div>';

                                $content[] = '<div id="ays-survey-countdown-content" class="emoji">';
                                    $content[] = '<span></span>';
                                    $content[] = '<span></span>';
                                    $content[] = '<span></span>';
                                    $content[] = '<span></span>';
                                $content[] = '</div>';

                            $content[] = '</div>';
                        $content[] = '</div>';
                            
                    $content[] = '</div>';

                    $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-button-box">';
                        $content[] = '<a href="'. $survey_cta_button_link .'" class="button button-primary ays-button" id="ays-button-top-buy-now" target="_blank">' . __( 'Buy Now', 'survey-maker' ) . '</a>';
                        $content[] = '<span class="ays-survey-dicount-one-time-text">';
                            $content[] = __( "One-time payment", 'survey-maker' );
                        $content[] = '</span>';
                    $content[] = '</div>';
                $content[] = '</div>';
            $content[] = '</div>';

            $content = implode( '', $content );
            echo wp_kses_post($content);
        }
    }

    // New Mega Bundle 2026
    public static function ays_survey_new_mega_bundle_message_2026($ishmar){
        if( $ishmar == 0 ){
            $content = array();

            $date = time() + (int) ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS);
            $now_date = date('M d, Y H:i:s', $date);

            $survey_banner_date = strtotime( self::ays_survey_update_banner_time() );

            $diff = $survey_banner_date - $date;

            $style_attr = '';
            if( $diff < 0 ){
                $style_attr = 'style="display:none;"';
            }

            $survey_cta_button_link = esc_url( 'https://ays-pro.com/mega-bundle?utm_source=dashboard&utm_medium=survey-free&utm_campaign=mega-bundle-sale-banner-' . SURVEY_MAKER_VERSION );

            $content[] = '<div id="ays-survey-new-mega-bundle-dicount-month-main" class="ays-survey-admin-notice notice notice-success is-dismissible ays_survey_dicount_info">';
                $content[] = '<div id="ays-survey-dicount-month" class="ays_survey_dicount_month">';

                    $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-text-box">';
                        $content[] = '<div>';
                            $content[] = '<div class="ays-survey-dicount-logo-box">';
                                $content[] = '<a href="' . $survey_cta_button_link . '" target="_blank" class="ays-survey-sale-banner-link"><img src="' . SURVEY_MAKER_ADMIN_URL . '/images/mega_bundle_logo_box.png"></a>';

                                $content[] = '<div>';
                                    $content[] = '<span class="ays-survey-new-mega-bundle-title">';
                                        $content[] = sprintf(
                                        /* translators: 1: opening link wrapper with <a> tag, 2: closing </a> tag */
                                        __( '%1$s Mega Bundle %2$s ( Quiz + Survey + Poll )', 'survey-maker' ),
                                        '<span style="display:inline-block; margin-right:5px;"><a href="' . esc_url( $survey_cta_button_link ) . '" target="_blank" rel="noopener noreferrer" style="color:#ffffff !important; text-decoration: underline;">',
                                        '</a></span>'
                                    );
                                    $content[] = '</span>';
                                    $content[] = '</br>';
                                    $content[] = '<span class="ays-survey-new-mega-bundle-desc">';
                                        $content[] = __( "30 Day Money Back Guarantee", 'survey-maker' );
                                    $content[] = '</span>';
                                $content[] = '</div>';

                                $content[] = '<div class="ays-survey-new-mega-bundle-title-icon-row" style="display: inline-block;">';
                                    $content[] = '<img src="' . SURVEY_MAKER_ADMIN_URL . '/images/ays-survey-banner-sale-50.svg" class="ays-survey-new-mega-bundle-mobile-image-display-none" style="width: 70px;">';
                                $content[] = '</div>';

                            $content[] = '</div>';

                        $content[] = '</div>';

                        $content[] = '<div style="position: absolute;right: 10px;bottom: 1px;" class="ays-survey-dismiss-buttons-container-for-form">';

                            $content[] = '<form action="" method="POST">';
                                $content[] = '<div id="ays-survey-dismiss-buttons-content">';
                                if( current_user_can( 'manage_options' ) ){
                                    $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn" style="height: 32px; margin-left: 0;padding-left: 0">'. __( "Dismiss ad", 'survey-maker' ) .'</button>';
                                    $content[] = wp_nonce_field( SURVEY_MAKER_NAME . '-sale-banner' ,  SURVEY_MAKER_NAME . '-sale-banner' );
                                }
                                $content[] = '</div>';
                            $content[] = '</form>';
                            
                        $content[] = '</div>';

                    $content[] = '</div>';

                    $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-countdown-box">';

                        $content[] = '<div id="ays-survey-countdown-main-container">';
                            $content[] = '<div class="ays-survey-countdown-container">';

                                $content[] = '<div ' . $style_attr . ' id="ays-survey-countdown">';

                                    $content[] = '<ul>';

                                    $content[] = '<li><span id="ays-survey-countdown-days"></span></li>';
                                        $content[] = '<li><span id="ays-survey-countdown-hours"></span></li>';
                                        $content[] = '<li><span id="ays-survey-countdown-minutes"></span></li>';
                                        $content[] = '<li><span id="ays-survey-countdown-seconds"></span></li>';
                                    $content[] = '</ul>';
                                $content[] = '</div>';

                                $content[] = '<div id="ays-survey-countdown-content" class="emoji">';
                                $content[] = '</div>';

                            $content[] = '</div>';
                        $content[] = '</div>';
                            
                    $content[] = '</div>';

                    $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-button-box">';
                        $content[] = '<a href="'. $survey_cta_button_link .'" class="button button-primary ays-button" id="ays-button-top-buy-now" target="_blank">' . __( 'Buy Now', 'survey-maker' ) . '</a>';
                        $content[] = '<span class="ays-survey-dicount-one-time-text">';
                            $content[] = __( "One-time payment", 'survey-maker' );
                        $content[] = '</span>';
                    $content[] = '</div>';
                $content[] = '</div>';
            $content[] = '</div>';

            // /* New Mega Bundle Banner Survey | Start */
            $content[] = '<style id="ays-survey-mega-bundle-styles-inline-css">';
            $content[] = '
            div#ays-survey-new-mega-bundle-dicount-month-main{border:0;background:#fff;border-radius:20px;box-shadow:unset;position:relative;z-index:1;min-height:80px}div#ays-survey-new-mega-bundle-dicount-month-main.ays_survey_dicount_info button{display:flex;align-items:center}div#ays-survey-new-mega-bundle-dicount-month-main div#ays-survey-dicount-month a.ays-survey-sale-banner-link:focus{outline:0;box-shadow:0}div#ays-survey-new-mega-bundle-dicount-month-main .btn-link{color:#007bff;background-color:transparent;display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;line-height:1.5;border-radius:.25rem}div#ays-survey-new-mega-bundle-dicount-month-main.ays_survey_dicount_info{background-image:url("'. SURVEY_MAKER_ADMIN_URL .'/images/new-mega-bundle-logo-background.svg");background-position:center right;background-repeat:no-repeat;background-size:cover;background-color:#5551ff;padding:1px 38px 1px 12px}#ays-survey-new-mega-bundle-dicount-month-main .ays_survey_dicount_month{display:flex;align-items:center;justify-content:space-between;color:#fff}#ays-survey-new-mega-bundle-dicount-month-main .ays_survey_dicount_month img{width:60px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-sale-banner-link{display:flex;justify-content:center;align-items:center;width:60px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box{font-size:14px;padding:12px;text-align:center}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box{text-align:left;width:auto;display:flex;justify-content:space-around;align-items:flex-start}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-countdown-box{width:30%;display:flex;justify-content:center;align-items:center}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-button-box{width:20%;display:flex;justify-content:center;align-items:center;flex-direction:column}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-survey-dicount-logo-box{display:flex;justify-content:flex-start;align-items:center;gap:20px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box .ays-survey-new-mega-bundle-title{color:#fdfdfd;font-size:19px;font-style:normal;font-weight:600;line-height:normal}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box .ays-survey-new-mega-bundle-title-icon-row{display:inline-block}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box .ays-survey-new-mega-bundle-desc{display:inline-block;color:#fff;font-size:15px;font-style:normal;font-weight:400;line-height:normal;margin-top:10px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box strong{font-size:17px;font-weight:700;letter-spacing:.8px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-color{color:#971821}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-text-decoration{text-decoration:underline}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-buy-now-button-box{display:flex;justify-content:flex-end;align-items:center;width:30%}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-button,#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-buy-now-button{align-items:center;font-weight:500}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-buy-now-button{background:#971821;border-color:#fff;display:flex;justify-content:center;align-items:center;padding:5px 15px;font-size:16px;border-radius:5px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-buy-now-button:hover{background:#7d161d;border-color:#971821}#ays-survey-new-mega-bundle-dicount-month-main #ays-survey-dismiss-buttons-content{display:flex;justify-content:center}#ays-survey-new-mega-bundle-dicount-month-main #ays-survey-dismiss-buttons-content .ays-button{margin:0!important;font-size:13px;color:#fff}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-opacity-box{width:19%}#ays-survey-new-mega-bundle-dicount-month-main .ays-buy-now-opacity-button{padding:40px 15px;display:flex;justify-content:center;align-items:center;opacity:0}#ays-survey-countdown-main-container .ays-survey-countdown-container{margin:0 auto;text-align:center}#ays-survey-countdown-main-container #ays-survey-countdown-headline{letter-spacing:.125rem;text-transform:uppercase;font-size:18px;font-weight:400;margin:0;padding:9px 0 4px;line-height:1.3}#ays-survey-countdown-main-container li,#ays-survey-countdown-main-container ul{margin:0}#ays-survey-countdown-main-container li{display:inline-block;font-size:14px;list-style-type:none;padding:14px;text-transform:lowercase}#ays-survey-countdown-main-container li span{display:flex;justify-content:center;align-items:center;font-size:22px;min-height:40px;min-width:40px;border-radius:4.273px;border:.534px solid #f4f4f4;background:#9896ed;color:#fff}#ays-survey-countdown-main-container .emoji{display:none;padding:1rem}#ays-survey-countdown-main-container .emoji span{font-size:30px;padding:0 .5rem}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box li{position:relative}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box li span:after{content:":";color:#fff;position:absolute;top:0;right:-5px;font-size:40px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box li span#ays-survey-countdown-seconds:after{content:unset}#ays-survey-new-mega-bundle-dicount-month-main #ays-button-top-buy-now{display:flex;align-items:center;border-radius:6.409px;background:#f66123;padding:12px 32px;color:#fff;font-size:15px;font-style:normal;line-height:normal;margin:0!important}div#ays-survey-new-mega-bundle-dicount-month-main button.notice-dismiss:before{color:#fff;content:"\f00d";font-family:fontawesome;font-size:22px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-new-mega-bundle-guaranteeicon{width:30px;margin-right:5px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-one-time-text{color:#fff;font-size:12px;font-style:normal;font-weight:600;line-height:normal}@media all and (max-width:768px){div#ays-survey-new-mega-bundle-dicount-month-main.ays_survey_dicount_info.notice{display:none!important;background-position:bottom right;background-repeat:no-repeat;background-size:cover;border-radius:32px}div#ays-survey-new-mega-bundle-dicount-month-main{padding-right:0}div#ays-survey-new-mega-bundle-dicount-month-main .ays_survey_dicount_month{display:flex;align-items:center;justify-content:space-between;align-content:center;flex-wrap:wrap;flex-direction:column;padding:10px 0}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box{width:100%!important;text-align:center}#ays-survey-countdown-main-container #ays-survey-countdown-headline{font-size:15px;font-weight:600}#ays-survey-countdown-main-container ul{font-weight:500}div#ays-survey-countdown-main-container li{padding:10px}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-new-mega-bundle-mobile-image-display-none{display:none!important}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-new-mega-bundle-mobile-image-display-block{display:block!important;margin-top:5px}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box{width:100%!important;text-align:center;flex-direction:column;margin-top:20px;justify-content:center;align-items:center}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box li span:after{top:unset}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-countdown-box{width:100%;display:flex;justify-content:center;align-items:center}#ays-survey-new-mega-bundle-dicount-month-main .ays-button{margin:0 auto!important}#ays-survey-new-mega-bundle-dicount-month-main #ays-survey-dismiss-buttons-content .ays-button{padding-left:unset!important}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-buy-now-button-box{justify-content:center}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-buy-now-button{font-size:14px;padding:5px 10px}div#ays-survey-new-mega-bundle-dicount-month-main .ays-buy-now-opacity-button{display:none}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dismiss-buttons-container-for-form{position:static!important}.comparison .product img{width:70px}.ays-survey-features-wrap .comparison a.price-buy{padding:8px 5px;font-size:11px}}@media screen and (max-width:1350px) and (min-width:768px){div#ays-survey-new-mega-bundle-dicount-month-main.ays_survey_dicount_info.notice{background-position:bottom right;background-repeat:no-repeat;background-size:cover}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box strong{font-size:15px}#ays-survey-countdown-main-container li{font-size:11px}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-opacity-box{display:none}}@media screen and (max-width:1680px) and (min-width:1551px){div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box{width:29%}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-countdown-box{width:30%}}@media screen and (max-width:1410px){#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-coupon-row{width:150px}}@media screen and (max-width:1550px) and (min-width:1400px){div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-countdown-box{width:35%}}@media screen and (max-width:1400px) and (min-width:1250px){div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-countdown-box{width:35%}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box{width:40%}}@media screen and (max-width:1274px){#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box .ays-survey-new-mega-bundle-title{font-size:15px}}@media screen and (max-width:1200px){#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-button-box{margin-bottom:16px}#ays-survey-countdown-main-container ul{padding-left:0}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-coupon-row{width:120px;font-size:18px}#ays-survey-new-mega-bundle-dicount-month-main #ays-button-top-buy-now{padding:12px 20px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box{font-size:12px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box .ays-survey-new-mega-bundle-desc{font-size:13px}}@media screen and (max-width:1076px) and (min-width:769px){#ays-survey-countdown-main-container li{padding:10px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-coupon-row{width:100px;font-size:16px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-button-box{margin-bottom:16px}#ays-survey-new-mega-bundle-dicount-month-main #ays-button-top-buy-now{padding:12px 15px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box{font-size:11px;padding:12px 0}}@media screen and (max-width:1250px) and (min-width:769px){div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-countdown-box{width:45%}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box{width:35%}}';
            $content[] = '</style>';
            // /* New Mega Bundle Banner Survey | End */

            $content = implode( '', $content );
            echo ($content);        
        }
    }

    // Christmas Banner 2025
    public static function ays_survey_christmas_banner_message_2025($ishmar){
        if($ishmar == 0 ){
            $content = array();

           $svg_icon = '<svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0445 0C10.4587 0 10.7945 0.33579 10.7945 0.75V2.93934L12.5141 1.21967C12.807 0.92678 13.2819 0.92678 13.5748 1.21967C13.8677 1.51256 13.8677 1.98744 13.5748 2.28033L10.7945 5.06066V9.451L14.5965 7.25588L15.6142 3.45788C15.7214 3.05778 16.1326 2.82034 16.5327 2.92755C16.9328 3.03475 17.1703 3.44601 17.0631 3.84611L16.4336 6.19522L18.3296 5.10055C18.6884 4.89344 19.147 5.01635 19.3542 5.37507C19.5613 5.73379 19.4384 6.19248 19.0796 6.39959L17.1836 7.49426L19.5327 8.1237C19.9328 8.23091 20.1703 8.64216 20.0631 9.0423C19.9558 9.4424 19.5446 9.6798 19.1445 9.5726L15.3465 8.55492L11.5445 10.75L15.3467 12.9452L19.1447 11.9275C19.5448 11.8203 19.956 12.0578 20.0633 12.4579C20.1705 12.858 19.933 13.2692 19.5329 13.3764L17.1838 14.0059L19.0798 15.1005C19.4386 15.3077 19.5615 15.7663 19.3544 16.1251C19.1472 16.4838 18.6886 16.6067 18.3298 16.3996L16.4338 15.3049L17.0633 17.654C17.1705 18.0541 16.933 18.4654 16.5329 18.5726C16.1328 18.6798 15.7216 18.4424 15.6144 18.0423L14.5967 14.2443L10.7945 12.049V16.4393L13.5748 19.2197C13.8677 19.5126 13.8677 19.9874 13.5748 20.2803C13.2819 20.5732 12.807 20.5732 12.5141 20.2803L10.7945 18.5607V20.75C10.7945 21.1642 10.4587 21.5 10.0445 21.5C9.63033 21.5 9.29453 21.1642 9.29453 20.75V18.5607L7.57484 20.2803C7.28195 20.5732 6.80707 20.5732 6.51418 20.2803C6.22129 19.9874 6.22129 19.5126 6.51418 19.2197L9.29453 16.4393V12.049L5.4923 14.2443L4.47463 18.0423C4.36742 18.4424 3.95617 18.6798 3.55607 18.5726C3.15597 18.4654 2.91853 18.0541 3.02574 17.654L3.65518 15.3049L1.75916 16.3996C1.40044 16.6067 0.941743 16.4838 0.734643 16.1251C0.527533 15.7663 0.650443 15.3077 1.00916 15.1005L2.90518 14.0059L0.556073 13.3764C0.155973 13.2692 -0.081467 12.858 0.0257431 12.4579C0.132943 12.0578 0.544203 11.8203 0.944303 11.9275L4.7423 12.9452L8.54453 10.75L4.74249 8.55492L0.944493 9.5726C0.544393 9.6798 0.133143 9.4424 0.0259331 9.0423C-0.0812669 8.64216 0.156163 8.23091 0.556263 8.1237L2.90538 7.49426L1.00935 6.39959C0.650633 6.19248 0.527733 5.73379 0.734833 5.37507C0.941943 5.01635 1.40063 4.89344 1.75935 5.10055L3.65538 6.19522L3.02593 3.84611C2.91873 3.44601 3.15616 3.03475 3.55626 2.92755C3.95636 2.82034 4.36762 3.05778 4.47482 3.45788L5.49249 7.25588L9.29453 9.451V5.06066L6.51418 2.28033C6.22129 1.98744 6.22129 1.51256 6.51418 1.21967C6.80707 0.92678 7.28195 0.92678 7.57484 1.21967L9.29453 2.93934V0.75C9.29453 0.33579 9.63033 0 10.0445 0Z" fill="white" fill-opacity="0.2"/>
            </svg>
            ';

            $ays_survey_cta_button_link = esc_url('https://ays-pro.com/wordpress/survey-maker?utm_source=dashboard&utm_medium=survey-free&utm_campaign=christmas-sale-banner-' . SURVEY_MAKER_VERSION);

            $content[] = '<div id="ays-survey-christmas-banner-main" class="notice notice-success is-dismissible ays-survey-christmas-banner-info ays_survey_dicount_info">';
                $content[] = '<div id="ays-survey-christmas-banner-month" class="ays-survey-christmas-banner-month">';
                    
                    // Background effects
                    $content[] = '<div class="ays-survey-christmas-banner-bg-effects">';
                        $content[] = '<div class="ays-survey-christmas-banner-bg-gradient-1"></div>';
                        $content[] = '<div class="ays-survey-christmas-banner-bg-gradient-2"></div>';
                        
                        // Snowflakes
                        $content[] = '<div class="ays-survey-christmas-banner-snowflake" style="left: 5%; animation-delay: 0s; animation-duration: 8s;">'. $svg_icon .'</div>';
                        $content[] = '<div class="ays-survey-christmas-banner-snowflake" style="left: 15%; animation-delay: 2s; animation-duration: 10s;">'. $svg_icon .'</div>';
                        $content[] = '<div class="ays-survey-christmas-banner-snowflake" style="left: 25%; animation-delay: 4s; animation-duration: 9s;">'. $svg_icon .'</div>';
                        $content[] = '<div class="ays-survey-christmas-banner-snowflake" style="left: 75%; animation-delay: 1s; animation-duration: 11s;">'. $svg_icon .'</div>';
                        $content[] = '<div class="ays-survey-christmas-banner-snowflake" style="left: 85%; animation-delay: 3s; animation-duration: 8s;">'. $svg_icon .'</div>';
                        $content[] = '<div class="ays-survey-christmas-banner-snowflake" style="left: 92%; animation-delay: 5s; animation-duration: 10s;">'. $svg_icon .'</div>';
                        
                        // Sparkles
                        $content[] = '<svg class="ays-survey-christmas-banner-sparkle" style="top: 20%; left: 8%; animation-delay: 0s; width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
                            $content[] = '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/>';
                        $content[] = '</svg>';
                        $content[] = '<svg class="ays-survey-christmas-banner-sparkle" style="top: 60%; left: 3%; animation-delay: 0.5s; width: 10px; height: 10px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
                            $content[] = '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/>';
                        $content[] = '</svg>';
                        $content[] = '<svg class="ays-survey-christmas-banner-sparkle" style="top: 30%; right: 12%; animation-delay: 1s; width: 12px; height: 12px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
                            $content[] = '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/>';
                        $content[] = '</svg>';
                    $content[] = '</div>';

                    // Main content
                    $content[] = '<div class="ays-survey-christmas-banner-content">';
                        $content[] = '<div class="ays-survey-christmas-banner-left">';
                            // Gift icon with hat
                            $content[] = '<div class="ays-survey-christmas-banner-gift-wrapper">';
                                $content[] = '<svg class="ays-survey-christmas-banner-gift-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">';
                                    $content[] = '<rect x="3" y="8" width="18" height="4" rx="1"></rect>';
                                    $content[] = '<path d="M12 8v13"></path>';
                                    $content[] = '<path d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"></path>';
                                    $content[] = '<path d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"></path>';
                                $content[] = '</svg>';
                                $content[] = '<div class="ays-survey-christmas-banner-hat">';
                                    $content[] = '<svg viewBox="0 0 24 24" fill="none" class="ays-survey-christmas-banner-hat-svg">';
                                        $content[] = '<path d="M12 2L4 14h16L12 2z" fill="hsl(0 80% 45%)"></path>';
                                        $content[] = '<path d="M4 14c0 2 3.5 3 8 3s8-1 8-3" fill="hsl(0 0% 100%)"></path>';
                                        $content[] = '<circle cx="12" cy="3" r="2" fill="hsl(0 0% 100%)"></circle>';
                                    $content[] = '</svg>';
                                $content[] = '</div>';
                            $content[] = '</div>';

                            $content[] = '<div class="ays-survey-christmas-banner-special-label">';
                                $content[] = '<div class="ays-survey-christmas-banner-special-label-name">';
                                    $content[] = '<a href="'. $ays_survey_cta_button_link .'" class="ays-survey-christmas-banner-special-label-name-link" target="_blank">';
                                        $content[] = __( 'Survey Maker', "survey-maker" );
                                    $content[] = '</a>';
                                $content[] = '</div>';

                                $content[] = '<div>✦ ' . __( 'CHRISTMAS SPECIAL', "survey-maker" ) . ' ✦</div>';
                            $content[] = '</div>';
                        $content[] = '</div>';

                        $content[] = '<div class="ays-survey-christmas-banner-center">';
                            $content[] = '<div class="ays-survey-christmas-banner-discount-text">25% OFF</div>';
                            $content[] = '<div class="ays-survey-christmas-banner-limited-offer">' . __( 'Limited time offer', "survey-maker" ) . '</div>';
                        $content[] = '</div>';

                        $content[] = '<div class="ays-survey-christmas-banner-right">';
                            $content[] = '<div class="ays-survey-christmas-banner-coupon-box" onclick="aysSurveyChristmasCopyToClipboard(\'XMAS25\')" title="' . __( 'Click to copy', "survey-maker" ) . '">';
                                $content[] = '<span class="ays-survey-christmas-banner-coupon-text">XMAS25</span>';
                                $content[] = '<svg class="ays-survey-christmas-banner-copy-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">';
                                    $content[] = '<path d="M13.5 2.5H6.5C5.67 2.5 5 3.17 5 4V10C5 10.83 5.67 11.5 6.5 11.5H13.5C14.33 11.5 15 10.83 15 10V4C15 3.17 14.33 2.5 13.5 2.5ZM13.5 10H6.5V4H13.5V10ZM2.5 6.5V12.5C2.5 13.33 3.17 14 4 14H10V12.5H4V6.5H2.5Z" fill="white"/>';
                                $content[] = '</svg>';
                            $content[] = '</div>';

                            $content[] = '<a href="'. $ays_survey_cta_button_link .'" class="ays-survey-christmas-banner-buy-now-btn" target="_blank">';
                                $content[] = __( 'Buy Now', "survey-maker" );
                            $content[] = '</a>';
                        $content[] = '</div>';
                    $content[] = '</div>';

                $content[] = '</div>';

                if( current_user_can( 'manage_options' ) ){
                $content[] = '<div id="ays-survey-dismiss-buttons-content">';
                    $content[] = '<form action="" method="POST" style="position: absolute; bottom: 0; right: 0; color: #fff;">';
                            $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn" style="color: darkgrey; font-size: 11px; padding: 0 .75rem;">'. __( "Dismiss ad", 'survey-maker' ) .'</button>';
                            $content[] = wp_nonce_field( SURVEY_MAKER_NAME . '-sale-banner' ,  SURVEY_MAKER_NAME . '-sale-banner' );
                    $content[] = '</form>';
                $content[] = '</div>';
                }

            $content[] = '</div>';

            $content[] = '<script>';
            $content[] = "
                function aysSurveyChristmasCopyToClipboard(text) {
                    var textarea = document.createElement('textarea');
                    textarea.value = text;
                    textarea.style.position = 'fixed';
                    textarea.style.opacity = '0';
                    document.body.appendChild(textarea);
                    
                    textarea.select();
                    textarea.setSelectionRange(0, 99999);
                    
                    try {
                        document.execCommand('copy');
                        aysSurveyChristmasShowCopyNotification('" . __( 'Coupon code copied!', "survey-maker" ) . "');
                    } catch (err) {
                        console.error('Failed to copy text: ', err);
                    }
                    
                    document.body.removeChild(textarea);
                }

                function aysSurveyChristmasShowCopyNotification(message) {
                    var existingNotification = document.querySelector('.ays-survey-christmas-banner-copy-notification');
                    if (existingNotification) {
                        document.body.removeChild(existingNotification);
                    }
                    
                    var notification = document.createElement('div');
                    notification.className = 'ays-survey-christmas-banner-copy-notification';
                    notification.textContent = message;
                    document.body.appendChild(notification);
                    
                    setTimeout(function() {
                        notification.classList.add('show');
                    }, 10);
                    
                    setTimeout(function() {
                        notification.classList.remove('show');
                        setTimeout(function() {
                            if (notification.parentNode) {
                                document.body.removeChild(notification);
                            }
                        }, 300);
                    }, 2000);
                }";
            $content[] = '</script>';                

            $content[] = '<style>';
            $content[] = '
                /* Christmas banner start */

                div#ays-survey-christmas-banner-main .btn-link {
                    background-color: transparent;
                    display: inline-block;
                    font-weight: 400;
                    text-align: center;
                    white-space: nowrap;
                    vertical-align: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    border: 1px solid transparent;
                    padding: .375rem .75rem;
                    font-size: 12px;
                    line-height: 1.5;
                    border-radius: .25rem;
                    color: rgba(255, 255, 255, .6);
                }
                
                div#ays-survey-christmas-banner-main.ays-survey-christmas-banner-info {
                    background: linear-gradient(to right, hsl(0, 70%, 28%), hsl(0, 65%, 38%), hsl(0, 70%, 28%));
                    padding: unset;
                    border-left: 0;
                    position: relative;
                }
                
                #ays-survey-christmas-banner-main .ays-survey-christmas-banner-month {
                    position: relative;
                    padding: 15px 40px;
                    overflow: hidden;
                }
                
                /* Background effects */
                .ays-survey-christmas-banner-bg-effects {
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    pointer-events: none;
                    z-index: 1;
                }
                
                .ays-survey-christmas-banner-bg-gradient-1 {
                    position: absolute;
                    top: 0;
                    left: 30%;
                    width: 40%;
                    height: 100%;
                    background: radial-gradient(circle, rgba(202, 43, 43, 0.5) 0%, transparent 60%);
                    opacity: 0.4;
                }
                
                .ays-survey-christmas-banner-bg-gradient-2 {
                    position: absolute;
                    top: 0;
                    right: 15%;
                    width: 35%;
                    height: 100%;
                    background: radial-gradient(circle, rgba(246, 201, 85, 0.15) 0%, transparent 50%);
                    opacity: 0.3;
                }
                
                .ays-survey-christmas-banner-snowflake {
                    position: absolute;
                    color: rgba(255, 255, 255, 0.2);
                    font-size: 20px;
                    animation: ays-survey-christmas-snowfall linear infinite;
                    top: -10px;
                }
                
                @keyframes ays-survey-christmas-snowfall {
                    0% {
                        transform: translateY(-10px) rotate(0deg);
                        opacity: 0;
                    }
                    10% {
                        opacity: 0.8;
                    }
                    90% {
                        opacity: 0.8;
                    }
                    100% {
                        transform: translateY(100%) rotate(360deg);
                        opacity: 0;
                    }
                }
                
                .ays-survey-christmas-banner-sparkle {
                    position: absolute;
                    color: hsl(43, 90%, 65%);
                    animation: ays-survey-christmas-twinkle 2s ease-in-out infinite;
                }
                
                @keyframes ays-survey-christmas-twinkle {
                    0%, 100% {
                        opacity: 0.3;
                        transform: scale(0.8);
                    }
                    50% {
                        opacity: 1;
                        transform: scale(1.2);
                    }
                }
                
                /* Main content */
                .ays-survey-christmas-banner-content {
                    position: relative;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    z-index: 2;
                }
                
                /* Left section */
                .ays-survey-christmas-banner-left {
                    display: flex;
                    align-items: center;
                    gap: 50px;
                }
                
                .ays-survey-christmas-banner-gift-wrapper {
                    position: relative;
                    animation: ays-survey-christmas-float 3s ease-in-out infinite;
                }
                
                .ays-survey-christmas-banner-gift-icon {
                    width: 48px;
                    height: 48px;
                    color: rgba(255, 247, 237, 0.9);
                }
                
                @keyframes ays-survey-christmas-float {
                    0%, 100% {
                        transform: translateY(0);
                    }
                    50% {
                        transform: translateY(-5px);
                    }
                }
                
                .ays-survey-christmas-banner-hat {
                    position: absolute;
                    top: -12px;
                    right: -4px;
                    width: 24px;
                    height: 24px;
                }
                
                .ays-survey-christmas-banner-hat-svg {
                    width: 100%;
                    height: 100%;
                }
                
                .ays-survey-christmas-banner-special-label {
                    color: hsl(43, 90%, 65%);
                    font-size: 14px;
                    font-weight: 500;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                    /* font-family: "Outfit", sans-serif; */
                }

                .ays-survey-christmas-banner-special-label-name {
                    color: #fffaf0;
                    text-align: center;
                }

                div#ays-survey-christmas-banner-main .ays-survey-christmas-banner-special-label-name-link {
                    color: #fffaf0;
                    box-shadow: unset;
                }
                
                /* Center section */
                .ays-survey-christmas-banner-center {
                    display: flex;
                    flex-direction: row;
                    text-align: center;
                    justify-content: center;
                    align-items: center;
                    gap: 30px;
                }
                
                .ays-survey-christmas-banner-discount-text {
                    font-family: "Outfit", sans-serif;
                    font-weight: 800;
                    font-size: 30px;
                    color: hsl(40, 100%, 97%);
                    letter-spacing: -1px;
                    line-height: 1;
                }
                
                .ays-survey-christmas-banner-limited-offer {
                    color: rgba(255, 247, 237, 0.7);
                    font-size: 13px;
                    font-weight: 500;
                }
                
                /* Right section */
                .ays-survey-christmas-banner-right {
                    display: flex;
                    align-items: center;
                    gap: 20px;
                }
                
                .ays-survey-christmas-banner-coupon-box {
                    border: 2px dashed rgba(255, 255, 255, 0.4);
                    padding: 8px 16px;
                    border-radius: 6px;
                    background: rgba(255, 255, 255, 0.1);
                    cursor: pointer;
                    transition: all 0.3s;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    backdrop-filter: blur(10px);
                }
                
                .ays-survey-christmas-banner-coupon-box:hover {
                    background: rgba(255, 255, 255, 0.2);
                    border-color: rgba(255, 255, 255, 0.6);
                    transform: translateY(-1px);
                }
                
                .ays-survey-christmas-banner-coupon-text {
                    font-size: 16px;
                    font-weight: 700;
                    letter-spacing: 1px;
                    color: #fff;
                    font-family: monospace;
                }
                
                .ays-survey-christmas-banner-copy-icon {
                    opacity: 0.8;
                    transition: opacity 0.3s;
                }
                
                .ays-survey-christmas-banner-coupon-box:hover .ays-survey-christmas-banner-copy-icon {
                    opacity: 1;
                }
                
                #ays-survey-christmas-banner-main .ays-survey-christmas-banner-buy-now-btn {
                    background-color: #fbe19f;
                    color: hsl(0, 72%, 35%);
                    padding: 10px 30px;
                    border-radius: 9999px;
                    font-size: 16px;
                    font-weight: 600;
                    font-family: "Outfit", sans-serif;
                    border: none;
                    cursor: pointer;
                    transition: all 0.3s;
                    text-decoration: none;
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15), 0 0 30px rgba(246, 201, 85, 0.2);
                }
                
                #ays-survey-christmas-banner-main .ays-survey-christmas-banner-buy-now-btn:hover {
                    background-color: #f2d58c;
                    transform: scale(1.05);
                    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2), 0 0 40px rgba(246, 201, 85, 0.3);
                }
                
                .ays-survey-christmas-banner-btn-arrow {
                    display: inline-block;
                    transition: transform 0.3s;
                }
                
                .ays-survey-christmas-banner-buy-now-btn:hover .ays-survey-christmas-banner-btn-arrow {
                    transform: translateX(4px);
                }
                
                /* Notification */
                .ays-survey-christmas-banner-copy-notification {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background: rgba(0, 0, 0, 0.8);
                    color: #fff;
                    padding: 12px 24px;
                    border-radius: 8px;
                    font-size: 14px;
                    z-index: 10000;
                    opacity: 0;
                    transition: opacity 0.3s;
                }
                
                .ays-survey-christmas-banner-copy-notification.show {
                    opacity: 1;
                }
                
                /* Dismiss button */
                #ays-survey-christmas-banner-main #ays-survey-christmas-banner-dismiss-content {
                    display: flex;
                    justify-content: center;
                }
                
                #ays-survey-christmas-banner-main #ays-survey-christmas-banner-dismiss-content .ays-button {
                    margin: 0 !important;
                    font-size: 13px;
                    color: rgba(150, 147, 147, 0.69);
                }
                
                /* Responsive */
                @media (max-width: 1024px) {
                    .ays-survey-christmas-banner-discount-text {
                        font-size: 40px;
                    }
                    .ays-survey-christmas-banner-content {
                        flex-wrap: wrap;
                    }
                }
                
                @media (max-width: 768px) {
                    #ays-survey-christmas-banner-main {
                        display: none !important;
                    }
                }
                /* Christmas banner end */
            ';
            $content[] = '</style>';

            $content = implode( '', $content );

            echo $content;
        }
    }

    // Black Friday
    public static function ays_survey_black_friday_message($ishmar){
        if($ishmar == 0 ){
            $content = array();

            $ays_survey_cta_button_link = esc_url('https://ays-pro.com/wordpress/survey-maker?utm_source=dashboard&utm_medium=survey-free&utm_campaign=black-friday-sale-banner-' . SURVEY_MAKER_VERSION);

            $content[] = '<div id="ays-survey-dicount-black-friday-month-main" class="notice notice-success is-dismissible ays_survey_dicount_info">';
                $content[] = '<div id="ays-survey-dicount-black-friday-month" class="ays_survey_dicount_month">';
                    $content[] = '<div class="ays-survey-dicount-black-friday-box">';
                        $content[] = '<div class="ays-survey-dicount-black-friday-wrap-box ays-survey-dicount-black-friday-wrap-box-80" style="width: 70%;">';
                            $content[] = '<div class="">';
                                $content[] = '<div class="ays-survey-dicount-black-friday-title-row" >' . __( 'Coupon Code', "survey-maker" ) .' ' . '</div>';
                                $content[] = '<div class="ays-survey-dicount-black-friday-title-row">';

                                $content[] = '
                                    <span class="ays-survey-dicount-black-friday-banner-2025-coupon-wrapper">
                                        <span class="ays-survey-dicount-black-friday-banner-2025-coupon-box" onclick="aysSurveyHalloweenCopyToClipboard(\'FREE2PROBF\')" title="Click to copy">
                                            <span class="ays-survey-dicount-black-friday-banner-2025-coupon-text">FREE2PROBF</span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="ays-survey-dicount-black-friday-banner-2025-copy-icon">
                                                <path d="M13.5 2.5H6.5C5.67 2.5 5 3.17 5 4V10C5 10.83 5.67 11.5 6.5 11.5H13.5C14.33 11.5 15 10.83 15 10V4C15 3.17 14.33 2.5 13.5 2.5ZM13.5 10H6.5V4H13.5V10ZM2.5 6.5V12.5C2.5 13.33 3.17 14 4 14H10V12.5H4V6.5H2.5Z" fill="white"/>
                                            </svg>
                                        </span>
                                    </span>';
                                $content[] = '</div> ';
                            $content[] = '</div>';

                        $content[] = '</div>';

                        $content[] = '<div class="ays-survey-dicount-black-friday-wrap-box ays-survey-dicount-black-friday-wrap-text-box">';
                            $content[] = '<div class="ays-survey-dicount-black-friday-text-row">' . '30% off' . '</div>';
                        $content[] = '</div>';

                        $content[] = '<div class="ays-survey-dicount-black-friday-wrap-box" style="width: 25%;">';
                            $content[] = '<div id="ays-survey-countdown-main-container">';
                                $content[] = '<div class="ays-survey-countdown-container">';
                                    $content[] = '<div id="ays-survey-countdown" style="display: block;">';
                                        $content[] = '<ul>';
                                            $content[] = '<li><span id="ays-survey-countdown-days"></span>' . __( 'Days', "survey-maker" ) . '</li>';
                                            $content[] = '<li><span id="ays-survey-countdown-hours"></span>' . __( 'Hours', "survey-maker" ) . '</li>';
                                            $content[] = '<li><span id="ays-survey-countdown-minutes"></span>' . __( 'Minutes', "survey-maker" ) . '</li>';
                                            $content[] = '<li><span id="ays-survey-countdown-seconds"></span>' . __( 'Seconds', "survey-maker" ) . '</li>';
                                        $content[] = '</ul>';
                                    $content[] = '</div>';
                                    $content[] = '<div id="ays-survey-countdown-content" class="emoji" style="display: none;">';
                                        $content[] = '<span></span>';
                                        $content[] = '<span></span>';
                                        $content[] = '<span></span>';
                                        $content[] = '<span></span>';
                                    $content[] = '</div>';
                                $content[] = '</div>';
                            $content[] = '</div>';
                        $content[] = '</div>';

                        $content[] = '<div class="ays-survey-dicount-black-friday-wrap-box" style="width: 25%;">';
                            $content[] = '<a href="'. $ays_survey_cta_button_link .'" class="ays-survey-dicount-black-friday-button-buy-now" target="_blank">' . __( 'Get Your Deal', "survey-maker" ) . '</a>';
                        $content[] = '</div>';
                    $content[] = '</div>';
                $content[] = '</div>';

                $content[] = '<div style="position: absolute;right: 0;bottom: 1px;"  class="ays-survey-dismiss-buttons-container-for-form-black-friday">';
                    $content[] = '<form action="" method="POST">';
                        $content[] = '<div id="ays-survey-dismiss-buttons-content">';
                            if( current_user_can( 'manage_options' ) ){
                                $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn" style="height: 32px; margin-left: 0;padding-left: 0">Dismiss ad</button>';
                                $content[] = wp_nonce_field( SURVEY_MAKER_NAME . '-sale-banner' ,  SURVEY_MAKER_NAME . '-sale-banner' );
                            }
                        $content[] = '</div>';
                    $content[] = '</form>';
                $content[] = '</div>';
            $content[] = '</div>';

            $content[] = '<script>';
            $content[] = "
                    function aysSurveyHalloweenCopyToClipboard(text) {
                        // Create a temporary textarea element
                        var textarea = document.createElement('textarea');
                        textarea.value = text;
                        textarea.style.position = 'fixed';
                        textarea.style.opacity = '0';
                        document.body.appendChild(textarea);
                        
                        // Select and copy the text
                        textarea.select();
                        textarea.setSelectionRange(0, 99999); // For mobile devices
                        
                        try {
                            document.execCommand('copy');
                            aysSurveyHalloweenShowCopyNotification('Coupon code copied!');
                        } catch (err) {
                            console.error('Failed to copy text: ', err);
                        }
                        
                        // Remove the temporary textarea
                        document.body.removeChild(textarea);
                    }

                    function aysSurveyHalloweenShowCopyNotification(message) {
                        // Check if notification already exists
                        var existingNotification = document.querySelector('.ays-survey-discount-black-friday-banner-2025-copy-notification');
                        if (existingNotification) {
                            document.body.removeChild(existingNotification);
                        }
                        
                        // Create notification element
                        var notification = document.createElement('div');
                        notification.className = 'ays-survey-discount-black-friday-banner-2025-copy-notification';
                        notification.textContent = message;
                        document.body.appendChild(notification);
                        
                        // Show notification with animation
                        setTimeout(function() {
                            notification.classList.add('show');
                        }, 10);
                        
                        // Hide and remove notification after 2 seconds
                        setTimeout(function() {
                            notification.classList.remove('show');
                            setTimeout(function() {
                                if (notification.parentNode) {
                                    document.body.removeChild(notification);
                                }
                            }, 300);
                        }, 2000);
                    }";
            $content[] = '</script>';

            $content[] = '<style>';
            $content[] = '
                /* Black friday banner start */
                div#ays-survey-dicount-black-friday-month-main *{color:#fff}div#ays-survey-dicount-black-friday-month-main div#ays-survey-dicount-black-friday-month a.ays-survey-sale-banner-link:focus{outline:0;box-shadow:0}div#ays-survey-dicount-black-friday-month-main .btn-link{background-color:transparent;display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;border:1px solid transparent;padding:.375rem .75rem;font-size:12px;line-height:1.5;border-radius:.25rem;color:rgba(255,255,255,.6)}div#ays-survey-dicount-black-friday-month-main.ays_survey_dicount_info{background-image:linear-gradient(45deg,#1e101d,#c60af4);padding:unset;border-left:0}#ays-survey-dicount-black-friday-month-main .ays_survey_dicount_month{position:relative;background-image:url("'. esc_attr(SURVEY_MAKER_ADMIN_URL) .'/images/black-friday-plugins-background-image.webp");background-position:center right;background-repeat:no-repeat;background-size:100% 100%}#ays-survey-dicount-black-friday-month-main .ays_survey_dicount_month img{width:80px}#ays-survey-dicount-black-friday-month-main .ays-survey-sale-banner-link{display:flex;justify-content:center;align-items:center;width:200px}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-button-sale{font-style:normal;font-weight:600;font-size:24px;text-align:center;color:#b2ff00;text-transform:uppercase}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box{font-size:14px;padding:12px;text-align:center;width:50%;white-space:nowrap}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box strong{font-size:17px;font-weight:700;letter-spacing:.8px}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-color{color:#971821}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-text-decoration{text-decoration:underline}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box.ays-buy-now-button-box{display:flex;justify-content:flex-end;align-items:center;width:30%}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box .ays-button,#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box .ays-buy-now-button{align-items:center;font-weight:500}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box .ays-buy-now-button{background:#971821;border-color:#fff;display:flex;justify-content:center;align-items:center;padding:5px 15px;font-size:16px;border-radius:5px}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box .ays-buy-now-button:hover{background:#7d161d;border-color:#971821}#ays-survey-dicount-black-friday-month-main #ays-survey-dismiss-buttons-content{display:flex;justify-content:center}#ays-survey-dicount-black-friday-month-main #ays-survey-dismiss-buttons-content .ays-button{margin:0!important;font-size:13px;color:#969393b0}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-opacity-box{width:19%}#ays-survey-dicount-black-friday-month-main .ays-buy-now-opacity-button{padding:40px 15px;display:flex;justify-content:center;align-items:center;opacity:0}#ays-survey-countdown-main-container .ays-survey-countdown-container{margin:0 auto;text-align:center}#ays-survey-countdown-main-container #ays-survey-countdown-headline{letter-spacing:.125rem;text-transform:uppercase;font-size:18px;font-weight:400;margin:0;padding:9px 0 4px;line-height:1.3}#ays-survey-countdown-main-container li,#ays-survey-countdown-main-container ul{margin:0;font-weight:600}#ays-survey-countdown-main-container li{display:inline-block;font-size:10px;list-style-type:none;padding:10px;text-transform:uppercase}#ays-survey-countdown-main-container li span{display:block;font-size:22px;min-height:33px}#ays-survey-countdown-main-container .emoji{display:none;padding:1rem}#ays-survey-countdown-main-container .emoji span{font-size:25px;padding:0 .5rem}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-box{display:flex;justify-content:space-between;align-items:center;width:95%;margin:auto}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-title-row{text-align:center;padding-right:50px;font-style:normal;font-weight:900;font-size:19px;color:#fff;}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-button-buy-now{border:none;outline:0;padding:10px 20px;font-size:22px;text-transform:uppercase;font-weight:700;text-decoration:none;background:linear-gradient(180deg,#dd0bef 0,#82008d 100%);border-radius:16px}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-text-row{text-transform:uppercase;text-shadow:-1.5px 0 #dd0bef,0 1.5px #dd0bef,1.5px 0 #dd0bef,0 -1.5px #dd0bef;font-weight:900;font-style:normal;font-size:40px;line-height:40px;color:#fff}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-text-box{position:absolute;width:25%;top:10px;bottom:0;right:0;left:0;margin:0 auto}#ays-survey-countdown ul{padding:0}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-banner-2025-coupon-box{border:2px dashed rgba(255,255,255,.4);padding:0 12px;border-radius:6px;background:rgba(255,255,255,.1);cursor:pointer;transition:.3s;display:flex;align-items:center;justify-content:center;gap:6px;backdrop-filter:blur(10px);width:fit-content;margin:0 auto}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-banner-2025-coupon-box:hover{background:rgba(255,255,255,.2);border-color:rgba(255,255,255,.6);transform:translateY(-1px)}#ays-survey-dicount-black-friday-month-main .ays-survey-discount-black-friday-banner-2025-coupon-text{font-size:14px;font-weight:700;letter-spacing:1px;color:#fff;font-family:monospace}#ays-survey-dicount-black-friday-month-main .ays-survey-discount-black-friday-banner-2025-copy-icon{opacity:.8;transition:opacity .3s}#ays-survey-dicount-black-friday-month-main .ays-survey-discount-black-friday-banner-banner-2025-coupon-box:hover .ays-survey-discount-black-friday-banner-2025-copy-icon,.ays-survey-discount-black-friday-banner-2025-copy-notification.show{opacity:1}.ays-survey-discount-black-friday-banner-2025-copy-notification{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:rgba(0,0,0,.8);color:#fff;padding:12px 24px;border-radius:8px;font-size:14px;z-index:10000;opacity:0;transition:opacity .3s}@media screen and (max-width:1400px) and (min-width:1200px){div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-title-row{font-size:15px}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-text-row{font-size:27px}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-box{width:100%}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-button-buy-now{font-size:13px}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box-80{width:80%!important}}@media all and (max-width:1200px){div#ays-survey-dicount-black-friday-month-main .ays_survey_dicount_month{background:unset}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-text-row{font-size:30px}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-box{width:100%}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-button-buy-now{font-size:15px}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box-80{width:80%!important}}@media all and (max-width:1200px) and (min-width:1150px){div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-title-row{font-size:15px}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-button-buy-now{font-size:10px}}@media all and (max-width:1150px){div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box-80{width:80%!important}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-box{flex-direction:column}div#ays-survey-dicount-black-friday-month-main{padding-right:0}div#ays-survey-dicount-black-friday-month-main .ays_survey_dicount_month{display:flex;align-items:center;justify-content:space-between;align-content:center;flex-wrap:wrap;flex-direction:column;padding:10px 0}div#ays-survey-dicount-black-friday-month-main div.ays-survey-dicount-black-friday-wrap-box{width:100%!important;text-align:center}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-title-row,div#ays-survey-dicount-black-friday-month-main #ays-survey-countdown-main-container ul{padding:0;font-size:13px}#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-button-sale,div#ays-survey-countdown-main-container li{font-size:15px}div#ays-survey-countdown-main-container li span{font-size:25px}div#ays-survey-dicount-black-friday-month-main div.ays-survey-dicount-black-friday-wrap-text-box{position:unset}#ays-survey-countdown-main-container #ays-survey-countdown-headline{font-size:15px;font-weight:600}#ays-survey-countdown-main-container ul{font-weight:500}#ays-survey-countdown-main-container li span{font-size:20px}#ays-survey-dicount-black-friday-month-main .ays-button{margin:0 auto!important}div#ays-survey-dicount-black-friday-month-main.ays_survey_dicount_info.notice{background-position:bottom right;background-repeat:no-repeat;background-size:contain;display:flex;justify-content:center;background-image:linear-gradient(45deg,#1e101d,#c60af4)}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box.ays-buy-now-button-box{justify-content:center}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-wrap-box .ays-buy-now-button{font-size:14px;padding:5px 10px}div#ays-survey-dicount-black-friday-month-main .ays-survey-dicount-black-friday-button-buy-now{padding:10px 18px;font-size:15px}}@media all and (max-width:768px){#ays-survey-dicount-black-friday-month-main{display:none!important}}
                ';
            $content[] = '</style>';

            $content = implode( '', $content );

            echo $content;
        }
    }

    // Halloween Bundle 2025
    public function ays_survey_new_halloween_bundle_message_2025($ishmar){
        if($ishmar == 0 ){
            $content = array();

            $date = time() + (int) ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS);
            $now_date = date('M d, Y H:i:s', $date);

            $start_date = strtotime('2025-09-08 00:00:01');
            $end_date = strtotime('2025-11-07 23:59:59');
            $diff_end = $end_date - $date;

            $style_attr = '';
            if( $diff_end < 0 ){
                $style_attr = 'style="display:none;"';
            }

            $ays_survey_cta_button_link = esc_url('https://ays-pro.com/halloween-bundle?utm_source=dashboard&utm_medium=survey-free&utm_campaign=survey-halloween-banner-' . SURVEY_MAKER_VERSION);

            $content[] = '
                <div id="ays-survey-halloween-banner-2025-main" class="ays-survey-halloween-banner-2025-main ays_survey_dicount_info notice notice-success is-dismissible">
                    <div class="ays-survey-halloween-banner-2025-content">
                        <div class="ays-survey-halloween-banner-2025-left">
                            <div class="ays-survey-halloween-banner-2025-text">
                                <h2 class="ays-survey-halloween-banner-2025-title">Boo! Grab Your <a href="'. $ays_survey_cta_button_link .'" class="" target="_blank">Halloween Deal</a> <br/> Before It Vanishes!</h2>
                                <p class="ays-survey-halloween-banner-2025-subtitle">Don’t get spooked by missing out!<br/> Get 50% off our exclusive Halloween Bundle (Survey + SCCP + Poll Maker + Popup Box) while the magic lasts!</p>
                            </div>
                        </div>

                        <div class="ays-survey-halloween-banner-2025-center">';

                        $content[] = '<div id="ays-survey-halloween-banner-2025-countdown" class="ays-survey-halloween-banner-2025-countdown" ' . $style_attr . '>';
                            $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-timer">';
                                $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-item">';
                                    $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-value" id="ays-survey-halloween-banner-2025-days">00</div>';
                                    $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-label">' . __('days', 'survey-maker') . '</div>';
                                $content[] = '</div>';
                                $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-separator">:</div>';
                                $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-item">';
                                    $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-value" id="ays-survey-halloween-banner-2025-hours">00</div>';
                                    $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-label">' . __('hours', 'survey-maker') . '</div>';
                                $content[] = '</div>';
                                $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-separator">:</div>';
                                $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-item">';
                                    $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-value" id="ays-survey-halloween-banner-2025-minutes">00</div>';
                                    $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-label">' . __('minutes', 'survey-maker') . '</div>';
                                $content[] = '</div>';
                                $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-separator">:</div>';
                                $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-item">';
                                    $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-value" id="ays-survey-halloween-banner-2025-seconds">00</div>';
                                    $content[] = '<div class="ays-survey-halloween-banner-2025-countdown-label">' . __('seconds', 'survey-maker') . '</div>';
                                $content[] = '</div>';
                            $content[] = '</div>';
                        $content[] = '</div>';

                        $content[] = '</div>
                                                
                        <div class="ays-survey-halloween-banner-2025-right">
                            <div class="ays-survey-halloween-banner-2025-pumpkin">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_177_40)">
                                    <path d="M32.664 8.519C29.364 5.134 23.42 4.75 18 4.75C12.58 4.75 6.636 5.134 3.336 8.519C0.582 11.344 0 15.751 0 19.791C0 25.054 1.982 31.102 6.357 34.035C9.364 36.051 13.95 35.871 18 35.871C22.05 35.871 26.636 36.051 29.643 34.035C34.018 31.101 36 25.054 36 19.791C36 15.751 35.418 11.344 32.664 8.519Z" fill="#F4900C"/>
                                    <path d="M20.783 5.44401C20.852 5.86401 20.561 6.20801 20.136 6.20801H15.685C15.259 6.20801 14.968 5.86401 15.038 5.44401L15.783 0.972008C15.853 0.551008 16.259 0.208008 16.685 0.208008H19.136C19.562 0.208008 19.968 0.552008 20.037 0.972008L20.783 5.44401Z" fill="#3F7123"/>
                                    <path d="M20.6541 21.159L19.0561 18.563C18.7651 18.021 18.3831 17.75 17.9991 17.746C17.6161 17.75 17.2331 18.021 16.9421 18.563L15.3441 21.159C14.7571 22.252 16.2171 22.875 17.9981 22.875C19.7791 22.875 21.2411 22.251 20.6541 21.159ZM30.1621 24.351C30.1171 24.276 30.0361 24.23 29.9481 24.23H29.1071C29.0391 24.23 28.9731 24.258 28.9261 24.307L26.6951 26.641L23.9971 24.472C23.9461 24.431 23.8801 24.414 23.8121 24.419C23.7461 24.426 23.6851 24.46 23.6441 24.513L21.2361 27.575L18.1821 24.309C18.1691 24.295 18.1491 24.292 18.1341 24.281C18.1191 24.271 18.1091 24.254 18.0911 24.247C18.0851 24.245 18.0781 24.247 18.0721 24.245C18.0481 24.238 18.0251 24.24 18.0001 24.24C17.9751 24.24 17.9521 24.238 17.9281 24.246C17.9221 24.248 17.9151 24.245 17.9081 24.248C17.8901 24.255 17.8811 24.272 17.8651 24.282C17.8491 24.292 17.8301 24.295 17.8171 24.309L14.7641 27.575L12.3551 24.513C12.3141 24.46 12.2531 24.426 12.1871 24.419C12.1211 24.413 12.0541 24.431 12.0021 24.472L9.30411 26.641L7.07411 24.307C7.02711 24.258 6.96211 24.23 6.89311 24.23H6.05211C5.96511 24.23 5.88311 24.276 5.83811 24.351C5.79311 24.426 5.79011 24.519 5.83111 24.596L8.58511 29.815C8.61911 29.879 8.6781 29.925 8.7491 29.942C8.8201 29.959 8.8941 29.944 8.9521 29.902L10.9861 28.444L13.9901 32.077C14.0331 32.13 14.0961 32.162 14.1641 32.167L14.1831 32.168C14.2451 32.168 14.3041 32.146 14.3501 32.105L18.0001 28.836L21.6501 32.104C21.6961 32.145 21.7551 32.167 21.8171 32.167L21.8361 32.166C21.9041 32.161 21.9671 32.129 22.0101 32.076L25.0151 28.443L27.0491 29.901C27.1091 29.944 27.1821 29.961 27.2521 29.941C27.3221 29.924 27.3821 29.879 27.4151 29.815L30.1701 24.596C30.2101 24.519 30.2081 24.426 30.1621 24.351ZM27.9761 15.421C28.1051 17.548 27.1921 19.227 24.7711 19.374C22.3511 19.52 21.2421 17.963 21.1131 15.837C20.9841 13.711 22.3451 10.717 24.2401 10.603C26.1361 10.487 27.8481 13.294 27.9761 15.421ZM8.02411 15.421C7.89511 17.548 8.80811 19.227 11.2291 19.374C13.6491 19.52 14.7581 17.963 14.8871 15.837C15.0161 13.711 13.6551 10.717 11.7601 10.603C9.86511 10.489 8.15211 13.294 8.02411 15.421Z" fill="#642116"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_177_40">
                                    <rect width="36" height="36" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>



                            <div class="ays-survey-halloween-banner-2025-discount-section">
                                <div class="ays-survey-halloween-banner-2025-discount">50% OFF</div>
                                <div class="ays-survey-halloween-banner-2025-coupon-wrapper">
                                    <div class="ays-survey-halloween-banner-2025-coupon-box" onclick="aysSurveyHalloweenCopyToClipboard(\'HALLOWEEN25\')" title="Click to copy">
                                        <span class="ays-survey-halloween-banner-2025-coupon-text">HALLOWEEN25</span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="ays-survey-halloween-banner-2025-copy-icon">
                                            <path d="M13.5 2.5H6.5C5.67 2.5 5 3.17 5 4V10C5 10.83 5.67 11.5 6.5 11.5H13.5C14.33 11.5 15 10.83 15 10V4C15 3.17 14.33 2.5 13.5 2.5ZM13.5 10H6.5V4H13.5V10ZM2.5 6.5V12.5C2.5 13.33 3.17 14 4 14H10V12.5H4V6.5H2.5Z" fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                                <a href="'. $ays_survey_cta_button_link .'" class="ays-survey-halloween-banner-2025-upgrade" target="_blank">Buy Now</a>
                            </div>';

                            if( current_user_can( 'manage_options' ) ){
                                $content[] = '<div id="ays-survey-dismiss-buttons-content">';
                                    $content[] = '<form action="" method="POST" style="position: absolute; bottom: -5px; right: 0; color: #fff;">';
                                            $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn" style="color: darkgrey; font-size: 11px;">'. __( "Dismiss ad", 'survey-maker' ) .'</button>';
                                            $content[] = wp_nonce_field( SURVEY_MAKER_NAME . '-sale-banner' ,  SURVEY_MAKER_NAME . '-sale-banner' );
                                    $content[] = '</form>';
                                $content[] = '</div>';
                            }

                            $content[] = '
                        </div>
                    </div>
                </div>';

            $content[] = '<style id="ays-survey-progress-banner-styles-inline-css">';
            $content[] = '
                .ays-survey-halloween-banner-2025-main {
                    background: linear-gradient(135deg, #1A0F2E 100%, #2D1B4E 0%);
                    background-image: url("' . esc_attr( SURVEY_MAKER_ADMIN_URL ) . '/images/halloween-banner-background-image-remove.png"), linear-gradient(135deg, #2D1B4E 0%, #1A0F2E 100%);
                    background-position: left center, center;
                    background-repeat: no-repeat, no-repeat;
                    background-size: auto 100%, cover;
                    padding: 20px 30px 20px 130px;
                    border-radius: 12px;
                    color: white;
                    margin: 20px 0;
                    border: 0;
                    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
                    overflow: hidden;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-content {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 30px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-left {
                    display: flex;
                    align-items: center;
                    gap: 20px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-center {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex: 1;
                    max-width: 350px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-right {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    flex-shrink: 0;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-icon {
                    flex-shrink: 0;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-pumpkin svg {
                    display: inline !important;
                    border: none !important;
                    box-shadow: none !important;
                    height: 1em !important;
                    width: 1em !important;
                    margin: 0 0.07em !important;
                    vertical-align: -0.1em !important;
                    background: none !important;
                    padding: 0 !important;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-orb {
                    width: 80px;
                    height: 80px;
                    background: linear-gradient(135deg, #8B5CF6 0%, #6D28D9 100%);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow: 0 0 30px rgba(139, 92, 246, 0.6);
                    border: 3px solid rgba(168, 85, 247, 0.4);
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-question {
                    font-size: 48px;
                    font-weight: 700;
                    color: #E9D5FF;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-bat {
                    font-size: 20px;
                    opacity: 0.8;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-bat-1 {
                    margin-left: -100px;
                    margin-top: -40px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-bat-2 {
                    margin-left: -110px;
                    margin-top: 35px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-sparkle {
                    font-size: 12px;
                    opacity: 0.7;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-sparkle-1 {
                    margin-left: -95px;
                    margin-top: -60px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-sparkle-2 {
                    margin-left: -70px;
                    margin-top: -15px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-sparkle-3 {
                    margin-left: -120px;
                    margin-top: 10px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-text {
                    flex: 1;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-title {
                    font-size: 24px;
                    font-weight: 700;
                    margin: 0 0 8px 0;
                    line-height: 1.2;
                    color: #fff;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-title a {
                    color: #FB923C;
                    text-decoration: underline;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-subtitle {
                    font-size: 16px;
                    margin: 0;
                    opacity: 0.9;
                    font-weight: 400;
                    color: #E9D5FF;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-description {
                    font-size: 14px;
                    margin: 0;
                    opacity: 0.85;
                    line-height: 1.5;
                    color: #D8B4FE;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-pumpkin {
                    font-size: 64px;
                    filter: drop-shadow(0 0 20px rgba(251, 146, 60, 0.8));
                    flex-shrink: 0;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-discount-section {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: 10px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-discount {
                    font-size: 36px;
                    font-weight: 700;
                    color: #FB923C;
                    text-shadow: 0 0 20px rgba(251, 146, 60, 0.6);
                    margin: 0;
                    line-height: 1;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-coupon-wrapper {
                    display:none;
                    margin-bottom: 5px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-coupon-box {
                    border: 2px dashed rgba(255, 255, 255, 0.4);
                    padding: 6px 12px;
                    border-radius: 6px;
                    background: rgba(255, 255, 255, 0.1);
                    cursor: pointer;
                    transition: all 0.3s ease;
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    backdrop-filter: blur(10px);
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-coupon-box:hover {
                    background: rgba(255, 255, 255, 0.2);
                    border-color: rgba(255, 255, 255, 0.6);
                    transform: translateY(-1px);
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-coupon-text {
                    font-size: 14px;
                    font-weight: 700;
                    letter-spacing: 1px;
                    color: #fff;
                    font-family: monospace;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-copy-icon {
                    opacity: 0.8;
                    transition: opacity 0.3s ease;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-coupon-box:hover .ays-survey-halloween-banner-2025-copy-icon {
                    opacity: 1;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-upgrade {
                    background: linear-gradient(135deg, #FB923C 0%, #F97316 100%);
                    color: white;
                    border: none;
                    padding: 12px 28px;
                    border-radius: 8px;
                    font-size: 16px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 16px rgba(251, 146, 60, 0.5);
                    text-decoration: none;
                    display: inline-flex;
                    align-items: center;
                    text-align: center;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-upgrade:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 20px rgba(251, 146, 60, 0.7);
                    text-decoration: none;
                    color: white;
                }

                .ays-survey-halloween-banner-2025-main .notice-dismiss:before {
                    color: #fff;
                }

                .ays-survey-halloween-banner-2025-copy-notification {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background: rgba(0, 0, 0, 0.8);
                    color: white;
                    padding: 12px 24px;
                    border-radius: 8px;
                    font-size: 14px;
                    z-index: 10000;
                    opacity: 0;
                    transition: opacity 0.3s ease;
                }

                .ays-survey-halloween-banner-2025-copy-notification.show {
                    opacity: 1;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-countdown-timer {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 8px;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-countdown-item {
                    background: rgba(255, 255, 255, 0.15);
                    border-radius: 8px;
                    padding: 8px 12px;
                    min-width: 60px;
                    backdrop-filter: blur(10px);
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-countdown-value {
                    font-size: 24px;
                    font-weight: 700;
                    line-height: 1;
                    margin-bottom: 4px;
                    color: #fff;
                    text-align: center;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-countdown-label {
                    font-size: 11px;
                    opacity: 0.8;
                    text-transform: lowercase;
                    text-align: center;
                }

                .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-countdown-separator {
                    font-size: 24px;
                    font-weight: 700;
                    opacity: 0.6;
                    margin: 0 4px;
                }

                @media (min-width: 1200px) {
                    .ays-survey-halloween-banner-2025-main .wp-core-ui .notice.is-dismissible {
                        padding-right: 60px;
                    }
                }

                @media (max-width: 1200px) {

                    div.ays-survey-halloween-banner-2025-main {
                        padding: 20px 30px;
                    }

                    div.ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-pumpkin {
                        display: none;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-subtitle,
                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-title {
                        text-align: center;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-content {
                        flex-wrap: wrap;
                        gap: 20px;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-left {
                        width: 100%;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-center {
                        width: 100%;
                        max-width: 100%;
                        text-align: center;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-right {
                        width: 100%;
                        justify-content: center;
                    }
                }

                @media (max-width: 786px) {
                    #ays-survey-halloween-banner-2025-main {
                        display: none !important;
                    }
                }

                @media (max-width: 768px) {
                    .ays-survey-halloween-banner-2025-main {
                        padding: 15px 20px;
                        margin: 15px 0;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-title {
                        font-size: 20px;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-subtitle {
                        font-size: 14px;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-description {
                        font-size: 13px;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-pumpkin {
                        font-size: 48px;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-discount {
                        font-size: 28px;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-upgrade {
                        padding: 10px 20px;
                        font-size: 14px;
                    }
                }

                @media (max-width: 480px) {
                    .ays-survey-halloween-banner-2025-main {
                        padding: 12px 15px;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-orb {
                        width: 60px;
                        height: 60px;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-question {
                        font-size: 36px;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-title {
                        font-size: 18px;
                    }

                    .ays-survey-halloween-banner-2025-main .ays-survey-halloween-banner-2025-coupon-text {
                        font-size: 12px;
                    }
                }
            ';

            $content[] = '</style>';

            $content[] = '<script>';
            $content[] = "
                    function aysSurveyHalloweenCopyToClipboard(text) {
                        // Create a temporary textarea element
                        var textarea = document.createElement('textarea');
                        textarea.value = text;
                        textarea.style.position = 'fixed';
                        textarea.style.opacity = '0';
                        document.body.appendChild(textarea);
                        
                        // Select and copy the text
                        textarea.select();
                        textarea.setSelectionRange(0, 99999); // For mobile devices
                        
                        try {
                            document.execCommand('copy');
                            aysSurveyHalloweenShowCopyNotification('Coupon code copied!');
                        } catch (err) {
                            console.error('Failed to copy text: ', err);
                        }
                        
                        // Remove the temporary textarea
                        document.body.removeChild(textarea);
                    }

                    function aysSurveyHalloweenShowCopyNotification(message) {
                        // Check if notification already exists
                        var existingNotification = document.querySelector('.ays-survey-halloween-banner-2025-copy-notification');
                        if (existingNotification) {
                            document.body.removeChild(existingNotification);
                        }
                        
                        // Create notification element
                        var notification = document.createElement('div');
                        notification.className = 'ays-survey-halloween-banner-2025-copy-notification';
                        notification.textContent = message;
                        document.body.appendChild(notification);
                        
                        // Show notification with animation
                        setTimeout(function() {
                            notification.classList.add('show');
                        }, 10);
                        
                        // Hide and remove notification after 2 seconds
                        setTimeout(function() {
                            notification.classList.remove('show');
                            setTimeout(function() {
                                if (notification.parentNode) {
                                    document.body.removeChild(notification);
                                }
                            }, 300);
                        }, 2000);
                    }

                    (function() {
                        var endDate = new Date('". date('Y-m-d H:i:s', $end_date) ."').getTime();
                    
                        function updateCountdown() {
                            var now = new Date().getTime();
                            var distance = endDate - now;
                            
                            if (distance < 0) {
                                clearInterval(updateCountdown);
                                document.getElementById('ays-survey-halloween-banner-2025-progress-banner-countdown').style.display = 'none';
                                return;
                            }
                            
                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                            
                            function padZero(num) {
                                return num < 10 ? '0' + num : num;
                            }
                            
                            document.getElementById('ays-survey-halloween-banner-2025-days').textContent = padZero(days);
                            document.getElementById('ays-survey-halloween-banner-2025-hours').textContent = padZero(hours);
                            document.getElementById('ays-survey-halloween-banner-2025-minutes').textContent = padZero(minutes);
                            document.getElementById('ays-survey-halloween-banner-2025-seconds').textContent = padZero(seconds);
                        }
                        
                        updateCountdown();
                        setInterval(updateCountdown, 1000);
                    })()";
            $content[] = '</script>';

            $content = implode( '', $content );
            echo ($content);
        }
    }
    
    // Fox LMS Pro Banner
    public function ays_survey_discounted_licenses_banner_message($ishmar){
        if($ishmar == 0 ){
            $content = array();

            $date = time() + (int) ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS);
            $now_date = date('M d, Y H:i:s', $date);

            $start_date = strtotime('2025-09-21');
            $end_date = strtotime('2025-10-21');
            $diff_end = $end_date - $date;

            $style_attr = '';
            if( $diff_end < 0 ){
                $style_attr = 'style="display:none;"';
            }

            $total_licenses = 50;
            $progression_pattern = array(3, 2, 1, 4, 2, 3, 1, 2, 4, 3, 2, 1, 3, 2, 4, 1, 3, 2, 2, 3, 1, 2);
            $days_passed = floor(($date - $start_date) / (24 * 60 * 60));
            $used_licenses = 0;

            for ($i = 0; $i < min($days_passed, count($progression_pattern)); $i++) {
                $used_licenses += $progression_pattern[$i];
            }
            $used_licenses = min($used_licenses, $total_licenses);
            $remaining_licenses = $total_licenses - $used_licenses;
            $progress_percentage = ($used_licenses / $total_licenses) * 100;

            $ays_survey_cta_button_link = esc_url('https://ays-pro.com/wordpress/survey-maker?utm_source=dashboard&utm_medium=survey-free&utm_campaign=survey-maker-license-banner-' . SURVEY_MAKER_VERSION);

            $content[] = '<div id="ays-survey-progress-banner-main" class="ays-survey-progress-banner-main ays_survey_dicount_info ays-survey-admin-notice notice notice-success is-dismissible" ' . $style_attr . '>';
                $content[] = '<div class="ays-survey-progress-banner-content">';
                    $content[] = '<div class="ays-survey-progress-banner-left">';
                        $content[] = '<div class="ays-survey-progress-banner-icon">';
                            $content[] = '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.33325 22.6668L11.9999 13.3335L33.3333 14.6668L34.6666 36.0002L25.3333 46.6668C25.3333 46.6668 25.3346 38.6682 17.3333 30.6668C9.33192 22.6655 1.33325 22.6668 1.33325 22.6668Z" fill="#A0041E"/>
                                            <path d="M1.29739 46.6665C1.29739 46.6665 1.24939 36.0278 5.27739 31.9998C9.30539 27.9718 20.0001 28.2492 20.0001 28.2492C20.0001 28.2492 19.9987 38.6665 15.9987 42.6665C11.9987 46.6665 1.29739 46.6665 1.29739 46.6665Z" fill="#FFAC33"/>
                                            <path d="M11.9986 41.3332C14.9441 41.3332 17.3319 38.9454 17.3319 35.9998C17.3319 33.0543 14.9441 30.6665 11.9986 30.6665C9.0531 30.6665 6.66528 33.0543 6.66528 35.9998C6.66528 38.9454 9.0531 41.3332 11.9986 41.3332Z" fill="#FFCC4D"/>
                                            <path d="M47.9986 0C47.9986 0 34.6653 0 18.6653 13.3333C10.6653 20 10.6653 32 13.3319 34.6667C15.9986 37.3333 27.9986 37.3333 34.6653 29.3333C47.9986 13.3333 47.9986 0 47.9986 0Z" fill="#55ACEE"/>
                                            <path d="M35.9987 6.6665C33.8347 6.6665 31.9814 7.96117 31.144 9.81317C31.8134 9.5105 32.5507 9.33317 33.332 9.33317C36.2774 9.33317 38.6654 11.7212 38.6654 14.6665C38.6654 15.4478 38.488 16.1852 38.1867 16.8532C40.0387 16.0172 41.332 14.1638 41.332 11.9998C41.332 9.0545 38.944 6.6665 35.9987 6.6665Z" fill="black"/>
                                            <path d="M10.6667 37.3332C10.6667 37.3332 10.6667 31.9998 12.0001 30.6665C13.3334 29.3332 29.3347 16.0012 30.6667 17.3332C31.9987 18.6652 18.6654 34.6665 17.3321 35.9998C15.9987 37.3332 10.6667 37.3332 10.6667 37.3332Z" fill="#A0041E"/>
                                            </svg>';
                        $content[] = '</div>';
                        $content[] = '<div class="ays-survey-progress-banner-text">';
                            $content[] = '<h2 class="ays-survey-progress-banner-title">' . sprintf( __('Get the Pro Version of %s Survey Maker%s – 20%% OFF', 'survey-maker'), '<a href="'. $ays_survey_cta_button_link .'" target="_blank">', '</a>' ) . '</h2>';
                            $content[] = '<p class="ays-survey-progress-banner-subtitle">' . __('Unlock advanced features + 30 day Money Back Guarantee', 'survey-maker') . '</p>';
                        $content[] = '</div>';
                    $content[] = '</div>';
                    
                    $content[] = '<div class="ays-survey-progress-banner-center">';
                        $content[] = '<div class="ays-survey-progress-banner-coupon">';
                            $content[] = '<div class="ays-survey-progress-banner-coupon-box" onclick="surveyCopyToClipboard(\'FREE2PRO20\')" title="' . __('Click to copy', 'survey-maker') . '">';
                                $content[] = '<span class="ays-survey-progress-banner-coupon-text">FREE2PRO20</span>';
                                $content[] = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="ays-survey-progress-banner-copy-icon">';
                                    $content[] = '<path d="M13.5 2.5H6.5C5.67 2.5 5 3.17 5 4V10C5 10.83 5.67 11.5 6.5 11.5H13.5C14.33 11.5 15 10.83 15 10V4C15 3.17 14.33 2.5 13.5 2.5ZM13.5 10H6.5V4H13.5V10ZM2.5 6.5V12.5C2.5 13.33 3.17 14 4 14H10V12.5H4V6.5H2.5Z" fill="white"/>';
                                $content[] = '</svg>';
                            $content[] = '</div>';
                        $content[] = '</div>';
                        
                        $content[] = '<div class="ays-survey-progress-banner-progress">';
                            $content[] = '<p class="ays-survey-progress-banner-progress-text">' . __('Only', 'survey-maker') . ' <span id="remaining-licenses">' . $remaining_licenses . '</span> ' . __('of 50 discounted licenses left', 'survey-maker') . '</p>';
                            $content[] = '<div class="ays-survey-progress-banner-progress-bar">';
                                $content[] = '<div class="ays-survey-progress-banner-progress-fill" id="progress-fill" style="width: ' . $progress_percentage . '%;"></div>';
                            $content[] = '</div>';
                        $content[] = '</div>';
                    $content[] = '</div>';
                    
                    $content[] = '<div class="ays-survey-progress-banner-right">';
                        $content[] = '<a href="'. $ays_survey_cta_button_link .'" class="ays-survey-progress-banner-upgrade" target="_blank">';
                        $content[] = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">';
                            $content[] = '<path d="M14.6392 6.956C14.5743 6.78222 14.4081 6.66667 14.2223 6.66667H8.85565L11.9512 0.648C12.0485 0.458667 11.9983 0.227111 11.8308 0.0955556C11.7499 0.0315556 11.6525 0 11.5556 0C11.4521 0 11.3485 0.0364444 11.2654 0.108L8.00009 2.928L1.48765 8.55244C1.3472 8.67378 1.29653 8.86978 1.36142 9.04356C1.42631 9.21733 1.59209 9.33333 1.77787 9.33333H7.14454L4.04898 15.352C3.95165 15.5413 4.00187 15.7729 4.16942 15.9044C4.25031 15.9684 4.34765 16 4.44453 16C4.54809 16 4.65165 15.9636 4.73476 15.892L8.00009 13.072L14.5125 7.44756C14.6534 7.32622 14.7036 7.13022 14.6392 6.956Z" fill="white"/>';
                        $content[] = '</svg>';
                         $content[] = ' ' . __('Upgrade Now', 'survey-maker');
                        $content[] = '</a>';
                    $content[] = '</div>';
                $content[] = '</div>';
                
                if( current_user_can( 'manage_options' ) ){
                $content[] = '<div id="ays-survey-dismiss-buttons-content">';
                    $content[] = '<form action="" method="POST" style="position: absolute; bottom: 0; right: 0; color: #fff;">';
                            $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn" style="color: darkgrey; font-size: 11px;">'. __( "Dismiss ad", 'survey-maker' ) .'</button>';
                            $content[] = wp_nonce_field( SURVEY_MAKER_NAME . '-sale-banner' ,  SURVEY_MAKER_NAME . '-sale-banner' );
                    $content[] = '</form>';
                $content[] = '</div>';
                }
            $content[] = '</div>';

            // Fox LMS Pro Banner Styles
            $content[] = '<style id="ays-survey-progress-banner-styles-inline-css">';
            $content[] = '
                .ays-survey-progress-banner-main {
                    background: linear-gradient(135deg, #6344ED 0%, #8C2ABE 100%);
                    padding: 20px 30px;
                    border-radius: 16px;
                    color: white;
                    position: relative;
                    margin: 20px 0;
                    box-shadow: 0 8px 32px rgba(99, 68, 237, 0.3);
                    border: 0;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-content {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 30px;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-left {
                    display: flex;
                    align-items: center;
                    gap: 20px;
                    flex: 1;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-center {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    flex: 1;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-right {
                    display: flex;
                    align-items: center;
                    gap: 20px;
                    flex-shrink: 0;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-icon {
                    font-size: 32px;
                    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.2));
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-title {
                    font-size: 21px;
                    font-weight: 700;
                    margin: 0 0 8px 0;
                    line-height: 1.2;
                    color: #fff;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-title a {
                    text-decoration: underline;
                    color: #fff;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-subtitle {
                    font-size: 16px;
                    margin: 0;
                    opacity: 0.9;
                    font-weight: 400;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-coupon {
                    margin-bottom: 5px;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-coupon-box {
                    border: 2px dotted rgba(255, 255, 255, 0.6);
                    padding: 8px 16px;
                    border-radius: 8px;
                    background: rgba(255, 255, 255, 0.1);
                    cursor: pointer;
                    transition: all 0.3s ease;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    backdrop-filter: blur(10px);
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-coupon-box:hover {
                    background: rgba(255, 255, 255, 0.2);
                    border-color: rgba(255, 255, 255, 0.8);
                    transform: translateY(-1px);
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-coupon-text {
                    font-size: 16px;
                    font-weight: 700;
                    letter-spacing: 1px;
                    color: #fff;
                    font-family: monospace;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-copy-icon {
                    opacity: 0.8;
                    transition: opacity 0.3s ease;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-coupon-box:hover .ays-survey-progress-banner-copy-icon {
                    opacity: 1;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-progress {
                    text-align: center;
                    width: 100%;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-progress-text {
                    font-size: 14px;
                    margin: 0 0 10px 0;
                    opacity: 0.9;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-progress-bar {
                    width: 300px;
                    height: 10px;
                    background: rgba(255, 255, 255, 0.2);
                    border-radius: 4px;
                    overflow: hidden;
                    margin: 0 auto;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-progress-fill {
                    height: 100%;
                    background: linear-gradient(90deg, #4ADE80 0%, #22C55E 100%);
                    border-radius: 4px;
                    transition: width 0.8s ease;
                    width: 70%;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-upgrade {
                    background: linear-gradient(135deg, #F59E0B 0%, #F97316 100%);
                    color: white;
                    border: none;
                    padding: 12px 24px;
                    border-radius: 8px;
                    font-size: 16px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 16px rgba(245, 158, 11, 0.4);
                    text-decoration: none;
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                }

                .ays-survey-progress-banner-main .ays-survey-progress-banner-upgrade:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.6);
                    text-decoration: none;
                    color: white;
                }

                .ays-survey-progress-banner-main .notice-dismiss:before {
                    color: #fff;
                }

                /* Copy notification */
                .ays-survey-copy-notification {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background: rgba(0, 0, 0, 0.8);
                    color: white;
                    padding: 12px 24px;
                    border-radius: 8px;
                    font-size: 14px;
                    z-index: 10000;
                    opacity: 0;
                    transition: opacity 0.3s ease;
                }

                .ays-survey-copy-notification.show {
                    opacity: 1;
                }

                @media (max-width: 1400px) {
                    .ays-survey-progress-banner-main .ays-survey-progress-banner-center {
                        flex-direction: column;
                    }
                }

                @media (max-width: 1200px) {
                    .ays-survey-progress-banner-main .ays-survey-progress-banner-content {
                        flex-direction: column;
                        gap: 20px;
                    }

                    .ays-survey-progress-banner-main .ays-survey-progress-banner-left {
                        width: 100%;
                        justify-content: center;
                        text-align: center;
                        flex-direction: column;
                    }

                    .ays-survey-progress-banner-main .ays-survey-progress-banner-center {
                        width: 100%;
                    }

                    .ays-survey-progress-banner-main .ays-survey-progress-banner-right {
                        width: 100%;
                        justify-content: center;
                    }
                }

                @media (max-width: 768px) {
                    #ays-survey-progress-banner-main {
                        display: none !important;
                    }

                    .ays-survey-progress-banner-main {
                        padding: 15px 20px;
                        margin: 15px 0;
                    }
                    
                    .ays-survey-progress-banner-main .ays-survey-progress-banner-title {
                        font-size: 18px;
                    }
                    
                    .ays-survey-progress-banner-main .ays-survey-progress-banner-subtitle {
                        font-size: 14px;
                    }
                    
                    .ays-survey-progress-banner-main .ays-survey-progress-banner-progress-bar {
                        width: 100%;
                        max-width: 280px;
                    }
                    
                    .ays-survey-progress-banner-main .ays-survey-progress-banner-upgrade {
                        padding: 10px 20px;
                        font-size: 14px;
                    }
                }

                @media (max-width: 480px) {
                    .ays-survey-progress-banner-main {
                        padding: 12px 15px;
                    }
                    
                    .ays-survey-progress-banner-main .ays-survey-progress-banner-coupon-text {
                        font-size: 14px;
                    }
                    
                    .ays-survey-progress-banner-main .ays-survey-progress-banner-progress-bar {
                        max-width: 250px;
                    }
                }
            ';

            $content[] = '</style>';

            $content = implode( '', $content );
            echo ($content);
        }
    }
        
    public function ays_survey_new_mega_bundle_message($ishmar){
        if($ishmar == 0 ){
            $content = array();
            $content[] = '<div id="ays-survey-new-mega-bundle-dicount-month-main" class="ays-survey-admin-notice notice notice-success is-dismissible ays_survey_dicount_info">';
                $content[] = '<div id="ays-survey-dicount-month" class="ays_survey_dicount_month">';

                    $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-text-box">';

                        $content[] = '<div class="ays-survey-dicount-wrap-text-box-texts">';
                            $content[] = '<div>
                                            <a href="https://ays-pro.com/mega-bundle?utm_source=survey-maker-free&utm_medium=dashboard&utm_campaign=survey-mega-bundle-'.SURVEY_MAKER_VERSION.'" target="_blank" style="color:#ffffff; text-decoration: underline;">Mega Bundle </a> (Quiz + Survey + Poll)
                                          </div>
                                          <div style="position: relative;">
                                            <span class="ays-survey-sale-baner-mega-bundle-sale-text">50%</span>
                                            <img style="position: absolute;top: 30px;left: 0;" src="' . esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/icons/line.webp">
                                          </div>';
                        $content[] = '</div>';

                        $content[] = '<div style="font-size: 17px; display: flex; align-items: center; margin-top: 10px;">';
                            $content[] = '<img style="width: 30px;height: 25px;" src="' . esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/icons/guaranteeicon.webp">';
                            $content[] = '<span style="padding-left: 8px"> 30 Day Money Back Guarantee</span>';
                            
                        $content[] = '</div>';

                       

                        $content[] = '<div style="position: absolute;right: 10px;bottom: 1px;" class="ays-survey-dismiss-buttons-container-for-form">';

                            $content[] = '<form action="" method="POST">';
                                $content[] = '<div id="ays-survey-dismiss-buttons-content">';
                                    if( current_user_can( 'manage_options' ) ){
                                        $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn" style="height: 32px; margin-left: 0;padding-left: 0">Dismiss ad</button>';
                                        $content[] = wp_nonce_field( $this->plugin_name . '-sale-banner' ,  $this->plugin_name . '-sale-banner' );
                                    }
                                $content[] = '</div>';
                            $content[] = '</form>';
                            
                        $content[] = '</div>';

                    $content[] = '</div>';

                    $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-countdown-box">';

                        $content[] = '<div id="ays-survey-maker-countdown-main-container">';
                            $content[] = '<div class="ays-survey-maker-countdown-container">';

                                $content[] = '<div id="ays-survey-countdown">';

                                    // $content[] = '<div>';
                                    //     $content[] = __( "Offer ends in:", "survey-maker" );
                                    // $content[] = '</div>';

                                    $content[] = '<ul>';
                                        $content[] = '<li><span id="ays-survey-countdown-days"></span>days</li>';
                                        $content[] = '<li><span id="ays-survey-countdown-hours"></span>Hours</li>';
                                        $content[] = '<li><span id="ays-survey-countdown-minutes"></span>Minutes</li>';
                                        $content[] = '<li><span id="ays-survey-countdown-seconds"></span>Seconds</li>';
                                    $content[] = '</ul>';
                                $content[] = '</div>';

                                $content[] = '<div id="ays-survey-countdown-content" class="emoji">';
                                    $content[] = '<span>🚀</span>';
                                    $content[] = '<span>⌛</span>';
                                    $content[] = '<span>🔥</span>';
                                    $content[] = '<span>💣</span>';
                                $content[] = '</div>';

                            $content[] = '</div>';
                        $content[] = '</div>';
                            
                    $content[] = '</div>';

                    $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-button-box">';
                        $content[] = '<a href="https://ays-pro.com/mega-bundle?utm_source=survey-maker-free&utm_medium=dashboard&utm_campaign=survey-mega-bundle-'.SURVEY_MAKER_VERSION.'" class="button button-primary ays-button" id="ays-button-top-buy-now" target="_blank">' . __( 'Buy Now !', "survey-maker" ) . '</a>';
                        $content[] = '<span >One-time payment</span>';
                    $content[] = '</div>';
                $content[] = '</div>';
            $content[] = '</div>';

            $new_mega_bundle_logo_background = SURVEY_MAKER_ADMIN_URL . '/images/new-mega-bundle-logo-background.svg';
        
            $content[] = '<style id="ays-survey-new-mega-bundle-styles-inline-css">';
                $content[] = '#ays-survey-maker-countdown-main-container li span,#ays-survey-new-mega-bundle-dicount-month-main #ays-button-top-buy-now,#ays-survey-new-mega-bundle-dicount-month-main #ays-survey-dismiss-buttons-content,#ays-survey-new-mega-bundle-dicount-month-main .ays-buy-now-opacity-button,#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-buy-now-button-box,#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-button-box,#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-countdown-box,#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-sale-banner-link,#ays-survey-new-mega-bundle-dicount-month-main .ays_survey_dicount_month,div#ays-survey-new-mega-bundle-dicount-month-main.ays_survey_dicount_info button{display:flex;display:flex;display:flex;display:flex}div#ays-survey-new-mega-bundle-dicount-month-main{border:0;background:#fff;border-radius:20px;box-shadow:unset;position:relative;z-index:1;min-height:80px}div#ays-survey-new-mega-bundle-dicount-month-main.ays_survey_dicount_info button{align-items:center}div#ays-survey-new-mega-bundle-dicount-month-main div#ays-survey-dicount-month a.ays-survey-sale-banner-link:focus{outline:0;box-shadow:0}div#ays-survey-new-mega-bundle-dicount-month-main .btn-link{color:#007bff;background-color:transparent;display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;line-height:1.5;border-radius:.25rem}div#ays-survey-new-mega-bundle-dicount-month-main.ays_survey_dicount_info{background-image:url("'.$new_mega_bundle_logo_background.'");background-position:center;background-repeat:no-repeat;background-size:cover;background-color:#5551ff}#ays-survey-new-mega-bundle-dicount-month-main .ays_survey_dicount_month{align-items:center;justify-content:space-between;color:#fff}#ays-survey-new-mega-bundle-dicount-month-main .ays_survey_dicount_month img{width:80px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-sale-banner-link{justify-content:center;align-items:center;width:200px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box{font-size:14px;padding:12px;text-align:center}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box{text-align:left;width:400px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-countdown-box{width:40%;justify-content:flex-start;align-items:center}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-button-box{justify-content:center;align-items:center;flex-direction:column}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-button-box span{font-size:10px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-survey-dicount-wrap-text-box-texts{font-size:17px;font-weight:700;letter-spacing:.8px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-color{color:#971821}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-text-decoration{text-decoration:underline}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-buy-now-button-box{justify-content:flex-end;align-items:center;width:30%}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-button,#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-buy-now-button{align-items:center;font-weight:500}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-buy-now-button{background:#971821;border-color:#fff;display:flex;justify-content:center;align-items:center;padding:5px 15px;font-size:16px;border-radius:5px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-buy-now-button:hover{background:#7d161d;border-color:#971821}#ays-survey-new-mega-bundle-dicount-month-main #ays-survey-dismiss-buttons-content{justify-content:center}#ays-survey-new-mega-bundle-dicount-month-main #ays-survey-dismiss-buttons-content .ays-button{margin:0!important;font-size:13px;color:#fff}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-opacity-box{width:19%}#ays-survey-new-mega-bundle-dicount-month-main .ays-buy-now-opacity-button{padding:40px 15px;justify-content:center;align-items:center;opacity:0}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box li{position:relative}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box li span:after{content:":";color:#fff;position:absolute;top:10px;right:-5px;font-size:40px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box li span#ays-survey-countdown-seconds:after{content:unset}#ays-survey-new-mega-bundle-dicount-month-main #ays-button-top-buy-now{align-items:center;border-radius:6.409px;background:#f66123;padding:12px 32px;color:#fff;font-size:12.818px;font-style:normal;font-weight:800;line-height:normal}#ays-survey-maker-countdown-main-container li,#ays-survey-maker-countdown-main-container ul,#ays-survey-new-mega-bundle-dicount-month-main .button.ays-button{margin:0}div#ays-survey-new-mega-bundle-dicount-month-main button.notice-dismiss:before{color:#fff}@media all and (max-width:1024px){#ays-survey-new-mega-bundle-dicount-month-main{display:none!important}}@media all and (max-width:768px){div#ays-survey-new-mega-bundle-dicount-month-main.ays_survey_dicount_info.notice{display:none!important;background-position:center;background-repeat:no-repeat;background-size:cover}div#ays-survey-new-mega-bundle-dicount-month-main{padding-right:0}div#ays-survey-new-mega-bundle-dicount-month-main .ays_survey_dicount_month{display:flex;align-items:center;justify-content:space-between;align-content:center;flex-wrap:wrap;flex-direction:column;padding:10px 0}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box,div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-text-box{width:100%;text-align:center}#ays-survey-maker-countdown-main-container #ays-survey-countdown-headline{font-size:15px;font-weight:600}#ays-survey-maker-countdown-main-container ul{font-weight:500}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-countdown-box{width:100%;display:flex;justify-content:center;align-items:center}#ays-survey-new-mega-bundle-dicount-month-main .ays-button{margin:0 auto!important}#ays-survey-new-mega-bundle-dicount-month-main #ays-survey-dismiss-buttons-content .ays-button{padding-left:unset!important}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-buy-now-button-box{justify-content:center}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-buy-now-button{font-size:14px;padding:5px 10px}div#ays-survey-new-mega-bundle-dicount-month-main .ays-buy-now-opacity-button{display:none}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dismiss-buttons-container-for-form{position:static!important}.comparison .product img{width:70px}.comparison a.price-buy{padding:5px 10px;font-size:11px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-survey-dicount-wrap-text-box-texts{height:64px}#ays-survey-maker-countdown-main-container .ays-survey-maker-countdown-container #ays-survey-countdown>ul{display:flex;justify-content:center;align-items:center}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box li span:after{top:unset}#ays-survey-maker-countdown-main-container li{font-size:12px;padding:12px}#ays-survey-maker-countdown-main-container li span{font-size:26px;min-height:50px;min-width:50px}#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box.ays-survey-dicount-wrap-button-box{width:100%}}@media screen and (max-width:1305px) and (min-width:768px){div#ays-survey-new-mega-bundle-dicount-month-main.ays_survey_dicount_info.notice{background-position:bottom right;background-repeat:no-repeat;background-size:cover}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-survey-dicount-wrap-text-box-texts{font-size:15px}#ays-survey-maker-countdown-main-container li{font-size:11px}div#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-opacity-box{display:none}}@media screen and (max-width:436px){#ays-survey-new-mega-bundle-dicount-month-main .ays-survey-dicount-wrap-box .ays-survey-dicount-wrap-text-box-texts{height:110px;margin-bottom:25px}}#ays-survey-maker-countdown-main-container .ays-survey-maker-countdown-container{color:#fff;margin:0 auto;text-align:center}#ays-survey-maker-countdown-main-container li span{justify-content:center;align-items:center;background:#9896ed;justify-content:center;align-items:center;font-size:23px;height:56px;width:53px;border-radius:8px;border:.534px solid #f4f4f4;color:#fff}#ays-survey-maker-countdown-main-container #ays-survey-countdown-headline{letter-spacing:.125rem;text-transform:uppercase;font-size:18px;font-weight:400;margin:0;padding:9px 0 4px;line-height:1.3}#ays-survey-maker-countdown-main-container li{display:inline-block;font-size:14px;list-style-type:none;padding:14px;text-transform:capitalize;text-align:center;margin:auto}#ays-survey-maker-countdown-main-container .emoji{display:none;padding:1rem}#ays-survey-maker-countdown-main-container .emoji span{font-size:30px;padding:0 .5rem} .ays-survey-dicount-wrap-text-box-texts{font-size:17px;letter-spacing:.8px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-wrap:wrap}.ays-survey-sale-baner-mega-bundle-sale-text{font-size:23px;padding-left:5px;text-shadow:2px 1.3px 0 #f66123;-webkit-text-stroke-width:1px;-webkit-text-stroke-color:#4944FF;-moz-text-stroke-width:1px;-moz-text-stroke-color:#4944FF}';
            $content[] = '</style>';


            $content = implode( '', $content );
            echo html_entity_decode(esc_html( $content ));
        }        
    }

            
    // public function ays_survey_new_mega_bundle_message_2024($ishmar){
    //     if($ishmar == 0 ){
    //         $content = array();
    //         $content[] = '<div id="ays-survey-new-mega-bundle-dicount-month-main-2024" class="notice notice-success is-dismissible ays_survey_dicount_info">';
    //             $content[] = '<div id="ays-survey-dicount-month" class="ays_survey_dicount_month">';

    //                 $content[] = '<div class="ays-survey-discount-box-sale-image"></div>';
    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-text-box">';

    //                     $content[] = '<div class="ays-survey-dicount-wrap-text-box-texts">';
    //                         $content[] = '<div>
    //                                         <a href="https://ays-pro.com/mega-bundle?utm_source=survey-maker-free&utm_medium=dashboard&utm_campaign=survey-mega-bundle" target="_blank" style="color:#30499B;">
    //                                         <span class="ays-survey-new-mega-bundle-limited-text">Limited</span> Offer for Mega bundle </a> <br> 
                                            
    //                                         <span style="font-size: 19px ;">(Quiz + Survey + Poll)</span>
    //                                       </div>';
    //                     $content[] = '</div>';

    //                     $content[] = '<div style="font-size: 17px;">';
    //                         $content[] = '<img style="width: 24px;height: 24px;" src="' . esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/icons/guarantee-new.png">';
    //                         $content[] = '<span style="padding-left: 4px; font-size: 14px; font-weight: 600;"> 30 Day Money Back Guarantee</span>';
                            
    //                     $content[] = '</div>';

                       

    //                     $content[] = '<div style="position: absolute;right: 10px;bottom: 1px;" class="ays-survey-dismiss-buttons-container-for-form">';

    //                         $content[] = '<form action="" method="POST">';
    //                             $content[] = '<div id="ays-survey-dismiss-buttons-content">';
    //                                 if( current_user_can( 'manage_options' ) ){
    //                                     $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn" style="height: 32px; margin-left: 0;padding-left: 0; color: #30499B;
    //                                     ">Dismiss ad</button>';
    //                                     $content[] = wp_nonce_field( $this->plugin_name . '-sale-banner' ,  $this->plugin_name . '-sale-banner' );
    //                                 }
    //                             $content[] = '</div>';
    //                         $content[] = '</form>';
                            
    //                     $content[] = '</div>';

    //                 $content[] = '</div>';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-countdown-box">';

    //                     $content[] = '<div id="ays-survey-maker-countdown-main-container">';
    //                         $content[] = '<div class="ays-survey-maker-countdown-container">';

    //                             $content[] = '<div id="ays-survey-countdown">';

    //                                 $content[] = '<div style="font-weight: 500;">';
    //                                     $content[] = __( "Offer ends in:", "survey-maker" );
    //                                 $content[] = '</div>';

    //                                 $content[] = '<ul>';
    //                                     $content[] = '<li><span id="ays-survey-countdown-days"></span>days</li>';
    //                                     $content[] = '<li><span id="ays-survey-countdown-hours"></span>Hours</li>';
    //                                     $content[] = '<li><span id="ays-survey-countdown-minutes"></span>Minutes</li>';
    //                                     $content[] = '<li><span id="ays-survey-countdown-seconds"></span>Seconds</li>';
    //                                 $content[] = '</ul>';
    //                             $content[] = '</div>';

    //                             $content[] = '<div id="ays-survey-countdown-content" class="emoji">';
    //                                 $content[] = '<span>🚀</span>';
    //                                 $content[] = '<span>⌛</span>';
    //                                 $content[] = '<span>🔥</span>';
    //                                 $content[] = '<span>💣</span>';
    //                             $content[] = '</div>';

    //                         $content[] = '</div>';
    //                     $content[] = '</div>';
                            
    //                 $content[] = '</div>';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-button-box">';
    //                     $content[] = '<a href="https://ays-pro.com/mega-bundle?utm_source=survey-maker-free&utm_medium=dashboard&utm_campaign=survey-mega-bundle" class="button button-primary ays-button" id="ays-button-top-buy-now" target="_blank">' . __( 'Buy Now !', "survey-maker" ) . '</a>';
    //                     $content[] = '<span >One-time payment</span>';
    //                 $content[] = '</div>';
    //             $content[] = '</div>';
    //         $content[] = '</div>';

    //         $content = implode( '', $content );
    //         echo html_entity_decode(esc_html( $content ));
    //     }        
    // }

    // // Black Friday 2024
    // public function ays_survey_black_friday_message_2024($ishmar){
    //     if($ishmar == 0 ){
    //         $content = array();

    //         $content[] = '<div id="ays-survey-black-friday-bundle-dicount-month-main" class="notice notice-success is-dismissible ays_survey_dicount_info">';
    //             $content[] = '<div id="ays-survey-dicount-month" class="ays_survey_dicount_month">';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-countdown-box">';

    //                     $content[] = '<div id="ays-survey-maker-countdown-main-container">';
    //                         $content[] = '<div class="ays-survey-maker-countdown-container">';

    //                                 $content[] = '<div id="ays-survey-countdown">';

    //                                     $content[] = '<div>';
    //                                         $content[] = __( "Offer ends in:", "survey-maker" );
    //                                     $content[] = '</div>';

    //                                     $content[] = '<ul>';
    //                                         $content[] = '<li><span id="ays-survey-countdown-days"></span>'. __( "Days", "survey-maker" ) .'</li>';
    //                                         $content[] = '<li><span id="ays-survey-countdown-hours"></span>'. __( "Hours", "survey-maker" ) .'</li>';
    //                                         $content[] = '<li><span id="ays-survey-countdown-minutes"></span>'. __( "Minutes", "survey-maker" ) .'</li>';
    //                                         $content[] = '<li><span id="ays-survey-countdown-seconds"></span>'. __( "Seconds", "survey-maker" ) .'</li>';
    //                                     $content[] = '</ul>';
    //                                 $content[] = '</div>';

    //                                 $content[] = '<div id="ays-survey-countdown-content" class="emoji">';
    //                                     $content[] = '<span>🚀</span>';
    //                                     $content[] = '<span>⌛</span>';
    //                                     $content[] = '<span>🔥</span>';
    //                                     $content[] = '<span>💣</span>';
    //                                 $content[] = '</div>';

    //                         $content[] = '</div>';
    //                     $content[] = '</div>';
                            
    //                 $content[] = '</div>';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-text-box">';
    //                     $content[] = '<div>';

    //                             $content[] = '<span class="ays-survey-black-friday-bundle-title">';
    //                                 $content[] = __( "<span><a href='https://ays-pro.com/mega-bundle?utm_source=dashboard&utm_medium=survey-free&utm_campaign=black-friday-mega-bundle-sale-banner' class='ays-survey-black-friday-bundle-title-link' target='_blank'>Black Friday Sale</a></span>", "survey-maker" );
    //                             $content[] = '</span>';

    //                             $content[] = '</br>';

    //                             $content[] = '<span class="ays-survey-black-friday-bundle-desc">';
    //                                 $content[] = '<a class="ays-survey-black-friday-bundle-desc" href="https://ays-pro.com/mega-bundle?utm_source=dashboard&utm_medium=survey-free&utm_campaign=black-friday-mega-bundle-sale-banner" class="ays-survey-black-friday-bundle-title-link" target="_blank">';
    //                                     $content[] = __( "50% OFF", "survey-maker" );
    //                                 $content[] = '</a>';
    //                             $content[] = '</span>';
    //                         $content[] = '</div>';

    //                         $content[] = '<div style="position: absolute;right: 10px;bottom: 1px;" class="ays-survey-dismiss-buttons-container-for-form">';

    //                             $content[] = '<form action="" method="POST">';
    //                                 $content[] = '<div id="ays-survey-dismiss-buttons-content">';
    //                                 if( current_user_can( 'manage_options' ) ){
    //                                     $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_bf_btn" style="height: 32px; margin-left: 0;padding-left: 0">'. __( "Dismiss ad", "survey-maker" ) .'</button>';
    //                                     $content[] = wp_nonce_field( 'survey-maker-sale-bf-banner' ,  'survey-maker-sale-bf-banner' );
    //                                 }
    //                                 $content[] = '</div>';
    //                             $content[] = '</form>';
                                
    //                         $content[] = '</div>';

    //                 $content[] = '</div>';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-black-friday-bundle-coupon-text-box">';
    //                     // $content[] = '<div class="ays-survey-black-friday-bundle-coupon-row">';
    //                     //     $content[] = 'bfdeal20off';
    //                     // $content[] = '</div>';

    //                     $content[] = '<div class="ays-survey-black-friday-bundle-data-title">';
    //                         $content[] = '<a href="https://ays-pro.com/mega-bundle?utm_source=dashboard&utm_medium=survey-free&utm_campaign=black-friday-mega-bundle-sale-banner" class="ays-survey-black-friday-bundle-data-title-text" target="_blank">';
    //                             $content[] = __( 'MEGA BUNDLE', "survey-maker" );
    //                         $content[] = '</a>';
    //                     $content[] = '</div>';
    //                 $content[] = '</div>';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-button-box">';
    //                     $content[] = '<a href="https://ays-pro.com/mega-bundle?utm_source=dashboard&utm_medium=survey-free&utm_campaign=black-friday-mega-bundle-sale-banner" class="button button-primary ays-button" id="ays-button-top-buy-now" target="_blank">' . __( 'Get Your Deal', "survey-maker" ) . '</a>';
    //                     $content[] = '<span class="ays-survey-dicount-one-time-text">';
    //                         $content[] = __( "One-time payment", "survey-maker" );
    //                     $content[] = '</span>';
    //                 $content[] = '</div>';
    //             $content[] = '</div>';
    //         $content[] = '</div>';

    //         $content = implode( '', $content );
    //         echo $content;
    //     }
    // }

    // Christmas Top Banner 2024
    // public function ays_survey_christmas_top_message_2024($ishmar){
    //     if($ishmar == 0 ){
    //         $content = array();

    //         $content[] = '<div id="ays-survey-christmas-top-bundle-dicount-month-main" class="notice notice-success is-dismissible ays_survey_dicount_info">';
    //             $content[] = '<div id="ays-survey-dicount-month" class="ays_survey_dicount_month">';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-countdown-box">';

    //                     $content[] = '<div id="ays-survey-maker-countdown-main-container">';
    //                         $content[] = '<div class="ays-survey-maker-countdown-container">';

    //                             $content[] = '<div id="ays-survey-countdown">';

    //                                 $content[] = '<div>';
    //                                     $content[] = __( "Offer ends in:", "survey-maker" );
    //                                 $content[] = '</div>';

    //                                 $content[] = '<ul>';
    //                                     $content[] = '<li><span id="ays-survey-countdown-days"></span>'. __( "Days", "survey-maker" ) .'</li>';
    //                                     $content[] = '<li><span id="ays-survey-countdown-hours"></span>'. __( "Hours", "survey-maker" ) .'</li>';
    //                                     $content[] = '<li><span id="ays-survey-countdown-minutes"></span>'. __( "Minutes", "survey-maker" ) .'</li>';
    //                                     $content[] = '<li><span id="ays-survey-countdown-seconds"></span>'. __( "Seconds", "survey-maker" ) .'</li>';
    //                                 $content[] = '</ul>';
    //                             $content[] = '</div>';

    //                             $content[] = '<div id="ays-survey-countdown-content" class="emoji">';
    //                                 $content[] = '<span>🚀</span>';
    //                                 $content[] = '<span>⌛</span>';
    //                                 $content[] = '<span>🔥</span>';
    //                                 $content[] = '<span>💣</span>';
    //                             $content[] = '</div>';

    //                         $content[] = '</div>';
    //                     $content[] = '</div>';
                            
    //                 $content[] = '</div>';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-text-box">';
    //                     $content[] = '<div>';

    //                         $content[] = '<span class="ays-survey-christmas-top-bundle-title">';
    //                             $content[] = '<span>';
    //                             $content[] = sprintf('<a class="ays-survey-christmas-top-bundle-desc" href="https://ays-pro.com/wordpress/survey-maker?utm_source=dashboard&utm_medium=survey-free&utm_campaign=christmas-sale-banner%s" class="ays-survey-christmas-top-bundle-title-link" target="_blank">', SURVEY_MAKER_VERSION);

    //                                     $content[] = __( "Christmas Sale", "survey-maker" );
    //                                 $content[] = '</a>';
    //                             $content[] = '</span>';
    //                         $content[] = '</br>';

    //                         $content[] = '<span class="ays-survey-christmas-top-bundle-desc">';
    //                             $content[] = sprintf('<a class="ays-survey-christmas-top-bundle-desc" href="https://ays-pro.com/wordpress/survey-maker?utm_source=dashboard&utm_medium=survey-free&utm_campaign=christmas-sale-banner%s" class="ays-survey-christmas-top-bundle-title-link" target="_blank">', SURVEY_MAKER_VERSION);
    //                                 $content[] = __( "20% Extra OFF", "survey-maker" );
    //                             $content[] = '</a>';
    //                         $content[] = '</span>';
    //                     $content[] = '</div>';

    //                     $content[] = '<div style="position: absolute;right: 10px;bottom: 1px;" class="ays-survey-dismiss-buttons-container-for-form">';

    //                         $content[] = '<form action="" method="POST">';
    //                             $content[] = '<div id="ays-survey-dismiss-buttons-content">';
    //                             if( current_user_can( 'manage_options' ) ){
    //                                 $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn" style="height: 32px; margin-left: 0;padding-left: 0">'. __( "Dismiss ad", "survey-maker" ) .'</button>';
    //                                 $content[] = wp_nonce_field( "survey-maker" . '-sale-banner' ,  "survey-maker" . '-sale-banner' );
    //                             }
    //                             $content[] = '</div>';
    //                         $content[] = '</form>';
                            
    //                     $content[] = '</div>';

    //                 $content[] = '</div>';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-christmas-top-bundle-coupon-text-box">';
    //                     $content[] = '<div class="ays-survey-christmas-top-bundle-coupon-row">';
    //                         $content[] = 'xmas20off';
    //                     $content[] = '</div>';

    //                     $content[] = '<div class="ays-survey-christmas-top-bundle-text-row">';
    //                         $content[] = __( '20% Extra Discount Coupon', "survey-maker" );
    //                     $content[] = '</div>';
    //                 $content[] = '</div>';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box ays-survey-dicount-wrap-button-box">';
    //                     $content[] = sprintf('<a href="https://ays-pro.com/wordpress/survey-maker?utm_source=dashboard&utm_medium=survey-free&utm_campaign=christmas-sale-banner%s" class="button button-primary ays-button" id="ays-button-top-buy-now" target="_blank">', SURVEY_MAKER_VERSION);
    //                         $content[] =  __( 'Get Your Deal', "survey-maker" );
    //                     $content[] =  '</a>';
    //                     $content[] = '<span class="ays-survey-dicount-one-time-text">';
    //                         $content[] = __( "One-time payment", "survey-maker" );
    //                     $content[] = '</span>';
    //                 $content[] = '</div>';
    //             $content[] = '</div>';
    //         $content[] = '</div>';

    //         $content = implode( '', $content );
    //         echo $content;
    //     }
    // }



    // Black Friday
    // public function ays_survey_black_friday_message($ishmar){
    //     if($ishmar == 0 ){
    //         $content = array();

    //         $content[] = '<div id="ays-survey-dicount-black-friday-month-main" class="notice notice-success is-dismissible ays_chart_dicount_info">';
    //             $content[] = '<div id="ays-survey-dicount-black-friday-month" class="ays_chart_dicount_month">';
    //                 $content[] = '<div class="ays-survey-dicount-black-friday-box">';
    //                     $content[] = '<div class="ays-survey-dicount-black-friday-wrap-box ays-survey-dicount-black-friday-wrap-box-80" style="width: 70%;">';
    //                         $content[] = '<div class="ays-survey-dicount-black-friday-title-row">' . __( 'Limited Time', "survey-maker" ) .' '. '<a href="https://ays-pro.com/mega-bundle?utm_medium=survey-free&utm_campaign=black-friday-sale-banner&utm_source=dashboard" class="ays-survey-dicount-black-friday-button-sale" target="_blank">' . __( 'Sale', "chart-builder" ) . '</a>' . '</div>';
    //                         $content[] = '<div class="ays-survey-dicount-black-friday-title-row">' . __( 'Mega bundle', "survey-maker" ) . ' (Quiz+Survey+Poll)!</div> ';
    //                     $content[] = '</div>';

    //                     $content[] = '<div class="ays-survey-dicount-black-friday-wrap-box ays-survey-dicount-black-friday-wrap-text-box">';
    //                         $content[] = '<div class="ays-survey-dicount-black-friday-text-row">' . __( '50% off', "survey-maker" ) . '</div>';
    //                     $content[] = '</div>';

    //                     $content[] = '<div class="ays-survey-dicount-black-friday-wrap-box" style="width: 25%;">';
    //                         $content[] = '<div id="ays-survey-countdown-main-container">';
    //                             $content[] = '<div class="ays-survey-countdown-container">';
    //                                 $content[] = '<div id="ays-survey-countdown" style="display: block;">';
    //                                     $content[] = '<ul>';
    //                                         $content[] = '<li><span id="ays-survey-countdown-days">0</span>' . __( 'Days', "survey-maker" ) . '</li>';
    //                                         $content[] = '<li><span id="ays-survey-countdown-hours">0</span>' . __( 'Hours', "survey-maker" ) . '</li>';
    //                                         $content[] = '<li><span id="ays-survey-countdown-minutes">0</span>' . __( 'Minutes', "survey-maker" ) . '</li>';
    //                                         $content[] = '<li><span id="ays-survey-countdown-seconds">0</span>' . __( 'Seconds', "survey-maker" ) . '</li>';
    //                                     $content[] = '</ul>';
    //                                 $content[] = '</div>';
    //                                 $content[] = '<div id="ays-survey-countdown-content" class="emoji" style="display: none;">';
    //                                     $content[] = '<span>🚀</span>';
    //                                     $content[] = '<span>⌛</span>';
    //                                     $content[] = '<span>🔥</span>';
    //                                     $content[] = '<span>💣</span>';
    //                                 $content[] = '</div>';
    //                             $content[] = '</div>';
    //                         $content[] = '</div>';
    //                     $content[] = '</div>';

    //                     $content[] = '<div class="ays-survey-dicount-black-friday-wrap-box" style="width: 25%;">';
    //                         $content[] = '<a href="https://ays-pro.com/mega-bundle?utm_medium=survey-free&utm_campaign=black-friday-sale-banner&utm_source=dashboard" class="ays-survey-dicount-black-friday-button-buy-now" target="_blank">' . __( 'Get Your Deal', "survey-maker" ) . '</a>';
    //                     $content[] = '</div>';
    //                 $content[] = '</div>';
    //             $content[] = '</div>';

    //             $content[] = '<div style="position: absolute;right: 0;bottom: 1px;"  class="ays-survey-dismiss-buttons-container-for-form-black-friday">';
    //                 $content[] = '<form action="" method="POST">';
    //                     $content[] = '<div id="ays-survey-dismiss-buttons-content">';
    //                         if( current_user_can( 'manage_options' ) ){
    //                             $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn" style="height: 32px; margin-left: 0;padding-left: 0">Dismiss ad</button>';
    //                             $content[] = wp_nonce_field( $this->plugin_name . '-sale-banner' ,  $this->plugin_name . '-sale-banner' );
    //                         }
    //                     $content[] = '</div>';
    //                 $content[] = '</form>';
    //             $content[] = '</div>';
    //         $content[] = '</div>';

    //         $content = implode( '', $content );

    //         echo $content;
    //     }
    // }  

    // Christmas banner
    // public static function ays_survey_christmas_message($ishmar){
    //     if($ishmar == 0 ){
    //         $content = array();

    //         $content[] = '<div id="ays-survey-dicount-christmas-month-main" class="notice notice-success is-dismissible ays_survey_dicount_info">';
    //             $content[] = '<div id="ays-survey-dicount-christmas-month" class="ays_survey_dicount_month">';
    //                 $content[] = '<div class="ays-survey-dicount-christmas-box">';
    //                     $content[] = '<div class="ays-survey-dicount-christmas-wrap-box ays-survey-dicount-christmas-wrap-box-80">';
    //                         $content[] = '<div class="ays-survey-dicount-christmas-title-row">' . __( 'Limited Time', "survey-maker" ) .' '. '<a href="https://ays-pro.com/wordpress/survey-maker" class="ays-survey-dicount-christmas-button-sale" target="_blank">20%</a>' . ' SALE</div>';
    //                         $content[] = '<div class="ays-survey-dicount-christmas-title-row">' . __( 'Survey Maker Plugin', "survey-maker" ) . '</div>';
    //                     $content[] = '</div>';

    //                         $content[] = '<div class="ays-survey-dicount-christmas-wrap-box" style="width: 25%;">';
    //                             $content[] = '<div id="ays-survey-maker-countdown-main-container">';
    //                                 $content[] = '<div class="ays-survey-countdown-container">';
    //                                     $content[] = '<div id="ays-survey-countdown" style="display: block;">';
    //                                         $content[] = '<ul>';
    //                                             $content[] = '<li><span id="ays-survey-countdown-days"></span>' . __( 'Days', "survey-maker" ) . '</li>';
    //                                             $content[] = '<li><span id="ays-survey-countdown-hours"></span>' . __( 'Hours', "survey-maker" ) . '</li>';
    //                                             $content[] = '<li><span id="ays-survey-countdown-minutes"></span>' . __( 'Minutes', "survey-maker" ) . '</li>';
    //                                             $content[] = '<li><span id="ays-survey-countdown-seconds"></span>' . __( 'Seconds', "survey-maker" ) . '</li>';
    //                                         $content[] = '</ul>';
    //                                     $content[] = '</div>';
    //                                     $content[] = '<div id="ays-survey-countdown-content" class="emoji" style="display: none;">';
    //                                         $content[] = '<span>🚀</span>';
    //                                         $content[] = '<span>⌛</span>';
    //                                         $content[] = '<span>🔥</span>';
    //                                         $content[] = '<span>💣</span>';
    //                                     $content[] = '</div>';
    //                                 $content[] = '</div>';
    //                             $content[] = '</div>';
    //                         $content[] = '</div>';

    //                     $content[] = '<div class="ays-survey-dicount-christmas-wrap-box" style="width: 25%;">';
    //                         $content[] = '<a href="https://ays-pro.com/wordpress/survey-maker" class="ays-survey-dicount-christmas-button-buy-now" target="_blank">' . __( 'BUY NOW', "survey-maker" ) . '!</a>';
    //                     $content[] = '</div>';
    //                 $content[] = '</div>';
    //             $content[] = '</div>';

    //             $content[] = '<div style="position: absolute;right: 0;bottom: 1px;"  class="ays-survey-dismiss-buttons-container-for-form-christmas">';
    //                 $content[] = '<form action="" method="POST">';
    //                     $content[] = '<div id="ays-survey-dismiss-buttons-content-christmas">';
    //                         $content[] = '<button class="btn btn-link ays-button-christmas" name="ays_survey_sale_btn" style="">' . __( 'Dismiss ad', "survey-maker" ) . '</button>';
    //                     $content[] = '</div>';
    //                 $content[] = '</form>';
    //             $content[] = '</div>';
    //         $content[] = '</div>';

    //         $content = implode( '', $content );

    //         echo $content;
    //     }
    // }

    public function ays_survey_add_survey_template() {
        global $wpdb;

        $template_file_name = (isset($_REQUEST['template_file_name']) && $_REQUEST['template_file_name'] != "") ? sanitize_text_field($_REQUEST['template_file_name'] ) : null;
        
        switch($template_file_name){
            case 'customer-feedback-form':
                $json = file_get_contents(SURVEY_MAKER_ADMIN_PATH . "/partials/surveys/templates/customer-feedback-form.json");
            break;
            case 'employee-satisfaction-survey':
                $json = file_get_contents(SURVEY_MAKER_ADMIN_PATH . "/partials/surveys/templates/employee-satisfaction-survey.json");
            break;
            case 'event-evaluation-survey':
                $json = file_get_contents(SURVEY_MAKER_ADMIN_PATH . "/partials/surveys/templates/event-evaluation-survey.json");
            break;
            case 'product-research-survey':
                $json = file_get_contents(SURVEY_MAKER_ADMIN_PATH . "/partials/surveys/templates/product-research-survey.json");
            break;
            case 'restaurant-evaluation-survey':
                $json = file_get_contents(SURVEY_MAKER_ADMIN_PATH . "/partials/surveys/templates/restaurant-evaluation-survey.json");
            break;
            case 'market-research-survey':
                $json = file_get_contents(SURVEY_MAKER_ADMIN_PATH . "/partials/surveys/templates/market-research-survey.json");
            break;
            case 'brand-awareness-survey':
                $json = file_get_contents(SURVEY_MAKER_ADMIN_PATH . "/partials/surveys/templates/brand-awareness-survey.json");
            break;
            case 'user-persona-survey':
                $json = file_get_contents(SURVEY_MAKER_ADMIN_PATH . "/partials/surveys/templates/user-persona-survey.json");
            break;
        }
        
        $response = array();
        $json = json_decode($json, true);
        $json_key = isset($json['ays_survey_key']) ? $json['ays_survey_key'] : false;

        if($json_key) {
            $response = array(
                'status' => true,
                'data'   => $json
            );
            
            echo json_encode( $response );
            wp_die();
        }else{
             $response = array(
                'status' => false
            );
            
            echo json_encode( $response );
            wp_die();  
        }
    }

    // public static function ays_survey_spring_bundle_small_message($ishmar){
    //     if($ishmar == 0 ){
    //         $content = array();

    //         $content[] = '<div id="ays-survey-dicount-month-main" class="notice notice-success is-dismissible ays_survey_dicount_info">';
    //             $content[] = '<div id="ays-survey-dicount-month" class="ays_survey_dicount_month">';
    //                 $content[] = '<a href="https://ays-pro.com/mega-bundle" target="_blank" class="ays-survey-sale-banner-link"><img src="' . SURVEY_MAKER_ADMIN_URL . '/images/mega_bundle_logo_box.png"></a>';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box">';
    //                     $content[] = '<p>';
    //                         $content[] = '<strong>';
    //                             $content[] = __( "Spring is here! <span class='ays-survey-dicount-wrap-color'>50%</span> SALE on <span><a href='https://ays-pro.com/mega-bundle' target='_blank' class='ays-survey-dicount-wrap-color ays-survey-dicount-wrap-text-decoration'>Mega Bundle</a></span><span style='display: block;'>Quiz + Survey + Poll</span>", SURVEY_MAKER_ADMIN_URL );
    //                         $content[] = '</strong>';
    //                     $content[] = '</p>';
    //                 $content[] = '</div>';

    //                 $content[] = '<div class="ays-survey-dicount-wrap-box">';

    //                     $content[] = '<div id="ays-survey-countdown-main-container">';

    //                         $content[] = '<form action="" method="POST" class="ays-survey-btn-form">';
    //                             $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn_small_spring" style="height: 32px; margin-left: 0;padding-left: 0">Dismiss ad</button>';
    //                             $content[] = '<button class="btn btn-link ays-button" name="ays_survey_sale_btn_spring_small_for_two_months" style="height: 32px; padding-left: 0">Dismiss ad for 2 months</button>';
    //                         $content[] = '</form>';

    //                     $content[] = '</div>';
                            
    //                 $content[] = '</div>';

    //                 $content[] = '<a href="https://ays-pro.com/mega-bundle" class="button button-primary ays-button" id="ays-button-top-buy-now" target="_blank">' . __( 'Buy Now !', SURVEY_MAKER_ADMIN_URL ) . '</a>';
    //             $content[] = '</div>';
    //         $content[] = '</div>';

    //         $content = implode( '', $content );
    //         echo $content;
    //     }
    // }

    public function ays_survey_maker_live_preview_content(){

        $content = isset($_REQUEST['content']) && $_REQUEST['content'] != '' ? wp_kses_post( $_REQUEST['content'] ) : null;
        if($content === null){
            ob_end_clean();
            $ob_get_clean = ob_get_clean();
            echo json_encode(array(
                'status' => false,
            ));
        }
        // $content = Survey_Maker_Data::ays_autoembed( $content );
        $content = stripslashes( wpautop( $content ) );
        ob_end_clean();
        $ob_get_clean = ob_get_clean();
        echo json_encode(array(
            'status' => true,
            'content' => $content,
        ));
        wp_die();
    }
    
	public function add_tabs() {
		$screen = get_current_screen();
	
		if ( ! $screen) {
			return;
		}
        
        $title   = __( 'General Information:', "survey-maker");
        $content_text = 'Get real-time feedback with the Survey Maker plugin. You are free to generate unlimited online surveys with unlimited questions and sections. Easily create your customer satisfaction surveys, employee engagement forms, market researches, event planning questionnaires with this plugin.
                        <br><br>Increase users’ track to your WordPress website with the Survey Maker features. Build smarter surveys with LogicJump, advance your questionnaires with Conditional Results, earn money with Paid Surveys, generate leads super easily, get valuable feedback.';

        $sidebar_content = '<p><strong>' . __( 'For more information:', "survey-maker") . '</strong></p>' .
                            '<p>
                                <a href="https://www.youtube.com/watch?v=Q1qi649acb0" target="_blank">' . __( 'YouTube video tutorials' , "survey-maker" ) . '</a>
                            </p>' .
                            '<p>
                                <a href="https://ays-pro.com/wordpress-survey-maker-user-manual" target="_blank">' . __( 'Documentation', "survey-maker" ) . '</a>
                            </p>' .
                            '<p>
                                <a href="https://ays-pro.com/wordpress/survey-maker" target="_blank">' . __( 'Survey Maker plugin pro version', "survey-maker" ) . '</a>
                            </p>' .
                            '<p>
                                <a href="https://ays-demo.com/wordpress-survey-plugin-pro-demo/" target="_blank">' . __( 'Survey Maker plugin demo', "survey-maker" ) . '</a>
                            </p>';

        
        $content =  '<h2>' . __( 'Survey Maker Information', "survey-maker") . '</h2>'
                   .'<p>' .sprintf(__( '%s',  "survey-maker" ), $content_text).'</p>';

        $help_tab_content = array(
            'id'      => 'survey_maker_help_tab',
            'title'   => $title,
            'content' => $content
        );
        
		$screen->add_help_tab($help_tab_content);

		$screen->set_help_sidebar($sidebar_content);
	}

    public function get_next_or_prev_survey_by_id( $id, $type = "next" ) {
        global $wpdb;

        $surveys_table = esc_sql( $wpdb->prefix . "ayssurvey_surveys" );

        $where = array();
        $where_condition = "";

        $id     = (isset( $id ) && $id != "" && absint($id) != 0) ? absint( sanitize_text_field( $id ) ) : null;
        $type   = (isset( $type ) && $type != "") ? sanitize_text_field( $type ) : "next";

        if ( is_null( $id ) || $id == 0 ) {
            return null;
        }

        switch ( $type ) {
            case 'prev':
                $where[] = ' `id` < ' . $id . ' ORDER BY `id` DESC ';
            break;
            case 'next':
            default:
                $where[] = ' `id` > ' . $id;
                break;
        }

        if( ! empty($where) ){
            $where_condition = " WHERE " . implode( " AND ", $where );
        }

        $sql = "SELECT `id` FROM {$surveys_table} ". $where_condition ." LIMIT 1;";
        $results = $wpdb->get_row( $sql, 'ARRAY_A' );

        return $results;

    }

    public static function ays_survey_update_banner_time(){

        $date = time() + ( 3 * 24 * 60 * 60 ) + (int) ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS);
        // $date = time() + ( 60 ) + (int) ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS); // for testing | 1 min
        $next_3_days = date('M d, Y H:i:s', $date);

        $ays_survey_banner_time = get_option('ays_survey_banner_time');

        if ( !$ays_survey_banner_time || is_null( $ays_survey_banner_time ) ) {
            update_option('ays_survey_banner_time', $next_3_days ); 
        }

        $get_ays_survey_banner_time = get_option('ays_survey_banner_time');

        $val = 60*60*24*0.5; // half day
        // $val = 60; // for testing | 1 min

        $current_date = current_time( 'mysql' );
        $date_diff = strtotime($current_date) - intval(strtotime($get_ays_survey_banner_time));

        $days_diff = $date_diff / $val;
        if(intval($days_diff) > 0 ){
            update_option('ays_survey_banner_time', $next_3_days);
        }

        return $get_ays_survey_banner_time;
    }

    //---------------- Survey submisson open results in popup ----------------


    public function ays_survey_show_results(){

        // Run a security check.
        check_ajax_referer( 'survey-maker-ajax-results-nonce', sanitize_key( $_REQUEST['_ajax_nonce'] ) );
        
        global $wpdb;
        if( !is_user_logged_in() ) {
            echo json_encode( array(
                'status' => false,
                'rows' => ""
            ) );
            
        };

        // Check for permissions.
        if ( ! current_user_can( 'manage_options' ) ) {
            ob_end_clean();
            $ob_get_clean = ob_get_clean();
            echo json_encode(array(
                'status' => false,
                "rows" => ""
            ));
            wp_die();
        }

        if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ays_survey_show_results' && isset($_REQUEST['survey_id']) && !empty($_REQUEST['survey_id'])) {

            ob_start();

            $survey_id = absint(intval($_REQUEST['survey_id']));


            $this->settings_obj = new Survey_Maker_Settings_Actions($this->plugin_name);

            $filters = array();

            $submission_count_and_ids = Survey_Maker_Data::get_submission_count_and_ids( $survey_id, $filters );
            $submission_ids_arr = ( isset( $submission_count_and_ids['submission_ids_arr'] ) && ! empty( $submission_count_and_ids['submission_ids_arr'] ) ) ? Survey_Maker_Data::recursive_sanitize_text_field( $submission_count_and_ids['submission_ids_arr'] ) : array();
            $filters['filter_submission_ids'] = $submission_ids_arr;
            
            
            $sql = "SELECT * FROM " . $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "surveys WHERE id =" . absint( $survey_id );
            $survey_name = $wpdb->get_row( $sql, 'ARRAY_A' );
            
            $survey_options = isset( $survey_name['options'] ) && $survey_name['options'] != '' ? json_decode( $survey_name['options'], true ) : array();
            
            $survey_for_charts = isset( $survey_options['survey_color'] ) && $survey_options['survey_color'] != '' ? esc_attr($survey_options['survey_color']) : "rgb(255, 87, 34)";
            $survey_for_charts_text_color = isset( $survey_options['survey_text_color'] ) && $survey_options['survey_text_color'] != '' ? esc_attr($survey_options['survey_text_color']) : "rgb(255, 87, 34)";
            if(isset( $survey_options['survey_color'] ) && $survey_options['survey_color'] == 'rgba(0,0,0,0)'){
                $survey_for_charts = "rgba(0,0,0,1)";
            }
            if($survey_for_charts_text_color == 'rgba(0,0,0,0)'){
                $survey_for_charts_text_color = "rgba(0,0,0,1)";
            }
            // Allow HTML in answers
            $survey_options[ 'survey_allow_html_in_answers' ] = isset($survey_options[ 'survey_allow_html_in_answers' ]) ? $survey_options[ 'survey_allow_html_in_answers' ] : 'off';
            $allow_html_in_answers = (isset($survey_options[ 'survey_allow_html_in_answers' ]) && $survey_options[ 'survey_allow_html_in_answers' ] == 'on') ? true : false;
            
            // Allow HTML in description
            $survey_options[ 'survey_allow_html_in_section_description' ] = isset($survey_options[ 'survey_allow_html_in_section_description' ]) ? $survey_options[ 'survey_allow_html_in_section_description' ] : 'off';
            $survey_allow_html_in_section_description = (isset($survey_options[ 'survey_allow_html_in_section_description' ]) && $survey_options[ 'survey_allow_html_in_section_description' ] == 'on') ? true : false;
            
            $user_id = get_current_user_id();

            $author_id = isset( $survey_name['author_id'] ) && $survey_name['author_id'] != "" ? intval( $survey_name['author_id'] ) : 0;
            $survey_title = isset( $survey_name['title'] ) && $survey_name['title'] != "" ? esc_html__( $survey_name['title'], "survey-maker" ) : "";
            
            $owner = false;
            if( $user_id == $author_id ){
                $owner = true;
            }
            
            if( !$owner ){
                $url = esc_url_raw( remove_query_arg( array( 'page', 'survey' ) ) ) . "?page=survey-maker-submissions";
                wp_redirect( $url );
            }
           
            $gen_options = ($this->settings_obj->ays_get_setting('options') === false) ? array() : json_decode($this->settings_obj->ays_get_setting('options'), true);

            $submission_id = (isset($_REQUEST['submission_id']) && $_REQUEST['submission_id'] != '') ? absint( sanitize_text_field( $_REQUEST['submission_id'] ) ) : null;
            if($submission_id == null){

                return array(
                        'status' => false,
                        'rows' => ""
                    );
            }
            $submission = array(
                'id' => $submission_id
            );

            
            $ays_survey_individual_questions = $this->ays_survey_individual_results_for_one_submission( $submission, $survey_name );

            // Show question title as HTML
            $survey_options[ 'survey_show_questions_as_html' ] = isset($survey_options[ 'survey_show_questions_as_html' ]) ? $survey_options[ 'survey_show_questions_as_html' ] : 'on';
            $survey_show_questions_as_html = $survey_options[ 'survey_show_questions_as_html' ] == 'on' ? true : false;
            
            // Get user info
            $individual_user_name   = "";
            $individual_user_email  = "";
            $individual_user_ip     = "";
            $individual_user_date   = "";
            $individual_user_sub_id = "";
            $individual_user_password = "";
            $dashboard_admin_note = "";
            $individual_user_device_type = "";
            if( isset($ays_survey_individual_questions['user_info']) && is_array( $ays_survey_individual_questions['user_info']) ){
                $individual_user_name   = isset($ays_survey_individual_questions['user_info']['user_name']) && isset($ays_survey_individual_questions['user_info']['user_name']) ? stripslashes(  $ays_survey_individual_questions['user_info']['user_name'] ) : "";
                $individual_user_email  = isset($ays_survey_individual_questions['user_info']['user_email']) && isset($ays_survey_individual_questions['user_info']['user_email'])  ? stripslashes( esc_attr( $ays_survey_individual_questions['user_info']['user_email'] ) ) : "";
                $individual_user_ip     = isset($ays_survey_individual_questions['user_info']['user_ip']) && isset($ays_survey_individual_questions['user_info']['user_ip'])  ? stripslashes( esc_attr( $ays_survey_individual_questions['user_info']['user_ip'] ) ) : "";
                $individual_user_date   = isset($ays_survey_individual_questions['user_info']['submission_date']) && isset($ays_survey_individual_questions['user_info']['submission_date'])  ? stripslashes( esc_attr( $ays_survey_individual_questions['user_info']['submission_date'] ) ) : "";
                $individual_user_sub_id = isset($ays_survey_individual_questions['user_info']['id']) && isset($ays_survey_individual_questions['user_info']['id'])  ? stripslashes( esc_attr( $ays_survey_individual_questions['user_info']['id'] ) ) : "";
                $individual_user_password = isset($ays_survey_individual_questions['user_info']['password']) && isset($ays_survey_individual_questions['user_info']['password'])  ? stripslashes( esc_attr( $ays_survey_individual_questions['user_info']['password'] ) ) : "";
                $individual_user_extra_data  = isset($ays_survey_individual_questions['user_info']['options']) && $ays_survey_individual_questions['user_info']['options']  != '' ? json_decode(($ays_survey_individual_questions['user_info']['options']) , 'true') : array();
                $individual_user_device_type = isset($individual_user_extra_data['device']) && $individual_user_extra_data['device']  != '' ? esc_attr($individual_user_extra_data['device']) : '';
                $dashboard_admin_note = isset($ays_survey_individual_questions['user_info']['admin_note']) && isset($ays_survey_individual_questions['user_info']['admin_note'])  ? stripslashes( esc_attr( $ays_survey_individual_questions['user_info']['admin_note'] ) ) : "";
            }

            $text_types = array(
                'text',
                'short_text',
                'number',
                'phone',
                'name',
                'hidden',
                'email',
                'date',
                'time',
                'date_time',
            );

            $submissions_count = 0;
            if(intval($submission_count_and_ids['submission_count']) > 0){
                $submissions_count = $submission_count_and_ids['submission_count'];
            }

            $export_disabled = 'disabled';
            if( $submissions_count > 0 ){
                $export_disabled = '';
            }
            
            $survey_data_clipboard = array(
                "user_name"   => $individual_user_name,
                "user_email"  => $individual_user_email,
                "user_ip"     => $individual_user_ip,
                "user_date"   => $individual_user_date,
                "user_sub_id" => $individual_user_sub_id,
                "user_device_type" => $individual_user_device_type,
            );

            if($individual_user_password){
                $survey_data_clipboard['user_password'] = $individual_user_password;
            }
            
            $survey_data_formated_for_clipboard = Survey_Maker_Data::ays_survey_copy_text_formater($survey_data_clipboard);
            
            
            Survey_Maker_Data::get_template_part( 'partials/submissions/partials/survey-maker-each-submission-individual', '', get_defined_vars() );
            
            $wpdb->get_var("UPDATE " . $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions SET `read`= 1 WHERE `id`= $submission_id");

            $html = ob_get_clean();

            echo json_encode( array(
                'status' => true,
                'rows' => $html
            ) );
            wp_die();
        }

        echo json_encode( array(
            'status' => false,
            'rows' => ""
        ) );

    }

    public function ays_survey_author_user_search() {
        $content_text = array(
            'results' => array()
        );

        if( current_user_can( 'manage_options' ) ){
            $search = isset($_REQUEST['search']) && $_REQUEST['search'] != '' ? sanitize_text_field( $_REQUEST['search'] ) : null;
            $checked = isset($_REQUEST['val']) && $_REQUEST['val'] !='' ? sanitize_text_field( $_REQUEST['val'] ) : null;

            $args = 'search=';
            if($search !== null){
                $args .= '*';
                $args .= $search;
                $args .= '*';
            }

            $users = get_users($args);

            foreach ($users as $key => $value) {
                if ($checked !== null) {
                    if ( !is_array( $checked ) ) {
                        $checked2 = $checked;
                        $checked = array();
                        $checked[] = absint($checked2);
                    }
                    if (in_array($value->ID, $checked)) {
                        continue;
                    }else{
                        $content_text['results'][] = array(
                            'id' => $value->ID,
                            'text' => $value->data->display_name,
                        );
                    }
                }else{
                    $content_text['results'][] = array(
                        'id' => $value->ID,
                        'text' => $value->data->display_name,
                    );
                }
            }
        }

        ob_end_clean();
        echo json_encode($content_text);
        wp_die();
    }

    // public function ays_survey_subscribe_email(){
    //     $subscribe_email   = isset($_REQUEST['email']) && $_REQUEST['email'] != "" ? sanitize_email($_REQUEST['email']) : "";
    //     $subscribe_website = isset($_REQUEST['website']) && $_REQUEST['website'] != "" ? sanitize_url($_REQUEST['website']) : "";
    //     // $url = "http://localhost/survey-grab-gift/";
    //     $url = "https://ays-pro.com/add-on-email/survey-grab-gift/";
    //     if($subscribe_email != "" && $subscribe_website != ''){
    //         $current_date = date("Y-m-d");
    //         $current_user_ip = Survey_Maker_Data::get_user_ip();
    //         $send_request = wp_remote_post($url, array(
    //             'headers'     => array("Content-Type: application/json; charset=UTF-8"),
    //             'body'        => json_encode( array(
    //                 "email"   => $subscribe_email,
    //                 "website" => $subscribe_website,
    //                 "user_ip" => $current_user_ip,
    //                 "subscirbe_date" => $current_date
    //             ) ),
    //         ) );
    //         $response = wp_remote_retrieve_body($send_request);
    //         $response = json_decode($response, true);
    //         if(isset($response) && is_array($response)){
    //             $response_code = isset($response['code']) && $response['code'] != "" ? $response['code'] : "";
    //             $response_message = isset($response['msg']) && $response['msg'] != "" ? $response['msg'] : "";
    //             $response_status = $response_code > 0 ? true : false;
    //             echo json_encode(array(
    //                 "status" => $response_code,
    //                 "message" => $response_message
    //             ));
    //             wp_die();
    //         }       
    //         else{
    //             echo json_encode(array(
    //                 "status" => false,
    //                 "message" => "Something went wrong. Please try again"
    //             ));
    //             wp_die();
    //         }
    //     }
    // }

    /**
     * Check if plugin can be installed
     */
    public function ays_survey_can_install($plugin_slug) {
        if (!function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        
        $plugins = get_plugins();
        foreach ($plugins as $plugin_file => $plugin_data) {
            if (strpos($plugin_file, $plugin_slug) !== false) {
                return false; // Plugin already exists
            }
        }
        return true; // Plugin can be installed
    }

    /**
     * Check if plugin can be activated
     */
    public function ays_survey_can_activate($plugin_slug) {
        if (!function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        
        $plugins = get_plugins();
        foreach ($plugins as $plugin_file => $plugin_data) {
            if (strpos($plugin_file, $plugin_slug) !== false) {
                return !is_plugin_active($plugin_file); // Can activate if not already active
            }
        }
        return false; // Plugin doesn't exist
    }

    /**
     * Install plugin via AJAX
     */
    public function ays_survey_install_plugin() {
        if (!current_user_can('install_plugins')) {
            wp_die(json_encode(array('success' => false, 'message' => 'Insufficient permissions')));
        }

        if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
            wp_die(json_encode(array('success' => false, 'message' => 'Security check failed')));
        }

        $plugin_slug = sanitize_text_field($_POST['plugin_slug']);
        
        if (!function_exists('plugins_api')) {
            require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
        }
        if (!class_exists('WP_Upgrader')) {
            require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        }

        $api = plugins_api('plugin_information', array('slug' => $plugin_slug));
        
        if (is_wp_error($api)) {
            wp_die(json_encode(array('success' => false, 'message' => esc_html__('Plugin not found'))));
        }

        $upgrader = new Plugin_Upgrader(new WP_Ajax_Upgrader_Skin());
        $result = $upgrader->install($api->download_link);

        if ($result) {
            // Load plugin.php for get_plugins() and activate_plugin() if not loaded yet
            if ( ! function_exists( 'get_plugins' ) ) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            // Clear plugins cache to ensure the newly installed plugin is visible
            if ( function_exists( 'wp_clean_plugins_cache' ) ) {
                wp_clean_plugins_cache();
            }

            $plugins = get_plugins();
            $plugin_file = '';
            
            foreach ( $plugins as $file => $plugin_data ) {
                if ( strpos( $file, $plugin_slug ) !== false ) {
                    $plugin_file = $file;
                    break;
                }
            }

            if ( empty( $plugin_file ) ) {
                wp_die( json_encode( array( 'success' => false, 'message' => esc_html__('Plugin main file not found')) ) );
            }

            // Ensure activate_plugin() is available
            if ( ! function_exists( 'activate_plugin' ) ) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            $activate = activate_plugin( $plugin_file );
            
            if ( is_wp_error( $activate ) ) {
                wp_die( json_encode( array( 'success' => false, 'message' => $activate->get_error_message() ) ) );
            }

            wp_die( json_encode( array( 'success' => true, 'message' => esc_html__('Plugin installed and activated successfully')) ) );
        
        } else {
            wp_die(json_encode(array('success' => false, 'message' => esc_html__('Installation failed'))));
        }
    }

    /**
     * Activate plugin via AJAX
     */
    public function ays_survey_activate_plugin() {
        if (!current_user_can('activate_plugins')) {
            wp_die(json_encode(array('success' => false, 'message' => esc_html__('Insufficient permissions'))));
        }

        if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
            wp_die(json_encode(array('success' => false, 'message' => esc_html__('Security check failed'))));
        }

        $plugin_slug = sanitize_text_field($_POST['plugin_slug']);
        
        if (!function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        $plugins = get_plugins();
        $plugin_file = '';
        
        foreach ($plugins as $file => $plugin_data) {
            if (strpos($file, $plugin_slug) !== false) {
                $plugin_file = $file;
                break;
            }
        }

        if (empty($plugin_file)) {
            wp_die(json_encode(array('success' => false, 'message' => esc_html__('Plugin not found'))));
        }

        $result = activate_plugin($plugin_file);
        
        if (is_wp_error($result)) {
            wp_die(json_encode(array('success' => false, 'message' => $result->get_error_message())));
        } else {
            wp_die(json_encode(array('success' => true, 'message' => esc_html__('Plugin activated successfully'))));
        }
    }

    /**
     * Get AYS plugins data
     */
    public function get_am_plugins() {
        return array(
            'quiz-maker' => array(
                'name' => 'Quiz Maker',
                'slug' => 'quiz-maker',
                'description' => 'Create engaging quizzes with multiple question types'
            ),
            'poll-maker' => array(
                'name' => 'Poll Maker',
                'slug' => 'poll-maker',
                'description' => 'Build interactive polls for your audience'
            ),
            'popup-box' => array(
                'name' => 'Popup Box',
                'slug' => 'ays-popup-box',
                'description' => 'Create beautiful popups and modals'
            ),
            'gallery-photo-gallery' => array(
                'name' => 'Gallery Photo Gallery',
                'slug' => 'gallery-photo-gallery',
                'description' => 'Showcase your photos in stunning galleries'
            ),
            'secure-copy-content-protection' => array(
                'name' => 'Secure Copy Content Protection',
                'slug' => 'secure-copy-content-protection',
                'description' => 'Protect your content from copying'
            ),
            'ays-chatgpt-assistant' => array(
                'name' => 'ChatGPT Assistant',
                'slug' => 'ays-chatgpt-assistant',
                'description' => 'AI-powered chat assistant for your website'
            ),
            'personal-dictionary' => array(
                'name' => 'Personal Dictionary',
                'slug' => 'personal-dictionary',
                'description' => 'Create and manage custom dictionaries'
            ),
            'chartify' => array(
                'name' => 'Chartify',
                'slug' => 'chart-builder',
                'description' => 'Build beautiful charts and graphs'
            )
        );
    }

    public function ays_survey_disable_all_notice_from_plugin() {
        if (!function_exists('get_current_screen')) {
            return;
        }

        $screen = get_current_screen();

        if (empty($screen) || strpos($screen->id, $this->plugin_name) === false) {
            return;
        }

        global $wp_filter;

        // Keep plugin-specific notices
        $our_plugin_notices = array();

        $exclude_functions = [
            'survey_maker_general_admin_notice',
        ];

        if (!empty($wp_filter['admin_notices'])) {
            foreach ($wp_filter['admin_notices']->callbacks as $priority => $callbacks) {
                foreach ($callbacks as $key => $callback) {
                    // For class-based methods
                    if (
                        is_array($callback['function']) &&
                        is_object($callback['function'][0]) &&
                        get_class($callback['function'][0]) === __CLASS__
                    ) {
                        $our_plugin_notices[$priority][$key] = $callback;
                    }
                    // For standalone functions
                    elseif (
                        is_string($callback['function']) &&
                        in_array($callback['function'], $exclude_functions)
                    ) {
                        $our_plugin_notices[$priority][$key] = $callback;
                    }
                }
            }
        }

        // Remove all notices
        remove_all_actions('admin_notices');
        remove_all_actions('all_admin_notices');

        // Re-add only your plugin's notices
        foreach ($our_plugin_notices as $priority => $callbacks) {
            foreach ($callbacks as $callback) {
                add_action('admin_notices', $callback['function'], $priority);
            }
        }
    }

    public function ays_survey_black_friady_popup_box(){
        if(!empty($_REQUEST['page']) && sanitize_text_field( $_REQUEST['page'] ) != $this->plugin_name . "-admin-dashboard"){
            if(false !== strpos( sanitize_text_field( $_REQUEST['page'] ), $this->plugin_name)){

                $flag = true;

                if( isset($_COOKIE['aysSurveyBlackFridayPopupCount']) && intval($_COOKIE['aysSurveyBlackFridayPopupCount']) >= 2 ){
                    $flag = false;
                }

                $ays_survey_cta_button_link = esc_url('https://ays-pro.com/mega-bundle?utm_source=dashboard&utm_medium=survey-free&utm_campaign=mega-bundle-popup-black-friday-sale-' . SURVEY_MAKER_VERSION);

                if( $flag ){
                ?>
                <div class="ays-survey-black-friday-popup-overlay" style="opacity: 0; visibility: hidden; display: none;">
                  <div class="ays-survey-black-friday-popup-dialog">
                    <div class="ays-survey-black-friday-popup-content">
                      <div class="ays-survey-black-friday-popup-background-pattern">
                        <div class="ays-survey-black-friday-popup-pattern-row">
                          <div class="ays-survey-black-friday-popup-pattern-text">SALE SALE SALE</div>
                          <div class="ays-survey-black-friday-popup-pattern-text">SALE SALE SALE</div>
                        </div>
                        <div class="ays-survey-black-friday-popup-pattern-row">
                          <div class="ays-survey-black-friday-popup-pattern-text">SALE SALE SALE</div>
                          <div class="ays-survey-black-friday-popup-pattern-text">SALE SALE SALE</div>
                        </div>
                        <div class="ays-survey-black-friday-popup-pattern-row">
                          <div class="ays-survey-black-friday-popup-pattern-text">SALE SALE SALE</div>
                          <div class="ays-survey-black-friday-popup-pattern-text">SALE SALE SALE</div>
                        </div>
                        <div class="ays-survey-black-friday-popup-pattern-row">
                          <div class="ays-survey-black-friday-popup-pattern-text">SALE SALE SALE</div>
                          <div class="ays-survey-black-friday-popup-pattern-text">SALE SALE SALE</div>
                        </div>
                      </div>
                      
                      <button class="ays-survey-black-friday-popup-close" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M18 6 6 18"></path>
                          <path d="m6 6 12 12"></path>
                        </svg>
                      </button>
                      
                      <div class="ays-survey-black-friday-popup-badge">
                        <div class="ays-survey-black-friday-popup-badge-content">
                          <div class="ays-survey-black-friday-popup-badge-text-sm"><?php echo esc_html__( 'Up to', 'survey-maker' ); ?></div>
                          <div class="ays-survey-black-friday-popup-badge-text-lg">50%</div>
                          <div class="ays-survey-black-friday-popup-badge-text-md"><?php echo esc_html__( 'OFF', 'survey-maker' ); ?></div>
                        </div>
                      </div>
                      
                      <div class="ays-survey-black-friday-popup-main-content">
                        <div class="ays-survey-black-friday-popup-hashtag"><?php echo esc_html__( '#BLACKFRIDAY', 'survey-maker' ); ?></div>
                        <h1 class="ays-survey-black-friday-popup-title-mega"><?php echo esc_html__( 'MEGA', 'survey-maker' ); ?></h1>
                        <h1 class="ays-survey-black-friday-popup-title-bundle"><?php echo esc_html__( 'BUNDLE', 'survey-maker' ); ?></h1>
                        <div class="ays-survey-black-friday-popup-offer-label">
                          <h2 class="ays-survey-black-friday-popup-offer-text"><?php echo esc_html__( 'BLACK FRIDAY OFFER', 'survey-maker' ); ?></h2>
                        </div>
                        <p class="ays-survey-black-friday-popup-description"><?php echo esc_html__( 'Get our exclusive plugins in one bundle', 'survey-maker' ); ?></p>
                        <a href="<?php echo esc_url($ays_survey_cta_button_link); ?>" target="_blank" class="ays-survey-black-friday-popup-cta-btn"><?php echo esc_html__( 'Get Mega Bundle', 'survey-maker' ); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
                <script type="text/javascript">
                    (function() {
                      var overlay = document.querySelector('.ays-survey-black-friday-popup-overlay');
                      var closeBtn = document.querySelector('.ays-survey-black-friday-popup-close');
                      var learnMoreBtn = document.querySelector('.ays-survey-black-friday-popup-learn-more');
                      var ctaBtn = document.querySelector('.ays-survey-black-friday-popup-cta-btn');

                      // Cookie helper functions
                      function setCookie(name, value, days) {
                        var expires = "";
                        if (days) {
                          var date = new Date();
                          date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                          expires = "; expires=" + date.toUTCString();
                        }
                        document.cookie = name + "=" + (value || "") + expires + "; path=/";
                      }

                      function getCookie(name) {
                        var nameEQ = name + "=";
                        var ca = document.cookie.split(';');
                        for (var i = 0; i < ca.length; i++) {
                          var c = ca[i];
                          while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                          if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                        }
                        return null;
                      }

                      // Get current show count from cookie
                      var showCount = parseInt(getCookie('aysSurveyBlackFridayPopupCount') || '0', 10);
                      var maxShows = 2;

                      // Show popup function
                      function showPopup() {
                        if (overlay && showCount < maxShows) {
                          overlay.classList.add('ays-survey-black-friday-popup-active');
                          showCount++;
                          // Update cookie with new count (expires in 30 days)
                          setCookie('aysSurveyBlackFridayPopupCount', showCount.toString(), 30);
                        }
                      }

                      // Close popup function
                      function closePopup(e) {
                        if (e) {
                          e.preventDefault();
                          e.stopPropagation();
                        }
                        if (overlay) {
                          overlay.classList.remove('ays-survey-black-friday-popup-active');
                        }
                      }

                      // Determine timing based on show count
                      if (showCount === 0) {
                        // First time - show after 30 seconds
                        setTimeout(function() {
                          showPopup();
                        }, 30000);
                      } else if (showCount === 1) {
                        // Second time - show after 200 seconds
                        setTimeout(function() {
                          showPopup();
                        }, 200000);
                      }
                      // If showCount >= 2, don't show popup at all

                      // Close button
                      if (closeBtn) {
                        closeBtn.addEventListener('click', function(e) {
                          closePopup(e);
                        });
                      }

                      // Learn more button
                      if (learnMoreBtn) {
                        learnMoreBtn.addEventListener('click', function(e) {
                          closePopup(e);
                        });
                      }

                      // CTA button (optional - if you want it to close popup too)
                      if (ctaBtn) {
                        ctaBtn.addEventListener('click', function(e) {
                          // You can add redirect logic here if needed
                          // window.location.href = 'your-url';
                        });
                      }

                      // Close on overlay click
                      if (overlay) {
                        overlay.addEventListener('click', function(e) {
                          if (e.target === overlay) {
                            closePopup(e);
                          }
                        });
                      }

                      // Close on Escape key
                      document.addEventListener('keydown', function(e) {
                        if (e.key === 'Escape' && overlay && overlay.classList.contains('ays-survey-black-friday-popup-active')) {
                          closePopup();
                        }
                      });
                    })();
                </script>
                <style>
                    .ays-survey-black-friday-popup-overlay{position:fixed;top:0;left:0;right:0;bottom:0;z-index:9999;background-color:rgba(0,0,0,.8);display:flex;align-items:center;justify-content:center;opacity:0;visibility:hidden;transition:opacity .2s,visibility .2s}.ays-survey-black-friday-popup-overlay.ays-survey-black-friday-popup-active{display:flex!important;opacity:1!important;visibility:visible!important}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-dialog{position:relative;max-width:470px;width:100%;border-radius:8px;overflow:hidden;background:0 0;box-shadow:0 25px 50px -12px rgba(0,0,0,.25);transform:scale(.95);transition:transform .2s}.ays-survey-black-friday-popup-overlay.ays-survey-black-friday-popup-active .ays-survey-black-friday-popup-dialog{transform:scale(1)}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-content{position:relative;width:470px;height:410px;background:linear-gradient(to right bottom,#c056f5,#f042f0,#7d7de8);overflow:hidden}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-background-pattern{position:absolute;top:0;left:0;right:0;bottom:0;opacity:.07;pointer-events:none;transform:rotate(-12deg) translateY(32px);overflow:hidden}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-pattern-row{display:flex;gap:16px;margin-bottom:16px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-pattern-text{color:#fff;font-weight:900;font-size:96px;white-space:nowrap;line-height:1}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-close{position:absolute;top:16px;right:16px;z-index:9999;background:0 0;border:none;color:rgba(255,255,255,.8);cursor:pointer;padding:4px;transition:color .2s;line-height:0}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-close:hover,.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-learn-more:hover{color:#fff}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge{position:absolute;top:32px;right:32px;width:96px;height:96px;background-color:#d4fc79;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 25px 50px -12px rgba(0,0,0,.25);animation:3s ease-in-out infinite ays-survey-black-friday-popup-float}@keyframes ays-survey-black-friday-popup-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge-content{text-align:center}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge-text-sm{color:#1a1a1a;font-weight:900;font-size:24px;line-height:1}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge-text-lg{color:#1a1a1a;font-weight:900;font-size:30px;line-height:1;margin-top:4px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge-text-md{color:#1a1a1a;font-weight:900;font-size:20px;line-height:1}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-main-content{position:relative;z-index:10;height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:0 48px;text-align:center}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-hashtag{color:rgba(255,255,255,.9);font-weight:700;font-size:14px;margin-bottom:16px;letter-spacing:.1em}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-title-mega{color:#fff;font-weight:900;font-size:60px;line-height:1;margin:0 0 12px;text-shadow:0 4px 6px rgba(0,0,0,.1)}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-title-bundle{color:#fff;font-weight:900;font-size:60px;line-height:1;margin:0 0 24px;text-shadow:0 4px 6px rgba(0,0,0,.1)}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-offer-label{background-color:#000;padding:12px 32px;margin-bottom:24px;display:inline-block}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-offer-text{color:#fff;font-weight:700;font-size:20px;letter-spacing:.05em;margin:0}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-description{color:rgba(255,255,255,.95);font-size:18px;font-weight:500;margin:0 0 32px!important}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-cta-btn{display:inline-flex;align-items:center;justify-content:center;height:48px;background-color:#fff;color:#a855f7;font-size:18px;font-weight:700;border:none;border-radius:24px;padding:0 40px;cursor:pointer;box-shadow:0 20px 25px -5px rgba(0,0,0,.1);transition:.2s;text-decoration:none}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-cta-btn:hover{background-color:rgba(255,255,255,.9);box-shadow:0 25px 50px -12px rgba(0,0,0,.25);transform:scale(1.05)}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-learn-more{background:0 0;border:none;color:rgba(255,255,255,.9);font-size:14px;text-decoration:underline;text-underline-offset:4px;cursor:pointer;padding:8px;margin-top:16px;transition:color .2s}@media (max-width:768px){.ays-survey-black-friday-popup-overlay{display:none!important}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-content{width:90vw;max-width:400px;height:380px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-main-content{padding:0 32px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge{width:80px;height:80px;top:24px;right:24px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge-text-sm{font-size:20px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge-text-lg{font-size:26px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge-text-md,.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-offer-text{font-size:18px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-title-bundle,.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-title-mega{font-size:48px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-description{font-size:16px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-pattern-text{font-size:72px}}@media (max-width:480px){.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-content{width:95vw;max-width:340px;height:360px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-main-content{padding:0 24px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge{width:70px;height:70px;top:20px;right:20px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge-text-sm,.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-offer-text{font-size:16px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge-text-lg{font-size:22px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-badge-text-md{font-size:14px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-hashtag{font-size:12px;margin-bottom:12px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-title-bundle,.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-title-mega{font-size:40px;margin-bottom:8px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-offer-label{padding:10px 24px;margin-bottom:20px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-description{font-size:15px;margin-bottom:24px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-cta-btn{font-size:16px;height:44px;padding:0 32px}.ays-survey-black-friday-popup-overlay .ays-survey-black-friday-popup-pattern-text{font-size:60px}}
                </style>
                <?php
                }
            }
        }
    }
}
