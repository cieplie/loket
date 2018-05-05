<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Danny_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$id 		= $this->getId();
		$get 		= $this->Model_event->get_event($id);
		$dataArray = array();
		$arrayHari = array();
		$hari = '';
		foreach($get as $g){
			$jarak = date_diff(date_create($g->mulai),date_create($g->selesai));
			$mulai = strtotime($g->mulai);
			$namahari = date('d F Y', $mulai);
			for($i = 0; $i <= $jarak->days; $i++){
				
				if(array_key_exists($namahari, $dataArray)){
					$dataArray[$namahari] = $dataArray[$namahari] + 1;
				}else{
					$dataArray[$namahari] = 1;
				}
				$namahari = date('d F Y', strtotime($g->mulai.'+'.$i.' days'));
				if(!in_array($namahari, $arrayHari)){
					$arrayHari[] = strval($namahari);
					if($hari == ''){
						$hari = "'".$namahari."'";
					}else{
						$hari .= ",'".$namahari."'"; 
					}
				}
			}
			
		}
		
		if(empty($dataArray)){
			$max = 0;
		}else{
			$max = max($dataArray)+1;
		}
		
		$grap = array(
			'hari'	=> $hari,
			'value' => array_values($dataArray),
			'tertinggi' => $max
		);
		$data['grap'] = $grap;
		$data['event'] = $get;
		$this->_view('dashboard/index', $data);
	}
	
	
	
}
