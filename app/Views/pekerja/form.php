<?= $this->extend('layouts/main') ?>

<?php
$isEdit = isset($pekerja);
$action = $isEdit ? base_url('datapekerja/' . $pekerja['id']) : base_url('datapekerja');
?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $isEdit ? 'Edit Data Pekerja' : 'Tambah Data Pekerja' ?></h1>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form action="<?= $action ?>" method="POST">
            <?= csrf_field() ?>

            <!-- INFORMASI UMUM -->
            <h5 class="mb-3 border-bottom pb-2 text-primary">Informasi Umum</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" value="<?= set_value('nama', $pekerja['nama'] ?? '') ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">NIK / Paspor</label>
                    <input type="text" class="form-control" name="nik_paspor" value="<?= set_value('nik_paspor', $pekerja['nik_paspor'] ?? '') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">NPWP</label>
                    <input type="text" class="form-control" name="npwp" value="<?= set_value('npwp', $pekerja['npwp'] ?? '') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin">
                        <option value="">-- Pilih --</option>
                        <option value="L" <?= set_value('jenis_kelamin', $pekerja['jenis_kelamin'] ?? '') == 'L' ? 'selected' : '' ?>>Laki-laki (L)</option>
                        <option value="P" <?= set_value('jenis_kelamin', $pekerja['jenis_kelamin'] ?? '') == 'P' ? 'selected' : '' ?>>Perempuan (P)</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">No. BPJS Kesehatan</label>
                    <input type="text" class="form-control" name="no_bpjs_kesehatan" value="<?= set_value('no_bpjs_kesehatan', $pekerja['no_bpjs_kesehatan'] ?? '') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">No. BPJS Ketenagakerjaan</label>
                    <input type="text" class="form-control" name="no_bpjs_ketenagakerjaan" value="<?= set_value('no_bpjs_ketenagakerjaan', $pekerja['no_bpjs_ketenagakerjaan'] ?? '') ?>">
                </div>
            </div>

            <!-- KEPEGAWAIAN & KEAHLIAN -->
            <h5 class="mb-3 border-bottom pb-2 text-primary">Data Kepegawaian & Keahlian</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Status Kepegawaian</label>
                    <select class="form-select" name="id_status_kepegawaian">
                        <option value="">-- Pilih Status --</option>
                        <?php foreach($status_pegawai as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_status_kepegawaian', $pekerja['id_status_kepegawaian'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Tenaga Ahli</label>
                    <select class="form-select" name="id_jenis_tenaga_ahli">
                        <option value="">-- Pilih --</option>
                        <?php foreach($jenis_ahli as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_jenis_tenaga_ahli', $pekerja['id_jenis_tenaga_ahli'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Profesi / Keahlian</label>
                    <input type="text" class="form-control" name="profesi_keahlian" value="<?= set_value('profesi_keahlian', $pekerja['profesi_keahlian'] ?? '') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Lama Pengalaman (Tahun)</label>
                    <input type="number" class="form-control" name="lama_pengalaman_tahun" value="<?= set_value('lama_pengalaman_tahun', $pekerja['lama_pengalaman_tahun'] ?? '') ?>" min="0">
                </div>
            </div>

            <!-- PENDIDIKAN & BAHASA -->
            <h5 class="mb-3 border-bottom pb-2 text-primary">Pendidikan & Bahasa</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Pendidikan Akhir (Master)</label>
                    <select class="form-select" name="id_pendidikan_akhir">
                        <option value="">-- Pilih --</option>
                        <?php foreach($pendidikan as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_pendidikan_akhir', $pekerja['id_pendidikan_akhir'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Institusi / Detail Pendidikan</label>
                    <input type="text" class="form-control" name="pendidikan" value="<?= set_value('pendidikan', $pekerja['pendidikan'] ?? '') ?>">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Pendidikan Non Formal</label>
                    <input type="text" class="form-control" name="pendidikan_non_formal" value="<?= set_value('pendidikan_non_formal', $pekerja['pendidikan_non_formal'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Bahasa Indonesia</label>
                    <select class="form-select" name="bahasa_indonesia">
                        <option value="">-- Pilih --</option>
                        <option value="Aktif" <?= set_value('bahasa_indonesia', $pekerja['bahasa_indonesia'] ?? '') == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="Pasif" <?= set_value('bahasa_indonesia', $pekerja['bahasa_indonesia'] ?? '') == 'Pasif' ? 'selected' : '' ?>>Pasif</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Bahasa Inggris</label>
                    <select class="form-select" name="bahasa_inggris">
                        <option value="">-- Pilih --</option>
                        <option value="Aktif" <?= set_value('bahasa_inggris', $pekerja['bahasa_inggris'] ?? '') == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="Pasif" <?= set_value('bahasa_inggris', $pekerja['bahasa_inggris'] ?? '') == 'Pasif' ? 'selected' : '' ?>>Pasif</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Bahasa Setempat</label>
                    <input type="text" class="form-control" name="bahasa_setempat" value="<?= set_value('bahasa_setempat', $pekerja['bahasa_setempat'] ?? '') ?>">
                </div>
            </div>

            <!-- KONTAK & DOMISILI -->
            <h5 class="mb-3 border-bottom pb-2 text-primary">Informasi Kontak & Kelahiran</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Kewarganegaraan</label>
                    <select class="form-select" name="id_kewarganegaraan">
                        <option value="">-- Pilih --</option>
                        <?php foreach($warga_negara as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_kewarganegaraan', $pekerja['id_kewarganegaraan'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" value="<?= set_value('tanggal_lahir', $pekerja['tanggal_lahir'] ?? '') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Negara Lahir</label>
                    <select class="form-select" name="id_negara_lahir">
                        <option value="">-- Pilih --</option>
                        <?php foreach($negara as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_negara_lahir', $pekerja['id_negara_lahir'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kota Lahir</label>
                    <select class="form-select" name="id_kota_lahir">
                        <option value="">-- Pilih --</option>
                        <?php foreach($kota as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_kota_lahir', $pekerja['id_kota_lahir'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= set_value('email', $pekerja['email'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="<?= set_value('telepon', $pekerja['telepon'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Website</label>
                    <input type="text" class="form-control" name="website" value="<?= set_value('website', $pekerja['website'] ?? '') ?>">
                </div>
                
                <div class="col-md-12">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control" name="alamat" rows="2"><?= set_value('alamat', $pekerja['alamat'] ?? '') ?></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Provinsi Domisili</label>
                    <select class="form-select" name="id_provinsi">
                        <option value="">-- Pilih --</option>
                        <?php foreach($provinsi as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_provinsi', $pekerja['id_provinsi'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kota Domisili</label>
                    <select class="form-select" name="id_kota">
                        <option value="">-- Pilih --</option>
                        <?php foreach($kota as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= set_value('id_kota', $pekerja['id_kota'] ?? '') == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <hr class="my-4">
            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-save"></i> <?= $isEdit ? 'Update Data' : 'Simpan Data Baru' ?>
                </button>
                <a href="<?= base_url('datapekerja') ?>" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
