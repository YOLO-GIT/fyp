// START VALIDATION
var new_pwd = document.forms['frmresetpwd']['new_password'];
var confirm_pwd = document.forms['frmresetpwd']['confirm_password'];

var newpwd_error = document.getElementById('newpwd_error');
var confirmpwd_error = document.getElementById('confirmpwd_error');

new_pwd.addEventListener('input', newpwd_Verify);
confirm_pwd.addEventListener('input', confirmpwd_Verify);

function validated() {
    if (new_pwd.value.length < 8) {
        new_pwd.style.border = "1px solid red";
        newpwd_error.style.display = "block";
        new_pwd.focus();
        return false;
    }

    if (confirm_pwd.value.length < 8) {
        confirm_pwd.style.border = "1px solid red";
        confirmpwd_error.style.display = "block";
        confirm_pwd.focus();
        return false;
    }
}

function newpwd_Verify() {
  if (new_pwd.value.length > 7) {
      new_pwd.style.border = "1px solid silver";
      newpwd_error.style.display = "none";
      return true;
  }
}

function confirmpwd_Verify() {
  if (confirm_pwd.value.length > 7) {
      confirm_pwd.style.border = "1px solid silver";
      confirmpwd_error.style.display = "none";
      return true;
  }
}
//END VALIDATION

// View Password
function myFunction() {
  var x = document.getElementById("myInputPWD");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myConfirm(){
  var y = document.getElementById("myConfirmPWD");

  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}

