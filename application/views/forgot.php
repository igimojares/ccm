<div class="content">
    <div class="row">
		<div class="col-md-12">	
            <div class="card">
              <div class="card-header">
                <h5 class="title">Forgot Password</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url() . 'index.php/welcome/forgotSubmit'; ?>" method="post">
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <input type="text" name="username" required class="form-control" placeholder="username" value="<?php echo set_value('username'); ?>">
						<?php echo form_error('username', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
					<div class="col-md-3 pr-1">
                    <div class="form-group">
						<button class="btn btn-primary btn-sm">
							Submit
						</button>
					</div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
      