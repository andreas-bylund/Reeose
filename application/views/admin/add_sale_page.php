<?php
	if(isset($error))
	{
		echo $error;
	}
?>

<div class="col-lg-12">
    <div class="tabs-container">
        <?php echo form_open_multipart('admin/add_sale_page_process'); ?>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Nisch</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Text</a></li>
                <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">SEO</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Nisch:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="nisch" name="nisch" placeholder="Vilken produkt vill du promota? - Tex. Barnkläder"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Title:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="title" name="title" placeholder="Title på sidan"></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Slug:</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="slug" name="slug" placeholder="http://reeo.se/rea/SLUG"></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="category" name="category">
                                        <?php
                                            echo '<option value="0">Ingen</option>';
        									foreach ($categories->result() as $category)
        									{
        										echo '<option value="' .$category->all_categories_id. '">' .$category->cat_name. '</option>';
        									}
        								?>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
                                <label class="col-sm-2 control-label">Sub-kategori:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="subcategory" name="subcategory">
                                        <?php
                                            echo '<option value="0">Ingen</option>';
        									foreach ($subcategories->result() as $subcategory)
        									{
        										echo '<option value="' .$subcategory->subcat_id. '">' .$subcategory->subcat_name. '</option>';
        									}
        								?>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Lägg till REA-Sida</button>
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
