<?php
// this is for producing the ajax output of asset details when updating an asset record
?>

<p>
	<b>Name:&nbsp;</b>
	<?=$asset->name?>
</p>
<p>
	<b>Version:&nbsp;</b>
	<?=$asset->version?>
</p>
<p>
	<b>Type: </b>&nbsp;
	<?=$asset->type?>
</p>
<? if(!empty($asset->serial_number)): ?>
<p>
	<b>Serial Number: </b>&nbsp;
	<?=$asset->serial_number?>
</p>
<? endif; ?>
<p>
	<b>Year:&nbsp;</b>
	<?=$asset->year_acquired;?>
</p>
<p>
	<b>Source:&nbsp;</b>
	<?=$asset->source;?>
</p>
<p>

	<b>Status:&nbsp;</b>
	<?=$asset->status?>
	<? if($asset->status == "Deacquisitioned" || $asset->status == "Destroyed" || $asset->status == "Stolen"){
		print " in $asset->year_removed";
	}
	?>
</p>
<p>
	<b>Developer:</b>&nbsp;<a href="<?=site_url("developer/view/$asset->kDeveloper"); ?>"><?=$developer?></a>
</p>
<? if(getValue($asset,"po")):?>
<p>
<b>Purchase Order: </b>&nbsp;<a href="http://order.server.fsmn/order/view/<?=$asset->po;?>" target="_blank"><?=$asset->po;?></a>
</p>
<? endif;
