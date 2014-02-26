
function showRSSfeed(tag) {
    //clear the content in the div for the next feed.
    $("#feedContent").empty();

    //use the JQuery get to grab the URL from the selected item, put the results in to an argument for parsing in the inline function called when the feed retrieval is complete
    $.ajax({
        url: "rssproxy.asp?t=" + tag,
        dataType: "xml",
        success: function (data) {

            //find each 'item' in the file and parse it
            $(data).find('item').each(function (i, val) {

                //name the current found item this for this particular loop run
                var $item = $(this);
                // grab the post title
                var title = $item.find('title').text();
                // grab the post's URL
                var link = $item.find('link').text();
                // next, the description
                var description = $item.find('description').text().replace('&lt;script', '');
                //don't forget the pubdate
                var pubDate = $item.find('pubDate').text();

                // now create a var 'html' to store the markup we're using to output the feed to the browser window
                var html = "<div class=\"rssentry\"><h2 class=\"postTitle\">" + title + "<\/h2> ";
                html += "<em class=\"rssdate\">" + pubDate + "</em>";
                html += "<div class=\"rssdescription\">" + description + "</div>";
                html += "<a href=\"" + link + "\" target=\"_blank\">Read More >><\/a>";



                //put that feed content on the screen!
                $('#feedContent').append($(html));

            });

            $("#feedContent").append("<a href='https://fishandgame.idaho.gov/content/" + tag + "'><img src='//fishandgame.idaho.gov/ifwis/inc/icons/rss.png' \/>RSS feed</a>");
        }
    });
}
