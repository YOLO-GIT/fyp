// function showProductItems(){  
//     $.ajax({
//         url:"./adminView/viewAllProducts.php",
//         method:"post",
//         data:{record:1},
//         success:function(data){
//             $('.allContent-section').html(data);
//         }
//     });
// }
function showBooks(){  
    $.ajax({
        url:"./adminView/viewBooks.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showDashBoard(){  
    $.ajax({
        url:"./index.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
// function showSizes(){  
//     $.ajax({
//         url:"./adminView/viewSizes.php",
//         method:"post",
//         data:{record:1},
//         success:function(data){
//             $('.allContent-section').html(data);
//         }
//     });
// }
function showBorrowed(){  
    $.ajax({
        url:"./adminView/viewBorrowed.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showStudent(){
    $.ajax({
        url:"./adminView/viewStudents.php",
        method:"get",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showTeacher(){
    $.ajax({
        url:"./adminView/viewTeachers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function teacherUpdate(id){
  $.ajax({
        url:"../adminView/editTeacherForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//update variation after submit
function updateTeacher(){
    var v_id = $('#v_id').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('qty', qty);
   
    $.ajax({
      url:'../controller/updateTeacherController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Update Success.');
        $('form').trigger('reset');
        showBorrowed();
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
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showBooks();
        }
    });
}

function showOrders(){
    $.ajax({
        url:"./adminView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function variationEditForm1(id){
  $.ajax({
        url:"./adminView/editBookingForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//update variation after submit
function updateVariations1(){
    var v_id = $('#v_id').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('qty', qty);
   
    $.ajax({
      url:'./controller/updateOrderStatus.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Update Success.');
        $('form').trigger('reset');
        showBorrowed();
      }
    });
}

//delete variation data
function variationDelete1(id){
    $.ajax({
        url:"./controller/deleteVariationController1.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showBorrowed();
        }
    });
}

//add product data
// function addItems(){
//     var p_name=$('#p_name').val();
//     var p_desc=$('#p_desc').val();
//     var p_price=$('#p_price').val();
//     var category=$('#category').val();
//     var upload=$('#upload').val();
//     var file=$('#file')[0].files[0];

//     var fd = new FormData();
//     fd.append('p_name', p_name);
//     fd.append('p_desc', p_desc);
//     fd.append('p_price', p_price);
//     fd.append('category', category);
//     fd.append('file', file);
//     fd.append('upload', upload);
//     $.ajax({
//         url:"./controller/addItemController.php",
//         method:"post",
//         data:fd,
//         processData: false,
//         contentType: false,
//         success: function(data){
//             alert('Product Added successfully.');
//             $('form').trigger('reset');
//             showProductItems();
//         }
//     });
// }

//edit product data
// function itemEditForm(id){
//     $.ajax({
//         url:"./adminView/editItemForm.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             $('.allContent-section').html(data);
//         }
//     });
// }

//update product after submit
// function updateItems(){
//     var product_id = $('#product_id').val();
//     var p_name = $('#p_name').val();
//     var p_desc = $('#p_desc').val();
//     var p_price = $('#p_price').val();
//     var category = $('#category').val();
//     var existingImage = $('#existingImage').val();
//     var newImage = $('#newImage')[0].files[0];
//     var fd = new FormData();
//     fd.append('product_id', product_id);
//     fd.append('p_name', p_name);
//     fd.append('p_desc', p_desc);
//     fd.append('p_price', p_price);
//     fd.append('category', category);
//     fd.append('existingImage', existingImage);
//     fd.append('newImage', newImage);
   
//     $.ajax({
//       url:'./controller/updateItemController.php',
//       method:'post',
//       data:fd,
//       processData: false,
//       contentType: false,
//       success: function(data){
//         alert('Data Update Success.');
//         $('form').trigger('reset');
//         showProductItems();
//       }
//     });
// }

//delete product data
// function itemDelete(id){
//     $.ajax({
//         url:"./controller/deleteItemController.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             alert('Items Successfully deleted');
//             $('form').trigger('reset');
//             showProductItems();
//         }
//     });
// }


//delete cart data
// function cartDelete(id){
//     $.ajax({
//         url:"./controller/deleteCartController.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             alert('Cart Item Successfully deleted');
//             $('form').trigger('reset');
//             showMyCart();
//         }
//     });
// }

// function eachDetailsForm(id){
//     $.ajax({
//         url:"./view/viewEachDetails.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             $('.allContent-section').html(data);
//         }
//     });
// }


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
function updateBook(){
    var v_id = $('#v_id').val();
    var qty = $('#qty').val();
    var gmbr = $('#gmbr')[0].files[0]; // Get the file object
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('qty', qty);
    fd.append('gmbr', gmbr);
   
    $.ajax({
      url:'../controller/updateBookController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Update Success.');
        $('form').trigger('reset');
        showBorrowed();
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
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showBooks();
        }
    });
}

//delete size data
// function sizeDelete(id){
//     $.ajax({
//         url:"./controller/deleteSizeController.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             alert('Size Successfully deleted');
//             $('form').trigger('reset');
//             showSizes();
//         }
//     });
// }


//delete variation data
function variationDelete(id){
    $.ajax({
        url:"./controller/deleteVariationController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showBorrowed();
        }
    });
}

//edit variation data
function variationEditForm(id){
    $.ajax({
        url:"./adminView/editBorrowedForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


//update variation after submit
function updateVariations(){
    var v_id = $('#v_id').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('qty', qty);
   
    $.ajax({
      url:'./controller/updateVariationController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Update Success.');
        $('form').trigger('reset');
        showBorrowed();
      }
    });
}
// function search(id){
//     $.ajax({
//         url:"./controller/searchController.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             $('.eachCategoryProducts').html(data);
//         }
//     });
// }


// function quantityPlus(id){ 
//     $.ajax({
//         url:"./controller/addQuantityController.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             $('form').trigger('reset');
//             showMyCart();
//         }
//     });
// }
// function quantityMinus(id){
//     $.ajax({
//         url:"./controller/subQuantityController.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             $('form').trigger('reset');
//             showMyCart();
//         }
//     });
// }

// function checkout(){
//     $.ajax({
//         url:"./view/viewCheckout.php",
//         method:"post",
//         data:{record:1},
//         success:function(data){
//             $('.allContent-section').html(data);
//         }
//     });
// }


// function removeFromWish(id){
//     $.ajax({
//         url:"./controller/removeFromWishlist.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             alert('Removed from wishlist');
//         }
//     });
// }


// function addToWish(id){
//     $.ajax({
//         url:"./controller/addToWishlist.php",
//         method:"post",
//         data:{record:id},
//         success:function(data){
//             alert('Added to wishlist');        
//         }
//     });
// }

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

function myFunction() {
  var x = document.getElementById("myInputPWD");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

var isbn = document.querySelector('#isbn');

isbn.addEventListener('keyup', function(e) {
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

isbn.addEventListener('paste', function(e) {
  e.preventDefault();
  var pastedText = (e.originalEvent || e).clipboardData.getData('text/plain');
  var modifiedText = pastedText
    .replace(/[^0-9]/g, '') // Remove non-numeric characters
    .slice(0, 13) // Limit to 13 characters
    .replace(/(\d{3})(\d{1,3})?(\d{1,3})?(\d{1,4})?/, function(match, p1, p2, p3, p4) {
      // Add hyphens at appropriate positions
      var parts = [p1, p2, p3, p4].filter(Boolean);
      return parts.join('-');
    });
  isbn.value = modifiedText;
});

// End Custom JScript