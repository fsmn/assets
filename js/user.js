$(document).ready(function() {
	$(".edit-user").on("click",function(){
		my_id = this.id.split("_")[1];
		form_data = {
				ajax: '1'
		};
		$.ajax({
			type: "get",
			data: form_data,
			url: baseUrl + "auth/edit_user/" + my_id,
			success: function(data){
				showPopup("Edit User", data, "auto");
			}
		});
		
		return false;
	});
	
});