<?php
    //membuat koneksi
    $conn=mysqli_connect("localhost","root","","phpdatabase");
    //Cek koneksi
    if(!$conn)
    {
        die('Koneksi Error : '.mysqli_connect_errno()
        .' - '.mysqli_connect_error());
    }
    //ambil data dari tabel mahasiswa/query data mahasiswa
    $result=mysqli_query($conn,"SELECT * FROM mahasiswa");
    
    //function query
    function query($query_kedua)
    {
        global $conn;
        $result = mysqli_query($conn,$query_kedua);
        $rows =[];
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        return $rows;
    }

    function tambah_data($data)
    {
        global $conn;

        $nama=$_POST["Nama"];
        $nim=$_POST["Nim"];
        $email=$_POST["Email"];
        $jurusan=$_POST["Jurusan"];
        $gambar=$_POST["Gambar"];

        $query= "INSERT INTO mahasiswa VALUES
                ('','$nama','$nim','$email','$jurusan','$gambar')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }

    function Hapus($ID)
    {
        global $conn;
        mysqli_query($conn,"DELETE FROM mahasiswa WHERE ID=$ID ");
        return mysqli_affected_rows($conn);
    }

    function Edit($data)
    {
        global $conn;

        $ID=$data["ID"];
        $nama=htmlspecialchars($data["Nama"]);
        $nim=htmlspecialchars($data["Nim"]);
        $email=htmlspecialchars($data["Email"]);
        $jurusan=htmlspecialchars($data["Jurusan"]);
        $gambar=htmlspecialchars($data["Gambar"]);

        $query = "UPDATE mahasiswa SET
                    Nama = '$nama',
                    Nim = '$nim',
                    Email = '$email',
                    Jurusan = '$jurusan',
                    Gambar = '$gambar'
                    WHERE ID = $ID";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword)
    {
        $sql="SELECT * FROM mahasiswa
        WHERE
        Nama LIKE '%$keyword%' OR
        Nim LIKE '%$keyword%' OR
        Email LIKE '%$keyword%' OR
        Jurusan LIKE '%$keyword%'
        ";

        //Kembalikan ke function query dengan parameter $sql
    return query($sql);

    //cat: pastikan $keyword pada line 77 terdapat petik satu karena nilainya berupa string
    }

    function Registrasi($data)
    {
        global $conn;

        $username = strtolower(stripcslashes($data["username"]));
        $password = mysqli_real_escape_string($conn,$data["password"]);
        $password2= mysqli_real_escape_string($conn,$data["password2"]);

        $result = mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");

        if(mysqli_fetch_assoc($result))
        {
            echo "
            <script>
                alert('username sudah ada');
            </script>
            ";

            return false;
        }

        if($password!==$password2)
        {
            echo "
            <script>
                alert('password anda tidak sama');
            </script>
            ";

            return false;
        }

        $password=password_hash($password,PASSWORD_DEFAULT);

        mysqli_query($conn,"INSERT INTO users VALUES('','$username','$password')");
        return mysqli_affected_rows($conn);
    }
?>