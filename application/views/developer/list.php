<?php

echo $links;

foreach($developers as $developer){
	echo "<fieldset><legend>$developer->developer</legend>";
	echo "<p><span class='button edit developer_edit' id='de_$developer->kDeveloper'>Edit</span>&nbsp;";
	echo "<a href='developer/view/$developer->kDeveloper' class='button'>List Assets</a></p></fieldset>";
}

