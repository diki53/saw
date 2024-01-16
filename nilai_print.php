<?php
ob_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 14px;
        }

        th {
            height: 25px;
            text-align: center;
        }

        table,
        th,
        td {
            border: 0.5rem solid black;
        }

        th,
        td {
            padding: 4px;
        }

        thead {
            background: lightgray;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .table-no-border {
            table-layout: fixed;
        }

        .table-no-border,
        .table-no-border th,
        .table-no-border td {
            border: none;
        }

        .mt-1 {
            margin-top: 20px;
        }

        .mt-2 {
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <h3 class="center">
        PENILAIAN KARYAWAN<br>
        PT. ANUGERAH MAJU BAHARI<br>
    </h3>
    <hr>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                <th>Nama Alternatif</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $q = "select * from nilai order by id_nilai";
            $q = mysqli_query($con, $q);
            $no = 0;
            while ($data = mysqli_fetch_array($q)) {
            ?>
                <tr>
                    <td class="center"><?php echo ++$no ?></td>
                    <td class="center"><?php echo $data['kode_nilai'];?></td>
                    <td class="center"><?php echo $data['nama']; ?></td>
                    <td class="center"><?php echo $data['nilai']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <table class="table-no-border mt-1">
        <tr>
            <td></td>
            <td></td>
            <td class="center">Jakarta, <?php echo date('d-m-Y'); ?><br><br>
                Direktur<br>
                PT. Anugerah Maju Bahari</td> <br>
        </tr>
    </table>
    <table class="table-no-border mt-2">
        <tr>
            <td></td>
            <td></td>
            <td class="center">(________________)</td>
        </tr>
    </table>
</body>

</html>
<?php
$filename = "penilaian.pdf";
$content = ob_get_clean();

require 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($content);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream($filename, array("Attachment" => FALSE));
?>