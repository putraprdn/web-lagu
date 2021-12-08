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
                    <h4>Form Musik</h5>
                </div>
                <div class="col-2">
                    <a href="?page=musik_list" class="btn btn-sm btn-outline-info">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pb-2 pt-0">
            <div class="table-responsive p-3">

                <?php
                $sql = "select * from genre where deleted_at is null";
                $genre = mysqli_query($koneksi, $sql);
                ?>

                <!-- TABLE -->
                <form action="?page=musik_save" method="POST">
                    <table class="table align-items-center ml-0">
                        <tr>
                            <td width='20%'>Judul Musik</td>
                            <td>:</td>
                            <td><input style="background-color: #f0f0f0; width:50%; padding-left:10px" type="text" name='judul_musik' class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>:</td>
                            <td><input style="background-color: #f0f0f0; width:50%; padding-left:10px" type="text" name='tahun' class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Artist</td>
                            <td>:</td>
                            <td><input style="background-color: #f0f0f0; width:50%; padding-left:10px" type="text" name='artist' class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Genre(s)</td>
                            <td>:</td>
                            <td>
                                <?php
                                while ($row = mysqli_fetch_assoc($genre)) {
                                    // nama form genre[] -> untuk menyimpan data dalam bentuk array karena typenya checkbox
                                    echo "<input type='checkbox' name='genre[]' value='" . $row['id_genre'] . "' />" . $row['nama_genre'] . "<br />";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" value="Simpan Data" class="btn btn-success"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</div>