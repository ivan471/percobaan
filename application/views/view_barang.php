<div class="col-8">
  <table class="table ml-5">
    <thead>
      <tr>
        <th scope="col">ID Barang</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Satuan</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($barang as $z) :?>
      <tr>
        <th scope="row"><?= $z['id_barang']; ?></th>
        <td><?= $z['nama_brg']; ?></td>
        <td><?= $z['jumlah']; ?></td>
        <td><?= $z['satuan']; ?></td>
        <td><a class="btn btn-primary" href="<?= base_url().'produksi_stok/'.$z['id_barang'] ?>">Produksi</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

</div>
