<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<?php
			$this->load->view('navbar/header');
		?>
		<a href="<?php echo base_url('Feedback'); ?>"><button class="btn btn-warning">Back</button></a>
		<br>
		
		<table class="table table-striped" style="width: 100%;">
	  	<thead class="thead-dark">
	    	<tr>
	      	<th scope="col">No</th>
	      	<th scope="col">NIK</th>
	      	<th scope="col">Untuk</th>
	      	<th scope="col">Kritik/Saran</th>
	      	<th scope="col">Biaya_Feedback</th>
	      	<th scope="col">Waktu FeedBack</th>
	      	<th scope="col">Option</th>
	    	</tr>
	  	</thead>
	  	<tbody>
	  		<?php 
		  		$no = 1;
		  		foreach($lihat_guest as $a){
		  	?>
	    	<tr>
	      	<td><?php echo $no++; ?></td>
	      	<td hidden><?php echo $a->id_feedback; ?></td>
	      	<td><?php echo $a->nik; ?></td>
	      	<td><?php echo $a->untuk; ?></td>
	      	<td>
	      		<?php $limit = $a->kritik_saran; ?>
	      		<?php echo word_limiter($limit, 5); ?>
	      	</td>
	      	<td><?php echo $a->biaya_feedback; ?></td>
	      	<td><?php echo $a->waktu_feedback; ?></td>
	      	<td><a href="<?php echo site_url("lihat_data_feedback_guest/lihat_feedback/$a->id_feedback")?>"><button class="btn btn-info">Lihat</button></a></td>
	    	</tr>
	  	</tbody>
		  	<?php 
				}
			?>
		</table>

		<?php
			$this->load->view('navbar/footer');
		?>
	</div>
	
</body>
</html>