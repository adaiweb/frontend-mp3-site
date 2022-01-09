var currentPlayingItemId = 0;
var audioId = '';
$(document).ready(function(){
	$('body').on('click', '.js-play', function() {
		var currentPlayBtn = $(this), currentPlay = currentPlayBtn.closest('.js-item');
		currentPlayingItemId = parseInt(currentPlay.attr("data-id"));

		if(!currentPlay.attr("data-audio-id")){
			$.ajax({url: '/api/get_video.php?query='+currentPlay.attr("data-title"), success: function (res) {
				var json = $.parseJSON(res); // create an object with the key of the array
				audioId = json.id;

		$(".player").hide();
		$(".player").html("");

				if ( currentPlay.hasClass('js-item-played') ) {
				playItem(currentPlayingItemId, audioId);
		} 
			}});
		} else {
			audioId = currentPlay.attr("data-audio-id");

		$(".player").hide();
		$(".player").html("");

			if ( currentPlay.hasClass('js-item-played') ) {
				playItem(currentPlayingItemId, audioId);
		} 
		}

	});



	$('body').on('click', '.ap-next', function() {
		
		$(".player").hide();
		$(".player").html("");
 		currentPlayingItemId = currentPlayingItemId+1;

 		playIt(currentPlayingItemId);
		
		
	});

	$('body').on('click', '.ap-prev', function() {
		
		$(".player").hide();
		$(".player").html("");
		currentPlayingItemId = currentPlayingItemId-1;
		playIt(currentPlayingItemId);
	});

	function playIt(id){

		
		if(!$(".js-item").eq(id).attr("data-audio-id")){
 				$.ajax({url: '/api/get_video.php?query='+$(".js-item").eq(id).attr("data-title"), success: function (res) {
					var json = $.parseJSON(res); // create an object with the key of the array
					audioId = json.id;
					playItem(id, audioId);

				}}); 
		} else {
			audioId = $(".js-item").eq(id).attr("data-audio-id");
			playItem(id, audioId);

		}
	}

	$('.audioplayer-playpause').on('click', 'a', function () { 
		console.log("SEX");
	});


});

 
 function playItem(id,audioId){
 		var videoPlayer = $(".js-item").eq(id).find(".player");
		videoPlayer.show();
 		videoPlayer.html('<iframe style="width:100%;height:300px" src="https://www.youtube.com/embed/'+audioId+'?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
 		return true;
 }

 	$(".search-input input").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: 'https://suggestqueries.google.com/complete/search?callback=?hl=en&ds=yt&client=chrome&q=' + request.term,
            type: 'GET',
            dataType: 'jsonp',
            success: function (data) {
                response(data[1]);
            }
        });
    },
    minLength: 2
});

 $(function() { 
  $(".ui-menu").click(function(e) {
    var clickedValue = $(e.target).text();
    var query = clickedValue.split(' ').join('-');
    window.location.href = "https://"+query+".poptik.top/";
  });

});
