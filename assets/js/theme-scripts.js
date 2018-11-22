// Init jQuery
$ = jQuery;

$(document).ready(function(){
	// alert("JS: Ready");

	$(".show-more").click(function(){
		let button = $(this);
		let data = {
			"action": "loadmore",
			"query": front_page_show_more.query,
			"page": front_page_show_more.current_page,
		};

		$.ajax({
			type: "POST",
			url: front_page_show_more.ajax_url,
			data: data,
			beforeSend: function(xhr){
				button.text("Loading...");
			},
			success: function(data){
				if(data){
					button.text( "Show More" );

					$(".front-page-posts").append(data);

					front_page_show_more.current_page++;

					if(front_page_show_more.current_page == front_page_show_more.max_page){
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
