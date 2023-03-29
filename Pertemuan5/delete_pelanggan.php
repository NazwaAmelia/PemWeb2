<?php
require_once 'dbkoneksi.php';


$id = $_GET['iddel'];

$dbh->query("DELETE FROM pelanggan WHERE id=$id");

header('location:list_pelanggan.php');