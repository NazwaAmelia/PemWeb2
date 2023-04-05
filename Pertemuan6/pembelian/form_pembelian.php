<?php
require_once '../dbkoneksi.php';
?>

<?php
// cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!empty($_id)) {
  // ambil data pembelian berdasarkan id
  $sql = "SELECT * FROM pembelian WHERE id=?";
  $st = $dbh->prepare($sql);
  $st->execute([$_id]);
  $row = $st->fetch();
} else {
  // jika tidak ada parameter id pada URL, maka dianggap input data baru
  // inisialisasi variabel $row sebagai array kosong
  $row = [];
}
?>

<form method="POST" action="proses_pembelian.php">
    <div class="form-group row mt-3">
        <label for="tanggal" class="col-4 col-form-label">Tanggal Pembelian</label>
        <div class="col-8">
            <div class="input-group">
                <input id="tanggal" name="tanggal" type="date" class="form-control"
                    value="<?php if (isset($row['tanggal'])) echo $row['tanggal']; ?>">
            </div>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="nomor" class="col-4 col-form-label">Nomor Pembelian</label>
        <div class="col-8">
            <div class="input-group">
                <input id="nomor" name="nomor" type="text" class="form-control"
                    value="<?php if (isset($row['nomor'])) echo $row['nomor']; ?>">
            </div>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="jenis" class="col-4 col-form-label">Jenis pembelian</label>
        <div class="col-8">
            <?php
      $sqljenis = "SELECT * FROM produk";
      $rsjenis = $dbh->query($sqljenis);
      ?>
            <select id="produk_id" name="produk_id" class="custom-select">
                <?php
        foreach ($rsjenis as $rowjenis) {
        ?>
                <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['nama'] ?></option>
                <?php
        }
        ?>
            </select>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="stok" class="col-4 col-form-label">Jumlah</label>
        <div class="col-8">
            <div class="input-group">
                <input id="jumlah" name="jumlah" value="<?php if (isset($row['jumlah'])) echo $row['jumlah']; ?>"
                    type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="harga" class="col-4 col-form-label">Harga</label>
        <div class="col-8">
            <div class="input-group">
                <input id="harga" name="harga" value="<?php if (isset($row['harga'])) echo $row['harga']; ?>"
                    type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="jenis" class="col-4 col-form-label">Vendor</label>
        <div class="col-8">
            <?php
      $sqljenis = "SELECT * FROM vendor";
      $rsjenis = $dbh->query($sqljenis);
      ?>
            <select id="vendor_id" name="vendor_id" class="custom-select">
                <?php
        foreach ($rsjenis as $rowjenis) {
        ?>
                <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['nama'] ?></option>
                <?php
        }
        ?>
            </select>
        </div>
    </div>
    <div class="form-group row mt-3">
        <div class="offset-4 col-8">
            <?php
      $button = (empty($_id)) ? "Simpan" : "Update";
      ?>
            <input type="submit" name="proses" type="submit" class="btn btn-primary" value="<?= $button ?>" />
            <input type="hidden" name="id" value="<?= $_id ?>" />
        </div>
    </div>
</form>