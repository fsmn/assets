<h1><?php echo lang('index_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<table class="list">
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
			<td><?php echo $user->first_name;?></td>
			<td><?php echo $user->last_name;?></td>
			<td><?php echo $user->email;?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit', "class='button edit edit-user' id='edit-user_$user->id'") ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<div class="button-box"><ul><li><?php echo anchor('auth/create_user', lang('index_create_user_link'), "class='button new'")?></li>
<li><?php echo anchor('auth/create_group', lang('index_create_group_link'), "class='button new'")?></li></ul></div>