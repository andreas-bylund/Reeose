<section>
      <div class="container">
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <div class="heading">
              <h2>Login</h2>
            </div>
          </div>
          <div class="col-md-8 col-md-offset-2">
            <?php echo form_open('process_adminlogin'); ?>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstname">Username</label>
                    <input id="username" name="username" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="lastname">Password</label>
                    <input id="password" name="password" type="password" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Login</button>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
