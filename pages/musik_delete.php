<?php
if (defined("ALLOWED") === false) {
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

// Data yg ditangkap 
$id_musik = $_GET['id_musik'];

$data = [
    'deleted_at' => date("Y-m-d H:i:s")
];

update_data($koneksi, "musik_genre", $data, $id_musik, "id_musik");

redirect("?page=musik_list");