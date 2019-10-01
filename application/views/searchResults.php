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
  
  	function callModal(id,name){
		
		var postData = {
		'customerId' : id
		};
		$('#loadingimage1').show();
		//alert(x);
		$.ajax({
			url: "<?php echo site_url('/search/details'); ?>",
			data: postData,
			type: "POST",
			success: function(data)
			{
				$('#mcontent').html(data);
			},
			complete: function()
			{
				$('#loadingimage1').hide();
			}
			})
			
		//$('#driverModal').modal('toggle');

		
		
		document.getElementById("customerName").innerHTML = name;
		$('input[type=checkbox]').prop('checked',false);
		$('#customerId').val(id);
		$('#notesModal').modal('toggle')
		
	}
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
				
				<div class="row">
					<div class="col-md-12">
					 <div class="table-responsive">
					
						<?php if(!empty($query)){ ?>
						  <table class="table" id="myTable">
							<thead class=" text-primary">
							  <th>Customer Information File</th>
							  <th>Name</th>
							  <th>Transaction Date</th>
							  <th></th>
							</thead>
							<tbody>
							  <?php 
								
									foreach($query as $q){ 
							  ?>
								<tr>
									<td><a href="#" onClick="callModal('<?php echo $q->customerId; ?>','<?php echo strtoupper($q->firstName .' '. $q->middleName . ' ' . $q->lastName); ?>');"><?php echo $q->cif; ?></a></td>
									<td><?php echo strtoupper($q->firstName .' '. $q->middleName . ' ' . $q->lastName); ?></td>
									<td><?php echo $q->transactionDate; ?></td>
								</tr>
								
							  <?php 
									
								}
							  ?>
							</tbody>
						  </table>
						<?php }
							else
							{
								echo "<div><h4>No results found!</h4></div>";
							}
						?>
						</div>
					</div>
				</div>
              </div>
            </div>
          </div>
  
        </div>
      </div>
	  


<!-- Modal -->
<form method="post" action="<?php echo base_url() . 'index.php/transaction/add/'; ?>">
<div class="modal fade" id="notesModal" tabindex="-1" role="dialog" aria-labelledby="notesModals" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerName" style="font-size:12pt;"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div id="mcontent">
		
		</div>
	 
	  <input type="hidden" value="" id="customerId" name="customerId" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
</form>
      