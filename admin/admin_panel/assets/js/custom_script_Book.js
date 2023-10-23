 // Grab the info from the input
        var perolehan = document.forms['frmAddBooks']['txtnoperolehan'];
        var judul = document.forms['frmAddBooks']['txttitle'];
        var pengarang = document.forms['frmAddBooks']['txtauthor'];
        var isbn = document.forms['frmAddBooks']['txtISBN'];
        var penerbit = document.forms['frmAddBooks']['txtpublisher'];
        var dewey = document.forms['frmAddBooks']['txtdewey'];
        var sinopsis = document.forms['frmAddBooks']['txtdescription'];

        // Error detection
        var perolehan_error = document.getElementById('perolehan_error');
        var judul_error = document.getElementById('judul_error');
        var pengarang_error = document.getElementById('pengarang_error');
        var isbn_error = document.getElementById('isbn_error');
        var penerbit_error = document.getElementById('penerbit_error');
        var dewey_error = document.getElementById('dewey_error');
        var sinopsis_error = document.getElementById('sinopsis_error');
        
        perolehan.addEventListener('input', perolehan_Verify);
        judul.addEventListener('input', judul_Verify);
        pengarang.addEventListener('input', pengarang_Verify);
        isbn.addEventListener('input', isbn_Verify);
        penerbit.addEventListener('input', penerbit_Verify);
        dewey.addEventListener('input', dewey_Verify);
        sinopsis.addEventListener('input', sinopsis_Verify);
        

        // Validation 
        function validated() {
            // Start perolehan Detection
            if (perolehan.value.length < 5) {
                perolehan.style.border = "1px solid red";
                perolehan_error.style.display = "block";
                perolehan.focus();
                return false;
            }
            // End perolehan Detection
            
            // Start Judul Detection
            if (judul.value.length == "" || judul.value.length == null) {
                judul.style.border = "1px solid red";
                judul_error.style.display = "block";
                judul.focus();
                return false;
            }
            // End Judul Detection

            // Start Pengarang Detection
            if (pengarang.value.length == "" || pengarang.value.length == null) {
                pengarang.style.border = "1px solid red";
                pengarang_error.style.display = "block";
                pengarang.focus();
                return false;
            }
            // End Pengarang Detection

            // Start ISBN Detection
            if (isbn.value.length < 16) {
                isbn.style.border = "1px solid red";
                isbn_error.style.display = "block";
                isbn.focus();
                return false;
            }
            // End ISBN Detection

            // Start Penerbit Detection
            if (penerbit.value.length == "" || penerbit.value.length == null) {
                penerbit.style.border = "1px solid red";
                penerbit_error.style.display = "block";
                penerbit.focus();
                return false;
            }
            // End Penerbit Detection

            // Start Dewey Detection
            if (dewey.value.length == "" || dewey.value.length == null) {
                dewey.style.border = "1px solid red";
                dewey_error.style.display = "block";
                dewey.focus();
                return false;
            }
            // End Dewey Detection

            // Start Sinopsis Detection
            if (sinopsis.value.length == "" || penerbit.value.length == null) {
                sinopsis.style.border = "1px solid red";
                sinopsis_error.style.display = "block";
                sinopsis.focus();
                return false;
            }
            // End Sinopsis Detection
        }

        // Start Verify
        function perolehan_Verify() {
            if (perolehan.value.length > 4) {
                perolehan.style.border = "1px solid silver";
                perolehan_error.style.display = "none";
                return true;
            }
        }

        function judul_Verify() {
            if (judul.value.length > 1) {
                judul.style.border = "1px solid silver";
                judul_error.style.display = "none";
                return true;
            }
        }

        function pengarang_Verify() {
            if (pengarang.value.length > 1) {
                pengarang.style.border = "1px solid silver";
                pengarang_error.style.display = "none";
                return true;
            }
        }

        function isbn_Verify() {
            if (isbn.value.length > 15) {
                isbn.style.border = "1px solid silver";
                isbn_error.style.display = "none";
                return true;
            }
        }

        function penerbit_Verify() {
            if (penerbit.value.length > 1) {
                penerbit.style.border = "1px solid silver";
                penerbit_error.style.display = "none";
                return true;
            }
        }

        function dewey_Verify() {
            if (dewey.value.length > 1) {
                dewey.style.border = "1px solid silver";
                dewey_error.style.display = "none";
                return true;
            }
        }

        function sinopsis_Verify() {
            if (sinopsis.value.length > 1) {
                sinopsis.style.border = "1px solid silver";
                sinopsis_error.style.display = "none";
                return true;
            }
        }
        // End Verify