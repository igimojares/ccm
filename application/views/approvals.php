

<script>

	function callModal(id,name){
		
	
	var postData = {
		'transactionId' : id
	};
	$('#loadingimage1').show();
	//alert(x);
	$.ajax({
		url: "<?php echo site_url('/approval/getDetails'); ?>",
		data: postData,
		type: "POST",
		success: function(data)
		{
			var jsonData = JSON.parse(data);

			for(var x = 0; x < jsonData.length; x++)
			{	
				//alert(jsonData[x].documentId);
				$("#doc"+jsonData[x].documentId).prop('checked',true);
			}
			//alert(jsonData[0].documentId);
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
		$('#transactionId').val(id);
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
			<form method="post" action="<?php echo base_url() . 'index.php/approval/submit/'; ?>" >
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Approvals</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
				
				<?php if(!empty($query)){ ?>
                  <table class="table" id="myTable">
                    <thead class=" text-primary">
					  <th></th>
                      <th>Customer Information File</th>
                      <th>Customer Name</th>
					  <th>Logged By</th>
                      <th>Date Logged</th>
                    </thead>
                    <tbody>
						<?php foreach($query as $q){ ?>
						<tr>
							<td><input type="checkbox" name="approval[]" class="approvals" value="<?php echo $q->transactionId; ?>"	/></td>
							<td><a href="#"  onClick="callModal('<?php echo $q->transactionId; ?>','<?php echo strtoupper($q->firstName .' '. $q->middleName . ' ' . $q->lastName); ?>');" ><?php echo $q->cif; ?></a></td>
							<td><?php echo strtoupper($q->firstName .' '. $q->middleName . ' ' . $q->lastName); ?></td>
							<td><?php echo $q->maker; ?></td>
							<td><?php echo $q->transactionDate; ?></td>
						</tr>
						<?php } ?>
                    </tbody>
                  </table>
				<?php }
					else
					{
						echo "<h4>No pending approval</h4>";
					}
				?>
                </div>
					<button type="submit"  class="pull-right btn btn-primary btn-lg" >Approve</button>
              </div>
            </div>
			</form>
          </div>
		 </div>
	</div>


<!-- Modal -->
<form method="post" action="<?php echo base_url() . 'index.php/approval/update/'; ?>">
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
	 
	  <?php $x=0; foreach($notes as $n) {  if($x !=0){
			if($n->documentType != $notes[$x - 1]->documentType){
				echo '<hr />';
			}
		}?>
		
        <div class="form-check">
			<label class="form-check-label">
				<input class="form-check-input" type="checkbox" class="docs" id="doc<?php echo $n->documentId; ?>" name="documents[]" value="<?php echo $n->documentId; ?>">
				<?php echo $n->documentName; ?>
				<span class="form-check-sign">
					<span class="check"></span>
				</span>
			</label>
		</div>

	  <?php 
		
		$x++;
	  } 
	  ?>
	  <input type="hidden" value="" id="customerId" name="customerId" />
	  <input type="hidden" value="" id="transactionId" name="transactionId" />
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="reject" name="submit" class="btn btn-danger" >Reject</button>
        <button type="submit" value="update" name="submit" class="btn btn-primary">Update Document(s)</button>
      </div>
    </div>
  </div>
</div>
</form>

