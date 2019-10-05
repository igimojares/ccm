
<div class="content">
    <div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					<h5 class="card-category">Total No of Confessors</h5>
				</div>
				<div class="card-body">
					<h1 style="text-align:center;"><?php echo $totals[0]->totalConfessors; ?></h1>
				</div>    
            </div>
		</div>

		<div class="col-md-4">
            <div class="card">
				<div class="card-header">
					<h5 class="card-category">Total No of Students</h5>
                </div>
              <div class="card-body">
					<h1 style="text-align:center;"><?php echo $totals[0]->totalStudents; ?></h1>
              </div>
            </div>
        </div>
		
		<div class="col-md-4">
            <div class="card">
				<div class="card-header">
					<h5 class="card-category">Total No of Confessions</h5>
                </div>
              <div class="card-body">
					<h1 style="text-align:center;"><?php echo $totals[0]->totalConfession; ?></h1>
              </div>
            </div>
        </div>
	</div>
</div> 
