<?php
require_once '../dbkoneksi.php';

// menangkap id dari data dari url
$id = $_GET['iddel'];

$dbh->query("DELETE FROM kartu WHERE id=$id");

header('location:index.php');