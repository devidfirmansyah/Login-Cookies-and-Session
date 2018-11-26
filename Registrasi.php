<?php
    require 'Functions.php';

    if(isset($_POST['Registrasi']))
    {
        if(Registrasi($_POST)>0)
        {
            echo "
                <style>
                    alert('user berhasil ditambahkan');
            </style>";
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Registrasi</title>
    <style>
        label
        {
            display:block;
        }
    </style>
</head>
<body>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="./Index.php">Halaman Utama</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./tambah_data.php">Tambah Data</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./Registrasi.php">Registrasi</a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="./Logout.php">Logout</a>
    </li>
</ul>
<h1> Halaman Registrasi </h1>
<form action="" method="post">
    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <label for="password2">Konfirmasi Password :</label>
            <input type="password" name="password2" id="password2">
        </li>
        <li>
            <button type="submit" name="Registrasi">Registrasi</button>
        </li>
    </ul>
</form>
</body>
</html>