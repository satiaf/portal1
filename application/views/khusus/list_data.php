<?php
  $no = 1;
  foreach ($datakhusus as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['halaman']; ?></td>
      
    </tr>
    <?php
    $no++;
  }
?>