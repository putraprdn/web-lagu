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
          <h4>List Musik</h5>
        </div>
        <div class="row justify-content-end">
          <div class="col-6 d-flex justify-content-end gap-1">

            <?php
            $is_boleh_create = cek_akses($koneksi, 2, $_SESSION['id_role'], "create");
            if($is_boleh_create == true){
             echo"<a href='?page=musik_create' class='btn btn-sm btn-outline-info'>Tambah Data</a>";
            }
            ?>
            <a href="?page=musik_excel" class="btn btn-sm btn-outline-info ml-2">Export XLSX</a>
            <a href="?page=musik_pdf" class="btn btn-sm btn-outline-info ml-2">Export PDF</a>
            <a href="?page=musik_chart" class="btn btn-sm btn-outline-info ml-2">Chart</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pb-2 pt-0">
      <div class="table-responsive p-3">

        <?php
        $sql = "SELECT m.*, GROUP_CONCAT(g.nama_genre) as genre
        FROM musik_genre as mg 
        JOIN musik as m on m.id_musik=mg.id_musik 
        JOIN genre as g on g.id_genre=mg.id_genre 
        WHERE mg.deleted_at IS null 
        GROUP BY id_musik";


        $result = mysqli_query($koneksi, $sql);

        $is_boleh_edit = cek_akses($koneksi, 2, $_SESSION['id_role'], "update");
        $is_boleh_hapus = cek_akses($koneksi, 2, $_SESSION['id_role'], "delete");
        ?>



        <!-- TABLE -->
        <table class="table align-items-center ml-0">

          <tr>
            <th class="font-weight-bolder" width="8%">No.</th>
            <th class="font-weight-bolder">Judul Musik</th>
            <th class="font-weight-bolder">Tahun</th>
            <th class="font-weight-bolder">Artist</th>
            <th width="10%" class="font-weight-bolder">Action</th>

          </tr>



          <?php
          $no = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $no++;
            $btn = array();

            $btn[] = "<a href='?page=musik_word&id_musik=" . $row['id_musik'] . "' class='btn btn-success mb-0'>Cetak</a>";

            if ($is_boleh_edit == true) {
              $btn[] = "<a href='?page=musik_edit&id_musik=" . $row['id_musik'] . "' class='btn btn-info mb-0'>Edit</a>";
            }

            if ($is_boleh_hapus == true) {
              $btn[] = "<a href='?page=musik_delete&id_musik=" . $row['id_musik'] . "' class='btn btn-danger mb-0'>Hapus</a>";
            }
            echo "
              <tr>
                <td>" . $no . "</td>
                <td>" . $row['judul_musik'] . "<br />Genre: <strong>" . $row['genre'] . "</strong></td>
                <td>" . $row['tahun'] . "</td>
                <td>" . $row['artist'] . "</td>
                <td>
                   " . implode(" ", $btn) . "
                </td>
              </tr>";
          }
          ?>

        </table>
      </div>
    </div>
  </div>
</div>
</div>