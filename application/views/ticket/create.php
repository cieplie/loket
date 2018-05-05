	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?=base_url();?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="<?=base_url('ticket');?>">Ticket</a>
			</li>
			<li class="breadcrumb-item active">Add</li>
		</ol>
		<div class="card mb-3">
			<div class="card-body">		
				<form action="<?=base_url('ticket/do_create')?>" method="post" enctype="multipart/form-data">
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Ticket Type</label>
							<select class="form-control validate_mandatory" id="ticket-type" name="type">
								<option></option>
								<?php foreach($type as $t){ ?>
									<option value="<?=$t->id; ?>"><?=$t->type_name;?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-8"> &nbsp; </div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Ticket Name</label>
							<input class="form-control validate_mandatory" id="name" name="ticket_name" type="text" placeholder="Enter ticket name">
						</div>
					</div>
					<div class="col-md-8"> &nbsp; </div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Active Status</label><br/>
							<label class="radio-inline">
								<input type="radio" name="status" value="1" checked="checked">Active
							</label>
							<label class="radio-inline">
								<input type="radio" name="status" value="0">Non Active
							</label>
						</div>		
					</div>
					<div class="col-md-8"> &nbsp; </div>
					<div class="col-md-2" style="margin-top:15px;">
						<input type="submit" class="btn btn-primary btn-block" value="Submit"/>
					</div>
				</form>	
			</div>
		</div>
    </div>
	
	<script>
		$(document).ready(function() {
			$('#ticket-type').select2({
				placeholder: "Please select ticket type"
			});
		});
	</script>		