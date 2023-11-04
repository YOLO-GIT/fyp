<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
    <div class="side-header">
        <img src="../assets/images/logo.png" width="120" height="120" alt="Swiss Collection">
        <h5 style="margin-top:10px;">Hello, Puan Mai</h5>
    </div>

    <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="../index.php" onclick="showDashBoard()"><i class="fa fa-home"></i> Dashboard</a>
    <a class="dropdown-btn"><i class="fa fa-caret-down"></i> Users</a>
    <div class="dropdown-container">
        <a href="../adminView/viewStudents.php" onclick="showStudent()"><i class="fa fa-users"></i> Students</a>
        <a href="../adminView/viewTeachers.php" onclick="showTeacher()"><i class="fa fa-users"></i> Teachers</a>
    </div>
    <a href="../adminView/viewBooks.php" onclick="showBooks()"><i class="fa fa-th-large"></i> Books</a>
    <a href="#productsizes" onclick="showBorrowed()"><i class="fa fa-th-list"></i> Borrowed</a>
    <a href="../adminView/" onclick="showBooking()"><i class="fa fa-list"></i> Booking</a>


</div>

<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>

<script>
    //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>