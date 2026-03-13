<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanPerusahaanModel extends Model
{
    protected $table            = 'pengalaman_perusahaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;

    protected $allowedFields = [
        'nama_kontrak',
        'nomor_kontrak',
        'tanggal_mulai',
        'tanggal_akhir',
        'tanggal_serah_terima',
        'nilai_kontrak',
        'id_kategori_pekerjaan',
        'persentase_pekerjaan',
        'uraian_pekerjaan',
        'ruang_lingkup',
        'id_kbli',
        'alamat_lokasi',
        'id_negara_lokasi',
        'id_provinsi_lokasi',
        'id_kota_lokasi',
        'id_jenis_instansi',
        'id_nama_instansi',
        'id_satuan_kerja',
        'id_provinsi_instansi',
        'id_kota_instansi',
        'alamat_instansi',
        'telepon_instansi',
    ];
}
