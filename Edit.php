<?php
    session_start();
    if(!isset($_SESSION["Login"]))
    {
        echo $_SESSION["Login"];
        header("Location:Login.php");
        exit;
    }
    //Menggunakan method get untuk mengambil id yang telah terseleksi oleh user dan dimasukkan
    //kedalam vaeiabel baru yaitu $id
    $ID=$_GET["ID"];
    //var_dump($id);
    require 'Functions.php';
    $mhs=query("SELECT * FROM mahasiswa WHERE ID=$ID")[0];
    //var_dump($mhs);
    //cek apakah button submit sudah diklik atau belum
    if(isset($_POST['submit']))
    {
        //cek sukses data ditambah menggunakan function pada function.php
        if(edit($_POST>0))
        {
            echo "
        <script>
            alert('data berhasil diperbaharui');
            document.location.href='Index.php';
        </script>";
        }
        else
        {
            echo "
        <script>
            alert('data gagal diperbaharui');
            document.location.href='Edit.php';
        </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Data</title>
</head>
<body>
    <h1>Update Data Mahasiswa</h1>
    <!--tambahkan atribut enctype-->
    <form action="" method="post" enctype="multipart/form-data">
    <li>
        <input type="hidden" name="ID" value="<?= $mhs["ID"] ?>">
        <input type="hidden" name="GambarLama" value="<?= $mhs["Gambar"] ?>">
    </li>
    <ul>
        <li>
            <!-- for pada label terhubung dengan id jadi jika tabel nama diklik maka text field nama akan aktif juga -->
            <label for="Nama">Nama :</label>
            <!-- untuk pengisian nama besar kecilnya harus sesuai dengan fieldnya -->
            <input type="text" name="Nama" ID="Nama" value="<?= $mhs["Nama"]; ?>" >
        </li>
        <li>
            <label for="Nim">Nim :</label>
            <input type="text" name="Nim" ID="Nim" required value="<?= $mhs["Nim"]; ?>" >
        </li>
        <li>
            <label for="Email">Email :</label>
            <input type="text" name="Email" ID="Email" required value="<?= $mhs["Email"]; ?>" >
        </li>
        <li>
            <label for="Jurusan">Jurusan :</label>
            <input type="text" name="Jurusan" ID="Jurusan" required value="<?= $mhs["Jurusan"]; ?>" >
        </li>
        <li>
            <label for="Gambar">Gambar :</label>
            <img src="Gambar/<?= $mhs[Gambar];?>" alt="" height="100" width="100"><br>
            <input type="file" name="Gambar" ID="Gambar">
        </li>
        <li>
            <button type="submit" name="submit">Update</button>
        </li>
    </ul>
    </form>
</body>
</html>