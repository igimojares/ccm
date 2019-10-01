<link href="<?php echo base_url() .'public'; ?>/assets/jqueryui/jquery-ui.structure.min.css" rel="stylesheet" />
<link href="<?php echo base_url() .'public'; ?>/assets/jqueryui/jquery-ui.theme.min.css" rel="stylesheet" />
<script src="<?php echo base_url() .'public'; ?>/assets/jqueryui/jquery-ui.min.js"></script>

<script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>


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
                <h5 class="title">Search</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url() . 'index.php/search/submit'; ?>" method="post">
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                       
                        <input type="text" name="cif" class="form-control" placeholder="Client Information File" value="<?php echo set_value('cif'); ?>">
							<?php echo form_error('cif', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
                      </div>
                    </div>
					  <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <input type="text" name="dateFrom" id="from" class="form-control input-sm" placeholder="Date From" value="">
                      </div>
                    </div>
					  <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <input type="text" name="dateTo" id="to" class="form-control" placeholder="Date To" value="">
					  </div>
                    </div>
					
					  <div class="col-md-3 pr-1">
                     
                       <div class="form-group">
						<button class="btn btn-primary btn-sm">
							Search
						</button>
						</div>
					 
                    </div>
                     
                  </div>
				 
				  
				  <hr />
				  
				
                </form>
				
              </div>
            </div>
          </div>
  
        </div>
      </div>
      