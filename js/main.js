$(document).ready(function() {
			
			$('.home').live('click', function(event){
				document.location = baseUrl;
			});
			
			
			$('.assetList').accordion({icons:{'header':'ui-icon-plus','headerSelected':'ui-icon-minus'}, collapsible: true});
			$( ".assetList" ).accordion( "option", "navigation", true );
			$(".assetList").accordion("option", "header", "h3");
//			$("#typeList").accordion({icons:{'header':'ui-icon-plus','headerSelected':'ui-icon-minus'}, collapsible: true});

			$(".menu_item_edit").live("click",function(){
				myId = this.id.split("_")[1];
				myUrl = baseUrl + "menu/edit_item/" + myId;
				$.ajax({
					type:"GET",
					url: myUrl,
					success:function(data){
						showPopup("edit menu item",data,"auto");
					}
				});
			});
			
			$(".menu_item_add").live("click",function(){
				myUrl = baseUrl + "menu/create_item/";
				$.ajax({
					type:"GET",
					url: myUrl,
					success:function(data){
						showPopup("Create Menu Item",data,"auto");
					}
				});
			});
			
});	
				

function showPopup(myTitle, data, popupWidth, x, y) {
	if (!popupWidth) {
		popupWidth = 'auto';
	}
	var myDialog = $('<div id="popup_dialog"></div>').html(data).dialog( {
		autoOpen : false,
		title : myTitle,
		modal : true,
		width : popupWidth,
		dialogClass : 'alert'
	});

	if (x) {
		myDialog.dialog( {
			position : x
		});
	}

	myDialog.fadeIn().dialog('open', {
		width : popupWidth
	});

	return false;
}

function printPage() {
	window.print();

}