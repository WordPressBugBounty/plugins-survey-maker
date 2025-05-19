(function( $ ) {
    'use strict';
    $.fn.serializeFormJSON = function () {
        let o = {},
            a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
    
    $.fn.aysModal = function(action){
        let $this = $(this);
        
        var current_popup_id_attr = $this.attr('id');
        var current_popup_id = "";
        var current_popup_class = "";

        if (current_popup_id_attr && current_popup_id_attr != "") {
            current_popup_id = "overlay-" + current_popup_id_attr;
            current_popup_class = "." + current_popup_id;
        }

        switch(action){
            case 'hide':
                $(this).find('.ays-modal-content').css('animation-name', 'zoomOut');
                var removeIframe = $this.find('.ays-modal-body iframe');
                if ( removeIframe.length > 0 ) {
                    $this.find('.ays-modal-body iframe').remove();
                }
                setTimeout(function(){
                    $(document.body).removeClass('modal-open');
                    $(document).find('.ays-modal-backdrop').remove();
                    $this.hide();
                }, 250);
            break;
            case 'hide_remove_video':
                $(this).find('.ays-modal-content').css('animation-name', 'zoomOut');
                $this.find('.ays-modal-body iframe').remove();
                setTimeout(function(){
                    $(document.body).removeClass('modal-open');
                    $(document).find('.ays-modal-backdrop'+ current_popup_class).remove();
                    $this.hide();
                }, 250);
            break;
            case 'show_flex':
                $this.css('display', 'flex');
                $(this).find('.ays-modal-content').css('animation-name', 'zoomIn');
                $(document).find('.modal-backdrop').remove();
                $(document.body).append('<div class="ays-modal-backdrop '+ current_popup_id +'"></div>');
                $(document.body).addClass('modal-open');
            break;
            case 'show': 
            default:
                $this.show();
                $(this).find('.ays-modal-content').css('animation-name', 'zoomIn');
                $(document).find('.modal-backdrop').remove();
                $(document.body).append('<div class="ays-modal-backdrop"></div>');
                $(document.body).addClass('modal-open');
            break;
        }
    };

    $(document).on('click', '.ays-survey-apply-question-changes', function(e){
        var sectionCont = $(document).find('.ays-survey-sections-conteiner');
        var editorPopup = $(document).find('#ays-edit-question-content');
        var questionId = $(this).attr('data-question-id');
        var questionName = $(this).attr('data-question-name');
        var sectionId = $(this).attr('data-section-id');
        var sectionName = $(this).attr('data-section-name');
        var question = sectionCont.find('.ays-survey-section-box[data-id="'+sectionId+'"][data-name="'+sectionName+'"] .ays-survey-question-answer-conteiner[data-id="'+questionId+'"][data-name="'+questionName+'"]');

        var editor = window.tinyMCE.get('ays_survey_question_editor');
        var questionContent = '';

        question.find('.ays-survey-open-question-editor-flag').val('on');

        editorPopup.find('.ays-survey-preloader').css('display', 'flex');

        if ( editorPopup.find("#wp-ays_survey_question_editor-wrap").hasClass("tmce-active")){
            questionContent = editor.getContent();
        }else{
            questionContent = editorPopup.find('#ays_survey_question_editor').val();
        }
        var action = 'ays_survey_maker_live_preview_content';
        var data = {};
        data.action = action;
        data.content = questionContent;
        $.ajax({
            url: ajaxurl,
            method: 'post',
            dataType: 'json',
            data: data,
            success: function(response) {
                if (response.status) {
                    editorPopup.find('.ays-survey-preloader').css('display', 'none');
                    question.find('textarea.ays-survey-question-input-textarea').val( questionContent );
                    question.find('.ays-survey-question-preview-box').html( response.content );

                    question.find('.ays-survey-question-input-box').addClass('display_none');
                    question.find('.ays-survey-question-preview-box').removeClass('display_none');

                    editorPopup.find('.ays-survey-apply-question-changes').attr( 'data-question-id', '' );
                    editorPopup.find('.ays-survey-apply-question-changes').attr( 'data-question-name', '' );
                    editorPopup.find('.ays-survey-back-to-textarea').attr( 'data-question-id', '' );
                    editorPopup.find('.ays-survey-back-to-textarea').attr( 'data-question-name', '' );
                    var SurveyTinyMCE = window.tinyMCE.get('ays_survey_question_editor');
                    if(SurveyTinyMCE != null){
                        SurveyTinyMCE.setContent( '' );
                    }
                    else{
                        $(document).find('#ays_survey_question_editor').val(" ");
                    }
                    
                    editorPopup.aysEditorModal('hide');
                }
            }
        });
    });

    // Open results more information popup window
    $(document).on('click', '.ays_survey_results', function(e){

        if(!($(e.target).hasClass('ays_confirm_del') || $(e.target).hasClass('ays_result_delete'))){

            e.preventDefault();

            var this_element = $(this);

            $(document).find('div.ays-survey-preloader').css('display', 'flex');
            $(document).find('#ays-results-modal').aysModal('show');
            var submission_id = $(this).find('.ays-show-results').data('result');
            var surveyId = $(document).find('.ays_number_of_result').attr('data-id');
            $.ajax({
                url: ajaxurl,
                method: 'post',
                dataType: 'json',
                data: {
                    action: 'ays_survey_show_results',
                    survey_id: surveyId,
                    submission_id: submission_id,
                },
                success: function(response){
                    if(response.status === true){
                        $('div#ays-results-body').html(response.rows);
                        $(document).find('div.ays-survey-preloader').css('display', 'none');
                        if($(this_element).hasClass('ays_read_result')){
                            $(this_element).removeClass('ays_read_result');

                            var count = parseInt($(document).find('.ays-survey-results-bage').eq(0).text()) -1;
                            if(count == 0){
                                $(document).find('.ays-survey-results-bage').remove();
                            } else {
                                $(document).find('.ays-survey-results-bage').text(count);
                            }
                        }
                        
                    }else{
                        swal.fire({
                            type: 'info',
                            html: "<h2>"+ SurveyMakerAdmin.loadResource +"</h2><br><h6>"+ SurveyMakerAdmin.dataDeleted +"</h6>",
                            confirmButtonText: SurveyMakerAdmin.okSurvey,

                        }).then(function(res) {
                            $(document).find('div.ays-survey-preloader').css('display', 'none');
                            if($(this_element).hasClass('ays_read_result')){
                                $(this_element).removeClass('ays_read_result');
                                var count = parseInt($(document).find('.ays-survey-results-bage').eq(0).text()) -1;
                                if(count == 0){
                                    $(document).find('.ays-survey-results-bage').remove();
                                } else {
                                    $(document).find('.ays-survey-results-bage').text(count);
                                }
                            }
                            
                            $(document).find('.ays-modal').aysModal('hide');
                        });
                    }
                },
                error: function(){
                    swal.fire({
                        type: 'info',
                        html: "<h2>"+ SurveyMakerAdmin.loadResource +"</h2><br><h6>"+ SurveyMakerAdmin.dataDeleted +"</h6>",
                        confirmButtonText: SurveyMakerAdmin.okSurvey,
                    }).then(function(res) {
                        $(document).find('div.ays-survey-preloader').css('display', 'none');
                        if($(this_element).hasClass('ays_read_result')){
                            $(this_element).removeClass('ays_read_result');
                            var count = parseInt($(document).find('.ays-survey-results-bage').eq(0).text()) -1;
                            if(count == 0){
                                $(document).find('.ays-survey-results-bage').remove();
                            } else {
                                $(document).find('.ays-survey-results-bage').text(count);
                            }
                        }
                        
                        $(document).find('.ays-modal').aysModal('hide');
                    });
                }
            });
        }
    
    })

})( jQuery );
