<?php

namespace App\Models;

use CodeIgniter\Model;

class KewarganegaraanModel extends Model
{
    protected $table            = 'kewarganegaraan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
