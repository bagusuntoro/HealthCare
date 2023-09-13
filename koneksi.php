<?php

$koneksi = new mysqli("localhost", "root", "", "healthcare");

if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}