<!-- Begin Page Content -->
<div class="container-fluid">
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">id pesanan</th>
				<th scope="col">customer</th>
				<th scope="col">tanggal pengantaran</th>
				<th scope="col">jam pengambilan</th>
				<th scope="col">status</th>
				<th></th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php foreach ($pesanan as $z) :?>
	    <tr>
	      <th scope="row"><?= $z['id_pesanan']; ?></th>
	      <td><?= $z['nama']; ?></td>
	      <td><?= $z['tanggal_pengantaran']; ?></td>
	      <td><?= $z['jam']; ?></td>
					<td><?php if ($z['status'] == 0) {?>
							Belum Diproduksi
						<?php }else {?>
							Selesai Diproduksi
						<?php } ?>
					</td>
					<td><a class="btn btn-primary" href="<?= base_url().'detail_pesanan/'.$z['id_pesanan'] ?>">Detail Pesanan</a></td>
	    </tr>
	  <?php endforeach; ?>
	  </tbody>
	</table>
</div>
