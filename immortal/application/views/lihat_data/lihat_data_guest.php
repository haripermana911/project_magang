<!DOCTYPE html> 
<html>
<head>
	<title>Lihat Data <?php echo $detail->nik; ?></title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<a href="<?php echo base_url().'lihat_data_feedback_guest'; ?>"><button class="btn btn-warning">Back</button></a>
		<div class="jumbotron jumbotron-fluid" style="width: auto;">
		  <div class="container">
		    <h1 class="display-4">Feedback <?php echo $detail->nik; ?></h1>
		    <p class="lead">Kepada <?php echo $detail->untuk; ?></p>
		    <p class="lead">Waktu : <?php echo $detail->waktu_feedback; ?></p>
		    <p class="lead">Biaya Yang harus dibayar : <?php echo $detail->biaya_feedback; ?></p>
		    <p class="lead">Dengan Kritik/Saran <br><br> <?php echo $detail->kritik_saran; ?></p>
		  </div>
		</div>
	</div>
</body>
</html>