<link href="<?php echo base_url() .'public'; ?>/assets/jqueryui/jquery-ui.structure.min.css" rel="stylesheet" />
<link href="<?php echo base_url() .'public'; ?>/assets/jqueryui/jquery-ui.theme.min.css" rel="stylesheet" />
<script src="<?php echo base_url() .'public'; ?>/assets/jqueryui/jquery-ui.min.js"></script>

<script language="javascript">

function addRow(tableId)
{
	
	
	if(tableId == "section")
	{

		var rowCount = document.getElementById("section").rows.length; 
		var initialElementCount = 0;
		var tbody = document.getElementById("section").getElementsByTagName("tbody")[0];
		var row = document.createElement("TR");
		var i=0;
		
		var cell0 = document.createElement("TD");
			cell0.innerHTML = "<td align='center'>"+ rowCount +".</td>";
		
		var cell1 = document.createElement("TD");
			cell1.innerHTML = "<td><input type='text' size='10' class=\"form-control\" maxlength='10' name='section" + rowCount + "'id='section" + rowCount + "' value=''></td>";
		
		var cell2 = document.createElement("TD");
			cell2.innerHTML = "<td align='center'><input type='number' class=\"form-control\" size='4' maxlength='4' name='sectionCount" + rowCount + "' id='sectionCount" + rowCount + "' value='' ></td>";
		
			
		document.getElementById("rowno").value = rowCount;
		row.appendChild(cell0);
		row.appendChild(cell1);
		row.appendChild(cell2);
		tbody.appendChild(row);
	
	}
					
}
		 
function deleteRow(tableId)
{
	
	if(tableId == "section")
	{
		
		var elementTable = document.getElementById("section");
		var rowCount = document.getElementById("section").rows.length-1;
		
		if(rowCount >1)
		{
			elementTable.deleteRow(rowCount);
			var totalR = rowCount-1;
			document.getElementById("rowno").value = totalR;
		}
	}
}

</script>

<div class="content">
<form>
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
					
				</div><!-- card body end-->
            </div> <!--card-->
			
			<div class="card">
				<div class="card-header">
					<h5 class="title">Section</h5>
				</div>
				<div class="card-body">
 							<input type="hidden" name="rowno" id="rowno" value="1">
							<table id="section" class="table table-condensed table-striped"  cellspacing="6"  border="0">
								<tr>
									<td><b>No.</b></td>
									<td><b>Section</b></td>
									<td><b>Count</b></td>
								</tr>
							
								<tr>
									<td>1.</td>
									<td><input type="text" class="form-control" name="section1" id="section1"  size='10' maxlength='10' value=""/></td>
									<td><input type="number" class="form-control" name="sectionCount1" id="sectionCount1" size='4'  maxlength='4' value=""/></td>
								</tr>			
							</table>
							
							<input type="button"  class="btn btn-success" value="ADD" onclick="addRow('section')" />
							<input type="button" class="btn btn-warning" value="DELETE" onclick="deleteRow('section')" />
				</div>
			</div> <!-- card section> -->
				
			
          </div>
		</div> <!--content row end-->
</form>
</div> <!--content end -->
      