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
                        <th data-hide="all">ID</th>
                        <th data-toggle="true">Butik</th>
                        <th>Aktiv?</th>
                        <td>rabattkod/x?</td>
                        <th>Title</th>
                        <th>Slutdatum</th>
                        <th>Startsidan</th>
                        <th data-hide="all">Text</th>
                        <th data-sort-ignore="true">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_offers as $offer)
                    {

                        if($offer->active == 1)
                        {
                            $active = '<span class="label label-primary">Aktiv</span>';
                        }
                        else
                        {
                            $active = '<span class="label label-danger">Inte Aktiv</span>';
                        }

                        if($offer->featured == 1)
                        {
                            $homepage = '<span class="label label-primary">På startsidan</span>';
                        }
                        else
                        {
                            $homepage = '<span class="label label-danger">Inte på startsidan</span>';
                        }

                        if($offer->show_coupon_detail == 1)
                        {
                            $show_coupon_detail = '<span class="label label-primary">Ja</span>';
                        }
                        else
                        {
                            $show_coupon_detail = '<span class="label label-danger">Nej</span>';
                        }

                        echo '
                        <tr>
                            <td>' .$offer->offer_id. '</td>
                            <td>' .$offer->name. '</td>
                            <td>' .$active. '</td>
                            <td>' .$show_coupon_detail. '</td>
                            <td>' .$offer->title. '</td>
                            <td>' .$offer->end_date. '</td>
                            <td>' .$homepage. '</td>
                            <td>' .$offer->text. '</td>
                            <td><a href="' .base_url('admin/edit_offer/' .$offer->offer_id.''). '"><span class="label label-warning">Edit</span></a> <a href="' .base_url('delete_store/' .$offer->offer_id.''). '"><span class="label label-danger">Delete</span></a></td>
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
