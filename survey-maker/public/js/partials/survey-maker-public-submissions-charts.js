(function($){
    'use strict';
    $(document).ready(function(){

        var surveySubmissionSummaryContainers = $(document).find('.ays-survey-submission-summary-container');

        surveySubmissionSummaryContainers.each(function(){
            var uniqueId = $(this).data('id');
            // Survey per answer count
            var thisAysSurveyPublicChartData = JSON.parse( atob( window.aysSurveyPublicChartData[ uniqueId ] ) );
            
            if ( typeof thisAysSurveyPublicChartData.surveyColor === 'undefined' ) {
                thisAysSurveyPublicChartData.surveyColor = '#FF5722';
            }
    
            $.each( thisAysSurveyPublicChartData.perAnswerData, function(){
                switch( this.question_type ){
                    case "radio":
                    case "yesorno":
                        forRadioType( this, thisAysSurveyPublicChartData );
                    break;
                    case "checkbox":
                        forCheckboxType( this, thisAysSurveyPublicChartData );
                    break;
                    case "select":
                        forRadioType( this, thisAysSurveyPublicChartData );
                    break;
                    case "linear_scale":
                        forLinearScaleType( this, thisAysSurveyPublicChartData );
                    break;
                    case "star":
                        forLinearScaleType( this, thisAysSurveyPublicChartData );
                    break;
                }
            });
        });

        function forRadioType( item, thisAysSurveyPublicChartData ){
            var questionId = item.question_id;
            var dataTypes = [[ aysSurveyPublicChartLangObj.answers ,  aysSurveyPublicChartLangObj.percent ]];
            for (var key in item.answers) {
                dataTypes.push([
                    item.answerTitles[key] + '', item.answers[key]
                ]);
            }
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            
            function drawChart() {

                var data = google.visualization.arrayToDataTable(dataTypes);
                var options = {
                    height: 250,
                    fontSize: 16,
                    chartArea: { 
                        width: '80%',
                        height: '80%'
                    }
                };

                var chart = new google.visualization.PieChart( document.getElementById( 'survey_answer_chart_' + questionId ) );

                chart.draw(data, options);

                //create trigger to resizeEnd event     
                $(window).resize(function() {
                    if(this.resizeTO) clearTimeout(this.resizeTO);
                    this.resizeTO = setTimeout(function() {
                        $(this).trigger('resizeEnd');
                    }, 500);
                });

                //redraw graph when window resize is completed  
                $(window).on('resizeEnd', function() {
                    chart.draw(data, options);
                });
            }
        }
        
        function forCheckboxType( item, thisAysSurveyPublicChartData ){
            var questionId = item.question_id;
            var dataTypes = [[ aysSurveyPublicChartLangObj.answers ,  aysSurveyPublicChartLangObj.count ]];
            var sum_of_answers_count = item.sum_of_answers_count;

            if( ! $.isEmptyObject( item.answers ) ){
                for (var key in item.answers) {
                    dataTypes.push([
                        item.answerTitles[key] + '', item.answers[key]
                    ]);
                }
            }else{
                dataTypes.push([
                    '', 0
                ]);
            }

            google.charts.load('current', {packages: ['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawBasic);

            function drawBasic() {

                var data = google.visualization.arrayToDataTable(dataTypes);
                var groupData = google.visualization.data.group(
                    data,
                    [{column: 0, modifier: function () {return 'total'}, type:'string'}],
                    [{column: 1, aggregation: google.visualization.data.sum, type: 'number'}]
                );
                
                var formatPercent = new google.visualization.NumberFormat({
                    pattern: '#%'
                });
            
                var formatShort = new google.visualization.NumberFormat({
                    pattern: 'short'
                });
            
                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1, {
                    calc: function (dt, row) {
                        if( $.isEmptyObject( item.answers ) ){
                            return amount;
                        }
                        var amount =  formatShort.formatValue(dt.getValue(row, 1));
                        // var percent = formatPercent.formatValue(dt.getValue(row, 1) / groupData.getValue(0, 1));
                        
                        if( sum_of_answers_count == 0 ){
                            var percent = 0;
                        } else {
                            var percent = formatPercent.formatValue(dt.getValue(row, 1) / sum_of_answers_count);
                        }
        
                        return amount + ' (' + percent + ')';
                    },
                    type: 'string',
                    role: 'annotation'
                }]);
            
                var options = {
                    height: 300,
                    fontSize: 14,
                    chartArea: { 
                        width: '50%',
                        height: '80%'
                    },
                    annotations: {
                        alwaysOutside: true
                    },
                    bars: 'horizontal',
                    bar: { groupWidth: "50%" },
                    colors: [ thisAysSurveyPublicChartData.surveyColor ]
                };

                var chart = new google.visualization.BarChart( document.getElementById( 'survey_answer_chart_' + questionId ) );

                chart.draw(view, options);

                //create trigger to resizeEnd event     
                $(window).resize(function() {
                    if(this.resizeTO) clearTimeout(this.resizeTO);
                    this.resizeTO = setTimeout(function() {
                        $(this).trigger('resizeEnd');
                    }, 500);
                });

                //redraw graph when window resize is completed  
                $(window).on('resizeEnd', function() {
                    chart.draw(view, options);
                });
            }
        }

        
        function aysSurveyRgba2hex(orig) {
            if( orig.indexOf('#') !== -1 ){
                return orig;
            }

            var a, isPercent,
            rgb = orig.replace(/\s/g, '').match(/^rgba?\((\d+),(\d+),(\d+),?([^,\s)]+)?/i),
            alpha = (rgb && rgb[4] || "").trim(),
            hex = rgb ?
            (rgb[1] | 1 << 8).toString(16).slice(1) +
            (rgb[2] | 1 << 8).toString(16).slice(1) +
            (rgb[3] | 1 << 8).toString(16).slice(1) : orig;
        
            if (alpha !== "") {
            a = alpha;
            } else {
            a = 0o1;
            }

            // multiply before convert to HEX
            a = ''; //((a * 255) | 1 << 8).toString(16).slice(1)

            if( hex == '000000' || hex == '000' ){
                hex = '3366cc';
            }

            hex = '#' + hex + a;
        
            return hex;
        }


        function forLinearScaleType( item, thisAysSurveyPublicChartData ){

            var questionId = item.question_id;
            var dataTypes = [[ aysSurveyPublicChartLangObj.answers ,  aysSurveyPublicChartLangObj.count , { role: 'style' }]];
        
            var xAxesFrom = "";
            var xAxesTo = "";
            var xAxesLengthMin = "1";
            var xAxesLengthMax = "";
            if(typeof item.labels != "undefined"){
                xAxesFrom =  typeof item.labels.from != "undefined" && item.labels.from != "" ? item.labels.from  : "";
                xAxesTo   =  typeof item.labels.to != "undefined" && item.labels.to != "" ? item.labels.to : "";
                xAxesLengthMax  =  typeof item.labels.length != "undefined" && item.labels.length != "" ? item.labels.length : "";
            }
            var xAxesLength = 5;
            if ( xAxesLengthMax !== "" ) {
                xAxesLength = parseInt(xAxesLengthMax);
            }
        
            var dataValues = {};
        
            for (var i=1; i <= xAxesLength; i++) {
                dataValues[i] = 0;
            }
        
            for (var key in item.answers[questionId]) {
                dataValues[ item.answers[questionId][key] ]++;
            }
        
            var sumOfAnswers = 0;    
            for (var key in dataValues) {
                dataTypes.push([
                    key + '', parseInt( dataValues[key] ), thisAysSurveyPublicChartData.surveyColor
                ]);
                sumOfAnswers += key * dataValues[key];
            }
        
            var avgOfAnswers = ( sumOfAnswers > 0 && (item.sum_of_answers_count && item.sum_of_answers_count > 0) ) ? sumOfAnswers / item.sum_of_answers_count : 0;
            avgOfAnswers = avgOfAnswers.toFixed(2);
                            
            google.charts.load("current", {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable( dataTypes );
                var view = new google.visualization.DataView(data);
                
                var groupData = google.visualization.data.group(
                    data,
                    [{column: 0, modifier: function () {return 'total'}, type:'string'}],
                    [{column: 1, aggregation: google.visualization.data.sum, type: 'number'}]
                );
        
                var formatPercent = new google.visualization.NumberFormat({
                    pattern: '#%'
                });
            
                var formatShort = new google.visualization.NumberFormat({
                    pattern: 'short'
                });
                
                view.setColumns([0, 1, {
                    calc: function (dt, row) {
                        if( jQuery.isEmptyObject( item.answers[questionId] ) ){
                            return amount;
                        }
                        var amount =  formatShort.formatValue(dt.getValue(row, 1));
                        var percent = formatPercent.formatValue(dt.getValue(row, 1) / groupData.getValue(0, 1));
        
                        if( percent == NaN || ( typeof percent == 'string' && percent == 'NaN' ) ){
                            percent = '0%';
                        }
        
                        return amount + ' (' + percent + ')';
                    },
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" 
                } ]);
                var chartTitle = xAxesFrom != "" && xAxesTo != "" ? xAxesLengthMin + " = " + xAxesFrom + " , " + xAxesLengthMax + " = " + xAxesTo : "";
                var options = {
                    height: 300,
                    fontSize: 14,
                    title: chartTitle,
                    titleTextStyle: {
                        fontSize: 13,
                        bold: false,
                        italic: true
                    },
                    chartArea: { 
                        width: '80%',
                        height: '80%'
                    },
                    legend: {
                        position: "none"
                    },
                    annotations: {
                        alwaysOutside: true
                    },
                    bar: {
                        groupWidth: "80%"
                    },
                    colors: [ aysSurveyRgba2hex( thisAysSurveyPublicChartData.surveyColor ) ]
                };
        
                var chartBox = document.getElementById( 'survey_answer_chart_' + questionId );
                var chart = new google.visualization.ColumnChart( chartBox );
                chart.draw(view, options);              
        
                
                //create trigger to resizeEnd event     
                jQuery(window).resize(function() {
                    if(this.resizeTO) clearTimeout(this.resizeTO);
                    this.resizeTO = setTimeout(function() {
                        jQuery(this).trigger('resizeEnd');
                    }, 500);
                });
        
                //redraw graph when window resize is completed  
                jQuery(window).on('resizeEnd', function() {
                    chart.draw(view, options);
                });
            }
        }
    });
})(jQuery);