<?php
if($code->type == "Model"){
	if(isset($developer) && $developer == "Apple, Inc."){
		$code->value = "<a href='http://www.everymac.com/ultimate-mac-lookup/?search_keywords=$code->value' target='_blank'>$code->value</a>";
	}
}
echo "<span id='codeline_$code->kCode'><span class='bold'
id='type_$code->kCode'>$code->type</span>:
<span id='code_$code->kCode'>$code->value</span>
<span class='button edit code_edit' id='code_$code->kCode'>Edit</span>
</span>";