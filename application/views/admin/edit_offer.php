<div class="row">
    <div class="col-lg-12">
        <div class="ibox-title">
            <h5>Ändra erbjudande</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                        echo form_open('admin/edit_offer_process');
                        echo form_hidden('offer_id', $offer_id);
                        echo form_hidden('link_routing_id', $offer_info->link_routing_id);
                    ?>

                    <fieldset class="form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Erbjudandet Aktivt?</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="active" name="active">
                                    <?php
                                        if($offer_info->active == 0)
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
                            <label class="col-sm-2 control-label">Featured?</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="featured" name="featured">
                                    <?php
                                        if($offer_info->featured == 0)
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
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Butik: </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="store_id" name="store_id">
                                    <?php
                                    echo '<option value="' . $offer_info->store_id .'">' . $offer_info->name .'</option>';
    									foreach ($stores->result() as $store)
    									{
    										echo '<option value="' . $store->id . '">' . $store->name . '</option>';
    									}
    								?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Rubrik:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="title" id="title" placeholder="Rubrik..." value="<?php echo $offer_info->title; ?>"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gäller till:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Erbjudandet gäller till? (Datum, 2015-12-31)" value="<?php echo $offer_info->end_date; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Målsida:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="target_url" name="target_url" placeholder="Målsida..." value="<?php echo $offer_info->target_url; ?>">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Beskrivning</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="10" cols="75" name="text" id="text"><?php echo $offer_info->text; ?></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Uppdatera erbjudande</button>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
