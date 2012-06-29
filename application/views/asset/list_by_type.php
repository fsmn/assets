<?php
$currentType = "";
$i = 0;

$types = $this->asset_model->fetch_one_values('type', 'type', "`kDeveloper` = $developer->kDeveloper");
echo "<div id='typeList'>";
foreach($types as $type){
	$typeSort = $type->type;
	echo "<h2>$typeSort</h2>";
	$data['typeSort'] = $typeSort;
	$data['assets'] = $assets;
	$this->load->view('asset/list', $data);
}
echo "</div>";