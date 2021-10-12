<?php
  $no = 1;
  foreach ($datacetak as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['status']; ?></td>
      
    </tr>
    <?php
    $no++;
  }
?>