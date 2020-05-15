<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan Universitas Bina Insan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Raleway", sans-serif
        }

        body {
            background-image: url('img/nami/nami.png');
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body class="w3-white">

    <div class="w3-container w3-margin-bottom w3-text-white w3-large">
        <h2 class="w3-center">Daftar Admin</h2>
        <div class="w3-row w3-cell-middle w3-center">
            <div class="w3-card-4 w3-white w3-col m3 s11 w3-margin-top w3-padding w3-margin-left">
                <p class="w3-center">Andri Gautama</p>
                <img src="img/um.png" alt="" height="300px"><br>
                <i class="fa fa-instagram fa-fw w3-margin-top"></i> <a href="https://instagram.com/" target="_blank">@</a><br>
                <i class="fa fa-whatsapp fa-fw w3-margin-top"></i> <a href="">0831-7401-8538</a>
            </div>
            <div class="w3-card-4 w3-white w3-col m3 s11 w3-margin-top w3-padding w3-margin-left">
                <p class="w3-center">M. Shalahudin R.</p>
                <img src="img/um.png" alt="" height="300px"><br>
                <i class="fa fa-instagram fa-fw w3-margin-top"></i> <a href="https://instagram.com/" target="_blank">@</a><br>
                <i class="fa fa-whatsapp fa-fw w3-margin-top"></i> <a href="">0812-5043-0082</a>
            </div>
            <div class="w3-card-4 w3-white w3-col m3 s11 w3-margin-top w3-margin-left w3-padding">
                <p class="w3-center">Teddy Nanta</p>
                <img src="img/nganulo.png" alt="" height="300px"><br>
                <i class="fa fa-instagram fa-fw w3-margin-top"></i> <a href="https://instagram.com/_teddyn" target="_blank">@_teddyn</a><br>
                <i class="fa fa-whatsapp fa-fw w3-margin-top"></i> <a href="">0821-3379-9648</a>
            </div>
            <div class="w3-card-4 w3-white w3-col m3 s11 w3-margin-top w3-padding w3-margin-left">
                <p class="w3-center">Tri Budi L.</p>
                <img src="img/um.png" alt="" height="300px"><br>
                <i class="fa fa-instagram fa-fw w3-margin-top"></i> <a href="https://instagram.com/" target="_blank">@</a><br>
                <i class="fa fa-whatsapp fa-fw w3-margin-top"></i> <a href="">0852-1772-8785</a>
            </div>
            <div class="w3-card-4 w3-white w3-col m3 s11 w3-margin-top w3-padding w3-margin-left">
                <p class="w3-center">Wahyu Fajar S.</p>
                <img src="img/um.png" alt="" height="300px"><br>
                <i class="fa fa-instagram fa-fw w3-margin-top"></i> <a href="https://instagram.com/" target="_blank">@</a><br>
                <i class="fa fa-whatsapp fa-fw w3-margin-top"></i> <a href="">0857-2899-3664</a>
            </div>
            <div class="w3-card-4 w3-white w3-col m3 s11 w3-margin-top w3-padding w3-margin-left">
                <p class="w3-center">Yogie Wahyu H.</p>
                <img src="img/um.png" alt="" height="300px"><br>
                <i class="fa fa-instagram fa-fw w3-margin-top"></i> <a href="https://instagram.com/" target="_blank">@</a><br>
                <i class="fa fa-whatsapp fa-fw w3-margin-top"></i> <a href="">0895-1054-6323</a>
            </div>
        </div>
    </div>

</body>

</html>