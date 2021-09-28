<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      <?php
        if ($userdata->jenis_user == 1) {
        ?>

      <li class="treeview <?php if($page=='Master'){echo "active";} ?>">
        <a href="">
          <i class="fa fa-gears"></i> 
          <span>Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          
          <li <?php if($subpage=='Tipe Berita'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/tipe_berita/"><i class="fa fa-angle-right"></i> Tipe Berita</a>
          </li>
          <li <?php if($subpage=='Jenis User'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/jenis_user/"><i class="fa fa-angle-right"></i> Jenis User</a>
          </li>
          <li <?php if($subpage=='Jenis Media'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/jenis_media/"><i class="fa fa-angle-right"></i> Jenis Media</a>
          </li>
          <li <?php if($subpage=='Cakupan Media'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/cakupan_media/"><i class="fa fa-angle-right"></i> Cakupan Media</a>
          </li>
          <li <?php if($subpage=='Sebaran Oplah'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/sebaran_oplah/"><i class="fa fa-angle-right"></i> Sebaran Oplah</a>
          </li>
          <li <?php if($subpage=='Expired Web'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/expired/"><i class="fa fa-angle-right"></i> Expired Web</a>
          </li>


        </ul>
      </li>
      <?php } ?>
      <li <?php if ($page == 'ta_berita') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pegawai'); ?>">
          <i class="fa fa-user"></i>
          <span>Berita</span>
        </a>
      </li>
<!-- 
      <li <?php if ($page == 'merek') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Merek'); ?>">
          <i class="fa fa-user"></i>
          <span>Merek Kendaraan</span>
        </a>
      </li>

      <li <?php if ($page == 'jenis_kendaraan') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Jenis-Kendaraan'); ?>">
          <i class="fa fa-user"></i>
          <span>Jenis Kendaraan</span>
        </a>
      </li>

      <li <?php if ($page == 'posisi') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Posisi'); ?>">
          <i class="fa fa-briefcase"></i>
          <span>Data Posisi</span>
        </a>
      </li>
      
      <li <?php if ($page == 'kota') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kota'); ?>">
          <i class="fa fa-location-arrow"></i>
          <span>Data Kota</span>
        </a>
      </li> -->

      

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>