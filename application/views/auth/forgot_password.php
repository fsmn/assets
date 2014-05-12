<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="email"><?php echo sprintf("%s:", $identity_label);?></label> <br />
      	<?php echo form_input($email);?>
      </p>

      <p><?php echo form_submit('submit', "Reset Password","class='button edit'");?></p>

<?php echo form_close();?>