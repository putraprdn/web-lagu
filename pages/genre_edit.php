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
                    <h4>Form Edit Genre</h5>
                </div>
                <div class="col-2">
                    <a href="?page=genre_list" class="btn btn-sm btn-outline-info">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pb-2 pt-0">
            <div class="table-responsive p-3">

                <?php
                $id_genre = clean_data($_GET['id_genre']);
                $sql = "select * from genre where id_genre=" . $id_genre;

                $result = mysqli_query($koneksi, $sql);
                $row = mysqli_fetch_assoc($result);

                ?>


                <!-- TABLE -->
                <form action="?page=genre_update" method="POST">
                    <input type="hidden" name="id_genre" value="<?php echo $row['id_genre']; ?>" >
                    <table class="table align-items-center ml-0">
                        <tr>
                            <td width='20%'>Nama Genre</td>
                            <td>:</td>
                            <td><input value="<?php echo $row['nama_genre']; ?>" style="background-color: #f0f0f0; width:50%; padding-left:10px" type="text" name='nama_genre' class="form-control"></td>
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