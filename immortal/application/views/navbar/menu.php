<div class="container">
  <div class="barnav" style="margin-left: -15px;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <?php if($this->session->userdata('akses')=='1'):?>
        <a class="navbar-brand" href="<?php echo base_url().'diagram_admin'; ?>">Dashboard</a>
      <?php elseif($this->session->userdata('akses')=='2'):?>
        <a class="navbar-brand" href="<?php echo base_url().'diagram_ard'; ?>">Dashboard</a>
      <?php elseif($this->session->userdata('akses')=='3'):?>
        <a class="navbar-brand" href="<?php echo base_url().'diagram_ga'; ?>">Dashboard</a>
      <?php elseif($this->session->userdata('akses')=='4'):?>
        <a class="navbar-brand" href="<?php echo base_url().'diagram_it'; ?>">Dashboard</a>
      <?php endif; ?>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if($this->session->userdata('akses')=='1'):?>
            <li><a href="<?php echo base_url().'diagram_admin'?>">Dashboard</a></li>
            <li><a href="<?php echo base_url().'view' ?>">Data Semua Feedback</a></li>
            <li><a href="<?php echo base_url(). 'karyawan' ?>">Data Karyawan</a></li>
            <li><a href="<?php echo base_url(). 'pegawai' ?>">Data Pegawai</a></li>
        <?php elseif($this->session->userdata('akses')=='2'):?>
            <li><a href="<?php echo base_url().'diagram_ard'?>">Dashboard</a></li>
            <li><a href="<?php echo base_url().'view_ard' ?>">Data Feedback ARD</a></li>
        <?php elseif($this->session->userdata('akses')=='3'):?>
            <li><a href="<?php echo base_url().'diagram_ga'?>">Dashboard</a></li>
            <li><a href="<?php echo base_url().'view_ga' ?>">Data Feedback GA</a></li>
        <?php elseif($this->session->userdata('akses')=='4'):?>
            <li><a href="<?php echo base_url().'diagram_it'?>">Dashboard</a></li>
            <li><a href="<?php echo base_url().'view_it' ?>">Data Feedback IT</a></li>
        <?php endif;?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a><strong>Nama : <?php echo $this->session->userdata('ses_nama');?></strong></a></li>
          <li><a href="<?php echo base_url().'login/logout'?>">Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
</div>