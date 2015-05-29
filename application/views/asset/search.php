<?php #asset_search.inc.php
?>
<form id="asset_search" name="asset_search"
	action="<? echo site_url("asset/$action"); ?>" method="get">
	<p>
		<label for="developer">Developer</label> <span id='developerField'> <?php echo form_dropdown('kDeveloper', $developerPairs, $this->session->userdata("kDeveloper"), 'id="kDeveloper"');?>
		</span>
	</p>
	<p>
		<label for="type">Type</label> <span id='typeField'> <?php echo form_dropdown('type', $typePairs, $this->session->userdata("type"), 'id="type"');?>
		</span>
	</p>
	<p>
		<label for="status">Status</label> <span id='statusField'> <?php echo form_dropdown('status', $statusPairs, $this->session->userdata("status"), 'id="status"');?>
		</span>
	</p>
		<p>
		<label for="status_number">Serial Number</label> <input type="text" name="serial_number" id="serial_number" value=""/>
	</p>
	<p>

		<label for="name">Asset Name</label> <span id="nameField"> <input
			type="text" id="name" name="name" value="" />
		</span>
	</p>
	<p>
		<label for="name">Product</label> <span id="productField"> <input
			type="text" id="product" name="product" value="" />
		</span>
	</p>
	<p>
		<label for="year_acquired">Year Manufactured</label> <span id="acquiredField"> <input
			type="text" id="year_acquired" name="year_acquired" value="" />
		</span>
	</p>
	<p>
		<label for="year_removed">Year Removed</label> <span id="removedField"> <input
			type="text" id="year_removed" name="year_removed" value="" />
		</span>
	</p>
	<p>
		<input type="submit" class="button" value="Search" />
	</p>
</form>
