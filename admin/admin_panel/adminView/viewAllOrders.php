<div>
  <h2>Booking List</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">User</th>
        <th class="text-center">Book Title</th>
        <th class="text-center">Status</th>
        <th class="text-center">Update</th>
        <th class="text-center">Remove</th>
        <!-- <th class="text-center" colspan="2">Action</th> -->
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * from tblstudent s, tblbooking b, tbltransaction t, tblbook bb WHERE s.stud_ID=t.stud_ID AND b.booking_ID=t.booking_ID AND  b.book_ID = bb.book_ID";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?= $count ?></td>
          <td><?= $row["stud_Name"] ?></td>
          <td><?= $row["book_title"] ?></td>
          <td><?= $row["transc_name"] ?></td>
          <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm1('<?= $row['transc_ID'] ?>')">Edit</button></td>
          <td><button class="btn btn-danger" style="height:40px" onclick="variationDelete1('<?= $row['transc_ID'] ?>')">Delete</button></td>
        </tr>
    <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>
</div>