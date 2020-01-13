<div class="container-fluid">
	<div class="row">
		<div class="col-4">
			<h2>Nomor Pesanan</h2>
			<h2>Customer</h2>
			<h2>Tanggal Pengantaran</h2>
			<h2>Jam Pengantaran</h2>
			<h2>Sales</h2>
		</div>
		<div class="col-4">
			<h2><?= $pesanan['id_pesanan'] ?></h2>
			<h2><?= $pesanan['nama_cust'] ?></h2>
			<h2><?= $pesanan['tanggal_pengantaran'] ?></h2>
			<h2><?= $pesanan['jam'] ?></h2>
			<h2><?= $pesanan['nama'] ?></h2>
		</div>
	</div>
	<div class="col-8">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Nama Barang</th>
					<th scope="col">Jumlah</th>
					<th scope="col">Action</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($brg_pesanan as $z) :?>
					<tr>
						<th scope="row"><?= $z['nama_barang']; ?></th>
						<td><?= $z['jumlah']; ?></td>
						<?php if ($z['status'] == '0'){
							if ($this->session->status == 'Produksi') {?>
							<td><a class="btn btn-primary" href="<?= base_url().'produksi/'.$z['id_pesanan'].'/'.$z['id_barang'] ?>">Produksi</a></td>
						<?php }}else {?>
							<td><i class="far fa-check-circle"></i></td>
						<?php } ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php if ($this->session->status == "Admin"): ?>
		<a class="btn btn-primary" href="<?= base_url().'cetak/'.$pesanan['id_pesanan'] ?>">Cetak Faktur</a>
	<?php endif; ?>
	</div>
</div>
