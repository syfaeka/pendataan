<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Master: <?= esc($title) ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <button type="button" class="btn btn-sm btn-primary" onclick="openCreateModal()">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </button>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body pl-0 pr-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle" id="masterTable">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="70%">Nama <?= esc($title) ?></th>
                        <th width="25%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)) : ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted">Belum ada data.</td>
                        </tr>
                    <?php else : ?>
                        <?php $no = 1; foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($row['name']) ?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-warning me-1" 
                                            onclick="openEditModal(<?= $row['id'] ?>, '<?= esc(addslashes($row['name'])) ?>')">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    <a href="<?= base_url('master/' . $table . '/' . $row['id'] . '/delete') ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <i class="bi bi-trash"></i> Hapus
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

<!-- Form Modal (Create & Edit) -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="masterForm" method="POST" action="">
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="formModalLabel">Tambah <?= esc($title) ?></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nameInput" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Base URLs injected from PHP
    const baseUrl = '<?= base_url() ?>';
    const tableName = '<?= esc($table) ?>';
    
    const formModal = new bootstrap.Modal(document.getElementById('formModal'));
    const masterForm = document.getElementById('masterForm');
    const nameInput = document.getElementById('nameInput');
    const modalTitle = document.getElementById('formModalLabel');
    const btnSubmit = document.getElementById('btnSubmit');

    function openCreateModal() {
        masterForm.action = baseUrl + 'master/' + tableName + '/store';
        nameInput.value = '';
        modalTitle.textContent = 'Tambah <?= esc($title) ?>';
        btnSubmit.textContent = 'Simpan';
        formModal.show();
    }

    function openEditModal(id, currentName) {
        masterForm.action = baseUrl + 'master/' + tableName + '/' + id + '/update';
        nameInput.value = currentName;
        modalTitle.textContent = 'Edit <?= esc($title) ?>';
        btnSubmit.textContent = 'Update';
        formModal.show();
    }

    // Initialize DataTable if rows exist
    $(document).ready(function() {
        if ($('#masterTable tbody tr:not(.text-center)').length > 0) {
            $('#masterTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
                },
                "pageLength": 10,
                "ordering": false // Keep the original ID/created order for now
            });
        }
    });
</script>
<?= $this->endSection() ?>
