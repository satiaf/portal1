<?php
  $no = 1;
  foreach ($datajenis_media as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['nama_jenis_media']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>