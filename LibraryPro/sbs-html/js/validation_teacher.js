// Start Validation For Register
var ic = document.forms['frmregisterationT']['txtic'];
var fname = document.forms['frmregisterationT']['txtfnama'];
var lname = document.forms['frmregisterationT']['txtlnama'];
var uname = document.forms['frmregisterationT']['txtunama'];
var email = document.forms['frmregisterationT']['txtEmail'];
var pwd = document.forms['frmregisterationT']['txtpwd'];

var ic_error = document.getElementById('ic_error');
var fname_error = document.getElementById('fname_error');
var lname_error = document.getElementById('lname_error');
var uname_error = document.getElementById('uname_error');
var email_error = document.getElementById('email_error');
var pwd_error = document.getElementById('pwd_error');

ic.addEventListener('input', ic_Verify);
fname.addEventListener('input', fname_Verify);
lname.addEventListener('input', lname_Verify);
uname.addEventListener('input', uname_Verify);
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