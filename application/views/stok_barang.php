<form class="" action="<?= base_url().'simpan_stok/'.$input['id_barang'] ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">ID</label>
      <input type="text" class="form-control" name="id_barang" value="<?= $input['id_barang']; ?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nama Barang</label>
      <input type="text" class="form-control" name="nama_brg" value="<?= $input['nama_brg']; ?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Jumlah</label>
      <input type="text" class="form-control" name="jumlah" placeholder="jumlah">
    </div>
  </div>
  <button type="submit" name="button">submit</button>
</form>
