<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h4 class="card-title mb-0">Selamat Datang di Sistem Informasi Pendataan DMIS</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Total Pekerja -->
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary shadow-sm h-100 border-0">
            <div class="card-body">
                <h5 class="card-title">Total Pekerja</h5>
                <h2 class="mb-0">150</h2>
            </div>
        </div>
    </div>
    
    <!-- Total Pengalaman -->
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success shadow-sm h-100 border-0">
            <div class="card-body">
                <h5 class="card-title">Total Pengalaman</h5>
                <h2 class="mb-0">342</h2>
            </div>
        </div>
    </div>
    
    <!-- Master Data Aktif -->
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-warning shadow-sm h-100 border-0">
            <div class="card-body">
                <h5 class="card-title text-dark">Master Data Aktif</h5>
                <h2 class="mb-0 text-dark">8</h2>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
