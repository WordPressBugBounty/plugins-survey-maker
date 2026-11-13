<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Widget_Survey_Maker_Elementor extends Widget_Base {
    public function get_name() {
        return 'survey-maker';
    }

    public function get_title() {
        return __( 'Survey Maker', 'survey-maker' );
    }
    
    public function get_icon() {
        return 'survey-elementor-widget-logo';
    }

	public function get_categories() {
		return array( 'wordpress' );
	}
    protected function _register_controls() {
        $this->start_controls_section(
            'section_survey_maker',
            array(
                'label' => esc_html__( 'Survey Maker', 'survey-maker' ),
            )
        );
        $this->add_control(
            'important_note',
            array(
                'label' => '',
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => '<i class="survey-elementor-widget-logo"></i> '.esc_html__( 'Survey Maker', 'survey-maker' ),
                'content_classes' => 'survey-elementor-widget-logo-wrap',
            )
        );
        $this->add_control(
            'survey_title',
            array(
                'label' => __( 'Survey Title', 'survey-maker' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'title' => __( 'Enter the survey title', 'survey-maker' ),
                'placeholder' => __( 'Enter the survey title', 'survey-maker' ),
            )
        );
        $this->add_control(
            'survey_title_alignment',
            array(
                'label' => __( 'Title Alignment', 'survey-maker' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => array(
                    'left'      => 'Left',
                    'right'     => 'Right',
                    'center'    => 'Center'
                )
            )
        );
        $this->add_control(
            'survey_selector',
            array(
                'label' => __( 'Select survey', 'survey-maker' ),
                'type' => Controls_Manager::SELECT,
                'default' => $this->get_default_survey(),
                'options' => $this->get_active_surveys()
            )
        );

        $this->end_controls_section();
    }

    protected function render( $instance = array() ) {

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only check of the current page-builder request, no data is modified.
        if ( ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'elementor' ) || ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'elementor_ajax' ) ) {
            echo '<style>
                    .ays-survey-container .ays-survey-section:first-of-type {
                        display: block!important;
                    }

                    .ays-survey-container .ays-survey-section-footer,
                    .ays-survey-container .ays-survey-answer,
                    .ays-survey-container textarea.ays-survey-question-input-textarea,
                    .ays-survey-container select,
                    .ays-survey-container input {
                        pointer-events: none!important;
                        overflow: hidden!important;
                    }
                </style>';
        }

        $settings = $this->get_settings_for_display();
        $survey_title_alignment = isset( $settings['survey_title_alignment'] ) && in_array( $settings['survey_title_alignment'], array( 'left', 'right', 'center' ), true ) ? $settings['survey_title_alignment'] : 'left';
        $survey_selector = $settings['survey_selector'];
        if ( isset( $settings['survey_title'] ) && ! empty( $settings['survey_title'] ) ) {
            echo '<h2 style="text-align: ' . esc_attr( $survey_title_alignment ) . '">' . esc_html( $settings['survey_title'] ) . '</h2>';
        }
        echo do_shortcode("[ays_survey id=".esc_attr($survey_selector)."]");

    }

    public function get_active_surveys(){
        global $wpdb;
        $current_user = get_current_user_id();
        $surveys_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . 'surveys' );
        if( ! current_user_can( 'manage_options' ) ){
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is built from $wpdb->prefix and escaped with esc_sql().
            $results = $wpdb->get_results( $wpdb->prepare( "SELECT id,title FROM {$surveys_table} WHERE status='published' AND author_id = %d ORDER BY id DESC", absint( $current_user ) ), ARRAY_A );
        } else {
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is built from $wpdb->prefix and escaped with esc_sql().
            $results = $wpdb->get_results( "SELECT id,title FROM {$surveys_table} WHERE status='published' ORDER BY id DESC", ARRAY_A );
        }
        $options = array();
        foreach ( $results as $result ){
            $options[$result['id']] = $result['title'];
        }
        return $options;
    }

    public function get_default_survey(){
        global $wpdb;
        $current_user = get_current_user_id();
        $surveys_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . 'surveys' );
        if( ! current_user_can( 'manage_options' ) ){
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is built from $wpdb->prefix and escaped with esc_sql().
            $id = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM {$surveys_table} WHERE status='published' AND author_id = %d LIMIT 1", absint( $current_user ) ) );
        } else {
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is built from $wpdb->prefix and escaped with esc_sql().
            $id = $wpdb->get_var( "SELECT id FROM {$surveys_table} WHERE status='published' LIMIT 1" );
        }

        return intval($id);
    }

    protected function content_template() {}

    public function render_plain_content( $instance = array() ) {}
}
