<?php
$main_menu = $this->menu_model->get ( 1 );
$user_group = $this->ion_auth->get_users_groups ()->row ()->id;
foreach ( $main_menu as $item ) {
	if ($item->access_group == $user_group || $user_group == 1) {
		$buttons [] = array( "text"=>$item->label,"class"=>explode(",",$item->class), "type"=>$item->type, "href"=>$item->href, "item"=>"none");
	}
}
if ($this->uri->segment ( 2 ) == "search") {
	$buttons [] = array("text"=>"Export", "class"=>array("button","export"), "href"=> site_url ( "asset/export" ), "item"=>"none" );
}
?>
<h1 class='site-name'>Asset Tracking System</h1>
<? echo create_button_bar($buttons);