

<script>

	function callModal(id,name){
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
                <h4 class="card-title">Customers</h4>
				<form action="<?php echo base_url() .'index.php/transaction/' ?>">
              <div class="input-group no-border">
                <input type="text" value="" name="search" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
              </div>
              <div class="card-body">
                <div class="table-responsive">
				
				<?php if(!empty($query)){ ?>
                  <table class="table" id="myTable">
                    <thead class=" text-primary">
                      <th>Customer Information File</th>
                      <th>Name</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <?php 
						
							foreach($query as $q){ 
					  ?>
						<tr>
							<td><?php echo $q->cif; ?></td>
							<td><?php echo strtoupper($q->firstName .' '. $q->middleName . ' ' . $q->lastName); ?></td>
							<td align="right"><button class="btn btn-primary" onClick="callModal('<?php echo $q->customerId; ?>','<?php echo strtoupper($q->firstName .' '. $q->middleName . ' ' . $q->lastName); ?>');">File  Document <i class="now-ui-icons ui-1_simple-add"></i> </button></td>
						</tr>
						
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
	 
	  <?php $x=0; foreach($notes as $n) {  if($x !=0){
			if($n->documentType != $notes[$x - 1]->documentType){
				echo '<hr />';
			}
		}?>
		
        <div class="form-check">
			<label class="form-check-label">
				<input class="form-check-input" type="checkbox" class="docs" name="documents[]" value="<?php echo $n->documentId; ?>">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log Document(s)</button>
      </div>
    </div>
  </div>
</div>
</form>

