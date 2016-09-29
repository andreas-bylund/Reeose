

<div class="row">
    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                        echo form_open('admin/edit_coupon_process');
                        echo form_hidden('coupon_id', $coupon_info->coupon_id);
                    ?>
                    <fieldset class="form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Startsidan?</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="featured_home" name="featured_home">
                                    <?php
                                        if($coupon_info->featured_home == 0)
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
                            <label class="col-sm-2 control-label">Rabattkod Aktivt?</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="active" name="active">
                                    <?php
                                        if($coupon_info->active == 0)
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
                            <label class="col-sm-2 control-label">Butik</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="store_id" name="store_id">
                                    <?php
                                        echo '<option value="' . $coupon_info->store_id . '">' . $coupon_info->name . '</option>';
    									foreach ($stores->result() as $store)
    									{
    										echo '<option value="' . $store->id . '">' . $store->name . '</option>';
    									}
    								?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Rabattkod:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="code" value="<?php echo $coupon_info->code; ?>" name="code" placeholder="Rabattkod...">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gäller till:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="end_date" value="<?php echo $coupon_info->end_date; ?>" name="end_date" placeholder="Rabattkoden gäller till? (Datum, 2015-12-31)">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Rubrik</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="title" id="title" placeholder="Rubrik..." value="<?php echo $coupon_info->title; ?>"></div>
                        </div>



                        <div class="form-group"><label class="col-sm-2 control-label">Beskrivning</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="10" cols="75" name="text" id="text" ><?php echo $coupon_info->text; ?></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Uppdatera rabattkod</button>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
