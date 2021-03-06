	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?=base_url();?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Location</li>
		</ol>
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-map-marker"></i> List Location
			</div>
			<div class="col-md-2" style="margin-top:15px;">
				<a class="btn btn-primary btn-block" href="<?= base_url('location/create')?>">Register</a>
			</div>
			<div class="card-body">			
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Name</th>
								<th>Adress</th>
								<th>Status</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($location as $t){ ?>
								<tr>
									<td><?= $t->location_name; ?></td>
									<td><?= $t->location_address; ?></td>
									<td><?= $t->status; ?></td>
									<td><a href="<?= base_url('location/update/'.$t->id); ?>"><i class="fa fa-pencil"></i></a></td>
								</tr>
							<?php } ?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>