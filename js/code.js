$(document).ready(function() {
	$(document).on('click','.code_save', function() {
		var myCode = $("#value").val();
		var myType = $("#type").val();
		var myAsset = $("#kAsset").val();
		var myAction = $("#action").val();
		var myId = $("#kCode").val();

		var	myLine = "#codes_" + myAsset;


		var myUrl = baseUrl + "code/" + myAction;

		var formData = {
				ajax: '1',
				value: myCode,
				type: myType,
				kCode: myId,
				kAsset: myAsset
		};
		
		$.ajax({
			url: myUrl,
			type: 'POST',
			data: formData,
			success: function(data) {
				$(myLine).html(data);
			}
		}); //end ajax
	});//end code_save
	
	$(document).on('click',".code_edit", function(event) {
		var myCode = this.id.split("_")[1];
		
		var formData = {
				ajax: '1',
				kCode: myCode,
		};
		var myUrl = baseUrl + "code/edit/";
		$.ajax({
			url: myUrl,
			type: 'POST',
			data: formData,
			success: function(data) {
			$('#codeline_' + myCode).html(data);
			//showPopup('Edit Code', data, 'auto');
			}
		}); //end ajax
	}); // end insert
	

	
	$(document).on('click',".code_new", function(event) {
		var myId = this.id.split("_")[1];
		var myUrl = baseUrl + "code/add/";
		var formData = {
				ajax: '1',
				kAsset: myId
		};
	
		$.ajax({
			url: myUrl,
			type: 'POST',
			data: formData,
			success: function(data){
//				showPopup('Add Code', data, 'auto');
				$("#codes_" + myId).append("<li id='new-line'>" + data + "</li>");
				$("#new-line").css('list-style','none');
			}
		});
	}); // end insert



	$(document).on('click','.code_delete', function() {
			var myCode = $('#kCode').val();
			var myAsset= $('#kAsset').val();
			var myUrl = baseUrl + "code/delete_code/";

			var formData = {
					ajax: '1',
					kCode: myCode,
					kAsset: myAsset
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
							$("#codes_" + myAsset).html(data);
						}
					});
				}
			}//end if
	});
	
	$(document).on("change","#type", function(){
		if($("#type").val() == "other"){
			$("#type-span").html("<input type='text' id='type' name='type' value=''/>");
			$("#type").focus();
		}
	});
	
});//end document.ready function