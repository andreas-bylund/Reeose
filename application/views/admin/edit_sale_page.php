<?php


	if(isset($error))
	{
		echo $error;
	}
?>

<div class="col-lg-12">
    <div class="tabs-container">
        <?php
			echo form_open_multipart('admin/edit_sale_page_process');
			echo form_hidden('sale_campaign_id', $sale_campaign_id);
			echo form_hidden('link_routing_id', $sale_info->link_routing_id);
			echo form_hidden('sale_content_id', $sale_info->sale_content_id);
		?>

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">REA - Kampanj</a></li>
				<li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Bottom text</a></li>
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
											echo '<option value="' . $sale_info->store_id . '">' . $sale_info->name . '</option>';
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
											echo '<option value="' . $sale_info->sale_page_id . '">' . $sale_info->nisch . '</option>';
                                            echo '<option value="0">Ingen</option>';
        									foreach ($sale_pages->result() as $sale_page)
        									{
        										echo '<option value="' . $sale_page->sale_id . '">' . $sale_page->nisch . '</option>';
        									}
        								?>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
	                            <label class="col-sm-2 control-label">Aktiv?</label>
	                            <div class="col-sm-10">
	                                <select class="form-control" id="active" name="active">
	                                    <?php
	                                        if($sale_info->active == 0)
	                                        {
	                                            echo '<option value="0" selected="selected">Nej</option>';
	                                            echo '<option value="1">Ja</option>';
	                                        }
	                                        else
	                                        {
	                                            echo '<option value="0">Nej</option>';
	                                            echo '<option value="1" selected="selected">Ja</option>';
	                                        }
	                                    ?>
	                                </select>
	                            </div>
	                        </div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Synas på rabattkod/x? </label>
								<div class="col-sm-10">
									<select class="form-control" id="show_coupon_detail" name="show_coupon_detail">
										<?php
											if($sale_info->show_coupon_detail == 0)
											{
												echo '<option value="0" selected="selected">Nej</option>';
												echo '<option value="1">Ja</option>';
											}
											else
											{
												echo '<option value="0">Nej</option>';
												echo '<option value="1" selected="selected">Ja</option>';
											}
										?>
									</select>
								</div>
							</div>

							<hr>
                            <div class="form-group"><label class="col-sm-2 control-label">Rubrik:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="title" name="title" placeholder="Rubrik..." value="<?php echo $sale_info->title; ?>"></div>
                            </div>

							<div class="form-group"><label class="col-sm-2 control-label">Antal produkter:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="num_products" name="num_products" placeholder="Antal produkter i REA:an..." value="<?php echo $sale_info->num_products; ?>"></div>
                            </div>

							<div class="form-group">
	                            <label class="col-sm-2 control-label">Gäller till:</label>
	                            <div class="col-sm-10">
	                                <input type="text" class="form-control" id="end_date" name="end_date" placeholder="REA:an gäller till? (Datum, 2015-12-31)" value="<?php echo $sale_info->end_date; ?>">
	                            </div>
	                        </div>

							<div class="form-group"><label class="col-sm-2 control-label">Målsida:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="target_url" name="target_url" placeholder="Till vilken url ska användaren skickas?" value="<?php echo $sale_info->target_url; ?>"></div>
                            </div>

							<div class="form-group"><label class="col-sm-2 control-label">Beskrivning</label>
	                            <div class="col-sm-10">
	                                <textarea class="form-control" rows="10" cols="75" name="text" id="text"><?php echo $sale_info->text; ?></textarea>
	                            </div>
	                        </div>





                            <button type="submit" class="btn btn-primary">Uppdatera REA-kampanj</button>
                        </fieldset>
                    </div>
                </div>

				<div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Bottom-text:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="10" cols="75" name="bottom_text" id="bottom_text"><?php echo $sale_info->bottom_text; ?></textarea>
                                </div>
                            </div>


                        </fieldset>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
