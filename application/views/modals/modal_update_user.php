<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data User</h3>
    
    <form class="form-horizontal" action="<?php echo base_url('Master/ubah_user') ?>" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $dataUser->id; ?>">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataUser->nama; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-phone"></i>
      </span>
      <input type="text" class="form-control" placeholder="Telephone" name="telephone" aria-describedby="sizing-addon2" value="<?php echo $dataUser->telephone; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-map-marker"></i>
      </span>
      <textarea rows="6" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2"><?php echo $dataUser->alamat; ?></textarea>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-newspaper-o"></i>
      </span>
      <input type="text" class="form-control" placeholder="Media" name="media" aria-describedby="sizing-addon2" value="<?php echo $dataUser->media; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-camera"></i>
      </span>
      <input type="file" class="form-control" placeholder="Foto" name="foto">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-user"></i>
      </span>
      <input type="username" class="form-control" placeholder="Username" name="username" aria-describedby="sizing-addon2" value="<?php echo $dataUser->username; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-key"></i>
      </span>
      <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="sizing-addon2" value="<?php echo $dataUser->password; ?>">
    </div>
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-user"></i>
      </span>
      <select name="jenis_user" class="form-control" aria-describedby="sizing-addon2">
        <option>Pilih Jenis User</option>
        <?php
          foreach ($dataJenis_user as $jenis_user) { ?>
            <option value="<?php echo $jenis_user->id; ?>"<?php if($jenis_user->id == $dataUser->jenis_user){echo "selected='selected'";} ?>><?php echo $jenis_user->nama_jenis_user; ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" class="form-control btn btn-warning"> Ubah Data</button>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>