<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Survey_Maker
 * @subpackage Survey_Maker/includes
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Survey_Maker
 * @subpackage Survey_Maker/includes
 * @author     AYS Pro LLC <info@ays-pro.com>
 */
class Survey_Maker_Data {

    public static function get_survey_validated_data_from_array( $survey, $attr ){
        global $wpdb;

        // Array for survey validated options
        $settings = array();
        $name_prefix = 'survey_';
        
        // ID
        $id = ( isset($attr['id']) ) ? absint( intval( $attr['id'] ) ) : null;
        $settings['id'] = $id;

        // Survey options
        $options = array();
        if( isset( $survey->options ) && $survey->options != '' ){
            $options = json_decode( $survey->options, true );
        }

        $settings[ 'options' ] = $options;
        
        $survey_answers_alignment_grid_types = array(
            "space_around",
            "space_between",
        );

        // =======================  //  ======================= // ======================= // ======================= // ======================= //


        // =============================================================
        // ======================    Styles Tab    =====================
        // ========================    START    ========================


        // Survey Theme
        $settings[ $name_prefix . 'theme' ] = (isset($options[ $name_prefix . 'theme' ]) && $options[ $name_prefix . 'theme' ] != '') ? stripslashes ( sanitize_text_field( $options[ $name_prefix . 'theme' ] ) ) : 'classic_light';
        $settings[ $name_prefix . 'is_minimal' ] = $settings[ $name_prefix . 'theme' ] == 'minimal' ? true : false;
        $settings[ $name_prefix . 'is_modern' ] = $settings[ $name_prefix . 'theme' ] == 'modern' ? true : false;

        // Survey Color
        $settings[ $name_prefix . 'color' ] = (isset($options[ $name_prefix . 'color' ]) && $options[ $name_prefix . 'color' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'color' ] ) ) : '#ff5722'; // '#673ab7'

        // Background color
        $settings[ $name_prefix . 'background_color' ] = (isset($options[ $name_prefix . 'background_color' ]) && $options[ $name_prefix . 'background_color' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'background_color' ] ) ) : '#fff';

        // Text Color
        $settings[ $name_prefix . 'text_color' ] = (isset($options[ $name_prefix . 'text_color' ]) && $options[ $name_prefix . 'text_color' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'text_color' ] ) ) : '#333';

        // Loader Color
        $settings[ $name_prefix . 'loader_color' ] = (isset($options[ $name_prefix . 'loader_color' ]) && $options[ $name_prefix . 'loader_color' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'loader_color' ] ) ) : $settings[ $name_prefix . 'text_color' ];

        // Buttons text Color
        $settings[ $name_prefix . 'buttons_text_color' ] = (isset($options[ $name_prefix . 'buttons_text_color' ]) && $options[ $name_prefix . 'buttons_text_color' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'buttons_text_color' ] ) ) :  $settings[ $name_prefix . 'text_color' ];

        // Width
        $settings[ $name_prefix . 'width' ] = (isset($options[ $name_prefix . 'width' ]) && $options[ $name_prefix . 'width' ] != '') ? absint ( intval( $options[ $name_prefix . 'width' ] ) ) : '';

        // Survey Width by percentage or pixels
        $settings[ $name_prefix . 'width_by_percentage_px' ] = (isset($options[ $name_prefix . 'width_by_percentage_px' ]) && $options[ $name_prefix . 'width_by_percentage_px' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'width_by_percentage_px' ] ) ) : 'pixels';

        // Mobile width
        $settings[ $name_prefix . 'mobile_width' ] = (isset($options[ $name_prefix . 'mobile_width' ]) && $options[ $name_prefix . 'mobile_width' ] != '') ? absint ( intval( $options[ $name_prefix . 'mobile_width' ] ) ) : '';

        // Survey mobile width by percentage or pixels
        $settings[ $name_prefix . 'mobile_width_by_percent_px' ] = (isset($options[ $name_prefix . 'mobile_width_by_percent_px' ]) && $options[ $name_prefix . 'mobile_width_by_percent_px' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'mobile_width_by_percent_px' ] ) ) : 'pixels';

        // Survey container max width
        $settings[ $name_prefix . 'mobile_max_width' ] = (isset($options[ $name_prefix . 'mobile_max_width' ]) && $options[ $name_prefix . 'mobile_max_width' ] != '') ? absint ( intval( $options[ $name_prefix . 'mobile_max_width' ] ) ) : '';

        // Custom class for survey container
        $settings[ $name_prefix . 'custom_class' ] = (isset($options[ $name_prefix . 'custom_class' ]) && $options[ $name_prefix . 'custom_class' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'custom_class' ] ) ) : '';

        // Custom CSS
        $settings[ $name_prefix . 'custom_css' ] = (isset($options[ $name_prefix . 'custom_css' ]) && $options[ $name_prefix . 'custom_css' ] != '') ? stripslashes ( html_entity_decode( $options[ $name_prefix . 'custom_css' ] ) ) : '';

        // Survey logo
        $settings[ $name_prefix . 'logo' ] = (isset($options[ $name_prefix . 'logo' ]) && $options[ $name_prefix . 'logo' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'logo' ] ) ) : '';

        // Survey logo position
        $settings[ $name_prefix . 'logo_image_position' ] = (isset($options[ $name_prefix . 'logo_image_position' ]) && $options[ $name_prefix . 'logo_image_position' ] != '') ? esc_attr( $options[ $name_prefix . 'logo_image_position' ] ) : 'right';
        // Survey logo position mobile
        $options[ $name_prefix . 'logo_image_position_mobile' ] = isset($options[ $name_prefix . 'logo_image_position_mobile' ]) ? $options[ $name_prefix . 'logo_image_position_mobile' ] : $settings[ $name_prefix . 'logo_image_position' ];
        $settings[ $name_prefix . 'logo_image_position_mobile' ] = (isset($options[ $name_prefix . 'logo_image_position_mobile' ]) && $options[ $name_prefix . 'logo_image_position_mobile' ] != '') ? esc_attr( $options[ $name_prefix . 'logo_image_position_mobile' ] ) : 'right';

        // Survey logo title
        $settings[ $name_prefix . 'logo_title' ] = (isset($options[ $name_prefix . 'logo_title' ]) && $options[ $name_prefix . 'logo_title' ] != '') ? esc_attr( $options[ $name_prefix . 'logo_title' ] ) : '';

        // Survey cover photo
        $settings[ $name_prefix . 'cover_photo' ] = (isset($options[ $name_prefix . 'cover_photo' ]) && $options[ $name_prefix . 'cover_photo' ] != '') ? stripslashes( esc_attr( $options[ $name_prefix . 'cover_photo' ] ) ) : '';

        // Survey cover photo height
        $settings[ $name_prefix . 'cover_photo_height' ] = (isset($options[ $name_prefix . 'cover_photo_height' ]) && $options[ $name_prefix . 'cover_photo_height' ] != '') ? esc_attr( $options[ $name_prefix . 'cover_photo_height' ] ) : 150;

        // Survey cover photo mobile height
        $settings[ $name_prefix . 'cover_photo_mobile_height' ] = (isset($options[ $name_prefix . 'cover_photo_mobile_height' ]) && $options[ $name_prefix . 'cover_photo_mobile_height' ] != '') ? esc_attr( $options[ $name_prefix . 'cover_photo_mobile_height' ] ) : $settings[ $name_prefix . 'cover_photo_height' ];

        // Survey cover photo position
        $settings[ $name_prefix . 'cover_photo_position' ] = (isset($options[ $name_prefix . 'cover_photo_position' ]) && $options[ $name_prefix . 'cover_photo_position' ] != '') ? esc_attr( $options[ $name_prefix . 'cover_photo_position' ] ) : "center_center";

        // Survey cover photo object fit
        $settings[ $name_prefix . 'cover_photo_object_fit' ] = (isset($options[ $name_prefix . 'cover_photo_object_fit' ]) && $options[ $name_prefix . 'cover_photo_object_fit' ] != '') ? esc_attr( $options[ $name_prefix . 'cover_photo_object_fit' ] ) : "cover";

        // Survey cover only first section
        $settings[ $name_prefix . 'cover_only_first_section' ] = (isset($options[ $name_prefix . 'cover_only_first_section' ]) && $options[ $name_prefix . 'cover_only_first_section' ] == 'on') ? true : false;

        // Survey title alignment
        $settings[ $name_prefix . 'title_alignment' ] = (isset( $options[ $name_prefix . 'title_alignment' ] ) && $options[ $name_prefix . 'title_alignment' ] != '') ? esc_attr( $options[ $name_prefix . 'title_alignment' ] ) : 'left';

        // Survey title alignment mobile
        $options[ $name_prefix . 'title_alignment_mobile' ] = isset( $options[ $name_prefix . 'title_alignment_mobile' ] ) ? $options[ $name_prefix . 'title_alignment_mobile' ] : $settings[ $name_prefix . 'title_alignment' ];
        $settings[ $name_prefix . 'title_alignment_mobile' ] = (isset( $options[ $name_prefix . 'title_alignment_mobile' ] ) && $options[ $name_prefix . 'title_alignment_mobile' ] != '') ? esc_attr( $options[ $name_prefix . 'title_alignment_mobile' ] ) : 'left';

        // Survey title font size
        $settings[ $name_prefix . 'title_font_size' ] = (isset( $options[ $name_prefix . 'title_font_size' ] ) && $options[ $name_prefix . 'title_font_size' ] != '' && $options[ $name_prefix . 'title_font_size' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'title_font_size' ] ) : 30;

        // Survey title letter spacing
        $settings[ $name_prefix . 'title_letter_spacing' ] = (isset( $options[ $name_prefix . 'title_letter_spacing' ] ) && $options[ $name_prefix . 'title_letter_spacing' ] != '' && $options[ $name_prefix . 'title_letter_spacing' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'title_letter_spacing' ] ) : 0;

        // Survey title letter spacing mobile
        $settings[ $name_prefix . 'title_letter_spacing_mobile' ] = (isset( $options[ $name_prefix . 'title_letter_spacing_mobile' ] ) && $options[ $name_prefix . 'title_letter_spacing_mobile' ] != '' && $options[ $name_prefix . 'title_letter_spacing_mobile' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'title_letter_spacing_mobile' ] ) : $settings[ $name_prefix . 'title_letter_spacing' ];

        // Survey title font size mobile
        $settings[ $name_prefix . 'title_font_size_for_mobile' ] = (isset( $options[ $name_prefix . 'title_font_size_for_mobile' ] ) && $options[ $name_prefix . 'title_font_size_for_mobile' ] != '' && $options[ $name_prefix . 'title_font_size_for_mobile' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'title_font_size_for_mobile' ] ) : 30;

        // Survey title box shadow
        $settings[ $name_prefix . 'title_box_shadow_enable' ] = (isset( $options[ $name_prefix . 'title_box_shadow_enable' ] ) && $options[ $name_prefix . 'title_box_shadow_enable' ] == 'on' ) ? true : false;

        // === Survey title box shadow offsets start ===
            // Survey title box shadow offset x
            $settings[ $name_prefix . 'title_text_shadow_x_offset' ] = ( isset($options[ $name_prefix . 'title_text_shadow_x_offset' ] ) && $options[ $name_prefix . 'title_text_shadow_x_offset' ] != "") ? esc_attr($options[ $name_prefix . 'title_text_shadow_x_offset' ]) : 0;
            // Survey title box shadow offset y
            $settings[ $name_prefix . 'title_text_shadow_y_offset' ] = ( isset($options[ $name_prefix . 'title_text_shadow_y_offset' ] ) && $options[ $name_prefix . 'title_text_shadow_y_offset' ] != "") ? esc_attr($options[ $name_prefix . 'title_text_shadow_y_offset' ]) : 0;
            // Survey title box shadow offset z
            $settings[ $name_prefix . 'title_text_shadow_z_offset' ] = ( isset($options[ $name_prefix . 'title_text_shadow_z_offset' ] ) && $options[ $name_prefix . 'title_text_shadow_z_offset' ] != "") ? esc_attr($options[ $name_prefix . 'title_text_shadow_z_offset' ]) : 10;
        // === Survey title box shadow offsets end ===
        
        // Survey title box shadow color
        $settings[ $name_prefix . 'title_box_shadow_color' ] = (isset( $options[ $name_prefix . 'title_box_shadow_color' ] ) && $options[ $name_prefix . 'title_box_shadow_color' ] != '' ) ? esc_attr( $options[ $name_prefix . 'title_box_shadow_color' ] ) : '#333';

        // Survey section title font size PC
        $settings[ $name_prefix . 'section_title_font_size' ] = (isset( $options[ $name_prefix . 'section_title_font_size' ] ) && $options[ $name_prefix . 'section_title_font_size' ] != '' && $options[ $name_prefix . 'section_title_font_size' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'section_title_font_size' ] ) : 32;
        // Survey section title font size Mobile
        $settings[ $name_prefix . 'section_title_font_size_mobile' ] = (isset( $options[ $name_prefix . 'section_title_font_size_mobile' ] ) && $options[ $name_prefix . 'section_title_font_size_mobile' ] != '' && $options[ $name_prefix . 'section_title_font_size_mobile' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'section_title_font_size_mobile' ] ) : 32;

        // Survey section title alignment
        $settings[ $name_prefix . 'section_title_alignment' ] = (isset( $options[ $name_prefix . 'section_title_alignment' ] ) && $options[ $name_prefix . 'section_title_alignment' ] != '') ? esc_attr( $options[ $name_prefix . 'section_title_alignment' ] ) : 'left';

        // Survey section title alignment mobile
        $options[ $name_prefix . 'section_title_alignment_mobile' ] = isset($options[ $name_prefix . 'section_title_alignment_mobile' ]) ? $options[ $name_prefix . 'section_title_alignment_mobile' ] : $settings[ $name_prefix . 'section_title_alignment' ];
        $settings[ $name_prefix . 'section_title_alignment_mobile' ] = (isset( $options[ $name_prefix . 'section_title_alignment_mobile' ] ) && $options[ $name_prefix . 'section_title_alignment_mobile' ] != '') ? esc_attr( $options[ $name_prefix . 'section_title_alignment_mobile' ] ) : 'left';

        // Survey section title letter spacing
        $settings[ $name_prefix . 'section_title_letter_spacing' ] = (isset( $options[ $name_prefix . 'section_title_letter_spacing' ] ) && $options[ $name_prefix . 'section_title_letter_spacing' ] != '' && $options[ $name_prefix . 'section_title_letter_spacing' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'section_title_letter_spacing' ] ) : 0;

        // Survey section title letter spacing mobile
        $settings[ $name_prefix . 'section_title_letter_spacing_mobile' ] = (isset( $options[ $name_prefix . 'section_title_letter_spacing_mobile' ] ) && $options[ $name_prefix . 'section_title_letter_spacing_mobile' ] != '' && $options[ $name_prefix . 'section_title_letter_spacing_mobile' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'section_title_letter_spacing_mobile' ] ) : $settings[ $name_prefix . 'section_title_letter_spacing' ];

        // Survey section description alignment
        $settings[ $name_prefix . 'section_description_alignment' ] = (isset( $options[ $name_prefix . 'section_description_alignment' ] ) && $options[ $name_prefix . 'section_description_alignment' ] != '') ? esc_attr( $options[ $name_prefix . 'section_description_alignment' ] ) : 'left';
        // Survey section description alignment mobile
        $options[ $name_prefix . 'section_description_alignment_mobile' ] = isset($options[ $name_prefix . 'section_description_alignment_mobile' ]) ? $options[ $name_prefix . 'section_description_alignment_mobile' ] : $settings[ $name_prefix . 'section_description_alignment' ];
        $settings[ $name_prefix . 'section_description_alignment_mobile' ] = (isset( $options[ $name_prefix . 'section_description_alignment_mobile' ] ) && $options[ $name_prefix . 'section_description_alignment_mobile' ] != '') ? esc_attr( $options[ $name_prefix . 'section_description_alignment_mobile' ] ) : 'left';

        // Survey section description font size
        $settings[ $name_prefix . 'section_description_font_size' ] = (isset( $options[ $name_prefix . 'section_description_font_size' ] ) && $options[ $name_prefix . 'section_description_font_size' ] != '' && $options[ $name_prefix . 'section_description_font_size' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'section_description_font_size' ] ) : 14;

        // Survey section description font size mobile
        $settings[ $name_prefix . 'section_description_font_size_mobile' ] = (isset( $options[ $name_prefix . 'section_description_font_size_mobile' ] ) && $options[ $name_prefix . 'section_description_font_size_mobile' ] != '' && $options[ $name_prefix . 'section_description_font_size_mobile' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'section_description_font_size_mobile' ] ) : 14;

        // Survey section description letter spacing
        $settings[ $name_prefix . 'section_description_letter_spacing' ] = (isset( $options[ $name_prefix . 'section_description_letter_spacing' ] ) && $options[ $name_prefix . 'section_description_letter_spacing' ] != '' && $options[ $name_prefix . 'section_description_letter_spacing' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'section_description_letter_spacing' ] ) : 0;

        // Survey section description letter spacing mobile
        $options[ $name_prefix . 'section_description_letter_spacing_mobile' ] = isset($options[ $name_prefix . 'section_description_letter_spacing_mobile' ]) ? $options[ $name_prefix . 'section_description_letter_spacing_mobile' ] : $settings[ $name_prefix . 'section_description_letter_spacing' ];
        $settings[ $name_prefix . 'section_description_letter_spacing_mobile' ] = (isset( $options[ $name_prefix . 'section_description_letter_spacing_mobile' ] ) && $options[ $name_prefix . 'section_description_letter_spacing_mobile' ] != '' && $options[ $name_prefix . 'section_description_letter_spacing_mobile' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'section_description_letter_spacing_mobile' ] ) : 0;

        // =========== Questions Styles Start ===========

        // Question font size
        $settings[ $name_prefix . 'question_font_size' ] = (isset($options[ $name_prefix . 'question_font_size' ]) && $options[ $name_prefix . 'question_font_size' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_font_size' ] ) ) : 16;

        // Question font size mobile
        $settings[ $name_prefix . 'question_font_size_mobile' ] = (isset($options[ $name_prefix . 'question_font_size_mobile' ]) && $options[ $name_prefix . 'question_font_size_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_font_size_mobile' ] ) ) : 16;

        // Question title alignment
        $settings[ $name_prefix . 'question_title_alignment' ] = (isset($options[ $name_prefix . 'question_title_alignment' ]) && $options[ $name_prefix . 'question_title_alignment' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'question_title_alignment' ] ) ) : 'left';

        // Question Image Width
        $settings[ $name_prefix . 'question_image_width' ] = (isset($options[ $name_prefix . 'question_image_width' ]) && $options[ $name_prefix . 'question_image_width' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_image_width' ] ) ) : '';
        // Question Image Width mobile
        $options[ $name_prefix . 'question_image_width_mobile' ] = isset($options[ $name_prefix . 'question_image_width_mobile' ]) ? $options[ $name_prefix . 'question_image_width_mobile' ] : $settings[ $name_prefix . 'question_image_width' ];
        $settings[ $name_prefix . 'question_image_width_mobile' ] = (isset($options[ $name_prefix . 'question_image_width_mobile' ]) && $options[ $name_prefix . 'question_image_width_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_image_width_mobile' ] ) ) : '';

        // Question Image Height
        $settings[ $name_prefix . 'question_image_height' ] = (isset($options[ $name_prefix . 'question_image_height' ]) && $options[ $name_prefix . 'question_image_height' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_image_height' ] ) ) : '';
        // Question Image Height mobile
        $options[ $name_prefix . 'question_image_height_mobile' ] = isset($options[ $name_prefix . 'question_image_height_mobile' ]) ? $options[ $name_prefix . 'question_image_height_mobile' ] : $settings[ $name_prefix . 'question_image_height' ];
        $settings[ $name_prefix . 'question_image_height_mobile' ] = (isset($options[ $name_prefix . 'question_image_height_mobile' ]) && $options[ $name_prefix . 'question_image_height_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_image_height_mobile' ] ) ) : '';

        // Question Image sizing
        $settings[ $name_prefix . 'question_image_sizing' ] = (isset($options[ $name_prefix . 'question_image_sizing' ]) && $options[ $name_prefix . 'question_image_sizing' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'question_image_sizing' ] ) ) : 'cover';
        // Question Image sizing mobile
        $options[ $name_prefix . 'question_image_sizing_mobile' ] = isset($options[ $name_prefix . 'question_image_sizing_mobile' ]) ? $options[ $name_prefix . 'question_image_sizing_mobile' ] : $settings[ $name_prefix . 'question_image_sizing' ];
        $settings[ $name_prefix . 'question_image_sizing_mobile' ] = (isset($options[ $name_prefix . 'question_image_sizing_mobile' ]) && $options[ $name_prefix . 'question_image_sizing_mobile' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'question_image_sizing_mobile' ] ) ) : 'cover';
        
        // Question padding
        $settings[ $name_prefix . 'question_padding' ] = (isset($options[ $name_prefix . 'question_padding' ]) && $options[ $name_prefix . 'question_padding' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_padding' ] ) ) : 24;
        
        // Question padding mobile
        $options[ $name_prefix . 'question_padding_mobile' ] = isset($options[ $name_prefix . 'question_padding_mobile' ]) ? $options[ $name_prefix . 'question_padding_mobile' ] : $settings[ $name_prefix . 'question_padding' ];
        $settings[ $name_prefix . 'question_padding_mobile' ] = (isset($options[ $name_prefix . 'question_padding_mobile' ]) && $options[ $name_prefix . 'question_padding_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_padding_mobile' ] ) ) : 24;
        
        // Question caption text color
        $settings[ $name_prefix . 'question_caption_text_color' ] = (isset($options[ $name_prefix . 'question_caption_text_color' ]) && $options[ $name_prefix . 'question_caption_text_color' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'question_caption_text_color' ] ) ) : $settings[ $name_prefix . 'text_color' ];
        // Question caption text color mobile
        $options[ $name_prefix . 'question_caption_text_color_mobile' ] = (isset($options[ $name_prefix . 'question_caption_text_color_mobile' ])) ?  $options[ $name_prefix . 'question_caption_text_color_mobile' ] : $settings[ $name_prefix . 'question_caption_text_color' ];
        $settings[ $name_prefix . 'question_caption_text_color_mobile' ] = (isset($options[ $name_prefix . 'question_caption_text_color_mobile' ]) && $options[ $name_prefix . 'question_caption_text_color_mobile' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'question_caption_text_color_mobile' ] ) ) : $settings[ $name_prefix . 'text_color' ];
        
        // Question caption text alignment
        $settings[ $name_prefix . 'question_caption_text_alignment' ] = (isset($options[ $name_prefix . 'question_caption_text_alignment' ]) && $options[ $name_prefix . 'question_caption_text_alignment' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'question_caption_text_alignment' ] ) ) : 'center';
        
        // Question caption text alignment on mobile
        $options[ $name_prefix . 'question_caption_text_alignment_on_mobile' ] = isset($options[ $name_prefix . 'question_caption_text_alignment_on_mobile' ]) ? $options[ $name_prefix . 'question_caption_text_alignment_on_mobile' ] : $settings[ $name_prefix . 'question_caption_text_alignment' ];
        $settings[ $name_prefix . 'question_caption_text_alignment_on_mobile' ] = (isset($options[ $name_prefix . 'question_caption_text_alignment_on_mobile' ]) && $options[ $name_prefix . 'question_caption_text_alignment_on_mobile' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'question_caption_text_alignment_on_mobile' ] ) ) : 'center';
        
        // Question caption font size
        $settings[ $name_prefix . 'question_caption_font_size' ] = (isset($options[ $name_prefix . 'question_caption_font_size' ]) && $options[ $name_prefix . 'question_caption_font_size' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_caption_font_size' ] ) ) : 16;
        
        // Question caption font size on mobile
        $options[ $name_prefix . 'question_caption_font_size_on_mobile' ]  = isset($options[ $name_prefix . 'question_caption_font_size_on_mobile' ]) ? $options[ $name_prefix . 'question_caption_font_size_on_mobile' ] : $settings[ $name_prefix . 'question_caption_font_size' ];
        $settings[ $name_prefix . 'question_caption_font_size_on_mobile' ] = (isset($options[ $name_prefix . 'question_caption_font_size_on_mobile' ]) && $options[ $name_prefix . 'question_caption_font_size_on_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_caption_font_size_on_mobile' ] ) ) : 16;
        
        // Question caption text transform
        $settings[ $name_prefix . 'question_caption_text_transform' ] = (isset($options[ $name_prefix . 'question_caption_text_transform' ]) && $options[ $name_prefix . 'question_caption_text_transform' ] != '') ? esc_attr ( $options[ $name_prefix . 'question_caption_text_transform' ] )  : 'none';
        // Question caption text transform mobile
        $options[ $name_prefix . 'question_caption_text_transform_mobile' ] = isset($options[ $name_prefix . 'question_caption_text_transform_mobile' ]) ? $options[ $name_prefix . 'question_caption_text_transform_mobile' ] : $settings[ $name_prefix . 'question_caption_text_transform' ];
        $settings[ $name_prefix . 'question_caption_text_transform_mobile' ] = (isset($options[ $name_prefix . 'question_caption_text_transform_mobile' ]) && $options[ $name_prefix . 'question_caption_text_transform_mobile' ] != '') ? esc_attr ( $options[ $name_prefix . 'question_caption_text_transform_mobile' ] )  : 'none';
        
        // Question caption letter spacing        
        $settings[ $name_prefix . 'question_caption_letter_spacing' ] = (isset($options[ $name_prefix . 'question_caption_letter_spacing' ]) && $options[ $name_prefix . 'question_caption_letter_spacing' ] != '') ? absint ( intval( $options[ $name_prefix . 'question_caption_letter_spacing' ] ) ) : 0;

        // Question caption letter spacing mobile
        $settings[ $name_prefix . 'question_caption_letter_spacing_mobile' ] = (isset( $options[ $name_prefix . 'question_caption_letter_spacing_mobile' ] ) && $options[ $name_prefix . 'question_caption_letter_spacing_mobile' ] != '' && $options[ $name_prefix . 'question_caption_letter_spacing_mobile' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'question_caption_letter_spacing_mobile' ] ) : $settings[ $name_prefix . 'question_caption_letter_spacing' ];

        // Question caption hide on mobile        
        $settings[ $name_prefix . 'question_caption_hide_on_mobile' ] = (isset($options[ $name_prefix . 'question_caption_hide_on_mobile' ]) && $options[ $name_prefix . 'question_caption_hide_on_mobile' ] == 'on') ? true : false;

        // =========== Questions Styles End   =========== 


        // =========== Answers Styles Start ===========

        // Answer font size
        $settings[ $name_prefix . 'answer_font_size' ] = (isset($options[ $name_prefix . 'answer_font_size' ]) && $options[ $name_prefix . 'answer_font_size' ] != '') ? absint ( intval( $options[ $name_prefix . 'answer_font_size' ] ) ) : 15;

        // Answer font size mobile
        $settings[ $name_prefix . 'answer_font_size_on_mobile' ] = (isset($options[ $name_prefix . 'answer_font_size_on_mobile' ]) && $options[ $name_prefix . 'answer_font_size_on_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'answer_font_size_on_mobile' ] ) ) : 15;

        // Answer letter spacing
        $settings[ $name_prefix . 'answer_letter_spacing' ] = (isset($options[ $name_prefix . 'answer_letter_spacing' ]) && $options[ $name_prefix . 'answer_letter_spacing' ] != '') ? absint ( intval( $options[ $name_prefix . 'answer_letter_spacing' ] ) ) : 0;

        // Answer letter spacing mobile
        $options[ $name_prefix . 'answer_letter_spacing_mobile' ] = isset($options[ $name_prefix . 'answer_letter_spacing_mobile' ]) ? $options[ $name_prefix . 'answer_letter_spacing_mobile' ] : $settings[ $name_prefix . 'answer_letter_spacing' ];
        $settings[ $name_prefix . 'answer_letter_spacing_mobile' ] = (isset($options[ $name_prefix . 'answer_letter_spacing_mobile' ]) && $options[ $name_prefix . 'answer_letter_spacing_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'answer_letter_spacing_mobile' ] ) ) : 0;

        // Answer view
        $settings[ $name_prefix . 'answers_view' ] = (isset($options[ $name_prefix . 'answers_view' ]) && $options[ $name_prefix . 'answers_view' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'answers_view' ] ) ) : 'list';
        
        // Answer view alignment
        $settings[ $name_prefix . 'answers_view_alignment' ] = (isset($options[ $name_prefix . 'answers_view_alignment' ]) && $options[ $name_prefix . 'answers_view_alignment' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'answers_view_alignment' ] ) ) : 'space-around';
        $settings[ $name_prefix . 'answers_view_alignment' ] = ($settings[ $name_prefix . 'answers_view' ] == 'list' && in_array($settings[ $name_prefix . 'answers_view_alignment' ] , $survey_answers_alignment_grid_types)) ? 'flex-start' : $settings[ $name_prefix . 'answers_view_alignment' ];

        // Answer object-fit
        $settings[ $name_prefix . 'answers_object_fit' ] = (isset($options[ $name_prefix . 'answers_object_fit' ]) && $options[ $name_prefix . 'answers_object_fit' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'answers_object_fit' ] ) ) : 'cover';
        // Answer object-fit
        $settings[ $name_prefix . 'answers_object_fit_mobile' ] = (isset($options[ $name_prefix . 'answers_object_fit_mobile' ]) && $options[ $name_prefix . 'answers_object_fit_mobile' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'answers_object_fit_mobile' ] ) ) : 'cover';

        // Answer padding
        $settings[ $name_prefix . 'answers_padding' ] = (isset($options[ $name_prefix . 'answers_padding' ]) && $options[ $name_prefix . 'answers_padding' ] != '') ? absint ( intval( $options[ $name_prefix . 'answers_padding' ] ) ) : 8;

        // Answer padding mobile
        $options[ $name_prefix . 'answers_padding_mobile' ] = isset($options[ $name_prefix . 'answers_padding_mobile' ]) ? $options[ $name_prefix . 'answers_padding_mobile' ] : $settings[ $name_prefix . 'answers_padding' ];
        $settings[ $name_prefix . 'answers_padding_mobile' ] = (isset($options[ $name_prefix . 'answers_padding_mobile' ]) && $options[ $name_prefix . 'answers_padding_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'answers_padding_mobile' ] ) ) : 8;

        // Answer Gap
        $settings[ $name_prefix . 'answers_gap' ] = (isset($options[ $name_prefix . 'answers_gap' ]) && $options[ $name_prefix . 'answers_gap' ] != '') ? absint ( intval( $options[ $name_prefix . 'answers_gap' ] ) ) : 0;

        // Answer Gap mobile
        $options[ $name_prefix . 'answers_gap_mobile' ] = isset($options[ $name_prefix . 'answers_gap_mobile' ]) ? $options[ $name_prefix . 'answers_gap_mobile' ] : $options[ $name_prefix . 'answers_gap' ];
        $settings[ $name_prefix . 'answers_gap_mobile' ] = (isset($options[ $name_prefix . 'answers_gap_mobile' ]) && $options[ $name_prefix . 'answers_gap_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'answers_gap_mobile' ] ) ) : 0;

        // Answer image size
        $settings[ $name_prefix . 'answers_image_size' ] = (isset($options[ $name_prefix . 'answers_image_size' ]) && $options[ $name_prefix . 'answers_image_size' ] != '') ? absint ( intval( $options[ $name_prefix . 'answers_image_size' ] ) ) : 195;
        // Answer image size mobile
        $settings[ $name_prefix . 'answers_image_size_mobile' ] = (isset($options[ $name_prefix . 'answers_image_size_mobile' ]) && $options[ $name_prefix . 'answers_image_size_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'answers_image_size_mobile' ] ) ) : 195;


        // =========== Answers Styles End   ===========


        // =========== Buttons Styles Start ===========

        // Buttons background color
        $settings[ $name_prefix . 'buttons_bg_color' ] = (isset($options[ $name_prefix . 'buttons_bg_color' ]) && $options[ $name_prefix . 'buttons_bg_color' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'buttons_bg_color' ] ) ) : '#fff';

        // Buttons size
        $settings[ $name_prefix . 'buttons_size' ] = (isset($options[ $name_prefix . 'buttons_size' ]) && $options[ $name_prefix . 'buttons_size' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'buttons_size' ] ) ) : 'medium';

        // Buttons font size
        $settings[ $name_prefix . 'buttons_font_size' ] = (isset($options[ $name_prefix . 'buttons_font_size' ]) && $options[ $name_prefix . 'buttons_font_size' ] != '') ? absint ( intval( $options[ $name_prefix . 'buttons_font_size' ] ) ) : 14;

        // Buttons mobile font size
        $settings[ $name_prefix . 'buttons_mobile_font_size' ] = (isset($options[ $name_prefix . 'buttons_mobile_font_size' ]) && $options[ $name_prefix . 'buttons_mobile_font_size' ] != '') ? absint ( intval( $options[ $name_prefix . 'buttons_mobile_font_size' ] ) ) : $settings[ $name_prefix . 'buttons_font_size' ];

        // Buttons Left / Right padding
        $settings[ $name_prefix . 'buttons_left_right_padding' ] = (isset($options[ $name_prefix . 'buttons_left_right_padding' ]) && $options[ $name_prefix . 'buttons_left_right_padding' ] != '') ? absint ( intval( $options[ $name_prefix . 'buttons_left_right_padding' ] ) ) : 24;

        // Buttons Top / Bottom padding
        $settings[ $name_prefix . 'buttons_top_bottom_padding' ] = (isset($options[ $name_prefix . 'buttons_top_bottom_padding' ]) && $options[ $name_prefix . 'buttons_top_bottom_padding' ] != '') ? absint ( intval( $options[ $name_prefix . 'buttons_top_bottom_padding' ] ) ) : 0;

        // Buttons border radius
        $settings[ $name_prefix . 'buttons_border_radius' ] = (isset($options[ $name_prefix . 'buttons_border_radius' ]) && $options[ $name_prefix . 'buttons_border_radius' ] != '') ? absint ( intval( $options[ $name_prefix . 'buttons_border_radius' ] ) ) : 4;
        // Buttons border radius mobile
        $options[ $name_prefix . 'buttons_border_radius_mobile' ] = isset($options[ $name_prefix . 'buttons_border_radius_mobile' ]) ? $options[ $name_prefix . 'buttons_border_radius_mobile' ] : $settings[ $name_prefix . 'buttons_border_radius' ];
        $settings[ $name_prefix . 'buttons_border_radius_mobile' ] = (isset($options[ $name_prefix . 'buttons_border_radius_mobile' ]) && $options[ $name_prefix . 'buttons_border_radius_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'buttons_border_radius_mobile' ] ) ) : 4;
        
        // Buttons alignment
        $settings[ $name_prefix . 'buttons_alignment' ] = (isset($options[ $name_prefix . 'buttons_alignment' ]) && $options[ $name_prefix . 'buttons_alignment' ] != '') ? esc_attr( $options[ $name_prefix . 'buttons_alignment' ] )  : 'left';
        // Buttons alignment mobile
        $options[ $name_prefix . 'buttons_alignment_mobile' ] = isset($options[ $name_prefix . 'buttons_alignment_mobile' ]) ? $options[ $name_prefix . 'buttons_alignment_mobile' ] : $settings[ $name_prefix . 'buttons_alignment' ];
        $settings[ $name_prefix . 'buttons_alignment_mobile' ] = (isset($options[ $name_prefix . 'buttons_alignment_mobile' ]) && $options[ $name_prefix . 'buttons_alignment_mobile' ] != '') ? esc_attr( $options[ $name_prefix . 'buttons_alignment_mobile' ] )  : 'left';

        // Buttons top distance
        $settings[ $name_prefix . 'buttons_top_distance' ] = (isset($options[ $name_prefix . 'buttons_top_distance' ]) && $options[ $name_prefix . 'buttons_top_distance' ] != '') ?  absint ( intval( $options[ $name_prefix . 'buttons_top_distance' ] ) ) : 10;        
        // Buttons top distance mobile
        $options[ $name_prefix . 'buttons_top_distance_mobile' ] = isset($options[ $name_prefix . 'buttons_top_distance_mobile' ]) ? $options[ $name_prefix . 'buttons_top_distance_mobile' ] : $settings[ $name_prefix . 'buttons_top_distance' ];
        $settings[ $name_prefix . 'buttons_top_distance_mobile' ] = (isset($options[ $name_prefix . 'buttons_top_distance_mobile' ]) && $options[ $name_prefix . 'buttons_top_distance_mobile' ] != '') ?  absint ( intval( $options[ $name_prefix . 'buttons_top_distance_mobile' ] ) ) : 10;        

        // Buttons text letter spacing
        $settings[ $name_prefix . 'buttons_text_letter_spacing' ] = (isset( $options[ $name_prefix . 'buttons_text_letter_spacing' ] ) && $options[ $name_prefix . 'buttons_text_letter_spacing' ] != '' && $options[ $name_prefix . 'buttons_text_letter_spacing' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'buttons_text_letter_spacing' ] ) : 0;

        // Buttons text letter spacing mobile
        $options[ $name_prefix . 'buttons_text_letter_spacing_mobile' ] = isset( $options[ $name_prefix . 'buttons_text_letter_spacing_mobile' ] ) ? $options[ $name_prefix . 'buttons_text_letter_spacing_mobile' ] : $settings[ $name_prefix . 'buttons_text_letter_spacing' ];
        $settings[ $name_prefix . 'buttons_text_letter_spacing_mobile' ] = (isset( $options[ $name_prefix . 'buttons_text_letter_spacing_mobile' ] ) && $options[ $name_prefix . 'buttons_text_letter_spacing_mobile' ] != '' && $options[ $name_prefix . 'buttons_text_letter_spacing_mobile' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'buttons_text_letter_spacing_mobile' ] ) : 0;

        // ===========  Buttons Styles End  ===========


        // =============================================================
        // ======================    Styles Tab    =====================
        // ========================     END     ========================


        // =======================  //  ======================= // ======================= // ======================= // ======================= //

        // =============================================================
        // =====================  Start page Tab  ======================
        // ========================    START   =========================

        
            // Enable start page
            $options[ $name_prefix . 'enable_start_page' ] = isset($options[ $name_prefix . 'enable_start_page' ]) ? $options[ $name_prefix . 'enable_start_page' ] : 'off';
            $settings[ $name_prefix . 'enable_start_page' ] = (isset($options[ $name_prefix . 'enable_start_page' ]) && $options[ $name_prefix . 'enable_start_page' ] == 'on') ? true : false;

            // Start page title
            $settings[ $name_prefix . 'start_page_title' ]  = (isset($options[ $name_prefix . 'start_page_title' ]) &&  $options[ $name_prefix . 'start_page_title' ] != '') ? stripslashes( $options[ $name_prefix . 'start_page_title' ] ) : '';

            // Start page title position
            $settings[ $name_prefix . 'start_page_title_pos' ] = (isset($options[ $name_prefix . 'start_page_title_pos' ]) &&  $options[ $name_prefix . 'start_page_title_pos' ] != '') ? stripslashes( $options[ $name_prefix . 'start_page_title_pos' ] )  : 'center';
            // Start button position mobile
            $options[ $name_prefix . 'start_page_title_pos_mobile' ] = isset($options[ $name_prefix . 'start_page_title_pos_mobile' ]) ? $options[ $name_prefix . 'start_page_title_pos_mobile' ] : $settings[ $name_prefix . 'start_page_title_pos' ];
            $settings[ $name_prefix . 'start_page_title_pos_mobile' ] = (isset($options[ $name_prefix . 'start_page_title_pos_mobile' ]) &&  $options[ $name_prefix . 'start_page_title_pos_mobile' ] != '') ? stripslashes( $options[ $name_prefix . 'start_page_title_pos_mobile' ] )  : 'center';

            // Start page description
            $settings[ $name_prefix . 'start_page_description' ]  = (isset($options[ $name_prefix . 'start_page_description' ]) &&  $options[ $name_prefix . 'start_page_description' ] != '') ? stripslashes( wpautop( $options[ $name_prefix . 'start_page_description' ] ) ) : '';

            // Start button position
            $settings[ $name_prefix . 'start_page_button_pos' ] = (isset($options[ $name_prefix . 'start_page_button_pos' ]) &&  $options[ $name_prefix . 'start_page_button_pos' ] != '') ? stripslashes( $options[ $name_prefix . 'start_page_button_pos' ] )  : 'left';
            // Start button position mobile
            $options[ $name_prefix . 'start_page_button_pos_mobile' ] = isset($options[ $name_prefix . 'start_page_button_pos_mobile' ]) ? $options[ $name_prefix . 'start_page_button_pos_mobile' ] : $settings[ $name_prefix . 'start_page_button_pos' ];
            $settings[ $name_prefix . 'start_page_button_pos_mobile' ] = (isset($options[ $name_prefix . 'start_page_button_pos_mobile' ]) &&  $options[ $name_prefix . 'start_page_button_pos_mobile' ] != '') ? stripslashes( $options[ $name_prefix . 'start_page_button_pos_mobile' ] )  : 'left';

            // Start page Background color
            $settings[ $name_prefix . 'start_page_background_color' ] = (isset($options[ $name_prefix . 'start_page_background_color' ]) && $options[ $name_prefix . 'start_page_background_color' ] != '') ? stripslashes ( sanitize_text_field( $options[ $name_prefix . 'start_page_background_color' ] ) ) : '#fff';

            // Start page Text Color
            $settings[ $name_prefix . 'start_page_text_color' ] = (isset($options[ $name_prefix . 'start_page_text_color' ]) && $options[ $name_prefix . 'start_page_text_color' ] != '') ? stripslashes ( sanitize_text_field( $options[ $name_prefix . 'start_page_text_color' ] ) ) : '#333';

            // Custom class for Start page container
            $settings[ $name_prefix . 'start_page_custom_class' ] = (isset($options[ $name_prefix . 'start_page_custom_class' ]) && $options[ $name_prefix . 'start_page_custom_class' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'start_page_custom_class' ] ) ) : '';


        // =============================================================
        // =====================  Start page Tab  ======================
        // ========================     END     ========================


        // =============================================================
        // ======================  Settings Tab  =======================
        // ========================    START   =========================

        // Show survey title
        $options[ $name_prefix . 'show_title' ] = isset($options[ $name_prefix . 'show_title' ]) ? $options[ $name_prefix . 'show_title' ] : 'on';
        $settings[ $name_prefix . 'show_title' ] = (isset($options[ $name_prefix . 'show_title' ]) && $options[ $name_prefix . 'show_title' ] == 'on') ? true : false;

        // Show survey section header
        $options[ $name_prefix . 'show_section_header' ] = isset($options[ $name_prefix . 'show_section_header' ]) ? $options[ $name_prefix . 'show_section_header' ] : 'on';
        $settings[ $name_prefix . 'show_section_header' ] = (isset($options[ $name_prefix . 'show_section_header' ]) && $options[ $name_prefix . 'show_section_header' ] == 'on') ? true : false;

        // Enable randomize answers
        $options[ $name_prefix . 'enable_randomize_answers' ] = isset($options[ $name_prefix . 'enable_randomize_answers' ]) ? $options[ $name_prefix . 'enable_randomize_answers' ] : 'off';
        $settings[ $name_prefix . 'enable_randomize_answers' ] = (isset($options[ $name_prefix . 'enable_randomize_answers' ]) && $options[ $name_prefix . 'enable_randomize_answers' ] == 'on') ? true : false;

        // Enable randomize questions
        $options[ $name_prefix . 'enable_randomize_questions' ] = isset($options[ $name_prefix . 'enable_randomize_questions' ]) ? $options[ $name_prefix . 'enable_randomize_questions' ] : 'off';
        $settings[ $name_prefix . 'enable_randomize_questions' ] = (isset($options[ $name_prefix . 'enable_randomize_questions' ]) && $options[ $name_prefix . 'enable_randomize_questions' ] == 'on') ? true : false;

        // Enable rtl direction
        $options[ $name_prefix . 'enable_rtl_direction' ] = isset($options[ $name_prefix . 'enable_rtl_direction' ]) ? $options[ $name_prefix . 'enable_rtl_direction' ] : 'off';
        $settings[ $name_prefix . 'enable_rtl_direction' ] = (isset($options[ $name_prefix . 'enable_rtl_direction' ]) && $options[ $name_prefix . 'enable_rtl_direction' ] == 'on') ? true : false;

        // Enable clear answer button
        $options[ $name_prefix . 'enable_clear_answer' ] = isset($options[ $name_prefix . 'enable_clear_answer' ]) ? $options[ $name_prefix . 'enable_clear_answer' ] : 'off';
        $settings[ $name_prefix . 'enable_clear_answer' ] = (isset($options[ $name_prefix . 'enable_clear_answer' ]) && $options[ $name_prefix . 'enable_clear_answer' ] == 'on') ? true : false;

        // Enable previous button
        $options[ $name_prefix . 'enable_previous_button' ] = isset($options[ $name_prefix . 'enable_previous_button' ]) ? $options[ $name_prefix . 'enable_previous_button' ] : 'off';
        $settings[ $name_prefix . 'enable_previous_button' ] = (isset($options[ $name_prefix . 'enable_previous_button' ]) && $options[ $name_prefix . 'enable_previous_button' ] == 'on') ? true : false;

        // Disable next button
        $options[ $name_prefix . 'disable_next_button' ] = isset($options[ $name_prefix . 'disable_next_button' ]) ? $options[ $name_prefix . 'disable_next_button' ] : 'off';
        $settings[ $name_prefix . 'disable_next_button' ] = (isset($options[ $name_prefix . 'disable_next_button' ]) && $options[ $name_prefix . 'disable_next_button' ] == 'on') ? true : false;

        // Enable Survey Start loader
        $options[ $name_prefix . 'enable_survey_start_loader' ] = isset($options[ $name_prefix . 'enable_survey_start_loader' ]) ? $options[ $name_prefix . 'enable_survey_start_loader' ] : 'on';
        $settings[ $name_prefix . 'enable_survey_start_loader' ] = (isset($options[ $name_prefix . 'enable_survey_start_loader' ]) && $options[ $name_prefix . 'enable_survey_start_loader' ] == 'on') ? true : false;
        $settings[ $name_prefix . 'before_start_loader' ] = (isset($options[ $name_prefix . 'before_start_loader' ]) && $options[ $name_prefix . 'before_start_loader' ] != '') ? stripslashes ( sanitize_text_field( $options[ $name_prefix . 'before_start_loader' ] ) ) : 'default';

        // Allow HTML in answers
        $options[ $name_prefix . 'allow_html_in_answers' ] = isset($options[ $name_prefix . 'allow_html_in_answers' ]) ? $options[ $name_prefix . 'allow_html_in_answers' ] : 'off';
        $settings[ $name_prefix . 'allow_html_in_answers' ] = (isset($options[ $name_prefix . 'allow_html_in_answers' ]) && $options[ $name_prefix . 'allow_html_in_answers' ] == 'on') ? true : false;

        //---- Schedule Start  ---- //

            // Schedule the Survey
            $options[ $name_prefix . 'enable_schedule' ] = isset($options[ $name_prefix . 'enable_schedule' ]) ? $options[ $name_prefix . 'enable_schedule' ] : 'off';
            $settings[ $name_prefix . 'enable_schedule' ] = (isset($options[ $name_prefix . 'enable_schedule' ]) && $options[ $name_prefix . 'enable_schedule' ] == 'on') ? true : false;

            if ( $settings[ $name_prefix . 'enable_schedule' ] ) {
                $activateTimeVal = (isset($options[ $name_prefix . 'schedule_active' ]) && $options[ $name_prefix . 'schedule_active' ] != '') ? stripslashes ( sanitize_text_field( $options[ $name_prefix . 'schedule_active' ] ) ) : current_time( 'mysql' );
                $deactivateTimeVal = (isset($options[ $name_prefix . 'schedule_deactive' ]) && $options[ $name_prefix . 'schedule_deactive' ] != '') ? stripslashes ( sanitize_text_field( $options[ $name_prefix . 'schedule_deactive' ] ) ) : current_time( 'mysql' );

                $activateTime = strtotime($activateTimeVal);
                $settings[ $name_prefix . 'schedule_active' ] = date('Y-m-d H:i:s', $activateTime);

                $deactivateTime = strtotime($deactivateTimeVal);
                $settings[ $name_prefix . 'schedule_deactive' ] = date('Y-m-d H:i:s', $deactivateTime);
            } else {
                $settings[ $name_prefix . 'schedule_active' ] = current_time( 'mysql' );
                $settings[ $name_prefix . 'schedule_deactive' ] = current_time( 'mysql' );
            }

            // Show timer
            $options[ $name_prefix . 'schedule_show_timer' ] = isset($options[ $name_prefix . 'schedule_show_timer' ]) ? $options[ $name_prefix . 'schedule_show_timer' ] : 'off';
            $settings[ $name_prefix . 'schedule_show_timer' ] = (isset($options[ $name_prefix . 'schedule_show_timer' ]) && $options[ $name_prefix . 'schedule_show_timer' ] == 'on') ? true : false;

            // Show countdown / start date
            $settings[ $name_prefix . 'show_timer_type' ] = (isset($options[ $name_prefix . 'show_timer_type' ]) && $options[ $name_prefix . 'show_timer_type' ] != '') ? stripslashes ( sanitize_text_field( $options[ $name_prefix . 'show_timer_type' ] ) ) : 'countdown';

            // Pre start message
            $settings[ $name_prefix . 'schedule_pre_start_message' ] = (isset($options[ $name_prefix . 'schedule_pre_start_message' ]) &&  $options[ $name_prefix . 'schedule_pre_start_message' ] != '') ? stripslashes( wpautop( $options[ $name_prefix . 'schedule_pre_start_message' ] ) ) : __("The survey will be available soon!", "survey-maker");

            // Expiration message
            $settings[ $name_prefix . 'schedule_expiration_message' ] = (isset($options[ $name_prefix . 'schedule_expiration_message' ]) &&  $options[ $name_prefix . 'schedule_expiration_message' ] != '') ? stripslashes( wpautop( $options[ $name_prefix . 'schedule_expiration_message' ] ) ) : __("This survey has expired!", "survey-maker");

            // Expiration message
            $settings[ $name_prefix . 'dont_show_survey_container' ] = (isset($options[ $name_prefix . 'dont_show_survey_container' ]) && $options[ $name_prefix . 'dont_show_survey_container' ] == 'on') ? true : false;
        //---- Schedule End  ---- //

        // ---- Buttons settings Start  ---- //
            // Finish button text
            $settings[ $name_prefix . 'finish_button_each_text' ] = (isset($options[ $name_prefix . 'finish_button_each_text' ]) && $options[ $name_prefix . 'finish_button_each_text' ] != '') ? stripslashes( esc_attr($options[ $name_prefix . 'finish_button_each_text' ]) ) : '';            
            // Next button text
            $settings[ $name_prefix . 'next_button_each_text' ] = (isset($options[ $name_prefix . 'next_button_each_text' ]) && $options[ $name_prefix . 'next_button_each_text' ] != '') ? stripslashes( esc_attr($options[ $name_prefix . 'next_button_each_text' ]) ) : '';            
            // Previous button text
            $settings[ $name_prefix . 'previous_button_each_text' ] = (isset($options[ $name_prefix . 'previous_button_each_text' ]) && $options[ $name_prefix . 'previous_button_each_text' ] != '') ? stripslashes( esc_attr($options[ $name_prefix . 'previous_button_each_text' ]) ) : '';            
            // Restart button text
            $settings[ $name_prefix . 'restart_button_each_text' ] = (isset($options[ $name_prefix . 'restart_button_each_text' ]) && $options[ $name_prefix . 'restart_button_each_text' ] != '') ? stripslashes( esc_attr($options[ $name_prefix . 'restart_button_each_text' ]) ) : '';            
            // Exit button text
            $settings[ $name_prefix . 'exit_button_each_text' ] = (isset($options[ $name_prefix . 'exit_button_each_text' ]) && $options[ $name_prefix . 'exit_button_each_text' ] != '') ? stripslashes( esc_attr($options[ $name_prefix . 'exit_button_each_text' ]) ) : '';            
            // Clear selection button text
            $settings[ $name_prefix . 'clear_selection_button_each_text' ] = (isset($options[ $name_prefix . 'clear_selection_button_each_text' ]) && $options[ $name_prefix . 'clear_selection_button_each_text' ] != '') ? stripslashes( esc_attr($options[ $name_prefix . 'clear_selection_button_each_text' ]) ) : '';            
            // Start button text
            $settings[ $name_prefix . 'start_button_each_text' ] = (isset($options[ $name_prefix . 'start_button_each_text' ]) && $options[ $name_prefix . 'start_button_each_text' ] != '') ? stripslashes( esc_attr($options[ $name_prefix . 'start_button_each_text' ]) ) : '';            
            // Login button text
            $settings[ $name_prefix . 'login_button_each_text' ] = (isset($options[ $name_prefix . 'login_button_each_text' ]) && $options[ $name_prefix . 'login_button_each_text' ] != '') ? stripslashes( esc_attr($options[ $name_prefix . 'login_button_each_text' ]) ) : '';            
        // ---- Buttons settings End  ---- //

        // Allow HTML in section description
        $options[ $name_prefix . 'allow_html_in_section_description' ] = isset($options[ $name_prefix . 'allow_html_in_section_description' ]) ? $options[ $name_prefix . 'allow_html_in_section_description' ] : 'off';
        $settings[ $name_prefix . 'allow_html_in_section_description' ] = (isset($options[ $name_prefix . 'allow_html_in_section_description' ]) && $options[ $name_prefix . 'allow_html_in_section_description' ] == 'on') ? true : false;

        // Enable confirmation box for leaving the page
        $options[ $name_prefix . 'enable_leave_page' ] = isset($options[ $name_prefix . 'enable_leave_page' ]) ? $options[ $name_prefix . 'enable_leave_page' ] : 'on';
        $settings[ $name_prefix . 'enable_leave_page' ] = (isset($options[ $name_prefix . 'enable_leave_page' ]) && $options[ $name_prefix . 'enable_leave_page' ] == 'on') ? true : false;

        // Full screen mode
        $settings[ $name_prefix . 'full_screen_mode' ] = ( isset( $options[ $name_prefix . 'full_screen_mode' ] ) && $options[ $name_prefix . 'full_screen_mode' ] == "on" ) ? true : false;
        $options[ $name_prefix . 'full_screen_button_color' ] = isset($options[ $name_prefix . 'full_screen_button_color' ]) ? $options[ $name_prefix . 'full_screen_button_color' ] : $options[ $name_prefix . 'text_color' ];
        $settings[ $name_prefix . 'full_screen_button_color' ] = (isset($options[ $name_prefix . 'full_screen_button_color' ]) && $options[ $name_prefix . 'full_screen_button_color' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'full_screen_button_color' ] ) ) : '#fff';

        // Survey progress bar
        $settings[ $name_prefix . 'enable_progress_bar' ] = ( isset( $options[ $name_prefix . 'enable_progress_bar' ] ) && $options[ $name_prefix . 'enable_progress_bar' ] == "on" ) ? "on" : "off";
        $settings[ $name_prefix . 'hide_section_pagination_text' ] = ( isset( $options[ $name_prefix . 'hide_section_pagination_text' ] ) && $options[ $name_prefix . 'hide_section_pagination_text' ] == "on" ) ? true : false;
        $settings[ $name_prefix . 'pagination_positioning' ] = ( isset( $options[ $name_prefix . 'pagination_positioning' ] ) && $options[ $name_prefix . 'pagination_positioning' ] != "" ) ? esc_attr($options[ $name_prefix . 'pagination_positioning' ]) : "none";
        $options[ $name_prefix . 'pagination_positioning_mobile' ] = isset($options[ $name_prefix . 'pagination_positioning_mobile' ]) ? $options[ $name_prefix . 'pagination_positioning_mobile' ] : $settings[ $name_prefix . 'pagination_positioning' ];
        $settings[ $name_prefix . 'pagination_positioning_mobile' ] = ( isset( $options[ $name_prefix . 'pagination_positioning_mobile' ] ) && $options[ $name_prefix . 'pagination_positioning_mobile' ] != "" ) ? esc_attr($options[ $name_prefix . 'pagination_positioning_mobile' ]) : "none";
        $settings[ $name_prefix . 'hide_section_bar' ] = ( isset( $options[ $name_prefix . 'hide_section_bar' ] ) && $options[ $name_prefix . 'hide_section_bar' ] == "on" ) ? true : false;
        $settings[ $name_prefix . 'progress_bar_text' ] = ( isset( $options[ $name_prefix . 'progress_bar_text' ] ) && $options[ $name_prefix . 'progress_bar_text' ] != "" ) ? stripslashes(esc_attr($options[ $name_prefix . 'progress_bar_text' ])) : 'Page';
        $settings[ $name_prefix . 'progress_bar_text_letter_spacing' ] = (isset( $options[ $name_prefix . 'progress_bar_text_letter_spacing' ] ) && $options[ $name_prefix . 'progress_bar_text_letter_spacing' ] != '' && $options[ $name_prefix . 'progress_bar_text_letter_spacing' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'progress_bar_text_letter_spacing' ] ) : 0;

        $options[ $name_prefix . 'progress_bar_text_letter_spacing_mobile' ] = !isset( $options[ $name_prefix . 'progress_bar_text_letter_spacing_mobile' ] ) ? $settings[ $name_prefix . 'progress_bar_text_letter_spacing' ] : $options[ $name_prefix . 'progress_bar_text_letter_spacing_mobile' ];
        $settings[ $name_prefix . 'progress_bar_text_letter_spacing_mobile' ] = (isset( $options[ $name_prefix . 'progress_bar_text_letter_spacing_mobile' ] ) && $options[ $name_prefix . 'progress_bar_text_letter_spacing_mobile' ] != '' && $options[ $name_prefix . 'progress_bar_text_letter_spacing_mobile' ] != '0' ) ? esc_attr( $options[ $name_prefix . 'progress_bar_text_letter_spacing_mobile' ] ) : 0;

        $options[ $name_prefix . 'pagination_text_color' ] = isset($options[ $name_prefix . 'pagination_text_color' ]) ? $options[ $name_prefix . 'pagination_text_color' ] : $options[ $name_prefix . 'text_color' ];
        $settings[ $name_prefix . 'pagination_text_color' ] = (isset($options[ $name_prefix . 'pagination_text_color' ]) && $options[ $name_prefix . 'pagination_text_color' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'pagination_text_color' ] ) ) : '#fff';
        $options[ $name_prefix . 'pagination_text_color_mobile' ] = isset($options[ $name_prefix . 'pagination_text_color_mobile' ]) ? $options[ $name_prefix . 'pagination_text_color_mobile' ] : $settings[ $name_prefix . 'pagination_text_color' ];
        $settings[ $name_prefix . 'pagination_text_color_mobile' ] = (isset($options[ $name_prefix . 'pagination_text_color_mobile' ]) && $options[ $name_prefix . 'pagination_text_color_mobile' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'pagination_text_color_mobile' ] ) ) : '#fff';
        $options[ $name_prefix . 'progress_bar_text_font_size' ] = isset($options[ $name_prefix . 'progress_bar_text_font_size' ]) ? $options[ $name_prefix . 'progress_bar_text_font_size' ] : $options[ $name_prefix . 'answer_font_size' ];
        $settings[ $name_prefix . 'progress_bar_text_font_size' ] = (isset($options[ $name_prefix . 'progress_bar_text_font_size' ]) && $options[ $name_prefix . 'progress_bar_text_font_size' ] != '') ? absint ( intval( $options[ $name_prefix . 'progress_bar_text_font_size' ] ) ) : 15;
        $options[ $name_prefix . 'progress_bar_text_font_size_on_mobile' ] = isset($options[ $name_prefix . 'progress_bar_text_font_size_on_mobile' ]) ? $options[ $name_prefix . 'progress_bar_text_font_size_on_mobile' ] : $settings[ $name_prefix . 'progress_bar_text_font_size' ];
        $settings[ $name_prefix . 'progress_bar_text_font_size_on_mobile' ] = (isset($options[ $name_prefix . 'progress_bar_text_font_size_on_mobile' ]) && $options[ $name_prefix . 'progress_bar_text_font_size_on_mobile' ] != '') ? absint ( intval( $options[ $name_prefix . 'progress_bar_text_font_size_on_mobile' ] ) ) : 15;
        $settings[ $name_prefix . 'progress_bar_text_transform' ] = (isset($options[ $name_prefix . 'progress_bar_text_transform' ]) && $options[ $name_prefix . 'progress_bar_text_transform' ] != '') ? esc_attr( $options[ $name_prefix . 'progress_bar_text_transform' ] )  : 'none';
        $options[ $name_prefix . 'progress_bar_text_transform_mobile' ] = isset($options[ $name_prefix . 'progress_bar_text_transform_mobile' ]) ? $options[ $name_prefix . 'progress_bar_text_transform_mobile' ] : $settings[ $name_prefix . 'progress_bar_text_transform' ];
        $settings[ $name_prefix . 'progress_bar_text_transform_mobile' ] = (isset($options[ $name_prefix . 'progress_bar_text_transform_mobile' ]) && $options[ $name_prefix . 'progress_bar_text_transform_mobile' ] != '') ? esc_attr( $options[ $name_prefix . 'progress_bar_text_transform_mobile' ] )  : 'none';

        // Survey show sections questions count
        $options[ $name_prefix . 'show_sections_questions_count' ] = ( isset( $options[ $name_prefix . 'show_sections_questions_count' ] ) ) ? $options[ $name_prefix . 'show_sections_questions_count' ] : "off";
        $settings[ $name_prefix . 'show_sections_questions_count' ] = ( isset( $options[ $name_prefix . 'show_sections_questions_count' ] ) && $options[ $name_prefix . 'show_sections_questions_count' ] == "on" ) ? true : false;
        
        // Survey required questions message
        $options[ $name_prefix . 'required_questions_message' ] = ( isset( $options[ $name_prefix . 'required_questions_message' ] ) ) ? $options[ $name_prefix . 'required_questions_message' ] : "This is a required question";
        $settings[ $name_prefix . 'required_questions_message' ] = ( isset( $options[ $name_prefix . 'required_questions_message' ] ) && $options[ $name_prefix . 'required_questions_message' ] != "" ) ? stripslashes(esc_attr($options[ $name_prefix . 'required_questions_message' ])) : '';
        
        // Auto numbering questions
        $settings[ $name_prefix . 'auto_numbering_questions' ] = (isset($options[ $name_prefix . 'auto_numbering_questions' ]) &&  $options[ $name_prefix . 'auto_numbering_questions' ] != '') ? stripslashes( $options[ $name_prefix . 'auto_numbering_questions' ] )  : 'none';

        // =============================================================
        // =================== Results Settings Tab  ===================
        // ========================    START   =========================


        // Redirect after submit
        $options[ $name_prefix . 'redirect_after_submit' ] = isset($options[ $name_prefix . 'redirect_after_submit' ]) ? $options[ $name_prefix . 'redirect_after_submit' ] : 'off';
        $settings[ $name_prefix . 'redirect_after_submit' ] = (isset($options[ $name_prefix . 'redirect_after_submit' ]) && $options[ $name_prefix . 'redirect_after_submit' ] == 'on') ? true : false;

        // Redirect URL
        $settings[ $name_prefix . 'submit_redirect_url' ] = (isset($options[ $name_prefix . 'submit_redirect_url' ]) && $options[ $name_prefix . 'submit_redirect_url' ] != '') ? stripslashes ( esc_url( $options[ $name_prefix . 'submit_redirect_url' ] ) ) : '';

        // Redirect delay (sec)
        $settings[ $name_prefix . 'submit_redirect_delay' ] = (isset($options[ $name_prefix . 'submit_redirect_delay' ]) && $options[ $name_prefix . 'submit_redirect_delay' ] != '') ? absint ( intval( $options[ $name_prefix . 'submit_redirect_delay' ] ) ) : '';

        // Redirect in new tab
        $settings[ $name_prefix . 'submit_redirect_new_tab' ] = (isset($options[ $name_prefix . 'submit_redirect_new_tab' ]) && $options[ $name_prefix . 'submit_redirect_new_tab' ] == 'on') ? true : false;

        // Enable EXIT button
        $options[ $name_prefix . 'enable_exit_button' ] = isset($options[ $name_prefix . 'enable_exit_button' ]) ? $options[ $name_prefix . 'enable_exit_button' ] : 'off';
        $settings[ $name_prefix . 'enable_exit_button' ] = (isset($options[ $name_prefix . 'enable_exit_button' ]) && $options[ $name_prefix . 'enable_exit_button' ] == 'on') ? true : false;

        // Redirect URL
        $settings[ $name_prefix . 'exit_redirect_url' ] = (isset($options[ $name_prefix . 'exit_redirect_url' ]) && $options[ $name_prefix . 'exit_redirect_url' ] != '') ? stripslashes ( esc_url( $options[ $name_prefix . 'exit_redirect_url' ] ) ) : '';

        // Enable EXIT button
        $options[ $name_prefix . 'enable_restart_button' ] = isset($options[ $name_prefix . 'enable_restart_button' ]) ? $options[ $name_prefix . 'enable_restart_button' ] : 'off';
        $settings[ $name_prefix . 'enable_restart_button' ] = (isset($options[ $name_prefix . 'enable_restart_button' ]) && $options[ $name_prefix . 'enable_restart_button' ] == 'on') ? true : false;

        // Thank you message
        $settings[ $name_prefix . 'final_result_text' ]  = (isset($options[ $name_prefix . 'final_result_text' ]) &&  $options[ $name_prefix . 'final_result_text' ] != '') ? stripslashes( wpautop( $options[ $name_prefix . 'final_result_text' ] ) ) : '';

        // Select survey loader
        $settings[ $name_prefix . 'loader' ] = (isset($options[ $name_prefix . 'loader' ]) && $options[ $name_prefix . 'loader' ] != '') ? stripslashes ( sanitize_text_field( $options[ $name_prefix . 'loader' ] ) ) : 'default';

        // Social share buttons
        $options[ $name_prefix . 'social_buttons' ]   = ( isset( $options[ $name_prefix . 'social_buttons' ] ) && $options[ $name_prefix . 'social_buttons' ] == 'on' ) ? true : false;
        $settings[ $name_prefix . 'social_buttons' ]  = ( isset( $options[ $name_prefix . 'social_buttons' ] ) && $options[ $name_prefix . 'social_buttons' ] ) ? true : false;
        // Social share buttons heading message
        $settings[ $name_prefix . 'social_buttons_heading' ] = ( isset( $options[ $name_prefix . 'social_buttons_heading' ] ) && $options[ $name_prefix . 'social_buttons_heading' ] != '' ) ? stripslashes( wpautop( $options[ $name_prefix . 'social_buttons_heading' ] ) ) : '';
        // Linkedin
        $options[ $name_prefix . 'social_button_ln' ] = ( isset( $options[ $name_prefix . 'social_button_ln' ] ) && $options[ $name_prefix . 'social_button_ln' ] == 'on' ) ? true : false;
        $settings[ $name_prefix . 'social_button_ln' ] = ( isset( $options[ $name_prefix . 'social_button_ln' ] ) && $options[ $name_prefix . 'social_button_ln' ] == 'on' ) ? true : false;
        // Facebook
        $options[ $name_prefix . 'social_button_fb' ] = ( isset( $options[ $name_prefix . 'social_button_fb' ] ) && $options[ $name_prefix . 'social_button_fb' ] == 'on' ) ? true : false;
        $settings[ $name_prefix . 'social_button_fb' ] = ( isset( $options[ $name_prefix . 'social_button_fb' ] ) && $options[ $name_prefix . 'social_button_fb' ] ) ? true : false;
        // Twitter
        $options[ $name_prefix . 'social_button_tr' ] = ( isset( $options[ $name_prefix . 'social_button_tr' ] ) && $options[ $name_prefix . 'social_button_tr' ] == 'on' ) ? true : false;
        $settings[ $name_prefix . 'social_button_tr' ] = ( isset( $options[ $name_prefix . 'social_button_tr' ] ) && $options[ $name_prefix . 'social_button_tr' ] ) ? true : false;
        // Vk
        $options[ $name_prefix . 'social_button_vk' ] = ( isset( $options[ $name_prefix . 'social_button_vk' ] ) && $options[ $name_prefix . 'social_button_vk' ] == 'on' ) ? true : false;
        $settings[ $name_prefix . 'social_button_vk' ] = ( isset( $options[ $name_prefix . 'social_button_vk' ] ) && $options[ $name_prefix . 'social_button_vk' ] ) ? true : false;

        // =============================================================
        // =================== Results Settings Tab  ===================
        // ========================    END    ==========================



        // =======================  //  ======================= // ======================= // ======================= // ======================= //



        // =============================================================
        // ===================    Limitation Tab     ===================
        // ========================    START   =========================

        // Maximum number of attempts per user
        $options[ $name_prefix . 'limit_users' ] = isset($options[ $name_prefix . 'limit_users' ]) ? $options[ $name_prefix . 'limit_users' ] : 'off';
        $settings[ $name_prefix . 'limit_users' ] = (isset($options[ $name_prefix . 'limit_users' ]) && $options[ $name_prefix . 'limit_users' ] == 'on') ? true : false;

        // Detects users by IP / ID
        $settings[ $name_prefix . 'limit_users_by' ] = (isset($options[ $name_prefix . 'limit_users_by' ]) && $options[ $name_prefix . 'limit_users_by' ] != '') ? stripslashes ( sanitize_text_field( $options[ $name_prefix . 'limit_users_by' ] ) ) : 'ip';

        // Attempts count
        $settings[ $name_prefix . 'max_pass_count' ] = (isset($options[ $name_prefix . 'max_pass_count' ]) && $options[ $name_prefix . 'max_pass_count' ] != '') ? absint ( intval( $options[ $name_prefix . 'max_pass_count' ] ) ) : 1;

        // Limitation Message
        $settings[ $name_prefix . 'limitation_message' ] = (isset($options[ $name_prefix . 'limitation_message' ]) &&  $options[ $name_prefix . 'limitation_message' ] != '') ? stripslashes( wpautop( $options[ $name_prefix . 'limitation_message' ] ) ) : '';

        // Redirect Url
        $settings[ $name_prefix . 'redirect_url' ] = (isset($options[ $name_prefix . 'redirect_url' ]) && $options[ $name_prefix . 'redirect_url' ] != '') ?  $options[ $name_prefix . 'redirect_url' ] : '';
        
        // Redirect delay
        $settings[ $name_prefix . 'redirect_delay' ] = (isset($options[ $name_prefix . 'redirect_delay' ]) && $options[ $name_prefix . 'redirect_delay' ] != '') ? absint ( intval( $options[ $name_prefix . 'redirect_delay' ] ) ) : 1;

        // Only for logged in users
        $options[ $name_prefix . 'enable_logged_users' ] = isset($options[ $name_prefix . 'enable_logged_users' ]) ? $options[ $name_prefix . 'enable_logged_users' ] : 'off';
        $settings[ $name_prefix . 'enable_logged_users' ] = (isset($options[ $name_prefix . 'enable_logged_users' ]) && $options[ $name_prefix . 'enable_logged_users' ] == 'on') ? true : false;

        // Message - Only for logged in users
        $settings[ $name_prefix . 'logged_in_message' ] = (isset($options[ $name_prefix . 'logged_in_message' ]) &&  $options[ $name_prefix . 'logged_in_message' ] != '') ? stripslashes( wpautop( $options[ $name_prefix . 'logged_in_message' ] ) ) : '';

        // Show login form
        $options[ $name_prefix . 'show_login_form' ] = isset($options[ $name_prefix . 'show_login_form' ]) ? $options[ $name_prefix . 'show_login_form' ] : 'off';
        $settings[ $name_prefix . 'show_login_form' ] = (isset($options[ $name_prefix . 'show_login_form' ]) && $options[ $name_prefix . 'show_login_form' ] == 'on') ? true : false;

        // =============================================================
        // ===================    Limitation Tab     ===================
        // ========================    END    ==========================



        // =======================  //  ======================= // ======================= // ======================= // ======================= //



        // =============================================================
        // =====================    E-Mail Tab     =====================
        // ========================    START   =========================


        // Send Mail To User
        $options[ $name_prefix . 'enable_mail_user' ] = isset($options[ $name_prefix . 'enable_mail_user' ]) ? $options[ $name_prefix . 'enable_mail_user' ] : 'off';
        $settings[ $name_prefix . 'enable_mail_user' ] = (isset($options[ $name_prefix . 'enable_mail_user' ]) && $options[ $name_prefix . 'enable_mail_user' ] == 'on') ? true : false;

        // Email message
        $settings[ $name_prefix . 'mail_message' ] = (isset($options[ $name_prefix . 'mail_message' ]) &&  $options[ $name_prefix . 'mail_message' ] != '') ? stripslashes( wpautop( $options[ $name_prefix . 'mail_message' ] ) ) : '';

        // Send email to admin
        $options[ $name_prefix . 'enable_mail_admin' ] = isset($options[ $name_prefix . 'enable_mail_admin' ]) ? $options[ $name_prefix . 'enable_mail_admin' ] : 'off';
        $settings[ $name_prefix . 'enable_mail_admin' ] = (isset($options[ $name_prefix . 'enable_mail_admin' ]) && $options[ $name_prefix . 'enable_mail_admin' ] == 'on') ? true : false;

        // Send email to site admin ( SuperAdmin )
        $options[ $name_prefix . 'send_mail_to_site_admin' ] = isset($options[ $name_prefix . 'send_mail_to_site_admin' ]) ? $options[ $name_prefix . 'send_mail_to_site_admin' ] : 'on';
        $settings[ $name_prefix . 'send_mail_to_site_admin' ] = (isset($options[ $name_prefix . 'send_mail_to_site_admin' ]) && $options[ $name_prefix . 'send_mail_to_site_admin' ] == 'on') ? true : false;

        // Additional emails
        $settings[ $name_prefix . 'additional_emails' ] = (isset($options[ $name_prefix . 'additional_emails' ]) && $options[ $name_prefix . 'additional_emails' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'additional_emails' ] ) ) : '';

        // Email message
        $settings[ $name_prefix . 'mail_message_admin' ] = (isset($options[ $name_prefix . 'mail_message_admin' ]) &&  $options[ $name_prefix . 'mail_message_admin' ] != '') ? stripslashes( wpautop( $options[ $name_prefix . 'mail_message_admin' ] ) ) : '';

        //---- Email configuration Start  ---- //

        // From email 
        $settings[ $name_prefix . 'email_configuration_from_email' ] = (isset($options[ $name_prefix . 'email_configuration_from_email' ]) &&  $options[ $name_prefix . 'email_configuration_from_email' ] != '') ? stripslashes( sanitize_email( $options[ $name_prefix . 'email_configuration_from_email' ] ) ) : '';

        // From name
        $settings[ $name_prefix . 'email_configuration_from_name' ] = (isset($options[ $name_prefix . 'email_configuration_from_name' ]) && $options[ $name_prefix . 'email_configuration_from_name' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'email_configuration_from_name' ] ) ) : '';

        // Subject
        $settings[ $name_prefix . 'email_configuration_from_subject' ] = (isset($options[ $name_prefix . 'email_configuration_from_subject' ]) && $options[ $name_prefix . 'email_configuration_from_subject' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'email_configuration_from_subject' ] ) ) : '';

        // Reply to email
        $settings[ $name_prefix . 'email_configuration_replyto_email' ] = (isset($options[ $name_prefix . 'email_configuration_replyto_email' ]) &&  $options[ $name_prefix . 'email_configuration_replyto_email' ] != '') ? stripslashes( sanitize_email( $options[ $name_prefix . 'email_configuration_replyto_email' ] ) ) : '';

        // Reply to name
        $settings[ $name_prefix . 'email_configuration_replyto_name' ] = (isset($options[ $name_prefix . 'email_configuration_replyto_name' ]) && $options[ $name_prefix . 'email_configuration_replyto_name' ] != '') ? stripslashes ( esc_attr( $options[ $name_prefix . 'email_configuration_replyto_name' ] ) ) : '';

        //---- Email configuration End ---- //


        // =============================================================
        // =====================    E-Mail Tab     =====================
        // ========================    END    ==========================

        //limitation takers count
        $options[ $name_prefix . 'enable_takers_count' ] = (isset( $options[ $name_prefix . 'enable_takers_count' ] ) && $options[ $name_prefix . 'enable_takers_count' ] == 'on') ? stripslashes ( $options[ $name_prefix . 'enable_takers_count' ] ) : 'off';
        $settings[ $name_prefix . 'enable_takers_count' ] = (isset($options[ $name_prefix . 'enable_takers_count' ]) && $options[ $name_prefix . 'enable_takers_count' ] == 'on') ? true : false;

        //Takers Count
        $settings[ $name_prefix . 'takers_count' ] = (isset($options[ $name_prefix . 'takers_count' ]) && $options[ $name_prefix . 'takers_count' ] != '') ? absint ( intval( $options[ $name_prefix . 'takers_count' ] ) ) : 1;

        // Auto numbering
        $settings[ $name_prefix . 'auto_numbering' ] = (isset($options[ $name_prefix . 'auto_numbering' ]) &&  $options[ $name_prefix . 'auto_numbering' ] != '') ? stripslashes( $options[ $name_prefix . 'auto_numbering' ] )  : 'none';

        // Loader custom gif
        $settings[ $name_prefix . 'loader_gif' ] = (isset($options[ $name_prefix . 'loader_gif' ]) &&  $options[ $name_prefix . 'loader_gif' ] != '') ? esc_url( $options[ $name_prefix . 'loader_gif' ] )  : '';
        $settings[ $name_prefix . 'loader_gif_width' ] = (isset($options[ $name_prefix . 'loader_gif_width' ]) &&  $options[ $name_prefix . 'loader_gif_width' ] != '') ? esc_attr( $options[ $name_prefix . 'loader_gif_width' ] )  : '100';


        return $settings;
    }

    public static function get_surveys($ordering = ''){
        global $wpdb;
        $surveys_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "surveys";

        $sql = "SELECT id,title
                FROM {$surveys_table} WHERE `status` = 'published'";


        if($ordering != ''){
            $sql .= ' ORDER BY id '.$ordering;
        }

        $surveys = $wpdb->get_results( $sql , "ARRAY_A" );

        return $surveys;
    }
    
    public static function get_survey_current_column( $survey_id , $column, $status = 'published'){
        global $wpdb;
        $surveys_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "surveys";

        $sql = "SELECT ".sanitize_text_field($column)."
                FROM {$surveys_table} WHERE `id`= ".sanitize_text_field($survey_id)." AND `status` = '".sanitize_text_field($status)."' ";
        $current_column = $wpdb->get_var( $sql );

        return $current_column;
    }

    public static function get_survey_by_id( $id ){
        global $wpdb;
        $surveys_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "surveys";

        $sql = "SELECT *
                FROM {$surveys_table}
                WHERE id=" . esc_sql( absint( $id ) );

        $survey = $wpdb->get_row( $sql );

        return $survey;
    }

    public static function get_survey_category_by_id( $id ){
        global $wpdb;
        $survey_cat_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "survey_categories";

        $sql = "SELECT *
                FROM {$survey_cat_table}
                WHERE id=" . esc_sql( absint( $id ) );

        $category = $wpdb->get_row( $sql );

        return $category;
    }

    public static function get_question_category_by_id( $id ){
        global $wpdb;
        $question_cat_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "question_categories";

        $sql = "SELECT *
                FROM {$question_cat_table}
                WHERE id=" . esc_sql( absint( $id ) );

        $category = $wpdb->get_row( $sql );

        return $category;
    }

    public static function get_question_by_id( $id ){
        global $wpdb;
        $questions_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "questions";
        $answers_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "answers";

        $sql = "SELECT *
                FROM {$questions_table}
                WHERE id=" . esc_sql( absint( $id ) );

        $question = $wpdb->get_row( $sql );

        $sql = "SELECT *
                FROM {$answers_table}
                WHERE question_id=" . esc_sql( absint( $id ) );

        $answers = $wpdb->get_results( $sql );

        $question->answers = $answers;

        return $question;
    }

    public static function get_question_by_ids( $ids ){
        global $wpdb;
        $questions_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "questions";
        $answers_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "answers";

        $qids = esc_sql( implode( ',', $ids ) );

        $sql = "SELECT *
                FROM {$questions_table}
                WHERE id IN (" . esc_sql( $qids ) . ")
                ORDER BY ordering";

        $questions = $wpdb->get_results( $sql );

        foreach ( $questions as $key => &$question ) {

            $sql = "SELECT *
                    FROM {$answers_table}
                    WHERE question_id=" . esc_sql( absint( $question->id ) ) ."
                    ORDER BY ordering";

            $answers = $wpdb->get_results( $sql );

            $question->answers = $answers;

        }

        return $questions;
    }

    public static function get_section_by_id($id){
        global $wpdb;
        $sections_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "sections";

        $sid = esc_sql( absint( $id ) );

        $sql = "SELECT *
                FROM {$sections_table}
                WHERE id={$sid}
                ORDER BY ordering";

        $section = $wpdb->get_row( $sql );

        return $section;
    }

    public static function get_answer_by_id($id){
        global $wpdb;
        $answers_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "answers";

        $sql = "SELECT *
                FROM {$answers_table}
                WHERE id=" . esc_sql( absint( $id ) );

        $answer = $wpdb->get_row( $sql );

        return $answer;
    }

    public static function get_answers_by_question_id($id){
        global $wpdb;
        $answers_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "answers";

        $sql = "SELECT *
                FROM {$answers_table}
                WHERE question_id=" . esc_sql( absint( $id ) ) . "
                ORDER BY ordering";

        $answers = $wpdb->get_results( $sql, 'ARRAY_A' );

        if(! empty($answers) ){
            return $answers;
        }

        return array();
    }

    public static function get_survey_questions_count($id){
        global $wpdb;
        $surveys_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "surveys";

        $sql = "SELECT `questions_count`
                FROM {$surveys_table}
                WHERE id=" . esc_sql( absint( $id ) );

        $questions_str = $wpdb->get_var( $sql );
        $count = intval( $questions_str );

        return $count;
    }

    public static function get_survey_sections_count($id){
        global $wpdb;
        $surveys_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "surveys";

        $sql = "SELECT `sections_count`
                FROM {$surveys_table}
                WHERE id=" . esc_sql( absint( $id ) );

        $sections_str = $wpdb->get_var( $sql );
        $count = intval( $sections_str );

        return $count;
    }

    public static function get_sections_by_survey_id( $ids ) {
        global $wpdb;
        if (empty($ids)) {
            return array();
        }
        $table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "sections";

        $sql = "SELECT * FROM {$table} WHERE `id` IN (" . esc_sql( $ids ) .") ORDER BY `ordering`;";
        $result = $wpdb->get_results( $sql, 'ARRAY_A' );

        if(! empty($result) ){
            return $result;
        }

        return array();
    }

    public static function get_questions_by_section_id( $section_id, $question_ids ) {
        global $wpdb;
        if (empty($question_ids) || empty($section_id)) {
            return array();
        }
        $table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "questions";

        $sql = "SELECT * FROM {$table} WHERE `section_id` = ". absint( $section_id ) ." AND `id` IN (" . esc_sql( $question_ids ) .") ORDER BY ordering;";
        $result = $wpdb->get_results( $sql, 'ARRAY_A' );

        if(! empty($result) ){
            return $result;
        }

        return array();
    }

    public static function get_answers_by_question_id_aro( $question_id ) {
        global $wpdb;
        if (empty($question_id)) {
            return false;
        }
        $table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "answers";

        $sql = "SELECT * FROM {$table} WHERE `question_id` = ". absint( $question_id );
        $result = $wpdb->get_results( $sql, 'ARRAY_A' );

        return $result;
    }

    public static function sort_array_keys_by_array($array, $orderArray) {
        $ordered = array();
        foreach ($orderArray as $key) {
            if (array_key_exists('ays-question-'.$key, $array)) {
                $ordered['ays-question-'.$key] = $array['ays-question-'.$key];
                unset($array['ays-question-'.$key]);
            }
        }
        return $ordered + $array;
    }

    public static function replace_message_variables($content, $data){
        foreach($data as $variable => $value){
            $content = str_replace("%%".$variable."%%", $value, $content);
        }
        return $content;
    }

    public static function question_type_is($question_id){
        global $wpdb;
        $questions_table = $wpdb->prefix . "aysquiz_questions";
        $question_id = absint(intval($question_id));
        $custom_types = array("custom");
        $question_type = $wpdb->get_var("SELECT type FROM {$questions_table} WHERE id=". absint( $question_id ) .";");
        if($question_type == ''){
            $question_type = 'radio';
        }

        if(in_array($question_type, $custom_types)){
            return true;
        }
        return false;
    }

    public static function hex2rgba($color, $opacity = false){

        $default = 'rgb(0,0,0)';

        //Return default if no color provided
        if (empty($color))
            return $default;

        //Sanitize $color if "#" is provided
        if ($color[0] == '#') {
            $color = substr($color, 1);
        }else{
            return $color;
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
        } elseif (strlen($color) == 3) {
            $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
        } else {
            return $default;
        }

        //Convert hexadec to rgb
        $rgb = array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if ($opacity) {
            if (abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
        } else {
            $output = 'rgb(' . implode(",", $rgb) . ')';
        }

        //Return rgb(a) color string
        return $output;
    }

    public static function rgb2hex( $rgba ) {
        if ( strpos( $rgba, '#' ) === 0 ) {
            return $rgba;
        }

        preg_match( '/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i', $rgba, $by_color );
        if(!empty($by_color)){
            return sprintf( '#%02x%02x%02x', $by_color[1], $by_color[2], $by_color[3] );
        }
    }

    public static function secondsToWords($seconds){
        $ret = "";

        $seconds = absint($seconds);

        /*** get the days ***/
        $days = (int)($seconds / 86400);
        if ($days > 0) {
            $ret .= "$days " . __( 'days', "survey-maker" ) . ' ';
        }

        /*** get the hours ***/
        $hours = (int)(($seconds - ($days * 86400)) / 3600);
        if ($hours > 0) {
            $ret .= "$hours " . __( 'hours', "survey-maker" ) . ' ';
        }

        /*** get the minutes ***/
        $minutes = (int)(($seconds - $days * 86400 - $hours * 3600) / 60);
        if ($minutes > 0) {
            $ret .= "$minutes " . __( 'minutes', "survey-maker" ) . ' ';
        }

        /*** get the seconds ***/
        $seconds = (int)($seconds - ($days * 86400) - ($hours * 3600) - ($minutes * 60));
        if ($seconds > 0) {
            $ret .= "$seconds " . __( 'seconds', "survey-maker" );
        }

        return $ret;
    }

    public static function get_limit_user_by_ip($id){
        global $wpdb;
        $table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions" );
        $user_ip = self::get_user_ip();
        $sql = "SELECT COUNT(*)
                FROM `{$table}`
                WHERE `user_ip` = '". esc_sql( $user_ip ) ."'
                  AND `survey_id` = ". absint( $id );
        $result = intval($wpdb->get_var($sql));
        return $result;
    }

    public static function get_limit_user_by_id($survey_id, $user_id){
        global $wpdb;
        $table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions" );
        $sql = "SELECT COUNT(*)
                FROM `{$table}`
                WHERE `user_id` = ". absint( $user_id ) ."
                  AND `survey_id` = ". absint( $survey_id );
        $result = intval($wpdb->get_var($sql));
        return $result;
    }

    public static function get_user_ip(){
        $ipaddress = '';
        if( !empty($_SERVER) && !empty($_SERVER['REMOTE_ADDR']) ){
            $ipaddress = isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] ? sanitize_text_field($_SERVER['REMOTE_ADDR']) : 'UNKNOWN';
        } else {
            if (getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            elseif (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if (getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if (getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if (getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if (getenv('HTTP_FORWARDED'))
                $ipaddress = getenv('HTTP_FORWARDED');
            else
                $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }

    // OLD
    // public static function get_user_ip_validated(){
    //     $ipaddress = '';
    //     if (getenv('REMOTE_ADDR')){
    //         $ipaddress = getenv('REMOTE_ADDR');
    //     }
    //     elseif (getenv('HTTP_CLIENT_IP')){
    //         $ipaddress = getenv('HTTP_CLIENT_IP');
    //     }
    //     else if (getenv('HTTP_X_FORWARDED_FOR')){
    //         $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    //     }
    //     else if (getenv('HTTP_X_FORWARDED')){
    //         $ipaddress = getenv('HTTP_X_FORWARDED');
    //     }
    //     else if (getenv('HTTP_FORWARDED_FOR')){
    //         $ipaddress = getenv('HTTP_FORWARDED_FOR');
    //     }
    //     else if (getenv('HTTP_FORWARDED')){
    //         $ipaddress = getenv('HTTP_FORWARDED');
    //     }
    //     else{
    //         $ipaddress = 'UNKNOWN';
    //     }
    //     // Validate the IP address
    //     if (filter_var($ipaddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6) && $ipaddress !== '0.0.0.0') {
    //         return $ipaddress;
    //     }
    //     return 'UNKNOWN';
        
    // }

    // FOR REVIEW
    public static function get_user_ip_validated(){
        
        if( !empty($_SERVER) && !empty($_SERVER['REMOTE_ADDR']) ){
            $ipaddress = isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] ? sanitize_text_field($_SERVER['REMOTE_ADDR']) : 'UNKNOWN';

            if(!empty($ipaddress) && $ipaddress != 'UNKNOWN' ){
                return $ipaddress;
            }
        }

        $headers_to_check = array(
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        );
    
        foreach ($headers_to_check as $header) {
            if (!empty($_SERVER[$header])) {
                // In case of multiple IPs in HTTP_X_FORWARDED_FOR, take the last one
                if ($header === 'HTTP_X_FORWARDED_FOR') {
                    $ips = explode(',', $_SERVER[$header]);
                    $ip = trim(end($ips));
                } else {
                    $ip = $_SERVER[$header];
                }
    
                // Validate the IP address
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6) && $ip !== '0.0.0.0') {
                    return $ip;
                }
            }
        }
    
        return 'UNKNOWN';
    }

    public static function ays_autoembed( $content ) {
        global $wp_embed;
        $content = stripslashes( wpautop( $content ) );
        $content = $wp_embed->autoembed( $content );
        if ( strpos( $content, '[embed]' ) !== false ) {
            $content = $wp_embed->run_shortcode( $content );
        }
        $content = do_shortcode( $content );
        return $content;
    }

    public static function get_questions_categories($q_ids){
        global $wpdb;

        if($q_ids == ''){
            return array();
        }
        $sql = "SELECT DISTINCT c.id, c.title
                FROM {$wpdb->prefix}aysquiz_categories c
                JOIN {$wpdb->prefix}aysquiz_questions q
                ON c.id = q.category_id
                WHERE q.id IN (". esc_sql( $q_ids ) .")";

        $result = $wpdb->get_results($sql, 'ARRAY_A');
        $cats = array();

        foreach($result as $res){
            $cats[$res['id']] = $res['title'];
        }

        return $cats;
    }

    public static function get_suervey_sections_with_questions( $sections_ids, $question_ids ){
        
        $sections = self::get_sections_by_survey_id($sections_ids);
        $sections_count = count( $sections );
        
        foreach ($sections as $section_key => $section) {
            $sections[$section_key]['title'] = (isset($section['title']) && $section['title'] != '') ? stripslashes( htmlentities( $section['title'] ) ) : '';
            $sections[$section_key]['description'] = (isset($section['description']) && $section['description'] != '') ? stripslashes( htmlentities( $section['description'] ) ) : '';

            $section_questions = self::get_questions_by_section_id( intval( $section['id'] ), $question_ids );

            foreach ($section_questions as $question_key => $question) {
                $section_questions[$question_key]['question'] = (isset($question['question']) && $question['question'] != '') ? stripslashes( $question['question'] ) : '';
                $section_questions[$question_key]['image'] = (isset($question['image']) && $question['image'] != '') ? $question['image'] : '';
                $section_questions[$question_key]['type'] = (isset($question['type']) && $question['type'] != '') ? $question['type'] : 'radio';
                $section_questions[$question_key]['user_variant'] = (isset($question['user_variant']) && $question['user_variant'] == 'on') ? true : false;

                $opts = json_decode( $question['options'], true );
                $opts['required'] = (isset($opts['required']) && $opts['required'] == 'on') ? true : false;

                $q_answers = self::get_answers_by_question_id( intval( $question['id'] ) );

                foreach ($q_answers as $answer_key => $answer) {
                    $q_answers[$answer_key]['answer'] = (isset($answer['answer']) && $answer['answer'] != '') ? stripslashes( $answer['answer'] ) : '';
                    $q_answers[$answer_key]['image'] = (isset($answer['image']) && $answer['image'] != '') ? $answer['image'] : '';
                    $q_answers[$answer_key]['placeholder'] = (isset($answer['placeholder']) && $answer['placeholder'] != '') ? $answer['placeholder'] : '';
                }

                $section_questions[$question_key]['answers'] = $q_answers;

                $section_questions[$question_key]['options'] = $opts;
            }

            $sections[$section_key]['questions'] = $section_questions;
        }
        
        return $sections;
    }

    /**
     * Recursive sanitation for an array
     * 
     * @param $array
     *
     * @return mixed
     */
    public static function recursive_sanitize_text_field( $array, $textareas = array() )  {
        foreach ( $array as $key => &$value ) {
            if ( is_array( $value ) ) {
                $value = self::recursive_sanitize_text_field( $value, $textareas );
            } else {
                if( in_array( $key, $textareas ) ){
                    if( function_exists( 'sanitize_textarea_field' ) ){
                        $value = sanitize_textarea_field( $value );
                    }else{
                        $value = sanitize_text_field( $value );
                    }
                }else{
                    $value = sanitize_text_field( $value );
                }
            }
        }

        return $array;
    }

    public static function get_survey_takers_count( $id ){
        global $wpdb;
        $submission_table = $wpdb->prefix . "ayssurvey_submissions";
        $sql = "SELECT COUNT(id) AS count FROM {$submission_table} WHERE survey_id=". absint( $id ) ;
        $result = absint( $wpdb->get_var( $sql ) );
        
        return $result;
    }
    
    public static function get_setting_data( $meta_key = 'options' ){
        global $wpdb;

        $name_prefix = 'survey_';

        $settings_table = $wpdb->prefix . "ayssurvey_settings";
        $sql = "SELECT meta_value FROM " . $settings_table . " WHERE meta_key = '". esc_sql( $meta_key ) ."'";
        $result = $wpdb->get_var($sql);

        $options = ($result == "") ? array() : json_decode($result, true);

        return $options;
    }

    public static function get_listtables_title_length( $listtable_name ) {
        global $wpdb;

        $options = self::get_setting_data( 'options' );

        $listtable_title_length = 5;
        if(! empty($options) ){
            switch ( $listtable_name ) {
                case 'surveys':
                    $listtable_title_length = (isset($options['survey_title_length']) && intval($options['survey_title_length']) != 0) ? absint(intval($options['survey_title_length'])) : 5;
                    break;
                case 'submissions':
                    $listtable_title_length = (isset($options['survey_submissions_title_length']) && intval($options['survey_submissions_title_length']) != 0) ? absint(intval($options['survey_submissions_title_length'])) : 5;
                    break;
                case 'survey_categories':
                    $listtable_title_length = (isset($options['survey_categories_title_length']) && intval($options['survey_categories_title_length']) != 0) ? absint(intval($options['survey_categories_title_length'])) : 5;
                    break;
                case 'popup_surveys':
                    $listtable_title_length = (isset($options['survey_popups_title_length']) && intval($options['survey_popups_title_length']) != 0) ? absint(intval($options['survey_popups_title_length'])) : 5;
                    break;
                default:
                    $listtable_title_length = 5;
                    break;
            }
            return $listtable_title_length;
        }
        return $listtable_title_length;
    }

    /*
     * Get survey default texts from database
     */
    public static function ays_set_default_texts( $plugin_name, $settings = array() ) {
        global $wpdb;

        $settings_table = $wpdb->prefix . "ayssurvey_settings";
        $sql = "SELECT meta_value FROM " . $settings_table . " WHERE meta_key = 'default_texts'";
        $result = $wpdb->get_var($sql);
        $settings_static_texts = ($result == "") ? array() : json_decode($result, true);

        $wrong_shortcode_text = (isset($settings_static_texts['wrong_shortcode_text']) && $settings_static_texts['wrong_shortcode_text'] != '') ? stripslashes(esc_attr($settings_static_texts['wrong_shortcode_text'])) : 'Wrong shortcode initialized';
        $email_validation_error_text = (isset($settings_static_texts['email_validation_error_text']) && $settings_static_texts['email_validation_error_text'] != '') ? stripslashes(esc_html($settings_static_texts['email_validation_error_text'])) : 'Must be a valid email address';
        $redirecting_after_text      = (isset($settings_static_texts['redirecting_after_text']) && $settings_static_texts['redirecting_after_text'] != '') ? stripslashes( esc_html( $settings_static_texts['redirecting_after_text'] ) ) : 'Redirecting after';

        if ($wrong_shortcode_text === 'Wrong shortcode initialized') {
            $wrong_shortcode_text = __('Wrong shortcode initialized', "survey-maker");
        }

        if ($email_validation_error_text === 'Must be a valid email address') {
            $email_validation_error_text = __('Must be a valid email address', "survey-maker");
        }

        if ($redirecting_after_text === 'Redirecting after') {
            $redirecting_after_text = __('Redirecting after', "survey-maker");
        }

        $texts = array(
            'wrongShortcode'        => $wrong_shortcode_text,
            'emailValidationError'  => $email_validation_error_text,
            'redirectingAfter'      => $redirecting_after_text,
        );

        return $texts;
    }

    public static function ays_set_survey_texts( $plugin_name, $settings ){

        /*
         * Get survey buttons texts from database
         */
        global $wpdb;
        
        $name_prefix = 'survey_';

        $settings_table = $wpdb->prefix . "ayssurvey_settings";
        $sql = "SELECT meta_value FROM ".$settings_table." WHERE meta_key = 'buttons_texts'";
        $result = $wpdb->get_var($sql);
        $settings_buttons_texts = ($result == "") ? array() : json_decode($result, true);

        $settings_buttons_texts['next_button'] = (isset($settings_buttons_texts['next_button']) && $settings_buttons_texts['next_button'] != '') ? esc_attr($settings_buttons_texts['next_button']) : 'Next';
        $ays_next_button = (isset($settings['survey_next_button_each_text']) && $settings['survey_next_button_each_text'] != '') ? esc_attr($settings['survey_next_button_each_text']) : $settings_buttons_texts['next_button'];

        $settings_buttons_texts['prev_button'] = (isset($settings_buttons_texts['prev_button']) && $settings_buttons_texts['prev_button'] != '') ? esc_attr($settings_buttons_texts['prev_button']) : 'Prev';
        $ays_previous_button = (isset($settings['survey_previous_button_each_text']) && $settings['survey_previous_button_each_text'] != '') ? esc_attr($settings['survey_previous_button_each_text']) : $settings_buttons_texts['prev_button'];

        $settings_buttons_texts['clear_button'] = (isset($settings_buttons_texts['clear_button']) && $settings_buttons_texts['clear_button'] != '') ? esc_attr($settings_buttons_texts['clear_button']) : 'Clear selection';
        $ays_clear_button           = (isset($settings['survey_clear_selection_button_each_text']) && $settings['survey_clear_selection_button_each_text'] != '') ? esc_attr($settings['survey_clear_selection_button_each_text']) : $settings_buttons_texts['clear_button'];

        $settings_buttons_texts['finish_button'] = (isset($settings_buttons_texts['finish_button']) && $settings_buttons_texts['finish_button'] != '') ? esc_attr($settings_buttons_texts['finish_button']) : 'Finish';
        $ays_finish_button = (isset($settings['survey_finish_button_each_text']) && $settings['survey_finish_button_each_text'] != '') ? esc_attr($settings['survey_finish_button_each_text']) : $settings_buttons_texts['finish_button'];

        $settings_buttons_texts['restart_button'] = (isset($settings_buttons_texts['restart_button']) && $settings_buttons_texts['restart_button'] != '') ? esc_attr($settings_buttons_texts['restart_button']) : 'Restart';
        $ays_restart_survey_button  = (isset($settings['survey_restart_button_each_text']) && $settings['survey_restart_button_each_text'] != '') ? esc_attr($settings['survey_restart_button_each_text']) : $settings_buttons_texts['restart_button'];

        $settings_buttons_texts['exit_button'] = (isset($settings_buttons_texts['exit_button']) && $settings_buttons_texts['exit_button'] != '') ? esc_attr($settings_buttons_texts['exit_button']) : 'Exit';
        $ays_exit_button            = (isset($settings['survey_exit_button_each_text']) && $settings['survey_exit_button_each_text'] != '') ? esc_attr($settings['survey_exit_button_each_text']) : $settings_buttons_texts['exit_button'];
        $ays_login_button           = (isset($settings_buttons_texts['login_button']) && $settings_buttons_texts['login_button'] != '') ? stripslashes( esc_attr($settings_buttons_texts['login_button']) ) : 'Log In';

        $settings_buttons_texts['start_button'] = (isset($settings_buttons_texts['start_button']) && $settings_buttons_texts['start_button'] != '') ? esc_attr($settings_buttons_texts['start_button']) : 'Start';
        $ays_start_button           = (isset($settings['survey_start_button_each_text']) && $settings['survey_start_button_each_text'] != '') ? stripslashes( esc_attr( $settings['survey_start_button_each_text'] ) ) : $settings_buttons_texts['start_button'];

        $settings_buttons_texts['login_button'] = (isset($settings_buttons_texts['login_button']) && $settings_buttons_texts['login_button'] != '') ? esc_attr($settings_buttons_texts['login_button']) : 'Log in';
        $ays_login_button           = (isset($settings['survey_login_button_each_text']) && $settings['survey_login_button_each_text'] != '') ? stripslashes( esc_attr( $settings['survey_login_button_each_text'] ) ) : $settings_buttons_texts['login_button'];
        
        $ays_next_button_text     = ($ays_next_button     === 'Next') ? __('Next', "survey-maker") : $ays_next_button;
        $ays_previous_button_text = ($ays_previous_button === 'Prev') ? __('Prev', "survey-maker") : $ays_previous_button;
        $ays_clear_button_text    = ($ays_clear_button    === 'Clear selection') ? __('Clear selection', "survey-maker") : $ays_clear_button;
        $ays_finish_button_text   = ($ays_finish_button   === 'Finish') ? __('Finish', "survey-maker") : $ays_finish_button;
        $ays_restart_button_text  = ($ays_finish_button   === 'Restart') ? __('Restart', "survey-maker") : $ays_restart_survey_button;
        $ays_exit_button_text     = ($ays_exit_button     === 'Exit') ? __('Exit', "survey-maker") : $ays_exit_button;
        $ays_login_button_text    = ($ays_login_button    === 'Log In') ? __('Log In', "survey-maker") : $ays_login_button;

        if ($ays_start_button === 'Start') {
            $ays_start_button_text = __('Start', "survey-maker");
        }else{
            $ays_start_button_text = $ays_start_button;
        }

        $texts = array(
            'nextButton'         => $ays_next_button_text,
            'previousButton'     => $ays_previous_button_text,
            'clearButton'        => $ays_clear_button_text,
            'finishButton'       => $ays_finish_button_text,
            'restartButton'      => $ays_restart_button_text,
            'exitButton'         => $ays_exit_button_text,
            'loginButton'        => $ays_login_button_text,
            'startButton'        => $ays_start_button_text,
        );
        return $texts;
    }

    public static function ays_survey_numbering_all( $numbering ){
        $keyword_arr = array();
        switch ($numbering) {
            case '1.':

                $char_min_val = '1';
                $char_max_val = '100';
                for($x = $char_min_val; $x <= $char_max_val; $x++){
                    $keyword_arr[] = $x .".";
                }

                break;
            case '1)':

                $char_min_val = '1';
                $char_max_val = '100';
                for($x = $char_min_val; $x <= $char_max_val; $x++){
                    $keyword_arr[] = $x .")";
                }

                break;
            case 'A.':

                $char_min_val = 'A';
                $char_max_val = 'Z';
                for($x = $char_min_val; $x <= $char_max_val; $x++){
                    $keyword_arr[] = $x .".";
                }

                break;
            case 'A)':

                $char_min_val = 'A';
                $char_max_val = 'Z';
                for($x = $char_min_val; $x <= $char_max_val; $x++){
                    $keyword_arr[] = $x .")";
                }

                break;
            case 'a.':
                $char_min_val = 'a';
                $char_max_val = 'z';
                for($x = $char_min_val; $x <= $char_max_val; $x++){
                    $keyword_arr[] = $x .".";
                }

                break;
            case 'a)':

                $char_min_val = 'a';
                $char_max_val = 'z';
                for($x = $char_min_val; $x <= $char_max_val; $x++){
                    $keyword_arr[] = $x .")";
                }

                break;

            default:

                break;
        }

        return $keyword_arr;
    }

    public static function ays_survey_question_results_for_summary( $survey_id, $submission_ids = null ){
        global $wpdb;

        if($survey_id === null){
            return array(
                'total_count' => 0,
                'questions' => array()
            );
        }

        $answer_table         = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "answers";
        $question_table       = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "questions";
        $submitions_table     = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions";
        $survey_section_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "sections";
        $surveys_table        = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "surveys";
        $submitions_questiions_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions_questions";

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
                    WHERE s_q.survey_id=". absint( $survey_id ) ."
                    GROUP BY a.id";

        $answer_id_result = $wpdb->get_results($answer_id,'ARRAY_A');

        $for_checkbox = "SELECT a.id, a.answer, COUNT(s_q.answer_id) AS answer_count
                    FROM {$answer_table} AS a
                    LEFT JOIN {$submitions_questiions_table} AS s_q 
                    ON a.id = s_q.answer_id OR FIND_IN_SET( a.id, s_q.user_answer )
                    WHERE s_q.type = 'checkbox'
                    AND s_q.survey_id=". absint( $survey_id ) ."
                    GROUP BY a.id";

        $for_checkbox_result = $wpdb->get_results($for_checkbox,'ARRAY_A');

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

        $question_by_ids = Survey_Maker_Data::get_question_by_ids( $questions_ids_arr );

        $select_answer_q_type = "SELECT type, user_answer, id, question_id
            FROM {$submitions_questiions_table}
            WHERE user_answer != '' 
                AND type != 'checkbox' 
                AND survey_id=". absint( $survey_id );

        $submission_answer_other = "SELECT question_id, answer_id, user_variant
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
        $other_answers_all = array();
        foreach($result_answers_other as $key => $result_answer_other){
            if( intval( $result_answer_other['answer_id'] ) == 0 ){
                $other_answers[$result_answer_other['question_id']][] = $result_answer_other['user_variant'];
            }
            $other_answers_all[$result_answer_other['question_id']][] = $result_answer_other['user_variant'];
        }

        $text_types = array(
            'text',
            'short_text',
            'number',
            'phone',
            'star',
            'name',
            'email',
            'linear_scale',
            'star',
            'date',
            'time',
            'date_time',
        );

        //Question types different charts
        $ays_submissions_count  = array();
        $question_results = array();
        
        $total_count = 0;
        foreach ($question_by_ids as $key => $question) {

            $answers = $question->answers;
            $question_id = $question->id;
            $question_title = $question->question;

            //questions
            $question_results[$question_id]['question_id'] = $question_id;
            $question_results[$question_id]['question'] = $question_title;
            $ays_answer = array();
            $question_answer_ids = array();
            foreach ($answers as $key => $answer) {
                $answer_id = $answer->id;
                $answer_title = $answer->answer;
                
                $ays_answer[$answer_id] = isset( $answer_count[$answer_id] ) ? $answer_count[$answer_id] : 0;
                $question_answer_ids[$answer_id] = $answer_title;
            }
            
            //sum of submissions count per questions
            if($question->type == "checkbox"){
                $sub_checkbox_count = self::ays_survey_get_submission_count($question->id, $question->type, $survey_id);
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

                if($question->type == "radio" || $question_type == "yesorno"){
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

    public static function ays_survey_get_last_submission_id_for_summary( $survey_id ){
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

    public static function ays_survey_individual_results_for_one_submission_for_summary( $submission, $survey ){
        global $wpdb;
        $survey_id = isset( $survey['id'] ) ? absint( intval( $survey['id'] ) ) : null;

        if( is_null( $survey_id ) || empty( $submission )){
            return array(
                'sections' => array()
            );
        }

        $submitions_questiions_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions_questions";

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

        // Survey questions IDs
        $question_ids = isset( $survey['question_ids'] ) && $survey['question_ids'] != '' ? $survey['question_ids'] : '';

        // Section Ids
        $sections_ids = (isset( $survey['section_ids' ] ) && $survey['section_ids'] != '') ? $survey['section_ids'] : '';

        $sections = Survey_Maker_Data::get_suervey_sections_with_questions( $sections_ids, $question_ids );

        $text_types = array(
            'text',
            'short_text',
            'number',
            'phone',
            'star',
            'name',
            'email',
            'linear_scale',
            'star',
            'date',
            'time',
        );

        foreach ($individual_questions_results as $key => $individual_questions_result) {
            if($individual_questions_result['type'] == 'checkbox'){
                $checkbox_ids = $individual_questions_result['user_answer'] != '' ? explode(',', $individual_questions_result['user_answer']) : array();
                $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = $checkbox_ids;
                $question_answer_id[ $individual_questions_result['question_id'] ]['otherAnswer'] = isset($individual_questions_result['user_variant']) && $individual_questions_result['user_variant'] != '' ? $individual_questions_result['user_variant'] : '';
            }elseif( in_array( $individual_questions_result['type'], $text_types ) ){
                $question_answer_id[ $individual_questions_result['question_id'] ] = $individual_questions_result['user_answer'];
                if( $individual_questions_result['type'] == 'date' ){
                    if( $individual_questions_result['user_answer'] != '' ){
                        $question_answer_id[ $individual_questions_result['question_id'] ] = date( 'd . m . Y', strtotime( $individual_questions_result['user_answer'] ) );
                    }else{
                        $question_answer_id[ $individual_questions_result['question_id'] ] = '';
                    }
                }
                elseif( $individual_questions_result['type'] == 'time' ){
                    if( $individual_questions_result['user_answer'] != '' ){
                        $question_answer_id[ $individual_questions_result['question_id'] ] = implode(" : ", explode( ":", $individual_questions_result['user_answer'] ));
                    }else{
                        $question_answer_id[ $individual_questions_result['question_id'] ] = '';
                    }
                }
            }elseif($individual_questions_result['type'] == 'radio'){
                $other_answer = isset($individual_questions_result['user_variant']) && $individual_questions_result['user_variant'] != '' ? $individual_questions_result['user_variant'] : '';
                $question_answer_id[ $individual_questions_result['question_id'] ]['otherAnswer'] = $other_answer;
                $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = $individual_questions_result['answer_id'];
                if( intval( $individual_questions_result['answer_id'] ) === 0 && $other_answer !== '' ){
                    $question_answer_id[ $individual_questions_result['question_id'] ]['otherAnswer'] = $other_answer;
                    $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = $individual_questions_result['answer_id'];
                }elseif( intval( $individual_questions_result['answer_id'] ) === 0 && $other_answer === '' ){
                    $question_answer_id[ $individual_questions_result['question_id'] ]['otherAnswer'] = '';
                    $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = '-1';
                }else{
                    $question_answer_id[ $individual_questions_result['question_id'] ]['otherAnswer'] = '';
                    $question_answer_id[ $individual_questions_result['question_id'] ]['answer'] = $individual_questions_result['answer_id'];
                }
            }else{
                $question_answer_id[ $individual_questions_result['question_id'] ] = $individual_questions_result['answer_id'];
            }
        }
        
        $ays_individual_questions_for_one_submission['submission_id'] = $submission['id'];
        $ays_individual_questions_for_one_submission['questions'] = $question_answer_id;
        $ays_individual_questions_for_one_submission['sections'] = $sections;

        return $ays_individual_questions_for_one_submission;
    }

    public static function get_submission_count_and_ids_for_summary( $survey_id){
        global $wpdb;

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
            'submission_ids' => $submissions_id_str,
            'submission_ids_arr' => $submissions_id_arr,
        );

        return $submission_count_and_ids;
    }

    public static function ays_survey_get_submission_count($id , $type , $survey_id){
        global $wpdb;
        $submitions_table   = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions";
        $submitions_q_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions_questions";
        $results = array();
        
        $sql = "SELECT submission_id AS sub_count
                FROM {$submitions_q_table}
                WHERE question_id = ". absint( $id ) ."
                AND survey_id = ". absint( $survey_id ) ."";

        if( $type == 'checkbox' ){
            $sql .= " AND user_answer != '' ";
        }

        $sql .= " GROUP BY submission_id ";
        $results = $wpdb->get_results( $sql, 'ARRAY_A' );

        $submission_count = count( $results );
        return $submission_count;
    }
        
    public static function  ays_survey_copy_text_formater( $info_array ) {
        $return = "`\n";
        foreach ( $info_array as $section => $details ) {
                $return .= sprintf( "%s: %s", $section, $details );
            $return .= "\n";
        }
        $return .= '`';
        return $return;
    }

    public static function ays_survey_detected_device_chart() {
        $device = 'desktop';
        $isMobile = preg_match("/(iphone|ipod|android|blackberry|opera|mini|windows\sce|palm|smartphone|iemobile)/i", $_SERVER["HTTP_USER_AGENT"]);
        $isTablet = preg_match("/(ipad|android|android 3.0|xoom|sch-i800|playbook|tablet|kindle)/i", $_SERVER["HTTP_USER_AGENT"]);

        if($isMobile){
            $device = 'mobile';
        }else if($isTablet){
            $device = 'tablet';
        }else{
            $device = 'desktop';
        }
        return $device;
    }
    
    public static function ays_survey_get_passed_users_count( $survey_id ) {
        global $wpdb;
        $submissions_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions";
        // Get passed users
        $sql = "SELECT COUNT(id) AS users_count FROM ".$submissions_table." 
                WHERE survey_id = ".$survey_id." AND user_id != 0
                GROUP BY user_id";
        $result = $wpdb->get_results($sql);
        // Get passed guests count
        $sql2 = "SELECT COUNT(id) FROM ".$submissions_table." WHERE `user_id` = 0 AND `survey_id` = ".$survey_id;
        $result2 = $wpdb->get_var($sql2);
        $all_count = intval(count($result)) + intval($result2);
        return $all_count;
    }

    public static function get_template_part( $slug, $name = null, $args = array(), $path = 'admin' ) {
		/**
		 * Fires before the specified template part file is loaded.
		 *
		 * The dynamic portion of the hook name, `$slug`, refers to the slug name
		 * for the generic template part.
		 *
		 * @since 1.0.0
		 * @since 1.0.0 The `$args` parameter was added.
		 *
		 * @param string      $slug The slug name for the generic template.
		 * @param string|null $name The name of the specialized template.
		 * @param array       $args Additional arguments passed to the template.
		 */

		$templates = array();
		$name      = (string) $name;
		if ( '' !== $name ) {
			$templates[] = "{$slug}-{$name}.php";
		}

		$templates[] = "{$slug}.php";

		/**
		 * Fires before an attempt is made to locate and load a template part.
		 *
		 * @since 1.0.0
		 * @since 1.0.0 The `$args` parameter was added.
		 *
		 * @param string   $slug      The slug name for the generic template.
		 * @param string   $name      The name of the specialized template.
		 * @param string[] $templates Array of template files to search for, in order.
		 * @param array    $args      Additional arguments passed to the template.
		 */
		do_action( 'ays_sm_get_template_part', $slug, $name, $templates, $path, $args );

		if ( ! self::locate_template( $templates, true, false, $path, $args ) ) {
			return false;
		}
	}

    public static function locate_template( $template_names, $load = false, $require_once = true, $path = 'admin', $args = array() ) {
		$located = '';
		foreach ( (array) $template_names as $template_name ) {
			if ( ! $template_name ) {
				continue;
			}

			$path = $path == 'public' ? SURVEY_MAKER_PUBLIC_PATH : SURVEY_MAKER_ADMIN_PATH;

			if ( file_exists( $path . '/' . $template_name ) ) {
				$located = $path . '/' . $template_name;
				break;
			} elseif ( file_exists( $path . '/' . $template_name ) ) {
				$located = $path . '/' . $template_name;
				break;
			}
		}
		if ( $load && '' !== $located ) {

			self::load_template( $located, $require_once, $args );
		}

		return $located;
	}

    public static function load_template( $_template_file, $require_once = true, $args = array() ) {
		if ( $require_once ) {

			require_once $_template_file;
		} else {
			require $_template_file;
		}
	}

    
    public static function get_submission_count_and_ids( $survey_id, $filters = array() ){
        global $wpdb;

        if($survey_id === null){
            return false;
        }
        $submitions_table = $wpdb->prefix . SURVEY_MAKER_DB_PREFIX . "submissions";

        $filters_where_condition = "";
        if (isset($filters['is_filter']) && $filters['is_filter']) {
            $filters_where_condition = self::get_filters_where_condition($filters);
        }
       
        //submission of each result
        $submission_ids = "SELECT id
                           FROM {$submitions_table} j 
                           WHERE survey_id=". absint( $survey_id ) . $filters_where_condition . "
                           ORDER BY id";
        $submission_ids_result = $wpdb->get_results($submission_ids,'ARRAY_A');

	    $submission_count_sql = "SELECT COUNT(id) AS count_submission
								 FROM {$submitions_table} 
                            	 WHERE survey_id=". absint( $survey_id ) . $filters_where_condition ." ";
	    $submission_count_result = $wpdb->get_var($submission_count_sql);
        $submission_count = '';
        $submissions_id_arr = array();

        foreach ($submission_ids_result as $key => $submission_id_result) {
            $submission_count = intval($submission_count_result);
            $submissions_id_arr[] = $submission_id_result['id'];
        }
        $submissions_id_str = implode(',', $submissions_id_arr );
        
        $submission_count_and_ids = array(
            'submission_count' => $submission_count,
            'submission_ids' => $submissions_id_str,
            'submission_ids_arr' => $submissions_id_arr,
        );

        return $submission_count_and_ids;
    }

    // Check users cookie
    public static function ays_survey_set_cookie($attr){
        $cookie_name = $attr['name'].$attr['id'];
        $cookie_value = $attr['title'];
        $cookie_value = isset( $attr['attempts_count'] ) ? $attr['attempts_count'] : 1;
        self::ays_survey_remove_cookie( $attr );
        $cookie_expiration =  current_time('timestamp') + (1 * 365 * 24 * 60 * 60);
        setcookie($cookie_name, $cookie_value, $cookie_expiration, '/');
    }    

    public static function ays_survey_remove_cookie($attr){
        $cookie_name = $attr['name'].$attr['id'];
        if(isset($_COOKIE[$cookie_name])){
            unset($_COOKIE[$cookie_name]);
            $cookie_expiration =  current_time('timestamp') - 1;
            setcookie($cookie_name, null, $cookie_expiration, '/');
        }
    }

    public static function ays_survey_check_cookie($attr){
        $cookie_name = $attr['name'].$attr['id'];
        if(isset($_COOKIE[$cookie_name])){
            if( isset( $attr['increase_count'] ) && $attr['increase_count'] == true ){
                $attr['attempts_count'] = intval( $_COOKIE[$cookie_name] ) + 1;
                self::ays_survey_set_cookie( $attr );
            }
            return true;
        }
        return false;
    }

    public static function get_limit_cookie_count($attr){
        $cookie_name = $attr['name'].$attr['id'];
        if(isset($_COOKIE[$cookie_name])){
            return intval( $_COOKIE[ $cookie_name ] );
        }
        return false;
    }

    public static function get_user_profile_data(){

        $user_first_name = '';
        $user_last_name  = '';
        $user_nickname   = '';

        $user_id = get_current_user_id();
        if($user_id != 0){
            $usermeta = get_user_meta( $user_id );
            
            if($usermeta !== null){
                $user_first_name = (isset($usermeta['first_name'][0]) && $usermeta['first_name'][0] != '' ) ? sanitize_text_field( $usermeta['first_name'][0] ) : '';
                $user_last_name  = (isset($usermeta['last_name'][0]) && $usermeta['last_name'][0] != '' ) ? sanitize_text_field( $usermeta['last_name'][0] ) : '';
                $user_nickname   = (isset($usermeta['nickname'][0]) &&  $usermeta['nickname'][0] != '' ) ? sanitize_text_field( $usermeta['nickname'][0] ) : '';
            }
        }

        $message_data = array(
            'user_first_name'   => $user_first_name,
            'user_last_name'    => $user_last_name,
            'user_nickname'     => $user_nickname,
        );

        $current_user_data = get_userdata( $user_id );
        $user_display_name = "";
        $user_wordpress_roles = '';
        $user_email = '';
        
        if ( ! is_null( $current_user_data ) && $current_user_data ) {
            $user_display_name = ( isset( $current_user_data->data->display_name ) && $current_user_data->data->display_name != '' ) ? sanitize_text_field( $current_user_data->data->display_name ) : "";
            $user_email = ( isset( $current_user_data->data->user_email ) && $current_user_data->data->user_email != '' ) ? sanitize_text_field( $current_user_data->data->user_email ) : "";
            $user_wordpress_roles = ( isset( $current_user_data->roles ) && ! empty( $current_user_data->roles ) ) ? $current_user_data->roles : "";
            if ( !empty( $user_wordpress_roles ) && $user_wordpress_roles != "" ) {
                if ( is_array( $user_wordpress_roles ) ) {
                    $user_wordpress_roles = implode(",", $user_wordpress_roles);
                }
            }
        }

        $message_data['user_display_name'] = $user_display_name;
        $message_data['user_wordpress_roles'] = $user_wordpress_roles;
        $message_data['user_wordpress_email'] = $user_email;
        $message_data['user_ip_address'] = self::get_user_ip();
		
        return $message_data;
    }

    public static function get_survey_results_count_by_id($id){
        global $wpdb;

        $sql = "SELECT COUNT(*) AS res_count
                FROM {$wpdb->prefix}ayssurvey_submissions
                WHERE survey_id=". $id ." ";

        $quiz = $wpdb->get_row($sql, 'ARRAY_A');

        return $quiz;
    }

    public static function ays_survey_is_elementor(){
        if( isset( $_GET['action'] ) && $_GET['action'] == 'elementor' ){
            $is_elementor = true;
        }elseif( isset( $_REQUEST['elementor-preview'] ) && $_REQUEST['elementor-preview'] != '' ){
            $is_elementor = true;
        }else{
            $is_elementor = false;
        }

        if ( ! $is_elementor ) {
            $is_elementor = ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'elementor_ajax' ) ? true : false;
        }

        return $is_elementor;
    }

    public static function ays_survey_is_editor(){
        $is_editor = false;
        if( isset( $_GET['action'] ) && ( $_GET['action'] == 'add' || $_GET['action'] == 'edit' ) ){
            if ( isset( $_GET['post'] ) && absint( $_GET['post'] ) > 0 ) {
                $is_editor = true;
            }
        } elseif ( isset( $_GET['context'] ) && ( $_GET['context'] == 'add' || $_GET['context'] == 'edit' ) ) {
            if( isset( $_GET['post_id'] ) & absint( $_GET['post_id'] ) > 0 ){
                $is_editor = true;
            }
        }

        return $is_editor;
    }

    // Retrieves the attachment ID from the file URL
    public static function ays_survey_get_image_id_by_url( $image_url ) {
        global $wpdb;

        $image_alt_text = "";
        if ( !empty( $image_url ) ) {

            $re = '/-\d+[Xx]\d+\./';
            $subst = '.';

            $image_url = preg_replace($re, $subst, $image_url, 1);

            $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
            if ( !is_null( $attachment ) && !empty( $attachment ) ) {

                $image_id = (isset( $attachment[0] ) && $attachment[0] != "") ? absint(  $attachment[0] ) : "";
                if ( $image_id != "" ) {
                    $image_alt_text = self::ays_survey_get_image_alt_text_by_id( $image_id );
                }
            }
        }

        return $image_alt_text; 
    }

    public static function ays_survey_get_image_alt_text_by_id( $image_id ) {

        $image_data = "";
        if ( $image_id != "" ) {

            $result = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
            if ( $result && $result != "" ) {
                $image_data = esc_attr( $result );
            }
        }

        return $image_data; 
    }
    
    public static function get_user_by_ip($id){
        global $wpdb;
        $user_ip = self::get_user_ip();
        $sql = "SELECT COUNT(*)
                FROM `{$wpdb->prefix}ayssurvey_submissions`
                WHERE `user_ip` = '$user_ip'
                  AND `survey_id` = $id";
        $result = $wpdb->get_var($sql);
        return $result;
    }

    public static function get_surveys_by_category( $id ){
        global $wpdb;

        $id = ( isset( $id ) && $id != '' ) ? absint( intval( $id ) ) : null;
        $surveys_table    = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "surveys";
        $categories_table = esc_sql( $wpdb->prefix . SURVEY_MAKER_DB_PREFIX ) . "survey_categories";

        $results = '';

        if($id != null){
            $sql = "SELECT *, s.`title`, s.`id`, s.`options` FROM `{$surveys_table}` AS s LEFT JOIN `{$categories_table}` AS c ON FIND_IN_SET(c.`id`, s. `category_ids` ) AND c.`status` = 'published' AND s.`status` = 'published'  WHERE c.`id` = " . esc_sql( $id );
            $results = $wpdb->get_results( $sql, 'ARRAY_A');
        }
        
        return $results;
    }

    public static function survey_lazy_loading_for_images( $toggle ){
        if($toggle){
            return "loading='lazy'";
        }
        return '';
    }

    public static function survey_no_items_list_tables() {
        if( isset( $_GET['status'] ) && ($_GET['status'] == 'deleted' || $_GET['status'] == 'restored')){
            $url = remove_query_arg( array('fstatus', 'status', '_wpnonce') );
            $url = esc_url_raw( $url );
            wp_redirect( $url );
        }
        else{
            echo esc_html__( 'There are no surveys yet.', "survey-maker" );
        }
    }

    public static function survey_get_loader($type , $loading = ''){
        switch( $type ){
            case 'default':
                $survey_loader_html = "<div data-class='lds-ellipsis' data-role='loader' class='lds-ellipsis ays-survey-wait-loading-loader'><div></div><div></div><div></div><div></div></div>";
                break;
            case 'circle':
                $survey_loader_html = "<div data-class='lds-circle' data-role='loader' class='lds-circle ays-survey-wait-loading-loader'></div>";
                break;
            case 'dual_ring':
                $survey_loader_html = "<div data-class='lds-dual-ring' data-role='loader' class='lds-dual-ring ays-survey-wait-loading-loader'></div>";
                break;
            case 'facebook':
                $survey_loader_html = "<div data-class='lds-facebook' data-role='loader' class='lds-facebook ays-survey-wait-loading-loader'><div></div><div></div><div></div></div>";
                break;
            case 'hourglass':
                $survey_loader_html = "<div data-class='lds-hourglass' data-role='loader' class='lds-hourglass ays-survey-wait-loading-loader'></div>";
                break;
            case 'ripple':
                $survey_loader_html = "<div data-class='lds-ripple' data-role='loader' class='lds-ripple ays-survey-wait-loading-loader'><div></div><div></div></div>";
                break;
            case 'snake':
                $survey_loader_html = '<div class="ays-survey-loader-snake ays-survey-wait-loading-loader" data-class="ays-survey-loader-snake" data-role="loader"><div></div><div></div><div></div><div></div><div></div><div></div></div>';
            break;
            // case 'text':
            //     $survey_loader_html = '<div class="ays-survey-loader ays-survey-loader-with-text '.$custom_class.'" data-class="ays-survey-loader-text" data-role="loader">'.$text.'</div>';
            // break;
            // case 'custom_gif':
            //     $survey_loader_html = '<div class="ays-survey-loader ays-survey-loader-with-custom-gif '.$custom_class.'" data-class="ays-survey-loader-cistom-gif" data-role="loader"><img src="'.$gif.'" '.$loading.' style="width: '.$gif_width.'px;object-fit:cover;"></div>';
            // break;
            default:
                $survey_loader_html = "<div data-class='lds-ellipsis' data-role='loader' class='lds-ellipsis ays-survey-wait-loading-loader'><div></div><div></div><div></div><div></div></div>";
            break;
        }
        return $survey_loader_html;
    }

    public static function ays_set_survey_message_variables_data( $id, $survey, $settings_options ){

        /*
         * Survey message variables for Start Page
         */

        $survey = (array)$survey;

        // Survey options 
        $options = ( json_decode($survey['options'], true) != null ) ? json_decode($survey['options'], true) : array();

        // General Setting's Options

        // Do not store IP adressess 
        $disable_user_ip = (isset($settings_options['disable_user_ip']) && $settings_options['disable_user_ip'] == 'on') ? true : false;

        // Survey title
        $survey_title = (isset( $survey['title'] ) && $survey['title'] != "") ? stripslashes( sanitize_text_field($survey['title']) ) : "";

        // Survey create date
        $survey_creation_date = (isset($survey['date_created']) && $survey['date_created'] != '') ? sanitize_text_field( $survey['date_created'] ) : "";
        if( $survey_creation_date != "" ){
            $survey_creation_date = date_i18n( get_option( 'date_format' ), strtotime( $survey_creation_date ) );
        }

        // Survey modified date
        $survey_modified_date = (isset($survey['date_modified']) && $survey['date_modified'] != '') ? sanitize_text_field( $survey['date_modified'] ) : "";
        if( $survey_modified_date != "" ){
            $survey_modified_date = date_i18n( get_option( 'date_format' ), strtotime( $survey_modified_date ) );
        }

        // Current time
        $survey_current_time = explode( ' ', current_time( 'mysql' ) );
        $survey_current_time_only = ($survey_current_time[1]) ? $survey_current_time[1] : '';

        // Get survey author
        $current_survey_user_data = get_userdata( $survey['author_id'] );
        $current_survey_author = '';
        $current_survey_author_email = '';
        if ( isset( $current_survey_user_data ) && $current_survey_user_data ) {
            // Get survey author name
            $current_survey_author = ( isset( $current_survey_user_data->data->display_name ) && $current_survey_user_data->data->display_name != '' ) ? sanitize_text_field( $current_survey_user_data->data->display_name ) : "";
            // Get survey author email
            $current_survey_author_email = ( isset( $current_survey_user_data->data->user_email ) && $current_survey_user_data->data->user_email != '' ) ? sanitize_text_field( $current_survey_user_data->data->user_email ) : "";
        }

        $questions_count = (isset( $survey['questions_count'] ) && $survey['questions_count'] != "") ? stripslashes( sanitize_text_field($survey['questions_count']) ) : 0;

        $survey_question_count      = self::get_survey_questions_count($id);
        $survey_sections_count      = self::get_survey_sections_count($id);
        $survey_passed_users_count  = self::ays_survey_get_passed_users_count($id);

        // WP home page url
        $home_main_url = home_url();
        $wp_home_page_url = '<a href="'.$home_main_url.'" target="_blank">'.$home_main_url.'</a>';

        $survey_user_information = self::get_user_profile_data();
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
        $user_ip_address = "";
        if($disable_user_ip){
            $user_ip_address = '';
        }else{
            $user_ip_address = self::get_user_ip();
        }

        // User wordpress email
        $user_wordpress_email = (isset( $survey_user_information['user_wordpress_email'] ) && $survey_user_information['user_wordpress_email']  != "") ? esc_attr($survey_user_information['user_wordpress_email']) : '';
        
        $super_admin_email = get_option('admin_email');

        $message_data = array(
            'survey_title'                  => $survey_title,
            'survey_id'                     => $id,
            'questions_count'               => $questions_count,
            'current_time'                  => $survey_current_time_only,
            'sections_count'                => $survey_sections_count,
            'users_count'                   => $survey_passed_users_count,
            'users_first_name'              => $user_first_name,
            'users_last_name'               => $user_last_name,
            'users_nick_name'               => $user_nick_name,
            'users_display_name'            => $user_display_name,
            'users_ip_address'              => $user_ip_address,
            'user_wordpress_roles'          => $user_wordpress_roles,
            'creation_date'                 => $survey_creation_date,
            'modified_date'                 => $survey_modified_date,
            'current_survey_author'         => $current_survey_author,
            'current_survey_author_email'   => $current_survey_author_email,
            'current_survey_page_link'      => $current_survey_author_email,
            'admin_email'                   => $super_admin_email,
            'home_page_url'                 => $wp_home_page_url,
        );

        return $message_data;
    }

    public static function survey_sanitize_specific_content($content) {
        // Pattern to match <script> tags, dangerous attributes, and potential SVG exploits
        $pattern = '/<script.*?>.*?<\/script>|<[^>]+(?:\bon\w+\s*=\s*|attributeName\s*=\s*[^>]*>)/is';

        // Callback function to convert matched tags into text
        $callback = function($matches) {
            // Convert characters to their HTML entities to render them as text
            return htmlspecialchars($matches[0], ENT_QUOTES, 'UTF-8');
        };

        // Replace the matched patterns with their sanitized text equivalent
        $sanitized_content = preg_replace_callback($pattern, $callback, $content);

        return $sanitized_content;
    }
    
    // Sanitize data by admin level
    public static function admin_level_sanitize($data) {
        
        if (is_multisite() && is_super_admin()) {
            return stripslashes($data);

        } elseif (!is_multisite() && current_user_can('unfiltered_html')) {
            return stripslashes($data);

        }
        return wp_kses_post($data);

        
    }

    public static function get_allowed_tags_for_loader() {
        return array(
            'span' => array('class' => array()),
            'img'  => array('src' => array(), 'alt' => array()),
        );
    }
    
}
