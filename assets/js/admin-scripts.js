// Init jQuery
$ = jQuery;

// metaboxes var called from functions.php via localization

$(document).ready(function(){
	// alert('JS: Ready');

	var formats = metaboxes.formats

	display_metaboxes();

	$("input[name='post_format']").change(function(){
		display_metaboxes();
	});

	function display_metaboxes(){
		let selected_format = $("input[name='post_format']:checked").attr("id");

		for ( var value in formats ) {
			if ( value != selected_format ) {
				$("#"+formats[value]).hide();
			} else {
				$("#"+formats[value]).show();
			}
		}
	}
});
