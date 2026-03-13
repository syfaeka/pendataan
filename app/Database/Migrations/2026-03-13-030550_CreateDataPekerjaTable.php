<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDataPekerjaTable extends Migration
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'id_status_kepegawaian' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_jenis_tenaga_ahli' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_kewarganegaraan' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'nik_paspor' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'npwp' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],
            'no_bpjs_kesehatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],
            'no_bpjs_ketenagakerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],
            'id_negara_lahir' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_kota_lahir' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'jenis_kelamin' => [
                'type'       => 'ENUM',
                'constraint' => ['L', 'P'],
                'null'       => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => true,
            ],
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],
            'website' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'id_provinsi' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_kota' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'lama_pengalaman_tahun' => [
                'type' => 'INT',
                'null' => true,
            ],
            'bahasa_indonesia' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'bahasa_inggris' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'bahasa_setempat' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'pendidikan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pendidikan_non_formal' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'id_pendidikan_akhir' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'profesi_keahlian' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_status_kepegawaian', 'status_kepegawaian', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_jenis_tenaga_ahli',  'jenis_tenaga_ahli',  'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_kewarganegaraan',    'kewarganegaraan',    'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_negara_lahir',       'negara',             'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_kota_lahir',         'kota_kabupaten',     'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_provinsi',           'provinsi',           'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_kota',               'kota_kabupaten',     'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_pendidikan_akhir',   'pendidikan_akhir',   'id', 'SET NULL', 'CASCADE');

        $this->forge->createTable('data_pekerja');
    }

    public function down(): void
    {
        $this->forge->dropTable('data_pekerja');
    }
}
