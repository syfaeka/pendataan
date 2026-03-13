<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengalaman Perusahaan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?= base_url('pengalaman/new') ?>" class="btn btn-sm btn-primary">
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
                        <th>Nama Kontrak</th>
                        <th>Nomor Kontrak</th>
                        <th>Nilai Kontrak</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pengalaman)) : ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data pengalaman.</td>
                        </tr>
                    <?php else : ?>
                        <?php $no = 1; foreach ($pengalaman as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($row['nama_kontrak']) ?></td>
                                <td><?= esc($row['nomor_kontrak']) ?></td>
                                <td><?= number_format($row['nilai_kontrak'], 0, ',', '.') ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('pengalaman/' . $row['id'] . '/edit') ?>" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="<?= base_url('pengalaman/' . $row['id'] . '/delete') ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Hapus data pengalaman ini?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        if ($('#dataTable tbody tr:not(.text-center)').length > 0) {
            $('#dataTable').DataTable({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json" },
                "pageLength": 10
            });
        }
    });
</script>
<?= $this->endSection() ?>
