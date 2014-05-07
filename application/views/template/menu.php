<?php 
$main_menu = $this->menu_model->get(1);
$user_group = $this->ion_auth->get_users_groups()->row()->id;

?>
<div class='button-box'>

<ul>
<li class='site-name'>Asset Tracking System</li>
<? foreach($main_menu as $item){
	if($item->access_group == $user_group || $user_group == 1){
	echo "<li>" . create_button_object($item) . "</li>";
	}
}
if($this->uri->segment(2) == "search"): ?>
<li><a class='button' href="<?=site_url("asset/export");?>">Export</a></li>
<? endif; ?>
</ul>
</div>