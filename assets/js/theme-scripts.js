// Init jQuery
$ = jQuery;

$(document).ready(function(){
	// alert('JS: Ready');

	$('.show-more').click(function(){
		let button = $(this);
		let data = {
			'action': 'loadmore',
			'query': localize_data.query,
			'page': localize_data.current_page,
		};

		$.ajax({
			type: "POST",
			url: localize_data.ajax_url,
			data: data,
			beforeSend: function(xhr){
				button.text('Loading...');
			},
			success: function(data){
				if(data){
					button.text( 'Show More' );

					$('.front-page-posts').append(data);

					localize_data.current_page++;

					if(localize_data.current_page == localize_data.max_page){
						button.remove();
					}
				} else{
					button.remove();
				}

				// console.log(data);
			},
			error: function(err){
				console.log("Error "+err.status);
				console.log(err);
			},
		});
	})
});
