<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Survey_Maker
 * @subpackage Survey_Maker/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Survey_Maker
 * @subpackage Survey_Maker/public
 * @author     Survey Maker team <info@ays-pro.com>
 */
class Survey_Maker_Public {

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

	private $html_class_prefix = 'ays-survey-';
	private $html_name_prefix = 'ays-survey-';
	private $name_prefix = 'survey_';
	private $unique_id;
	private $unique_id_in_class;
	private $options;
    private $settings;
    protected $default_texts;
    private $buttons_texts;
    private $lazy_loading;
    private $message_variable_data;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->settings = new Survey_Maker_Settings_Actions($this->plugin_name);

        add_shortcode('ays_survey', array($this, 'ays_generate_survey_method'));        
        add_shortcode('ays_survey_popup', array($this, 'ays_generate_survey_popup_method'));
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Survey_Maker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Survey_Maker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        wp_enqueue_style( $this->plugin_name . "-font-awesome", plugin_dir_url( __FILE__ ) . 'css/survey-maker-font-awesome.min.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name . "-transition", plugin_dir_url( __FILE__ ) . 'css/transition.min.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name . "-dropdown", plugin_dir_url( __FILE__ ) . 'css/dropdown.min.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name . '-select2', plugin_dir_url(__FILE__) . 'css/survey-maker-select2.min.css', array(), $this->version, 'all');
		wp_enqueue_style( $this->plugin_name . "-loaders", plugin_dir_url( __FILE__ ) . 'css/loaders.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name . '-timepicker', plugin_dir_url( __FILE__ ) . '/css/survey-maker-timepicker.css', array(), $this->version, 'all');

    }
    
    public function enqueue_styles_early(){
		wp_enqueue_style( $this->plugin_name . '-min', plugin_dir_url( __FILE__ ) . 'css/survey-maker-public-min.css', array(), $this->version, 'all' );
    }

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Survey_Maker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Survey_Maker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        $is_elementor_exists = Survey_Maker_Data::ays_survey_is_elementor();
        if( !$is_elementor_exists ){
            wp_enqueue_script( $this->plugin_name . '-autosize', plugin_dir_url( __FILE__ ) . 'js/survey-maker-autosize.js', array( 'jquery' ), $this->version, false );
            wp_enqueue_script( $this->plugin_name . '-transition', plugin_dir_url( __FILE__ ) . 'js/transition.min.js', array( 'jquery' ), $this->version, false );
            wp_enqueue_script( $this->plugin_name . '-dropdown', plugin_dir_url( __FILE__ ) . 'js/dropdown.min.js', array( 'jquery' ), $this->version, false );
            wp_enqueue_script( $this->plugin_name . '-select2js', plugin_dir_url(__FILE__) . 'js/survey-maker-select2.min.js', array('jquery'), $this->version, false);
            wp_enqueue_script( $this->plugin_name . '-plugin', plugin_dir_url( __FILE__ ) . 'js/survey-maker-public-plugin.js', array( 'jquery' ), $this->version, false );
            wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/survey-maker-public.js', array( 'jquery' ), $this->version, false );
            wp_enqueue_script( $this->plugin_name . '-sweetalert-js', SURVEY_MAKER_PUBLIC_URL . '/js/survey-maker-sweetalert2.all.min.js', array('jquery'), $this->version, true );
            wp_enqueue_script( $this->plugin_name . '-ajax', plugin_dir_url( __FILE__ ) . 'js/survey-maker-public-ajax.js', array( 'jquery' ), $this->version, false );
            wp_enqueue_script( $this->plugin_name . "-timepicker", plugin_dir_url(__FILE__) . '/js/survey-maker-timepicker.js', array( 'jquery' ), $this->version, false );

            wp_localize_script( $this->plugin_name . '-plugin', 'aysSurveyMakerAjaxPublic', array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'warningIcon' => SURVEY_MAKER_PUBLIC_URL . "/images/warning.svg",
                'autofill_nonce'  => wp_create_nonce('survey_maker_autofill_nonce')
            ) );
            wp_localize_script( $this->plugin_name, 'aysSurveyLangObj', array(
                'notAnsweredText'       => __( 'You have not answered this question', "survey-maker" ),
                'areYouSure'            => __( 'Do you want to finish the quiz? Are you sure?', "survey-maker" ),
                'sorry'                 => __( 'Sorry', "survey-maker" ),
                'unableStoreData'       => __( 'We are unable to store your data', "survey-maker" ),
                'connectionLost'        => __( 'Connection is lost', "survey-maker" ),
                'checkConnection'       => __( 'Please check your connection and try again', "survey-maker" ),
                'selectPlaceholder'     => __( 'Select an answer', "survey-maker" ),
                'shareDialog'           => __( 'Share Dialog', "survey-maker" ),
                'passwordIsWrong'       => __( 'Password is wrong!', "survey-maker" ),
                'choose'                => __( 'Choose', "survey-maker" ),
                'redirectAfter'         => $this->default_texts['redirectingAfter'],
                'emailValidationError'  => $this->default_texts['emailValidationError'],
                'requiredError'         => __( 'This is a required question', "survey-maker" ),
                'minimumVotes'          => __( 'Min votes count should be', "survey-maker" ),
                'maximumVotes'          => __( 'Max votes count should be', "survey-maker" ),
            ) );
        }
	}

    public function enqueue_scripts_popups() {
		wp_enqueue_script( $this->plugin_name . '-popups', plugin_dir_url( __FILE__ ) . 'js/survey-maker-public-popups.js', array( 'jquery' ), $this->version, false );
        wp_localize_script( $this->plugin_name . '-popups', 'aysSurveyMakerPopupsAjaxPublic', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
        ) );
	}

	public function ays_survey_ajax(){
		global $wpdb;

		$results = array(
			"status" => false
		);
		$function = isset($_REQUEST['function']) ? $_REQUEST['function'] : null;
		if($function !== null){
			$data = $_REQUEST;
			$results = array();
			unset($data['action']);
			unset($data['function']);
			switch ($function) {
				case 'ays_finish_survey':
					$results = $this->ays_finish_survey( $data );
					break;
                case 'ays_survey_get_user_information':
                    $results = $this->ays_survey_get_user_information( $data );
                    break;
                case 'ays_survey_popup_set_cookie':
                    $results = $this->ays_survey_popup_set_cookie( $data );
                    break;
			}

            ob_end_clean();
            $ob_get_clean = ob_get_clean();
			echo json_encode( $results );
			wp_die();
		}

        ob_end_clean();
        $ob_get_clean = ob_get_clean();
		echo json_encode( $results );
		wp_die();
	}

	public function ays_finish_survey( $data ){
        $unique_id = isset($data['unique_id']) ? $data['unique_id'] : null;
        if($unique_id === null){
            return array("status" => false, "message" => "No no no" );
        } else {
            global $wpdb;
            $name_prefix = 'ays-survey-';
            $valid_name_prefix = 'survey_';
            $survey_id = isset( $data[ $name_prefix . 'id-' . $unique_id ] ) ? absint( intval( $data[ $name_prefix . 'id-' . $unique_id ] ) ) : null;

            if($survey_id === null){
	            return array("status" => false, "message" => "No no no" );
            }else{
                $survey = Survey_Maker_Data::get_survey_by_id( $survey_id );

                $user_id = get_current_user_id();

                $attr = array(
                    'id' => $survey_id
                );
                $options = Survey_Maker_Data::get_survey_validated_data_from_array( $survey, $attr );

                $answered_questions = isset( $data[ $name_prefix . 'answers-' . $unique_id ] ) && !empty( $data[ $name_prefix . 'answers-' . $unique_id ] ) ? $data[ $name_prefix . 'answers-' . $unique_id ] : array();
                $questions_data = isset( $data[ $name_prefix . 'questions-' . $unique_id ] ) && !empty( $data[ $name_prefix . 'questions-' . $unique_id ] ) ? $data[ $name_prefix . 'questions-' . $unique_id ] : array();

                $survey_additional_wp_data = isset($data[ $valid_name_prefix . 'additional_wp_data' ]) && $data[ $valid_name_prefix . 'additional_wp_data' ] != '' ? json_decode(base64_decode($data[ $valid_name_prefix . 'additional_wp_data' ]) , true) : array();

                $survey_current_page_link = isset( $data['ays_'.$valid_name_prefix.'_current_page_link'] ) && $data['ays_'.$valid_name_prefix.'_current_page_link'] != '' ? sanitize_url( $data['ays_'.$valid_name_prefix.'_current_page_link'] ) : "";

                $survey_current_page_link_html = "<a href='". esc_sql( $survey_current_page_link ) ."' target='_blank' class='ays-survey-current-page-link-a-tag'>". __( "Survey link", "survey-maker" ) ."</a>";

                // Survey modified date
                $survey_modified_date = (isset($survey->date_modified) && $survey->date_modified != '') ? esc_attr( $survey->date_modified ) : "";
                if( $survey_modified_date != "" ){
                    $survey_modified_date = date_i18n( get_option( 'date_format' ), strtotime( $survey_modified_date ) );
                }

                $user_email = '';
                if( isset( $data[ $name_prefix . 'user-email-' . $unique_id ] ) && !empty( $data[ $name_prefix . 'user-email-' . $unique_id ] ) ){
                    if( is_array( $data[ $name_prefix . 'user-email-' . $unique_id ] ) ){
                        $user_emails_arr = $data[ $name_prefix . 'user-email-' . $unique_id ];
                        $user_email = $answered_questions[ $user_emails_arr[ count( $user_emails_arr ) - 1 ] ];
                    }else{
                        $user_email = $answered_questions[ $data[ $name_prefix . 'user-email-' . $unique_id ] ];
                    }
                }
                if( is_array( $user_email ) ){
                    if( isset( $user_email['answer'] ) && !empty( $user_email['answer'] ) ){
                        $user_email = $user_email['answer'];
                    }else{
                        $user_email = '';
                    }
                }
                
                $user_name = '';
                if( isset( $data[ $name_prefix . 'user-name-' . $unique_id ] ) && !empty( $data[ $name_prefix . 'user-name-' . $unique_id ] ) ){
                    if( is_array( $data[ $name_prefix . 'user-name-' . $unique_id ] ) ){
                        $user_names_arr = $data[ $name_prefix . 'user-name-' . $unique_id ];
                        $user_name = $answered_questions[ $user_names_arr[ count( $user_names_arr ) - 1 ] ];
                    }else{
                        $user_name = $answered_questions[ $data[ $name_prefix . 'user-name-' . $unique_id ] ];
                    }
                }
                if( is_array( $user_name ) ){
                    if( isset( $user_name['answer'] ) && !empty( $user_name['answer'] ) ){
                        $user_name = $user_name['answer'];
                    }else{
                        $user_name = '';
                    }
                }

                $result_unique_code = strtoupper( uniqid() );

                $setting_options = Survey_Maker_Data::get_setting_data( 'options' );

                // Do not store IP adressess
                $settings_options[ $valid_name_prefix . 'disable_user_ip' ] = (isset($setting_options[ $valid_name_prefix . 'disable_user_ip' ]) &&  $setting_options[ $valid_name_prefix . 'disable_user_ip' ] == 'on') ? stripslashes( $setting_options[ $valid_name_prefix . 'disable_user_ip' ] ): 'off';
                $survey_disable_user_ip = (isset($setting_options[ $valid_name_prefix . 'disable_user_ip' ]) && $setting_options[ $valid_name_prefix . 'disable_user_ip' ] == 'on') ? true : false;

                // Do not store User Names
                $settings_options[ $valid_name_prefix . 'disable_user_name' ] = (isset($setting_options[ $valid_name_prefix . 'disable_user_name' ]) &&  $setting_options[ $valid_name_prefix . 'disable_user_name' ] == 'on') ? stripslashes( $setting_options[ $valid_name_prefix . 'disable_user_name' ] ): 'off';
                $survey_disable_user_name = (isset($setting_options[ $valid_name_prefix . 'disable_user_name' ]) && $setting_options[ $valid_name_prefix . 'disable_user_name' ] == 'on') ? true : false;

                // Do not store User Emails
                $settings_options[ $valid_name_prefix . 'disable_user_email' ] = (isset($setting_options[ $valid_name_prefix . 'disable_user_email' ]) &&  $setting_options[ $valid_name_prefix . 'disable_user_email' ] == 'on') ? stripslashes( $setting_options[ $valid_name_prefix . 'disable_user_email' ] ): 'off';
                $survey_disable_user_email = (isset($setting_options[ $valid_name_prefix . 'disable_user_email' ]) && $setting_options[ $valid_name_prefix . 'disable_user_email' ] == 'on') ? true : false;

                $survey_question_count = Survey_Maker_Data::get_survey_questions_count($survey_id);
                $survey_sections_count = Survey_Maker_Data::get_survey_sections_count($survey_id);
                $survey_passed_users_count = Survey_Maker_Data::ays_survey_get_passed_users_count($survey_id);

                $user_ip = '';
                if($survey_disable_user_ip){
                    $user_ip = '';
                }else{
                    $user_ip = Survey_Maker_Data::get_user_ip_validated();
                    $user_ip = ($user_ip != 'UNKNOWN') ? $user_ip : '';
                }

                if ( $survey_disable_user_name ) {
                    $user_name  = '';
                    $user_id    = '';
                }

                if ( $survey_disable_user_email ) {
                    $user_email = '';
                    $user_id    = '';
                }

                $survey_user_information = Survey_Maker_Data::get_user_profile_data();
                // Get user first name
                $user_first_name = (isset( $survey_user_information['user_first_name'] ) && $survey_user_information['user_first_name']  != "") ? $survey_user_information['user_first_name'] : '';

                // Get user last name
                $user_last_name  = (isset( $survey_user_information['user_last_name'] ) && $survey_user_information['user_last_name']  != "") ? $survey_user_information['user_last_name'] : '';
                
                // Get user nick name
                $user_nick_name  = (isset( $survey_user_information['user_nickname'] ) && $survey_user_information['user_nickname']  != "") ? $survey_user_information['user_nickname'] : '';

                // Get display name
                $user_display_name  = (isset( $survey_user_information['user_display_name'] ) && $survey_user_information['user_display_name']  != "") ? $survey_user_information['user_display_name'] : '';

                // User Wordpress role
                $user_wordpress_roles = (isset( $survey_user_information['user_wordpress_roles'] ) && $survey_user_information['user_wordpress_roles']  != "") ? $survey_user_information['user_wordpress_roles'] : '';

                // User ip address
                $user_ip_address = (isset( $survey_user_information['user_ip_address'] ) && $survey_user_information['user_ip_address']  != "") ? $survey_user_information['user_ip_address'] : '';

                // User wordpress email
                $user_wordpress_email = (isset( $survey_user_information['user_wordpress_email'] ) && $survey_user_information['user_wordpress_email']  != "") ? esc_attr($survey_user_information['user_wordpress_email']) : '';
                
                // Current date
                $survey_current_date = date_i18n( 'M d, Y', strtotime( sanitize_text_field( $_REQUEST['end_date'] ) ) );
                
                // WP home page url
                $home_main_url = home_url();
                $wp_home_page_url = '<a href="'.$home_main_url.'" target="_blank">'.$home_main_url.'</a>';

                // Current time
                $survey_current_time = explode( ' ', current_time( 'mysql' ) );
                $survey_current_time_only = ($survey_current_time[1]) ? $survey_current_time[1] : '';

                // Get survey author
                $current_survey_user_data = get_userdata( $survey->author_id );
                $current_survey_author = '';
                $current_survey_author_email = '';
                if ( isset( $current_survey_user_data ) && $current_survey_user_data ) {
                    // Get survey author name
                    $current_survey_author = ( isset( $current_survey_user_data->data->display_name ) && $current_survey_user_data->data->display_name != '' ) ? sanitize_text_field( $current_survey_user_data->data->display_name ) : "";
                    // Get survey author email
                    $current_survey_author_email = ( isset( $current_survey_user_data->data->user_email ) && $current_survey_user_data->data->user_email != '' ) ? sanitize_text_field( $current_survey_user_data->data->user_email ) : "";
                }

                $super_admin_email  = "";
                $wp_all_admins = get_users('role=Administrator');
                if(!empty($wp_all_admins)){
                    $super_admin_email = isset($wp_all_admins[0]) ? $wp_all_admins[0]->data->user_email : '';
                }

                $survey_current_post_id = '';
                $survey_current_post_author_email = '';
                $survey_current_post_author_nickname = '';
                $survey_current_post_title = '';
                if(!empty($survey_additional_wp_data)){
                    if(isset($survey_additional_wp_data['survey_post_type']) && $survey_additional_wp_data['survey_post_type'] == 'post'){
                        $survey_current_post_id = isset($survey_additional_wp_data['survey_post_id']) && $survey_additional_wp_data['survey_post_id'] != '' ? $survey_additional_wp_data['survey_post_id'] : '';
                    }

                    $survey_current_post_author_email = isset($survey_additional_wp_data['survey_post_author_email']) && $survey_additional_wp_data['survey_post_author_email'] != '' ? esc_attr($survey_additional_wp_data['survey_post_author_email']) : '';
                    $survey_current_post_author_nickname = isset($survey_additional_wp_data['survey_current_post_author_nickname']) && $survey_additional_wp_data['survey_current_post_author_nickname'] != '' ? esc_attr($survey_additional_wp_data['survey_current_post_author_nickname']) : '';
                    $survey_current_post_title = isset($survey_additional_wp_data['survey_current_post_title']) && $survey_additional_wp_data['survey_current_post_title'] != '' ? esc_attr($survey_additional_wp_data['survey_current_post_title']) : '';
                }

                $get_site_title = get_bloginfo('name');

                $detectedDevice = Survey_Maker_Data::ays_survey_detected_device_chart();
                
                $message_data = array(
                    'survey_title'                => stripslashes($survey->title),
                    'survey_id'                   => stripslashes($survey->id),
                    'post_id'                     => $survey_current_post_id,
                    'user_name'                   => $user_name,
                    'user_email'                  => $user_email,
                    'user_wordpress_email'        => $user_wordpress_email,
                    'user_id'                     => $user_id,
                    'questions_count'             => $survey_question_count,
                    'current_date'                => $survey_current_date,
                    'current_time'                => $survey_current_time_only,
                    'unique_code'                 => $result_unique_code,
                    'sections_count'              => $survey_sections_count,
                    'users_count'                 => $survey_passed_users_count,
                    'users_first_name'            => $user_first_name,
                    'users_last_name'             => $user_last_name,
                    'users_nick_name'             => $user_nick_name,
                    'users_display_name'          => $user_display_name,
                    'users_ip_address'            => $user_ip_address,
                    'user_wordpress_roles'        => $user_wordpress_roles,
                    'creation_date'               => date_i18n( get_option( 'date_format' ), strtotime( sanitize_text_field( $survey->date_created ) ) ),
                    'modified_date'               => $survey_modified_date,
                    'current_survey_author'       => $current_survey_author,
                    'current_survey_author_email' => $current_survey_author_email,
                    'current_survey_page_link'    => $survey_current_page_link_html,
                    'admin_email'                 => $super_admin_email,
                    'home_page_url'               => $wp_home_page_url,
                    'post_author_email'           => $survey_current_post_author_email,
                    'post_author_nickname'        => $survey_current_post_author_nickname,
                    'post_title'                  => $survey_current_post_title,
                    'site_title'                  => $get_site_title,
                );

                $send_data = array(
                    'questions_data'              => $questions_data,
                    'answered_questions'          => $answered_questions,
                    'survey'                      => $survey,
                    'questions_ids'               => $survey->question_ids,
                    'user_id'                     => $user_id,
                    'user_ip'                     => $user_ip,
                    'user_name'                   => $user_name,
                    'user_email'                  => $user_email,
                    'start_date'                  => current_time( 'mysql' ),
                    'end_date'                    => current_time( 'mysql' ),
                    'unique_code'                 => $result_unique_code,
                    'detectedDevice'              => $detectedDevice,
                );
                $check_limitations = false;
                if(isset($options['survey_limit_users']) && $options['survey_limit_users']){
                    $limit_users_by = isset($options['survey_limit_users_by']) && $options['survey_limit_users_by'] != "" ? $options['survey_limit_users_by'] : "";
                    $limit_users_attr = array(
                        'id'    => $survey_id,
                        'name'  => 'ays_survey_cookie_',
                        'title' => $survey->title,
                    );
                    $check_limitations = $this->ays_survey_check_limitations($limit_users_by, $limit_users_attr);
                }
                $result = $this->add_results_to_db( $send_data );

                // Get submission count
                $survey_submission_count_and_ids = Survey_Maker_Data::get_submission_count_and_ids_for_summary($survey_id);
                $survey_submission_count = isset($survey_submission_count_and_ids['submission_count']) && $survey_submission_count_and_ids['submission_count'] != '' ? esc_attr($survey_submission_count_and_ids['submission_count']) : '';
                $message_data['submission_count'] = $survey_submission_count;
                

                $thank_you_message = trim( $options[ $valid_name_prefix . 'final_result_text' ] );
                if( $thank_you_message == '' ){
                    $thank_you_message = __( "Thank you for completing this survey.", "survey-maker" );
                }

                $thank_you_message = Survey_Maker_Data::replace_message_variables($thank_you_message, $message_data);

                $thank_you_message = Survey_Maker_Data::ays_autoembed( $thank_you_message );
                
                $heading_for_share_buttons = '';
                if( isset($options['survey_social_buttons']) && $options['survey_social_buttons'] ){
                    $heading_for_share_buttons = $options[ $this->name_prefix . 'social_buttons_heading' ];
                    $heading_for_share_buttons = Survey_Maker_Data::replace_message_variables($heading_for_share_buttons, $message_data);
                    $heading_for_share_buttons = Survey_Maker_Data::ays_autoembed( $heading_for_share_buttons );
                }

            	return array(
                    'status' => $result,
                    "message" => $thank_you_message,
                    "limited" => $check_limitations,
                    "socialHeading" => $heading_for_share_buttons
                );
            }
        }

        return array("status" => false, "message" => "No no no" );
    }

    protected function add_results_to_db( $data ){
        global $wpdb;

        $questions_table = ( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "questions";
        $answers_table = ( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "answers";
        $submissions_table = ( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "submissions";
        $submissions_questions_table = ( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "submissions_questions";

        $survey = $data['survey'];
        $questions_ids = $data['questions_ids'];
        $user_id = $data['user_id'];
        $user_ip = $data['user_ip'];
        $user_name = $data['user_name'];
        $user_email = $data['user_email'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $answered_questions = $data['answered_questions'];
        $questions_data = $data['questions_data'];
        $duration = strtotime($end_date) - strtotime($start_date);
        $unique_code = $data['unique_code'];
        $detectedDevice = $data['detectedDevice'];

        $question_ids_array = $questions_ids != '' ? explode(',', $questions_ids) : array();
        $questions_count = count( $question_ids_array );

        $options = array(
            'device' => $detectedDevice,
        );

        $results_submissions = $wpdb->insert(
            $submissions_table,
            array(
                'survey_id' => absint( intval( $survey->id ) ),
                'questions_ids' => $questions_ids,
                'user_id' => $user_id,
                'user_ip' => $user_ip,
                'user_name' => $user_name,
                'user_email' => $user_email,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'submission_date' => $end_date,
                'duration' => $duration,
                'questions_count' => $questions_count,
                'unique_code' => $unique_code,
                'options' => json_encode($options)
            ),
            array(
                '%d', // survey_id
                '%s', // questions_ids
                '%d', // user_id
                '%s', // user_ip
                '%s', // user_name
                '%s', // user_email
                '%s', // start_date
                '%s', // end_date
                '%s', // submission_date
                '%s', // duration
                '%s', // questions_count
                '%s', // unique_code
                '%s' // options
            )
        );

        $submission_id = $wpdb->insert_id;

        $results_submissions_questions = 0;
        foreach ($question_ids_array as $key => $qid) {
            $questions_options = array(

            );

            $user_answer = '';
            $user_variant = '';
            $section_id = $questions_data[$qid]['section'];

            $question_answer = '';
            if( isset( $answered_questions[$qid] ) ){
                if( isset( $answered_questions[$qid]['other'] ) ){
                    $user_variant = $answered_questions[$qid]['other'];
                    unset( $answered_questions[$qid]['other'] );
                }

                if( is_array( $answered_questions[$qid] ) ){
                    if( isset( $answered_questions[$qid]['answer'] ) && !empty( $answered_questions[$qid]['answer'] ) ){
                        $question_answer = $answered_questions[$qid]['answer'];
                    }else{
                        $question_answer = '';
                    }
                }else{
                    $question_answer = $answered_questions[$qid];
                }
            }
            $answer_id = $question_answer;

            $question_type = (isset($questions_data[$qid]['questionType']) && $questions_data[$qid]['questionType'] != '') ? stripslashes ( sanitize_text_field( $questions_data[$qid]['questionType'] ) ) : 'radio';
            switch ( $question_type ) {
                case "radio":
                    $user_answer = '';
                    if($question_answer != ""){
                        $user_variant = '';
                    }
                    break;
                case "checkbox":
                    if( is_array( $question_answer ) ){
                        if( !in_array( '0', $question_answer ) ){
                            $user_variant = '';
                        }
                        $user_answer = implode(',', $question_answer);
                    }else{
                        $user_answer = $question_answer;
                        if( '0' != $question_answer ){
                            $user_variant = '';
                        }
                    }
                    $answer_id = 0;
                    break;    
                case "select":
                    $user_answer = '';
                    break;
                case "text":
                case "star":
                    $user_answer = $question_answer;
                    $answer_id = 0;
                    break;
                case "short_text":
                    $user_answer = $question_answer;
                    $answer_id = 0;
                    break;
                case "number":
                case "phone":
                case "date":
                case "time":
                    $user_answer = $question_answer;
                    $answer_id = 0;
                    break;
                case "date_time":
                    if(is_array($question_answer) && ($question_answer['date'] != '' || $question_answer['time'] != '')){
                        $question_answer['date'] = $question_answer['date'] != '' ? $question_answer['date'] : '-';
                        $question_answer['time'] = $question_answer['time'] != '' ? $question_answer['time'] : '-';
                        $user_answer = implode(" " , $question_answer);
                    }
                    else{
                        $user_answer = $question_answer;
                    }
                    $answer_id = 0;
                    break;
                case "name":
                    $user_answer = $question_answer;
                    $answer_id = 0;
                    break;
                case "email":
                    $user_answer = $question_answer;
                    $answer_id = 0;
                    break;
                default:
                    $user_answer = '';
                    break;
            }

            $results_submissions_quests = $wpdb->insert(
                $submissions_questions_table,
                array(
                    'submission_id' => intval( $submission_id ),
                    'question_id' => intval( $qid ),
                    'section_id' => intval( $section_id ),
                    'survey_id' => intval( $survey->id ),
                    'user_id' => $user_id,
                    'answer_id' => intval( $answer_id ),
                    'user_answer' => $user_answer,
                    'user_variant' => $user_variant,
                    'user_explanation' => '',
                    'type' => $question_type,
                    'options' => json_encode( $questions_options )
                ),
                array(
                    '%d', // submission_id
                    '%d', // question_id
                    '%d', // section_id
                    '%d', // survey_id
                    '%d', // user_id
                    '%d', // answer_id
                    '%s', // user_answer
                    '%s', // user_variant
                    '%s', // user_explanation
                    '%s', // type
                    '%s', // options
                )
            );
        }

        if ($results_submissions >= 0) {
            return true;
        }

        return false;
    }

    public function ays_generate_survey_method( $attr ){
        $id = (isset($attr['id'])) ? absint(intval($attr['id'])) : null;
        $this->default_texts = Survey_Maker_Data::ays_set_default_texts( $this->plugin_name, array() );
        
        if (is_null($id)) {
            $content = "<p class='wrong_shortcode_text' style='color:red;'>" . $this->default_texts['wrongShortcode'] . "</p>";
            return $content;
        }
        
        $this->enqueue_styles();
        $this->enqueue_scripts();

        $content = $this->show_survey($id, $attr);
        return str_replace( array( "\r\n", "\n", "\r" ), '', $content );
    }

    public function show_survey( $id, $attr ){

    	$survey = Survey_Maker_Data::get_survey_by_id( $id );

        if ( is_null( $survey ) ) {
            return "<p class='wrong_shortcode_text' style='color:red;'>" . $this->default_texts['wrongShortcode'] . "</p>";
        }

    	$status = isset( $survey->status ) && $survey->status != '' ? sanitize_text_field($survey->status) : '';

        if ( $status == 'trashed' ) {
            return "<p class='wrong_shortcode_text' style='color:red;'>" . $this->default_texts['wrongShortcode'] . "</p>";
        }
        elseif( $status == 'draft' ){
            return '';
        }

        $unique_id = uniqid();
        $this->unique_id = $unique_id;
        $this->unique_id_in_class = $id . "-" . $unique_id;;

        /*******************************************************************************************************/

        $settings_options = $this->settings->ays_get_setting('options');
        if($settings_options){
            $settings_options = json_decode( $settings_options, true );
        }else{
            $settings_options = array();
        }
    
        // $this->buttons_texts = Survey_Maker_Data::ays_set_survey_texts( $this->plugin_name, $this->options );

        $this->message_variable_data = Survey_Maker_Data::ays_set_survey_message_variables_data( $id, $survey, $settings_options );

        $this->options = Survey_Maker_Data::get_survey_validated_data_from_array( $survey, $attr );

        $this->buttons_texts = Survey_Maker_Data::ays_set_survey_texts( $this->plugin_name, $this->options );

        
        $user_id = get_current_user_id();

        /*******************************************************************************************************/

        /*
        ==========================================
        General settings
        ==========================================
        */

        // Textarea height (public)
        $this->options[ $this->name_prefix . 'textarea_height' ] = (isset($settings_options['survey_textarea_height']) && $settings_options['survey_textarea_height'] != '' && $settings_options['survey_textarea_height'] != 0) ? absint( sanitize_text_field($settings_options['survey_textarea_height']) ) : 100;

        // Lazy loading for images
        $this->options[ $this->name_prefix . 'lazy_loading_for_images' ] = (isset($settings_options['survey_lazy_loading_for_images']) && $settings_options['survey_lazy_loading_for_images'] == 'on') ? true : false;
        $this->lazy_loading = '';
        if($this->options[ $this->name_prefix . 'lazy_loading_for_images' ]){
            $this->lazy_loading = Survey_Maker_Data::survey_lazy_loading_for_images($this->options[ $this->name_prefix . 'lazy_loading_for_images' ]);
        }
        /*******************************************************************************************************/
        
        
        $options = isset( $survey->options ) && $survey->options != '' ? json_decode( $survey->options, true ) : array();
    	
    	$sections_ids = isset( $survey->section_ids ) && $survey->section_ids != '' ? $survey->section_ids : '';
        $question_ids = isset( $survey->question_ids ) && $survey->question_ids != '' ? $survey->question_ids : '';
    	
    	if( $sections_ids != '' ){
    		$section_ids_array = explode( ',', $sections_ids );
    	}else{
    		$section_ids_array = array();
        }
        
        /*******************************************************************************************************/
        /* Limit users                                                                                         */
        /*******************************************************************************************************/
        $limit = false;
        $limit_message = false;
        $limit_users_attr = array(
            'id' => $id,
            'name' => 'ays_survey_cookie_',
            'title' => $survey->title,
        );
        if( $this->options[ $this->name_prefix . 'limit_users' ] ){
            switch( $this->options[ $this->name_prefix . 'limit_users_by' ] ){
                case 'ip':
                    $limit_by = Survey_Maker_Data::get_limit_user_by_ip( $id );
                    $remove_cookie = Survey_Maker_Data::ays_survey_remove_cookie( $limit_users_attr );
                break;
                case 'user_id':
                    $limit_by = Survey_Maker_Data::get_limit_user_by_id( $id, $user_id );
                    $remove_cookie = Survey_Maker_Data::ays_survey_remove_cookie( $limit_users_attr );
                    if( ! is_user_logged_in() ){
                        $limit_by = 0;
                    }
                break;
                case 'cookie':
                    $check_cookie = Survey_Maker_Data::ays_survey_check_cookie( $limit_users_attr );
                    if ( !$check_cookie ) {
                        $limit_by = 0;
                    }else{
                        $limit_by = Survey_Maker_Data::get_limit_cookie_count( $limit_users_attr );
                    }
                break;
                case 'ip_cookie':
                    $check_cookie = Survey_Maker_Data::ays_survey_check_cookie( $limit_users_attr );
                    $check_user_by_ip = Survey_Maker_Data::get_user_by_ip( $id );
                    if($check_cookie || $check_user_by_ip > 0){
                        $limit_by = $check_user_by_ip;
                    }elseif(! $check_cookie || $check_user_by_ip <= 0){
                        $limit_by = 0;
                    }
                break;

            }

            if( $limit_by > 0 ){
                $limit = true;
                $limit_message = $this->options[ $this->name_prefix . 'limitation_message' ];
                $limit_message = Survey_Maker_Data::replace_message_variables($this->options[ $this->name_prefix . 'limitation_message' ], $this->message_variable_data);
                
                if( $limit_message == '' ){
                    $limit_message = __( "You've already responded", "survey-maker" );
                }
            }
        }
        
        $logged_in_limit = false;
        $logged_in_limit_message = false;
        if( $this->options[ $this->name_prefix . 'enable_logged_users' ] ){
            if( ! is_user_logged_in() ){
                // $limit = true;
                // $limit_message = $this->options[ $this->name_prefix . 'logged_in_message' ];
                
                // if( $limit_message == '' ){
                //     $limit_message = "<h4 style='margin-top:0;'>" . __( "Sign in to continue", "survey-maker" ) . "</h4>";
                //     $limit_message .= "<p>" . __( "To fill out this form, you must be signed in. Your identity will remain anonymous.", "survey-maker" ) . "</p>";
                // }

                $logged_in_limit = true;
                $logged_in_limit_message = $this->options[ $this->name_prefix . 'logged_in_message' ];
                $logged_in_limit_message = Survey_Maker_Data::replace_message_variables($logged_in_limit_message, $this->message_variable_data);

                if( $logged_in_limit_message == '' ){
                    $logged_in_limit_message = "<h4 style='margin-top:0;text-align:center;'>" . __( "Sign in to continue", "survey-maker" ) . "</h4>";
                    $logged_in_limit_message .= "<p style='margin-top:0;text-align:center;'>" . __( "To fill out this form, you must be signed in. Your identity will remain anonymous.", "survey-maker" ) . "</p>";
                }
            }

            // Show login form for not logged in users
            $survey_login_form = "";
            if($this->options[ $this->name_prefix . 'show_login_form' ]){
                $ays_survey_login_button_text = $this->buttons_texts[ 'loginButton' ];
                $args = array(
                    'echo' => false,
                    'id_username'  => 'user_login',
                    'id_password'  => 'user_pass',
                    'id_remember'  => 'rememberme',
                    'id_submit'    => 'wp-submit',
                    'label_log_in' => $ays_survey_login_button_text,
                );
                $survey_login_form = "<div class='ays_survey_login_form'>" . wp_login_form( $args ) . "</div>";
            }
            
            if($logged_in_limit){
                if(!is_user_logged_in()){
                    $logged_in_limit_message .= $survey_login_form;
                }
            }
        }

        // Limitation tackers of quiz
        $tackers_message = "<div><p class='".$this->name_prefix."expired-survey-message'>" . __( "This survey has expired!", "survey-maker" ) . "</p></div>";
        $takers_count = Survey_Maker_Data::get_survey_takers_count($id);
        
        if($this->options[ $this->name_prefix . 'enable_takers_count' ]){
            if($this->options[ $this->name_prefix . 'takers_count' ] <= $takers_count ){
                $limit = true;
                $limit_message = $tackers_message;
            }
        }


        $survey_loader = $this->options[ $this->name_prefix . 'loader' ];
        $survey_loader_text = '';
        if(isset($this->options['options'])){
            $survey_loader_text = isset($this->options['options'][ $this->name_prefix . 'loader_text' ]) && $this->options['options'][ $this->name_prefix . 'loader_text' ] != "" ? stripslashes(esc_attr($this->options['options'][ $this->name_prefix . 'loader_text' ])) : '';
        }

        // Loader Gif
        $survey_loader_gif = (isset($this->options[ $this->name_prefix . 'loader_gif' ]) && $this->options[ $this->name_prefix . 'loader_gif' ] != '') ? $this->options[ $this->name_prefix . 'loader_gif' ]  : '';
        $survey_loader_gif_width = (isset($this->options[ $this->name_prefix . 'loader_gif_width' ]) && $this->options[ $this->name_prefix . 'loader_gif_width' ] != '') ? stripslashes( $this->options[ $this->name_prefix . 'loader_gif_width' ] )  : '';

        switch( $survey_loader ){
            case 'default':
                $survey_loader_html = "<div data-class='lds-ellipsis' data-role='loader' class='ays-loader'><div></div><div></div><div></div><div></div></div>";
                break;
            case 'circle':
                $survey_loader_html = "<div data-class='lds-circle' data-role='loader' class='ays-loader'></div>";
                break;
            case 'dual_ring':
                $survey_loader_html = "<div data-class='lds-dual-ring' data-role='loader' class='ays-loader'></div>";
                break;
            case 'facebook':
                $survey_loader_html = "<div data-class='lds-facebook' data-role='loader' class='ays-loader'><div></div><div></div><div></div></div>";
                break;
            case 'hourglass':
                $survey_loader_html = "<div data-class='lds-hourglass' data-role='loader' class='ays-loader'></div>";
                break;
            case 'ripple':
                $survey_loader_html = "<div data-class='lds-ripple' data-role='loader' class='ays-loader'><div></div><div></div></div>";
                break;
            // case 'text':
            //     if ($quiz_loader_text_value != '') {
            //         $survey_loader_html = "
            //         <div class='ays-loader' data-class='text' data-role='loader'>
            //             <p class='ays-loader-content'>". $quiz_loader_text_value ."</p>
            //         </div>";
            //     }else{
            //         $survey_loader_html = "<div data-class='lds-ellipsis' data-role='loader' class='ays-loader'><div></div><div></div><div></div><div></div></div>";
            //     }
            //     break;
            case 'snake':
                $survey_loader_html = '<div class="ays-survey-loader" data-class="ays-survey-loader-snake" data-role="loader"><div></div><div></div><div></div><div></div><div></div><div></div></div>';
            break;
            case 'text':
                $survey_loader_html = '<div class="ays-survey-loader ays-survey-loader-with-text" data-class="ays-survey-loader-text" data-role="loader">'.$survey_loader_text.'</div>';
            break;
            case 'custom_gif':
                $survey_loader_html = '<div class="ays-survey-loader ays-survey-loader-with-custom-gif" data-class="ays-survey-loader-cistom-gif" data-role="loader"><img src="'.$survey_loader_gif.'" '.$this->lazy_loading.' style="width: '.$survey_loader_gif_width.'px;object-fit:cover;"></div>';
            break;
            default:
                $survey_loader_html = "<div data-class='lds-ellipsis' data-role='loader' class='ays-loader'><div></div><div></div><div></div><div></div></div>";
            break;
        }

        $this->options[ $this->name_prefix . 'loader_html' ] = $survey_loader_html;

        /*
         * Schedule quiz
         * Check is quiz expired
         */
        
        $is_expired = false;
        $active_date_check = false;
        $startDate_atr = '';
        $endDate_atr = '';
        $current_time = strtotime( current_time( "Y:m:d H:i:s" ) );
		$startDate = strtotime( $this->options[ $this->name_prefix . 'schedule_active' ] );
        $endDate   = strtotime( $this->options[ $this->name_prefix . 'schedule_deactive' ] );
        
		$expired_survey_message = __('The survey has expired.', "survey-maker");

        if ( $this->options[ $this->name_prefix . 'enable_schedule' ] ) {
            $active_date_check = true;

            if ( $this->options[ $this->name_prefix . 'schedule_active' ] ) {
                $startDate_atr = $startDate - $current_time;
            }elseif ( $this->options[ $this->name_prefix . 'schedule_deactive' ] ) {
                $endDate_atr = $endDate - $current_time;
            }

            if ($startDate > $current_time) {
                if($this->options[ $this->name_prefix . 'dont_show_survey_container' ]){
                    $hide_survey_and_popup = '
                    <style>
                        .' . $this->html_class_prefix . 'popup-survey-window[data-survey-id="' . $id . '"]{
                            display:none !important;
                    }
                    </style>';
                    return $hide_survey_and_popup;
                }
				$is_expired = true;
                $expired_survey_message = $this->options[ $this->name_prefix . 'schedule_pre_start_message' ];
			}elseif ($endDate < $current_time) {
                if($this->options[ $this->name_prefix . 'dont_show_survey_container' ]){
                    $hide_survey_and_popup = '
                    <style>
                        .' . $this->html_class_prefix . 'popup-survey-window[data-survey-id="' . $id . '"]{
                            display:none !important;
                    }
                    </style>';
                    return $hide_survey_and_popup;
                }
                $is_expired = true;
                $expired_survey_message = $this->options[ $this->name_prefix . 'schedule_expiration_message' ];
            }
		}
        
        if( !$limit ){
            $sections = Survey_Maker_Data::get_sections_by_survey_id( $sections_ids );
            $sections_count = count( $sections );

                
            $question_types_placeholders = array(
                "radio" => '',
                "checkbox" => '',
                "select" => '',
                "yesorno" => '',
                "text" => __("Your answer", "survey-maker"),
                "short_text" => __("Your answer", "survey-maker"),
                "number" => __("Your answer", "survey-maker"),
                "email" => __("Your email", "survey-maker"),
                "name" => __("Your name", "survey-maker"),
            );

            $multiple_sections = $sections_count > 1 ? true : false;

            foreach ($sections as $section_key => $section) {
                $sections[$section_key]['title'] = (isset($section['title']) && $section['title'] != '') ? stripslashes( esc_html( $section['title'] ) ) : '';

                if ( $this->options[ $this->name_prefix . 'allow_html_in_section_description' ] ) {
                    $sections[$section_key]['description'] = (isset($section['description']) && $section['description'] != '') ? nl2br( $section['description'] ) : '';
                } else {
                    $sections[$section_key]['description'] = (isset($section['description']) && $section['description'] != '') ? nl2br( esc_html( $section['description'] ) ) : '';
                }

                $section_questions = Survey_Maker_Data::get_questions_by_section_id( intval( $section['id'] ), $question_ids );

                foreach ($section_questions as $question_key => $question) {
                    $section_questions[$question_key]['question'] = (isset($question['question']) && $question['question'] != '') ? nl2br( $question['question'] ) : '';
                    $section_questions[$question_key]['image'] = (isset($question['image']) && $question['image'] != '') ? $question['image'] : '';
                    $section_questions[$question_key]['type'] = (isset($question['type']) && $question['type'] != '') ? $question['type'] : 'radio';
                    $section_questions[$question_key]['user_variant'] = (isset($question['user_variant']) && $question['user_variant'] == 'on') ? true : false;

                    $opts = json_decode( $question['options'], true );
                    $opts['required'] = (isset($opts['required']) && $opts['required'] == 'on') ? true : false;
                    $opts['enable_max_selection_count'] = (isset($opts['enable_max_selection_count']) && $opts['enable_max_selection_count'] == 'on') ? true : false;
                    $opts['max_selection_count'] = (isset($opts['max_selection_count']) && $opts['max_selection_count'] != '') ? intval( $opts['max_selection_count'] ) : null;
                    $opts['min_selection_count'] = (isset($opts['min_selection_count']) && $opts['min_selection_count'] != '') ? intval( $opts['min_selection_count'] ) : null;
                    // Text Limitations
                    $opts['enable_word_limitation'] = (isset($opts['enable_word_limitation']) && $opts['enable_word_limitation'] == 'on') ? true : false;
                    $opts['limit_by']      = (isset($opts['limit_by']) && $opts['limit_by'] != '') ? sanitize_text_field($opts['limit_by'])  : '';
                    $opts['limit_length']  = (isset($opts['limit_length']) && $opts['limit_length'] != '') ? intval( $opts['limit_length'] ) : '';
                    $opts['limit_counter'] = (isset($opts['limit_counter']) && $opts['limit_counter'] == 'on') ? true : false;

                    // Number Limitations
                    $opts['enable_number_limitation'] = (isset($opts['enable_number_limitation']) && $opts['enable_number_limitation'] == 'on') ? true : false;
                    $opts['number_min_selection']     = (isset($opts['number_min_selection']) && $opts['number_min_selection'] != '') ? sanitize_text_field($opts['number_min_selection'])  : '';
                    $opts['number_max_selection']     = (isset($opts['number_max_selection']) && $opts['number_max_selection'] != '') ? sanitize_text_field($opts['number_max_selection'])  : '';
                    $opts['number_error_message']  = (isset($opts['number_error_message']) && $opts['number_error_message'] != '') ? sanitize_text_field($opts['number_error_message']) : '';
                    $opts['enable_number_error_message']  = (isset($opts['enable_number_error_message']) && $opts['enable_number_error_message'] == 'on') ? true : false;
                    $opts['number_limit_length']  = (isset($opts['number_limit_length']) && $opts['number_limit_length'] != '') ? intval( $opts['number_limit_length'] ) : '';
                    $opts['enable_number_limit_counter'] = (isset($opts['enable_number_limit_counter']) && $opts['enable_number_limit_counter'] == 'on') ? true : false;
                    // Input types placeholders
                    $opts['placeholder'] = (isset($opts['survey_input_type_placeholder'])) ? stripslashes(esc_attr($opts['survey_input_type_placeholder'])) : $question_types_placeholders[$section_questions[$question_key]['type']];
                    $opts['image_caption'] = (isset($opts['image_caption'])) ? stripslashes(esc_attr($opts['image_caption'])) : '';
                    $opts['image_caption_enable'] = (isset($opts['image_caption_enable']) && $opts['image_caption_enable'] == 'on') ? true : false;

                    
                    if( $section_questions[$question_key]['type'] == 'checkbox' ){
                        $this->options[ 'survey_checkbox_options' ][$question['id']]['enable_max_selection_count'] = $opts['enable_max_selection_count'];
                        $this->options[ 'survey_checkbox_options' ][$question['id']]['max_selection_count'] = $opts['max_selection_count'];
                        $this->options[ 'survey_checkbox_options' ][$question['id']]['min_selection_count'] = $opts['min_selection_count'];        
                    }

                    if( $section_questions[$question_key]['type'] == 'text' || $section_questions[$question_key]['type'] == 'short_text'){
                        $this->options[ 'survey_text_limit_options' ][$question['id']]['enable_word_limitation'] = $opts['enable_word_limitation'];
                        $this->options[ 'survey_text_limit_options' ][$question['id']]['limit_by'] = $opts['limit_by'];
                        $this->options[ 'survey_text_limit_options' ][$question['id']]['limit_length'] = $opts['limit_length'];        
                        $this->options[ 'survey_text_limit_options' ][$question['id']]['limit_counter'] = $opts['limit_counter'];        
                    }

                    if( $section_questions[$question_key]['type'] == 'number' || $section_questions[$question_key]['type'] == 'phone'){
                        $this->options[ 'survey_number_limit_options' ][$question['id']]['enable_number_limitation'] = $opts['enable_number_limitation'];
                        $this->options[ 'survey_number_limit_options' ][$question['id']]['number_min_selection'] = $opts['number_min_selection'];
                        $this->options[ 'survey_number_limit_options' ][$question['id']]['number_max_selection'] = $opts['number_max_selection'];        
                        $this->options[ 'survey_number_limit_options' ][$question['id']]['number_error_message'] = $opts['number_error_message'];        
                        $this->options[ 'survey_number_limit_options' ][$question['id']]['enable_number_error_message'] = $opts['enable_number_error_message'];        
                        $this->options[ 'survey_number_limit_options' ][$question['id']]['number_limit_length'] = $opts['number_limit_length'];        
                        $this->options[ 'survey_number_limit_options' ][$question['id']]['enable_number_limit_counter'] = $opts['enable_number_limit_counter'];        
                    }

                    $q_answers = Survey_Maker_Data::get_answers_by_question_id( intval( $question['id'] ) );

                    foreach ($q_answers as $answer_key => $answer) {
                        $answer_content = (isset($answer['answer']) && $answer['answer'] != '') ? $answer['answer'] : '';

                        if( $this->options[ $this->name_prefix . 'allow_html_in_answers' ] === false ){
                            $answer_content = htmlentities( $answer_content );
                        }

                        $q_answers[$answer_key]['answer'] = stripslashes( $answer_content );
                        $q_answers[$answer_key]['image'] = (isset($answer['image']) && $answer['image'] != '') ? $answer['image'] : '';
                        $q_answers[$answer_key]['placeholder'] = (isset($answer['placeholder']) && $answer['placeholder'] != '') ? $answer['placeholder'] : '';
                    }

                    $section_questions[$question_key]['answers'] = $q_answers;

                    $section_questions[$question_key]['options'] = $opts;
                }

                $sections[$section_key]['questions'] = $section_questions;
            }
        }

        if( $logged_in_limit ){
            $limit = true;
            $limit_message = $logged_in_limit_message;
        }

        $blocked_content_class = '';
        if( ( $limit || $is_expired ) && !$logged_in_limit ){
            $blocked_content_class = " " . $this->html_class_prefix . "blocked-content ";
        }

        $content = array();
    	$content[] = '<div class="' . $this->html_class_prefix . 'container ' . $blocked_content_class . $this->options[ $this->name_prefix . 'custom_class' ] . '" id="' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . '" data-id="' . $unique_id . '" data-theme="'.$this->options[ $this->name_prefix . 'theme' ].'">';

            if(Survey_Maker_Data::ays_survey_is_elementor() || Survey_Maker_Data::ays_survey_is_editor()){
                                
                $content[] = '<div style="display: flex; justify-content: center;font-size: 15px; text-align: center;gap: 4px">';
                    $content[] = '<div><i class="ays_fa ays_fa_info_circle"></i></div>';
                    $content[] = '<div>'. esc_attr( __( "You're in the preview mode. Note: All elements work correctly on the front end." , "survey-maker") ).'</div>';
                $content[] = '</div>';
            }

            if($this->options[ $this->name_prefix . 'enable_survey_start_loader' ] && !Survey_Maker_Data::ays_survey_is_elementor()){
                $content[]  = Survey_Maker_Data::survey_get_loader($this->options[ $this->name_prefix . 'before_start_loader' ]);
            }
        $survey_full_screen_button_pos = $this->options[ $this->name_prefix . 'show_title' ] ? "" : $this->html_class_prefix . "full-screen-and-no-title";
        $survey_no_cover_photo_class = "";
        if( $this->options[ $this->name_prefix . 'full_screen_mode' ] ){
            $survey_cover_photo_class = "";
            if( $this->options[ $this->name_prefix . 'cover_photo' ] != "" ){
                $survey_cover_photo_class = $this->html_class_prefix . "cover-photo-title-wrap";
                $survey_no_cover_photo_class = $this->html_class_prefix . "no-cover-photo";
            }
            $content[] = '<div class="' . $this->html_class_prefix . 'full-screen-and-title ' . $survey_full_screen_button_pos . ' ' . $survey_cover_photo_class . '">';
        }

        if( $this->options[ $this->name_prefix . 'show_title' ] && $this->options[ $this->name_prefix . 'cover_photo' ] != "" ){
            $content[] = '<div class="' . $this->html_class_prefix . 'title-wrap">';
                if( $this->options[ $this->name_prefix . 'full_screen_mode' ] ){
                    $content[] = '<div class="' . $this->html_class_prefix . 'cover-photo-title-wrap ' . $survey_no_cover_photo_class . '">';
                }else{
                    $content[] = '<div class="' . $this->html_class_prefix . 'cover-photo-title-wrap">';
                }
                    $content[] = '<span class="' . $this->html_class_prefix . 'title">' . $survey->title . '</span>';
                $content[] = '</div>';
            $content[] = '</div>';
        }else if( $this->options[ $this->name_prefix . 'cover_photo' ] != "" ){
            $content[] = '<div class="' . $this->html_class_prefix . 'title-wrap">';
                if( $this->options[ $this->name_prefix . 'full_screen_mode' ] ){
                    $content[] = '<div class="' . $this->html_class_prefix . 'cover-photo-title-wrap ' . $survey_no_cover_photo_class . '"></div>';
                }else{
                    $content[] = '<div class="' . $this->html_class_prefix . 'cover-photo-title-wrap"></div>';
                }
            $content[] = '</div>';
        }else if($this->options[ $this->name_prefix . 'show_title' ]){
            $content[] = '<div class="' . $this->html_class_prefix . 'title-wrap">';
                $content[] = '<span class="' . $this->html_class_prefix . 'title">' . $survey->title . '</span>';
            $content[] = '</div>';
        }

        if( $this->options[ $this->name_prefix . 'full_screen_mode' ] && !$limit){
            $content[] =    '<div class="ays-survey-full-screen-mode">
                                <a class="ays-survey-full-screen-container" title="'.__("Full screen" , "survey-maker").'" >
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="#fff" viewBox="0 0 24 24" tabindex="0"  width="24" class="ays-survey-close-full-screen">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M5 16h3v3h2v-5H5v2zm3-8H5v2h5V5H8v3zm6 11h2v-3h3v-2h-5v5zm2-11V5h-2v5h5V8h-3z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="#fff" viewBox="0 0 24 24" tabindex="0" width="24" class="ays-survey-open-full-screen">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>
                                    </svg>
                                </a>
                            </div>';
        }
        if( $this->options[ $this->name_prefix . 'full_screen_mode' ] ){
            $content[] = '</div>';
        }


        if( $this->options[ $this->name_prefix . 'enable_logged_users' ] ){
            if( ! is_user_logged_in() && $this->options[ $this->name_prefix . 'show_login_form'] ){
                $content[] = $this->create_restricted_content( $limit_message );
                $content[] = $this->get_styles();
                $content[] = $this->get_custom_css();
        
                $content[] = $this->get_encoded_options( $limit );
        
                $content[] = '</div>';
                
                $content = implode( '', $content );
                return $content;
            }
        }

    	$content[] = '<form class="' . $this->html_class_prefix . 'form" method="post">';
    	$content[] = '<input type="hidden" name="'. $this->html_name_prefix .'id-' . $unique_id . '" value="'. $id .'">';
        // Get survey current page
        $ays_survey_protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";         
        $current_survey_page_link = esc_url( $ays_survey_protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
    	$content[] = '<input type="hidden" name="'. $this->html_name_prefix .'current_page_link" value="'. $current_survey_page_link .'">';

        if( !$limit && !$is_expired ){
            $content[] = $this->create_sections( $sections );
        }else{
            if( $is_expired && !$limit ){
                $limit_message = $expired_survey_message;
            }
            else if($is_expired && $limit){
                $limit_message = $expired_survey_message;
            }
            
            $content[] = $this->create_restricted_content( $limit_message );
        }
        
        $content[] = '</form>';

        $content[] = $this->get_styles();
        $content[] = $this->get_custom_css();

        $content[] = $this->get_encoded_options( $limit );

        $content[] = '</div>';
        
    	$content = implode( '', $content );
    	return $content;
    }

    public function create_sections( $sections ){

    	$content = array();
    	$content[] = '<div class="' . $this->html_class_prefix . 'sections">';

        
        if( $this->options[ $this->name_prefix . 'enable_start_page'] === true ){
            $content[] = '<div class="' . $this->html_class_prefix . 'section ' . $this->html_class_prefix . 'section-start-page">';

                $content[] = '<div class="' . $this->html_class_prefix . 'section-content ' . $this->options[ $this->name_prefix .'start_page_custom_class'] . '">';
                    
                    $content[] = '<div class="' . $this->html_class_prefix . 'section-header">';

                        $content[] = '<div class="' . $this->html_class_prefix . 'section-title-row">';
                            $content[] = '<span class="' . $this->html_class_prefix . 'section-title">' . stripslashes( $this->options[ $this->name_prefix .'start_page_title'] ) . '</span>';
                        $content[] = '</div>';
                        $survey_start_page_description_content = stripslashes( $this->options[ $this->name_prefix .'start_page_description']);
                        $survey_start_page_description_content = $survey_start_page_description_content;
                        
                        $content[] = '<div class="' . $this->html_class_prefix . 'section-desc">' . $survey_start_page_description_content . '</div>';

                        $content[] = '<div class="' . $this->html_class_prefix . 'section-buttons">';
    
                            $content[] = '<div class="' . $this->html_class_prefix . 'section-button-container" tabindex="0">';
                                $content[] = '<div class="' . $this->html_class_prefix . 'section-button-content">';
                                    $content[] = '<input type="button" class="' . $this->html_class_prefix . 'section-button ' . $this->html_class_prefix . 'start-button" value="'. $this->buttons_texts[ 'startButton' ] .'" />';
                                $content[] = '</div>';
                            $content[] = '</div>';
    
                        $content[] = '</div>';

                    $content[] = '</div>';

                $content[] = '</div>';

            $content[] = '</div>';
        }

        $survey_current_post_id = get_the_ID();
        $survey_current_post_author_email = get_the_author_meta('email');
        $survey_current_post_author_nickname = get_the_author_meta('user_nicename');
        $survey_current_post_title = get_the_title();
        
        $survey_additional_wp_data = array(
            'survey_post_type' => get_post_type(),
            'survey_post_id' => $survey_current_post_id,
            'survey_post_author_email' => $survey_current_post_author_email,
            'survey_current_post_author_nickname' => $survey_current_post_author_nickname,
            'survey_current_post_title' => $survey_current_post_title,
        );

        $additional_data = base64_encode(json_encode($survey_additional_wp_data));

        $sections_count = count( $sections );
    	foreach ( $sections as $key => $section ) {
            $first = $key == 0 ? true : false;
            $last = $key + 1 == $sections_count ? true : false;
            $section_numbering = $key+1;
    		$content[] = $this->create_section( $section, $last, $first , $sections_count , $section_numbering);
        }

        $minimal_theme_header  = $this->options[ $this->name_prefix . 'is_minimal' ] ? 'ays-survey-minimal-theme-header' : "";
        $modern_theme_header   = $this->options[ $this->name_prefix . 'is_modern' ] ? 'ays-survey-modern-theme-header' : "";
        
        $content[] = '<div class="' . $this->html_class_prefix . 'section ' . $this->html_class_prefix . 'results-content">';
            $content[] = '<div class="' . $this->html_class_prefix . 'section-header ' . $minimal_theme_header . ' ' . $modern_theme_header . '">';
            
                $content[] = '<div class="' . $this->html_class_prefix . 'results">';
                    $content[] = '<input type="hidden" value="'.esc_attr($additional_data).'" name="' . $this->name_prefix . 'additional_wp_data'  . '">';
                    $content[] = '<div class="' . $this->html_class_prefix . 'loader">' . $this->options[ $this->name_prefix . 'loader_html' ] . '</div>';
                    $content[] = '<div class="' . $this->html_class_prefix . 'thank-you-page">';

                    if( $this->options[ $this->name_prefix . 'enable_restart_button' ] ){
                        $content[] = '<div class="' . $this->html_class_prefix . 'section-buttons">';
                            $content[] = '<div class="' . $this->html_class_prefix . 'section-button-container" tabindex="0">';
                                $content[] = '<div class="' . $this->html_class_prefix . 'section-button-content">';
                                    $content[] = '<button type="button" class="' . $this->html_class_prefix . 'section-button ' . $this->html_class_prefix . 'restart-button">'. $this->buttons_texts[ 'restartButton' ] .'</button>';
                                $content[] = '</div>';
                            $content[] = '</div>';
                        $content[] = '</div>';
                    }

                    if( $this->options[ $this->name_prefix . 'enable_exit_button' ] ){
                        if( $this->options[ $this->name_prefix . 'exit_redirect_url' ] != '' && filter_var( $this->options[ $this->name_prefix . 'exit_redirect_url' ], FILTER_VALIDATE_URL) !== false ){

                            $content[] = '<div class="' . $this->html_class_prefix . 'section-buttons">';
                                $content[] = '<div class="' . $this->html_class_prefix . 'section-button-container" tabindex="0">';
                                    $content[] = '<div class="' . $this->html_class_prefix . 'section-button-content">';
                                        $content[] = '<a href="' . $this->options[ $this->name_prefix . 'exit_redirect_url' ] . '" class="' . $this->html_class_prefix . 'section-button">'. $this->buttons_texts[ 'exitButton' ] .'</a>';
                                    $content[] = '</div>';
                                $content[] = '</div>';
                            $content[] = '</div>';
                        }
                    }

                    if( $this->options[ $this->name_prefix . 'social_buttons' ] ){
                        $actual_link = "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on"){
                            $actual_link = "https" . $actual_link;
                        }else{
                            $actual_link = "http" . $actual_link;
                        }
                        $content[] = "<div class='ays-survey-social-shares'>";
                            $content[] .= "<div class='ays-survey-social-shares-heading'>";
                                // $content[] .= $this->options[ $this->name_prefix . 'social_buttons_heading' ];
                            $content[] .= "</div>";
    

                        if ( $this->options[ $this->name_prefix . 'social_button_ln' ] ) {
                            $content[] = "<a class='ays-survey-share-btn ays-survey-share-btn-linkedin ays-survey-share-btn-all'
                                            href='https://www.linkedin.com/shareArticle?mini=true&url=" . $actual_link . "'
                                            title='Share on LinkedIn'>
                                            <span class='ays-survey-share-btn-icon'></span>
                                            <span class='ays-share-btn-text'>LinkedIn</span>
                                         </a>";
                        }
                        if ( $this->options[ $this->name_prefix . 'social_button_fb' ] ) {
                            $content[] = "<a class='ays-survey-share-btn ays-survey-share-btn-facebook ays-survey-share-btn-all'
                                            href='https://www.facebook.com/sharer/sharer.php?u=" . $actual_link . "'
                                            title='Share on Facebook'>
                                            <span class='ays-survey-share-btn-icon'></span>
                                            <span class='ays-share-btn-text'>Facebook</span>
                                          </a>";
                        }
                        if ( $this->options[ $this->name_prefix . 'social_button_tr' ] ) {
                            $content[] = "<a class='ays-survey-share-btn ays-survey-share-btn-twitter ays-survey-share-btn-all'
                                            href='https://twitter.com/share?url=" . $actual_link . "'
                                            title='Share on X'>
                                            <span class='ays-survey-share-btn-icon'></span>
                                            <span class='ays-share-btn-text'>X</span>
                                          </a>";
                        }
                        if ( $this->options[ $this->name_prefix . 'social_button_vk' ] ) {
                            $content[] = "<a class='ays-survey-share-btn ays-survey-share-btn-vkontakte ays-survey-share-btn-all'
                                            href='https://vk.com/share.php?url=" . $actual_link . "'
                                            title='Share on VKontakte'>
                                            <span class='ays-survey-share-btn-icon'></span>
                                            <span class='ays-share-btn-text'>VKontakte</span>
                                          </a>";
                        }
                        $content[] = "</div>";
                    }


                    $content[] = '</div>';
                $content[] = '</div>';

            $content[] = '</div>';
        $content[] = '</div>';

    	$content[] = '</div>';

    	$content = implode( '', $content );

    	return $content;
    }

    public function create_section( $section, $last, $first, $section_count, $section_numbering ){
		
		$content = array();
        $show_question_numbering = $this->options[ $this->name_prefix . 'auto_numbering_questions' ];
        $this->options[ $this->name_prefix . 'question_numbering_array' ] = Survey_Maker_Data::ays_survey_numbering_all( $show_question_numbering );
    	$content[] = '<div class="' . $this->html_class_prefix . 'section" data-page-number="'.$section_numbering.'">';
        $minimal_theme_header = $this->options[ $this->name_prefix . 'is_minimal' ] ? 'ays-survey-minimal-theme-header' : "";
        $modern_theme_header = $this->options[ $this->name_prefix . 'is_modern' ] ? 'ays-survey-modern-theme-header' : "";
        
            if( $this->options[ $this->name_prefix . 'show_section_header' ] ){
                $show_section_header = true;
                if( $section['title'] == '' && $section['description'] == '' ){
                    $show_section_header = false;
                }
                if( $this->options[ $this->name_prefix . 'show_sections_questions_count' ] ){
                    $show_section_header = true;
                }
                if( $show_section_header ){
                    $content[] = '<div class="' . $this->html_class_prefix . 'section-header ' . $minimal_theme_header . ' '.$modern_theme_header.'">';

                    $content[] = '<div class="' . $this->html_class_prefix . 'section-title-row">';
                            $content[] = '<div class="' . $this->html_class_prefix . 'section-title-row-main">';
                                $content[] = '<span class="' . $this->html_class_prefix . 'section-title">' . stripslashes( $section['title'] ) . '</span>';
                            $content[] = '</div>';
                    $content[] = '</div>';

                        $content[] = '<div class="' . $this->html_class_prefix . 'section-desc">' . stripslashes( $section['description'] ) . '</div>';
                        if( $this->options[ $this->name_prefix . 'show_sections_questions_count' ] ){
                            $content[] = '<div class="' . $this->html_class_prefix . 'section-questions-count" title="Questions Count">' . count( $section['questions'] ) . '</div>';
                        }

                    $content[] = '</div>';
                }
            }

	    	$content[] = '<div class="' . $this->html_class_prefix . 'section-content">';

                $content[] = '<div class="' . $this->html_class_prefix . 'section-questions">';
                
                if( $this->options[ $this->name_prefix . 'enable_randomize_questions' ] ){
                    shuffle( $section['questions'] );
                }

                $loop_count = 1;

                $other_answer_count = 0;
                $check_question_type_for_next_button = 0;
                $allowed_question_to_disable_next_button = array(
                    'radio',
                    'select',
                    'yesorno'
                );
                
		    	foreach ( $section['questions'] as $key => $question ) {
                    $numbering = "";
                    if(isset($this->options[ $this->name_prefix . 'question_numbering_array' ]) && !empty($this->options[ $this->name_prefix . 'question_numbering_array' ])){
                        $numbering = $this->options[ $this->name_prefix . 'question_numbering_array' ][$key]." ";
                    }
		    		$content[] = $this->create_question( $question , $numbering, $loop_count );
                    $loop_count++;

                    if( isset($question['user_variant']) && $question['user_variant'] ){
                        $other_answer_count++;
                    }

                    if( isset($question['type']) && !in_array($question['type'], $allowed_question_to_disable_next_button) ){
                        $check_question_type_for_next_button++;
                    }
		    	}
		    	$content[] = '</div>';

	    	$content[] = '</div>';

            $footer_class_with_bar = "";
            if($this->options[ $this->name_prefix . 'enable_progress_bar' ] == "on"){
                $footer_class_with_bar = "ays-survey-footer-with-live-bar";
            }
	    	$content[] = '<div class="' . $this->html_class_prefix . 'section-footer '.$footer_class_with_bar.'">';

		    	$content[] = '<div class="' . $this->html_class_prefix . 'section-buttons">';

                    if( ! $first ){
                        if( $this->options[ $this->name_prefix . 'enable_previous_button' ] ){
                            $content[] = '<div class="' . $this->html_class_prefix . 'section-button-container" tabindex="0">';
                                $content[] = '<div class="' . $this->html_class_prefix . 'section-button-content">';
                                    $content[] = '<input type="button" class="' . $this->html_class_prefix . 'section-button ' . $this->html_class_prefix . 'prev-button" value="'. $this->buttons_texts[ 'previousButton' ] .'" />';
                                $content[] = '</div>';
                            $content[] = '</div>';
                        }
                    }

                    $content[] = '<div class="' . $this->html_class_prefix . 'section-button-container" tabindex="0">';
                        $content[] = '<div class="' . $this->html_class_prefix . 'section-button-content">';
                        if( $last ){
                            $content[] = '<input type="button" class="' . $this->html_class_prefix . 'section-button ' . $this->html_class_prefix . 'finish-button" value="'. $this->buttons_texts[ 'finishButton' ] .'" />';
                        }else{
                            $disalble_next_button_class = $this->checkNextButtonVisibility($other_answer_count, $check_question_type_for_next_button) ? 'display_none_important' : '';
                            $content[] = '<input type="button" class="' . $this->html_class_prefix . 'section-button ' . $this->html_class_prefix . 'next-button '.$disalble_next_button_class.'" value="'. $this->buttons_texts[ 'nextButton' ] .'" />';
                        }
                        $content[] = '</div>';
                    $content[] = '</div>';
		    	$content[] = '</div>';

                if($this->options[ $this->name_prefix . 'enable_progress_bar' ] == "on"){
                    $page_fill_percent = (1*100)/$section_count;
                    $content[] = "<div class='" . $this->html_class_prefix . "live-bar-main'>";
                    if(!($this->options[ $this->name_prefix . 'hide_section_bar' ])){
                        $content[] = "<div class='" . $this->html_class_prefix . "live-bar-wrap'>
                                        <div class='" . $this->html_class_prefix . "live-bar-fill' style='width: ".$page_fill_percent."%;'></div>
                                      </div>";
                    }
                    if(!($this->options[ $this->name_prefix . 'hide_section_pagination_text' ])){
                        $content[] = "<div class='" . $this->html_class_prefix . "live-bar-status'>
                                        <span class='" . $this->html_class_prefix . "live-bar-status-text'>".sprintf(__("%s %s of %s" , "survey-maker") , $this->options[ $this->name_prefix . 'progress_bar_text' ] , "<span class='" . $this->html_class_prefix . "live-bar-changeable-text'>1</span>" , $section_count)."</span>
                                        </div>";
                    }
                    $content[] = "</div>";
                }

	    	$content[] = '</div>';
    	
    	$content[] = '</div>';

    	$content = implode( '', $content );

    	return $content;
    }

    public function create_question( $question , $numbering, $loop_count ){

        $question_type = $question['type'];
        $answers = $question['answers'];
        $answers_html = array();
        $is_required = isset( $question['options']['required'] ) && $question['options']['required'] == 'on' ? true : false;
        $image_caption = isset($question['options']['image_caption']) ? $question['options']['image_caption'] : '';
        $image_caption_enable = $question['options']['image_caption_enable'];
        $is_minimum = "false";
        if($question_type == 'checkbox'){
            if(isset($question['options']['enable_max_selection_count']) && $question['options']['enable_max_selection_count'])
            $is_minimum  = isset($question['options']['min_selection_count']) && $question['options']['min_selection_count'] != "" ? "true" : "false";
        }

        // Logo Image URL
        $survey_logo_url_validate = "javascript:void(0)";
        $survey_logo_url = isset($this->options['options'][ $this->name_prefix . 'logo_url' ]) && $this->options['options'][ $this->name_prefix . 'logo_url' ] != "" ? $this->options['options'][ $this->name_prefix . 'logo_url' ] : "";
        $survey_logo_url_check = isset($this->options['options'][ $this->name_prefix . 'enable_logo_url' ]) && $this->options['options'][ $this->name_prefix . 'enable_logo_url' ] == "on" ? true : false;
        $survey_logo_url_check_new_tab = isset($this->options['options'][ $this->name_prefix . 'logo_url_new_tab' ]) && $this->options['options'][ $this->name_prefix . 'logo_url_new_tab' ] == "on" ? true : false;
        $survey_logo_target = "";
        if($survey_logo_url_check){
            $survey_logo_url_validate = filter_var($survey_logo_url, FILTER_VALIDATE_URL) ? $survey_logo_url : $survey_logo_url_validate;
            if(filter_var($survey_logo_url, FILTER_VALIDATE_URL) && $survey_logo_url_check_new_tab){
                $survey_logo_target = "target='_blank'";
            }
        }
        //
        if( $this->options[ $this->name_prefix . 'enable_randomize_answers' ] ){
            shuffle( $question['answers'] );
            shuffle( $answers );
        }

        $other_answer = $question['user_variant'];
        if( $other_answer ){
            $answers[] = array(
                'id' => '0',
                'question_id' => $question['id'],
                'answer' => '',
                'image' => '',
                'ordering' => count( $answers ) + 1,
                'placeholder' => '',
                'is_other' => true,
            );
        }

        $answers['is_first_question'] = $loop_count;
        $question['answers']['is_first_question'] = $loop_count;
        $is_lazy_loading = ($loop_count > 1) ? $this->lazy_loading : "";
        $show_answers_numbering = $this->options[ $this->name_prefix . 'auto_numbering' ];
        $this->options[ $this->name_prefix . 'numbering_array' ] = Survey_Maker_Data::ays_survey_numbering_all( $show_answers_numbering );
        
        $minimal_theme_question = $this->options[ $this->name_prefix . 'is_minimal' ] ? 'ays-survey-minimal-theme-question' : "";
        $modern_theme_question = $this->options[ $this->name_prefix . 'is_modern' ] ? 'ays-survey-modern-theme-question' : "";

        $has_answer_image = false;
        foreach ($answers as $key => $answer) {
            if(isset( $answer['image'] ) && $answer['image'] != ""){
                $has_answer_image = true;
            }
        }

        $question_types = array(
            "radio",
            "checkbox",
            "select",
            "star",
            "date",
            "time",
            "date_time",
            "text",
            "short_text",
            "number",
            "phone",
            "email",
            "name",
        );

        $question_types_getting_answers_array = array(
            "radio",
            "checkbox",
        );

        if( !in_array( $question_type, $question_types ) ){
            $question_type = "radio";
        }
        

        $question_type_function = 'ays_survey_question_type_' . strtoupper( $question_type ) . '_html';
        
        $transmitting_array = in_array( $question_type, $question_types_getting_answers_array ) ? $answers : $question;

        $answers_html[] = $this->$question_type_function( $transmitting_array );

        $answers_html = implode( '', $answers_html );

        $answer_grid = '';
        if( $has_answer_image || $this->options[ $this->name_prefix . 'answers_view' ] == 'grid' ){
            $answer_grid = $this->html_class_prefix . 'question-answers-grid';
        }
        $data_required = $is_required ? "true" : "false";
        
        $is_required_field = $is_required ? '<sup class="' . $this->html_class_prefix . 'question-required-icon">*</sup>' : "";
        

        $question_title = Survey_Maker_Data::survey_sanitize_specific_content($question['question']);
        if($numbering){
            preg_match('/<([a-z]+[1-9]*)\b[^>]*>(.*?)<\/\1>/', $question_title, $matches );
            if(empty($matches)){
                $question_title = $numbering . $question_title;
            }else{
                $question_title_numbering_1 = $numbering . $matches[2];
                $question_title_numbering_2 = str_replace( $matches[2], $question_title_numbering_1, $matches[0] );
                $question_title = str_replace( $matches[0], $question_title_numbering_2, $question_title );
            }
        }

        if ( $is_required_field != "" ) {
            preg_match('/<([a-z]+[1-9]*)\b[^>]*>(.*?)<\/\1>/', $question_title, $matches );
            if(empty($matches)){
                $question_title = $question_title . $is_required_field;
            }else{
                $question_title_numbering_1 = $matches[2] . $is_required_field;
                $question_title_numbering_2 = str_replace( $matches[2], $question_title_numbering_1, $matches[0] );
                $question_title = str_replace( $matches[0], $question_title_numbering_2, $question_title );
            }
        }
        
		$content = array();
    	$content[] = '<div class="' . $this->html_class_prefix . 'question ' . $minimal_theme_question . ' '.$modern_theme_question . '" data-required="' . $data_required . '" data-type="' . $question_type . '" data-is-min="'.$is_minimum.'">';

	    	$content[] = '<div class="' . $this->html_class_prefix . 'question-header">';

                $content[] = '<div class="' . $this->html_class_prefix . 'question-header-content">';

                    $content[] = '<div class="' . $this->html_class_prefix . 'question-title">' . Survey_Maker_Data::ays_autoembed( $question_title );

                    $content[] = '</div>';

                $content[] = '</div>';

                if( isset( $question['image'] ) && $question['image'] != "" ){
                    $content[] = '<div class="' . $this->html_class_prefix . 'question-image-container">';
                        $surve_question_image_alt_text = Survey_Maker_Data::ays_survey_get_image_id_by_url($question['image']);
                        $content[] = '<img class="' . $this->html_class_prefix . 'question-image" src="' . $question['image'] . '" alt="' . $surve_question_image_alt_text . '" '.$is_lazy_loading.' />';
                        if($image_caption_enable){
                            $content[] = '<div class="' . $this->html_class_prefix . 'question-image-caption">';
                                $content[] = '<span>'.$image_caption.'</span>';
                            $content[] = '</div>';
                        }
                    $content[] = '</div>';
                }

	    	$content[] = '</div>';

	    	$content[] = '<div class="' . $this->html_class_prefix . 'question-content">';

		    	$content[] = '<div class="' . $this->html_class_prefix . 'question-answers ' . $answer_grid . '">';
		    	
                    $content[] = $answers_html;

                    $content[] = '<input type="hidden" name="' . $this->html_name_prefix . 'questions-' . $this->unique_id . '[' . $question['id'] . '][section]" value="' . $question['section_id'] . '">';
                    $content[] = '<input type="hidden" name="' . $this->html_name_prefix . 'questions-' . $this->unique_id . '[' . $question['id'] . '][questionType]" value="' . $question_type . '">';
                    $content[] = '<input type="hidden" class="' . $this->html_class_prefix . 'question-id" name="' . $this->html_name_prefix . 'questions-' . $this->unique_id . '[' . $question['id'] . '][questionId]" value="' . $question['id'] . '">';
                
                if( $this->options[ $this->name_prefix . 'enable_clear_answer' ] ){
                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-clear-selection-container ' . $this->html_class_prefix . 'visibility-none transition fade">';
                        $content[] = '<div class="' . $this->html_class_prefix . 'simple-button-container">';
                            $content[] = '<div class="' . $this->html_class_prefix . 'button-content">';
                                $content[] = '<span class="' . $this->html_class_prefix . 'answer-clear-selection-text ' . $this->html_class_prefix . 'button" tabindex="0">' . $this->buttons_texts[ 'clearButton' ] . '</span>';
                            $content[] = '</div>';
                        $content[] = '</div>';
                    $content[] = '</div>';
                }

                $content[] = '</div>';
                
            $content[] = '</div>';
                
            $content[] = '<div class="' . $this->html_class_prefix . 'question-footer">';
                if($is_minimum == 'true'){
                    $content[] = '<div class="' . $this->html_class_prefix . 'votes-count-validation-error" role="alert"></div>';
                }
                $content[] = '<div class="' . $this->html_class_prefix . 'question-validation-error" role="alert"></div>';
                if(isset($this->options[ $this->name_prefix . 'logo' ]) && $this->options[ $this->name_prefix . 'logo' ] != ""){
                    $content[] = '<div class="' . $this->html_class_prefix . 'image-logo-url">
                                    <a href="'.$survey_logo_url_validate.'" '.$survey_logo_target.' style="display: inline-block;">
                                        <img title="'.$this->options[ $this->name_prefix . 'logo_title' ].'" src="'.$this->options[ $this->name_prefix . 'logo' ].'" class="' . $this->html_class_prefix . 'image-logo-url-img">
                                    </a>
                                  </div>';
                }
	    	$content[] = '</div>';

    	$content[] = '</div>';

    	$content = implode( '', $content );

    	return $content;
    }

    public function ays_survey_question_type_RADIO_html( $answers ){
		
        $content = array();

        $has_answer_image = false;
        foreach ($answers as $key => $answer) {
            if(isset( $answer['image'] ) && $answer['image'] != ""){
                $has_answer_image = true;
            }
        }

        $answer_grid = '';
        $answer_label_grid = '';
        if( $has_answer_image || $this->options[ $this->name_prefix . 'answers_view' ] == 'grid' ){
            $answer_grid = $this->html_class_prefix . 'answer-grid';
            $answer_label_grid = $this->html_class_prefix . 'answer-label-grid';
        }

        $is_first_question = $answers['is_first_question'];        
        $is_lazy_loading = ($is_first_question > 1) ? $this->lazy_loading : "";
        unset($answers['is_first_question']);

        foreach ($answers as $key => $answer) {
            
            $is_other = false;
            if( isset( $answer['is_other'] ) && $answer['is_other'] == true ){
                $is_other = true;
            }
        
            $answer_label_other = '';
            $other_answer_box_width = '';
            if( $is_other ){
                $answer_label_other = $this->html_class_prefix . 'answer-label-other';
                $other_answer_box_width = $this->html_class_prefix . 'other-answer-container';
            }

            $content[] = '<div class="' . $this->html_class_prefix . 'answer ' . $answer_grid . ' '.$other_answer_box_width.'">';
            
                $content[] = '<label class="' . $this->html_class_prefix . 'answer-label ' . $answer_label_grid . ' ' . $answer_label_other . '" tabindex="0">';

                    if( $this->options[$this->name_prefix . 'is_minimal'] ){
                        if( isset( $answer['image'] ) && $answer['image'] != "" ){
                            $content[] = '<div class="' . $this->html_class_prefix . 'answer-image-container">';
                                $content[] = '<img class="' . $this->html_class_prefix . 'answer-image" '. $is_lazy_loading .' src="' . $answer['image'] . '" alt="' . stripslashes( $answer['answer'] ) . '" />';
                            $content[] = '</div>';
                        }
                        if (!$is_other) {
                            $content[] = '<input class="" type="radio" name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $answer['question_id'] . '][answer]" value="' . $answer['id'] . '">';
                        } else {
                            $content[] = '<input class="" type="radio" name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $answer['question_id'] . '][answer]" data-logicjump="' . $answer['question_id'] . '" value="' . $answer['id'] . '">';
                        }
                    }
                    else{

                        $content[] = '<input class="" type="radio" name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $answer['question_id'] . '][answer]" value="' . $answer['id'] . '" autocomplete="off">';

                        if( isset( $answer['image'] ) && $answer['image'] != "" ){
                            $content[] = '<div class="' . $this->html_class_prefix . 'answer-image-container">';
                                $content[] = '<img class="' . $this->html_class_prefix . 'answer-image" src="' . $answer['image'] . '" alt="' . stripslashes( $answer['answer'] ) . '" '. $is_lazy_loading .' />';
                            $content[] = '</div>';
                        }
                    }

                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-label-content">';

                        $content[] = '<div class="' . $this->html_class_prefix . 'answer-icon-content">';
                            $content[] = '<div class="' . $this->html_class_prefix . 'answer-icon-ink"></div>';
                            $content[] = '<div class="' . $this->html_class_prefix . 'answer-icon-content-1">';
                                $content[] = '<div class="' . $this->html_class_prefix . 'answer-icon-content-2">';
                                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-icon-content-3"></div>';
                                $content[] = '</div>';
                            $content[] = '</div>';
                        $content[] = '</div>';

                        if( $is_other ){
                            $content[] = '<span class="">' . __( 'Other', "survey-maker" ) . ':</span>';
                        }else{
                            if( ! empty( $this->options[ $this->name_prefix . 'numbering_array' ] ) ){
                                $numebering_answer = $this->options[ $this->name_prefix . 'numbering_array' ][$key] . ' ';
                            }else{
                                $numebering_answer = '';
                            }
                            $content[] = '<span class="">' .$numebering_answer . $answer['answer'] . '</span>';
                        }

                    $content[] = '</div>';
                $content[] = '</label>';

                if( $is_other ){

                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-other-text">';
                        $content[] = '<input id="' . $this->html_class_prefix . 'answer-other-input-' . $answer['question_id'] . '" class="' . $this->html_class_prefix . 'answer-other-input ' .
                                        $this->html_class_prefix . 'remove-default-border ' . 
                                        $this->html_class_prefix . 'question-input ' . 
                                        $this->html_class_prefix . 'input
                                        ' . $this->html_class_prefix . 'answer-text-inputs" 
                                        name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $answer['question_id'] . '][other]" 
                                        type="text" autocomplete="off" tabindex="0" />';
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline" style="margin:0;"></div>';
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation" style="margin:0;"></div>';
                    $content[] = '</div>';
                    
                }

            $content[] = '</div>';
        }
        
    	$content = implode( '', $content );

    	return $content;
    }

    public function ays_survey_question_type_CHECKBOX_html( $answers ){
        $content = array();
        $has_answer_image = false;
        foreach ($answers as $key => $answer) {
            if(isset( $answer['image'] ) && $answer['image'] != ""){
                $has_answer_image = true;
            }
        }

        $answer_grid = '';
        $answer_label_grid = '';
        if( $has_answer_image || $this->options[ $this->name_prefix . 'answers_view' ] == 'grid' ){
            $answer_grid = $this->html_class_prefix . 'answer-grid';
            $answer_label_grid = $this->html_class_prefix . 'answer-label-grid';
        }
        
        $is_first_question = $answers['is_first_question'];
        $is_lazy_loading = ($is_first_question > 1) ? $this->lazy_loading : "";
        unset($answers['is_first_question']);
        foreach ($answers as $key => $answer) {
            
            $is_other = false;
            if( isset( $answer['is_other'] ) && $answer['is_other'] == true ){
                $is_other = true;
            }
        
            $answer_label_other = '';
            $other_answer_box_width = '';
            if( $is_other ){
                $answer_label_other = $this->html_class_prefix . 'answer-label-other';
                $other_answer_box_width = $this->html_class_prefix . 'other-answer-container';
            }

            $content[] = '<div class="' . $this->html_class_prefix . 'answer ' . $answer_grid . ' '.$other_answer_box_width.'">';
            
                $content[] = '<label class="' . $this->html_class_prefix . 'answer-label ' . $answer_label_grid . ' ' . $answer_label_other . '" tabindex="0">';
                
                    if( $this->options[$this->name_prefix . 'is_minimal'] ){
                        if( isset( $answer['image'] ) && $answer['image'] != "" ){
                            $content[] = '<div class="' . $this->html_class_prefix . 'answer-image-container">';
                                $content[] = '<img class="' . $this->html_class_prefix . 'answer-image" '. $is_lazy_loading .' src="' . $answer['image'] . '" alt="' . stripslashes( $answer['answer'] ) . '" />';
                            $content[] = '</div>';
                        }

                        $content[] = '<input class="" type="checkbox" name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $answer['question_id'] . '][answer][]" value="' . $answer['id'] . '">';
                    }
                    else{                    
                        $content[] = '<input class="" type="checkbox" name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $answer['question_id'] . '][answer][]" value="' . $answer['id'] . '" autocomplete="off">';
                        
                        if( isset( $answer['image'] ) && $answer['image'] != "" ){
                            $content[] = '<div class="' . $this->html_class_prefix . 'answer-image-container">';
                                $content[] = '<img class="' . $this->html_class_prefix . 'answer-image" src="' . $answer['image'] . '" '. $is_lazy_loading .' alt="' . stripslashes( $answer['answer'] ) . '" />';
                            $content[] = '</div>';
                        }
                    }

                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-label-content">';
                
                        $content[] = '<div class="' . $this->html_class_prefix . 'answer-icon-content">';
                            $content[] = '<div class="' . $this->html_class_prefix . 'answer-icon-ink"></div>';
                            $content[] = '<div class="' . $this->html_class_prefix . 'answer-icon-content-1">';
                                $content[] = '<div class="' . $this->html_class_prefix . 'answer-icon-content-2">';
                                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-icon-content-3"></div>';
                                $content[] = '</div>';
                            $content[] = '</div>';
                        $content[] = '</div>';
                        
                        if( $is_other ){
                            $content[] = '<span class="">' . __( 'Other', "survey-maker" ) . ':</span>';
                        }else{
                            if( ! empty( $this->options[ $this->name_prefix . 'numbering_array' ] ) ){
                                $numebering_answer = $this->options[ $this->name_prefix . 'numbering_array' ][$key] . ' ';
                            }else{
                                $numebering_answer = '';
                            }
                            $content[] = '<span class="">' . $numebering_answer . $answer['answer'] . '</span>';
                        }

                    $content[] = '</div>';
                $content[] = '</label>';

                if( $is_other ){

                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-other-text">';
                        $content[] = '<input id="' . $this->html_class_prefix . 'answer-other-input-' . $answer['question_id'] . '" class="' . $this->html_class_prefix . 'answer-other-input ' .
                                        $this->html_class_prefix . 'remove-default-border ' . 
                                        $this->html_class_prefix . 'question-input ' . 
                                        $this->html_class_prefix . 'input
                                        ' . $this->html_class_prefix . 'answer-text-inputs"
                                        name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $answer['question_id'] . '][other]" 
                                        type="text" autocomplete="off" tabindex="0" />';
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline" style="margin:0;"></div>';
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation" style="margin:0;"></div>';
                    $content[] = '</div>';

                }

            $content[] = '</div>';
        }

        $content = implode( '', $content );

        return $content;
    }

    public function ays_survey_question_type_SELECT_html( $question ){
        $content = array();

        $is_first_question = $question['answers']['is_first_question'];
        $is_lazy_loading = ($is_first_question > 1) ? $this->lazy_loading : "";
        unset($question['answers']['is_first_question']);
        $select_class = $this->html_class_prefix . 'question-select-conteiner-minimal';
        if( $this->options[$this->name_prefix . 'is_minimal']){
            $content[] = '<div class="' . $this->html_class_prefix . 'answer">';
                $content[] = '<div class="' . $this->html_class_prefix . 'question-type-select-box">';
                    $content[] = '<div class="' . $this->html_class_prefix . 'question-select-conteiner">';
                        $content[] = '<select class="' . $select_class  . '"
                        name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . ']">';
                        foreach ( $question['answers'] as $key => $answer ) {

                                $content[] = "<option value='" . $answer['id'] . "' >";
                                    if( ! empty( $this->options[ $this->name_prefix . 'numbering_array' ] ) ){
                                        $numebering_answer = $this->options[ $this->name_prefix . 'numbering_array' ][$key] . ' ';
                                    }else{
                                        $numebering_answer = '';
                                    }
                                    $content[] = $numebering_answer . stripslashes( $answer['answer'] );
                                $content[] = '</option>';
                            }
                        $content[] = '</select>';
                    $content[] = '</div>';
                $content[] = '</div>';    
            $content[] = '</div>';
        }
        else{
            $content[] = '<div class="' . $this->html_class_prefix . 'answer">';

                $content[] = '<div class="' . $this->html_class_prefix . 'question-type-select-box">';
                    $content[] = '<div class="' . $this->html_class_prefix . 'question-select-conteiner">';

                        $content[] = '<div class="' . $this->html_class_prefix . 'question-select ui selection icon dropdown">';
                            
                            $content[] = '<input type="hidden" class="' . $this->html_name_prefix . 'detect-selected-question-dropdown" name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . ']">';

                            $content[] = '<i class="dropdown icon"></i>';
                            $content[] = '<div class="default text">'.__('Choose', "survey-maker").'</div>';

                            $content[] = '<div class="menu">';
                            
                                foreach ( $question['answers'] as $key => $answer ) {
                                    $content[] = '<div class="item" data-value="'. $answer['id'] .'">';

                                        if( isset( $answer['image'] ) && $answer['image'] != "" ){
                                            $content[] = '<img class="' . $this->html_class_prefix . 'answer-image" src="' . $answer['image'] . '" alt="' . stripslashes( $answer['answer'] ) . '" '. $is_lazy_loading .' />';
                                        }

                                        if( ! empty( $this->options[ $this->name_prefix . 'numbering_array' ] ) ){
                                            $numebering_answer = $this->options[ $this->name_prefix . 'numbering_array' ][$key] . ' ';
                                        }else{
                                            $numebering_answer = '';
                                        }

                                        $content[] = $numebering_answer . stripslashes( $answer['answer'] );

                                    $content[] = '</div>';
                                }

                            $content[] = '</div>';
                        $content[] = '</div>';

                    $content[] = '</div>';
                $content[] = '</div>';

            $content[] = '</div>';
        }

        $content = implode( '', $content );

        return $content;
    }

    
    public function ays_survey_question_type_STAR_html( $question ){
        $content = array();
    
        //checked Input
        $enable_url_parameter =  isset($question['options']['enable_url_parameter']) && $question['options']['enable_url_parameter'] == true ? true : false;
        $url_parameter = $enable_url_parameter && isset($question['options']['url_parameter']) && $question['options']['url_parameter'] != "" ? $question['options']['url_parameter'] : ''; 
        $selected_input = isset($_GET[$url_parameter]) && $_GET[$url_parameter] ? $_GET[$url_parameter] : '';

        $star_label_1 = (isset($question['options']['star_1']) && $question['options']['star_1'] != '') ? $question['options']['star_1'] : '';
        $star_label_2 = (isset($question['options']['star_2']) && $question['options']['star_2'] != '') ? $question['options']['star_2'] : '';
        $star_scale_length = (isset($question['options']['star_scale_length']) && $question['options']['star_scale_length'] != '') ? absint( $question['options']['star_scale_length'] ) : 5;

            $content[] = '<div class="' . $this->html_class_prefix . 'answer-star">';
            
                $content[] = '<label class="' . $this->html_class_prefix . 'answer-star-label">';
                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-star-radio-label" dir="auto"></div>';
                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-star-radio">';
                    $content[] = $star_label_1;
                    $content[] = '</div>';
                $content[] = '</label>';

                for ($i=1; $i <= $star_scale_length; $i++) { 
                    $is_selected = $i == $selected_input ? "checked" : "";
                    $active_answer = $i == $selected_input ? "active-answer" : "";
                    $selected_stars = ($i <= $selected_input) && ($selected_input <= $star_scale_length) ? "fa-star" : "fa-star-o";

                    $content[] = '<label class="' . $this->html_class_prefix . 'answer-label ' . $active_answer . '">';
                        $content[] = '<div class="' . $this->html_class_prefix . 'answer-star-radio-label" dir="auto"></div>';
                        $content[] = '<div class="' . $this->html_class_prefix . 'answer-star-radio" tabindex="0">';
                        
                            $content[] = '<input type="radio" value="'.$i.'" name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer]"' . $is_selected . '>';
                          
                            $content[] = '<i class="fa ' . $selected_stars . ' ' . $this->html_class_prefix . 'star-icon"></i>';
                            
                        $content[] = '</div>';
                    $content[] = '</label>';
                }
                
                $content[] = '<label class="' . $this->html_class_prefix . 'answer-star-label">';
                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-star-radio-label" dir="auto"></div>';
                    $content[] = '<div class="' . $this->html_class_prefix . 'answer-star-radio">';
                    $content[] = $star_label_2;
                    $content[] = '</div>';
                $content[] = '</label>';

            $content[] = '</div>';

        $content = implode( '', $content );

        return $content;
    }

    public function ays_survey_question_type_TEXT_html( $question ){
        $content = array();
        // Input types placeholders
        $survey_input_type_placeholder = isset($question['options']['placeholder']) && $question['options']['placeholder'] != "" ? $question['options']['placeholder'] : '';  

        $enable_word_limit = isset($question['options']['enable_word_limitation']) && $question['options']['enable_word_limitation'] == "on" ? true : false;  
        $show_limit  = isset($question['options']['limit_counter']) && $question['options']['limit_counter'] == "on" ? true : false;  
        $limit_length  = isset($question['options']['limit_length']) && $question['options']['limit_length'] != "" ? $question['options']['limit_length'] : "";  
        $limit_by = "Character";
        $limit_checker = false;
        $survey_question_limit_length_class = '';
        if($enable_word_limit ){
            if($show_limit){
                $limit_checker = true;
            }
            $survey_question_limit_length_class = $this->html_class_prefix . 'check-word-limit ';
        }
        if($question['options']['limit_by'] && $question['options']['limit_by'] == "word"){
            $limit_by = "Word";
        }
        if(intval($limit_length) > 0){
            $limit_by .= "s ";
        }
        $limit_by .= __("left", "survey-maker");
        if(intval($limit_length) <= 0){
            $limit_by = '';
        }

        $minimal_theme = $this->options[ $this->name_prefix . 'is_minimal' ] ? true : false;
        $minimal_class = $this->html_class_prefix . 'remove-default-border ' . $this->html_class_prefix . 'question-input-textarea ' . $this->html_class_prefix . 'question-input';
        if( $minimal_theme ){
            $minimal_class = $this->html_class_prefix . "minimal-theme-textarea-input";
        }


        $content[] = '<div class="' . $this->html_class_prefix . 'answer">';

            $content[] = '<div class="' . $this->html_class_prefix . 'question-box ' . $this->html_class_prefix . 'question-type-text-box">';
                $content[] = '<div class="' . $this->html_class_prefix . 'question-input-box">';

                    $content[] = '<textarea class="
                                    ' . $minimal_class . '
                                    ' . 
                                    $this->html_class_prefix . 'remove-default-border ' . 
                                    $this->html_class_prefix . 'question-input-textarea ' . 
                                    $survey_question_limit_length_class . 
                                    $this->html_class_prefix . 'question-input ' . 
                                    $this->html_class_prefix . 'input
                                    ' . $this->html_class_prefix . 'answer-text-inputs" type="text" style="min-height: 24px;"
                                    placeholder="'. __( $survey_input_type_placeholder, "survey-maker" ) .'"
                                    name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer]" autocomplete="off">';
                    $content[] = '</textarea>';

                    if( ! $minimal_theme ){
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline"></div>';
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation"></div>';
                    }

                $content[] = '</div>';
                if($limit_checker){
                    $content[] .= '<div class="'.$this->html_class_prefix.'question-text-conteiner">';
                        $content[] .= '<div class="'.$this->html_class_prefix.'question-text-message">';
                            $content[] .= '<span class="'.$this->html_class_prefix.'question-text-message-span">'. $limit_length . '</span> ' . $limit_by;
                        $content[] .= '</div>';
                    $content[] .= '</div>';
                }
            $content[] = '</div>';

        $content[] = '</div>';

        $content = implode( '', $content );

        return $content;
    }

    public function ays_survey_question_type_SHORT_TEXT_html( $question ){
        $content = array();
        // Input types placeholders
        $survey_input_type_placeholder = isset($question['options']['placeholder']) && $question['options']['placeholder'] != "" ? $question['options']['placeholder'] : '';

        $enable_word_limit = isset($question['options']['enable_word_limitation']) && $question['options']['enable_word_limitation'] ? true : false;  
        $show_limit  = isset($question['options']['limit_counter']) && $question['options']['limit_counter'] == "on" ? true : false;  
        $limit_length  = isset($question['options']['limit_length']) && $question['options']['limit_length'] != "" ? $question['options']['limit_length'] : "";  
        $limit_by = "Character";
        $limit_checker = false;
        $survey_question_limit_length_class = '';
        if($enable_word_limit ){
            if($show_limit){
                $limit_checker = true;
            }
            $survey_question_limit_length_class = $this->html_class_prefix . 'check-word-limit ';
        }
        if($question['options']['limit_by'] && $question['options']['limit_by'] == "word"){
            $limit_by = "Word";
        }
        if(intval($limit_length) > 0){
            $limit_by .= "s ";
        }
        $limit_by .= __("left", "survey-maker");
        if(intval($limit_length) <= 0){
            $limit_by = '';
        }

        $minimal_theme = $this->options[ $this->name_prefix . 'is_minimal' ] ? true : false;
        $minimal_class = $this->html_class_prefix . 'remove-default-border ' .$this->html_class_prefix . 'question-input';
        if( $minimal_theme ){
            $minimal_class = $this->html_class_prefix . "minimal-theme-textarea-input";
        }

        $content[] = '<div class="' . $this->html_class_prefix . 'answer">';

            $content[] = '<div class="' . $this->html_class_prefix . 'question-box">';
                $content[] = '<div class="' . $this->html_class_prefix . 'question-input-box">';

                    $content[] = '<input class="
                                    ' . $minimal_class . '
                                    ' . 
                                    $this->html_class_prefix . 'remove-default-border ' . 
                                    $this->html_class_prefix . 'question-input ' . 
                                    $survey_question_limit_length_class . 
                                    $this->html_class_prefix . 'input
                                    ' . $this->html_class_prefix . 'answer-text-inputs" type="text" style="min-height: 24px;"
                                    placeholder="'. __( $survey_input_type_placeholder, "survey-maker" ) .'"
                                    name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer]" autocomplete="off">';

                    if( ! $minimal_theme ){
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline"></div>';
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation"></div>';
                    }

                $content[] = '</div>';
                if($limit_checker){
                    $content[] .= '<div class="'.$this->html_class_prefix.'question-text-conteiner">';
                        $content[] .= '<div class="'.$this->html_class_prefix.'question-text-message">';
                            $content[] .= '<span class="'.$this->html_class_prefix.'question-text-message-span">'. $limit_length . '</span> ' . $limit_by;
                        $content[] .= '</div>';
                    $content[] .= '</div>';
                }
            $content[] = '</div>';

        $content[] = '</div>';

        $content = implode( '', $content );

        return $content;
    }

    public function ays_survey_question_type_NUMBER_html( $question ){
        $content = array();
        // Input types placeholders
        $survey_input_type_placeholder = isset($question['options']['placeholder']) && $question['options']['placeholder'] != "" ? $question['options']['placeholder'] : '';

        $enable_number_limit = isset($question['options']['enable_number_limitation']) && $question['options']['enable_number_limitation'] == "on" ? true : false;
        $enable_number_limit_message = isset($question['options']['enable_number_error_message']) && $question['options']['enable_number_error_message'] == "on" ? true : false;
        $number_limit_message = isset($question['options']['number_error_message']) && $question['options']['number_error_message'] != "" ? stripslashes(esc_attr($question['options']['number_error_message'])) : "";

        $show_limit  = isset($question['options']['enable_number_limit_counter']) && $question['options']['enable_number_limit_counter'] == "on" ? true : false;  
        $limit_length  = isset($question['options']['number_limit_length']) && $question['options']['number_limit_length'] != "" ? $question['options']['number_limit_length'] : "";  
        $limit_by = "Character";
        $limit_checker = false;
        // $survey_question_limit_length_class = '';

        $number_limit_class = "";
        if($enable_number_limit){
            if($show_limit){
                $limit_checker = true;
            }
            $number_limit_class = $this->html_class_prefix . 'check-number-limit ';            
        }

        if(intval($limit_length) > 0){
            $limit_by .= "s ";
        }

        $limit_by .= __("left", "survey-maker");
        if(intval($limit_length) <= 0){
            $limit_by = '';
        }

        $minimal_theme = $this->options[ $this->name_prefix . 'is_minimal' ] ? true : false;
        $minimal_class = $this->html_class_prefix . 'remove-default-border ' . $this->html_class_prefix . 'question-input';
        if( $minimal_theme ){
            $minimal_class = $this->html_class_prefix . "minimal-theme-textarea-input";
        }

        $content[] = '<div class="' . $this->html_class_prefix . 'answer">';

            $content[] = '<div class="' . $this->html_class_prefix . 'question-box">';
                $content[] = '<div class="' . $this->html_class_prefix . 'question-input-box">';

                    $content[] = '<input class="
                                    ' . $minimal_class . '
                                    ' . 
                                    $this->html_class_prefix . 'remove-default-border ' . 
                                    $this->html_class_prefix . 'question-input ' . 
                                    $number_limit_class  . 
                                    $this->html_class_prefix . 'input" type="number" step="any" style="min-height: 24px;"
                                    placeholder="'. __( $survey_input_type_placeholder, "survey-maker" ) .'"
                                    name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer]" autocomplete="off">';
                    if( ! $minimal_theme ){
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline"></div>';
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation"></div>';
                    }

                $content[] = '</div>';
                if($enable_number_limit_message){
                    $content[] = '<div class="' . $this->html_class_prefix . 'number-limit-message-box ' . $this->html_class_prefix . 'question-text-error-message" style="display: none;">';
                        $content[] = '<span class="' . $this->html_class_prefix . 'number-limit-message-text">';
                            $content[] = $number_limit_message;
                        $content[] = '</span>';
                    $content[] = '</div>';
                }
                if($limit_checker){
                    $content[] .= '<div class="'.$this->html_class_prefix.'question-text-conteiner">';
                        $content[] .= '<div class="'.$this->html_class_prefix.'question-text-message">';
                            $content[] .= '<span class="'.$this->html_class_prefix.'question-text-message-span">'. $limit_length . '</span> ' . $limit_by;
                        $content[] .= '</div>';
                    $content[] .= '</div>';
                }
            $content[] = '</div>';
        $content[] = '</div>';

        $content = implode( '', $content );

        return $content;
    }

    
    public function ays_survey_question_type_PHONE_html( $question ){
        $content = array();
        // Input types placeholders
        $survey_input_type_placeholder = isset($question['options']['placeholder']) && $question['options']['placeholder'] != "" ? $question['options']['placeholder'] : '';

        //Input types value
        $enable_url_parameter =  isset($question['options']['enable_url_parameter']) && $question['options']['enable_url_parameter'] == true ? true : false;
        $url_parameter = $enable_url_parameter && isset($question['options']['url_parameter']) && $question['options']['url_parameter'] != "" ? $question['options']['url_parameter'] : ''; 
        $survey_input_type_value = isset($_GET[$url_parameter]) && $_GET[$url_parameter] ? $_GET[$url_parameter] : '';

        $enable_number_limit = isset($question['options']['enable_number_limitation']) && $question['options']['enable_number_limitation'] == "on" ? true : false;
        $enable_number_limit_message = isset($question['options']['enable_number_error_message']) && $question['options']['enable_number_error_message'] == "on" ? true : false;
        $number_limit_message = isset($question['options']['number_error_message']) && $question['options']['number_error_message'] != "" ? stripslashes(esc_attr($question['options']['number_error_message'])) : "";
        $show_limit  = isset($question['options']['enable_number_limit_counter']) && $question['options']['enable_number_limit_counter'] == "on" ? true : false;  
        $limit_length  = isset($question['options']['number_limit_length']) && $question['options']['number_limit_length'] != "" ? $question['options']['number_limit_length'] : "";  
        $limit_by = "Character";
        $limit_checker = false;

        $number_limit_class = $this->html_class_prefix . 'is-phone-type ';
        if($enable_number_limit){
            if($show_limit){
                $limit_checker = true;
            }

            $number_limit_class .= $this->html_class_prefix . 'check-number-limit ';
        }

        if(intval($limit_length) > 0){
            $limit_by .= "s ";
        }

        $limit_by .= __("left", "survey-maker");
        if(intval($limit_length) <= 0){
            $limit_by = '';
        }

        $minimal_theme = $this->options[ $this->name_prefix . 'is_minimal' ] ? true : false;
        $minimal_class = $this->html_class_prefix . 'remove-default-border ' . $this->html_class_prefix . 'question-input';
        if( $minimal_theme ){
            $minimal_class = $this->html_class_prefix . "minimal-theme-textarea-input";
        }

        $content[] = '<div class="' . $this->html_class_prefix . 'answer">';

            $content[] = '<div class="' . $this->html_class_prefix . 'question-box ' . $this->html_class_prefix . 'question-box-text-types-short">';
                $content[] = '<div class="' . $this->html_class_prefix . 'question-input-box">';

                    $content[] = '<input class="' . $minimal_class . ' '.$number_limit_class.' ' . $this->html_class_prefix . 'answer-text-inputs ' . $this->html_class_prefix . 'answer-text-inputs-default" type="text" tabindex="0" step="any" style="min-height: 24px;"
                                    placeholder="'. __( $survey_input_type_placeholder, "survey-maker" ) .'"
                                    name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer]"
                                    value="' . __( $survey_input_type_value, "survey-maker" ) . '">';

                        if( ! $minimal_theme ){
                            $content[] = '<div class="' . $this->html_class_prefix . 'input-underline"></div>';
                            $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation"></div>';
                        }

                    if($enable_number_limit_message){
                        $content[] = '<div class="' . $this->html_class_prefix . 'number-limit-message-box ' . $this->html_class_prefix . 'question-text-error-message" style="display: none;">';
                            $content[] = '<span class="' . $this->html_class_prefix . 'number-limit-message-text">';
                                $content[] = $number_limit_message;
                            $content[] = '</span>';
                        $content[] = '</div>';
                    }

                    if($limit_checker){
                        $content[] .= '<div class="'.$this->html_class_prefix.'question-text-conteiner">';
                            $content[] .= '<div class="'.$this->html_class_prefix.'question-text-message">';
                                $content[] .= '<span class="'.$this->html_class_prefix.'question-text-message-span">'. $limit_length . '</span> ' . $limit_by;
                            $content[] .= '</div>';
                        $content[] .= '</div>';
                    }

                $content[] = '</div>';
            $content[] = '</div>';

        $content[] = '</div>';

        $content = implode( '', $content );

        return $content;
    }
    
    public function ays_survey_question_type_DATE_html( $question ){
        $content = array();

        $minimal_theme = $this->options[ $this->name_prefix . 'is_minimal' ] ? true : false;
        $minimal_class = $this->html_class_prefix . 'remove-default-border ' . $this->html_class_prefix . 'question-date-input ' . $this->html_class_prefix . 'question-input';
        if( $minimal_theme ){
            $minimal_class = $this->html_class_prefix . "minimal-theme-textarea-input " . $this->html_class_prefix."minimal-theme-input-date";
        }

        $content[] = '<div class="' . $this->html_class_prefix . 'answer">';

            $content[] = '<div class="' . $this->html_class_prefix . 'question-box ' . $this->html_class_prefix . 'question-date-box">';
                $content[] = '<div class="' . $this->html_class_prefix . 'question-input-box ' . $this->html_class_prefix . 'question-date-input-box">';

                    $content[] = '<input type="date" class="' . $minimal_class . ' ' . $this->html_class_prefix . 'input" type="text" name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer]"  tabindex="0">';

                $content[] = '</div>';
            $content[] = '</div>';

        $content[] = '</div>';

        $content = implode( '', $content );

        return $content;
    }

    public function ays_survey_question_type_TIME_html( $question ){
        $content = array();

        // $minimal_theme = $this->options[ $this->name_prefix . 'is_minimal' ] ? true : false;
        $minimal_class = $this->html_class_prefix . 'remove-default-border ' . $this->html_class_prefix . 'question-date-input ' . $this->html_class_prefix . 'question-input';
        // if( $minimal_theme ){
        //     $minimal_class = $this->html_class_prefix . "minimal-theme-textarea-input " . $this->html_class_prefix."minimal-theme-input-date";
        // }

        $content[] = '<div class="' . $this->html_class_prefix . 'answer">';

            $content[] = '<div class="' . $this->html_class_prefix . 'question-box ' . $this->html_class_prefix . 'question-time-box">';
                $content[] = '<div class="' . $this->html_class_prefix . 'question-input-box ' . $this->html_class_prefix . 'question-time-input-box">';

                    $content[] = '<input class="' . $minimal_class . ' ' . $this->html_class_prefix . 'input ays-survey-timepicker" name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer]" placeholder="00:00" tabindex="0">';

                    // if( ! $minimal_theme ){
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline"></div>';
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation"></div>';
                    // }

                $content[] = '</div>';
            $content[] = '</div>';

        $content[] = '</div>';

        $content = implode( '', $content );

        return $content;
    }

    public function ays_survey_question_type_DATE_TIME_html( $question ){
        $content = array();

        $minimal_class = $this->html_class_prefix . 'remove-default-border ' . $this->html_class_prefix . 'question-date-input ' . $this->html_class_prefix . 'question-input';

        $minimal_theme = $this->options[ $this->name_prefix . 'is_minimal' ] ? true : false;
        $minimal_date_class = $this->html_class_prefix . 'remove-default-border ' . $this->html_class_prefix . 'question-date-input ' . $this->html_class_prefix . 'question-input';
        if( $minimal_theme ){
            $minimal_date_class = $this->html_class_prefix . "minimal-theme-textarea-input " . $this->html_class_prefix."minimal-theme-input-date";
        }

        $content[] = '<div class="' . $this->html_class_prefix . 'answer ' . $this->html_class_prefix . 'date-and-time-answer">';

            $content[] = '<div class="' . $this->html_class_prefix . 'question-box ' . $this->html_class_prefix . 'question-date-time-box">';
                $content[] = '<div class="' . $this->html_class_prefix . 'date-time-inner-box">';
                    $content[] = '<div class="' . $this->html_class_prefix . 'question-input-box ' . $this->html_class_prefix . 'question-date-input-box">';

                        $content[] = '<input type="date" class="' . $minimal_date_class . ' ' . $this->html_class_prefix . 'input" type="text"
                                        name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer][date]">';

                        if( ! $minimal_theme ){
                            $content[] = '<div class="' . $this->html_class_prefix . 'input-underline"></div>';
                            $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation"></div>';
                        }

                    $content[] = '</div>';
                    $content[] = '<div class="' . $this->html_class_prefix . 'question-input-box ' . $this->html_class_prefix . 'question-time-input-box">';

                        $content[] = '<input class="' . $minimal_class . ' ' . $this->html_class_prefix . 'input ays-survey-timepicker" name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer][time]" placeholder="00:00" tabindex="0">';

                        // if( ! $minimal_theme ){
                            $content[] = '<div class="' . $this->html_class_prefix . 'input-underline"></div>';
                            $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation"></div>';
                        // }

                    $content[] = '</div>';
                $content[] = '</div>';
            $content[] = '</div>';

        $content[] = '</div>';

        $content = implode( '', $content );

        return $content;
    }
    

    public function ays_survey_question_type_EMAIL_html( $question ){
        $content = array();
        // Input types placeholders
        $survey_input_type_placeholder = isset($question['options']['placeholder']) && $question['options']['placeholder'] != "" ? $question['options']['placeholder'] : '';

        $minimal_theme = $this->options[ $this->name_prefix . 'is_minimal' ] ? true : false;
        $minimal_class = $this->html_class_prefix . 'remove-default-border ' . $this->html_class_prefix . 'question-email-input ' . $this->html_class_prefix . 'question-input';
        if( $minimal_theme ){
            $minimal_class = $this->html_class_prefix . "minimal-theme-textarea-input " . $this->html_class_prefix . "question-email-input";
        }
        
        $content[] = '<div class="' . $this->html_class_prefix . 'answer">';

            $content[] = '<div class="' . $this->html_class_prefix . 'question-box">';
                $content[] = '<div class="' . $this->html_class_prefix . 'question-input-box">';

                    $content[] = '<input class="
                                    ' . $minimal_class . '
                                    ' . 
                                    $this->html_class_prefix . 'remove-default-border ' . 
                                    $this->html_class_prefix . 'question-email-input ' . 
                                    $this->html_class_prefix . 'question-input ' . 
                                    $this->html_class_prefix . 'input" type="text" style="min-height: 24px;"
                                    placeholder="'. __( $survey_input_type_placeholder, "survey-maker" ) .'"
                                    name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer]" autocomplete="off">';
                    if( true ){
                        $content[] = '<input type="hidden" name="' . $this->html_name_prefix . 'user-email-' . $this->unique_id . '" value="' . $question['id'] . '" >';
                    }

                    if( ! $minimal_theme ){
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline"></div>';
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation"></div>';
                    }

                $content[] = '</div>';
            $content[] = '</div>';

        $content[] = '</div>';

        $content = implode( '', $content );

        return $content;
    }

    public function ays_survey_question_type_NAME_html( $question ){
        $content = array();
        // Input types placeholders
        $survey_input_type_placeholder = isset($question['options']['placeholder']) && $question['options']['placeholder'] != "" ? $question['options']['placeholder'] : '';

        $minimal_theme = $this->options[ $this->name_prefix . 'is_minimal' ] ? true : false;
        $minimal_class = $this->html_class_prefix . 'remove-default-border ' . $this->html_class_prefix . 'question-input';
        if( $minimal_theme ){
            $minimal_class = $this->html_class_prefix . "minimal-theme-textarea-input";
        }

        $content[] = '<div class="' . $this->html_class_prefix . 'answer">';

            $content[] = '<div class="' . $this->html_class_prefix . 'question-box">';
                $content[] = '<div class="' . $this->html_class_prefix . 'question-input-box">';

                    $content[] = '<input class="
                                    ' . $minimal_class . '
                                    ' . 
                                    $this->html_class_prefix . 'remove-default-border ' . 
                                    $this->html_class_prefix . 'question-input ' . 
                                    $this->html_class_prefix . 'input
                                    ' . $this->html_class_prefix . 'answer-text-inputs" type="text" style="min-height: 24px;"
                                    placeholder="'. __( $survey_input_type_placeholder, "survey-maker" ) .'"
                                    name="' . $this->html_name_prefix . 'answers-' . $this->unique_id . '[' . $question['id'] . '][answer]" autocomplete="off">';

                    if( true ){
                        $content[] = '<input type="hidden" name="' . $this->html_name_prefix . 'user-name-' . $this->unique_id . '" value="' . $question['id'] . '" >';
                    }

                    if( ! $minimal_theme ){
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline"></div>';
                        $content[] = '<div class="' . $this->html_class_prefix . 'input-underline-animation"></div>';
                    }

                $content[] = '</div>';
            $content[] = '</div>';

        $content[] = '</div>';

        $content = implode( '', $content );

        return $content;
    }

    public function create_restricted_content( $limit_message ){
		
		$content = array();
    	$content[] = '<div class="' . $this->html_class_prefix . 'section ' . $this->html_class_prefix . 'restricted-content active-section">';

            $content[] = '<div class="' . $this->html_class_prefix . 'section-header">';
            
                $content[] = $limit_message;

	    	$content[] = '</div>';
    	
    	$content[] = '</div>';

    	$content = implode( '', $content );

    	return $content;
    }

    public function get_styles(){
		
		$content = array();
        $content[] = '<style type="text/css">';


        $question_image_width = '100%';
        if( $this->options[ $this->name_prefix . 'question_image_width' ] != '' ){
            $question_image_width = $this->options[ $this->name_prefix . 'question_image_width' ] . 'px';
        }

        $question_image_height = 'auto';
        if( $this->options[ $this->name_prefix . 'question_image_height' ] != '' ){
            $question_image_height = $this->options[ $this->name_prefix . 'question_image_height' ] . 'px';
        }

        $survey_title_box_shadow_class = '';
        if( isset($this->options[ $this->name_prefix . 'title_box_shadow_enable' ]) && $this->options[ $this->name_prefix . 'title_box_shadow_enable' ] ){
            $survey_title_text_shadow_params = $this->options[ $this->name_prefix . 'title_text_shadow_x_offset' ].'px '.$this->options[ $this->name_prefix . 'title_text_shadow_y_offset' ].'px '.$this->options[ $this->name_prefix . 'title_text_shadow_z_offset' ].'px';
            $survey_title_box_shadow_class = 'text-shadow : '.$survey_title_text_shadow_params.' '.$this->options[ $this->name_prefix . 'title_box_shadow_color' ].';';
        }

        $survey_pagination_positioning = isset($this->options[ $this->name_prefix . 'pagination_positioning' ]) ? $this->options[ $this->name_prefix . 'pagination_positioning' ] : 'none';
        $pagination_positioning = "row";
        $pagination_number_height = "";
        switch ($survey_pagination_positioning) {
            case 'none':
                $pagination_positioning = "row";
                break;
            case 'reverse':
                $pagination_positioning = "row-reverse";
                break;
            case 'column':
                $pagination_positioning = "column";
                $pagination_number_height = "line-height: 1;";
                break;
            case 'column_reverse':
                $pagination_positioning = "column-reverse";
                $pagination_number_height = "line-height: 1;";
            break;
            default:
                $pagination_positioning = "row";
                $pagination_number_height = "";
                break;
        }

        $filtered_survey_color = Survey_Maker_Data::rgb2hex( $this->options[ $this->name_prefix . 'color' ] );

        $width = $this->options[ $this->name_prefix . 'width' ];
        $width_by = $this->options[ $this->name_prefix . 'width_by_percentage_px' ];

        $mobile_width = $this->options[ $this->name_prefix . 'mobile_width' ];
        $mobile_width_by = $this->options[ $this->name_prefix . 'mobile_width_by_percent_px' ];
        $mobile_max_width = $this->options[ $this->name_prefix . 'mobile_max_width' ];
        
        if( absint( $width ) == 0 ){
            $width = '100';
            $width_by = 'percentage';
        }

        if( absint( $mobile_width ) == 0 ){
            $mobile_width = '100';
            $mobile_width_by = 'percentage';
        }

        if( absint( $mobile_max_width ) > 0 ){
            $mobile_max_width .= '%';
        }else{
            $mobile_max_width = '95%';
        }

        switch( $width_by ){
            case 'percentage':
                $width .= '%';
            break;
            case 'pixels':
                $width .= 'px';
            break;
            default:
                $width .= '%';
            break;
        }

        switch( $mobile_width_by ){
            case 'percentage':
                $mobile_width .= '%';
            break;
            case 'pixels':
                $mobile_width .= 'px';
            break;
            default:
                $mobile_width .= '%';
            break;
        }

        switch($this->options[ $this->name_prefix . 'logo_image_position' ]){
            case "right":
                $survey_logo_image_position = "right: 5px;";
                break;
            case "left":
                $survey_logo_image_position = "left: 5px;";
                break;
            case "center":
                $survey_logo_image_position = "left: 50%;";
                break;
            default:
                $survey_logo_image_position = "right: 5px;";
                break;
        }

        switch($this->options[ $this->name_prefix . 'start_page_button_pos' ]){
            case "left":
                $survey_start_page_button_pos = 'justify-content: flex-start;';
            break;
            case "center":
                $survey_start_page_button_pos = 'justify-content: center;';
            break;
            case "right":
                $survey_start_page_button_pos = 'justify-content: flex-end;';
            break;
        }

        $answers_list_width = "width:initial;";
        $answers_list_direction = "";
        if($this->options[ $this->name_prefix . 'answers_view_alignment' ] == 'center' && $this->options[ $this->name_prefix . 'answers_view' ] == 'list'){
            $answers_list_width = "width:50%;";
            $answers_list_direction = "flex-direction: column;";
        }
        
        $other_answer_box_width = "";
        if($this->options[ $this->name_prefix . 'answers_view_alignment' ] == 'flex-start' && $this->options[ $this->name_prefix . 'answers_view' ] == 'list'){
            $other_answer_box_width = "width: 100%;";
        }

        $answers_grid_min_width = '';
        if($this->options[ $this->name_prefix . 'answers_view_alignment' ] == 'flex-start' && $this->options[ $this->name_prefix . 'answers_view' ] == 'grid'){
            $answers_grid_min_width = "min-width: 50%;";
        }

        // Question padding
        $question_padding = $this->options[ $this->name_prefix . 'question_padding' ];

        $content[] = '
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' {
                width: ' . $width . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-header {
                border-top-color: ' . $this->options[ $this->name_prefix . 'color' ] . ';
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question {
                border-left-color: ' . $this->options[ $this->name_prefix . 'color' ] . ';
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-header,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question {
                background-color: ' . $this->options[ $this->name_prefix . 'background_color' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section.' . $this->html_class_prefix . 'section-start-page .' . $this->html_class_prefix . 'section-header {
                background-color: ' . $this->options[ $this->name_prefix . 'start_page_background_color' ] . ';
                color: ' . $this->options[ $this->name_prefix . 'start_page_text_color' ] . ';
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section.' . $this->html_class_prefix . 'section-start-page .' . $this->html_class_prefix . 'section-header *,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section.' . $this->html_class_prefix . 'section-start-page .' . $this->html_class_prefix . 'section-header .' . $this->html_class_prefix . 'section-title-row {
                color: ' . $this->options[ $this->name_prefix . 'start_page_text_color' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section.' . $this->html_class_prefix . 'section-start-page .' . $this->html_class_prefix . 'section-header .' . $this->html_class_prefix . 'section-title-row {
                justify-content: ' . $this->options[ $this->name_prefix . 'start_page_title_pos' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-start-page .' . $this->html_class_prefix . 'section-buttons {
                display: flex;
                '.$survey_start_page_button_pos.'
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question {
                ' . ( $this->options[ $this->name_prefix . 'logo' ] != '' ? 'padding: '.$question_padding.'px '.$question_padding.'px 0 '.$question_padding.'px;' : 'padding: '.$question_padding.'px;' ) . '
                ' . ( $this->options[ $this->name_prefix . 'logo' ] != '' ? 'padding-bottom: 50px;' : '' ) . '
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' input.' . $this->html_class_prefix . 'question-input {
                font-size: ' . $this->options[ $this->name_prefix . 'answer_font_size' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing' ] . 'px;
                font-weight: normal;  
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' textarea.' . $this->html_class_prefix . 'question-input {
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing' ] . 'px;
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' input.' . $this->html_class_prefix . 'question-input ~ .' . $this->html_class_prefix . 'input-underline,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' input.' . $this->html_class_prefix . 'question-input ~ .' . $this->html_class_prefix . 'input-underline-animation,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'simple-button-container,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label-content > span,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-select.dropdown div.item,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'thank-you-page,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'loader-with-text,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'restricted-message,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-desc,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-questions-count,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-title,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-title-row,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'thank-you-page > div p {
                color: ' . $this->options[ $this->name_prefix . 'text_color' ] . ';
                font-weight: normal;
            }';
        $content[] = '
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label input[type="checkbox"] ~ .' . $this->html_class_prefix . 'answer-label-content .' . $this->html_class_prefix . 'answer-icon-content .' . $this->html_class_prefix . 'answer-icon-content-3,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label input[type="radio"] ~ .' . $this->html_class_prefix . 'answer-label-content .' . $this->html_class_prefix . 'answer-icon-content .' . $this->html_class_prefix . 'answer-icon-content-3,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label input[type="checkbox"]:checked ~ .' . $this->html_class_prefix . 'answer-label-content .' . $this->html_class_prefix . 'answer-icon-content .' . $this->html_class_prefix . 'answer-icon-content-2,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label input[type="radio"]:checked ~ .' . $this->html_class_prefix . 'answer-label-content .' . $this->html_class_prefix . 'answer-icon-content .' . $this->html_class_prefix . 'answer-icon-content-2,
            #'.$this->html_class_prefix.'container-'.$this->unique_id_in_class.' .'.$this->html_class_prefix.'answer-label .'.$this->html_class_prefix.'answer-image-container{
                border-color:' . ( $this->options[ $this->name_prefix . 'is_modern' ] ? $this->options[ $this->name_prefix . 'buttons_bg_color' ] : $this->options[ $this->name_prefix . 'color' ] ) . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label input[type="checkbox"] ~ .' . $this->html_class_prefix . 'answer-label-content .' . $this->html_class_prefix . 'answer-icon-content .' . $this->html_class_prefix . 'answer-icon-content-2,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label input[type="radio"] ~ .' . $this->html_class_prefix . 'answer-label-content .' . $this->html_class_prefix . 'answer-icon-content .' . $this->html_class_prefix . 'answer-icon-content-2 {
                border-color: ' . ( $this->options[ $this->name_prefix . 'is_modern' ] ? $this->options[ $this->name_prefix . 'buttons_bg_color' ] : $this->options[ $this->name_prefix . 'text_color' ] ) . ';
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' textarea.' . $this->html_class_prefix . 'question-input:focus ~ .' . $this->html_class_prefix . 'input-underline-animation,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' input.' . $this->html_class_prefix . 'input:focus ~ .' . $this->html_class_prefix . 'input-underline-animation {
                background-color: ' . ( $this->options[ $this->name_prefix . 'is_modern' ] ? $this->options[ $this->name_prefix . 'text_color' ] : $this->options[ $this->name_prefix . 'color' ] ) . ';
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container .' . $this->html_class_prefix . 'section-button-content button.' . $this->html_class_prefix . 'section-button,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container .' . $this->html_class_prefix . 'section-button-content a.' . $this->html_class_prefix . 'section-button,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container .' . $this->html_class_prefix . 'section-button-content input.' . $this->html_class_prefix . 'section-button {
                color: ' . $this->options[ $this->name_prefix . 'buttons_text_color' ] . ';
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label:hover .' . $this->html_class_prefix . 'answer-icon-ink{
                background-color: ' . Survey_Maker_Data::hex2rgba( $filtered_survey_color, 0.04 ) . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:hover .' . $this->html_class_prefix . 'section-button-content button.' . $this->html_class_prefix . 'section-button,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:hover .' . $this->html_class_prefix . 'section-button-content input.' . $this->html_class_prefix . 'section-button,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:focus .' . $this->html_class_prefix . 'section-button-content button.' . $this->html_class_prefix . 'section-button,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:focus .' . $this->html_class_prefix . 'section-button-content input.' . $this->html_class_prefix . 'section-button {
                color: ' . Survey_Maker_Data::hex2rgba( $this->options[ $this->name_prefix . 'buttons_text_color' ], 0.7) . ';
                background-color: ' . Survey_Maker_Data::hex2rgba( $this->options[ $this->name_prefix . 'buttons_bg_color' ] ) . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-required-icon,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-title {
                font-size: ' . $this->options[ $this->name_prefix . 'question_font_size' ] . 'px;
                line-height: 1.5;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' 
            .' . $this->html_class_prefix . 'sections 
            .' . $this->html_class_prefix . 'question
            .' . $this->html_class_prefix . 'question-header
            .' . $this->html_class_prefix . 'question-header-content 
            .' . $this->html_class_prefix . 'question-title p{
                margin: 0;
                color: ' . $this->options[ $this->name_prefix . 'text_color' ] . ';
            }';
        $content[] = '
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-title{
                padding-top: 10px;
                text-align: ' . $this->options[ $this->name_prefix . 'question_title_alignment' ] . ';
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-image {
                width: ' . $question_image_width . ';
                height: ' . $question_image_height . ';
                object-fit: ' . $this->options[ $this->name_prefix . 'question_image_sizing' ] . ';
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-image-caption {
                text-align: ' . $this->options[ $this->name_prefix . 'question_caption_text_alignment' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label-content > span {
                font-size: ' . $this->options[ $this->name_prefix . 'answer_font_size' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing' ] . 'px;
                word-break: break-word;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer {
                padding: ' . $this->options[ $this->name_prefix . 'answers_padding' ] . 'px ' . $this->options[ $this->name_prefix . 'answers_padding' ] . 'px ' . $this->options[ $this->name_prefix . 'answers_padding' ] . 'px 0;
                margin: ' . $this->options[ $this->name_prefix . 'answers_gap' ] . 'px ' . $this->options[ $this->name_prefix . 'answers_gap' ] . 'px ' . $this->options[ $this->name_prefix . 'answers_gap' ] . 'px 0;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-image {
                object-fit: ' . $this->options[ $this->name_prefix . 'answers_object_fit' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container .' . $this->html_class_prefix . 'section-button-content .' . $this->html_class_prefix . 'section-button {
                font-size: ' . $this->options[ $this->name_prefix . 'buttons_font_size' ] . 'px;
                padding-left: ' . $this->options[ $this->name_prefix . 'buttons_left_right_padding' ] . 'px;
                padding-right: ' . $this->options[ $this->name_prefix . 'buttons_left_right_padding' ] . 'px;
                padding-top: ' . $this->options[ $this->name_prefix . 'buttons_top_bottom_padding' ] . 'px;
                padding-bottom: ' . $this->options[ $this->name_prefix . 'buttons_top_bottom_padding' ] . 'px;
                background-color: ' . $this->options[ $this->name_prefix . 'buttons_bg_color' ] . ';
                letter-spacing: ' . $this->options[ $this->name_prefix . 'buttons_text_letter_spacing' ] . 'px;
                height: initial;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container {
                border-radius: ' . $this->options[ $this->name_prefix . 'buttons_border_radius' ] . 'px;
                background-color: ' . $this->options[ $this->name_prefix . 'background_color' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-select.dropdown div.text,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-select.dropdown div.item {
                font-size: ' . $this->options[ $this->name_prefix . 'answer_font_size' ] . 'px !important;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing' ] . 'px;
                font-weight: normal;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-star .' . $this->html_class_prefix . 'answer-star-radio,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-star .' . $this->html_class_prefix . 'answer-star-radio-label,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-select.dropdown div.item {
                font-size: ' . $this->options[ $this->name_prefix . 'answer_font_size' ] . 'px !important;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing' ] . 'px;
                color: ' . $this->options[ $this->name_prefix . 'text_color' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' label.' . $this->html_class_prefix . 'individual-submission-conatiner-star-label-stars div:nth-child(2) > i.fa.fa_star_o::before{
                content: "\f006";
            }

            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label .' . $this->html_class_prefix . 'answer-star-radio input {
                display: none ;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .lds-ripple[data-role="loader"] div{
                border-color: ' . $this->options[ $this->name_prefix . 'loader_color' ] . ';
            }
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .lds-dual-ring[data-role="loader"]::after,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .lds-hourglass[data-role="loader"]::after{
                border-color: ' . $this->options[ $this->name_prefix . 'loader_color' ] . ' transparent ' . $this->options[ $this->name_prefix . 'loader_color' ] . ' transparent;
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .lds-default[data-role="loader"] div,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .lds-ellipsis[data-role="loader"] div,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .lds-facebook[data-role="loader"] div,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .lds-circle[data-role="loader"] {
                background-color: ' . $this->options[ $this->name_prefix . 'loader_color' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .ays-survey-loader-snake[data-role="loader"]{
                color:' . $this->options[ $this->name_prefix . 'loader_color' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' textarea.' . $this->html_class_prefix . 'question-input {
                min-height: ' . $this->options[ $this->name_prefix . 'textarea_height' ] . 'px !important;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .'.$this->name_prefix.'expired-survey-message {
                color: ' . $this->options[ $this->name_prefix . 'text_color' ] . ';
            }';
        $content[] = '
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'simple-button-container .' . $this->html_class_prefix . 'button-content .' . $this->html_class_prefix . 'button{
                color: ' . $this->options[ $this->name_prefix . 'buttons_text_color' ] . ';
                background-color: ' . $this->options[ $this->name_prefix . 'buttons_bg_color' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'full-screen-mode .' . $this->html_class_prefix . 'close-full-screen,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'full-screen-mode .' . $this->html_class_prefix . 'open-full-screen{
                fill: ' . $this->options[ $this->name_prefix . 'full_screen_button_color' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-wrap{
                background-color: ' . $this->options[ $this->name_prefix . 'color' ] . ';
                border-color: ' . $this->options[ $this->name_prefix . 'color' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-fill{
                background-color: ' . $this->options[ $this->name_prefix . 'background_color' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-status .' . $this->html_class_prefix . 'live-bar-status-text{
                font-size: ' . $this->options[ $this->name_prefix . 'progress_bar_text_font_size' ] . 'px;
                color: ' . $this->options[ $this->name_prefix . 'pagination_text_color' ] . ';
                padding: 0 10px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'progress_bar_text_letter_spacing' ] . 'px;
                line-height: 30px;
                font-weight: normal;
                text-transform: '.$this->options[ $this->name_prefix . 'progress_bar_text_transform' ].';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'title{
                text-align: ' . $this->options[ $this->name_prefix . 'title_alignment' ] . ';
                font-size: ' . $this->options[ $this->name_prefix . 'title_font_size' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'title_letter_spacing' ] . 'px;
                '. $survey_title_box_shadow_class .'
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'section-title-row-main{
                text-align: ' . $this->options[ $this->name_prefix . 'section_title_alignment' ] . ';
                font-size: ' . $this->options[ $this->name_prefix . 'section_title_font_size' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'section_title_letter_spacing' ] . 'px;
                width: 100%;
                line-height: 1.5;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'answer-label .' . $this->html_class_prefix . 'answer-image-container{
                height: ' . $this->options[ $this->name_prefix . 'answers_image_size' ] . 'px;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'section-desc{
                text-align: ' . $this->options[ $this->name_prefix . 'section_description_alignment' ] . ';
                font-size: ' . $this->options[ $this->name_prefix . 'section_description_font_size' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'section_description_letter_spacing' ] . 'px;
                line-height: 1;
            }';
        $content[] = '
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'cover-photo-title-wrap{
                height: ' . $this->options[ $this->name_prefix . 'cover_photo_height' ] . 'px;
                background-position: ' . implode(" ", explode("_" , $this->options[ $this->name_prefix . 'cover_photo_position' ])) .';
                background-size: ' . $this->options[ $this->name_prefix . 'cover_photo_object_fit' ] .';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section .' . $this->html_class_prefix . 'question .' . $this->html_class_prefix . 'image-logo-url{
               '.$survey_logo_image_position.'
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section .' . $this->html_class_prefix . 'question .' . $this->html_class_prefix . 'question-text-message,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section .' . $this->html_class_prefix . 'question .' . $this->html_class_prefix . 'number-limit-message-box{
               color: ' . $this->options[ $this->name_prefix . 'text_color' ] . ';
               text-align: left;
               font-size: 12px;
               padding-top: 10px;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section .' . $this->html_class_prefix . 'question .' . $this->html_class_prefix . 'question-text-error-message {
                color: #ff0000;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-main{
                flex-direction: '.$pagination_positioning.';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons{
                margin-top: ' . $this->options[ $this->name_prefix . 'buttons_top_distance' ] . 'px;
                text-align: ' . $this->options[ $this->name_prefix . 'buttons_alignment' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'results .' . $this->html_class_prefix . 'section-buttons{
                margin-top: 0;
            }
                        
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question-content .' . $this->html_class_prefix . 'question-answers:not(.' . $this->html_class_prefix . 'question-answers-grid){
                align-items: ' . $this->options[ $this->name_prefix . 'answers_view_alignment' ] . ';
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question-content .' . $this->html_class_prefix . 'question-answers-grid{
                justify-content: ' . $this->options[ $this->name_prefix . 'answers_view_alignment' ] . ';
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question .' . $this->html_class_prefix . 'answer{
                '.$answers_list_width.'
                '.$answers_list_direction.'
                '.$answers_grid_min_width.'
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question .' . $this->html_class_prefix . 'answer.' . $this->html_class_prefix . 'other-answer-container{
                '.$other_answer_box_width.'
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question[data-type="short_text"] .' . $this->html_class_prefix . 'answer,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question[data-type="text"] .' . $this->html_class_prefix . 'answer,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question[data-type="email"] .' . $this->html_class_prefix . 'answer,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question[data-type="name"] .' . $this->html_class_prefix . 'answer,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question[data-type="number"] .' . $this->html_class_prefix . 'answer,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question[data-type="phone"] .' . $this->html_class_prefix . 'answer{
                width: 100%;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'question-image-caption span{
                color: '.$this->options[ $this->name_prefix . 'question_caption_text_color' ].';
                font-size: '.$this->options[ $this->name_prefix . 'question_caption_font_size' ].'px;
                text-transform: '.$this->options[ $this->name_prefix . 'question_caption_text_transform' ].';
                letter-spacing: '.$this->options[ $this->name_prefix . 'question_caption_letter_spacing' ].'px;
            }
                        
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . '.' . $this->html_class_prefix . 'container .' . $this->html_class_prefix . 'restricted-content.' . $this->html_class_prefix . 'section .' . $this->html_class_prefix . 'section-header p,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . '.' . $this->html_class_prefix . 'container .' . $this->html_class_prefix . 'restricted-content .' . $this->html_class_prefix . 'section-header *{
                color: ' . $this->options[ $this->name_prefix . 'text_color' ] . ';
            }

            ';

            if($this->options[ $this->name_prefix . 'enable_survey_start_loader' ]){
                $content[] = '#' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . '.' . $this->html_class_prefix . 'container {
                    min-height: 250px;
                }';
            }

            if( $this->options[ $this->name_prefix . 'is_minimal' ] ){
                $content[] = 
                '#' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'minimal-theme-header {
                    box-shadow: unset;
                    border: 0;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question.' . $this->html_class_prefix . 'minimal-theme-question {
                    border: 0;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label-content .' . $this->html_class_prefix . 'answer-icon-content {
                    display: none;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label input {
                    display: block ;
                    cursor: pointer;
                    outline: none;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label {
                    justify-content: initial;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label .' . $this->html_class_prefix . 'answer-star-radio input {
                    display: none ;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-matrix-scale-main .' . $this->html_class_prefix . 'answer-matrix-scale-container .' . $this->html_class_prefix . 'answer-matrix-scale-row .' . $this->html_class_prefix . 'answer-matrix-scale-column-content,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-slider-list-main .' . $this->html_class_prefix . 'answer-slider-list-container .' . $this->html_class_prefix . 'answer-slider-list-row .' . $this->html_class_prefix . 'answer-slider-list-column-content,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-star-list-main .' . $this->html_class_prefix . 'answer-star-list-container .' . $this->html_class_prefix . 'answer-star-list-row .' . $this->html_class_prefix . 'answer-matrix-scale-column-content {
                    width: initial;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' input[type=range].' . $this->html_class_prefix . 'range-type-input {
                    -webkit-appearance: auto;
                    appearance: auto;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' input[type=range].' . $this->html_class_prefix . 'range-type-input {
                    -moz-appearance: auto;
                    appearance: auto;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .'.$this->html_class_prefix.'minimal-theme-textarea-input {
                    border: 1px solid !important;
                    transition: 0;
                    width: 100%;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-select-conteiner-minimal {
                    width: 230px;
                    padding: 5px !important;
                    outline: none;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .'.$this->html_class_prefix.'question-date-input-box {
                    width: 230px;
                    height: 40px;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .'.$this->html_class_prefix.'question-date-input-box input {
                    width: 100%;
                    height: 100%;
                    box-sizing: border-box;
                    font-size: 15px;
                    padding: 10px;
                }';
            }

            if( $this->options[ $this->name_prefix . 'is_modern' ] ){
                $content[] = 
                '#' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-questions > .' . $this->html_class_prefix . 'question.' . $this->html_class_prefix . 'modern-theme-question{
                    border: none;
                    margin: 15px 0 0;
                    padding: '. ((isset($this->options[ $this->name_prefix . 'logo' ]) && $this->options[ $this->name_prefix . 'logo' ] != "") ? '0 0 50px 0': '1px 12px').';
                }
    
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-questions > .' . $this->html_class_prefix . 'question.' . $this->html_class_prefix . 'modern-theme-question:not(:last-child){
                    border-radius: unset;
                }
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-footer{
                    margin-top:11px 12pxpx;
                }
    
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-questions > div.' . $this->html_class_prefix . 'question.' . $this->html_class_prefix . 'modern-theme-question:last-child{
                    border-bottom-left-radius: 5px;
                    border-bottom-right-radius: 5px;
                    border-top-left-radius: 0;
                    border-top-right-radius: 0;
                }
                
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'modern-theme-header{
                    border-bottom-left-radius: 0;
                    border-bottom-right-radius: 0;
                    border-top-left-radius: 5px;
                    border-top-right-radius: 5px;
                    border: none;
                    box-shadow: none;
                    margin: 0;
                }
    
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-questions > .' . $this->html_class_prefix . 'question.' . $this->html_class_prefix . 'modern-theme-question .' . $this->html_class_prefix . 'question-header{
                    margin: 7px 0;
                }
    
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-questions > .' . $this->html_class_prefix . 'question.' . $this->html_class_prefix . 'modern-theme-question .' . $this->html_class_prefix .'question-content > .' . $this->html_class_prefix . 'question-answers > .' . $this->html_class_prefix . 'answer {
                    padding: 5px 0;
                    margin: 0px;
                }
    
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'modern-theme-header > .' . $this->html_class_prefix . 'results .' . $this->html_class_prefix . 'thank-you-page .' . $this->html_class_prefix . 'submission-summary-question-container, 
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'modern-theme-header > .' . $this->html_class_prefix . 'results .' . $this->html_class_prefix . 'thank-you-page .' . $this->html_class_prefix . 'submission-summary-section-header{
                    border: none;
                }
    
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-title {
                    font-weight: bold;
                    margin: 0 !important;
                    text-align: ' . $this->options[ $this->name_prefix . 'question_title_alignment' ] . ';
                }
    
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:hover .' . $this->html_class_prefix . 'section-button-content button.' . $this->html_class_prefix . 'section-button,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:hover .' . $this->html_class_prefix . 'section-button-content a.' . $this->html_class_prefix . 'section-button,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:hover .' . $this->html_class_prefix . 'section-button-content input.' . $this->html_class_prefix . 'section-button,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'results-content .' . $this->html_class_prefix . 'thank-you-summary-submission-main-container button.' . $this->html_class_prefix . 'single-submission-results-export,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'submission-questions-answers > .' . $this->html_class_prefix . 'each-question-answer.' . $this->html_class_prefix . 'answer .ays_text_answer{
                    color: ' . $this->options[ $this->name_prefix . 'color' ] . ';
                }
                
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:hover .' . $this->html_class_prefix . 'section-button-content button.' . $this->html_class_prefix . 'section-button,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:hover .' . $this->html_class_prefix . 'section-button-content input.' . $this->html_class_prefix . 'section-button,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container .' . $this->html_class_prefix . 'section-button-content button.' . $this->html_class_prefix . 'section-button,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container .' . $this->html_class_prefix . 'section-button-content a.' . $this->html_class_prefix . 'section-button,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'results-content .' . $this->html_class_prefix . 'thank-you-summary-submission-main-container button.' . $this->html_class_prefix . 'single-submission-results-export{
                    background-color: ' . Survey_Maker_Data::hex2rgba( $this->options[ $this->name_prefix . 'buttons_bg_color' ], 0.8 ) . ';
                    color: '.$this->options[ $this->name_prefix . 'buttons_text_color' ].';
                }
    
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-wrap {
                    background-color: ' . (  $this->options[ $this->name_prefix . 'is_minimal' ] ? $this->options[ $this->name_prefix . 'text_color' ] : $this->options[ $this->name_prefix . 'buttons_bg_color' ] ) . ';
                    border-color: ' . (  $this->options[ $this->name_prefix . 'is_minimal' ] ? $this->options[ $this->name_prefix . 'text_color' ] : $this->options[ $this->name_prefix . 'buttons_bg_color' ] ) . ';
                }
    
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-fill {
                    background-color: ' . (  $this->options[ $this->name_prefix . 'is_minimal' ] ? $this->options[ $this->name_prefix . 'text_color' ]  : $this->options[ $this->name_prefix . 'buttons_text_color' ] ) . ';
                }
    
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-questions > .' . $this->html_class_prefix . 'question.' . $this->html_class_prefix . 'modern-theme-question .' . $this->html_class_prefix .'question-input{
                    background-color: unset;
                }

                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:hover .' . $this->html_class_prefix . 'section-button-content button.' . $this->html_class_prefix . 'section-button,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:hover .' . $this->html_class_prefix . 'section-button-content input.' . $this->html_class_prefix . 'section-button,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:focus .' . $this->html_class_prefix . 'section-button-content button.' . $this->html_class_prefix . 'section-button,
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container:focus .' . $this->html_class_prefix . 'section-button-content input.' . $this->html_class_prefix . 'section-button {
                    color: ' . Survey_Maker_Data::hex2rgba( $this->options[ $this->name_prefix . 'buttons_text_color' ], 0.7) . ';
                    background-color: ' . Survey_Maker_Data::hex2rgba( $this->options[ $this->name_prefix . 'buttons_bg_color' ], 0.8 ) . ';
                }
    
                ';
            }

            $content[] = $this->get_css_mobile_part($mobile_max_width, $mobile_width, $pagination_number_height);

            if( isset($this->options[ $this->name_prefix . 'cover_photo' ]) && $this->options[ $this->name_prefix . 'cover_photo' ] != "" ){
                $content[] = 
                '#' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .'.$this->html_class_prefix.'cover-photo-title-wrap {
                    background-image: url('.$this->options[ $this->name_prefix . 'cover_photo' ].');
                    background-repeat: no-repeat;
                }
                              
                #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .'.$this->html_class_prefix.'cover-photo-title-wrap .'.$this->html_class_prefix.'title {
                    display: flex;
                    align-items: flex-end;
                    height: 100%;
                }
                 ';

                $title_alignment_with_cover_photo_css = 'flex-start';
                switch( $this->options[ $this->name_prefix . 'title_alignment' ] ){
                    case "left":
                        $title_alignment_with_cover_photo_css = 'flex-start';
                    break;
                    case "right":
                        $title_alignment_with_cover_photo_css = 'flex-end';
                    break;
                    case "center":
                        $title_alignment_with_cover_photo_css = 'center';
                    break;
                    default:
                        $title_alignment_with_cover_photo_css = 'flex-start';
                    break;
                }
                
                $content[] = 
                    '#' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .'.$this->html_class_prefix.'cover-photo-title-wrap .'.$this->html_class_prefix.'title {
                        justify-content: ' . $title_alignment_with_cover_photo_css . ';
                    }';
 
            }
    	
    	$content[] = '</style>';

    	$content = implode( '', $content );

    	return $content;
    }

    public function get_custom_css(){
		
        $content = array();

        if( $this->options[ $this->name_prefix . 'custom_css' ] != '' ){

            $content[] = '<style type="text/css">';
            
	        	$content[] = $this->options[ $this->name_prefix . 'custom_css' ];
            
            $content[] = '</style>';
            
        }

        $content = implode( '', $content );

    	return $content;
    }

    public function get_encoded_options( $limit ){
        
        $content = array();

        if( isset( $this->options[ $this->name_prefix . 'submit_redirect_delay' ] ) ){
            $this->options[ $this->name_prefix . 'submit_redirect_seconds'] = Survey_Maker_Data::secondsToWords( intval( $this->options[ $this->name_prefix . 'submit_redirect_delay' ] ) );
        }

        // Animation Top (px)
        $setting_options = Survey_Maker_Data::get_setting_data( 'options' );
        $survey_animation_top = ( isset($setting_options[ 'survey_animation_top' ]) && $setting_options[ 'survey_animation_top' ] != '' ) ? intval( $setting_options[ 'survey_animation_top' ] ) : '';
        $setting_options['survey_enable_animation_top'] = isset($setting_options['survey_enable_animation_top']) ? $setting_options['survey_enable_animation_top'] : 'on';
        $survey_enable_animation_top = ( isset($setting_options[ 'survey_enable_animation_top' ]) && $setting_options[ 'survey_enable_animation_top' ] == 'on' ) ? true : false;
        
        $this->options['is_user_logged_in'] = is_user_logged_in();

        $this->options[ $this->name_prefix . 'animation_top'] = $survey_animation_top;
        $this->options[ $this->name_prefix . 'enable_animation_top'] = $survey_enable_animation_top;

        $options = array();
        if( ! $limit ){
            foreach( $this->options as $k => $q ){
                if( strpos( $k, 'email' ) !== false ){
                    unset( $this->options[ $k ] );
                }
            }
            $options = $this->options;
        }else{
            if($this->options[ $this->name_prefix . 'redirect_delay' ] && $this->options[ $this->name_prefix . 'redirect_delay' ] != ''){
                if($this->options[ $this->name_prefix . 'redirect_url' ] && $this->options[ $this->name_prefix . 'redirect_url' ] != ''){
                    if($this->options[ $this->name_prefix . 'limit_users' ]){
                        $options = array(
                            $this->name_prefix . 'submit_redirect_seconds' => Survey_Maker_Data::secondsToWords( intval( $this->options[ $this->name_prefix . 'submit_redirect_delay' ] ) ),
                            $this->name_prefix . 'submit_redirect_delay' => intval( $this->options[ $this->name_prefix . 'submit_redirect_delay' ] ),
                            $this->name_prefix . 'submit_redirect_url' => $this->options[ $this->name_prefix . 'submit_redirect_url' ],
                            $this->name_prefix . 'limit_users' => $this->options[ $this->name_prefix . 'limit_users' ],
                            $this->name_prefix . 'redirect_url' => $this->options[ $this->name_prefix . 'redirect_url' ],
                            $this->name_prefix . 'redirect_delay' => intval( $this->options[ $this->name_prefix . 'redirect_delay' ] ),
                            $this->name_prefix . 'redirect_delay_seconds' => Survey_Maker_Data::secondsToWords( intval( $this->options[ $this->name_prefix . 'redirect_delay' ] ) ),
                        );
                    }
                }
            }

            $options[ $this->name_prefix . 'enable_survey_start_loader' ] = $this->options[ $this->name_prefix . 'enable_survey_start_loader' ];
        }

        $content[] = '<script type="text/javascript">';
    
        $content[] = "
                if(typeof aysSurveyOptions === 'undefined'){
                    var aysSurveyOptions = [];
                }
                aysSurveyOptions['" . $this->unique_id . "']  = '" . base64_encode( json_encode( $options ) ) . "';";
        
        $content[] = '</script>';
    
        $content = implode( '', $content );

    	return $content;
    }

    protected function ays_survey_check_limitations($limit_by, $limit_users_data){
        $is_limited = false;
        switch($limit_by){
            case 'cookie':

                // PRO FEATURE
                // $started_user_count = Survey_Maker_Data::get_limit_cookie_count( $limit_users_attr );
                // if( $quiz_max_pass_count > $started_user_count){
                //     $limit_users_attr['increase_count'] = true;
                // }
                $check_cookie = Survey_Maker_Data::ays_survey_check_cookie( $limit_users_data );
                $return_false_status_arr = array(
                    "status" => false,
                    "message" => __( 'You already passed this survey.', "survey-maker" ),
                    "limited" => true
                );

                // PRO FEATURE
                // if( $quiz_max_pass_count <= $started_user_count){
                //     echo json_encode( $return_false_status_arr );
                //     wp_die();
                // }

                if( ! $check_cookie ){
                    $set_cookie = Survey_Maker_Data::ays_survey_set_cookie( $limit_users_data );
                    $is_limited = true;
                }
                else{
                    echo json_encode( $return_false_status_arr );
                    wp_die();
                }
                break;
            case 'ip_cookie':
                $check_user_by_ip = Survey_Maker_Data::get_user_by_ip( $limit_users_data['id'] );

                $started_user_count = Survey_Maker_Data::get_limit_cookie_count( $limit_users_data );
                $check_cookie = Survey_Maker_Data::ays_survey_check_cookie( $limit_users_data );

                if ( ! $check_cookie || $check_user_by_ip <= 0 ) {
                    if ( ! $check_cookie ) {
                        $set_cookie = Survey_Maker_Data::ays_survey_set_cookie( $limit_users_data );
                    }
                } 
                $is_limited = true;
                break;
    
        }
        return $is_limited;
    }

    public function ays_survey_get_user_information() {
        $output = array();
        if(isset($_POST['nonce']) && wp_verify_nonce($_POST['nonce'], 'survey_maker_autofill_nonce')){
            if(is_user_logged_in()) {
                $output = wp_get_current_user();
            } else {
                $output = array();
            }
        }
        return $output;
    }

    public function ays_survey_popup_set_cookie(){
        if( isset( $_REQUEST['id'] ) && $_REQUEST['id'] != '' ){
            $id = sanitize_text_field( $_REQUEST['id'] );
        }else{
            $id = null;
        }
        if( $id === null ){
            return array(
                'status' => false
            );
        }

        $cookie_name = 'ays_survey_popup_cookie_name_'.$id;
        $cookie_value = 'ays_survey_popup_cookie_value_'.$id;
        $cookie_expiration = time() + (12 * 30 * 24 * 60 * 60);
        setcookie($cookie_name, $cookie_value, $cookie_expiration, '/');
        return array(
            'status' => true
        );
    }

    public function get_css_mobile_part($mobile_max_width, $mobile_width, $pagination_number_height) {
        $content = '';

        $question_image_width_mobile = '100%';
        if( $this->options[ $this->name_prefix . 'question_image_width_mobile' ] != '' ){
            $question_image_width_mobile = $this->options[ $this->name_prefix . 'question_image_width_mobile' ] . 'px';
        }
        
        $question_image_height_mobile = 'auto';
        if( $this->options[ $this->name_prefix . 'question_image_height_mobile' ] != '' ){
            $question_image_height_mobile = $this->options[ $this->name_prefix . 'question_image_height_mobile' ] . 'px';
        }
        else{
            if($this->options[ $this->name_prefix . 'question_image_height' ] != ''){
                $question_image_height_mobile = $this->options[ $this->name_prefix . 'question_image_height' ] . 'px';
            }
        }

        switch($this->options[ $this->name_prefix . 'logo_image_position_mobile' ]){
            case "right":
                $survey_logo_image_position_mobile = "right: 5px;";
                break;
            case "left":
                $survey_logo_image_position_mobile = "left: 5px;";
                break;
            case "center":
                $survey_logo_image_position_mobile = "left: 50%;";
                break;
            default:
                $survey_logo_image_position_mobile = "right: 5px;";
                break;
        }

        
        switch($this->options[ $this->name_prefix . 'start_page_button_pos_mobile' ]){
            case "left":
                $survey_start_page_button_pos_mobile = 'justify-content: flex-start;';
            break;
            case "center":
                $survey_start_page_button_pos_mobile = 'justify-content: center;';
            break;
            case "right":
                $survey_start_page_button_pos_mobile = 'justify-content: flex-end;';
            break;
        }

        $survey_pagination_positioning_mobile = isset($this->options[ $this->name_prefix . 'pagination_positioning_mobile' ]) ? $this->options[ $this->name_prefix . 'pagination_positioning_mobile' ] : 'none';
        $pagination_positioning_mobile = "row";
        // $pagination_number_height = "";
        switch ($survey_pagination_positioning_mobile) {
            case 'none':
                $pagination_positioning_mobile = "row";
                break;
            case 'reverse':
                $pagination_positioning_mobile = "row-reverse";
                break;
            case 'column':
                $pagination_positioning_mobile = "column";
                // $pagination_number_height = "line-height: 1;";
                break;
            case 'column_reverse':
                $pagination_positioning_mobile = "column-reverse";
                // $pagination_number_height = "line-height: 1;";
            break;
            default:
                $pagination_positioning_mobile = "row";
                // $pagination_number_height = "";
                break;
        }

        // Question padding mobile
        $question_padding = $this->options[ $this->name_prefix . 'question_padding_mobile' ];
        $question_caption_text_display = !$this->options[ $this->name_prefix . 'question_caption_hide_on_mobile' ] ? 'block' : 'none';
        $content .= '
        @media screen and (max-width: 640px){
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' {
                max-width: '. $mobile_max_width .';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' {
                width: ' . $mobile_width . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-box{
                width: 100%;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-main{
                flex-wrap: wrap;
                flex-direction: '.$pagination_positioning_mobile.';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'footer-with-live-bar{
                flex-direction: column-reverse;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-main{
                margin-bottom: 10px;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-required-icon,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-title {
                font-size: ' . $this->options[ $this->name_prefix . 'question_font_size_mobile' ] . 'px;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question {
                ' . ( $this->options[ $this->name_prefix . 'logo' ] != '' ? 'padding: '.$question_padding.'px '.$question_padding.'px 0 '.$question_padding.'px;' : 'padding: '.$question_padding.'px;' ) . '
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons {
                margin-top: ' . $this->options[ $this->name_prefix . 'buttons_top_distance_mobile' ] . 'px;
                text-align: ' . $this->options[ $this->name_prefix . 'buttons_alignment_mobile' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container{
                border-radius: ' . $this->options[ $this->name_prefix . 'buttons_border_radius_mobile' ] . 'px;            
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-buttons .' . $this->html_class_prefix . 'section-button-container .' . $this->html_class_prefix . 'section-button-content .' . $this->html_class_prefix . 'section-button{
                font-size: ' . $this->options[ $this->name_prefix . 'buttons_mobile_font_size' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'buttons_text_letter_spacing_mobile' ] . 'px;
                line-height: 2.5;
                white-space: normal;
                word-break: break-word;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'title{
                text-align: ' . $this->options[ $this->name_prefix . 'title_alignment_mobile' ] . ';
                font-size: ' . $this->options[ $this->name_prefix . 'title_font_size_for_mobile' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'title_letter_spacing_mobile' ] . 'px;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'section-title-row-main{
                text-align: ' . $this->options[ $this->name_prefix . 'section_title_alignment_mobile' ] . ';
                font-size: ' . $this->options[ $this->name_prefix . 'section_title_font_size_mobile' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'section_title_letter_spacing_mobile' ] . 'px;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'sections .' . $this->html_class_prefix . 'section-desc{
                text-align: ' . $this->options[ $this->name_prefix . 'section_description_alignment_mobile' ] . ';
                font-size: ' . $this->options[ $this->name_prefix . 'section_description_font_size_mobile' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'section_description_letter_spacing_mobile' ] . 'px;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' input.' . $this->html_class_prefix . 'question-input {
                font-size: ' . $this->options[ $this->name_prefix . 'answer_font_size_on_mobile' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing_mobile' ] . 'px;
                height: auto;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' textarea.' . $this->html_class_prefix . 'question-input {
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing_mobile' ] . 'px;
            }

            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer {
                padding: ' . $this->options[ $this->name_prefix . 'answers_padding_mobile' ] . 'px ' . $this->options[ $this->name_prefix . 'answers_padding_mobile' ] . 'px ' . $this->options[ $this->name_prefix . 'answers_padding_mobile' ] . 'px 0;
                margin: ' . $this->options[ $this->name_prefix . 'answers_gap_mobile' ] . 'px ' . $this->options[ $this->name_prefix . 'answers_gap_mobile' ] . 'px ' . $this->options[ $this->name_prefix . 'answers_gap_mobile' ] . 'px 0;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-label-content > span {
                font-size: ' . $this->options[ $this->name_prefix . 'answer_font_size_on_mobile' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing_mobile' ] . 'px;
                line-height: 1;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-select.dropdown div.text,
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-select.dropdown div.item {
                font-size: ' . $this->options[ $this->name_prefix . 'answer_font_size_on_mobile' ] . 'px !important;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing_mobile' ] . 'px;
                line-height: 1 !important;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section.' . $this->html_class_prefix . 'section-start-page .' . $this->html_class_prefix . 'section-header .' . $this->html_class_prefix . 'section-title-row {
                justify-content: ' . $this->options[ $this->name_prefix . 'start_page_title_pos_mobile' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-select.dropdown div.item {
                font-size: ' . $this->options[ $this->name_prefix . 'answer_font_size_on_mobile' ] . 'px !important;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing_mobile' ] . 'px;
                line-height: 1 !important;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section .' . $this->html_class_prefix . 'question .' . $this->html_class_prefix . 'image-logo-url{
               '.$survey_logo_image_position_mobile.'
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-status .' . $this->html_class_prefix . 'live-bar-status-text{
                font-size: ' . $this->options[ $this->name_prefix . 'answer_font_size_on_mobile' ] . 'px;
                letter-spacing: ' . $this->options[ $this->name_prefix . 'answer_letter_spacing_mobile' ] . 'px;
                '.$pagination_number_height.'
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'cover-photo-title-wrap{
                height: ' . $this->options[ $this->name_prefix . 'cover_photo_mobile_height' ] . 'px;
            }
            
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-image-caption span{
                color: '.$this->options[ $this->name_prefix . 'question_caption_text_color_mobile' ].' !important;
                font-size: '.$this->options[ $this->name_prefix . 'question_caption_font_size_on_mobile' ].'px;
                text-transform: '.$this->options[ $this->name_prefix . 'question_caption_text_transform_mobile' ].' !important;
                letter-spacing: '.$this->options[ $this->name_prefix . 'question_caption_letter_spacing_mobile' ].'px !important;
                display: '.$question_caption_text_display .';
                text-align: ' . $this->options[ $this->name_prefix . 'question_caption_text_alignment_on_mobile' ] . ';
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-status .' . $this->html_class_prefix . 'live-bar-status-text{
                font-size: ' . $this->options[ $this->name_prefix . 'progress_bar_text_font_size_on_mobile' ] . 'px;
                color: ' . $this->options[ $this->name_prefix . 'pagination_text_color_mobile' ] . ';
                letter-spacing: ' . $this->options[ $this->name_prefix . 'progress_bar_text_letter_spacing_mobile' ] . 'px;
                text-transform: '.$this->options[ $this->name_prefix . 'progress_bar_text_transform_mobile' ].';                
                line-height: 1;
            }
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'question-image {
                width: ' . $question_image_width_mobile . ';
                height: ' . $question_image_height_mobile . ';
                object-fit: ' . $this->options[ $this->name_prefix . 'question_image_sizing_mobile' ] . ';
            }
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'answer-image {
                object-fit: ' . $this->options[ $this->name_prefix . 'answers_object_fit_mobile' ] . ';
            }
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'section-start-page .' . $this->html_class_prefix . 'section-buttons {
                display: flex;
                '.$survey_start_page_button_pos_mobile.'
            }
        }';
        $content .= '
        @media screen and (max-width: 580px) {
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . '.' . $this->html_class_prefix . 'container .' . $this->html_class_prefix . 'section .' . $this->html_class_prefix . 'answer-label .' . $this->html_class_prefix . 'answer-image-container{
                height: ' . $this->options[ $this->name_prefix . 'answers_image_size_mobile' ] . 'px;
            }

            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . ' .' . $this->html_class_prefix . 'live-bar-main{
                justify-content: center;
            }
        }';
        $content .= '
        @media screen and (min-width: 580px) and (max-width: 1024px) {
            #' . $this->html_class_prefix . 'container-' . $this->unique_id_in_class . '.' . $this->html_class_prefix . 'container .' . $this->html_class_prefix . 'section .' . $this->html_class_prefix . 'answer-label .' . $this->html_class_prefix . 'answer-image-container{
               height: 150px;
            }
        }';

        return $content;
    }

    
    public function ays_generate_survey_popup_method( $attr ){

        $id = (isset($attr['id'])) ? absint(intval($attr['id'])) : null;
        if (is_null($id)) {
            return '';
        }
        
        $this->enqueue_scripts_popups();

        $content = $this->ays_popup_shortcode_content($id, $attr);
        return $content ? str_replace( array( "\r\n", "\n", "\r" ), "\n", $content ) : '';  
    }

    
    public function ays_popup_shortcode_content( $id, $attr ){
        global $wpdb;
        $post_id = get_the_ID();
        $popup_surveys_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys";
        $surveys_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "surveys";
        $sql = "SELECT p_s.*, s.options as s_options, s.status as survey_status 
                FROM {$popup_surveys_table} as p_s 
                LEFT JOIN {$surveys_table} AS s 
                    ON p_s.survey_id = s.id 
                WHERE p_s.id = {$id}";
        $popup = $wpdb->get_row( $sql, "ARRAY_A" );
        
        if( empty( $popup ) ){
            return '';
        }

        $survey_status = (isset($popup['survey_status'] ) && $popup['survey_status']  != '') ? $popup['survey_status']  : 'published';
        $is_elementor_exists = Survey_Maker_Data::ays_survey_is_elementor();
        if($survey_status == 'published' && !$is_elementor_exists){

            $show_all = $popup['show_all'];
            switch($show_all){
                case 'all':
                    $show_popup = true;
                break;
                case 'selected':
                    $show_popup = false;
                break;
                case 'except':
                    $show_popup = true;
                break;
                default:
                    $show_popup = true;
                    $show_all = 'all';
                break;
            }

            $show = array('selected');
            
            $options = array();
            $survey_options = array();
            if ($popup['options'] != '' || $popup['options'] != null) {
                $options = json_decode( $popup['options'], true );
            }

            if ($popup['s_options'] != '' || $popup['s_options'] != null) {
                $survey_options = json_decode( $popup['s_options'], true );
            }            
            // Title
            $popup_title = isset( $popup["title"] ) && $popup["title"] != "" ? stripslashes( esc_attr( $popup["title"] ) ) : "";

            // Show popup title
            $survey_popup_enable_show_title = (isset($options["popup_enable_show_title"]) && $options["popup_enable_show_title"] == "on") ? true : false;

            // Popup title font size
            $survey_popup_title_font_size = (isset($options['popup_title_font_size']) && $options['popup_title_font_size'] != '') ? absint ( intval( $options['popup_title_font_size'] ) ) : 25;

            // Popup title font size on mobile
            $survey_popup_title_mobile_font_size = (isset($options['popup_title_mobile_font_size']) && $options['popup_title_mobile_font_size'] != '') ? absint ( intval( $options['popup_title_mobile_font_size'] ) ) : $survey_popup_title_font_size;
                    
            // Popup title bg color
            $survey_popup_title_bg_color = (isset($options["popup_title_bg_color"]) && $options["popup_title_bg_color"] != "") ? esc_attr ( $options["popup_title_bg_color"] ) : "#000000";
            // Popup title bg color mobile
            $options["popup_title_bg_color_mobile"] = isset($options["popup_title_bg_color_mobile"]) ? $options["popup_title_bg_color_mobile"] : $survey_popup_title_bg_color;
            $survey_popup_title_bg_color_mobile = (isset($options["popup_title_bg_color_mobile"]) && $options["popup_title_bg_color_mobile"] != "") ? esc_attr ( $options["popup_title_bg_color_mobile"] ) : "#000000";
                    
            // Popup title text color
            $survey_popup_title_text_color = (isset($options["popup_title_text_color"]) && $options["popup_title_text_color"] != "") ? esc_attr ( $options["popup_title_text_color"] ) : "#000000";
            // Popup title text color mobile
            $options["popup_title_text_color_mobile"] = isset($options["popup_title_text_color_mobile"]) ? $options["popup_title_text_color_mobile"] : $survey_popup_title_text_color;
            $survey_popup_title_text_color_mobile = (isset($options["popup_title_text_color_mobile"]) && $options["popup_title_text_color_mobile"] != "") ? esc_attr ( $options["popup_title_text_color_mobile"] ) : "#000000";

            // Popup title alignment
            $survey_popup_title_alignment = (isset($options["popup_title_alignment"]) && $options["popup_title_alignment"] != "") ? esc_attr ( $options["popup_title_alignment"] ) : "left";

            // Popup title alignment on mobile
            $options["popup_title_alignment_on_mobile"] = isset($options["popup_title_alignment_on_mobile"]) ? $options["popup_title_alignment_on_mobile"] : $survey_popup_title_alignment;
            $survey_popup_title_alignment_on_mobile = (isset($options["popup_title_alignment_on_mobile"]) && $options["popup_title_alignment_on_mobile"] != "") ? esc_attr ( $options["popup_title_alignment_on_mobile"] ) : "left";

            // Popup title transform
            $survey_popup_title_transform = (isset($options["popup_title_transform"]) && $options["popup_title_transform"] != "") ? esc_attr ( $options["popup_title_transform"] ) : "none";
            // Popup title transform mobile
            $options["popup_title_transform_mobile"] = isset($options["popup_title_transform_mobile"]) ? $options["popup_title_transform_mobile"] : $survey_popup_title_transform;
            $survey_popup_title_transform_mobile = (isset($options["popup_title_transform_mobile"]) && $options["popup_title_transform_mobile"] != "") ? esc_attr ( $options["popup_title_transform_mobile"] ) : "none";
                
            // Popup title letter spacing
            $survey_popup_title_letter_spacing = (isset( $options[ "popup_title_letter_spacing" ] ) && $options["popup_title_letter_spacing"] != '' && $options["popup_title_letter_spacing"] != '0') ? esc_attr( $options["popup_title_letter_spacing"] ) : 0;

            // Popup title letter spacing mobile
            $options['popup_title_letter_spacing_on_mobile' ] = isset($options['popup_title_letter_spacing_on_mobile' ]) ? $options['popup_title_letter_spacing_on_mobile' ] : $survey_popup_title_letter_spacing;
            $survey_popup_title_letter_spacing_on_mobile = (isset( $options['popup_title_letter_spacing_on_mobile' ] ) && $options['popup_title_letter_spacing_on_mobile'] != '' && $options['popup_title_letter_spacing_on_mobile'] != '0') ? esc_attr( $options['popup_title_letter_spacing_on_mobile'] ) : 0;

            // Hide popup title on mobile
            $survey_popup_hide_title_on_mobile = (isset($options["popup_hide_title_on_mobile"]) && $options["popup_hide_title_on_mobile"] == "on") ? true : false;
            
            // Title border radius
            $survey_popup_title_border_radius = (isset($options["popup_title_border_radius"]) && $options["popup_title_border_radius"] != "") ? absint ( intval( $options["popup_title_border_radius"] ) ) : 0;
            // Title border radius mobile
            $survey_popup_title_border_radius_mobile = (isset($options["popup_title_border_radius_mobile"]) && $options["popup_title_border_radius_mobile"] != "") ? absint ( intval( $options["popup_title_border_radius_mobile"] ) ) : 0;

            // Width
            $popup_survey_width = (isset($options['width']) && $options['width'] != '') ? absint ( intval( $options['width'] ) ) : 800;
            // Mobile width
            $options['width_mobile'] = isset($options['width_mobile']) ? $options['width_mobile'] : $popup_survey_width;
            $popup_survey_width_mobile = (isset($options['width_mobile']) && $options['width_mobile'] != '') ? absint ( intval( $options['width_mobile'] ) ) : 800;
            
            // Height
            $popup_survey_height = (isset($options['height']) && $options['height'] != '') ? absint ( intval( $options['height'] ) ) : 450;
            // Height mobile
            $options['height_mobile'] = isset($options['height_mobile']) ? $options['height_mobile'] : $popup_survey_height;
            $popup_survey_height_mobile = (isset($options['height_mobile']) && $options['height_mobile'] != '') ? absint ( intval( $options['height_mobile'] ) ) : 450;

            // Popup Position
            $popup_position = (isset($options['popup_position']) && $options['popup_position'] != 'center-center') ? $options['popup_position'] : 'center-center';
            
            // Popup Margin
            $popup_margin = (isset($options['popup_margin']) && $options['popup_margin'] != '') ? $options['popup_margin'] : '0';
            
            $hide_popup = (isset($options['hide_popup']) && $options['hide_popup'] == 'on') ?  $options['hide_popup']  : 'off';
            
            // Hide popup after close
            $hide_popup_after_close = (isset($options['hide_popup_after_close']) && $options['hide_popup_after_close'] == 'on') ?  esc_attr($options['hide_popup_after_close'])  : 'off';

            // $survey_bg = (isset($survey_options['survey_background_color']) && $survey_options['survey_background_color'] != '') ? $survey_options['survey_background_color'] : '#ffffff';
            // $survey_theme = (isset($survey_options['survey_theme']) && $survey_options['survey_theme'] != '') ? $survey_options['survey_theme'] : 'classic_light';
            // $is_minimal = $survey_theme == 'minimal' ? true : false;
            // $is_modern = $survey_theme == 'modern' ? true : false;

            // if( $is_minimal || $is_modern){
            //     $survey_bg = '#ffffff';
            // }

            // $survey_text_color = (isset($survey_options['survey_text_color']) && $survey_options['survey_text_color'] != '') ? $survey_options['survey_text_color'] : '#ffffff';
            
            // // Popup full screen mode
            $survey_popup_full_screen = (isset($options["full_screen_mode"]) && $options["full_screen_mode"] == "on") ? true : false;
            // // Popup background color
            $popup_bg_color = (isset($options['popup_bg_color']) && $options['popup_bg_color'] != '') ? $options['popup_bg_color'] : '#ffffff';

            // Popup background color | Mobile
            $popup_bg_color_mobile = (isset($options['popup_bg_color_mobile']) && $options['popup_bg_color_mobile'] != '') ? esc_attr($options['popup_bg_color_mobile']) : $popup_bg_color;

            // // Popup trigger type
            $popup_trigger_type = (isset($options["popup_trigger"]) && $options["popup_trigger"] != "") ? esc_attr($options["popup_trigger"]) : "on_load";
            
            // Popup close after finish
            $survey_enable_popup_close_after_finish = (isset($options["enable_popup_close_after_finish"]) && $options["enable_popup_close_after_finish"] == "on") ? true : false;
            $survey_popup_close_after_finish_delay  = (isset($options[ 'popup_close_after_finish_delay' ]) && $options[ 'popup_close_after_finish_delay' ] != '') ? absint ( intval( $options[ 'popup_close_after_finish_delay' ] ) ) : '';

            // Popup selector
            $popup_selector = (isset($options["popup_selector"]) && $options["popup_selector"] != "") ? stripslashes( esc_attr($options["popup_selector"])) : "";

            // Close by pressing the ESC
            $survey_popup_enable_close_by_esc = (isset($options["popup_enable_close_by_esc"]) && $options["popup_enable_close_by_esc"] != '') ? $options["popup_enable_close_by_esc"] : 'off';


            // if($show_all != 'all'){
            //     if($post_id != false){
            //         $post = get_post( $post_id );
            //         $this_post_title = strval( $post->ID );
            //         $except_posts = array();
            //         $except_post_types = array();
            //         $postType = $post->post_type;

            //         if (isset($options['except_posts']) && !empty($options['except_posts'])) {
            //             $except_posts = $options['except_posts'];
            //         }

            //         if (isset($options['except_post_types']) && !empty($options['except_post_types'])) {
            //             $except_post_types = $options['except_post_types'];
            //         }
                    
            //         $except_all_post_types = ( isset( $options['all_posts'] ) && ! empty( $options['all_posts'] ) ) ? $options['all_posts'] : array();
                    
            //         if ( is_front_page() ) {
            //             if( isset($options['show_on_home_page']) && $options['show_on_home_page'] == 'on' ){
            //                 $show_popup = true;
            //             }else{
            //                 $show_popup = false;
            //             }
            //         }
                    
            //         if( in_array( $post_id . "", $except_posts ) ){
            //             if( in_array( $show_all, $show ) ){
            //                 $show_popup = true;
            //             }else{
            //                 $show_popup = false;
            //             }
            //         }elseif( !in_array( $this_post_title, $except_posts ) && in_array( $postType, $except_all_post_types ) ) {
            //             if( in_array( $show_all, $show ) ){
            //                 $show_popup = true;
            //             }else{
            //                 $show_popup = false;
            //             }
            //         }
            //     }
            // }

            switch($popup_trigger_type){
                case 'on_click':
                    $display_popup_on_load = 'display_none_not_important';
                    break;
                case 'on_load': 
                default:
                    $display_popup_on_load = '';
                    break;
            }

            if( ! isset( $_COOKIE[ 'ays_survey_popup_cookie_name_' . $popup['id'] ] ) && ! isset( $_COOKIE[ 'ays_survey_popup_hide_after_click_close_' . $popup['id'] ] ) ){
                if ($show_popup) {
                    $shortcode2 = '[ays_survey id="'. $popup['survey_id'] .'"]';
                    // $popup_survey_view = "<div class='ays-survey-popup-survey-window ays-survey-popup-modal-".$popup['id']."' data-id='".$popup['id']."'>
                    $popup_survey_view = "<div class='ays-survey-popup-survey-window ays-survey-popup-modal-".$popup['id']." ".$display_popup_on_load."' data-id='".$popup['id']."' data-close-popup='".$survey_enable_popup_close_after_finish."'>
                        <div class='ays-survey-popup-btn-close'>
                            <img class='ays-survey-popup-btn-close-icon' src='". SURVEY_MAKER_PUBLIC_URL ."/images/cross.svg'>
                        </div>";
                        $popup_survey_view .= "<div class='ays-survey-popup-content'>";
                        if($survey_popup_enable_show_title){
                            $popup_survey_view .= "<div class='ays-survey-popup-title-content'>".$popup_title."</div>";

                        }
                        if($survey_popup_full_screen){
                            $popup_survey_view .= '<div class="ays-survey-popup-full-screen-mode">
                                                        <a class="ays-survey-popup-full-screen-container">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="#000" viewBox="0 0 24 24" width="24" tabindex="0" class="ays-survey-popup-close-full-screen">
                                                                <path d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M5 16h3v3h2v-5H5v2zm3-8H5v2h5V5H8v3zm6 11h2v-3h3v-2h-5v5zm2-11V5h-2v5h5V8h-3z"/>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="#000" viewBox="0 0 24 24" width="24" class="ays-survey-popup-open-full-screen">
                                                                <path d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>
                                                            </svg>
                                                        </a>
                                                    </div>';
                        }
                        $popup_survey_view .= "<div class='ays-survey-popup-main'>".do_shortcode($shortcode2)."</div>
                    </div>";

                    $margin_right = '';
                    $additional_css = '';
                    switch ( $popup_position ){
                        case "center-center":
                            $ays_survey_popup_conteiner_pos_top = '12px';
                            $ays_survey_popup_conteiner_pos_left = '0';
                            $ays_survey_popup_conteiner_pos_right = '0';
                            $ays_survey_popup_conteiner_pos_bottom = '0';
                            $popup_margin = 'auto';
                            $additional_css = 'max-height: calc( 100vh - 12px )';
                            break;
                        case "left-top":

                            $ays_survey_popup_conteiner_pos_top = '0';
                            $ays_survey_popup_conteiner_pos_left = '0';
                            $ays_survey_popup_conteiner_pos_right = 'unset';
                            $ays_survey_popup_conteiner_pos_bottom = 'unset';
                            $popup_margin .= 'px';

                            if( absint( $popup_margin ) < 12 ){
                                $margin_right = 'margin-top: 12px;';
                            }
                            break;
                        case "top-center":

                            $ays_survey_popup_conteiner_pos_top = '0';
                            $ays_survey_popup_conteiner_pos_left = '50%';
                            $ays_survey_popup_conteiner_pos_right = 'unset';
                            $ays_survey_popup_conteiner_pos_bottom = 'unset';
                            $popup_margin .= 'px auto';
                            $additional_css = 'transform: translateX(-50%);';

                            if( absint( $popup_margin ) < 12 ){
                                $margin_right = 'margin-top: 12px;';
                            }
                            break;    
                        case "right-top":

                            $ays_survey_popup_conteiner_pos_top = '0';
                            $ays_survey_popup_conteiner_pos_left = 'unset';
                            $ays_survey_popup_conteiner_pos_right = '0';
                            $ays_survey_popup_conteiner_pos_bottom = 'unset';
                            $popup_margin .= 'px';
                            if( absint( $popup_margin ) < 12 ){
                                $margin_right = 'margin-right: 12px;margin-top: 12px;';
                            }

                            break;
                        case "left-center":

                            $ays_survey_popup_conteiner_pos_top = '0';
                            $ays_survey_popup_conteiner_pos_left = '0';
                            $ays_survey_popup_conteiner_pos_right = 'unset';
                            $ays_survey_popup_conteiner_pos_bottom = '0';
                            $popup_margin = 'auto ' . $popup_margin . 'px';
                            
                            break; 
                        case "right-center":
                            
                            $ays_survey_popup_conteiner_pos_top = '0';
                            $ays_survey_popup_conteiner_pos_left = 'unset';
                            $ays_survey_popup_conteiner_pos_right = '0';
                            $ays_survey_popup_conteiner_pos_bottom = '0';
                            $popup_margin = 'auto ' . $popup_margin . 'px';

                            if( absint( $popup_margin ) < 12 ){
                                $margin_right = 'margin-right: 12px;';
                            }
                            break;       
                        case "right-bottom":

                            $ays_survey_popup_conteiner_pos_top = 'unset';
                            $ays_survey_popup_conteiner_pos_left = 'unset';
                            $ays_survey_popup_conteiner_pos_right = '0';
                            $ays_survey_popup_conteiner_pos_bottom = '0';
                            $popup_margin .= 'px';

                            if( absint( $popup_margin ) < 12 ){
                                $margin_right = 'margin-right: 12px;';
                            }
                            break;
                        case "center-bottom":

                            $ays_survey_popup_conteiner_pos_top = 'unset';
                            $ays_survey_popup_conteiner_pos_left = '50%';
                            $ays_survey_popup_conteiner_pos_right = 'unset';
                            $ays_survey_popup_conteiner_pos_bottom = '0';
                            $popup_margin .= 'px auto';
                            $additional_css = 'transform: translateX(-50%);';
                            
                            break;    
                        case "left-bottom":

                            $ays_survey_popup_conteiner_pos_top = 'unset';
                            $ays_survey_popup_conteiner_pos_left = '0';
                            $ays_survey_popup_conteiner_pos_right = 'unset';
                            $ays_survey_popup_conteiner_pos_bottom = '0';
                            $popup_margin .= 'px';
                            
                            break;
                    }

                    $hide_popup_on_mobile_class = $survey_popup_hide_title_on_mobile ? 'display: none;' : ''; 

                    $popup_survey_view .= '
                        <style>
                            .ays-survey-popup-modal-' . $popup['id'] . ' {
                                width: ' . $popup_survey_width . 'px;
                                height: ' . $popup_survey_height . 'px;
                                background-color: ' . $popup_bg_color . ';
                                top: ' . $ays_survey_popup_conteiner_pos_top . ';
                                left: ' . $ays_survey_popup_conteiner_pos_left . ';
                                right: ' . $ays_survey_popup_conteiner_pos_right . ';
                                bottom: ' . $ays_survey_popup_conteiner_pos_bottom . ';
                                margin: ' . $popup_margin . ';
                                ' . $margin_right . '
                                ' . $additional_css . '
                            }

                            .ays-survey-popup-modal-' . $popup['id'] . ' .ays-survey-popup-title-content{
                                background-color: '.$survey_popup_title_bg_color.';
                                color: '.$survey_popup_title_text_color.';
                                font-size: '.$survey_popup_title_font_size.'px;
                                text-align: '.$survey_popup_title_alignment.';
                                text-transform: '.$survey_popup_title_transform.';
                                letter-spacing: '.$survey_popup_title_letter_spacing.'px;
                                line-height: 2;
                                border-radius: '.$survey_popup_title_border_radius.'px;
                                padding: 0 10px;
                            }

                            @media screen and (max-width: 640px){
                                div.ays-survey-popup-modal-' . $popup['id'] . ' {
                                    width: ' . $popup_survey_width_mobile . 'px;
                                    height: ' . $popup_survey_height_mobile . 'px;
                                    background-color: ' . $popup_bg_color_mobile . ';
                                }
                                .ays-survey-popup-modal-' . $popup['id'] . ' .ays-survey-popup-title-content{
                                    font-size: '.$survey_popup_title_mobile_font_size.'px;
                                    color: '.$survey_popup_title_text_color_mobile.';
                                    background-color: '.$survey_popup_title_bg_color_mobile.';
                                    '.$hide_popup_on_mobile_class.';
                                    letter-spacing: '.$survey_popup_title_letter_spacing_on_mobile.'px;
                                    text-align: '.$survey_popup_title_alignment_on_mobile.';
                                    text-transform: '.$survey_popup_title_transform_mobile.';
                                    border-radius: '.$survey_popup_title_border_radius_mobile.'px;
                                }
                            }
                            
                        </style>
                    ';

                    $popup_survey_view .= '<script type="text/javascript">';
                
                    $popup_survey_view .= "
                        if(typeof aysSurveyPopupsOptions === 'undefined'){
                            var aysSurveyPopupsOptions = [];
                        }
                        aysSurveyPopupsOptions['" . $popup['id'] . "']  = '" . base64_encode( json_encode( array(
                            'hidePopup'      => $hide_popup,
                            'hidePopupAfterClose' => $hide_popup_after_close,
                            'popup_trigger'  => $popup_trigger_type,
                            'enable_popup_close_after_finish'  => $survey_enable_popup_close_after_finish,
                            'popup_close_after_finish_delay'  => $survey_popup_close_after_finish_delay,
                            'popup_selector' => $popup_selector,
                            'popupEnableCloseByEsc' => $survey_popup_enable_close_by_esc,

                        ) ) ) . "';";
                    $popup_survey_view .= '</script>';
                    $popup_survey_view .= '</div>';

                    return $popup_survey_view;
                }
            }
        }
    }

    
    public function ays_shortcodes_show_all(){
        global $wpdb;
        $post_id = get_the_ID();
        $popup_surveys_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys";
        $surveys_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "surveys";
        $sql = "SELECT p_s.*, s.options as s_options, s.status as survey_status 
                FROM {$popup_surveys_table} as p_s 
                LEFT JOIN {$surveys_table} AS s 
                    ON p_s.survey_id = s.id 
                WHERE p_s.status = 'published'";
        $result = $wpdb->get_results( $sql, "ARRAY_A" );

        foreach($result as $key => $value){
            echo do_shortcode('[ays_survey_popup id="'. $value['id'] .'"]');
        }
    }

    public function checkNextButtonVisibility($other_answers_count, $question_type){
        return ($other_answers_count === 0 && $question_type === 0 && $this->options[ $this->name_prefix . 'disable_next_button' ]);
    }
}
