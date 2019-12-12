<html>
<head>
    <title>Cetak PDF</title>
</head>
<body>
<h1 style="text-align: center;">Data Feedback</h1>
<table border="1" width="100%">
<tr>
    <th>No</th>
    <th>NIK</th>
    <th>Untuk</th>
    <th>Kritik/Saran</th>
    <th>Waktu Feedback</th>
</tr>
<?php
if( ! empty($feedback)){
    $no = 1;
    foreach($feedback as $data){
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$data->nik."</td>";
        echo "<td>".$data->untuk."</td>";
        echo "<td>".$data->kritik_saran."</td>";
        echo "<td>".$data->biaya_feedback."</td>";
        echo "<td>".$data->waktu_feedback."</td>";
        echo "</tr>";
    }
}
?>
</table>
</body>
</html>

