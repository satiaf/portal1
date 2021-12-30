<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img style="width: 40px; height: 40px;" src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
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
           <li <?php if($subpage=='Sebaran Oplah Kabupaten'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/sebaran_oplah_kabupaten/"><i class="fa fa-angle-right"></i> Sebaran Oplah Kabupaten</a>
          </li>
          <li <?php if($subpage=='Status Kantor'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/status/"><i class="fa fa-angle-right"></i> Status Kantor</a>
          </li>
          <li <?php if($subpage=='Rangking Indonesia'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/rangking/"><i class="fa fa-angle-right"></i> Rangking Indoesia</a>
          </li>
          <li <?php if($subpage=='Rangking Global'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/rangking_global/"><i class="fa fa-angle-right"></i> Rangking Global</a>
          </li>
          <li <?php if($subpage=='Usia Web'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/usia/"><i class="fa fa-angle-right"></i> Usia Web</a>
          </li>
          <li <?php if($subpage=='Wartawan Liputan'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/wartawan/"><i class="fa fa-angle-right"></i> Wartawan Liputan</a>
          </li>
          <li <?php if($subpage=='Update Berita'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/update_berita/"><i class="fa fa-angle-right"></i> Update Berita</a>
          </li>
          <li <?php if($subpage=='Halaman Khusus'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/khusus/"><i class="fa fa-angle-right"></i> Halaman Khusus</a>
          </li>
          <li <?php if($subpage=='Mesin Cetak'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/cetak/"><i class="fa fa-angle-right"></i> Mesin Cetak</a>
          </li>
          <li <?php if($subpage=='Kompetensi Wartawan'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/kompetensi/"><i class="fa fa-angle-right"></i> Kompetensi Wartawan</a>
          </li>
          <li <?php if($subpage=='Terdaftar SPS'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/sps/"><i class="fa fa-angle-right"></i> Terdaftar Sps</a>
          </li>
          <li <?php if($subpage=='Jumlah Oplah'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/jumlah_oplah/"><i class="fa fa-angle-right"></i> Jumlah Oplah</a>
          </li>
          <li <?php if($subpage=='Expired Web'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/expired/"><i class="fa fa-angle-right"></i> Expired Web</a>
          </li>
          <li <?php if($subpage=='User'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>master/user/"><i class="fa fa-angle-right"></i> User</a>
          </li>


        </ul>
      </li>
      <?php } ?>

      <li <?php if ($page == 'berita') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Data_berita'); ?>">
          <i class="fa fa-user"></i>
          <span>Berita</span>
        </a>
      </li>

      <?php
        if ($userdata->status == 0) {
      ?>
        <li <?php if ($page == 'register') {echo 'class="active"';} ?>>
          <a href="<?php echo base_url('Register'); ?>">
            <i class="fa fa-registered"></i>
            <span>Register</span>
          </a>
        </li>
      <?php } ?>
      
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>