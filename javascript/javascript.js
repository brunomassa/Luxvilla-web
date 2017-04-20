// JavaScript Document

$(document).ready(function(){

	// hide #back-top first
	

$(".heart").on('click touchstart', function(){
	var id=$(this).attr('id');
	var state=getCookie(id);
	if($(this).hasClass('liked')){
		setCookie(id,0,30);
		$(this).removeClass('liked');
	}else{
		$(this).toggleClass('is_animating');
		setCookie(id,1,30);
		$(this).addClass('liked');
	}
});

/*when the animation is over, remove the class*/
$(".heart").on('animationend', function(){
  $(this).toggleClass('is_animating');
});

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(name) {
    var state=getCookie(name);
    if (user == 1) {
        alert("Welcome again " + user);
    } else {
       
    }
}
});

$(document).ready(function(){
	var menusite=document.getElementById("menusite");
	var menusobrenos=document.getElementById("menusitesobrenos");
	
	$("#back-top").addClass("backtop-hidden");
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 500) {
				$('#back-top').removeClass("backtop-hidden").addClass("shown");
			} else {
				$('#back-top').removeClass("shown").addClass("backtop-hidden");
			}
			if ($(this).scrollTop() > 0) {
				if(menusite!=null){
					menusite.style.boxShadow = "0px 3px 6px rgba(50,50,50,0.28)";
				}else{
					menusobrenos.style.boxShadow = "0px 3px 6px rgba(50,50,50,0.28)";
				}
			} else {
				if(menusite!=null){
					menusite.style.boxShadow = "0px 0px 0px grey";
				}else{
					menusobrenos.style.boxShadow = "0px 0px 0px grey";
				}
			}
		});
		
	});
	
	$("#arrowleft").hover(function(){
        $("#ileft").addClass("hover");
        }, function(){
        $("#ileft").removeClass("hover");
    });

$("#arrowright").hover(function(){
        $("#iright").addClass("hover");
        }, function(){
        $("#iright").removeClass("hover");
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
var navbarHeight = $('header').outerHeight();

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
        $('header').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
             $('header').removeClass('nav-up').addClass('nav-down');
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