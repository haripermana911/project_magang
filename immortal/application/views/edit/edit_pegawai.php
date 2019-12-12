<!DOCTYPE html>
<html>
<head>
    <title>Edit Pegawai</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript">
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
          return true;
        }
    </script>
</head>
<body>

<div class="container">

<?php 
    $this->load->view('navbar/menu');
?>

</div>

<div class="container-fluid" style="margin-left: 35%;">
<div class="row justify-content-center">
<div class="col-md-5">
    <div class="card">
        <a href="<?php echo site_url('pegawai'); ?>"><button class="btn btn-warning">Back</button></a>
        <div class="card-header bg-dark text-white text-center">
            <label>Edit Pegawai</label>
        </div>
        <?php foreach($pegawai as $u){ ?>
        <div class="card-body">                      
            <form role="form" action="<?php echo base_url(). 'pegawai/update'; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama_Pegawai</label>
                    <input type="hidden" name="id_pegawai" value="<?php echo $u->id_pegawai; ?>">
                    <input required="required" type="text" name="nama_pegawai" class="form-control" value="<?php echo $u->nama_pegawai; ?>">
                </div>
                <div class="form-group">
                    <label>Username</label><p>(Tidak Boleh Ada Spasi dan minimal 7 charakter)</p>
                    <input pattern="^\S+$" value="<?php echo $u->username; ?>" type="text" name="username" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>Password</label><p>(Tidak Boleh Ada Spasi dan minimal 7 charakter)</p>
                    <input pattern="^\S+$" type="password" name="password" rows="3" class="form-control" required="required" value="<?php echo $u->password; ?>">
                </div>
                <div class="form-group">
                    <label>ID_Level</label>
                    <select name="id_level" class="form-control" required="required">
                        <option disabled selected><-- ID_Level --></option>
                        <option value="1">1 (ADMIN)</option>
                        <option value="2">2 (ARD)</option>
                        <option value="3">3 (GA)</option>
                        <option value="4">4 (IT)</option>
                    </select>
                </div>
                <button onclick="return confirm('Apakah Anda Ingin Update Data Ini ?');" type="submit" class="btn btn-success">Save</button>
                <input class="btn btn-danger" type="reset" value="Reset">
            </form>
        </div>
        <?php } ?>
    </div>

</div>
</div>
</div>

</body>
</html>