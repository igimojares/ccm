<link href="<?php echo base_url() .'public'; ?>/assets/jqueryui/jquery-ui.structure.min.css" rel="stylesheet" />
<link href="<?php echo base_url() .'public'; ?>/assets/jqueryui/jquery-ui.theme.min.css" rel="stylesheet" />
<script src="<?php echo base_url() .'public'; ?>/assets/jqueryui/jquery-ui.min.js"></script>

<script language="javascript">

function addRow(tableId)
{
	
	var colleges = "<?php foreach($colleges as $q){ echo '<option value=\''. $q->id .'\'>'. $q->college .'</option>'; } ?>";
	
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
			cell1.innerHTML = "<td><input type='text' required class='form-control' maxlength='10' name='section[]'></td>";
		
		var cell2 = document.createElement("TD");
			cell2.innerHTML = "<td align='center'><input required type='number' class='form-control' size='4' maxlength='4' name='sectionCount[]'></td>";
		
			
		document.getElementById("rowno").value = rowCount;
		row.appendChild(cell0);
		row.appendChild(cell1);
		row.appendChild(cell2);
		tbody.appendChild(row);
	
	}
	
	else if(tableId == "emcee")
	{
		
		
		var rowCount = document.getElementById("emcee").rows.length; 
		var initialElementCount = 0;
		var tbody = document.getElementById("emcee").getElementsByTagName("tbody")[0];
		var row = document.createElement("TR");
		var i=0;
		
		var cell0 = document.createElement("TD");
			cell0.innerHTML = "<td align='center'>"+ rowCount +".</td>";
		
		var cell1 = document.createElement("TD");
			cell1.innerHTML = "<td><input type='text' required class='form-control'  name='emcee[]'  value=''></td>";
		
		var cell2 = document.createElement("TD");
			cell2.innerHTML = "<td align='center'><select required class='form-control' name='emceeCollege[]' >"+ colleges +"</select></td>";
		
		
			
		document.getElementById("rownoEmcee").value = rowCount;
		row.appendChild(cell0);
		row.appendChild(cell1);
		row.appendChild(cell2);
		tbody.appendChild(row);
	
	}
	
	else if(tableId == "animators")
	{

		var rowCount = document.getElementById("animators").rows.length; 
		var initialElementCount = 0;
		var tbody = document.getElementById("animators").getElementsByTagName("tbody")[0];
		var row = document.createElement("TR");
		var i=0;
		
		var cell0 = document.createElement("TD");
			cell0.innerHTML = "<td align='center'>"+ rowCount +".</td>";
		
		var cell1 = document.createElement("TD");
			cell1.innerHTML = "<td><input type='text' required  class='form-control' name='animator[]' ></td>";
		
		var cell2 = document.createElement("TD");
			cell2.innerHTML = "<td align='center'><select required class='form-control' name='animatorCollege[]' >"+ colleges +"</select></td>";
		
			
		document.getElementById("rownoAnimators").value = rowCount;
		row.appendChild(cell0);
		row.appendChild(cell1);
		row.appendChild(cell2);
		tbody.appendChild(row);
	
	}
	
	else if(tableId == "ushers")
	{

		var rowCount = document.getElementById("ushers").rows.length; 
		var initialElementCount = 0;
		var tbody = document.getElementById("ushers").getElementsByTagName("tbody")[0];
		var row = document.createElement("TR");
		var i=0;
		
		var cell0 = document.createElement("TD");
			cell0.innerHTML = "<td align='center'>"+ rowCount +".</td>";
		
		var cell1 = document.createElement("TD");
			cell1.innerHTML = "<td><input required type='text' class='form-control' name='usher[]' ></td>";
		
		var cell2 = document.createElement("TD");
			cell2.innerHTML = "<td align='center'><select required class='form-control' name='usherCollege[]' >"+ colleges +"</select></td>";
		
			
		document.getElementById("rownoUshers").value = rowCount;
		
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
	
	else if(tableId == "emcee")
	{
		
		var elementTable = document.getElementById("emcee");
		var rowCount = document.getElementById("emcee").rows.length-1;
		
		if(rowCount >1)
		{
			elementTable.deleteRow(rowCount);
			var totalR = rowCount-1;
			document.getElementById("rownoEmcee").value = totalR;
		}
	}
	
	else if(tableId == "animators")
	{
		
		var elementTable = document.getElementById("animators");
		var rowCount = document.getElementById("animators").rows.length-1;
		
		if(rowCount >1)
		{
			elementTable.deleteRow(rowCount);
			var totalR = rowCount-1;
			document.getElementById("rownoAnimators").value = totalR;
		}
	}
	
	else if(tableId == "ushers")
	{
		
		var elementTable = document.getElementById("ushers");
		var rowCount = document.getElementById("ushers").rows.length-1;
		
		if(rowCount >1)
		{
			elementTable.deleteRow(rowCount);
			var totalR = rowCount-1;
			document.getElementById("rownoUshers").value = totalR;
		}
	}
}

</script>

<div class="content">

<form action="<?php echo base_url(); ?>index.php/Recollection/update/" method="post" >
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
									<?php foreach($colleges as $q){ ?>
										<option <?php if($details[0]->college == $q->id){ echo "selected"; } ?> value="<?php echo $q->id; ?>"><?php echo $q->college; ?></option>
									<?php } ?>
								</select>
								<?php echo form_error('college', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Date<span style="color:red;">*</label>
								<input type="datetime-local" required name="date" class="form-control" placeholder="Date" value="<?php echo $details[0]->custom_date;?>">
								<?php echo form_error('date', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
						
						<div class="col-md-6 pr-1">
						  <div class="form-group">
							<label>Venue<span style="color:red;">*</label>
							<input type="text" name="venue" id="venue" required class="form-control" placeholder="Venue" value="<?php echo $details[0]->venue; ?>">
							<?php echo form_error('venue', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
						  </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Speaker<span style="color:red;">*</label>
								<input type="text" name="speaker" required id="speaker" class="form-control" placeholder="Speaker" value="<?php echo $details[0]->speaker; ?>">
								<?php echo form_error('speaker', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
						
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Main Celebrant<span style="color:red;">*</label>
								<input type="text" required name="mainCelebrant" id="mainCelebrant" class="form-control" placeholder="Main Celebrant" value="<?php echo $details[0]->mainCelebrant; ?>">
								<?php echo form_error('mainCelebrant', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-3 pr-1">
							<div class="form-group">
								<label>No of Confessors<span style="color:red;">*</label>
								<input type="text" required name="confessors" id="confessors" class="form-control" placeholder="" value="<?php echo $details[0]->noOfConfessors; ?>">
								<?php echo form_error('speaker', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
						
						<div class="col-md-3 pr-1">
							<div class="form-group">
								<label>No of attended students<span style="color:red;">*</label>
								<input type="text" required name="students" id="students" class="form-control" placeholder="" value="<?php echo $details[0]->noOfAttendedStudents; ?>">
								<?php echo form_error('mainCelebrant', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
						
						<div class="col-md-3 pr-1">
							<div class="form-group">
								<label>No who went to confession<span style="color:red;">*</label>
								<input type="text" required name="confession" id="confession" class="form-control" placeholder="" value="<?php echo $details[0]->noOfConfession; ?>">
								<?php echo form_error('mainCelebrant', '<small" class="form-text text-muted"><span style="color:red;">', '</span></small>'); ?>
							</div>
						</div>
					</div>
					
				</div><!-- card body end-->
            </div> <!--card-->
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="title">Emcee</h5>
				</div>
				<div class="card-body">
 							<input type="hidden" name="rownoEmcee" id="rownoEmcee" value="1">
							<table id="emcee" class="table table-condensed table-striped"  cellspacing="6"  border="0">
								<tr>
									<td><b>No.</b></td>
									<td><b>Fullname</b></td>
									<td><b>College</b></td>
								</tr>
								<?php $count=0; foreach($emcees as $e){ $count++; ?>
								<tr>
									<td><?php echo $count; ?>.</td>
									<td><input required  type="text" class="form-control" name="emcee[]" id="emcee[]"  size='10' maxlength='10' value="<?php echo $e->name; ?>"/></td>
									<td>
										<select required name="emceeCollege[]" id="emceeCollege[]" class="form-control">
										<?php foreach($colleges as $q){ ?>
											<option <?php if($q->id == $e->college){ echo "selected"; } ?> value="<?php echo $q->id; ?>"><?php echo $q->college; ?></option>
										<?php } ?>
										</select>
									</td>
								</tr>
								<?php } ?>
							</table>
							
							<input type="button" class="btn btn-primary" value="ADD" onclick="addRow('emcee')" />
							<input type="button" class="btn btn-secondary" value="DELETE" onclick="deleteRow('emcee')" />
				</div>
			</div> <!-- card section> -->
			</div>
			
			<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="title">Section</h5>
				</div>
				<div class="card-body">
 							<input type="hidden" name="rowno" id="rowno" value="<?php echo count($section); ?>">
							<table id="section" class="table table-condensed table-striped"  cellspacing="6"  border="0">
								<tr>
									<td><b>No.</b></td>
									<td><b>Section</b></td>
									<td><b>Count</b></td>
								</tr>
								<?php $count=0; foreach($section as $s){ $count++; ?>
								<tr>
									<td><?php echo $count; ?>.</td>
									<td><input required  type="text" class="form-control" name="section[]" id="section"  size='14' maxlength='10' value="<?php echo $s->section; ?>"/></td>
									<td><input required type="number" class="form-control" name="sectionCount[]" id="sectionCount"   maxlength='4' value="<?php echo $s->studentCount; ?>"/></td>
								</tr>
								<?php } ?>
							</table>
							
							<input type="button" class="btn btn-primary" value="ADD" onclick="addRow('section')" />
							<input type="button" class="btn btn-secondary" value="DELETE" onclick="deleteRow('section')" />
				</div>
			</div> <!-- card section> -->
			</div>
			
			<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="title">Animators</h5>
				</div>
				<div class="card-body">
 							<input type="hidden" name="rownoAnimators" id="rownoAnimators" value="1">
							<table  id="animators" class="table table-condensed table-striped"  cellspacing="6"  border="0">
								<tr>
									<td><b>No.</b></td>
									<td><b>Fullname</b></td>
									<td><b>College</b></td>
								</tr>
								<?php $count=0; foreach($animators as $a){ $count++; ?>
								<tr>
									<td><?php echo $count; ?>.</td>
									<td><input required type="text" class="form-control" name="animator[]" id="animator" value="<?php echo $a->name; ?>"/></td>
									<td>
										<select required class="form-control" name="animatorCollege[]" id="animatorCollege">
										<?php foreach($colleges as $q){ ?>
										<option <?php if($q->id == $a->college){ echo "selected";} ?> value="<?php echo $q->id; ?>"><?php echo $q->college; ?></option>
										<?php } ?>
										</select>
									</td>
								</tr>
								<?php } ?>
							</table>
							
							<input type="button" class="btn btn-primary" value="ADD" onclick="addRow('animators')" />
							<input type="button" class="btn btn-secondary" value="DELETE" onclick="deleteRow('animators')" />
				</div>
			</div> <!-- card section> -->
			</div>
			
			
			<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="title">Ushers</h5>
				</div>
				<div class="card-body">
 							<input type="hidden" name="rownoUshers" id="rownoUshers" value="1">
							<table required id="ushers" class="table table-condensed table-striped"  cellspacing="6"  border="0">
								<tr>
									<td><b>No.</b></td>
									<td><b>Fullname</b></td>
									<td><b>College</b></td>
								</tr>
								<?php $count=0; foreach($ushers as $a){ $count++; ?>
								<tr>
									<td><?php echo $count; ?>.</td>
									<td><input required type="text" class="form-control" name="usher[]" id="usher"  value="<?php echo $a->name; ?>"/></td>
									<td>
										<select class="form-control" name="usherCollege[]" id="usherCollege[]">
										<?php foreach($colleges as $q){ ?>
											<option <?php if($q->id == $a->college){ echo "selected";} ?> value="<?php echo $q->id; ?>"><?php echo $q->college; ?></option>
										<?php } ?>tion>
										</select>
									</td>
								</tr>	
								<?php } ?>
							</table>
							
							<input type="button" class="btn btn-primary" value="ADD" onclick="addRow('ushers')" />
							<input type="button" class="btn btn-secondary" value="DELETE" onclick="deleteRow('ushers')" />
				</div>
			</div> <!-- card section> -->
			</div>
			
			
			<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="title">Solo Singer</h5>
				</div>
				<div class="card-body">
 							<input type="hidden" name="rownoUshers" id="rownoUshers" value="1">
							<table id="singers" class="table table-condensed table-striped"  cellspacing="6"  border="0">
								<tr>
									<!--<td><b>No.</b></td>-->
									<td><b>Fullname</b></td>
									<td><b>College</b></td>
								</tr>
								<?php $count=0; foreach($singers as $a){ $count++; ?>
								<tr>
									<!--<td>1.</td>-->
									<td><input required type="text" class="form-control" name="soloSinger[]" id="soloSinger[]"  size='10' maxlength='10' value="<?php echo $a->name; ?>"/></td>
									<td>
										<select required class="form-control" name="soloSingerCollege[]" id="soloSingerCollege[]">
										<?php foreach($colleges as $q){ ?>
											<option <?php if($q->id == $a->college){ echo "selected";} ?>  value="<?php echo $q->id; ?>"><?php echo $q->college; ?></option>
										<?php } ?>
										</select>
									</td>
								</tr>
								<?php } ?>
							</table>
							
							<!--<input type="button" class="btn btn-primary" value="ADD" onclick="addRow('ushers')" />
							<input type="button" class="btn btn-secondary" value="DELETE" onclick="deleteRow('ushers')" />-->
				</div>
			</div> <!-- card section> -->
			</div>
			
			<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="title">Prayer Leader</h5>
				</div>
				<div class="card-body">
 							<input type="hidden" name="rownoUshers" id="rownoUshers" value="1">
							<table id="prayerLeader" class="table table-condensed table-striped"  cellspacing="6"  border="0">
								<tr>
									<!--<td><b>No.</b></td>-->
									<td><b>Fullname</b></td>
									<td><b>College</b></td>
								</tr>
								<?php $count=0; foreach($leader as $a){ $count++; ?>
								<tr>
									<!--<td>1.</td>-->
									<td><input type="text" required class="form-control" name="prayerLeader[]" id="prayerLeader[]" value="<?php echo $a->name; ?>"/></td>
									<td>
										<select required class="form-control" name="prayerLeaderCollege[]" id="prayerLeaderCollege">
										<?php foreach($colleges as $q){ ?>
											<option <?php if($q->id == $a->college){ echo "selected";} ?> value="<?php echo $q->id; ?>"><?php echo $q->college; ?></option>
										<?php } ?>
										</select>
									</td>
								</tr>
								<?php } ?>
							</table>
							
							<!--<input type="button" class="btn btn-primary" value="ADD" onclick="addRow('ushers')" />
							<input type="button" class="btn btn-secondary" value="DELETE" onclick="deleteRow('ushers')" />-->
				</div>
			</div><!-- card section> -->
			</div>
	</div>
	<?php if($this->session->userdata('admin') == '1'){ ?>
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-primary btn-lg pull-right" type="submit">Update</button>
		</div>
	</div>
	<?php } ?>
</form>
</div> <!--content end -->
      