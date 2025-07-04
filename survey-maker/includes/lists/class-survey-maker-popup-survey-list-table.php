<?php
ob_start();
class Popup_Survey_List_Table extends WP_List_Table {
    
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The table name in database of the survey categories.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $table_name    The table name in database of the survey categories.
     */
    private $table_name;

    private $title_length;
    
    /** Class constructor */
    public function __construct( $plugin_name ) {
        global $wpdb;

        $this->plugin_name = $plugin_name;

        $this->table_name = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys";

        $this->title_length = Survey_Maker_Data::get_listtables_title_length('popup_surveys');

        parent::__construct( array(
            'singular' => __( 'Popup Survey', "survey-maker" ), //singular name of the listed records
            'plural'   => __( 'Popup Surveys', "survey-maker" ), //plural name of the listed records
            'ajax'     => false //does this table support ajax?
        ) );

        add_action( 'admin_notices', array( $this, 'popup_survey_notices' ) );
    }

    protected function get_views() {
        $published_count = $this->get_statused_record_count( 'published' );
        $draft_count = $this->get_statused_record_count( 'draft' );
        $trashed_count = $this->get_statused_record_count( 'trashed' );
        $all_count = $this->all_record_count();
        $selected_all = "";
        $selected_published = "";
        $selected_draft = "";
        $selected_trashed = "";
        if( isset( $_GET['fstatus'] ) ){
            switch( sanitize_text_field( $_GET['fstatus'] ) ){
                case "published":
                    $selected_published = " style='font-weight:bold;' ";
                    break;
                case "draft":
                    $selected_draft = " style='font-weight:bold;' ";
                    break;
                case "trashed":
                    $selected_trashed = " style='font-weight:bold;' ";
                    break;
                default:
                    $selected_all = " style='font-weight:bold;' ";
                    break;
            }
        }else{
            $selected_all = " style='font-weight:bold;' ";
        }
        $status_links = array(
            "all" => "<a ".$selected_all." href='?page=".esc_attr( $_REQUEST['page'] )."'>" . __( "All", "survey-maker" ) . " (".$all_count.")</a>",
        );
        if( intval( $published_count ) > 0 ){
            $status_links["published"] = "<a ".$selected_published." href='?page=".esc_attr( $_REQUEST['page'] )."&fstatus=published'>" . __( "Published", "survey-maker" ) . " (".$published_count.")</a>";
        }
        if( intval( $draft_count ) > 0 ){
            $status_links["draft"] = "<a ".$selected_draft." href='?page=".esc_attr( $_REQUEST['page'] )."&fstatus=draft'>" . __( "Draft", "survey-maker" ) . " (".$draft_count.")</a>";
        }
        if( intval( $trashed_count ) > 0 ){
            $status_links["trashed"] = "<a ".$selected_trashed." href='?page=".esc_attr( $_REQUEST['page'] )."&fstatus=trashed'>" . __( "Trash", "survey-maker" ) . " (".$trashed_count.")</a>";
        }
        return $status_links;
    }

    
    /**
     * Retrieve customers data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    public static function get_items( $per_page = 20, $page_number = 1 ) {

        global $wpdb;

        $sql = "SELECT * FROM " . $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys";

        $where = array();

        if ( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != ''){
            $where[] = ' status = "' . esc_sql( sanitize_text_field( $_GET['fstatus'] ) ) . '" ';
        }else{
            $where[] = ' status != "trashed" ';
        }

        // if( $search != '' ){
        //     $where[] = $search;
        // }

        // if( ! Survey_Maker_Data::survey_maker_capabilities_for_editing() ){
            $current_user = get_current_user_id();
            $where[] = " author_id = ".$current_user." ";
        // }

        if ( ! empty( $where ) ){
            $sql .= ' WHERE ' . implode( ' AND ', $where );
        }

        if ( ! empty( $_REQUEST['orderby'] ) ) {
            $order_by  = ( isset( $_REQUEST['orderby'] ) && sanitize_text_field( $_REQUEST['orderby'] ) != '' ) ? sanitize_text_field( $_REQUEST['orderby'] ) : 'id';
            $order_by .= ( ! empty( $_REQUEST['order'] ) && strtolower( $_REQUEST['order'] ) == 'asc' ) ? ' ASC' : ' DESC';

            $sql_orderby = sanitize_sql_orderby( $order_by );

            if ( $sql_orderby ) {
                $sql .= ' ORDER BY ' . $sql_orderby;
            } else {
                $sql .= ' ORDER BY ordering DESC';
            }
        }else{
            $sql .= ' ORDER BY id DESC';
        }

        $sql .= " LIMIT $per_page";
        $sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;

        $result = $wpdb->get_results( $sql, 'ARRAY_A' );
        return $result;
    }

    public static function get_item_by_id( $id ) {
        global $wpdb;

        $sql = "SELECT * FROM " . $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys WHERE id=" . esc_sql( intval( $id ) );

        $result = $wpdb->get_row( $sql, 'ARRAY_A' );



        return $result;
    }

    public function get_surveys(){
        global $wpdb;

        $sql = "SELECT * FROM " . $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "surveys WHERE status='published' ORDER BY id DESC";

        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;
    }

    public function add_or_edit_item(){
        global $wpdb;
        $table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys";

        if( isset( $_POST["popup_survey_action"] ) && wp_verify_nonce( $_POST["popup_survey_action"], 'popup_survey_action' ) ){

            $name_prefix = 'ays_';
            
            // Save type
            $save_type = (isset($_POST['save_type'])) ? $_POST['save_type'] : '';

            // Id of item
            $id = isset( $_POST['id'] ) ? absint( intval( $_POST['id'] ) ) : 0;

            // Title
            $title = isset( $_POST[ $name_prefix . 'title' ] ) && $_POST[ $name_prefix . 'title' ] != '' ? stripslashes( sanitize_text_field( $_POST[ $name_prefix . 'title' ] ) ) : 'Survey popup';
            
            // Show popup title
            $survey_popup_enable_show_title = isset( $_POST[ $name_prefix . 'survey_popup_enable_show_title' ] ) && $_POST[ $name_prefix . 'survey_popup_enable_show_title' ] == 'on' ? 'on' : 'off';
            
            // Popup title font size
            $survey_popup_title_font_size = isset( $_POST[ $name_prefix . 'survey_popup_title_font_size' ] ) && $_POST[ $name_prefix . 'survey_popup_title_font_size' ] != '' ? absint( sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_font_size' ] ) ) : 25;
            
            // Popup title font size on mobile
            $survey_popup_title_mobile_font_size = isset( $_POST[ $name_prefix . 'survey_popup_title_mobile_font_size' ] ) && $_POST[ $name_prefix . 'survey_popup_title_mobile_font_size' ] != '' ? absint( sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_mobile_font_size' ] ) ) : 25;

            // Popup title bg color
            $survey_popup_title_bg_color = (isset( $_POST[$name_prefix . 'survey_popup_title_bg_color'] ) &&  $_POST[$name_prefix . 'survey_popup_title_bg_color'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_bg_color' ] ) : '#00000000';
            // Popup title bg color mobile
            $survey_popup_title_bg_color_mobile = (isset( $_POST[$name_prefix . 'survey_popup_title_bg_color_mobile'] ) &&  $_POST[$name_prefix . 'survey_popup_title_bg_color_mobile'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_bg_color_mobile' ] ) : '#00000000';

            // Popup title text color
            $survey_popup_title_text_color = (isset( $_POST[$name_prefix . 'survey_popup_title_text_color'] ) &&  $_POST[$name_prefix . 'survey_popup_title_text_color'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_text_color' ] ) : '#ffffff';
            // Popup title text color mobile
            $survey_popup_title_text_color_mobile = (isset( $_POST[$name_prefix . 'survey_popup_title_text_color_mobile'] ) &&  $_POST[$name_prefix . 'survey_popup_title_text_color_mobile'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_text_color_mobile' ] ) : '#ffffff';

            // Popup title alignment
            $survey_popup_title_alignment = (isset( $_POST[$name_prefix . 'survey_popup_title_alignment'] ) &&  $_POST[$name_prefix . 'survey_popup_title_alignment'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_alignment' ] ) : 'left';

            // Popup title alignment
            $survey_popup_title_alignment_on_mobile = (isset( $_POST[$name_prefix . 'survey_popup_title_alignment_on_mobile'] ) &&  $_POST[$name_prefix . 'survey_popup_title_alignment_on_mobile'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_alignment_on_mobile' ] ) : 'left';

            // Popup title transform
            $survey_popup_title_transform = (isset( $_POST[$name_prefix . 'survey_popup_title_transform'] ) &&  $_POST[$name_prefix . 'survey_popup_title_transform'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_transform' ] ) : 'none';
            // Popup title transform
            $survey_popup_title_transform_mobile = (isset( $_POST[$name_prefix . 'survey_popup_title_transform_mobile'] ) &&  $_POST[$name_prefix . 'survey_popup_title_transform_mobile'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_transform_mobile' ] ) : 'none';
           
            // Popup title letter spacing
            $survey_popup_title_letter_spacing = (isset( $_POST[ $name_prefix . 'survey_popup_title_letter_spacing' ] ) && $_POST[ $name_prefix . 'survey_popup_title_letter_spacing' ] != '' && $_POST[ $name_prefix . 'survey_popup_title_letter_spacing' ] != '0' ) ? absint(intval(sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_letter_spacing' ] ))) : '0';
           
            // Popup title letter spacing on mobile
            $survey_popup_title_letter_spacing_on_mobile = (isset( $_POST[ $name_prefix . 'survey_popup_title_letter_spacing_on_mobile' ] ) && $_POST[ $name_prefix . 'survey_popup_title_letter_spacing_on_mobile' ] != '' && $_POST[ $name_prefix . 'survey_popup_title_letter_spacing_on_mobile' ] != '0' ) ? absint(intval(sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_letter_spacing_on_mobile' ] ))) : '0';

            // Hide popup title on mobile
            $survey_popup_hide_title_on_mobile = (isset( $_POST[$name_prefix . 'survey_popup_hide_title_on_mobile'] ) &&  $_POST[$name_prefix . 'survey_popup_hide_title_on_mobile'] == 'on') ? 'on' : 'off';
                        
            // Title border radius
            $survey_popup_title_border_radius = isset( $_POST[ $name_prefix . 'survey_popup_title_border_radius' ] ) && $_POST[ $name_prefix . 'survey_popup_title_border_radius' ] != '' ? absint( sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_border_radius' ] ) ) : 0;
            // Title border radius mobile
            $survey_popup_title_border_radius_mobile = isset( $_POST[ $name_prefix . 'survey_popup_title_border_radius_mobile' ] ) && $_POST[ $name_prefix . 'survey_popup_title_border_radius_mobile' ] != '' ? absint( sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_title_border_radius_mobile' ] ) ) : 0;

            if($title == ''){
                $url = esc_url_raw( remove_query_arg( false ) );
                wp_redirect( $url );
            }

            // Author ID
            $user_id = get_current_user_id();
            $author_id = isset( $_POST[ $name_prefix . 'author_id' ] ) && $_POST[ $name_prefix . 'author_id' ] != '' ? intval( sanitize_text_field( $_POST[ $name_prefix . 'author_id' ] ) ) : $user_id;

            // Status
            $status = isset( $_POST[ $name_prefix . 'status' ] ) && $_POST[ $name_prefix . 'status' ] == 'on' ? 'published' : 'unpublished';

            // Trash status
            $trash_status = '';
            
            // Date created
            $date_created = isset( $_POST[ $name_prefix . 'date_created' ] ) && Survey_Maker_Admin::validateDate( $_POST[ $name_prefix . 'date_created' ] ) ? sanitize_text_field( $_POST[ $name_prefix . 'date_created' ] ) : current_time( 'mysql' );
            
            // Date modified
            $date_modified = isset( $_POST[ $name_prefix . 'date_modified' ] ) && Survey_Maker_Admin::validateDate( $_POST[ $name_prefix . 'date_modified' ] ) ? sanitize_text_field( $_POST[ $name_prefix . 'date_modified' ] ) : current_time( 'mysql' );

            // Survey_id
            $survey_id = isset( $_POST[ $name_prefix . 'survey_id' ] ) && $_POST[ $name_prefix . 'survey_id' ] != '' ? sanitize_text_field( $_POST[ $name_prefix . 'survey_id' ] ) : '';
            
            // Show All
            $show_all = isset( $_POST[$name_prefix . 'survey_show_all'] ) && $_POST[$name_prefix . 'survey_show_all']  != '' ? sanitize_text_field( $_POST[ $name_prefix . 'survey_show_all' ] ) : 'all';
            
            // Width
            $survey_width = (isset( $_POST[ $name_prefix . 'popup_survey_width' ] ) && $_POST[ $name_prefix . 'popup_survey_width' ] != '') ? absint( sanitize_text_field( $_POST[ $name_prefix . 'popup_survey_width' ] ) ) : 800;
            // Mobile width
            $survey_width_mobile = (isset( $_POST[ $name_prefix . 'popup_survey_width_mobile' ] ) && $_POST[ $name_prefix . 'popup_survey_width_mobile' ] != '') ? absint( sanitize_text_field( $_POST[ $name_prefix . 'popup_survey_width_mobile' ] ) ) : 800;
            
            // Height
            $survey_heigth = (isset( $_POST[ $name_prefix . 'popup_survey_height' ] ) && $_POST[ $name_prefix . 'popup_survey_height' ] != '') ? absint( sanitize_text_field( $_POST[ $name_prefix . 'popup_survey_height' ] ) ) : 450;
            // Height mobile
            $survey_heigth_mobile = (isset( $_POST[ $name_prefix . 'popup_survey_height_mobile' ] ) && $_POST[ $name_prefix . 'popup_survey_height_mobile' ] != '') ? absint( sanitize_text_field( $_POST[ $name_prefix . 'popup_survey_height_mobile' ] ) ) : 450;
            
            // popup_position
            $popup_position = (isset( $_POST[$name_prefix . 'survey_popup_position'] ) && $_POST[$name_prefix . 'survey_popup_position'] != 'center-center') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_position' ] ) : 'center-center';
            
            // popup_margin
            $popup_margin = (isset( $_POST[$name_prefix . 'survey_popup_margin'] ) &&  $_POST[$name_prefix . 'survey_popup_margin'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_margin' ] ) : '';

            // //Popup trigger
            $popup_trigger = (isset( $_POST[$name_prefix . 'survey_popup_trigger'] ) &&  $_POST[$name_prefix . 'survey_popup_trigger'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_trigger' ] ) : 'on_load';

            // Popup close after finish
            $survey_enable_popup_close_after_finish = isset( $_POST[ $name_prefix . 'survey_enable_popup_close_after_finish' ] ) && $_POST[ $name_prefix . 'survey_enable_popup_close_after_finish' ] == 'on' ? 'on' : 'off';
            $survey_popup_close_after_finish_delay = (isset($_POST[ $name_prefix . 'survey_popup_close_after_finish_delay' ]) && $_POST[ $name_prefix . 'survey_popup_close_after_finish_delay' ] != '') ? absint ( sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_close_after_finish_delay' ] ) ) : '';

            //Popup selector
            $popup_selector = (isset( $_POST[$name_prefix . 'survey_popup_selector'] ) &&  $_POST[$name_prefix . 'survey_popup_selector'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_selector' ] ) : '';            
            
            // // Popup background color
            $popup_bg_color = (isset( $_POST[$name_prefix . 'survey_popup_bg_color'] ) &&  $_POST[$name_prefix . 'survey_popup_bg_color'] != '') ? sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_bg_color' ] ) : '#ffffff';

            // Popup background color | Mobile
            $popup_bg_color_mobile = (isset( $_POST[$name_prefix . 'survey_popup_bg_color_mobile'] ) &&  $_POST[$name_prefix . 'survey_popup_bg_color_mobile'] != '') ? stripslashes( sanitize_text_field( $_POST[ $name_prefix . 'survey_popup_bg_color_mobile' ] ) ) : '#ffffff';

            $hide_popup = isset( $_POST[ $name_prefix . 'survey_hide_popup' ] ) && $_POST[ $name_prefix . 'survey_hide_popup' ] == 'on' ? sanitize_text_field( $_POST[ $name_prefix . 'survey_hide_popup' ] ) : 'off';
            
            // Hide Popup after close
            $hide_popup_after_close = isset( $_POST[ $name_prefix . 'survey_hide_popup_after_close' ] ) && $_POST[ $name_prefix . 'survey_hide_popup_after_close' ] == 'on' ? sanitize_text_field( $_POST[ $name_prefix . 'survey_hide_popup_after_close' ] ) : 'off';

            // Popup full screen mode
            $survey_popup_full_screen = isset( $_POST[ $name_prefix . 'survey_enable_popup_full_screen_mode' ] ) && $_POST[ $name_prefix . 'survey_enable_popup_full_screen_mode' ] == 'on' ? 'on' : 'off';

            // Close by pressing the ESC
            $survey_popup_enable_close_by_esc = isset( $_POST[ $name_prefix . 'survey_popup_enable_close_by_esc' ] ) && $_POST[ $name_prefix . 'survey_popup_enable_close_by_esc' ] == 'on' ? 'on' : 'off';
            
            // Options
            $options = array(
                "popup_enable_show_title"               => $survey_popup_enable_show_title,
                "popup_title_font_size"                 => $survey_popup_title_font_size,
                "popup_title_mobile_font_size"          => $survey_popup_title_mobile_font_size,
                "popup_title_bg_color"                  => $survey_popup_title_bg_color,
                "popup_title_bg_color_mobile"           => $survey_popup_title_bg_color_mobile,
                "popup_title_text_color"                => $survey_popup_title_text_color,
                "popup_title_text_color_mobile"         => $survey_popup_title_text_color_mobile,
                "popup_title_alignment"                 => $survey_popup_title_alignment,
                "popup_title_alignment_on_mobile"       => $survey_popup_title_alignment_on_mobile,
                "popup_title_transform"                 => $survey_popup_title_transform,
                "popup_title_transform_mobile"          => $survey_popup_title_transform_mobile,
                "popup_title_letter_spacing"            => $survey_popup_title_letter_spacing,
                "popup_title_letter_spacing_on_mobile"  => $survey_popup_title_letter_spacing_on_mobile,
                "popup_hide_title_on_mobile"            => $survey_popup_hide_title_on_mobile,
                "popup_title_border_radius"             => $survey_popup_title_border_radius,
                "popup_title_border_radius_mobile"      => $survey_popup_title_border_radius_mobile,
                "width"         	                    => $survey_width,
                "width_mobile"                          => $survey_width_mobile,
                "height"        	                    => $survey_heigth,
                "height_mobile"    	                    => $survey_heigth_mobile,
                "popup_position"                        => $popup_position,
                "popup_margin"                          => $popup_margin,
                "popup_trigger"                         => $popup_trigger,
                "enable_popup_close_after_finish"       => $survey_enable_popup_close_after_finish,
                "popup_close_after_finish_delay"        => $survey_popup_close_after_finish_delay,
                "popup_selector"                        => $popup_selector,
                'hide_popup'                            => $hide_popup,
                'hide_popup_after_close'                => $hide_popup_after_close,
                'full_screen_mode'                      => $survey_popup_full_screen,
                'popup_enable_close_by_esc'             => $survey_popup_enable_close_by_esc,
                'popup_bg_color'                        => $popup_bg_color,
                'popup_bg_color_mobile'                 => $popup_bg_color_mobile,
            );
            
            $message = '';
            if( $id == 0 ){
                $result = $wpdb->insert(
                    $table,
                    array(
                        'survey_id'         => $survey_id,
                        'title'             => $title,
                        "show_all"          => $show_all,
                        'status'            => $status,
                        'trash_status'      => $trash_status,
                        'author_id'         => $author_id,
                        'date_created'      => $date_created,
                        'date_modified'     => $date_modified,
                        'options'           => json_encode( $options ),
                    ),
                    array(
                        '%d', // survey_id
                        '%s', // title
                        '%s', // show_all
                        '%s', // status
                        '%s', // trash_status
                        '%d', // author_id
                        '%s', // date_created
                        '%s', // date_modified
                        '%s', // options
                    )
                );

                $inserted_id = $wpdb->insert_id;
                $message = 'created';
            }else{
                $result = $wpdb->update(
                    $table,
                    array(
                        'survey_id'         => $survey_id,
                        'title'             => $title,
                        "show_all"          => $show_all,
                        'status'            => $status,
                        'trash_status'      => $trash_status,
                        'author_id'         => $author_id,
                        'date_created'      => $date_created,
                        'date_modified'     => $date_modified,
                        'options'           => json_encode( $options ),
                    ),
                    array( 'id' => $id ),
                    array(
                        '%d', // survey_id
                        '%s', // title
                        '%s', // show_all
                        '%s', // status
                        '%s', // trash_status
                        '%d', // author_id
                        '%s', // date_created
                        '%s', // date_modified
                        '%s', // options
                    ),
                    array( '%d' )
                );

                $inserted_id = $id;
                $message = 'updated';
            }

            if( $result >= 0  ) {
                if($save_type == 'apply'){
                    if($id == 0){
                        $url = esc_url_raw( add_query_arg( array(
                            "action"    => "edit",
                            "id"        => $inserted_id,
                            "status"    => $message
                        ) ) );
                    }else{
                        $url = esc_url_raw( add_query_arg( array(
                            "status" => $message
                        ) ) );
                    }
                    wp_redirect( $url );
                }elseif($save_type == 'save_new'){
                    $url = remove_query_arg( array('id') );
                    $url = esc_url_raw( add_query_arg( array(
                        "action" => "add",
                        "status" => $message
                    ), $url ) );
                    wp_redirect( $url );
                }else{
                    $url = remove_query_arg( array('action', 'id') );
                    $url = esc_url_raw( add_query_arg( array(
                        "status" => $message
                    ), $url ) );
                    wp_redirect( $url );
                }
            }
        }
    }

    /**
     * Delete a customer record.
     *
     * @param int $id customer ID
     */
    public static function delete_items( $id ) {
        global $wpdb;

        $wpdb->delete(
            $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys",
            array( 'id' => $id ),
            array( '%d' )
        );

    }

    /**
     * Move to trash a customer record.
     *
     * @param int $id customer ID
     */
    public static function trash_items( $id ) {
        global $wpdb;
        $db_item = self::get_item_by_id( $id );

        $wpdb->update(
            $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys",
            array( 
                'status' => 'trashed',
                'trash_status' => $db_item['status'],
            ),
            array( 'id' => $id ),
            array( '%s', '%s' ),
            array( '%d' )
        );

    }

    /**
     * Restore a customer record.
     *
     * @param int $id customer ID
     */
    public static function restore_items( $id ) {
        global $wpdb;
        $db_item = self::get_item_by_id( $id );

        $wpdb->update(
            $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys",
            array( 
                'status' => $db_item['trash_status'],
                'trash_status' => '',
            ),
            array( 'id' => $id ),
            array( '%s', '%s' ),
            array( '%d' )
        );
    }

    /*
    * Returns the count of records in the database.
    *
    * @return null|string
    */
    public static function record_count() {
        global $wpdb;
        $filter = array();
        $sql = "SELECT COUNT(*) FROM " . $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys";
        
        if( isset( $_REQUEST['fstatus'] ) ){
            $fstatus = sanitize_text_field( $_REQUEST['fstatus'] );
            if($fstatus !== null){
                $filter[] = " status = '". esc_sql( $fstatus ) ."' ";
            }
        }else{
            $filter[] = " status != 'trashed' ";
        }
        
        // if( ! Survey_Maker_Data::survey_maker_capabilities_for_editing() ){
            $current_user = get_current_user_id();
            $filter[] = " author_id = ".$current_user." ";
        // }
        
        if(count($filter) !== 0){
            $sql .= " WHERE ".implode(" AND ", $filter);
        }

        return $wpdb->get_var( $sql );
    }

    public static function all_record_count() {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM " . $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys WHERE status != 'trashed'";
        
        // if( ! Survey_Maker_Data::survey_maker_capabilities_for_editing() ){
            $current_user = get_current_user_id();
            $sql .= " AND author_id = ".$current_user." ";
        // }

        return $wpdb->get_var( $sql );
    }

    public static function get_statused_record_count( $status ) {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM " . $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys WHERE status='" . esc_sql( $status ) . "'";

        // if( ! Survey_Maker_Data::survey_maker_capabilities_for_editing() ){
            $current_user = get_current_user_id();
            $sql .= " AND author_id = ".$current_user." ";
        // }

        return $wpdb->get_var( $sql );
    }

    public function publish_unpublish_popup_survey( $id, $action ) {
        global $wpdb;
        $table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "popup_surveys";
       
        if ( is_null($id) ) {
            return false;
        }

        if ($action == 'unpublish') {
            $status = 'unpublished';
            $message = 'unpublished';
        }else{
            $status = 'published';
            $message = 'published';
        }

        $pb_result = $wpdb->update(
            $table,
            array(
                "status" => $status
            ),
            array( "id" => $id ),
            array( "%s" ),
            array( "%d" )
        );

        $url = esc_url_raw( remove_query_arg(array("action", "id", "_wpnonce")) ) . "&status=" . $message . "&type=success";
        wp_redirect( $url );
    }


    /** Text displayed when no customer data is available */
    public function no_items() {
        Survey_Maker_Data::survey_no_items_list_tables('popup surveys');
    }


    /**
     * Render a column when no column specific method exist.
     *
     * @param array $item
     * @param string $column_name
     *
     * @return mixed
     */
    public function column_default( $item, $column_name ) {
        switch ( $column_name ) {
            case 'title':
            case 'survey_id':
            case 'id':
                return $item[ $column_name ];
                break;
            default:
                return print_r( $item, true ); //Show the whole array for troubleshooting purposes
        }
    }

    /**
     * Render the bulk edit checkbox
     *
     * @param array $item
     *
     * @return string
     */
    function column_cb( $item ) {
        
        // if(intval($item['id']) === 1){
        //     return;
        // }
        
        return sprintf(
            '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']
        );
    }


    /**
     * Method for name column
     *
     * @param array $item an array of DB data
     *
     * @return string
     */
    function column_title( $item ) {
        $unpublish_nonce = wp_create_nonce( $this->plugin_name . "-unpublish-popup-survey" );
        $publish_nonce   = wp_create_nonce( $this->plugin_name . "-publish-popup-survey" );

        if($item['status'] == 'trashed'){
            $delete_nonce = wp_create_nonce( $this->plugin_name . '-delete-popup-survey' );
        }else{
            $delete_nonce = wp_create_nonce( $this->plugin_name . '-trash-popup-survey' );
        }

        if (isset($item['status']) && $item['status'] == 'published') {
            $publish_button = 'unpublish';
            $publish_button_val = sprintf( '<a href="?page=%s&action=%s&id=%d&_wpnonce=%s">'. __('Unpublish', "survey-maker") .'</a>', esc_attr( $_REQUEST['page'] ), 'unpublish', absint( $item['id'] ), $unpublish_nonce );
        }else{
            $publish_button = 'publish';
            $publish_button_val = sprintf( '<a href="?page=%s&action=%s&id=%d&_wpnonce=%s">'. __('Publish', "survey-maker") .'</a>', esc_attr( $_REQUEST['page'] ), 'publish', absint( $item['id'] ), $publish_nonce );
        }

        $survey_title = stripcslashes( $item['title'] );

        $q = esc_attr( $survey_title );

        $restitle = Survey_Maker_Admin::ays_restriction_string( "word", $survey_title, $this->title_length );
        
        $fstatus = '';
        if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
            $fstatus = '&fstatus=' . sanitize_text_field( $_GET['fstatus'] );
        }

        $title = sprintf( '<a href="?page=%s&action=%s&id=%d" title="%s">%s</a>', esc_attr( $_REQUEST['page'] ), 'edit', absint( $item['id'] ), $q, stripcslashes($item['title']));

        $actions = array();
        if($item['status'] == 'trashed'){
            $title = sprintf( '<strong><a>%s</a></strong>', $restitle );
            $actions['restore'] = sprintf( '<a href="?page=%s&action=%s&id=%d&_wpnonce=%s'.$fstatus.'">'. __('Restore', "survey-maker") .'</a>', esc_attr( $_REQUEST['page'] ), 'restore', absint( $item['id'] ), $delete_nonce );
            $actions['delete'] = sprintf( '<a class="ays_confirm_del" data-message="%s" href="?page=%s&action=%s&id=%s&_wpnonce=%s'.$fstatus.'">'. __('Delete Permanently', "survey-maker") .'</a>', $restitle, esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['id'] ), $delete_nonce );
        }else{
            $draft_text = '';
            if( $item['status'] == 'draft' && !( isset( $_GET['fstatus'] ) && $_GET['fstatus'] == 'draft' )){
                $draft_text = ' — ' . '<span class="post-state">' . __( "Draft", "survey-maker" ) . '</span>';
            }
            $title = sprintf( '<strong><a href="?page=%s&action=%s&id=%d" title="%s">%s</a>%s</strong>', esc_attr( $_REQUEST['page'] ), 'edit', absint( $item['id'] ), $q, $restitle, $draft_text );
            
            $actions['edit'] = sprintf( '<a href="?page=%s&action=%s&id=%d">'. __('Edit', "survey-maker") .'</a>', esc_attr( $_REQUEST['page'] ), 'edit', absint( $item['id'] ) );

            $actions[$publish_button] = $publish_button_val;
            // $actions['duplicate'] = sprintf( '<a href="?page=%s&action=%s&id=%d&_wpnonce=%s'.$fstatus.'">'. __('Duplicate', "survey-maker") .'</a>', esc_attr( $_REQUEST['page'] ), 'duplicate', absint( $item['id'] ), $delete_nonce );
            $actions['trash'] = sprintf( '<a href="?page=%s&action=%s&id=%s&_wpnonce=%s'.$fstatus.'">'. __('Move to trash', "survey-maker") .'</a>', esc_attr( $_REQUEST['page'] ), 'trash', absint( $item['id'] ), $delete_nonce );
        }

        return $title . $this->row_actions( $actions );
    }

    function column_survey_id( $item ) {
        global $wpdb;
        $sql = "SELECT * FROM {$wpdb->prefix}ayssurvey_surveys WHERE id=" . absint( intval( $item["survey_id"] ) );

        $survey = $wpdb->get_row( $sql );

        if($survey !== null){
            return $survey->title;
        }else{
            return '';
        }
      
    }

    function column_status( $item ) {
        global $wpdb;
        $status = ucfirst( $item['status'] );
        $date = date( 'Y/m/d', strtotime( $item['date_modified'] ) );
        $title_date = date( 'l jS \of F Y h:i:s A', strtotime( $item['date_modified'] ) );
        $html = "<p style='font-size:14px;margin:0;'>" . $status . "</p>";
        $html .= "<p style=';font-size:14px;margin:0;text-decoration: dotted underline;' title='" . $title_date . "'>" . $date . "</p>";
        return $html;
    }

    function column_author_id( $item ) {
        $user = get_user_by( 'id', $item['author_id'] );
        $author_name = '';
        if($user->data->display_name == ''){
            if($user->data->user_nicename == ''){
                $author_name = $user->data->user_login;
            }else{
                $author_name = $user->data->user_nicename;
            }
        }else{
            $author_name = $user->data->display_name;
        }
        return $author_name;
    }



    /**
     *  Associative array of columns
     *
     * @return array
     */
    function get_columns() {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Title', "survey-maker" ),
        );

        // if( Survey_Maker_Data::survey_maker_capabilities_for_editing() ){
            $columns['author_id'] = __( 'Author', "survey-maker" );
        // }

        $columns['survey_id'] = __( 'Survey', "survey-maker" );
        $columns['status'] = __( 'Status', "survey-maker" );
        $columns['id'] = __( 'ID', "survey-maker" );

        if( isset( $_GET['action'] ) && ( $_GET['action'] == 'add' || $_GET['action'] == 'edit' ) ){
            return array();
        }
        
        return $columns;
    }


    /**
     * Columns to make sortable.
     *
     * @return array
     */
    public function get_sortable_columns() {
        $sortable_columns = array(
            'title'         => array( 'title', true ),
            'id'            => array( 'id', true ),
        );

        return $sortable_columns;
    }

    /**
     * Returns an associative array containing the bulk action
     *
     * @return array
     */
    public function get_bulk_actions() {
        $actions = array(
            // 'bulk-duplicate' => __( 'Duplicate', "survey-maker" ),
            'bulk-trash' => __( 'Move to trash', "survey-maker" ),
        );

        if(isset($_GET['fstatus']) && sanitize_text_field( $_GET['fstatus'] ) == 'trashed'){
            $actions = array(
                'bulk-restore' => __( 'Restore', "survey-maker" ),
                'bulk-delete' => __( 'Delete Permanently', "survey-maker" ),
            );
        }

        return $actions;
    }

    /**
     * Handles data query and filter, sorting, and pagination.
     */
    public function prepare_items() {

        $this->_column_headers = $this->get_column_info();

        /** Process bulk action */
        $this->process_bulk_action();

        $per_page     = $this->get_items_per_page( 'popup_survey_per_page', 20 );
        $current_page = $this->get_pagenum();
        $total_items  = self::record_count();

        $this->set_pagination_args( array(
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page'    => $per_page //WE have to determine how many items to show on a page
        ) );

        $this->items = self::get_items( $per_page, $current_page );
    }

    public function process_bulk_action() {
       
        //Detect when a bulk action is being triggered...
        if ( 'delete' === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr( $_REQUEST['_wpnonce'] );

            if ( ! wp_verify_nonce( $nonce, $this->plugin_name . '-delete-popup-survey' ) ) {
                die( 'Go get a life script kiddies' );
            }
            else {
                self::delete_items( absint( $_GET['id'] ) );

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url

                $add_query_args = array(
                    "status" => 'deleted'
                );
                if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                    $add_query_args['fstatus'] = sanitize_text_field( $_GET['fstatus'] );
                }
                $url = remove_query_arg( array('action', 'id', '_wpnonce') );
                $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
                wp_redirect( $url );
            }

        }

        //Detect when a bulk action is being triggered...
        if ( 'trash' === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr( $_REQUEST['_wpnonce'] );

            if ( ! wp_verify_nonce( $nonce, $this->plugin_name . '-trash-popup-survey' ) ) {
                die( 'Go get a life script kiddies' );
            }
            else {
                self::trash_items( absint( $_GET['id'] ) );

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url

                $add_query_args = array(
                    "status" => 'trashed'
                );
                if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                    $add_query_args['fstatus'] = sanitize_text_field( $_GET['fstatus'] );
                }
                $url = remove_query_arg( array('action', 'id', '_wpnonce') );
                $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
                wp_redirect( $url );
            }

        }

        //Detect when a bulk action is being triggered...
        if ( 'restore' === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr( $_REQUEST['_wpnonce'] );

            if ( ! wp_verify_nonce( $nonce, $this->plugin_name . '-delete-popup-survey' ) ) {
                die( 'Go get a life script kiddies' );
            }
            else {
                self::restore_items( absint( $_GET['id'] ) );

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url

                $add_query_args = array(
                    "status" => 'restored'
                );
                if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                    $add_query_args['fstatus'] = sanitize_text_field( $_GET['fstatus'] );
                }
                $url = remove_query_arg( array('action', 'id', '_wpnonce') );
                $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
                wp_redirect( $url );
            }

        }

        //Detect when a bulk action is being triggered...
        if ( 'duplicate' === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr( $_REQUEST['_wpnonce'] );

            if ( ! wp_verify_nonce( $nonce, $this->plugin_name . '-trash-popup-survey' ) ) {
                die( 'Go get a life script kiddies' );
            }
            else {
                self::duplicate_items( absint( $_GET['id'] ) );

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url

                $add_query_args = array(
                    "status" => 'duplicated'
                );
                if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                    $add_query_args['fstatus'] = sanitize_text_field( $_GET['fstatus'] );
                }
                $url = remove_query_arg( array('action', 'id', '_wpnonce') );
                $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
                wp_redirect( $url );
            }

        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' ) || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' ) ) {

            $delete_ids = ( isset( $_POST['bulk-delete'] ) && ! empty( $_POST['bulk-delete'] ) ) ? esc_sql( $_POST['bulk-delete'] ) : array();

            // loop over the array of record IDs and delete them
            foreach ( $delete_ids as $id ) {
                self::delete_items( $id );
            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url
            $add_query_args = array(
                "status" => 'all-deleted'
            );
            if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                $add_query_args['fstatus'] = sanitize_text_field( $_GET['fstatus'] );
            }
            $url = remove_query_arg( array('action', 'id', '_wpnonce') );
            $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
            wp_redirect( $url );
        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-trash' ) || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-trash' ) ) {

            $trash_ids = ( isset( $_POST['bulk-delete'] ) && ! empty( $_POST['bulk-delete'] ) ) ? esc_sql( $_POST['bulk-delete'] ) : array();

            // loop over the array of record IDs and delete them
            foreach ( $trash_ids as $id ) {
                self::trash_items( $id );
            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url
            $add_query_args = array(
                "status" => 'all-trashed'
            );
            if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                $add_query_args['fstatus'] = sanitize_text_field( $_GET['fstatus'] );
            }
            $url = remove_query_arg( array('action', 'id', '_wpnonce') );
            $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
            wp_redirect( $url );
        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-restore' ) || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-restore' ) ) {

            $restore_ids = ( isset( $_POST['bulk-delete'] ) && ! empty( $_POST['bulk-delete'] ) ) ? esc_sql( $_POST['bulk-delete'] ) : array();

            // loop over the array of record IDs and delete them
            foreach ( $restore_ids as $id ) {
                self::restore_items( $id );
            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url
            $add_query_args = array(
                "status" => 'all-restored'
            );
            if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                $add_query_args['fstatus'] = sanitize_text_field( $_GET['fstatus'] );
            }
            $url = remove_query_arg( array('action', 'id', '_wpnonce') );
            $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
            wp_redirect( $url );
        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-duplicate' ) || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-duplicate' ) ) {

            $restore_ids = ( isset( $_POST['bulk-delete'] ) && ! empty( $_POST['bulk-delete'] ) ) ? esc_sql( $_POST['bulk-delete'] ) : array();

            // loop over the array of record IDs and delete them
            foreach ( $restore_ids as $id ) {
                self::duplicate_items( $id );
            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url
            $add_query_args = array(
                "status" => 'all-duplicated'
            );
            if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                $add_query_args['fstatus'] = sanitize_text_field( $_GET['fstatus'] );
            }
            $url = remove_query_arg( array('action', 'id', '_wpnonce') );
            $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
            wp_redirect( $url );
        }
    }

    public function popup_survey_notices(){
        $status = (isset($_REQUEST['status'])) ? sanitize_text_field( $_REQUEST['status'] ) : '';

        if ( empty( $status ) )
            return;

        $error = false;
        switch ( $status ) {
            case 'created':
                $updated_message = esc_html( __( 'Popup created.', "survey-maker" ) );
                break;
            case 'updated':
                $updated_message = esc_html( __( 'Popup saved.', "survey-maker" ) );
                break;
            case 'duplicated':
                $updated_message = esc_html( __( 'Popup duplicated.', "survey-maker" ) );
                break;
            case 'deleted':
                $updated_message = esc_html( __( 'Popup deleted.', "survey-maker" ) );
                break;
            case 'trashed':
                $updated_message = esc_html( __( 'Popup moved to trash.', "survey-maker" ) );
                break;
            case 'restored':
                $updated_message = esc_html( __( 'Popup restored.', "survey-maker" ) );
                break;
            case 'all-duplicated':
                $updated_message = esc_html( __( 'Popups are duplicated.', "survey-maker" ) );
                break;
            case 'all-deleted':
                $updated_message = esc_html( __( 'Popups are deleted.', "survey-maker" ) );
                break;
            case 'all-trashed':
                $updated_message = esc_html( __( 'Popups are moved to trash.', "survey-maker" ) );
                break;
            case 'all-restored':
                $updated_message = esc_html( __( 'Popups are restored.', "survey-maker" ) );
                break;
            case 'published':
                $updated_message = esc_html( __( 'Popups are published.', "survey-maker" ) );
                break;
            case 'unpublished':
                $updated_message = esc_html( __( 'Popups are unpublished.', "survey-maker" ) );
                break;
            case 'empty-title':
                $error = true;
                $updated_message = esc_html( __( 'Error: Popup title can not be empty.', "survey-maker" ) );
                break;
            default:
                break;
        }

        if ( empty( $updated_message ) )
            return;

        $notice_class = 'success';
        if( $error ){
            $notice_class = 'error';
        }
        ?>
        <div class="notice notice-<?php echo esc_attr($notice_class); ?> is-dismissible">
            <p> <?php echo esc_html($updated_message); ?> </p>
        </div>
        <?php
    }
}
