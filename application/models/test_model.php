<?php

class Test_model extends CI_Model
{
	
    var $developer = '';
    var $url = '';
    
    
    function new_developer()
    {
      $this->developer = "Hello";
    	$this->url = "Kitty";
    }
}