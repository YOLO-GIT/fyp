// Grab the info from the input
var perolehan = document.forms['frmAddBooks']['txtnoperolehan'];
var judul = document.forms['frmAddBooks']['txttitle'];
var pengarang = document.forms['frmAddBooks']['txtauthor'];
var isbn = document.forms['frmAddBooks']['txtISBN'];
var penerbit = document.forms['frmAddBooks']['txtpublisher'];
var dewey = document.forms['frmAddBooks']['txtdewey'];
var category = document.forms['frmAddBooks']['cbokategori'];
var sinopsis = document.forms['frmAddBooks']['txtdescription'];
var language = document.forms['frmAddBooks']['cbolanguage'];
var illustration = document.forms['frmAddBooks']['cboillustrasi']
var condition = document.forms['frmAddBooks']['cboistatus']
var imageInput = document.forms['frmAddBooks']['my_image'];

// Error detection
var perolehan_error = document.getElementById('perolehan_error');
var judul_error = document.getElementById('judul_error');
var pengarang_error = document.getElementById('pengarang_error');
var isbn_error = document.getElementById('isbn_error');
var penerbit_error = document.getElementById('penerbit_error');
var dewey_error = document.getElementById('dewey_error');
var category_error = document.getElementById('category_error');
var sinopsis_error = document.getElementById('sinopsis_error');
var language_error = document.getElementById('language_error');
var illustartion_error = document.getElementById('illustartion_error');
var condition_error = document.getElementById('condition_error');
var imageError = document.getElementById('image_error');


perolehan.addEventListener('input', perolehan_Verify);
judul.addEventListener('input', judul_Verify);
pengarang.addEventListener('input', pengarang_Verify);
isbn.addEventListener('input', isbn_Verify);
penerbit.addEventListener('input', penerbit_Verify);
dewey.addEventListener('input', dewey_Verify);
sinopsis.addEventListener('input', sinopsis_Verify);
category.addEventListener('change', category_Verify);
language.addEventListener('change', language_Verify);
illustration.addEventListener('change', illustration_Verify);
condition.addEventListener('change', condition_Verify)
imageInput.addEventListener('change', imageVerify);

var perolehanRegex = /^\d{5}$/;
var pengarangRegex = /^[A-Za-z\s]+$/;
var penerbitRegex = /^[A-Za-z\s]+$/;
// var isbnValue = isbn.value.replace(/-/g, ''); // Remove hyphens for validation
var isbnRegex = /^\d{3}-\d{3}-\d{3}-\d{3}-\d{1}$|^\d{3}-\d{2,5}-\d{1,7}-\d{1,9}-\d{1}$/;
var deweyRegex = /^[A-Z0-9. ]+$|^\d+[A-Z\s]+$/;



// Validation 
function validated() {
    // Start perolehan Detection
    if (perolehan.value.length < 5 || !perolehanRegex.test(perolehan.value)) {
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
    if (pengarang.value.length == "" || !pengarangRegex.test(pengarang.value)) {
        pengarang.style.border = "1px solid red";
        pengarang_error.style.display = "block";
        pengarang.focus();
        return false;
    }
    // End Pengarang Detection

    // Start ISBN Detection
    if (isbn.value.length < 16 || !isbnRegex.test(isbn.value)) {
        isbn.style.border = "1px solid red";
        isbn_error.style.display = "block";
        isbn.focus();
        return false;
    }
    // End ISBN Detection

    // Start Penerbit Detection
    if (penerbit.value.length == "" || !penerbitRegex.test(penerbit.value)) {
        penerbit.style.border = "1px solid red";
        penerbit_error.style.display = "block";
        penerbit.focus();
        return false;
    }
    // End Penerbit Detection

    // Start Dewey Detection
    if (dewey.value.length == "" || !deweyRegex.test(dewey.value)) {
        dewey.style.border = "1px solid red";
        dewey_error.style.display = "block";
        dewey.focus();
        return false;
    }
    // End Dewey Detection

    // Start Category Detection
    if (category.value === "") {
        category.style.border = "1px solid red";
        category_error.style.display = "block";
        category.focus();
        return false;
    }
    // End Category Detection

    // Start Sinopsis Detection
    if (sinopsis.value.length == "" || penerbit.value.length == null) {
        sinopsis.style.border = "1px solid red";
        sinopsis_error.style.display = "block";
        sinopsis.focus();
        return false;
    }
    // End Sinopsis Detection

    // Start Language Detection
    if (language.value === "") {
        language.style.border = "1px solid red";
        language_error.style.display = "block";
        language.focus();
        return false;
    }
    // End Language Detection

    // Start Illustration Detection
    if (illustration.value === "") {
        illustration.style.border = "1px solid red";
        illustartion_error.style.display = "block";
        illustration.focus();
        return false;
    }
    // End Illustration Detection

    // Start Condition Detection
    if (condition.value === "") {
        condition.style.border = "1px solid red";
        condition_error.style.display = "block";
        condition.focus();
        return false;
    }
    // End Condition Detection

    // Start Image Detection
    if (imageInput.files.length === 0) {
        imageError.style.display = "block";
        return false;
    }
    // End Image Detection

    return true;
}

// Start Verify
function perolehan_Verify() {
    if (perolehan.value.length > 4 || perolehanRegex.test(perolehan.value)) {
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
    if (pengarang.value.length > 1 || pengarangRegex.test(pengarang.value)) {
        pengarang.style.border = "1px solid silver";
        pengarang_error.style.display = "none";
        return true;
    }
}

function isbn_Verify() {
    if (isbn.value.length > 15 || isbnRegex.test(isbn.value)) {
        isbn.style.border = "1px solid silver";
        isbn_error.style.display = "none";
        return true;
    }
}

function penerbit_Verify() {
    if (penerbit.value.length > 1 || penerbitRegex.test(penerbit.value)) {
        penerbit.style.border = "1px solid silver";
        penerbit_error.style.display = "none";
        return true;
    }
}

function dewey_Verify() {
    if (dewey.value.length > 1 || deweyRegex.test(dewey.value)) {
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

function category_Verify() {
    if (category.value !== "") {
        category.style.border = "1px solid silver";
        category_error.style.display = "none";
        return true;
    }
}

function language_Verify() {
    if (language.value !== "") {
        language.style.border = "1px solid silver";
        language_error.style.display = "none";
        return true;
    }
}

function illustration_Verify() {
    if (illustration.value !== "") {
        illustration.style.border = "1px solid silver";
        illustartion_error.style.display = "none";
        return true;
    }
}

function condition_Verify() {
    if (condition.value !== "") {
        condition.style.border = "1px solid silver";
        condition_error.style.display = "none";
        return true;
    }
}

function imageVerify() {
    if (imageInput.files.length > 0) {
        imageError.style.display = "none";
        return true;
    }
}
// End Verify