<?php

class Asset extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('asset_model');
		$this->load->helper('general');
		$this->load->model('developer_model');
		$this->load->model('code_model');
		$this->load->model('file_model');

	}

	function index()
	{
		$data['assets'] = $this->asset_model->fetch_all();
		$data['title'] = "List of IT Assets";
		$data['target'] = 'asset/list';
		$this->load->view('template/template', $data);
	}

	function add()
	{
		$data['developerPairs'] = $this->developer_model->fetch_developer_list();
		$data['typePairs'] = $this->asset_model->fetch_type_list();
		$data['statusPairs'] = $this->asset_model->fetch_status_list();
		$data['title'] = "Add New Asset";
		$data['action'] = "insert";
		$data['target'] = "asset/edit";
		$data['asset'] = null;
		if ($this->input->post('ajax') == 1){
			$this->load->view($data['target'], $data);
		}else{
			$this->load->view('template/template', $data);
		}
	}

	function insert()
	{
		$kAsset = $this->asset_model->insert();
		redirect("asset/view/$kAsset");
	}

	function edit()
	{
		if ( $this->input->post('kAsset') ){
			$kAsset = $this->input->post('kAsset');
			//		$kAsset = $this->uri->segment(3);
			$asset = $this->asset_model->fetch_one( $kAsset );
			$data['developerPairs'] = $this->developer_model->fetch_developer_list();
			$data['typePairs'] = $this->asset_model->fetch_type_list();
			$data['statusPairs'] = $this->asset_model->fetch_status_list();
			$data['title'] = "Edit Asset";
			$data['asset'] = $asset;
			$data['action'] = "update";
			$data['target'] = 'asset/edit';
			if ($this->input->post('ajax') == 1){
				$this->load->view($data['target'], $data);
			}else{
				$this->load->view('template/template', $data);
			}
		}
	}

	function update()
	{
		if($this->input->post('kAsset')){
			$kAsset = $this->input->post('kAsset');
			$this->asset_model->update($kAsset);
			if($this->input->post('ajax') == 1){
				$asset = $this->asset_model->fetch_one($kAsset);
				$data['asset'] = $asset;
				$data['developer'] = $this->developer_model->fetch_value($asset->kDeveloper, 'developer');
				$this->load->view('asset/details', $data);

			}else{
				redirect('asset/view/'. $kAsset);
			}
		}
	}

	function view()
	{
		$kAsset = $this->uri->segment(3);
		$asset = $this->asset_model->fetch_one( $kAsset );
		$data['developer'] = $this->developer_model->fetch_value($asset->kDeveloper, 'developer');
		$data['asset'] = $asset;
		$data['target'] = 'asset/view';
		$data['title'] = "View Asset";
		$data['codes'] = $this->code_model->fetch_codes($kAsset);
		$data['files'] = $this->file_model->fetch_files($kAsset);
		$this->load->view('template/template', $data);

	}

	function delete()
	{
		if($this->input->post('kAsset')){
			$kAsset = $this->input->post('kAsset');
			$this->asset_model->delete($kAsset);
		}
	}

	function list_developer_assets()
	{
		$kDeveloper = $this->uri->segment(3);
		$developer = $this->developer_model->fetch_value($kDeveloper, 'developer');
		$data['assets'] = $this->asset_model->fetch_developer_assets($kDeveloper);
		$data['title'] = "List of Assets for $developer";
		$data['target'] = "asset/list";
		$this->load->view('template/template', $data);

	}

	function show_search()
	{

		$data['developerPairs'] = $this->developer_model->fetch_developer_list();
		$data['typePairs'] = $this->asset_model->fetch_type_list();
		$data['statusPairs'] = $this->asset_model->fetch_status_list();
		$data['action'] = "search";
		$data['type'] = NULL;
		if($this->session->userdata("type")){
			$data['type'] = $this->session->userdata('type');
		}
		$this->load->view('asset/search', $data);
	}

	function search()
	{
		$where["type"] = $this->input->get_post("type");
		$where["status"] = $this->input->get_post("status");
		$where["kDeveloper"] = $this->input->get_post("kDeveloper");
		$where["name"] = $this->input->get_post("name");
		$where["product"] = $this->input->get_post("product");
		$where["year_acquired"] = $this->input->get_post("year_acquired");
		$where["year_removed"] = $this->input->get_post("year_removed");
		
		$this->session->set_userdata('kDeveloper' ,$where['kDeveloper']);
		$this->session->set_userdata("type", $where['type']);
		$this->session->set_userdata("status",$where['status']);
		$assets = $this->asset_model->search($where);
		$data['assets'] = "";
		if(count($assets)> 0 ){
			$data['assets'] = $assets;
		}
		$data['title'] = "List of IT Assets";
		$data['target'] = 'asset/list';
		$data['typeSort'] = $this->input->get_post('type');
		$this->load->view('template/template', $data);
		//		echo $query;
	}

	function new_file()
	{
		if( $this->input->post('kAsset') ){
			$data['kAsset'] = $this->input->post('kAsset');
			$data['error'] = '';
			$data['file'] = null;
			$this->load->view('file/edit', $data);
		}

	}

	function attach_file()
	{
		$config['upload_path'] = './uploads';
		$this->load->helper('directory');
		$config['allowed_types'] = 'gif|jpg|png|pdf|rtf';
		$config['max_size'] = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r( $error);
		}
		else
		{
			$fileData = $this->upload->data();
			$data['fileName'] = $fileData['file_name'];
			$data['fileDescription'] = $this->input->post('fileDescription');
			$kAsset = $this->input->post('kAsset');
			$kFile = $this->file_model->insert_file($kAsset, $data);
			redirect("asset/view/$kAsset");
		}
	}

	/**
	 * @TODO Create an exportable CSV of assets based on a wide range of criteria.
	 * SELECT developer.developer, product, name, version FROM `asset`, `developer` WHERE developer.kDeveloper = asset.kDeveloper AND (asset.kDeveloper = 3 OR asset.kDeveloper = 17 OR asset.kDeveloper = 34) and type = "hardware" and status = "active" ORDER BY asset.kDeveloper, product, name
	 */

	function export()
	{
		$this->load->helper('download');
		$data['assets'] = $this->asset_model->last_search();
		$data['target'] = "asset/export";
		$data['title'] = "Asset Export";
		$this->load->view("asset/export",$data);

	}

}