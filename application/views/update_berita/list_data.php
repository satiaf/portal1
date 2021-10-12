<?php
  $no = 1;
  foreach ($dataupdate_berita as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['update']; ?></td>
      <td><?php echo $kec['poin']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>