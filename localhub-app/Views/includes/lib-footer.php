<?php
$url = HTTPS_HOST;
use App\Models\Utils_model;
$Utils_model = new Utils_model();

if (isset($page_settings->cc_footer_color))
{   $footer_color_text = $Utils_model->check_bg_text_color($page_settings->cc_footer_color);
}

?>        
<style>
.footer_container {
/*             position:absolute; */
            bottom:0;
            width:100%;
            height:50px;
            background-color:<?php if($page_settings->cc_footer_color)echo $page_settings->cc_footer_color;else echo "#d3d3d3" ?> !important;
        }
        .powered-by {
            font-size: 14px; 
            font-weight: bold;
            text-align: left;
            margin-left: 20px;
            margin-top: 20px;
        }
        .dynamic-text-color-footer {
            color: <?php if (isset($footer_color_text)) echo $footer_color_text; else echo "text-gray-500" ?> !important
        }
        </style>
                </div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		
		<!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer footer_container">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <a href="https://whofi.com/?powered" target="_blank" class="text-hover-primary whofi_footer_powered_by dynamic-text-color-footer"><b>Powered by WhoFi</b></a>
                </div>
                <!--end::Copyright-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
		<!--end::App-->
		
		
		<script src="<?php echo $url; ?>public/assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo $url; ?>public/assets/js/scripts.bundle.js"></script>
		<script src="<?php echo $url; ?>public/assets/js/widgets.bundle.js"></script>
		<script src="<?php echo $url; ?>public/assets/js/custom/widgets.js"></script>
		<script src="<?php echo $url; ?>public/assets/js/flatpickr_month.js"></script>

        <!-- Google tag (gtag.js) -->
        <?php 
        if ($page_settings->calendar_analytics_id != "")
        {
            $analytics_pattern = "/[UA|UW|G]-[a-zA-Z0-9]{7,}-*[0-9]*/";
            $analytics_id = "";
            if (preg_match($analytics_pattern, $page_settings->calendar_analytics_id))
            {
                $analytics_id = $page_settings->calendar_analytics_id;
            }

            if ($analytics_id != "")
            {
            ?>
            <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $analytics_id; ?>"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', '<?php echo $analytics_id; ?>');
            </script>
            <?php
            }
        }
        ?>
        
        <script>
        var kioskVar = "<?php echo isset($_POST['kiosk']) ? $_POST['kiosk'] : ''; ?>"; 
        if (kioskVar) {
            var url = "<?php echo HTTPS_HOST ?>";
            $(document).ready(function() {
                setInterval(function () {
                    window.location.href = url + "spaces/room/" + decodeURIComponent(kioskVar);
                }, 600000); // Currently 10 minutes
            });
        }
        </script>
	</body>
	<!--end::Body-->

</html>
