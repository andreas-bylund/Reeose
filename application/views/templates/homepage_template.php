<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <title><?php echo $title; ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="<?php echo $meta_des; ?>">
    <meta content="" name="author">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600&subset=cyrillic,latin">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/shop.style.css'); ?>">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/headers/header-v5.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/footers/footer-v6.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/revolution-slider/rs-plugin/css/settings.css'); ?>">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/line-icons/line-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css'); ?>">

    <!-- CSS Theme -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/theme-colors/default.css'); ?>">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">

    <?php
        if (isset($canonical_coupon)) {
            if ($canonical_coupon) {
                echo '<link href="'.base_url('rabattkoder').'" rel="canonical" />';
            }
        }
     ?>

     <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
     <script type="text/javascript">
          window.cookieconsent_options = {"message":"På reeo.se använder vi kakor (cookies) för att förbättra användarupplevelsen för dig och för att samla in statistik. Genom att fortsätta godkänner du att de används.","dismiss":"OK","learnMore":"Mer info","link":"https://reeo.se/sekretessinformation","theme":"dark-top"};
     </script>
</head>

<body>
    <div class="wrapper">
        <div class="header-v5 header-sticky">

			<!-- Navbar -->
			<div class="navbar navbar-default mega-menu" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo base_url('/'); ?>">
							<img id="logo-header" src="<?php echo base_url('img/logo.png'); ?>" alt="Reeo.se loggo">
						</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-responsive-collapse">
						<!-- Nav Menu -->
						<ul class="nav navbar-nav">
							<!-- Pages -->
							<li class="dropdown <?php if (isset($startsidan_meny)) { echo 'active'; } ?>">
								<a href="<?php echo base_url('/'); ?>" class="dropdown-toggle">
									Startsidan
								</a>
							</li>
							<!-- End Pages -->

							<!-- Promotion -->
							<li class="dropdown <?php if (isset($butiker_meny)) { echo 'active'; } ?>">
								<a href="<?php echo base_url('butiker'); ?>">
									Alla butiker
								</a>
							</li>
							<!-- End Promotion -->

                            <li class="dropdown <?php if (isset($rabattkod_meny)) { echo 'active'; } ?>">
                                <a href="<?php echo base_url('rabattkoder'); ?>">
                                    Rabattkoder
                                </a>
                            </li>

                            <li class="dropdown <?php if (isset($rea_meny)) { echo 'active'; } ?>">
                                <a href="<?php echo base_url('rea'); ?>">
                                    REA - Just nu!
                                </a>
                            </li>
						</ul>
						<!-- End Nav Menu -->
					</div>
				</div>
			</div>
			<!-- End Navbar -->
		</div>

            <?php echo $contents; ?>
    </div>
    <div class="footer-v6">

        <div class="footer">
				<div class="container">
					<div class="row">
						<!-- About Us -->
						<div class="col-md-3 sm-margin-bottom-40">
							<div class="heading-footer"><h2>About Unify</h2></div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ut metus a commodo. Pellentesque congue tellus sed enim sollicitudin, id blandit mauris eleifend.</p>
						</div>
						<!-- End About Us -->

						<!-- Recent News -->
						<div class="col-md-3 sm-margin-bottom-40">
							<div class="heading-footer"><h2>Recent News</h2></div>
							<ul class="list-unstyled link-news">
								<li>
									<a href="#">Apple Conference</a>
									<small>12 July, 2014</small>
								</li>
								<li>
									<a href="#">Bootstrap Update</a>
									<small>12 July, 2014</small>
								</li>
								<li>
									<a href="#">Themeforest Templates</a>
									<small>12 July, 2014</small>
								</li>
							</ul>
						</div>
						<!-- End Recent News -->

						<!-- Useful Links -->
						<div class="col-md-3 sm-margin-bottom-40">
							<div class="heading-footer"><h2>Useful Links</h2></div>
							<ul class="list-unstyled footer-link-list">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Portfolio</a></li>
								<li><a href="#">Latest jobs</a></li>
								<li><a href="#">Community</a></li>
								<li><a href="#">Contact Us</a></li>
							</ul>
						</div>
						<!-- End Useful Links -->

						<!-- Contacts -->
						<div class="col-md-3">
							<div class="heading-footer"><h2>Contacts</h2></div>
							<ul class="list-unstyled contacts">
								<li>
									<i class="radius-3x fa fa-map-marker"></i>
									795 Folsom Ave, Suite 600,
									San Francisco, CA 94107
								</li>
								<li>
									<i class="radius-3x fa fa-phone"></i>
									(+123) 456 7890<br>
									(+123) 456 7891
								</li>
								<li>
									<i class="radius-3x fa fa-globe"></i>
									<a href="#">toronto@gmail.com</a><br>
									<a href="#">www.toronto.com</a>
								</li>
							</ul>
						</div>
						<!-- End Contacts -->
					</div>
				</div><!--/container -->
			</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p>
							2016 © Reeo.se. Alla rättigheter förbehålls.
							<a target="_blank" href="<?php echo base_url('kontakta-oss'); ?>">Kontakta oss</a>
                            |
                            <a href="<?php echo base_url('sekretessinformation'); ?>">Sekretessinformation</a>
                            | <a href="http://blogg.reeo.se">Bloggen</a>
                            | <a href="<?php echo base_url('sitemap.xml'); ?>">Sitemap</a>
						</p>
					</div>
				</div>
			</div>
		</div><!--/copyright-->
	</div>
    <!--=== End Footer Version 1 ===-->

    <!-- JS Global Compulsory -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery/jquery-migrate.min.js'); ?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="<?php echo base_url('assets/plugins/back-to-top.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/smoothScroll.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js'); ?>"></script>

    <!-- JS Customization -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/plugins/revolution-slider.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js'); ?>"></script>

    <!-- JS Page Level -->
    <script src="<?php echo base_url('assets/js/app.js'); ?>"></script>

    <?php
    if (isset($active_coupon_modal)) {
        if ($active_coupon_modal) {
            ?>
        <script type="text/javascript">
            $(window).load(function(){
                $('#coupon-modal').modal('show');
            });
        </script>

    <?php

        }
    }
    ?>

    <script>
        function outRabattkod(r_id)
        {
            var base_url = '<?php echo base_url('rabattkoder/?k=') ?>' + r_id;

            window.open (base_url, '_blank', '');
        }

        $(".visa_old").click(function(){
            $(".old").toggle();
        });

        jQuery(document).ready(function() {
            App.init();
        });

        jQuery(document).ready(function() {
            RevolutionSlider.initRSfullWidth();
        });

    </script>



    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-83248454-1', 'auto');
      ga('send', 'pageview');

    </script>

    <!--[if lt IE 9]>
        <script src="assets/plugins/respond.js"></script>
        <script src="assets/plugins/html5shiv.js"></script>
        <script src="assets/plugins/placeholder-IE-fixes.js"></script>
    <![endif]-->
    </body>
</html>
