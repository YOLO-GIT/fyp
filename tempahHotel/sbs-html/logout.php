<?php
session_start();

// Destroy all session
session_destroy();

// redirect page to file "accomodation.php"
echo "<script>window.location.href='index.php';</script>";
