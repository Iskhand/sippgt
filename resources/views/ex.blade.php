<?php
// $d = $tahun . $bln;
// $namahari = date('l', strtotime($d));
// $ming = $daftar_hari[$namahari];
// echo $ming;
// echo date_default_timezone_get();
echo '</br>';
echo date('H:i:s d-m-Y');
echo '</br>';
date_default_timezone_set('Asia/Jakarta');
echo '</br>';
// menampilkan waktu dan tanggal sekarang
echo date('H:i:s d-m-Y');
?>
<h1>Selamat datang {{ Auth::user()->name }}</h1>
<a href="/logout">Logout</a>
