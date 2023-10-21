 // Grab the info from the input
        var ic = document.forms['frmaddteacher']['txtIC'];
        var fname = document.forms['frmaddteacher']['txtfname'];
        var lname = document.forms['frmaddteacher']['txtlname'];
        var uname = document.forms['frmaddteacher']['txtuname'];
        var pwd = document.forms['frmaddteacher']['txtpwd'];

        // Error detection
        var ic_error = document.getElementById('ic_error');
        var fname_error = document.getElementById('fname_error');
        var lname_error = document.getElementById('lname_error');
        var uname_error = document.getElementById('uname_error');
        var pwd_error = document.getElementById('pwd_error');
        
        ic.addEventListener('input', ic_Verify);
        fname.addEventListener('input', fname_Verify);
        lname.addEventListener('input', lname_Verify);
        uname.addEventListener('input', uname_Verify);
        pwd.addEventListener('input', pwd_Verify);
        

        // Validation 
        function validated() {
            // Start IC Detection
            if (ic.value.length < 12) {
                ic.style.border = "1px solid red";
                ic_error.style.display = "block";
                ic.focus();
                return false;
            }
            // End IC Detection

            // Start First Name Detection
            if (fname.value.length == null || fname.value.length == "") {
                fname.style.border = "1px solid red";
                fname_error.style.display = "block";
                fname.focus();
                return false;
            }
            // End First Name Detection

            // Start Last Name Detection
            if (lname.value.length == null || lname.value.length == "") {
                lname.style.border = "1px solid red";
                lname_error.style.display = "block";
                lname.focus();
                return false;
            }
            // End Last Name Detection

             // Start UserName Detection
            if (uname.value.length == null || uname.value.length == "") {
                uname.style.border = "1px solid red";
                uname_error.style.display = "block";
                uname.focus();
                return false;
            }
            // End UserName Detection

            // Start Password Detection
            if (pwd.value.length < 9) {
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

        function pwd_Verify() {
            if (pwd.value.length > 8) {
                pwd.style.border = "1px solid silver";
                pwd_error.style.display = "none";
                return true;
            }
        }
        // End Verify