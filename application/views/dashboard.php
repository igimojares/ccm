
<div class="content">
    <div class="row">
		<div class="col-md-12">
			<div class="card">
              <div class="card-header">
			   <h5 class="card-category">Number of Transactions (last 7 Days)</h5>
              </div>
              <div class="card-body">
               
					<canvas id="lineChartExample"></canvas> 
					<script>
	<!-- javascript init -->
chartColor = "#FFFFFF";

// General configuration for the charts with Line gradientStroke
gradientChartOptionsConfiguration = {
    maintainAspectRatio: false,
    legend: {
        display: false
    },
    tooltips: {
      bodySpacing: 4,
      mode:"nearest",
      intersect: 0,
      position:"nearest",
      xPadding:10,
      yPadding:10,
      caretPadding:10
    },
    responsive: 1,
    scales: {
        yAxes: [{
          display:0,
          gridLines:0,
          ticks: {
              display: false
          },
          gridLines: {
              zeroLineColor: "transparent",
              drawTicks: false,
              display: false,
              drawBorder: false
          }
        }],
        xAxes: [{
          display:0,
          gridLines:0,
          ticks: {
              display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }]
    },
    layout:{
      padding:{left:0,right:0,top:15,bottom:15}
    }
};

ctx = document.getElementById('lineChartExample').getContext("2d");

gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
gradientStroke.addColorStop(0, '#80b6f4');
gradientStroke.addColorStop(1, chartColor);

gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

myChart = new Chart(ctx, {
    type: 'line',
    data: {
		<?php $label = ''; foreach($query as $q) {   $label .= '"' .$q->transactionDate .'",'; } ?>
        labels: [<?php echo rtrim($label,","); ?>],
        datasets: [{
            label: "Transaction Counts",
            borderColor: "#f96332",
            pointBorderColor: "#FFF",
            pointBackgroundColor: "#f96332",
            pointBorderWidth: 2,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            pointRadius: 4,
            fill: true,
            backgroundColor: gradientFill,
            borderWidth: 2,
			<?php $data = ''; foreach($query as $q) {   $data .=  '"' .$q->notran .'",'; } ?>
            data: [<?php echo rtrim($data,","); ?>]
        }]
    },
    options: gradientChartOptionsConfiguration
});
</script>

				</div>
                     
            </div>
		</div>
    </div>
	<div class="row">
		          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Top 10 document movements</h5>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Document Name</th>
                      <th class="text-right">
                        Count
                      </th>
                    </thead>
                    <tbody>
                      <?php foreach($docs as $d) { ?>
						<tr>
							<td><?php echo $d->documentName; ?></td>
							<td class="text-right" ><?php echo $d->docCount; ?></td>
						</tr>
					  <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

  
      
