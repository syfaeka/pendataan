<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Dashboard Pendataan') ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables CSS (optional for better tables later) -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: calc(100vh - 56px);
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }
        main {
            padding: 2rem;
        }
    </style>
</head>
<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>">Pendataan DMIS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-person-circle"></i> Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?= base_url() ?>">
                                <i class="bi bi-house-door"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (url_is('datapekerja*')) ? 'fw-bold text-primary' : 'text-dark' ?>" href="<?= base_url('datapekerja') ?>">
                                <i class="bi bi-people"></i> Data Pekerja
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (url_is('pengalaman*')) ? 'fw-bold text-primary' : 'text-dark' ?>" href="<?= base_url('pengalaman') ?>">
                                <i class="bi bi-building"></i> Pengalaman Perusahaan
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Master Data</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <?php 
                        $masters = [
                            'negara' => 'Negara',
                            'provinsi' => 'Provinsi',
                            'kota_kabupaten' => 'Kota/Kabupaten',
                            'status_kepegawaian' => 'Status Kepegawaian',
                            'jenis_tenaga_ahli' => 'Jenis Tenaga Ahli',
                            'kewarganegaraan' => 'Kewarganegaraan',
                            'bahasa' => 'Bahasa',
                            'pendidikan_akhir' => 'Pendidikan Akhir',
                            'kbli' => 'KBLI',
                            'kategori_pekerjaan' => 'Kategori Pekerjaan',
                            'jenis_instansi' => 'Jenis Instansi',
                            'nama_instansi' => 'Nama Instansi',
                            'satuan_kerja' => 'Satuan Kerja'
                        ];
                        foreach($masters as $slug => $label): 
                            // Add 'fw-bold text-primary' if it's the active table
                            $isActive = (isset($table) && $table === $slug) ? 'fw-bold text-primary' : 'text-dark';
                        ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $isActive ?>" href="<?= base_url('master/' . $slug) ?>">
                                    <i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i> <?= $label ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                
                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i><?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i><?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- View Content Injected Here -->
                <?= $this->renderSection('content') ?>

            </main>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables JS (optional for later) -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- Render custom page scripts -->
    <?= $this->renderSection('scripts') ?>
</body>
</html>
