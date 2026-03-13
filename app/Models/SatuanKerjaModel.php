<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanKerjaModel extends Model
{
    protected $table            = 'satuan_kerja';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
