<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MockDataSeeder extends Seeder
{
    public function run(): void
    {
        $db = \Config\Database::connect();

        // ----------------------------------------------------------------
        // 1. INSERT MASTER DATA (all master tables use column: `name`)
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

        $db->table('pendidikan_akhir')->insert(['name' => 'S1 (Sarjana)']);
        $idPendidikanAkhir = $db->insertID();

        $db->table('kategori_pekerjaan')->insert(['name' => 'Jasa Lainnya']);
        $idKategoriPekerjaan = $db->insertID();

        // ----------------------------------------------------------------
        // 2. INSERT DATA PEKERJA
        // Note: jenis_kelamin ENUM is ['L','P']; 'Pria' = 'L'
        // ----------------------------------------------------------------

        $db->table('data_pekerja')->insert([
            'nama'                   => 'Mustafa',
            'nik_paspor'             => '1221102522152210',
            'email'                  => 'iniinaja@gmail.com',
            'telepon'                => '08573665656512',
            'alamat'                 => 'Jl. Asahan No 18 A',
            'jenis_kelamin'          => 'L',
            'tanggal_lahir'          => '1994-07-24',
            'profesi_keahlian'       => 'Programmer',
            'lama_pengalaman_tahun'  => 8,
            'bahasa_indonesia'       => 'Baik',
            'bahasa_inggris'         => 'Baik',
            'bahasa_setempat'        => 'Baik',
            'id_negara_lahir'        => $idNegara,
            'id_kota_lahir'          => $idKota,
            'id_provinsi'            => $idProvinsi,
            'id_kota'                => $idKota,
            'id_status_kepegawaian'  => $idStatusKepegawaian,
            'id_jenis_tenaga_ahli'   => $idJenisTenagaAhli,
            'id_kewarganegaraan'     => $idKewarganegaraan,
            'id_pendidikan_akhir'    => $idPendidikanAkhir,
        ]);

        // ----------------------------------------------------------------
        // 3. INSERT PENGALAMAN PERUSAHAAN
        // ----------------------------------------------------------------

        $db->table('pengalaman_perusahaan')->insert([
            'nama_kontrak'          => 'Belanja Pemeliharaan Komputer-Peralatan Jaringan',
            'nomor_kontrak'         => '602/ 447 /402.108/2021',
            'tanggal_mulai'         => '2021-07-30',
            'tanggal_akhir'         => '2021-08-28',
            'tanggal_serah_terima'  => '2021-08-30',
            'nilai_kontrak'         => 1000000,
            'persentase_pekerjaan'  => 100,
            'id_kategori_pekerjaan' => $idKategoriPekerjaan,
        ]);

        echo "MockDataSeeder ran successfully.\n";
    }
}
