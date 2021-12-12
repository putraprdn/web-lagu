<?php
if (defined("ALLOWED") === false) {
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

$now = date("Y-m-d H:i:s");
// Data yg ditangkap 
$data = [
    'judul_musik' => clean_data($_POST['judul_musik']),
    'tahun' => clean_data($_POST['tahun']),
    'artist' => clean_data($_POST['artist']),
    'updated_at' => $now,
    // 'genre' => $_POST['genre'], //tidak pakai fungsi clean_data karena bentuknya array
];
$genre = $_POST['genre'];
$id_musik = $_POST['id_musik'];

update_data($koneksi, "musik", $data, $id_musik, "id_musik");

foreach ($genre as $id_genre) {
    $data = [
        'id_musik' => $id_musik,
        'id_genre' => $id_genre,
        'updated_at' => $now,
    ];
    update_data($koneksi, "musik_genre", $data, $id_musik, "id_musik");
}
redirect("?page=musik_list");
