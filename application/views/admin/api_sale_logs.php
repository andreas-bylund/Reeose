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
                        <th>ID</th>

                        <th >Produkt</th>
                        <th>Antal produkter</th>
                        <th>Datum</th>
                        <th>Butik</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($api_logs as $log)
                    {

                        echo '
                        <tr>
                            <td>' .$log->autosale_id. '</td>
                            <td>' .$log->product. '</td>
                            <td>' .$log->num_products. '</td>
                            <td>' .$log->date. '</td>
                            <td>' .$log->store. '</td>
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
