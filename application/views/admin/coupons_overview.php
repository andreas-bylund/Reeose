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
                        <th >Aktiv</th>
                        <th >Rabattkod</th>
                        <th >Slutdatum</th>
                        <th >Startsidan</th>
                        <th data-hide="all">Title</th>
                        <th data-hide="all">Text</th>
                        <th data-sort-ignore="true">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_coupons as $coupon)
                    {

                        if($coupon->active == 1)
                        {
                            $active = '<span class="label label-primary">Aktiv</span>';
                        }
                        else
                        {
                            $active = '<span class="label label-danger">Inte Aktiv</span>';
                        }

                        if($coupon->featured_home == 1)
                        {
                            $homepage = '<span class="label label-primary">På startsidan</span>';
                        }
                        else
                        {
                            $homepage = '<span class="label label-danger">Inte på startsidan</span>';
                        }

                        echo '
                        <tr>
                            <td>' .$coupon->coupon_id. '</td>
                            <td>' .$coupon->name. '</td>
                            <td>' .$active. '</td>
                            <td>' .$coupon->code. '</td>
                            <td>' .$coupon->end_date. '</td>
                            <td>' .$homepage. '</td>
                            <td>' .$coupon->title. '</td>
                            <td>' .$coupon->text. '</td>
                            <td><a href="' .base_url('rabattkoder/?k=' .$coupon->coupon_id). '"><span class="label label-success">View</span></a> <a href="' .base_url('admin/edit_coupon/' .$coupon->coupon_id.''). '"><span class="label label-warning">Edit</span></a> <a href="' .base_url('delete_coupon/' .$coupon->coupon_id.''). '"><span class="label label-danger">Delete</span></a></td>
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
