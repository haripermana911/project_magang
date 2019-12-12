<html>  
 <head>  
   <title><?= $title; ?></title>  
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
      <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
 </head>  
 <body>  
      <div class="container">
        <?php 
          $this->load->view('navbar/menu');
        ?>
      </div>

      <div class="container">
        <h3><?= $title; ?></h3>
        <br />
       
        <a href="<?php echo base_url("/Excel_semua_feedback/export"); ?>"><button class="btn btn-success">Export ke Excel</button></a>
        <a href="<?php echo base_url('/Pdf_feedback/cetak'); ?>"><button class="btn btn-danger">Export ke PDF</button></a>
        <table id="table" class="display-responsive" cellspacing="0" style="width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID_Feedback</th>
                    <th>NIK</th>
                    <th>Untuk</th>
                    <th>Kritik/Saran</th>
                    <th>Biaya_feedback</th>
                    <th>Waktu_Feedback</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>ID_Feedback</th>
                    <th>NIK</th>
                    <th>Untuk</th>
                    <th>Kritik/Saran</th>
                    <th>Waktu_Feedback</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>

        <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
         
         
        <script type="text/javascript">
            var table;
            $(document).ready(function() {
                table = $('#table').DataTable({ 
                    
                    "processing": true, 
                    "serverSide": true, 
                    "order": [], 
                     
                    "ajax": {
                        "url": "<?php echo site_url('view/get_data_feedback')?>",
                        "type": "POST"
                    },
                    
                     "aLengthMenu": [[5, 10, 25, 50],[ 5, 10, 25, 50]],
                     
                    "columnDefs": [
                    {
                        "targets": [ 0 , 6], 
                        "orderable": false, 
                    },
                    ],
         
                });
         
            });
         
        </script>

    </div>

 </body>  
 </html>  