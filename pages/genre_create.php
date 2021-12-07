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
          <h4>Form Genre</h5>
        </div>
        <div class="col-2">
          <a href="?page=genre_list" class="btn btn-sm btn-outline-info">Kembali</a>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-3">

        <!-- TABLE -->
        <form action="?page=genre_save" method="POST">
            <table class="table align-items-center ml-0">
                <tr>
                    <td width='20%'>Nama Genre</td>
                    <td>:</td>
                    <td><input style="background-color: #f0f0f0; width:50%; padding-left:10px" type="text" name='nama_genre' class="form-control"></td>
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