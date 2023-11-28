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

var icRegex = /^[0-9]+$/;
var nameRegex = /^[A-Za-z]+$/;
var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var passwordRegex = /^[a-zA-Z0-9]{9}$/;

function validated() {
  // Start IC Detection
  if (ic.value.length < 12 || !icRegex.test(ic.value)) {
    ic.style.border = "1px solid red";
    ic_error.style.display = "block";
    ic.focus();
    return false;
  }
  // End IC Detection

  // Start Fname Detection
  if (fname.value.length == "" || fname.value.length == null || !nameRegex.test(fname.value)) {
      fname.style.border = "1px solid red";
      fname_error.style.display = "block";
      fname.focus();
      return false;
  }
  // End Fname Detection

  // Start Lname Detection
  if (lname.value.length == "" || lname.value.length == null || !nameRegex.test(lname.value)) {
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
  if (email.value.length === 0 || !emailRegex.test(email.value)) {
    email.style.border = "1px solid red";
    email_error.style.display = "block";
    email.focus();
    return false;
  }
  // End Email Detection

  // Start Password Detection 
  if (pwd.value.length < 8 || !passwordRegex.test(pwd.value)) {
    pwd.style.border = "1px solid red";
    pwd_error.style.display = "block";
    pwd.focus();
    return false;
  }
  // End Password Detection
}


// Start Verify
function ic_Verify() {
    if (ic.value.length > 11 || icRegex.test(ic.value)) {
        ic.style.border = "1px solid silver";
        ic_error.style.display = "none";
        return true;
    }
}

function fname_Verify() {
    if (fname.value.length > 1 || nameRegex.test(fname.value)) {
        fname.style.border = "1px solid silver";
        fname_error.style.display = "none";
        return true;
    }
}

function lname_Verify() {
    if (lname.value.length > 1 || nameRegex.test(lname.value)) {
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
    if (email.value.length > 1 || emailRegex.test(email.value)) {
        email.style.border = "1px solid silver";
        email_error.style.display = "none";
        return true;
    }
}

function pwd_Verify() {
    if (pwd.value.length > 7 || passwordRegex.test(pwd.value)) {
        pwd.style.border = "1px solid silver";
        pwd_error.style.display = "none";
        return true;
    }
}

// End Verify
// End Validation For Register