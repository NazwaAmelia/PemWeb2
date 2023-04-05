<?php
require_once '../dbkoneksi.php';
?>

<?php
// cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!empty($_id)) {
  // ambil data vendor berdasarkan id
  $sql = "SELECT * FROM vendor WHERE id=?";
  $st = $dbh->prepare($sql);
  $st->execute([$_id]);
  $row = $st->fetch();
} else {
  // jika tidak ada parameter id pada URL, maka dianggap input data baru
  // inisialisasi variabel $row sebagai array kosong
  $row = [];
}
?>

<form method="POST" action="proses_vendor.php">
    <div class="form-group row">
        <label for="kode" class="col-4 col-form-label">Nomor</label>
        <div class="col-8">
            <div class="input-group">
                <input id="kode" name="nomor" type="text" class="form-control"
                    value="<?php if (isset($row['nomor'])) echo $row['nomor']; ?>">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-4 col-form-label">Nama</label>
        <div class="col-8">
            <div class="input-group">
                <input id="nama" name="nama" type="text" class="form-control"
                    value="<?php if (isset($row['nama'])) echo $row['nama']; ?>">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="harga_beli" class="col-4 col-form-label">Kota</label>
        <div class="col-8">
            <div class="input-group">
                <input id="harga_beli" name="kota" value="<?php if (isset($row['kota'])) echo $row['kota']; ?>"
                    type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="stok" class="col-4 col-form-label">Kontak</label>
        <div class="col-8">
            <div class="input-group">
                <input id="stok" name="kontak" value="<?php if (isset($row['kontak'])) echo $row['kontak']; ?>"
                    type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <?php
      $button = (empty($_id)) ? "Simpan" : "Update";
      ?>
            <input type="submit" name="proses" type="submit" class="btn btn-primary" value="<?= $button ?>" />
            <input type="hidden" name="id" value="<?= $_id ?>" />
        </div>
    </div>
</form>