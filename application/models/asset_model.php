<?php

class Asset_model extends CI_Model{

	var $kAsset;
	var $kDeveloper;
	var $product;
	var $version;
	var $name;
	var $type;
	var $serial_number;
	var $status;
	var $source;
	var $po;
	var $year_removed;
	var $year_acquired;


	function __construct()
	{
		parent::__construct();
		$this->load->helper('general');
	}


	function prepare_variables()
	{
		if($this->input->post('kAsset')) {
			$this->kAsset = $this->input->post('kAsset');
		};

		if($this->input->post('kDeveloper')){
			$this->kDeveloper = $this->input->post('kDeveloper');
		}

		if($this->input->post('version')){
			$this->version = $this->input->post('version');
		}

		if($this->input->post('product')){
			$this->product = $this->input->post('product');
		}

		if($this->input->post('name')){
			$this->name = $this->input->post('name');
		}

		if($this->input->post('status')){
			$this->status = $this->input->post('status');
		}

		if($this->input->post('type')){
			$this->type = $this->input->post('type');
		}

		if($this->input->post('serial_number')){
			$this->serial_number = $this->input->post('serial_number');
		}

		if($this->input->post('year_removed')){
			$this->year_removed = $this->input->post('year_removed');
		}
		if($this->input->post('year_acquired')){
			$this->year_acquired = $this->input->post('year_acquired');
		}

		if($this->input->post("po")){
		    $this->po = $this->input->post("po");
		}

		if($this->input->post('source')){
			$this->source = $this->input->post('source');
		}

	}


	function insert()
	{
		$this->prepare_variables();
		$this->db->insert('asset', $this);
		return $this->db->insert_id();

	}

	function update( $kAsset )
	{
		$this->prepare_variables();
		$this->db->where('kAsset', $kAsset);
		$this->db->update('asset', $this);

	}


	function delete( $kAsset )
	{
		$id_array = array('kAsset' => $kAsset);

		echo $this->db->delete('asset', $id_array);
	}

	function search($where = array()){
		$this->db->from('asset');
		$field_list = $this->db->list_fields('asset');
		if(!empty($where)){
			if(is_array($where)){
				$keys = array_keys($where);
				$values = array_values($where);
				for($i = 0; $i < count($where); $i++){
					$this_key = $keys[$i];
					$this_value = $values[$i];
					if(in_array($this_key,$field_list) && !empty($this_value)){
						switch($this_key){
							case "name":
							case "serial_number":
							case "product":
								$this->db->like("asset." . $this_key,"$this_value");
								break;
							default:
								$this->db->where("asset." . $this_key, $this_value);
								break;

						}
					}
				}
			}
		}


		$this->db->order_by('type', 'asc');
		$this->db->order_by('status', 'asc');
		$this->db->order_by('product', 'asc');
		$this->db->order_by('version', 'asc');
		$this->db->order_by('name', 'asc');
		$this->db->join("developer","asset.kDeveloper=developer.kDeveloper");
		$result = $this->db->get()->result();
		$this->session->set_userdata('asset_search',$this->db->last_query());
		return $result;
	}

	function last_search(){
		$result = array();
		if($this->session->userdata("asset_search")){
			$result =	$this->db->query($this->session->userdata("asset_search"))->result();;
		}
		return $result;
	}


	function get_fields(){
		$fields = $this->db->list_fields('asset');
		//		return $fields;
		$output = false;
		if(in_array($myName, $fields)){
			$output = true;
		}
		return $output;
	}


	function fetch_all()
	{
		$this->db->from('asset');
		$this->db->order_by('kDeveloper');
		$query = $this->db->get();
		return $query->result();
	}


	function fetch_one($kAsset, $assetFields = null)
	{
		$this->db->where('kAsset', $kAsset);
		$this->db->from('asset');
		if($assetFields) {
			if( is_array($assetFields) ){
				foreach($assetFields as $field){
					$this->db->select($field);
				}
			}else{
				$this->db->select($assetFields);
			}
		}
		$query = $this->db->get();
		$output = $query->result();
		if(count($output)>0){
			return $output[0];
		}else{
			return false;
		}
	}

	function fetch_developer_assets($kDeveloper = null)
	{
		$this->db->select("developer.*, asset.*");
		$this->db->join('developer', 'developer.kDeveloper = asset.kDeveloper');
		$this->db->from('asset');
		$this->db->order_by('developer.developer', 'asc');
		$this->db->order_by('type', 'asc');
		$this->db->order_by('status', 'asc');
		$this->db->order_by('product', 'asc');
		$this->db->order_by('version', 'asc');
		$this->db->order_by('name', 'asc');

		if($kDeveloper){
			$this->db->where("developer.kDeveloper = $kDeveloper");
		}
		//default to show only active assets.
		$this->db->where("asset.status", "active");

		$query = $this->db->get();
		$output = $query->result();
		return $output;
	}

	function fetch_one_values($fields, $orderFields = null, $whereValue = null){
		$this->db->from('asset');
		$this->db->distinct();

		if(is_array($fields)){
			foreach($fields as $field){
				$this->db->select($field);
			}
		}else{
			$this->db->select($fields);
		}

		if($orderFields){
			if(is_array($orderFields)){
				foreach($orderFields as $order){
					$this->db->order_by($order);
				}
			}else{
				$this->db->order_by($orderFields);
			}
		}

		if($whereValue){
			$this->db->where($whereValue);
		}

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}


	function fetch_type_list()
	{
		$categoryList = $this->fetch_one_values('type', 'type');
		$categoryPairs = getKeyedPair($categoryList, array('type','type'));
		return $categoryPairs;
	}

	function fetch_status_list()
	{
		$methodList = $this->fetch_one_values('status', 'status');
		$methodPairs = getKeyedPair($methodList, array('status', 'status'), TRUE,TRUE);
		return $methodPairs;
	}




}