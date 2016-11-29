$(document).ready(function(){
	// alert(1);
	$('.az-file2').click(function(){
		$(this).blur();
		$('.az-file').trigger('click');
		return false;
	});
	$('.az-file').change(function(){
	  $(this).next('.az-file2').val($(this).val().substring($(this).val().lastIndexOf('\\')+1,$(this).val().length));
	  // $(this).siblings('input[type="hidden"]').attr('value', $(this).val().substring($(this).val().lastIndexOf('\\')+1,$(this).val().length));
	});
});