//$(document).ready(function() {
	$(document).on('click',".asset_list", function(){
			var myId = this.id.split('_')[1];
			var myUrl = baseUrl + "developer/view/" + myId;
			document.location = myUrl;
	});//end asset_list.live
	
	$(document).on('click',".asset_edit", function(event) {
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
				
	$(document).on('click','.asset_save', function(){
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
				$("#asset-header_" + myAsset + " a").html(myProduct + " " + myVersion + " (" + myName + ")" );
				$(myLine).html(data);
			}
		}); //end ajax
	});//emd asset_save
	
	$(document).on('click',".asset_new", function(event) {
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
	
	
	$(document).on('click', ".asset_show_search", function(event) {
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
	
	$(document).on('click',".asset_delete", function(event){
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
	

	
	$(document).on('click',".asset_search", function(event) {
		document.forms['asset_search'].submit();
	});// end search
	
	
	$(document).on('change;','#type',function(){
		myValue=$(this).val();
		if(myValue=="other"){
			$("#typeField").html("<input type='text' id='type' name='type' value='' class='width:25%'/>");
		}
	});
	
	$(document).on('change',"#status", function(){
		myValue=$(this).val();
		if(myValue=="other"){
			$("#statusField").html("<input type='text' id='status' name='status' value='' size='25'/>");
		}else if(myValue == "Destroyed" || myValue == "Deacquisitioned"){
			$("#year_removed_block").show();
		}else if(myValue != "Destroyed" && myValue != "Deaquisitioned"){
			$("#year_removed_block").hide();
		}
	});
	
	$(document).on('click','.asset_file_new', function(event){
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
	
$(document).on('click | focus', '.asset-item',function(){
	$(".asset-item.active").removeClass("active");
	if(! $(this).hasClass("active") ){;
	
		$(this).addClass("active");
		my_id = this.id.split("_")[1];
		form_data = {
				ajax: 1
		};
		$.ajax({
			type:"get",
			url: baseUrl + "asset/view/" + my_id,
			data: form_data,
			success: function(data){
				$("#asset-details").html(data).fadeIn();
			}
		});
	}else{
		//$(this).removeClass("active");
	}
});

$(document).on('blur','.asset-item', function(){
	//$(this).removeClass("active");
});

$(window).scroll(function(){
	var top=$('.float');
	if($(window).scrollTop()>250){
		if(!top.hasClass('fixed')){
			top.addClass('fixed');
			top.removeClass('static');
			//top.css('background-color','#000');
		}
	}else{
		if(top.hasClass('fixed')){
			top.addClass('static');
			top.removeClass('fixed');
		}
	}
});