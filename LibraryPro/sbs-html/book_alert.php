<?php
session_start();

echo "<script>alert('Buku ini tidak boleh dibooking kerana ada pengguna lain telah booking. Sila check semula pada hari lain.');</script>";
echo "<script>window.location.href='booking.php';</script>";
