<?php
?>

<h3><?=$developer->developer?></h3>
<p><a href="<?=$developer->url?>" target="_blank"><?=$developer->url?></a></p>
<p><span class='button developer_edit' id="dev_<?=$developer->kDeveloper?>">Edit Developer</span></p>



<?php

	$this->load->view('asset/list_by_type');

?>
