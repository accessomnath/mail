<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height, minimum-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="<?php echo base_url()  ?>site_asset/inset/favicon.ico" rel="shortcut icon">

    <title>Blog Classic</title>
    <!--jQuery-->
    <script src="<?php echo base_url()  ?>site_asset/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()  ?>site_asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Font Icon -->
    <link href="<?php echo base_url()  ?>site_asset/css/dnngo-font-icon.css" rel="stylesheet" type="text/css">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,600" rel="stylesheet" type="text/css">

    <!-- Vendor -->
    <link href="<?php echo base_url()  ?>site_asset/vendor/OwlCarousel2/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/vendor/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/vendor/components/bootstrap-datetimepicker.min.css" rel="stylesheet" />

    <!-- Template base -->
    <link href="<?php echo base_url()  ?>site_asset/css/theme.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/css/header.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/css/footer.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/css/blog.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/css/portfolios.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/css/sidebar.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/css/page-title.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/css/widget.css" rel="stylesheet" type="text/css">

    <!-- Template component -->
    <link href="<?php echo base_url()  ?>site_asset/css/component/loaders.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/css/component/carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()  ?>site_asset/css/component/imagebox.css" rel="stylesheet" type="text/css">

    <!-- Template color -->
    <link href="<?php echo base_url()  ?>site_asset/css/theme-color/blue.css" rel="stylesheet" type="text/css">

</head>

<body>
<!-- Loading -->
<div class="page-loaders">
    <div class="loaders">
        <div class="loader-inner ball-clip-rotate-pulse loader-accent">
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!-- Loading End -->
<div class="theme-main">
    <div id="wrapper">
        <!-- Header -->
        <header class="header-bg roll-menu header-font-dark" data-top="250" style="top: 0px; opacity: 1;">
            <div class="hidden-xs hidden-sm headerBox ">
                <div class="shade"></div>
                <div class="container">
                    <div id="megamenuWidthBox"></div>
                    <div class="clearfix">
                        <div class="header-bottom">
                            <div class="header-left">
                                <div class="logo-main">
                                    <div class="Logobox" style="width: 282px;">
                                        <a title="Logo" href="<?php echo base_url() ?>"><img src="<?php echo base_url()  ?>site_asset/inset/logo.png" srcset="inset/logo-2x.png 2x" alt="Logo"></a>
                                    </div>
                                    <div class="FixedLogoPane">
                                        <a title="Logo" href="<?php echo base_url()  ?>"> <img src="<?php echo base_url()  ?>site_asset/inset/logo.png" srcset="inset/logo-2x.png 2x" alt="Logo"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-right text-right">
                                <nav class="nav-box clearfix menu-hover-line ">
                                    <div class="menu-main">
                                        <div id="dng-megamenu">
                                            <ul class="primary-structure">




                                                <li> <a href="#" title="Pages"><span><i class="fa fa-sign-out"></i>Sign Up</span></a>

                                                </li>
                                                <li> <a href="#" title="Short Codes"><span><i class="fa fa-sign-in"></i>Sign In</span></a>

                                                </li>

                                                <li> <a href="<?php echo base_url() ?>" title="Short Codes"><span><i class="fa fa-backward"></i>Home</span></a>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Header End -->
        <!-- Mobile Header -->
        <div class="visible-xs visible-sm mobile-header">
            <div class="mobile-nav">
                <div class="container">
                    <div class="clearfix">
                        <div class="mobile-navbox">
                            <div class="mobile-logo-main  ">
                                <div class="Logobox  ">
                                    <a title="Logo" href="#"><img src="<?php echo base_url()  ?>site_asset/inset/logo.png" srcset="inset/logo-2x.png 2x" alt="Logo" /></a>
                                </div>
                            </div>
                            <div class="mobile-right-icon">
                                <span class="fa fa-reorder" id="ico-menu-mobile"></span>
                            </div>
                            <div class="mobile-right-icon">
                                <div class="search-popup-box">
                                    <div class="icon"><span class="fa fa-search"></span></div>
                                    <div class="popup-content">
                                        <div class="popup-close"><span class="fa fa-cross2"></span></div>
                                        <div class="popup-center">
                                            <div class="info"></div>
                                            <form name="formsearch" method="get" action="#">
                                                <input name="s" id="search" type="text" class="text" value="" placeholder="START TYPING AND PRESS ENTER TO SEARCH" />
                                                <button type="submit" class="submit"><span class="fa fa-search"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="dng-megamenu-mobile" class="mobile-menu "></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- Mobile End -->