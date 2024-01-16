
<?php
$link_data = '?page=nilai';
$link_update = '?page=update_nilai';
$link_lihat = '?page=nilai_lihat.php';

$list_data = '';
$q = "select * from nilai order by id_nilai";
$q = mysqli_query($con, $q);
if (mysqli_num_rows($q) > 0) {
    $no = 0;
    while ($r = mysqli_fetch_array($q)) {
        $id = $r['id_nilai'];
        $list_data .= '
		<tr>
        <td>' . ++$no . '</td>
		<td>' . $r['kode_nilai'] . '</td>
		<td>' . $r['nama'] . '</td>
        <td>' . $r['nilai'] . '</td>
		<td>
		<a href="' . $link_lihat . '&amp;id=' . $id . '" class="btn btn-info btn-xs" title="Lihat">Lihat</a> &nbsp;
		<a href="' . $link_update . '&amp;id=' . $id . '&amp;action=edit" class="btn btn-success btn-xs" title="Ubah">Ubah</a> &nbsp;
		<a href="#" data-href="' . $link_update . '&amp;id=' . $id . '&amp;action=delete" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus">Hapus</a></td>
		</tr>';
    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h1 class="box-title">Nilai Karyawan</h1>
        <div class="button-right">
            <a href="<?php echo $link_update; ?>" class="btn btn-primary">Tambah Nilai</a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTables1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kriteria</th>
                        <th>Nama Karyawan</th>
                        <th>Nilai</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $list_data; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>