$("#check_apply").click(function(){
	var val=$('#select_apply').val();
	if(val==3){
		$('#delete_products').submit();
	}
});
$('#select_apply').on('change',function(){
	var val=$('#select_apply').val();
	if(val==1){
		$(".check_product").prop('checked', true);
	}else if(val==2){
		$(".check_product").prop('checked', false);
	}
});