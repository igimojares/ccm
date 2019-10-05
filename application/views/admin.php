
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
                <h5 class="title">Add User</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url() . 'index.php/welcome/addUserAdmin'; ?>" method="post">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>UserName<span style="color:red;">*</label>
                        <input type="text" name="username" class="form-control" placeholder="UserName" value="<?php echo set_value('username'); ?>">
							<?php echo form_error('username', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
                  
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email<span style="color:red;">*</label>
                        <input type="text" name="email" class="form-control" placeholder="Email address" value="<?php echo set_value('email'); ?>">
						<?php echo form_error('email', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
                  </div>
				   <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name<span style="color:red;">*</span></label>
                        <input type="text" name="firstName" class="form-control" placeholder="First Name" value="<?php echo set_value('firstName'); ?>">
						<?php echo form_error('firstName', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
              
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Last Name<span style="color:red;">*</label>
                        <input type="text" name="lastName"class="form-control" placeholder="LastName" value="<?php echo set_value('lastName'); ?>">
						<?php echo form_error('lastName', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
                  </div>
				  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Password<span style="color:red;">*</span></label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
						<?php echo form_error('password', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
              
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Confirm Password<span style="color:red;">*</label>
                        <input type="password" name="confPassword"class="form-control" placeholder="Password" value="<?php echo set_value('confPassword'); ?>">
						<?php echo form_error('confPassword', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
                  </div>
				  
				  <hr />
				  
				<button class="btn btn-primary btn-lg pull-right">
					Add User
                </button>
                 
                </form>
				
				
				<div class="table-responsive">
				
				<?php if(!empty($query)){ ?>
                  <table class="table" id="myTable">
                    <thead class=" text-primary">
                      <th>username</th>
                      <th>Name</th>
                      <th>email</th>
                      <th>admin</th>
                      <th>active</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php 
						
							foreach($query as $q){ 
					  ?>
						<form action="<?php echo base_url() . 'index.php/welcome/update/'; ?>" method="post" >
						<tr>
							<td><?php echo $q->username; ?></td>
							<td><?php echo strtoupper($q->firstName .' ' . $q->lastName); ?></td>
							<td><?php echo $q->email; ?></td>
							<td>
								<input  type="hidden" name="user" value="<?php echo $q->username; ?>"/>
								<input type="checkbox" name="admin" value='1' <?php if($q->isAdmin == '1') { echo 'checked=checked';} ?> />
							</td>
							<td>
								<input type="checkbox" name="active" value='1' <?php if($q->status == 'Active') { echo 'checked=checked';} ?> />
							</td>
							<td><button type="submit">Update</button></td>
						</tr>
						</form>
						
					  <?php 
							
						}
					  ?>
                    </tbody>
                  </table>
				<?php }
					else
					{
						echo "<h4>No results found!</h4>";
					}
				?>
                </div>
              </div>
            </div>
          </div>
  
        </div>
      </div>
      