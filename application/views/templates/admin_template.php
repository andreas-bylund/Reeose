
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - <?php echo $title; ?></title>

    <link href="<?php echo base_url('css/admin/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('css/admin/animate.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/admin/style.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('css/admin/plugins/summernote/summernote.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/admin/plugins/summernote/summernote-bs3.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('css/admin/plugins/footable/footable.core.css'); ?>" rel="stylesheet">

</head>

<body>

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Admin</strong>
                            </span> <span class="text-muted text-xs block">Teh boss! <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/index'); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Start</span></a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/todo'); ?>"><i class="fa fa-check-square-o"></i> <span class="nav-label">Todo</span></a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/api/adrecod'); ?>"><i class="fa fa-check-square-o"></i> <span class="nav-label">Adrecord</span></a>
                </li>

                <!-- API -->
                <li>
                    <a href="#"><i class="fa fa-plus"></i> <span class="nav-label">API</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('admin/new_cronjob'); ?>">Ny - Cronjob</a></li>
                        <li><a href="<?php echo base_url('admin/api/logs'); ?>">Loggar</a></li>
                        <li><a href="<?php echo base_url('admin/api/sale_logs'); ?>">Auto - Rea</a></li>
                        <!-- <li><a href="<?php echo base_url('admin/api/adrecod'); ?>">Adrecord</a></li> -->
                    </ul>
                </li>

                <!-- Butiker -->
                <li>
                    <a href="#"><i class="fa fa-plus"></i> <span class="nav-label">Butiker</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('admin/add_store'); ?>">Ny butik</a></li>
                        <li>
                            <a href="<?php echo base_url('admin/store_overview'); ?>">Överblick</a>
                        </li>
                    </ul>
                </li>


                <!-- Rabattkoder -->
                <li>
                    <a href="#"><i class="fa fa-plus"></i> <span class="nav-label">Erbjudande</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo base_url('admin/add_offer'); ?>">Nytt erbjudande</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/offer_overview'); ?>">Överblick</a>
                        </li>
                    </ul>
                </li>


                <!-- Rabattkoder -->
                <li>
                    <a href="#"><i class="fa fa-plus"></i> <span class="nav-label">Rabattkoder</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo base_url('admin/add_coupon'); ?>">Ny rabattkod</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/coupons_overview'); ?>">Överblick</a>
                        </li>
                    </ul>
                </li>

                <!-- REA -->
                <li>
                    <a href="#"><i class="fa fa-plus"></i> <span class="nav-label">REA</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo base_url('admin/add_sale_campaign'); ?>">Ny REA</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('admin/add_sale_page'); ?>">Ny REA-sida</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('admin/sale_overview'); ?>">Överblick</a>
                        </li>
                    </ul>
                </li>


                <!-- Kategorier -->
                <li>
                    <a href="#"><i class="fa fa-plus"></i> <span class="nav-label">Kategorier</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo base_url('admin/add_category'); ?>">Ny kategori</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/add_subcategory'); ?>">Sub-Kategori</a>
                        </li>
                        <li>
                            <a href="#">Överblick</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg" >
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-out"></i> Logga ut
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $rubrik; ?></h2>

                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <br>
        <?php if ($this->session->flashdata('msg')) { ?>
            <div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>
        <?php } ?>
        <?php echo $contents; ?>



    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo base_url('js/jquery-2.1.1.js'); ?>"></script>
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('js/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
<script src="<?php echo base_url('js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('js/inspinia.js'); ?>"></script>
<script src="<?php echo base_url('js/plugins/pace/pace.min.js'); ?>"></script>

<!-- SUMMERNOTE -->
<script src="<?php echo base_url('js/plugins/summernote/summernote.min.js'); ?>"></script>

<script src="<?php echo base_url('js/plugins/footable/footable.all.min.js'); ?>"></script>

<!-- Data picker -->
<script src="<?php echo base_url('js/plugins/datapicker/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("table").footable();
    });
</script>

</body>
</html>
