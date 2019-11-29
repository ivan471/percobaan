<form action="<?= base_url().'simpan' ?>" method="post" role='form'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nama</label>
      <input type="text" class="form-control" name="nama" placeholder="Nama">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Username">
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="test" class="form-control" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAddress2">Alamat</label>
      <input type="text" class="form-control" name="alamat" placeholder="Alamat">
    </div>
    <div class="form-group col-md-6">
      <label for="inputAddress2">No.Telepon</label>
      <input type="text" class="form-control" name="notlp" placeholder="No.Telepon">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Status</label>
      <select name="status" class="form-control">
        <option selected>Pilih</option>
        <option>Admin</option>
        <option>Customer</option>
        <option>Sales</option>
        <option>Marketing</option>
        <option>Produksi</option>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Daftar</button>
</form>
