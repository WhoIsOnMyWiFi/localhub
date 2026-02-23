<?php
$url = HTTPS_HOST;
use App\Models\Utils_model;
$Utils_model = new Utils_model();
?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
        <?php
        if(isset($request_type) && $request_type == "space_availability")
        {
            ?>
            <title>Space Availability | <?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></title>
            <?php
        }
        else if(isset($request_type) && $request_type == "reserve_space")
        {
            ?>
            <title>Space Reservation | <?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></title>
            <?php
        }
        else if(isset($request_type) && $request_type == "reserve_pass")
        {
            ?>
            <title>Pass Reservation | <?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></title>
            <?php
        }
        else if(isset($request_type) && $request_type == "space_cancellation")
        {
            ?>
            <title>Space Cancelation | <?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></title>
            <?php
        }
        else if(isset($request_type) && $request_type == "pass_cancellation")
        {
            ?>
            <title>Pass Cancelation | <?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></title>
            <?php
        }
        else if(isset($request_type) && $request_type == "registration_cancellation")
        {
            ?>
            <title>Registration Cancelation | <?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></title>
            <?php
        }
        else if(isset($request_type) && $request_type == "pass_availability")
        {
            ?>
            <title>Passes | <?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></title>
            <?php
        }
        else if (isset($header_title) && $header_title == "Upcoming Events")
        {
            ?>
            <title>Upcoming Events | <?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></title>
            <?php
        }
        else if (isset($header_title) && $header_title == "Spaces Kiosk")
        {
            ?>
            <title>Spaces Kiosk | <?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></title>
            <?php
        }
        else
        {
            ?>
            <title><?php echo _("Event Calendar");?> | <?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></title>
            <?php
        }
        ?>
		<meta charset="utf-8" />
		<meta name="description" content="Event Calendar & Space Bookings powered by WhoFi" />
		<meta name="keywords" content="calendar, events, registration, room bookings, space bookings" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Event Calendar | " />
		<meta property="og:url" content="" />
		<meta property="og:site_name" content="" />
		<link rel="canonical" href="" />
		<link rel="icon" type="image/x-icon" href="<?php echo $url; ?>public/assets/media/favicon/favicon.ico">

		<link rel="stylesheet" href="<?php echo $url; ?>public/assets/fonts/google_fonts.css" />
		<link href="<?php echo $url; ?>public/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $url; ?>public/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $url; ?>public/assets/css/flatpickr_month.css" rel="stylesheet">
		<link href="<?php echo $url; ?>public/assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $url; ?>public/assets/css/overrides.css" rel="stylesheet" type="text/css">

		<script src="<?php echo $url; ?>public/assets/js/jquery-3.6.1.js"></script>
	</head>
	<!--begin::Body-->
	<body>
	<?php
        if($page_settings->cc_header_footer_color != "")
        {
            $background_color = $page_settings->cc_header_footer_color;
        }
        else
        {
            $background_color = "#d3d3d3";
        }

        $header_text_color = $Utils_model->check_bg_text_color($background_color);

        ?>
        <style>
            .header_container {
                position: relative; /* Needed for absolute centering */
                height: 120px !important;
                width: 100%;
                padding: 15px;
                background-color: <?php echo $background_color; ?>;
                text-align: center; /* Ensures inline-block elements are centered */
                
            }

            /* Mini Logo (Left-aligned) */
            .mini_logo {
                height: 80px;
                width: 80px;
                display: inline-block;
                position: absolute;
                padding: 2rem 10px 0px 10px;
                left: 15px;
                top: 50%;
                transform: translateY(-50%);
            }

            /* Main Logo (Centered) */
            .logo-wrapper {
                display: inline-block;
            }

            .logo {
                height: 80px;
                display: block;
                margin: auto;
            }

            @media (max-width: 640px) {
                .mini_logo {
                    display: none;
                }
            }

            .dynamic-text-color-header {
                color: <?php if (isset($header_text_color)) echo $header_text_color; else echo "text-gray-500"; ?> !important;
            }
        </style>
        <!--begin::Header-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container header_container container-fluid py-3">
                    <a href="<?php echo $page_settings->client_website_url; ?>" target="_blank" class="text-gray-800 text-hover-primary" aria-label="Event Calendar"><?php
                    if($page_settings->cc_mini_logo_url)
                    {
                    ?>
                        <img class="mini_logo" src="<?php echo $page_settings->cc_mini_logo_url;?>" alt="<?php echo $page_settings->clientname;?>" />
                    <?php
                    }?></a>
                <div class="logo-wrapper d-flex flex-column">
                    <a href="<?php echo $page_settings->client_website_url; ?>" target="_blank" class="text-gray-800 text-hover-primary" aria-label="Event Calendar"><?php
                    if($page_settings->cc_logo_url)
                    {
                    ?>
                    <img class="logo py-3 mt-5" src="<?php echo $page_settings->cc_logo_url;?>" alt="Logo" />
                    <?php
                    }
                    else
                    {
                    ?>
                        <h1 class="fs-2hx fw-bold dynamic-text-color-header text-center mt-12"><?php if(isset($page_settings->clientname) && $page_settings->clientname != "") { echo ucfirst($page_settings->clientname); }?></h1>
                    <?php
                    }
                    ?>
                    </a>
                </div>
            </div>
            <!--end::Header container-->
        </div>
        <!--end::Header-->
        <?php
        if (isset($_POST['kiosk']) || (isset($header_title) && $header_title == "Spaces Kiosk"))
        {
        ?>
            <h1 class="fw-bold dynamic-text-color-header text-center mt-12">Kiosk Mode</h1>
        <?php
        }
        ?>

        <!--begin::App-->
		<div class="d-flex flex-column flex-root app-root mt-10" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    <!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">					
<!--                         <p>Tadang</p> -->
  
