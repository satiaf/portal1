<?php
  foreach ($dataUser as $user) {
    ?>
    <tr>
      <td style="min-width:230px;"><?php echo $user->nama; ?></td>
      <td><?php echo $user->telephone; ?></td>
      <td><?php echo $user->alamat; ?></td>
      <td><?php echo $user->media; ?></td>
      <td>
        <img style="width: 50px; height: 50px;" src="<?php echo base_url(); ?>assets/img/<?php echo $user->foto; ?>" alt="User profile picture">
      <td><?php echo $user->nama_jenis_user; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataUser" data-id="<?php echo $user->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-user" data-id="<?php echo $user->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>