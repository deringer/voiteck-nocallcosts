<?php

if ( isset($_POST['et_pb_contactform_submit']) )
{
    $errors = array();

    if ( trim($_POST['et_pb_contact_name']) == '' )
    {
        $errors[] = 'Name is a required field';
    }

    if ( trim($_POST['et_pb_contact_email']) == '' )
    {
        $errors[] = 'Email address is a required field';
    } elseif ( filter_var($_POST['et_pb_contact_email'], FILTER_VALIDATE_EMAIL) === false ) {
        $errors[] = 'The specified email address is invalid';
    }

    if ( count($errors) > 0 )
    {
        $contact_type = false;
        $contact_message = join('<br />', $errors);
    } else {
        $message = <<<MESSAGE
Name: {$_POST['et_pb_contact_name']}
Email: {$_POST['et_pb_contact_email']}
Message: {$_POST['et_pb_contact_message']}
MESSAGE;

        mail(
            //'declan@voiteck.com.au',
            'michael@iatstuti.net',
            '[Where\'s Wally] Contact inquiry',
            $message,
            sprintf(
                'From: %1$s <%2$s>%3$sReturn-Path: %2$s%3$sReply-To: %2$s',
                $_POST['et_pb_contact_name'],
                $_POST['et_pb_contact_email'],
                PHP_EOL
            )
        );

        unset($_POST);
        header('Location: ?success=true');
    }
}

if ( isset($_GET['success']) )
{
    $contact_type = true;
    $contact_message = 'Your message has been successfully sent';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Where's Wally?</title>

    <!--[if lt IE 9]>
    <script src="./js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <link rel='stylesheet' id='divi-fonts-css'  href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,700,800&#038;subset=latin,latin-ext' type='text/css' media='all' />
    <link rel='stylesheet' id='divi-style-css'  href='./css/all.css' type='text/css' media='all' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <style>
        a { color: #496fb6; }

        body { color: #666666; }

        .et_pb_counter_amount, .et_pb_featured_table .et_pb_pricing_heading, .et_quote_content, .et_link_content, .et_audio_content { background-color: #496fb6; }

        #main-header, #main-header .nav li ul, .et-search-form, #main-header .et_mobile_menu { background-color: #496fb6; }

        #top-header, #et-secondary-nav li ul { background-color: #496fb6; }

        .woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, .woocommerce-message, .woocommerce-error, .woocommerce-info { background: #496fb6 !important; }

        #et_search_icon:hover, .mobile_menu_bar:before, .footer-widget h4, .et-social-icon a:hover, .comment-reply-link, .form-submit input, .et_pb_sum, .et_pb_pricing li a, .et_pb_pricing_table_button, .et_overlay:before, .entry-summary p.price ins, .woocommerce div.product span.price, .woocommerce-page div.product span.price, .woocommerce #content div.product span.price, .woocommerce-page #content div.product span.price, .woocommerce div.product p.price, .woocommerce-page div.product p.price, .woocommerce #content div.product p.price, .woocommerce-page #content div.product p.price, .et_pb_member_social_links a:hover { color: #496fb6 !important; }

        .woocommerce .star-rating span:before, .woocommerce-page .star-rating span:before, .et_pb_widget li a:hover, .et_pb_bg_layout_light .et_pb_promo_button, .et_pb_bg_layout_light .et_pb_more_button, .et_pb_filterable_portfolio .et_pb_portfolio_filters li a.active, .et_pb_filterable_portfolio .et_pb_portofolio_pagination ul li a.active, .et_pb_gallery .et_pb_gallery_pagination ul li a.active, .wp-pagenavi span.current, .wp-pagenavi a:hover, .et_pb_contact_submit, .et_password_protected_form .et_submit_button, .et_pb_bg_layout_light .et_pb_newsletter_button, .nav-single a, .posted_in a { color: #496fb6 !important; }

        .et-search-form, .nav li ul, .et_mobile_menu, .footer-widget li:before, .et_pb_pricing li:before, blockquote { border-color: #496fb6; }

        #main-footer { background-color: #496fb6; }

        #top-menu a { color: #666666; }

        #top-menu li.current-menu-ancestor > a, #top-menu li.current-menu-item > a, .bottom-nav li.current-menu-item > a { color: #496fb6; }

        body.custom-background { background-color: #496fb6; }
    </style>

    <meta name="format-detection" content="telephone=no">
</head>

<body class="page page-template-default custom-background et_cover_background osx et_pb_pagebuilder_layout et_right_sidebar safari">
    <div id="page-container">
        <header id="main-header" class="et_nav_text_color_dark">
            <div class="container clearfix">
                <a href="http://www.voiteck.com.au" title="Visit Voiteck">
                    <img src="./img/logo-voiteck.gif" alt="No Call Costs" id="logo" />
                </a>

                <span class="contact_number">08 8120 4891</span>
            </div> <!-- .container -->
        </header> <!-- #main-header -->

        <div id="et-main-area">
            <div id="main-content">
                <article id="post-98" class="post-98 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div id="home-video" class="et_pb_section container-padding-top et_section_regular" style='background-color:#496fb6;'>
                            <div class="et_pb_row">
                                <div class="et_pb_column et_pb_column_2_3">
                                    <img src="./img/telstra-nbn.jpg" alt="" class="et-waypoint et_pb_image et_pb_animation_off" />
                                </div> <!-- .et_pb_column -->
                                <div class="et_pb_column et_pb_column_1_3">
                                    <div class="et_pb_text et_pb_bg_layout_dark et_pb_text_align_left">
                                        <h2>What a disgrace!</h2>
                                        <h2>We decided to call and ask to speak to Mark, they told us he doesn't even exist.</h2>
                                        <h2>Don't be bullied into making a decision.</h2>
                                        <h2>Contact Voiteck to help you connect to the NBN.</h2>
                                    </div> <!-- .et_pb_text -->
                                    <div id="et_pb_contact_form_1" class="et_pb_contact_form_container clearfix">
                                        <h1 class="et_pb_contact_main_title">Contact your local provider</h1>
                                        
                                        <div class="et_pb_contact">
                                            <div class="et-pb-contact-message <?= isset($contact_type) && $contact_type === true ? 'success' : 'error' ?>"><?= isset($contact_message) ? $contact_message : null ?></div>

                                            <form class="et_pb_contact_form clearfix" method="post">
                                                <div class="et_pb_contact_left">
                                                    <p class="clearfix">
                                                        <label class="et_pb_contact_form_label">Name</label>
                                                        <input type="text" class="input et_pb_contact_name" placeholder="Name" value="<?= isset($_POST['et_pb_contact_name']) ? htmlspecialchars($_POST['et_pb_contact_name']) : null ?>" name="et_pb_contact_name">
                                                    </p>
                                                    <p class="clearfix">
                                                        <label class="et_pb_contact_form_label">Email Address</label>
                                                        <input type="text" class="input et_pb_contact_email" placeholder="Email Address" value="<?= isset($_POST['et_pb_contact_email']) ? htmlspecialchars($_POST['et_pb_contact_email']) : null ?>" name="et_pb_contact_email">
                                                    </p>
                                                </div> <!-- .et_pb_contact_left -->

                                                <div class="clear"></div>

                                                <p class="clearfix">
                                                    <label class="et_pb_contact_form_label">Message</label>
                                                    <textarea name="et_pb_contact_message" class="et_pb_contact_message input" placeholder="Message"><?= isset($_POST['et_pb_contact_message']) ? htmlspecialchars($_POST['et_pb_contact_message']) : null ?></textarea>
                                                </p>

                                                <input type="hidden" value="et_contact_proccess" name="et_pb_contactform_submit">
                                                <input type="submit" value="Submit" class="et_pb_contact_submit">
                                            </form>
                                        </div> <!-- .et_pb_contact -->
                                    </div> <!-- .et_pb_contact_form_container -->
                                </div> <!-- .et_pb_column -->
                            </div> <!-- .et_pb_row -->
                        </div> <!-- .et_pb_section -->

                        <div class="et_pb_section et_section_regular" style='background-color:#496fb6;'>
                            <div class="et_pb_row">
                                <div class="et_pb_column et_pb_column_4_4">
                                    <div class="et_pb_text et_pb_bg_layout_dark et_pb_text_align_center">
                                        <h1>Don&#8217;t listen to the hype, call Voiteck.</h1>
                                    </div> <!-- .et_pb_text -->
                                </div> <!-- .et_pb_column -->
                            </div> <!-- .et_pb_row -->
                        </div> <!-- .et_pb_section -->
                    </div> <!-- .entry-content -->
                </article> <!-- .et_pb_post -->
            </div> <!-- #main-content -->

            <footer id="main-footer">
                <div id="footer-bottom">
                    <div class="container clearfix">
                    </div>  <!-- .container -->
                </div>
            </footer> <!-- #main-footer -->
        </div> <!-- #et-main-area -->
    </div> <!-- #page-container -->
</body>
</html>


