var replyButton = document.getElementsByClassName('replylink');
var replyForm = document.getElementsByClassName('replyform');
var postComments = document.getElementById('postcomments');
var showComments = document.getElementById('showcomments');


showComments.onclick = function() {
    if(postComments.style.display != "block") {
        postComments.style.display = "block";
        showComments.innerHTML = "Hide comments";
    }
    else {
        postComments.style.display = "none";
        showComments.innerHTML = "Show comments";
    }
};

