<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriPekerjaanModel extends Model
{
    protected $table            = 'kategori_pekerjaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
