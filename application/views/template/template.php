<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<?
$this->load->view('template/header');?>
</head>
<body>
<div id="page">
<div id="navigation">
<? $this->load->view('template/menu'); ?>
</div>
<div id='content'>
<? $this->load->view($target);?>
</div>
</div>
<? $this->load->view('template/footer');?>

</body>
</html>