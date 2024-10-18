<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>
    <section>
        <!-- /.content-header -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $biodatacount; ?></h3>
                            <p>Jumlah Biodata</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-arrow-alt-circle-up"></i>
                        </div>
                        <a href="/biodata" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php if (session()->get('role') == 'Admin' || session()->get('role') == 'Supervisor' || session()->get('role') == 'Penginput' || session()->get('role') == 'Administrasi'): ?>
                    <div class="col-lg-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $survei; ?></h3>
                            <p>Jumlah Survei</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-arrow-alt-circle-down"></i>
                        </div>
                        <a href="/survei" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div>
        </div>
</div>
</div>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Assuming you have biodatacount and survei values available from your PHP controller
    var biodataCount = <?= json_encode($biodatacount); ?>;
    var surveiCount = <?= json_encode($survei); ?>;

    var ctx = document.getElementById('biodataSurveiChart').getContext('2d');

    var biodataSurveiChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Biodata', 'Survei'],
            datasets: [{
                label: 'Jumlah',
                data: [biodataCount, surveiCount],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)', // Color for Biodata
                    'rgba(153, 102, 255, 0.2)' // Color for Survei
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

</div>
</section>
</div>

<?= $this->endSection() ?>