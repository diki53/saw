<?php
$link_data = '?page=nilai';




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
        </tr>';

    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h1 class="box-title">Nilai Karyawan</h1>
    </div>
</div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kriteria</th>
                        <th>Nama Alternatif</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $list_data; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>