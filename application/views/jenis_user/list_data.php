<?php
  $no = 1;
  foreach ($datajenis_user as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['jenis_user']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>