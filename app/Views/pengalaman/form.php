<?= $this->extend('layouts/main') ?>

<?php
$isEdit = isset($pengalaman);
$action = $isEdit ? base_url('pengalaman/' . $pengalaman['id']) : base_url('pengalaman');
?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $isEdit ? 'Edit Pengalaman' : 'Tambah Pengalaman Perusahaan' ?></h1>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form action="<?= $action ?>" method="POST">
            <?= csrf_field() ?>

            <!-- INFORMASI KONTRAK -->
            <h5 class="mb-3 border-bottom pb-2 text-primary">Informasi Kontrak</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Nama Kontrak <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_kontrak" value="<?= set_value('nama_kontrak', $pengalaman['nama_kontrak'] ?? '') ?>" required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Nomor Kontrak</label>
                    <input type="text" class="form-control" name="nomor_kontrak" value="<?= set_value('nomor_kontrak', $pengalaman['nomor_kontrak'] ?? '') ?>">
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" name="tanggal_mulai" value="<?= set_value('tanggal_mulai', $pengalaman['tanggal_mulai'] ?? '') ?>">
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tanggal_akhir" value="<?= set_value('tanggal_akhir', $pengalaman['tanggal_akhir'] ?? '') ?>">
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">Tanggal Serah Terima</label>
                    <input type="date" class="form-control" name="tanggal_serah_terima" value="<?= set_value('tanggal_serah_terima', $pengalaman['tanggal_serah_terima'] ?? '') ?>">
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Nilai Kontrak (Rp)</label>
                    <input type="number" step="0.01" class="form-control" name="nilai_kontrak" value="<?= set_value('nilai_kontrak', $pengalaman['nilai_kontrak'] ?? '') ?>">
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Persentase Pekerjaan (%)</label>
                    <input type="number" class="form-control" name="persentase_pekerjaan" value="<?= set_value('persentase_pekerjaan', $pengalaman['persentase_pekerjaan'] ?? '') ?>" min="0" max="100">
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Kategori Pekerjaan</label>
                    <select class="form-select" name="id_kategori_pekerjaan">
                        <option value="">-- Pilih --</option>
                        <?php foreach($kategori as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_kategori_pekerjaan', $pengalaman['id_kategori_pekerjaan'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">KBLI</label>
                    <select class="form-select" name="id_kbli">
                        <option value="">-- Pilih --</option>
                        <?php foreach($kbli as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_kbli', $pengalaman['id_kbli'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Uraian Pekerjaan</label>
                    <textarea class="form-control" name="uraian_pekerjaan" rows="3"><?= set_value('uraian_pekerjaan', $pengalaman['uraian_pekerjaan'] ?? '') ?></textarea>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Ruang Lingkup</label>
                    <textarea class="form-control" name="ruang_lingkup" rows="3"><?= set_value('ruang_lingkup', $pengalaman['ruang_lingkup'] ?? '') ?></textarea>
                </div>
            </div>

            <!-- LOKASI PEKERJAAN -->
            <h5 class="mb-3 border-bottom pb-2 text-primary">Lokasi Pekerjaan</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-12">
                    <label class="form-label">Alamat Lokasi</label>
                    <textarea class="form-control" name="alamat_lokasi" rows="2"><?= set_value('alamat_lokasi', $pengalaman['alamat_lokasi'] ?? '') ?></textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Negara Lokasi</label>
                    <select class="form-select" name="id_negara_lokasi">
                        <option value="">-- Pilih --</option>
                        <?php foreach($negara as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_negara_lokasi', $pengalaman['id_negara_lokasi'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Provinsi Lokasi</label>
                    <select class="form-select" name="id_provinsi_lokasi">
                        <option value="">-- Pilih --</option>
                        <?php foreach($provinsi as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_provinsi_lokasi', $pengalaman['id_provinsi_lokasi'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kota Lokasi</label>
                    <select class="form-select" name="id_kota_lokasi">
                        <option value="">-- Pilih --</option>
                        <?php foreach($kota as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_kota_lokasi', $pengalaman['id_kota_lokasi'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- INSTANSI PEMBERI TUGAS -->
            <h5 class="mb-3 border-bottom pb-2 text-primary">Data Instansi Pemberi Tugas</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label">Jenis Instansi</label>
                    <select class="form-select" name="id_jenis_instansi">
                        <option value="">-- Pilih --</option>
                        <?php foreach($jenis_instansi as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_jenis_instansi', $pengalaman['id_jenis_instansi'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nama Instansi</label>
                    <select class="form-select" name="id_nama_instansi">
                        <option value="">-- Pilih --</option>
                        <?php foreach($nama_instansi as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_nama_instansi', $pengalaman['id_nama_instansi'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Satuan Kerja</label>
                    <select class="form-select" name="id_satuan_kerja">
                        <option value="">-- Pilih --</option>
                        <?php foreach($satuan_kerja as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_satuan_kerja', $pengalaman['id_satuan_kerja'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Provinsi Instansi</label>
                    <select class="form-select" name="id_provinsi_instansi">
                        <option value="">-- Pilih --</option>
                        <?php foreach($provinsi as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_provinsi_instansi', $pengalaman['id_provinsi_instansi'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kota Instansi</label>
                    <select class="form-select" name="id_kota_instansi">
                        <option value="">-- Pilih --</option>
                        <?php foreach($kota as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_kota_instansi', $pengalaman['id_kota_instansi'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-8">
                    <label class="form-label">Alamat Instansi</label>
                    <textarea class="form-control" name="alamat_instansi" rows="2"><?= set_value('alamat_instansi', $pengalaman['alamat_instansi'] ?? '') ?></textarea>
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">Telepon Instansi</label>
                    <input type="text" class="form-control" name="telepon_instansi" value="<?= set_value('telepon_instansi', $pengalaman['telepon_instansi'] ?? '') ?>">
                </div>
            </div>

            <hr class="my-4">
            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-save"></i> <?= $isEdit ? 'Update Data Pengalaman' : 'Simpan Data Baru' ?>
                </button>
                <a href="<?= base_url('pengalaman') ?>" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
