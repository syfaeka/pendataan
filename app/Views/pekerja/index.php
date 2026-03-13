<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Pekerja</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?= base_url('datapekerja/new') ?>" class="btn btn-sm btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body pl-0 pr-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle" id="dataTable">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status Kepegawaian</th>
                        <th>Jenis Tenaga Ahli</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
               <tbody>
                <?php $no = 1; foreach ($pekerja as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['nama']) ?></td>
                    <td><?= esc($row['status_name']) ?></td>
                    <td><?= esc($row['ahli_name']) ?></td>
                    <td class="text-center">
                        tombol
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
   $(document).ready(function() {
    $('#dataTable').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json",
            emptyTable: "Belum ada data."
        },
        pageLength: 10
    });
});
</script>
<?= $this->endSection() ?>
