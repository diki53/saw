<?php
$link_data = '?page=nilai.php';
$link_update = '?page=update_nilai';

$kode_nilai = '';
$nama = '';
$bobot = '';
$nilai = '';


if (isset($_POST['save'])) {
    $error = '';
    $id = $_POST['id_nilai'];
    $action = $_POST['action'];
    $kode_nilai = $_POST['kode_nilai'];
    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];


    if ($action == 'add') {
        if (mysqli_num_rows(mysqli_query($con, "select * from nilai where kode_nilai='" . $kode_nilai . "' AND alternatif_id='" . $_POST['id_alternatif'] . "'")) > 0) {
            $error = 'Kode Nilai sudah ada';
        } else {
            $q = "insert into nilai(kode_nilai,alternatif_id,nama,nilai) values ('" . $kode_nilai . "','" . $_POST['id_alternatif'] . "','" . $nama . "','" . $nilai . "')";
            mysqli_query($con, $q);
            exit("<script>location.href='" . $link_data . "';</script>");
        }
    }
    if ($action == 'edit') {
        $q = mysqli_query($con, "select * from nilai where id_nilai='" . $id . "'");
        $r = mysqli_fetch_array($q);
        $kode_nilai_tmp = $r['kode_nilai'];
        if (mysqli_num_rows(mysqli_query($con, "select * from nilai where kode_nilai='" . $kode_nilai . "' and kode_nilai<>'" . $kode_nilai_tmp . "'")) > 0) {
            $error = 'Kode Nilai sudah ada';
        } else {
            $q = "update nilai set kode_nilai='" . $kode_nilai . "',nama='" . $nama . "',nilai='" . $nilai . "' where id_nilai='" . $id . "'";
            mysqli_query($con, $q);
            exit("<script>location.href='" . $link_data . "';</script>");
        }
    }
} else {
    if (empty($_GET['action'])) {
        $action = 'add';
    } else {
        $action = $_GET['action'];
    }
    if ($action == 'edit') {
        $id = $_GET['id'];
        $q = mysqli_query($con, "select * from nilai where id_nilai='" . $id . "'");
        $r = mysqli_fetch_array($q);
        $kode_nilai = $r['kode_nilai'];
        $nama = $r['nama'];
        $nilai = $r['nilai'];
    }
    if ($action == 'delete') {
        $id = $_GET['id'];
        mysqli_query($con, "delete from nilai where id_nilai='" . $id . "'");
        exit("<script>location.href='" . $link_data . "';</script>");
    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h1 class="box-title">tambah Nilai Karyawan</h1>
    </div>
    <form class="form-horizontal" action="<?php echo $link_update; ?>" method="post">
        <input name="id" type="hidden" value="<?php echo $id; ?>">
        <input name="action" type="hidden" value="<?php echo $action; ?>">
        <div class="box-body">
            <?php
            if (!empty($error)) {
                echo '<div class="alert bg-danger" role="alert">' . $error . '</div>';
            }
            ?>
            <div class="form-group">
                <label for="kode_nilai" class="col-sm-2 control-label">Kode Nilai</label>
                <div class="col-sm-4">
                    <input name="kode_nilai" id="kode_nilai" class="form-control" required type="text" value="<?php echo $kode_nilai; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Karyawan</label>
                <div class="col-sm-4">
                    <input name="nama" id="nama" class="form-control" required type="text" value="<?php echo $nama; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="id_alternatif" class="col-sm-2 control-label">Nama Karyawan</label>
                <div class="col-sm-4">
                    <select name="id_alternatif" id="id_alternatif" class="form-control">
                        <?php $k = mysqli_query($con, "SELECT * FROM `alternatif` WHERE 1"); ?>
                        <option value="">Pilih Nama Karyawan</option>
                        <?php while ($d = mysqli_fetch_array($k)) { ?>
                            <option value="<?= $d['id_alternatif'] ?>"><?= $d['nama_alternatif'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="nilai" class="col-sm-2 control-label">nilai</label>
                <div class="col-sm-4">
                    <input name="nilai" id="nilai" required type="number" class="form-control" value="<?php echo $nilai; ?>">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="text-center col-sm-6">
                <button type="submit" name="save" class="btn btn-success">Simpan</button>
                <a href="<?php echo $link_data; ?>" class="btn btn-danger">Batal</a>
            </div>
        </div>
    </form>
</div>