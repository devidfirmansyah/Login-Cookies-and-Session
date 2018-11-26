<?php
    session_start();
    if(!isset($_SESSION["Login"]))
    {
        echo $_SESSION["Login"];
        header("Location:Login.php");
        exit;
    }
    require 'Functions.php';
    //cek apakah button submit sudah diklik atau belum
    if(isset($_POST['submit']))
    {
        //cek isi dari post menggunakan vardump
        //var_dump($_POST);
        //var_dump($_FILES);
        //die();

        if(tambah_data($_POST>0))
        {
            echo "
        <script>
            alert('data berhasil disimpan');
            document.location.href='Index.php';
        </script>";
        }
    else
    {
        echo "
        <script>
            alert('data gagal disimpan');
            document.location.href='tambah_data.php';
        </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
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

    <h1><center>Tambah Data Mahasiswa</h1>
    <div class="container">
    <table class="table table-grey">
    <thead>
    <form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <!-- for pada label terhubung dengan id jadi jika tabel nama diklik maka text field nama akan aktif juga -->
            <label for="Nama">Nama</label>
            <!-- untuk pengisian nama besar kecilnya harus sesuai dengan fieldnya -->
            <input type="text" name="Nama" id="Nama">
        </li>
        <li>
            <label for="Nim">Nim</label>
            <input type="text" name="Nim" id="Nim" required>
        </li>
        <li>
            <label for="Email">Email</label>
            <input type="text" name="Email" id="Email" required>
        </li>
        <li>
            <label for="Jurusan">Jurusan</label>
            <input type="text" name="Jurusan" id="Jurusan" required>
        </li>
        <li>
            <label for="Gambar">Gambar</label>
            <input type="file" name="Gambar" id="Gambar" required>
        </li>
        <li>
            <button type="submit" name="submit">Tambah</button>
        </li>
    </ul>
    </form>
</body>
</html>