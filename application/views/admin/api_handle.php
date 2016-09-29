<?php
	if(isset($error))
	{
		echo $error;
	}
?>

<div class="col-lg-12">
	<div class="tabs-container">

    	<?php
			echo form_open_multipart('admin/api/adrecod_process');
			echo form_hidden('butik_id', $all_stores->id);
			echo form_hidden('logo_src', $all_stores->logo_src);
			echo form_hidden('meta_des', '');
			echo form_hidden('meta_tag', '');
			echo form_hidden('title', '');
		?>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Basic info</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Text</a></li>

            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Butik:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="name" name="name" placeholder="Namnet på butiken - Tex. Ellos.se" value="<?php echo $all_stores->name; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Title:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="title" name="title" placeholder="Title på sidan" value="<?php echo $all_stores->title; ?>"></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Slug:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="slug" name="slug" placeholder="http://reeo.se/rabattkod/SLUG" value=""></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">URL:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="url" name="url" placeholder="URL till webbutiken (inte affiliate)" value="<?php echo $all_stores->url; ?>"></div>
                            </div>

							<div class="form-group"><label class="col-sm-2 control-label">Affiliate-url:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="affiliate_url" name="affiliate_url" placeholder="Affiliate url" value=""></div>
                            </div>

							<div class="form-group"><label class="col-sm-2 control-label">Affiliate-img:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="affiliate_img" name="affiliate_img" placeholder="Affiliate IMG-url" value=""></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="category" name="category">
                                        <?php
        									foreach ($categories->result() as $category)
        									{
        										echo '<option value="' . $category->all_categories_id . '">' . $category->slug_cat_name . '</option>';
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
											if($all_stores->rabattkoder == 0)
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



                            <button type="submit" class="btn btn-primary">Publicera butik</button>

                        </fieldset>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Lead-text:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="10" cols="30" name="lead_text" id="lead_text"></textarea>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Bottom text:</label>
                                <div class="col-sm-10"><textarea class="form-control" rows="10" cols="30" name="bottom_text" id="bottom_text" placeholder="Bottom text"></textarea></div>
                            </div>

                        </fieldset>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
		<a href="<?php echo base_url('admin/api/adrecod/skip/' . $all_stores->id); ?>">
			<button class="btn btn-warning">Hoppa över butik</button>
		</a>

		<a href="<?php echo base_url('admin/api/adrecod/hold/' . $all_stores->id); ?>">
			<button class="btn btn-info">Vänta på godkännade av affiliateprogram</button>
		</a>
    </div>
</div>
