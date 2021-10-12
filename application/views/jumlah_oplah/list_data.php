<?php
  $no = 1;
  foreach ($datajumlah_oplah as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['status']; ?></td>
      
    </tr>
    <?php
    $no++;
  }
?>