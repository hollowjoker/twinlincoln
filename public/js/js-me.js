function applyValidation(thisForm,errors){

	thisForm.addClass('was-validated');
	thisForm.find('.invalid-feedback').remove();
	$.each(errors, function( index, value){
		var toAppend = '<div class="invalid-feedback">'+ value +'</div>';
		thisForm.find('[name="'+index+'"]').closest('.form-group').append(toAppend);
	});

}

function removeValidation(thisForm){
	thisForm.removeClass('was-validated');
}