	$(document).on('click',".developer_add", function(event) {
		var myUrl = baseUrl + "developer/add";
		var formData = {
				ajax: 1
		};
		$.ajax({
			url: myUrl,
			type: 'POST',
			data: formData,
			success: function(data) {
				showPopup('New Developer', data, 'auto');
			}
		});
	});

	$(document).on('click', ".developer_edit", function(event) {
			var myDeveloper = this.id.split("_")[1];
			var myUrl = baseUrl + "developer/edit/";
			var formData = {
					ajax: '1',
					kDeveloper: myDeveloper
			};
			$.ajax({
				url: myUrl,
				type: 'POST',
				data: formData,
				success: function(data) {
					showPopup('Edit Developer', data, 'auto');
				}	
			});//end ajax
			
		});// end developer_edit
		
		$(document).on('change','#developer',function(){
			myValue=$(this).val();
			if(myValue=="other"){
				$("#developerField").html("<input type='text' id='developer' name='developer' value='' size='35'/>");
			}
		});//end developer live change
			
