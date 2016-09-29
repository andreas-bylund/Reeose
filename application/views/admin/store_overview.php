<?php
/*
echo '<pre>';
print_r($all_butiker);
echo '</pre>';
*/
 ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox-content">
            <table data-page-size="500" class="table ">
                <thead>
                    <tr>
                        <th data-hide="all">Butik ID</th>
                        <th data-toggle="true">Butik</th>
                        <th data-hide="all">URL</th>
                        <th data-hide="all">Title</th>
                        <th data-hide="all">Meta description</th>
                        <th data-hide="all">Meta tags</th>
                        <th data-hide="all">Logo</th>
                        <th>Uppdaterad</th>
                        <th>Rabattkoder</th>
                        <th>Online</th>
                        <th>Featured @ Homepage</th>
                        <th data-sort-ignore="true">Manage</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_stores as $store) {
                        if($store->coupons == 1)
                        {
                            $coupon = '<span class="label label-primary">Tillåtet</span>';
                        }
                        else
                        {
                            $coupon = '<span class="label label-danger">Inte tillåtet</span>';
                        }

                        if($store->online == 1)
                        {
                            $online = '<span class="label label-primary">Online</span>';
                        }
                        else
                        {
                            $online = '<span class="label label-danger">Inte online</span>';
                        }

                        if($store->featured == 1)
                        {
                            $featured = '<span class="label label-primary">Ja</span>';
                        }
                        else
                        {
                            $featured = '<span class="label label-danger">Nej</span>';
                        }
                        echo '
                        <tr>
                            <td>' .$store->id. '</td>
                            <td>' .$store->name. '</td>
                            <td>' .$store->url. '</td>
                            <td>' .$store->title. '</td>
                            <td>' .$store->meta_description. '</td>
                            <td>' .$store->meta_tags. '</td>
                            <td><img src="' .base_url($store->store_logo). '"></td>
                            <td>' .$store->updated. '</td>
                            <td>' .$coupon. '</td>
                            <td>' .$online. '</td>
                            <td>' .$featured. '</td>
                            <td><a href="' .base_url('rabattkod/' . $store->slug). '"><span class="label label-success">View</span></a> <a href="' .base_url('admin/edit_store/' .$store->id.''). '"><span class="label label-warning">Edit</span></a> <a href="' .base_url('delete_store/' .$store->id.''). '"><span class="label label-danger">Delete</span></a></td>

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
