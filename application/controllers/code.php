<?php

class Code extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('code_model');
		$this->load->model('asset_model');
	}

	
	function add()
	{
		if($this->input->post('kAsset')){
			$kAsset = $this->input->post('kAsset');
			$data['title'] = "New Code";
			$data['code'] = null;
			$data['action'] = "insert";
			$data['target'] = "code/edit";
			$data['codePairs'] =  $this->code_model->fetch_type_list();
			$data['kAsset'] = $kAsset;
			if ($this->input->post('ajax') == 1) {
				$this->load->view($data['target'], $data);
			}else{
				$this->load->view('template/template', $data);
			}
		}
	}
	
	
	function insert()
	{
		if($this->input->post('kAsset')){
            $kAsset = $this->input->post('kAsset');
            $kCode = $this->code_model->insert_code();
            $this->view_all($kAsset);
		}
	}
	
	function edit()
	{
		if($this->input->post('kCode')){
			$kCode = $this->input->post('kCode');
			$code = $this->code_model->fetch_code($kCode);
			$data['code'] = $code;
			$data['title'] = "Edit Code";
			$data['target'] = "code/edit";
			$data['action'] = "update";
			$data['kAsset'] = $code->kAsset;
			$data['codePairs'] = $this->code_model->fetch_type_list();
			if ($this->input->post('ajax') == 1){
				$this->load->view($data['target'], $data);
			}else{
				$this->load->view('template/template', $data);
			}
		}
	}

	function update()
	{
		if($this->input->post('kCode')){
			$kCode = $this->input->post('kCode');
			$kAsset = $this->input->post('kAsset');
			$this->code_model->update_code($kCode);
			$this->view_all($kAsset);
		}
	}

	function view($kCode)
	{
		if($kCode){
//			$kCode = $this->input->post('kCode');
			$data['code'] = $this->code_model->fetch_code($kCode);
			$data['title'] = "View Code";
			$data['target'] = "code/view";
			$data['action'] = "view";
			if ($this->input->post('ajax') == 1){
				$output = "<span id='codeline_$kCode'>";
				$output .= $this->load->view($data['target'], $data);
				$output .= "</span>";
				echo $output;
			}else{
				$this->load->view('template/template', $data);
			}
		}
	}
	
	function view_all($kAsset)
	{
		if($kAsset){
			$data['codes'] = $this->code_model->fetch_codes($kAsset);
			$data['kAsset'] = $kAsset;
			$this->load->view('code/list', $data);
		}
	}
	
	function delete_code()
	{
		if($this->input->post('kCode')){
			$kCode = $this->input->post('kCode');
			$kAsset = $this->input->post('kAsset');
			$this->code_model->delete_code($kCode);
			$this->view_all($kAsset);
		}
	}
}