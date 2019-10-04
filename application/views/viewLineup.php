<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3>College</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 pr-1">
							<form method="get">
								<div class="form-row">
									<div class="col">
										<select class="form-control" name="college" id="college">
											<?php foreach($colleges as $q){ ?>
												<option <?php if($q->id == $this->input->get('college')) {echo "selected"; } ?> value="<?php echo $q->id; ?>"><?php echo $q->college; ?></option>
											<?php } ?>
										</select>
										<button class="btn pull-right" type="submit">Go!</button>
									</div>
							
								</div>
							</form>	
						</div>
					</div>
				</div>
				
				<?php if(!empty($query)){ ?>
				<div class="card">
					<div class="card-header">
						
					</div>
					<div class="card-body">
						<table class="table table-condensed table-striped">	
							<thead>
								<tr>
								<th>id</th>
								<th>college</th>
								<th>recollection date</th>
								<th>venue</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($query as $q){ ?>
								<tr>
								<td><a href="<?php echo base_url()."index.php/view/details/". md5($q->id). "?id=". $q->id; ?>"><?php echo 10000 + $q->id; ?></a></td>
								<td><?php echo $q->college; ?></td>
								<td><?php echo $q->recollectionDate; ?></td>
								<td><?php echo $q->venue; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>