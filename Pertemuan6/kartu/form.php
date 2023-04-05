<?php
require_once '../dbkoneksi.php';
?>

<?php
// cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!empty($_id)) {
    // ambil data produk berdasarkan id
    $sql = "SELECT * FROM kartu WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
} else {
    // jika tidak ada parameter id pada URL, maka dianggap input data baru
    // inisialisasi variabel $row sebagai array kosong
    $row = [];
}
?>
<div class="container m-5">
    <form method="POST" action="proses.php">
        <div class="form-group row mt-3">
            <label for="kode" class="col-4 col-form-label">Kode</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="kode" name="kode" type="text" class="form-control"
                        value="<?php if (isset($row['kode'])) echo $row['kode'] ?>">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="nama" class="col-4 col-form-label">Nama Produk</label>
            <div class="col-8">
                <div class="input-group">

                    <input id="nama" name="nama" type="text" class="form-control"
                        value="<?php if (isset($row['nama'])) echo $row['nama'] ?>">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="diskon" class="col-4 col-form-label">Diskon</label>
            <div class="col-8">
                <div class="input-group">

                    <input id="diskon" name="diskon" value="<?php if (isset($row['diskon'])) echo $row['diskon'] ?>"
                        type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="iuran" class="col-4 col-form-label">Iuran</label>
            <div class="col-8">
                <div class="input-group">

                    <input id="iuran" name="iuran" value="<?php if (isset($row['iuran'])) echo $row['iuran'] ?>"
                        type="text" class="form-control">
                </div>
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
</div>