<form class="" action="<?= base_url().'simpan_bahan/'.$input['id_bahan'] ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">ID</label>
      <input type="text" class="form-control" name="id_bahan" value="<?= $input['id_bahan']; ?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nama Bahan</label>
      <input type="text" class="form-control" name="nama_bhn" value="<?= $input['nama_bhn']; ?>" readonly>
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
