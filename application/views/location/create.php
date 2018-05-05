	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?=base_url();?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="<?=base_url('location');?>">Location</a>
			</li>
			<li class="breadcrumb-item active">Add</li>
		</ol>
		<div class="card mb-3">
			<div class="card-body">		
				<form action="<?=base_url('location/do_create')?>" method="post" enctype="multipart/form-data">
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Location Name</label>
							<input class="form-control validate_mandatory" id="name" name="location_name" type="text" placeholder="Enter location name">
						</div>
					</div>
					<div class="col-md-8"> &nbsp; </div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="address">Location Address</label>
							<input class="form-control validate_mandatory" id="address" name="location_address" type="text" placeholder="Enter location address">
						</div>
					</div>
					<div class="col-md-7"> &nbsp; </div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Upload Image Location</label>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default btn-file">
										<input type="file" id="imgInp" name="img">
									</span>
								</span>
								<input type="text" class="form-control" readonly style="visibility: hidden;">
							</div>
							<img id='img-upload'/>
						</div>
					</div>
					<div class="col-md-6"> &nbsp; </div>
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