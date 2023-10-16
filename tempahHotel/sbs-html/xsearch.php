<?php
        include 'conn.php';
        $sql = "SELECT * from tblbook";
        $result = $con->query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="card_book mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="images/loading.gif">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">Tajuk Buku:&nbsp;&nbsp;<?= $row["book_title"] ?></h2>
                                <table>
                                    <tr>
                                        <td class="bold-text">Pengarang:&nbsp;&nbsp;<?= $row["book_author"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">No. ISBN:&nbsp;&nbsp;<?= $row["book_ISBN"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Pengeluar:&nbsp;&nbsp;<?= $row["publisher"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">No. Dewey:&nbsp;&nbsp;<?= $row["book_dewey"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Kategori:&nbsp;&nbsp;<?= $row["book_category"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Sinopsis Buku:&nbsp;&nbsp;<?= $row["book_desc"] ?></td>
                                    </tr>
                                    <tr>
                                        <td><br><br><a href="#" class="btn btn-primary">Booking</a>&nbsp;&nbsp;<a href="#" class="btn btn-primary">Borrowing</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
                $count = $count + 1;
            }

            mysqli_close($con);
        }
        ?>