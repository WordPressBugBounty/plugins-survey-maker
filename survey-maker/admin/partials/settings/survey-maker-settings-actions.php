<?php
class Survey_Maker_Settings_Actions {
    private $plugin_name;

    public function __construct($plugin_name) {
        $this->plugin_name = $plugin_name;
    }

    public function store_data(){
        global $wpdb;
        $settings_table = $wpdb->prefix . "ayssurvey_settings";
        $name_prefix = 'ays_';
        if( isset($_REQUEST["settings_action"]) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST["settings_action"] ) ), 'settings_action' ) ){
            $success = 0;

            $roles = (isset($_REQUEST['ays_user_roles']) && !empty($_REQUEST['ays_user_roles'])) ? array_map( 'sanitize_text_field', wp_unslash( $_REQUEST['ays_user_roles'] ) ) : array('administrator');
            
            $fields = array();

            // Survey Question default type
            $survey_default_type = (isset($_REQUEST[$name_prefix .'survey_default_type']) && $_REQUEST[$name_prefix .'survey_default_type'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix .'survey_default_type'] ) ) : '';
            $survey_answer_default_count = (isset($_REQUEST[$name_prefix . 'survey_answer_default_count']) && $_REQUEST[$name_prefix . 'survey_answer_default_count'] != '') ? absint( sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_answer_default_count'] ) ) ) : 3;

            // Textarea height (public)
            $survey_textarea_height = (isset($_REQUEST[$name_prefix . 'survey_textarea_height']) && $_REQUEST[$name_prefix . 'survey_textarea_height'] != '' && $_REQUEST[$name_prefix . 'survey_textarea_height'] != 0 ) ? absint( sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_textarea_height'] ) ) ) : 100;
                        
            // WP Editor height
            $survey_wp_editor_height = (isset($_REQUEST[$name_prefix . 'survey_wp_editor_height']) && $_REQUEST[$name_prefix . 'survey_wp_editor_height'] != '' && $_REQUEST[$name_prefix . 'survey_wp_editor_height'] != 0) ? absint( sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_wp_editor_height'] ) ) ) : 100 ;
                        
            // Make question required
            $survey_make_questions_required = (isset($_REQUEST[$name_prefix . 'survey_make_questions_required']) && $_REQUEST[$name_prefix . 'survey_make_questions_required'] == 'on') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_make_questions_required'] ) )  : 'off';
                        
            // Lazy loading for images
            $survey_lazy_loading_for_images = (isset($_REQUEST[$name_prefix . 'survey_lazy_loading_for_images']) && $_REQUEST[$name_prefix . 'survey_lazy_loading_for_images'] == 'on') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_lazy_loading_for_images'] ) )  : 'off';

            // Do not store IP addresses
            $survey_disable_user_ip = (isset($_REQUEST[$name_prefix . 'survey_disable_user_ip']) && $_REQUEST[$name_prefix . 'survey_disable_user_ip'] == 'on') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_disable_user_ip'] ) ) : '';

            // Do not store User Names
            $survey_disable_user_name = (isset($_REQUEST[$name_prefix . 'survey_disable_user_name']) && $_REQUEST[$name_prefix . 'survey_disable_user_name'] == 'on') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_disable_user_name'] ) ) : 'off';

            // Do not store User Emails
            $survey_disable_user_email = (isset($_REQUEST[$name_prefix . 'survey_disable_user_email']) && $_REQUEST[$name_prefix . 'survey_disable_user_email'] == 'on') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_disable_user_email'] ) ) : 'off';

            $survey_submissions_title_length = (isset($_REQUEST[$name_prefix . 'survey_submissions_title_length']) && $_REQUEST[$name_prefix . 'survey_submissions_title_length'] != '') ? absint( sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_submissions_title_length'] ) ) ) : 5;
            $survey_title_length = (isset($_REQUEST[$name_prefix . 'survey_title_length']) && $_REQUEST[$name_prefix . 'survey_title_length'] != '') ? absint( sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_title_length'] ) ) ) : 5;

            $survey_categories_title_length = (isset($_REQUEST[$name_prefix . 'survey_categories_title_length']) && $_REQUEST[$name_prefix . 'survey_categories_title_length'] != '') ? absint( sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_categories_title_length'] ) ) ) : 5;
            $survey_popups_title_length = (isset($_REQUEST[$name_prefix . 'survey_popups_title_length']) && $_REQUEST[$name_prefix . 'survey_popups_title_length'] != '') ? absint( sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_popups_title_length'] ) ) ) : 5;

            //Animation top
            $survey_animation_top = (isset($_REQUEST[$name_prefix . 'survey_animation_top']) && $_REQUEST[$name_prefix . 'survey_animation_top'] != '') ? absint( sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_animation_top'] ) ) ) : 200;
            $survey_enable_animation_top = (isset( $_REQUEST['ays_survey_enable_animation_top'] ) && sanitize_text_field( wp_unslash( $_REQUEST['ays_survey_enable_animation_top'] ) ) ) == 'on' ? 'on' : 'off';

            // Disable Survey Maker menu item notification
            $survey_disable_survey_menu_notification = ( isset( $_REQUEST[ $name_prefix . 'survey_disable_survey_menu_notification'] ) && sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_disable_survey_menu_notification'] ) ) ) == 'on' ? 'on' : 'off';

            // Disable Submissions menu item notification
            $survey_disable_submission_menu_notification = ( isset( $_REQUEST[ $name_prefix . 'survey_disable_submission_menu_notification'] ) && sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_disable_submission_menu_notification'] ) ) ) == 'on' ? 'on' : 'off';

            $survey_menu_badge_styles = array( 'classic', 'wp_default' );
            $survey_menu_badge_style = ( isset( $_REQUEST[$name_prefix . 'survey_menu_badge_style'] ) && in_array( sanitize_key( $_REQUEST[$name_prefix . 'survey_menu_badge_style'] ), $survey_menu_badge_styles, true ) ) ? sanitize_key( $_REQUEST[$name_prefix . 'survey_menu_badge_style'] ) : 'classic';

            // Default texts | Start
            $wrong_shortcode_text               = (isset($_REQUEST[$name_prefix . 'survey_wrong_shortcode_text']) && $_REQUEST[$name_prefix . 'survey_wrong_shortcode_text'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_wrong_shortcode_text'] ) ) : 'Wrong shortcode initialized';
            $email_validation_error_text        = (isset($_REQUEST[$name_prefix . 'survey_email_validation_error_text']) && $_REQUEST[$name_prefix . 'survey_email_validation_error_text'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_email_validation_error_text'] ) ) : 'Must be a valid email address';
            $redirecting_after_text             = (isset($_REQUEST[$name_prefix . 'survey_redirecting_after_text']) && $_REQUEST[$name_prefix . 'survey_redirecting_after_text'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix . 'survey_redirecting_after_text'] ) ) : 'Redirecting after';
            // Default texts | End

            $default_texts = array(
                'wrong_shortcode_text'                  => $wrong_shortcode_text,
                'email_validation_error_text'           => $email_validation_error_text,
                'redirecting_after_text'                => $redirecting_after_text,
            );
            // Default texts | End

            $next_button            = (isset($_REQUEST[$name_prefix .'survey_next_button']) && $_REQUEST[$name_prefix .'survey_next_button'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix .'survey_next_button'] ) ) : 'Next';
            $prev_button            = (isset($_REQUEST[$name_prefix .'survey_previous_button']) && $_REQUEST[$name_prefix .'survey_previous_button'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix .'survey_previous_button'] ) ) : 'Prev';
            $restart_button         = (isset($_REQUEST[$name_prefix .'survey_restart_button']) && $_REQUEST[$name_prefix .'survey_restart_button'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix .'survey_restart_button'] ) ) : 'Restart';
            $clear_button           = (isset($_REQUEST[$name_prefix .'survey_clear_button']) && $_REQUEST[$name_prefix .'survey_clear_button'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix .'survey_clear_button'] ) ) : 'Clear selection';
            $finish_button          = (isset($_REQUEST[$name_prefix .'survey_finish_button']) && $_REQUEST[$name_prefix .'survey_finish_button'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix .'survey_finish_button'] ) ) : 'Finish';
            $exit_button            = (isset($_REQUEST[$name_prefix .'survey_exit_button']) && $_REQUEST[$name_prefix .'survey_exit_button'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix .'survey_exit_button'] ) ) : 'Exit';
            $login_button           = (isset($_REQUEST[$name_prefix .'survey_login_button']) && $_REQUEST[$name_prefix .'survey_login_button'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix .'survey_login_button'] ) ) : 'Log in';
            $start_button           = (isset($_REQUEST[$name_prefix .'survey_start_button']) && $_REQUEST[$name_prefix .'survey_start_button'] != '') ? sanitize_text_field( wp_unslash( $_REQUEST[$name_prefix .'survey_start_button'] ) ) : 'Start';

            $buttons_texts = array(
                'next_button'           => $next_button,
                'prev_button'           => $prev_button,
                'restart_button'        => $restart_button,
                'clear_button'          => $clear_button,
                'finish_button'         => $finish_button,
                'exit_button'           => $exit_button,
                'login_button'          => $login_button,
                'start_button'          => $start_button,
            );

            $options = array(
                "survey_default_type"                           => $survey_default_type,
                "survey_answer_default_count"                   => $survey_answer_default_count,
                "survey_textarea_height"                        => $survey_textarea_height,
                "survey_wp_editor_height"                       => $survey_wp_editor_height,
                "survey_make_questions_required"                => $survey_make_questions_required,
                "survey_lazy_loading_for_images"                => $survey_lazy_loading_for_images,

                "survey_disable_user_ip"                        => $survey_disable_user_ip,
                "survey_disable_user_name"                      => $survey_disable_user_name,
                "survey_disable_user_email"                     => $survey_disable_user_email,

                "survey_submissions_title_length"               => $survey_submissions_title_length,
                "survey_title_length"                           => $survey_title_length,
                "survey_categories_title_length"                => $survey_categories_title_length,
                "survey_popups_title_length"                    => $survey_popups_title_length,

                "survey_animation_top"                          => $survey_animation_top,
                "survey_enable_animation_top"                   => $survey_enable_animation_top,
                "survey_disable_survey_menu_notification"       => $survey_disable_survey_menu_notification,
                "survey_disable_submission_menu_notification"   => $survey_disable_submission_menu_notification,
                "survey_menu_badge_style"                       => $survey_menu_badge_style,
            );

            $fields['user_roles'] = $roles;
            $fields['options'] = $options;
            $fields['default_texts'] = $default_texts;
            $fields['buttons_texts'] = $buttons_texts;

            // $fields = apply_filters( 'ays_sm_settings_page_integrations_saves', $fields, $data );

            foreach ($fields as $key => $value) {
                $result = $this->ays_update_setting( $key, json_encode( $value ) );
                if( $result ){
                    $success++;
                }
            }

            $message = "saved";
            if($success > 0){
                $tab = "";
                if( isset( $_REQUEST['ays_survey_tab'] ) ){
                    $tab = "&ays_survey_tab=".sanitize_text_field( wp_unslash( $_REQUEST['ays_survey_tab'] ) );
                }
                $url = admin_url('admin.php') . "?page=survey-maker-settings" . $tab . '&status=' . $message;
                wp_safe_redirect( $url );
            }
        }
        
    }

    public function get_db_data(){
        global $wpdb;
        $settings_table = esc_sql( $wpdb->prefix . "ayssurvey_settings" );
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is built from $wpdb->prefix and escaped with esc_sql(), no user input.
        $results = $wpdb->get_results( "SELECT * FROM {$settings_table}", ARRAY_A );
        if(count($results) > 0){
            return $results;
        }else{
            return array();
        }
    }    
    
    public function check_settings_meta($metas){
        global $wpdb;
        $settings_table = esc_sql( $wpdb->prefix . "ayssurvey_settings" );
        foreach($metas as $meta_key){
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is built from $wpdb->prefix and escaped with esc_sql().
            $result = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$settings_table} WHERE meta_key = %s", $meta_key ) );
            if(intval($result) == 0){
                $this->ays_add_setting($meta_key, "", "", "");
            }
        }
        return false;
    }
    
    public function check_setting_user_roles(){
        global $wpdb;
        $settings_table = esc_sql( $wpdb->prefix . "ayssurvey_settings" );
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is built from $wpdb->prefix and escaped with esc_sql().
        $result = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$settings_table} WHERE meta_key = %s", 'user_roles' ) );
        if(intval($result) == 0){
            $roles = json_encode(array('administrator'));
            $this->ays_add_setting("user_roles", $roles, "", "");
        }
        return false;
    }
    
    public function ays_get_setting($meta_key){
        global $wpdb;
        $settings_table = esc_sql( $wpdb->prefix . "ayssurvey_settings" );
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is built from $wpdb->prefix and escaped with esc_sql().
        $result = $wpdb->get_var( $wpdb->prepare( "SELECT meta_value FROM {$settings_table} WHERE meta_key = %s", $meta_key ) );
        if($result != ""){
            return $result;
        }
        return false;
    }
    
    public function ays_add_setting($meta_key, $meta_value, $note = "", $options = ""){
        global $wpdb;
        $settings_table = $wpdb->prefix . "ayssurvey_settings";
        // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.SlowDBQuery.slow_db_query_meta_key, WordPress.DB.SlowDBQuery.slow_db_query_meta_value -- Custom plugin settings table (not the WordPress meta tables).
        $result = $wpdb->insert(
            $settings_table,
            array(
                'meta_key'    => $meta_key,
                'meta_value'  => $meta_value,
                'note'        => $note,
                'options'     => $options
            ),
            array( '%s', '%s', '%s', '%s' )
        );
        // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.SlowDBQuery.slow_db_query_meta_key, WordPress.DB.SlowDBQuery.slow_db_query_meta_value
        if($result >= 0){
            return true;
        }
        return false;
    }
    
    public function ays_update_setting($meta_key, $meta_value, $note = null, $options = null){
        global $wpdb;
        $settings_table = $wpdb->prefix . "ayssurvey_settings";
        // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.SlowDBQuery.slow_db_query_meta_key, WordPress.DB.SlowDBQuery.slow_db_query_meta_value -- Custom plugin settings table (not the WordPress meta tables).
        $value = array(
            'meta_value'  => $meta_value,
        );
        $value_s = array( '%s' );
        if($note != null){
            $value['note'] = $note;
            $value_s[] = '%s';
        }
        if($options != null){
            $value['options'] = $options;
            $value_s[] = '%s';
        }
        $result = $wpdb->update(
            $settings_table,
            $value,
            array( 'meta_key' => $meta_key, ),
            $value_s,
            array( '%s' )
        );
        // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.SlowDBQuery.slow_db_query_meta_key, WordPress.DB.SlowDBQuery.slow_db_query_meta_value
        if($result >= 0){
            return true;
        }
        return false;
    }
    
    public function ays_delete_setting($meta_key){
        global $wpdb;
        $settings_table = $wpdb->prefix . "ayssurvey_settings";
        // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.SlowDBQuery.slow_db_query_meta_key -- Custom plugin settings table (not the WordPress meta tables).
        $wpdb->delete(
            $settings_table,
            array( 'meta_key' => $meta_key ),
            array( '%s' )
        );
        // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.SlowDBQuery.slow_db_query_meta_key
    }

    public function survey_settings_notices($status){

        if ( empty( $status ) )
            return;

        if ( 'saved' == $status )
            $updated_message =  __( 'Changes saved.', "survey-maker" );
        elseif ( 'updated' == $status )
            $updated_message =  __( 'Quiz attribute .', "survey-maker" );
        elseif ( 'deleted' == $status )
            $updated_message =  __( 'Quiz attribute deleted.', "survey-maker" );
        elseif ( 'duration_updated' == $status )
            $updated_message =  __( 'Duration old data is successfully updated.', "survey-maker" );

        if ( empty( $updated_message ) )
            return;

        ?>
        <div class="ays-survey-admin-notice notice notice-success is-dismissible">
            <p> <?php echo esc_html($updated_message); ?> </p>
        </div>
        <?php
    }

    public function message_variables_section($message_variables, $with_flags = true){
        if( isset($message_variables) && !empty($message_variables) ){
            $content = array();
            foreach($message_variables as $message_variable_box_key => $message_variable_box_value){
                $content[] = '<fieldset>';
                    $content[] = '<legend>
                                    <h5>'.esc_html( ucwords(str_replace('_', ' ', $message_variable_box_key)) ).'</h5>
                                  </legend>';
                foreach($message_variable_box_value as $message_variable => $description){
                    $message_variable_input = $with_flags ? '%%' . $message_variable . '%%' : $message_variable;
                    $content[] = '<p class="vmessage">';
                        $content[] = '<strong>
                                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" readonly value="'.esc_attr($message_variable_input).'"/>
                                    </strong>';
                        $content[] = '<span> - </span>';
                        $content[] = '<span style="font-size:18px;">
                                        '. esc_html( $description ) .'
                                    </span>';
                    $content[] = '</p>';
                }
                $content[] = '</fieldset>';
            }
            return implode('' , $content);
        }
    }
    
}
