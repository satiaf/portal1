<?php
  $no = 1;
  foreach ($datarangking_global as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['rangking_global']; ?></td>
      <td><?php echo $kec['poin']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>