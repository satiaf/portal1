<?php $datetime = date("Y-m-d H:i:s"); ?>

<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Berita</h3>
      <form class="form-horizontal" action="<?php echo base_url('Data_berita/ubah') ?>" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $dataBerita->id; ?>">

        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-newspaper-o"></i>
      </span>
      <select name="id_tipe_berita" class="form-control" aria-describedby="sizing-addon2">
        <option>Pilih Tipe Berita</option>
        <?php
            foreach ($dataTipe_berita as $tipe_berita) { ?>
              <option value="<?php echo $tipe_berita->id; ?>"<?php if($tipe_berita->id == $dataBerita->id_tipe_berita){echo "selected='selected'";} ?>><?php echo $tipe_berita->tipe_berita; ?></option>
          <?php } ?>
      </select>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-newspaper-o"></i>
      </span>
      <textarea rows="6" class="form-control" placeholder="Ringkasan Berita" name="ringkasan_berita" aria-describedby="sizing-addon2"><?php echo $dataBerita->ringkasan_berita; ?></textarea>
    </div>

    <input type="hidden" class="form-control" placeholder="ID User" name="id_user" aria-describedby="sizing-addon2" value="<?php echo $userdata->id; ?>">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-newspaper-o"></i>
      </span>
      <input type="file" class="form-control" placeholder="Foto" name="foto">
    </div>

    <input type="hidden" class="form-control" placeholder="Tanggal Input" name="tgl_input" aria-describedby="sizing-addon2" value="<?php echo $datetime; ?>">

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