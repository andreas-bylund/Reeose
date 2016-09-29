<?php
    function days_remaining($date)
    {
        $today = date('Y-m-d');

        $date1 = new DateTime($today);
        $date2 = new DateTime($date);
        $interval = $date2->diff($date1);

        return $interval->days;
    }

    function swe_characters($string)
    {
        $search = array('å', 'ä', 'ö');
        $replace = array('&aring;', '&auml;', '&ouml');

        $string = str_replace($search, $replace, $string);

        return $string;
    }

    $nothing = false;
?>
<div class="breadcrumbs-v4">
	<div class="container">
		<h1>Billiga <?php echo $nisch; ?> - <small style="color:white;">Butiker som har REA på <?php echo $nisch; ?></small></h1>
        <ul class="breadcrumb-v4-in">
            <?php
                 if (isset($category_data))
                 {
                     echo '<li><a href="'.base_url('rea').'">REA</a></li>';
                     echo '<li><a href="'.base_url('rea/'.$category_data['cat_id']).'">'.$category_data['cat_id'].'</a></li>';

                     echo '<li>'.$nisch.'</li>';
                 }
                 else
                 {
                     echo '<li><a href="'.base_url('rea').'">REA</a></li>';
                     echo '<li>'.$nisch.'</li>';
                 }
             ?>
		</ul>
	</div><!--/end container-->
</div>
<div class="content container">
    <div class="row">
        <div class="col-md-9">
            <div class="filter-results">
                <?php
                    if ($num_active_sale >= 1)
                    {
                        echo '<table data-toggle="table" class="table" style="text-align: center;">
                            <thead><tr><th style="text-align: center;">
                                <div class="th-inner" style="text-align: center;"> <i class="fa fa-shopping-cart"></i> BUTIK</div><div class="fht-cell"></div></th><th style="">
                                <div class="th-inner" style="text-align: center;"> <i class="fa fa-clock-o"></i> GÄLLER TILL</div><div class="fht-cell"></div></th><th style="">
                                <div class="th-inner" style="text-align: center;"> <i class="fa fa-cubes"></i> PRODUKTER PÅ REA</div><div class="fht-cell"></div></th><th style="">
                                <div class="th-inner" style="text-align: center;"> <i class="fa fa-external-link-square"></i> TILL REA</div><div class="fht-cell"></div></th></tr>
                            </thead>
                        <tbody>';



                        foreach ($all_active_sale as $row)
                        {
                            if ($row->end_date == '0000-00-00')
                            {
                                $date = 'Gäller tillsvidare';
                            }
                            else if (days_remaining($row->end_date) == 1)
                            {
                                $date = 'Gäller <small>'.days_remaining($row->end_date).'</small> dag till';
                            }

                            else
                            {
                                $date = 'Gäller <small>'.days_remaining($row->end_date).'</small> dagar till';
                            }

                            $num_products = number_format($row->num_products, 0, '', ' ');

                            $clicks = number_format($row->clicks, 0, ',', ' ');

                            echo '<tr>
                                <td style="">
                                    <img height="91" alt="' .$row->name.' rabattkoder" src="'.base_url($row->store_logo).'" class="attachment-full size-full">
                                </td>
                                <td style="vertical-align: middle;"> '.$date.'</td>
                                <td class="shipping" style="font-size: 24px; color: #fa471d; font-weight: 700; vertical-align: middle;"> '.$num_products.'</td>
                                <td style="vertical-align: middle;">
                                    <a href="' .base_url('ut/'.$row->link_routing_id.'').'" rel="nofollow">
                                        <button type="button" class="btn btn-danger  btn-block"><i class="fa fa-external-link-square"></i> Till REA</button>
                                    </a>
                                </td>

                            </tr>';
                        }



                        echo '</tbody>
                    </table>';

                    echo '<p>Just nu finns det totalt<strong> '.$num_products_on_sale.'   '.$nisch.' </strong> produkter på REA.</p>';

                    }
                    else
                    {
                        echo '
                        <section>
                            <div class="container col-md-12">
                                <h2 class="heading">Tyvärr</h2>
                                <p class="lead text-center">
                                    Vi har tyvärr inte någon aktuell '.$nisch.' REA att presentera. Vi på Reeo.se kontrollerar nya rabattkoder och erbjudanden dagligen men just nu finns det inget aktuellt att presentera.
                                </p>
                            </div>
                        </section>';
                    }


                    if (!empty($page_info->bottom_text)) {
                        echo '

                            <h2 class="heading">Mer om '.$page_info->nisch.'</h2>
                            <p>' .$page_info->bottom_text.'</p>

                        ';
                    }
                 ?>


            </div>
        </div>
        <div class="col-md-3 filter-by-block md-margin-bottom-60">

            <?php
                if(!empty($subcategories))
                {
                    echo '<div class="panel-group" id="accordion-v3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-v3" href="#collapseThree">Underkategorier <i class="fa fa-angle-down"></i></a></h2>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in">
                                <div class="panel-body">
                                <ul class="list-unstyled checkbox-list">';

                                foreach ($subcategories as $row)
                                {
                                    echo '<li class="coupong-list"><a style="text-decoration: none;" href="'.base_url('rea/'.strtolower($row['current_cat']).'/'.swe_characters(strtolower($row['swe_nisch']))).'">'.$row['nisch'].'</a></li>';
                                }

                                    echo '
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!--/end panel group-->';
                }

             ?>

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
</div>
