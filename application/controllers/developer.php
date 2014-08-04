<?php

class Developer extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('developer_model');
		$this->load->model('asset_model');
		$this->load->model('code_model');
		$this->load->model('file_model');
	}

	function index()
	{
		$data['title'] = "IT Assets System: Developer List";
		$data['print'] = false;
		$this->load->library('pagination');

		$config['base_url'] = base_url(). 'index.php/developer/index/';
		$config['per_page'] = 30;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$limits = array('limit' => $config['per_page'], 'offset'=> $this->uri->segment(3));
		$config['total_rows'] = $this->db->get('developer')->num_rows();

		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();

		$data['developers'] = $this->developer_model->fetch_developers($limits);

		$data['target'] = "developer/list";
		$this->load->view('template/template', $data);
	}

	function add()
	{
		$data['title'] = "Add Developer";
		$data['target'] = "developer/edit";
		$data['action'] = "insert";
		$data['developer'] = NULL;
		if($this->input->post('ajax') == 1) {
			$this->load->view($data['target'], $data);
		}else{
			$this->load->view('template/template', $data);
		}
	}
	
	function insert() 
	{
		$kDeveloper = $this->developer_model->insert();
		redirect("developer/view/$kDeveloper");
	}

	function edit()
	{
		if($this->input->post('kDeveloper')){
			$kDeveloper = $this->input->post('kDeveloper');
			$data['title'] = "Edit Developer";
			$data['target'] = "developer/edit";
			$data['action'] = "update";
			$data['developer'] = $this->developer_model->fetch_developer($kDeveloper);
			if($this->input->post('ajax') == 1) {
				$this->load->view($data['target'], $data);
			}else{
				$this->load->view('template/template', $data);
			}
		}

	}
	
	
	function update()
	{
		if($this->input->post('kDeveloper')){
			$kDeveloper = $this->input->post('kDeveloper');
			$this->developer_model->update($kDeveloper);
			redirect("developer/view/$kDeveloper");
		}
	}
	
	function view()
	{
		if($this->uri->segment(3)){
			$kDeveloper = $this->uri->segment(3);
			$developer = $this->developer_model->fetch_developer($kDeveloper);
			$data['developer'] = $developer;
			$data['target'] = "developer/view";
			$data['title'] = "Viewing $developer->developer";
			$data['assets'] = $this->asset_model->fetch_developer_assets($kDeveloper);
			$this->load->view('template/template', $data);
		}
	}

}