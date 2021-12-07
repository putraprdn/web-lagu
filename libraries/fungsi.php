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

function clean_data($data)
{
    $data = addslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function update_data($koneksi, $nama_tabel, $data, $id, $primary_key)
{
    // update [nama_tabel] set col1=val1, col2=val2, ... where [primary_key] = [id]
    $sql = "UPDATE $nama_tabel SET ";
    $arr_update = [];
    foreach ($data as $k => $v) {
        $arr_update[] = $k . "='" . $v . "'";
    }
    $sql .= implode(",", $arr_update);
    $sql .= " WHERE $primary_key=" . $id;

    mysqli_query($koneksi, $sql);
}

