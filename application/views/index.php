<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="col-10">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Id Pesanan</th>
					<th scope="col">Customer</th>
					<th scope="col">Tanggal Pengantaran</th>
					<th scope="col">Jam Pengantaran</th>
					<th scope="col">Status</th>
					<th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php foreach ($pesanan as $z) :?>
		    <tr>
		      <th scope="row"><?= $z['id_pesanan']; ?></th>
		      <td><?= $z['nama_cust']; ?></td>
		      <td><?= tgl_indo($z['tanggal_pengantaran']); ?></td>
		      <td><?= $z['jam']; ?></td>
						<td><?php if ($z['status_pesanan'] == 0) {?>
								Belum Diproses
							<?php }else {?>
								Selesai
							<?php } ?>
						</td>
						<?php if ($z['status_pesanan'] == 0) {?>
						<td><a class="btn btn-outline-primary" href="<?= base_url().'detail_pesanan/'.$z['id_pesanan'] ?>">Detail Pesanan</a></td>
					<?php }else {?>
						<td><a class="btn btn-outline-primary" href="<?= base_url().'cetak/'.$z['id_pesanan'] ?>">Lihat Faktur</a></td>
					<?php } ?>
		    </tr>
		  <?php endforeach; ?>
		  </tbody>
		</table>
	</div>
</div>
<?php
function tgl_indo($tanggal)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
	return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
} ?>
