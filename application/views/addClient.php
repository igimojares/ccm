
      <div class="content">
        <div class="row">
          <div class="col-md-12">
				<?php if($this->input->get('message') != ''){ ?>
					<?php if($this->input->get('mode') == 'true'){ ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Success!</strong> <?php echo $this->input->get('message'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } else { ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> <?php echo $this->input->get('message'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } ?>
				<?php } ?>
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add Client Profile</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url() . 'index.php/customer/addCustomer'; ?>" method="post">
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Client Information File (CIF)<span style="color:red;">*</label>
                        <input type="text" name="cif" class="form-control" placeholder="Client Information File" value="<?php echo set_value('cif'); ?>">
							<?php echo form_error('cif', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
                  </div>
				   <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Last name<span style="color:red;">*</label>
                        <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="<?php echo set_value('lastName'); ?>">
						<?php echo form_error('lastName', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
                  </div>
				   <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>First Name<span style="color:red;">*</span></label>
                        <input type="text" name="firstName" class="form-control" placeholder="First Name" value="<?php echo set_value('firstName'); ?>">
						<?php echo form_error('firstName', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
                  </div>
				   <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Middle Name<span style="color:red;">*</label>
                        <input type="text" name="middleName"class="form-control" placeholder="Middle Name" value="<?php echo set_value('middleName'); ?>">
						<?php echo form_error('middleName', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
                  </div>
				  
				  <hr />
				  
				<button class="btn btn-primary btn-lg pull-right">
					Add Client
                </button>
                 
                </form>
              </div>
            </div>
          </div>
  
        </div>
      </div>
      