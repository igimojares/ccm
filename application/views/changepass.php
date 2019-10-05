<div class="content">
    <div class="row">
		<div class="col-md-12">	
            <div class="card">
              <div class="card-header">
                <h5 class="title">ChangePassword</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url() . 'index.php/welcome/updatePassword'; ?>" method="post">
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <input type="hidden" name="key" required class="form-control" placeholder="password" value="<?php echo $this->input->get('key'); ?>">
                        <input type="password" name="password" required class="form-control" placeholder="password" value="<?php echo set_value('password'); ?>">
						<?php echo form_error('password', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
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
      