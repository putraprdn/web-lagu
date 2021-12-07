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
          <h4>Genre List</h5>
        </div>
        <div class="col-2">
          <a href="?page=genre_create" class="btn btn-sm btn-outline-info">Tambah Data</a>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-3">

        <?php
        $sql = 'select * from genre where deleted_at is null';

        $result = mysqli_query($koneksi, $sql);

        ?>
        <!-- TABLE -->
        <table class="table align-items-center ml-0">

          <tr>
            <th class="font-weight-bolder">No.</th>
            <th width="60%" class="font-weight-bolder">Nama Genre</th>
            <th width="5%" class="font-weight-bolder">Action</th>

          </tr>



          <?php
          $no = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $no++;
            echo "
              <tr>
                <td>" . $no . "</td>
                <td>" . $row['nama_genre'] . "</td>
                <td><a href='?page=genre_edit&id_genre=".$row['id_genre']."' class='btn btn-info mb-0'>Edit</a></td>
                <td><a href='?page=genre_delete&id_genre=".$row['id_genre']."' class='btn btn-danger mb-0'>Hapus</a></td>
              </tr>";
          }
          ?>

        </table>
      </div>
    </div>
  </div>
</div>
</div>