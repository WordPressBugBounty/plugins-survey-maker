<?php
/**
 * Created by PhpStorm.
 * User: biggie18
 * Date: 7/30/18
 * Time: 12:08 PM
 */
// $url = "https://ays-pro.com/wordpress/survey-maker";
// wp_redirect( $url );
// exit;
?>

<div class="wrap">
    <h1 class="wp-heading-inline">
        <?php echo esc_html__(get_admin_page_title(), "survey-maker"); ?>
    </h1>
    <?php do_action('ays_survey_sale_banner'); ?>
    <h3 class="wp-heading" style="text-align: center;">
        <?php echo esc_html__( 'Limited Offer – Enjoy 20% off!' , 'survey-maker'); ?>
    </h3>
    <div class="ays-survey-features-wrap">
        <div class="comparison">
            <table>
                <thead>
                    <tr>
                        <th class="tl tl2"></th>
                        <th class="product" style="background:#69C7F1; border-top-left-radius: 5px; border-left:0px;">
                            <span style="display: block"><?php echo esc_html__('Personal',"survey-maker")?></span>
                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/avatars/personal_avatar.png'; ?>" alt="Free" title="Free" width="100"/>
                        </th>
                        <th class="product" style="background:#69C7F1;">
                            <span style="display: block"><?php echo  esc_html__('Business',"survey-maker")?></span>
                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/avatars/business_avatar.png'; ?>" alt="Business" title="Business" width="100"/>
                        </th>
                        <th class="product" style="border-top-right-radius: 5px; background:#69C7F1;">
                            <span style="display: block"><?php echo esc_html__('Developer',"survey-maker")?></span>
                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/avatars/pro_avatar.png'; ?>" alt="Developer" title="Developer" width="100"/>
                        </th>
                        <th class="product" style="border-top-right-radius: 5px; border-right:0px; background:#69C7F1;">
                            <span style="display: block"><?php echo esc_html__('Agency', "survey-maker")?></span>
                            <img src="<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL) . '/images/avatars/agency_avatar.png'; ?>" alt="Agency" title="Agency" width="100"/>
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th class="price-info">
                            <div class="price-now">
                                <span><?php echo esc_html__('Free',"survey-maker")?></span>
                            </div>
                        </th>
                        <th class="price-info">
                            <div class="price-now"><span style="text-decoration: line-through; color: red;">$75</span></div>
                            <div class="price-now"><span>$49</span></div>                            
                        </th>
                        <th class="price-info">
                            <div class="price-now"><span span style="text-decoration: line-through; color: red;">$250</span></div>
                            <div class="price-now"><span>$149</span></div>                            
                        </th>
                        <th class="price-info">
                            <div class="price-now"><span span style="text-decoration: line-through; color: red;">$450</span></div>
                            <div class="price-now"><span>$249</span></div>                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td colspan="4"><?php echo esc_html__('Support for',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Support for',"survey-maker")?></td>
                        <td>-</td>
                        <td><?php echo esc_html__('5 site',"survey-maker")?></td>
                        <td><?php echo esc_html__('Unlimited sites',"survey-maker")?></td>
                        <td><?php echo esc_html__('Unlimited sites',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="3"><?php echo esc_html__('Upgrade for',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Upgrade for',"survey-maker")?></td>
                        <td>-</td>
                        <td><?php echo esc_html__('12 months',"survey-maker")?></td>
                        <td><?php echo esc_html__('Lifetime',"survey-maker")?></td>
                        <td><?php echo esc_html__('Lifetime',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="4"><?php echo esc_html__('Support for',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Support for',"survey-maker")?></td>
                        <td>-</td>
                        <td><?php echo esc_html__('12 months',"survey-maker")?></td>
                        <td><?php echo esc_html__('Lifetime',"survey-maker")?></td>
                        <td><?php echo esc_html__('Lifetime',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Reports in dashboard',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Reports in dashboard',"survey-maker")?></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Unlimited Surveys',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Unlimited Surveys',"survey-maker")?></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Unlimited Questions',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Unlimited Questions',"survey-maker")?></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Responsive design',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Responsive design',"survey-maker")?></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Popup Survey',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Popup Survey',"survey-maker")?></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Extra question types',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Extra question types',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Send mail to user',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Send mail to user',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Send mail to admin',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Send mail to admin',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Email configuration',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Email configuration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Schedule survey',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Schedule survey',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Mailchimp integration',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Mailchimp integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Campaign Monitor integration',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Campaign Monitor integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Slack integration',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Slack integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('ActiveCampaign integration',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('ActiveCampaign integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('User history shortcode',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('User history shortcode',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Make questions required',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Make questions required',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>                    
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Permissions by user role',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('Permissions by user role',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Limit attemps count',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Limit attemps count',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Results with charts',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Results with charts',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Export and import surveys',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Export and import surveys',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Submissions summary export',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Submissions summary export',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Individual submission export',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Individual submission export',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('PDF export',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('PDF export',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Password protected survey',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Password protected survey',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Google sheets integration',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Google sheets integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Zapier integration',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Zapier integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('SendGrid integration',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('SendGrid integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('GamiPress integration',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('GamiPress integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('MadMimi integration',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('MadMimi integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('GetResponse integration',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('GetResponse integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('ConvertKit integration',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('ConvertKit integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Access by user role',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row" >
                        <td><?php echo esc_html__('Access by user role',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Conversational surveys',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('Conversational surveys',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Logic jump',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Logic jump',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Conditional Results',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('Conditional Results',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Conditional Mailing',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Conditional Mailing',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Multilingual Surveys',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('Multilingual Surveys',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Point System',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Point System',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Calculation',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('Calculation',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Ranking Question Type',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Ranking Question Type',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>                    
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Net Promoter Score (NPS)',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('Net Promoter Score (NPS)',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Likert Scale',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row" >
                        <td><?php echo esc_html__('Likert Scale',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Summary emails',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('Summary emails',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('PayPal integration',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row" >
                        <td><?php echo esc_html__('PayPal integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Stripe integration',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('Stripe integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Klaviyo Integration',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row">
                        <td><?php echo esc_html__('Klaviyo Integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('MyCred Integration',"survey-maker")?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('MyCred Integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Aweber Integration',"survey-maker")?></td>
                    </tr>
                    <tr  class="compare-row">
                        <td><?php echo esc_html__('Aweber Integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('MailPoet Integration',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('MailPoet Integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('Text To Speech',"survey-maker")?></td>
                    </tr>
                    <tr  class="compare-row">
                        <td><?php echo esc_html__('Text To Speech',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('ChatGPT Integration',"survey-maker")?></td>
                    </tr>
                    <tr >
                        <td><?php echo esc_html__('ChatGPT Integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="4"><?php echo esc_html__('WooCommerce Integration',"survey-maker")?></td>
                    </tr>
                    <tr class="compare-row" >
                        <td><?php echo esc_html__('WooCommerce Integration',"survey-maker")?></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><span>-</span></td>
                        <td><i class="ays_fa ays_fa_check"></i></td>
                    </tr>
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="https://wordpress.org/plugins/survey-maker/" target="_blank" class="price-buy"><?php echo esc_html__('Download',"survey-maker")?><span class="hide-mobile"></span></a></td>
                        <td><a href="https://ays-pro.com/wordpress/survey-maker/" target="_blank" class="price-buy"><?php echo esc_html__('Buy now',"survey-maker")?><span class="hide-mobile"></span></a></td>
                        <td><a href="https://ays-pro.com/wordpress/survey-maker/" target="_blank" class="price-buy"><?php echo esc_html__('Buy now',"survey-maker")?><span class="hide-mobile"></span></a></td>
                        <td><a href="https://ays-pro.com/wordpress/survey-maker/" target="_blank" class="price-buy"><?php echo esc_html__('Buy now',"survey-maker")?><span class="hide-mobile"></span></a></td>
                    </tr>
                </tbody>
            </table>
            <div class="ays-survey-features-video">
                <div class="ays-survey-features-video-icon"><img src='<?php echo esc_attr(SURVEY_MAKER_ADMIN_URL); ?>/images/icons/youtube-video-icon.svg' ></div>
                <div class="ays-survey-features-video-text"><a href="https://www.youtube.com/watch?v=1YVNtofpI4c" target="_blank">Watch Plans Comparison Video </a></div>
            </div>
        </div>
    </div>
</div>

