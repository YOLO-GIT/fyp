
function showBooks(){  
    $.ajax({
        url:"viewBooks.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showDashBoard(){  
    $.ajax({
        url:"index.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showStudent(){
    $.ajax({
        url:"viewStudents.php",
        method:"get",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showTeacher(){
    $.ajax({
        url:"viewTeachers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showTransaction(){
    $.ajax({
      url:"viewTransaction.php",
      method:"post",
      data:{record:1},
      success:function(data){
        $('.allContent-section').html(data);
      }
    });
}

function showRecord(){
    $.ajax({
        url:"viewRecord.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showReturn(){
    $.ajax({
        url:"viewReturn.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showEvent(){
    $.ajax({
        url:"viewEvent.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showReport(){
    $.ajax({
        url:"viewReport.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showStaff(){
    $.ajax({
        url:"viewStaff.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function studentDelete(id){
    $.ajax({
        url:"../controller/studentDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Student deleted');
            $('form').trigger('reset');
            showStudent();
        }
    });
}

//delete category data
function teacherDelete(id){
    $.ajax({
        url:"../controller/teacherDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Teacher deleted');
            $('form').trigger('reset');
            showTeacher();
        }
    });
}

//delete variation data
function transcDelete(id) {
    $.ajax({
        url: "../controller/deleteTransactionController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            // Record deleted successfully
            alert('Transaction Deleted');
            $('form').trigger('reset');
            showTransaction();
        }
    });
}

function returnDelete(id) {
    $.ajax({
        url: "../controller/deleteReturnController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Return Deleted');
            // Record deleted successfully
            $('form').trigger('reset');
            showReturn();
        }
    });
}

function recordDelete(id) {
    $.ajax({
        url: "../controller/deleteRecordController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Record Deleted');
            // Record deleted successfully
            $('form').trigger('reset');
            showRecord();
        }
    });
}

function reportDelete(id) {
    $.ajax({
        url: "../controller/deleteReportController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Record Deleted');
            // Record deleted successfully
            $('form').trigger('reset');
            showReport();
        }
    });
}

function staffDelete(id) {
    $.ajax({
        url: "../controller/deleteStaffController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Staff Deleted');
            // Record deleted successfully
            $('form').trigger('reset');
            showStaff();
        }
    });
}

function eventDelete(id) {
    $.ajax({
        url: "../controller/deleteEventController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Event Deleted');
            // Record deleted successfully
            $('form').trigger('reset');
            showEvent();
        }
    });
}

function bookUpdate(id){
  $.ajax({
        url:"../adminView/editBookForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//update variation after submit
function updateBook() {
    var v_id = $('#v_id').val();
    var qty = $('#qty').val();
    var isbn = $('#isbn').val();
    var author = $('#author').val();
    var publish = $('#publish').val();
    var dewey = $('#dewey').val();
    var desc = $('#desc').val();
    var category = $('#category').val();
    var language = $('#language').val();
    var illustration = $('#illustration').val();
    var info1 = $('#info1').val();
    var info2 = $('#info2').val();
    var info3 = $('#info3').val();
    var condition = $('#condition').val();
    var gmbr = $('#gmbr')[0].files[0]; // Get the file object

    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('qty', qty);
    fd.append('isbn', isbn);
    fd.append('author', author);
    fd.append('publish', publish);
    fd.append('dewey', dewey);
    fd.append('desc', desc);
    fd.append('category', category);
    fd.append('language', language);
    fd.append('illustration', illustration);
    fd.append('info1', info1);
    fd.append('info2', info2);
    fd.append('info3', info3);
    fd.append('condition', condition);
    fd.append('gmbr', gmbr);

    $.ajax({
        url: '../controller/updateBookController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Update Success.');
            $('form#update-Items').trigger('reset'); // Specify the form ID to reset
            showBooks();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('Error updating book. Please check the console for details.');
        }
    });
}

//delete category data
function bookDelete(id){
    $.ajax({
        url:"../controller/bookDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Book Successfully deleted');
            $('form').trigger('reset');
            showBooks();
        }
    });
}

function ChangeReturnStatus(id){
    $.ajax({
       url:"../controller/updateBookStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Status updated successfully');
           $('form').trigger('reset');
           showReturn();
       }
   });
}

function myFunction() {
  var x = document.getElementById("myInputPWD");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

var isbn = document.querySelector('#isbn');

isbn.addEventListener('keyup', function (e) {
    if (
        event.key !== 'Backspace' &&
        (isbn.value.length === 3 ||
            isbn.value.length === 7 ||
            isbn.value.length === 11 ||
            isbn.value.length === 15)
    ) {
        isbn.value += '-';
    }
});

isbn.addEventListener('paste', function (e) {
    e.preventDefault();
    var pastedText = (e.originalEvent || e).clipboardData.getData('text/plain');
    var modifiedText = pastedText
        .replace(/[^0-9]/g, '') // Remove non-numeric characters
        .slice(0, 13) // Limit to 13 characters
        .replace(/(\d{3})(\d{1,3})?(\d{1,3})?(\d{1,3})?(\d{1})?/, function (match, p1, p2, p3, p4, p5) {
            // Add hyphens at appropriate positions
            var parts = [p1, p2, p3, p4, p5].filter(Boolean);
            return parts.join('-');
        });
    isbn.value = modifiedText;
});

//Validtion Code For Inputs

function showInput(select) {
    var selectedValue = select.value;
    var otherCategoryInput = document.getElementById("otherCategoryInput");
    if (selectedValue === "Other") {
        otherCategoryInput.style.display = "block";
    } else {
        otherCategoryInput.style.display = "none";
    }
}

// Show Password
function myFunction() {
  var x = document.getElementById("myInputPWD");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


// End Custom JScript