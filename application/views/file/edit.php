<?php

echo $error;?>

<form action="<?=site_url("asset/attach_file");?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<p>
<input type="hidden" name="kAsset" id="kAsset" value="<?=$kAsset?>"/>
<input type="hidden" name="kFile" id="kFile" value="<?=getValue($file,'kFile');?>"/>
<label for="fileDescription">Description: </label>
<input type="text" name="fileDescription" id="fileDescription" value="<?=getValue($file,'fileDescription');?>"/><br/>
<input type="file" name="userfile" class="" size="20" /></p>
<input type="submit" class='button' value="Upload" />&nbsp;<span class="button file_cancel">Cancel</span>&nbsp;<span class="button delete file_delete">Delete</span>
</form>
