<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
	<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($karyawan as $a){
                        ?>
                        <tr>
                        <td><?php echo $no++; ?></td>
                        <td hidden><?php echo $a->id_karyawan; ?></td>
                        <td><?php echo $a->nik; ?></td>
                        <td><?php echo $a->nama_karyawan; ?></td>
                        <td><?php echo $a->jenis_kelamin; ?></td>
                        <td>
                            <?php $limit = $a->alamat; ?>
                            <?php echo word_limiter($limit, 3); ?>  
                        </td>
                        <td><?php echo $a->no_telepon; ?></td>
                        <td>
                            <a href="<?php echo base_url('karyawan/edit_karyawan/'.$a->id_karyawan); ?>"><button class="btn btn-info">Edit</button></a>
                            <a href="<?php echo base_url('karyawan/hapus/'.$a->id_karyawan); ?>"><button class="btn btn-danger">Hapus</button></a>
                        </td>
                        </tr>
                    </tbody>
                        <?php 
                            }
                        ?>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-dark text-white text-center">
                            <label>Tambah Karyawan</label>
                        </div>
                        <div class="card-body">
                            
                            
                            <form role="form" action="<?php echo base_url(). 'karyawan/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>NIK</label><p>(Tidak Boleh Ada Spasi dan minimal 7 charakter , maximal 10 charakter)</p>
                                    <input pattern="^\S+$" onkeypress="return hanyaAngka (event);" type="number" name="nik" placeholder="Masukkan NIK" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Nama Karyawan</label>
                                    <input type="text" name="nama_karyawan" placeholder="Nama Karyawan" class="form-control" required="required">
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
                                    <textarea placeholder="Masukkan Alamat Anda" name="alamat" rows="3" class="form-control" required="required"></textarea>
                                </div>
                                <div class="form-group">
                                <label>Nomor Telepon</label><p>(Tidak Boleh Ada Spasi dan minimal 12 charakter)</p>
                                <input pattern="^\S+$" onkeypress="return hanyaAngka (event);" placeholder="Masukkan Nomor Telepon Anda" class="form-control" type="number" name="no_telepon" required="required">
                            </div>
                                <button onclick="return confirm('Apakah Anda Ingin Save Data Ini ?');" type="submit" class="btn btn-success">Submit</button>
                                <input class="btn btn-danger" type="reset" value="Reset">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>