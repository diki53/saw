<?php
$link_print = 'laporan_print.php';

$list_data = '';
$q = "select * from hasil left join alternatif on alternatif.id_alternatif=hasil.id_alternatif order by nilai desc";
$q = mysqli_query($con, $q);
if (mysqli_num_rows($q) > 0) {
    $no = 0;
    while ($r = mysqli_fetch_array($q)) {
        $list_data .= '
		<tr>
		<td>' . ++$no . '</td>
		<td>' . $r['nama_alternatif'] . '</td>
        <td>' . floatval($r['nilai']) . '</td>
        </tr>';
    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Laporan</h3>
    </div>
    <div class="box-body">
        <a href="<?php echo $link_print; ?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
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