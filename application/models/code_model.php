<?php

class Code_model extends CI_Model{

	var $kCode;
	var $type;
	var $value;
	var $kAsset;

	function __construct()
	{
		parent::__construct();
	}

	function prepare_variables()
	{
		if($this->input->post('kCode')) {
			$this->kCode = $this->input->post('kCode');
		};

		if($this->input->post('type')){
			$this->type = $this->input->post('type');
		}

		if($this->input->post('value')){
			$this->value = $this->input->post('value');
		}

		if($this->input->post('kAsset')) {
			$this->kAsset = $this->input->post('kAsset');
		};

	}

	function insert_code()
	{
		$this->prepare_variables();
		$this->db->insert('code', $this);
		return $this->db->insert_id();

	}

	function update_code($kCode)
	{
		$this->prepare_variables();
		$this->db->where('kCode', $kCode);
		$this->db->update('code', $this);

	}

	function delete_code($kCode)
	{
		$id_array = array('kCode' => $kCode);
		$this->db->delete('code', $id_array);
	}

	function delete_code_by_asset( $kAsset )
	{
		$id_array = array('kAsset' => $kAsset );
		$this->db->delete('code', $id_array);
	}

	function fetch_codes($kAsset)
	{
		$this->db->where('kAsset', $kAsset);
		$this->db->from('code');
		$this->db->order_by('type');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function fetch_code($kCode)
	{
		$this->db->where('kCode', $kCode);
		$this->db->from('code');
		$query = $this->db->get();
		$output = $query->result();
		return $output[0];
	}

	function fetch_code_values($fields, $codeFields = null){
		$this->db->from('code');
		$this->db->distinct();

		if(is_array($fields)){
			foreach($fields as $field){
				$this->db->select($field);
			}
		}else{
			$this->db->select($fields);
		}

		if($codeFields){
			if(is_array($codeFields)){
				foreach($codeFields as $code){
					$this->db->order_by($code);
				}
			}else{
				$this->db->order_by($codeFields);
			}
		}

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}


	function fetch_type_list()
	{
		$typeList = $this->fetch_code_values('type', 'type');
		$typePairs = getKeyedPair($typeList, array('type','type'), TRUE);
		return $typePairs;
	}
	
	
	function find_code()
	{

	}

}