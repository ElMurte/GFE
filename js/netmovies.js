//active link
$(document).ready(function() {
    $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("current-link");
        }
    });
});
//responsive menu mobile
function myFunction() {
    var x = document.getElementById("listamenu");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

// Get the number of pixels scrolled
        document.addEventListener('DOMContentLoaded', function () {
			$('.right').on('click', function(){
			 var curr = $(this).parent().find('.currentItem');
			 var nxt = $(curr).next();
			 if($(nxt).length > 0) {
			    $(curr).toggleClass('currentItem');
				$(nxt).toggleClass('currentItem');
			 }
			});
			$('.left').on('click', function(){
			 var curr = $(this).parent().find('.currentItem');
			 var prev = $(curr).prev();
			 if($(prev).length > 0) {
			    $(curr).toggleClass('currentItem');
				$(prev).toggleClass('currentItem');
			 }
			});
        }, false);