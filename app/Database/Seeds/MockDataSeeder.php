<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MockDataSeeder extends Seeder
{
    public function run(): void
    {
        $db = \Config\Database::connect();

        // ----------------------------------------------------------------
        // 1. INSERT MASTER DATA
        // ----------------------------------------------------------------

        $db->table('negara')->insert(['name' => 'Indonesia']);
        $idNegara = $db->insertID();

        $db->table('provinsi')->insert(['name' => 'Jawa Timur']);
        $idProvinsi = $db->insertID();

        $db->table('kota_kabupaten')->insert(['name' => 'Kota Madiun']);
        $idKota = $db->insertID();

        $db->table('status_kepegawaian')->insert(['name' => 'Tetap']);
        $idStatusKepegawaian = $db->insertID();

        $db->table('jenis_tenaga_ahli')->insert(['name' => 'Individu WNI']);
        $idJenisTenagaAhli = $db->insertID();

        $db->table('kewarganegaraan')->insert(['name' => 'Indonesia']);
        $idKewarganegaraan = $db->insertID();

        $db->table('bahasa')->insert(['name' => 'Indonesia']);
        $idBahasa = $db->insertID();

        $db->table('pendidikan_akhir')->insert(['name' => 'S1 (Sarjana)']);
        $idPendidikanAkhir = $db->insertID();

        $db->table('kbli')->insert(['name' => '6201 - Aktivitas Pemrograman Komputer']);
        $idKbli = $db->insertID();

        $db->table('kategori_pekerjaan')->insert(['name' => 'Jasa Lainnya']);
        $idKategoriPekerjaan = $db->insertID();

        $db->table('jenis_instansi')->insert(['name' => 'Pemerintah Daerah']);
        $idJenisInstansi = $db->insertID();

        $db->table('nama_instansi')->insert(['name' => 'Dinas Kominfo']);
        $idNamaInstansi = $db->insertID();

        $db->table('satuan_kerja')->insert(['name' => 'Bidang TI']);
        $idSatuanKerja = $db->insertID();

        // ----------------------------------------------------------------
        // 2. INSERT DATA PEKERJA (ALL COLUMNS FILLED)
        // ----------------------------------------------------------------

        $db->table('data_pekerja')->insert([
            'nama'                    => 'Mustafa',
            'nik_paspor'              => '3577012407940001',
            'npwp'                    => '82.333.444.5-666.000',
            'no_bpjs_kesehatan'       => '0001112223334',
            'no_bpjs_ketenagakerjaan' => '888999000111',
            'email'                   => 'iniinaja@gmail.com',
            'telepon'                 => '08573665656512',
            'website'                 => 'www.mustafa-dev.com',
            'alamat'                  => 'Jl. Asahan No 18 A',
            'jenis_kelamin'           => 'L', // 'Pria' maps to 'L'
            'tanggal_lahir'           => '1994-07-24',
            'profesi_keahlian'        => 'Programmer',
            'lama_pengalaman_tahun'   => 8,
            'bahasa_indonesia'        => 'Baik',
            'bahasa_inggris'          => 'Baik',
            'bahasa_setempat'         => 'Baik',
            'pendidikan'              => 'Studi Teknik Informatika, Universitas PGRI Madiun',
            'pendidikan_non_formal'   => 'Bootcamp Web Development',
            
            // Foreign keys
            'id_negara_lahir'         => $idNegara,
            'id_kota_lahir'           => $idKota,
            'id_provinsi'             => $idProvinsi,
            'id_kota'                 => $idKota,
            'id_status_kepegawaian'   => $idStatusKepegawaian,
            'id_jenis_tenaga_ahli'    => $idJenisTenagaAhli,
            'id_kewarganegaraan'      => $idKewarganegaraan,
            'id_pendidikan_akhir'     => $idPendidikanAkhir,
        ]);

        // ----------------------------------------------------------------
        // 3. INSERT PENGALAMAN PERUSAHAAN (ALL COLUMNS FILLED)
        // ----------------------------------------------------------------

        $db->table('pengalaman_perusahaan')->insert([
            'nama_kontrak'           => 'Belanja Pemeliharaan Komputer-Peralatan Jaringan',
            'nomor_kontrak'          => '602/447/402.108/2021',
            'tanggal_mulai'          => '2021-07-30',
            'tanggal_akhir'          => '2021-08-28',
            'tanggal_serah_terima'   => '2021-08-30',
            'nilai_kontrak'          => 15000000,
            'persentase_pekerjaan'   => 100,
            'uraian_pekerjaan'       => 'Melakukan pemeliharaan server dan perbaikan instalasi jaringan fiber optik.',
            'ruang_lingkup'          => 'Setup Jaringan LAN, Maintenance Server, dan Troubleshooting.',
            'alamat_lokasi'          => 'Gedung Pusat Pemerintahan Lantai 2',
            'alamat_instansi'        => 'Jl. Pahlawan No 37',
            'telepon_instansi'       => '0351-462334',
            
            // Foreign keys
            'id_kategori_pekerjaan'  => $idKategoriPekerjaan,
            'id_kbli'                => $idKbli,
            'id_negara_lokasi'       => $idNegara,
            'id_provinsi_lokasi'     => $idProvinsi,
            'id_kota_lokasi'         => $idKota,
            'id_jenis_instansi'      => $idJenisInstansi,
            'id_nama_instansi'       => $idNamaInstansi,
            'id_satuan_kerja'        => $idSatuanKerja,
            'id_provinsi_instansi'   => $idProvinsi,
            'id_kota_instansi'       => $idKota,
        ]);

        echo "MockDataSeeder ran successfully.\n";
    }
}
