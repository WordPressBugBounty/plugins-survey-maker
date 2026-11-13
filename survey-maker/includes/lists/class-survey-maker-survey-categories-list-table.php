<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

ob_start();
class Survey_Categories_List_Table extends WP_List_Table {
    
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

        $this->table_name = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories";

        $this->title_length = Survey_Maker_Data::get_listtables_title_length('survey_categories');

        parent::__construct( array(
            'singular' => __( 'Survey Category', "survey-maker" ), //singular name of the listed records
            'plural'   => __( 'Survey Categories', "survey-maker" ), //plural name of the listed records
            'ajax'     => false //does this table support ajax?
        ) );

        add_action( 'admin_notices', array( $this, 'survey_category_notices' ) );
    }

    /**
     * Override of table nav to avoid breaking with bulk actions & according nonce field
     */
    public function display_tablenav( $which ) {
        ?>
        <div class="tablenav <?php echo esc_attr( $which ); ?>">

            <div class="alignleft actions">
                <?php $this->bulk_actions( $which ); ?>
            </div>

            <?php
            $this->extra_tablenav( $which );
            $this->pagination( $which );
            ?>
            <br class="clear" />
        </div>
        <?php
    }

    /**
     * Disables the views for 'side' context as there's not enough free space in the UI
     * Only displays them on screen/browser refresh. Else we'd have to do this via an AJAX DB update.
     *
     * @see WP_List_Table::extra_tablenav()
     */
    public function extra_tablenav($which) {

        $survey_cat_description = array(
            "with"    => __( "With description", "survey-maker"),
            "without" => __( "Without description", "survey-maker"),
        );

        $description_key = null;

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        if( isset( $_GET['filterbyDescription'] ) && sanitize_text_field( wp_unslash( $_GET['filterbyDescription'] ) ) != ""){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $description_key = sanitize_text_field( wp_unslash( $_GET['filterbyDescription'] ) );
        }

        ?>

        <div id="survey-filter-div-<?php echo esc_attr( $which ); ?>" class="alignleft actions bulkactions">

            <select name="filterbyDescription-<?php echo esc_attr( $which ); ?>" id="bulk-action-survey-cat-description-selector-<?php echo esc_attr( $which ); ?>">
                <option value=""><?php echo esc_html__('With/without description',"survey-maker"); ?></option>
                <?php
                    foreach($survey_cat_description as $key => $cat_description) {
                        $selected = "";
                        if( $description_key === sanitize_text_field($key) ) {
                            $selected = "selected";
                        }
                        echo "<option ".esc_attr($selected)." value='".esc_attr( $key )."'>".esc_html($cat_description)."</option>";
                    }
                ?>
            </select>
            <input type="button" id="doaction-survey-<?php echo esc_attr( $which ); ?>" class="ays-survey-question-tab-all-filter-button-<?php echo esc_attr( $which ); ?> button action" value="<?php echo esc_html__( "Filter", "survey-maker" ); ?>">
        </div>

        <a style="" href="?page=<?php echo esc_attr( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only admin page slug. ?>" class="button action"><?php echo esc_html__( "Clear filters", "survey-maker" ); ?></a>
        <?php
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
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        if( isset( $_GET['fstatus'] ) ){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            switch( sanitize_text_field( wp_unslash( $_GET['fstatus'] ) ) ){
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
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            "all" => "<a ".$selected_all." href='?page=".( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' )."'>" . __( "All", "survey-maker" ) . " (".esc_attr($all_count).")</a>",
        );
        if( intval( $published_count ) > 0 ){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $status_links["published"] = "<a ".$selected_published." href='?page=".( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' )."&fstatus=published'>" . __( "Published", "survey-maker" ) . " (".esc_attr($published_count).")</a>";
        }
        if( intval( $draft_count ) > 0 ){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $status_links["draft"] = "<a ".$selected_draft." href='?page=".( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' )."&fstatus=draft'>" . __( "Draft", "survey-maker" ) . " (".esc_attr($draft_count).")</a>";
        }
        if( intval( $trashed_count ) > 0 ){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $status_links["trashed"] = "<a ".$selected_trashed." href='?page=".( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' )."&fstatus=trashed'>" . __( "Trash", "survey-maker" ) . " (".esc_attr($trashed_count).")</a>";
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
    public static function get_items( $per_page = 20, $page_number = 1, $search = "" ) {

        global $wpdb;

        $survey_categories_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories" );

        $where = array();

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        if ( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != ''){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $where[] = $wpdb->prepare( ' status = %s ', sanitize_text_field( wp_unslash( $_GET['fstatus'] ) ) );
        }else{
            $where[] = " status != 'trashed' ";
        }

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        if( isset( $_GET['filterbyDescription'] ) && sanitize_text_field( wp_unslash( $_GET['filterbyDescription'] ) ) != ""){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $description_key = sanitize_text_field( wp_unslash( $_GET['filterbyDescription'] ) );
            
            switch ( $description_key ) {
                case 'with':
                    $where[] = ' `description` != "" ';
                    break;
                case 'without':
                default:
                    $where[] = ' `description` = "" ';
                    break;
            }
        }

        if( $search != '' ){
            $where[] = $search;
        }

        $where_sql = ' WHERE ' . implode( ' AND ', $where );

        $order_by = 'id DESC';
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        if ( ! empty( $_REQUEST['orderby'] ) ) {
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $order_by  = ( isset( $_REQUEST['orderby'] ) && sanitize_text_field( wp_unslash( $_REQUEST['orderby'] ) ) != '' ) ? sanitize_text_field( wp_unslash( $_REQUEST['orderby'] ) ) : 'id';
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $order_by .= ( ! empty( $_REQUEST['order'] ) && strtolower( sanitize_text_field( wp_unslash( $_REQUEST['order'] ) ) ) == 'asc' ) ? ' ASC' : ' DESC';
        }

        $sql_orderby = sanitize_sql_orderby( $order_by );
        if ( ! $sql_orderby ) {
            $sql_orderby = 'id DESC';
        }

        $per_page = absint( $per_page );
        $offset   = max( 0, ( absint( $page_number ) - 1 ) * $per_page );

        // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared, PluginCheck.Security.DirectDB.UnescapedDBParameter -- Custom plugin table; the table name is escaped with esc_sql(), every WHERE part is a static string or built with $wpdb->prepare(), ORDER BY is validated with sanitize_sql_orderby().
        $result = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM {$survey_categories_table} {$where_sql} ORDER BY {$sql_orderby} LIMIT %d OFFSET %d",
                $per_page,
                $offset
            ),
            'ARRAY_A'
        );
        // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared, PluginCheck.Security.DirectDB.UnescapedDBParameter

        return $result;
    }

    public static function get_item_by_id( $id ) {
        global $wpdb;

        $survey_categories_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories" );

        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is built from $wpdb->prefix and escaped with esc_sql().
        $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$survey_categories_table} WHERE id = %d", absint( $id ) ), 'ARRAY_A' );

        return $result;
    }

    public function add_or_edit_item( $data ){
        global $wpdb;
        $table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories";


        if( isset( $data["survey_category_action"] ) && wp_verify_nonce( $data["survey_category_action"], 'survey_category_action' ) ){

            $name_prefix = 'ays_';

            $survey_allowed_html = Survey_Maker_Data::ays_survey_custom_allowed_html();
            
            // Save type
            $save_type = (isset($data['save_type'])) ? $data['save_type'] : '';

            // Id of item
            $id = isset( $data['id'] ) ? absint( intval( $data['id'] ) ) : 0;

            // Title
            $title = isset( $data[ $name_prefix . 'title' ] ) && $data[ $name_prefix . 'title' ] != '' ? stripslashes( sanitize_text_field( $data[ $name_prefix . 'title' ] ) ) : '';

            if($title == ''){
                $url = esc_url_raw( remove_query_arg( false ) );
                wp_safe_redirect( $url );
            }

            // Description
            // Sanitize description to allow only safe HTML tags and remove scripts.
            $description = isset( $data[ $name_prefix . 'description' ] ) && $data[ $name_prefix . 'description' ] != '' ? wp_kses( $data[ $name_prefix . 'description' ], $survey_allowed_html ) : '';

            // Status
            $status = isset( $data[ $name_prefix . 'status' ] ) && $data[ $name_prefix . 'status' ] != '' ? stripslashes( sanitize_text_field($data[ $name_prefix . 'status' ]) ) : 'published';
            
            // Date created
            $date_created = isset( $data[ $name_prefix . 'date_created' ] ) && Survey_Maker_Admin::validateDate( $data[ $name_prefix . 'date_created' ] ) ? stripslashes( sanitize_text_field($data[ $name_prefix . 'date_created' ]) ) : current_time( 'mysql' );
            
            // Date modified
            $date_modified = isset( $data[ $name_prefix . 'date_modified' ] ) && Survey_Maker_Admin::validateDate( $data[ $name_prefix . 'date_modified' ] ) ? stripslashes( sanitize_text_field($data[ $name_prefix . 'date_modified' ]) ) : current_time( 'mysql' );

            // Options
            $options = array(

            );

            $message = '';
            if( $id == 0 ){
                // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery -- Custom plugin table.
                $result = $wpdb->insert(
                    $table,
                    array(
                        'title'             => $title,
                        'description'       => $description,
                        'status'            => $status,
                        'date_created'      => $date_created,
                        'date_modified'     => $date_modified,
                        'options'           => json_encode( $options ),
                    ),
                    array(
                        '%s', // title
                        '%s', // description
                        '%s', // status
                        '%s', // date_created
                        '%s', // date_modified
                        '%s', // options
                    )
                );

                $inserted_id = $wpdb->insert_id;
                $message = 'created';
            }else{
                // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery -- Custom plugin table.
                $result = $wpdb->update(
                    $table,
                    array(
                        'title'             => $title,
                        'description'       => $description,
                        'status'            => $status,
                        'date_modified'     => $date_modified,
                        'options'           => json_encode( $options ),
                    ),
                    array( 'id' => $id ),
                    array(
                        '%s', // title
                        '%s', // description
                        '%s', // status
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
                    wp_safe_redirect( $url );
                }elseif($save_type == 'save_new'){
                    $url = remove_query_arg( array('id') );
                    $url = esc_url_raw( add_query_arg( array(
                        "action" => "add",
                        "status" => $message
                    ), $url ) );
                    wp_safe_redirect( $url );
                }else{
                    $url = remove_query_arg( array('action', 'id') );
                    $url = esc_url_raw( add_query_arg( array(
                        "status" => $message
                    ), $url ) );
                    wp_safe_redirect( $url );
                }
            }
        }
    }

    public function duplicate_survey_categories( $id ){
        global $wpdb;

        if ( is_null( $id ) || empty($id) || $id == 0 ) {
            return;
        }

        $survey_category_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories";
        $survey_category_data = self::get_item_by_id( $id );

        $survey_allowed_html = Survey_Maker_Data::ays_survey_custom_allowed_html();

        $title = (isset($survey_category_data['title']) && $survey_category_data['title'] != "") ? stripslashes( sanitize_text_field( $survey_category_data['title'] ) ) : __("Copy", 'survey-maker');

        $description =  (isset( $survey_category_data['description'] ) && $survey_category_data['description'] != "") ? wp_kses( $survey_category_data['description'], $survey_allowed_html ) : "";
        
        $status = (isset($survey_category_data['status']) && $survey_category_data['status'] != "") ? sanitize_text_field( $survey_category_data['status'] ) : 'published';
        $trash_status = (isset($survey_category_data['trash_status']) && $survey_category_data['trash_status'] != "") ? sanitize_text_field( $survey_category_data['trash_status'] ) : '';
        $date_created  = current_time( 'mysql' );
        $date_modified = $date_created;

        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery -- Custom plugin table.
        $result = $wpdb->insert(
            $survey_category_table,
            array(
                'title'         =>  "Copy - " . $title,
                'description'   => $description,
                'status'        => $status,
                'trash_status'  => $trash_status,
                'date_created'  => $date_created,
                'date_modified' => $date_modified,
            ),
            array(
                '%s', // title
                '%s', // description
                '%s', // status
                '%s', // trash_status
                '%s', // date_created
                '%s', // date_modified
            )
        );

        if( $result >= 0 ){
            $message = "duplicated";
            $url = esc_url_raw( remove_query_arg(array('action', 'id', '_wpnonce')  ) ) . '&status=' . $message;
            wp_safe_redirect( $url );
        }
    }

    /**
     * Delete a customer record.
     *
     * @param int $id customer ID
     */
    public static function delete_items( $id ) {
        global $wpdb;
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery -- Custom plugin table.
        $wpdb->delete(
            $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories",
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
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery -- Custom plugin table.
        $wpdb->update(
            $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories",
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

        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery -- Custom plugin table.
        $wpdb->update(
            $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories",
            array( 
                'status' => $db_item['trash_status'],
                'trash_status' => '',
            ),
            array( 'id' => $id ),
            array( '%s', '%s' ),
            array( '%d' )
        );
    }


    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    public static function record_count($do_search) {
        global $wpdb;
        $survey_categories_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories" );
        $where = array();
        $where[] = "status != 'trashed'";

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        if( isset( $_GET['filterbyDescription'] ) && sanitize_text_field( wp_unslash( $_GET['filterbyDescription'] ) ) != ""){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $description_key = sanitize_text_field( wp_unslash( $_GET['filterbyDescription'] ) );
            
            switch ( $description_key ) {
                case 'with':
                    $where[] = ' `description` != "" ';
                    break;
                case 'without':
                default:
                    $where[] = ' `description` = "" ';
                    break;
            }
        }

        if( $do_search != '' ){
            $where[] = $do_search;
        }

        $where_sql = ' WHERE ' . implode( ' AND ', $where );

        // phpcs:ignore PluginCheck.Security.DirectDB.UnescapedDBParameter, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is escaped with esc_sql(), every WHERE part is a static string or built with $wpdb->prepare().
        return $wpdb->get_var( "SELECT COUNT(*) FROM {$survey_categories_table} {$where_sql}" );
    }

    public static function all_record_count() {
        global $wpdb;

        $survey_categories_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories" );
        $where = array();
        $where[] = "status != 'trashed'";

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        if( isset( $_GET['filterbyDescription'] ) && sanitize_text_field( wp_unslash( $_GET['filterbyDescription'] ) ) != ""){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $description_key = sanitize_text_field( wp_unslash( $_GET['filterbyDescription'] ) );
            
            switch ( $description_key ) {
                case 'with':
                    $where[] = ' `description` != "" ';
                    break;
                case 'without':
                default:
                    $where[] = ' `description` = "" ';
                    break;
            }
        }

        $where_sql = ' WHERE ' . implode( ' AND ', $where );

        // phpcs:ignore PluginCheck.Security.DirectDB.UnescapedDBParameter, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is escaped with esc_sql(), every WHERE part is a static string or built with $wpdb->prepare().
        return $wpdb->get_var( "SELECT COUNT(*) FROM {$survey_categories_table} {$where_sql}" );
    }

    public static function get_statused_record_count( $status ) {
        global $wpdb;

        $survey_categories_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories" );

        $where = array();
        $where[] = $wpdb->prepare( 'status = %s', $status );

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        if( isset( $_GET['filterbyDescription'] ) && sanitize_text_field( wp_unslash( $_GET['filterbyDescription'] ) ) != ""){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $description_key = sanitize_text_field( wp_unslash( $_GET['filterbyDescription'] ) );
            
            switch ( $description_key ) {
                case 'with':
                    $where[] = ' `description` != "" ';
                    break;
                case 'without':
                default:
                    $where[] = ' `description` = "" ';
                    break;
            }
        }

        $where_sql = ' WHERE ' . implode( ' AND ', $where );

        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin table; the table name is escaped with esc_sql(), every WHERE part is a static string or built with $wpdb->prepare().
        return $wpdb->get_var( "SELECT COUNT(*) FROM {$survey_categories_table} {$where_sql}" );
    }
    

    /** Text displayed when no customer data is available */
    public function no_items() {
        Survey_Maker_Data::survey_no_items_list_tables();
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
            case 'description':
            case 'items_count':
            case 'status':
            case 'id':
                return $item[ $column_name ];
                break;
            default:
                return ''; // Every registered column has its own handler above.
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
        
        if(intval($item['id']) === 1){
            return;
        }
        
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
        if($item['status'] == 'trashed'){
            $delete_nonce = wp_create_nonce( $this->plugin_name . '-delete-survey-category' );
        }else{
            $delete_nonce = wp_create_nonce( $this->plugin_name . '-trash-survey-category' );
        }

        $survey_cat_title = (isset($item['title']) && $item['title'] != "") ? esc_attr(stripcslashes($item['title'])) : "";
        
        $restitle = Survey_Maker_Admin::ays_restriction_string( "word", stripcslashes( $survey_cat_title ), $this->title_length);
        
        $fstatus = '';
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $fstatus = '&fstatus=' . sanitize_text_field( wp_unslash( $_GET['fstatus'] ) );
        }
        $actions = array();
        if($item['status'] == 'trashed'){
            $title = sprintf( '<a><strong>%s</strong></a>', $restitle );
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $actions['restore'] = sprintf( '<a href="?page=%s&action=%s&id=%d&_wpnonce=%s'.$fstatus.'">'. __('Restore', "survey-maker") .'</a>', ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' ), 'restore', absint( $item['id'] ), $delete_nonce );
        }else{
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $title = sprintf( '<a href="?page=%s&action=%s&id=%d"><strong>%s</strong></a>', ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' ), 'edit', absint( $item['id'] ), $restitle );
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
            $actions['edit'] = sprintf( '<a href="?page=%s&action=%s&id=%d">'. __('Edit', "survey-maker") .'</a>', ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' ), 'edit', absint( $item['id'] ) );
        }
        
        if(intval($item['id']) !== 1){
            if($item['status'] == 'trashed'){
                // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
                $actions['delete'] = sprintf( '<a class="ays_confirm_del" data-message="%s" href="?page=%s&action=%s&id=%s&_wpnonce=%s'.$fstatus.'">'. __('Delete Permanently', "survey-maker") .'</a>', $restitle, ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' ), 'delete', absint( $item['id'] ), $delete_nonce );
            }else{
                $dup_nonce = wp_create_nonce( $this->plugin_name . '-duplicate-survey-category' );
                // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
                $actions['duplicate'] = sprintf( '<a href="?page=%s&action=%s&id=%s&_wpnonce=%s'.$fstatus.'">'. __('Duplicate', "survey-maker") .'</a>', ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' ), 'duplicate', absint( $item['id'] ), $dup_nonce );
                // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
                $actions['trash'] = sprintf( '<a href="?page=%s&action=%s&id=%s&_wpnonce=%s'.$fstatus.'">'. __('Move to trash', "survey-maker") .'</a>', ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '' ), 'trash', absint( $item['id'] ), $delete_nonce );
            }
        }

        return $title . $this->row_actions( $actions );
    }

    function column_items_count( $item ) {
        global $wpdb;
        $surveys_table    = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "surveys" );
        $categories_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "survey_categories" );

        // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Custom plugin tables; table names are built from $wpdb->prefix and escaped with esc_sql().
        $result = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT COUNT(*)
                FROM {$categories_table} c
                JOIN {$surveys_table} s
                    ON FIND_IN_SET(c.id, s.category_ids ) AND c.status = 'published' AND s.status = 'published'
                WHERE c.id = %d",
                absint( $item['id'] )
            )
        );
        // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
        
        if ( isset($result) && $result > 0 ) {
            $result = sprintf( '<a href="?page=%s&filterby=%d" target="_blank">%s</a>', 'survey-maker', $item['id'], $result );
        }

        return "<p style='font-size:14px;'>" . $result . "</p>";
    }

    function column_status( $item ) {
        global $wpdb;
        $status = ucfirst( esc_attr($item['status']) );
        $date = gmdate( 'Y/m/d', strtotime( esc_attr($item['date_modified']) ) );
        $title_date = gmdate( 'l jS \of F Y h:i:s A', strtotime( $item['date_modified'] ) );
        $html = "<p style='font-size:14px;margin:0;'>" . esc_html($status) . "</p>";
        $html .= "<p style=';font-size:14px;margin:0;text-decoration: dotted underline;' title='" . esc_attr($title_date) . "'>" . esc_attr($date) . "</p>";
        return $html;
    }

    function column_description( $item ){
        return (isset($item['description']) && $item['description']) ? esc_attr($item['description']) : '';
    }

    /**
     *  Associative array of columns
     *
     * @return array
     */
    function get_columns() {
        $columns = array(
            'cb'            => '<input type="checkbox" />',
            'title'         => __( 'Title', "survey-maker" ),
            'description'   => __( 'Description', "survey-maker" ),
            'items_count'   => __( 'Surveys', "survey-maker" ),
            'status'        => __( 'Status', "survey-maker" ),
            'id'            => __( 'ID', "survey-maker" ),
        );

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
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
            'bulk-trash' => __( 'Move to trash', "survey-maker" ),
        );

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        if(isset($_GET['fstatus']) && $_GET['fstatus'] == 'trashed'){
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
        global $wpdb;
        $this->_column_headers = $this->get_column_info();

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        $search = ( isset( $_REQUEST['s'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['s'] ) ) : false;

        $do_search = ( $search ) ? $wpdb->prepare( ' title LIKE %s ', '%' . $wpdb->esc_like( $search ) . '%' ) : '';

        /** Process bulk action */
        $this->process_bulk_action();

        $per_page     = $this->get_items_per_page( 'survey_categories_per_page', 20 );
        $current_page = $this->get_pagenum();
        $total_items  = self::record_count($do_search);

        $this->set_pagination_args( array(
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page'    => $per_page //WE have to determine how many items to show on a page
        ) );



        $this->items = self::get_items( $per_page, $current_page, $do_search );
    }

    public function process_bulk_action() {

        //Detect when a bulk action is being triggered...
        if ( 'delete' === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';

            if ( ! wp_verify_nonce( $nonce, $this->plugin_name . '-delete-survey-category' ) ) {
                die( 'Go get a life script kiddies' );
            }
            else {
                self::delete_items( isset( $_GET['id'] ) ? absint( sanitize_text_field( wp_unslash( $_GET['id'] ) ) ) : 0 );

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url

                $add_query_args = array(
                    "status" => 'deleted'
                );
                if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                    $add_query_args['fstatus'] = sanitize_text_field( wp_unslash( $_GET['fstatus'] ) );
                }
                $url = remove_query_arg( array('action', 'id', '_wpnonce') );
                $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
                wp_safe_redirect( $url );
            }

        }

        //Detect when a bulk action is being triggered...
        if ( 'trash' === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';

            if ( ! wp_verify_nonce( $nonce, $this->plugin_name . '-trash-survey-category' ) ) {
                die( 'Go get a life script kiddies' );
            }
            else {
                self::trash_items( isset( $_GET['id'] ) ? absint( sanitize_text_field( wp_unslash( $_GET['id'] ) ) ) : 0 );

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url

                $add_query_args = array(
                    "status" => 'trashed'
                );
                if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                    $add_query_args['fstatus'] = sanitize_text_field( wp_unslash( $_GET['fstatus'] ) );
                }
                $url = remove_query_arg( array('action', 'id', '_wpnonce') );
                $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
                wp_safe_redirect( $url );
            }

        }

        //Detect when a bulk action is being triggered...
        if ( 'restore' === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';

            if ( ! wp_verify_nonce( $nonce, $this->plugin_name . '-delete-survey-category' ) ) {
                die( 'Go get a life script kiddies' );
            }
            else {
                self::restore_items( isset( $_GET['id'] ) ? absint( sanitize_text_field( wp_unslash( $_GET['id'] ) ) ) : 0 );

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url

                $add_query_args = array(
                    "status" => 'restored'
                );
                if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                    $add_query_args['fstatus'] = sanitize_text_field( wp_unslash( $_GET['fstatus'] ) );
                }
                $url = remove_query_arg( array('action', 'id', '_wpnonce') );
                $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
                wp_safe_redirect( $url );
            }

        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' ) || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' ) ) {

            $delete_ids = ( isset( $_POST['bulk-delete'] ) && ! empty( $_POST['bulk-delete'] ) ) ? array_map( 'absint', (array) wp_unslash( $_POST['bulk-delete'] ) ) : array();

            // loop over the array of record IDs and delete them
            foreach ( $delete_ids as $id ) {
                self::delete_items( $id );
            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url
            $add_query_args = array(
                "status" => 'deleted'
            );
            if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                $add_query_args['fstatus'] = sanitize_text_field( wp_unslash( $_GET['fstatus'] ) );
            }
            $url = remove_query_arg( array('action', 'id', '_wpnonce') );
            $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
            wp_safe_redirect( $url );
        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-trash' ) || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-trash' ) ) {

            $trash_ids = array_map( 'absint', (array) wp_unslash( $_POST['bulk-delete'] ) );

            // loop over the array of record IDs and delete them
            foreach ( $trash_ids as $id ) {
                self::trash_items( $id );
            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url
            $add_query_args = array(
                "status" => 'trashed'
            );
            if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                $add_query_args['fstatus'] = sanitize_text_field( wp_unslash( $_GET['fstatus'] ) );
            }
            $url = remove_query_arg( array('action', 'id', '_wpnonce') );
            $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
            wp_safe_redirect( $url );
        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-restore' ) || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-restore' ) ) {

            $restore_ids = array_map( 'absint', (array) wp_unslash( $_POST['bulk-delete'] ) );

            // loop over the array of record IDs and delete them
            foreach ( $restore_ids as $id ) {
                self::restore_items( $id );
            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url
            $add_query_args = array(
                "status" => 'restored'
            );
            if( isset( $_GET['fstatus'] ) && $_GET['fstatus'] != '' ){
                $add_query_args['fstatus'] = sanitize_text_field( wp_unslash( $_GET['fstatus'] ) );
            }
            $url = remove_query_arg( array('action', 'id', '_wpnonce') );
            $url = esc_url_raw( add_query_arg( $add_query_args, $url ) );
            wp_safe_redirect( $url );
        }
    }



    public function survey_category_notices(){
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only request parameter, no data is modified.
        $status = (isset($_REQUEST['status'])) ? sanitize_text_field( wp_unslash( $_REQUEST['status'] ) ) : '';

        if ( empty( $status ) )
            return;

        if ( 'created' == $status )
            $updated_message =  __( 'Survey category created.', "survey-maker" );
        elseif ( 'updated' == $status )
            $updated_message =  __( 'Survey category saved.', "survey-maker" );
        elseif ( 'deleted' == $status )
            $updated_message =  __( 'Survey category deleted.', "survey-maker" );
        elseif ( 'duplicated' == $status )
            $updated_message =  __( 'Survey category duplicated.', "survey-maker" );
        
        if ( empty( $updated_message ) )
            return;

        ?>
            <div class="ays-survey-admin-notice notice notice-success is-dismissible">
                <p> <?php echo esc_html($updated_message); ?> </p>
            </div>
        <?php
    }
}
