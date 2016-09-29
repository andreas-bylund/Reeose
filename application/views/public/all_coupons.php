<?php

    function days_remaining($date)
    {
        $today = date('Y-m-d');

        $date1 = new DateTime($today);
        $date2 = new DateTime($date);
        $interval = $date2->diff($date1);

        return $interval->days;
    }

?>

<div class="breadcrumbs-v4">
	<div class="container">
		<h1>Rabattkoder</h1>
	</div><!--/end container-->
</div>

<div class="content container">
    <div class="row">
        <div class="col-md-9">
            <div class="filter-results">
                <h2>Populära rabattkoder</h2>
                <hr>

                <?php

            if ($featured_coupons->num_rows() >= 1)
            {
                foreach ($featured_coupons->result() as $row)
                {
                    $clicks = number_format($row->clicks, 0, ',', ' ');

                    if ($row->end_date == '0000-00-00')
                    {
                        $date = 'Gäller tillsvidare';
                    }
                    else
                    {
                        if (days_remaining($row->end_date) == 0)
                        {
                            $date = 'Sista dagen idag!';
                        }
                        else
                        {
                            if (days_remaining($row->end_date) == 1)
                            {
                                $date = 'Gäller <small>'.days_remaining($row->end_date).'</small> dag till';
                            }
                            else
                            {
                                $date = 'Gäller <small>'.days_remaining($row->end_date).'</small> dagar till';
                            }
                        }
                    }

                    echo '<div class="list-product-description product-description-brd margin-bottom-30">
                        <div class="row">
                            <div class="col-sm-4">
                                <img class="img-responsive sm-margin-bottom-20" alt="' .$row->name.' rabattkoder" src="'.base_url($row->store_logo).'">
                            </div>

                            <div class="col-sm-8 product-description">
                                <div class="overflow-h margin-bottom-5">
                                    <ul class="list-inline overflow-h">
                                        <li><h3 class="title-price"></h3><h4 class="list-group-item-heading">'.$row->title.'</h4></li>
                                    </ul>

                                    <p class="margin-bottom-20">'.$row->text.'</p>

                                    <ul class="list-inline add-to-wishlist margin-bottom-20">
                                        <li class="wishlist-in">
                                            <i class="fa fa-calendar"></i>'.$date.'
                                        </li>
                                        <li class="compare-in">
                                            <i class="fa fa-hand-pointer-o"></i> '.$clicks.'
                                        </li>
                                    </ul>

                                    <a href="' .base_url('ut/'.$row->link_routing_id.'').'" rel="nofollow">
                                      <button onclick="return outRabattkod('.$row->coupon_id.')"  type="button" class="btn btn-primary btn-lg btn-block"> Hämta rabattkod </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>';


                    }
                }
             ?>

             <h2>Nya rabattkoder</h2>
             <hr>

             <?php

                foreach ($five_active_coupons->result() as $row)
                {
                    $clicks = number_format($row->clicks, 0, ',', ' ');

                    if ($row->end_date == '0000-00-00')
                    {
                        $date = 'Gäller tillsvidare';
                    }
                    else
                    {
                        if (days_remaining($row->end_date) == 0)
                        {
                            $date = 'Sista dagen idag!';
                        }
                        else

                            if (days_remaining($row->end_date) == 1)
                            {
                                $date = 'Gäller <small>'.days_remaining($row->end_date).'</small> dag till';
                            }
                            else
                            {
                                $date = 'Gäller <small>'.days_remaining($row->end_date).'</small> dagar till';
                            }
                        }


                    echo '<div class="list-product-description product-description-brd margin-bottom-30">
                        <div class="row">
                            <div class="col-sm-4">
                                <img class="img-responsive sm-margin-bottom-20" alt="' .$row->name.' rabattkoder" src="'.base_url($row->store_logo).'">
                            </div>

                            <div class="col-sm-8 product-description">
                                <div class="overflow-h margin-bottom-5">
                                    <ul class="list-inline overflow-h">
                                        <li><h3 class="title-price"></h3><h4 class="list-group-item-heading">'.$row->title.'</h4></li>
                                    </ul>

                                    <p class="margin-bottom-20">'.$row->text.'</p>

                                    <ul class="list-inline add-to-wishlist margin-bottom-20">
                                        <li class="wishlist-in">
                                            <i class="fa fa-calendar"></i>'.$date.'
                                        </li>
                                        <li class="compare-in">
                                            <i class="fa fa-hand-pointer-o"></i> '.$clicks.'
                                        </li>
                                    </ul>

                                    <a href="' .base_url('ut/'.$row->link_routing_id.'').'" rel="nofollow">
                                      <button onclick="return outRabattkod('.$row->coupon_id.')"  type="button" class="btn btn-primary btn-lg btn-block"> Hämta rabattkod </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>';

                }
            ?>

            </div>
            <div class="row col-md-12">
                <h2 class="text-center">Rabattkoder för alla</h2>
                <p style="text-align: justify;">Här på Reeo.se hittar du rabattkoder till många olika typer av butiker där du kan köpa allt mellan himmel och jord. Denna sida uppdateras dagligen med nya rabattkoder, erbjudanden och annan typ av information som gör att du kan spara pengar när du ska handla online. Samtliga rabattkoder som finns här är gratis att använda. Så det är bara klicka på den rabattkod som du tycker är passande och bege dig till butiken och shoppa loss!</p>

                <h2 class="text-center">Hur använder jag en rabattkod?</h2>
                <p style="text-align: justify;">När du har hittat en rabattkod som du vill använda klickar du på den gröna knappen "Hämta rabattkod". När du gör det kommer det upp en ruta med en rabattkod du kan klistra in på butiken. Har du några problem med rabattkoden kan och bör du tyvärr inte konstakta oss, för vi kan inte påverka rabattkoden. Utan då måste du kontakta butiken i fråga.</p>
            </div>
        </div>

        <div class="col-md-3 filter-by-block md-margin-bottom-60">
            <div class="panel-group" id="accordion-v3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-v3" href="#collapseThree">Populära butiker <i class="fa fa-angle-down"></i></a></h2>
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
    </div>
</div><!--/end content container-->

<?php
    if (isset($active_coupon_modal)) {
        if ($active_coupon_modal) {
            echo $coupon_modal;
        }
    }

 ?>
