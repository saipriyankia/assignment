$('#type_switcher').on('change', function(){
	var val =$(this).val();
	var msg= '';
	if(val==1){
		msg='<div class="form-group"><label for="type_switcher">Switcher Attribute (DVD-Disc)</label><input type="text" placeholder="Please Enter Size in MB Ex: 100MB" name="size" id="switcher_attribute" required class="form-control"><label>Note: Please Enter Size in MB Ex: 100MB</label></div>';
	}else if(val ==2){
		msg='<div class="form-group"><label for="type_switcher">Switcher Attribute (Book)</label><input type="text" placeholder="Please Enter Weight in Kgs Ex: 100Kgs" name="weight" id="switcher_attribute" required class="form-control"><label>Note: Please Enter Weight in Kgs Ex: 100Kgs</label></div>';
	}else if( val==3){
		msg='<div class="form-group"><div class="col-md-4"><label for="type_switcher">Switcher Attribute (Furniture)</label> <input type="text" placeholder="Please Enter Height" name="dimension[]" id="switcher_attribute" required class="form-control"> </div> <div class="col-md-4"> <label for="type_switcher">&nbsp;</label> <input type="text" placeholder="Please Enter Width" name="dimension[]" id="switcher_attribute" required class="form-control"></div> <div class="col-md-4"><label for="type_switcher">&nbsp;</label> <input type="text" placeholder="Please Enter Length" name="dimension[]" id="switcher_attribute" required class="form-control"> </div> <label>Note: Please Provide Dimensions in HxWxL</label></div>';
	}
	$('#hide').html(msg);
})