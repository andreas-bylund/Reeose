<?php


	if(isset($error))
	{
		echo $error;
	}
?>

<div class="col-lg-12">
    <div class="tabs-container">
        <?php
			echo form_open_multipart('admin/add_sale_campaign_process');

		?>

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">REA - Kampanj</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
							<div class="form-group">
                                <label class="col-sm-2 control-label">Butik:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="store_id" name="store_id">
                                        <?php
                                            echo '<option value="0">Ingen</option>';
        									foreach ($stores->result() as $store)
        									{
        										echo '<option value="' . $store->id . '">' . $store->name . '</option>';
        									}
        								?>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
                                <label class="col-sm-2 control-label">Koppla till REA-sida:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="sale_page_id" name="sale_page_id">
                                        <?php
                                            echo '<option value="0">Ingen</option>';
        									foreach ($sale_pages->result() as $sale_page)
        									{
        										echo '<option value="' . $sale_page->sale_id . '">' . $sale_page->nisch . '</option>';
        									}
        								?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Rubrik:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="title" name="title" placeholder="Rubrik..."></div>
                            </div>

							<div class="form-group"><label class="col-sm-2 control-label">Antal produkter:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="num_products" name="num_products" placeholder="Antal produkter i REA:an..."></div>
                            </div>

							<div class="form-group">
	                            <label class="col-sm-2 control-label">Gäller till:</label>
	                            <div class="col-sm-10">
	                                <input type="text" class="form-control" id="end_date" name="end_date" placeholder="REA:an gäller till? (Datum, 2015-12-31)">
	                            </div>
	                        </div>

							<div class="form-group"><label class="col-sm-2 control-label">Målsida:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="target_url" name="target_url" placeholder="Till vilken url ska användaren skickas?"></div>
                            </div>

							<div class="form-group"><label class="col-sm-2 control-label">Beskrivning</label>
	                            <div class="col-sm-10">
	                                <textarea class="form-control" rows="10" cols="75" name="text" id="text"></textarea>
	                            </div>
	                        </div>

                            <button type="submit" class="btn btn-primary">Lägg till REA-kampanj</button>
                        </fieldset>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
