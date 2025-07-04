(function ($) {
    'use strict';
    $.fn.serializeFormJSON = function () {
        var o = {},
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

    window.temporary_deactivation_flag = false;


    $(document).on('click', '[data-slug="survey-maker"] .deactivate a', function () {
        swal({
            html:"<h2>Do you want to upgrade to Pro version or permanently delete the plugin?</h2><ul><li>Upgrade: Your data will be saved for upgrade.</li><li>Deactivate: Your data will be deleted completely.</li></ul>",
            footer: '<a href="javascript:void(0);" class="ays-survey-temporary-deactivation">Temporary deactivation</a>',
            type: 'question',
            showCloseButton: true,
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Upgrade',
            cancelButtonText: 'Deactivate',
            confirmButtonClass: "ays-survey-upgrade-button",            
            cancelButtonClass: "ays-survey-cancel-button",
            customClass: "ays-survey-deactivate-popup",
        }).then(function(result) {
            
            if( result.dismiss && result.dismiss == 'close' ){
                return false;
            }

            var feedback_container = $(document).find('.ays-survey-dialog-widget');
            var upgrade_plugin = false;
            if (result.value) upgrade_plugin = true;
            var data = {
                action: 'deactivate_plugin_option_sm', 
                upgrade_plugin: upgrade_plugin
            };
            $.ajax({
                url: SurveyMakerAdmin.ajaxUrl,
                method: 'post',
                dataType: 'json',
                data: data,
                beforeSend: function( xhr ) {
                    if(window.temporary_deactivation_flag === false && feedback_container.length > 0){
                        if(!feedback_container.hasClass('ays-survey-dialog-widget-show')){
                            feedback_container.css('display', 'flex');
                            feedback_container.addClass('ays-survey-dialog-widget-show');
                        }
                    }
                },

                success:function () {
                    if(window.temporary_deactivation_flag === false && feedback_container.length > 0){
                        if(!feedback_container.hasClass('ays-survey-dialog-widget-show')){
                            feedback_container.css('display', 'flex');
                        }
                    }
                    else{
                        window.location = $(document).find('[data-slug="survey-maker"]').find('.deactivate').find('a').attr('href');
                    }
                }
            });
        });
        return false;
    });

    $(document).on('click', '.ays-survey-temporary-deactivation', function (e) {
        e.preventDefault();
        window.temporary_deactivation_flag = true;
        $(document).find('.ays-survey-upgrade-button').trigger('click');

    });

    $(document).on('click', '.ays-survey-dialog-button', function (e) {
        e.preventDefault();

        var _this  = $(this);
        var parent = _this.parents('.ays-survey-dialog-widget');
        var form   = parent.find('form');

        var data = form.serializeFormJSON();

        var type = _this.attr('data-type');
        data.type = type;
        data._ajax_nonce = data.ays_survey_deactivate_feedback_nonce;

        $.ajax({
            url: SurveyMakerAdmin.ajaxUrl,
            method: 'post',
            dataType: 'json',
            data: data,
            success:function () {
                parent.css('display', 'none');
                window.location = $(document).find('[data-slug="survey-maker"]').find('.deactivate').find('a').attr('href');
            },
            error: function(){
                parent.css('display', 'none');
                window.location = $(document).find('[data-slug="survey-maker"]').find('.deactivate').find('a').attr('href');
            }
        });
    });

    // Close Feedback popup clicking outside
    $(document).find('.ays-survey-dialog-widget').on('click', function(e){
        var modalBox = $(e.target).attr('class');
        var feedback_container = $(document).find('.ays-survey-dialog-widget');
        if (typeof modalBox != 'undefined' && modalBox != "" && modalBox.indexOf('ays-survey-dialog-widget-show') != -1) {
            if(feedback_container.hasClass('ays-survey-dialog-widget-show')){
                feedback_container.removeClass('ays-survey-dialog-widget-show');
            }
            feedback_container.css('display', 'none');
            window.temporary_deactivation_flag = false;
        }
    });

})(jQuery);