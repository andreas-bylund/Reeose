<div class="row">
    <div class="col-lg-12">
        <div class="ibox-title">
            <h5>Lägg till erbjudande</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo form_open('admin/add_offer_process'); ?>
                    <fieldset class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Butik: </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="store_id" name="store_id">
                                    <?php
    									foreach ($stores->result() as $store)
    									{
    										echo '<option value="' . $store->id . '">' . $store->name . '</option>';
    									}
    								?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Rubrik:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="title" id="title" placeholder="Rubrik..."></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gäller till:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Erbjudandet gäller till? (Datum, 2015-12-31)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Målsida:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="target_url" name="target_url" placeholder="Målsida...">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Beskrivning</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="10" cols="75" name="text" id="text"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Lägg till erbjudande</button>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
