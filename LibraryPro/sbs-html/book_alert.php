<?php
session_start();

echo "<script>alert('This book cannot be booked because another user has already booked it. Please check back another day.');</script>";
echo "<script>window.location.href='booking.php';</script>";
