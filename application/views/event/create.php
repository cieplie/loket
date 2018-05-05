	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?=base_url();?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="<?=base_url('event');?>">Event</a>
			</li>
			<li class="breadcrumb-item active">Add</li>
		</ol>
		<div class="card mb-3">
			<div class="card-body">		
				<form action="<?=base_url('event/do_create')?>" method="post" enctype="multipart/form-data">
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Event Name</label>
							<input class="form-control validate_mandatory" id="name" name="event_name" type="text" placeholder="Enter event name">
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label for="name">Event Note</label>
							<textarea class="form-control" rows="5" name="note"></textarea>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Location</label>
							<select class="form-control validate_mandatory" id="event-location" name="location">
								<option></option>
								<?php foreach($location as $l){ ?>
									<option value="<?=$l->location_id; ?>"><?=$l->location_name;?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Event Type</label>
							<select class="form-control validate_mandatory" id="event-type" name="type" onChange="getTicket()">
								<option></option>
								<?php foreach($type as $t){ ?>
									<option value="<?=$t->id; ?>"><?=$t->type_name;?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="table-responsive" id="ticket-div"></div>
					<div class='col-md-6'>
						<div class="form-group">
							<label for="mulai">Event Start</label>
							<div class="input-group date form_datetime1 col-md-5" 
								data-date="<?=date('Y-m-d H:i:s')?>" 
								data-date-format="dd-mm-yyyy  HH:ii:00" 
								data-link-field="dtp_input1" style="margin-left:-15px">
									<input class="form-control" size="10" type="text" value="" readonly>
									<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							</div>
							<input type="hidden" id="dtp_input1" name="start" class="validate_mandatory" /><br/>
						</div>
					</div>
					<div class='col-md-6'>
						<div class="form-group">
							<label for="mulai">Event End</label>
							<div class="input-group date form_datetime2 col-md-5" 
								data-date="<?=date('Y-m-d H:i:s')?>" 
								data-date-format="dd-mm-yyyy  HH:ii:00" 
								data-link-field="dtp_input2" style="margin-left:-15px">
									<input class="form-control" size="10" type="text" value="" readonly>
									<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							</div>
							<input type="hidden" id="dtp_input2" name="end" class="validate_mandatory" /><br/>
						</div>
					</div>
					<div class='col-md-6'>
						<div class="form-group">
							<label for="mulai">Ticket Box Open Start</label>
							<div class="input-group date form_datetime5 col-md-5 " 
								data-date="<?=date('Y-m-d H:i:s')?>" 
								data-date-format="dd-mm-yyyy  HH:ii:00" 
								data-link-field="dtp_input3" style="margin-left:-15px">
									<input class="form-control" size="10" type="text" value="" readonly>
									<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							</div>
							<input type="hidden" id="dtp_input3" name="tbo" /><br/>
						</div>
					</div>
					<div class='col-md-6'>
						<div class="form-group">
							<label for="mulai">Pre Order Start (Optional)</label>
							<div class="input-group date form_datetime3 col-md-5" 
								data-date="<?=date('Y-m-d H:i:s')?>" 
								data-date-format="dd-mm-yyyy  HH:ii:00" 
								data-link-field="dtp_input4" style="margin-left:-15px">
									<input class="form-control" size="10" type="text" value="" readonly>
									<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							</div>
							<input type="hidden" id="dtp_input4" name="po_start" /><br/>
						</div>
					</div>
					<div class='col-md-6'>
						<div class="form-group">
							<label for="mulai">Pre Order End (Optional)</label>
							<div class="input-group date form_datetime4 col-md-5 validate_mandatory" 
								data-date="<?=date('Y-m-d H:i:s')?>" 
								data-date-format="dd-mm-yyyy  HH:ii:00" 
								data-link-field="dtp_input5" style="margin-left:-15px">
									<input class="form-control" size="10" type="text" value="" readonly>
									<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							</div>
							<input type="hidden" id="dtp_input5" name="po_end"  /><br/>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Upload Event Banner</label>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default btn-file">
										<input type="file" id="imgInp" name="img" class="validate_mandatory">
									</span>
								</span>
								<input type="text" class="form-control validate_mandatory" readonly style="visibility: hidden;">
							</div>
							<img id='img-upload'/>
						</div>
					</div>
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
					<div class="col-md-2" style="margin-top:15px;">
						<input type="submit" class="btn btn-primary btn-block" value="Submit"/>
					</div>
				</form>	
			</div>
		</div>
    </div>
	<script>		
		$(document).ready(function() {
			$('.form_datetime1').datetimepicker({format: 'yyyy-mm-dd hh:ii:00'});
			$('.form_datetime2').datetimepicker({format: 'yyyy-mm-dd hh:ii:00'});
			$('.form_datetime3').datetimepicker({format: 'yyyy-mm-dd hh:ii:00'});
			$('.form_datetime4').datetimepicker({format: 'yyyy-mm-dd hh:ii:00'});
			$('.form_datetime5').datetimepicker({format: 'yyyy-mm-dd hh:ii:00'});
			
			$('#event-type').select2({
				placeholder: "Please select event type"
			});
			
			$('#event-location').select2({
				placeholder: "Please select event location"
			});
		});
	</script>
	<script>
		function getTicket(){
			var dataString = 'id='+$('#event-type').val();
			
			$.ajax({
				type:'POST',
				data:dataString,
				url:'<?= base_url("ticket/get_ticket_by_type") ?>',
				success:function(data) {
					$('#ticket-div').html(data);
				},error: function(xhr, status, error) {
				  var err = eval("(" + xhr.responseText + ")");
				  console.log(err);
				}
			});
		}
	</script>