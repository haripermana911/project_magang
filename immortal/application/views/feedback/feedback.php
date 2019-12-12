<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php 
            $this->load->view('navbar/header');
        ?>
    </div>
	<div class="container-fluid" style="width: 430px;">
            <div class="row justify-content-center my-3">
                <div class="col">
                    <div class="card" style="margin-left: -8px;">
                        <div class="card-header bg-dark text-white text-center">
                            <?= $title; ?>
                        </div>
                        <div class="card-body">
                            
                            
                            <form role="form" action="<?php echo base_url(); ?>feedback/insert" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>NIK</label>     
                                    <select name="nik" class="form-control" required="required">
                                        <option disabled selected><-- Pilih NIK Anda --></option>
                                        <?php 
                                            foreach ($dataku->result() as $tabel) {
                                                echo "<option value='.$tabel->nik.'>".$tabel->nik." || ".$tabel->nama_karyawan." || ".$tabel->jenis_kelamin." || ".$tabel->alamat." || ".$tabel->no_telepon. "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Untuk / To</label>
                                    <select name="untuk" class="form-control" required="required">
                                        <option disabled selected><-- Ditujukan Untuk Siapa ? --></option>
                                        <option>ARD</option>
                                        <option>GA</option>
                                        <option>IT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kritik/Saran</label>
                                    <textarea required="required" placeholder="Silahkan Berkritik/Saran" name="kritik_saran" rows="3" class="form-control"></textarea>
                                </div>
                                    <div class="form-group">
                                        <label>Biaya untuk feedback</label> <br>
                                        <p>Pajak = 10%</p>
                                        <hr>
                                        jika total pembayaran sudah keluar dan sudah melakukan feedback silahkan melakukan pembayaran di Pos Satpam Kami
                                        <input id="nominal" required="required" placeholder="Masukkan nominal Anda" class="form-control" type="number" name="biaya_feedback">
                                    </div>
                                <button onclick="return confirm('Apakah Anda Ingin Save Data Ini ?');" type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="container">
            <?php 
                $this->load->view('navbar/footer');
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>