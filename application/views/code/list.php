<?php ?>
<div class='button-box'>
<ul>
<li class='button new small code_new' id='a_<?=$kAsset;?>'>New Code</li>
</ul>
</div>
<div id='codeLines_<?=$kAsset;?>'>

<? if($codes) {
	foreach($codes as $code){
            $data['code'] = $code;
            echo  "<p>";
            echo $this->load->view('code/view', $data);
            echo "</p>";
	}
	
} ?>
</div>
