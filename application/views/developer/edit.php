<?php

?>
<form id="developer_editor" name="developer_editor" action="<? echo site_url("developer/$action"); ?>" method="post">
	<input type="hidden" id="kDeveloper" name="kDeveloper" value="<? echo getValue($developer, 'kDeveloper'); ?>"/>
	<p>
	 <label for="developer">Developer:&nbsp;</label>
<input type="text" id="developer" name="developer" value="<? echo getValue($developer, 'developer'); ?>" style="width:50ex"/> </p>   
	<p>
	<label for="url">Url:&nbsp;</label>
<input type="text" style="width:50ex" id="url" name="url" value="<? echo getValue($developer, 'url'); ?>"/></p>
	<p>
	<input type="submit" value="<?=ucfirst($action);?>" class="button"/>
	</p>
</form>