<?php
  foreach ($dataBerita as $berita) {
    ?>
    <tr>
      <td style="min-width:230px;"><?php echo $berita->tipe_berita; ?></td>
      <td><?php echo $berita->ringkasan_berita; ?></td>
      <td><?php echo $berita->nama; ?></td>
      <td>
        <img style="width: 300px; height: 150px;" src="<?php echo base_url(); ?>assets/img/berita/<?php echo $berita->foto; ?>" alt="User profile picture">
      <td>
        <?php echo $berita->tgl_input; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataBerita" data-id="<?php echo $berita->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-berita" data-id="<?php echo $berita->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>