<div class="row">
    <div class="col-lg-12">
        <div class="ibox-title">
            <h5>Lägg till Sub-Kategori</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo form_open('admin/add_subcategory_process'); ?>
                    <fieldset class="form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Huvudkategori:</label>
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
                            <label class="col-sm-2 control-label">Sub-kategori:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="subcategory" name="subcategory" placeholder="Kategori...">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Lägg till Sub-kategori</button>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
