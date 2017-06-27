// JavaScript Document

$(document).ready(function(){
	
	"use strict";
	var config = {
    apiKey: "<YOUR-API-KEY>",
    authDomain: "<YOUR-AUTHDOMAIN>",
    databaseURL: "<YOU-DATABASEURL>",
    projectId: "<YOUR-PROJECTID>",
    storageBucket: "<YOUR-STORAGEBUCKET>",
    messagingSenderId: "<YOUR-MESSAGINGSENDERID>"
  };

  firebase.initializeApp(config);



$(".heart").on('click touchstart', function(){
	var id=$(this).attr('id');
	var heart=$(this);
	firebase.auth().onAuthStateChanged(function(user) {
		if(user){
			///TO-DO
			var userId = user.uid;
			var db=firebase.database();
			
			if(heart.hasClass('liked')){
				
				db.ref('users/' + userId+'/likes/'+id).remove();
				setCookie(id,0,30);
				heart.removeClass('liked');
			}else{
				db.ref('users/' + userId+'/likes/'+id).set({
    			liked: "true"
  		  	  });
				heart.toggleClass('is_animating');
				setCookie(id,1,30);
				heart.addClass('liked');
			}
		}else{
			if(heart.hasClass('liked')){
				setCookie(id,0,30);
				heart.removeClass('liked');
			}else{
				heart.toggleClass('is_animating');
				setCookie(id,1,30);
				heart.addClass('liked');
			}
				
		}
	});
	
});

/*when the animation is over, remove the class*/
$(".heart").on('animationend', function(){
  $(this).toggleClass('is_animating');
});

});

function get_cookies_array() {
	"use strict";
    var cookies = { };

    if (document.cookie && document.cookie !== '') {
        var split = document.cookie.split(';');
        for (var i = 0; i < split.length; i++) {
            var name_value = split[i].split("=");
            name_value[0] = name_value[0].replace(/^ /, '');
            cookies[decodeURIComponent(name_value[0])] = decodeURIComponent(name_value[1]);
        }
    }
    return cookies;
}

function setCookie(cname,cvalue,exdays) {
	"use strict";
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
	"use strict";
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(name) {
    var state=getCookie(name);
    if (user === 1) {
        alert("Welcome again " + user);
    } else {
       
    }
}

$(document).ready(function(){
	"use strict";
	var menusite=document.getElementById("menusite");
	var menusobrenos=document.getElementById("menusitesobrenos");
	
	// #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 500) {
				$('#back-top').removeClass("backtop-hidden").addClass("shown");
			} else {
				$('#back-top').removeClass("shown").addClass("backtop-hidden");
			}
			if ($(this).scrollTop() > 0) {
				if(menusite!==null){
					menusite.style.boxShadow = "0px 3px 6px rgba(50,50,50,0.28)";
				}else{
					if(menusobrenos!==null){
					menusobrenos.style.boxShadow = "0px 3px 6px rgba(50,50,50,0.28)";
					}
				}
			} else {
				if(menusite!==null){
					menusite.style.boxShadow = "0px 0px 0px grey";
				}else{
					if(menusobrenos!==null){
					menusobrenos.style.boxShadow = "0px 0px 0px grey";
					}
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
	"use strict";
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            //$(this).removeClass('active');
        });
      
        var target = this.hash,
            menu = target;
        var $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 800, 'swing', function () {
            window.location.hash = target;
        });
    });
});

var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
	"use strict";
    didScroll = true;
});

setInterval(function() {
	"use strict";
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
	"use strict";
    var st = $(document).scrollTop();
	
	var dropdowns = document.getElementsByClassName("dropdown-content");
	var i;
	for (i = 0; i < dropdowns.length; i++) {
		var openDropdown = dropdowns[i];
		if (openDropdown.classList.contains('show')) {
			openDropdown.classList.remove('show');
		}
	}
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta){
		return;
	}
    
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
	"use strict";
    var x = document.getElementById("menusite");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}

function toggleSignIn() {
	  "use strict";
      if (firebase.auth().currentUser) {

        // [START signout]

        firebase.auth().signOut();

        // [END signout]

      } else {

        var email = document.getElementById('email').value;
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");
        var password = document.getElementById('password').value;
		var snackbartext="";
		var lang = navigator.language || navigator.userLanguage;

        if (email.length === 0) {
			snackbartext="Por favor introduza um e-mail.";
		    showsnackbar(snackbartext);
            return;

        }else{
			if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
				snackbartext="Por favor introduza um indereço de e-mail válido.";
		    	showsnackbar(snackbartext);
				return;
			}
		}

        if (password.length < 4) {
			snackbartext="Por favor introduza uma palavra-passe.";
		    showsnackbar(snackbartext);
          	return;

        }

        // Sign in with email and pass.

        // [START authwithemail]

        firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {

          // Handle Errors here.

          var errorCode = error.code;

          var errorMessage = error.message;

          // [START_EXCLUDE]

          if (errorCode === 'auth/wrong-password') {
			  snackbartext="Palavra-passe incorreta.";
			  showsnackbar(snackbartext);
			  return;

          } else {
			  if(errorCode === 'auth/user-not-found'){
				  snackbartext="Utilizador não existe.";
				  showsnackbar(snackbartext);
				  return;
			  }else{
				  
				console.log(errorMessage);
				return;
			
			 }

          }

          console.log(error);

          // [END_EXCLUDE]

        });

        // [END authwithemail]
		
		firebase.auth().onAuthStateChanged(function(user) {

        // [END_EXCLUDE]

        if (user) {
			//CHECK LIKES AND SET LIKES
			var heartcookies=get_cookies_array();
			for(var name in heartcookies){
				if(heartcookies.hasOwnProperty(name)){
					if(name.includes("heart")){
						setCookie(name,0,30);
					}
				}
			}
			var userId = user.uid;
			var db=firebase.database();
			db.ref('users/' + userId+'/likes/').on("child_added", function(snapshot){
				var likeid=snapshot.key;
				try{
					var d = new Date();
    				d.setTime(d.getTime() + (30*24*60*60*1000));
    				var expires = "expires=" + d.toGMTString();
    				document.cookie = likeid + "=" + "1" + ";" + expires + ";path=/";
					
					window.location.replace('http://localhost/luxvilla-web');
					window.location.assign('http://localhost/luxvilla-web');
					window.location.href = 'http://localhost/luxvilla-web';
				}
				catch(Error){
					alert(Error.message);
				}
				
			});
			

        }


      });

      }
	  

    }
	
	function editprofile(){
		"use strict";
		var newusername=document.getElementById('username').value;
		var newbio=document.getElementById('nbio').value;
		firebase.auth().onAuthStateChanged(function(user) {


        if (user) {

          // User is signed in.
/*
          var displayName = user.displayName;

          var email = user.email;

          var emailVerified = user.emailVerified;

          var photoURL = user.photoURL;

          var isAnonymous = user.isAnonymous;

          var uid = user.uid;

          var providerData = user.providerData;*/

          // [START_EXCLUDE]

          // [END_EXCLUDE]
		  var userId = user.uid;
		  firebase.database().ref('/users/' + userId).once('value').then(function(snapshot) {
  var currentusername = snapshot.val().user_name;
  var currentuserbio =  snapshot.val().user_bio;
  
  if(newusername && newbio){
			  firebase.database().ref('users/' + userId).set({
    			user_name: newusername,
    			user_bio: newbio

  		  	  });
			  showsnackbar("Perfil editado.");
			  
		  }
		  
		  if(newusername && newbio ===""){
			  firebase.database().ref('users/' + userId).set({
    			user_name: newusername,
				user_bio: currentuserbio
  		  	  });
			  showsnackbar("Perfil editado.");
		  }
		  
		  if(newusername ==="" && newbio){
			  firebase.database().ref('users/' + userId).set({
    			user_name: currentusername,
				user_bio: newbio
  		  	  });
			  showsnackbar("Perfil editado.");
		  }
		  
		  if(newusername ==="" && newbio ===""){
			  window.location.replace('http://localhost/luxvilla-web/profile/');
window.location.assign('http://localhost/luxvilla-web/profile/');
window.location.href = 'http://localhost/luxvilla-web/profile/';
		  }

  // ...
});
        }else{
			showsnackbar("Para editar precisa de fazer login.");

		}

        // [END_EXCLUDE]

      });
	}
	
	function checkusername(){
		"use strict";
		var usernamevalue=document.getElementById('username').value;
		//this give me the error
		var ref=firebase.database().ref();
		//
		
		ref.child("users").orderByChild("user_name").equalTo(usernamevalue).once("value", function(snapshot) {
    var userData = snapshot.val();
    if (userData){
      showsnackbar('Nome de utilizador já existe.');
	  document.getElementById('username').focus();
    }
});
	}
	
	function userprofile(){
		"use strict";
		var usernametext=document.getElementById('username');
		var userbiotext=document.getElementById('userbio');
		firebase.auth().onAuthStateChanged(function(user) {

        // [END_EXCLUDE]

        if (user) {

          // User is signed in.
/*
          var displayName = user.displayName;

          var email = user.email;

          var emailVerified = user.emailVerified;

          var photoURL = user.photoURL;

          var isAnonymous = user.isAnonymous;

          var uid = user.uid;

          var providerData = user.providerData;*/

          // [START_EXCLUDE]

          // [END_EXCLUDE]
	  	  var userId = user.uid;
return firebase.database().ref('/users/' + userId).once('value').then(function(snapshot) {
  var username = snapshot.val().user_name;
  var userbio =  snapshot.val().user_bio;
  usernametext.innerHTML="@"+username;
  userbiotext.innerHTML=userbio;
  document.title=username+" - Perfil";
  
  $("#preloader").hide();
  $("#profilename").show();
  $("#preloaderinfo").hide();
  $("#conteudo").show();

  // ...
});

        }else{
			$("#preloader").hide();
  			$("#profilename").show();
  			$("#preloaderinfo").hide();
  			$("#conteudo").show();

		}

        // [END_EXCLUDE]

      });
		
}

function signupuserdata(userId, username){
	"use strict";
	firebase.database().ref('users/' + userId).set({
    user_name: username,
    user_bio: "Para adicionar uma bio edite o perfil."
  });
}
	
	function showsnackbar(text){
		"use strict";
		var snackbar=document.getElementById('snackbar');
		snackbar.innerHTML=text;
			snackbar.className = "show";
    setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 3000);
	}
	
	function usersignedin(){
		"use strict";
		$('#signinlink').hide();
		$('#signuplink').hide();
		$('#profilelink').show();
		$('#signoutlink').show();
	}
	
	function usernotsignedin(){
		"use strict";
		$('#profilelink').hide();
		$('#signoutlink').hide();
		$('#signinlink').show();
		$('#signuplink').show();
	}
	
	function signup(){
		"use strict";
		var snackbartext="";
		var username=document.getElementById('username').value;
		var email = document.getElementById('email').value;
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");
      	var password = document.getElementById('password').value;
		var repeatpassword = document.getElementById('rppassword').value;
		
      if (email.length===0) {
			snackbartext="Por favor introduza um indereço de e-mail.";
		    showsnackbar(snackbartext);
			return;
      }else{
		  if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
			  snackbartext="Por favor introduza um indereço de e-mail válido.";
		      showsnackbar(snackbartext);
		  	  return;
		  }
			
	  }

      if (password.length < 4) {
			snackbartext="Por favor introduza uma palavra-passe.";
		    showsnackbar(snackbartext);
        	return;
      }else{
		  if(password !== repeatpassword){
			  snackbartext="Por favor confirme a palavra-passe.";
		      showsnackbar(snackbartext);
			  return;
		  }
	  }
		
		firebase.auth().createUserWithEmailAndPassword(email, password).then(function(user){
			var userId = user.uid;
		  	signupuserdata(userId, username);
		  
		  	window.location.replace('http://localhost/luxvilla-web');
			window.location.assign('http://localhost/luxvilla-web');
			window.location.href = 'http://localhost/luxvilla-web';
    }).catch(function(error) {

        // Handle Errors here.

        var errorCode = error.code;

        var errorMessage = error.message;

        // [START_EXCLUDE]

        if (errorCode === 'auth/weak-password') {

          alert('The password is too weak.');

        } else {

          showsnackbar(errorMessage);
		  return;

        }

        console.log(error);

        // [END_EXCLUDE]
      });
	  
	  
	}
	
	function signout(){
		"use strict";
		var Lang = navigator.language || navigator.userLanguage;
		var snackbartext="";
		firebase.auth().signOut().then(function() {
			
			var heartcookies=get_cookies_array();
			for(var name in heartcookies){
				if(heartcookies.hasOwnProperty(name)){
					if(name.includes("heart")){
						setCookie(name,0,30);
					}
				}
			}
			usernotsignedin();
			snackbartext="Sessão terminada com sucesso.";
		    showsnackbar(snackbartext);
			
			window.location.replace('http://localhost/luxvilla-web');
			window.location.assign('http://localhost/luxvilla-web');
			window.location.href = 'http://localhost/luxvilla-web';
			
		}, function(error) {
			snackbartext="Ocorreu um erro enquanto terminava sessão.";
		    showsnackbar(snackbartext);
});
		
	}
	
	function initApp() {

      // Listening for auth state changes.

      // [START authstatelistener]
	  "use strict";
      firebase.auth().onAuthStateChanged(function(user) {

        // [END_EXCLUDE]

        if (user) {

          // User is signed in.
/*
          var displayName = user.displayName;

          var email = user.email;

          var emailVerified = user.emailVerified;

          var photoURL = user.photoURL;

          var isAnonymous = user.isAnonymous;

          var uid = user.uid;

          var providerData = user.providerData;*/

          // [START_EXCLUDE]

          // [END_EXCLUDE]
	  	  usersignedin();

        }else{
			usernotsignedin();
		}

        // [END_EXCLUDE]

      });

      // [END authstatelistener]


var signinbutton=document.getElementById('signin');

var signupbutton=document.getElementById('signup');

var editbutton=document.getElementById('edit');

var addcasa=document.getElementById('adicionar');

if(signinbutton!==null){
	signinbutton.addEventListener('click', toggleSignIn, false);
}

if(signupbutton !==null){
	signupbutton.addEventListener('click', signup, false);
}
if(editbutton !==null){
	editbutton.addEventListener('click', editprofile, false);
}
if(addcasa !==null){
	addcasa.addEventListener('click', adicionarcasa, false);
}

      /*document.getElementById('quickstart-sign-up').addEventListener('click', handleSignUp, false);*/

     /* document.getElementById('quickstart-password-reset').addEventListener('click', sendPasswordReset, false);*/

    }



    window.onload = function() {
	  "use strict";
      initApp();

    };
	
	
	$(function () {
	'use strict';

	var $swipeTabsContainer = $('.swipe-tabs'),
		$swipeTabs = $('.swipe-tab'),
		$swipeTabsContentContainer = $('.swipe-tabs-container'),
		currentIndex = 0,
		activeTabClassName = 'active-tab';

	$swipeTabsContainer.on('init', function(event, slick) {
		$swipeTabsContentContainer.removeClass('invisible');
		$swipeTabsContainer.removeClass('invisible');

		currentIndex = slick.getCurrent();
		$swipeTabs.removeClass(activeTabClassName);
       	$('.swipe-tab[data-slick-index=' + currentIndex + ']').addClass(activeTabClassName);
	});

	$swipeTabsContainer.slick({
		//slidesToShow: 3.25,
		slidesToShow: 2,
		slidesToScroll: 1,
		arrows: false,
		infinite: false,
		swipeToSlide: true,
		touchThreshold: 10
	});

	$swipeTabsContentContainer.slick({
		asNavFor: $swipeTabsContainer,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		infinite: false,
		swipeToSlide: true,
    draggable: false,
		touchThreshold: 10
	});


	$swipeTabs.on('click', function(event) {
        // gets index of clicked tab
        currentIndex = $(this).data('slick-index');
        $swipeTabs.removeClass(activeTabClassName);
        $('.swipe-tab[data-slick-index=' + currentIndex +']').addClass(activeTabClassName);
        $swipeTabsContainer.slick('slickGoTo', currentIndex);
        $swipeTabsContentContainer.slick('slickGoTo', currentIndex);
    });

    //initializes slick navigation tabs swipe handler
    $swipeTabsContentContainer.on('swipe', function(event, slick, direction) {
    	currentIndex = $(this).slick('slickCurrentSlide');
		$swipeTabs.removeClass(activeTabClassName);
		$('.swipe-tab[data-slick-index=' + currentIndex + ']').addClass(activeTabClassName);
	});
});

$(document).click(function(event) { 
	"use strict";
    if(!$(event.target).closest('#usersignin').length) {
         var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
    }else{
		document.getElementById("myDropdown").classList.toggle("show");
	}
});

$(document).ready(function(e) {
	"use strict";
    var waveBtn = (function () {
  var btn = document.querySelectorAll('.wave'),i;

  for(i = 0; i < btn.length; i++) {
    btn[i].onmousedown = function (e) {
      var newRound = document.createElement('div'),x,y;

      newRound.className = 'cercle';
      this.appendChild(newRound);

      x = e.pageX - this.offsetLeft;
      y = e.pageY - this.offsetTop;

      newRound.style.left = x + "px";
      newRound.style.top = y + "px";
      newRound.className += " anim";

      setTimeout(function() {
        newRound.remove();
      }, 1500);
    };
  }
}());
});