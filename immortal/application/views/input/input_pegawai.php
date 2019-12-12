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
                        <th scope="col">Nama_Pegawai</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">ID_Level</th>
                        <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($pegawai as $a){
                        ?>
                        <tr>
                        <td><?php echo $no++; ?></td>
                        <td hidden><?php echo $a->id_pegawai; ?></td>
                        <td><?php echo $a->nama_pegawai; ?></td>
                        <td><?php echo $a->username; ?></td>
                        <td><?php echo $a->password; ?></td>
                        <td><?php echo $a->id_level; ?></td>
                        <td>
                            <a href="<?php echo base_url('pegawai/edit_pegawai/'.$a->id_pegawai); ?>"><button class="btn btn-info">Edit</button></a>
                            <a href="<?php echo base_url('pegawai/hapus/'.$a->id_pegawai); ?>"><button class="btn btn-danger">Hapus</button></a>
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
                            <label>Tambah Pegawai</label>
                        </div>
                        <div class="card-body">
                            
                            
                            <form role="form" action="<?php echo base_url(). 'pegawai/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama_Pegawai</label>
                                    <input type="text" name="nama_pegawai" placeholder="Masukkan Nama" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Username</label><p>(Tidak Boleh Ada Spasi dan minimal 7 charakter)</p>
                                    <input type="text" pattern="^\S+$" name="username" placeholder="Username" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Password</label><p>(Tidak Boleh Ada Spasi dan minimal 7 charakter)</p>
                                    <input type="password" pattern="^\S+$" placeholder="Masukkan Password" name="password" rows="3" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Id_Level</label>
                                    <select name="id_level" class="form-control" required="required">
                                        <option disabled selected><-- ID_Level --></option>
                                        <option value="1">1 (ADMIN)</option>
                                        <option value="2">2 (ARD)</option>
                                        <option value="3">3 (GA)</option>
                                        <option value="4">4 (IT)</option>
                                    </select>
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