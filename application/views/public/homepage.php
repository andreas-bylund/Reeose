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


<!--=== Slider ===-->
<div class="tp-banner-container">
			<div class="tp-banner">
				<ul>
					<!-- SLIDE -->
					<li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Billiga skor">
						<!-- MAIN IMAGE -->
						<img src="assets/img/startsidan/slider/skor.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

						<div class="tp-caption revolution-ch1 sft start"
						data-x="center"
						data-hoffset="0"
						data-y="100"
						data-speed="1500"
						data-start="500"
						data-easing="Back.easeInOut"
						data-endeasing="Power1.easeIn"
						data-endspeed="300">
						Skor för <br>
						<strong>alla</strong>
					</div>

					<!-- LAYER -->
					<div class="tp-caption sft"
					data-x="center"
					data-hoffset="0"
					data-y="380"
					data-speed="1600"
					data-start="1800"
					data-easing="Power4.easeOut"
					data-endspeed="300"
					data-endeasing="Power1.easeIn"
					data-captionhidden="off"
					style="z-index: 6">
					<a href="<?php echo base_url('rea/skor'); ?>" class="btn-u btn-brd btn-brd-hover btn-u-light">Köp Billiga skor</a>
				</div>
			</li>
			<!-- END SLIDE -->

    <!-- SLIDE -->
    <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Ellos - Rabattkod">
    	<!-- MAIN IMAGE -->
    	<img src="<?php echo base_url('assets/img/startsidan/slider/ellos.jpg'); ?>"  alt="Ellos.se"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

    	<div class="tp-caption revolution-ch1 sft start"
    	data-x="center"
    	data-hoffset="0"
    	data-y="100"
    	data-speed="1500"
    	data-start="500"
    	data-easing="Back.easeInOut"
    	data-endeasing="Power1.easeIn"
    	data-endspeed="300">
    	Ellos.se
    </div>

    <!-- LAYER -->
    <div class="tp-caption revolution-ch2 sft"
        data-x="center"
        data-hoffset="0"
        data-y="280"
        data-speed="1400"
        data-start="2000"
        data-easing="Power4.easeOut"
        data-endspeed="300"
        data-endeasing="Power1.easeIn"
        data-captionhidden="off"
        style="z-index: 6">
        Aktiva Rabattkoder
    </div>

    <!-- LAYER -->
    <div class="tp-caption sft"
        data-x="center"
        data-hoffset="0"
        data-y="370"
        data-speed="1600"
        data-start="2800"
        data-easing="Power4.easeOut"
        data-endspeed="300"
        data-endeasing="Power1.easeIn"
        data-captionhidden="off"
        style="z-index: 6">
        <a href="<?php echo base_url('rabattkod/ellos'); ?>" class="btn-u btn-brd btn-brd-hover btn-u-light">Till Rabattkoderna</a>
    </div>
    </li>
    <!-- END SLIDE -->

    </ul>
    <div class="tp-bannertimer tp-bottom"></div>
    </div>
</div>
<!--=== End Slider ===-->

<div class="container content-md">
<!--=== Illustration v1 ===-->
<div class="row margin-bottom-60">
    <div class="col-md-6 md-margin-bottom-30">
        <div class="overflow-h">
            <a class="illustration-v1 illustration-img1" href="<?php echo base_url('rea/hundsaker'); ?>">
                <div class="illustration-bg">
                    <span class="illustration-ads ad-details-v2">
                        <span class="item-time">REA</span>
                        <span class="item-name">Hundsaker</span>
                    </span>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-6 md-margin-bottom-30">
        <div class="overflow-h">
            <a class="illustration-v1 illustration-img2" href="<?php echo base_url('rea/kattsaker'); ?>">
                <span class="illustration-bg">
                    <span class="illustration-ads ad-details-v2">
                        <span class="item-time">REA</span>
                        <span class="item-name">Kattsaker</span>
                    </span>
                </span>
            </a>
        </div>
    </div>
</div><!--/end row-->
<!--=== End Illustration v1 ===-->

<!--=== Illustration v3 ===-->
<div class="row margin-bottom-50">
    <div class="col-md-4 md-margin-bottom-30">
        <div class="overflow-h">
            <a class="illustration-v3 illustration-img1" href="<?php echo base_url('rea/herrskor');?>">
                <span class="illustration-bg">
                    <span class="illustration-ads">
                        <span class="illustration-v3-category">
                            <span class="product-category">Herrskor</span>
                            <span class="product-amount"><?php echo $num_products_herrskor; ?> Herrskor på REA</span>
                        </span>
                    </span>
                </span>
            </a>
        </div>
    </div>
    <div class="col-md-4 md-margin-bottom-30">
        <div class="overflow-h">
            <a class="illustration-v3 illustration-img2" href="<?php echo base_url('rea/damskor');?>">
                <span class="illustration-bg">
                    <span class="illustration-ads">
                        <span class="illustration-v3-category">
                            <span class="product-category">Damskor</span>
                            <span class="product-amount"><?php echo $num_products_damskor; ?> Damskor på REA</span>
                        </span>
                    </span>
                </span>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="overflow-h">
            <a class="illustration-v3 illustration-img3" href="<?php echo base_url('rea/barnskor');?>">
                <span class="illustration-bg">
                    <span class="illustration-ads">
                        <span class="illustration-v3-category">
                            <span class="product-category">Barnskor</span>
                            <span class="product-amount"><?php echo $num_products_barnskor; ?> Barnskor på REA</span>
                        </span>
                    </span>
                </span>
            </a>
        </div>
    </div>
</div>

<div class="row illustration-v4 margin-bottom-40">
    <div class="col-md-4">
        <div class="heading heading-v1 margin-bottom-20">
            <h2>Nytt</h2>
        </div>

        <?php

            if ($five_active_coupons->num_rows() >= 1)
            {
                foreach ($five_active_coupons->result() as $row)
                {
                    $clicks = number_format($row->clicks, 0, ',', ' ');

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

                    echo '
                    <div class="thumb-product">
                        <img class="thumb-product-img" src="'.base_url($row->store_logo).'" alt="ny ' .$row->name.' rabattkod">

                        <div class="thumb-product-in" onclick="return outRabattkod('.$row->coupon_id.')">
                            <h4><a href="' .base_url('ut/'.$row->link_routing_id.'').'" rel="nofollow">'.$row->title.'</a></h4>
                        </div>
                    </div>';
                }
            }
        ?>


    </div>
	<div class="col-md-4">
		<div class="heading heading-v1 margin-bottom-20">
			<h2>Populärt</h2>
		</div>

        <?php

            if ($featured_coupons->num_rows() >= 1)
            {
                foreach ($featured_coupons->result() as $row)
                {
                    $clicks = number_format($row->clicks, 0, ',', ' ');

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

                    echo '
                    <div class="thumb-product">
    					<img class="thumb-product-img" src="'.base_url($row->store_logo).'" alt="ny ' .$row->name.' rabattkod">

    					<div class="thumb-product-in" onclick="return outRabattkod('.$row->coupon_id.')">
    						<h4><a href="' .base_url('ut/'.$row->link_routing_id.'').'" rel="nofollow">'.$row->title.'</a></h4>
    					</div>
    				</div>';
                }
            }
        ?>


	</div>
	<div class="col-md-4">
		<div class="heading heading-v1 margin-bottom-20">
			<h2>REA</h2>
		</div>

        <?php

            if ($sale_campaigns->num_rows() >= 1)
            {
                foreach ($sale_campaigns->result() as $row)
                {


                    echo '
                    <div class="thumb-product">
    					<img class="thumb-product-img" src="'.base_url($row->store_logo).'" alt="' .$row->name.'">

    					<div class="thumb-product-in">
    						<h4><a href="' .base_url('ut/'.$row->link_routing_id.'').'" rel="nofollow">'.$row->title.'</a></h4>
    					</div>
    				</div>';
                }
            }
        ?>
	</div>
</div>
