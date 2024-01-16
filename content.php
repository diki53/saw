<?php
switch ($page) {
    case 'kriteria':
        include "kriteria.php";
        break;
    case 'update_kriteria':
        include "kriteria_update.php";
        break;
    case 'subkriteria':
        include "subkriteria.php";
        break;
    case 'update_subkriteria':
        include "subkriteria_update.php";
        break;
    case 'nilai':
        include "nilai.php";
        break;
    case 'update_nilai':
        include "nilai_update.php";
        break;
case 'lihat_nilai':
        include "nilai_lihat.php";
        break;
    case 'pengguna':
        include "pengguna.php";
        break;
    case 'update_pengguna':
        include "pengguna_update.php";
        break;
    case 'alternatif':
        include "alternatif.php";
        break;
    case 'update_alternatif':
        include "alternatif_update.php";
        break;
    case 'lihat_alternatif':
        include "alternatif_lihat.php";
        break;
    case 'penilaian':
        include "penilaian.php";
        break;
    case 'password':
        include "password.php";
        break;
    case 'laporan':
        include "laporan.php";
        break;

    default:
        include "beranda.php";
        break;
}
