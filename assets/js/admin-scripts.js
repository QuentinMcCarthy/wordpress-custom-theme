// Init jQuery
$ = jQuery;

// metaboxes var called from functions.php via localization

$(document).ready(function(){
	// alert('JS: Ready');

	display_metaboxes();

	$("input[name='post_format']").change(function(){
		display_metaboxes();
	});

	function display_metaboxes(){
		var selected_format = $("input[name='post_format']:checked").attr("id");

		for ( var value in metaboxes.formats ) {
			if ( value != selected_format ) {
				$("#"+metaboxes.formats[value]).hide();
			} else {
				$("#"+metaboxes.formats[value]).show();
			}
		}
	}
});
