	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">My Dashboard</li>
		</ol>
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-area-chart"></i> Area Chart Example
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Name</th>
								<th>Location</th>
								<th>Date</th>
								<th>Ticket Qty</th>
								<th>Omzet</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($event as $t){ ?>
								<tr>
									<td><?= $t->nama; ?></td>
									<td><?= $t->location; ?></td>
									<td><?= date('d F Y H:i:s', strtotime($t->mulai)).' - '.date('d F Y H:i:s', strtotime($t->selesai)); ?></td>
									<td><?= $t->tiket_qty; ?></td>
									<td><?= $t->omzet; ?></td>
									<td>
										<a href="<?= base_url('event/update/'.$t->id); ?>"><i class="fa fa-pencil"></i></a>
										<a href="<?= base_url('twitter/post/'.$t->id); ?>" >
											<i class="fa fa-twitter"></i>
										</a>
									</td>
								</tr>
							<?php } ?>	
						</tbody>
					</table>
				</div>
				<br/>
				Event/ day by number
				<canvas id="aa" width="100%" height="30"></canvas>
			</div>
      </div>
    </div>
	
	<script>
		$(document).ready(function () {
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			var ctx = document.getElementById("aa");
			var myLineChart = new Chart(ctx, {
			  type: 'line',
			  data: {
				labels: [<?=$grap['hari']?>],
				datasets: [{
				  label: "Sessions",
				  lineTension: 0.3,
				  backgroundColor: "rgba(2,117,216,0.2)",
				  borderColor: "rgba(2,117,216,1)",
				  pointRadius: 5,
				  pointBackgroundColor: "rgba(2,117,216,1)",
				  pointBorderColor: "rgba(255,255,255,0.8)",
				  pointHoverRadius: 5,
				  pointHoverBackgroundColor: "rgba(2,117,216,1)",
				  pointHitRadius: 20,
				  pointBorderWidth: 2,
				  data:  [<?=implode(',',$grap['value']);?>],
				}],
			  },
			  options: {
				scales: {
				  xAxes: [{
					time: {
					  unit: 'date'
					},
					gridLines: {
					  display: false
					},
					ticks: {
					  maxTicksLimit: 7
					}
				  }],
				  yAxes: [{
					ticks: {
					  min: 0,
					  max: <?=$grap['tertinggi']?>,
					  maxTicksLimit: 5
					},
					gridLines: {
					  color: "rgba(0, 0, 0, .125)",
					}
				  }],
				},
				legend: {
				  display: false
				}
			  }
			});
		})
	</script>	