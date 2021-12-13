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
$id_musik = $_POST['id_musik'];

update_data($koneksi, "musik", $data, $id_musik, "id_musik");

$genre = $_POST['genre'];
// var_dump($genre);die;
// $no = 0;

// $sql = "select * from musik_genre where id_musik=" . $id_musik . " and deleted_at is null";
// $cek = mysqli_query($koneksi, $sql);

// while ($row = mysqli_fetch_assoc($cek)) {
//     $data = [
//         'deleted_at' => $now,
//     ];
//     update_data($koneksi, "musik_genre", $data, $id_musik, "id_musik");
//     // var_dump($data);die;
// };


foreach ($genre as $id_genre) {
    // $no++;
    $data = [
        'id_musik' => $id_musik,
        'id_genre' => $id_genre,
        'updated_at' => $now,
        'deleted_at' => null,
    ];
    save_data($koneksi, "musik_genre", $data);
    // var_dump($data);die;
}
// echo($no);die;
redirect("?page=musik_list");
