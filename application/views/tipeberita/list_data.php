<?php
  $no = 1;
  foreach ($datatipe_berita as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['tipe_berita']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>