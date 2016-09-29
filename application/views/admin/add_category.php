<div class="row">
    <div class="col-lg-12">
        <div class="ibox-title">
            <h5>Lägg till Kategori</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo form_open('admin/add_category_process'); ?>
                    <fieldset class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kategori:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category" name="category" placeholder="Kategori...">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Lägg till kategori</button>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
