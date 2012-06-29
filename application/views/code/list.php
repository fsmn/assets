<?php

echo "<span class='button new code_new' id='a_$kAsset'>New Code</span>";
echo "<br/><div id='codeLines_$kAsset'>";

if($codes){
	foreach($codes as $code){
            $data['code'] = $code;
            echo  "<p>";
            echo $this->load->view('code/view', $data);
            echo "</p>";
	}
	
}
echo "</div>";
