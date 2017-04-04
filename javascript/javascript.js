// JavaScript Document

$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 500) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
			if ($(this).scrollTop() > 0) {
		document.getElementById("menusite").style.boxShadow = "0px 3px 6px rgba(50,50,50,0.28)";
		document.getElementById("menusitesobrenos").style.boxShadow = "0px 3px 6px rgba(50,50,50,0.28)";
			} else {
				document.getElementById("menusite").style.boxShadow = "0px 0px 0px grey";
				document.getElementById("menusitesobrenos").style.boxShadow = "0px 0px 0px grey";
			}
		});
	});

});

$(document).ready(function () {
    //$(document).on("scroll", onScroll);
    
    //smoothscroll
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            //$(this).removeClass('active');
        })
        //$(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 800, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });
});

/*function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('#menu a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#menu ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}*/

var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('#menusite').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('#menusite').fadeOut();
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('#menusite').fadeIn();
        }
    }
    
    lastScrollTop = st;
}

function myFunction() {
    var x = document.getElementById("menusite");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}