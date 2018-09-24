
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

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/datepicker.min.css" rel="stylesheet">
    
    <!-- styles -->
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
<body>
    <?php
    include_once('template/header.php');
?>
    <div class="row">
        <div class="container-fluid">
        <div class="col-md-12">
            <div class="pager-header">
        <h3><i class="glyphicon glyphicon-edit"></i> Form Tambah Data</h3>
        </div>
        <hr>

      <div class="panel panel-default">
        <div class="panel-body">
        <form id="inputmahasiswa" class="form-horizontal" method="post" action="save.php">

          
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" required>
                </div>
            </div>

              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-4">
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </div>
            </form>
        </div>
    
    </div>
    <footer class="footer">
      <div class="container-fluid">
        <p class="text-muted pull-left">ali budi purnomo</p>
        <p class="text-muted pull-right ">Kelas  <a href="" target="_blank">5 C</a></p>
      </div>
    </footer>
    </div>
    </div>
    </div>
    
</body>
<?php
    include_once('template/script.php');
?>
<script>
    $(document).ready(function(){
        $("#nama").keyup(function(){
            $pattern = "[^a-zA-Z ]";
            if(preg_match($pattern,$string)) {
                alert("gagal");
            } else {
                alert("berhasil");
            }
        });

        $.validator.addMethod("alpha", function(value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
        });

        $("#inputmahasiswa").validate({
            rules: {
                username: "required",
                nama: {
                    required: true,
                    alpha: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                username: "Masukan username",
                nama: {
                    required: "Masukan nama",
                    alpha: "Hanya diperbolehkan huruf dan spasi"
                },
                email: "Masukan email secara valid",
                password: {
                    required: "Masukan password",
                    minlength: "Password minimal 5 karakter!"
                }
            },

            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    
</script>
</html>

