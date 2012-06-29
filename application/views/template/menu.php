<?php 
$main_menu = $this->menu_model->get(1);
?>
<div class='button-box'>

<ul>
<li class='site-name'>Asset Tracking System</li>
<? foreach($main_menu as $item){
	echo "<li>" . create_button_object($item) . "</li>";
}
if($this->uri->segment(2) == "search"): ?>
<li><a class='button' href="<?=site_url("asset/export");?>">Export</a></li>
<? endif; ?>

</ul>
</div>