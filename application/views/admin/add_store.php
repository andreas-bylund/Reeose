<?php
	if(isset($error))
	{
		echo $error;
	}
?>

<div class="col-lg-12">
	<div class="tabs-container">
    	<?php echo form_open_multipart('admin/add_store_process'); ?>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Basic info</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Text</a></li>
                <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">SEO</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Butik:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="name" name="name" placeholder="Namnet på butiken - Tex. Ellos.se"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Title:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="title" name="title" placeholder="Title på sidan"></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Slug:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="slug" name="slug" placeholder="http://reeo.se/rabattkod/SLUG"></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">URL:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="url" name="url" placeholder="URL till webbutiken (inte affiliate)"></div>
                            </div>

							<div class="form-group"><label class="col-sm-2 control-label">Affiliate-url:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="affiliate_url" name="affiliate_url" placeholder="Affiliate url - Tex: https://track.adtraction.com/t/t?a=56804152&as=147209621&t=2&tk=1&url={url}&epi={epi}"></div>
                            </div>

							<div class="form-group"><label class="col-sm-2 control-label">Affiliate-img:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="affiliate_img" name="affiliate_img" placeholder="Affiliate img link"></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="category" name="category">
                                        <?php
											echo '<option value="0">Ingen kategori</option>';
        									foreach ($categories->result() as $category)
        									{
        										echo '<option value="' . $category->id . '">' . $category->cat_name . '</option>';
        									}
        								?>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
                                <label class="col-sm-2 control-label">Sub-Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="subcategory" name="subcategory">
                                        <?php
											echo '<option value="0">Ingen sub-kategori</option>';

											foreach ($subcategories->result() as $subcategory)
        									{
        										echo '<option value="' . $subcategory->id . '">' . $subcategory->name . '</option>';
        									}
        								?>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
                                <label class="col-sm-2 control-label">Rabattkoder tillåtet?</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="coupons" name="coupons">
                                        <option value="0">Nej</option>
										<option value="1">Ja</option>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
                                <label class="col-sm-2 control-label">Online?</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="online" name="online">
										<option value="0">Nej</option>
										<option value="1" selected="selected">Ja</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
    							<label class="col-sm-2 control-label">Logo:</label>
                                <div class="col-sm-10">
			                         <input type= "file" name="logo" size= "20" />
                                 </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Lägg till butik</button>
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

                            <div class="form-group"><label class="col-sm-2 control-label">Text längst ner:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="10" cols="75" name="bottom_text" id="bottom_text"></textarea>
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
                                    <textarea class="form-control" rows="2" cols="30" name="meta_des" id="meta_des"></textarea>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Meta tags:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="meta_tag" id="meta_tag" placeholder="Meta tags"></div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
