<?php

namespace App\Models;

use CodeIgniter\Model;

class NamaInstansiModel extends Model
{
    protected $table            = 'nama_instansi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
