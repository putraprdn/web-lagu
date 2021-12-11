<?php
if (defined("ALLOWED") === false) {
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>

<div class="container-fluid py-4">
    <div class="card col-16">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-10">
                    <h4>Chart Musik</h5>
                </div>
                <div class="row justify-content-end">
                    <div class="col-5 d-flex justify-content-end gap-1">
                        <a href="?page=musik_list" class="btn btn-sm btn-outline-info ml-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div style="" class="card-body col-sm-4 px-0 pb-2 pt-0 m-4">


            <?php
            $sql = 'select tahun, count(*) as num from musik group by tahun';
            $hasil = mysqli_query($koneksi, $sql);

            $labels = [];
            $data = [];
            while ($row = mysqli_fetch_assoc($hasil)) {
                $labels[] = $row['tahun'];
                $data[] = $row['num'];
            }
            ?>
            <canvas id="myChart" width="200" height="200"></canvas>



        </div>
    </div>
</div>
</div>
<script>
    const data = {
        labels: [<?php echo implode(',', $labels); ?>],
        datasets: [{
            label: 'Jumlah Musik per Tahun',
            data: [<?php echo implode(',', $data); ?>],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };
    const config = {
        type: 'line',
        data: data,
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>