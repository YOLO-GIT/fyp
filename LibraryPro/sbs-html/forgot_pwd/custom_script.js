// START VALIDATION
var new_pwd = document.forms['frmresetpwd']['new_password'];
var confirm_pwd = document.forms['frmresetpwd']['confirm_password'];

var newpwd_error = document.getElementById('newpwd_error');
var confirmpwd_error = document.getElementById('confirmpwd_error');

new_pwd.addEventListener('input', newpwd_Verify);
confirm_pwd.addEventListener('input', confirmpwd_Verify);

var newpasswordRegex = /^[a-zA-Z0-9]{9}$/;
var confirmpasswordRegex = /^[a-zA-Z0-9]{9}$/;

function validated() {
if (new_pwd.value.length < 8 || !newpasswordRegex.test(new_pwd.value)) {
  new_pwd.style.border = "1px solid red";
  newpwd_error.style.display = "block";
  new_pwd.focus();
  return false;
}

if (confirm_pwd.value.length < 8 || !confirmpasswordRegex.test(confirm_pwd.value)) {
  confirm_pwd.style.border = "1px solid red";
  confirmpwd_error.style.display = "block";
  confirm_pwd.focus();
  return false;
}
}

function newpwd_Verify() {
  if (new_pwd.value.length > 7 || newpasswordRegex.test(new_pwd.value)) {
      new_pwd.style.border = "1px solid silver";
      newpwd_error.style.display = "none";
      return true;
  }
}

function confirmpwd_Verify() {
  if (confirm_pwd.value.length > 7 || confirmpasswordRegex.test(confirm_pwd.value)) {
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

