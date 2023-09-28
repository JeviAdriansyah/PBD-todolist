<?php

    require_once __DIR__ . 'Database.php';
    $db = \Config\Database::getConnetion();
    echo "Sukses membuat koneksi ke database";