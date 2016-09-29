<?php
/*
echo '<pre>';
print_r($all_rabattkoder);
echo '</pre>';
//exit();
*/
 ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox-content">
            <table data-page-size="500" class="table ">
                <thead>
                    <tr>
                        <th >Aktiv</th>
                        <th>Typ</th>
                        <th>Finns på /rabattkod/x?</th>
                        <th data-hide="all">ID</th>
                        <th>Butik</th>
                        <th>Nisch</th>
                        <th >Antal produkter</th>
                        <th >Slutdatum</th>
                        <th data-hide="all">Title</th>
                        <th data-hide="all">Text</th>
                        <th data-sort-ignore="true">Manage</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($all_sale as $all_sale)
                    {
                        if($all_sale->subcategory_id == 0)
                        {
                            $cat = '<span class="label label-primary">Huvudsida</span>';
                        }
                        else
                        {
                            $cat = '<span class="label label-info">Undersida</span>';
                        }

                        if($all_sale->active == 1)
                        {
                            $active = '<span class="label label-primary">Aktiv</span>';
                        }
                        else
                        {
                            $active = '<span class="label label-danger">Inte Aktiv</span>';
                        }

                        if($all_sale->show_coupon_detail == 1)
                        {
                            $show_coupon_detail = '<span class="label label-primary">Ja</span>';
                        }
                        else
                        {
                            $show_coupon_detail = '<span class="label label-danger">Nej</span>';
                        }

                        echo '
                        <tr>
                            <td>' .$active. '</td>
                            <td>' .$cat. '</td>
                            <th>' .$show_coupon_detail. '</td>
                            <td>' .$all_sale->sale_campaign_id. '</td>
                            <td>' .$all_sale->name. '</td>
                            <td>' .$all_sale->nisch. '</td>
                            <td>' .$all_sale->num_products. '</td>

                            <td>' .$all_sale->end_date. '</td>


                            <td>' .$all_sale->title. '</td>
                            <td>' .$all_sale->text. '</td>
                            <td> <a href="' .base_url('admin/edit_sale_page/' .$all_sale->sale_campaign_id.''). '"><span class="label label-warning">Edit</span></a> <a href="' .base_url('delete_coupon/' .$all_sale->sale_campaign_id.''). '"><span class="label label-danger">Delete</span></a></td>
                        </tr>';
                    }

                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="footable-visible">
                            <ul class="pagination pull-right"><li class="footable-page-arrow disabled"><a data-page="first" href="#first">«</a></li><li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li><li class="footable-page active"><a data-page="0" href="#">1</a></li><li class="footable-page"><a data-page="1" href="#">2</a></li><li class="footable-page"><a data-page="2" href="#">3</a></li><li class="footable-page"><a data-page="3" href="#">4</a></li><li class="footable-page"><a data-page="4" href="#">5</a></li><li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li><li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li></ul>
                        </td>
                    </tr>
                </tfoot>
        </div>
    </div>
</div>
