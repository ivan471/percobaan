<div class="container">
  <div class="col-10">
    <form action="<?= base_url().'simpan' ?>" method="post" role='form'>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nama</label>
          <input type="text" class="form-control" name="nama" placeholder="Nama" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Username</label>
          <input type="text" class="form-control" name="username" maxlength="8" placeholder="Username" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name="password" maxlength="8" placeholder="Password" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputAddress2">Alamat</label>
          <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputAddress2">No.Telepon</label>
          <input type="text" class="form-control" name="notlp" maxlength="15" placeholder="No.Telepon" required>
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">Status</label>
          <select name="status" class="form-control">
            <option selected>Pilih</option>
            <option>Admin</option>
            <option>Sales</option>
            <option>Produksi</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-outline-primary btn-lg">Daftar</button>
    </form>

  </div>
</div>
