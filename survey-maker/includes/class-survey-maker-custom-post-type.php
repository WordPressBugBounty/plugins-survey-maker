<?php
    class Survey_Maker_Custom_Post_Type {

        private $plugin_name;
        private $version;
        private $survey_flush_version;
        public $name_prefix;

        public function __construct($plugin_name, $version){
            $this->plugin_name = $plugin_name;
            $this->name_prefix = 'ays-';
            $this->version = $version;
            $this->survey_flush_version = '1.0.0';
            add_action( 'init', array( $this, 'survey_register_custom_post_type' ) );
            add_filter( 'the_content', array( $this, 'ays_survey_add_preview_notice_to_content' ), 9 );
        }

        public function survey_register_custom_post_type(){
            $args = array(
                'public'  => true,
                'rewrite' => true,
                'show_in_menu' => false,
                'exclude_from_search' => false, 
                'show_ui' => false,
                'show_in_nav_menus' => false,
                'show_in_rest' => false
            );

            register_post_type( $this->name_prefix . $this->plugin_name, $args );
            $this->custom_survey_rewrite_rule();
            $this->survey_flush_permalinks();
        }

        public static function survey_add_custom_post($args, $update = true){
            
            $survey_id    = isset($args['survey_id']) && $args['survey_id'] != '' && $args['survey_id'] != 0 ? esc_attr($args['survey_id']) : '';
            $survey_title = isset($args['survey_title']) && $args['survey_title'] != '' ? esc_attr($args['survey_title']) : '';
            $author_id    = isset($args['author_id']) && $args['author_id'] != '' ? esc_attr($args['author_id']) : get_current_user_id();

            $post_content = '[ays_survey id="'.$survey_id.'"]';

            $new_post = array(
                'post_title'   => $survey_title,
                'post_author'  => $author_id,
                'post_type'    => 'ays-survey-maker', // Custom post type name is -> ays-survey-maker
                'post_content' => $post_content,
                'post_status'  => 'draft',
                'post_date'    => current_time( 'mysql' ),
            );
            $post_id = wp_insert_post($new_post);
            if($update){
                if(isset($post_id) && $post_id > 0){
                    self::update_surveys_table_custom_post_id($post_id, $survey_id);
                }
            }
            return $post_id;
        }

        public static function update_surveys_table_custom_post_id($custom_post_id, $survey_id){
            global $wpdb;
            $table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "surveys" );
            $result = $wpdb->update(// phpcs:ignore WordPress.DB.DirectDatabaseQuery
                $table,
                array('custom_post_id' => $custom_post_id),
                array( 'id' => $survey_id ),
                array('%d'),
                array('%d')
            );
        }

        public function survey_flush_permalinks(){
            if ( get_site_option( 'survey_flush_version' ) != $this->survey_flush_version ) {
                flush_rewrite_rules();
            }
            update_option( 'survey_flush_version', $this->survey_flush_version );            
        }
        
        public function custom_survey_rewrite_rule() {
            add_rewrite_rule(
                'ays-survey-maker/([^/]+)/?',
                'index.php?post_type=ays-survey-maker&name=$matches[1]',
                'top'
            );
        }

        public function ays_survey_add_preview_notice_to_content( $content ) {
            global $post;

            if ( ! is_singular( $this->name_prefix . $this->plugin_name ) || ! is_main_query() || ! in_the_loop() ) {
                return $content;
            }

            $is_preview = get_query_var( 'preview' );

            if ( $is_preview !== 'true' && $is_preview !== true ) {
                return $content;
            }

            $post_type = isset( $post->post_type ) && $post->post_type != "" ? sanitize_text_field($post->post_type) : '';
            
            if( $post_type !== 'ays-survey-maker' ){
                return $content;
            }

            return $this->ays_survey_get_preview_notice_html() . $content;
        }

        private function ays_survey_get_preview_notice_html() {
            global $post;

            $post_id   = isset( $post->ID ) ? absint( $post->ID ) : 0;
            $shortcode = isset( $post->post_content ) ? $this->ays_survey_get_shortcode_from_content( $post->post_content ) : '';

            if ( $shortcode === '' && $post_id > 0 ) {
                $shortcode = $this->ays_survey_get_shortcode_by_custom_post_id( $post_id );
            }

            $content   = array();

            $content[] = '<div id="ays-survey-preview-notice-main-container" class="ays-survey-preview-notice-wrap">';
                $content[] = '<div role="status" aria-live="polite" class="ays-survey-preview-notice">';
                    $content[] = '<span class="ays-survey-preview-notice-icon" aria-hidden="true">';
                        $content[] = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">';
                            $content[] = '<path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>';
                            $content[] = '<circle cx="12" cy="12" r="3"></circle>';
                        $content[] = '</svg>';
                    $content[] = '</span>';
                    $content[] = '<div class="ays-survey-preview-notice-text">';
                        $content[] = '<strong>' . esc_html__( 'This is a preview page.', 'survey-maker' ) . '</strong> ';
                        $content[] = esc_html__( 'Other users cannot access this link. To publish this survey, copy its shortcode and add it to a post or page.', 'survey-maker' );
                    $content[] = '</div>';

                    if ( $shortcode !== '' ) {
                        $content[] = '<button type="button" class="ays-survey-preview-copy-shortcode" data-shortcode="' . esc_attr( $shortcode ) . '" data-label="' . esc_attr__( 'Copy Shortcode', 'survey-maker' ) . '" data-copied-label="' . esc_attr__( 'Copied', 'survey-maker' ) . '">';
                            $content[] = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">';
                                $content[] = '<rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>';
                                $content[] = '<path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>';
                            $content[] = '</svg>';
                            $content[] = '<span class="ays-survey-preview-copy-shortcode-label">' . esc_html__( 'Copy Shortcode', 'survey-maker' ) . '</span>';
                        $content[] = '</button>';
                    }
                $content[] = '</div>';
            $content[] = '</div>';

            return implode( '', $content );
        }

        private function ays_survey_get_shortcode_from_content( $content ) {
            if ( preg_match( '/\[ays_survey[^\]]*id\s*=\s*([\'"]?)(\d+)\1[^\]]*\]/', $content, $matches ) ) {
                return "ays_survey id='" . absint( $matches[2] ) . "'";
            }

            return '';
        }

        private function ays_survey_get_shortcode_by_custom_post_id( $custom_post_id ) {
            global $wpdb;

            $table     = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . 'surveys' );
            $survey_id = $wpdb->get_var(// phpcs:ignore WordPress.DB.DirectDatabaseQuery
                $wpdb->prepare(
                    "SELECT id FROM {$table} WHERE custom_post_id = %d",
                    $custom_post_id
                )
            );

            if ( $survey_id > 0 ) {
                return "ays_survey id='" . absint( $survey_id ) . "'";
            }

            return '';
        }
    }
