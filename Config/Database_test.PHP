<?php

require_once __DIR__. '/Database.PHP';


    $db = \Config\Database::getConnection();
    echo "Sukses membuat koneksi ke database";