<?php
$i = 1;
$current_asset= "";
?>
<? if($assets != NULL ): ?>
<div class="message">Click on the name of an item to view details, tab or shift-tab to move down and up through the list </div>
<div id='asset-list'>

	
	<? foreach($assets as $asset): ?>
	
	<?	if($asset->type != $current_asset):?>
	<h3><?=$asset->type;?></h3>
	<? $current_asset = $asset->type;?>
	<? endif;?>
	
	<? $name_string = format_asset_name($asset);?>

	<div tabindex="<?=$i;?>" class="asset-item"
		id="asset-item_<?=$asset->kAsset;?>">
		<?=$name_string;?></div>
		<? $i++; ?>
	<? endforeach; ?>
	</div>
<? else: ?>
<h3>No assets were returned from your search request</h3>
<? endif; ?>

<div id="asset-details" class="float"></div>