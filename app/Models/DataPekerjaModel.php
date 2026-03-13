<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPekerjaModel extends Model
{
    protected $table            = 'data_pekerja';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;

    protected $allowedFields = [
        'nama',
        'id_status_kepegawaian',
        'id_jenis_tenaga_ahli',
        'id_kewarganegaraan',
        'nik_paspor',
        'npwp',
        'no_bpjs_kesehatan',
        'no_bpjs_ketenagakerjaan',
        'id_negara_lahir',
        'id_kota_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'telepon',
        'website',
        'alamat',
        'id_provinsi',
        'id_kota',
        'lama_pengalaman_tahun',
        'bahasa_indonesia',
        'bahasa_inggris',
        'bahasa_setempat',
        'pendidikan',
        'pendidikan_non_formal',
        'id_pendidikan_akhir',
        'profesi_keahlian',
    ];
}
