<?php
  $no = 1;
  foreach ($datacakupan_media as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['cakupan_media']; ?></td>
      <td><?php echo $kec['poin']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>