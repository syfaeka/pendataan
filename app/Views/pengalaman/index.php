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
                        <th>Nama Kontrak</th>
                        <th>Nomor Kontrak</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Akhir</th>
                        <th>Tgl Serah Terima</th>
                        <th>Nilai Kontrak (Rp)</th>
                        <th>Kategori Pekerjaan</th>
                        <th>% Pekerjaan</th>
                        <th>Uraian Pekerjaan</th>
                        <th>Ruang Lingkup</th>
                        <th>KBLI</th>
                        <th>Alamat Lokasi</th>
                        <th>Negara Lokasi</th>
                        <th>Provinsi Lokasi</th>
                        <th>Kota Lokasi</th>
                        <th>Jenis Instansi</th>
                        <th>Nama Instansi</th>
                        <th>Satuan Kerja</th>
                        <th>Provinsi Instansi</th>
                        <th>Kota Instansi</th>
                        <th>Alamat Instansi</th>
                        <th>Telepon Instansi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($pengalaman as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['nama_kontrak']) ?></td>
                    <td><?= esc($row['nomor_kontrak']) ?></td>
                    <td><?= esc($row['tanggal_mulai']) ?></td>
                    <td><?= esc($row['tanggal_akhir']) ?></td>
                    <td><?= esc($row['tanggal_serah_terima']) ?></td>
                    <td class="text-end"><?= $row['nilai_kontrak'] !== null ? number_format($row['nilai_kontrak'], 0, ',', '.') : '-' ?></td>
                    <td><?= esc($row['kategori_name']) ?></td>
                    <td class="text-center"><?= esc($row['persentase_pekerjaan']) ?>%</td>
                    <td><?= esc($row['uraian_pekerjaan']) ?></td>
                    <td><?= esc($row['ruang_lingkup']) ?></td>
                    <td><?= esc($row['kbli_name']) ?></td>
                    <td><?= esc($row['alamat_lokasi']) ?></td>
                    <td><?= esc($row['negara_lokasi_name']) ?></td>
                    <td><?= esc($row['provinsi_lokasi_name']) ?></td>
                    <td><?= esc($row['kota_lokasi_name']) ?></td>
                    <td><?= esc($row['jenis_instansi_name']) ?></td>
                    <td><?= esc($row['instansi_name']) ?></td>
                    <td><?= esc($row['satuan_kerja_name']) ?></td>
                    <td><?= esc($row['provinsi_instansi_name']) ?></td>
                    <td><?= esc($row['kota_instansi_name']) ?></td>
                    <td><?= esc($row['alamat_instansi']) ?></td>
                    <td><?= esc($row['telepon_instansi']) ?></td>
                    <td class="text-center" style="white-space:nowrap;">
                        <a href="<?= base_url('pengalaman/' . $row['id'] . '/edit') ?>" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="<?= base_url('pengalaman/' . $row['id'] . '/delete') ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Hapus data pengalaman ini?');">
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