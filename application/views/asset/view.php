<?php 
$developer = $this->developer_model->fetch_value($asset->kDeveloper, 'developer');
?>
<h4 class='asset-header' id='asset-header_<?=$asset->kAsset; ?>'><a href="#" class='no_link' id='<?=$asset->kAsset?>'><?="$asset->product&nbsp;"; if($asset->version != ''){echo "$asset->version&nbsp;";} if($asset->name!=''){echo "($asset->name)";} ?></a></h4>
<div>
<span class='button edit small asset_edit' id='a_<?=$asset->kAsset; ?>'>Edit</span>
<div class='assetDetails' id='details_<?=$asset->kAsset?>'>


<?php 
$data['asset'] = $asset;
$data['developer'] = $developer;
$this->load->view('asset/details', $data);?>

</div>
<fieldset class='codeList'>
<legend class='codeHeader'>Codes</legend>
<div id='codes_<?=$asset->kAsset?>'><?php 
$data['kAsset'] = $asset->kAsset;
$data['codes'] = $codes;

$this->load->view('code/list', $data);

?>
</div>
</fieldset>

<fieldset class="codeList"><legend class='codeHeader'>Files</legend>
<div id='files_<?=$asset->kAsset?>'>
<?php $data['kAsset'] =  $asset->kAsset;
$data['files'] = $files;
$this->load->view('file/list', $data);
?>
</div>
</fieldset>
</div>