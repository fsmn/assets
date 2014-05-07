<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>

<form name="menu_item_editor" id="menu_item_editor" action="<?=site_url("menu/$action");?>" method="post">
<input type="hidden" name="kItem" id="kItem" value="<?=getValue($item,"kItem");?>"/>
<p>
<label for="kMenu">Parent Menu: </label>
<?=form_dropdown("kMenu",$menus,getValue($item,"kMenu"),"id='kMenu'");?>
</p>
<p>
<label for="text">Menu Label: </label>
<input type="text" name="label" id="label" value="<?=getValue($item, "label");?>"/>
</p>
<p>
<label for="type">Type: </label>
<?=form_dropdown("type",array("a"=>"a","span"=>"span","passthrough"=>"passthrough"),getValue($item,"type"),"id='type'");?>
</p>
<p id="href_field">
<label for="href">Link: </label>
<input type="text" name="href" id="href" value="<?=getValue($item, "href");?>"/>
<p>
<label for="class">Class: </label>
<input type="text" name="class" id="class" value="<?=getValue($item, "class","button");?>"/>
</p>
<p>
<label for="id">ID: </label>
<input type="text" name="id" id="id" value="<?=getValue($item, "id");?>"/>
</p>
<p>
<label for="enclosure">Enclosure: </label>
<input type="text" name="enclosure" id="enclosure" value="<?=getValue($item, "enclosure");?>"/>
</p>
<p>
<label for="rank">Rank: </label>
<input type="text" name="rank" id="rank" value="<?=getValue($item, "rank");?>"/>
</p>
<p>
<label for="access_group">Access Group: </label>
<?=form_dropdown("access_group",$groups,getValue($item, "access_group",2),"id='access_group'");?>
</p>
<p>
<input type="submit" class="button" value="Save"/>
</form>