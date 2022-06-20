<?php
// buat koneksi dengan database mysql
$dbhost = "127.0.0.1";
$dbport = "3306";
$dbuser = "root";
$dbpass = "";
$dbname = "forummusik";
$koneksi = mysqli_connect($dbhost, $dbport, $dbuser, $dbpass, $dbname);

//periksa koneksi, tampilkan pesan kesalahan jika gagal
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_errno() .
        " - " . mysqli_connect_error());
}
