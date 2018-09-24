<?php
    require_once('koneksi.php');

    $koneksiObj = new Koneksi();
    $koneksi = $koneksiObj->getKoneksi();

    if($koneksi->connect_error){
        echo "Gagal Koneksi : ". $koneksi->connect_error;
    } 
    
    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    if($nama=='' || $username=='' || $email=='' || $password==''){
        echo "Mohon cek kembali, pastikan semua telah terisi!<br>";
        echo '<a href="add.php">kembali</a>';
        return;
    }

    $query1 = "select * from tugas where username='$username' or email='$email'";
    $count  = $koneksi->query($query1);
    if($count->num_rows > 0){
        echo "Mohon cek kembali, Username atau Email telah terdaftar!<br>";
        echo '<a href="add.php">kembali</a>';
        return;
    }

    $query = "insert into tugas (username, nama, email, password) values('$username', '$nama', '$email', '$password')";
    
    if($koneksi->query($query)===true){
        echo "<br>Data ".$nama.' berhasil disimpan';
    } else{
        echo '<br>Data gagal disimpan';
    }
    echo "<br>";
    echo "<a href='index.php'>Halaman Utama</a>";
    $koneksi->close();
?>