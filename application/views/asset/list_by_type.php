<?php
$currentType = "";
$i = 0;

$types = $this->asset_model->fetch_one_values('type', 'type', "`kDeveloper` = $developer->kDeveloper");?>
<div id='asset-types'>
<? foreach($types as $type): ?>
	<? $data["typeSort"] = $type->type; ?>
	<h2><?=$type->type;?></h2>
	<? $data['assets'] = $assets; ?>
	<? $this->load->view('asset/list', $data);?>
<?endforeach;?>
</div>