(function($){
    'use strict';
    $(document).ready(function(){

        var defaultColors = {
            classicLight: {
                surveyColor: "#ff5722",
                bgColor: "#fff",
                textColor: "#333",
                buttonsTextColor: "#333",
                buttonsBgColor: "#fff",
                startPageBgColor: "#fff",
                startPageTextColor: "#333",
                titleTextShadColor: "#333",
                paginationTextColor: "#333",
                fullScreenButtonColor: "#333",
                questionCaptionTextColor: "#333",
            },
            classicDark: {
                surveyColor: "#ff5722",
                bgColor: "#333",
                textColor: "#fff",
                buttonsTextColor: "#333",
                startPageBgColor: "#333",
                startPageTextColor: "#fff",
                buttonsBgColor: "#fff",
                titleTextShadColor: "#333",
                paginationTextColor: "#fff",
                fullScreenButtonColor: "#fff",
                questionCaptionTextColor: "#fff",
            },
            minimal: {
                surveyColor: "rgba(0,0,0,0)",
                bgColor: "#ffffff", //"rgba(0,0,0,0)",
                textColor: "#0a0a0a",
                loaderColor: "#333",
                buttonsTextColor: "#0a0a0a",
                startPageBgColor: "rgba(0,0,0,0)",
                startPageTextColor: "#0a0a0a",
                questionCaptionTextColor: "#0a0a0a",
            },
            modern: {
                surveyColor: "rgba(0,0,0,0)",
                bgColor: "#ffffff", //"rgba(0,0,0,0)",
                textColor: "#0a0a0a",
                loaderColor: "#333",
                buttonsTextColor: "#fff",
                startPageBgColor: "rgba(0,0,0,0)",
                startPageTextColor: "#0a0a0a",     
                buttonsBgColor: "#4285F4",
                startPageBgColor: "rgba(0,0,0,0)",
                startPageTextColor: "#0a0a0a",                
                questionCaptionTextColor: "#0a0a0a",
                adminNoteColor: "#000000",
                questionsStarsColor: "#fc0",
                sliderBubbleBgColor: "#4285F4",
                sliderBubbleTextColor: "#fff",
            },
        };
        
        $(document).find('input[name="ays_survey_theme"]').on("change", function(e){
            surveyThemeChange( $(this).val() );
        });

        var SurveyTheme = $(document).find('input[name="ays_survey_theme"]:checked').val();
        surveyThemeSetup( SurveyTheme );

        function surveyThemeChange( SurveyTheme ){
            var defaultTextColor,
                defaultLoaderColor,
                defaultBgColor, 
                defaultStartPageBgColor,
                defaultStartPageTextColor,
                defaultSurveyColor, 
                defaultButtonsTextColor, 
                defaultButtonsBgColor, 
                defaultTitleTShColor, 
                defaultPaginationTextColor, 
                defaultFullScreenButtonColor, 
                defaultQestionCaptionTextColor;

            switch ( SurveyTheme ) {
                case 'classic_dark':
                    defaultSurveyColor = defaultColors.classicDark.surveyColor;
                    defaultBgColor = defaultColors.classicDark.bgColor;
                    defaultTextColor = defaultColors.classicDark.textColor;
                    defaultLoaderColor = defaultColors.classicDark.loaderColor;
                    defaultButtonsTextColor = defaultColors.classicDark.buttonsTextColor;
                    defaultStartPageBgColor = defaultColors.classicDark.startPageBgColor;
                    defaultStartPageTextColor = defaultColors.classicDark.startPageTextColor;
                    defaultButtonsBgColor = defaultColors.classicDark.buttonsBgColor;
                    defaultTitleTShColor = defaultColors.classicDark.titleTextShadColor;
                    defaultPaginationTextColor = defaultColors.classicDark.paginationTextColor;
                    defaultFullScreenButtonColor = defaultColors.classicDark.fullScreenButtonColor;
                    defaultQestionCaptionTextColor = defaultColors.classicDark.questionCaptionTextColor;
                    break;
                case 'classic_light':
                    defaultSurveyColor = defaultColors.classicLight.surveyColor;
                    defaultBgColor = defaultColors.classicLight.bgColor;
                    defaultTextColor = defaultColors.classicLight.textColor;
                    defaultLoaderColor = defaultColors.classicLight.loaderColor;
                    defaultButtonsTextColor = defaultColors.classicLight.buttonsTextColor;
                    defaultStartPageBgColor = defaultColors.classicLight.startPageBgColor;
                    defaultStartPageTextColor = defaultColors.classicLight.startPageTextColor;
                    defaultButtonsBgColor = defaultColors.classicLight.buttonsBgColor;
                    defaultTitleTShColor = defaultColors.classicLight.titleTextShadColor;
                    defaultPaginationTextColor = defaultColors.classicLight.paginationTextColor;
                    defaultFullScreenButtonColor = defaultColors.classicLight.fullScreenButtonColor;
                    defaultQestionCaptionTextColor = defaultColors.classicLight.questionCaptionTextColor;
                    break;
                case 'minimal':
                    //Colors
                    defaultSurveyColor = defaultColors.minimal.surveyColor;
                    defaultBgColor = defaultColors.minimal.bgColor;
                    defaultTextColor = defaultColors.minimal.textColor;
                    defaultLoaderColor = defaultColors.minimal.loaderColor;
                    defaultButtonsTextColor = defaultColors.minimal.buttonsTextColor;
                    defaultStartPageBgColor = defaultColors.minimal.startPageBgColor;
                    defaultStartPageTextColor = defaultColors.minimal.startPageTextColor;
                    defaultQestionCaptionTextColor = defaultColors.minimal.questionCaptionTextColor;
                    break;
                case 'modern':
                    //Colors
                    defaultSurveyColor = defaultColors.modern.surveyColor;
                    defaultBgColor = defaultColors.modern.bgColor;
                    defaultTextColor = defaultColors.modern.textColor;
                    defaultLoaderColor = defaultColors.modern.loaderColor;
                    defaultButtonsTextColor = defaultColors.modern.buttonsTextColor;
                    defaultStartPageBgColor = defaultColors.modern.startPageBgColor;
                    defaultStartPageTextColor = defaultColors.modern.startPageTextColor;
                    defaultButtonsBgColor = defaultColors.modern.buttonsBgColor;
                    defaultQestionCaptionTextColor = defaultColors.modern.questionCaptionTextColor;
                    break;
                default:
                    defaultSurveyColor = defaultColors.classicLight.surveyColor;
                    defaultBgColor = defaultColors.classicLight.bgColor;
                    defaultTextColor = defaultColors.classicLight.textColor;
                    defaultLoaderColor = defaultColors.classicLight.loaderColor;
                    defaultButtonsTextColor = defaultColors.classicLight.buttonsTextColor;
                    defaultStartPageBgColor = defaultColors.classicLight.startPageBgColor;
                    defaultStartPageTextColor = defaultColors.classicLight.startPageTextColor;
                    defaultButtonsBgColor = defaultColors.classicLight.buttonsBgColor;
                    defaultTitleTShColor = defaultColors.classicLight.titleTextShadColor;
                    defaultPaginationTextColor = defaultColors.classicLight.paginationTextColor;
                    defaultFullScreenButtonColor = defaultColors.classicLight.fullScreenButtonColor;
                    defaultQestionCaptionTextColor = defaultColors.classicLight.questionCaptionTextColor;
                    break;
            }
            $(document).find('#ays_survey_color').wpColorPicker('color', defaultSurveyColor);
            $(document).find('#ays_survey_background_color').wpColorPicker('color', defaultBgColor);
            $(document).find('#ays_survey_text_color').wpColorPicker('color', defaultTextColor);
            $(document).find('#ays_survey_loader_color').wpColorPicker('color', defaultLoaderColor);
            $(document).find('#ays_survey_buttons_text_color').wpColorPicker('color', defaultButtonsTextColor);
            $(document).find('#ays_survey_start_page_background_color').wpColorPicker('color', defaultStartPageBgColor);
            $(document).find('#ays_survey_start_page_text_color').wpColorPicker('color', defaultStartPageTextColor);
            $(document).find('#ays_survey_button_bg_color').wpColorPicker('color', defaultButtonsBgColor);
            $(document).find('#ays_survey_title_box_shadow_color').wpColorPicker('color', defaultTitleTShColor);
            $(document).find('#ays_survey_pagination_text_color,#ays_survey_pagination_text_color_mobile').wpColorPicker('color', defaultPaginationTextColor);
            $(document).find('#ays_survey_full_screen_button_color').wpColorPicker('color', defaultFullScreenButtonColor);
            $(document).find('#ays_survey_question_caption_text_color,#ays_survey_question_caption_text_color_mobile').wpColorPicker('color', defaultQestionCaptionTextColor);
        }

        function surveyThemeSetup( SurveyTheme ){
            var defaultTextColor, defaultLoaderColor, defaultBgColor, defaultSurveyColor,defaultButtonsTextColor,defaultStartPageBgColor, defaultStartPageTextColor, defaultButtonsBgColor, defaultTitleTShColor, defaultPaginationTextColor, defaultFullScreenButtonColor, defaultQestionCaptionTextColor;

            switch ( SurveyTheme ) {
                case 'classic_dark':
                    defaultSurveyColor = defaultColors.classicDark.surveyColor;
                    defaultBgColor = defaultColors.classicDark.bgColor;
                    defaultTextColor = defaultColors.classicDark.textColor;
                    defaultLoaderColor = defaultColors.classicDark.loaderColor;
                    defaultButtonsTextColor = defaultColors.classicDark.buttonsTextColor;
                    defaultButtonsBgColor = defaultColors.classicDark.buttonsBgColor;
                    defaultStartPageBgColor = defaultColors.classicDark.startPageBgColor;
                    defaultStartPageTextColor = defaultColors.classicDark.startPageTextColor;
                    defaultTitleTShColor = defaultColors.classicDark.titleTextShadColor;
                    defaultPaginationTextColor = defaultColors.classicDark.paginationTextColor;
                    defaultFullScreenButtonColor = defaultColors.classicDark.fullScreenButtonColor;
                    defaultQestionCaptionTextColor = defaultColors.classicDark.questionCaptionTextColor;
                    break;
                case 'classic_light':
                    defaultSurveyColor = defaultColors.classicLight.surveyColor;
                    defaultBgColor = defaultColors.classicLight.bgColor;
                    defaultTextColor = defaultColors.classicLight.textColor;
                    defaultLoaderColor = defaultColors.classicLight.loaderColor;
                    defaultButtonsTextColor = defaultColors.classicLight.buttonsTextColor;
                    defaultStartPageBgColor = defaultColors.classicLight.startPageBgColor;
                    defaultStartPageTextColor = defaultColors.classicLight.startPageTextColor;
                    defaultButtonsBgColor = defaultColors.classicLight.buttonsBgColor;
                    defaultTitleTShColor = defaultColors.classicLight.titleTextShadColor;
                    defaultPaginationTextColor = defaultColors.classicLight.paginationTextColor;
                    defaultFullScreenButtonColor = defaultColors.classicLight.fullScreenButtonColor;                    
                    defaultQestionCaptionTextColor = defaultColors.classicLight.questionCaptionTextColor;
                    break;
                case 'minimal':
                    //Color
                    defaultSurveyColor = defaultColors.minimal.surveyColor;
                    defaultBgColor = defaultColors.minimal.bgColor;
                    defaultTextColor = defaultColors.minimal.textColor;
                    defaultLoaderColor = defaultColors.minimal.loaderColor;
                    defaultButtonsTextColor = defaultColors.minimal.buttonsTextColor;
                    defaultStartPageBgColor = defaultColors.minimal.startPageBgColor;
                    defaultStartPageTextColor = defaultColors.minimal.startPageTextColor;
                    defaultQestionCaptionTextColor = defaultColors.minimal.questionCaptionTextColor;
                    break;
                case 'modern':
                    //Color
                    defaultSurveyColor = defaultColors.modern.surveyColor;
                    defaultBgColor = defaultColors.modern.bgColor;
                    defaultTextColor = defaultColors.modern.textColor;
                    defaultLoaderColor = defaultColors.modern.loaderColor;
                    defaultButtonsTextColor = defaultColors.modern.buttonsTextColor;
                    defaultButtonsBgColor = defaultColors.modern.buttonsBgColor;
                    defaultStartPageBgColor = defaultColors.modern.startPageBgColor;
                    defaultStartPageTextColor = defaultColors.modern.startPageTextColor;
                    defaultQestionCaptionTextColor = defaultColors.modern.questionCaptionTextColor;
                    break;
                default:
                    defaultSurveyColor = defaultColors.classicLight.surveyColor;
                    defaultBgColor = defaultColors.classicLight.bgColor;
                    defaultTextColor = defaultColors.classicLight.textColor;
                    defaultLoaderColor = defaultColors.classicLight.loaderColor;
                    defaultButtonsTextColor = defaultColors.classicLight.buttonsTextColor;
                    defaultButtonsBgColor = defaultColors.classicLight.buttonsBgColor;
                    defaultStartPageBgColor = defaultColors.classicLight.startPageBgColor;
                    defaultStartPageTextColor = defaultColors.classicLight.startPageTextColor;
                    defaultTitleTShColor = defaultColors.classicLight.titleTextShadColor;
                    defaultPaginationTextColor = defaultColors.classicLight.paginationTextColor;
                    defaultFullScreenButtonColor = defaultColors.classicLight.fullScreenButtonColor;
                    defaultQestionCaptionTextColor = defaultColors.classicLight.questionCaptionTextColor;
                    break;
            }

            var ays_survey_color_picker = {
                defaultColor: defaultSurveyColor,
                change: function (e) {
                }
            };
                    
            var ays_survey_background_color_picker = {
                defaultColor: defaultBgColor,
                change: function (e) {
                }
            };

            var ays_survey_text_color_picker = {
                defaultColor: defaultTextColor,
                change: function (e) {
                }
            };

            var ays_survey_loader_color_picker = {
                defaultColor: defaultLoaderColor,
                change: function (e) {
                }
            };

            var ays_survey_buttons_text_color_picker = {
                defaultColor: defaultButtonsTextColor,
                change: function (e) {
                }
            };

            var ays_survey_start_page_background_color_picker = {
                defaultColor: defaultStartPageBgColor,
                change: function (e) {
                }
            };
            
            var ays_survey_start_page_text_color_picker = {
                defaultColor: defaultStartPageTextColor,
                change: function (e) {
                }
            };

            var ays_survey_buttons_background_color_picker = {
                defaultColor: defaultButtonsBgColor,
                change: function (e) {
                }
            };

            var ays_survey_title_box_shadow_color_picker = {
                defaultColor: defaultTitleTShColor,
                change: function (e) {
                }
            };

            var ays_survey_pagination_text_color = {
                defaultColor: defaultPaginationTextColor,
                change: function (e) {
                }
            };

            var ays_survey_full_screen_button_color = {
                defaultColor: defaultFullScreenButtonColor,
                change: function (e) {
                }
            };

            var ays_survey_question_caption_text_color = {
                defaultColor: defaultQestionCaptionTextColor,
                change: function (e) {
                }
            };

            
            // Initialize color pickers
            $(document).find('#ays_survey_color').wpColorPicker(ays_survey_color_picker);
            $(document).find('#ays_survey_background_color').wpColorPicker(ays_survey_background_color_picker);
            $(document).find('#ays_survey_text_color').wpColorPicker(ays_survey_text_color_picker);
            $(document).find('#ays_survey_loader_color').wpColorPicker(ays_survey_loader_color_picker);
            $(document).find('#ays_survey_buttons_text_color').wpColorPicker(ays_survey_buttons_text_color_picker);
            $(document).find('#ays_survey_start_page_background_color').wpColorPicker(ays_survey_start_page_background_color_picker);
            $(document).find('#ays_survey_start_page_text_color').wpColorPicker(ays_survey_start_page_text_color_picker);
            $(document).find('#ays_survey_button_bg_color').wpColorPicker(ays_survey_buttons_background_color_picker);
            $(document).find('#ays_survey_title_box_shadow_color').wpColorPicker(ays_survey_title_box_shadow_color_picker);
            $(document).find('#ays_survey_pagination_text_color,#ays_survey_pagination_text_color_mobile').wpColorPicker(ays_survey_pagination_text_color);
            $(document).find('#ays_survey_full_screen_button_color').wpColorPicker(ays_survey_full_screen_button_color);
            $(document).find('#ays_survey_question_caption_text_color,#ays_survey_question_caption_text_color_mobile').wpColorPicker(ays_survey_question_caption_text_color);
        }

        $(document).find('#ays_survey_buttons_size').aysDropdown({
            onChange: function(value, text, $choice){
                buttonsSizeChange( value );
            }
        });

        $(document).find('#ays_survey_buttons_alignment,#ays_survey_buttons_alignment_mobile').aysDropdown();

        // var SurveyButtonsSize = $(document).find('#ays_survey_buttons_size').aysDropdown('get value');
        // buttonsSizeChange( SurveyButtonsSize, false );
        
        function buttonsSizeChange( buttonsSize ){
            var buttonsFontSize,
                buttonsLeftRightPadding,
                buttonsTopBottomPadding,
                buttonsBorderRadiusMobile,
                buttonsBorderRadius;

            switch(buttonsSize){
                case "small":
                    buttonsFontSize = 11;
                    buttonsLeftRightPadding = 11;
                    buttonsTopBottomPadding = 0;
                    buttonsBorderRadius = 4;
                    buttonsBorderRadiusMobile = 4;
                    break;
                case "large":
                    buttonsFontSize = 17;
                    buttonsLeftRightPadding = 27;
                    buttonsTopBottomPadding = 3;
                    buttonsBorderRadius = 4;
                    buttonsBorderRadiusMobile = 4;
                    break;
                default:
                    buttonsFontSize = 14;
                    buttonsLeftRightPadding = 24;
                    buttonsTopBottomPadding = 0;
                    buttonsBorderRadius = 4;
                    buttonsBorderRadiusMobile = 4;
                break;
            }

            $(document).find('#ays_survey_buttons_font_size').val(buttonsFontSize);
            $(document).find('#ays_survey_buttons_left_right_padding').val(buttonsLeftRightPadding);
            $(document).find('#ays_survey_buttons_top_bottom_padding').val(buttonsTopBottomPadding);
            $(document).find('#ays_survey_buttons_border_radius').val(buttonsBorderRadius);
            $(document).find('#ays_survey_buttons_border_radius_mobile').val(buttonsBorderRadius);

            $(document).find('.ays_buttons_div input[name="next"]').css('font-size', buttonsFontSize + 'px');
            $(document).find('.ays_buttons_div input[name="next"]').css('padding', buttonsTopBottomPadding+'px '+ buttonsLeftRightPadding+'px');
            $(document).find('.ays_buttons_div input[name="next"]').css('border-radius', buttonsBorderRadius + 'px');
        }

        
        if($(document).find('.ays-top-menu').width() <= $(document).find('div.ays-top-tab-wrapper').width()){
            $(document).find('.ays_menu_left').css('display', 'flex');
            $(document).find('.ays_menu_right').css('display', 'flex');
        }
        $(window).resize(function(){
            if($(document).find('.ays-top-menu').width() < $(document).find('div.ays-top-tab-wrapper').width()){
                $(document).find('.ays_menu_left').css('display', 'flex');
                $(document).find('.ays_menu_right').css('display', 'flex');
            }else{
                $(document).find('.ays_menu_left').css('display', 'none');
                $(document).find('.ays_menu_right').css('display', 'none');
                $(document).find('div.ays-top-tab-wrapper').css('transform', 'translate(0px)');
            }
        });
        var menuItemWidths0 = [];
        var menuItemWidths = [];
        $(document).find('.ays-top-tab-wrapper .nav-tab').each(function(){
            var $this = $(this);
            menuItemWidths0.push($this.outerWidth());
        });

        for(var i = 0; i < menuItemWidths0.length; i+=2){
            if(menuItemWidths0.length <= i+1){
                menuItemWidths.push(menuItemWidths0[i]);
            }else{
                menuItemWidths.push(menuItemWidths0[i]+menuItemWidths0[i+1]);
            }
        }
        var menuItemWidth = 0;
        for(var i = 0; i < menuItemWidths.length; i++){
            menuItemWidth += menuItemWidths[i];
        }
        menuItemWidth = menuItemWidth / menuItemWidths.length;

        $(document).on('click', '.ays_menu_left', function(){
            var scroll = parseInt($(this).attr('data-scroll'));
            scroll -= menuItemWidth;
            if(scroll < 0){
                scroll = 0;
            }
            $(document).find('div.ays-top-tab-wrapper').css('transform', 'translate(-'+scroll+'px)');
            $(this).attr('data-scroll', scroll);
            $(document).find('.ays_menu_right').attr('data-scroll', scroll);
        });
        $(document).on('click', '.ays_menu_right', function(){
            var scroll = parseInt($(this).attr('data-scroll'));
            var howTranslate = $(document).find('div.ays-top-tab-wrapper').width() - $(document).find('.ays-top-menu').width();
            howTranslate += 7;
            if(scroll == -1){
                scroll = menuItemWidth;
            }
            scroll += menuItemWidth;
            if(scroll > howTranslate){
                scroll = Math.abs(howTranslate);
            }
            $(document).find('div.ays-top-tab-wrapper').css('transform', 'translate(-'+scroll+'px)');
            $(this).attr('data-scroll', scroll);
            $(document).find('.ays_menu_left').attr('data-scroll', scroll);
        });

        $(document).find('.ays-survey-reset-styles-button').on("click", function(e){
            e.preventDefault();
            // Change theme with color (trigger)
            $(document).find("#ays-survey-classic_light").prop('checked', true).change();

            // Set values where value is empty by default at once (for all options)
            $(document).find("#ays_survey_width,#ays_survey_mobile_width,#ays_mobile_max_width,#ays_survey_question_image_width,#ays_survey_question_image_height,#ays_survey_question_image_height_mobile,#ays_survey_custom_class").val('');
            // Set dropdowns in pixels
            $(document).find("#ays_survey_width_by_percentage_px").aysDropdown('set selected', 'pixels');
            // Set dropdowns in percentage
            $(document).find("#ays_survey_mobile_width_by_percentage_px").aysDropdown('set selected', 'percentage');
            // Set all images to defalut (no image)
            $(document).find("#tab2 .removeImage,#tab2 .removeCoverImage").trigger('click');
            // Set dropdowns where value is left (for all options)
            $(document).find("#ays_survey_title_alignment,#ays_survey_title_alignment_mobile,#ays_survey_section_title_alignment,#ays_survey_section_title_alignment_mobile,#ays_survey_section_description_alignment,#ays_survey_section_description_alignment_mobile,#ays_survey_question_title_alignment,#ays_survey_answers_view_alignment,#ays_survey_buttons_alignment,#ays_survey_buttons_alignment_mobile").aysDropdown('set selected', 'left');
            // Title font size
            $(document).find("#ays_survey_title_font_size,#ays_survey_title_font_size_for_mobile").val(30);
            // Survey title letter spacing
            $(document).find("#ays_survey_title_letter_spacing").val(0);
            // Survey title letter spacing
            $(document).find("#ays_survey_title_letter_spacing_mobile").val(0);
            // Disabel title box shadow            
            $(document).find("#ays_survey_title_box_shadow_enable").prop('checked' , false).change();
            // Section title font size
            $(document).find("#ays_survey_section_title_font_size,#ays_survey_section_title_font_size_mobile").val(32);
            // Section title letter spacing            
            $(document).find("#ays_survey_section_title_letter_spacing").val(0);
            // Section title letter spacing mobile        
            $(document).find("#ays_survey_section_title_letter_spacing_mobile").val(0);
            // Section description font size            
            $(document).find("#ays_survey_section_description_font_size,#ays_survey_section_description_font_size_mobile").val(14);
            // Section description letter spacing            
            $(document).find("#ays_survey_section_description_letter_spacing").val(0);
            $(document).find("#ays_survey_section_description_letter_spacing_mobile").val(0);

            // == Question styles ==
                // Section question font size            
                $(document).find("#ays_survey_question_font_size,#ays_survey_question_font_size_mobile").val(16);
                // Set dropdowns where value is cover (for all options)
                $(document).find("#ays_survey_question_image_sizing,#ays_survey_answers_object_fit,#ays_survey_answers_object_fit").aysDropdown('set selected', 'cover');
                // Question font size
                $(document).find("#ays_survey_question_padding").val(24);
                // Question font size mobile
                $(document).find("#ays_survey_question_padding_mobile").val(24);
                // Question caption text alignment
                $(document).find("#ays_survey_question_caption_text_alignment").aysDropdown('set selected', 'center');
                // Question caption text alignment on mobile
                $(document).find("#ays_survey_question_caption_text_alignment_on_mobile").aysDropdown('set selected', 'center');
            // == ==

            // == Answer styles ==
                // Answer font size            
                $(document).find("#ays_survey_answer_font_size,#ays_survey_answer_font_size_on_mobile").val(15);
                // Answer letter spacing            
                $(document).find("#ays_survey_answer_letter_spacing").val(0);
                // Answer letter spacing on mobile
                $(document).find("#ays_survey_answer_letter_spacing_mobile").val(0);
                // Answer view
                $(document).find("#ays_survey_answers_view").aysDropdown('set selected', 'list');
                // Answer padding
                $(document).find("#ays_survey_answers_padding").val(8);
                // Answer padding mobile
                $(document).find("#ays_survey_answers_padding_mobile").val(8);
                // Answer gap
                $(document).find("#ays_survey_answers_gap").val(0);
                // Answer gap mobile
                $(document).find("#ays_survey_answers_gap_mobile").val(0);
                // Answer image size
                $(document).find("#ays_survey_answers_image_size").val(195);
                // Answer image size mobile
                $(document).find("#ays_survey_answers_image_size_mobile").val(195);
            // == ==

            // == Button styles ==
            // Button size
                $(document).find("#ays_survey_buttons_size").aysDropdown('set selected', 'medium');
                // Button font size
                $(document).find("#ays_survey_buttons_font_size,#ays_survey_buttons_mobile_font_size").val(14);
                // Button border-radius
                $(document).find("#ays_survey_buttons_border_radius").val(3);
                // Button border-radius
                $(document).find("#ays_survey_buttons_border_radius_mobile").val(3);
                // Button top distance
                $(document).find("#ays_survey_buttons_top_distance,#ays_survey_buttons_top_distance_mobile").val(10);
                // Button text letter spacing
                $(document).find("#ays_survey_buttons_text_letter_spacing").val(0);
            // == ==

            setTimeout(function(){
                if($(document).find('#ays_survey_custom_css').length > 0){
                    if(wp.codeEditor){
                        $(document).find('#ays_survey_custom_css').next('.CodeMirror').remove();
                        $(document).find('#ays_survey_custom_css').val('');
                        wp.codeEditor.initialize($(document).find('#ays_survey_custom_css'), cm_settings);
                    }
                }
            }, 100);

            $(document).find("#tab2").goToNormal();
            
        });
        
    });
})(jQuery);
