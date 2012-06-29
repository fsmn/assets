<?php
if($assets != NULL ){
	echo "<div class='assetList'>";

	foreach($assets as $asset){
		if($asset->type == $typeSort){
			$data['asset'] = $asset;
			$data['codes'] = $this->code_model->fetch_codes($asset->kAsset);
			$data['files'] = $this->file_model->fetch_files($asset->kAsset);
			$data['kAsset'] = $asset->kAsset;
			$this->load->view('asset/view', $data);
		}
	}
	echo "</div>";
}else{
	echo "<h3>No assets were returned from your search request</h3>";
}