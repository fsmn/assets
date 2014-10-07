<?php
$main_menu = $this->menu_model->get ( 1 );
$user_group = $this->ion_auth->get_users_groups ()->row ()->id;
foreach ( $main_menu as $item ) {
	if ($item->access_group == $user_group || $user_group == 1) {
		$buttons [] = array( "text"=>$item->label,"class"=>explode(",",$item->class), "type"=>$item->type, "href"=>site_url($item->href), "item"=>"none");
	}
}
if ($this->uri->segment ( 2 ) == "search") {
	$buttons [] = array("text"=>"Export", "class"=>array("button","export"), "href"=> site_url ( "asset/export" ), "item"=>"none" );
}
$user = $this->ion_auth->user()->row();
$utility_menu = $this->menu_model->get(2);
foreach($utility_menu as $utility_item){
$utility_buttons[] = array( "text"=>$utility_item->label,"class"=>explode(",",$utility_item->class), "type"=>$utility_item->type, "href"=>site_url($utility_item->href), "item"=>"none");
}
$utility_buttons[] = array("text"=>$user->username,"type"=>"span", "id"=>"edit-user-link_$user->id", "class"=>array("link","edit-user"), "item"=>"auth"  );
?>
<h1 class='site-name'><a href="/">Asset Tracking System</a></h1>
<div id="user-name">
<?=create_button_bar($utility_buttons); ?></div>
<? echo create_button_bar($buttons);