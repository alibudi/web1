
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Aplikasi CRUD</title>
    
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/datepicker.min.css" rel="stylesheet">
    
    <!-- styles -->
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
<?php
    require_once('koneksi.php');

    if($_GET['id']!=null){
        $id = $_GET['id'];

        $koneksiObj = new Koneksi();
        $koneksi = $koneksiObj->getKoneksi();

        if($koneksi->connect_error){
            echo "Gagal Koneksi : ". $koneksi->connect_error;
        }

        $query = "select * from tugas where id='$id'";
        $data = $koneksi->query($query);

    }
?>


<body>
<?php
    include_once('template/header.php');
?>    
    <?php
        if($data->num_rows <= 0){
            echo "Data tidak ditemukan";
        } else{
            while($row = $data->fetch_assoc()){
                $id         = $row['id'];
                $username   = $row['username'];
                $nama       = $row['nama'];
                $email      = $row['email'];
                $password   = $row['password'];
            }
        }
    ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
        <h3><i class="fa fa-pencil"></i> Form Edit Data</h3>
        </div>
        <hr>
            <div class="panel panel-default">
                <div class="panel-body">
        <form class="form-horizontal" method="post" action="update.php">

            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">

          <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama;?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" value="<?php echo $username;?>" required>
                </div>
            </div>

            
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email" value="<?php echo $email;?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" value="<?php echo $password;?>" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
            </form>
                </div>
            </div>
        </div>
    </div>
        <footer class="footer">
      <div class="container-fluid">
        <p class="text-muted pull-left">ali budi purnomo</p>
        <p class="text-muted pull-right ">Kelas  <a href="" target="_blank">5 C</a></p>
      </div>
    </footer>
</div>

</body>
<?php
    include_once('template/script.php');
?>
</html>

