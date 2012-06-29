<?php defined('BASEPATH') OR exit('No direct script access allowed');
echo "<div class='button-bar'><span class='button new menu_item_add'>Add Menu Item</span></div>";


$current_menu = "";
foreach($menus as $menu){
	if($current_menu != $menu->kMenu){
		$current_menu = $menu->kMenu;
		echo "<h3>$menu->name</h3>";
	} //endif
	echo "<div class='button-box'>";
	echo create_button_object($menu);
	echo "&nbsp;<span class='button edit menu_item_edit' id='mie_$menu->kItem'>Edit</span></div>";


} //end foreach