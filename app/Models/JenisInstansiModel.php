<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisInstansiModel extends Model
{
    protected $table            = 'jenis_instansi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
