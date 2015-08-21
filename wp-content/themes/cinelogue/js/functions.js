jQuery(document).ready(function($){

// IMDb ID to Search
var imdbId = "tt1285016";
var imdbTitle = $('aside h1').attr('id');
	
	var url = "http://www.omdbapi.com/?t=" + imdbTitle;

	$.getJSON(url, function (response) {
		var omdbData = response;
		
		console.log(omdbData);
		
		var statusHTML = '<li>' + omdbData.Country + ' , ' + omdbData.Year + '</li>';
		
		statusHTML += '<li>' + omdbData.Director + '</li>';
		
		$('.film-data').html(statusHTML);
	});

}); // end ready