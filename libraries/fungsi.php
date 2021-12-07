<?php

function redirect($page)
{
    echo "<script>
        window.location.replace('$page');
        </script>";
}

function save_data($koneksi, $nama_tabel, $data)
{
    $sql = "INSERT INTO " . $nama_tabel . " (";

    $keys = array_keys($data);
    $values = array_values($data);

    $sql .= implode(",", $keys) . ") ";
    $sql .= "VALUES ('" . implode("','", $values) . "')";

    mysqli_query($koneksi, $sql);
}