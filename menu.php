<?php
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
?>
<li <?php if ($page == "") echo 'class="active"'; ?>><a href="./"><i class="fa fa-circle"></i> <span>Beranda</span></a></li>

<?php if ($_SESSION['LOG_LEVEL'] == 'Admin') : ?>
    <li <?php if ($page == "lihat_nilai" || $page == "lihat_nilai") echo 'class="active"'; ?>><a href="?page=lihat_nilai"><i class="fa fa-circle"></i> <span>Nilai Karyawan</span></a></li>
    <li <?php if ($page == "kriteria" || $page == "update_kriteria" || $page == "subkriteria" || $page == "update_subkriteria") echo 'class="active"'; ?>><a href="?page=kriteria"><i class="fa fa-circle"></i> <span>Kriteria</span></a></li>
    <li <?php if ($page == "alternatif" || $page == "update_alternatif" || $page == "lihat_alternatif") echo 'class="active"'; ?>><a href="?page=alternatif"><i class="fa fa-circle"></i> <span>Alternatif</span></a></li>
    <li <?php if ($page == "penilaian") echo 'class="active"'; ?>><a href="?page=penilaian"><i class="fa fa-circle"></i> <span>Penilaian</span></a></li>
    <li <?php if ($page == "pengguna" || $page == "update_pengguna") echo 'class="active"'; ?>><a href="?page=pengguna"><i class="fa fa-circle"></i> <span>Pengguna</span></a></li>

<?php elseif ($_SESSION['LOG_LEVEL'] == 'User') : ?>
    <li <?php if ($page == "nilai") echo 'class="active"'; ?>><a href="?page=nilai"><i class="fa fa-circle"></i> <span>Nilai Karyawan</span></a></li>
    <li <?php if ($page == "penilaian") echo 'class="active"'; ?>><a href="?page=penilaian"><i class="fa fa-circle"></i> <span>Penilaian</span></a></li>
    <li <?php if ($page == "laporan") echo 'class="active"'; ?>><a href="?page=laporan"><i class="fa fa-circle"></i> <span>Laporan</span></a></li>

<?php elseif ($_SESSION['LOG_LEVEL'] == 'Karyawan') : ?>
    <li <?php if ($page == "lihat_nilai" || $page == "lihat_nilai") echo 'class="active"'; ?>><a href="?page=lihat_nilai"><i class="fa fa-circle"></i> <span>Nilai Karyawan</span></a></li>
    <li <?php if ($page == "penilaian") echo 'class="active"'; ?>><a href="?page=penilaian"><i class="fa fa-circle"></i> <span>Penilaian</span></a></li>
    <li <?php if ($page == "laporan") echo 'class="active"'; ?>><a href="?page=laporan"><i class="fa fa-circle"></i> <span>Laporan</span></a></li>
  
<?php endif; ?>

<li <?php if ($page == "password") echo 'class="active"'; ?>><a href="?page=password"><i class="fa fa-circle"></i> <span>Ubah Password</span></a></li>
<li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>