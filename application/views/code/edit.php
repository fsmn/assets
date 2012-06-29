<?php
$codeFieldLength = "25ex";
$saveAction = "insert";
if( $code ){
	$codeFieldLength = (strlen($code->value) + 5) . "ex";
	$saveAction = "save";
}

?>

<form name="code_editor" id="code_editor"
	action="<? echo site_url("code/$action"); ?>" method="post">
	<input type="hidden" name="kCode" id="kCode" value="<? echo getValue($code, 'kCode');?>" />
	<input type="hidden" name="kAsset" id="kAsset" value="<?echo getValue($code, 'kAsset', $kAsset);?>"/>
	<input type="hidden" name="action" id="action" value="<?=$action?>"/>
	<p><label
	for="type">Type:&nbsp;</label><span id="type-span"><?php echo form_dropdown('type', $codePairs, getValue($code, 'type'), 'id="type"')?></span></p><p>
<label for="value">Value:&nbsp;</label>
<input type="text" id="value" name="value" value="<? echo getValue($code, 'value');?>" style="width:<? echo $codeFieldLength;?>"/><br/>
</p>
<p><span class='button uppercase'>UPPERCASE</span></p>
<p>
<span class="button code_save" id="save_<? print getValue($code, 'kCode'); ?>">Save</span></p>
	<?php if($saveAction == "save"):?>
		<p><span class="button delete code_delete">Delete</span></p>
	<?php endif;?>
</form>
