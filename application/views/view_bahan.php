<div class="col-8">
  <table class="table ml-5">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama Bahan</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Satuan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($bahan as $z) :?>
      <tr>
        <th scope="row"><?= $z['id_bahan']; ?></th>
        <td><?= $z['nama_bhn']; ?></td>
        <td><?= $z['jumlah']; ?></td>
        <td><?= $z['satuan']; ?></td>
        <td><a class="btn btn-info" href="<?= base_url().'bahan/'.$z['id_bahan'] ?>">Tambah Stok</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
