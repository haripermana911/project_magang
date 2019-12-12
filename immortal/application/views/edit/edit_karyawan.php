<!DOCTYPE html>
<html>
<head>
    <title>Edit Karyawan</title>
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
        <a href="<?php echo site_url('karyawan'); ?>"><button class="btn btn-warning">Back</button></a>
        <div class="card-header bg-dark text-white text-center">
            <label>Edit Karyawan</label>
        </div>
        <?php foreach($karyawan as $u){ ?>
        <div class="card-body">                      
            <form role="form" action="<?php echo base_url(). 'karyawan/update'; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>NIK</label><p>(Tidak Boleh Diedit)</p>
                    <input type="hidden" name="id_karyawan" value="<?php echo $u->id_karyawan; ?>">
                    <input type="text" name="nik" class="form-control" readonly="readonly" value="<?php echo $u->nik; ?>">
                </div>
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input value="<?php echo $u->nama_karyawan; ?>" type="text" name="nama_karyawan" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required="required">
                        <option disabled selected><-- Jenis Kelamin --></option>
                        <option value="Laki - laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control" required="required"><?php echo $u->alamat; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label><p>(Tidak Boleh Ada Spasi dan minimal 7 charakter)</p>
                    <input value="<?php echo $u->no_telepon; ?>" onkeypress="return hanyaAngka (event);" class="form-control" type="number" name="no_telepon" required="required">
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