<div class="container">
  <?php if ($button == 1){ ?>
    <form class="" action="<?= base_url().'proses/'.$barang['id_barang'] ?>" method="post">
      <input type="hidden" name="id_pesanan" value="<?= $barang['id_pesanan'] ?>">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nama Barang</label>
          <input type="text" class="form-control" name="nama_barang" value="<?= $barang['nama_barang']; ?>" readonly>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Jumlah</label>
          <input type="text" class="form-control" name="jumlah" placeholder="jumlah" value="<?= $total; ?>" readonly>
        </div>
      </div>
      <button class="btn btn-primary" type="submit" name="button">Produksi</button>
    </form>
  <?php }else {?>
    <form class="" action="<?= base_url().'tambah_stok/'.$barang['id_barang'] ?>" method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nama Barang</label>
          <input type="text" class="form-control" name="nama_barang" value="<?= $barang['nama_brg']; ?>" readonly>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Jumlah</label>
          <input type="text" class="form-control" name="jumlah" placeholder="jumlah" min="0" value="0" required>
        </div>
      </div>
      <button class="btn btn-primary" type="submit" name="button">Produksi</button>
    </form>
  <?php } ?>
</div>
