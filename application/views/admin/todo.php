<div class="row">
    <div class="col-lg-12">
        <div class="ibox-content">

            <table data-page-size="500" class="table">
                <thead>
                    <tr>
                        <th data-toggle="true">Butik</th>
                        <th>URL</th>
                        <th>Uppdaterad</th>
                        <th>Rabattkoder</th>
                        <th>Online</th>
                        <th data-sort-ignore="true">Uppdatera butiken</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_butiker as $butik) {
                        if($butik->rabattkoder == 1)
                        {
                            $rabattkoder = '<span class="label label-primary">Tillåtet</span>';
                        }
                        else
                        {
                            $rabattkoder = '<span class="label label-danger">Inte tillåtet</span>';
                        }

                        if($butik->online == 1)
                        {
                            $online = '<span class="label label-primary">Online</span>';
                        }
                        else
                        {
                            $online = '<span class="label label-danger">Inte online</span>';
                        }
                        echo '
                        <tr>
                            <td>' .$butik->namn. '</td>
                            <td><a target="_blank" href="' .$butik->url. '">' .$butik->url. '</a></td>
                            <td>' .$butik->uppdaterad. '</td>
                            <td>' .$rabattkoder. '</td>
                            <td>' .$online. '</td>
                            <td><a href="' .base_url('admin/todo/uppdatera/'. $butik->id). '"><span class="label label-success">Uppdatera</span></a></td>

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
