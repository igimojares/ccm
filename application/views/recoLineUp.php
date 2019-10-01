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
					<h5 class="title">UST Center for Campus Ministry Recollection Line-up AY 2019-2020</h5>
				</div>
				<div class="card-body">
				
				<form>
					<div class="row">
						<div class="col-md-12 pr-1">
							<div class="form-group">
								<label>College<span style="color:red;">*</label>
								<select class="form-control" name="college" id="college">
									<option value="IICS">IICS</option>
								</select>
								<?php echo form_error('college', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Date<span style="color:red;">*</label>
								<input type="datetime-local" name="date" id="datepicker" class="form-control" placeholder="Date" value="<?php echo set_value('date'); ?>">
								<?php echo form_error('lastName', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
						
						<div class="col-md-6 pr-1">
						  <div class="form-group">
							<label>Venue<span style="color:red;">*</label>
							<input type="text" name="venue" id="venue" class="form-control" placeholder="Venue" value="<?php echo set_value('date'); ?>">
							<?php echo form_error('venue', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
						  </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Speaker<span style="color:red;">*</label>
								<input type="text" name="speaker" id="speaker" class="form-control" placeholder="Speaker" value="<?php echo set_value('date'); ?>">
								<?php echo form_error('speaker', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
						
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Main Celebrant<span style="color:red;">*</label>
								<input type="text" name="mainCelebrant" id="mainCelebrant" class="form-control" placeholder="Main Celebrant" value="<?php echo set_value('date'); ?>">
								<?php echo form_error('mainCelebrant', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
					</div>
				</form> <!-- form end -->
				</div><!-- card body end-->
            </div> <!--card-->
          </div>
		</div> <!--content row end-->
</div> <!--content end -->
      