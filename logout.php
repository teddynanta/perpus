<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Anda Telah Logout!')</script>";
echo "<meta http-equiv ='refresh' content='2;
			url =index.php'>";
