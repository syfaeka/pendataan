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

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered align-middle mb-0 small" id="dataTable" style="white-space:nowrap;">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status Kepegawaian</th>
                        <th>Jenis Tenaga Ahli</th>
                        <th>Kewarganegaraan</th>
                        <th>NIK / Paspor</th>
                        <th>NPWP</th>
                        <th>BPJS Kesehatan</th>
                        <th>BPJS Ketenagakerjaan</th>
                        <th>Negara Lahir</th>
                        <th>Kota Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Website</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Lama Pengalaman (Thn)</th>
                        <th>B. Indonesia</th>
                        <th>B. Inggris</th>
                        <th>B. Setempat</th>
                        <th>Pendidikan</th>
                        <th>Pend. Non Formal</th>
                        <th>Pendidikan Akhir</th>
                        <th>Profesi / Keahlian</th>
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
                    <td><?= esc($row['kewarganegaraan_name']) ?></td>
                    <td><?= esc($row['nik_paspor']) ?></td>
                    <td><?= esc($row['npwp']) ?></td>
                    <td><?= esc($row['no_bpjs_kesehatan']) ?></td>
                    <td><?= esc($row['no_bpjs_ketenagakerjaan']) ?></td>
                    <td><?= esc($row['negara_name']) ?></td>
                    <td><?= esc($row['kota_lahir_name']) ?></td>
                    <td><?= esc($row['tanggal_lahir']) ?></td>
                    <td><?= $row['jenis_kelamin'] === 'L' ? 'Pria' : ($row['jenis_kelamin'] === 'P' ? 'Wanita' : '-') ?></td>
                    <td><?= esc($row['email']) ?></td>
                    <td><?= esc($row['telepon']) ?></td>
                    <td><?= esc($row['website']) ?></td>
                    <td><?= esc($row['alamat']) ?></td>
                    <td><?= esc($row['provinsi_name']) ?></td>
                    <td><?= esc($row['kota_name']) ?></td>
                    <td class="text-center"><?= esc($row['lama_pengalaman_tahun']) ?></td>
                    <td><?= esc($row['bahasa_indonesia']) ?></td>
                    <td><?= esc($row['bahasa_inggris']) ?></td>
                    <td><?= esc($row['bahasa_setempat']) ?></td>
                    <td><?= esc($row['pendidikan']) ?></td>
                    <td><?= esc($row['pendidikan_non_formal']) ?></td>
                    <td><?= esc($row['pendidikan_name']) ?></td>
                    <td><?= esc($row['profesi_keahlian']) ?></td>
                    <td class="text-center" style="white-space:nowrap;">
                        <a href="<?= base_url('datapekerja/' . $row['id'] . '/edit') ?>" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="<?= base_url('datapekerja/' . $row['id'] . '/delete') ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Hapus data pekerja ini?');">
                            <i class="bi bi-trash"></i>
                        </a>
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
        pageLength: 10,
        scrollX: true
    });
});
</script>
<?= $this->endSection() ?>