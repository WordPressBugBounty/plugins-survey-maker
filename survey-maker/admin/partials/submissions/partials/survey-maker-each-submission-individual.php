<?php
extract($args);
?>
<div class="">
    <div class="wrap">
        <div class="ays_survey_container_each_result">
            <?php if( intval($submission_count_and_ids['submission_count']) > 0 ):?>
                <div class="ays_survey_each_sub_user_info">
                    <div class="ays_survey_each_sub_user_info_header">
                        <div class="ays_survey_each_sub_user_info_header_text">
                            <span><?php echo esc_html__("User Information" , "survey-maker"); ?></span>
                        </div>
                        <div class="ays_survey_each_sub_user_info_header_button">
                            <button type="button" class="button ays_help" data-toggle="tooltip" title="<?php echo esc_attr__('Click for copy',"survey-maker");?>" data-clipboard-text="<?php echo $survey_data_formated_for_clipboard; ?>"><?php echo esc_html__("Copy user info to clipboard" , "survey-maker"); ?></button>
                        </div>
                    </div>
                    <div class="ays_survey_each_sub_user_info_body ays_survey_copyable_box">
                        <div class="ays_survey_each_sub_user_info_columns">
                            <div ><?php echo esc_html__("User Name" , "survey-maker"); ?></div>
                            <div class="ays_survey_each_sub_user_info_name"><?php echo esc_attr($individual_user_name); ?></div>
                        </div>
                        <div class="ays_survey_each_sub_user_info_columns">
                            <div ><?php echo esc_html__("User Email" , "survey-maker"); ?></div>
                            <div class="ays_survey_each_sub_user_info_email"><?php echo esc_attr($individual_user_email); ?></div>
                        </div>
                        <div class="ays_survey_each_sub_user_info_columns">
                            <div ><?php echo esc_html__("User IP" , "survey-maker");   ?></div>
                            <div class="ays_survey_each_sub_user_info_user_ip"><?php echo esc_attr($individual_user_ip); ?></div>
                        </div>
                        <div class="ays_survey_each_sub_user_info_columns">
                            <div ><?php echo esc_html__("Submission Date" , "survey-maker"); ?></div>
                            <div class="ays_survey_each_sub_user_info_sub_date"><?php echo esc_attr($individual_user_date); ?></div>
                        </div>
                        <div class="ays_survey_each_sub_user_info_columns">
                            <div ><?php echo esc_html__("Submission ID" , "survey-maker"); ?></div>
                            <div class="ays_survey_each_sub_user_info_sub_id"><?php echo esc_attr($individual_user_sub_id); ?></div>
                        </div>
						<?php if( isset($individual_user_device_type) && $individual_user_device_type != '' ): ?>
                            <div class="ays_survey_each_sub_user_info_columns">
                                <div><?php echo esc_html__("Device" , "survey-maker"); ?></div>
                                <div class="ays_survey_each_sub_user_info_device_type"><?php echo esc_html(ucfirst($individual_user_device_type));?></div>
                            </div>
                        <?php endif; ?>
                        <div class="ays_survey_each_sub_user_info_columns <?php echo ($individual_user_password == "") ? "display_none" : "";  ?>">
                            <div ><?php echo esc_html__("User password" , "survey-maker"); ?></div>
                            <div class="ays_survey_each_sub_user_info_password"><?php echo esc_attr($individual_user_password); ?></div>
                        </div>
                    </div>
                </div>
			<?php endif;?>
            <div class="question_result_container">
                <div class="ays_question_answer" style="position:relative;">
                    <div class="ays-survey-submission-sections">
						<?php
						$checked = '';
						$disabled = '';
						$selected = '';
						$color = '';
						if( is_array( $ays_survey_individual_questions['sections'] ) ):
							foreach ($ays_survey_individual_questions['sections'] as $section_key => $section) {
								?>
                                <div class="ays-survey-submission-section">
                                    <div class="ays_survey_name" style="border-top-color: <?php echo esc_attr($survey_for_charts); ?>;">
                                        <h3><?php echo stripslashes( $section['title'] ); ?></h3>
                                        <p><?php echo ($survey_allow_html_in_section_description) ? strip_tags(htmlspecialchars_decode($section['description'] )) : nl2br( $section['description'] ) ?></p>
                                    </div>
									<?php
									foreach ( $section['questions'] as $q_key => $question ) {
										?>
                                        <div class="ays_questions_answers" data-id="<?php echo esc_attr($question['id']); ?>"  data-type="<?php echo esc_attr($question['type']); ?>" style="border-left-color: <?php echo esc_attr($survey_for_charts); ?>;">
                                            <div style="font-size: 23px;"><?php echo stripslashes( nl2br( $question['question'] ) ); ?></div>
											<?php
											$question_type_content = '';
											$user_answer = isset( $ays_survey_individual_questions['questions'][ $question['id'] ] ) ? $ays_survey_individual_questions['questions'][ $question['id'] ] : '';

											$user_explanation = isset( $ays_survey_individual_questions['questions'][ $question['id'] ]['user_explanation'] ) ? $ays_survey_individual_questions['questions'][ $question['id'] ]['user_explanation'] : '';
											$user_explanation = stripslashes( $user_explanation );
											$enable_user_explanation = false;
											if(isset( $question['options'] )){
												$enable_user_explanation = isset( $question['options']['user_explanation'] ) && $question['options']['user_explanation'] == "on" ? true : false;
											}

											$other_answer = '';
											if( isset( $user_answer['otherAnswer'] ) ){
												$other_answer = $user_answer['otherAnswer'];
											}
											if( isset( $user_answer['answer'] ) ){
												$user_answer = $user_answer['answer'];
											}
											$question_type_content = '';
											if( $question['type'] == 'select' ){
												$question_type_content .= '<div class="ays_each_question_answer">
                                            <select class="ays-survey-submission-select" disabled>
                                                <option value="">' . __( "Choose", "survey-maker" ) . '</option>';
											}

											if( in_array( $question['type'], $text_types ) ){
												if( !is_array($user_answer) ){
													$user_answer = $user_answer;
												}
												else{
													$user_answer = '';
												}
												$question_type_content .= '<div class="ays_each_question_answer">
                                            <p class="ays_text_answer">' . $user_answer . '</p>
                                        </div>';
											}

											if( $question['type'] == 'linear_scale' ){

												$linear_scale_label_1 = isset( $question['options']['linear_scale_1'] ) && $question['options']['linear_scale_1'] != '' ? $question['options']['linear_scale_1'] : '';
												$linear_scale_label_2 = isset( $question['options']['linear_scale_2'] ) && $question['options']['linear_scale_2'] != '' ? $question['options']['linear_scale_2'] : '';
												$linear_scale_length = isset( $question['options']['scale_length'] ) && $question['options']['scale_length'] != '' ? absint( $question['options']['scale_length'] ) : 5;

												$question_type_content .= '<div class="ays_each_question_answer">';

												$question_type_content .= '<div class="ays-survey-answer-linear-scale">
                                                <label class="ays-survey-answer-linear-scale-label">
                                                    <div class="ays-survey-answer-linear-scale-radio-label" dir="auto"></div>
                                                    <div class="ays-survey-answer-linear-scale-radio">' . stripslashes( $linear_scale_label_1 ) . '</div>
                                                </label>';

												for ($i=1; $i <= $linear_scale_length; $i++) {
													$checked = '';
													if( intval( $user_answer ) == $i ){
														$checked = 'checked';
													}

													$question_type_content .= '<label class="ays-survey-answer-label">
                                                        <div class="ays-survey-answer-linear-scale-radio-label" dir="auto">' . $i . '</div>
                                                        <div class="ays-survey-answer-linear-scale-radio">
                                                            <input type="radio" name="ays-survey-question-linear-scale-' . $question['id'] . '" disabled ' . $checked . ' value="'.$i.'" data-id="' . $i . '" >
                                                            <div class="ays-survey-answer-label-content">
                                                                <div class="ays-survey-answer-icon-content">
                                                                    <div class="ays-survey-answer-icon-ink"></div>
                                                                    <div class="ays-survey-answer-icon-content-1">
                                                                        <div class="ays-survey-answer-icon-content-2" style="border-color:'.$survey_for_charts.' !important;">
                                                                            <div class="ays-survey-answer-icon-content-3" style="border-color:'.$survey_for_charts.' !important;"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>';
												}

												$question_type_content .= '<label class="ays-survey-answer-linear-scale-label">
                                                    <div class="ays-survey-answer-linear-scale-radio-label" dir="auto"></div>
                                                    <div class="ays-survey-answer-linear-scale-radio">' . stripslashes( $linear_scale_label_2 ) . '</div>
                                                </label>
                                            </div>
                                        </div>';
											}

											if( $question['type'] == 'star' ){

												$star_label_1 = isset( $question['options']['star_1'] ) && $question['options']['star_1'] != '' ? $question['options']['star_1'] : '';
												$star_label_2 = isset( $question['options']['star_2'] ) && $question['options']['star_2'] != '' ? $question['options']['star_2'] : '';
												$star_scale_length = isset( $question['options']['star_scale_length'] ) && $question['options']['star_scale_length'] != '' ? absint( $question['options']['star_scale_length'] ) : 5;

												$question_type_content .= '<div class="ays_each_question_answer">';

												$question_type_content .= '<div class="ays-survey-answer-star">
                                                <label class="ays-survey-answer-star-label">
                                                    <div class="ays-survey-answer-star-radio-label" dir="auto"></div>
                                                    <div class="ays-survey-answer-star-radio">' . stripslashes( $star_label_1 ) . '</div>
                                                </label>';

												for ($i=1; $i <= $star_scale_length; $i++) {
													$checked = '';
													$icon_class = 'fa_star_o';
													if( intval( $user_answer ) >= $i ){
														$checked = 'checked';
														$icon_class = 'fa_star';
													}

													$question_type_content .= '<label class="ays-survey-answer-label">
                                                        <div class="ays-survey-answer-star-radio-label" dir="auto">' . $i . '</div>
                                                        <div class="ays-survey-answer-star-radio">
                                                            <input type="radio" name="ays-survey-question-star-' . $question['id'] . '" disabled ' . $checked . ' value="'.$i.'" data-id="' . $i . '" >
                                                            <i class="fa ' . $icon_class . ' ays-survey-star-icon"></i>
                                                        </div>
                                                    </label>';
												}

												$question_type_content .= '<label class="ays-survey-answer-star-label">
                                                    <div class="ays-survey-answer-star-radio-label" dir="auto"></div>
                                                    <div class="ays-survey-answer-star-radio">' . stripslashes( $star_label_2 ) . '</div>
                                                </label>
                                            </div>
                                        </div>';
											}

											if( $question['type'] == 'range' ){

												$range_type_length = isset( $question['options']['range_length'] ) && $question['options']['range_length'] != '' ? esc_attr(intval($question['options']['range_length'])) : 100;
												$range_type_step_length = isset( $question['options']['range_step_length'] ) && $question['options']['range_step_length'] != '' ? esc_attr(intval($question['options']['range_step_length'])) : 1;
												$range_type_min_value     = (isset( $question['options']['range_min_value'] ) && $question['options']['range_min_value'] != '') ? esc_attr(intval($question['options']['range_min_value'])) : 0;
												$range_type_default_value = (isset( $question['options']['range_default_value'] ) && $question['options']['range_default_value'] != '') ? esc_attr(intval($question['options']['range_default_value'])) : 0;
												$range_type_min_label     = (isset( $question['options']['range_min_label'] ) ) ? esc_attr($question['options']['range_min_label']) : "Min";
                                                $range_type_max_label     = (isset( $question['options']['range_max_label'] ) ) ? esc_attr($question['options']['range_max_label']) : "Max";
												if($range_type_length == 0){
													$range_type_length = 100;
												}
												if($range_type_step_length == 0){
													$range_type_step_length = 1;
												}
												if($user_answer == ""){
													$user_answer = 0;
												}
												$user_range_answer = absint( $user_answer );
												$left = 0;

												$left = ( $user_range_answer - $range_type_min_value ) * 100 / ( $range_type_length - $range_type_min_value );

												$leftOffset = 'calc( ' .  $left . '% + ' . ( 9 - $left * 0.18 ) . 'px )';
												$question_type_content .= '<div class="ays_each_question_answer">';
												$question_type_content .= '<div class="ays-survey-answer-range-type-main">';
												$question_type_content .= '<div class="ays-survey-answer-range-type-min-max-val">' .$range_type_min_label . ' ' . $range_type_min_value . '</div>';

												$question_type_content .= '<div class="ays-survey-answer-range-type-range">';
												$question_type_content .= '<span class="ays-survey-answer-range-type-info-text" style="left: '. $leftOffset .';">'.$user_range_answer.'</span>';
												$question_type_content .= '<input type="range" class="ays-survey-range-type-input" min="' . $range_type_min_value . '" max="'.$range_type_length.'" value="'.$user_range_answer.'" disabled>';
												$question_type_content .= '</div>';

												$question_type_content .= '<div class="ays-survey-answer-range-type-min-max-val">' . $range_type_max_label . ' ' . $range_type_length . '</div>';
												$question_type_content .= '</div>';
												$question_type_content .= '</div>';
											}


											$loop_iteration = 0;
											$width = 0;

											foreach ($question['answers'] as $key => $answer) {
												$checked = '';
												$selected = '';
												$disabled = 'disabled';
												$color = '#777';

												$answer_content = $allow_html_in_answers ? $answer['answer'] : htmlentities( $answer['answer'] );
												switch( $question['type'] ){
													case 'radio':
													case 'yesorno':
														if( intval( $user_answer ) == intval( $answer['id'] ) ){
															$checked = 'checked';
														}
														$question_type_content .= '<div class="ays_each_question_answer">
                                                    <label style="color:' . $color . '">
                                                        <input type="radio" ' . $checked . ' ' . $disabled . ' data-id="' . $answer['id'] . '"/>
                                                        <div class="ays-survey-answer-label-content">
                                                            <div class="ays-survey-answer-icon-content">
                                                                <div class="ays-survey-answer-icon-ink"></div>
                                                                <div class="ays-survey-answer-icon-content-1">
                                                                    <div class="ays-survey-answer-icon-content-2" style="border-color:'.$survey_for_charts.' !important;">
                                                                        <div class="ays-survey-answer-icon-content-3" style="border-color:'.$survey_for_charts.' !important;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span style="font-size: 17px;">' . stripslashes( $answer_content ) . '</span> 
                                                        </div>
                                                    </label>
                                                </div>';
														break;
													case 'checkbox':
														if( is_array( $user_answer ) && !empty( $user_answer ) && in_array( $answer['id'], $user_answer ) ){
															$checked = 'checked';
														}elseif( intval( $user_answer ) == intval( $answer['id'] ) ){
															$checked = 'checked';
														}
														$question_type_content .= '<div class="ays_each_question_answer">
                                                    <label style="color:' . $color . '">
                                                        <input type="checkbox" ' . $checked . ' ' . $disabled . ' data-id="' . $answer['id'] . '"/>
                                                        <div class="ays-survey-answer-label-content">
                                                            <div class="ays-survey-answer-icon-content">
                                                                <div class="ays-survey-answer-icon-ink"></div>
                                                                <div class="ays-survey-answer-icon-content-1">
                                                                    <div class="ays-survey-answer-icon-content-2" style="border-color:'.$survey_for_charts.' !important;">
                                                                        <div class="ays-survey-answer-icon-content-3" style="border-color:'.$survey_for_charts.' !important;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span style="font-size: 17px;">' . stripslashes( $answer_content ) . '</span> 
                                                        </div>
                                                    </label>
                                                </div>';
														break;
													case 'select':
														if( intval( $user_answer ) == intval( $answer['id'] ) ){
															$selected = 'selected';
														}
														$question_type_content .= '<option value=' . $answer['id'] . ' ' . $selected . '>' . stripslashes( $answer_content ) . '</option>';
														break;													
												}
												$loop_iteration++;
											}

											if( ( $question['type'] == 'radio' || $question['type'] == 'checkbox' || $question['type'] == 'yesorno' ) && $question['user_variant'] == 'on' ){
												$checked = '';
												if( $question['type'] == 'radio' && intval( $user_answer ) == 0 && $other_answer != "" ){
													$checked = 'checked';
												}

												if( $question['type'] == 'checkbox' && !empty( $user_answer ) && in_array( '0', $user_answer ) ){
													$checked = 'checked';
												}

												if( $question['type'] == 'yesorno' && intval( $user_answer ) == 0 && $other_answer != "" ){
													$checked = 'checked';
												}

												$input_type = $question['type'];
												if( $question['type'] == 'yesorno' ){
													$input_type = 'radio';
												}

												$question_type_content .= '<div class="ays_each_question_answer ays-survey-answer-label-other">
                                            <label style="color:' . $color . '">
                                                <input type="'. $input_type .'" ' . $checked . ' ' . $disabled . ' data-id="0"/>
                                                <div class="ays-survey-answer-label-content">
                                                    <div class="ays-survey-answer-icon-content">
                                                        <div class="ays-survey-answer-icon-ink"></div>
                                                        <div class="ays-survey-answer-icon-content-1">
                                                            <div class="ays-survey-answer-icon-content-2" style="border-color:'.$survey_for_charts.' !important;">
                                                                <div class="ays-survey-answer-icon-content-3" style="border-color:'.$survey_for_charts.' !important;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span style="font-size: 17px;">' . __( 'Other', "survey-maker" ) . ':</span>
                                                </div>
                                            </label>
                                            <div class="ays-survey-answer-other-text">
                                                <input class="ays-survey-answer-other-input ays-survey-question-input ays-survey-input" disabled type="text" value="' . stripslashes( esc_attr( $other_answer ) ) . '" autocomplete="off" tabindex="0">
                                                <div class="ays-survey-input-underline" style="margin:0;"></div>
                                                <div class="ays-survey-input-underline-animation" style="margin:0;background-color: '.$survey_for_charts.';" ></div>
                                            </div>
                                        </div>';
											}

											if( $question['type'] == 'select' && $key == count( $question['answers'] ) - 1 ){
												$question_type_content .= '</select></div>';
											}

											echo $question_type_content;
											?>
                                        </div>
										<?php
									}
									?>
                                </div>
								<?php
							}
						endif;
						?>
                    </div>
                </div>
                <div class="ays_survey_preloader" style="display:none;">
                    <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) ; ?>/images/loaders/tail-spin-result.svg" alt="" width="100">
                </div>
            </div>
        </div>
    </div>
</div>