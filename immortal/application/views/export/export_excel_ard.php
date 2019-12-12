<h1>Data Feedback ARD</h1><hr>
<table border="1" cellpadding="8">
<tr>
  <th>No</th>
  <th>NIK</th>
  <th>Untuk</th>
  <th>Kritik/Saran</th>
  <th>Waktu Feedback</th>
</tr>
<?php
$no = 1;
if( ! empty($feedback_ard)){
  foreach($feedback_ard as $data){
    echo "<tr>";
    echo "<td>".$no++."</td>";
    echo "<td>".$data->nik."</td>";
    echo "<td>".$data->untuk."</td>";
    echo "<td>".$data->kritik_saran."</td>";
    echo "<td>".$data->biaya_feedback."</td>";
    echo "<td>".$data->waktu_feedback."</td>";
    echo "</tr>";
  }
}else{
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
