<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengalamanPerusahaanTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kontrak' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'nomor_kontrak' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tanggal_akhir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tanggal_serah_terima' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'nilai_kontrak' => [
                'type'       => 'DECIMAL',
                'constraint' => '20,2',
                'null'       => true,
            ],
            'id_kategori_pekerjaan' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'persentase_pekerjaan' => [
                'type' => 'INT',
                'null' => true,
            ],
            'uraian_pekerjaan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'ruang_lingkup' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'id_kbli' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'alamat_lokasi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'id_negara_lokasi' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_provinsi_lokasi' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_kota_lokasi' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_jenis_instansi' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_nama_instansi' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_satuan_kerja' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_provinsi_instansi' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_kota_instansi' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'alamat_instansi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'telepon_instansi' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_kategori_pekerjaan', 'kategori_pekerjaan', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_kbli',               'kbli',              'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_negara_lokasi',      'negara',            'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_provinsi_lokasi',    'provinsi',          'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_kota_lokasi',        'kota_kabupaten',    'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_jenis_instansi',     'jenis_instansi',    'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_nama_instansi',      'nama_instansi',     'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_satuan_kerja',       'satuan_kerja',      'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_provinsi_instansi',  'provinsi',          'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_kota_instansi',      'kota_kabupaten',    'id', 'SET NULL', 'CASCADE');

        $this->forge->createTable('pengalaman_perusahaan');
    }

    public function down(): void
    {
        $this->forge->dropTable('pengalaman_perusahaan');
    }
}
