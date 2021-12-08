<?php
if (defined("ALLOWED") === false) {
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

$now = date("Y-m-d H:i:s");
$data = [
    'judul_musik' => clean_data($_POST['judul_musik']),
    'tahun' => clean_data($_POST['tahun']),
    'artist' => clean_data($_POST['artist']),
    'created_at' => $now,
    'updated_at' => $now,
    // 'genre' => $_POST['genre'], //tidak pakai fungsi clean_data karena bentuknya array
];

// array genre
$genre = $_POST['genre'];

// insert into <nama_tabel> (col1, col2, col3, ...) values (val1, val2, val3, ...)
save_data($koneksi, "musik", $data);
$id_musik = get_last_id($koneksi);

// add to movie_genre
foreach ($genre as $id_genre) {
    $data = [
        'id_musik' => $id_musik,
        'id_genre' => $id_genre,
        'created_at' => $now,
        'updated_at' => $now,
    ];
    save_data($koneksi, "musik_genre", $data);
}

// redirect
redirect("?page=musik_list");
