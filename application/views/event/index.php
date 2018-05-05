	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?=base_url();?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Event</li>
		</ol>
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-calendar"></i> List Event
			</div>
			<div class="col-md-2" style="margin-top:15px;">
				<a class="btn btn-primary btn-block" href="<?= base_url('event/create')?>">Register</a>
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
			</div>
		</div>
    </div>