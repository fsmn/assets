<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model is for managing items in menus displayed to users. 
 */

class menu_item_model extends CI_Model
{
	var $kMenu;
	var $label;
	var $type;
	var $href;
	var $class;
	var $id;
	var $enclosure;
	var $rank;
	var $access_group;

	
	function __construct()
	{
		parent::__construct();
	}

	
	function prepare_variables()
	{
		$variables = array("kMenu","label","type","href","class","id","enclosure","rank","access_group");
		for($i = 0; $i < count($variables); $i++){
			$myVariable = $variables[$i];
			if($this->input->post($myVariable)){
				$this->$myVariable = $this->input->post($myVariable);
			}
		}
	}

	
	function get($kItem)
	{
		$this->db->where("kItem",$kItem);
		$this->db->from("menu_item");
		$result = $this->db->get()->row();
		return $result;
	}

	
	function insert()
	{
		$this->prepare_variables();
		$kItem = $this->db->insert("menu_item",$this);
		return $kItem;
	}

	
	function update($kItem)
	{
		$this->db->where("kItem",$kItem);
		$this->prepare_variables();
		$this->db->update("menu_item",$this);
	}
}