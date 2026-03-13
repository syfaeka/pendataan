<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisTenagaAhliModel extends Model
{
    protected $table            = 'jenis_tenaga_ahli';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['name'];
}
