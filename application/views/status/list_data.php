<?php
  $no = 1;
  foreach ($datastatus as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['status_kantor']; ?></td>
      <td><?php echo $kec['poin']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>