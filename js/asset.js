//$(document).ready(function() {
	$(".asset_list").live('click',function(){
			var myId = this.id.split('_')[1];
			var myUrl = baseUrl + "developer/view/" + myId;
			document.location = myUrl;
	});//end asset_list.live
	
	$(".asset_edit").live('click', function(event) {
					var myAsset = this.id.split("_")[1];
					var formData = {
							ajax: '1',
							kAsset: myAsset
					};
					var myUrl = baseUrl + "asset/edit/";
					$.ajax({
						url: myUrl,
						type: 'POST',
						data: formData,
						success: function(data) {
							$('#details_' + myAsset).html(data);
							$('#details_' + myAsset).css("padding","10px");

//						showPopup('Edit Asset', data, 'auto');
						}
					});
//					document.location = "#" + this.id;
				});// end edit
				
	$('.asset_save').live('click',function(){
//			document.forms['asset_editor'].submit();
		//@TODO this has to be simpler to do. I need to do the serialize function here.
		var myAsset = $("#kAsset").val();
		var myDeveloper = $("#kDeveloper").val();
		var myProduct = $("#product").val();
		var myName = $("#name").val();
		var myType = $("#type").val();
		var myVersion = $("#version").val();
		var myStatus = $("#status").val();
		var myAction = $("#action").val();
		
		var	myLine = "#details_" + myAsset;


		var myUrl = baseUrl + "asset/" + myAction + "/";

		var formData = $("#asset_editor").serialize();
		//var formData['ajax'] = 1;
		$.ajax({
			url: myUrl,
			type: 'POST',
			data: formData,
			success: function(data) {
				$(myLine).html(data);
			}
		}); //end ajax
	});//emd asset_save
	
	$(".asset_new").live('click', function(event) {
		var myUrl = baseUrl + "asset/add/";
		var formData = {
				ajax: '1',
		};
		$.ajax({
			url: myUrl,
			type: 'POST',
			data: formData,
			success: function(data){
				showPopup("New Asset", data, 'auto');
			}
		}); // end ajax
		
	}); //end add
	
	
	$(".asset_show_search").live('click', function(event) {
		var myUrl = baseUrl + "asset/show_search/";
		var formData = {
				ajax: '1'
		};
		$.ajax({
			url: myUrl,
			type: 'POST',
			data: formData,
			success: function(data){
				showPopup("Search Assets", data, 'auto');
			}
		});// end ajax
	});// end search
	
	$(".asset_delete").live('click', function(event){
		var myAsset = $("#kAsset").val();
		var myDeveloper = $("#kDeveloper").val();
		var myUrl = baseUrl + "asset/delete/";

		var formData = {
				ajax: '1',
				kAsset: myAsset,
				kDeveloper: myDeveloper
		};
		var choice = confirm("Are you sure you want to delete this code entry? This cannot be undone!");
		if (choice) {
			var finalChoice = confirm("Are you absolutely sure you want to delete this code entry?\rThis really cannot be undone! I'm for real here!");
			if(finalChoice) {
				$.ajax({
					url: myUrl,
					type: 'POST',
					data: formData,
					success: function(data){
						document.location = baseUrl + "developer/view/" + myDeveloper;
					}
			});
		}
		}
	});
	
	$(".asset_search").live('click', function(event) {
		document.forms['asset_search'].submit();
	});// end search
	
	
	$('#type').live('change;',function(){
		myValue=$(this).val();
		if(myValue=="other"){
			$("#typeField").html("<input type='text' id='type' name='type' value='' class='width:25%'/>");
		}
	});
	
	$("#status").live('change',function(){
		myValue=$(this).val();
		if(myValue=="other"){
			$("#statusField").html("<input type='text' id='status' name='status' value='' size='25'/>");
		}else if(myValue == "Destroyed" || myValue == "Deacquisitioned"){
			$("#year_removed_block").show();
		}else if(myValue != "Destroyed" && myValue != "Deaquisitioned"){
			$("#year_removed_block").hide();
		}
	});
	
	$('.asset_file_new').live('click', function(event){
		var myAsset = this.id.split("_")[1];
		var myUrl = baseUrl + "asset/new_file/";
		var formData = {
				ajax: '1',
				kAsset: myAsset
		};
		$.ajax({
			url: myUrl,
			type: 'POST',
			data: formData,
			success: function(data){
			showPopup("Add a New File", data, 'auto');
			} //end success
		});//end ajax
	}
	);//end new_file
	

