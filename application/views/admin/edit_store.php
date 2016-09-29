<?php
	if(isset($error))
	{
		echo $error;
	}
?>

<div class="col-lg-12">
	<div class="tabs-container">
    	<?php
			echo form_open_multipart('admin/edit_store_process');
			echo form_hidden('store_id', $store_id);
			echo form_hidden('content_id', $product_info->content_id);
			echo form_hidden('header_data_id', $product_info->header_data_id);
			echo form_hidden('link_routing_id', $product_info->link_routing_id);

		?>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Basic info</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Text</a></li>
                <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">SEO</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body"><span class="label label-danger">Det går inte att uppdatera Logon just nu.</span>
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Butik:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="name" name="name" placeholder="Namnet på butiken - Tex. Ellos.se" value="<?php echo $product_info->name; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Title:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="title" name="title" placeholder="Title på sidan" value="<?php echo $product_info->title; ?>"></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Slug:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="slug" name="slug" placeholder="http://reeo.se/rabattkod/SLUG" value="<?php echo $product_info->slug; ?>"></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">URL:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="url" name="url" placeholder="URL till webbutiken (inte affiliate)" value="<?php echo $product_info->url; ?>"></div>
                            </div>

							<div class="form-group"><label class="col-sm-2 control-label">Affiliate-url:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="affiliate_url" name="affiliate_url" placeholder="Affiliate url" value="<?php echo $product_info->affiliate_link; ?>"></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="category" name="category">
                                        <?php

        									foreach ($categories->result() as $category)
        									{

        										echo '<option value="' . $category->all_categories_id . '">' . $category->cat_name . '</option>';
        									}
        								?>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
                                <label class="col-sm-2 control-label">Rabattkoder tillåtet?</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="coupons" name="coupons">
										<?php
											if($product_info->coupons == 0)
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
                                <label class="col-sm-2 control-label">Online?</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="online" name="online">
										<?php
											if($product_info->online == 0)
											{
												echo '<option value="0" selected="selected">Nej</option>';
												echo '<option value="1">Ja</option>';
											}
											else
											{
												echo '<option value="1" selected="selected">Ja</option>';
												echo '<option value="0">Nej</option>';
											}
										?>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
                                <label class="col-sm-2 control-label">Startsidan?</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="featured" name="featured">
										<?php
											if($product_info->featured == 0)
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
    							<label class="col-sm-2 control-label">Logo:</label>
                                <div class="col-sm-10">
									<img src="<?php echo base_url($product_info->store_logo); ?>">
			                         <input type= "file" name="logo" size= "20" />
                                 </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Uppdatera butik</button>
                        </fieldset>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Lead-text:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="10" cols="30" name="lead_text" id="lead_text"><?php echo $product_info->lead_text; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Text</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="10" cols="75" name="bottom_text" id="bottom_text"><?php echo $product_info->bottom_text; ?></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Meta Description: </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="2" cols="30" name="meta_des" id="meta_des"><?php echo $product_info->meta_description; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Meta tags:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="meta_tag" id="meta_tag" placeholder="Meta tags" value="<?php echo $product_info->meta_tags; ?>"></div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
