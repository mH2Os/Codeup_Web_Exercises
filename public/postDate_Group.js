document.getElementById('posts').innerHTML = html;

// var html = '';

postsDate.forEach(function(element) {
    var postsDate = moment(element.date, "YYYYMMDD").fromNow();
	
	html += '<h2>' + element.title + '</h2>';
	html += '<p>' + element.body + '</p>';
	//give h3 id name in future
	html += '<h3>' + element.contactName + '</h3>';
	html += '<h3>' + element.contactEmail + '</h3>';	
	html += '<small>' + postsDate + '</small>';
});

// var html_single = '';

// var postDate = moment(postDate.date, "YYYYMMDD").fromNow();
// 	html_single += '<small>' + postDate + '</small>';
