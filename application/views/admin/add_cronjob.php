<?php
	if(isset($error))
	{
		echo $error;
	}
?>

<div class="col-lg-12">
	<div class="tabs-container">
    	<?php echo form_open_multipart('admin/new_cronjob_process'); ?>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Basic info</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Url:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="url" name="url" placeholder="Vilken url ska vi hämta data ifrån?"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Xpath:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="xpath" name="xpath" placeholder="Xpath"></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Produkt:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="product" name="product" placeholder="Används för logga cronjob"></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Butik:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="store" name="store" placeholder="Används för logga cronjob"></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">REA - Kampanj:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="sale_campaign_id" name="sale_campaign_id">
                                        <?php
											echo '<option value="0">Ingen kategori</option>';
        									foreach ($sale_campaigns->result() as $sale_campaign)
        									{
        										echo '<option value="' . $sale_campaign->sale_campaign_id . '">' . $sale_campaign->title . '</option>';
        									}
        								?>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Lägg till Cronjob</button>
                        </fieldset>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
