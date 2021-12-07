<?php
if (defined("ALLOWED") === false) {
  die("Anda tidak boleh membuka halaman ini secara langsung!");
}

$data = [
    'nama_genre' => $_POST['nama_genre'],
];

save_data($koneksi, "genre", $data);

redirect("?page=genre_list");
