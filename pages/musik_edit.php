<?php
if (defined("ALLOWED") === false) {
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}
?>


<div class="container-fluid py-4">
    <div class="card col-16">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-10">
                    <h4>Form Edit Musik</h5>
                </div>
                <div class="col-2">
                    <a href="?page=musik_list" class="btn btn-sm btn-outline-info">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pb-2 pt-0">
            <div class="table-responsive p-3">

                <?php
                $id_musik = clean_data($_GET['id_musik']);
                // $sql = "select * from musik where id_musik=" . $id_musik;
                $sql = "SELECT *, GROUP_CONCAT(g.nama_genre) as gg FROM musik as m 
                JOIN musik_genre as mg on mg.id_musik=m.id_musik 
                JOIN genre as g ON mg.id_genre=g.id_genre
                where m.id_musik=".$id_musik;

                // var_dump($sql);die;
                $result = mysqli_query($koneksi, $sql);
                $row = mysqli_fetch_assoc($result);
                // var_dump($row);die;

                $sql2 = "select * from genre where deleted_at is null";
                $genre = mysqli_query($koneksi, $sql2);
                // var_dump($genre);
                ?>


                <!-- TABLE -->
                <form action="?page=musik_update" method="POST">
                    <input type="hidden" name="id_musik" value="<?php echo $row['id_musik']; ?>">
                    <table class="table align-items-center ml-0">
                        <tr>
                            <td width='20%'>Judul Musik</td>
                            <td>:</td>
                            <td><input value="<?php echo $row['judul_musik']; ?>" style="background-color: #f0f0f0; width:50%; padding-left:10px" type="text" name='judul_musik' class="form-control"></td>
                        </tr>
                        <tr>
                            <td width='20%'>Tahun</td>
                            <td>:</td>
                            <td><input value="<?php echo $row['tahun']; ?>" style="background-color: #f0f0f0; width:50%; padding-left:10px" type="text" name='tahun' class="form-control"></td>
                        </tr>
                        <tr>
                            <td width='20%'>Artist</td>
                            <td>:</td>
                            <td><input value="<?php echo $row['artist']; ?>" style="background-color: #f0f0f0; width:50%; padding-left:10px" type="text" name='artist' class="form-control"></td>
                        </tr>

                        <tr>
                            <td>Genre(s)</td>
                            <td>:</td>
                            <td>
                                <?php
                                $genres = explode(",", $row['gg']);
                                // var_dump($genres);die;
                                while ($row = mysqli_fetch_assoc($genre)) :
                                    $nama_genre = $row['nama_genre'];
                                    // var_dump($row['nama_genre']);die;
                                ?>

                                    <!-- // nama form genre[] -> untuk menyimpan data dalam bentuk array karena typenya checkbox -->
                                    <input type="checkbox" name="genre[]" <?php echo (in_array($nama_genre, $genres)) ? 'checked="checked"' : ''; ?> value="<?= $row['id_genre'] ?>" /><?= $row['nama_genre'] ?></br>
                                    <!-- // var_dump($row['nama_genre']); -->
                                <?php
                                endwhile;
                                ?>
                               
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" value="Update Data" class="btn btn-success"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</div>