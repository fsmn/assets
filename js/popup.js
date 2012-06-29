	$(".insert").live('click',function(){
		var list=$('#code_editor').serialize();
		var myAsset=$("#kAsset").val();
		//document.forms['code_editor'].submit();
		$( "#popup_dialog:ui-dialog" ).dialog( "destroy" );

		$.post('ajax.switch.php',list,function(data){
			$('#codes_'+myAsset).html(data);
		});

	});
	

	

	
	
	$('.uppercase').live('click',function(){
		var myValue = $('#value').val();
		myValue = myValue.toUpperCase();
		$('#value').val(myValue);
	});
	
	$('#type').live('change',function(){
		if($(this).val()=="other"){
			$("#codeMenu").html("<input type='text' id='type' name='type' style='width:45%'/>").fadeIn();
		}
	});
