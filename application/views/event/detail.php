<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>	
		<title>Event Detail</title>
		<link href="<?= base_url('asset/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all" />
		<link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
		<link href="<?= base_url('asset/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('asset/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	</head>
	<style>

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th {
			height: 50px;
		}
		</style>
	<body>
		<div class="wrap">
			<div class="contact-form">
				<div class="account">
					<div class="col-lg-12">
						<img src="<?= base_url('asset/dist/upload/'.$event[0]->img);?>" alt=""/>
					</div>
					<div class="col-lg-12">
						<i><?=$event[0]->note;?></i>
					</div>
					<div class="col-lg-12">
						<i class="fa fa-fw fa fa-calendar"></i>
						<span class="nav-link-text"><?=date('d F Y', strtotime($event[0]->event_start))?> - <?=date('d F Y', strtotime($event[0]->event_end))?></span>
					</div>
					<div class="col-lg-12">
						<i class="fa fa-fw fa fa-map-marker"></i>
						<span class="nav-link-text"><?=$event[0]->location_name?>, <?=$event[0]->address?></span>
					</div>
					<?php if($event[0]->tbo != null){ ?>
						<div class="col-lg-12">
							<i class="fa fa-fw fa fa-ticket"></i>Ticket Box Open
							<span class="nav-link-text"><?=date('d F Y', strtotime($event[0]->tbo))?></span>
						</div>
					<?php } ?>		
					<br/>
					<div class="col-lg-12">
						<table>
							<?php 
								foreach($event[0]->detail as $det){
							?>
								<tr>
									<td><?=$det->ticket_name?></td>
									<td>
										Rp. <?=number_format($det->eh_price); ?>
									</td>
									<?php if($event[0]->po_start != null){ ?>
										<td>
											<?=number_format($det->eh_po); ?>
										</td>
									<?php } ?>	
								</tr>
								<?php } ?>	
						</table>
					</div>	
					<div class="clear"></div>
					
				</div>	
				<div class="clear"></div>	
			</div>
		</div>
	</body>
</html>