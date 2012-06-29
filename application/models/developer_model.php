<?php


class Developer_model extends CI_Model
{
	var $developer = '';
	var $url = '';

	function __construct()
	{
		parent::__construct();
		$this->load->helper('general');
	}

	function prepare_variables()
	{
		if( $this->input->post('developer') ){
			$this->developer = $this->input->post('developer');
		}

		if( $this->input->post('url') ){
			$this->url = $this->input->post('url');
		}

	}



	function insert($data = null)
	{
		$this->prepare_variables();
		$this->db->insert('developer', $this);
		return $this->db->insert_id();

	}

	function update( $kDeveloper )
	{
		$this->prepare_variables();
		$this->db->where('kDeveloper', $kDeveloper);
		$this->db->update('developer', $this);

	}

	function fetch_value($kDeveloper, $fieldName)
	{

		$this->db->where('kDeveloper', $kDeveloper);
		$this->db->from('developer');
		if(is_array($fieldName)){
			foreach($fieldName as $field){
				$this->db->select($field);
			}
		}else{
			$this->db->select($fieldName);
		}
		$query = $this->db->get();
		$result = $query->result();
		$object = $result[0];
		$output = $object->$fieldName;
		return $output;
		
	}

	function fetch_values($fields, $orderFields = null){
		$this->db->from('developer');
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

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function fetch_developer_list()
	{
		
		$developerList = $this->fetch_values(array('kDeveloper','developer'), 'developer');
        $developerPairs = getKeyedPair($developerList, array('kDeveloper', 'developer'), FALSE, TRUE);
        return $developerPairs;
		
	}

	function delete_developer($kDeveloper)
	{
		
	}

	function fetch_developers($limiters = null)
	{
		$this->db->from('developer');
		$this->db->order_by('developer');
		if($limiters){
			if($limiters['limit']){
		      $this->db->limit( $limiters['limit'] );
			}
			if($limiters['offset']) {
				$this->db->offset( $limiters['offset'] );
			}
		}
		$query = $this->db->get();
		return $query->result();
	}


	function fetch_developer($kDeveloper)
	{
		$this->db->where('kDeveloper', $kDeveloper);
		$this->db->from('developer');
		$result = $this->db->get()->row();
		return $result;
	}


	function find_developer()
	{

	}
}