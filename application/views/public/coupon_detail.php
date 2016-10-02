<?php
/*
    echo '<pre>';
    print_r($all_active_rabattkoder);
    exit();
*/
    function days_remaining($date)
    {
        $today = date('Y-m-d');

        $date1 = new DateTime($today);
        $date2 = new DateTime($date);
        $interval = $date2->diff($date1);

        return $interval->days;
    }

    $nothing = false;

?>

<div class="breadcrumbs-v4">
	<div class="container">
		<h1><?php echo $store_info->name; ?> Rabattkod</h1>
	</div><!--/end container-->
</div>

<div class="content container">
	<div class="row">
		<div class="col-md-9">
			<div class="filter-results">
                <?php

                if(isset($active_coupons))
                {
                    foreach ($active_coupons as $row)
                    {
                        $clicks = number_format($row->clicks, 0, ',', ' ');

                        /*
                            ---------------- Buttons ----------------
                        */
                        if ($row->type == 'coupon')
                        {
                            $button = '
                            <a href="' .base_url('ut/'.$row->link_routing_id.'').'" rel="nofollow">
                              <button onclick="return outRabattkod('.$row->coupon_id.')"  type="button" class="btn btn-primary btn-lg btn-block"> Hämta Rabattkod </button>
                            </a>';
                        }
                        if ($row->type == 'offer')
                        {
                            $button = '
                            <a id="ut" href="' .base_url('ut/'.$row->link_routing_id.'').'" rel="nofollow">
                              <button type="button" class="btn btn-primary btn-lg btn-block"> Till erbjudandet </button>
                            </a>';
                        }

                        if ($row->type == 'sale')
                        {
                            $button = '
                            <a id="ut" href="' .base_url('ut/'.$row->link_routing_id.'').'" rel="nofollow">
                              <button onclick="return outFunction(' .$row->link_routing_id.')" type="button" class="btn btn-primary btn-lg btn-block"> Till Rea </button>
                            </a>';
                        }

                        /*
                            ---------------- Datum ----------------
                        */
                        if ($row->end_date == '0000-00-00') {
                            $datum = 'Gäller tillsvidare';
                        } else {
                            if (days_remaining($row->end_date) == 0) {
                                $datum = 'Sista dagen idag!';
                            } else {
                                if (days_remaining($row->end_date) == 1) {
                                    $datum = 'Gäller <small>'.days_remaining($row->end_date).'</small> dag till';
                                } else {
                                    $datum = 'Gäller <small>'.days_remaining($row->end_date).'</small> dagar till';
                                }
                            }
                        }


                        echo '<div class="list-product-description product-description-brd margin-bottom-30">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img class="img-responsive sm-margin-bottom-20"  alt="' .$store_info->name.' rabattkod" src="'.base_url($store_info->store_logo).'">
                                </div>
                                <div class="col-sm-8 product-description">
                                    <div class="overflow-h margin-bottom-5">
                                        <ul class="list-inline overflow-h">
                                            <li><h3 class="title-price">'.$row->title.'</h3></li>
                                        </ul>

                                        <p class="margin-bottom-20">'.$row->text.'</p>

                                        <ul class="list-inline add-to-wishlist margin-bottom-20">
                                            <li class="wishlist-in">
                                                <i class="fa fa-calendar"></i>
                                                '.$datum.'
                                            </li>
                                            <li class="compare-in">
                                                <i class="fa fa-hand-pointer-o"></i>
                                                '.$clicks.' klicks
                                            </li>
                                        </ul>

                                        '.$button.'
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
                else
                {
                    echo '

                            <h2 class="heading">Tyvärr</h2>
                            <p class="lead text-center">
                                Vi har tyvärr inte någon '.$store_info->name.' rabattkod, erbjudande eller någon speciell REA att presentera. Vi på Reeo.se kontrollerar nya rabattkoder och erbjudanden dagligen men just nu finns det inget aktuellt att presentera.
                            </p>
                    ';
                }

                if ($num_inactive >= 1)
                {
                    echo '
                        <div class="row text-center margin-top">
                            <button class="btn btn-info visa_old">Visa utgångna rabattkoder</button>
                        </div><br>
                    ';

                    echo '<div class="old" style="display:none;">';
                    echo '<h2 class="heading">Utgångna rabattkoder</h2>';
                    foreach ($all_inactive_rabattkoder as $row)
                    {

                        /*
                            ---------------- Buttons ----------------
                        */
                        if ($row->type == 'coupon')
                        {
                            $button = '<button type="button" class="btn btn-primary btn-lg btn-block"> <strike>Hämta rabattkod </strike></button>';
                        }

                        if ($row->type == 'offer')
                        {
                            $button = '<button type="button" class="btn btn-primary btn-lg btn-block"> <strike>Till erbjudandet </strike></button>';
                        }

                        if ($row->type == 'sale')
                        {
                            $button = '<button type="button" class="btn btn-primary btn-lg btn-block"> <strike>Till rean </strike></button>';
                        }

                        /*
                            ---------------- Datum ----------------
                        */

                        if ($row->type == 'coupon')
                        {
                            $datum = 'Rabattkoden har utgått';
                        }

                        if ($row->type == 'offer')
                        {
                            $datum = 'Erbjudandet har utgått';
                        }

                        if ($row->type == 'sale')
                        {
                            $datum = 'Rean har utgått';
                        }


                        echo '<div class="list-product-description product-description-brd margin-bottom-30">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img class="img-responsive sm-margin-bottom-20"  alt="' .$store_info->name.' rabattkod" src="'.base_url($store_info->store_logo).'">
                                </div>
                                <div class="col-sm-8 product-description">
                                    <div class="overflow-h margin-bottom-5">
                                        <ul class="list-inline overflow-h">
                                        <li><h3 class="title-price"><strike>'.$row->title.'</strike></h3></li>
                                        </ul>

                                        <p class="margin-bottom-20"><strike>'.$row->text.'</strike></p>

                                        <ul class="list-inline add-to-wishlist margin-bottom-20">
                                            <li class="wishlist-in">
                                                <i class="fa fa-calendar"></i>'.$datum.'
                                            </li>

                                            <li class="compare-in">
                                                <i class="fa fa-hand-pointer-o"></i>'.$clicks.' klicks
                                            </li>
                                        </ul>
                                        '.$button.'
                                    </div>
                                </div>
                            </div>
                        </div>';

                    }
                    echo '</div>';
                    echo '';
                }

                if ($store_info->bottom_text)
                {
                    echo '<hr>
                        <h2 class="heading">Mer om ' .$store_info->name.'</h2>
                        <p>' .$store_info->bottom_text.'</p>
                    ';
                }

                ?>


		</div></div>

        <div class="col-md-3 filter-by-block md-margin-bottom-60">

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">

                    <div>
                        <div class="panel-body">
                            <img src="<?php echo base_url($store_info->store_logo); ?>" class="img-circle img-responsive center-block" style="padding: 10px;" alt="<?php echo $store_info->name; ?> rabattkod">
                        </div>
                    </div>
                </div>
            </div><!--/end panel group-->

            <div class="panel-group" id="accordion-v2">
                <div class="panel panel-default">

                    <div>
                        <div class="panel-body">
                            <p style="">
                                <?php
                                    echo $store_info->lead_text;

                                    if (isset($affiliate_img))
                                    {
                                        echo '<img src="'.$affiliate_img.'" width="1" height="1" border="0">';
                                    }
                                 ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div><!--/end panel group-->

            <div class="panel-group" id="accordion-v3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-v3" href="#collapseThree">
                                Populära butiker
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </h2>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled checkbox-list">
                                <li class="coupong-list">Ellos</li>
                                <li class="coupong-list">Nelly</li>
                                <li class="coupong-list">Zalando</li>
                                <li class="coupong-list">Nordicfeel</li>
                                <li class="coupong-list">Bangerhead</li>
                                <li class="coupong-list">Lekmer</li>
                                <li class="coupong-list">Bubbleroom</li>
                                <li class="coupong-list">Animail</li>
                                <li class="coupong-list">MQ</li>
                                <li class="coupong-list">Royal Design</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--/end panel group-->
        </div>

	</div><!--/end row-->
    <div class="row">

    </div>
</div>

<?php
    if($nothing)
    {

    }
?>
