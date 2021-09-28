<?php
  $no = 1;
  foreach ($dataexpired as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['expired']; ?></td>
      <td><?php echo $kec['poin']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>